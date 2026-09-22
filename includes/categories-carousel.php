<?php
/**
 * Categories Carousel Component
 *
 * Displays WooCommerce featured categories in a responsive carousel:
 * - Mobile: 3 columns per row, selectable 1 or 2 rows, touch swipe draggable.
 * - Desktop: 1 row with item width defined by emp_woocommerce_category_size, chevron navigation buttons.
 * - Autoplay with loop back to start.
 */

if ( ! class_exists( 'WooCommerce' ) ) {
    return;
}

$default_cat_id = (int) get_option( 'default_product_cat' );
$exclude_ids    = $default_cat_id ? array( $default_cat_id ) : array();

$categories = get_terms( array(
    'taxonomy'   => 'product_cat',
    'hide_empty' => true,
    'parent'     => 0,
    'exclude'    => $exclude_ids,
) );

// Fallback si no hay categorías con productos para que no quede invisible durante configuración
if ( empty( $categories ) || is_wp_error( $categories ) ) {
    $categories = get_terms( array(
        'taxonomy'   => 'product_cat',
        'hide_empty' => false,
        'parent'     => 0,
        'exclude'    => $exclude_ids,
    ) );
}

if ( empty( $categories ) || is_wp_error( $categories ) ) {
    return;
}

$categories_style = get_theme_mod( 'emp_woocommerce_categories_style', '1' );
$show_label       = get_theme_mod( 'emp_woocommerce_categories_label_show', true );

if ( $categories_style === '2' ) {
    ?>
    <div id="emp-categories-style-2" class="emp-categories-style-2" role="region" aria-label="<?php esc_attr_e( 'Categorías destacadas', 'empralidad' ); ?>">
      <div class="emp-categories-style-2-track">
        <?php foreach ( $categories as $cat ) {
            $thumbnail_id = get_term_meta( $cat->term_id, 'thumbnail_id', true );
            $image_url    = $thumbnail_id ? wp_get_attachment_image_url( $thumbnail_id, 'woocommerce_thumbnail' ) : ( function_exists( 'wc_placeholder_img_src' ) ? wc_placeholder_img_src() : '' );
            $link         = get_term_link( $cat, 'product_cat' );
            if ( is_wp_error( $link ) ) {
                $link = '#';
            }
        ?>
          <div class="emp-category-style-2-item product-category">
            <a href="<?php echo esc_url( $link ); ?>" draggable="false">
              <div class="emp-category-style-2-img-wrap">
                <?php if ( $image_url ) { ?>
                  <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $cat->name ); ?>" loading="lazy" draggable="false">
                <?php } ?>
              </div>
              <?php if ( $show_label ) { ?>
                <h2 class="emp-category-style-2-title woocommerce-loop-category__title">
                  <?php echo esc_html( $cat->name ); ?>
                </h2>
              <?php } ?>
            </a>
          </div>
        <?php } ?>
      </div>
    </div>
    <?php
} else {
    $mobile_rows     = get_theme_mod( 'emp_woocommerce_categories_mobile_rows', '2' );
    $items_per_slide = ( $mobile_rows === '1' ) ? 3 : 6;
    $slides          = array_chunk( $categories, $items_per_slide );
    $total_items     = count( $categories );
    ?>
    <div id="emp-categories-carousel" class="emp-categories-carousel emp-mobile-rows-<?php echo esc_attr( $mobile_rows ); ?>" data-mobile-rows="<?php echo esc_attr( $mobile_rows ); ?>" data-total="<?php echo esc_attr( $total_items ); ?>">
      <button type="button" id="emp-categories-prev" class="emp-categories-btn prev" aria-label="<?php esc_attr_e( 'Anterior', 'empralidad' ); ?>">
        <i class="fa fa-chevron-left" aria-hidden="true"></i>
      </button>

      <div class="emp-categories-viewport">
        <ul class="emp-categories-track">
          <?php foreach ( $slides as $slide_index => $slide_items ) { ?>
            <li class="emp-categories-slide" data-slide="<?php echo esc_attr( $slide_index ); ?>">
              <?php foreach ( $slide_items as $cat ) {
                $thumbnail_id = get_term_meta( $cat->term_id, 'thumbnail_id', true );
                $image_url    = $thumbnail_id ? wp_get_attachment_image_url( $thumbnail_id, 'woocommerce_thumbnail' ) : ( function_exists( 'wc_placeholder_img_src' ) ? wc_placeholder_img_src() : '' );
                $link         = get_term_link( $cat, 'product_cat' );
                if ( is_wp_error( $link ) ) {
                    $link = '#';
                }
              ?>
                <div class="emp-category-item product-category">
                  <a href="<?php echo esc_url( $link ); ?>">
                    <div class="emp-category-image-wrap">
                      <?php if ( $image_url ) { ?>
                        <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $cat->name ); ?>" loading="lazy">
                      <?php } ?>
                    </div>
                    <?php if ( $show_label ) { ?>
                      <h2 class="woocommerce-loop-category__title">
                        <?php echo esc_html( $cat->name ); ?>
                      </h2>
                    <?php } ?>
                  </a>
                </div>
              <?php } ?>
            </li>
          <?php } ?>
        </ul>
      </div>

      <button type="button" id="emp-categories-next" class="emp-categories-btn next" aria-label="<?php esc_attr_e( 'Siguiente', 'empralidad' ); ?>">
        <i class="fa fa-chevron-right" aria-hidden="true"></i>
      </button>
    </div>
    <?php
}
