<?php
/**
* Maharatri Theme setup functions
*
* @package Maharatri
*/
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/**
 * Get the available image sizes for the theme.
 *
 * @since 1.0.0
 */
function maharatri_theme_image_sizes(){
	$image_sizes = array(
		'maharatri-portfolio'	=> array(
			'width'  => 570,
			'height'	=> 420,
			'title' => esc_html__( 'Portfolio Image', 'maharatri' ),
			'crop'	=>	true
		),
		'maharatri-stories'	=> array(
			'width'  => 570,
			'height'	=> 420,
			'title' => esc_html__( 'Stories Image', 'maharatri' ),
			'crop'	=>	true
		),
		'maharatri-stories-sm'	=> array(
			'width'  => 370,
			'height'	=> 190,
			'title' => esc_html__( 'Stories Small Image', 'maharatri' ),
			'crop'	=>	true
		),
		'maharatri-stories-square'	=> array(
			'width'  => 370,
			'height'	=> 370,
			'title' => esc_html__( 'Stories Square Image', 'maharatri' ),
			'crop'	=>	true
		),
		'maharatri-blog'	=> array(
			'width'  => 800,
			'height'	=> 520,
			'title' => esc_html__( 'Blog Image', 'maharatri' ),
			'crop'	=>	true
		),
		'maharatri-volunteer'	=> array(
			'width'  => 600,
			'height'	=> 645,
			'title' => esc_html__( 'Volunteer Image', 'maharatri' ),
			'crop'	=>	true
		),
		'maharatri-product'	=> array(
			'width'  => 360,
			'height'	=> 440,
			'title' => esc_html__( 'Product Image', 'maharatri' ),
			'crop'	=>	true
		),
		'maharatri-service'	=> array(
			'width'  => 360,
			'height'	=> 160,
			'title' => esc_html__( 'Service Image', 'maharatri' ),
			'crop'	=>	true
		),
    'maharatri-ministries'	=> array(
        'width'  => 600,
        'height'	=> 670,
        'title' => esc_html__( 'Ministries Image', 'maharatri' ),
        'crop'	=>	true
    ),
	);
	return apply_filters('maharatri/image_sizes', $image_sizes);
}
/**
 * Adjust the names of the theme thumb sizes using the 'image_size_names_choose' filter.
 *
 * @since 1.0.0
 */
function maharatri_theme_thumb_size_names( $sizes ) {
	$image_sizes = maharatri_theme_image_sizes();
	$retina_mult = maharatri_get_retina_multiplier();
	foreach ( $image_sizes as $key => $val ) {
		$sizes[ $key ] = $val['title'];
		if ( $retina_mult > 1 ) {
			$sizes[ $key . '-@retina' ] = $val['title'] . ' ' . esc_html__( '@2x', 'maharatri' );
		}
	}
	return $sizes;
}
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * @since 1.0.0
 */
function maharatri_setup() {
	$GLOBALS['content_width'] = apply_filters( 'maharatri_content_width', 640 );
	// Make theme available for translation.
	load_theme_textdomain( 'maharatri', get_template_directory() . '/languages' );
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	// Autogenerate title tag
	add_theme_support( 'title-tag' );
	//Switch default core markup for search form, comment form, and comments to output valid HTML5.
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', array() );
	// Add theme support for the following post formats
	add_theme_support( 'post-formats', array( 'gallery', 'video', 'audio', 'link', 'quote', 'image' ) );
	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
	// Add support for core custom logo.
	add_theme_support( 'custom-logo',
		array(
			'width'       => 250,
			'height'      => 80,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
	// Add WooCommerce support
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
	//Enable Editor Style
	add_theme_support( 'editor-styles' );
	add_editor_style( 'style-editor.css' );
	// Gutenberg support
	add_theme_support( 'align-wide' );
	add_theme_support( 'responsive-embeds' );
	// Register the theme's nav menus
	register_nav_menus(
		array(
			'primary-menu' => esc_html__( 'Primary', 'maharatri' ),
			'mobile-menu' => esc_html__( 'Mobile', 'maharatri' ),
			'top-menu' => esc_html__( 'Top Menu', 'maharatri' ),
		)
	);
	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );
	// Add Image sizes
	$image_sizes = maharatri_theme_image_sizes();
	$retina_mult = maharatri_get_retina_multiplier();
	foreach ( $image_sizes as $key => $val ) {
		add_image_size( $key, $val['width'], $val['height'], $val['crop'] );
		// Retina Image sizes
		if ( $retina_mult > 1 ) {
			add_image_size( $key . '-@retina', $val['width'] * $retina_mult, $val['height'] * $retina_mult, $val['crop'] );
		}
	}
	// Add new thumb names
	add_filter( 'image_size_names_choose', 'maharatri_theme_thumb_size_names' );
}
add_action( 'after_setup_theme', 'maharatri_setup' );
