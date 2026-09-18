<?php
/**
 * Banners secundarios homepage
 * Dos banners interactivos con soporte responsive para PC y Móvil
 */

$show_secondary_banners = get_theme_mod('emp_secondary_banners_show');

if ( $show_secondary_banners ) {
  $banner_desktop_1 = get_theme_mod('emp_secondary_banner_desktop_1');
  $banner_mobile_1  = get_theme_mod('emp_secondary_banner_mobile_1');
  $banner_link_1    = get_theme_mod('emp_secondary_banner_link_1');

  $banner_desktop_2 = get_theme_mod('emp_secondary_banner_desktop_2');
  $banner_mobile_2  = get_theme_mod('emp_secondary_banner_mobile_2');
  $banner_link_2    = get_theme_mod('emp_secondary_banner_link_2');

  $url_desktop_1 = $banner_desktop_1 ? wp_get_attachment_url($banner_desktop_1) : '';
  $url_mobile_1  = $banner_mobile_1  ? wp_get_attachment_url($banner_mobile_1)  : '';

  $url_desktop_2 = $banner_desktop_2 ? wp_get_attachment_url($banner_desktop_2) : '';
  $url_mobile_2  = $banner_mobile_2  ? wp_get_attachment_url($banner_mobile_2)  : '';

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
                <?php if ( !empty($url_mobile_1) ) { ?>
                  <source media="(max-width: 768px)" srcset="<?php echo esc_url($url_mobile_1); ?>">
                <?php } ?>
                <img src="<?php echo esc_url(!empty($url_desktop_1) ? $url_desktop_1 : $url_mobile_1); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?> - Banner 1" class="emp-secondary-banner-img" loading="lazy">
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
                <?php if ( !empty($url_mobile_2) ) { ?>
                  <source media="(max-width: 768px)" srcset="<?php echo esc_url($url_mobile_2); ?>">
                <?php } ?>
                <img src="<?php echo esc_url(!empty($url_desktop_2) ? $url_desktop_2 : $url_mobile_2); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?> - Banner 2" class="emp-secondary-banner-img" loading="lazy">
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
