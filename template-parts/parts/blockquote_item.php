<?php
$testimonial_item = $args['item'];
$author_position = get_field('testimonials_position', $testimonial_item);
?>

<div class="content-block text-color-gray mb-4 mb-sm-4">
    <blockquote class="font--italic text--size--32 text-color-black">
        <div class="testimonials__listItem">
            <div class="testimonials__listItem__head">
                <div class="testimonials__listItem__text" style="-webkit-box-orient: vertical"><?php echo get_post_field('post_content', $testimonial_item); ?></div>
                <div class="testimonials__listItem__hiddenText" style="-webkit-box-orient: vertical"><?php echo get_post_field('post_content', $testimonial_item); ?></div>
            </div>
            <div class="testimonials__listItem__body">
            </div>
        </div>
        <footer class="bg--white">
            <span class="text--size--32 text-color-black"><?php echo get_the_title($testimonial_item); ?></span>
            <?php if ($author_position) : ?>
                <cite class="text--size--18 text--uppercase text-color-secondary font--normal"><?php echo $author_position; ?></cite>
            <?php endif; ?>
        </footer>
    </blockquote>
</div>