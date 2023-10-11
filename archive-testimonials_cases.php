<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package fellow
 */

get_header();

// Query posts from both "testimonials" and "case-studies" categories.
$args = array(
    'post_type' => 'testimonials_cases',
    'posts_per_page' => -1,
    'tax_query' => array(
        'relation' => 'OR', // Include posts from either of the two categories.
        array(
            'taxonomy' => 'testimonials_category',
            'field' => 'slug',
            'terms' => array('testimonials'),
        ),
        array(
            'taxonomy' => 'testimonials_category',
            'field' => 'slug',
            'terms' => array('case-studies'),
        ),
    ),
);
$the_query = new WP_Query($args);
?>

<main id="primary" class="site-main">
    <?php get_template_part('template-parts/breadcrumbs/breadcrumbs'); ?>
    <div class="container">
        <div class="testimonials__archive section section--spacing--lg">
            <div class="title_block mb-60">
                <h1><?php the_archive_title(); ?></h1>
            </div>
            <?php if ($the_query->have_posts()) : ?>
                <div class="main-content row">
                    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                        <?php if (has_term('testimonials', 'testimonials_category')) : ?>
                            <?php get_template_part('template-parts/card/testimonial_card'); ?>
                        <?php elseif (has_term('case-studies', 'testimonials_category')) : ?>
                            <?php get_template_part('template-parts/card/case_card'); ?>
                        <?php endif; ?>
                    <?php endwhile; ?>
                </div>
            <?php else : ?>
                <div class="main-content row">
                    <h3><?php _e('No Testimonials & Case Studies', 'fhp'); ?></h3>
                </div>
            <?php endif; ?>
        </div>
        <?php echo get_template_part('template-parts/parts/cases_popup'); ?>
    </div>
</main><!-- #main -->
<?php

get_footer();
