<section class="card p-0 to-fade to-fadein-animation border-30px bg-personalized-secondary">
    <div class="card-header"> <?php the_category(', '); ?> </div>
    <!-- body -->
        <div class="card-block">
    <!-- Img -->
        <?php
        $filter_slide1 = get_theme_mod('ip_img_filter1');
        if ( has_post_thumbnail() ) { ?>
                <div class="position-relative nopadding">
                    <?php the_post_thumbnail( 'full', array( 'class' => 'col-12 mx-auto h-auto') );?>
                    <div class="carousel-caption d-flex header-text1 h-100 <?php if ($filter_slide1 === 'color') { ?> bg-title-content-color <?php }else{ ?> bg-title-content-dark <?php } ?>"></div>
                    <div class="carousel-caption d-flex header-text1">
                        <h2 class="container-fluid my-auto d-block mh-100-auto">
                            <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
                        </h2>
                    </div>
                </div>
        <?php } else { ?>
                <div class=" py-5 text-center text-justify  bg-personalized">
                    <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
                </div>
        <?php } ?>
    <!-- end img -->
            <br>
            <div class="card-text p-3 text-dark">
                <?php the_excerpt(); ?>
            </div>
            <a href="<?php the_permalink(); ?>">
                <button class="card-button btn container-fluid alingcenter mt-auto">
                    Leer más
                </button>
            </a>
        </div>
        <div class="card-footer">
            <small><?php the_date(); ?> / Autor: <?php the_author(); ?> / <?php the_tags(); ?> </small>
        </div>
    <!-- end body -->
</section>
