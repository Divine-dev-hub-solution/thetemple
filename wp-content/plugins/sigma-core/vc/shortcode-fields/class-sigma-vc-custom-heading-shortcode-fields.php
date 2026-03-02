<?php
/**
 * Sigma Custom heading shortcode
 *
 * @package Sigma Core
 */

/**
 * Custom Heading shortcode.
 */
class Sigma_Vc_Custom_Heading_Shortcode_Fields {

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

		$this->title         = esc_html__( 'Custom Heading', 'sigma-core' );
		$this->handle        = 'sigma_custom_heading';
		$this->description   = esc_html__( 'Use this shortcode for section header.', 'sigma-core' );
		$this->category      = esc_html__( 'Sigma', 'sigma-core' );
		$this->wrraper_class = 'sigma-shortcode-wrapper';

		add_action( 'vc_before_init', array( $this, 'shortcode_fields' ) );
		add_shortcode( $this->handle, array( $this, 'shortcode_callback' ) );
	}

	/**
	 * Counter shortcode mapping.
	 *
	 * @return void
	 */
	function shortcode_fields() {
		$fields = array(
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Style', 'sigma-core' ),
				'param_name' => 'style',
				'value'      => array(
					esc_html__( 'Style 1', 'sigma-core' ) => 'style-1',
					esc_html__( 'Style 2', 'sigma-core' ) => 'style-2',
					esc_html__( 'Style 3', 'sigma-core' ) => 'style-3',

				),
			),
			array(
				'type'        => 'textarea',
				'param_name'  => 'title',
				'heading'     => esc_html__( 'Title', 'sigma-core' ),
				'description' => esc_html__( 'Enter the title.', 'sigma-core' ),
			),
			array(
				'type'             => 'dropdown',
				'param_name'       => 'title_element',
				'heading'          => esc_html__( 'Title Element', 'sigma-core' ),
				'description'      => esc_html__( 'Select element tag.', 'sigma-core' ),
				'value'            => array(
					esc_html__( 'h1', 'sigma-core' )  => 'h1',
					esc_html__( 'h2', 'sigma-core' )  => 'h2',
					esc_html__( 'h3', 'sigma-core' )  => 'h3',
					esc_html__( 'h4', 'sigma-core' )  => 'h4',
					esc_html__( 'h5', 'sigma-core' )  => 'h5',
					esc_html__( 'h6', 'sigma-core' )  => 'h6',
					esc_html__( 'p', 'sigma-core' )   => 'p',
					esc_html__( 'div', 'sigma-core' ) => 'div'

				),
			),
			array(
				'type'             => 'dropdown',
				'param_name'       => 'subtitle_text_transform',
				'heading'          => esc_html__( 'Subtitle text transform', 'sigma-core' ),
				'description'      => esc_html__( 'Select subtitle text transform.', 'sigma-core' ),
				'std'              => '',
				'value'            => array(
					esc_html__( 'Default', 'sigma-core' )    => '',
					esc_html__( 'Lowercase', 'sigma-core' )  => 'lowercase',
					esc_html__( 'Uppercase', 'sigma-core' )  => 'uppercase',
					esc_html__( 'Capitalize', 'sigma-core' ) => 'capitalize',
				),
			),
			array(
				'type'        => 'textarea',
				'param_name'  => 'subtitle',
				'heading'     => esc_html__( 'Subtitle', 'sigma-core' ),
				'description' => esc_html__( 'Enter the subtitle.', 'sigma-core' ),
			),
			array(
				'type'             => 'dropdown',
				'param_name'       => 'subtitle_element',
				'heading'          => esc_html__( 'Subtitle Element Tag', 'sigma-core' ),
				'description'      => esc_html__( 'Select element tag.', 'sigma-core' ),
				'value'            => array(
					esc_html__( 'h1', 'sigma-core' )  => 'h1',
					esc_html__( 'h2', 'sigma-core' )  => 'h2',
					esc_html__( 'h3', 'sigma-core' )  => 'h3',
					esc_html__( 'h4', 'sigma-core' )  => 'h4',
					esc_html__( 'h5', 'sigma-core' )  => 'h5',
					esc_html__( 'h6', 'sigma-core' )  => 'h6',
					esc_html__( 'p', 'sigma-core' )   => 'p',
					esc_html__( 'div', 'sigma-core' ) => 'div',
				),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Title Color', 'sigma-core' ),
				'param_name'  => 'heading_title_color',
				'description' => esc_html__( 'Select custom title color.', 'sigma-core' ),
				'group' => esc_html__( 'Color Options', 'sigma-core' ),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Subtitle Color', 'sigma-core' ),
				'param_name'  => 'heading_sub_title_color',
				'description' => esc_html__( 'Select custom subtitle color.', 'sigma-core' ),
				'group' => esc_html__( 'Color Options', 'sigma-core' ),
			),
			array(
				'type'             => 'dropdown',
				'param_name'       => 'title_text_transform',
				'heading'          => esc_html__( 'Title text transform', 'sigma-core' ),
				'description'      => esc_html__( 'Select title text transform.', 'sigma-core' ),
				'std'              => '',
				'value'            => array(
					esc_html__( 'Default', 'sigma-core' )    => '',
					esc_html__( 'Lowercase', 'sigma-core' )  => 'lowercase',
					esc_html__( 'Uppercase', 'sigma-core' )  => 'uppercase',
					esc_html__( 'Capitalize', 'sigma-core' ) => 'capitalize',
				),
			),
			array(
				'type'        => 'dropdown',
				'param_name'  => 'heading_alighnment',
				'heading'     => esc_html__( 'Heading Alignment', 'sigma-core' ),
				'value'            => array(
					esc_html__( 'Left', 'sigma-core' )   => 'text-left',
					esc_html__( 'Right', 'sigma-core' )  => 'text-right',
					esc_html__( 'Center', 'sigma-core' ) => 'text-center',
				),
				'std'         => 'left',
				'description' => __( 'Select heading alignment.', 'sigma-core' ),
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
	 * Counter shortcode callback functions.
	 */
	function shortcode_callback( $atts, $content = null, $handle = '' ) {

		$default_atts = array(
			'style'                   => 'style-1',
			'title'                   => '',
			'title_element'           => 'h2',
			'subtitle_text_transform' => 'uppercase',
			'subtitle'                => '',
			'subtitle_element'        => 'p',
			'heading_title_color'     => '',
			'heading_sub_title_color' => '',
			'title_text_transform'    => '',
			'heading_alighnment'      => 'text-center',
			'css_animation'           => '',
			'el_id'                   => '',
			'el_class'                => '',
			'css'                     => '',
			'handle'                  => $handle,
		);

		$atts = shortcode_atts( $default_atts, $atts, $handle );

		global $sigma_shortcodes, $sigma_vc_inline_css;

		$inline_css                                 = '';
		$sigma_shortcodes[ $handle ]['atts'] = $atts;
		$sigma_shortcodes_class_unique       = 'sigma-custom-heading-' . mt_rand();
		$sigma_shortcodes_classes            = $this->handle . '_wrapper';
		$sigma_shortcodes_classes            .= ' ' . $sigma_shortcodes_class_unique;
		$sigma_shortcodes_classes            .= ' ' . $this->wrraper_class;
		$sigma_shortcodes_classes            .= ' custom-heading-' . $atts[ 'style' ];
		$sigma_shortcodes_classes            .= ' subtitle-text-' . $atts[ 'subtitle_text_transform' ];
		$sigma_shortcodes_classes            .= ' title-text-' . $atts[ 'title_text_transform' ];
		$sigma_shortcodes_classes            .= ' ' . $atts[ 'heading_alighnment' ];

		if ( $atts[ 'el_class' ] ) {
			$sigma_shortcodes_classes .= ' ' . $atts[ 'el_class' ];
		}

		if ( $atts[ 'heading_title_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-custom-heading-wrapper .sigma-heading-title-wrapper .heading-title { color: " . $atts[ 'heading_title_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".custom-heading-style-2 .section-title .heading-title { color: " . $atts[ 'heading_title_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".custom-heading-style-3 .section-title .heading-title { color: " . $atts[ 'heading_title_color' ] . ";}";

		}

		if ( $atts[ 'heading_sub_title_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-custom-heading-wrapper .sigma-heading-subtitle-wrapper .heading-subtitle { color: " . $atts[ 'heading_sub_title_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-custom-heading-851428 .sigma-custom-heading-wrapper .sigma-heading-subtitle-wrapper .heading-subtitle:before { background-color: " . $atts[ 'heading_sub_title_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".custom-heading-style-2 .section-title .heading-subtitle { color: " . $atts[ 'heading_sub_title_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".custom-heading-style-3 .section-title .heading-subtitle { color: " . $atts[ 'heading_sub_title_color' ] . ";}";

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
			<?php sigmacore_get_vc_shortcode_template( 'custom-heading/content' ); ?>
		</div>
		<?php
		return ob_get_clean();
	}
}

new Sigma_Vc_Custom_Heading_Shortcode_Fields();
