<?php
/**
* Maharatri Theme scripts and styles.
*
* @package Maharatri
*/
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
function maharatri_load_google_fonts(){
	$fonts_url = '';
		/* Translators: If there are characters in your language that are not
		* supported by Open Sans, translate this to 'off'. Do not translate
		* into your own language.
		*/
		$lora = _x( 'on', 'Lora font: on or off', 'maharatri' );
		/* Translators: If there are characters in your language that are not
		* supported by Open Sans, translate this to 'off'. Do not translate
		* into your own language.
		*/
		$poppins = _x( 'on', 'Poppins font: on or off', 'maharatri' );
		if ( 'off' !== $lora ||'off' !== $poppins ) {
			$font_families = array();
			if ( 'off' !== $lora ) {
			$font_families[] = 'Lora:wght@400;500;600;700';
			}
			if ( 'off' !== $poppins ) {
			$font_families[] = 'family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap';
			}
			$query_args =
			array(
                'family' => implode( '&', $font_families ),
			);
            $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css2' );
		}
	return $fonts_url;
}
/**
 * Enqueue scripts and styles.
 *
 * @since 1.0.0
 */
function maharatri_scripts() {
	$theme_data = wp_get_theme();
	if ( is_child_theme() && is_object( $theme_data->parent() ) ) {
		$theme_data = wp_get_theme( $theme_data->parent()->template );
	}
	$version = $theme_data->get( 'Version' );
	// 3rd Party Styles
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '4.0.0' );
	wp_enqueue_style( 'bootstrap-select', get_template_directory_uri() . '/assets/css/bootstrap-select.css', array(), '1.13.14' );
	wp_enqueue_style( 'v4-shims', get_template_directory_uri() . '/assets/fonts/css/v4-shims.min.css', array(), '5.11.2' );
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/fonts/css/font-awesome.min.css', array( 'v4-shims' ), '5.11.2' );
	wp_enqueue_style( 'flaticon', get_template_directory_uri() . '/assets/css/flaticon.css', array(), $version );
	wp_enqueue_style( 'magnific-popup', get_template_directory_uri() . '/assets/css/magnific-popup.css', array(), '1.1.0' );
	wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/css/slick.css', array(), '1.0.0' );
	wp_enqueue_style( 'slicknav', get_template_directory_uri() . '/assets/css/slicknav.min.css', array(), '1.0.10' );
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/css/animate.min.css', array(), '4.1.1' );

	// Theme Styles
	wp_enqueue_style( 'maharatri-style', get_stylesheet_uri(), array( 'bootstrap' ) );
	wp_enqueue_style( 'maharatri-theme', get_template_directory_uri() . '/assets/css/theme.css', array(), $version );

	// give
	if( class_exists( 'Give' ) ){
		wp_enqueue_style( 'maharatri-give', get_template_directory_uri() . '/assets/css/theme-give.css', array(), $version );
	}

	wp_enqueue_style( 'maharatri-responsive', get_template_directory_uri() . '/assets/css/responsive.css', array(), $version );
	// 3rd Party Scripts
	wp_enqueue_script('masonry');
	wp_enqueue_script('imagesloaded');
	wp_enqueue_script( 'popper', get_template_directory_uri() . '/assets/js/popper.min.js', array( 'jquery' ), $version, true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array( 'jquery' ), '4.0.0', true );
	wp_enqueue_script( 'bootstrap-select', get_template_directory_uri() . '/assets/js/bootstrap-select.js', array( 'jquery' ), '1.13.14', true );
	wp_enqueue_script( 'isotope', get_theme_file_uri( '/assets/js/isotope.min.js'), array('jquery'), false, true );
	wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/assets/js/magnific-popup.js', array( 'jquery' ), '1.1.0', true );
	wp_enqueue_script( 'jquery-inview', get_template_directory_uri() . '/assets/js/jquery.inview.min.js', array( 'jquery' ), $version, true );
	wp_enqueue_script( 'jquery-countTo', get_template_directory_uri() . '/assets/js/jquery.countTo.js', array( 'jquery' ), $version, true );
	wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/js/slick.min.js', array( 'jquery' ), '1.0.0', true );
	wp_enqueue_script( 'player', get_template_directory_uri() . '/assets/js/player.js', array( 'jquery' ), '1.0.0', true );
	wp_enqueue_script( 'jquery-countdown', get_template_directory_uri() . '/assets/js/jquery.countdown.min.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script('maharatri-ajax-login-register', get_template_directory_uri() . '/assets/js/ajax-login-register.js', array('jquery'), $version, true);
	// Theme Scripts
	wp_enqueue_script( 'maharatri-theme', get_template_directory_uri() . '/assets/js/theme.js', array( 'jquery' ), $version, true );
	wp_localize_script( 'maharatri-theme', 'ajax_woocommerce_object', array(
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'loadingmessage' => esc_html('Sending user info, please wait...'),
        'security_nonce' => wp_create_nonce( "maharatri-ajax-security-nonce" )
	));

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	// Custom JavaScript - Custom Code" plugin when activated
  if ( ! class_exists( 'maharatri_custom_js_code' ) && ! empty( maharatri_get_option('js_editor')) ) {
      wp_register_script( 'maharatri-custom-js', '', [], '', true );
      wp_enqueue_script( 'maharatri-custom-js' );
      wp_add_inline_script( 'maharatri-custom-js', maharatri_get_option('js_editor') );
  }
}
add_action( 'wp_enqueue_scripts', 'maharatri_scripts', 10 );

/**
* Enqueue google fonts
*
* @since 1.0.0
*/
function maharatri_enqueue_google_fonts() {
	// Maharatri Google Fonts
	wp_enqueue_style( 'maharatri-fonts', maharatri_load_google_fonts(), array(), null );
}
add_action('wp_footer', 'maharatri_enqueue_google_fonts');

/**
 * Enqueue the dynamic CSS
 *
 * @since 1.0.0
 */
function maharatri_dynamic_css_sheet(){
	wp_enqueue_style( 'maharatri-dynamic', get_template_directory_uri() . '/assets/css/dynamic.css', array(), '1.0.0' );
	// Theme options custom css
	$custom_dynamic_style = maharatri_custom_dynamic_style();
	if( ! empty( $custom_dynamic_style ) ){
		wp_add_inline_style( 'maharatri-dynamic', $custom_dynamic_style );
	}
}
add_action( 'wp_enqueue_scripts', 'maharatri_dynamic_css_sheet', 30 );
/**
 * Enqueue scripts and styles for backend.
 *
 * @since 1.0.0
 */
function maharatri_enqueue_scripts_admin( $hook ) {
	$theme_data = wp_get_theme();
	if ( is_child_theme() && is_object( $theme_data->parent() ) ) {
		$theme_data = wp_get_theme( $theme_data->parent()->template );
	}
	$version = $theme_data->get( 'Version' );
	wp_enqueue_style( 'v4-shims', get_template_directory_uri() . '/assets/fonts/css/v4-shims.min.css', array(), '5.11.2' );
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/fonts/css/font-awesome.min.css', array( 'v4-shims' ), '5.11.2' );
	wp_enqueue_style( 'flaticon', get_template_directory_uri() . '/assets/css/flaticon.css', array(), $version );
}
add_action( 'admin_enqueue_scripts', 'maharatri_enqueue_scripts_admin' );


/**
* Enquey fontawesome in Redux panel
*
* @since 1.0.0
*/
function maharatri_redux_fontawesome() {
    wp_register_style(
        'redux-font-awesome',
        get_template_directory_uri() . '/assets/fonts/css/font-awesome.min.css',
        array(),
        time(),
        '5.11.2'
    );
    wp_enqueue_style( 'redux-font-awesome' );
}
// This example assumes the opt_name is set to redux_demo.  Please replace it with your opt_name value.
add_action( 'redux/page/maharatri_options/enqueue', 'maharatri_redux_fontawesome' );
