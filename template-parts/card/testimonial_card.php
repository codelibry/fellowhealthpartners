<?php
$terms = get_the_terms($post->ID, 'testimonials_category');
$position = get_field('testimonials_position', $post->ID)
?>

<div class="col-lg-6">
    <div class="card card--testimonial bg--white">
        <span class="category_type button button--sm bg--gradient-orange text-color-white font--weight--500">
            <?php echo $terms[0]->name ?>
        </span>
        <?php if (get_the_content()) : ?>
            <div class="description text-color-gray">
                <?php the_content(); ?>
            </div>
        <?php endif; ?>
        <div>
            <h3 class="h5 text-color-black"><?php the_title(); ?></h3>
            <?php if ($position) : ?>
                <p class="position text--size--18 text-color-secondary text--uppercase"><?php echo $position; ?></p>
            <?php endif; ?>
        </div>
    </div>
</div>