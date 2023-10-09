<?php
$title = get_sub_field('title');
$images = get_sub_field('images_list');
$top_content = get_sub_field('top_content');
$bottom_content = get_sub_field('bottom_content');
?>
<?php if ($title || $images || $top_content) : ?>
    <section class="partner bg--secondary section">
        <div class="container">
            <div class="partner__main">
                <div class="row">
                    <?php if ($title || $images) : ?>
                        <div class="col-lg-6">
                            <div class="title_block">
                                <h2 class="text-color-white"><?php echo $title; ?></h2>
                            </div>
                            <div class="images_list d-flex">
                                <?php
                                foreach ($images as $index => $image) :
                                    $icon = $image['image'];
                                    $class = ($index === 1) ? 'second' : ''; // Add 'second' class to the second image
                                    // Output the image with the class
                                ?>
                                    <img src="<?php echo $icon['url']; ?>" alt="" class="<?php echo $class; ?>">
                                <?php endforeach; ?>

                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if ($top_content || $bottom_content) : ?>
                        <div class="col-lg-6">
                            <?php if ($top_content) : ?>
                                <div class="top_content content-block text-color-white text--size--32">
                                    <?php echo $top_content; ?>
                                </div>
                            <?php endif; ?>
                            <?php if ($bottom_content) : ?>
                                <div class="bottom_content content-block text-color-white text--size--19">
                                    <?php echo $bottom_content; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>