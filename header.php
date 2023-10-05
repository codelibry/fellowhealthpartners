<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package fellow
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_stylesheet_directory_uri(); ?>/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon-16x16.png">
    <link rel="manifest" href="<?php echo get_stylesheet_directory_uri(); ?>/site.webmanifest">
    <link rel="mask-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#00aba9">
    <meta name="theme-color" content="#ffffff">

    <?php wp_head(); ?>

    <?php global $fellow_options; ?>

    <?php if ($fellow_options['google']) :
        echo $fellow_options['google'];
    endif; ?>
</head>

<?php
$page_id = get_queried_object();
$show_hero_unit = get_field('show_hero_unit', $page_id);

?>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div id="page" class="site<?php if (!$show_hero_unit) : ?> no-hero-unit<?php endif; ?>">

        <header id="masthead" class="site-header">
            <div class="site-header__topbar">
                <div class="container d-flex justify-content-between align-items-center">
                    <div class="site-branding">
                        <?php the_custom_logo(); ?>
                    </div><!-- .site-branding -->

                    <div class="site-header__info d-md-flex align-items-center text-right">
                        <div class="site-header__contacts"><?php echo $fellow_options['header-text']; ?>
                            <a href="tel:<?php echo $fellow_options['phone']; ?>" class="site-header__contacts-tel d-md-none"><?php echo $fellow_options['phone']; ?></a>
                            <button class="site-header__contacts-tel d-none d-md-inline-flex">
                                <strong><?php echo $fellow_options['phone']; ?></strong></button>
                        </div>
                        <?php if ($fellow_options['header-button-url']) : ?>
                            <a href="<?php echo $fellow_options['header-button-url']; ?>" class="button" target="_blank"><?php echo $fellow_options['header-button']; ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <nav id="site-navigation" class="main-navigation">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'menu-1',
                        'menu_id' => 'primary-menu',
                    )
                );
                ?>

            </nav><!-- #site-navigation -->

        </header><!-- #masthead -->


        <?php get_template_part('template-parts/hero-unit'); ?>