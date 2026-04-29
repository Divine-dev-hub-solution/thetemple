<?php
/**
 * Testimonial slider shortcode template file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $post, $sigma_shortcodes;
$atts        = $sigma_shortcodes[ 'sigma_testimonial_slider' ][ 'atts' ];
$the_query   = $sigma_shortcodes[ 'sigma_testimonial_slider' ][ 'the_query' ];

$testimonial_details         = get_post_meta( $post->ID, 'sigma_testimonial_details', true );
$sigma_testimonial_designation  = isset( $testimonial_details['sigma_testimonial_designation'] ) ? $testimonial_details['sigma_testimonial_designation'] : '';

$slick_options = array(
	'autoplay'       => isset( $atts[ 'post_enable_slider_autoplay' ] ) ? (boolean) $atts[ 'post_enable_slider_autoplay' ] : false,
	'infinite'      => isset( $atts[ 'post_enable_slider_loop' ] ) ? (boolean) $atts[ 'post_enable_slider_loop' ] : false,
  'arrows'     =>		false,
	'speed'     =>		isset( $atts[ 'post_slider_speed' ] ) ? (int) $atts[ 'post_slider_speed' ] : 500,
	'autoplaySpeed'     =>		isset( $atts[ 'post_slider_autoplayspeed' ] ) ? (int) $atts[ 'post_slider_autoplayspeed' ] : '',
	'dots'        => isset( $atts[ 'post_enable_navigation' ] ) ? (boolean) $atts[ 'post_enable_navigation' ] : false,
	'slidesToShow'       =>  1,
	'slidesToScroll' => isset( $atts[ 'post_slider_scroll' ] ) ? (int) $atts[ 'post_slider_scroll' ] : 1,
); ?>
<?php if($atts['show_testimonial_thumbnails'] == 'yes') { ?>
  <div class="sigma_testimonial-image d-none d-lg-block">
    <div class="row justify-content-center align-items-center g-0">
      <?php
      $count = 1;
      while ( $the_query->have_posts() ) {
        $the_query->the_post();
        if(has_post_thumbnail()) {
        ?>
      <div class="<?php echo $count % 2 == 0 ? 'col-md-5' : 'col-md-3'; ?>">
        <?php the_post_thumbnail('full'); ?>
      </div>
    <?php } $count++; } ?>
    </div>
  </div>
<?php } ?>
<i class="flaticon-right-quote icon"></i>
<div class="slick-slider shortcode_slider" data-slick="<?php echo esc_attr( json_encode( $slick_options ) ); ?>">
	<?php
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
		?>
    <div class="sigma_testimonial-slider-item">
      <?php the_excerpt(); ?>
      <div class="sigma_testimonial-author">
        <cite><?php the_title(); ?></cite>
      </div>
    </div>
    <?php
	}
	/* Reset Post Data */
	wp_reset_postdata();
	?>
</div>
