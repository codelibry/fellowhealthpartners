<?php
/*
	=====================
		Theme functions
	=====================	
*/



/*
	=====================
		Limit excerpt length function
	=====================	
*/
function excerpt($limit, $post_id = -1)
{
  if ($post_id == -1) :
    $excerpt = explode(' ', get_the_excerpt(), $limit);
  else :
    $excerpt = explode(' ', get_the_excerpt($post_id), $limit);
  endif;
  if (count($excerpt) >= $limit) {
    array_pop($excerpt);
    $excerpt = implode(" ", $excerpt) . '...';
  } else {
    $excerpt = implode(" ", $excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`', '', $excerpt);
  return $excerpt;
}


/*
	=====================
		Don't scale down large images
	=====================	
*/
add_filter('big_image_size_threshold', '__return_false');


/*
	=====================
		Move Yoast to bottom
	=====================	
*/
function yoasttobottom()
{
  return 'low';
}
add_filter('wpseo_metabox_prio', 'yoasttobottom');


/*
	=====================
		Remove Gutenberg Block Library CSS from loading on the frontend
	=====================	
*/
function smartwp_remove_wp_block_library_css()
{
  wp_dequeue_style('wp-block-library');
  wp_dequeue_style('wp-block-library-theme');
}
add_action('wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css');


/*
	=====================
		Get width and height from SVG files
	=====================	
*/
function fix_wp_get_attachment_image_svg($image, $attachment_id, $size, $icon)
{
  if (is_array($image) && preg_match('/\.svg$/i', $image[0]) && $image[1] <= 1) {
    if (is_array($size)) {
      $image[1] = $size[0];
      $image[2] = $size[1];
    } elseif (($xml = simplexml_load_file($image[0])) !== false) {
      $attr = $xml->attributes();
      $viewbox = explode(' ', $attr->viewBox);
      $image[1] = isset($attr->width) && preg_match('/\d+/', $attr->width, $value) ? (int) $value[0] : (count($viewbox) == 4 ? (int) $viewbox[2] : null);
      $image[2] = isset($attr->height) && preg_match('/\d+/', $attr->height, $value) ? (int) $value[0] : (count($viewbox) == 4 ? (int) $viewbox[3] : null);
    } else {
      $image[1] = $image[2] = null;
    }
  }
  return $image;
}
add_filter('wp_get_attachment_image_src', 'fix_wp_get_attachment_image_svg', 10, 4);

/*
	=====================
		Get SVG file content
	=====================	
*/

/** Inline SVG by path for acf any uploaded media with image array - return URL */

function get_inline_svg_by_path($path)
{
  if ($path) :
    return file_get_contents(esc_url($path));
  endif;

  return '';
}

function get_inline_svg($name)
{
  if ($name) :
    return file_get_contents(esc_url(get_template_directory_uri() . '/assets/icons/' . $name));
  endif;
  return '';
}

/**
 * Clear phone for href
 */
function get_href_phone($phone)
{
  return "tel:" . preg_replace('/\D+/', '', $phone);
}

/**
 * Clear email for href
 */
function get_href_email($email)
{
  return "mailto:" . $email;
}

/**
 * Add filter to CPT
 */

function display_select_filter()
{
  global $post_type;
  if ($post_type == 'cases') { // must change post_type to yours
    $taxonomy = 'Category-type'; // must change taxonomy to yours
    $terms = get_terms(['taxonomy' => $taxonomy, 'hide_empty' => false]);
?>
    <label class="screen-reader-text" for="<?= $taxonomy; ?>_filter"><?= esc_html__("Case", 'my-domain'); ?></label>
    <select name="<?= $taxonomy; ?>" id="<?= $taxonomy; ?>_filter">
      <option value=""><?php _e("All cases", 'my-domain'); ?></option>
      <?php foreach ($terms as $k => $v) : ?>
        <?php $selected = (!empty($_GET[$taxonomy]) && $_GET[$taxonomy] === $v->slug) ? ' selected="selected"' : ''; ?>
        <option value="<?= $v->slug; ?>" <?= $selected; ?>><?= $v->name; ?></option>
      <?php endforeach; ?>
    </select>
<?php
  }
}

add_action('restrict_manage_posts', 'display_select_filter');

function my_excerpt_length($length)
{
  return 50;
}

add_filter('excerpt_length', 'my_excerpt_length');




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


function add_page_name_body_class($classes)
{
  if (is_page()) {
    global $post;
    $classes[] = $post->post_name;
  }
  return $classes;
}

add_filter('body_class', 'add_page_name_body_class');