<?php
get_header();

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

<main id="primary" class="site-main">
    <?php get_template_part('template-parts/breadcrumbs/breadcrumbs'); ?>
    <div class="container">
        <div class="back_block section section--spacing--md">
            <a href="/careers/" class="back-to-category text-color-orange font--weight--500"><?php _e('Back to Careers', 'fhp'); ?>
                <svg width="16" height="13" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5.08349 9.08398L1.3335 5.33398M1.3335 5.33398L5.08349 1.58398M1.3335 5.33398H11.3335C13.1744 5.33398 14.6668 6.82637 14.6668 8.66731V8.66731C14.6668 10.5083 13.1744 12.0006 11.3335 12.0006H9.66682" stroke="#FF851F" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </a>
        </div>

        <div class="single_job">
            <div class="job-header">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="title_block">
                            <h1 class="h3 text-color-black"><?php the_title(); ?></h1>
                        </div>
                        <div class="job-apply">
                            <a href="<?php echo '/application-for-employment/?job_title=' . encodeURI($the_title) . '&salaryType=' . $salary . '&emp=' . $emp; ?>" class="button bg--gradient-orange text-color-white font--weight--500" target="_blank"><?php _e('Apply Now', 'fhp'); ?></a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="content-block text-color-gray">
                            <?php echo the_content(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="job-body row section section--spacing--lg">
                <div class="job-col col-12 col-lg-6">
                    <?php if (get_field('job_primary_responsibilities')) : ?>
                        <section>
                            <h3 class="h4 text-color--black_new"><?php _e('Primary Responsibilities', 'fhp'); ?></h3>
                            <div class="line"></div>
                            <div class="content-block text-color-gray">
                                <?php echo get_field('job_primary_responsibilities'); ?>
                            </div>
                        </section>
                    <?php endif; ?>

                    <?php if (get_field('job_educationexperience')) : ?>
                        <section class="pt-2 pt-lg-10">
                            <h3 class="h4 text-color--black_new"><?php _e('Education/Experience', 'fhp'); ?></h3>
                            <div class="line"></div>
                            <div class="content-block text-color-gray">
                                <?php echo  get_field('job_educationexperience'); ?>
                            </div>
                        </section>
                    <?php endif; ?>
                </div>

                <div class="job-col col-12 col-lg-6">
                    <?php if (get_field('job_skillsqualifications')) : ?>
                        <section>
                            <h3 class="h4 text-color--black_new"><?php _e('Skills/Qualifications', 'fhp'); ?></h3>
                            <div class="line"></div>
                            <div class="content-block text-color-gray">
                                <?php echo get_field('job_skillsqualifications'); ?>
                            </div>
                        </section>
                    <?php endif; ?>
                </div>
            </div>

            <footer class="job-footer pb-4 pb-lg-10">
                <!-- <div class="row pb-4">
                    <div class="line"></div>
                </div> -->
                <div class="row">
                    <div class="col-12 col-lg-6 job-description">
                        <div class="content-block text-color-black text--size--19">
                            <?php echo get_field('job_description'); ?>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 job-apply">
                        <a href="<?php echo '/application-for-employment/?job_title=' . encodeURI($the_title) . '&salaryType=' . $salary . '&emp=' . $emp; ?>" class="button bg--gradient-orange text-color-white font--weight--500 " target="_blank">Apply Now</a>
                    </div>
                </div>
            </footer>
        </div><!-- .job -->

    </div><!-- .container -->
</main><!-- #main -->
<?php
get_footer();
