<?php
$terms = get_the_terms($post->ID, 'testimonials_category');
$subtitle = get_field('case_subtitle');
$popup_text = get_field('popup_text');
$references = get_field('references');
$awards = get_field('awards_images');
?>

<div class="col-lg-12 popup-item popup-open">
    <div class="card card--case bg--white ">
        <div class="row">
            <div class="col-lg-8">
                <span class="category_type button button--small bg--secondary text-color-white font--weight--500">
                    <?php echo $terms[0]->name ?>
                </span>
                <div class="title_block mb-50">
                    <h3 class="h5 text-color-black"><?php the_title(); ?></h3>
                    <?php if ($subtitle) : ?>
                        <p class="subtitle text--size--24 popup-title">
                            <?php echo $subtitle; ?>
                        </p>
                    <?php endif; ?>
                </div>
                <div class="content-block popup-text">
                    <?php the_content(); ?>
                </div>
            </div>
            <div class="col-lg-4 popup-image">
                <?php if (has_post_thumbnail()) : ?>
                    <div class="img_block">
                        <?php the_post_thumbnail('full'); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="hidden_content">
            <div class="content-block popup-content">
                <?php echo $popup_text; ?>
            </div>
            <p class="popup-subtitle"><?php _e('References:', 'fhp'); ?></p>
            <div class="referenses popup-referenses">
                <?php
                foreach ($references as $item) :
                    $title = $item['title'];
                    $position = $item['position']; ?>
                    <div class="col-md-6">
                        <div class="referenses__item ">
                            <p class="text--size--18"><?php echo $title; ?></p>
                            <p class="text--size--13"><?php echo $position; ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="awards popup-awards">
                <?php foreach ($awards as $image) :
                    $image = $image['image']; ?>
                    <img src="<?php echo $image['url']; ?>" alt="Awards image">
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <div class="button_block">
        <a href="#" class="button popup-open button--fluid button--lg bg--secondary text-color-white">
            <?php _e('View Full Case Study', 'fhp'); ?>
        </a>
    </div>
</div>