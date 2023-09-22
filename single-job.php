<?php 
get_header();

function encodeURI($uri)
{
    return preg_replace_callback("{[^0-9a-z_.!~*'();,/?:@&=+$#-]}i", function ($m) {
        return sprintf('%%%02X', ord($m[0]));
    }, $uri);
}

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

	<main id="primary" class="site-main">
        <div class="container section-paddings">
            <div class="single-header full">
                <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
                    <?php if(function_exists('bcn_display'))
                    {
                        bcn_display();
                    }?>
                </div>

                <a href="/careers/" class="back-to-category">Back to Careers <svg width="16" height="13" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M5.08349 9.08398L1.3335 5.33398M1.3335 5.33398L5.08349 1.58398M1.3335 5.33398H11.3335C13.1744 5.33398 14.6668 6.82637 14.6668 8.66731V8.66731C14.6668 10.5083 13.1744 12.0006 11.3335 12.0006H9.66682" stroke="#A1A7B2" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                </a>
            </div>

          
            <div class="fellow-heading"><h2 class="title"><?php the_title();?></h2></div>

            <div class="job">
                <header class="job-header">
                    <div class="d-md-flex justify-content-between has-2-cols align-items-center">
                        <div class="job-description">
                            <?php echo the_content();?>
                        </div>

                        <div class="job-apply">
                            <a href="<?php echo '/application-for-employment/?job_title=' . encodeURI($the_title) . '&salaryType=' . $salary . '&emp=' . $emp ;?>" class="button " target="_blank">Apply Now</a>
                        </div>
                    </div>  
                </header>


                <div class="job-body">
                    <div class="job-col">
                        <?php if(get_field('job_primary_responsibilities')):?>
                            <section>
                                <h3 class="title">Primary Responsibilities</h3>
                                <?php echo get_field('job_primary_responsibilities');?>
                            </section>
                        <?php endif;?>

                        <?php if(get_field('job_educationexperience')):?>
                            <section>
                                <h3 class="title">Education/Experience</h3>
                                <?php echo  get_field('job_educationexperience');?>
                            </section>
                        <?php endif;?>
                    </div>


                    <div class="job-col">
                        <?php if(get_field('job_skillsqualifications')):?>
                            <section>
                                <h3 class="title">Skills/Qualifications</h3>
                                <?php echo get_field('job_skillsqualifications');?>
                            </section>
                        <?php endif;?>
                    </div>

                </div>


                <footer class="job-footer">
                    <div class="d-md-flex justify-content-between has-2-cols align-items-center">
                        <div class="job-description">
                            <?php echo get_field('job_description');?>
                        </div>

                        <div class="job-apply">
                            <a href="<?php echo '/application-for-employment/?job_title=' . encodeURI($the_title) . '&salaryType=' . $salary . '&emp=' . $emp ;?>" class="button " target="_blank">Apply Now</a>
                        </div>
                    </div>  
                </footer>
            </div><!-- .job -->
       
        </div><!-- .container -->
	</main><!-- #main -->
<?php
get_footer();


