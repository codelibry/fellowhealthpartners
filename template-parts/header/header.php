<?php
$logo = get_field('header_logo', 'options');
$header_text = get_field('header_text', 'options');
$header_phone = get_field('phone_number', 'options');
$header_btn = get_field('Contact_url', 'options');
?>

<header id="masthead" class="header">
    <div class="header__topbar">
        <div class="d-flex justify-content-between align-items-center">
            <?php if ($logo) : ?>
                <div class="header__logo">
                    <a href="<?php echo get_home_url() ?>">
                        <img src="<?php echo $logo['url']; ?>" alt="">
                    </a>
                </div>
            <?php endif; ?>
            <div class="header__menu">
                <nav id="site-navigation" class="main-navigation">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'menu-1',
                            'menu_id' => 'primary-menu',
                        )
                    ); ?>
                </nav><!-- #site-navigation -->
            </div>
            <?php if ($header_phone || $header_btn) : ?>
                <div class="header__info align-items-center">
                    <?php if ($header_text || $header_phone) : ?>
                        <div class="header__info__contacts d-flex flex-column">
                            <?php if ($header_text) : ?>
                                <p class="text--size--13">
                                    <?php echo $header_text; ?>
                                </p>
                            <?php endif; ?>
                            <?php if ($header_phone) : ?>
                                <a href="<?php echo get_href_phone($header_phone); ?>" class="header__info__contacts-tel h5 text-color-primary">
                                    <?php echo $header_phone; ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                    <?php if ($header_btn) : ?>
                        <a href="<?php echo $header_btn['url']; ?>" class="button button--lg button--sm bg--gradient-orange text-color-white" target="<?php echo $header_btn['target']; ?>"><?php echo $header_btn['title']; ?></a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <button id="toggle" class="">
                <span></span>
            </button>
        </div>
    </div><!-- .header__topbar -->
    <div id="side-panel" class="side-panel custom-scrollbar">
        <div class="side-inner">

            <div class="side_container d-flex flex-column justify-content-between">
                <div class="location_menu_block">
                    <nav id="site-navigation_mobile" class="main-navigation">
                        <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'menu-1',
                                'menu_id' => 'primary-menu-mobile',
                            )
                        ); ?>
                    </nav><!-- #site-navigation -->
                </div>
                <?php if ($header_phone || $header_btn) : ?>
                    <div class="header__info align-items-center flex-column">
                        <div class="line"></div>
                        <?php if ($header_text || $header_phone) : ?>
                            <div class="header__info__contacts d-flex flex-column">
                                <?php if ($header_text) : ?>
                                    <p class="text--size--13 text--center">
                                        <?php echo $header_text; ?>
                                    </p>
                                <?php endif; ?>
                                <?php if ($header_phone) : ?>
                                    <a href="<?php echo get_href_phone($header_phone); ?>" class="header__info__contacts-tel h5 text-color-primary text--center">
                                        <?php echo $header_phone; ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($header_btn) : ?>
                            <a href="<?php echo $header_btn['url']; ?>" style="width: 100%" class="button button--lg button--sm button--fluid bg--gradient-orange text-color-white" target="<?php echo $header_btn['target']; ?>"><?php echo $header_btn['title']; ?></a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>

        </div>
    </div><!-- #side-panel -->

</header><!-- #masthead -->