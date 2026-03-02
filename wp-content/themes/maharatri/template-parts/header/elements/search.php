<?php
/**
 * Template part for header search.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Maharatri
 */
if ( ! maharatri_get_option('display-search-icon') ) {
	return;
}
$search_trigger_class = (maharatri_get_option('header-layout') == 'layout-3') ? 'sigma_search-trigger' : '';
$search_wrapper_class = (maharatri_get_option('header-layout') == 'layout-3') ? 'sigma_search-form-wrapper' : '';
?>
<div class="search-wrapper">
	<a href="#" class="search-icon search-popup-modal <?php echo esc_attr($search_trigger_class); ?>"><i class="fal fa-search"></i></a>
</div>
