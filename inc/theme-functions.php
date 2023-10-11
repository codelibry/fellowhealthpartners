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

function get_inline_svg_social($name)
{
  if ($name) :
    return file_get_contents(esc_url(get_template_directory_uri() . '/assets/icons/social/' . $name));
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

function removeParam($url, $param)
{
  $url = preg_replace('/(&|\?)' . preg_quote($param) . '=[^&]*$/', '', $url);
  $url = preg_replace('/(&|\?)' . preg_quote($param) . '=[^&]*&/', '$1', $url);
  return $url;
}


// Include our function when all wordpress stuff is loaded


function add_page_name_body_class($classes)
{
  if (is_page()) {
    global $post;
    $classes[] = $post->post_name;
  }
  return $classes;
}

add_filter('body_class', 'add_page_name_body_class');

// for careers page

function encodeURI($uri)
{
  return preg_replace_callback("{[^0-9a-z_.!~*'();,/?:@&=+$#-]}i", function ($m) {
    return sprintf('%%%02X', ord($m[0]));
  }, $uri);
}

/**
 * Remove Contact Form 7 auto added p tags
 */
add_filter('wpcf7_autop_or_not', '__return_false');

/**
 * From old theme
 */

function fellow_body_classes($classes)
{
  // Adds a class of hfeed to non-singular pages.
  if (!is_singular()) {
    $classes[] = 'hfeed';
  }

  // Adds a class of no-sidebar when there is no sidebar present.
  if (!is_active_sidebar('sidebar-1')) {
    $classes[] = 'no-sidebar';
  }

  return $classes;
}
add_filter('body_class', 'fellow_body_classes');

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function fellow_pingback_header()
{
  if (is_singular() && pings_open()) {
    printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
  }
}
add_action('wp_head', 'fellow_pingback_header');
