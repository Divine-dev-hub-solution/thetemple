<?php
/**
 * Template part for header call to action info.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Maharatri
 */
$header_cta_info_title = maharatri_get_option('header_cta_info_title');
$header_cta_info_subtitle = maharatri_get_option('header_cta_info_subtitle');
$header_cta_info_icon_class = maharatri_get_option('header_cta_info_icon_class');
$header_cta_info_link = maharatri_get_option('header_cta_link');
if ( ! $header_cta_info_title || ! $header_cta_info_subtitle || ! $header_cta_info_icon_class || ! $header_cta_info_link) {
	return;
}
?>
<div class="sigma_header-controls sigma_header-button">
  <a href="<?php echo esc_url( $header_cta_info_link ); ?>" class="sigma_header-contact">
    <?php if(!empty($header_cta_info_icon_class)) { ?>
      <i class="<?php echo esc_attr( $header_cta_info_icon_class ); ?>"></i>
    <?php } ?>
    <div class="sigma_header-contact-inner">
    <span><?php echo esc_html( $header_cta_info_subtitle ); ?></span>
    <h6><?php echo esc_html( $header_cta_info_title ); ?></h6>
    </div>
  </a>
</div>
