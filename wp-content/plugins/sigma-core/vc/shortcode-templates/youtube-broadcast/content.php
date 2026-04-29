<?php
/**
 * Youtube Broadcast shortcode template file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $sigma_shortcodes;
$atts = $sigma_shortcodes[ 'sigma_youtube_broadcast' ][ 'atts' ];
sigmacore_get_vc_shortcode_template( 'youtube-broadcast/styles/' . $atts[ 'style' ] );
