<?php get_header();

$emp_slider1 = get_theme_mod('emp_slider_image1');
$emp_slider2 = get_theme_mod('emp_slider_image2');
$emp_slider3 = get_theme_mod('emp_slider_image3');

$emp_slider_desktop1 = get_theme_mod('emp_slider_desktop_image1');
$emp_slider_desktop2 = get_theme_mod('emp_slider_desktop_image2');
$emp_slider_desktop3 = get_theme_mod('emp_slider_desktop_image3');

$mobile_url1  = $emp_slider1 ? wp_get_attachment_url($emp_slider1) : '';
$desktop_url1 = $emp_slider_desktop1 ? wp_get_attachment_url($emp_slider_desktop1) : '';

$mobile_url2  = $emp_slider2 ? wp_get_attachment_url($emp_slider2) : '';
$desktop_url2 = $emp_slider_desktop2 ? wp_get_attachment_url($emp_slider_desktop2) : '';

$mobile_url3  = $emp_slider3 ? wp_get_attachment_url($emp_slider3) : '';
$desktop_url3 = $emp_slider_desktop3 ? wp_get_attachment_url($emp_slider_desktop3) : '';

$has_sliders = $mobile_url1 || $desktop_url1 || $mobile_url2 || $desktop_url2 || $mobile_url3 || $desktop_url3;

if($has_sliders){ ?>
  <div id="emp-sliders">
    <ul>
      <?php if($desktop_url1 || $mobile_url1){ ?>
        <li>
          <picture>
            <?php if($mobile_url1){ ?>
              <source media="(max-width: 768px)" srcset="<?php echo esc_url($mobile_url1); ?>">
            <?php } ?>
            <img src="<?php echo esc_url($desktop_url1 ? $desktop_url1 : $mobile_url1); ?>" class="emp-slider" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" loading="lazy">
          </picture>
        </li>
      <?php } ?>
      <?php if($desktop_url2 || $mobile_url2){ ?>
        <li>
          <picture>
            <?php if($mobile_url2){ ?>
              <source media="(max-width: 768px)" srcset="<?php echo esc_url($mobile_url2); ?>">
            <?php } ?>
            <img src="<?php echo esc_url($desktop_url2 ? $desktop_url2 : $mobile_url2); ?>" class="emp-slider" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" loading="lazy">
          </picture>
        </li>
      <?php } ?>
      <?php if($desktop_url3 || $mobile_url3){ ?>
        <li>
          <picture>
            <?php if($mobile_url3){ ?>
              <source media="(max-width: 768px)" srcset="<?php echo esc_url($mobile_url3); ?>">
            <?php } ?>
            <img src="<?php echo esc_url($desktop_url3 ? $desktop_url3 : $mobile_url3); ?>" class="emp-slider" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" loading="lazy">
          </picture>
        </li>
      <?php } ?>
    </ul>
    <i id="emp-slider-prev" class="fa fa-arrow-circle-left disabled"></i>
    <i id="emp-slider-next" class="fa fa-arrow-circle-right disabled"></i>
  </div>
<?php }

$emp_carousel_slide1 = get_theme_mod('emp_head_slide1');
$emp_title_show = get_theme_mod('emp_front_title_show');
$emp_title_show_2 = get_theme_mod('emp_front_title_show2');
$emp_title_show_3 = get_theme_mod('emp_front_title_show3');
$emp_button_show1 = get_theme_mod('emp_front_button_show1');
$emp_button_secondary_show1 = get_theme_mod('emp_front_button_secondary_show1');
$emp_button_show2 = get_theme_mod('emp_front_button_show2');
$emp_button_secondary_show2 = get_theme_mod('emp_front_button_secondary_show2');
$emp_button_show3 = get_theme_mod('emp_front_button_show3');
$emp_button_secondary_show3 = get_theme_mod('emp_front_button_secondary_show3');

if($emp_title_show){ ?>
  <header id="main-head" <?php if(get_theme_mod('emp_components_head_title_categories_on')){ ?>class="categories-on"<?php } ?> >
    <div class="text-img-home container-fluid my-auto">
      <div id="carouselFade" class="carousel carousel-fade carousel-inner text-homepage-container emp-background-image1" data-ride="carousel">
        <div class="carousel-video-background"></div>
        <div id="carousel-item-1" class="carousel-item active empFadeIn mx-auto color-personalized mw-1300px">
          <h1 class="text-mobile color-personalized empFadeIn">
            <?php
            if(is_front_page() && !is_home()){
              the_title();
            }else{
              bloginfo('name');
            }
            ?>
          </h1>
          <?php
          $emp_title_hr_show = get_theme_mod('emp_front_title_hr_show');
          $emp_title_btn_icon = get_theme_mod('emp_section_front_button_icon1');
          $emp_title_btn_secondary_icon = get_theme_mod('emp_section_front_button_secondary_icon1');
          if($emp_title_hr_show){ ?> <hr> <?php } ?>
          <p><?php echo get_theme_mod('emp_front_textarea'); ?></p>
          <?php if($emp_button_show1){ ?>
            <a href="<?php echo get_theme_mod('emp_front_link_btn1') ?>">
              <button class="p-2 container-fluid <?php if($emp_button_secondary_show1){ ?> btn-secondary-actived <?php }else{ ?> mw-70 <?php } ?> btn btn-outline-light">
                <i class="<?php echo $emp_title_btn_icon?>"></i>
                <?php echo get_theme_mod('emp_front_btn1'); ?>
              </button>
            </a>
          <?php } ?>
          <?php if($emp_button_secondary_show1){ ?>
            <a href="<?php echo get_theme_mod('emp_front_link_btn_secondary1') ?>">
              <button class="p-2 container-fluid btn-secondary-actived btn-emp btn">
                <i class="<?php echo $emp_title_btn_secondary_icon?>"></i>
                <?php echo get_theme_mod('emp_front_btn_secondary1'); ?>
              </button>
            </a>
          <?php } ?>
          <?php
          $h1_align = get_theme_mod('emp_components_head_title_align');
          $emp_title_img = wp_get_attachment_url(get_theme_mod('emp_front_image_top1'));
          if(($h1_align == 'left'|| $h1_align == 'right')&&$emp_title_img){ ?>
            <img class="title-img" src="<?php echo $emp_title_img ?>" loading="lazy">
          <?php } ?>
        </div>

        <?php
        $emp_title_hr_show2 = get_theme_mod('emp_front_title_hr_show2');
        if($emp_title_show_2){ ?>
          <div id="carousel-item-2" class="carousel-item empFadeIn mx-auto color-personalized mw-1200px">
            <h2 class="text-mobile empFadeIn"><?php echo get_theme_mod('emp_front_text2'); ?></h2>
            <?php if($emp_title_hr_show2){ ?> <hr> <?php } ?>
            <p><?php echo get_theme_mod('emp_front_textarea2'); ?></p>
            <?php if($emp_button_show2){ ?>
              <a href="<?php echo get_theme_mod('emp_front_link_btn2') ?>">
                <button class="p-2 container-fluid <?php if($emp_button_secondary_show2){ ?> btn-secondary-actived <?php }else{ ?> mw-70 <?php } ?> border-30px btn-outline-light">
                  <?php echo get_theme_mod('emp_front_btn2'); ?>
                </button>
              </a>
            <?php } ?>
            <?php if($emp_button_secondary_show2){ ?>
              <a href="<?php echo get_theme_mod('emp_front_link_btn_secondary2') ?>">
                <button class="p-2 container-fluid btn-secondary-actived btn-emp border-30px">
                  <?php echo get_theme_mod('emp_front_btn_secondary2'); ?>
                </button>
              </a>
            <?php } ?>
          </div>
          <?php $emp_title_img = wp_get_attachment_url(get_theme_mod('emp_front_image_top2'));
          if(($h1_align == 'left'|| $h1_align == 'right')&&$emp_title_img){ ?>
            <img class="title-img" src="<?php echo $emp_title_img ?>" loading="lazy">
          <?php } ?>
        <?php } ?>

        <?php
        $emp_title_hr_show3 = get_theme_mod('emp_front_title_hr_show3');
        if($emp_title_show_3){ ?>
          <div id="carousel-item-3" class="carousel-item empFadeIn mx-auto color-personalized mw-1200px">
            <h2 class=" text-mobile empFadeIn"><?php echo get_theme_mod('emp_front_text3'); ?></h2>
            <?php if($emp_title_hr_show3){ ?> <hr> <?php } ?>
            <p><?php echo get_theme_mod('emp_front_textarea3'); ?></p>
            <?php if($emp_button_show3){ ?>
              <a href="<?php echo get_theme_mod('emp_front_link_btn3') ?>">
                <button class="p-2 container-fluid <?php if($emp_button_secondary_show3){ ?> btn-secondary-actived <?php }else{ ?> mw-70 <?php } ?> border-30px btn-outline-light">
                  <?php echo get_theme_mod('emp_front_button3'); ?>
                </button>
              </a>
            <?php } ?>
            <?php if($emp_button_secondary_show3){ ?>
              <a href="<?php echo get_theme_mod('emp_front_link_btn_secondary3') ?>">
                <button class="p-2 container-fluid btn-secondary-actived btn-emp border-30px">
                  <?php echo get_theme_mod('emp_front_btn_secondary3'); ?>
                </button>
              </a>
            <?php } ?>
          </div>
        <?php } ?>
        <?php $emp_title_img = wp_get_attachment_url(get_theme_mod('emp_front_image_top3'));
        if(($h1_align == 'left'|| $h1_align == 'right')&&$emp_title_img){ ?>
          <img class="title-img" src="<?php echo $emp_title_img ?>" loading="lazy">
        <?php } ?>
      </div>

    <?php if($emp_title_show_2 || $emp_title_show_3){ ?>

      <div class="carousel-control-prev" onclick="carouselItemPrev()">
        <i class="fas fa-2x fa-caret-left color-personalized" aria-hidden="true"></i>
        <span class="sr-only"></span>
      </div>
      <div class="carousel-control-next" onclick="carouselItemNext()">
        <i class="fas fa-2x fa-caret-right color-personalized" aria-hidden="true"></i>
        <span class="sr-only"></span>
      </div>

    <?php } ?>
    <a href="#first-content-home" class="home-btn-down">
      <small><?php echo get_theme_mod('emp_front_show_more_text'); ?></small>
      <i class="fas fa-chevron-down"></i>
    </a>
    </div>
  </header>

<?php } ?>

<?php $emp_home_categories = get_theme_mod('emp_woocommerce_categories_show'); ?>
<?php $emp_home_show_1 = get_theme_mod('emp_homepage_show_1'); ?>
<?php $emp_home_show_2 = get_theme_mod('emp_homepage_show_2'); ?>
<?php $emp_home_show_3 = get_theme_mod('emp_homepage_show_3'); ?>
<div id="first-content-home" class="<?php if( is_admin_bar_showing() ){ ?> admin-bar-show <?php } ?> bg-personalized"></div>
<div id="emp-content" class="row mx-auto">
  <?php if($emp_home_categories||$emp_home_show_1||$emp_home_show_2||$emp_home_show_3){ ?>
    <div class="col-12 mx-auto px-0 shadow-grey-up-down-1 content-color content-background home-featured-text">
      <!-- Woocommerce categories -->
      <?php if ($emp_home_categories){?>
        <div class="m-auto" >
          <div class="mw-100 support-woo-shortcode mw-1200px pb-personalized-1 text-<?php echo get_theme_mod('emp_homepage_text_aling1'); ?> ">
            <?php echo do_shortcode('[product_categories columns="5" number="0" parent="0"]'); ?>
          </div>
        </div>
      <?php } ?>
      <!-- Text 1 -->
      <?php if ($emp_home_show_1){?>
        <div class="m-auto" >
          <div class="mw-100 support-woo-shortcode mw-1200px pb-personalized-1 text-<?php echo get_theme_mod('emp_homepage_text_aling1'); ?> ">
            <?php echo do_shortcode(get_theme_mod('emp_homepage_text1')); ?>
          </div>
          <?php $header_btn = get_theme_mod('emp_homepage_btn1');
          if ($header_btn){ ?>
            <p class="text-center">
              <button onclick="window.location.href = '<?php echo get_theme_mod('emp_homepage_link_btn1') ?>';" class="container-fluid btn bg-light text-dark">
                <?php echo get_theme_mod('emp_homepage_btn1') ?>
              </button>
            </p>
          <?php } ?>
        </div>
      <?php } ?>
      <!-- Text 2 -->
      <?php if ($emp_home_show_2){?>
        <div class="py-3  mx-auto my-auto">
          <div class="p-2 mw-100 overflow-auto mw-1200px pb-personalized-2 text-<?php echo get_theme_mod('emp_homepage_text_aling2'); ?> " >
            <h2 class="featured-title">
              <span class=""><?php echo get_theme_mod('emp_homepage_title2') ?></span>
            </h2>
            <?php echo do_shortcode(get_theme_mod('emp_homepage_text2')); ?>
          </div>
          <?php $header_btn = get_theme_mod('emp_homepage_btn2');
          if ($header_btn){ ?>
            <p class="text-center">
              <button onclick="window.location.href = '<?php echo get_theme_mod('emp_homepage_link_btn2') ?>';" class="container-fluid btn bg-light text-dark">
                <?php echo get_theme_mod('emp_homepage_btn2') ?>
              </button>
            </p>
          <?php } ?>
        </div>
      <?php } ?>
      <!-- Text 3 -->
      <?php if ($emp_home_show_3){ ?>
        <div class="m-auto" >
          <div class="mw-100 overflow-auto pb-personalized-3 text-<?php echo get_theme_mod('emp_homepage_text_aling3'); ?> ">
            <h2 class="featured-title" >
              <span class=""><?php echo get_theme_mod('emp_homepage_title3'); ?></span>
            </h2>
            <?php echo do_shortcode(get_theme_mod('emp_homepage_text3')); ?>
          </div>
          <?php $header_btn = get_theme_mod('emp_homepage_btn3');
          if ($header_btn){ ?>
            <p class="text-center">
              <button onclick="window.location.href = '<?php echo get_theme_mod('emp_homepage_link_btn3') ?>';" class="container-fluid btn bg-light text-dark">
                <?php echo get_theme_mod('emp_homepage_btn3') ?>
              </button>
            </p>
          <?php } ?>
        </div>
      <?php } ?>
      <!-- end text 3 -->
    </div>
  <?php } ?>

  <?php $featured_products_margin_negative = get_theme_mod('emp_woocommerce_featured_margin_negative'); ?>
  <section class="px-0 col-12 content-background <?php if($featured_products_margin_negative){ ?> mt-300px mt-xl-5 <?php } ?>">
  <?php if ( is_front_page() && !is_home() ) {?>
      <?php get_template_part('includes/wc-featured-products') ?>
      <div>
        <?php get_template_part('content-home') ?>
      </div>
  <?php } else { ?>
      <div class="mx-auto">
        <?php get_template_part('includes/wc-featured-products') ?>
        <div class="card-columns-2 p-2">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <?php get_template_part('content', get_post_format()) ?>
            <?php endwhile; endif; ?>
            <?php get_template_part('content-courses') ?>
        </div>
        <div class="text-center m-0 mw-100 mw-1200-px m-auto pb-5 px-2">
            <h5>Estás buscando algo en específico?</h5>
            <?php get_search_form(); ?>
        </div>
        <?php if(is_active_sidebar( 'homepage1' )){
            get_sidebar( 'homepage1' );
        } ?>
      </div>
  <?php }?>
  </section>
</div>
<?php get_footer(); ?>
