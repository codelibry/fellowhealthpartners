<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package fellow
 */

get_header();

$linkedin_url = get_field('linkedin_url', 'options');
$footer_email = get_field('footer_email', 'options');
?>

<main id="primary" class="site-main">
    <?php get_template_part('template-parts/breadcrumbs/breadcrumbs'); ?>
    <div class="news_page">
        <div class="container">
            <div class="has-sidebar mt-80">
                <div class="main-content">
                    <div class="row">
                        <?php if (have_posts()) : ?>
                            <div class="col-lg-7">
                                <header class="blog-header">
                                    <div class="fellow-heading">
                                        <h1 class="title"><?php the_archive_title() ?></h1>
                                    </div>
                                    <ul class="socials">
                                        <li><a href="<?php echo $linkedin_url['url']; ?>" target="<?php echo $linkedin_url['target']; ?>"><?php echo get_inline_svg_social('linkedin-orange.svg'); ?></a></li>
                                        <li><a href="<?php echo get_href_email($footer_email) ?>"><?php echo get_inline_svg('email-fill.svg'); ?></a></li>
                                    </ul>
                                </header>
                                <?php
                                /* Start the Loop */
                                while (have_posts()) :
                                    the_post(); ?>
                                    <?php echo get_template_part('template-parts/parts/news_item'); ?>
                                <?php endwhile;
                                wp_pagenavi(); ?>
                            </div>
                        <?php else : ?>
                            <?php echo get_template_part('template-parts/content', 'none'); ?>
                        <?php endif; ?>
                        <div class="col-lg-5">
                            <?php get_sidebar(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main><!-- #main -->

<?php get_footer();
