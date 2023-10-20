<?php
/*
=====================
	Add Styles And Scripts
=====================
*/

/**
 * Enqueue scripts and styles.
 */
function fellow_scripts()
{
    wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.6.0.min.js', false, false, true);
    wp_enqueue_script('vendors', get_template_directory_uri() . '/dist/vendors.min.js', false, false, true);
    // wp_enqueue_script('js_bxslider', get_stylesheet_directory_uri() . '/js/libs/jquery.bxslider.min.js', array('jquery'), '1.0.0', true);
    // wp_enqueue_script('magnific', get_template_directory_uri() . '/js/libs/jquery.magnific-popup.min.js', array(), _S_VERSION, true);
    wp_enqueue_script('main', get_template_directory_uri() . '/dist/main.min.js', array('jquery'), false, true);
    //send PHP variables to JS
    wp_localize_script(
        'main',
        'customjs_ajax_object',
        array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'ajax_nonce' => wp_create_nonce("secure_nonce_name"),
            'site_url' => get_site_url(),
            'theme_url' => get_template_directory_uri(),
        )
    );

    wp_enqueue_style('fellow-style', get_stylesheet_uri(), array(), '_S_VERSION');
    wp_enqueue_style('slick-theme', get_template_directory_uri() . '/js/libs/slick/slick-theme.css');
    wp_enqueue_style('slick', get_template_directory_uri() . '/js/libs/slick/slick.css');
    wp_enqueue_style('main', get_template_directory_uri() . '/dist/main.min.css');
    wp_enqueue_style('plyr-css', 'https://cdn.plyr.io/3.7.8/plyr.css',  array());

    $categories = get_terms(array(
        'taxonomy'   => 'category',
        'hide_empty' => true,
    ));

    foreach ($categories as $cat) :
        wp_localize_script(
            'main',
            'customjs_ajax_object_' . $cat->term_id,
            array(
                'ajax_url'    => admin_url('admin-ajax.php'),
                'ajax_nonce'  => wp_create_nonce("secure_nonce_name"),
                'cat_slug'    => $cat->slug,
                'cat_id'      => $cat->term_id,
            )
        );
    endforeach;
}

add_action('wp_enqueue_scripts', 'fellow_scripts');


//additional variables
function javascript_variables()
{ ?>
    <script type="text/javascript">
        var ajax_url = '<?php echo admin_url("admin-ajax.php"); ?>';
        var ajax_nonce = '<?php echo wp_create_nonce("secure_nonce_name"); ?>';
    </script>
<?php
}
add_action('wp_head', 'javascript_variables');
