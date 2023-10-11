<?php
$terms = get_the_terms($post->ID, 'testimonials_category');
$subtitle = get_field('case_subtitle');
?>

<div class="col-lg-12">
    <div class="card card--case bg--white">
        <div class="row">
            <div class="col-lg-8">
                <span class="category_type button button--sm bg--secondary text-color-white font--weight--500">
                    <?php echo $terms[0]->name ?>
                </span>
                <div class="title_block mb-50">
                    <h3 class="h5 text-color-black"><?php the_title(); ?></h3>
                    <?php if ($subtitle) : ?>
                        <p class="subtitle text--size--24">
                            <?php echo $subtitle; ?>
                        </p>
                    <?php endif; ?>
                </div>
                <div class="content-block">
                    <?php the_content(); ?>
                </div>
            </div>
            <div class="col-lg-4">
                <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('medium'); ?>
                <?php endif; ?>
            </div>
        </div>

    </div>
    <div class="button_block">
        <a href="<?php echo the_permalink(); ?>" class="button button--fluid button--lg bg--secondary text-color-white">
            <?php _e('View Full Case Study', 'fhp'); ?>
        </a>
    </div>
</div>