<?php
/**
 * Sigma testimonials shortcode
 *
 * @package Sigma Core
 */
/**
 * Testimonials shortcode.
 */
class Sigma_Vc_Testimonials_Shortcode_Fields {
	/**
	 * Shortcode title.
	 *
	 * @since 1.0.0
	 * @var   string
	 */
	protected $title;
	/**
	 * Shortcode handle.
	 *
	 * @since 1.0.0
	 * @var   string
	 */
	protected $handle;
	/**
	 * Shortcode description.
	 *
	 * @since 1.0.0
	 * @var   string
	 */
	protected $description;
	/**
	 * Shortcode category.
	 *
	 * @since 1.0.0
	 * @var   string
	 */
	protected $category;
	/**
	 * Shortcode wrraper class.
	 *
	 * @since 1.0.0
	 * @var   string
	 */
	protected $wrraper_class;
	/**
	 * Shortcode map and callback
	 */
	function __construct() {
		$this->title         = esc_html__( 'Testimonials', 'sigma-core' );
		$this->handle        = 'sigma_testimonials';
		$this->description   = esc_html__( 'Use this shortcode to show testimonials.', 'sigma-core' );
		$this->category      = esc_html__( 'Sigma', 'sigma-core' );
		$this->wrraper_class = 'sigma-shortcode-wrapper';
		add_action( 'vc_before_init', array( $this, 'shortcode_fields' ) );
		add_shortcode( $this->handle, array( $this, 'shortcode_callback' ) );
	}
	/**
	 * testimonials shortcode mapping.
	 *
	 * @return void
	 */
	function shortcode_fields() {
		$fields = array(
			array(
				'type'        => 'dropdown',
				'heading'     => __( 'Testimonials Layout', 'sigma-core' ),
				'description' => esc_html__( 'Select layout.', 'sigma-core' ),
				'param_name'  => 'layout',
				'value'       => array(
					esc_html__( 'Slider', 'sigma-core' ) => 'slider',
					esc_html__( 'Grid', 'sigma-core' ) => 'grid',
				),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => __( 'Testimonials Style', 'sigma-core' ),
				'description' => esc_html__( 'Select Style.', 'sigma-core' ),
				'param_name'  => 'style',
				'value'       => array(
					esc_html__( 'Style 1', 'sigma-core' ) => 'style-1',
					esc_html__( 'Style 2', 'sigma-core' ) => 'style-2',
				),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Testimonials Count', 'sigma-core' ),
				'param_name'  => 'post_per_page',
				'description' => esc_html__( 'Enter number of testimonials to display.', 'sigma-core' ),
				'admin_label' => true
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Section Heading Title', 'sigma-core' ),
				'param_name'  => 'section_title',
				'dependency' => array(
					'element' => 'style',
					'value'   => 'style-1',
				),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Section Heading Sub-title', 'sigma-core' ),
				'param_name'  => 'section_sub_title',
				'dependency' => array(
					'element' => 'style',
					'value'   => 'style-1',
				),
			),
			array(
				'type'             => 'dropdown',
				'param_name'       => 'post_order',
				'heading'          => esc_html__( 'Order', 'sigma-core' ),
				'description'      => esc_html__( 'Select display order.', 'sigma-core' ),
				'std'              => 'DESC',
				'value'            => array(
					esc_html__( 'Ascending', 'sigma-core' )	 => 'ASC',
					esc_html__( 'Descending', 'sigma-core' ) =>	'DESC',
				),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
			),
			array(
				'type'             => 'dropdown',
				'param_name'       => 'post_orderby',
				'heading'          => esc_html__( 'Orderby ', 'sigma-core' ),
				'description'      => esc_html__( 'Select order by parameter.', 'sigma-core' ),
				'std'              => 'date',
				'value'            => array(
					esc_html__( 'ID', 'sigma-core' )            => 'ID',
					esc_html__( 'Title', 'sigma-core' )         => 'title',
					esc_html__( 'Date', 'sigma-core' )          => 'date',
					esc_html__( 'Modified Date', 'sigma-core' ) => 'modified',
				),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
			),
			// Slider Settings
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Slider Speed', 'sigma-core' ),
				'param_name'  => 'post_slider_speed',
				'description' => esc_html__( 'Enter slider speed.', 'sigma-core' ),
				'dependency' => array(
					'element' => 'layout',
					'value'   => 'slider',
				),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
				'group'            => esc_html__( 'Slider Settings', 'sigma-core' ),
			),
			array(
				'type'             => 'checkbox',
				'heading'          => esc_html__( 'Enable navigation dots?', 'sigma-core' ),
				'param_name'       => 'post_enable_navigation',
				'value'            => array( esc_html__( 'Yes', 'sigma-core' ) => 'yes' ),
				'description'      => esc_html__( 'Select this checkbox to enable navigation dots.', 'sigma-core' ),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
				'dependency' => array(
					'element' => 'layout',
					'value'   => 'slider',
				),
				'group'            => esc_html__( 'Slider Settings', 'sigma-core' ),
			),
			array(
				'type'             => 'checkbox',
				'heading'          => esc_html__( 'Enable Previous/Next Arrow ?', 'sigma-core' ),
				'param_name'       => 'post_enable_arrow',
				'value'            => array( esc_html__( 'Yes', 'sigma-core' ) => 'true' ),
				'description'      => esc_html__( 'Select this checkbox to enable previous/next arrow.', 'sigma-core' ),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
				'dependency' => array(
					'element' => 'layout',
					'value'   => 'slider',
				),
				'group'            => esc_html__( 'Slider Settings', 'sigma-core' ),
			),
			array(
				'type'             => 'checkbox',
				'heading'          => esc_html__( 'Enable Slider Loop?', 'sigma-core' ),
				'param_name'       => 'post_enable_slider_loop',
				'value'            => array( esc_html__( 'Yes', 'sigma-core' ) => 'true' ),
				'description'      => esc_html__( 'Select this checkbox to enable slider loop.', 'sigma-core' ),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
				'dependency' => array(
					'element' => 'layout',
					'value'   => 'slider',
				),
				'group'            => esc_html__( 'Slider Settings', 'sigma-core' ),
			),
			array(
				'type'             => 'checkbox',
				'heading'          => esc_html__( 'Enable Slider Autoplay?', 'sigma-core' ),
				'param_name'       => 'post_enable_slider_autoplay',
				'value'            => array( esc_html__( 'Yes', 'sigma-core' ) => 'true' ),
				'description'      => esc_html__( 'Select this checkbox to enable slider autoplay.', 'sigma-core' ),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
				'dependency' => array(
					'element' => 'layout',
					'value'   => 'slider',
				),
				'group'            => esc_html__( 'Slider Settings', 'sigma-core' ),
			),
			array(
				'type'             => 'checkbox',
				'heading'          => esc_html__( 'Enable CenterMode?', 'sigma-core' ),
				'param_name'       => 'post_enable_slider_centermode',
				'value'            => array( esc_html__( 'Yes', 'sigma-core' ) => 'true' ),
				'description'      => esc_html__( 'Select this checkbox to enable centerMode.', 'sigma-core' ),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
				'dependency' => array(
					'element' => 'layout',
					'value'   => 'slider',
				),
				'group'            => esc_html__( 'Slider Settings', 'sigma-core' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Center Padding', 'sigma-core' ),
				'param_name'  => 'post_slider_centerpadding',
				'description' => esc_html__( 'Enter centerPadding.', 'sigma-core' ),
				'dependency' => array(
					'element' => 'post_enable_slider_centermode',
					'value'   => 'true',
				),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
				'group'            => esc_html__( 'Slider Settings', 'sigma-core' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Slider Autoplay Speed', 'sigma-core' ),
				'param_name'  => 'post_slider_autoplayspeed',
				'description' => esc_html__( 'Enter autoplay speed.', 'sigma-core' ),
				'dependency' => array(
					'element' => 'post_enable_slider_autoplay',
					'value'   => 'true',
				),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
				'group'            => esc_html__( 'Slider Settings', 'sigma-core' ),
			),
			array(
				'type'             => 'dropdown',
				'heading'     => esc_html__( 'No of slide to scroll', 'sigma-core' ),
				'param_name'  => 'post_slider_scroll',
				'description' => esc_html__( 'Enter number of slide to scroll.', 'sigma-core' ),
				'dependency' => array(
					'element' => 'layout',
					'value'   => 'slider',
				),
				'value'            => array(
					'5' => '5',
					'4' => '4',
					'3' => '3',
					'2' => '2',
					'1' => '1',
				),
				'std'              => '1',
				'save_always'      => true,
				'group'            => esc_html__( 'Slider Settings', 'sigma-core' ),
			),
			array(
				'type'             => 'dropdown',
				'heading'          => esc_html__( 'Number of slides for > 1400px', 'sigma-core' ),
				'param_name'       => 'post_slider_responsive_xl',
				'value'            => array(
					'5' => '5',
					'4' => '4',
					'3' => '3',
					'2' => '2',
					'1' => '1',
				),
				'std'              => '3',
				'description'      => esc_html__( 'Select number of slides per view for > 1400px screen.', 'sigma-core' ),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
				'save_always'      => true,
				'dependency' => array(
					'element' => 'layout',
					'value'   => 'slider',
				),
				'group'            => esc_html__( 'Slider Settings', 'sigma-core' ),
			),
			array(
				'type'             => 'dropdown',
				'heading'          => esc_html__( 'Number of slides for < 1400px', 'sigma-core' ),
				'param_name'       => 'post_slider_responsive_lg',
				'value'            => array(
					'5' => '5',
					'4' => '4',
					'3' => '3',
					'2' => '2',
					'1' => '1',
				),
				'std'              => '3',
				'description'      => esc_html__( 'Select number of slides per view for < 1400px screen.', 'sigma-core' ),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
				'save_always'      => true,
				'dependency' => array(
					'element' => 'layout',
					'value'   => 'slider',
				),
				'group'            => esc_html__( 'Slider Settings', 'sigma-core' ),
			),
			array(
				'type'             => 'dropdown',
				'heading'          => esc_html__( 'Number of slides for < 992px', 'sigma-core' ),
				'param_name'       => 'post_slider_responsive_md',
				'value'            => array(
					'5' => '5',
					'4' => '4',
					'3' => '3',
					'2' => '2',
					'1' => '1',
				),
				'std'              => '2',
				'description'      => esc_html__( 'Select number of slides per view for < 992px screen.', 'sigma-core' ),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
				'save_always'      => true,
				'dependency' => array(
					'element' => 'layout',
					'value'   => 'slider',
				),
				'group'            => esc_html__( 'Slider Settings', 'sigma-core' ),
			),
			array(
				'type'             => 'dropdown',
				'heading'          => esc_html__( 'Number of slides for < 768px', 'sigma-core' ),
				'param_name'       => 'post_slider_responsive_sm',
				'value'            => array(
					'5' => '5',
					'4' => '4',
					'3' => '3',
					'2' => '2',
					'1' => '1',
				),
				'std'              => '1',
				'description'      => esc_html__( 'Select number of slides per view in small devices < 768px.', 'sigma-core' ),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
				'save_always'      => true,
				'dependency' => array(
					'element' => 'layout',
					'value'   => 'slider',
				),
				'group'            => esc_html__( 'Slider Settings', 'sigma-core' ),
			),
			array(
				'type'             => 'dropdown',
				'heading'          => esc_html__( 'Number of slides for < 576px', 'sigma-core' ),
				'param_name'       => 'post_slider_responsive_xs',
				'value'            => array(
					'5' => '5',
					'4' => '4',
					'3' => '3',
					'2' => '2',
					'1' => '1',
				),
				'std'              => '1',
				'description'      => esc_html__( 'Select number of slides per view in small devices < 576px.', 'sigma-core' ),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
				'save_always'      => true,
				'dependency' => array(
					'element' => 'layout',
					'value'   => 'slider',
				),
				'group'            => esc_html__( 'Slider Settings', 'sigma-core' ),
			),
			array(
				'type'             => 'dropdown',
				'heading'          => esc_html__( 'Number of items for > 992px', 'sigma-core' ),
				'param_name'       => 'post_grid_responsive_xl',
				'value'            => array(
					'6' => '6',
					'4' => '4',
					'3' => '3',
					'2' => '2',
					'1' => '1',
				),
				'std'              => '3',
				'description'      => esc_html__( 'Select number of items per view for > 992px screen.', 'sigma-core' ),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
				'save_always'      => true,
				'dependency' => array(
					'element' => 'layout',
					'value'   => 'grid',
				),
				'group'            => esc_html__( 'Grid Settings', 'sigma-core' ),
			),
			array(
				'type'             => 'dropdown',
				'heading'          => esc_html__( 'Number of items for < 992px', 'sigma-core' ),
				'param_name'       => 'post_grid_responsive_lg',
				'value'            => array(
					'6' => '6',
					'4' => '4',
					'3' => '3',
					'2' => '2',
					'1' => '1',
				),
				'std'              => '3',
				'description'      => esc_html__( 'Select number of items per view for < 992px screen.', 'sigma-core' ),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
				'save_always'      => true,
				'dependency' => array(
					'element' => 'layout',
					'value'   => 'grid',
				),
				'group'            => esc_html__( 'Grid Settings', 'sigma-core' ),
			),
			array(
				'type'             => 'dropdown',
				'heading'          => esc_html__( 'Number of items for < 768px', 'sigma-core' ),
				'param_name'       => 'post_grid_responsive_md',
				'value'            => array(
					'6' => '6',
					'4' => '4',
					'3' => '3',
					'2' => '2',
					'1' => '1',
				),
				'std'              => '2',
				'description'      => esc_html__( 'Select number of items per view for < 768px screen.', 'sigma-core' ),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
				'save_always'      => true,
				'dependency'       => array(
					'element' => 'layout',
					'value'   => 'grid',
				),
				'group'            => esc_html__( 'Grid Settings', 'sigma-core' ),
			),
			array(
				'type'             => 'dropdown',
				'heading'          => esc_html__( 'Number of items for < 576px', 'sigma-core' ),
				'param_name'       => 'post_grid_responsive_sm',
				'value'            => array(
					'6' => '6',
					'4' => '4',
					'3' => '3',
					'2' => '2',
					'1' => '1',
				),
				'std'              => '1',
				'description'      => esc_html__( 'Select number of items per view in small devices &le;576px.', 'sigma-core' ),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
				'save_always'      => true,
				'dependency' => array(
					'element' => 'layout',
					'value'   => 'grid',
				),
				'group'            => esc_html__( 'Grid Settings', 'sigma-core' ),
			),
			vc_map_add_css_animation(),
			array(
				'type'        => 'el_id',
				'heading'     => esc_html__( 'Element ID', 'sigma-core' ),
				'param_name'  => 'el_id',
				/* translators: 1: anchor tag start, 2: anchor tag end */
				'description' => sprintf( esc_html__( 'Enter element ID (Note: make sure it is unique and valid according to %1$sw3c specification%2$s).', 'sigma-core' ), '<a href="https://www.w3schools.com/tags/att_global_id.asp" target="_blank">', '</a>' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Extra class name', 'sigma-core' ),
				'param_name'  => 'el_class',
				'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'sigma-core' ),
			),
			array(
				'type'       => 'css_editor',
				'heading'    => esc_html__( 'CSS box', 'sigma-core' ),
				'param_name' => 'css',
				'group'      => esc_html__( 'Design Options', 'sigma-core' ),
			),
		);
		// Shortcode Params
		$params = array(
			'name'        => $this->title,
			'base'        => $this->handle,
			'category'    => $this->category,
			'description' => $this->description,
			'class'       => $this->wrraper_class,
			'params'      => $fields,
		);
		vc_map( $params );
	}
	/**
	 * testimonials shortcode callback functions.
	 */
	function shortcode_callback( $atts, $content = null, $handle = '' ) {
		$default_atts = array(
			'layout'               				=> 'slider',
			'style'                       => 'style-1',
			'post_per_page'               => '',
			'section_sub_title'           => '',
			'section_title'           		=> '',
			'post_categories'             => '',
			'post_order'                  => '',
			'post_orderby'                => '',
			'post_slider_speed'           => '',
			'post_enable_navigation'      => '',
			'post_enable_arrow'           => '',
			'post_enable_slider_loop'     => '',
			'post_enable_slider_autoplay' => '',
			'post_enable_slider_centermode' => '',
			'post_slider_centerpadding' => '',
			'post_slider_autoplayspeed' => '',
			'post_slider_scroll'          => 1,
			'post_slider_responsive_xl'   => 3,
			'post_slider_responsive_lg'   => 2,
			'post_slider_responsive_md'   => 2,
			'post_slider_responsive_sm'   => 1,
			'post_slider_responsive_xs'   => 1,
			'post_grid_responsive_xl'     => 3,
			'post_grid_responsive_lg'     => 2,
			'post_grid_responsive_md'     => 2,
			'post_grid_responsive_sm'     => 1,
			'css_animation'               => '',
			'el_id'                       => '',
			'el_class'                    => '',
			'css'                         => '',
			'handle'                      => $handle,
		);
		$atts = shortcode_atts( $default_atts, $atts, $handle );
		global $sigma_shortcodes;
		$args = array(
			'post_type'           => 'testimonial',
			'posts_per_page'      => $atts[ 'post_per_page' ],
			'post_status'         => array( 'publish' ),
			'ignore_sticky_posts' => true,
			'order'               => $atts[ 'post_order' ],
			'orderby'             => $atts[ 'post_orderby' ],
		);
		$the_query = new WP_Query( $args );
		if ( ! $the_query->have_posts() ) {
			return;
		}
		$inline_css                                 = '';
		$sigma_shortcodes[ $handle ][ 'atts' ]      = $atts;
		$sigma_shortcodes[ $handle ][ 'the_query' ] = $the_query;
		$sigma_shortcodes_class_unique              = 'sigma-testimonials-' . mt_rand();
		$sigma_shortcodes_classes                   = $this->handle . '_wrapper';
		$sigma_shortcodes_classes                   .= ' ' . $sigma_shortcodes_class_unique;
		$sigma_shortcodes_classes                   .= ' ' . $this->wrraper_class;
		if ( $atts[ 'el_class' ] ) {
			$sigma_shortcodes_classes .= ' ' . $atts[ 'el_class' ];
		}
		$sigma_shortcodes_classes                   .= ' testimonials-' . $atts[ 'style' ];
		$sigma_shortcodes_classes                   .= ' testimonials-' . $atts[ 'layout' ];
		if ( $atts['css_animation'] && 'none' !== $atts['css_animation'] ) {
			wp_enqueue_script( 'vc_waypoints' );
			wp_enqueue_style( 'vc_animate-css' );
			$sigma_shortcodes_classes .= ' wpb_animate_when_almost_visible wpb_' . $atts['css_animation'] . ' ' . $atts['css_animation'];
		}
		if (  isset( $atts[ 'css' ] ) && $atts[ 'css' ] ) {
			$sigma_shortcodes_classes .= ' ' . vc_shortcode_custom_css_class( $atts[ 'css' ], ' ' );
		}

		ob_start();
		?>
		<div <?php echo ( $atts[ 'el_id' ] ) ? 'id=' . esc_attr( $atts[ "el_id" ] ) : ''; ?> class="<?php echo esc_attr( $sigma_shortcodes_classes ); ?>">
			<?php sigmacore_get_vc_shortcode_template( 'testimonials/content' ); ?>
		</div>
		<?php
		return ob_get_clean();
	}
}
new Sigma_Vc_Testimonials_Shortcode_Fields();
