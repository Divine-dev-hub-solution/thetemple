<?php
/**
 * Sigma Time Table shortcode
 *
 * @package Sigma Core
 */
/**
 * Time table shortcode.
 */
class Sigma_Vc_Time_Table_Shortcode_Fields {
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
		$this->title         = esc_html__( 'Time Table', 'sigma-core' );
		$this->handle        = 'sigma_time_table';
		$this->description   = esc_html__( 'Use this shortcode to show time table.', 'sigma-core' );
		$this->category      = esc_html__( 'Sigma', 'sigma-core' );
		$this->wrraper_class = 'sigma-shortcode-wrapper';
		add_action( 'vc_before_init', array( $this, 'shortcode_fields' ) );
		add_shortcode( $this->handle, array( $this, 'shortcode_callback' ) );
	}
	/**
	 * Time Table Bar shortcode mapping.
	 *
	 * @return void
	 */
	function shortcode_fields() {
		$fields = array(
      array(
				'type'        => 'textfield',
				'param_name'  => 'first_schedule_title',
				'heading'     => esc_html__( 'First Schedule Label', 'sigma-core' ),
				'description' => esc_html__( 'Enter the custom label for first schedule list.', 'sigma-core' ),
			),
      array(
        'type'       => 'param_group',
        'param_name' => 'first_mass_schedule',
        'params'     => array(
          array(
            'type'             => 'textfield',
            'heading'          => esc_html__( 'Mass Timing', 'sigma-core' ),
            'param_name'       => 'mass_timing',
            'edit_field_class' => 'vc_col-sm-12 vc_column',
          ),
          array(
            'type'             => 'textfield',
            'heading'          => esc_html__( 'Mass Title', 'sigma-core' ),
            'param_name'       => 'mass_title',
            'edit_field_class' => 'vc_col-sm-12 vc_column',
          ),
        ),
      ),
      array(
				'type'        => 'textfield',
				'param_name'  => 'second_schedule_title',
				'heading'     => esc_html__( 'Second Schedule Label', 'sigma-core' ),
				'description' => esc_html__( 'Enter the custom label for second schedule list.', 'sigma-core' ),
			),
      array(
        'type'       => 'param_group',
        'param_name' => 'second_mass_schedule',
        'params'     => array(
          array(
            'type'             => 'textfield',
            'heading'          => esc_html__( 'Mass Timing', 'sigma-core' ),
            'param_name'       => 'mass_timing',
            'edit_field_class' => 'vc_col-sm-12 vc_column',
          ),
          array(
            'type'             => 'textfield',
            'heading'          => esc_html__( 'Mass Title', 'sigma-core' ),
            'param_name'       => 'mass_title',
            'edit_field_class' => 'vc_col-sm-12 vc_column',
          ),
        ),
      ),
      array(
				'type'        => 'textfield',
				'param_name'  => 'third_schedule_title',
				'heading'     => esc_html__( 'Third Schedule Label', 'sigma-core' ),
				'description' => esc_html__( 'Enter the custom label for first schedule third.', 'sigma-core' ),
			),
      array(
        'type'       => 'param_group',
        'param_name' => 'third_mass_schedule',
        'params'     => array(
          array(
            'type'             => 'textfield',
            'heading'          => esc_html__( 'Mass Timing', 'sigma-core' ),
            'param_name'       => 'mass_timing',
            'edit_field_class' => 'vc_col-sm-12 vc_column',
          ),
          array(
            'type'             => 'textfield',
            'heading'          => esc_html__( 'Mass Title', 'sigma-core' ),
            'param_name'       => 'mass_title',
            'edit_field_class' => 'vc_col-sm-12 vc_column',
          ),
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
	 * Time Table shortcode callback functions.
	 */
	function shortcode_callback( $atts, $content = null, $handle = '' ) {
		$default_atts = array(
			'first_schedule_title'    => '',
			'first_mass_schedule'     => '',
      'second_schedule_title'    => '',
			'second_mass_schedule'     => '',
      'third_schedule_title'    => '',
			'third_mass_schedule'     => '',
			'css_animation'       => '',
			'el_id'               => '',
			'el_class'            => '',
			'css'                 => '',
			'handle'              => $handle,
		);
		$atts = shortcode_atts( $default_atts, $atts, $handle );
		global $sigma_shortcodes;
		$inline_css                                 = '';
		$sigma_shortcodes[ $handle ]['atts'] = $atts;
		$sigma_shortcodes_class_unique       = 'sigma-time-table-' . mt_rand();
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
			<?php sigmacore_get_vc_shortcode_template( 'time-table/content' ); ?>
		</div>
		<?php
		return ob_get_clean();
	}
}
new Sigma_Vc_Time_Table_Shortcode_Fields();
