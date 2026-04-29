<?php
/**
 * Sigma Custom images shortcode
 *
 * @package Sigma Core
 */
/**
 * Custom images shortcode.
 */
class Sigma_Vc_Custom_Images_Shortcode_Fields {
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
		$this->title         = esc_html__( 'Custom Images', 'sigma-core' );
		$this->handle        = 'sigma_custom_images';
		$this->description   = esc_html__( 'Use this shortcode to show images.', 'sigma-core' );
		$this->category      = esc_html__( 'Sigma', 'sigma-core' );
		$this->wrraper_class = 'sigma-shortcode-wrapper';
		add_action( 'vc_before_init', array( $this, 'shortcode_fields' ) );
		add_shortcode( $this->handle, array( $this, 'shortcode_callback' ) );
	}
	/**
	 * Custom images shortcode mapping.
	 *
	 * @return void
	 */
	function shortcode_fields() {
        $fields = array(
        array(
				'type'             => 'dropdown',
				'param_name'       => 'style',
				'heading'          => esc_html__( 'Images Style', 'sigma-core' ),
				'description'      => esc_html__( 'Select custom images style.', 'sigma-core' ),
				'std'              => 'style-1',
				'value'            => array(
					esc_html__( 'Style 1', 'sigma-core' ) => 'style-1',
					esc_html__( 'Style 2', 'sigma-core' )   => 'style-2',
  				),
  			),
        array(
				'type'        => 'attach_image',
				'heading'     => esc_html__( 'Image 1', 'sigma-core' ),
				'param_name'  => 'style_1_img_1',
				'value'       => '',
				'description' => esc_html__( 'Add an first image to display.', 'sigma-core' ),
        ),
        array(
				'type'        => 'attach_image',
				'heading'     => esc_html__( 'Image 2', 'sigma-core' ),
				'param_name'  => 'style_1_img_2',
				'value'       => '',
				'description' => esc_html__( 'Add an second image to display.', 'sigma-core' ),
        ),
        array(
				'type'        => 'attach_image',
				'heading'     => esc_html__( 'Image 3', 'sigma-core' ),
				'param_name'  => 'style_1_img_3',
				'value'       => '',
				'description' => esc_html__( 'Add an third image to display.', 'sigma-core' ),
        'dependency' => array(
          'element' => 'style',
          'value'   => 'style-1',
          ),
        ),
				array(
					'type'       => 'checkbox',
					'heading'    => esc_html__( 'Show 3D Effect on Hover', 'sigma-core' ),
					'param_name' => 'show_3d_effect',
					'dependency'  => array(
						'element' => 'style',
						'value'   => array('style-1'),
					),
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
	 * Custom images shortcode callback functions.
	 */
	function shortcode_callback( $atts, $content = null, $handle = '' ) {
		$default_atts = array(
      'style'               => 'style-1',
      'style_1_img_1'       => '',
      'style_1_img_2'       => '',
      'style_1_img_3'       => '',
      'show_3d_effect'      => '',
			'css_animation'       => '',
			'el_id'               => '',
			'el_class'            => '',
			'css'                 => '',
			'handle'              => $handle,
		);
		$atts = shortcode_atts( $default_atts, $atts, $handle );
		global $sigma_shortcodes;
		$sigma_shortcodes[ $handle ]['atts'] = $atts;
		$sigma_shortcodes_class_unique       = 'sigma-custom-images-' . mt_rand();
		$sigma_shortcodes_classes            = $this->handle . '_wrapper';
		$sigma_shortcodes_classes            .= ' ' . $sigma_shortcodes_class_unique;
		$sigma_shortcodes_classes            .= ' ' . $this->wrraper_class;
		if ( $atts[ 'el_class' ] ) {
			$sigma_shortcodes_classes .= ' ' . $atts[ 'el_class' ];
		}
        $sigma_shortcodes_classes .= ' custom-images-' . $atts['style'];
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
			<?php sigmacore_get_vc_shortcode_template( 'custom-images/content' ); ?>
		</div>
		<?php
		return ob_get_clean();
	}
}
new Sigma_Vc_Custom_Images_Shortcode_Fields();
