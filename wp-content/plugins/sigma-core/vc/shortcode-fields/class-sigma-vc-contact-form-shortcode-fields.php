<?php
/**
 * Sigma Contact Form shortcode
 *
 * @package Sigma Core
 */
/**
 * Contact Form shortcode.
 */
class Sigma_Vc_Contact_Form_Shortcode_Fields {
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
		$this->title         = esc_html__( 'Contact Form', 'sigma-core' );
		$this->handle        = 'sigma_contact_form';
		$this->description   = esc_html__( 'Use this shortcode to show contact form.', 'sigma-core' );
		$this->category      = esc_html__( 'Sigma', 'sigma-core' );
		$this->wrraper_class = 'sigma-shortcode-wrapper';
		add_action( 'vc_before_init', array( $this, 'shortcode_fields' ) );
		add_shortcode( $this->handle, array( $this, 'shortcode_callback' ) );
	}
	/**
	 * Custom Tab shortcode mapping.
	 *
	 * @return void
	 */
	function shortcode_fields() {
		$fields = array(
      array(
        'type'        => 'textarea_safe',
        'param_name'  => 'contact_form_shortcode',
        'heading'     => esc_html__( 'Form Shortcode', 'sigma-core' ),
        'description' => esc_html__( 'Enter form shortcode', 'sigma-core' ),
      ),
      array(
        'type'       => 'checkbox',
        'heading'    => esc_html__( 'Show Signup Link?', 'sigma-core' ),
        'param_name' => 'show_signup',
      ),
      array(
        'type'        => 'textfield',
        'param_name'  => 'signup_link',
        'heading'     => esc_html__( 'Signup Page Link', 'sigma-core' ),
        'description' => esc_html__( 'Enter sign up page link', 'sigma-core' ),
        'dependency' => array(
          'element' => 'show_signup',
          'value'   => 'true',
        ),
      ),
      array(
        'type'       => 'checkbox',
        'heading'    => esc_html__( 'Show Star Rating?', 'sigma-core' ),
        'param_name' => 'show_star_rating',
      ),
      array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Star Rating', 'sigma-core' ),
        'value' => array(
          esc_html__( '1', 'sigma-core' ) => '1',
          esc_html__( '2', 'sigma-core' ) => '2',
          esc_html__( '3', 'sigma-core' ) => '3',
          esc_html__( '4', 'sigma-core' ) => '4',
          esc_html__( '5', 'sigma-core' ) => '5',
        ),
        'admin_label' => true,
        'param_name'  => 'star_rating',
        'dependency' => array(
          'element' => 'show_star_rating',
          'value'   => 'true',
        ),
      ),
      array(
        'type'        => 'textfield',
        'param_name'  => 'rating_title',
        'heading'     => esc_html__( 'Rating Title', 'sigma-core' ),
        'description' => esc_html__( 'Enter title to show under star rating', 'sigma-core' ),
        'dependency' => array(
          'element' => 'show_star_rating',
          'value'   => 'true',
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
	 * Custom Tab shortcode callback functions.
	 */
	function shortcode_callback( $atts, $content = null, $handle = '' ) {
		$default_atts = array(
			'contact_form_shortcode'       => '',
      'show_signup'          => '',
      'signup_link'          => '',
			'show_star_rating'     => '',
			'star_rating'          => '5',
			'rating_title'         => '',
			'css_animation'       => '',
			'el_id'               => '',
			'el_class'            => '',
			'css'                 => '',
			'handle'              => $handle,
		);
		$atts = shortcode_atts( $default_atts, $atts, $handle );
		global $sigma_shortcodes;
		$sigma_shortcodes[ $handle ]['atts'] = $atts;
		$sigma_shortcodes_class_unique       = 'sigma-contact-form-' . mt_rand();
		$sigma_shortcodes_classes            = $this->handle . '_wrapper';
		$sigma_shortcodes_classes            .= ' ' . $sigma_shortcodes_class_unique;
		$sigma_shortcodes_classes            .= ' ' . $this->wrraper_class;
		if ( $atts[ 'el_class' ] ) {
			$sigma_shortcodes_classes .= ' ' . $atts[ 'el_class' ];
		}
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
			<?php sigmacore_get_vc_shortcode_template( 'contact-form/content' ); ?>
		</div>
		<?php
		return ob_get_clean();
	}
}
new Sigma_Vc_Contact_Form_Shortcode_Fields();
