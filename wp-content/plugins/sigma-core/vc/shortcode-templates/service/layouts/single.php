<?php
/**
 * Service shortcode gird layout file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) { // Or some other WordPress constant
	exit;
}
global $sigma_shortcodes, $service_post, $atts;
$atts        = $sigma_shortcodes[ 'sigma_service' ][ 'atts' ];
$posts_array   = $sigma_shortcodes[ 'sigma_service' ][ 'posts_array' ];
?>
	<?php
foreach ($posts_array as $service_post) {
    sigmacore_get_vc_shortcode_template( 'service/styles/' . $atts[ 'style' ] );
	}
	?>
