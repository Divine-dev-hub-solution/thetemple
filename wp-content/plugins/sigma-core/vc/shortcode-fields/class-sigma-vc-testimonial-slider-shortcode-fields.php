<?php
/**
 * Sigma testimonial slider shortcode
 *
 * @package Sigma Core
 */
/**
 * Testimonial slider shortcode.
 */
class Sigma_Vc_Testimonial_Slider_Shortcode_Fields {
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
		$this->title         = esc_html__( 'Testimonial Slider', 'sigma-core' );
		$this->handle        = 'sigma_testimonial_slider';
		$this->description   = esc_html__( 'Use this shortcode to show testimonial slider.', 'sigma-core' );
		$this->category      = esc_html__( 'Sigma', 'sigma-core' );
		$this->wrraper_class = 'sigma-shortcode-wrapper';
		add_action( 'vc_before_init', array( $this, 'shortcode_fields' ) );
		add_shortcode( $this->handle, array( $this, 'shortcode_callback' ) );
	}
	/**
	 * Testimonial slider shortcode mapping.
	 *
	 * @return void
	 */
	function shortcode_fields() {
		$fields = array(
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Testimonial Count', 'sigma-core' ),
				'param_name'  => 'post_per_page',
				'description' => esc_html__( 'Enter number of testimonial to display.', 'sigma-core' ),
				'admin_label' => true
			),
      array(
				'type'             => 'checkbox',
				'heading'          => esc_html__( 'Show Testimonial Thumbnails?', 'sigma-core' ),
				'param_name'       => 'show_testimonial_thumbnails',
				'value'            => array( esc_html__( 'Yes', 'sigma-core' ) => 'yes' ),
				'description'      => esc_html__( 'Select this checkbox to show testimonial thumbnails.', 'sigma-core' ),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
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
      // color options
      array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Title Color', 'sigma-core' ),
				'param_name'  => 'testi_title_color',
				'description' => esc_html__( 'Select custom title color.', 'sigma-core' ),
				'group' => esc_html__( 'Color Options', 'sigma-core' ),
			),
      array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Description Color', 'sigma-core' ),
				'param_name'  => 'testi_desc_color',
				'description' => esc_html__( 'Select custom description color.', 'sigma-core' ),
				'group' => esc_html__( 'Color Options', 'sigma-core' ),
			),
      array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Quote Icon Color', 'sigma-core' ),
				'param_name'  => 'testi_quote_icon_color',
				'description' => esc_html__( 'Select custom quote icon color.', 'sigma-core' ),
				'group' => esc_html__( 'Color Options', 'sigma-core' ),
			),
      array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Slider Dot Color', 'sigma-core' ),
				'param_name'  => 'testi_slider_dot_color',
				'description' => esc_html__( 'Select custom slider dot color.', 'sigma-core' ),
				'group' => esc_html__( 'Color Options', 'sigma-core' ),
			),
      array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Slider Active Dot Color', 'sigma-core' ),
				'param_name'  => 'testi_slider_active_dot_color',
				'description' => esc_html__( 'Select custom slider active dot color.', 'sigma-core' ),
				'group' => esc_html__( 'Color Options', 'sigma-core' ),
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
	 * testimonial Slider shortcode callback functions.
	 */
	function shortcode_callback( $atts, $content = null, $handle = '' ) {
		$default_atts = array(
			'post_per_page'               => '',
			'post_order'                  => '',
			'post_orderby'                => '',
			'post_slider_speed'           => '',
			'post_enable_navigation'      => '',
			'post_enable_slider_loop'     => '',
			'post_enable_slider_autoplay' => '',
			'post_slider_autoplayspeed' => '',
			'post_slider_scroll'          => 1,
			'testi_title_color'               => '',
			'testi_desc_color'               => '',
			'testi_quote_icon_color'            => '',
			'testi_slider_dot_color'            => '',
			'testi_slider_active_dot_color'     => '',
			'show_testimonial_thumbnails'     => '',
			'css_animation'               => '',
			'el_id'                       => '',
			'el_class'                    => '',
			'css'                         => '',
			'handle'                      => $handle,
		);
		$atts = shortcode_atts( $default_atts, $atts, $handle );
		global $sigma_shortcodes, $sigma_vc_inline_css;
    $inline_css             = '';
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
		$sigma_shortcodes_class_unique              = 'sigma-testimonial-slider-' . mt_rand();
		$sigma_shortcodes_classes                   = $this->handle . '_wrapper';
		$sigma_shortcodes_classes                   .= ' ' . $sigma_shortcodes_class_unique;
		$sigma_shortcodes_classes                   .= ' ' . $this->wrraper_class;
		if ( $atts[ 'el_class' ] ) {
			$sigma_shortcodes_classes .= ' ' . $atts[ 'el_class' ];
    }

    if ( $atts[ 'testi_title_color' ] ) {
      $inline_css .= "." . $sigma_shortcodes_class_unique . ".sigma-shortcode-wrapper.sigma_testimonial_slider_wrapper .slick-slider .slick-slide .sigma_testimonial-author cite{ color: " . $atts[ 'testi_title_color' ] . ";}";
    }
    if ( $atts[ 'testi_desc_color' ] ) {
      $inline_css .= "." . $sigma_shortcodes_class_unique . ".sigma-shortcode-wrapper.sigma_testimonial_slider_wrapper .slick-slider .slick-slide p{ color: " . $atts[ 'testi_desc_color' ] . ";}";
    }
    if ( $atts[ 'testi_quote_icon_color' ] ) {
      $inline_css .= "." . $sigma_shortcodes_class_unique . ".sigma-shortcode-wrapper.sigma_testimonial_slider_wrapper .icon{ color: " . $atts[ 'testi_quote_icon_color' ] . ";}";
    }
    if ( $atts[ 'testi_slider_dot_color' ] ) {
      $inline_css .= "." . $sigma_shortcodes_class_unique . ".sigma-shortcode-wrapper.sigma_testimonial_slider_wrapper .slick-slider .slick-dots button{ background-color: " . $atts[ 'testi_slider_dot_color' ] . ";}";
    }
    if ( $atts[ 'testi_slider_active_dot_color' ] ) {
      $inline_css .= "." . $sigma_shortcodes_class_unique . ".sigma-shortcode-wrapper.sigma_testimonial_slider_wrapper .slick-slider .slick-dots .slick-active button{ background-color: " . $atts[ 'testi_slider_active_dot_color' ] . ";}";
    }

		if ( $atts['css_animation'] && 'none' !== $atts['css_animation'] ) {
			wp_enqueue_script( 'vc_waypoints' );
			wp_enqueue_style( 'vc_animate-css' );
			$sigma_shortcodes_classes .= ' wpb_animate_when_almost_visible wpb_' . $atts['css_animation'] . ' ' . $atts['css_animation'];
		}
		if (  isset( $atts[ 'css' ] ) && $atts[ 'css' ] ) {
			$sigma_shortcodes_classes .= ' ' . vc_shortcode_custom_css_class( $atts[ 'css' ], ' ' );
		}

		if ( $inline_css ) {
			$sigma_vc_inline_css[] = $inline_css;
		}

		ob_start();
		?>
		<div <?php echo ( $atts[ 'el_id' ] ) ? 'id=' . esc_attr( $atts[ "el_id" ] ) : ''; ?> class="<?php echo esc_attr( $sigma_shortcodes_classes ); ?>">
			<?php sigmacore_get_vc_shortcode_template( 'testimonial-slider/content' ); ?>
		</div>
		<?php
		return ob_get_clean();
	}
}
new Sigma_Vc_Testimonial_Slider_Shortcode_Fields();
