<?php
/**
 * Service shortcode tabs layout file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) { // Or some other WordPress constant
	exit;
}
global $sigma_shortcodes, $post;
$atts        = $sigma_shortcodes[ 'sigma_service' ][ 'atts' ];
$the_query   = $sigma_shortcodes[ 'sigma_service' ][ 'the_query' ];
$tabs_category   = $sigma_shortcodes[ 'sigma_service' ][ 'tabs_category' ];
$tab_style = isset($atts['tabs_style']) ? $atts['tabs_style'] : 'style-1';
?>
<div class="text-center sigma_post-filter <?php echo esc_attr('tabs-'.$tab_style); ?>">
	<a href="#" class="sigma_filter-first-item active" data-filter="*">
		<?php
		if ( $atts[ 'add_icon' ] ) {
			if ( $atts[ 'icon_type' ] ) {
				$icon_type = 'icon_' . $atts[ 'icon_type' ];
				vc_icon_element_fonts_enqueue( $atts[ 'icon_type' ] );
				if ( isset( $atts[ $icon_type ] ) && $atts[ $icon_type ] ) {
					?>
					<span class="icon"><i class="<?php echo esc_attr( $atts[ $icon_type ] ); ?>"></i></span>
					<?php
				}
			}
		}
		?>
		<?php esc_html_e('All', 'sigma-core'); ?></a>
	<?php
			$y = 0;
			foreach ($tabs_category as $term) :
			$posts = get_posts(["post_type" => "service", "cat" => $term->term_id]);
	?>
	<a href="#" class="sigma_filter-first-item" data-filter=".<?php echo esc_attr($term->slug); ?>">
		<?php
		if ( $atts[ 'add_icon' ] ) {
			if ( $atts[ 'icon_type' ] ) {
				$icon_type = 'icon_' . $atts[ 'icon_type' ];
				vc_icon_element_fonts_enqueue( $atts[ 'icon_type' ] );
				if ( isset( $atts[ $icon_type ] ) && $atts[ $icon_type ] ) {
					?>
					<span class="icon"><i class="<?php echo esc_attr( $atts[ $icon_type ] ); ?>"></i></span>
					<?php
				}
			}
		}
		?>
		<?php echo esc_html($term->name); ?></a>
	<?php $y++; endforeach; ?>

</div>
<div class="row sigma_post-filter-items">
	<?php
			$args = array(
				'post_type' => 'service',
				'posts_per_page' => -1,
			);
				$loop = new WP_Query($args);
				if ($loop->have_posts()) {
						while ($loop->have_posts()) {
								$loop->the_post();

								$terms = wp_get_object_terms( get_the_ID(), 'service-category', array( 'fields' => 'slugs' ) );
								$term_names = !empty($terms) ? implode($terms, " ") : '';
								?>

	<div class="col-lg-4 grid-item grid-sizer <?php echo esc_attr($term_names); ?>">
	 <?php sigmacore_get_vc_shortcode_template( 'service/styles/' . $atts[ 'style' ] ); ?>
	</div>
	<?php }
		} // end if
			wp_reset_postdata();
	?>

</div>
