<?php
/**
 * Template part for header social info.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Maharatri
 */
$social_infos = maharatri_get_option('social_infos');
if ( !$social_infos ) {
	return;
}
?>
<div class="social-info-wrapper">
	<ul class="social-info">
	<?php
	foreach ( $social_infos as $social_info ) {
		if ( !empty( maharatri_get_option($social_info . '_link') ) ) {
			$social_icon = '';
			$social_icon .= ($social_info == 'facebook') ? 'fab fa-facebook-f' : '';
			$social_icon .= ($social_info == 'twitter') ? 'fab fa-twitter' : '';
			$social_icon .= ($social_info == 'dribbble') ? 'fab fa-dribble' : '';
			$social_icon .= ($social_info == 'vimeo') ? 'fab fa-vimeo-v' : '';
			$social_icon .= ($social_info == 'pinterest') ? 'fab fa-pinterest-p' : '';
			$social_icon .= ($social_info == 'linkedin') ? 'fab fa-linkedin-in' : '';
			$social_icon .= ($social_info == 'youtube') ? 'fab fa-youtube' : '';
			$social_icon .= ($social_info == 'instagram') ? 'fab fa-instagram' : '';
			?>
			<li>
				<a class="social-icon" target="_blank" href="<?php echo esc_url(maharatri_get_option($social_info . '_link')) ?>" rel="nofollow"><i class="fab fa-<?php echo esc_attr( $social_icon ); ?>"></i></a>
			</li>
			<?php
		}
	}
	?>
	</ul>
</div>
