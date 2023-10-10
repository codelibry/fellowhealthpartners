<?php
$title = get_sub_field('title');
$btn = get_sub_field('btn');
$content = get_sub_field('content');
?>
<section class="title_text_button section section--spacing--sm pb-0">
    <div class="container">
        <div class="title_text_button__main">
            <div class="row mb-74">
                <div class="col-lg-7 d-flex flex-column justify-content-between mb-2 mb-lg-0">
                    <?php if ($title) : ?>
                        <h1 class="text-color-black"><?php echo $title; ?></h1>
                    <?php else : ?>
                        <h1 class="text-color-black"><?php the_title() ?></h1>
                    <?php endif; ?>
                </div>
                <?php if ($content) : ?>
                    <div class="col-lg-5">
                        <div class="content-block text-color-gray">
                            <?php echo $content; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="row mt-2 mt-lg-0">
                <?php if ($btn) : ?>
                    <div class="col-lg-6">
                        <div class="button_block">
                            <a href="<?php echo $btn['url']; ?>" target="<?php echo $btn['target']; ?>" class="button button--sm bg--gradient-orange text-color-white">
                                <?php echo $btn['title']; ?>
                                <?php echo get_inline_svg('/arrows/arrow-right-s-line.svg'); ?>
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>