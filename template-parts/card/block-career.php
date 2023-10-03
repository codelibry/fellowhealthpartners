<div class="col-12 col-lg-6">
    <div class="card card--careers bg--white">
        <h3 class="h5 text-color-black""><a href=" <?php echo the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <div class="line"></div>
        <div class="description text--size--21 font--weight--500 text-color-gray">
            <?php echo the_excerpt(); ?>
        </div>
        <div class="buttons row">
            <div class="col-sm-6">
                <a href="<?php echo the_permalink(); ?>" class="button button--fluid bg--gradient-orange text-color-white font--weight--500">Read More</a>
            </div>
            <div class="col-sm-6">
                <a href="<?php echo '/application-for-employment/?job_title=' . encodeURI($the_title) . '&salaryType=' . $salary . '&emp=' . $emp; ?>" class="button button--fluid button--outline font--weight--500" target="_blank">Apply Now</a>
            </div>
        </div>
    </div>
</div>