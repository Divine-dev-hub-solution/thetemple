<?php
/**
 * Maharatri functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Maharatri
 */
 // Theme utility functions
 require get_template_directory() . '/inc/functions-utilities.php';
// Theme Setup
require get_template_directory() . '/inc/functions-setup.php';
// Theme Scripts/Styles
require get_template_directory() . '/inc/functions-scripts.php';
// Custom template tags for this theme.
require get_template_directory() . '/inc/template-tags.php';
// Functions which enhance the theme by hooking into WordPress.
require get_template_directory() . '/inc/template-functions.php';
// Dynamic Css
require get_template_directory() . '/inc/color-customizer.php';
// Subheader Functions
require get_template_directory() . '/inc/functions-subheader.php';
// Sidebar Functions
require get_template_directory() . '/inc/functions-sidebars.php';
// WooCommerce Functions
require get_template_directory() . '/inc/functions-woocommerce.php';
// Load theme options.
require get_template_directory() . '/inc/redux-options/redux-config.php';
// TGM plugin activation.
require get_template_directory() . '/inc/tgm-plugin-activation/required-plugin.php';

// Responsible for post format functions
require get_template_directory() . '/inc/classes/class-maharatri-blog-post-functions.php';
/*========================
CUSTOM WALKERS
========================*/
// Comment walker.
require get_template_directory() . '/classes/class-maharatri-walker-comment.php';
// Category Widget walker.
require get_template_directory() . '/classes/class-maharatri-walker-category.php';
