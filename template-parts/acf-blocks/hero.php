<?php
$main_title = get_sub_field('main_title');
$img_list = get_sub_field('img_list');
$bottom_text = get_sub_field('bottom_text');
?>

<?php if ($main_title) : ?>
    <section class="hero">
        <?php if ($img_list) : ?>
            <div class="hero__list-img">
                <?php foreach ($img_list as $img) :
                    $image = $img['image'];
                    $size = 'full'; ?>
                    <?php echo wp_get_attachment_image($image, $size); ?>
                <?php endforeach; ?>
            </div>
        <?php else : ?>
            <div class="hero__list-bg">
            </div>
        <?php endif; ?>
        <div class="hero__main">
            <div class="hero__main__text">
                <div class="container">
                    <div class="title_block">
                        <h1 class="text--size--113">
                            <?php echo $main_title; ?>
                        </h1>
                    </div>
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
        </div>
    </section>
<?php endif; ?>