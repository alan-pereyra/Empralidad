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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <?php
    $emp_slider_skeleton = get_theme_mod('emp_slider_skeleton_preload', true);
    $emp_skeleton_active = (!empty($emp_slider_skeleton) && $emp_slider_skeleton !== '0' && $emp_slider_skeleton !== 0);

    if ((is_front_page() || is_home()) && $emp_skeleton_active) { ?>
      <style id="emp-critical-layout-css">
        *, *::before, *::after {
          box-sizing: border-box;
        }
        html, body {
          margin: 0;
          padding: 0;
        }
        #navbar-background {
          background-color: var(--emp-nav-bg, #22372b);
          min-height: 50px;
          position: sticky;
          top: 0;
          width: 100%;
          z-index: 1032;
        }
        .navbar-img {
          height: 50px !important;
          max-width: 192px !important;
          object-fit: contain;
        }
        #emp-sliders {
          margin: auto;
          max-height: 822px;
          max-width: 1200px;
          overflow: hidden;
          position: relative;
          width: 100%;
        }
        @media (max-width: 768px) {
          #emp-sliders {
            max-height: none;
          }
        }
        #emp-sliders ul {
          display: flex;
          list-style: none;
          margin: 0;
          padding: 0;
          width: 100%;
        }
        #emp-sliders ul li {
          flex: 0 0 100%;
          min-width: 100%;
          width: 100%;
        }
        #emp-sliders ul li picture {
          display: block;
          width: 100%;
        }
        #emp-sliders ul li img,
        #emp-sliders ul li picture img {
          display: block;
          height: auto;
          margin: auto;
          max-width: 1200px !important;
          width: 100%;
        }
        #emp-trust-badges {
          background-color: rgba(255, 255, 255, 0.1);
          border-radius: 12px;
          box-sizing: border-box;
          margin: 8px auto 6px auto;
          max-width: 100%;
          min-height: 48px;
          width: 100%;
        }
        .woocommerce ul.products li.product a img {
          aspect-ratio: 1 / 1;
          background-color: #e5e7eb;
          border-radius: 20px 20px 0 0 !important;
          display: block;
          width: 100% !important;
        }
        @keyframes empShellPulse {
          0%, 100% {
            opacity: 1;
          }
          50% {
            opacity: 0.55;
          }
        }
        #emp-app-shell-preloader {
          background-color: #ffffff;
          display: flex;
          flex-direction: column;
          height: 100vh;
          inset: 0;
          overflow: hidden;
          position: fixed;
          transition: opacity 0.35s ease, visibility 0.35s ease;
          width: 100vw;
          z-index: 9999999;
        }
        #emp-app-shell-preloader.emp-shell-dismissed {
          opacity: 0;
          pointer-events: none;
          visibility: hidden;
        }
        .emp-shell-header {
          align-items: center;
          background-color: var(--emp-nav-bg, #22372b);
          box-sizing: border-box;
          display: flex;
          height: 54px;
          justify-content: space-between;
          padding: 0 16px;
          width: 100%;
        }
        .emp-shell-btn,
        .emp-shell-cart {
          background-color: rgba(255, 255, 255, 0.25);
          border-radius: 4px;
          height: 22px;
          width: 26px;
        }
        .emp-shell-brand {
          background-color: rgba(255, 255, 255, 0.3);
          border-radius: 6px;
          height: 28px;
          width: 110px;
        }
        .emp-shell-body {
          box-sizing: border-box;
          display: flex;
          flex: 1;
          flex-direction: column;
          overflow: hidden;
          padding: 8px 12px;
          width: 100%;
        }
        .emp-shell-slider {
          animation: empShellPulse 1.5s ease-in-out infinite;
          aspect-ratio: 1 / 1;
          background-color: #e5e7eb;
          border-radius: 8px;
          max-height: 340px;
          width: 100%;
        }
        .emp-shell-badges {
          display: flex;
          gap: 8px;
          margin: 10px 0 8px 0;
          width: 100%;
        }
        .emp-shell-badge {
          animation: empShellPulse 1.5s ease-in-out infinite;
          background-color: #f1f5f9;
          border-radius: 20px;
          flex: 1;
          height: 34px;
        }
        .emp-shell-grid {
          display: flex;
          gap: 10px;
          margin-top: 6px;
          width: 100%;
        }
        .emp-shell-card {
          background-color: #f8fafc;
          border-radius: 12px;
          display: flex;
          flex: 1;
          flex-direction: column;
          overflow: hidden;
          padding: 6px;
        }
        .emp-shell-card-img {
          animation: empShellPulse 1.5s ease-in-out infinite;
          aspect-ratio: 1 / 1;
          background-color: #e5e7eb;
          border-radius: 8px;
          width: 100%;
        }
        .emp-shell-card-text {
          background-color: #e2e8f0;
          border-radius: 4px;
          height: 12px;
          margin: 8px auto 2px auto;
          width: 75%;
        }
        .emp-shell-bottom-bar {
          align-items: center;
          background-color: var(--emp-nav-bg, #22372b);
          border-radius: 24px 24px 0 0;
          box-sizing: border-box;
          display: flex;
          height: 52px;
          justify-content: space-around;
          margin-top: auto;
          padding: 0 16px;
          width: 100%;
        }
        .emp-shell-nav-item {
          background-color: rgba(255, 255, 255, 0.3);
          border-radius: 50%;
          height: 24px;
          width: 24px;
        }
        body.emp-loading {
          overflow: hidden !important;
        }
        body.emp-loading #top_content,
        body.emp-loading #top-notice,
        body.emp-loading #navbar-background,
        body.emp-loading #emp-sliders,
        body.emp-loading #emp-trust-badges,
        body.emp-loading main,
        body.emp-loading section,
        body.emp-loading footer,
        body.emp-loading .emp-categories-carousel,
        body.emp-loading .woocommerce {
          visibility: hidden !important;
        }
      </style>
    <?php }

    wp_head();
    echo get_theme_mod('emp_analytics_facebook_script');
    echo get_theme_mod('emp_analytics_google_script');
    ?>
  </head>
  <body <?php body_class(((is_front_page() || is_home()) && $emp_skeleton_active) ? 'emp-loading' : ''); ?> >
    <?php if ((is_front_page() || is_home()) && $emp_skeleton_active) {
      get_template_part('includes/app-shell-preload');
    } ?>
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
    $search_link = get_theme_mod('emp_components_nav_search');
    $has_product_search = !empty($search_link);
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
              <input type="search" class="emp-header-search-input" name="s" placeholder="<?php echo class_exists('WooCommerce') ? esc_attr__('Buscar Productos...', 'empralidad') : esc_attr__('Buscar...', 'empralidad'); ?>" value="<?php echo get_search_query(); ?>" autocomplete="off" />
              <?php if (class_exists('WooCommerce')) { ?>
                <input type="hidden" name="post_type" value="product" />
              <?php } ?>
            </form>
          <?php } ?>
          <?php
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
            <a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="fa fa-shopping-cart mr-4 fadein show-desktop position-relative <?php if ($cart_count > 0) { ?> has-items <?php } ?>">
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
