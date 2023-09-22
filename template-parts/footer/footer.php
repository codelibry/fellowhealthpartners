<?php
global $fellow_options;
$footer_logos = get_field('footer_logos', 'options');
?>

<div class="pre-footer">
    <div class="container ">
        <div class="inner d-md-flex align-items-center justify-content-between">
            <div class="pre-footer__logo">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/footer_logo.svg" alt="" class="">
            </div>
            <?php if ($fellow_options['footer-contact-text']) : ?>
                <h2 class="pre-footer__title text--size--32 font--weight--500 text--color--white"><?php echo $fellow_options['footer-contact-text']; ?></h2>
            <?php endif; ?>

            <div class="pre-footer__contacts">
                <div class="pre-footer__contacts-call text--size--32 font--weight--bold text--color--white">
                    <?php echo get_inline_svg('phone-fill.svg'); ?>
                    <a href="tel:<?php echo $fellow_options['phone']; ?>" class=""><?php echo $fellow_options['footer-contact-button']; ?></a>
                </div>
                <ul class="pre-footer__socials text--color--white">
                    <li><a href="<?php echo $fellow_options['linkedin']; ?>" target="_blank"><?php echo get_inline_svg('linkedin.svg'); ?></a></li>
                    <li><a href="mailto:<?php echo $fellow_options['mail']; ?>"><?php echo get_inline_svg('mail.svg'); ?></a></li>
                </ul>
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
                    <div class="site-footer__copyright d-md-flex align-items-center justify-content-between">
                        <div>
                            <p class="text--size--17 font--weight--500 text--color--white"><?php echo $fellow_options['footer-copyright']; ?></p>
                        </div>
                        <div class="text--size--21 font--weight--500 text--color--white d-md-flex">
                            <p><a href="/do-not-sell-my-personal-info/#opt-out"> Opt Out</a></p>
                            <p><a href="/privacy-policy/">Privacy Policy</a></p>
                        </div>
                    </div>
                </div>
            </div><!-- .site-footer__bottom -->
        <?php endif; ?>

    </div><!-- .site-footer__inner -->
</footer><!-- #colophon -->