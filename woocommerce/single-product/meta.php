<?php
/**
 * Single Product Meta
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/meta.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;
?>
<?php
$emp_show_notice = get_theme_mod('emp_woocommerce_whatsapp_show');
if($emp_show_notice){ ?>
  <a href="https://api.whatsapp.com/send?phone=<?php echo get_theme_mod('emp_components_nav_wsp_numb'); ?>&text=Hola,%20quiero%20consultar%20si%20hay%20stock%20de%20*<?php echo str_replace(' ', '%20', wp_get_document_title());?>*%20%20%20%20<?php echo get_permalink(); ?>" class="button btn-wsp text-center container">Consultar por whastapp</a> <br>
  <p class="text-secondary text-center small">(Podrás consultar disponibilidad con un representante calificado)</p>
<?php } ?>
<div class="product_meta">

	<?php do_action( 'woocommerce_product_meta_start' ); ?>

	<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>

		<span class="sku_wrapper"><?php esc_html_e( 'SKU:', 'woocommerce' ); ?> <span class="sku"><?php echo ( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'woocommerce' ); ?></span></span>

	<?php endif; ?>

	<?php echo wc_get_product_category_list( $product->get_id(), '', '<span class="posted_in">', '</span>' ); ?>

	<?php echo wc_get_product_tag_list( $product->get_id(), '', '<span class="tagged_as">', '</span>' ); ?>

	<?php do_action( 'woocommerce_product_meta_end' ); ?>

</div>
