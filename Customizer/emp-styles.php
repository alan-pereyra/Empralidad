<style type="text/css">
:root{
  /* Notice */
  --emp-notice-bg : <?php echo get_theme_mod('emp_components_notice_background'); ?>;
  --emp-notice-color: <?php echo get_theme_mod('emp_components_notice_color'); ?>;
  /* Nav */
  --emp-nav-bg: <?php echo get_theme_mod('emp_components_nav_background'); ?>;
  --emp-nav-bg-mobile: <?php echo get_theme_mod('emp_components_nav_background_mobile'); ?>;
  --emp-nav-color: <?php echo get_theme_mod('emp_components_nav_color'); ?>;
  --emp-nav-color-accent: <?php echo get_theme_mod('emp_components_nav_color_accent'); ?>;
  --emp-nav-icon-color: <?php echo get_theme_mod('emp_components_nav_icon_color'); ?>;
  /* Header */
  --emp-head-title-bg: <?php echo get_theme_mod('emp_components_head_title_background'); ?>;
  --emp-head-title-color: <?php echo get_theme_mod('emp_components_head_title_color'); ?>;
  --emp-head-title-size: <?php echo get_theme_mod('emp_components_head_title_size'); ?>;
  --emp-head-title-tipography: <?php echo get_theme_mod('emp_components_head_title_tipography'); ?>;
  --emp-head-text-size: <?php echo get_theme_mod('emp_components_head_text_size'); ?>;
  --emp-head-text-tipography: <?php echo get_theme_mod('emp_components_head_text_tipography'); ?>;
  --emp-head-opacity: <?php echo get_theme_mod('emp_components_head_opacity'); ?>;
  /* Content */
  --emp-content-bg: <?php echo get_theme_mod('emp_components_content_background');?>;
  --emp-content-color: <?php echo get_theme_mod('emp_components_content_color'); ?>;
  --emp-content-tipography: <?php echo get_theme_mod('emp_components_content_tipography'); ?>;
  --emp-content-size: <?php echo get_theme_mod('emp_components_content_size'); ?>;
  /* Buttons */
  --emp-btn-bg: <?php echo get_theme_mod('emp_components_btn_bg'); ?>;
  --emp-btn-color: <?php echo get_theme_mod('emp_components_btn_color'); ?>;
  /* Footer */
  --emp-footer-bg: <?php echo get_theme_mod('emp_components_footer_background'); ?>;
  --emp-footer-color: <?php echo get_theme_mod('emp_components_footer_color'); ?>;
  /* Contents shortcode */
  --emp-content-shortcode-bg: <?php echo get_theme_mod('emp_components_content_background'); ?>;
  --emp-content-shortcode-color: <?php echo get_theme_mod('emp_components_content_color'); ?>;
  /* H1 Title Aling */
  --emp-content-title-aling: <?php echo get_theme_mod('emp_components_head_title_align'); ?>;
  /* Woocommerce color */
  --emp-woocommerce-color: <?php echo get_theme_mod('emp_woocommerce_color'); ?>;
  --emp-woocommerce-bg: <?php echo get_theme_mod('emp_woocommerce_bg'); ?>;
  --emp-woocommerce-product-price-size: <?php echo get_theme_mod('emp_woocommerce_product_price_size', 36); ?>px;
  --emp-woocommerce-product-desc-size: <?php echo get_theme_mod('emp_woocommerce_product_desc_size', 15); ?>px;
  --emp-woocommerce-tabs-bg: <?php echo get_theme_mod('emp_woocommerce_tabs_bg', '#000000'); ?>;
  --emp-woocommerce-tabs-color: <?php echo get_theme_mod('emp_woocommerce_tabs_color', '#ffffff'); ?>;
  --emp-slider-badges-icon-color: <?php echo get_theme_mod('emp_slider_badges_icon_color') ? get_theme_mod('emp_slider_badges_icon_color') : 'var(--emp-nav-color)'; ?>;
  --emp-slider-badges-text-color: <?php echo get_theme_mod('emp_slider_badges_text_color') ? get_theme_mod('emp_slider_badges_text_color') : 'var(--emp-nav-color)'; ?>;
}

/* backgrounds */
.emp-background-image1{
  background: url(<?php echo wp_get_attachment_url(get_theme_mod('emp_front_image1')); ?>)no-repeat 50% 50%;
}
.emp-background-image2{
  background: url(<?php echo wp_get_attachment_url(get_theme_mod('emp_front_image2')); ?>)no-repeat 50% 50%;
}
.emp-background-image3{
  background: url(<?php echo wp_get_attachment_url(get_theme_mod('emp_front_image3')); ?>)no-repeat 50% 50%;
}
.the_post_thumbnail{
  background: url(<?php echo get_the_post_thumbnail_url(); ?> ) no-repeat 50% 50%;
  background-size: cover;
}

/* Sizes */
<?php if(get_theme_mod('emp_components_head_title_tipography') == 'bad script'){ ?>
  .text-mobile{
    line-height: 1.3;
  }
<?php }
if(get_theme_mod('emp_components_head_title_tipography') == 'the secret'){ ?>
  .text-mobile{
    line-height: 1.6;
  }
<?php } ?>
body{
	font-size: <?php echo get_theme_mod('emp_components_content_size'); ?>px;
}
.text-mobile {
  font-size: <?php echo get_theme_mod('emp_components_head_title_size_mobile'); ?>px!important;/*warning*/
}
#main-head p{
  font-size: <?php echo (get_theme_mod('emp_components_head_text_size') * 0.45); ?>px;
}
@media (max-width: 300px) {
  .text-mobile {
    font-size: <?php echo (get_theme_mod('emp_components_head_title_size_mobile')*.8); ?>px!important;/*warning*/
  }
}
@media (min-width: 400px) {
  .text-mobile {
    font-size: <?php echo (get_theme_mod('emp_components_head_title_size_mobile')*1.35); ?>px!important;/*warning*/
  }
}
@media (min-width: 577px) {
  .text-mobile {
    font-size: <?php echo get_theme_mod('emp_components_head_title_size_medium') ; ?>px!important;
  }
  #main-head p{
    font-size: <?php echo (get_theme_mod('emp_components_head_text_size') * 0.60); ?>px;
  }
  #main-head.page #title-page h1{
    font-size: <?php echo get_theme_mod('emp_components_head_title_size_medium'); ?>px!important;
  }
}
@media (min-width: 800px) {
  .text-mobile {
    font-size: <?php echo get_theme_mod('emp_components_head_title_size_large'); ?>px!important;
  }
}
@media (min-width: 992px) {
  #main-head.page #title-page h1{
    font-size: <?php echo get_theme_mod('emp_components_head_title_size_large'); ?>px!important;
  }
}
@media (min-width: 1200px) {
  #main-head.page #title-page h1{
    font-size: calc(<?php echo get_theme_mod('emp_components_head_title_size_large'); ?> * .8px)!important;
  }
  #main-head p{
    font-size: <?php echo get_theme_mod('emp_components_head_text_size'); ?>px;
  }
  .text-img-home{
    text-align: var(--emp-content-title-aling)!important;
  }
  #main-head p{
    <?php if(get_theme_mod('emp_components_head_title_align') == 'center'){ ?>
      margin: auto;
    <?php }else if(get_theme_mod('emp_components_head_title_align') == 'right'){ ?>
      margin-left: auto!important;
      margin-right: 0!important;
    <?php }else{ ?>
      margin-right: auto!important;
      margin-left: 0!important;
    <?php } ?>
  }
  <?php if(!(get_theme_mod('emp_components_head_title_align') == 'center')){ ?>
    div#carousel-item-1 h1, div#carousel-item-1 p {
      width: 65%!important;
    }
    <?php if(get_theme_mod('emp_components_head_title_align') == 'left'){ ?>
      .title-img{
        right: 0;
      }
      div#carousel-item-1 h1{
        margin-right: auto;
      }
    <?php }else{ ?>
      .title-img{
        left: 0;
      }
      div#carousel-item-1 h1{
        margin-left: auto;
      }
    <?php }?>
  <?php } ?>
}

@media (min-width: 1400px){
  .text-mobile {
    font-size: <?php echo get_theme_mod('emp_components_head_title_size_extralarge'); ?>px!important;
  }
  #main-head.page #title-page h1{
    font-size: <?php echo get_theme_mod('emp_components_head_title_size_large'); ?>px!important;
  }
  #main-head p{
    font-size: <?php echo get_theme_mod('emp_components_head_text_size'); ?>px;
  }
}
@media (min-width:992px) {
  .pb-personalized-1{
    padding-bottom: <?php echo get_theme_mod('emp_homepage_size1'); ?>%!important;
  }
  .pb-personalized-2{
    padding-bottom: <?php echo get_theme_mod('emp_homepage_size2'); ?>%!important;
  }
  .pb-personalized-3{
    padding-bottom: <?php echo get_theme_mod('emp_homepage_size3'); ?>%!important;
  }
}

/* Borders */
a.button.product_type_variable, a.button.product_type_simple.add_to_cart_button, a.button.product_type_simple{
  border: 1px <?php echo get_theme_mod('emp_components_head_title_color'); ?> solid;
}
<?php if(get_theme_mod('emp_components_content_radius')){ ?>
  .woocommerce span.onsale{
    border-radius:0 0 0 16px!important;
  }
  article,
  a.button.product_type_variable,.tutor-course,img.attachment-post-thumbnail.size-post-thumbnail, a.checkout-button.button.alt.wc-forward,
  .woocommerce-product-gallery .flex-viewport, figure.woocommerce-product-gallery__wrapper div img,
  figure.woocommerce-product-gallery__wrapper, .woocommerce table.shop_attributes, ul.products.columns-3,
  #main-head.page .container-title-page, .gemp-galery figure,
  .gemp-filters-reset, .gemp-check-50-50, .gemp-galery-filters-btn .border, .buttons-mobile, a.button.product_type_external{
    border-radius: 30px!important;
  }
  li.product.type-product, .featured-title{
    border-radius: 30px 30px 0 0;
  }
  @media (max-width:991px){
    #bg-menu-mobile{
      border-radius: 0 0 50% 50%;
    }
    #bg-searchform-mobile, #bg-woocommerce-mobile{
      border-radius: 50% 50% 0 0;
    }
  }
  .border-bottom-raduis-15px{
    border-radius: 0 0 15px 15px;
  }
  .sfpo-table {
      border-radius: 30px;
      overflow: hidden;
  }
  .btn, a.button.product_type_simple.add_to_cart_button, a.button.product_type_simple{
    border-radius: 10px;
  }
  .border-30px, .tutor-container .tutor-row, .tutor-single-course-sidebar, .tutor-col-8,.tutor-dashboard .tutor-container,
  .tutor-cart-box-login-form-inner, .woocommerce-notices-wrapper, .woocommerce-error, .woocommerce-info, .woocommerce-message,
  blockquote, iframe, .product-template-default .woo-page-margin, .woocommerce div.product{
    border-radius: 30px;
  }
  li.product.product-category, li.product.type-product, .wc-block-cart .wc-block-cart__submit-container a,
  button.wc-block-components-button.wp-element-button.wc-block-components-checkout-place-order-button.wc-block-components-checkout-place-order-button--full-width.contained{
    border-radius: 16px;
  }
  .border-top-30px{
    border-radius: 30px 30px 0 0;
  }
  .border-bottom-30px{
    border-radius: 0 0 30px 30px;
  }
  .tutor-single-lesson-wrap {
      border-radius: 0 0 30px 30px;
  }
<?php } ?>
<?php if(get_theme_mod('emp_components_content_tipography') === 'sans-serif'){ ?>
  .fa-user .fa-text {
      margin-left: -8px!important;
  }
<?php } ?>

/* Buttons */
.wpcf7-submit, #submit.submit, .woocommerce-cart .wc-proceed-to-checkout a.checkout-button, .reset_variations{
  background-color: <?php echo get_theme_mod('emp_components_head_title_background'); ?>!important;
  color: <?php echo get_theme_mod('emp_components_head_title_color'); ?>!important;
}

/* woocommerce */
#woo_featured_products .woocommerce ul::-webkit-scrollbar, .support-woo-shortcode .woocommerce ul::-webkit-scrollbar{
  background-color: <?php echo get_theme_mod('emp_components_content_color'); ?>22;
}
<?php if(get_theme_mod('emp_woocommerce_featured_size') < 25){ ?>
  .woocommerce-page ul.products li.product, .woocommerce ul.products li.product,
  a.button.product_type_variable, a.button.product_type_simple.add_to_cart_button, a.button.product_type_simple{
    font-size: 16px;
  }
<?php } else { ?>
  .woocommerce-page ul.products li.product, .woocommerce ul.products li.product,
  a.button.product_type_variable, a.button.product_type_simple.add_to_cart_button, a.button.product_type_simple{
    font-size: 25px;
  }
<?php } ?>

.woocommerce ul.products li.product-category{
  width: <?php echo get_theme_mod('emp_woocommerce_category_size');?>%!important;
}
@media (min-width: 769px) {
  .emp-category-item {
    flex: 0 0 <?php echo get_theme_mod('emp_woocommerce_category_size', 30);?>%!important;
    max-width: <?php echo get_theme_mod('emp_woocommerce_category_size', 30);?>%!important;
    width: <?php echo get_theme_mod('emp_woocommerce_category_size', 30);?>%!important;
  }
}
<?php if(!get_theme_mod('emp_woocommerce_categories_label_show')){ ?>
  h2.woocommerce-loop-category__title {
    display: none;
  }
<?php } ?>

/* Slider on/off */
<?php
$emp_slider1 = get_theme_mod('emp_slider_image1');
$emp_slider2 = get_theme_mod('emp_slider_image2');
$emp_slider3 = get_theme_mod('emp_slider_image3');
$emp_slider_desktop1 = get_theme_mod('emp_slider_desktop_image1');
$emp_slider_desktop2 = get_theme_mod('emp_slider_desktop_image2');
$emp_slider_desktop3 = get_theme_mod('emp_slider_desktop_image3');
if ($emp_slider1||$emp_slider2||$emp_slider3||$emp_slider_desktop1||$emp_slider_desktop2||$emp_slider_desktop3){ ?>
  #main-head{
    height: 73vh;
  }
  div#carouselFade {
    background-size: cover;
    border-radius: 20px;
    margin-bottom: -40px;
    margin-top: 130px;
    padding: 76px 0px;
  }
<?php }else{ ?>
  #main-head{
    height: 84vh;
  }
<?php } ?>
/* Margin negative on main-head title */
<?php if(get_theme_mod('emp_components_head_title_margin_negative_bottom_show')){ ?>
  @media(min-width: 992px){
    #main-head h1{
      margin-bottom: -35px;
    }
  }
<?php } ?>
/* Fonts */
@import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400;1,600&display=swap');
@font-face {
  font-family: "the secret";
  src: url("<?php echo get_template_directory_uri(). '/includes/fonts/the-secret/TheSecret-Regular'?>.eot");
  src: url('<?php echo get_template_directory_uri(). '/includes/fonts/the-secret/TheSecret-Regular'?>.eot?#iefix') format('embedded-opentype'),
       url('<?php echo get_template_directory_uri(). '/includes/fonts/the-secret/TheSecret-Regular'?>.woff') format('woff'),
       url('<?php echo get_template_directory_uri(). '/includes/fonts/the-secret/TheSecret-Regular'?>.ttf') format('truetype'),
       url('<?php echo get_template_directory_uri(). '/includes/fonts/the-secret/TheSecret-Regular'?>.svg#open-sans') format('svg');
}
@font-face {
  font-family: "flanella";
  src: url("<?php echo get_template_directory_uri(). '/includes/fonts/Flanella/Flanella'?>.eot");
  src: url('<?php echo get_template_directory_uri(). '/includes/fonts/Flanella/Flanella'?>.eot?#iefix') format('embedded-opentype'),
       url('<?php echo get_template_directory_uri(). '/includes/fonts/Flanella/Flanella'?>.woff') format('woff'),
       url('<?php echo get_template_directory_uri(). '/includes/fonts/Flanella/Flanella'?>.ttf') format('truetype'),
       url('<?php echo get_template_directory_uri(). '/includes/fonts/Flanella/Flanella'?>.svg#open-sans') format('svg');
}
@font-face {
  font-family: "open dyslexic";
  src: url("<?php echo get_template_directory_uri(). '/includes/fonts/open_dyslexic/OpenDyslexicAlta-Regular'?>.eot");
  src: url('<?php echo get_template_directory_uri(). '/includes/fonts/open_dyslexic/OpenDyslexicAlta-Regular'?>.eot?#iefix') format('embedded-opentype'),
       url('<?php echo get_template_directory_uri(). '/includes/fonts/open_dyslexic/OpenDyslexicAlta-Regular'?>.woff') format('woff'),
       url('<?php echo get_template_directory_uri(). '/includes/fonts/open_dyslexic/OpenDyslexicAlta-Regular'?>.ttf') format('truetype'),
       url('<?php echo get_template_directory_uri(). '/includes/fonts/open_dyslexic/OpenDyslexicAlta-Regular'?>.svg#open-sans') format('svg');
}
@font-face {
  font-family: "DancingScript";
  src: url("<?php echo get_template_directory_uri(). '/includes/fonts/DancingScript/DancingScript-Regular'?>.eot");
  src: url('<?php echo get_template_directory_uri(). '/includes/fonts/DancingScript/DancingScript-Regular'?>.eot?#iefix') format('embedded-opentype'),
       url('<?php echo get_template_directory_uri(). '/includes/fonts/DancingScript/DancingScript-Regular'?>.woff') format('woff'),
       url('<?php echo get_template_directory_uri(). '/includes/fonts/DancingScript/DancingScript-Regular'?>.ttf') format('truetype'),
       url('<?php echo get_template_directory_uri(). '/includes/fonts/DancingScript/DancingScript-Regular'?>.svg#open-sans') format('svg');
}
@font-face {
  font-family: "varela round";
  src: url("<?php echo get_template_directory_uri(). '/includes/fonts/VarelaRound-Regular/VarelaRound-Regular'?>.eot");
  src: url('<?php echo get_template_directory_uri(). '/includes/fonts/VarelaRound-Regular/VarelaRound-Regular'?>.eot?#iefix') format('embedded-opentype'),
       url('<?php echo get_template_directory_uri(). '/includes/fonts/VarelaRound-Regular/VarelaRound-Regular'?>.woff') format('woff'),
       url('<?php echo get_template_directory_uri(). '/includes/fonts/VarelaRound-Regular/VarelaRound-Regular'?>.ttf') format('truetype'),
       url('<?php echo get_template_directory_uri(). '/includes/fonts/VarelaRound-Regular/VarelaRound-Regular'?>.svg#open-sans') format('svg');
}
@font-face {
  font-family: "indie flower";
  src: url("<?php echo get_template_directory_uri(). '/includes/fonts/IndieFlower-Regular/IndieFlower-Regular'?>.eot");
  src: url('<?php echo get_template_directory_uri(). '/includes/fonts/IndieFlower-Regular/IndieFlower-Regular'?>.eot?#iefix') format('embedded-opentype'),
       url('<?php echo get_template_directory_uri(). '/includes/fonts/IndieFlower-Regular/IndieFlower-Regular'?>.woff') format('woff'),
       url('<?php echo get_template_directory_uri(). '/includes/fonts/IndieFlower-Regular/IndieFlower-Regular'?>.ttf') format('truetype'),
       url('<?php echo get_template_directory_uri(). '/includes/fonts/IndieFlower-Regular/IndieFlower-Regular'?>.svg#open-sans') format('svg');
}
@font-face {
  font-family: "roboto";
  src: url("<?php echo get_template_directory_uri(). '/includes/fonts/Roboto-Regular/Roboto-Regular'?>.eot");
  src: url('<?php echo get_template_directory_uri(). '/includes/fonts/Roboto-Regular/Roboto-Regular'?>.eot?#iefix') format('embedded-opentype'),
       url('<?php echo get_template_directory_uri(). '/includes/fonts/Roboto-Regular/Roboto-Regular'?>.woff') format('woff'),
       url('<?php echo get_template_directory_uri(). '/includes/fonts/Roboto-Regular/Roboto-Regular'?>.ttf') format('truetype'),
       url('<?php echo get_template_directory_uri(). '/includes/fonts/Roboto-Regular/Roboto-Regular'?>.svg#open-sans') format('svg');
}
@font-face {
  font-family: "Kumbh Sans";
  src: url("<?php echo get_template_directory_uri(). '/includes/fonts/KumbhSans-VariableFont_wght/KumbhSans-VariableFont_wght'?>.eot");
  src: url('<?php echo get_template_directory_uri(). '/includes/fonts/KumbhSans-VariableFont_wght/KumbhSans-VariableFont_wght'?>.eot?#iefix') format('embedded-opentype'),
       url('<?php echo get_template_directory_uri(). '/includes/fonts/KumbhSans-VariableFont_wght/KumbhSans-VariableFont_wght'?>.woff') format('woff'),
       url('<?php echo get_template_directory_uri(). '/includes/fonts/KumbhSans-VariableFont_wght/KumbhSans-VariableFont_wght'?>.ttf') format('truetype'),
       url('<?php echo get_template_directory_uri(). '/includes/fonts/KumbhSans-VariableFont_wght/KumbhSans-VariableFont_wght'?>.svg#open-sans') format('svg');
}
@font-face {
  font-family: "nunito";
  src: url("<?php echo get_template_directory_uri(). '/includes/fonts/Nunito-Variable_wght/Nunito-Variable_wght'?>.eot");
  src: url('<?php echo get_template_directory_uri(). '/includes/fonts/Nunito-Variable_wght/Nunito-Variable_wght'?>.eot?#iefix') format('embedded-opentype'),
       url('<?php echo get_template_directory_uri(). '/includes/fonts/Nunito-Variable_wght/Nunito-Variable_wght'?>.woff') format('woff'),
       url('<?php echo get_template_directory_uri(). '/includes/fonts/Nunito-Variable_wght/Nunito-Variable_wght'?>.ttf') format('truetype'),
       url('<?php echo get_template_directory_uri(). '/includes/fonts/Nunito-Variable_wght/Nunito-Variable_wght'?>.svg#open-sans') format('svg');
}
@font-face {
  font-family: "bad script";
  src: url("<?php echo get_template_directory_uri(). '/includes/fonts/BadScript-Regular/BadScript-Regular'?>.eot");
  src: url('<?php echo get_template_directory_uri(). '/includes/fonts/BadScript-Regular/BadScript-Regular'?>.eot?#iefix') format('embedded-opentype'),
       url('<?php echo get_template_directory_uri(). '/includes/fonts/BadScript-Regular/BadScript-Regular'?>.woff') format('woff'),
       url('<?php echo get_template_directory_uri(). '/includes/fonts/BadScript-Regular/BadScript-Regular'?>.ttf') format('truetype'),
       url('<?php echo get_template_directory_uri(). '/includes/fonts/BadScript-Regular/BadScript-Regular'?>.svg#open-sans') format('svg');
}
@font-face {
  font-family: "rozha one";
  src: url("<?php echo get_template_directory_uri(). '/includes/fonts/RozhaOne-Regular/RozhaOne-Regular'?>.eot");
  src: url('<?php echo get_template_directory_uri(). '/includes/fonts/RozhaOne-Regular/RozhaOne-Regular'?>.eot?#iefix') format('embedded-opentype'),
       url('<?php echo get_template_directory_uri(). '/includes/fonts/RozhaOne-Regular/RozhaOne-Regular'?>.woff') format('woff'),
       url('<?php echo get_template_directory_uri(). '/includes/fonts/RozhaOne-Regular/RozhaOne-Regular'?>.ttf') format('truetype'),
       url('<?php echo get_template_directory_uri(). '/includes/fonts/RozhaOne-Regular/RozhaOne-Regular'?>.svg#open-sans') format('svg');
}
@font-face {
  font-family: "roboto-cond";
  src: url("<?php echo get_template_directory_uri(). '/includes/fonts/roboto-condensed/RobotoCondensed-Bold'?>.eot");
  src: url('<?php echo get_template_directory_uri(). '/includes/fonts/roboto-condensed/RobotoCondensed-Bold'?>.eot?#iefix') format('embedded-opentype'),
       url('<?php echo get_template_directory_uri(). '/includes/fonts/roboto-condensed/RobotoCondensed-Bold'?>.woff') format('woff'),
       url('<?php echo get_template_directory_uri(). '/includes/fonts/roboto-condensed/RobotoCondensed-Bold'?>.ttf') format('truetype'),
       url('<?php echo get_template_directory_uri(). '/includes/fonts/roboto-condensed/RobotoCondensed-Bold'?>.svg#open-sans') format('svg');
}
@font-face {
  font-family: "barlow-cond";
  src: url("<?php echo get_template_directory_uri(). '/includes/fonts/barlowcondensed/BarlowCondensed-Bold'?>.eot");
  src: url('<?php echo get_template_directory_uri(). '/includes/fonts/barlowcondensed/BarlowCondensed-Bold'?>.eot?#iefix') format('embedded-opentype'),
       url('<?php echo get_template_directory_uri(). '/includes/fonts/barlowcondensed/BarlowCondensed-Bold'?>.woff') format('woff'),
       url('<?php echo get_template_directory_uri(). '/includes/fonts/barlowcondensed/BarlowCondensed-Bold'?>.ttf') format('truetype'),
       url('<?php echo get_template_directory_uri(). '/includes/fonts/barlowcondensed/BarlowCondensed-Bold'?>.svg#open-sans') format('svg');
}
@font-face {
  font-family: "futura";
  src: url("<?php echo get_template_directory_uri(). '/includes/fonts/futura/futura'?>.eot");
  src: url('<?php echo get_template_directory_uri(). '/includes/fonts/futura/futura'?>.eot?#iefix') format('embedded-opentype'),
       url('<?php echo get_template_directory_uri(). '/includes/fonts/futura/futura'?>.woff') format('woff'),
       url('<?php echo get_template_directory_uri(). '/includes/fonts/futura/futura'?>.ttf') format('truetype'),
       url('<?php echo get_template_directory_uri(). '/includes/fonts/futura/futura'?>.svg#open-sans') format('svg');
}
@font-face {
  font-family: "cmr10";
  src: url("<?php echo get_template_directory_uri(). '/includes/fonts/cmr10/cmr10'?>.eot");
  src: url('<?php echo get_template_directory_uri(). '/includes/fonts/cmr10/cmr10'?>.eot?#iefix') format('embedded-opentype'),
       url('<?php echo get_template_directory_uri(). '/includes/fonts/cmr10/cmr10'?>.svg#open-sans') format('svg');
}
@font-face {
  font-family: "ablation";
  src: url("<?php echo get_template_directory_uri(). '/includes/fonts/ablation/Ablation'?>.eot");
  src: url('<?php echo get_template_directory_uri(). '/includes/fonts/ablation/Ablation'?>.eot?#iefix') format('embedded-opentype'),
       url('<?php echo get_template_directory_uri(). '/includes/fonts/ablation/Ablation'?>.woff') format('woff'),
       url('<?php echo get_template_directory_uri(). '/includes/fonts/ablation/Ablation'?>.ttf') format('truetype'),
       url('<?php echo get_template_directory_uri(). '/includes/fonts/ablation/Ablation'?>.svg#open-sans') format('svg');
}
@font-face {
  font-family: "theseasons";
  src: url("<?php echo get_template_directory_uri(). '/includes/fonts/TheSeasons/TheSeasons'?>.eot");
  src: url('<?php echo get_template_directory_uri(). '/includes/fonts/TheSeasons/TheSeasons'?>.eot?#iefix') format('embedded-opentype'),
       url('<?php echo get_template_directory_uri(). '/includes/fonts/TheSeasons/TheSeasons'?>.woff') format('woff'),
       url('<?php echo get_template_directory_uri(). '/includes/fonts/TheSeasons/TheSeasons'?>.ttf') format('truetype'),
       url('<?php echo get_template_directory_uri(). '/includes/fonts/TheSeasons/TheSeasons'?>.svg#open-sans') format('svg');
}
@font-face {
  font-family: "splinesans";
  src: url("<?php echo get_template_directory_uri(). '/includes/fonts/SplineSans/SplineSans-Regular'?>.eot");
  src: url('<?php echo get_template_directory_uri(). '/includes/fonts/SplineSans/SplineSans-Regular'?>.eot?#iefix') format('embedded-opentype'),
       url('<?php echo get_template_directory_uri(). '/includes/fonts/SplineSans/SplineSans-Regular'?>.woff') format('woff'),
       url('<?php echo get_template_directory_uri(). '/includes/fonts/SplineSans/SplineSans-Regular'?>.ttf') format('truetype'),
       url('<?php echo get_template_directory_uri(). '/includes/fonts/SplineSans/SplineSans-Regular'?>.svg#open-sans') format('svg');
}
@font-face {
  font-family: "geforce-bold";
  src: url("<?php echo get_template_directory_uri(). '/includes/fonts/geforce-bold/GeForce-Bold'?>.eot");
  src: url('<?php echo get_template_directory_uri(). '/includes/fonts/geforce-bold/GeForce-Bold'?>.eot?#iefix') format('embedded-opentype'),
       url('<?php echo get_template_directory_uri(). '/includes/fonts/geforce-bold/GeForce-Bold'?>.woff') format('woff'),
       url('<?php echo get_template_directory_uri(). '/includes/fonts/geforce-bold/GeForce-Bold'?>.ttf') format('truetype'),
       url('<?php echo get_template_directory_uri(). '/includes/fonts/geforce-bold/GeForce-Bold'?>.svg#open-sans') format('svg');
}
@font-face {
  font-family: "quarca";
  src: url("<?php echo get_template_directory_uri(). '/includes/fonts/quarca/Quarca-ExtLig'?>.eot");
  src: url('<?php echo get_template_directory_uri(). '/includes/fonts/quarca/Quarca-ExtLig'?>.eot?#iefix') format('embedded-opentype'),
       url('<?php echo get_template_directory_uri(). '/includes/fonts/quarca/Quarca-ExtLig'?>.woff') format('woff'),
       url('<?php echo get_template_directory_uri(). '/includes/fonts/quarca/Quarca-ExtLig'?>.ttf') format('truetype'),
       url('<?php echo get_template_directory_uri(). '/includes/fonts/quarca/Quarca-ExtLig'?>.svg#open-sans') format('svg');
}

/* WooCommerce Single Product Adaptable Price & Description */
.woocommerce div.product p.price,
.summary.entry-summary p.price,
.woocommerce div.product p.price ins,
.summary.entry-summary p.price ins,
.woocommerce div.product p.price ins bdi,
.summary.entry-summary p.price ins bdi,
.woocommerce div.product p.price > span.amount,
.woocommerce div.product p.price > span.amount bdi,
.woocommerce-variation-price ins,
.woocommerce-variation-price ins bdi,
.woocommerce-variation-price > span.price > span.amount,
.woocommerce-variation-price > span.price > span.amount bdi {
  font-size: clamp(calc(var(--emp-woocommerce-product-price-size) * 0.72), 5vw, var(--emp-woocommerce-product-price-size)) !important;
}

.emp-price-range-from {
  align-items: baseline !important;
  display: inline-flex !important;
  gap: 6px !important;
  justify-content: center !important;
}

.emp-price-from {
  color: inherit !important;
  display: inline-block !important;
  font-size: clamp(13px, 0.48em, 16px) !important;
  font-weight: 600 !important;
  letter-spacing: 0.3px !important;
  line-height: 1 !important;
  opacity: 0.75 !important;
  text-transform: capitalize !important;
}

.emp-product-card .price .emp-price-range-from,
.emp-product-price-centered .emp-price-range-from,
ul.products li.product .price .emp-price-range-from {
  align-items: center !important;
  display: flex !important;
  flex-direction: column !important;
  gap: 1px !important;
  justify-content: center !important;
  text-align: center !important;
}

.emp-product-card .price .emp-price-from,
.emp-product-price-centered .emp-price-from,
ul.products li.product .price .emp-price-from {
  font-size: 11px !important;
  font-weight: 500 !important;
  letter-spacing: 0.2px !important;
  line-height: 1.1 !important;
  margin: 0 auto !important;
  opacity: 0.55 !important;
  text-transform: capitalize !important;
}

.woocommerce div.product .woocommerce-product-details__short-description,
.woocommerce div.product .woocommerce-product-details__short-description p {
  font-size: clamp(calc(var(--emp-woocommerce-product-desc-size) * 0.85), 3.2vw, var(--emp-woocommerce-product-desc-size)) !important;
}

/* WooCommerce Single Product Tabs & Additional Info Custom Colors */
.woocommerce div.product .woocommerce-tabs .woocommerce-Tabs-panel {
  background: var(--emp-woocommerce-tabs-bg) !important;
  box-shadow: none !important;
  color: var(--emp-woocommerce-tabs-color) !important;
}

.woocommerce div.product .woocommerce-tabs ul.tabs li.active {
  background: var(--emp-woocommerce-tabs-bg) !important;
  border-color: var(--emp-woocommerce-tabs-bg) !important;
}

.woocommerce div.product .woocommerce-tabs ul.tabs li.active a {
  color: var(--emp-woocommerce-tabs-color) !important;
}

.woocommerce-Tabs-panel--additional_information h2,
.woocommerce div.product .woocommerce-tabs .woocommerce-Tabs-panel h2,
.woocommerce-Reviews-title,
.woocommerce-tabs .comment-reply-title,
.woocommerce-tabs .woocommerce-noreviews,
.woocommerce-tabs .comment-form-rating label,
.woocommerce-tabs .comment-form-comment label,
.woocommerce-tabs .comment-form-author label,
.woocommerce-tabs .comment-form-email label,
.woocommerce-tabs .comment-notes,
.woocommerce-tabs label,
.woocommerce-tabs p,
.woocommerce-tabs span:not(.onsale),
.woocommerce-tabs p.stars a,
.woocommerce-tabs p.stars a::before,
.woocommerce-tabs ol.commentlist li.review .meta,
.woocommerce-tabs ol.commentlist li.review .meta strong,
.woocommerce-tabs ol.commentlist li.review .description {
  color: var(--emp-woocommerce-tabs-color) !important;
}

.woocommerce-tabs p.stars a:hover ~ a::before,
.woocommerce-tabs p.stars.selected a.active ~ a::before {
  color: var(--emp-woocommerce-tabs-color) !important;
}

.woocommerce-tabs ol.commentlist li.review,
.woocommerce #reviews #comments ol.commentlist li {
  background: var(--emp-woocommerce-tabs-bg) !important;
  border: 1px solid var(--emp-woocommerce-tabs-color) !important;
  color: var(--emp-woocommerce-tabs-color) !important;
}

.woocommerce-tabs ol.commentlist li.review .avatar {
  border: 1px solid var(--emp-woocommerce-tabs-color) !important;
}

.woocommerce-tabs .comment-form input[type="text"],
.woocommerce-tabs .comment-form input[type="email"],
.woocommerce-tabs .comment-form textarea {
  background: var(--emp-woocommerce-tabs-bg) !important;
  border: 1px solid var(--emp-woocommerce-tabs-color) !important;
  color: var(--emp-woocommerce-tabs-color) !important;
}

.woocommerce-tabs .comment-form input::placeholder,
.woocommerce-tabs .comment-form textarea::placeholder {
  color: var(--emp-woocommerce-tabs-color) !important;
}

.woocommerce table.shop_attributes,
table.woocommerce-product-attributes.shop_attributes {
  border-color: rgba(255, 255, 255, 0.15) !important;
  box-shadow: none !important;
}

.woocommerce table.shop_attributes th {
  color: var(--emp-woocommerce-tabs-color) !important;
  opacity: 0.85 !important;
}

.woocommerce table.shop_attributes td,
.woocommerce table.shop_attributes td p {
  color: var(--emp-woocommerce-tabs-color) !important;
}

/* WooCommerce Sale Badge Visibility */
<?php if (!get_theme_mod('emp_woocommerce_show_sale_badge', true)) { ?>
.woocommerce span.onsale,
.woocommerce-page ul.products li.product .onsale,
.product span.onsale,
.single-product div.product .onsale {
  display: none !important;
}
<?php } ?>

/* Slider Trust Badges Custom Colors */
.emp-trust-badge-icon,
i.fas.emp-trust-badge-icon,
i.fab.emp-trust-badge-icon,
i.fa.emp-trust-badge-icon {
  color: var(--emp-slider-badges-icon-color) !important;
}

.emp-trust-badge-text {
  color: var(--emp-slider-badges-text-color) !important;
}

</style>
