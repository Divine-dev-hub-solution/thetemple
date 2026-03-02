<?php
/**
 * Template part for header logo.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Maharatri
 */
?>
<div class="site-logo-wrapper">
	<?php
	// Logo
	maharatri_get_site_logo('site-logo');
	if( maharatri_get_option('sticky-logo') && maharatri_get_option('sticky-header-enable') ){
		maharatri_get_site_logo('sticky-logo', false);
	}
	// Info Card
	if( maharatri_get_option('display_info_card') ){
		get_template_part( 'template-parts/header/elements/info-card' );
	}
	?>
</div>
