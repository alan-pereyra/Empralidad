<?php
/**
 * Banners secundarios homepage
 * Dos banners interactivos con soporte responsive para PC y Móvil y entrega WebP optimizada
 */

$show_secondary_banners = get_theme_mod('emp_secondary_banners_show');

if ( $show_secondary_banners ) {
  $banner_desktop_1 = get_theme_mod('emp_secondary_banner_desktop_1');
  $banner_mobile_1  = get_theme_mod('emp_secondary_banner_mobile_1');
  $banner_link_1    = get_theme_mod('emp_secondary_banner_link_1');

  $banner_desktop_2 = get_theme_mod('emp_secondary_banner_desktop_2');
  $banner_mobile_2  = get_theme_mod('emp_secondary_banner_mobile_2');
  $banner_link_2    = get_theme_mod('emp_secondary_banner_link_2');

  $url_desktop_1 = $banner_desktop_1 ? (is_numeric($banner_desktop_1) ? wp_get_attachment_url($banner_desktop_1) : $banner_desktop_1) : '';
  $url_mobile_1  = $banner_mobile_1  ? (is_numeric($banner_mobile_1)  ? wp_get_attachment_url($banner_mobile_1)  : $banner_mobile_1)  : '';

  $url_desktop_2 = $banner_desktop_2 ? (is_numeric($banner_desktop_2) ? wp_get_attachment_url($banner_desktop_2) : $banner_desktop_2) : '';
  $url_mobile_2  = $banner_mobile_2  ? (is_numeric($banner_mobile_2)  ? wp_get_attachment_url($banner_mobile_2)  : $banner_mobile_2)  : '';

  // Optimized WebP URLs (max 750px width for mobile banners, full for desktop)
  $webp_desktop_1 = function_exists('emp_get_webp_url') ? emp_get_webp_url($url_desktop_1) : '';
  $webp_mobile_1  = function_exists('emp_get_webp_url') ? emp_get_webp_url($url_mobile_1, 80, 750) : '';

  $webp_desktop_2 = function_exists('emp_get_webp_url') ? emp_get_webp_url($url_desktop_2) : '';
  $webp_mobile_2  = function_exists('emp_get_webp_url') ? emp_get_webp_url($url_mobile_2, 80, 750) : '';

  // Get image dimensions for Core Web Vitals (prevents CLS)
  $meta_d1 = is_numeric($banner_desktop_1) ? wp_get_attachment_metadata($banner_desktop_1) : false;
  $meta_m1 = is_numeric($banner_mobile_1)  ? wp_get_attachment_metadata($banner_mobile_1)  : false;
  $meta_d2 = is_numeric($banner_desktop_2) ? wp_get_attachment_metadata($banner_desktop_2) : false;
  $meta_m2 = is_numeric($banner_mobile_2)  ? wp_get_attachment_metadata($banner_mobile_2)  : false;

  $w1 = !empty($meta_d1['width']) ? $meta_d1['width'] : (!empty($meta_m1['width']) ? $meta_m1['width'] : '');
  $h1 = !empty($meta_d1['height']) ? $meta_d1['height'] : (!empty($meta_m1['height']) ? $meta_m1['height'] : '');

  $w2 = !empty($meta_d2['width']) ? $meta_d2['width'] : (!empty($meta_m2['width']) ? $meta_m2['width'] : '');
  $h2 = !empty($meta_d2['height']) ? $meta_d2['height'] : (!empty($meta_m2['height']) ? $meta_m2['height'] : '');

  $has_banner_1 = !empty($url_desktop_1) || !empty($url_mobile_1);
  $has_banner_2 = !empty($url_desktop_2) || !empty($url_mobile_2);

  if ( $has_banner_1 || $has_banner_2 ) { ?>
    <section class="emp-secondary-banners-container">
      <div class="emp-secondary-banners-wrapper">
        <?php if ( $has_banner_1 ) { ?>
          <div class="emp-secondary-banner-item">
            <?php if ( !empty($banner_link_1) ) { ?>
              <a href="<?php echo esc_url($banner_link_1); ?>">
            <?php } ?>
              <picture>
                <?php if ( !empty($webp_mobile_1) ) { ?>
                  <source type="image/webp" media="(max-width: 768px)" srcset="<?php echo esc_url($webp_mobile_1); ?>">
                <?php } ?>
                <?php if ( !empty($url_mobile_1) ) { ?>
                  <source media="(max-width: 768px)" srcset="<?php echo esc_url($url_mobile_1); ?>">
                <?php } ?>
                <?php if ( !empty($webp_desktop_1) ) { ?>
                  <source type="image/webp" srcset="<?php echo esc_url($webp_desktop_1); ?>">
                <?php } ?>
                <img src="<?php echo esc_url(!empty($url_desktop_1) ? $url_desktop_1 : $url_mobile_1); ?>" 
                     alt="<?php echo esc_attr(get_bloginfo('name')); ?> - Banner 1" 
                     class="emp-secondary-banner-img" 
                     loading="lazy" 
                     decoding="async"
                     <?php if(!empty($w1) && !empty($h1)){ echo 'width="' . esc_attr($w1) . '" height="' . esc_attr($h1) . '"'; } ?>>
              </picture>
            <?php if ( !empty($banner_link_1) ) { ?>
              </a>
            <?php } ?>
          </div>
        <?php } ?>

        <?php if ( $has_banner_2 ) { ?>
          <div class="emp-secondary-banner-item">
            <?php if ( !empty($banner_link_2) ) { ?>
              <a href="<?php echo esc_url($banner_link_2); ?>">
            <?php } ?>
              <picture>
                <?php if ( !empty($webp_mobile_2) ) { ?>
                  <source type="image/webp" media="(max-width: 768px)" srcset="<?php echo esc_url($webp_mobile_2); ?>">
                <?php } ?>
                <?php if ( !empty($url_mobile_2) ) { ?>
                  <source media="(max-width: 768px)" srcset="<?php echo esc_url($url_mobile_2); ?>">
                <?php } ?>
                <?php if ( !empty($webp_desktop_2) ) { ?>
                  <source type="image/webp" srcset="<?php echo esc_url($webp_desktop_2); ?>">
                <?php } ?>
                <img src="<?php echo esc_url(!empty($url_desktop_2) ? $url_desktop_2 : $url_mobile_2); ?>" 
                     alt="<?php echo esc_attr(get_bloginfo('name')); ?> - Banner 2" 
                     class="emp-secondary-banner-img" 
                     loading="lazy" 
                     decoding="async"
                     <?php if(!empty($w2) && !empty($h2)){ echo 'width="' . esc_attr($w2) . '" height="' . esc_attr($h2) . '"'; } ?>>
              </picture>
            <?php if ( !empty($banner_link_2) ) { ?>
              </a>
            <?php } ?>
          </div>
        <?php } ?>
      </div>
    </section>
  <?php }
}
?>
