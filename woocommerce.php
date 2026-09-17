<?php
$highest_price = 0;
$lowest_price  = 0;

if ( class_exists( 'WooCommerce' ) ) {
  global $wpdb;
  $price_range = $wpdb->get_row( "
    SELECT 
      MIN(CAST(meta_value AS DECIMAL(10,2))) as min_price, 
      MAX(CAST(meta_value AS DECIMAL(10,2))) as max_price 
    FROM {$wpdb->postmeta} pm
    INNER JOIN {$wpdb->posts} p ON p.ID = pm.post_id
    WHERE pm.meta_key = '_price' 
      AND pm.meta_value > ''
      AND p.post_status = 'publish' 
      AND p.post_type = 'product'
  " );

  if ( $price_range ) {
    $lowest_price  = ! empty( $price_range->min_price ) ? floor( (float) $price_range->min_price ) : 0;
    $highest_price = ! empty( $price_range->max_price ) ? ceil( (float) $price_range->max_price ) : 0;
  }
}
?>

<?php get_header(); ?>
<article class="content-background content-color woo-page-margin" style="">
  <?php echo do_shortcode('[yith_wcan_filters slug="default-preset"]');?>
  <div class="sidebar">
    <?php woocommerce_breadcrumb(); ?>
    <?php woocommerce_catalog_ordering(); ?>
    <button id="emp-button-woo-filters">Filtros</button>
    <div id="emp-woo-filter-area">
      <i id="emp-woo-filter-area-close-btn" class="fa fa-times show-mobile"></i>
      <div class="">
        <p class="px-0 pb-0">Filtrar por nombre</p>
        <form id="emp-woo-search" role="search" method="get" class="woocommerce-product-search mb-3 md-mb-0">
          <label class="screen-reader-text" for="s"><?php _e( 'Buscar por nombre:', 'woocommerce' ); ?></label>
          <input id="emp-woo-search-text" type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Buscar Productos&hellip;', 'placeholder', 'woocommerce' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Buscar por nombre:', 'label', 'woocommerce' ); ?>" />
          <button class="color-personalized bg-personalized" type="submit">
            <i class="fa fa-search" aria-hidden="true"></i>
          </button>
          <input type="hidden" name="post_type" value="product" />
        </form>
        <p class="px-0 pb-0">Precio máximo</p>
        <small id="emp-small-price-desktop"><?php echo $highest_price; ?></small>
        <input id="emp-range-price-desktop" class="emp-range-price mb-3" type="range" min="<?php echo $lowest_price; ?>" max="<?php echo $highest_price; ?>" step="1" onchange="empGetRangeUrl(this.value)">
        <button id="emp-delete-woo-product-filter-desktop" class="btn w-100"  onclick="empDeleteFilters()">
          Borrar Filtros
        </button>
      </div>
    </div>
  </div>
  <div class="content">
    <?php woocommerce_content();?>
  </div>
</article>
<?php get_footer(); ?>
