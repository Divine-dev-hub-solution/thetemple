<?php
/**
 * Plugin Name:       Sigma Core
 * Description:       This is core plugin for Sigma themes.
 * Version:           1.0.0
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       sigma-core
 *
 * @package Sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
define( 'SIGMACORE_PATH', plugin_dir_path( __FILE__ ) );
define( 'SIGMACORE_URL', plugin_dir_url( __FILE__ ) );
$theme = wp_get_theme();
/* Stop plugin activation if theme doesn't exist */
if ( 'Maharatri' != $theme->name && ( $theme->parent_theme != '' && 'Maharatri' != $theme->parent_theme ) ) {
	add_action('admin_notices', 'sigmacore_admin_notice_missing_main_theme');
	return;
}
/**
 * Load plugin textdomain.
 *
 * @since 1.0.0
 */
function sigmacore_load_textdomain() {
	load_plugin_textdomain( 'sigma-core', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}
add_action( 'plugins_loaded', 'sigmacore_load_textdomain' );
function sigmacore_admin_notice_missing_main_theme() {
	if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );
	$message = sprintf(
		/* translators: 1: Plugin Name 2: Maharatri*/
		esc_html__( '"%1$s" requires "%2$s" theme to be installed and activated.', 'sigma-core' ),
		'<strong>' . esc_html__( 'Sigma Core', 'sigma-core' ) . '</strong>',
		'<strong>' . esc_html__( 'Maharatri', 'sigma-core' ) . '</strong>'
	);
	printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
}

/**
 * Required template post types
 */
require_once trailingslashit( SIGMACORE_PATH ) . 'core/sigmacore-includes.php';
/**
 * Required template post types
 */
require_once trailingslashit( SIGMACORE_PATH ) . 'includes/custom-post-types/custom-post-types.php';
/**
 * Require template meta fields
 */
require_once trailingslashit( SIGMACORE_PATH ) . 'includes/custom-post-metas/custom-post-metas.php';
/**
 * Load shortcodes.
 */
require_once trailingslashit( SIGMACORE_PATH ) . 'vc/shortcodes.php';
/**
 * Load helper functions.
 */
require_once trailingslashit( SIGMACORE_PATH ) . 'includes/helper-functions.php';
/**
 * Load script style
 */
require_once trailingslashit( SIGMACORE_PATH ) . 'includes/script-styles.php';
/**
 * Load widgets
 */
require_once trailingslashit( SIGMACORE_PATH ) . 'includes/widgets.php';
