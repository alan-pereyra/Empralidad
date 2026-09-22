<?php get_header(); ?>
<?php $emp_title_img = get_the_post_thumbnail_url(); ?>

<header id="main-head" class="page">
  <div class="div-container-title-page mw-1300px">
    <div class="container-title-page border-30px mt-auto <?php if (!$emp_title_img) { ?> mb-auto <?php } ?>">
      <div id="title-page" class="mx-auto empFadeIn">
        <h1 class="empFadeIn">
          <?php the_title(); ?>
        </h1>
        <?php the_excerpt(); ?>
      </div>

      <a href="#first-content-page" class="home-btn-down page">
        <small>Ver más</small>
        <i class="fas fa-chevron-down"></i>
      </a>
    </div>
    <?php if($emp_title_img){ ?>
      <img class="title-img-page empFadeIn" src="<?php echo $emp_title_img ?>">
    <?php } ?>
  </div>
</header>
<div id="first-content-page" class="admin-bar-show categories-active"></div>
<article class="color-content bg-content p-md-0 rounded-0<?php if ( function_exists('is_cart') && is_cart() ) { echo ' mw-1200-px mb-0'; } ?>"<?php if ( function_exists('is_cart') && is_cart() ) { echo ' style="margin-bottom: 0 !important;"'; } ?>>
  <div class="container-fluid p-0 overflow-hidden<?php if ( function_exists('is_cart') && is_cart() ) { echo ' mw-1200-px mb-0'; } ?>"<?php if ( function_exists('is_cart') && is_cart() ) { echo ' style="margin-bottom: 0 !important;"'; } ?>>
    <?php
    if ( have_posts() ) {
      while ( have_posts() ) {
        the_post(); the_content(); ?>
        <?php if ( !(function_exists('is_cart') && is_cart()) ) { ?>
          <span class="btn container-fluid invisible"></span>
        <?php } ?>
      <?php }
    }
    if ( comments_open() || get_comments_number() ) {
        comments_template(); the_comments_pagination();
    }
    ?>
  </div>
</article>
<?php get_footer(); ?>
