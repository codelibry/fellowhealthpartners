<?php
// global $fellow_options;
$footer_logo = get_field('footer_logo', 'options');
$footer_contact_text = get_field('footer_contact_text', 'options');
$phone_number = get_field('phone_number', 'options');
$linkedin_url = get_field('linkedin_url', 'options');
$footer_email = get_field('footer_email', 'options');
$copyright = get_field('copyright', 'options');
$bottom_links = get_field('bottom_links', 'options');

$footer_logos = get_field('footer_logos', 'options');
?>

<div class="pre-footer bg--primary">
    <div class="section-bg bg--gradient-orange"></div>
    <div class="pre-footer_inner">
        <div class="container ">
            <div class="inner d-flex align-items-center justify-content-between">
                <?php if ($footer_logo) : ?>
                    <div class="pre-footer__logo">
                        <a href="<?php echo get_home_url() ?>">
                            <img src="<?php echo $footer_logo['url']; ?>" alt="">
                        </a>
                    </div>
                <?php endif; ?>
                <?php if ($footer_contact_text) : ?>
                    <h2 class="pre-footer__title text--size--32 font--weight--500 text-color-white"><?php echo $footer_contact_text; ?></h2>
                <?php endif; ?>
                <div class="empty_block"></div>
                <?php if ($phone_number || $linkedin_url || $footer_email) : ?>
                    <div class="pre-footer__contacts ">
                        <div class="pre-footer__contacts-call text--size--32 font--weight--800 text-color-white">
                            <?php echo get_inline_svg_social('phone-fill.svg'); ?>
                            <a href="<?php echo get_href_phone($phone_number) ?>"><?php echo $phone_number; ?></a>
                        </div>
                        <ul class="pre-footer__socials text--color--white">
                            <li><a href="<?php echo $linkedin_url['url']; ?>" target="<?php echo $linkedin_url['target']; ?>"><?php echo get_inline_svg_social('linkedin.svg'); ?></a></li>
                            <li><a href="<?php echo get_href_email($footer_email) ?>"><?php echo get_inline_svg_social('mail.svg'); ?></a></li>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

</div>

<footer id="colophon" class="site-footer">
    <div class="site-footer__inner">
        <div class="container">
            <div class="site-footer__inner-main">
                <nav class="site-footer__nav">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'footer-menu',
                            'menu_id'        => 'footer-menu',
                        )
                    );
                    ?>
                </nav>
            </div><!-- .site-footer__columns -->
        </div><!-- .container -->

        <?php

        if ($footer_logos) : ?>
            <div class='site-footer__bottom'>
                <div class='container'>
                    <div class='site-footer__bottom-wrap'>
                        <?php foreach ($footer_logos as $logo) : ?>
                            <?php
                            $image = $logo['img'];
                            $link = $logo['link'];
                            ?>
                            <?php if ($link) : ?>
                                <a href='<?php echo esc_url($link['url']) ?>' target='_blank'>
                                    <div>
                                        <img src='<?php echo esc_url($image['url']) ?>' alt='<?php echo esc_url($image['title']) ?>' />
                                    </div>
                                </a>
                            <?php else : ?>
                                <div>
                                    <img src='<?php echo esc_url($image['url']) ?>' alt='<?php echo esc_url($image['title']) ?>' />
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                    <?php if ($copyright || $bottom_links) : ?>
                        <div class="site-footer__bottom-copyright d-flex align-items-center justify-content-between">
                            <?php if ($copyright) : ?>
                                <div>
                                    <p class="text--size--17 font--weight--500 text-color-white"><?php echo $copyright; ?></p>
                                </div>
                            <?php endif; ?>
                            <?php if ($bottom_links) : ?>
                                <div class="text--size--21 font--weight--500 text-color-white d-md-flex links">
                                    <?php foreach ($bottom_links as $link) :
                                        $url = $link['link']; ?>
                                        <p><a href="<?php echo $url['url']; ?>" <?php if ($url['target']) : ?>target="<?php echo $url['target']; ?>" <?php endif; ?>><?php echo $url['title']; ?></a></p>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div><!-- .site-footer__bottom -->
        <?php endif; ?>

    </div><!-- .site-footer__inner -->
</footer><!-- #colophon -->