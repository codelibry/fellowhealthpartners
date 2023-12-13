<?php
$title = get_sub_field('top_title');
$second_title = get_sub_field('top_content');
$bottom_content_left = get_sub_field('bottom_title');
$bottom_content = get_sub_field('bottom_content');
?>
<section id="advisoryservices" class="title_text_line two_titles section pt-2 pb-100 max-width">
    <div class="container">
        <div class="title_text_line__top">
            <div class="row">
                <div class="col-lg-7 mb-2 mb-lg-0">
                    <?php if ($title) : ?>
                        <h2 class="h1 text-color-black max--width--700 mr-lg-auto"><?php echo $title; ?></h2>
                    <?php endif; ?>
                </div>
                <?php if ($second_title) : ?>
                    <div class="col-lg-5 d-lg-flex">
                        <h3 class="h4 text-color-black max--width--623 mr-lg-auto align-self-lg-end">
                            <?php echo $second_title; ?>
                        </h3>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="line mt-60 mb-60">
        </div>
        <?php if ($bottom_content_left || $bottom_content) : ?>
            <div class="title_text_line__bottom">
                <div class="row">
                    <div class="col-lg-7 mb-2 mb-lg-0">
                        <?php if ($bottom_content_left) : ?>
                            <div class="content-block text-color-gray max--width--700 mr-lg-auto">
                                <?php echo $bottom_content_left; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php if ($bottom_content) : ?>
                        <div class="col-lg-5">
                            <div class="content-block text-color-gray max--width--623 mr-lg-auto">
                                <?php echo $bottom_content; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>