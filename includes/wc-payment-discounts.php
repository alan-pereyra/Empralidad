<?php
/**
 * WooCommerce Payment Methods List Price & Discount Display Component
 *
 * Implements:
 * - Cart product prices reflect list price (base price + X%)
 * - Qualifying discount gateways receive a discount deduction: "Descuento abonando al contado (X%)"
 * - Non-discount gateways pay list price directly with no surcharge fee added ("sin descuento")
 * - Gateway title badges on checkout:
 *   - Discount gateways: "X% de descuento (ya aplicado)"
 *   - Non-discount gateways: "$ [Precio de lista] (sin descuento abonando al contado)"
 * - Dynamic update on checkout gateway change
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Check if a payment gateway qualifies for discount
 */
function emp_is_discount_gateway( $gateway_id ) {
    if ( empty( $gateway_id ) ) {
        return false;
    }
    if ( ! get_theme_mod( 'emp_wc_list_price_discount_enable', false ) ) {
        return false;
    }
    if ( get_theme_mod( 'emp_wc_discount_all_gateways', false ) ) {
        return true;
    }

    $val = get_theme_mod( 'emp_wc_discount_gateway_' . $gateway_id, null );
    if ( $val !== null ) {
        return (bool) $val;
    }

    // Default: BACS (Transferencia bancaria) qualifies by default
    if ( $gateway_id === 'bacs' ) {
        return true;
    }

    return false;
}

/**
 * Get configured percentage
 */
function emp_get_list_price_discount_percent() {
    $percent = (float) get_theme_mod( 'emp_wc_list_price_discount_percent', 15 );
    return ( $percent > 0 ) ? $percent : 15;
}

/**
 * Get the un-augmented pristine base price for a product
 */
function emp_get_product_base_price( $product, $cart_item = array() ) {
    if ( ! $product ) {
        return 0.0;
    }

    // If cached in cart item, return it
    if ( ! empty( $cart_item['emp_base_price'] ) && is_numeric( $cart_item['emp_base_price'] ) ) {
        return (float) $cart_item['emp_base_price'];
    }

    $product_id = $product->get_id();
    $price_meta = get_post_meta( $product_id, '_price', true );
    if ( $price_meta !== '' && is_numeric( $price_meta ) && (float) $price_meta > 0 ) {
        return (float) $price_meta;
    }

    $regular_meta = get_post_meta( $product_id, '_regular_price', true );
    if ( $regular_meta !== '' && is_numeric( $regular_meta ) && (float) $regular_meta > 0 ) {
        return (float) $regular_meta;
    }

    return (float) $product->get_price();
}

/**
 * Apply list price (base + X%) to cart items
 */
add_action( 'woocommerce_before_calculate_totals', 'emp_apply_cart_list_prices', 20, 1 );
function emp_apply_cart_list_prices( $cart ) {
    if ( is_admin() && ! wp_doing_ajax() ) {
        return;
    }
    if ( ! get_theme_mod( 'emp_wc_list_price_discount_enable', false ) ) {
        return;
    }

    $percent = emp_get_list_price_discount_percent();
    if ( $percent <= 0 ) {
        return;
    }

    foreach ( $cart->get_cart() as $cart_item_key => $cart_item ) {
        $product = $cart_item['data'];
        $base_price = emp_get_product_base_price( $product, $cart_item );

        if ( ! isset( $cart->cart_contents[ $cart_item_key ]['emp_base_price'] ) ) {
            $cart->cart_contents[ $cart_item_key ]['emp_base_price'] = $base_price;
        }

        if ( $base_price > 0 ) {
            $list_price = round( $base_price * ( 1 + ( $percent / 100 ) ), 2 );
            $product->set_price( $list_price );
        }
    }
}

/**
 * Calculate the total discount amount for cart items
 */
function emp_get_cart_discount_amount( $cart ) {
    if ( ! $cart ) {
        return 0.0;
    }
    $percent = emp_get_list_price_discount_percent();
    if ( $percent <= 0 ) {
        return 0.0;
    }

    $discount_total = 0.0;
    foreach ( $cart->get_cart() as $cart_item ) {
        $product = $cart_item['data'];
        $base_price = emp_get_product_base_price( $product, $cart_item );
        $quantity = ! empty( $cart_item['quantity'] ) ? (int) $cart_item['quantity'] : 1;

        if ( $base_price > 0 ) {
            $list_price = round( $base_price * ( 1 + ( $percent / 100 ) ), 2 );
            $discount_total += ( $list_price - $base_price ) * $quantity;
        }
    }

    return round( $discount_total, 2 );
}

/**
 * Apply discount fee when a qualifying payment method is selected
 * Non-qualifying methods do NOT get any fee; they pay the list price without discount ("sin descuento").
 */
add_action( 'woocommerce_cart_calculate_fees', 'emp_calculate_payment_discount_fee', 25, 1 );
function emp_calculate_payment_discount_fee( $cart ) {
    if ( is_admin() && ! wp_doing_ajax() ) {
        return;
    }
    if ( ! get_theme_mod( 'emp_wc_list_price_discount_enable', false ) ) {
        return;
    }

    $percent = emp_get_list_price_discount_percent();
    if ( $percent <= 0 ) {
        return;
    }

    // Determine chosen payment gateway
    $chosen_gateway = WC()->session->get( 'chosen_payment_method' );
    if ( empty( $chosen_gateway ) && ! empty( $_POST['payment_method'] ) ) {
        $chosen_gateway = wc_clean( wp_unslash( $_POST['payment_method'] ) );
    }
    if ( empty( $chosen_gateway ) ) {
        $available = WC()->payment_gateways()->get_available_payment_gateways();
        if ( ! empty( $available ) ) {
            $chosen_gateway = current( array_keys( $available ) );
        }
    }

    // Apply discount fee only if chosen gateway qualifies
    if ( $chosen_gateway && emp_is_discount_gateway( $chosen_gateway ) ) {
        $discount = emp_get_cart_discount_amount( $cart );
        if ( $discount > 0 ) {
            $label = sprintf( __( 'Descuento abonando al contado (%s%%)', 'empralidad' ), $percent );
            $cart->add_fee( $label, -$discount, false );
        }
    }
    // Non-qualifying gateways have no fee added (they pay list price without discount).
}

/**
 * Add badges to payment gateway titles on checkout
 */
add_filter( 'woocommerce_gateway_title', 'emp_filter_gateway_title_discount_badge', 25, 2 );
function emp_filter_gateway_title_discount_badge( $title, $gateway_id ) {
    if ( is_admin() && ! wp_doing_ajax() ) {
        return $title;
    }
    if ( ! get_theme_mod( 'emp_wc_list_price_discount_enable', false ) ) {
        return $title;
    }
    if ( ! function_exists( 'WC' ) || ! WC()->cart ) {
        return $title;
    }
    if ( ! is_checkout() && ! wp_doing_ajax() ) {
        return $title;
    }

    $percent = emp_get_list_price_discount_percent();

    if ( emp_is_discount_gateway( $gateway_id ) ) {
        $badge = sprintf(
            ' <span class="emp-gateway-badge emp-gateway-discount-badge">%s%% de descuento (ya aplicado)</span>',
            esc_html( $percent )
        );
        return $title . $badge;
    } else {
        $list_total = (float) WC()->cart->get_subtotal() + (float) WC()->cart->get_shipping_total();
        $badge = sprintf(
            ' <span class="emp-gateway-badge emp-gateway-list-badge">%s %s</span>',
            wc_price( $list_total ),
            esc_html__( '(sin descuento abonando al contado)', 'empralidad' )
        );
        return $title . $badge;
    }
}

/**
 * Display informational discount savings row in Checkout review order
 */
add_action( 'woocommerce_review_order_after_order_total', 'emp_checkout_review_discount_note' );
function emp_checkout_review_discount_note() {
    if ( ! get_theme_mod( 'emp_wc_list_price_discount_enable', false ) ) {
        return;
    }
    if ( ! function_exists( 'WC' ) || ! WC()->cart ) {
        return;
    }

    $chosen_gateway = WC()->session->get( 'chosen_payment_method' );
    if ( empty( $chosen_gateway ) && ! empty( $_POST['payment_method'] ) ) {
        $chosen_gateway = wc_clean( wp_unslash( $_POST['payment_method'] ) );
    }
    if ( empty( $chosen_gateway ) ) {
        $available = WC()->payment_gateways()->get_available_payment_gateways();
        if ( ! empty( $available ) ) {
            $chosen_gateway = current( array_keys( $available ) );
        }
    }

    $discount = emp_get_cart_discount_amount( WC()->cart );

    if ( emp_is_discount_gateway( $chosen_gateway ) && $discount > 0 ) {
        echo '<tr class="emp-checkout-discount-notice"><td colspan="2"><span class="emp-discount-applied-val">✓ ' . sprintf( __( '¡Ahorrás %s abonando con este medio de pago!', 'empralidad' ), wc_price( $discount ) ) . '</span></td></tr>';
    }
}

/**
 * Append "(precio de lista)" to cart and checkout item prices
 */
add_filter( 'woocommerce_cart_item_subtotal', 'emp_filter_cart_item_subtotal_list_label', 25, 3 );
function emp_filter_cart_item_subtotal_list_label( $subtotal_html, $cart_item, $cart_item_key ) {
    if ( is_admin() && ! wp_doing_ajax() ) {
        return $subtotal_html;
    }
    if ( ! get_theme_mod( 'emp_wc_list_price_discount_enable', false ) ) {
        return $subtotal_html;
    }
    if ( strpos( $subtotal_html, 'precio de lista' ) !== false ) {
        return $subtotal_html;
    }

    $badge = ' <span class="emp-cart-item-list-price">(' . esc_html__( 'precio de lista', 'empralidad' ) . ')</span>';
    return $subtotal_html . $badge;
}

add_filter( 'woocommerce_cart_item_price', 'emp_filter_cart_item_price_list_label', 25, 3 );
function emp_filter_cart_item_price_list_label( $price_html, $cart_item, $cart_item_key ) {
    if ( is_admin() && ! wp_doing_ajax() ) {
        return $price_html;
    }
    if ( ! get_theme_mod( 'emp_wc_list_price_discount_enable', false ) ) {
        return $price_html;
    }
    if ( strpos( $price_html, 'precio de lista' ) !== false ) {
        return $price_html;
    }

    $badge = ' <span class="emp-cart-item-list-price">(' . esc_html__( 'precio de lista', 'empralidad' ) . ')</span>';
    return $price_html . $badge;
}

add_filter( 'woocommerce_order_formatted_line_subtotal', 'emp_filter_order_line_subtotal_list_label', 25, 3 );
function emp_filter_order_line_subtotal_list_label( $subtotal, $item, $order ) {
    if ( ! get_theme_mod( 'emp_wc_list_price_discount_enable', false ) ) {
        return $subtotal;
    }
    if ( strpos( $subtotal, 'precio de lista' ) !== false ) {
        return $subtotal;
    }

    $badge = ' <span class="emp-cart-item-list-price">(' . esc_html__( 'precio de lista', 'empralidad' ) . ')</span>';
    return $subtotal . $badge;
}

