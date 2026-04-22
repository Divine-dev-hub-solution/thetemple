<?php
/**
 * Testimonial shortcode template file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $post, $sigma_shortcodes;
$atts = $sigma_shortcodes[ 'sigma_testimonials' ][ 'atts' ];

$testimonial_details         = get_post_meta( $post->ID, 'sigma_testimonial_details', true );
$sigma_testimonial_designation  = isset( $testimonial_details['sigma_testimonial_designation'] ) ? $testimonial_details['sigma_testimonial_designation'] : '';

?>
<div class="testimonial-box">
	<?php if(has_post_thumbnail($post->ID)){ ?>
		<div class="client-img">
			<?php the_post_thumbnail(); ?>
				<span class="check"><i class="fal fa-check"></i></span>
		</div>
	<?php } ?>
		<h3><?php echo esc_html( $post->post_title ); ?></h3>
		<?php if ( $sigma_testimonial_designation ) { ?>
		<span class="clinet-post">	<?php echo esc_html( $sigma_testimonial_designation ); ?></span>
		<?php } ?>
		<p><?php the_excerpt(); ?></p>
</div>
