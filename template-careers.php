<?php /* Template Name: Careers */ 
get_header();
?>
 <?php 
    $careers = new WP_Query( array( 
        'post_type' => 'job', 
        'posts_per_page' => -1,
        'orderby' => 'menu_order',
    ));

    function encodeURI($uri)
    {
        return preg_replace_callback("{[^0-9a-z_.!~*'();,/?:@&=+$#-]}i", function ($m) {
            return sprintf('%%%02X', ord($m[0]));
        }, $uri);
    }
?>

	<main id="primary" class="site-main">
        <div class="container">
            <div class="entry-content">
                <?php if ($careers->have_posts()):?>
                 
                    <div class="vc_row wpb_row section-paddings">
                        
                        
                        <div class="fellow-careers-video" style=" margin: 0px 0 20px 0; position: relative; top: -40px; max-width:800px; height:auto; position:relative;">
                            <div class="vid"><img src="https://fellowhealthpartners.com/wp-content/uploads/2021/07/careers.jpg" video-url="https://www.youtube.com/embed/9rmSn9US2zo"><div class="play"><i class="fa fa-video"></i> Play video now</div></div>
                            <iframe id="video-iframe" width="100%" style="max-width:800px; display:none; position:absolute; top:0; left:0; right:0; bottom:0;" height="100%" src="" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            
                        </div>
                        <script>
                            jQuery(document).on('click tap','.fellow-careers-video img', function() {
                                console.log('playing');
                                jQuery("#video-iframe").attr('src', jQuery(this).attr('video-url') + '?autoplay=1').fadeIn(0); 
                            });
                        </script>
                        <style>
                            .fellow-careers-video .vid:hover { cursor:pointer; }   
                            .fellow-careers-video .vid img { display:block; }                            
                            .fellow-careers-video .play { width:100%; padding:10px 20px; background:#f7961f; color:#fff; text-align:center; text-transform:uppercase; font-weight:700; transition:all ease 250ms; }
                            .fellow-careers-video .vid:hover .play { color:#fff; background-color:#000;  }                            
                        </style>
                    
                    
                        <div class="fellow-heading"><h2 class="title">Job Openings</h2></div>

                        <div class="careers-grid">
                            <?php while($careers->have_posts()): $careers->the_post();
                             $the_title = get_the_title();

                             $salary = 'ds';
                             $emp = 'full';
                 
                             if($the_title == 'Account Support Associate' || $the_title == 'Revenue Cycle Associate' ||  $the_title == 'Client Onboarding Associate') {
                                 $salary = 'hr';
                             }
                 
                             if($the_title == 'Revenue Cycle Associate' || $the_title == 'Account Support Associate') {
                                 $emp = 'both';
                             }
                            ?>
                                <div class="careers-item">
                                    <h3 class="title"><a href="<?php echo the_permalink();?>"><?php the_title();?></a></h3>
                                    <div class="description">
                                        <?php echo the_excerpt();?>
                                    </div>

                                    <div class="buttons">
                                        <a href="<?php echo the_permalink();?>" class="button">Read More</a>
                                        <a href="<?php echo '/application-for-employment/?job_title=' . encodeURI($the_title) . '&salaryType=' . $salary . '&emp=' . $emp ;?>" class="button outlined" target="_blank">Apply Now</a>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>  
                        </div><!-- .careers-grid-->
                    </div><!-- .vc_row -->
                <?php endif;?>
            </div><!-- .entry-content -->
    
        </div><!-- .container -->
	</main><!-- #main -->

<?php
get_footer();


