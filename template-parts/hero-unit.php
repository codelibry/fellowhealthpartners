<?php 
$page_id = get_queried_object();

$show_hero_unit = get_field('show_hero_unit', $page_id);

if($show_hero_unit) :
    $hero_slider = get_field('is_slider', $page_id);
    $heroArr = Array();

    if($hero_slider):
        $slides = get_field('slides', $page_id);
    
        for ($i = 1; $i <=4 ; $i++) {
        
            if($slides['show_slide_' . $i]):
                
                $heroArr[$i] = Array();
                $slide = $slides['slide_'. $i];
    
                if($slide['title']) {
                    $heroArr[$i]['title'] = $slide['title'];
                }

                if($slide['description']) {
                    $heroArr[$i]['description'] = $slide['description'];
                }

                if($slide['button']) {
                    $heroArr[$i]['button'] = Array(
                        'url' => $slide['button']['url'],
                        'title'=> $slide['button']['title'],
                        'target'=> $slide['button']['target'] ? $slide['button']['target'] : '_self'
                    );
                }

                $heroArr[$i]['button_type'] = $slide['button_type'];

                if($slide['image']) {
                    $heroArr[$i]['image'] = $slide['image'];
                }

                if($slide['image_mobile']) {
                    $heroArr[$i]['image_mobile'] = $slide['image_mobile'];
                }

                if($slide['title_quotes']) {
                    $heroArr[$i]['title_quotes'] = $slide['title_quotes'];
                }


            endif;

        }

    else:
        $hero_content = get_field('hero_content', $page_id);
      
        $heroArr['1'] = Array();

        if($hero_content['title']) {
            $heroArr['1']['title'] = $hero_content['title'];
        }

        if($hero_content['description']) {
            $heroArr['1']['description'] = $hero_content['description'];
        }

        if($hero_content['button']) {
            $heroArr['1']['button'] = Array(
                'url' => $hero_content['button']['url'],
                'title'=> $hero_content['button']['title'],
                'target'=> $hero_content['button']['target'] ? $hero_content['button']['target'] : '_self'
            );
        }

        $heroArr['1']['button_type'] = $hero_content['button_type'];

        if($hero_content['image']) {
            $heroArr['1']['image'] = $hero_content['image'];
        }

        if($hero_content['image_mobile']) {
            $heroArr['1']['image_mobile'] = $hero_content['image_mobile'];
        }

        if($hero_content['logo']) {
            $heroArr['1']['logo'] = $hero_content['logo'];
        }

        if($slide['title_quotes']) {
            $heroArr['1']['title_quotes'] = $slide['title_quotes'];
        }



    endif;
endif;

// echo '<pre>';
// print_r($heroArr);
// echo '</pre>';
?>

<?php if($show_hero_unit && !is_search()) :?>
<section class="hero-unit<?php if($hero_slider):?> has-hero-slider<?php endif;?> wave-bottom" <?php if(!$hero_slider):?> style="background-image: url(<?php echo $heroArr['1']['image'];?>);"<?php endif;?>>
        <div class="overlay"></div>

        <?php if(!$hero_slider):?>
            <?php if($heroArr['1']['image_mobile']):?>
                <img src="<?php echo aq_resize($heroArr['1']['image_mobile'], 775, 554, true, true, true );?>" alt="" class="d-md-none hero-unit__mobile-image">
            <?php endif;?>
        <?php endif;?>

        <?php if($hero_slider):?>
            <div class="hero-unit__slider-images js-hero-unit-images">
                <?php foreach($heroArr as $item) :?>
                    <div class="hero-unit__slider-item" style="background-image: url(<?php echo $item['image'];?>);">
                    <?php if($item['image_mobile']):?>
                    <img src="<?php echo aq_resize($item['image_mobile'], 775, 554, true, true, true );?>" alt="" class="d-md-none hero-unit__mobile-image">
                    <?php endif;?>
                </div>

                  
                <?php endforeach;?>
            </div>
        <?php endif; ?>

        <div class="container">
            <div class="hero-unit__content">
                <div class="hero-unit__items<?php if($hero_slider):?> js-hero-unit-slider<?php endif;?>">
                    <?php foreach($heroArr as $item) :?>
                        <div class="hero-unit__item">
                            <?php if($item['title']):?>
                                <h1 class="hero-unit__title<?php if($item['title_quotes']):?> has-quotes<?php endif;?>"><?php echo $item['title'];?></h1>
                            <?php endif;?>

                            <?php if($item['logo']):?>
                                <div class="hero-unit__logo"><img src="<?php echo $item['logo'];?>" alt=""></div>
                            <?php endif;?>

                            <?php if($item['description']):?>
                                <div class="hero-unit__description"><?php echo $item['description'];?></div>
                            <?php endif;?>

                            <?php if(!empty($item['button'])):?>
                                <div class="hero-unit__button"><a href="<?php echo $item['button']['url'];?>" class="button <?php echo $item['button_type']; if($item['button_type'] == 'down' || $item['button_type'] == 'toggle'):?> js-scroll-down<?php endif;?> " target="<?php echo $item['button']['target'];?>"><?php echo $item['button']['title'];?></a></div>
                            <?php endif;?>

                        </div>
                    <?php endforeach;?>
                </div>

                <div class="hero-unit__slider-buttons">
                    <div class="dots js-hero-slider-dots"></div>
                    <div class="arrows js-hero-slider-arrows"></div>
                </div>
            </div>
        </div>
</section>
<?php endif;?>