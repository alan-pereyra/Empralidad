<?php
/**
 * WooCommerce Payment Methods List Price & Discount Display Component
 *
 * Implements:
 * - Dynamic list price calculation (base price + X%)
 * - Payment method title badge in checkout:
 *   - Discount gateways: "X% de descuento (ya aplicado)"
 *   - Non-discount gateways: "$11.500 (precio de lista sin descuento)"
 * - Cart fee for non-discount payment methods
 * - Order Received (Thank you) & Email summary with list price and discount details
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
 * Get base cart total (subtotal + shipping - discounts, without list price fee)
 */
function emp_get_cart_base_total() {
    if ( ! function_exists( 'WC' ) || ! WC()->cart ) {
        return 0;
    }
    $cart = WC()->cart;
    $base = (float) $cart->get_subtotal() + (float) $cart->get_shipping_total() - (float) $cart->get_discount_total();
    return ( $base > 0 ) ? $base : 0;
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
    $base_total = emp_get_cart_base_total();

    if ( emp_is_discount_gateway( $gateway_id ) ) {
        $badge = sprintf(
            ' <span class="emp-gateway-badge emp-gateway-discount-badge">%s%% de descuento (ya aplicado)</span>',
            esc_html( $percent )
        );
        return $title . $badge;
    } else {
        $increase = round( $base_total * ( $percent / 100 ), 2 );
        $list_price = $base_total + $increase;
        $badge = sprintf(
            ' <span class="emp-gateway-badge emp-gateway-list-badge">%s %s</span>',
            wc_price( $list_price ),
            esc_html__( '(precio de lista sin descuento)', 'empralidad' )
        );
        return $title . $badge;
    }
}

/**
 * Apply list price fee if a non-discount payment gateway is selected
 */
add_action( 'woocommerce_cart_calculate_fees', 'emp_calculate_list_price_fee', 25, 1 );
function emp_calculate_list_price_fee( $cart ) {
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

    // Determine chosen payment method
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

    // If chosen gateway does NOT qualify for discount, apply list price fee
    if ( $chosen_gateway && ! emp_is_discount_gateway( $chosen_gateway ) ) {
        $base_total = (float) $cart->get_subtotal() + (float) $cart->get_shipping_total() - (float) $cart->get_discount_total();
        if ( $base_total > 0 ) {
            $increase = round( $base_total * ( $percent / 100 ), 2 );
            if ( $increase > 0 ) {
                $cart->add_fee( __( 'Precio de lista (sin descuento)', 'empralidad' ), $increase, false );
            }
        }
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
    $percent = emp_get_list_price_discount_percent();
    $base_total = emp_get_cart_base_total();
    $increase = round( $base_total * ( $percent / 100 ), 2 );
    $list_price = $base_total + $increase;

    if ( emp_is_discount_gateway( $chosen_gateway ) ) {
        echo '<tr class="emp-checkout-discount-notice"><td colspan="2"><span class="emp-discount-applied-val">✓ ' . sprintf( __( 'Precio de lista: %s. ¡Ahorrás %s (%s%% OFF) abonando con este medio de pago!', 'empralidad' ), wc_price( $list_price ), wc_price( $increase ), esc_html( $percent ) ) . '</span></td></tr>';
    }
}

/**
 * Display list price and discount on Order Received (Thank You) page & emails
 */
add_filter( 'woocommerce_get_order_item_totals', 'emp_filter_order_item_totals_list_price', 25, 3 );
function emp_filter_order_item_totals_list_price( $total_rows, $order, $tax_display ) {
    if ( ! get_theme_mod( 'emp_wc_list_price_discount_enable', false ) ) {
        return $total_rows;
    }

    $payment_method = $order->get_payment_method();
    $percent = emp_get_list_price_discount_percent();

    if ( emp_is_discount_gateway( $payment_method ) ) {
        $order_total = (float) $order->get_total();
        $increase = round( $order_total * ( $percent / 100 ), 2 );
        $list_price = $order_total + $increase;

        $new_rows = array();
        foreach ( $total_rows as $key => $row ) {
            if ( $key === 'order_total' ) {
                $new_rows['emp_list_price'] = array(
                    'label' => __( 'Precio de lista real:', 'empralidad' ),
                    'value' => '<del class="emp-list-price-del">' . wc_price( $list_price ) . '</del>'
                );
                $new_rows['emp_discount_applied'] = array(
                    'label' => sprintf( __( 'Descuento (%s%%):', 'empralidad' ), $percent ),
                    'value' => '<span class="emp-discount-applied-val">-' . wc_price( $increase ) . ' ' . __( '(ya aplicado)', 'empralidad' ) . '</span>'
                );
                $row['label'] = __( 'Total abonado:', 'empralidad' );
            }
            $new_rows[ $key ] = $row;
        }
        return $new_rows;
    }

    return $total_rows;
}
