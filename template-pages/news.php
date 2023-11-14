<?php
/*
* Template Name: News Page
*/

get_header();

$current_page = (get_query_var('paged')) ? get_query_var('paged') : 1;

$categories = get_categories(array(
    'type' => 'post',
    'hide_empty' => true,
));

$count_posts = wp_count_posts();

$args = [
    'type' => 'post',
    'posts_per_page' => 3,
    'paged' => $current_page,
    'status' => 'publish',
    'order_by' => 'date',
    'order' => 'DESC',
];

$query = new WP_Query($args);

?>

<main id="primary" class="site-main">
    <?php get_template_part('template-parts/breadcrumbs/breadcrumbs'); ?>
    <div class="news_page">
        <div class="container">
            <div class="has-sidebar mt-80">
                <div class="main-content">
                    <div class="row">
                        <?php if ($query->have_posts()) : ?>
                            <div class="col-lg-7">
                                <div id="post-filters" class="post-filters d-flex mb-80">
                                    <a class="post-filters__button filter-active cat-list_item active" href="#!" data-category="all">All
                                        <span class="post__counter bg--white text--size--15">
                                            <?php echo $count_posts->publish; ?>
                                        </span>
                                    </a>
                                    <?php foreach ($categories as $category) : ?>
                                        <a class="post-filters__button cat-list_item" data-target="<?php echo $category->slug; ?>" href="#<?= $category->slug; ?>" data-category="<?= $category->term_id; ?>">
                                            <?php if ($category->slug == 'thought-leadership-for-the-healthcare-industry') : ?>
                                                <?php _e('Thought Leadership'); ?>
                                            <?php else : ?>
                                                <?php _e($category->name); ?>
                                            <?php endif; ?>
                                            <span class="post__counter bg--white text--size--15">
                                                <?php echo $category->count; ?>
                                            </span>
                                        </a>
                                    <?php endforeach; ?>
                                </div>

                                <div class="blog-header">
                                    <div class="fellow-heading mb-80">
                                        <div class="post-filters__titles">
                                            <div class="title-active filter-title title-all">
                                                <h2 class="text-color-black">
                                                    News & Thought Leadership
                                                </h2>
                                            </div>
                                            <?php foreach ($categories as $idx => $category) : ?>
                                                <div class="filter-title title-<?php echo $category->slug; ?>">
                                                    <?php echo _e($category->description); ?>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="articles__row">
                                    <?php

                                    /* Start the Loop */
                                    while ($query->have_posts()) :
                                        $query->the_post(); ?>
                                        <?php echo get_template_part('template-parts/parts/news_item'); ?>
                                    <?php endwhile;
                                    wp_reset_postdata(); ?>
                                </div>
                                <?php if ($query->max_num_pages > 1) : ?>
                                    <script>
                                        var ajaxurl = '<?php echo site_url(); ?>/wp-admin/admin-ajax.php';
                                        var posts_vars = '<?php echo serialize($query->query_vars); ?>';
                                        var current_page = <?php echo $current_page; ?>;
                                        var max_pages = '<?php echo $query->max_num_pages; ?>';
                                    </script>
                                    <div class="post-show-more d-flex">
                                        <div class="show-more-btn d-flex button button--outline text-color-primary mx-auto">
                                            <?php echo get_inline_svg('Load.svg'); ?>
                                            <span class="btn__name"><?php _e('Show more'); ?></span>
                                            <span class="btn__count">(<?php echo $count_posts->publish; ?>)</span>
                                        </div>
                                    </div>
                                <?php endif; ?>
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
        <div class="container">
            <div class="fellow-heading mt-120 mb-74">
                <h2 class="h3"><?php _e('As seen in', 'fhp'); ?></h2>
            </div>
        </div>
        <section class="list_logos">
            <div class="section-bg bg--secondary"></div>
            <div class="list_logos-inner">
                <?php echo do_shortcode('[as-seen-in-list]'); ?>
            </div>
        </section>
    </div>
</main><!-- #main -->

<?php

get_footer();
