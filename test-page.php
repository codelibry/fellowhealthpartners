<?php
    /*
     * Template Name: Test Page
    */
    
    get_header();
?>

    <main id="primary" class="site-main">
        <div class="container">
            <div class="d-lg-flex section-paddings has-sidebar mt-0">
                <div class="main-content">
                    
                    <?php
                        $args = [
                            'posts_per_page' => -1,
                        ];
                        
                        $query = new WP_Query($args);
                        
                        $categories = get_categories(array(
                            'type' => 'post',
                        ));
                        
                        if ($query->have_posts()) :?>
                            <div id="post-filters">
                                <button class="post-filters__button filter-active" data-target="all">
                                    <?php _e('All'); ?>
                                    <span class="post__counter">
                                        <?php echo $query->post_count; ?>
                                    </span>
                                </button>
                                <?php foreach ($categories as $category) : ?>
                                    <button class="post-filters__button"
                                            data-target="<?php echo $category->slug; ?>">
                                        <?php if ($category->slug == 'thought-leadership-for-the-healthcare-industry') : ?>
                                            <?php _e('Thought Leadership'); ?>
                                        <?php else : ?>
                                            <?php _e($category->name); ?>
                                        <?php endif; ?>
                                        <span class="post__counter">
                                            <?php echo $category->count; ?>
                                        </span>
                                    </button>
                                <?php endforeach; ?>
                            </div>

                            <header class="blog-header">
                                <div class="fellow-heading">
                                    <!-- <h1 class="title">--><?php //single_post_title();
                                    ?><!--</h1>-->
                                    <div class="post-filters__titles">
                                        <div class="title-active filter-title title-all">
                                            <h2>
                                                <?php _e('News & Thought Leadership'); ?>
                                            </h2>
                                        </div>
                                        <?php foreach ($categories as $idx => $category) : ?>
                                            <div class="filter-title title-<?php echo $category->slug; ?>">
                                                <?php echo _e($category->description); ?>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
<!--                                <ul class="socials">-->
<!--                                    <li><a href="--><?php //echo $fellow_options['linkedin']; ?><!--"><img-->
<!--                                                    src="--><?php //echo get_template_directory_uri(); ?><!--/images/linkedin.svg"-->
<!--                                                    alt=""></a></li>-->
<!--                                    <li><a href="--><?php //echo $fellow_options['mail']; ?><!--"><img-->
<!--                                                    src="--><?php //echo get_template_directory_uri(); ?><!--/images/mail.svg"-->
<!--                                                    alt=""></a></li>-->
<!--                                </ul>-->
                            </header>
                            <?php
                            $count = 0;
                            /* Start the Loop */
                            while ($query->have_posts()) :
                                $query->the_post(); ?>
                                
                                <?php if ($count < 3) : ?>
                                    <?php $post_class = 'post-item filter-show-post show-post'; ?>
                                <?php else : ?>
                                    <?php $post_class = 'post-item filter-show-post'; ?>
                                <?php endif; ?>
                                
                                <article id="post-<?php the_ID(); ?>" <?php post_class($post_class); ?>>

                                    <h3 class="post-title">
                                        <a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    <div class="post-content">
                                        <?php
                                            the_excerpt();
                                        ?>
                                    </div><!-- .post-content -->

                                    <div class="post-footer">
                                        <div class="post-date"><?php echo get_the_date(); ?></div>
                                        <div class="post-link">
                                            <a href="<?php echo get_permalink(); ?>" class="button simple arrow-right">Read
                                                All</a></div>
                                    </div>
                                </article><!-- #post-<?php the_ID(); ?> -->
                                <?php $count++; ?>
                            <?php endwhile;
                            wp_reset_postdata(); ?>
                            <div class="post-show-more">
                                <div class="show-more-btn">
                                    <span class="btn__name"><?php _e('Show more'); ?></span>
                                    <span class="btn__count">(<?php echo $query->post_count; ?>)</span>
                                </div>
                            </div>
                        <?php else :
                            
                            get_template_part('template-parts/content', 'none');
                        
                        endif;
                    ?>

                </div>
                
                <?php get_sidebar(); ?>
            </div>

            <div class="fellow-heading"><h2 class="title">As seen in</h2></div>
            <?php echo do_shortcode('[as-seen-in-list]'); ?>

        </div>
    </main><!-- #main -->
<?php
    
    get_footer();
