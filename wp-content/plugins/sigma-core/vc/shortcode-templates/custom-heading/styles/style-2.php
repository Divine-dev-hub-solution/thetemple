<?php
/**
 * Custom heading shortcode styel 2 template file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $sigma_shortcodes;
$atts = $sigma_shortcodes[ 'sigma_custom_heading' ][ 'atts' ];
?>
<div class="section-title sigma-custom-heading-wrapper">
	<?php
	if ( $atts[ 'subtitle' ] ) {
		?>

			<<?php echo esc_attr( $atts[ 'subtitle_element' ] ); ?> class="heading-subtitle">
				<?php
				echo wp_kses(
					$atts[ 'subtitle' ],
					wp_kses_allowed_html( 'post' )
				);
				?>
			</<?php echo esc_attr( $atts[ 'subtitle_element' ] ); ?>>
		<?php
	}
	if ( $atts[ 'title' ] ) {
		?>
			<<?php echo esc_attr( $atts[ 'title_element' ] ); ?> class="heading-title">
				<?php
				echo wp_kses(
					$atts[ 'title' ],
					wp_kses_allowed_html( 'post' )
				);
				?>
			</<?php echo esc_attr( $atts[ 'title_element' ] ); ?>>
		<?php
	}
	?>
</div>
