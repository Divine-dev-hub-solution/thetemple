<?php
/**
 * Counter shortcode styel 3 template file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $sigma_shortcodes;
$atts = $sigma_shortcodes[ 'sigma_counter' ][ 'atts' ];
if ( $atts[ 'counter_number' ] ) {
  if ( $atts[ 'counter_bg_image' ] ) {
    $image_data = wp_get_attachment_image_src( $atts[ 'counter_bg_image' ], 'full' );
    $image_url  = ( isset( $image_data[0] ) && $image_data[0] ) ? $image_data[0] : '';
  }
?>
<div class="counter-box counter-box-three primary-overlay" <?php if($image_url) { ?> style="background-image: url('<?php echo esc_url($image_url); ?>')"<?php } ?>>
		<h4><span class="counter"><?php echo esc_attr( $atts[ 'counter_number' ] ); ?></span> +</h4>
		<?php if($atts['counter_title']) { ?>
			<p class="title"><?php echo esc_html( $atts[ 'counter_title' ] ); ?></p>
		<?php } ?>
</div>
<?php }
