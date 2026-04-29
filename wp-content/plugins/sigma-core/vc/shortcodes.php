<?php
/**
 * Wp bakery Shortcodes
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package sigma Core
 */
if ( class_exists( 'Vc_Manager' ) ) {

	$shortcodes = apply_filters('sigmacore/shortcodes', array(
		trailingslashit( SIGMACORE_PATH ) . 'vc/shortcode-fields/class-sigma-vc-volunteer-shortcode-fields.php',
		trailingslashit( SIGMACORE_PATH ) . 'vc/shortcode-fields/class-sigma-vc-counter-shortcode-fields.php',
		trailingslashit( SIGMACORE_PATH ) . 'vc/shortcode-fields/class-sigma-vc-testimonials-shortcode-fields.php',
		trailingslashit( SIGMACORE_PATH ) . 'vc/shortcode-fields/class-sigma-vc-progress-bar-shortcode-fields.php',
		trailingslashit( SIGMACORE_PATH ) . 'vc/shortcode-fields/class-sigma-vc-custom-tabs-shortcode-fields.php',
		trailingslashit( SIGMACORE_PATH ) . 'vc/shortcode-fields/class-sigma-vc-infobox-shortcode-fields.php',
		trailingslashit( SIGMACORE_PATH ) . 'vc/shortcode-fields/class-sigma-vc-video-shortcode-fields.php',
		trailingslashit( SIGMACORE_PATH ) . 'vc/shortcode-fields/class-sigma-vc-blog-shortcode-fields.php',
		trailingslashit( SIGMACORE_PATH ) . 'vc/shortcode-fields/class-sigma-vc-custom-heading-shortcode-fields.php',
		trailingslashit( SIGMACORE_PATH ) . 'vc/shortcode-fields/class-sigma-vc-list-shortcode-fields.php',
		trailingslashit( SIGMACORE_PATH ) . 'vc/shortcode-fields/class-sigma-vc-gallery-shortcode-fields.php',
		trailingslashit( SIGMACORE_PATH ) . 'vc/shortcode-fields/class-sigma-vc-custom-images-shortcode-fields.php',
		trailingslashit( SIGMACORE_PATH ) . 'vc/shortcode-fields/class-sigma-vc-service-shortcode-fields.php',
		trailingslashit( SIGMACORE_PATH ) . 'vc/shortcode-fields/class-sigma-vc-call-to-action-shortcode-fields.php',
		trailingslashit( SIGMACORE_PATH ) . 'vc/shortcode-fields/class-sigma-vc-basic-slider-shortcode-fields.php',
		trailingslashit( SIGMACORE_PATH ) . 'vc/shortcode-fields/class-sigma-vc-history-shortcode-fields.php',
		trailingslashit( SIGMACORE_PATH ) . 'vc/shortcode-fields/class-sigma-vc-contact-form-shortcode-fields.php',
		trailingslashit( SIGMACORE_PATH ) . 'vc/shortcode-fields/class-sigma-vc-services.php',
		trailingslashit( SIGMACORE_PATH ) . 'vc/shortcode-fields/class-sigma-vc-event-shortcode-fields.php',
		trailingslashit( SIGMACORE_PATH ) . 'vc/shortcode-fields/class-sigma-vc-single-event-shortcode-fields.php',
		trailingslashit( SIGMACORE_PATH ) . 'vc/shortcode-fields/class-sigma-vc-testimonial-slider-shortcode-fields.php',
		trailingslashit( SIGMACORE_PATH ) . 'vc/shortcode-fields/class-sigma-vc-youtube-broadcast-shortcode-fields.php',
		trailingslashit( SIGMACORE_PATH ) . 'vc/shortcode-fields/class-sigma-vc-youtube-playlist-shortcode-fields.php',
		trailingslashit( SIGMACORE_PATH ) . 'vc/shortcode-fields/class-sigma-vc-time-table-shortcode-fields.php',
		trailingslashit( SIGMACORE_PATH ) . 'vc/shortcode-fields/class-sigma-vc-puja-shortcode-fields.php',
		trailingslashit( SIGMACORE_PATH ) . 'vc/shortcode-fields/class-sigma-vc-holis-shortcode-fields.php',

		trailingslashit( SIGMACORE_PATH ) . 'vc/shortcode-fields/extended/vc-column.php',
		trailingslashit( SIGMACORE_PATH ) . 'vc/shortcode-fields/extended/vc-column-inner.php',
		trailingslashit( SIGMACORE_PATH ) . 'vc/shortcode-fields/extended/vc-row.php',
		trailingslashit( SIGMACORE_PATH ) . 'vc/shortcode-fields/extended/vc-row-inner.php',
		trailingslashit( SIGMACORE_PATH ) . 'vc/shortcode-fields/extended/shortcode-vc-icon.php',
		trailingslashit( SIGMACORE_PATH ) . 'vc/shortcode-fields/extended/shortcode-vc-button.php',
	));

	// WooCommerce Shortcodes
	if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
		array_push($shortcodes, trailingslashit( SIGMACORE_PATH ) . 'vc/shortcode-fields/class-sigma-vc-products-shortcode-fields.php');
	}
	// Give shortcodes
	if ( in_array( 'give/give.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
		array_push($shortcodes, trailingslashit( SIGMACORE_PATH ) . 'vc/shortcode-fields/class-sigma-vc-give-donation-shortcode-fields.php');
	}



	foreach ( $shortcodes as $shortcode_file ) {
		if ( file_exists( $shortcode_file ) ) {
			require_once( $shortcode_file );
		}
	}
}
