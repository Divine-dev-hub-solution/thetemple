<?php
/**
 * Sigma Youtube Broadcast shortcode
 *
 * @package Sigma Core
 */
/**
 * Youtube Broadcast shortcode.
 */
class Sigma_Vc_Youtube_Broadcast_Shortcode_Fields {
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
		$this->title         = esc_html__( 'Youtube Broadcast', 'sigma-core' );
		$this->handle        = 'sigma_youtube_broadcast';
		$this->description   = esc_html__( 'Use this shortcode to show youtube live video', 'sigma-core' );
		$this->category      = esc_html__( 'Sigma', 'sigma-core' );
		$this->wrraper_class = 'sigma-shortcode-wrapper';
		add_action( 'vc_before_init', array( $this, 'shortcode_fields' ) );
		add_shortcode( $this->handle, array( $this, 'shortcode_callback' ) );
	}

	/**
	 * Youtube Broadcast shortcode mapping.
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
				),
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'live_date',
				'heading'     => esc_html__( 'Date', 'sigma-core' ),
				'description' => esc_html__( 'Enter the date for live video.', 'sigma-core' ),
			),
			array(
				'type'        => 'textarea',
				'param_name'  => 'title',
				'heading'     => esc_html__( 'Title', 'sigma-core' ),
				'description' => esc_html__( 'Enter the Title.', 'sigma-core' ),
			),
			array(
				'type'        => 'textarea',
				'param_name'  => 'description',
				'heading'     => esc_html__( 'Description', 'sigma-core' ),
				'description' => esc_html__( 'Enter the description.', 'sigma-core' ),
			),
      array(
        'type'        => 'textarea_safe',
        'param_name'  => 'live_channel_id',
        'heading'     => esc_html__( 'Channel ID', 'sigma-core' ),
        'description' => esc_html__( 'Enter the youtube live video channel ID. (youtube.com/channel/UC2vHxjre7heEKgu_QO9R5Qg, you will need the UC2vHxjre7heEKgu_QO9R5Qg part).', 'sigma-core' ),
      ),
      array(
        'type'        => 'attach_image',
        'heading'     => esc_html__( 'Thumbnail Image', 'sigma-core' ),
        'param_name'  => 'live_video_thumbnail_image',
        'value'       => '',
      ),
			array(
				'type'        => 'textfield',
				'param_name'  => 'custom_vid_link',
				'heading'     => esc_html__( 'Custom Video Link', 'sigma-core' ),
				'description' => esc_html__( 'Enter the video link if not to show live feature.', 'sigma-core' ),
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
	 * Youtube Broadcast shortcode callback functions.
	 */
	function shortcode_callback( $atts, $content = null, $handle = '' ) {
		$default_atts = array(
			'style'                      => 'style-1',
			'live_date'                  => '',
			'title'							         => '',
			'description'							   => '',
			'live_channel_id'						 => '',
      'live_video_thumbnail_image' => '',
      'custom_vid_link' => '',
			'css_animation'              => '',
			'el_id'                      => '',
			'el_class'                   => '',
			'css'                        => '',
			'handle'                     => $handle,
		);
		$atts = shortcode_atts( $default_atts, $atts, $handle );
		global $sigma_shortcodes, $sigma_vc_inline_css;
		$inline_css                                 = '';
		$sigma_shortcodes[ $handle ]['atts'] = $atts;
		$sigma_shortcodes_class_unique       = 'sigma-youtube-broadcast-' . mt_rand();
		$sigma_shortcodes_classes            = $this->handle . '_wrapper';
		$sigma_shortcodes_classes            .= ' ' . $sigma_shortcodes_class_unique;
		$sigma_shortcodes_classes            .= ' ' . $this->wrraper_class;
		$sigma_shortcodes_classes            .= ' sigma_youtube-broadcast youtube-broadcast-' . $atts[ 'style' ];
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
		if ( $inline_css ) {
			$sigma_vc_inline_css[] = $inline_css;
		}

		ob_start();
		?>
		<div <?php echo ( $atts[ 'el_id' ] ) ? 'id=' . esc_attr( $atts[ "el_id" ] ) : ''; ?> class="<?php echo esc_attr( $sigma_shortcodes_classes ); ?>">
			<?php sigmacore_get_vc_shortcode_template( 'youtube-broadcast/content' ); ?>
		</div>
		<?php
		return ob_get_clean();
	}
}
new Sigma_Vc_Youtube_Broadcast_Shortcode_Fields();
