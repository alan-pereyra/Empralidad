<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

$id = $product ? $product->get_id() : get_the_ID();
$icon_url = esc_url( get_template_directory_uri() ).'/includes/icons/';

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<li <?php wc_product_class( 'emp-product-card', $product ); ?>>
	<?php
	/**
	 * Hook: woocommerce_before_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
	do_action( 'woocommerce_before_shop_loop_item' );

	/**
	 * Hook: woocommerce_before_shop_loop_item_title.
	 *
	 * @hooked woocommerce_show_product_loop_sale_flash - 10
	 * @hooked woocommerce_template_loop_product_thumbnail - 10
	 */
	do_action( 'woocommerce_before_shop_loop_item_title' );

	/**
	 * Hook: woocommerce_shop_loop_item_title.
	 *
	 * @hooked woocommerce_template_loop_product_title - 10
	 */
	do_action( 'woocommerce_shop_loop_item_title' );

	/**
	 * Close product link right after title so the action button below isn't nested inside <a>
	 */
	woocommerce_template_loop_product_link_close();
	?>

	<?php
    // Add custom field (PC Gaming icons loop)
    $has_cpu = get_post_meta($id, '_custom_product_component_field_cpu', true);
    if( $has_cpu ){
        echo '<div class="woocommerce-custom-field-pc-gaming-loop d-flex">';
        if($has_cpu){
            echo '<div class="wrap"><img src="'.$icon_url.'cpu.svg" />'.esc_html($has_cpu).'</div>';
        }
        if($mother = get_post_meta($id, '_custom_product_component_field_mother', true)){
            echo '<div class="wrap"><img src="'.$icon_url.'mother.svg" />'.esc_html($mother).'</div>';
        }
        if($gpu = get_post_meta($id, '_custom_product_component_field_gpu', true)){
            echo '<div class="wrap"><img src="'.$icon_url.'gpu.svg" />'.esc_html($gpu).'</div>';
        }
        if($ram = get_post_meta($id, '_custom_product_component_field_ram', true)){
            echo '<div class="wrap"><img src="'.$icon_url.'ram.svg" />'.esc_html($ram).'</div>';
        }
        if($ssd = get_post_meta($id, '_custom_product_component_field_ssd_hdd', true)){
            echo '<div class="wrap"><img src="'.$icon_url.'ssd.svg" />'.esc_html($ssd).'</div>';
        }
        if($psu = get_post_meta($id, '_custom_product_component_field_power_supply', true)){
            echo '<div class="wrap"><img src="'.$icon_url.'power_supply.svg" />'.esc_html($psu).'</div>';
        }
        if($chassis = get_post_meta($id, '_custom_product_component_field_chassis', true)){
            echo '<div class="wrap"><img src="'.$icon_url.'chassis.svg" />'.esc_html($chassis).'</div>';
        }
        if($display = get_post_meta($id, '_custom_product_component_field_display', true)){
            echo '<div class="wrap"><img src="'.$icon_url.'display.svg" />'.esc_html($display).'</div>';
        }
        echo '</div>';
    }
    ?>

	<div class="emp-product-bottom-row">
		<div class="emp-product-bottom-spacer" aria-hidden="true"></div>
		<div class="emp-product-price-centered">
			<?php woocommerce_template_loop_price(); ?>
		</div>
		<div class="emp-product-action-right">
			<?php woocommerce_template_loop_add_to_cart(); ?>
		</div>
	</div>
</li>