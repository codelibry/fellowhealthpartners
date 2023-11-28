<?php
$post = $args['item'];
$leadeship_subtitle = get_field('leadeship_subtitle', $post->ID);
$position = get_field('leadeship_position', $post->ID);
$employee_email = get_field('leadership_email', $post->ID);
$linkedin = get_field('leadership_linkedin', $post->ID);
$content = get_post_field('post_content', $post->ID);
?>

<div class="employee popup-item col-lg-3 col-6 col-md-4">
    <div class="employee__image popup-image">
        <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('work_img'); ?>
        <?php else : ?>
            <img src="/" alt="">
        <?php endif; ?>
    </div>
    <div class="employee__title popup-title text--center">
        <h3 class="h5"><?php the_title(); ?></h3>
        <?php if ($leadeship_subtitle) : ?>
            <p class="text--size--18 text-uppercase leadeship_subtitle font--weight--500"><?php echo $leadeship_subtitle; ?></p>
        <?php endif; ?>
    </div>

    <?php if ($position) : ?>
        <div class="employee__position">
            <p class="text--size--18 text--center text-color-secondary text-uppercase popup-subtitle"><?php echo $position; ?></p>
        </div>
    <?php endif; ?>
    <div class="line"></div>
    <?php if ($linkedin || $employee_email || $content) : ?>
        <div class="bio_block d-flex popup-content-links">
            <?php if ($employee_email) : ?>
                <a href="<?php echo get_href_email($employee_email); ?>" class="bio_block__email">
                    <?php echo get_inline_svg('email-fill.svg'); ?>
                </a>
            <?php endif; ?>
            <?php if ($linkedin) : ?>
                <a href="<?php echo $linkedin ?>" class="bio_block__linkedin linkedin" target="_blank" rel="noopener noreferrer">
                    <?php echo get_inline_svg('/social/linkedin-orange.svg'); ?>
                </a>
            <?php endif; ?>
            <?php if (!empty($content)) : ?>
                <div class="bio popup-open text--size--27 text-color-orange-2 font--weight--900 text-uppercase">
                    <span><?php _e('BIO', 'fhp'); ?></span>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>
    <div class="employee__text__content popup-text">
        <?php echo $content; ?>
    </div>
</div>