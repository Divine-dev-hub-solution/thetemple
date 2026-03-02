<?php
/**
 * Register widgets.
 *
 * @package sigma Core
 *
 * @version 1.0.0
 */

/**
 * Call Widgets loaded.
 */
function sigmacore_widgets() {
	require_once trailingslashit( SIGMACORE_PATH ) . '/includes/widgets/class-sigma-widget-recent-posts.php';
	require_once trailingslashit( SIGMACORE_PATH ) . '/includes/widgets/class-sigma-widget-social-share.php';
	require_once trailingslashit( SIGMACORE_PATH ) . '/includes/widgets/class-sigma-widget-call-to-action.php';
	require_once trailingslashit( SIGMACORE_PATH ) . '/includes/widgets/class-sigma-widget-recent-events.php';
	require_once trailingslashit( SIGMACORE_PATH ) . '/includes/widgets/class-sigma-widget-recent-prayer.php';
	require_once trailingslashit( SIGMACORE_PATH ) . '/includes/widgets/class-sigma-widget-recent-philosophy.php';

}
add_action( 'plugins_loaded', 'sigmacore_widgets', 99 );

/**
 * Register widgets
 */
function sigmacore_widgets_init() {
	register_widget( 'Sigma_Widget_Recent_Posts' );
	register_widget('sigma_social_share');
	register_widget('Sigma_Cta_Widget');
	register_widget( 'Sigma_Widget_Recent_Events' );
	register_widget( 'Sigma_Widget_Recent_Prayer' );
	register_widget( 'Sigma_Widget_Recent_Philosophy' );

}
add_action( 'widgets_init', 'sigmacore_widgets_init' );
