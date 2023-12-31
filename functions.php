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

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/aq_resizer.php';
require get_template_directory() . '/inc/shortcodes.php';



require get_template_directory() . '/inc/theme-setup.php';
require get_template_directory() . '/inc/theme-support.php';
require get_template_directory() . '/inc/theme-enqueue.php';

require get_template_directory() . '/inc/custom-post-types.php';
require get_template_directory() . '/inc/custom-taxonomies.php';

require get_template_directory() . '/inc/acf.php';
require get_template_directory() . '/inc/theme-functions.php';
require get_template_directory() . '/inc/theme-ajax.php';
