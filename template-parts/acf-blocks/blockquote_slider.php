<?php
$block_title = get_sub_field('block_title');
$button = get_sub_field('button');
$choose_testimonial = get_sub_field('choose_testimonial');
?>
<section class="blockquote_slider mb-150">
    <div class="container">
        <?php if ($block_title || $button) : ?>
            <div class="blockquote_slider__top">
                <div class="row">
                    <?php if ($block_title) : ?>
                        <div class="col-lg-7 blockquote_slider__title">
                            <h2 class="h3"><?php echo $block_title; ?></h2>
                        </div>
                    <?php endif; ?>
                    <?php if ($button) : ?>
                        <div class="col-lg-5 blockquote_slider__button d-flex">
                            <a href="<?php echo $button['url']; ?>" class="button button--outline text-color-primary" target="<?php echo $button['target']; ?>"><?php echo $button['title']; ?></a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
        <?php if ($choose_testimonial) : ?>
            <div class="blockquote_slider__list">
                <?php foreach ($choose_testimonial as $row) : ?>
                    <?php get_template_part('template-parts/parts/blockquote_item', '', array('item' => $row)); ?>
                <?php endforeach;
                wp_reset_postdata() ?>
            </div>
        <?php endif; ?>
    </div>
</section>