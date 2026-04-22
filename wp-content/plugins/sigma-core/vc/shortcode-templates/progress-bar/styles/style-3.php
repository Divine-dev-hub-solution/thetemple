<?php
/**
 * Progress bar shortcode style 1 template file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $sigma_shortcodes, $sigma_shortcodes_class_unique, $sigma_vc_inline_css, $inline_css;
$atts = $sigma_shortcodes[ 'sigma_progress_bar' ][ 'atts' ];
$progress_bars = vc_param_group_parse_atts( $atts[ 'progress_bars' ] );
if ( $progress_bars ) {
	foreach( $progress_bars as $progress_bar ){
		?>
		<div class="sigma-progress-bar-wrapper rounded-bar">
			<?php
			if ( is_int( ( int ) $progress_bar[ 'bar_value' ] ) && ( int ) $progress_bar[ 'bar_value' ] <= 100 ) {
				$width = ( int ) $progress_bar[ 'bar_value' ];
			} else {
				$width = 100;
			}
			if ( isset( $progress_bar[ 'bar_value' ] )&& $progress_bar[ 'bar_value' ] && is_int( ( int ) $progress_bar[ 'bar_value' ] ) || $atts['bar_color'] || $atts['bar_background_color'] || $atts['bar_height'] || $atts['rounded_bar_size'] ) {
				$data_track_color = ( $atts[ 'bar_background_color' ] ) ? $atts[ 'bar_background_color' ] : '#e2e8ee';
				$data_bar_color = ( $atts[ 'bar_color' ] ) ? $atts[ 'bar_color' ] : '#7E4555';
			?>
			<div class="chart-two" data-percent="<?php echo esc_attr( $width ); ?>"
				data-size="<?php echo $atts[ 'rounded_bar_size' ] ; ?>"
				data-track-color= "<?php echo $data_track_color; ?>"
				data-bar-color="<?php echo $data_bar_color; ?>"
				data-line-width="<?php echo $atts['bar_height']; ?>"
				data-track-width="<?php echo $atts['circle_bar_height']; ?>" 	style="min-width:<?php echo $atts[ 'rounded_bar_size' ]; ?>px;
					min-height:<?php echo $atts[ 'rounded_bar_size' ]; ?>px;
					width:<?php echo $atts[ 'rounded_bar_size' ]; ?>px; ">
					<div class="counter-flex">
		        <span class="icon countup"><?php echo esc_attr( $width ); ?></span>
						<span><?php echo esc_attr($atts[ 'unit' ]); ?></span>
					</div>
    </div>
			<?php } ?>
		</div>
		<?php
	}
}
