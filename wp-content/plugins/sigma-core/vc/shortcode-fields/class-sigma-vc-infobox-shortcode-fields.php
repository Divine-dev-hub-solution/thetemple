<?php
/**
 * Sigma Infobox shortcode
 *
 * @package Sigma Core
 */
/**
 * Infobox shortcode.
 */
class Sigma_Vc_Infobox_Shortcode_Fields {
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
		$this->title         = esc_html__( 'Infobox', 'sigma-core' );
		$this->handle        = 'sigma_infobox';
		$this->description   = esc_html__( 'Use this shortcode to show infobox.', 'sigma-core' );
		$this->category      = esc_html__( 'Sigma', 'sigma-core' );
		$this->wrraper_class = 'sigma-shortcode-wrapper';
		add_action( 'vc_before_init', array( $this, 'shortcode_fields' ) );
		add_shortcode( $this->handle, array( $this, 'shortcode_callback' ) );
	}
	/**
	 * Infobox shortcode mapping.
	 *
	 * @return void
	 */
	function shortcode_fields() {
		$fields = array(
			array(
				'type'       => 'dropdown',
				'heading'    => __( 'Infobox Style', 'sigma-core' ),
				'param_name' => 'style',
				'value'      => array(
					esc_html__( 'Style 1', 'sigma-core' ) => 'style-1',
					esc_html__( 'Style 2', 'sigma-core' ) => 'style-2',
					esc_html__( 'Style 3', 'sigma-core' ) => 'style-3',
					esc_html__( 'Style 4', 'sigma-core' ) => 'style-4',
					esc_html__( 'Style 5', 'sigma-core' ) => 'style-5',
					esc_html__( 'Style 6', 'sigma-core' ) => 'style-6',
				),
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'infobox_subtitle',
				'heading'     => esc_html__( 'Subtitle', 'sigma-core' ),
				'description' => esc_html__( 'Enter Infobox subtitle.', 'sigma-core' ),
				'dependency'  => array(
					'element' => 'style',
					'value'   => 'style-5',
				),
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'infobox_title',
				'heading'     => esc_html__( 'Infobox Title', 'sigma-core' ),
				'description' => esc_html__( 'Enter Infobox title.', 'sigma-core' ),
			),
			array(
				'type'       => 'textarea_safe',
				'holder'     => 'div',
				'heading'    => esc_html__( 'Text', 'sigma-core' ),
				'param_name' => 'infobox_content',
			),
			array(
				'type'       => 'checkbox',
				'heading'    => esc_html__( 'Add icon?', 'sigma-core' ),
				'param_name' => 'add_icon',
			),
			array(
				'type'       => 'checkbox',
				'heading'    => esc_html__( 'Add Count', 'sigma-core' ),
				'param_name' => 'add_count',
				'dependency'  => array(
					'element' => 'style',
					'value'   => array('style-1', 'style-2', 'style-3'),
				),
			),
			array(
				'type'       => 'checkbox',
				'heading'    => esc_html__( 'Add Hover Image?', 'sigma-core' ),
				'param_name' => 'add_hover_image',
				'dependency'  => array(
					'element' => 'style',
					'value'   => 'style-2',
				),
			),
			array(
				'type'        => 'attach_image',
				'heading'     => esc_html__( 'Select Hover Image', 'sigma-core' ),
				'param_name'  => 'hover_image',
				'value'       => '',
				'dependency'  => array(
					'element' => 'add_hover_image',
					'value'   => 'true',
				),
			),
			array(
				'type'       => 'dropdown',
				'heading'    => __( 'Infobox Alignment', 'sigma-core' ),
				'param_name' => 'align',
				'value'      => array(
					esc_html__( 'Left', 'sigma-core' ) => 'left',
					esc_html__( 'Center', 'sigma-core' ) => 'center',
					esc_html__( 'Right', 'sigma-core' ) => 'right',
				),
				'dependency'  => array(
					'element' => 'style',
					'value'   => array('style-2', 'style-3'),
				),
			),
			array(
				'type'       => 'dropdown',
				'heading'    => __( 'Color Scheme', 'sigma-core' ),
				'param_name' => 'color_scheme',
				'value'      => array(
					esc_html__( 'Light', 'sigma-core' ) => 'light',
					esc_html__( 'Dark', 'sigma-core' ) => 'dark',
				),
				'dependency'  => array(
					'element' => 'style',
					'value'   => array('style-2', 'style-3'),
				),
				'group'       => esc_html__( 'Colors', 'sigma-core' ),
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'infobox_count',
				'heading'     => esc_html__( 'Infobox Count', 'sigma-core' ),
				'description' => esc_html__( 'Enter Infobox Count No.', 'sigma-core' ),
				'dependency'  => array(
					'element' => 'add_count',
					'value'   => 'true',
				),
			),
			array(
				'type'        => 'vc_link',
				'heading'     => esc_html__( 'Info Link', 'sigma-core' ),
				'param_name'  => 'info_link',
				'dependency' => array(
					'element' => 'style',
					'value'   => 'style-6',
				),
			),
			array(
				'type'       => 'dropdown',
				'heading'    => __( 'Icon Type', 'sigma-core' ),
				'param_name' => 'icon_as',
				'value'      => array(
					esc_html__( 'Font', 'sigma-core' )   => 'font',
					esc_html__( 'Image', 'sigma-core' )  => 'image',
					esc_html__( 'Number', 'sigma-core' ) => 'number',
				),
				'dependency'  => array(
					'element' => 'add_icon',
					'value'   => 'true',
				),
				'group'       => esc_html__( 'Icon Settings', 'sigma-core' ),
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'infobox_number',
				'heading'     => esc_html__( 'Infobox Number', 'sigma-core' ),
				'description' => esc_html__( 'Enter infobox number.', 'sigma-core' ),
				'dependency'  => array(
					'element' => 'icon_as',
					'value'   => 'number',
				),
				'group'       => esc_html__( 'Icon Settings', 'sigma-core' ),
			),
			array(
				'type'        => 'attach_image',
				'heading'     => esc_html__( 'Image', 'sigma-core' ),
				'param_name'  => 'icon_image',
				'value'       => '',
				'dependency'  => array(
					'element' => 'icon_as',
					'value'   => 'image',
				),
				'description' => esc_html__( 'Select image for icon.', 'sigma-core' ),
				'group'       => esc_html__( 'Icon Settings', 'sigma-core' ),
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Icon library', 'sigma-core' ),
				'value' => array(
					esc_html__( 'Font Awesome 5', 'sigma-core' ) => 'fontawesome',
					esc_html__( 'Open Iconic', 'sigma-core' )    => 'openiconic',
					esc_html__( 'Typicons', 'sigma-core' )       => 'typicons',
					esc_html__( 'Entypo', 'sigma-core' )         => 'entypo',
					esc_html__( 'Linecons', 'sigma-core' )       => 'linecons',
					esc_html__( 'Mono Social', 'sigma-core' )    => 'monosocial',
					esc_html__( 'Material', 'sigma-core' )       => 'material',
					esc_html__( 'Flaticon', 'sigma-core' )       => 'flaticon',
				),
				'admin_label' => true,
				'param_name'  => 'icon_type',
				'dependency' => array(
					'element' => 'icon_as',
					'value'   => 'font',
				),
				'group'       => esc_html__( 'Icon Settings', 'sigma-core' ),
				'description' => esc_html__( 'Select icon library.', 'sigma-core' ),
			),
			array(
				'type'             => 'iconpicker',
				'heading'          => __( 'Icon', 'sigma-core' ),
				'param_name'       => 'icon_flaticon',
				'settings'   => array(
					'emptyIcon'    => false,
					'iconsPerPage' => 500,
					'type' => 'flaticon',
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value'   => 'flaticon',
				),
				'description'      => __( 'Select icon from library.', 'sigma-core' ),
				'group'            => esc_html__( 'Icon Settings', 'sigma-core' ),
				'edit_field_class' => 'vc_col-sm-6 vc_column vc_column-with-padding',
			),
			array(
				'type'       => 'iconpicker',
				'heading'    => esc_html__( 'Icon', 'sigma-core' ),
				'param_name' => 'icon_fontawesome',
				'value'      => 'fas fa-adjust',
				'settings'   => array(
					'emptyIcon'    => false,
					'iconsPerPage' => 500,
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value'   => 'fontawesome',
				),
				'group'       => esc_html__( 'Icon Settings', 'sigma-core' ),
				'description' => esc_html__( 'Select icon from library.', 'sigma-core' ),
			),
			array(
				'type'       => 'iconpicker',
				'heading'    => esc_html__( 'Icon', 'sigma-core' ),
				'param_name' => 'icon_openiconic',
				'value'      => 'vc-oi vc-oi-dial',
				'settings'   => array(
					'emptyIcon'    => false,
					'type'         => 'openiconic',
					'iconsPerPage' => 4000,
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value'   => 'openiconic',
				),
				'group'       => esc_html__( 'Icon Settings', 'sigma-core' ),
				'description' => esc_html__( 'Select icon from library.', 'sigma-core' ),
			),
			array(
				'type'       => 'iconpicker',
				'heading'    => esc_html__( 'Icon', 'sigma-core' ),
				'param_name' => 'icon_typicons',
				'value'      => 'typcn typcn-adjust-brightness',
				'settings' => array(
					'emptyIcon'    => false,
					'type'         => 'typicons',
					'iconsPerPage' => 4000,
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value'   => 'typicons',
				),
				'group'       => esc_html__( 'Icon Settings', 'sigma-core' ),
				'description' => esc_html__( 'Select icon from library.', 'sigma-core' ),
			),
			array(
				'type'       => 'iconpicker',
				'heading'    => esc_html__( 'Icon', 'sigma-core' ),
				'param_name' => 'icon_entypo',
				'value'      => 'entypo-icon entypo-icon-note',
				'settings'   => array(
					'emptyIcon' => false,
					'type'         => 'entypo',
					'iconsPerPage' => 4000,
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value'   => 'entypo',
				),
				'group'      => esc_html__( 'Icon Settings', 'sigma-core' ),
			),
			array(
				'type'       => 'iconpicker',
				'heading'    => esc_html__( 'Icon', 'sigma-core' ),
				'param_name' => 'icon_linecons',
				'value'      => 'vc_li vc_li-heart',
				'settings' => array(
					'emptyIcon'    => false,
					'type'         => 'linecons',
					'iconsPerPage' => 4000,
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value'   => 'linecons',
				),
				'group'       => esc_html__( 'Icon Settings', 'sigma-core' ),
				'description' => esc_html__( 'Select icon from library.', 'sigma-core' ),
			),
			array(
				'type'       => 'iconpicker',
				'heading'    => esc_html__( 'Icon', 'sigma-core' ),
				'param_name' => 'icon_monosocial',
				'value'      => 'vc-mono vc-mono-fivehundredpx',
				'settings'   => array(
					'emptyIcon'    => false,
					'type'         => 'monosocial',
					'iconsPerPage' => 4000,
				),
				'dependency'  => array(
					'element' => 'icon_type',
					'value'   => 'monosocial',
				),
				'group'       => esc_html__( 'Icon Settings', 'sigma-core' ),
				'description' => esc_html__( 'Select icon from library.', 'sigma-core' ),
			),
			array(
				'type'       => 'iconpicker',
				'heading'    => esc_html__( 'Icon', 'sigma-core' ),
				'param_name' => 'icon_material',
				'value'      => 'vc-material vc-material-cake',
				'settings'   => array(
					'emptyIcon'    => false,
					'type'         => 'material',
					'iconsPerPage' => 4000,
				),
				'dependency'  => array(
					'element' => 'icon_type',
					'value'   => 'material',
				),
				'group'       => esc_html__( 'Icon Settings', 'sigma-core' ),
				'description' => esc_html__( 'Select icon from library.', 'sigma-core' ),
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'info_count_no',
				'heading'     => esc_html__( 'Count No.', 'sigma-core' ),
				'description' => esc_html__( 'Add number for this Infobox.', 'sigma-core' ),
				'dependency' => array(
					'element' => 'style',
					'value'   => 'style-3',
				),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Icon Color', 'sigma-core' ),
				'param_name'  => 'info_icon_color',
				'description' => esc_html__( 'Select custom icon color.', 'sigma-core' ),
				'group' => esc_html__( 'Color Options', 'sigma-core' ),
				'dependency' => array(
					'element' => 'style',
					'value'   => 'style-4',
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
	 * Infobox shortcode callback functions.
	 */
	function shortcode_callback( $atts, $content = null, $handle = '' ) {
		$default_atts = array(
			'style'               => 'style-1',
			'infobox_title'       => '',
			'infobox_subtitle'		=> '',
			'infobox_content'     => '',
			'align' 							=> 'left',
			'color_scheme'				=> 'light',
			'icon_type'           => 'fontawesome',
			'add_count' 					=> '',
			'add_hover_image'     => '',
			'info_link'						=> '',
			'hover_image'					=> '',
			'infobox_count' 			=> '',
			'add_icon'            => '',
			'icon_as'             => 'font',
			'infobox_number'      => '',
			'icon_image'          => '',
			'icon_fontawesome'    => 'fas fa-adjust',
			'icon_openiconic'     => 'vc-oi vc-oi-dial',
			'icon_typicons'       => 'typcn typcn-adjust-brightness',
			'icon_linecons'       => 'vc_li vc_li-heart',
			'icon_monosocial'     => 'vc-mono vc-mono-fivehundredpx',
			'icon_material'       => 'vc-material vc-material-cake',
			'icon_flaticon'       => '',
			'info_count_no'       => '',
			'info_icon_color'     => '',
			'css_animation'       => '',
			'el_id'               => '',
			'el_class'            => '',
			'css'                 => '',
			'handle'              => $handle,
		);
		$atts = shortcode_atts( $default_atts, $atts, $handle );
		global $sigma_shortcodes, $sigma_vc_inline_css;
		$inline_css = '';
		$sigma_shortcodes[ $handle ]['atts'] = $atts;
		$sigma_shortcodes_class_unique       = 'sigma-infobox-' . mt_rand();
		$sigma_shortcodes_classes            = $this->handle . '_wrapper';
		$sigma_shortcodes_classes            .= ' ' . $sigma_shortcodes_class_unique;
		$sigma_shortcodes_classes            .= ' ' . $this->wrraper_class;
		if ( $atts[ 'el_class' ] ) {
			$sigma_shortcodes_classes .= ' ' . $atts[ 'el_class' ];
		}
		if ( $atts[ 'add_icon' ] && $atts[ 'icon_as' ] ) {
			$sigma_shortcodes_classes .= ' icon-type-' . $atts[ 'icon_as' ];
		}
		$sigma_shortcodes_classes            .= ' infobox-' . $atts[ 'style' ];
		$sigma_shortcodes_classes            .= ' infobox-' . $atts[ 'align' ];
		$sigma_shortcodes_classes            .= ' infobox-' . $atts[ 'color_scheme' ];


		if ( $atts[ 'info_icon_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".infobox-style-4 .sigma_icon-block.icon-block-3 .icon-wrapper i{ color: " . $atts[ 'info_icon_color' ] . ";}";
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
			<?php sigmacore_get_vc_shortcode_template( 'infobox/content' ); ?>
		</div>
		<?php
		return ob_get_clean();
	}
}
new Sigma_Vc_Infobox_Shortcode_Fields();
