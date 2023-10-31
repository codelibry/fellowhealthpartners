<?php
/*
* Template Name: Text Page
*/

get_header();



?>

<main id="primary" class="site-main">
    <?php get_template_part('template-parts/breadcrumbs/breadcrumbs'); ?>
    <div class="text_page single-post_page">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="main-content mt-80 mb-80">
                        <h1 class="h3 single-post-title mb-40"><?php the_title(); ?></h1>
                        <div class="single-post-date mb-2 mb-sm-2 text--size--17 text-color-gray"><?php echo get_the_date(); ?></div>
                        <div class="line"></div>
                        <div class="single-post-content">
                            <?php
                            if (has_post_thumbnail()) : ?>
                                <div class="single-post-image mb-2 mb-sm-4">
                                    <?php echo the_post_thumbnail('full'); ?>
                                </div>
                            <?php endif; ?>
                            <div class="content-block mt-2 mb-sm-2">
                                <?php the_content(); ?>
                            </div>
                        </div><!-- .post-content -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</main><!-- #main -->

<?php

get_footer();
