<?php /* Template Name: Careers */
get_header();
$hero_title = get_field('title_block');
$hero_content = get_field('content_block');
$hero_video = get_field('video_block');

$careers = new WP_Query(array(
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
    <?php get_template_part('template-parts/breadcrumbs/breadcrumbs'); ?>
    <div class="container">
        <div class="entry-content">
            <?php if ($careers->have_posts()) : ?>

                <section class="careers__hero">
                    <div class="row d-md-flex">
                        <div class="column">
                            <div class="title_block">
                                <h1 class="font--weight--500">
                                    <?php echo $hero_title; ?>
                                </h1>
                            </div>
                            <div class="content-block font--weight--500">
                                <?php echo $hero_content; ?>
                            </div>
                        </div>
                        <div class="column">
                            <div class="video-block">
                                <div class="plyr__video-embed player-main">
                                    <?php echo $hero_video; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <div class="vc_row wpb_row section-paddings">

                    <div class="fellow-heading">
                        <h2 class="font--weight--500">Job Openings</h2>
                    </div>

                    <div class="careers-grid">
                        <?php while ($careers->have_posts()) : $careers->the_post();
                            $the_title = get_the_title();

                            $salary = 'ds';
                            $emp = 'full';

                            if ($the_title == 'Account Support Associate' || $the_title == 'Revenue Cycle Associate' ||  $the_title == 'Client Onboarding Associate') {
                                $salary = 'hr';
                            }

                            if ($the_title == 'Revenue Cycle Associate' || $the_title == 'Account Support Associate') {
                                $emp = 'both';
                            }
                        ?>
                            <div class="careers-item">
                                <h3 class="title"><a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <div class="line"></div>
                                <div class="description text--size--21 font--weight--500">
                                    <?php echo the_excerpt(); ?>
                                </div>

                                <div class="buttons">
                                    <a href="<?php echo the_permalink(); ?>" class="button">Read More</a>
                                    <a href="<?php echo '/application-for-employment/?job_title=' . encodeURI($the_title) . '&salaryType=' . $salary . '&emp=' . $emp; ?>" class="button outlined" target="_blank">Apply Now</a>
                                </div>
                            </div>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    </div><!-- .careers-grid-->
                </div><!-- .vc_row -->
            <?php endif; ?>
        </div><!-- .entry-content -->

    </div><!-- .container -->
</main><!-- #main -->

<?php
get_footer();
