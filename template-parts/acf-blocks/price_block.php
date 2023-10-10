<?php
$title = get_sub_field('title');
$subtitle = get_sub_field('subtitle');
$subtitle_text = get_sub_field('subtitle_text');
$content = get_sub_field('main_content');
$price = get_sub_field('card_price');
$price_text = get_sub_field('card_text');
?>
<section class="price_block section section--spacing--lg mt-75">
    <div class="container">
        <?php if ($title) : ?>
            <div class="price_block__top">
                <div class="title_block">
                    <h2 class="h1"><?php echo $title; ?></h2>
                </div>
            </div>
        <?php endif; ?>
        <div class="line mt-60 mb-60"></div>
        <?php if ($subtitle || $content) : ?>
            <div class="price_block__main">
                <div class="row">
                    <div class="col-lg-5">
                        <?php if ($subtitle) : ?>
                            <div class="subtitle_block">
                                <h3 class="h4 text-color-primary"><?php echo $subtitle; ?></h3>
                                <?php if ($subtitle_text) : ?>
                                    <p><?php echo $subtitle_text; ?></p>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-7 mt-2 mt-lg-0">
                        <div class="price_block__inner">
                            <?php if ($price) : ?>
                                <div class="price_block__card card card--price">
                                    <div class="row">
                                        <div class="col-8">
                                            <h3 class="h4"><?php _e('Course price', 'fhp'); ?></h3>
                                        </div>
                                        <div class="col-4">
                                            <span class="h5 text-color-primary font--weight--900"><?php echo $price; ?></span>
                                        </div>
                                    </div>
                                    <?php if ($price_text) : ?>
                                        <p class="text-color-gray"><?php echo $price_text; ?></p>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                            <?php if ($content) : ?>
                                <div class="content-block">
                                    <?php echo $content; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>