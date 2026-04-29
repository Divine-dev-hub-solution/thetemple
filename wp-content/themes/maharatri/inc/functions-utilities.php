<?php
/**
* Maharatri Utility functions
*
* @package Maharatri
*/
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Checks if Give Donation plugin is active.
 *
 * @since 1.0.0
 */
 function maharatri_is_give_active(){
	 return class_exists('Give');
 }

/**
 * Gets the ID of the current page.
 *
 * @since 1.0.0
 */
function maharatri_get_page_id(){
  global $post;
  return is_home() ? get_option( 'page_for_posts' ) : (isset( $post->ID ) ? $post->ID : '');
}
/**
 * Checks if a value is set and and not empty
 *
 * @since 1.0.0
 */
function maharatri_is_not_empty( $val, $index = '' ){
	return !empty($index) ? isset( $val[$index] ) && $val[$index] : isset( $val ) && $val;
}

/**
 * Get's the currently assigned page layout
 *
 * @since 1.0.0
 */
function maharatri_get_layout_id()
{

    // Get's the page layout set in the page/post options
    $page_settings = get_post_meta(maharatri_get_page_id(), 'sigma_page_settings', true);
    $layout_id = isset($page_settings['sigma_page_custom_layout']) ? $page_settings['sigma_page_custom_layout'] : '';

    if (!empty($layout_id) && get_post_type($layout_id) == 'layouts') {
        return $layout_id;
    }
    return false;

}

function maharatri_get_template_id()
{

    // Get's the page template set in the page/post options
    $page_settings = get_post_meta(maharatri_get_page_id(), 'sigma_page_settings', true);
    $template_id = isset($page_settings['popup_type_page_template']) ? $page_settings['popup_type_page_template'] : '';

    if (!empty($template_id) && get_post_type($template_id) == 'sigma_templates') {
        return $template_id;
    }
    return false;

}

/**
 * Returns an option value based on the layout set for that page
 *
 * @since 1.0.0
 */
function maharatri_get_layout_option($option)
{

    $layout_id = maharatri_get_layout_id();

    // Check if we have a custom layout for this page
    if ($layout_id) {
        $layout_settings = get_post_meta($layout_id, 'sigma_layout_settings', true);
        $value = isset($layout_settings[$option]) ? $layout_settings[$option] : '';
        if (!empty($value)) {
            return $value;
        }
    }

    return false;

}

/**
 * Get theme options configuration
 *
 * @param string $name - the name of the theme option.
 * @param string $default - value to return if the option is not set.
 *
 * @since 1.0.0
 */
function maharatri_get_option( $name, $default = '' ){
	global $maharatri_options;

	$layout_id = maharatri_get_layout_id();
	$custom_option = maharatri_get_layout_option($name);

	if ( $custom_option != 'theme-options' && $custom_option && $layout_id) {
			return $custom_option;
	} else {
			return isset($maharatri_options[$name]) ? $maharatri_options[$name] : $default;
	}
}
/**
 * Return image size multiplier
 *
 * @since 1.0.0
 */
function maharatri_get_retina_multiplier() {
	return max( 1, maharatri_get_option( 'retina_ready', 1 ) );
}
/**
 * Return an image sizes, alogn with its multiplier
 *
 * @since 1.0.0
 */
function maharatri_get_thumb_size( $size ) {
	$retina = maharatri_get_retina_multiplier() > 1 ? '-@retina' : '';
	return $size . $retina;
}
/**
 * Returns the first term of a post.
 *
 * @since 1.0.0
 */
function maharatri_get_first_term( $post_id, $tax ){
	$terms = get_the_terms( $post_id, $tax );
	return ( isset($terms[0]) && $terms[0] ) ? $terms[0] : '';
}
/**
 * Darken a color.
 *
 * @since 1.0.0
 */
function maharatri_darken_color($rgb, $darker = 2) {
  $hash = (strpos($rgb, '#') !== false) ? '#' : '';
  $rgb = (strlen($rgb) == 7) ? str_replace('#', '', $rgb) : ((strlen($rgb) == 6) ? $rgb : false);
  if(strlen($rgb) != 6) return $hash.'000000';
  $darker = ($darker > 1) ? $darker : 1;
  list($R16,$G16,$B16) = str_split($rgb,2);
  $R = sprintf("%02X", floor(hexdec($R16)/$darker));
  $G = sprintf("%02X", floor(hexdec($G16)/$darker));
  $B = sprintf("%02X", floor(hexdec($B16)/$darker));
  return $hash.$R.$G.$B;
}
/**
 * Convert a color ot rgb.
 *
 * @since 1.0.0
 */
function maharatri_hex_to_rgb($hex, $alpha = false) {
  $hex      = sanitize_hex_color($hex);
  $hex      = str_replace('#', '', $hex);
  $length   = strlen($hex);
  $rgb['r'] = hexdec($length == 6 ? substr($hex, 0, 2) : ($length == 3 ? str_repeat(substr($hex, 0, 1), 2) : 0));
  $rgb['g'] = hexdec($length == 6 ? substr($hex, 2, 2) : ($length == 3 ? str_repeat(substr($hex, 1, 1), 2) : 0));
  $rgb['b'] = hexdec($length == 6 ? substr($hex, 4, 2) : ($length == 3 ? str_repeat(substr($hex, 2, 1), 2) : 0));
  if ( $alpha ) {
    $rgb['a'] = $alpha;
  }
  return $rgb;
}
/**
 * Check if WooCommerce plugin is active.
 *
 * @since 1.0.0
 */
function maharatri_is_woo_active(){
  return class_exists('WooCommerce');
}
/**
 * Checks if YITH Quick view is active.
 *
 * @since 1.0.0
 */
function maharatri_is_yith_wcqv_active(){
  return class_exists('YITH_WCQV');
}
/**
 * Checks if YITH Wish List is active.
 *
 * @since 1.0.0
 */
function maharatri_is_yith_wcwl_active(){
  return class_exists('YITH_WCWL');
}
/**
 * Checks if YITH Compare is active.
 *
 * @since 1.0.0
 */
function maharatri_is_yith_woocompare_active(){
  return class_exists('YITH_Woocompare');
}
/**
 * Checks if OCDI plugin is active.
 *
 * @since 1.0.0
 */
function maharatri_is_ocdi_active(){
  return class_exists('OCDI_Plugin');
}
?>
