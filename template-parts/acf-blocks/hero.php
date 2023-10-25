<?php
$img_list = get_sub_field('img_list');
$bottom_text = get_sub_field('bottom_text');
?>

<?php if ($img_list) : ?>
    <section class="hero">
        <div class="hero__main">
            <div class="hero__main__list">
                <?php foreach ($img_list as $img) :
                    $image = $img['image'];
                    $image_small = $img['image_mobile'];
                    $title = $img['title'];
                    $subtitle = $img['subtitle'];
                    $size = 'full'; ?>
                    <div class="hero__main__slide">
                        <div class="image">
                            <div class="animate__animated">
                                <?php echo wp_get_attachment_image($image, $size, false, array('class' => 'desktop')); ?>
                                <?php echo wp_get_attachment_image($image_small, $size, false, array('class' => 'mob')); ?>
                            </div>
                        </div>
                        <div class="title_block">
                            <div class="container">
                                <p class="text--size--113">
                                    <?php echo $title; ?>
                                </p>
                                <p class="h1">
                                    <?php echo $subtitle; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="bottom_block">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <p class="text-color-white h4"><?php echo $bottom_text; ?></p>
                        </div>
                        <div class="col-lg-4">
                            <div class="dots_block text-color-white"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>