<?php
$title = get_sub_field('main_title');
$top_content  = get_sub_field('subtitle');
$tabs = get_sub_field('tabs');
?>

<section id="who_we_serve" class="horizontal_tabs section section--spacing--md max-width">
    <div class="container">
        <?php if ($title && $top_content) : ?>
            <div class="horizontal_tabs__top mb-60">
                <div class="row">
                    <?php if ($title && $top_content) : ?>
                        <div class="col-lg-6">
                            <div class="title_block max--width--712 mr-lg-auto">
                                <h2 class="h1"><?php echo $title; ?></h2>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="max--width--700 ml-lg-auto content-block text-color-gray"><?php echo $top_content; ?></div>
                        </div>
                    <?php elseif ($title) : ?>
                        <div class="col-lg-12">
                            <div class="title_block">
                                <h2><?php echo $title; ?></h2>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php if ($tabs) : ?>
                <div class="tabs">
                    <ul id="tabs-nav" class="row">
                        <?php $i = 1;
                        foreach ($tabs as $tab) :
                            $image = $tab['logo'];
                            $title = $tab['title'];
                        ?>
                            <li class="col-4">
                                <a href="#tab<?php echo $i; ?>">
                                    <?php echo get_inline_svg_by_path($image); ?>
                                    <p class="h5 text--center"><?php echo $title; ?></p>
                                </a>
                            </li>
                        <?php $i++;
                        endforeach; ?>
                    </ul> <!-- END tabs-nav -->
                    <div id="tabs-content">
                        <?php $i = 1;
                        foreach ($tabs as $tab) :
                            $title = $tab['title'];
                            $subtitle = $tab['subtitle_orange_color'];
                            $content_block = $tab['content_block'];
                            $persent_row = $tab['persent_row'];
                        ?>
                            <div id="tab<?php echo $i; ?>" class="tab-content">
                                <h3 class="text--size--50 mb-40"><?php echo $title; ?></h3>
                                <?php if ($subtitle) : ?>
                                    <p class="subtitle h5 text-color-primary"><?php echo $subtitle; ?></p>
                                <?php endif; ?>
                                <?php if ($content_block) : ?>
                                    <div class="content-block text-color-gray">
                                        <?php echo $content_block; ?>
                                    </div>
                                <?php endif; ?>
                                <?php if ($persent_row) : ?>
                                    <div class="scroll">
                                        <div class="persents_row mt-60 d-flex">
                                            <?php foreach ($persent_row as $col) :
                                                $top_subtitle = $col['top_subtitle'];
                                                $top_text = $col['top_text'];
                                                $persent_number = $col['persent_number'];
                                                $bottom_text = $col['bottom_text']; ?>
                                                <div class="persents_col text--center">
                                                    <p class="text--size--42"><?php echo $top_subtitle; ?></p>
                                                    <p class="color_text text--size--42 text-color-white bg--primary "><?php echo $top_text; ?></p>
                                                    <p class="text--size--18 text-color-gray"><?php _e('up to', 'fhp'); ?></p>
                                                    <p class="text--size--100 font--weight--900"><?php echo $persent_number; ?></p>
                                                    <p class="text--size--24 bottom_text text-color-gray"><?php echo $bottom_text; ?></p>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php $i++;
                        endforeach; ?>
                    </div> <!-- END tabs-content -->
                </div> <!-- END tabs -->
            <?php endif; ?>
        <?php endif; ?>
    </div>
</section>