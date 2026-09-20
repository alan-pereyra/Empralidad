    <!-- defer background img -->
    <style id="no-bg-img">
      #carouselFade{background-image:none!important}
    </style>
    <script>
      window.addEventListener("load", function (event) {
        document.getElementById('no-bg-img').remove();
      })
    </script>
    <footer class="container-fluid pb-5 px-0 footer no-shadow">
      <!-- Social buttons -->
      <div id="emp-social-buttons">
        <?php $social_nick = get_theme_mod('emp_components_footer_social_nickname'); ?>
          <span>@<?php echo $social_nick  ?></span>
          <div class="p-3 fa-2x">
            <!-- Instagram -->
            <?php $instagram_link = get_theme_mod('emp_components_footer_insta');
            if ($instagram_link){ ?>
              <a href="<?php echo get_theme_mod('emp_components_footer_insta'); ?>" class="fab fa-instagram"></a>
            <?php } ?>
            <!-- Tik Tok -->
            <?php $tiktok_link = get_theme_mod('emp_components_footer_tiktok');
            if ($tiktok_link){ ?>
              <a href="<?php echo get_theme_mod('emp_components_footer_tiktok'); ?>" class="fab fa-tiktok"></a>
              <?php } ?>
            <!-- Youtube -->
            <?php $youtube_link = get_theme_mod('emp_components_footer_yt');
            if ($youtube_link){ ?>
              <a href="<?php echo get_theme_mod('emp_components_footer_yt'); ?>" class="fab fa-youtube"></a>
              <?php } ?>
            <!-- Facebook -->
            <?php $facebook_link = get_theme_mod('emp_components_footer_face');
            if ($facebook_link){ ?>
              <a href="<?php echo get_theme_mod('emp_components_footer_face'); ?>" class="fab fa-facebook-f"></a>
            <?php } ?>
            <!-- Twiter -->
            <?php $twitter_link = get_theme_mod('emp_components_footer_tw');
            if ($twitter_link){ ?>
              <a href="<?php echo get_theme_mod('emp_components_footer_tw'); ?>" class="fab fa-twitter"></a>
            <?php } ?>
          </div>
        </div>
      <div class="mw-1200px text-center">
        <!-- Sidebar -->
        <?php if(is_active_sidebar( 'footer' )){
          get_sidebar( 'footer' );
        } ?>
        <p><?php echo wp_kses_post( get_theme_mod('emp_components_footer_text') ); ?></p>
        <p><small><a href="<?php echo esc_url( get_permalink(get_theme_mod('emp_components_footer_term')) ); ?>" >Terminos y Condiciones</a> -
        <a href="<?php echo esc_url( get_permalink(get_theme_mod('emp_components_footer_poli')) ); ?>">Politicas de Privacidad</a></small></p>
        <?php $owner_enable = get_theme_mod('emp_components_footer_owner'); 
        if (!$owner_enable){ ?>
          <!-- Owner -->
          <p class="owner"><small>Desarrollado por</small> <a href="https://empralidad.com.ar" target="_blank" rel="noopener"><b>Empralidad</b></a></p>
          <br>
        <?php } ?>
        <p class="qr-afip" style="width:50px;" class="mx-auto"><?php echo wp_kses_post( get_theme_mod('emp_components_footer_qr') ); ?></p>
        <br>
      </div>
    </footer>
    <!-- Button permanent desktop -->
    <div class="show-btn-fixed">
      <?php
      $perma_button = get_theme_mod('emp_components_nav_wsp');
      $wsp_custom_link = get_theme_mod('emp_components_nav_wsp_custom_link');
      $link_chat_emp = get_theme_mod('emp_components_nav_chat_emp');
      $wsp_phone = preg_replace('/[^0-9]/', '', (string) get_theme_mod('emp_components_nav_wsp_numb'));
      if($link_chat_emp != ''){ ?>
        <div id="chat-emp-btn-fixed" class="img-fixed show-desktop"><a href="<?php echo esc_url( get_theme_mod('emp_components_nav_chat_emp') ); ?>" class="fas fa-comment-dots"></a></div>
      <?php }else if($perma_button){ ?>
      	<?php if (!$wsp_custom_link){ 
          $wsp_text = rawurlencode( "Hola tengo una consulta desde:\n\n*" . wp_get_document_title() . "*\n\n" . get_permalink() );
        ?>
          <div class="img-fixed show-desktop">
            <a onclick="<?php echo esc_attr( get_theme_mod('emp_components_nav_wsp_event') ); ?>"
              href="https://api.whatsapp.com/send?phone=<?php echo esc_attr($wsp_phone); ?>&text=<?php echo $wsp_text; ?>">
              <img class="img-btn-fixed-wsp" height="512" width="512" src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/whatsapp-logo.png" alt="emp-whatsapp" loading="lazy">
            </a>
          </div>
        <?php }else{ ?>
          <div class="img-fixed show-desktop">
            <a onclick="<?php echo esc_attr( get_theme_mod('emp_components_nav_wsp_event') ); ?>"
              href="<?php echo esc_url( get_theme_mod('emp_components_nav_wsp_custom_link') ); ?>">
              <img class="img-btn-fixed-wsp" height="512" width="512" src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/whatsapp-logo.png" alt="emp-whatsapp" loading="lazy">
            </a>
          </div>
        <?php } ?>
      <?php } ?>
    	<div class="img-fixed" id="scrollToTopButton"><i class="fas fa-arrow-up img-btn-fixed <?php if ($perma_button) { ?> show-mobile <?php } ?>"></i></div>
    </div>
    <!-- Buttons mobile -->
    <div class="mx-auto container-fluid fixed-bottom bg-personalized" id="bg-searchform-mobile"></div>
    <?php
    $nav_has_neon = get_theme_mod('emp_components_nav_neon', true);
    $nav_neon_class = (!empty($nav_has_neon) && $nav_has_neon !== '0' && $nav_has_neon !== 0) ? 'has-neon' : '';
    ?>
    <div class="buttons-mobile empFadeInTop show-sm text-center d-flex justify-content-between align-items-center fixed-bottom p-2 <?php echo esc_attr($nav_neon_class); ?>">
      <!-- Home-->
      <?php $home_url =  get_theme_mod('emp_components_nav_home');
      if ($home_url == ''){
        $home_url = home_url();
      }
      ?>
      <a href="<?php echo esc_url( $home_url ); ?>" class="fa-dark fa fa-home mx-auto"><span class="fa-text">Inicio</span></a>
      <!-- User -->
      <?php $emp_user_link = get_theme_mod('emp_components_nav_user');
      if ($emp_user_link){ ?>
        <a href="<?php echo esc_url( get_theme_mod('emp_components_nav_user') ); ?>" class="fa-dark fa fa-user mx-auto">
            <span class="fa-text">Ingresar</span>
        </a>
      <?php } ?>
      <!-- Cart -->
      <?php $cart_link = get_theme_mod('emp_components_nav_cart');
      if (class_exists('WooCommerce') && $cart_link){ ?>
        <a id="btn-woocommerce-cart" onclick="showWoocommerceCart();" class="fa-dark fa fa-shopping-cart mx-auto <?php if ((WC()->cart->get_cart_contents_count()) > 0) { ?> fadein <?php } ?>" >
          <span id="span-woocommerce-cart" class="fa-text">Carrito</span>
          <small id="span-woocommerce-counter" class="woo-counter-cart-number added_to_cart wc-forward">
            <div id="mini-cart-count" class="icon-color"></div>
          </small>
        </a>
      <?php } ?>
      <!-- Whatsapp -->
      <?php $emp_wp_link = get_theme_mod('emp_components_nav_wsp');
      if ($emp_wp_link && $perma_button){ 
        $wsp_mobile_text = rawurlencode( "Hola tengo una consulta desde:\n\n*" . get_bloginfo('name') . "*\n\n" . get_permalink() );
      ?>
        <a onclick="<?php echo esc_attr( get_theme_mod('emp_components_nav_wsp_event') ); ?>" href="https://api.whatsapp.com/send?phone=<?php echo esc_attr($wsp_phone); ?>&text=<?php echo $wsp_mobile_text; ?>" class="fa-dark fab fa-whatsapp fa-whatsapp-size mx-auto">
          <span class="fa-text">Whatsapp</span>
        </a>
      <?php } ?>
      <!-- Chat-EMP -->
      <?php
      if ($link_chat_emp){ ?>
        <a href="<?php echo esc_url( get_theme_mod('emp_components_nav_chat_emp') ); ?>" class="fas fa-comment-dots mx-auto">
          <span class="fa-text">Chat</span>
        </a>
      <?php } ?>
      <!-- Search Form -->
      <?php $search_link = get_theme_mod('emp_components_nav_search');
      if ($search_link){ ?>
        <a id="btn-searchform" class="fa-dark fa fa-search mx-auto" onclick="showSearchBackground();">
          <span id="span-searchform" class="fa-text">Buscar</span>
        </a>
      <?php } ?>
    </div>
    <div id="searchform-woocommerce" style="display:none;">
      <?php echo do_shortcode('[emp-mini-cart]'); ?>
    </div>
    <div id="searchform-mobile" style="display: none;">
      <?php get_search_form(); ?>
    </div>
    <!-- WP js -->
    <?php wp_footer(); ?>
  </body>
</html>
