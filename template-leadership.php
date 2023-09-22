<?php /* Template Name: Leadership */ 
get_header();
?>
 <?php 
            $all = new WP_Query( array( 
                'post_type' => 'leadership', 
                'posts_per_page' => -1,
            ));

            $ceo = new WP_Query( array( 
                'post_type' => 'leadership', 
                'posts_per_page' => -1,
                'meta_key'		=> 'ceo',
                'meta_value'	=> 1
            ));

            $leadership = new WP_Query( array( 
                'post_type' => 'leadership', 
                'posts_per_page' => -1,
                'orderby' => 'menu_order',
                'meta_query' => array(
                    array (
                        'key'     => 'leadership_group',
                        'value'   => 'leadership',
                        'compare' => 'LIKE',
                    ),
                    array(
                        'key'     => 'ceo',
                        'value'   => 1,
                        'compare' => '!=',
                    )
                )
            ));


            $management = new WP_Query( array( 
                'post_type' => 'leadership', 
                'posts_per_page' => -1,
                'orderby' => 'menu_order',
                'meta_query' => array(
                    array(
                        'key'     => 'leadership_group',
                        'value'   => 'management',
                        'compare' => 'LIKE',
                    )
                 
                )
            ));

            $advisory = new WP_Query( array( 
                'post_type' => 'leadership', 
                'posts_per_page' => -1,
                'orderby' => 'menu_order',
                'meta_query' => array(
                    array(
                        'key'     => 'leadership_group',
                        'value'   => 'advisory',
                        'compare' => 'LIKE',
                    )
                 
                )
            ));

            $directors = new WP_Query( array( 
                'post_type' => 'leadership', 
                'posts_per_page' => -1,
                'orderby' => 'menu_order',
                'meta_query' => array(
                    array(
                    'key'     => 'leadership_group',
                    'value'   => 'directors',
                    'compare' => 'LIKE',
                    )
                )
            ));

        //     echo '<pre>';
        //    print_r($ceo->posts);
        //  // print_r(get_post_meta(320));
        //     echo '</pre>';
        ?>


        <?php 
        $ceo_post = $ceo->posts[0];
        if(!empty($ceo_post)):
                $ceo_id = $ceo_post->ID;
            ?>
            <section class="hero-unit wave-bottom" style="background-image: url(<?php echo get_field('ceo_hero_image', $ceo_id);?>);">
                    <div class="overlay"></div>

                    <a href="#id<?php echo $ceo_id;?>" class="cover-link js-popup"></a>

                    <?php if(get_field('ceo_hero_mobile', $ceo_id)):?>
                        <img src="<?php echo aq_resize(get_field('ceo_hero_mobile', $ceo_id), 775, 554, true, true, true );?>" alt="" class="d-md-none hero-unit__mobile-image">
                    <?php endif;?>

                    <div class="container">
                        <div class="hero-unit__content">
                            <div class="hero-unit__items">
                                <div class="hero-unit__item">
                                     <h1 class="hero-unit__title">Leadership</h1>

                                    <div class="leaderhip-header">
                                        <div class="leadership-about">
                                            <div class="leadership-name"><?php echo $ceo_post->post_title;?></div>

                                            <?php if(get_field('leadeship_position', $ceo_id)):?>
                                                <div class="leadership-position"><?php echo get_field('leadeship_position', $ceo_id)?></div>
                                            <?php endif;?>
                                        </div>

                                        <?php if(get_field('leadership_linkedin', $ceo_id) || get_field('leadership_email', $ceo_id)):?>
                                            <div class="leadership-socials">
                                                <?php if(get_field('leadership_linkedin', $ceo_id)):?>
                                                    <a href="<?php echo get_field('leadership_linkedin', $ceo_id);?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/linkedin.svg" alt=""></a>
                                                <?php endif;?>


                                                <?php if(get_field('leadership_email', $ceo_id)):?>
                                                    <a href="mailto:<?php echo get_field('leadership_email', $ceo_id);?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/mail.svg" alt=""></a>
                                                <?php endif;?>

                                                <a href="#id<?php echo $ceo_id;?>" class="js-popup" style="font-weight: 900; line-height: 18px; text-decoration: none;">
                                                    BIO
                                                </a>

                                            </div>
                                        <?php endif;?>
                                    </div>
                                 
                                    <?php if(get_field('leadership_short_text', $ceo_id)):?>
                                        <div class="hero-unit__description"><p><?php echo get_field('leadership_short_text', $ceo_id)?></p></div>
                                    <?php endif;?>

                                </div>
                            </div>
                        </div>
                    </div>
            </section>
        <?php endif;?>

	<main id="primary" class="site-main">
        <div class="container">
            <div class="entry-content">
                <?php if ($leadership->have_posts()):?>
                    <div class="vc_row wpb_row section-paddings">
                        <div class="leadership-grid">
                            <?php while($leadership->have_posts()): $leadership->the_post(); ?>
                                <div class="leadership-item">
                                    <?php if(get_the_content()):?>
                                        <a href="#id<?php echo $post->ID;?>" class="cover-link js-popup"></a>
                                    <?php endif;?>
                                    <?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) : ?>
                                        <div class="leadership-image"><img src="<?php echo get_the_post_thumbnail_url($post->ID);?>" alt=""></div>
                                    <?php endif; ?>

                                    <div class="leadership-content">
                                        <div class="leaderhip-header">
                                            <div class="leadership-about">
                                                <div class="leadership-name"><?php the_title();?></div>

                                                <?php if(get_field('leadeship_position')):?>
                                                    <div class="leadership-position"><?php echo get_field('leadeship_position')?></div>
                                                <?php endif;?>
                                            </div>

                                            <?php if(get_field('leadership_linkedin') || get_field('leadership_email') || get_the_content()):?>
                                                <div class="leadership-socials">
                                                    <?php if(get_field('leadership_linkedin')):?>
                                                        <a href="<?php echo get_field('leadership_linkedin');?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/linkedin.svg" alt=""></a>
                                                    <?php endif;?>


                                                    <?php if(get_field('leadership_email')):?>
                                                        <a href="mailto:<?php echo get_field('leadership_email');?>"><img src="<?php echo get_template_directory_uri(); ?>/images/mail.svg" alt=""></a>
                                                    <?php endif;?>

                                                    <?php if(get_the_content()):?>
                                                        <a href="#id<?php echo $post->ID;?>" class="js-popup" style="font-weight: 900; line-height: 16px; text-decoration: none;">BIO</a>
                                                    <?php endif;?>
                                                </div>
                                            <?php endif;?>
                                        </div>
                                    </div>

                                </div>
                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>  
                        </div><!-- .leadership-grid-->
                    </div><!-- .vc_row -->
                <?php endif;?>


                <?php if ($management->have_posts()):?>
                    <div class="vc_row wpb_row section-paddings">
                        <div class="fellow-heading"><h2 class="title">Management</h2></div>
                        <div class="leadership-grid">
                            <?php while($management->have_posts()): $management->the_post(); ?>
                                <div class="leadership-item">
                                    <?php if(get_the_content()):?>
                                        <a href="#id<?php echo $post->ID;?>" class="cover-link js-popup"></a>
                                    <?php endif;?>
                                    <?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) : ?>
                                        <div class="leadership-image"><img src="<?php echo get_the_post_thumbnail_url($post->ID);?>" alt=""></div>
                                    <?php endif; ?>

                                    <div class="leadership-content">
                                        <div class="leaderhip-header">
                                            <div class="leadership-about">
                                                <div class="leadership-name"><?php the_title();?></div>

                                                <?php if(get_field('leadeship_position')):?>
                                                    <div class="leadership-position"><?php echo get_field('leadeship_position')?></div>
                                                <?php endif;?>
                                            </div>

                                            <?php if(get_field('leadership_linkedin') || get_field('leadership_email') || get_the_content()):?>
                                                <div class="leadership-socials">
                                                    <?php if(get_field('leadership_linkedin')):?>
                                                        <a href="<?php echo get_field('leadership_linkedin');?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/linkedin.svg" alt=""></a>
                                                    <?php endif;?>


                                                    <?php if(get_field('leadership_email')):?>
                                                        <a href="mailto:<?php echo get_field('leadership_email');?>"><img src="<?php echo get_template_directory_uri(); ?>/images/mail.svg" alt=""></a>
                                                    <?php endif;?>

                                                    <?php if(get_the_content()):?>
                                                        <a href="#id<?php echo $post->ID;?>" class="js-popup" style="font-weight: 900; line-height: 16px; text-decoration: none;">BIO</a>
                                                    <?php endif;?>
                                                </div>
                                            <?php endif;?>
                                        </div>
                                    </div>

                                </div>
                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>  
                        </div><!-- .leadership-grid-->
                    </div><!-- .vc_row -->
                <?php endif;?>
				
                <?php if ($advisory->have_posts()):?>
                    <div class="vc_row wpb_row section-paddings">
                        <div class="fellow-heading"><h2 class="title">Advisory Board</h2></div>
                        <div class="leadership-grid">
                            <?php while($advisory->have_posts()): $advisory->the_post(); ?>
                                <div class="leadership-item">
                                    <?php if(get_the_content()):?>
                                        <a href="#id<?php echo $post->ID;?>" class="cover-link js-popup"></a>
                                    <?php endif;?>
                                    <?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) : ?>
                                        <div class="leadership-image"><img src="<?php echo get_the_post_thumbnail_url($post->ID);?>" alt=""></div>
                                    <?php endif; ?>

                                    <div class="leadership-content">
                                        <div class="leaderhip-header">
                                            <div class="leadership-about">
                                                <div class="leadership-name"><?php the_title();?></div>

                                                <?php if(get_field('leadeship_position')):?>
                                                    <div class="leadership-position"><?php echo get_field('leadeship_position')?></div>
                                                <?php endif;?>
                                            </div>

                                            <?php if(get_field('leadership_linkedin') || get_field('leadership_email') || get_the_content()):?>
                                                <div class="leadership-socials">
                                                    <?php if(get_field('leadership_linkedin')):?>
                                                        <a href="<?php echo get_field('leadership_linkedin');?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/linkedin.svg" alt=""></a>
                                                    <?php endif;?>


                                                    <?php if(get_field('leadership_email')):?>
                                                        <a href="mailto:<?php echo get_field('leadership_email');?>"><img src="<?php echo get_template_directory_uri(); ?>/images/mail.svg" alt=""></a>
                                                    <?php endif;?>

                                                    <?php if(get_the_content()):?>
                                                        <a href="#id<?php echo $post->ID;?>" class="js-popup" style="font-weight: 900; line-height: 16px; text-decoration: none;">BIO</a>
                                                    <?php endif;?>
                                                </div>
                                            <?php endif;?>
                                        </div>
                                    </div>

                                </div>
                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>  
                        </div><!-- .leadership-grid-->
                    </div><!-- .vc_row -->
                <?php endif;?>				
				

          
                <?php if ($directors->have_posts()):?>
                    <div class="vc_row wpb_row section-paddings">
                        <div class="fellow-heading"><h2 class="title">our board of directors</h2></div>
                        <div class="leadership-grid boards">
                            <?php while($directors->have_posts()): $directors->the_post(); ?>
                                <div class="leadership-item">
                                    <?php if(get_the_content()):?>
                                        <a href="#id<?php echo $post->ID;?>" class="cover-link js-popup"></a>
                                    <?php endif;?>
                                    <div class="leadership-content">
                                        <div class="leaderhip-header">
                                            <div class="leadership-about">
                                                <div class="leadership-name"><?php the_title();?></div>
                                            </div>

                                            <?php if(get_field('leadership_linkedin') || get_field('leadership_email') || get_the_content()):?>
                                                <div class="leadership-socials">
                                                    <?php if(get_field('leadership_linkedin')):?>
                                                        <a href="<?php echo get_field('leadership_linkedin');?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/linkedin.svg" alt=""></a>
                                                    <?php endif;?>


                                                    <?php if(get_field('leadership_email')):?>
                                                        <a href="mailto:<?php echo get_field('leadership_email');?>"  target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/mail.svg" alt=""></a>
                                                    <?php endif;?>

                                                    <?php if(get_the_content()):?>
                                                        <a href="#id<?php echo $post->ID;?>" class="js-popup" style="font-weight: 900; line-height: 16px; text-decoration: none;">BIO</a>
                                                    <?php endif;?>
                                                </div>
                                            <?php endif;?>
                                        </div>
                                    </div>

                                </div>
                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>  
                        </div><!-- .leadership-grid-->
                    </div><!-- .vc_row -->
                <?php endif;?>

            </div><!-- .entry-content -->
        
              
        </div><!-- .container -->
	</main><!-- #main -->

    <!-- popups -->
    <?php if ($all->have_posts()):?>    
        <?php while($all->have_posts()): $all->the_post(); ?>
            <?php if(get_the_content()):?>
                <div id="id<?php echo $post->ID;?>" class="mfp-hide">
                    <div class="inner">
                    <div class="leadership-popup">
                        <div class="leadership-popup-left">
                            <?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) : 
                                   $post_thumbnail = aq_resize(get_the_post_thumbnail_url($post->ID), 516, 301, true, true, true );
                                ?>
                                <div class="leadership-popup-image curved-image"><img src="<?php echo $post_thumbnail;?>" alt=""></div> 
                            <?php endif; ?>

                            <div class="leaderhip-header">
                                <div class="leadership-about">
                                    <div class="leadership-name"><?php the_title();?></div>
                                    <?php if(get_field('leadeship_position')):?>
                                    <div class="leadership-position"><?php echo get_field('leadeship_position')?></div>
                                <?php endif;?>
                                </div>

                                <?php if(get_field('leadership_linkedin') || get_field('leadership_email')):?>
                                    <div class="leadership-socials">
                                        <?php if(get_field('leadership_linkedin')):?>
                                            <a href="<?php echo get_field('leadership_linkedin');?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/linkedin.svg" alt=""></a>
                                        <?php endif;?>


                                        <?php if(get_field('leadership_email')):?>
                                            <a href="mailto:<?php echo get_field('leadership_email');?>"  target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/mail.svg" alt=""></a>
                                        <?php endif;?>
                                    </div>
                                <?php endif;?>
                            </div>
                        </div>
                        <div class="leadership-popup-right">
                          <?php the_content();?>
                        </div>
                    </div>
                  
                    </div>
                </div>
            <?php endif;?>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>  
     <?php endif;?>
<?php
get_footer();
