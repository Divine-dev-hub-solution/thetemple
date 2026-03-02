<?php
/**
 * Template part for header social info.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Maharatri
 */
 $header_layout = !empty(maharatri_get_option('header-layout')) ? maharatri_get_option('header-layout') : 'layout-5';
if($header_layout == 'layout-3' || $header_layout == 'layout-4' || $header_layout == 'layout-5' || $header_layout == 'layout-6') {
?>
<aside class="sigma_aside sigma_aside-left">
	<?php
	// logo
	maharatri_get_site_logo('site-logo');
	// mobile menu
	maharatri_nav_menu('mobile-menu'); ?>
</aside>
<div class="sigma_aside-overlay aside-trigger-left"></div>
<?php } else { ?>
<!-- Sidebar Navigation -->
<div class="aside-collapse mobile-aside">
	<button class="close-btn close-dark aside-m-trigger">
    <span></span>
		<span></span>
  </button>
	<div class="aside-inner">
		<?php
		maharatri_nav_menu('mobile-menu');
		// Contact info
		get_template_part( 'template-parts/header/elements/contact-info' );
    ?>
	</div>
</div>
<div class="aside-overlay aside-m-trigger"></div>
<?php } ?>
