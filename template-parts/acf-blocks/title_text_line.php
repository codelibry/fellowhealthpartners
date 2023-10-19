<?php
$title = get_sub_field('top_title');
$content = get_sub_field('top_content');
$bottom_title = get_sub_field('bottom_title');
$bottom_content = get_sub_field('bottom_content');
?>
<section class="title_text_line section section--spacing--lg mb-150">
    <div class="container">
        <div class="title_text_line__top">
            <div class="row">
                <div class="col-lg-6 mb-2 mb-lg-0">
                    <?php if ($title) : ?>
                        <h2 class="h3 text-color-black max--width--694 mr-lg-auto"><?php echo $title; ?></h2>
                    <?php endif; ?>
                </div>
                <?php if ($content) : ?>
                    <div class="col-lg-6">
                        <div class="content-block text-color-black text--size--26 max--width--694 ml-lg-auto">
                            <?php echo $content; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="line mt-60 mb-60">

        </div>
        <?php if ($bottom_title || $bottom_content) : ?>
            <div class="title_text_line__bottom">
                <div class="row">
                    <div class="col-lg-6 mb-2 mb-lg-0">
                        <?php if ($bottom_title) : ?>
                            <h2 class="h4 text-color-primary max--width--718 mr-lg-auto"><?php echo $bottom_title; ?></h2>
                        <?php endif; ?>
                    </div>
                    <?php if ($bottom_content) : ?>
                        <div class="col-lg-6">
                            <div class="content-block text-color-gray max--width--694 ml-lg-auto">
                                <?php echo $bottom_content; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>