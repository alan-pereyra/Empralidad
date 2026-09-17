<?php
/**
 * Description tab
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/description.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.0.0
 */

defined( 'ABSPATH' ) || exit;

global $post, $product;

$id = $product ? $product->get_id() : get_the_ID();
$icon_url = esc_url( get_template_directory_uri() ).'/includes/icons/';

$heading = apply_filters( 'woocommerce_product_description_heading', __( 'Description', 'woocommerce' ) );

?>

<?php if ( $heading ) : ?>
	
<?php endif; ?>

<?php the_content(); ?>

<!-- Custom fields -->
<?php
$gpu_val = get_post_meta($id, '_custom_product_component_field_gpu', true);
if($gpu_val){
    $gpu_brand = get_post_meta($id, '_custom_product_component_field_gpu_brand', true);
    $class_gpu = '';
    if($gpu_brand == 1 || $gpu_brand === 'Nvidia'){
        $class_gpu = 'nvidia';
    }else if($gpu_brand == 2 || $gpu_brand === 'AMD'){
        $class_gpu = 'amd';
    }
    echo '<p class="gpu '.esc_attr($class_gpu).'">'.esc_html($gpu_val).'</p>';
}
?>

<div id="woocommerce-custom-field-pc-gaming">
    <?php
        
        if(get_post_meta($id, '_custom_product_component_field_cpu', true)){
            echo '<div class="wrap">
                    <img src="'.$icon_url.'cpu.svg" />';
            echo    get_post_meta($id, '_custom_product_component_field_cpu', true);
            echo '</div>';
        }
        if(get_post_meta($id, '_custom_product_component_field_mother', true)){
            echo '<div class="wrap">
                    <img src="'.$icon_url.'mother.svg" />';
            echo    get_post_meta($id, '_custom_product_component_field_mother', true);
            echo '</div>';
        }
        if(get_post_meta($id, '_custom_product_component_field_ram', true)){
            echo '<div class="wrap">
                    <img src="'.$icon_url.'ram.svg" />';
            echo    get_post_meta($id, '_custom_product_component_field_ram', true);
            echo '</div>';
        }
        if(get_post_meta($id, '_custom_product_component_field_ssd_hdd', true)){
            echo '<div class="wrap">
                    <img src="'.$icon_url.'ssd.svg" />';
            echo    get_post_meta($id, '_custom_product_component_field_ssd_hdd', true);
            echo '</div>';
        }
        if(get_post_meta($id, '_custom_product_component_field_power_supply', true)){
            echo '<div class="wrap">
                    <img src="'.$icon_url.'power_supply.svg" />';
            echo    esc_html(get_post_meta($id, '_custom_product_component_field_power_supply', true));
            echo '</div>';
        }
        if(get_post_meta($id, '_custom_product_component_field_chassis', true)){
            echo '<div class="wrap">
                    <img src="'.$icon_url.'chassis.svg" />';
            echo    esc_html(get_post_meta($id, '_custom_product_component_field_chassis', true));
            echo '</div>';
        }
        if(get_post_meta($id, '_custom_product_component_field_display', true)){
            echo '<div class="wrap">
                    <img src="'.$icon_url.'display.svg" />';
            echo    esc_html(get_post_meta($id, '_custom_product_component_field_display', true));
            echo '</div>';
        }
    ?>
</div>

<!-- Benchmarks Section -->
<?php
$benchmarks = array();
for ( $i = 1; $i <= 5; $i++ ) {
    $game_quality = get_post_meta( $id, '_custom_benchmark_quality_' . $i, true );
    $fps_val      = get_post_meta( $id, '_custom_benchmark_fps_' . $i, true );
    if ( ! empty( $game_quality ) || ! empty( $fps_val ) ) {
        $clean_fps = (int) preg_replace( '/[^0-9]/', '', (string) $fps_val );
        $benchmarks[] = array(
            'game'    => $game_quality,
            'fps'     => $clean_fps > 0 ? $clean_fps : (int) $fps_val,
            'raw_fps' => $fps_val,
        );
    }
}

if ( ! empty( $benchmarks ) ) : ?>
    <div id="woocommerce-custom-field-benchmarks" class="emp-benchmarks-wrapper">
        <h4 class="emp-benchmarks-heading">
            <i class="fa fa-gamepad mr-2"></i> <?php esc_html_e( 'Rendimiento en Juegos (FPS)', 'empralidad' ); ?>
        </h4>
        <div class="emp-benchmarks-grid">
            <?php foreach ( $benchmarks as $item ) : 
                $fps = $item['fps'];
                // Escala de referencia: 144 FPS = 100% (mínimo 12% para visualización)
                $bar_pct = min( 100, max( 12, round( ( $fps / 144 ) * 100 ) ) );
                
                // Clasificación de rendimiento
                $tier_class = 'emp-fps-playable';
                if ( $fps >= 120 ) {
                    $tier_class = 'emp-fps-ultra';
                } elseif ( $fps >= 60 ) {
                    $tier_class = 'emp-fps-smooth';
                }
            ?>
                <div class="emp-benchmark-item <?php echo esc_attr( $tier_class ); ?>">
                    <div class="emp-benchmark-info">
                        <span class="emp-benchmark-game"><?php echo esc_html( $item['game'] ); ?></span>
                        <span class="emp-benchmark-fps-badge"><?php echo esc_html( $item['raw_fps'] ); ?> FPS</span>
                    </div>
                    <div class="emp-benchmark-bar-track">
                        <div class="emp-benchmark-bar-fill" style="width: <?php echo esc_attr( $bar_pct ); ?>%;"></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>