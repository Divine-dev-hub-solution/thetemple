<?php
/**
 * Template part for header call to action.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Maharatri
 */
$header_button_title = maharatri_get_option('header_cta_title');
$header_button_link = maharatri_get_option('header_cta_link');
if ( ! $header_button_title || ! $header_button_link ) {
	return;
}
?>
<a href="<?php echo esc_url( $header_button_link ); ?>" class="sigma_btn-custom" title="<?php echo esc_attr( $header_button_title ); ?>"><?php echo esc_html( $header_button_title ); ?></a>
