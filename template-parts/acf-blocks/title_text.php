<?php
$title = get_sub_field('title');
$subtitle = get_sub_field('subtitle');
$content = get_sub_field('content');
?>
<section class="title_text section section--spacing--lg">
    <div class="container">
        <div class="title_text__main">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-between mb-2 mb-lg-0">
                    <?php if ($title) : ?>
                        <h1 class="text-color-black"><?php echo $title; ?></h1>
                    <?php else : ?>
                        <h1 class="text-color-black"><?php the_title() ?></h1>
                    <?php endif; ?>
                    <?php if ($subtitle) : ?>
                        <p class="h5 subtitle text-color-secondary mt-1 mt-lg-0">
                            <?php echo $subtitle; ?>
                        </p>
                    <?php endif; ?>
                </div>
                <?php if ($content) : ?>
                    <div class="col-lg-6">
                        <div class="content-block text-color-gray">
                            <?php echo $content; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>