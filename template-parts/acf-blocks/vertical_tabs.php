<?php
$title = get_sub_field('main_title');
$subtitle = get_sub_field('subtitle');
$tabs = get_sub_field('tabs');
?>

<section id="how_we_do_it" class="vertical_tabs section max-width">
    <div class="container">
        <?php if ($title && $subtitle) : ?>
            <div class="vertical_tabs__top">
                <div class="row">
                    <?php if ($title && $subtitle) : ?>
                        <div class="col-lg-6">
                            <div class="title_block max--width--712 mr-lg-auto">
                                <h2 class="h1"><?php echo $title; ?></h2>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <h3 class="h4 max--width--700 ml-lg-auto"><?php echo $subtitle; ?></h3>
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
        <?php endif; ?>
        <div class="line mt-60 mb-60">
        </div>
        <section class="tabs-wrapper">
            <div class="tabs-container">
                <div class="tabs-block">
                    <div id="tabs-section" class="tabs row">
                        <div class="col-lg-6">
                            <ul class="tab-head max--width--712 mr-lg-auto" id="tab-list">
                                <?php $i = 1;
                                foreach ($tabs as $tab) :
                                    $image = $tab['logo'];
                                    $subtitle = $tab['subtitle_orange_color'];
                                    $content = $tab['content_block'];
                                    $persent_row = $tab['persent_row'];
                                ?>
                                    <li>
                                        <a href="#tab-<?php echo $i; ?>" class="tab-link <?php if ($i == 1) {
                                                                                                echo 'active';
                                                                                            } ?> card card--logo">
                                            <img src="<?php echo $image['url']; ?>" alt="">
                                        </a>
                                        <div class="link-body entry-content mb-40">
                                            <h3 class="h5 text-color-primary"><?php echo $subtitle; ?></h3>
                                            <?php if ($content) : ?>
                                                <div class="content-block text-color-gray mt-40">
                                                    <?php echo $content; ?>
                                                </div>
                                            <?php endif; ?>
                                            <?php if ($persent_row) : ?>
                                                <div class="scroll">
                                                    <div class="persents_row mt-90 row">
                                                        <?php foreach ($persent_row as $col) :
                                                            $top_subtitle = $col['top_subtitle'];
                                                            $top_text = $col['top_text'];
                                                            $persent_number = $col['persent_number'];
                                                            $bottom_text = $col['bottom_text']; ?>
                                                            <div class="col-4">
                                                                <div class="persents_col text--center">
                                                                    <h4 class="text--size--24"><?php echo $top_subtitle; ?></h4>
                                                                    <p class="text--size--18"><?php echo $top_text; ?></p>
                                                                    <p class="text-color-primary text--size--70 font--weight--900"><?php echo $persent_number; ?></p>
                                                                    <p class="text--size--18 bottom_text"><?php echo $bottom_text; ?></p>
                                                                </div>
                                                            </div>
                                                        <?php endforeach; ?>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </li>
                                <?php $i++;
                                endforeach; ?>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <div class="max--width--700 ml-lg-auto ">
                                <?php $i = 1;
                                foreach ($tabs as $tab) :
                                    $subtitle = $tab['subtitle_orange_color'];
                                    $content = $tab['content_block'];
                                    $persent_row = $tab['persent_row'];
                                ?>
                                    <section id="tab-<?php echo $i; ?>" class="tab-body entry-content <?php if ($i == 1) {
                                                                                                            echo 'active active-content';
                                                                                                        } ?>  ">
                                        <h3 class="h5 text-color-primary"><?php echo $subtitle; ?></h3>
                                        <?php if ($content) : ?>
                                            <div class="content-block text-color-gray mt-40">
                                                <?php echo $content; ?>
                                            </div>
                                        <?php endif; ?>
                                        <?php if ($persent_row) : ?>
                                            <div class="persents_row mt-90 row">
                                                <?php foreach ($persent_row as $col) :
                                                    $top_subtitle = $col['top_subtitle'];
                                                    $top_text = $col['top_text'];
                                                    $persent_number = $col['persent_number'];
                                                    $bottom_text = $col['bottom_text']; ?>
                                                    <div class="col-4">
                                                        <div class="persents_col">
                                                            <h4 class="text--size--24"><?php echo $top_subtitle; ?></h4>
                                                            <p class="text--size--18"><?php echo $top_text; ?></p>
                                                            <p class="text-color-primary text--size--70 font--weight--900"><?php echo $persent_number; ?></p>
                                                            <p class="text--size--18 bottom_text"><?php echo $bottom_text; ?></p>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        <?php endif; ?>
                                    </section>
                                <?php $i++;
                                endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>