<?php
/**
 * WooCommerce Custom Empty Cart Component
 *
 * Implements custom empty cart view:
 * - Empty cart title text first
 * - Empty shopping cart icon underneath
 * - Separator dots
 * - Selectable Category or Tag products from Customizer
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function emp_get_cart_empty_html() {
    $show_products  = get_theme_mod( 'emp_woocommerce_cart_empty_show_products', true );
    $empty_title    = get_theme_mod( 'emp_woocommerce_cart_empty_title', __( '¡Tu carrito está actualmente vacío!', 'empralidad' ) );
    $products_title = get_theme_mod( 'emp_woocommerce_cart_empty_products_title', '' );
    $filter_type    = get_theme_mod( 'emp_woocommerce_cart_empty_filter_type', 'category' );
    $category_slug  = get_theme_mod( 'emp_woocommerce_cart_empty_category', '' );
    $tag_slug       = get_theme_mod( 'emp_woocommerce_cart_empty_tag', '' );
    $limit          = (int) get_theme_mod( 'emp_woocommerce_cart_empty_limit', 4 );

    if ( $limit < 1 ) {
        $limit = 4;
    }

    if ( empty( $empty_title ) ) {
        $empty_title = __( '¡Tu carrito está actualmente vacío!', 'empralidad' );
    }

    // Determine section heading
    $section_heading = '';
    if ( ! empty( $products_title ) ) {
        $section_heading = $products_title;
    } elseif ( $filter_type === 'featured' ) {
        $section_heading = __( 'Productos destacados', 'empralidad' );
    } elseif ( $filter_type === 'tag' && ! empty( $tag_slug ) ) {
        $term = get_term_by( 'slug', $tag_slug, 'product_tag' );
        $section_heading = ( $term && ! is_wp_error( $term ) ) ? $term->name : __( 'Productos recomendados', 'empralidad' );
    } elseif ( $filter_type === 'category' && ! empty( $category_slug ) ) {
        $term = get_term_by( 'slug', $category_slug, 'product_cat' );
        $section_heading = ( $term && ! is_wp_error( $term ) ) ? $term->name : __( 'Productos recomendados', 'empralidad' );
    } else {
        $section_heading = __( 'Nuevo en la tienda', 'empralidad' );
    }

    // Generate products HTML
    $products_html = '';
    if ( $show_products && class_exists( 'WooCommerce' ) ) {
        if ( $filter_type === 'featured' ) {
            $products_html = do_shortcode( sprintf( '[products visibility="featured" limit="%d" columns="4"]', $limit ) );
        } elseif ( $filter_type === 'tag' && ! empty( $tag_slug ) ) {
            $products_html = do_shortcode( sprintf( '[products tag="%s" limit="%d" columns="4"]', esc_attr( $tag_slug ), $limit ) );
        } elseif ( $filter_type === 'category' && ! empty( $category_slug ) ) {
            $products_html = do_shortcode( sprintf( '[products category="%s" limit="%d" columns="4"]', esc_attr( $category_slug ), $limit ) );
        } else {
            $products_html = do_shortcode( sprintf( '[products orderby="date" order="DESC" limit="%d" columns="4"]', $limit ) );
        }

        // Fallback to recent products if the category or tag returned no products
        if ( empty( trim( strip_tags( $products_html ) ) ) ) {
            $products_html = do_shortcode( sprintf( '[products orderby="date" order="DESC" limit="%d" columns="4"]', $limit ) );
        }
    }

    ob_start();
    ?>
    <div data-block-name="woocommerce/empty-cart-block" class="wp-block-woocommerce-empty-cart-block emp-cart-empty-block">
        <h2 class="wp-block-heading has-text-align-center with-empty-cart-icon wc-block-cart__empty-cart__title emp-cart-empty-title">
            <?php echo esc_html( $empty_title ); ?>
        </h2>

        <div class="emp-cart-empty-icon" aria-hidden="true">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" fill="currentColor">
                <path d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.8-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm288 48a48 48 0 1 1 0-96 48 48 0 1 1 0 96z"/>
            </svg>
        </div>

        <hr class="wp-block-separator has-alpha-channel-opacity is-style-dots"/>

        <?php if ( $show_products && ! empty( $products_html ) ) { ?>
            <h2 class="wp-block-heading has-text-align-center emp-cart-products-title">
                <?php echo esc_html( $section_heading ); ?>
            </h2>
            <div class="emp-cart-products-container">
                <?php echo $products_html; ?>
            </div>
        <?php } ?>
    </div>
    <?php
    return ob_get_clean();
}

/**
 * Filter Gutenberg empty-cart-block rendering
 */
function emp_filter_empty_cart_block( $block_content, $block ) {
    if ( ! empty( $block['blockName'] ) && $block['blockName'] === 'woocommerce/empty-cart-block' ) {
        return emp_get_cart_empty_html();
    }
    return $block_content;
}
add_filter( 'render_block', 'emp_filter_empty_cart_block', 10, 2 );
