<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package fellow
 */

get_header();
?>

	<main id="primary" class="site-main">
        <div class="container">
            <div class="d-lg-flex section-paddings has-sidebar">
                <div class="main-content">
                  
                        <?php
                        if ( have_posts() ) :

              
								?>  
								<header class="blog-header">
								<div class="fellow-heading"><h1 class="title"><?php the_archive_title() ?></h1></div>
								<ul class="socials">
									<li><a href="<?php echo $fellow_options['linkedin'];?>"><img src="<?php echo get_template_directory_uri(); ?>/images/linkedin.svg" alt=""></a></li>
									<li><a href="<?php echo $fellow_options['mail'];?>"><img src="<?php echo get_template_directory_uri(); ?>/images/mail.svg" alt=""></a></li>
								</ul>
							</header>
                              
                                <?php
                     
                            /* Start the Loop */
                            while ( have_posts() ) :
                                the_post();?>

                                    <article id="post-<?php the_ID(); ?>" <?php post_class('post-item'); ?>>
                          
                                        <h3 class="post-title"><a href="<?php echo get_permalink();?>"><?php the_title();?></a></h3>

                                        <div class="post-content">
                                            <?php
                                                the_excerpt();
                                            ?>
                                        </div><!-- .post-content -->

                                     
                                        <div class="post-footer">
                                            <div class="post-date"><?php echo get_the_date();?></div>
                                            <div class="post-link"><a href="<?php echo get_permalink();?>" class="button simple arrow-right">Read All</a></div>
                                        </div>
                                    </article><!-- #post-<?php the_ID(); ?> -->
                            <?php endwhile;

                        wp_pagenavi(); 

                        else :

                            get_template_part( 'template-parts/content', 'none' );

                        endif;
                        ?>
                   
                </div>

                <?php get_sidebar();?>
            </div>
                
        </div>
	</main><!-- #main -->
<?php

get_footer();
