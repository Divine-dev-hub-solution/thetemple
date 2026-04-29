<?php
/**
 * Template part for header.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Maharatri
 */
$header_layout = !empty(maharatri_get_option('header-layout')) ? maharatri_get_option('header-layout') : 'layout-5';
?>
<!-- Site Header -->
<header class="site-header <?php echo esc_attr( maharatri_header_classes() ); ?>" id="header-sec">
	<div class="search-window sigma_search-form-wrapper">
			<div class="close-btn sigma_search-trigger">
				<span></span>
				<span></span>
			</div>
		<?php get_search_form(); ?>
	</div>
	<?php get_template_part( 'template-parts/header/layouts/' . $header_layout ); ?>
</header>
<!-- Sticky Header -->
<?php if( maharatri_get_option('sticky-header-enable') ){ ?>
<header class="site-header can-sticky <?php echo esc_attr( maharatri_header_sticky_classes() ); ?>"  id="header-sticky-sec">
	<?php get_template_part( 'template-parts/header/layouts/' . $header_layout ); ?>
</header>
<?php } ?>
<?php
// Mobile Header
get_template_part( 'template-parts/header/elements/mobile-sidebar' );
// Collapse sidebar
if( maharatri_get_option('display-collapse-sidebar-icon') && is_active_sidebar('header-collapse-sidebar') ){
	get_template_part( 'template-parts/header/elements/collapse-sidebar' );
}
?>
