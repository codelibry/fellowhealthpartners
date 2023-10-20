<?php
$post_class = 'post-item section section--spacing--md';
?>
<div class="line"></div>
<article id="post-<?php the_ID(); ?>" <?php post_class($post_class); ?>>
    <h3 class="post-item__title h5">
        <a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
    </h3>
    <div class="content-block text-color-gray">
        <?php the_excerpt(); ?>
    </div><!-- .post-content -->
    <div class="post-footer d-flex justify-content-between mt-2 mt-sm-4">
        <span class="post-date text--size--17 text-color-gray"><?php echo get_the_date(); ?></span>
        <div class="post-link">
            <a href="<?php echo get_permalink(); ?>" class="button text-color-primary d-flex align-items-center p-0">
                <?php _e('Read All'); ?>
                <?php echo get_inline_svg('arrows/arrow-right.svg'); ?>
            </a>
        </div>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->