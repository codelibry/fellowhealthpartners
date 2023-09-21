<?php /* Template Name: Testimonials */

get_header();
global $post;
$testimonials = new WP_Query( array( 
    'post_type' => 'testimonials', 
    'posts_per_page' => -1,
    'orderby' => 'menu_order',
    'order' => 'ASC'
));

?>

	<main id="primary" class="site-main">
        <div class="container">
            <div class="entry-content">
                <?php if ($testimonials->have_posts()):?>
                    <div class="vc_row wpb_row section-paddings template-testimonials">
                        <div class="testimonials-grid">
                            <?php while($testimonials->have_posts()): $testimonials->the_post();
                                $position = get_field('testimonials_position', $post->ID );
                                $location = get_field('testimonials_location', $post->ID );
                            ?>
                                <div class="testimonials-grid__item">
                                    <div class="inner">
                                    <?php if(get_the_title() !== '' || $position || $location):?>
                                        <header class="testimonials-grid__header">
                                            <?php if(get_the_title()):?>
                                                <h3><?php the_title();?></h3>
                                            <?php endif;?>

                                            <?php if($position):?>
                                                <p><span><?php echo $position;?></span></p>
                                            <?php endif;?>

                                            <?php if($location):?>
                                                <p><span><?php echo $location;?></span></p>
                                            <?php endif;?>

                            
                                        </header>

                                    <?php endif;?>

                                    <div class="testimonials-grid__content">
                                            <?php the_content();?>
                                        </div>
                                        </div>
                                </div>
                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>  
                        </div>

                        <div class="text-center">
                            <a href="#" class="button load-more arrow-right">Load more</a>
                        </div>
                    </div>
                <?php endif;?>
            </div>
        </div>
	</main><!-- #main -->

<?php
get_footer();

