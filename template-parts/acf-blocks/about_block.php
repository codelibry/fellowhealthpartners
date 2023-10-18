<?php
$title = get_sub_field('title');
$subtitle = get_sub_field('subtitle');
$content = get_sub_field('content');
$leadership = get_sub_field('choose_leadership');

?>

<section class="about_block mb-150">
    <div class="container">
        <div class="about_block__main">
            <div class="row">
                <div class="col-lg-6">
                    <?php if ($title) : ?>
                        <div class="title_block mb-40">
                            <h2 class="h1"><?php echo $title; ?></h2>
                        </div>
                    <?php endif; ?>
                    <div class="about_block__inner mr-lg-auto">
                        <?php if ($subtitle) : ?>
                            <div class="subtitle_block mb-60">
                                <h3 class="h5 text-color-gray"><?php echo $subtitle; ?></h3>
                            </div>
                        <?php endif; ?>
                        <?php if ($content) : ?>
                            <div class="content-block text-color-gray">
                                <?php echo $content; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="col-lg-6 mt-2 mt-lg-0 sticky">
                    <?php if ($leadership) :
                        $position = get_field('leadeship_position', $leadership->ID);
                        $email = get_field('leadership_email', $leadership->ID);
                        $phone = get_field('leadership_phone', $leadership->ID);
                        $post_title = esc_html($leadership->post_title);
                        $image = get_the_post_thumbnail($leadership->ID, 'work_img'); ?>
                        <div class="about_block__inner ml-lg-auto">
                            <div class="leadeship_block">
                                <?php if ($image) : ?>
                                    <div class="leadeship_block__image">
                                        <?php echo $image; ?>
                                    </div>
                                <?php endif; ?>
                                <div class="leadeship_block__inner">
                                    <div class="leadeship_block__top bg--gradient-orange">
                                        <h3 class="text--size--21 text-color-white text--center"><?php echo $post_title; ?></h3>
                                        <p class="text-color-white text--center text--uppercase"><?php echo $position; ?></p>
                                    </div>
                                    <p class="h5 text--center">For More Information Or Questions</p>
                                    <p class="text--center text-color-gray">Contact <?php echo $post_title; ?> directly at</p>
                                    <div class="mt-2 leadeship_block__phones">
                                        <a href="<?php echo get_href_email($email); ?>" class="d-flex-sm text--size--19">
                                            <?php echo get_inline_svg('email-fill.svg'); ?>
                                            <span><?php echo $email; ?></span>
                                        </a>
                                        <a href="<?php echo get_href_phone($phone); ?>" class="d-flex text--size--19">
                                            <?php echo get_inline_svg('phone-fill.svg'); ?>
                                            <?php echo $phone; ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>