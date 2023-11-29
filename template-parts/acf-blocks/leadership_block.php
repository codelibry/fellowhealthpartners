<?php
$title = get_sub_field('title');
$block_content  = get_sub_field('content');
$workers = get_sub_field('workers');
?>
<section id="leadership" class="leadership section pb-0 mb-40 max-width">
    <div class="container">
        <?php if ($title || $block_content) : ?>
            <div class="leadership__top mb-120">
                <div class="row">
                    <div class="col-lg-6">
                        <?php if ($title) : ?>
                            <div class="title_block">
                                <h2 class="h1">
                                    <?php echo $title; ?>
                                </h2>
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php if ($block_content) : ?>
                        <div class="col-lg-6">
                            <div class="content-block text-color-gray">
                                <?php echo $block_content; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
        <?php if ($workers) : ?>
            <div class="leadership__list row">
                <?php foreach ($workers as $item) : ?>
                    <?php get_template_part('template-parts/parts/employee_item', '', array('item' => $item)); ?>
                <?php endforeach; ?>
                <?php
                wp_reset_postdata()
                ?>
            </div>
        <?php endif; ?>
    </div>
</section>