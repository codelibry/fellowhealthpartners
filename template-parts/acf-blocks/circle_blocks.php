<?php
$top_title = get_sub_field('top_title');
$top_subtitle = get_sub_field('top_subtitle');
$bottom_title = get_sub_field('bottom_title');
$bottom_links = get_sub_field('bottom_links');
$bottom_content = get_sub_field('bottom_content');

$center_title = get_sub_field('center_title');
$center_text = get_sub_field('center_text');
$circle_blocks = get_sub_field('circle_blocks');

$persent_row = get_sub_field('persent_row_for_main_page');
?>

<section class="circle_blocks mt-130">
    <div class="container">
        <div class="circle_blocks__top" id="what_we_do">
            <div class="row">
                <div class="col-lg-7 mb-2 mb-lg-0">
                    <?php if ($top_title) : ?>
                        <h2 class="h1 text-color-black max--width--700 mr-lg-auto"><?php echo $top_title; ?></h2>
                    <?php endif; ?>
                </div>
                <?php if ($top_subtitle) : ?>
                    <div class="col-lg-5 d-lg-flex">
                        <p class="h4 align-self-lg-end primary-line text-color-primary max--width--623">
                            <?php echo $top_subtitle; ?>
                        </p>
                    </div>
                <?php endif; ?>
            </div>
            <div class="line mt-60 mb-60">
            </div>
            <div class="row">
                <div class="col-lg-7 mb-2 mb-lg-0">
                    <?php if ($bottom_title) : ?>
                        <h3 class="h2 text-color-black max--width--700 mr-lg-auto"><?php echo $bottom_title; ?></h3>
                    <?php endif; ?>
                    <?php if ($bottom_content) : ?>
                        <div class="content-block mt-40 max--width--700 mr-lg-auto">
                            <?php echo $bottom_content; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <?php if ($bottom_links) : ?>
                    <div class="col-lg-5 d-lg-flex">
                        <p class="arrows_text text-color-black h4 mr-lg-auto align-self-lg-start max--width--623">
                            <?php echo $bottom_links; ?>
                        </p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="circle_blocks__center mt-120">
            <?php if ($center_title || $center_text) : ?>
                <div class="row">
                    <div class="col-lg-7">
                        <h3 class="text--size--50"><?php echo $center_title; ?></h3>
                    </div>
                    <div class="col-lg-5 d-flex">
                        <p class="h5 align-self-lg-center ml-lg-auto"><?php echo $center_text; ?></p>
                    </div>
                </div>
            <?php endif; ?>
            <div class="scroll">
                <div class="circle_blocks__list">
                    <?php $i = 1;
                    foreach ($circle_blocks as $block) :
                        $block_title = $block['title'];
                        $persent_row_inner = $block['persent_row'];
                        $content = $block['content'];
                        $bgColorClass = ''; // Initialize the class variable

                        // Use a switch statement to determine the class based on the value of $i
                        switch ($i) {
                            case 1:
                                $bgColorClass = 'bg--secondary';
                                break;
                            case 2:
                                $bgColorClass = 'bg--secondary-2';
                                break;
                            case 3:
                                $bgColorClass = 'bg--secondary-3';
                                break;
                            case 4:
                                $bgColorClass = 'bg--gold';
                                break;
                            case 5:
                                $bgColorClass = 'bg--orange';
                                break;
                            case 6:
                                $bgColorClass = 'bg--orange-2';
                                break;
                            case 7:
                                $bgColorClass = 'bg--orange-3';
                                break;
                            default:
                                // Default class if $i doesn't match any case
                                $bgColorClass = 'bg--primary';
                                break;
                        }
                    ?>
                        <div class="circle_blocks__inner-main">
                            <div class="circle_blocks__inner d-flex">
                                <div class="dotted"></div>
                                <div class="bg">
                                    <div class="bg_color">
                                    </div>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/circle_bg.svg" alt="">
                                </div>
                                <div class="number text-color-white d-flex">
                                    <span class="align-self-center text--center h5"><?php echo $i; ?></span>
                                </div>
                                <div class="title d-flex">
                                    <h4 class="text--size--18 align-self-center text--center"><?php echo $block_title; ?></h4>
                                </div>

                                <?php if ($content) : ?>
                                    <div class="circle_blocks__content content-block">
                                        <div class="color-<?php echo $i; ?>">
                                            <?php echo $content; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if ($persent_row_inner) : ?>
                                    <div class="circle_blocks__persents_row d-none row">
                                        <?php foreach ($persent_row_inner as $col) :
                                            $top_subtitle = $col['top_subtitle'];
                                            $top_text = $col['top_text'];
                                            $small_text = $col['small_text'];
                                            $persent_number = $col['persent_number'];
                                            $bottom_text = $col['bottom_text']; ?>
                                            <div class="persents_col col-4 text--center">
                                                <p class="text--size--42"><?php echo $top_subtitle; ?></p>
                                                <p class="color_text text--size--42 text-color-white <?php echo $bgColorClass; ?>"><?php echo $top_text; ?></p>
                                                <p class="text--size--18 text-color-gray"><?php echo $small_text; ?></p>
                                                <p class="text--size--100 font--weight--900"><?php echo $persent_number; ?></p>
                                                <p class="text--size--24 bottom_text text-color-gray"><?php echo $bottom_text; ?></p>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="circle_blocks__mirror-img">
                                <div class="dotted"></div>
                                <?php echo get_inline_svg_assets('/images/mirror_' . $i . '.svg'); ?>
                            </div>
                        </div>
                    <?php $i++;
                    endforeach; ?>
                </div>
            </div>
            <div class="circle_blocks__content content-block show">
            </div>
        </div>

        <div class="circle_blocks__bottom">
            <div class="numbers_row">
                <div class="persents_row mt-60 d-flex">

                </div>
            </div>
        </div>

    </div>
</section>