<?php
$the_title = get_the_title();

$salary = 'ds';
$emp = 'full';

if ($the_title == 'Account Support Associate' || $the_title == 'Revenue Cycle Associate' ||  $the_title == 'Client Onboarding Associate') :
    $salary = 'hr';
endif;

if ($the_title == 'Revenue Cycle Associate' || $the_title == 'Account Support Associate') :
    $emp = 'both';
endif;
?>

<div class="col-12 col-md-6">
    <div class="card card--careers bg--white">
        <h3 class="h5 text-color-black"><a href="<?php echo the_permalink(); ?>"><?php echo $the_title; ?></a></h3>
        <div class="line"></div>
        <?php if (get_the_excerpt()) : ?>
            <div class="description text-color-gray">
                <?php echo the_excerpt(); ?>
            </div>
        <?php endif; ?>
        <div class="buttons row">
            <div class="col-6">
                <a href="<?php echo the_permalink(); ?>" class="button button--fluid bg--gradient-orange text-color-white font--weight--500"><?php _e('Read More', 'fhp'); ?></a>
            </div>
            <div class="col-6">
                <a href="<?php echo '/application-for-employment/?job_title=' . encodeURI($the_title) . '&salaryType=' . $salary . '&emp=' . $emp; ?>" class="button button--fluid button--outline font--weight--500" target="_blank"><?php _e('Apply Now', 'fhp'); ?></a>
            </div>
        </div>
    </div>
</div>