<?php
    /**
     * fellow functions and definitions
     *
     * @link https://developer.wordpress.org/themes/basics/theme-functions/
     *
     * @package fellow
     */
    
    if (!defined('_S_VERSION')) {
        // Replace the version number of the theme on each release.
        define('_S_VERSION', '1.0.0');
    }
    
    if (!function_exists('fellow_setup')) :
        /**
         * Sets up theme defaults and registers support for various WordPress features.
         *
         * Note that this function is hooked into the after_setup_theme hook, which
         * runs before the init hook. The init hook is too late for some features, such
         * as indicating support for post thumbnails.
         */
        function fellow_setup()
        {
            // Add default posts and comments RSS feed links to head.
            add_theme_support('automatic-feed-links');
            
            /*
             * Let WordPress manage the document title.
             * By adding theme support, we declare that this theme does not use a
             * hard-coded <title> tag in the document head, and expect WordPress to
             * provide it for us.
             */
            add_theme_support('title-tag');
            
            /*
             * Enable support for Post Thumbnails on posts and pages.
             *
             * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
             */
            add_theme_support('post-thumbnails');
            
            // This theme uses wp_nav_menu() in one location.
            register_nav_menus(
                array(
                    'menu-1' => esc_html__('Primary', 'fellow'),
                    'footer-menu' => esc_html__('Footer', 'fellow'),
                )
            );
            
            /*
             * Switch default core markup for search form, comment form, and comments
             * to output valid HTML5.
             */
            add_theme_support(
                'html5',
                array(
                    'search-form',
                    'comment-form',
                    'comment-list',
                    'gallery',
                    'caption',
                    'style',
                    'script',
                )
            );
            
            // Add theme support for selective refresh for widgets.
            add_theme_support('customize-selective-refresh-widgets');
            add_post_type_support('page', 'excerpt');
            /**
             * Add support for core custom logo.
             *
             * @link https://codex.wordpress.org/Theme_Logo
             */
            add_theme_support(
                'custom-logo',
                array(
                    'height' => 250,
                    'width' => 250,
                    'flex-width' => true,
                    'flex-height' => true,
                )
            );
        }
    endif;
    add_action('after_setup_theme', 'fellow_setup');
    
    
    /**
     * Register widget area.
     *
     * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
     */
    function fellow_widgets_init()
    {
        register_sidebar(
            array(
                'name' => esc_html__('Footer', 'fellow'),
                'id' => 'sidebar-footer',
                'description' => esc_html__('Add widgets here.', 'fellow'),
                'before_widget' => '<section id="%1$s" class="widget %2$s">',
                'after_widget' => '</section>',
                'before_title' => '<h4 class="widget-title">',
                'after_title' => '</h4>',
            )
        );
        
        register_sidebar(
            array(
                'name' => esc_html__('Blog Sidebar', 'fellow'),
                'id' => 'sidebar',
                'description' => esc_html__('Add widgets here.', 'fellow'),
                'before_widget' => '<section id="%1$s" class="widget %2$s">',
                'after_widget' => '</section>',
                'before_title' => '<h4 class="widget-title">',
                'after_title' => '</h4>',
            )
        );
        
        register_sidebar(
            array(
                'name' => esc_html__('Blog post Sidebar', 'fellow'),
                'id' => 'sidebar2',
                'description' => esc_html__('Add widgets here.', 'fellow'),
                'before_widget' => '<section id="%1$s" class="widget %2$s">',
                'after_widget' => '</section>',
                'before_title' => '<h4 class="widget-title">',
                'after_title' => '</h4>',
            )
        );
    }
    
    add_action('widgets_init', 'fellow_widgets_init');
    
    /**
     * Enqueue scripts and styles.
     */
    function fellow_scripts()
    {
        wp_enqueue_style('fellow-style', get_stylesheet_uri(), array(), _S_VERSION);
        
        wp_enqueue_script('js_bxslider', get_stylesheet_directory_uri() . '/js/jquery.bxslider.min.js', array('jquery'), '1.0.0', true);
        wp_enqueue_script('slick', get_template_directory_uri() . '/js/slick.min.js', array(), _S_VERSION, true);
        wp_enqueue_script('magnific', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', array(), _S_VERSION, true);
        wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array(), _S_VERSION, true);
        
    }
    
    add_action('wp_enqueue_scripts', 'fellow_scripts');
    
    
    /**
     * Custom template tags for this theme.
     */
    require get_template_directory() . '/inc/template-tags.php';
    
    /**
     * Functions which enhance the theme by hooking into WordPress.
     */
    require get_template_directory() . '/inc/template-functions.php';
    
    /**
     * Load Jetpack compatibility file.
     */
    if (defined('JETPACK__VERSION')) {
        require get_template_directory() . '/inc/jetpack.php';
    }
    
    if (!isset($redux_demo)) {
        require_once(dirname(__FILE__) . '/inc/admin-config.php');
    }
    
    require get_template_directory() . '/inc/aq_resizer.php';
    require get_template_directory() . '/inc/shortcodes.php';
    
    function create_posttype()
    {
        
        register_post_type('testimonials',
            array(
                'labels' => array(
                    'name' => __('Testimonials'),
                    'singular_name' => __('Testimonial')
                ),
                'public' => true,
                'has_archive' => false,
                'supports' => array('title', 'editor', 'page-attributes')
            )
        );
        
        register_post_type('leadership',
            array(
                'labels' => array(
                    'name' => __('Leadership'),
                    'singular_name' => __('Leadership')
                ),
                'public' => true,
                'has_archive' => false,
                'supports' => array('title', 'editor', 'page-attributes', 'thumbnail')
            )
        );
        
        register_post_type('job',
            array(
                'labels' => array(
                    'name' => __('Job openings'),
                    'singular_name' => __('Job openings')
                ),
                'public' => true,
                'has_archive' => true,
                'supports' => array('title', 'editor', 'page-attributes')
            )
        );
        
        register_post_type('our_clients',
            array(
                'labels' => array(
                    'name' => __('As seen in'),
                    'singular_name' => __('As seen in')
                ),
                'public' => true,
                'publicly_queryable' => true,
                'show_ui' => true,
                'show_in_menu' => true,
                'exclude_from_search' => true,
                'query_var' => true,
                'rewrite' => array(
                    'slug' => 'client'
                ),
                'capability_type' => 'post',
                'has_archive' => false,
                'hierarchical' => false,
                'menu_position' => 12,
                'supports' => array('title', 'editor', 'custom-fields', 'thumbnail')
            )
        );
    }

// Hooking up our function to theme setup
    add_action('init', 'create_posttype');
    
    
    add_filter('excerpt_more', function ($more) {
        return '...';
    });
    
    function my_excerpt_length($length)
    {
        return 50;
    }
    
    add_filter('excerpt_length', 'my_excerpt_length');
    
    
    /***** Remove auto paragraphs from contact form 7*****/
    define('WPCF7_AUTOP', false);
    add_filter('wpcf7_autop_or_not', '__return_false');
    
    
    add_filter('woocommerce_add_to_cart_validation', 'bbloomer_only_one_in_cart', 99, 2);
    
    function bbloomer_only_one_in_cart($passed, $added_product_id)
    {

// empty cart first: new item will replace previous
        wc_empty_cart();
        
        return $passed;
    }
    
    
    add_filter('woocommerce_add_to_cart_redirect', 'misha_skip_cart_redirect_checkout');
    
    function misha_skip_cart_redirect_checkout($url)
    {
        return wc_get_checkout_url();
    }
    
    function removeParam($url, $param)
    {
        $url = preg_replace('/(&|\?)' . preg_quote($param) . '=[^&]*$/', '', $url);
        $url = preg_replace('/(&|\?)' . preg_quote($param) . '=[^&]*&/', '$1', $url);
        return $url;
    }
    
    
    function change_vc_rows()
    {
        
        // Add parameters we want
        vc_add_param('vc_row', array(
            'type' => 'attach_image',
            'heading' => "Mobile Image",
            'param_name' => 'mobile_image',
            'value' => '',
        ));
        
    }

// Include our function when all wordpress stuff is loaded
    add_action('wp_loaded', 'change_vc_rows');


// remove wp version number from scripts and styles
    function remove_css_js_version($src)
    {
        if (strpos($src, '?ver='))
            $src = remove_query_arg('ver', $src);
        return $src;
    }
    
    add_filter('style_loader_src', 'remove_css_js_version', 9999);
    add_filter('script_loader_src', 'remove_css_js_version', 9999);

// add acf option page
    if (function_exists('acf_add_options_page')) {
        
        acf_add_options_page(array(
            'page_title' => 'Theme General Settings',
            'menu_title' => 'Theme Settings',
            'menu_slug' => 'theme-general-settings',
            'capability' => 'edit_posts',
            'redirect' => false
        ));
        
        acf_add_options_sub_page(array(
            'page_title' => 'Theme Footer Settings',
            'menu_title' => 'Footer',
            'parent_slug' => 'theme-general-settings',
        ));
        
    }
    
    function add_page_name_body_class($classes)
    {
        if (is_page()) {
            global $post;
            $classes[] = $post->post_name;
        }
        return $classes;
    }
    
    add_filter('body_class', 'add_page_name_body_class');
