<?php
/*
* Template Name: News Page
*/

get_header();

$categories = get_categories(array(
    'type' => 'post',
));

$args = [
    'posts_per_page' => -1,
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
                                    <button class="post-filters__button filter-active" data-target="all">
                                        <?php _e('All'); ?>
                                        <span class="post__counter bg--white text--size--15">
                                            <?php echo $query->post_count; ?>
                                        </span>
                                    </button>
                                    <?php foreach ($categories as $category) : ?>
                                        <button class="post-filters__button " data-target="<?php echo $category->slug; ?>">
                                            <?php if ($category->slug == 'thought-leadership-for-the-healthcare-industry') : ?>
                                                <?php _e('Thought Leadership'); ?>
                                            <?php else : ?>
                                                <?php _e($category->name); ?>
                                            <?php endif; ?>
                                            <span class="post__counter bg--white text--size--15">
                                                <?php echo $category->count; ?>
                                            </span>
                                        </button>
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
                                <?php
                                $count = 0;
                                /* Start the Loop */
                                while ($query->have_posts()) :
                                    $query->the_post(); ?>
                                    <?php if ($count < 3) : ?>
                                        <?php $post_class = 'post-item section section--spacing--md filter-show-post show-post'; ?>
                                    <?php else : ?>
                                        <?php $post_class = 'post-item section section--spacing--md filter-show-post'; ?>
                                    <?php endif; ?>
                                    <div class="line"></div>
                                    <article id="post-<?php the_ID(); ?>" <?php post_class($post_class); ?>>
                                        <h3 class="post-item__title h5">
                                            <a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
                                        </h3>
                                        <div class="content-block text-color-gray">
                                            <?php the_excerpt(); ?>
                                        </div><!-- .post-content -->
                                        <div class="post-footer d-flex justify-content-between mt-2 mt-sm-4">
                                            <span class="post-date text--size--17 text-color-gray"><?php echo get_the_date(); ?></span>
                                            <div class="post-link">
                                                <a href="<?php echo get_permalink(); ?>" class="button text-color-primary d-flex align-items-center p-0">
                                                    <?php _e('Read All'); ?>
                                                    <?php echo get_inline_svg('arrows/arrow-right.svg'); ?>
                                                </a>
                                            </div>
                                        </div>
                                    </article><!-- #post-<?php the_ID(); ?> -->
                                    <?php $count++; ?>
                                <?php endwhile;
                                wp_reset_postdata(); ?>
                                <div class="post-show-more d-flex">
                                    <div class="show-more-btn d-flex button button--outline text-color-primary mx-auto">
                                        <?php echo get_inline_svg('Load.svg'); ?>
                                        <span class="btn__name"><?php _e('Show more'); ?></span>
                                        <span class="btn__count">(<?php echo $query->post_count; ?>)</span>
                                    </div>
                                </div>
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
            <?php echo do_shortcode('[as-seen-in-list]'); ?>
        </section>
    </div>
</main><!-- #main -->
<?php

get_footer();
