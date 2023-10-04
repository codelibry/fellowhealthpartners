<?php

/* Template Name: Contact page */
get_header();

$phone = get_field('add_phone');
$email = get_field('add_e-mail');
$operations_and_head_office_title = get_field('operations__and_head_office_title');
$operations_and_head_office_content = get_field('operations_and_head_office_content');
$mailing_address_title = get_field('mailing_address_title');
$mailing_address_content = get_field('mailing_address_content');
$form = get_field('choose_form');
$form_title = get_field('form_title');
$form_content = get_field('form_content');
?>

<main id="primary" class="site-main">
    <?php get_template_part('template-parts/breadcrumbs/breadcrumbs'); ?>
    <div class="container">
        <div class="entry-content contact_page">
            <section class="contact_page__top section section--spacing--md">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="title_block">
                            <h1 class="text-color-black"><?php the_title(); ?></h1>
                        </div>
                        <?php if ($phone || $email) : ?>
                            <div class="adress_block">
                                <?php if ($email) : ?>
                                    <div class="adress_block__email">
                                        <a href="<?php echo get_href_email($email); ?>">
                                            <?php echo get_inline_svg('email-fill.svg') ?>
                                            <span><?php echo $email; ?></span>
                                        </a>
                                    </div>
                                <?php endif; ?>
                                <?php if ($phone) : ?>
                                    <div class="adress_block__phone">
                                        <a href="<?php echo get_href_phone($phone); ?>">
                                            <?php echo get_inline_svg('phone-fill.svg') ?>
                                            <span><?php echo $phone; ?></span>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php if ($operations_and_head_office_title || $operations_and_head_office_content) : ?>
                        <div class="col-lg-3">
                            <div class="contact_page__top-content">
                                <div class="subtitle">
                                    <h2 class="h5 text-color-orange"><?php echo $operations_and_head_office_title; ?></h2>
                                </div>
                                <div class="content-block text-color-gray">
                                    <?php echo $operations_and_head_office_content; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if ($mailing_address_title || $mailing_address_content) : ?>
                        <div class="col-lg-3">
                            <div class="contact_page__top-content">
                                <div class="subtitle">
                                    <h2 class="h5 text-color-orange"><?php echo $mailing_address_title; ?></h2>
                                </div>
                                <div class="content-block text-color-gray">
                                    <?php echo $mailing_address_content; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="line mt-2"></div>
            </section>
            <?php if ($form) : ?>
                <section class="contact_page__form pb-4 pb-sm-10">
                    <?php if ($form_title || $form_content) : ?>
                        <div class="row mb-80">
                            <div class="col-lg-5 offset-lg-1">
                                <h2 class="h3 text-color-black"><?php echo $form_title; ?></h2>
                            </div>
                            <?php if ($form_content) : ?>
                                <div class="col-lg-5">
                                    <div class="content-block text-color-gray">
                                        <?php echo $form_content; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                    <div class="row">
                        <div class="col-12 col-lg-10 offset-lg-1">
                            <?php echo do_shortcode('[contact-form-7 id="' . $form . '"]'); ?>
                        </div>
                    </div>
                </section>
            <?php endif; ?>
        </div><!-- .entry-content -->
    </div><!-- .container -->
</main><!-- #main -->

<?php
get_footer();
