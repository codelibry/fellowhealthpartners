<?php
$title = get_sub_field('top_title');
$bottom_content = get_sub_field('bottom_content');
?>
<section class="title_text_line section section--spacing--md max-width">
    <div class="container">
        <div class="title_text_line__top">
            <div class="row">
                <div class="col-lg-12 mb-2 mb-lg-0">
                    <?php if ($title) : ?>
                        <h1 class="h1 text-color-black mr-lg-auto"><?php echo $title; ?></h1>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="line mt-60 mb-60">
        </div>
        <?php if ($bottom_content) : ?>
            <div class="title_text_line__bottom">
                <div class="row">
                    <div class="col-lg-12 mb-2 mb-lg-0">
                        <div class="content-block text-color-gray ml-lg-auto">
                            <?php echo $bottom_content; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>