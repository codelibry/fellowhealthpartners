<?php global $fellow_options; ?>

<?php if ($fellow_options['footer-contact-text'] || $fellow_options['phone'] || $fellow_options['footer-contact-button']) :
?>
    <div class="pre-footer">
        <div class="container condensed ">
            <div class="inner d-md-flex align-items-center justify-content-between">

                <?php if ($fellow_options['footer-contact-text']) : ?>
                    <h2 class="pre-footer__title"><?php echo $fellow_options['footer-contact-text']; ?></h2>
                <?php endif; ?>

                <div class="pre-footer__button">
                    <a href="tel:<?php echo $fellow_options['phone']; ?>" class="button d-md-none"><?php echo $fellow_options['footer-contact-button']; ?></a>
                    <?php if ($fellow_options['footer-contact-button']) : ?>
                        <button class="button d-none d-md-inline-flex"><?php echo $fellow_options['footer-contact-button']; ?></button>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php endif;
?>

<footer id="colophon" class="site-footer wave-top">
    <div class="site-footer__inner">
        <div class="container">
            <div class="site-footer__columns">
                <div class="site-footer__col-left">
                    <div class="site-footer__contacts">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/logo-white.svg" alt="" class="site-footer__logo">

                        <div class="site-footer__contacts-call">
                            <a href="tel:<?php echo $fellow_options['phone']; ?>" class="button white d-md-none"><?php echo $fellow_options['footer-contact-button']; ?></a>
                            <button class="button white d-none d-md-inline-flex"><?php echo $fellow_options['footer-contact-button']; ?></button>
                        </div>

                        <ul class="socials">
                            <li><a href="<?php echo $fellow_options['linkedin']; ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/linkedin.svg" alt=""></a></li>
                            <li><a href="mailto:<?php echo $fellow_options['mail']; ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/mail.svg" alt=""></a></li>
                        </ul>
                        <div class="site-footer__copyright">
                            <p><?php echo $fellow_options['footer-copyright']; ?></p>
                            <p><a href="/privacy-policy/">Privacy Policy</a></p>
                        </div>
                    </div><!-- .site-footer__contacts -->

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
                </div><!-- .site-footer__col-left -->

                <div class="site-footer__col-right">

                    <?php if (is_active_sidebar('sidebar-footer')) {
                        dynamic_sidebar('sidebar-footer');
                    } ?>
                </div><!-- .site-footer__col-right -->

            </div><!-- .site-footer__columns -->

        </div><!-- .container -->

        <?php
        $footer_logos = get_field('footer_logos', 'options');
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
                </div>
            </div><!-- .site-footer__bottom -->
        <?php endif; ?>

    </div><!-- .site-footer__inner -->
</footer><!-- #colophon -->
</div><!-- #page -->