<?php
$post = $args['item'];
$position = get_field('position', $post->ID);
$employee_email = get_field('email', $post->ID);
$bio_links = get_field('bio', $post->ID);
?>

<div class="employee">
    <div class="employee__image">
        <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('work_img'); ?>
        <?php else : ?>
            <img src="/" alt="">
        <?php endif; ?>
    </div>
    <div class="employee__title text--center">
        <h3 class="h5"><?php the_title(); ?></h3>
    </div>

    <?php if ($position) : ?>
        <div class="employee__position">
            <p class="text--size--18 text--center text-color-secondary text-uppercase"><?php echo $position; ?></p>
        </div>
    <?php endif; ?>
    <div class="line"></div>
    <?php if ($bio_links || $employee_email) : ?>
        <div class="bio_block d-flex">
            <?php if ($employee_email) : ?>
                <a href="<?php echo get_href_email($employee_email); ?>">
                    <?php echo get_inline_svg('email-fill.svg'); ?>
                </a>
            <?php endif; ?>
            <?php if ($bio_links) : ?>
                <?php foreach ($bio_links as $item) :
                    $url = $item['link'];
                    $icon = $item['icon']; ?>
                    <a href="<?php echo $url['url']; ?>" target="<?php echo $url['target']; ?>">
                        <img src="<?php echo $icon['url']; ?>" alt="icon">
                    </a>
                <?php endforeach; ?>
            <?php endif; ?>
            <a href="#" class="bio text--size--27 text-color-orange-2 font--weight--900 text-uppercase">
                <span><?php _e('BIO', 'fhp'); ?></span>
            </a>
        </div>
    <?php endif; ?>
</div>