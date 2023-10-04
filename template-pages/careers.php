<?php

/* Template Name: Careers */
get_header();

$hero_title = get_field('title_block') ? get_field('title_block') : get_the_title();
$hero_content = get_field('content_block');
$hero_video = get_field('video_block');

$current_page = (get_query_var('paged')) ? get_query_var('paged') : 1;

$careers = new WP_Query(array(
    'post_type' => 'job',
    'posts_per_page' => 2,
    'orderby' => 'menu_order',
    'paged' => $current_page,
));

?>

<main id="primary" class="site-main">
    <?php get_template_part('template-parts/breadcrumbs/breadcrumbs'); ?>
    <div class="container">
        <div class="entry-content">
                <section class="careers__hero section section--spacing--lg">
                    <div class="row d-md-flex">
                        <div class="col-12 col-lg-6">
                            <div class="title_block">
                                <h1 class="font--weight--500 text-color-black">
                                    <?php echo $hero_title; ?>
                                </h1>
                            </div>
                            <?php if ($hero_content) : ?>
                                <div class="content-block font--weight--500 text-color-gray">
                                    <?php echo $hero_content; ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <?php if ($hero_video) : ?>
                            <div class="col-12 col-lg-6">
                                <div class="video-block">
                                    <div class="player-main">
                                        <?php echo $hero_video; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                    </div>
                </section>

                <section class="careers__main">
                    <div class="title_block">
                        <h2 class="h1 font--weight--500 text-color-black"><?php _e('Job Openings'); ?></h2>
                    </div>
                    <?php if ($careers->have_posts()) : ?>
                        <div class="careers__list row">
                            <?php while ($careers->have_posts()) : $careers->the_post();
                                $the_title = get_the_title();

                                $salary = 'ds';
                                $emp = 'full';

                                if ($the_title == 'Account Support Associate' || $the_title == 'Revenue Cycle Associate' ||  $the_title == 'Client Onboarding Associate') :
                                    $salary = 'hr';
                                endif;

                                if ($the_title == 'Revenue Cycle Associate' || $the_title == 'Account Support Associate') :
                                    $emp = 'both';
                                endif; 
                            ?>
                                <?php echo get_template_part('template-parts/card/block', 'career'); ?>
                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>
                        </div><!-- .careers-grid-->

                        <?php if ($careers->max_num_pages > 1) : ?>
                            <script>
                                var ajaxurl = '<?php echo site_url(); ?>/wp-admin/admin-ajax.php';
                                var posts_vars = '<?php echo serialize($careers->query_vars); ?>';
                                var current_page = <?php echo $current_page; ?>;
                                var max_pages = '<?php echo $careers->max_num_pages; ?>';
                            </script>
                            <div class="button__block">
                                <button id="loadmore" class="button bg--gradient-orange text-color-white">
                                   <?php _e('Show more'); ?>
                                </button>
                            </div>
                        <?php endif; ?>

                    <?php else : ?>

                        <div class="careers__list row">
                            <div class="col-12">
                                <p class="text--size-32 text-color-black"><?php _e('No jobs'); ?></p>
                            </div>
                        </div>

                    <?php endif; ?>
                </section><!-- .careers__main -->
            
        </div><!-- .entry-content -->

    </div><!-- .container -->
</main><!-- #main -->

<?php
get_footer();
