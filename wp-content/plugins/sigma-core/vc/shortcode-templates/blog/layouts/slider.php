<?php
/**
 * Blog shortcode slider layout file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $sigma_shortcodes;
$atts        = $sigma_shortcodes[ 'sigma_blog' ][ 'atts' ];
$the_query   = $sigma_shortcodes[ 'sigma_blog' ][ 'the_query' ];
$slick_options = array(
	'autoplay'       => isset( $atts[ 'post_enable_slider_autoplay' ] ) ? (boolean) $atts[ 'post_enable_slider_autoplay' ] : false,
	'infinite'      => isset( $atts[ 'post_enable_slider_loop' ] ) ? (boolean) $atts[ 'post_enable_slider_loop' ] : false,
	'arrows'     =>		isset( $atts[ 'post_enable_arrow' ] ) ? (boolean) $atts[ 'post_enable_arrow' ] : false,
	'speed'     =>		isset( $atts[ 'post_slider_speed' ] ) ? (int) $atts[ 'post_slider_speed' ] : 500,
	'centerMode'     =>		isset( $atts[ 'post_enable_slider_centermode' ] ) ? (boolean) $atts[ 'post_enable_slider_centermode' ] : false,
	'centerPadding'     =>		isset( $atts[ 'post_slider_centerpadding' ] ) ? (int) $atts[ 'post_slider_centerpadding' ] : '',
	'autoplaySpeed'     =>		isset( $atts[ 'post_slider_autoplayspeed' ] ) ? (int) $atts[ 'post_slider_autoplayspeed' ] : '',
	'dots'        => isset( $atts[ 'post_enable_navigation' ] ) ? (boolean) $atts[ 'post_enable_navigation' ] : false,
	'slidesToShow'       =>  isset( $atts[ 'post_slider_responsive_lg' ] ) ? (int) $atts[ 'post_slider_responsive_lg' ] : 4,
	'slidesToScroll' => isset( $atts[ 'post_slider_scroll' ] ) ? (int) $atts[ 'post_slider_scroll' ] : 1,
	'responsive' => array(
		array(
			'breakpoint' => 1800,
			'settings'  => array(
				'slidesToShow' => isset( $atts[ 'post_slider_responsive_xl' ] ) ? (int) $atts[ 'post_slider_responsive_xl' ] : 4,
			),
		),
		array(
			'breakpoint' => 1400,
			'settings'  => array(
				'slidesToShow' => isset( $atts[ 'post_slider_responsive_lg' ] ) ? (int) $atts[ 'post_slider_responsive_lg' ] : 3,
			),
		),
		array(
			'breakpoint' => 992,
			'settings'  => array(
				'slidesToShow' =>  isset( $atts[ 'post_slider_responsive_md' ] ) ? (int) $atts[ 'post_slider_responsive_md' ] : 2,
			),
		),
		array(
			'breakpoint' => 768,
			'settings'  => array(
				'slidesToShow' =>  isset( $atts[ 'post_slider_responsive_sm' ] ) ? (int) $atts[ 'post_slider_responsive_sm' ] : 2,
			),
		),
		array(
			'breakpoint' => 576,
			'settings'  => array(
				'slidesToShow' =>  isset( $atts[ 'post_slider_responsive_xs' ] ) ? (int) $atts[ 'post_slider_responsive_xs' ] : 1,
			),
		),
	)
);
if(isset($atts['section_title']) && !empty($atts['section_title'])) {
?>
<div class="section-heading">
<div class="row align-items-center">
				<div class="col-lg-6 col-md-8 col-sm-7">
					<?php if($atts['section_title']){ ?>
					<div class="section-title">
						<?php if($atts['section_sub_title']){ ?>
						<span class="title-tag"><?php echo esc_html($atts['section_sub_title']); ?></span>
						<?php } ?>
						<h2><?php echo esc_html($atts['section_title']); ?></h2>
					</div>
				<?php } ?>
				</div>
</div>
</div>
<?php } ?>
<div class="slick-slider blog-post-slider shortcode_slider" data-slick="<?php echo esc_attr( json_encode( $slick_options ) ); ?>">
	<?php
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
		sigmacore_get_vc_shortcode_template( 'blog/styles/' . $atts[ 'style' ] );
	}
	/* Reset Post Data */
	wp_reset_postdata();
	?>
</div>
