<?php
$title = get_sub_field('top_title');
$second_title = get_sub_field('top_content');
$bottom_content_left = get_sub_field('bottom_title');
$bottom_content = get_sub_field('bottom_content');
?>
<section class="title_text_line section section--spacing--lg mb-150">
    <div class="container">
        <div class="title_text_line__top">
            <div class="row">
                <div class="col-lg-6 mb-2 mb-lg-0">
                    <?php if ($title) : ?>
                        <h2 class="h1 text-color-black max--width--740 mr-lg-auto"><?php echo $title; ?></h2>
                    <?php endif; ?>
                </div>
                <?php if ($second_title) : ?>
                    <div class="col-lg-6">
                        <h3 class="text-color-black h4 max--width--740 ml-lg-auto">
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
                    <div class="col-lg-6 mb-2 mb-lg-0">
                        <?php if ($bottom_content_left) : ?>
                            <div class="content-block text--size--18 text-color-gray max--width--740 mr-lg-auto">
                                <?php echo $bottom_content_left; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php if ($bottom_content) : ?>
                        <div class="col-lg-6">
                            <div class="content-block text--size--18 text-color-gray max--width--740 ml-lg-auto">
                                <?php echo $bottom_content; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>