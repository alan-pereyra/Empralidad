<!doctype html>
<html <?php language_attributes(); ?>>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, shrink-to-fit=no">
    <!-- PWA -->
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="theme-color" content="<?php echo esc_attr( get_theme_mod('emp_components_head_title_background') ); ?>">
    <link rel="apple-touch-icon" href="<?php echo esc_url( get_site_icon_url() ); ?>">

    <?php
    wp_head();
    echo get_theme_mod('emp_analytics_facebook_script');
    echo get_theme_mod('emp_analytics_google_script');
    ?>
  </head>
  <body <?php body_class(); ?> >
    <div id="top_content"></div>
    <?php $global_notice = get_theme_mod('emp_components_notice_show');
    if ($global_notice){
      $notice_items = array();
      for ($i = 1; $i <= 4; $i++) {
        $item_icon = get_theme_mod('emp_components_notice_icon_' . $i, '');
        $item_text = get_theme_mod('emp_components_notice_text_' . $i, '');
        if (!empty($item_icon) || !empty($item_text)) {
          $notice_items[] = array('icon' => $item_icon, 'text' => $item_text);
        }
      }
      $legacy_notice_text = get_theme_mod('emp_components_notice_text');
      $notice_has_neon = get_theme_mod('emp_components_notice_neon', true);
      $notice_neon_class = (!empty($notice_has_neon) && $notice_has_neon !== '0' && $notice_has_neon !== 0) ? 'has-neon' : '';
      if (!empty($notice_items) || !empty($legacy_notice_text)){ ?>
        <div id="top-notice" class="show-from-md <?php echo esc_attr($notice_neon_class); ?>">
          <?php if (!empty($notice_items)) { ?>
            <div class="emp-top-notice-wrapper">
              <?php foreach ($notice_items as $item) { ?>
                <span class="emp-top-notice-item">
                  <?php if (!empty($item['icon'])) { ?>
                    <i class="<?php echo esc_attr($item['icon']); ?> emp-top-notice-icon"></i>
                  <?php } ?>
                  <?php if (!empty($item['text'])) { ?>
                    <span class="emp-top-notice-text"><?php echo esc_html($item['text']); ?></span>
                  <?php } ?>
                </span>
              <?php } ?>
            </div>
          <?php } else {
            echo wp_kses_post($legacy_notice_text);
          } ?>
        </div>
      <?php }
    }?>

    <?php
    $nav_has_neon = get_theme_mod('emp_components_nav_neon', true);
    $nav_neon_class = (!empty($nav_has_neon) && $nav_has_neon !== '0' && $nav_has_neon !== 0) ? 'has-neon' : '';
    $cart_link = get_theme_mod('emp_components_nav_cart');
    $has_product_search = (class_exists('WooCommerce') && $cart_link);
    ?>
    <!-- navbar -->
      <div id="navbar-background" class="sticky-top empFadeInBottom <?php echo esc_attr($nav_neon_class); ?> <?php if( is_admin_bar_showing() ){ ?> admin-fixed-top <?php } ?> <?php if (get_theme_mod('emp_slider_image1')||get_theme_mod('emp_slider_image2')||get_theme_mod('emp_slider_image3')||get_theme_mod('emp_slider_desktop_image1')||get_theme_mod('emp_slider_desktop_image2')||get_theme_mod('emp_slider_desktop_image3')) { ?>hover<?php }?>" style="z-index:1032;">
        <nav class="navbar navbar-expand-lg py-0 mw-1200px <?php if ($has_product_search) { ?>has-mobile-search<?php } ?>">
          <div class="bg-navbar-top <?php if( is_admin_bar_showing() ){ ?> admin-bar-show <?php } ?>">
              <i id="btn-menu-nav" class="fa fa-bars text-dark <?php if( is_admin_bar_showing() ){ ?> admin-bar-show <?php } ?>" onclick="openMobileMenu()"></i>
          </div>
          <!-- if logo -->
          <?php $logo_navbar = get_theme_mod('emp_components_nav_logo');
          if ($logo_navbar) {
            $home_url =  get_theme_mod('emp_components_nav_home');
            if ($home_url == ''){
              $home_url = home_url();
            }
            ?>
            <a class="navbar-brand <?php if (!$has_product_search) { ?>mx-auto<?php } ?>" href="<?php echo esc_url( $home_url ); ?>">
            	<img src="<?php echo esc_url( wp_get_attachment_url(get_theme_mod('emp_components_nav_logo')) ); ?>" class="navbar-img" alt="NavbarBrand">
            </a>
          <?php } else { ?>
            <a class="<?php if (!$has_product_search) { ?>mx-auto<?php } ?>" href="<?php echo esc_url( home_url() ); ?>">
              <h2 class="p-3 color-personalized"><?php bloginfo(); ?></h2>
            </a>
          <?php } ?>
	        <!-- end if logo -->
          <?php if ($has_product_search) { ?>
            <form role="search" method="get" class="emp-header-search-form" action="<?php echo esc_url(home_url('/')); ?>">
              <input type="search" class="emp-header-search-input" name="s" placeholder="<?php esc_attr_e('Buscar Productos...', 'empralidad'); ?>" value="<?php echo get_search_query(); ?>" autocomplete="off" />
              <input type="hidden" name="post_type" value="product" />
            </form>
          <?php } ?>
          <?php $search_link = get_theme_mod('emp_components_nav_search');
          $search_icon = '';
          if ($search_link){
             $search_icon = '<div class="collapse d-inline ml-auto show-from-md" id="btn-search-desktop">
                               <a id="searchform-close" class="fa ml-auto fa-search mx-auto" onclick="showSearchBackground();"></a>
                             </div>';
             $ul_class = '';
          } else {
            $ul_class = 'ml-auto';
            $search_icon = '';
          }

        	$facebook_link  = get_theme_mod('emp_components_footer_face');
          $twitter_link   = get_theme_mod('emp_components_footer_tw');
          $instagram_link = get_theme_mod('emp_components_footer_insta');
          $youtube_link   = get_theme_mod('emp_components_footer_yt');
          $tiktok_link    = get_theme_mod('emp_components_footer_tiktok');

          $social_icon = '';

          if ($instagram_link){
            $social_icon .= '<a href="'.esc_url( $instagram_link ).'" class="fab fa-instagram m-auto"></a>';
          }
          if ($tiktok_link){
            $social_icon .= '<a href="'.esc_url( $tiktok_link ).'" class="fab fa-tiktok m-auto"></a>';
          }
          if ($youtube_link){
            $social_icon .= '<a href="'.esc_url( $youtube_link ).'" class="fab fa-youtube m-auto"></a>';
          }
          if ($facebook_link){
            $social_icon .= '<a href="'.esc_url( $facebook_link ).'" class="fab fa-facebook-f m-auto"></a>';
          }
          if ($twitter_link){
            $social_icon .= '<a href="'.esc_url( $twitter_link ).'" class="fab fa-twitter m-auto"></a>';
          }

          $social_icon_div = '<div class="d-flex mt-5 mt-md-0 w-mobile-75 show-mobile">'.$social_icon.'</div>';

          wp_nav_menu(array(
            'theme_location' => 'superior',
            'container'      => 'div',
            'container_class'=> 'navbar-collapse',
            'container_id'   => 'navbarContentMenu',
            'items_wrap'     => '<div id="navbarContentMenuDiv" class="ml-auto">'.$search_icon .'<ul class="navbar-nav nav text-center mobile-menu-items d-flex '.$ul_class.'"">%3$s'.$social_icon_div.'</ul></div>',
            'menu_class'     => 'nav-item',
            'walker'         => new Walker_Nav_Primary()
          ) ); ?>

          <!-- if cart on -->
          <?php $cart_link = get_theme_mod('emp_components_nav_cart');
          if(class_exists('WooCommerce') && $cart_link){ 
            $cart_count = WC()->cart ? WC()->cart->get_cart_contents_count() : 0;
          ?>
            <a onclick="showWoocommerceCart();" class="fa fa-shopping-cart mr-4 fadein show-desktop position-relative <?php if ($cart_count > 0) { ?> has-items <?php } ?>">
              <small class="woo-counter-cart-number-desktop icon-color <?php if ($cart_count <= 0) { ?> d-none <?php } ?>">
                <div id="mini-cart-count" class="emp-mini-cart-count"><?php echo $cart_count; ?></div>
              </small>
            </a>
          <?php } ?>
        </nav>
      </div>
      <i id="bg-menu-mobile"></i>
    <!-- end navbar -->
    <?php $video_bg_url = wp_get_attachment_url(get_theme_mod('emp_components_head_video')); ?>
    <div class="FullScreenLanding emp_img_slide1 col-12 mx-auto bg-personalized">
      <div id="emp-background-image" class="emp-background-image1 emp-background-media-opacity">
        <?php if ($video_bg_url){ ?>
          <video autoplay muted loop src="<?php echo esc_url( $video_bg_url ); ?>" poster="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" class="emp-video-background">
          </video>
        <?php } ?>
      </div>
    </div>
