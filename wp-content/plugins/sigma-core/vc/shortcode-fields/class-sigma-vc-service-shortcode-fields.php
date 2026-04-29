<?php
/**
 * Sigma Service shortcode
 *
 * @package Sigma Core
 */
/**
 * Service shortcode.
 */
class Sigma_Vc_Service_Shortcode_Fields {
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
		$this->title         = esc_html__( 'Service', 'sigma-core' );
		$this->handle        = 'sigma_service';
		$this->description   = esc_html__( 'Use this shortcode to service.', 'sigma-core' );
		$this->category      = esc_html__( 'Sigma', 'sigma-core' );
		$this->wrraper_class = 'sigma-shortcode-wrapper';
		add_action( 'vc_before_init', array( $this, 'shortcode_fields' ) );
		add_shortcode( $this->handle, array( $this, 'shortcode_callback' ) );
	}
	/**
	 * Service shortcode mapping.
	 *
	 * @return void
	 */
	function shortcode_fields() {
		/*--- service list ----*/
		$result = array();
		$posts = get_posts(array(
			'posts_per_page' => -1,
			'post_type'      => 'service',
		));
		foreach ($posts as $post)
		{
			$result[] = array(
				'value' => $post->ID,
				'label' => $post->post_title,
			);
		}
		$categories_data = array();
		$categories      = get_terms( array(
			'taxonomy'   => 'service-category',
			'pad_counts' => true,
			'hide_empty' => false,
		) );
		foreach ( $categories as $category ) {
			if ( is_object( $category ) && isset( $category->name, $category->term_id ) ) {
				$categories_data[ $category->name . ' (' . $category->count . ')' ] = $category->term_id;
			}
		}
		$fields = array(
			array(
				'type'             => 'dropdown',
				'param_name'       => 'layout',
				'heading'          => esc_html__( 'Layout', 'sigma-core' ),
				'description'      => esc_html__( 'Select layout.', 'sigma-core' ),
				'std'              => 'slider',
				'value'      => array(
					esc_html__( 'Slider', 'sigma-core' ) => 'slider',
					esc_html__( 'Grid', 'sigma-core' )   => 'grid',
					esc_html__( 'Single', 'sigma-core' )   => 'single',
					esc_html__( 'Tabs', 'sigma-core' )   => 'tabs',
				),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => __( 'Services Tab Style', 'sigma-core' ),
				'description' => esc_html__( 'Select Services Tab Style.', 'sigma-core' ),
				'param_name'  => 'tabs_style',
				'value'       => array(
					esc_html__( 'Style 1', 'sigma-core' ) => 'style-1',
					esc_html__( 'Style 2', 'sigma-core' ) => 'style-2',
					esc_html__( 'Style 3', 'sigma-core' ) => 'style-3',
					esc_html__( 'Style 4', 'sigma-core' ) => 'style-4',
				),
				'dependency' => array(
					'element' => 'layout',
					'value'   => 'tabs',
				),
			),
			array(
				'type'       => 'checkbox',
				'heading'    => esc_html__( 'Add icon?', 'sigma-core' ),
				'param_name' => 'show_tab_icon',
				'dependency' => array(
					'element' => 'layout',
					'value'   => 'tabs',
				),
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
					'element' => 'show_tab_icon',
					'value'   => 'true',
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
				'type'        => 'dropdown',
				'heading'     => __( 'Service Style', 'sigma-core' ),
				'description' => esc_html__( 'Select Style.', 'sigma-core' ),
				'param_name'  => 'style',
				'value'       => array(
					esc_html__( 'Style 1', 'sigma-core' ) => 'style-1',
          esc_html__( 'Style 2', 'sigma-core' ) => 'style-2',
          esc_html__( 'Style 3', 'sigma-core' ) => 'style-3',
				),
			),
			array(
				'type'       => 'checkbox',
				'heading'    => esc_html__( 'Show icon?', 'sigma-core' ),
				'param_name' => 'add_icon',
			),
			array(
				'type'             => 'dropdown',
				'param_name'       => 'service_list',
				'heading'          => esc_html__( 'Select Service', 'sigma-core' ),
				'value'      => $result,
				'dependency' => array(
					'element' => 'layout',
					'value'   => 'single',
				),
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Categories', 'sigma-core' ),
				'param_name'  => 'post_categories',
				'description' => esc_html__( 'Select categories to display on front. it will show all the post if no categories selected.', 'sigma-core' ),
				'value'       => $categories_data,
				'dependency' => array(
					'element' => 'layout',
					'value'   => array('slider', 'grid'),
				),
			),
      array(
        'type'             => 'checkbox',
        'heading'          => esc_html__( 'Show Featured Image?', 'sigma-core' ),
        'param_name'       => 'post_featured_image',
        'value'            => array( esc_html__( 'Yes', 'sigma-core' ) => 'true' ),
        'description'      => esc_html__( 'Select this checkbox to show post featured image.', 'sigma-core' ),
        'edit_field_class' => 'vc_col-sm-6 vc_column',
        'dependency' => array(
          'element' => 'style',
          'value'   => 'style-1',
        ),
      ),
      array(
        'type'             => 'checkbox',
        'heading'          => esc_html__( 'Show Excerpt?', 'sigma-core' ),
        'param_name'       => 'post_excerpt',
        'value'            => array( esc_html__( 'Yes', 'sigma-core' ) => 'true' ),
        'description'      => esc_html__( 'Select this checkbox to show post excerpt.', 'sigma-core' ),
        'edit_field_class' => 'vc_col-sm-6 vc_column',
      ),
      array(
        'type'        => 'textfield',
        'heading'     => esc_html__( 'Post Excerpt Length', 'sigma-core' ),
        'param_name'  => 'post_excerpt_length',
        'description' => esc_html__( 'Enter number of words to show in excerpt.', 'sigma-core' ),
        'edit_field_class' => 'vc_col-sm-6 vc_column',
        'dependency' => array(
          'element' => 'post_excerpt',
          'value'   => 'true',
        ),
      ),
      array(
        'type'             => 'checkbox',
        'heading'          => esc_html__( 'Show Read More?', 'sigma-core' ),
        'param_name'       => 'post_read_more',
        'value'            => array( esc_html__( 'Yes', 'sigma-core' ) => 'true' ),
        'description'      => esc_html__( 'Select this checkbox to show post read more.', 'sigma-core' ),
        'edit_field_class' => 'vc_col-sm-6 vc_column',
        'dependency' => array(
          'element' => 'style',
          'value'   => 'style-2',
        ),
      ),
			array(
				'type'             => 'dropdown',
				'param_name'       => 'post_order',
				'heading'          => esc_html__( 'Order', 'sigma-core' ),
				'description'      => esc_html__( 'Select display order.', 'sigma-core' ),
				'std'              => 'DESC',
				'value'            => array(
					esc_html__( 'Ascending', 'sigma-core' )  => 'ASC',
					esc_html__( 'Descending', 'sigma-core' ) => 'DESC',
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
					esc_html__( 'Date', 'sigma-core' )          => 'date' ,
					esc_html__( 'Modified Date', 'sigma-core' ) => 'modified',
				),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
			),
			// single settings
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Block Background color', 'sigma-core' ),
				'param_name'  => 'single_block_bg',
				'description' => esc_html__( 'Select custom block background color.', 'sigma-core' ),
				'dependency' => array(
					'element' => 'layout',
					'value'   => 'single',
				),
				'group' => esc_html__( 'Color Options', 'sigma-core' ),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Title color', 'sigma-core' ),
				'param_name'  => 'single_title_color',
				'description' => esc_html__( 'Select custom title color.', 'sigma-core' ),
				'dependency' => array(
					'element' => 'layout',
					'value'   => 'single',
				),
				'group' => esc_html__( 'Color Options', 'sigma-core' ),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Description color', 'sigma-core' ),
				'param_name'  => 'single_desc_color',
				'description' => esc_html__( 'Select custom title color.', 'sigma-core' ),
				'dependency' => array(
					'element' => 'layout',
					'value'   => 'single',
				),
				'group' => esc_html__( 'Color Options', 'sigma-core' ),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Button color', 'sigma-core' ),
				'param_name'  => 'single_button_color',
				'description' => esc_html__( 'Select Link Button color.', 'sigma-core' ),
				'dependency' => array(
					'element' => 'layout',
					'value'   => 'single',
				),
				'group' => esc_html__( 'Color Options', 'sigma-core' ),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Icon color', 'sigma-core' ),
				'param_name'  => 'single_icon_color',
				'description' => esc_html__( 'Select custom title color.', 'sigma-core' ),
				'dependency' => array(
					'element' => 'layout',
					'value'   => 'single',
				),
				'group' => esc_html__( 'Color Options', 'sigma-core' ),
			),
      array(
        'type'        => 'textfield',
        'heading'     => esc_html__( 'No of Service', 'sigma-core' ),
        'param_name'  => 'post_per_page',
        'description' => esc_html__( 'Add no of services to show', 'sigma-core' ),
        'dependency' => array(
          'element' => 'layout',
          'value'   => array('slider', 'grid'),
        ),
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
			// grid settings
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
				'dependency' => array(
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
	 * Service shortcode callback functions.
	 */
	function shortcode_callback( $atts, $content = null, $handle = '' ) {
		$default_atts = array(
			'layout'                      => 'slider',
			'style'                       => 'style-1',
			'tabs_style'									=> 'style-1',
			'show_tab_icon' 										=> '',
			'icon_type'                   => 'fontawesome',
			'icon_fontawesome'    				=> 'fas fa-adjust',
			'icon_openiconic'     				=> 'vc-oi vc-oi-dial',
			'icon_typicons'      				 => 'typcn typcn-adjust-brightness',
			'icon_linecons'      				 => 'vc_li vc_li-heart',
			'icon_monosocial'    				 => 'vc-mono vc-mono-fivehundredpx',
			'icon_material'      				 => 'vc-material vc-material-cake',
			'icon_flaticon'      				 => '',
			'service_list'                => '',
			'add_icon'            		    => '',
			'post_per_page'               => '',
			'post_categories'             => '',
			'post_featured_image'         => '',
			'post_excerpt'                => '',
			'post_excerpt_length'         => '',
      'post_read_more'              => '',
			'post_order'                  => '',
			'post_orderby'                => '',
			'single_block_bg'             => '',
			'single_title_color'          => '',
			'single_desc_color'           => '',
			'single_button_color'         => '',
			'single_icon_color'           => '',
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
			'post_count_no'               => '',
			'css_animation'               => '',
			'el_id'                       => '',
			'el_class'                    => '',
			'css'                         => '',
			'handle'                      => $handle,
		);
		$atts = shortcode_atts( $default_atts, $atts, $handle );
		global $sigma_shortcodes, $sigma_vc_inline_css;
		$args = array(
			'post_type'           => 'service',
			'posts_per_page'      => $atts[ 'post_per_page' ],
			'post_status'         => array( 'publish' ),
			'ignore_sticky_posts' => true,
			'order'               => $atts[ 'post_order' ],
			'orderby'             => $atts[ 'post_orderby' ],
		);
		$list_args  = array(
			'post_type' => 'service',
			'hide_empty' => false,
			'order'               => $atts[ 'post_order' ],
			'orderby'             => $atts[ 'post_orderby' ],
			'include' => $atts[ 'service_list' ]
		);
		if ( $atts[ 'post_categories' ] ) {
			$categories_array = explode( ',', $atts[ 'post_categories' ] );
			if ( is_array( $categories_array ) && $categories_array ) {
				$args['tax_query'] = array(
					array(
						'taxonomy' => 'service-category',
						'field'    => 'term_id',
						'terms'    => $categories_array,
					),
				);
			}
		}
		$tab_cat = array();
		if ( $atts[ 'post_categories' ] ) {
		$tabsCategories = $atts[ 'post_categories' ];
		$tab_cat = array(
			'post_type' => 'service',
			'hide_empty' => true,
			'orderby' => 'count',
			'order' => 'ASC',
			'include' => $tabsCategories
		);
		}
		$tabs_category = get_terms('service-category', $tab_cat);
		$the_query = new WP_Query( $args );
		$posts_array = get_posts($list_args);
		if ( ! $the_query->have_posts() ) {
			return;
		}
		$inline_css                                 = '';
		$sigma_shortcodes[ $handle ][ 'atts' ]      = $atts;
		$sigma_shortcodes[ $handle ][ 'the_query' ] = $the_query;
		$sigma_shortcodes[ $handle ][ 'posts_array' ] = $posts_array;
		$sigma_shortcodes[ $handle ][ 'tabs_category' ] = $tabs_category;
		$sigma_shortcodes_class_unique              = 'sigma-service-' . mt_rand();
		$sigma_shortcodes_classes                   = $this->handle . '_wrapper';
		$sigma_shortcodes_classes                   .= ' ' . $sigma_shortcodes_class_unique;
		$sigma_shortcodes_classes                   .= ' ' . $this->wrraper_class;
		if ( $atts[ 'el_class' ] ) {
			$sigma_shortcodes_classes .= ' ' . $atts[ 'el_class' ];
		}
		$sigma_shortcodes_classes                   .= ' service-' . $atts[ 'style' ];
		$sigma_shortcodes_classes                   .= ' service-layout-' . $atts[ 'layout' ];
		if ( $atts[ 'single_block_bg' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".service-style-2 .sigma_service { background: " . $atts[ 'single_block_bg' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".service-style-2 .sigma_service { border-color: " . $atts[ 'single_block_bg' ] . ";}";
      $inline_css .= "." . $sigma_shortcodes_class_unique . ".service-style-3 .sigma_service { background: " . $atts[ 'single_block_bg' ] . ";}";
      $inline_css .= "." . $sigma_shortcodes_class_unique . ".service-style-3 .sigma_service { border-color: " . $atts[ 'single_block_bg' ] . ";}";
		}
		if ( $atts[ 'single_title_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".service-style-2 .sigma_service-body h5 { color: " . $atts[ 'single_title_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".service-style-2 .sigma_service:hover .sigma_service-body h5{ color: " . $atts[ 'single_title_color' ] . ";}";
      $inline_css .= "." . $sigma_shortcodes_class_unique . ".service-style-3 .sigma_service-body h5 { color: " . $atts[ 'single_title_color' ] . ";}";
      $inline_css .= "." . $sigma_shortcodes_class_unique . ".service-style-3 .sigma_service .sigma_service-thumb { border-color: " . $atts[ 'single_title_color' ] . ";}";
      $inline_css .= "." . $sigma_shortcodes_class_unique . ".service-style-3 .sigma_service .sigma_service-thumb::after { background-color: " . $atts[ 'single_title_color' ] . ";}";
      $inline_css .= "." . $sigma_shortcodes_class_unique . ".service-style-3 .sigma_service .sigma_service-thumb::before { background-color: " . $atts[ 'single_title_color' ] . ";}";
		}
		if ( $atts[ 'single_desc_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".service-style-2 .sigma_service-body p { color: " . $atts[ 'single_desc_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".service-style-3 .sigma_service-body p { color: " . $atts[ 'single_desc_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".service-style-2 .sigma_service:hover .sigma_service-body p { color: " . $atts[ 'single_desc_color' ] . ";}";
		}
		if ( $atts[ 'single_button_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".service-style-2 .sigma_service .btn-link { color: " . $atts[ 'single_button_color' ] . ";}";
      $inline_css .= "." . $sigma_shortcodes_class_unique . ".service-style-2 .sigma_service .btn-link i { color: " . $atts[ 'single_button_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".service-style-3 .sigma_service .btn-link { color: " . $atts[ 'single_button_color' ] . ";}";
      $inline_css .= "." . $sigma_shortcodes_class_unique . ".service-style-3 .sigma_service .btn-link i { color: " . $atts[ 'single_button_color' ] . ";}";
      $inline_css .= "." . $sigma_shortcodes_class_unique . ".service-style-2 .sigma_service:hover .btn-link { color: " . $atts[ 'single_button_color' ] . ";}";
      $inline_css .= "." . $sigma_shortcodes_class_unique . ".service-style-2 .sigma_service:hover .btn-link i { color: " . $atts[ 'single_button_color' ] . ";}";

		}
		if ( $atts[ 'single_icon_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".service-style-2 .sigma_service-thumb i { color: " . $atts[ 'single_icon_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".service-style-2 .sigma_service:hover .sigma_service-thumb i { color: " . $atts[ 'single_icon_color' ] . ";}";

			$inline_css .= "." . $sigma_shortcodes_class_unique . ".service-style-3 .sigma_service-thumb i { color: " . $atts[ 'single_icon_color' ] . ";}";
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
			<?php sigmacore_get_vc_shortcode_template( 'service/content' ); ?>
		</div>
		<?php
		return ob_get_clean();
	}
}
new Sigma_Vc_Service_Shortcode_Fields();
