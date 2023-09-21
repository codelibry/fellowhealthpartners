<?php 
//Services
function services_func($atts, $content = null ){
    $a = shortcode_atts( array(
        'type' => 'up-4'
    ), $atts );

	$args = array(
        'post_type'      => 'page',
        'posts_per_page' => -1,
        'post_parent'    => 14,
        'order'          => 'ASC',
        'orderby'        => 'menu_order'
	);

    $featured = new WP_Query($args);
    
	$result = '';
      if ($featured->have_posts()):
        global $post;
        $result .= '<div class="fellow-services type-' . $a['type'] . '">';

        while($featured->have_posts()): $featured->the_post(); $post_thumbnail = get_the_post_thumbnail_url( $post->ID, 'full' );
        
            $result .= '<div class="fellow-services__item">';
            $result .= '<a href="' . get_the_permalink() . '" class="fellow-services__img" style="background: url(' . $post_thumbnail . ') no-repeat 50% 0; background-size: cover;"></a>';
            $result .= '<div class="fellow-services__content">';
            $result .= '<a href="' . get_the_permalink() . '">' . get_the_title() .'</a>';
            $result .= '</div></div>';
            
        endwhile; wp_reset_query();

        $result .= '</div>';

    endif;
	return $result;
}

add_shortcode( 'services', 'services_func' );


//Services
function services_rest_func(){
    global $post;

	$args = array(
        'post_type'      => 'page',
        'posts_per_page' => -1,
        'post_parent'    => 14,
        'order'          => 'ASC',
        'orderby'        => 'menu_order',
        'post__not_in' => array($post->ID)
	);

    $featured = new WP_Query($args);
    
	$result = '';
      if ($featured->have_posts()):
        global $post;
        $result .= '<div class="fellow-services type-up-3">';

        while($featured->have_posts()): $featured->the_post(); $post_thumbnail = get_the_post_thumbnail_url( $post->ID, 'full' );
        
            $result .= '<div class="fellow-services__item">';
            $result .= '<a href="' . get_the_permalink() . '" class="fellow-services__img" style="background: url(' . $post_thumbnail . ') no-repeat 50% 0; background-size: cover;"></a>';
            $result .= '<div class="fellow-services__content">';
            $result .= '<a href="' . get_the_permalink() . '">' . get_the_title() .'</a>';
            $result .= '</div></div>';
            
        endwhile; wp_reset_query();

        $result .= '</div>';

    endif;
	return $result;
}

add_shortcode( 'services_rest', 'services_rest_func' );


function testimonials_slider_func($atts, $content = null ){
    $a = shortcode_atts( array(
        'title' => 'Testimonials',
        'view_all' => 'View all Testimonials'
    ), $atts );

	$args = array(
        'post_type'      => 'testimonials',
        'posts_per_page' => 12,
        'order'          => 'ASC',
        'orderby'        => 'menu_order'
	);

    $featured = new WP_Query($args);
    
	$result = '';
      if ($featured->have_posts()):
        global $post;
        $result .= '<div class="testimonials-carousel">';
        
        $result .= '<header class="testimonials-carousel__header">
            <div class="fellow-heading"><h2 class="title">' . $a['title'] . '</h2></div>
            <a href="'. get_the_permalink(18) .'" class="button simple arrow-right large">' . $a['view_all'] . '</a>
        </header>';

        $result .= '<div class="testimonials-carousel__wrapper js-testimonials-carousel">';

        while($featured->have_posts()): $featured->the_post(); $post_thumbnail = get_the_post_thumbnail_url( $post->ID, 'full' );
            $position = get_field('testimonials_position', $post->ID );
            $location = get_field('testimonials_location', $post->ID );

            $result .= '<div class="testimonials-carousel__item">';
            $result .= '<header class="testimonials-carousel__item-header">';
            if(get_the_title()):
            $result .= '<h3>' . get_the_title() . '</h3>';
            endif;
            if($position) {
                $result .= '<p><span>' . $position . '</span></p>';
            }

            if($location) {
                $result .= '<p><span>' . $location . '</span></p>';
            }

            $result .= '</header>';

            $result .= '<div class="testimonials-carousel__content">' . get_the_content() . '</div>';
            $result .= '<div class="testimonials-carousel__readmore"><a href="' . get_the_permalink(18) .'" class="button simple arrow-right">Read more</a></div>';
            $result .= '</div>';
            
        endwhile; wp_reset_query();
        $result .= '</div>';

        $result .='<div class="carousel-buttons">
                <div class="dots js-testimonials-carousel-dots"></div>
                <div class="arrows js-testimonials-carousel-arrows"></div>
            </div>';

        $result .= '</div>';

    endif;
	return $result;
}

add_shortcode( 'testimonials_slider', 'testimonials_slider_func' );



function splitted_content_pages_func($atts, $content = null ){
    $a = shortcode_atts( array(
        'ids' => '',
        'title' => ''
    ), $atts );


	$args = array(
        'post_type'      => 'page',
        'posts_per_page' => -1,
        'post__in' => explode(',', $a['ids']),
        'order'          => 'ASC',
        'orderby'        => 'menu_order'
	);

    $featured = new WP_Query($args);

	$result = '';
      if ($featured->have_posts()):
        global $post;
    
        $result .= '<div class="splitted-content">';
        
        $result .= '<header class="splitted-content__header"><div class="fellow-heading"><h2 class="title">' . $a['title'] . '</h2></div></header>';

        $result .= '<div class="splitted-content__items">';

        while($featured->have_posts()): $featured->the_post(); 
            $post_thumbnail = get_the_post_thumbnail_url( $post->ID, 'full' );
            $post_thumbnail = aq_resize($post_thumbnail, 688, 368, true, true, true );
            $logo = get_field('training_logo', $post->ID );
            $short_text = get_field('training_short_text', $post->ID );
            $result .= '<div class="splitted-content__row">';

            if($post_thumbnail):
            $result .= '<div class="splitted-content__image curved-image"><img src="' . $post_thumbnail . '" alt=""></div>';
            endif;

            $result .= '<div class="splitted-content__content">';
                if($logo):
                    $result .= '<div class="splitted-content__logo"><img src="' . $logo . '" alt=""></div>';
                endif;

                if(get_the_title()):
                    $result .= '<h3>' . get_the_title() . '</h3>';
                endif;

   
                if($short_text):
                $result .= '<div class="splitted-content__description">' . $short_text . '</div>';
                endif;
                
                $result .= '<div class="splitted-content__readmore"><a href="' . get_the_permalink() .'" class="button simple arrow-right">Read more</a></div>';

            $result .= '</div></div>';

            
        endwhile; wp_reset_query();
        $result .= '</div>';

    
        $result .= '</div>';

    endif;
	return $result;
}

add_shortcode( 'splitted_content_pages', 'splitted_content_pages_func' );



function contacts_func(){
     global $fellow_options;
     
    $result = '<ul class="contacts-shortcode"><li><a href="tel: ' . $fellow_options['phone'] . '" ><div class="icon"><img src="' . get_template_directory_uri() . '/images/phone.svg" alt=""></div>' . $fellow_options['phone'] . '</a></li><li><a href="mailto:' . $fellow_options['mail'] . '" ><div class="icon"><img src="' . get_template_directory_uri() . '/images/mail.svg" alt=""></div>' . $fellow_options['mail'] . '</a></li></ul>';

	return $result;
}

add_shortcode( 'contacts', 'contacts_func' );

function contact_box_func($atts, $content = null){
    global $fellow_options;
    
    $a = shortcode_atts( array(
        'title' => 'For more information or Questions',
        'subtitle' => 'Contact Jennifer Church, CPC, CPC-I, ROCC directly at         ',
        'mail' => 'JenniferChurch@fellowhealthpartners.com',
        'phone' => '(631) 203-1370'
    ), $atts );

    
   $result = '<div class="contact-box"><div class="inner"><div class="contact-box-header"><h2>' . $a['title'] .'</h2><p>' . $a['subtitle'] .'</p></div><ul class="contacts"><li><a href="tel: ' . $fellow_options['phone'] . '" ><div class="icon"><img src="' . get_template_directory_uri() . '/images/phone.svg" alt=""></div>' . $a['phone'] . '</a></li><li><a href="mailto:' . $fellow_options['mail'] . '" ><div class="icon"><img src="' . get_template_directory_uri() . '/images/mail.svg" alt=""></div>' . $a['mail'] . '</a></li></ul></div></div>';

   return $result;
}

add_shortcode( 'contact-box', 'contact_box_func' );


//Services
function tools_rest_func(){
    global $post;

	$args = array(
        'post_type'      => 'page',
        'posts_per_page' => -1,
        'post_parent'    => 1388,
        'order'          => 'ASC',
        'orderby'        => 'menu_order',
        'post__not_in' => array($post->ID)
	);

    $featured = new WP_Query($args);
    
	$result = '';
      if ($featured->have_posts()):
        global $post;
        $result .= '<div class="fellow-services type-up-3">';

        while($featured->have_posts()): $featured->the_post(); $post_thumbnail = get_the_post_thumbnail_url( $post->ID, 'full' );
        
            $result .= '<div class="fellow-services__item">';
            $result .= '<a href="' . get_the_permalink() . '" class="fellow-services__img" style="background: url(' . $post_thumbnail . ') no-repeat 100% 0; background-size: cover;"></a>';
            $result .= '<div class="fellow-services__content">';
            $result .= '<a href="' . get_the_permalink() . '">' . get_the_title() .'</a>';
            $result .= '</div></div>';
            
        endwhile; wp_reset_query();

        $result .= '</div>';

    endif;
	return $result;
}

add_shortcode( 'tools_rest', 'tools_rest_func' );


function as_seen_in_list_func($atts, $content = null ){
    ob_start();
    ?> 
    <div class="as-seen-in-grid">

    <?php 
        $clients_q = new WP_Query( array('post_type'=>'our_clients', 'posts_per_page'=>-1) );
        while( $clients_q->have_posts() ) : $clients_q->the_post();
    ?>
      
        <?php
        $post_thumbnail = get_the_post_thumbnail_url( $clients_q->ID, 'full' );
        $link = get_field( "link", $clients_q->ID );
        if($post_thumbnail):?>
            
            <div class="as-seen-in-grid__item">
                <?php if($link): ?>
                    <a href="<?php echo $link;?>" target="_blank">
                <?php endif;?>   
                    <img src="<?php echo $post_thumbnail;?>" alt="">
                <?php if($link):?>
                    </a>
                <?php endif;?>
            </div>
        <?php endif;?>
    <?php
        endwhile; wp_reset_query();
    ?>  

    </div>
    <?php
        return ob_get_clean();
}

add_shortcode( 'as-seen-in-list', 'as_seen_in_list_func' );


function as_seen_in_ticker_func($atts, $content = null ){
    ob_start();
    ?> 
    <section id="wide-clients">
    <div class="wide-clients-wrapper big-row">
             <ul id="slick-clients" class="wide_clients_slick_sliderr" style="">
              <?php 
                $clients_q = new WP_Query( array('post_type'=>'our_clients', 'posts_per_page'=>-1) );
                while( $clients_q->have_posts() ) : $clients_q->the_post();
              ?>
                  <li>
                      <?php  
                              $post_thumbnail = get_the_post_thumbnail_url( $clients_q->ID, 'full' );
                              $link = get_field( "link", $clients_q->ID );
                              if($post_thumbnail):
                                  if($link): ?>
                                      <a href="<?php echo $link;?>" target="_blank">
                                  <?php endif;?>   
                                      <img src="<?php echo $post_thumbnail;?>" alt="" class="no-lazyload">
                                  <?php if($link):?>
                                      </a>
                                  <?php endif;?> 
                              <?php endif;?>     
                  </li>
              <?php
                endwhile; wp_reset_query();
              ?>                
             </ul>
             <div class="slider-nav"></div>
            <style>
                #wide_clients_slick_slider li img {
                    position: static !important;
                }
            </style>
    </div>
  </section>
  <?php
	return ob_get_clean();
}

add_shortcode( 'as-seen-in-ticker', 'as_seen_in_ticker_func' );
