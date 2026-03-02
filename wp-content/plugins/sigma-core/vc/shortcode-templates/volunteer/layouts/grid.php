<?php
/**
 * Blog shortcode gird layout file.
 *
 * @package sigma Core
 */


if ( ! defined( 'ABSPATH' ) ) { // Or some other WordPress constant
	exit;
}

global $sigma_shortcodes;

$atts        = $sigma_shortcodes[ 'sigma_volunteer' ][ 'atts' ];
$the_query   = $sigma_shortcodes[ 'sigma_volunteer' ][ 'the_query' ];

$post_grid_responsive_xl = ( $atts['post_grid_responsive_xl'] ) ? (int) $atts['post_grid_responsive_xl'] : 3;
$post_grid_responsive_lg = ( $atts['post_grid_responsive_lg'] ) ? (int) $atts['post_grid_responsive_lg'] : 3;
$post_grid_responsive_md = ( $atts['post_grid_responsive_md'] ) ? (int) $atts['post_grid_responsive_md'] : 2;
$post_grid_responsive_sm = ( $atts['post_grid_responsive_sm'] ) ? (int) $atts['post_grid_responsive_sm'] : 2;

$classes [] = 'col-xl-' . ( 12 / $post_grid_responsive_xl );
$classes [] = 'col-lg-' . ( 12 / $post_grid_responsive_lg );
$classes [] = 'col-md-' . ( 12 / $post_grid_responsive_md );
$classes [] = 'col-sm-' . ( 12 / $post_grid_responsive_sm );
$classes    = implode( ' ', array_filter( array_unique( $classes ) ) );
?>
<div class="row">
	<?php
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
		?>
		<div class="<?php echo esc_attr( $classes ); ?>">
			<?php sigmacore_get_vc_shortcode_template( 'volunteer/styles/' . $atts[ 'style' ] ); ?>
		</div>
		<?php
	}
	/* Restore original Post Data */
	wp_reset_postdata();
	?>
</div>
