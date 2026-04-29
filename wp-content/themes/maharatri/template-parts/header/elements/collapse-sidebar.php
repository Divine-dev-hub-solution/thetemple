<?php
/**
 * Template part for header social info.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Maharatri
 */
$header_layout = !empty(maharatri_get_option('header-layout')) ? maharatri_get_option('header-layout') : 'layout-5';
if ( !maharatri_get_option('display-collapse-sidebar-icon') ) {
	return;
}
if(($header_layout == 'layout-3' || $header_layout == 'layout-5') && is_active_sidebar('header-collapse-sidebar')) { ?>
	<aside class="sigma_aside sigma_aside-right sigma_aside-right-panel sigma_aside-bg widget-area sidebar">
		<div class="sidebar">
			<?php
				dynamic_sidebar('header-collapse-sidebar');
			?>
		</div>
	</aside>
	<div class="sigma_aside-overlay aside-trigger-right"></div>
<?php } else { ?>
<!-- Sidebar Navigation -->
<div class="aside-collapse desktop-aside widget-area sidebar">
	<button class="close-btn close-dark aside-trigger">
    <span></span>
		<span></span>
  </button>
	<div class="aside-inner widget-area sidebar">
		<?php
		if(is_active_sidebar('header-collapse-sidebar')) {
			dynamic_sidebar('header-collapse-sidebar');
		}
		?>
	</div>
</div>
<div class="aside-overlay aside-trigger"></div>
<?php }
