<?php
/**
 * Sigma Megamenu Tab shortcode
 *
 * @package Sigma Core
 */
/**
 * Megamenu shortcode.
 */
class Sigma_Vc_Megamenu_Tabs_Shortcode_Fields
{
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
    protected $wrapper_class;
    /**
     * Shortcode map and callback
     */
    function __construct()
    {
        $this->title = esc_html__('Megamenu Tabs', 'sigma-core');
        $this->handle = 'sigma_megamenu_tabs';
        $this->description = esc_html__('Use this shortcode to show megamenu tabs.', 'sigma-core');
        $this->category = esc_html__('Sigma', 'sigma-core');
        $this->wrapper_class = 'sigma-shortcode-wrapper';
        add_action('vc_before_init', array($this, 'shortcode_fields'));
        add_shortcode($this->handle, array($this, 'shortcode_callback'));
    }
    /**
     * Megamenu Tab shortcode mapping.
     *
     * @return void
     */
    function shortcode_fields()
    {
        $fields = array(
            array(
                "type" => "param_group",
                "heading" => esc_html__("Tab List", 'sigma-core'),
                "param_name" => "megamenu_tab_list",
                "params" => array(
                    array(
                        'type' => 'textarea_safe',
                        'param_name' => 'megamenu_tab_title',
                        'heading' => esc_html__('Tab Title', 'sigma-core'),
                        'description' => esc_html__('Enter Tab title.', 'sigma-core'),
                    ),
                    array(
                        'type' => 'checkbox',
                        'heading' => esc_html__('Add icon?', 'sigma-core'),
                        'param_name' => 'add_icon',
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Icon Type', 'sigma-core'),
                        'param_name' => 'icon_as',
                        'value' => array(
                            esc_html__('Font', 'sigma-core') => 'font',
                            esc_html__('Image', 'sigma-core') => 'image',
                            esc_html__('SVG', 'sigma-core') => 'svg',
                        ),
                        'dependency' => array(
                            'element' => 'add_icon',
                            'value' => 'true',
                        ),
                    ),
                    array(
                        'type' => 'attach_image',
                        'heading' => esc_html__('Image', 'sigma-core'),
                        'param_name' => 'icon_image',
                        'value' => '',
                        'dependency' => array(
                            'element' => 'icon_as',
                            'value' => 'image',
                        ),
                        'description' => esc_html__('Select image for icon.', 'sigma-core'),
                    ),
                    array(
                        'type' => 'textarea_safe',
                        'heading' => esc_html__('SVG', 'sigma-core'),
                        'param_name' => 'icon_svg',
                        'value' => '',
                        'dependency' => array(
                            'element' => 'icon_as',
                            'value' => 'svg',
                        ),
                        'description' => esc_html__('Enter custom svg icon code', 'sigma-core'),
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Icon library', 'sigma-core'),
                        'value' => array(
                            esc_html__('Font Awesome 5', 'sigma-core') => 'fontawesome',
                            esc_html__('Open Iconic', 'sigma-core') => 'openiconic',
                            esc_html__('Typicons', 'sigma-core') => 'typicons',
                            esc_html__('Entypo', 'sigma-core') => 'entypo',
                            esc_html__('Linecons', 'sigma-core') => 'linecons',
                            esc_html__('Mono Social', 'sigma-core') => 'monosocial',
                            esc_html__('Material', 'sigma-core') => 'material',
                            esc_html__('Flaticon', 'sigma-core') => 'flaticon',
                        ),
                        'admin_label' => true,
                        'param_name' => 'icon_type',
                        'dependency' => array(
                            'element' => 'icon_as',
                            'value' => 'font',
                        ),
                        'description' => esc_html__('Select icon library.', 'sigma-core'),
                    ),
                    array(
                        'type' => 'iconpicker',
                        'heading' => esc_html__('Icon', 'sigma-core'),
                        'param_name' => 'icon_flaticon',
                        'settings' => array(
                            'iconsPerPage' => 500,
                            'type' => 'flaticon',
                        ),
                        'dependency' => array(
                            'element' => 'icon_type',
                            'value' => 'flaticon',
                        ),
                        'description' => esc_html__('Select icon from library.', 'sigma-core'),
                        'edit_field_class' => 'vc_col-sm-6 vc_column vc_column-with-padding',
                    ),
                    array(
                        'type' => 'iconpicker',
                        'heading' => esc_html__('Icon', 'sigma-core'),
                        'param_name' => 'icon_fontawesome',
                        'value' => 'fas fa-adjust',
                        'settings' => array(
                            'emptyIcon' => false,
                            'iconsPerPage' => 500,
                        ),
                        'dependency' => array(
                            'element' => 'icon_type',
                            'value' => 'fontawesome',
                        ),
                        'description' => esc_html__('Select icon from library.', 'sigma-core'),
                    ),
                    array(
                        'type' => 'iconpicker',
                        'heading' => esc_html__('Icon', 'sigma-core'),
                        'param_name' => 'icon_openiconic',
                        'value' => 'vc-oi vc-oi-dial',
                        'settings' => array(
                            'emptyIcon' => false,
                            'type' => 'openiconic',
                            'iconsPerPage' => 4000,
                        ),
                        'dependency' => array(
                            'element' => 'icon_type',
                            'value' => 'openiconic',
                        ),
                        'description' => esc_html__('Select icon from library.', 'sigma-core'),
                    ),
                    array(
                        'type' => 'iconpicker',
                        'heading' => esc_html__('Icon', 'sigma-core'),
                        'param_name' => 'icon_typicons',
                        'value' => 'typcn typcn-adjust-brightness',
                        'settings' => array(
                            'emptyIcon' => false,
                            'type' => 'typicons',
                            'iconsPerPage' => 4000,
                        ),
                        'dependency' => array(
                            'element' => 'icon_type',
                            'value' => 'typicons',
                        ),
                        'description' => esc_html__('Select icon from library.', 'sigma-core'),
                    ),
                    array(
                        'type' => 'iconpicker',
                        'heading' => esc_html__('Icon', 'sigma-core'),
                        'param_name' => 'icon_entypo',
                        'value' => 'entypo-icon entypo-icon-note',
                        'settings' => array(
                            'emptyIcon' => false,
                            'type' => 'entypo',
                            'iconsPerPage' => 4000,
                        ),
                        'dependency' => array(
                            'element' => 'icon_type',
                            'value' => 'entypo',
                        ),
                    ),
                    array(
                        'type' => 'iconpicker',
                        'heading' => esc_html__('Icon', 'sigma-core'),
                        'param_name' => 'icon_linecons',
                        'value' => 'vc_li vc_li-heart',
                        'settings' => array(
                            'emptyIcon' => false,
                            'type' => 'linecons',
                            'iconsPerPage' => 4000,
                        ),
                        'dependency' => array(
                            'element' => 'icon_type',
                            'value' => 'linecons',
                        ),
                        'description' => esc_html__('Select icon from library.', 'sigma-core'),
                    ),
                    array(
                        'type' => 'iconpicker',
                        'heading' => esc_html__('Icon', 'sigma-core'),
                        'param_name' => 'icon_monosocial',
                        'value' => 'vc-mono vc-mono-fivehundredpx',
                        'settings' => array(
                            'emptyIcon' => false,
                            'type' => 'monosocial',
                            'iconsPerPage' => 4000,
                        ),
                        'dependency' => array(
                            'element' => 'icon_type',
                            'value' => 'monosocial',
                        ),
                        'description' => esc_html__('Select icon from library.', 'sigma-core'),
                    ),
                    array(
                        'type' => 'iconpicker',
                        'heading' => esc_html__('Icon', 'sigma-core'),
                        'param_name' => 'icon_material',
                        'value' => 'vc-material vc-material-cake',
                        'settings' => array(
                            'emptyIcon' => false,
                            'type' => 'material',
                            'iconsPerPage' => 4000,
                        ),
                        'dependency' => array(
                            'element' => 'icon_type',
                            'value' => 'material',
                        ),
                        'description' => esc_html__('Select icon from library.', 'sigma-core'),
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Page Template', 'sigma'),
                        'param_name' => 'page_template',
                        'description' => esc_html__('Select page template style to show content in this tab.', 'sigma'),
                        'value' => sigmacore_get_posts_select('sigma_templates')
                    ),
                ),
            ),
            // Color options
            array(
      				'type'        => 'colorpicker',
      				'heading'     => esc_html__( 'Tab Background Color', 'sigma-core' ),
      				'param_name'  => 'tab_bg_color',
      				'description' => esc_html__( 'Select tab background color.', 'sigma-core' ),
      				'group'       => esc_html__( 'Color Options', 'sigma-core' ),
      			),
            array(
      				'type'        => 'colorpicker',
      				'heading'     => esc_html__( 'Tab Hover Background Color', 'sigma-core' ),
      				'param_name'  => 'tab_hover_bg_color',
      				'description' => esc_html__( 'Select tab hover background color.', 'sigma-core' ),
      				'group'       => esc_html__( 'Color Options', 'sigma-core' ),
      			),
            array(
      				'type'        => 'colorpicker',
      				'heading'     => esc_html__( 'Tab Color', 'sigma-core' ),
      				'param_name'  => 'tab_color',
      				'description' => esc_html__( 'Select tab color.', 'sigma-core' ),
      				'group'       => esc_html__( 'Color Options', 'sigma-core' ),
      			),
            array(
              'type'        => 'colorpicker',
              'heading'     => esc_html__( 'Tab Icon Color', 'sigma-core' ),
              'param_name'  => 'tab_icon_color',
              'description' => esc_html__( 'Select tab icon color.', 'sigma-core' ),
              'group'       => esc_html__( 'Color Options', 'sigma-core' ),
            ),
            array(
              'type'        => 'colorpicker',
              'heading'     => esc_html__( 'Tab Hover Color', 'sigma-core' ),
              'param_name'  => 'tab_hover_color',
              'description' => esc_html__( 'Select tab hover color.', 'sigma-core' ),
              'group'       => esc_html__( 'Color Options', 'sigma-core' ),
            ),
            array(
              'type'        => 'colorpicker',
              'heading'     => esc_html__( 'Tab Icon Hover Color', 'sigma-core' ),
              'param_name'  => 'tab_icon_hover_color',
              'description' => esc_html__( 'Select tab icon hover color.', 'sigma-core' ),
              'group'       => esc_html__( 'Color Options', 'sigma-core' ),
            ),
            array(
              'type'        => 'colorpicker',
              'heading'     => esc_html__( 'Tab Border Color', 'sigma-core' ),
              'param_name'  => 'tab_border_color',
              'description' => esc_html__( 'Select tab border color.', 'sigma-core' ),
              'group'       => esc_html__( 'Color Options', 'sigma-core' ),
            ),
            array(
              'type'        => 'colorpicker',
              'heading'     => esc_html__( 'Tab Content Background Color', 'sigma-core' ),
              'param_name'  => 'tab_content_bg_color',
              'description' => esc_html__( 'Select tab content background color.', 'sigma-core' ),
              'group'       => esc_html__( 'Color Options', 'sigma-core' ),
            ),
            array(
                'type' => 'checkbox',
                'heading' => esc_html__('Add Link Tabs?', 'sigma-core'),
                'param_name' => 'add_link_tabs',
            ),
            array(
                "type" => "param_group",
                "heading" => esc_html__("Link Tab List", 'sigma-core'),
                "param_name" => "link_tab_list",
                "params" => array(
                    array(
                        'type' => 'textfield',
                        'param_name' => 'link_tab_title',
                        'heading' => esc_html__('Tab Title', 'sigma-core'),
                        'description' => esc_html__('Enter Tab title.', 'sigma-core'),
                    ),
                    array(
                      'type'        => 'vc_link',
                      'heading'     => esc_html__( 'Tab Link', 'sigma-core' ),
                      'param_name'  => 'tab_link',
                    ),
                    array(
                        'type' => 'checkbox',
                        'heading' => esc_html__('Add icon?', 'sigma-core'),
                        'param_name' => 'link_tab_add_icon',
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Icon Type', 'sigma-core'),
                        'param_name' => 'link_tab_icon_as',
                        'value' => array(
                            esc_html__('Font', 'sigma-core') => 'font',
                            esc_html__('Image', 'sigma-core') => 'image',
                            esc_html__('SVG', 'sigma-core') => 'svg',
                        ),
                        'dependency' => array(
                            'element' => 'link_tab_add_icon',
                            'value' => 'true',
                        ),
                    ),
                    array(
                        'type' => 'attach_image',
                        'heading' => esc_html__('Image', 'sigma-core'),
                        'param_name' => 'link_tab_icon_image',
                        'value' => '',
                        'dependency' => array(
                            'element' => 'link_tab_icon_as',
                            'value' => 'image',
                        ),
                        'description' => esc_html__('Select image for icon.', 'sigma-core'),
                    ),
                    array(
                        'type' => 'textarea_safe',
                        'heading' => esc_html__('SVG', 'sigma-core'),
                        'param_name' => 'link_tab_icon_svg',
                        'value' => '',
                        'dependency' => array(
                            'element' => 'link_tab_icon_as',
                            'value' => 'svg',
                        ),
                        'description' => esc_html__('Enter custom svg icon code', 'sigma-core'),
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Icon library', 'sigma-core'),
                        'value' => array(
                            esc_html__('Font Awesome 5', 'sigma-core') => 'fontawesome',
                            esc_html__('Open Iconic', 'sigma-core') => 'openiconic',
                            esc_html__('Typicons', 'sigma-core') => 'typicons',
                            esc_html__('Entypo', 'sigma-core') => 'entypo',
                            esc_html__('Linecons', 'sigma-core') => 'linecons',
                            esc_html__('Mono Social', 'sigma-core') => 'monosocial',
                            esc_html__('Material', 'sigma-core') => 'material',
                            esc_html__('Flaticon', 'sigma-core') => 'flaticon',
                        ),
                        'admin_label' => true,
                        'param_name' => 'link_tab_icon_type',
                        'dependency' => array(
                            'element' => 'link_tab_icon_as',
                            'value' => 'font',
                        ),
                        'description' => esc_html__('Select icon library.', 'sigma-core'),
                    ),
                    array(
                        'type' => 'iconpicker',
                        'heading' => esc_html__('Icon', 'sigma-core'),
                        'param_name' => 'link_tab_icon_flaticon',
                        'settings' => array(
                            'iconsPerPage' => 500,
                            'type' => 'flaticon',
                        ),
                        'dependency' => array(
                            'element' => 'link_tab_icon_type',
                            'value' => 'flaticon',
                        ),
                        'description' => esc_html__('Select icon from library.', 'sigma-core'),
                        'edit_field_class' => 'vc_col-sm-6 vc_column vc_column-with-padding',
                    ),
                    array(
                        'type' => 'iconpicker',
                        'heading' => esc_html__('Icon', 'sigma-core'),
                        'param_name' => 'link_tab_icon_fontawesome',
                        'value' => 'fas fa-adjust',
                        'settings' => array(
                            'emptyIcon' => false,
                            'iconsPerPage' => 500,
                        ),
                        'dependency' => array(
                            'element' => 'link_tab_icon_type',
                            'value' => 'fontawesome',
                        ),
                        'description' => esc_html__('Select icon from library.', 'sigma-core'),
                    ),
                    array(
                        'type' => 'iconpicker',
                        'heading' => esc_html__('Icon', 'sigma-core'),
                        'param_name' => 'link_tab_icon_openiconic',
                        'value' => 'vc-oi vc-oi-dial',
                        'settings' => array(
                            'emptyIcon' => false,
                            'type' => 'openiconic',
                            'iconsPerPage' => 4000,
                        ),
                        'dependency' => array(
                            'element' => 'link_tab_icon_type',
                            'value' => 'openiconic',
                        ),
                        'description' => esc_html__('Select icon from library.', 'sigma-core'),
                    ),
                    array(
                        'type' => 'iconpicker',
                        'heading' => esc_html__('Icon', 'sigma-core'),
                        'param_name' => 'link_tab_icon_typicons',
                        'value' => 'typcn typcn-adjust-brightness',
                        'settings' => array(
                            'emptyIcon' => false,
                            'type' => 'typicons',
                            'iconsPerPage' => 4000,
                        ),
                        'dependency' => array(
                            'element' => 'link_tab_icon_type',
                            'value' => 'typicons',
                        ),
                        'description' => esc_html__('Select icon from library.', 'sigma-core'),
                    ),
                    array(
                        'type' => 'iconpicker',
                        'heading' => esc_html__('Icon', 'sigma-core'),
                        'param_name' => 'link_tab_icon_entypo',
                        'value' => 'entypo-icon entypo-icon-note',
                        'settings' => array(
                            'emptyIcon' => false,
                            'type' => 'entypo',
                            'iconsPerPage' => 4000,
                        ),
                        'dependency' => array(
                            'element' => 'link_tab_icon_type',
                            'value' => 'entypo',
                        ),
                    ),
                    array(
                        'type' => 'iconpicker',
                        'heading' => esc_html__('Icon', 'sigma-core'),
                        'param_name' => 'link_tab_icon_linecons',
                        'value' => 'vc_li vc_li-heart',
                        'settings' => array(
                            'emptyIcon' => false,
                            'type' => 'linecons',
                            'iconsPerPage' => 4000,
                        ),
                        'dependency' => array(
                            'element' => 'link_tab_icon_type',
                            'value' => 'linecons',
                        ),
                        'description' => esc_html__('Select icon from library.', 'sigma-core'),
                    ),
                    array(
                        'type' => 'iconpicker',
                        'heading' => esc_html__('Icon', 'sigma-core'),
                        'param_name' => 'link_tab_icon_monosocial',
                        'value' => 'vc-mono vc-mono-fivehundredpx',
                        'settings' => array(
                            'emptyIcon' => false,
                            'type' => 'monosocial',
                            'iconsPerPage' => 4000,
                        ),
                        'dependency' => array(
                            'element' => 'link_tab_icon_type',
                            'value' => 'monosocial',
                        ),
                        'description' => esc_html__('Select icon from library.', 'sigma-core'),
                    ),
                    array(
                        'type' => 'iconpicker',
                        'heading' => esc_html__('Icon', 'sigma-core'),
                        'param_name' => 'link_tab_icon_material',
                        'value' => 'vc-material vc-material-cake',
                        'settings' => array(
                            'emptyIcon' => false,
                            'type' => 'material',
                            'iconsPerPage' => 4000,
                        ),
                        'dependency' => array(
                            'element' => 'link_tab_icon_type',
                            'value' => 'material',
                        ),
                        'description' => esc_html__('Select icon from library.', 'sigma-core'),
                    ),
                    array(
              				'type'        => 'colorpicker',
              				'heading'     => esc_html__( 'Tab Background Color', 'sigma-core' ),
              				'param_name'  => 'link_tab_bg_color',
              				'description' => esc_html__( 'Select tab background color.', 'sigma-core' ),
              			),
                    array(
              				'type'        => 'colorpicker',
              				'heading'     => esc_html__( 'Tab Color', 'sigma-core' ),
              				'param_name'  => 'link_tab_color',
              				'description' => esc_html__( 'Select tab color.', 'sigma-core' ),
              			),
                ),
                'dependency' => array(
                  'element' => 'add_link_tabs',
                  'value'   => 'true',
                ),
            ),

            vc_map_add_css_animation(),
            array(
                'type' => 'el_id',
                'heading' => esc_html__('Element ID', 'sigma-core'),
                'param_name' => 'el_id',
                /* translators: 1: anchor tag start, 2: anchor tag end */
                'description' => sprintf(esc_html__('Enter element ID (Note: make sure it is unique and valid according to %1$sw3c specification%2$s).', 'sigma-core'), '<a href="https://www.w3schools.com/tags/att_global_id.asp" target="_blank">', '</a>'),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Extra class name', 'sigma-core'),
                'param_name' => 'el_class',
                'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.', 'sigma-core'),
            ),
            array(
                'type' => 'css_editor',
                'heading' => esc_html__('CSS box', 'sigma-core'),
                'param_name' => 'css',
                'group' => esc_html__('Design Options', 'sigma-core'),
            ),
        );
        // Shortcode Params
        $params = array(
            'name' => $this->title,
            'base' => $this->handle,
            'category' => $this->category,
            'description' => $this->description,
            'class' => $this->wrapper_class,
            'params' => $fields,
        );
        vc_map($params);
    }
    /**
     * Megamenu Tab shortcode callback functions.
     */
    function shortcode_callback($atts, $content = null, $handle = '')
    {
        $default_atts = array(
            'megamenu_tab_list' => '',
            'megamenu_tab_title' => '',
            'page_template' => '',
            'icon_type' => 'fontawesome',
            'add_icon' => '',
            'icon_as' => 'font',
            'icon_image' => '',
            'icon_svg' => '',
            'icon_fontawesome' => 'fas fa-adjust',
            'icon_openiconic' => 'vc-oi vc-oi-dial',
            'icon_typicons' => 'typcn typcn-adjust-brightness',
            'icon_linecons' => 'vc_li vc_li-heart',
            'icon_monosocial' => 'vc-mono vc-mono-fivehundredpx',
            'icon_material' => 'vc-material vc-material-cake',
            'icon_flaticon' => '',
            'tab_bg_color' => '',
            'tab_hover_bg_color' => '',
            'tab_color' => '',
            'tab_icon_color' => '',
            'tab_hover_color' => '',
            'tab_icon_hover_color' => '',
            'tab_border_color' => '',
            'tab_content_bg_color' => '',
            'add_link_tabs' => '',
            'link_tab_list' => '',
            'css_animation' => '',
            'el_id' => '',
            'el_class' => '',
            'css' => '',
            'handle' => $handle,
        );
        $atts = shortcode_atts($default_atts, $atts, $handle);
        global $sigma_shortcodes, $sigma_vc_inline_css;
        $inline_css                                 = '';
        $sigma_shortcodes[$handle]['atts'] = $atts;
        $sigma_shortcodes_class_unique = 'sigma-megamenu-tab-' . mt_rand();
        $sigma_shortcodes[$handle]['unique-identifier'] = $sigma_shortcodes_class_unique;
        $sigma_shortcodes_classes = $this->handle . '_wrapper';
        $sigma_shortcodes_classes .= ' ' . $sigma_shortcodes_class_unique;
        $sigma_shortcodes_classes .= ' ' . $this->wrapper_class;
        if ($atts['el_class']) {
            $sigma_shortcodes_classes .= ' ' . $atts['el_class'];
        }
    		if ( $atts[ 'tab_bg_color' ] ) {
    			$inline_css .= "." . $sigma_shortcodes_class_unique . ".sigma_megamenu_tabs_wrapper .sigma_megamenu-tab-item.style-1 .nav-tabs .nav-item a { background-color: " . $atts[ 'tab_bg_color' ] . ";}";
    		}
        if ( $atts[ 'tab_hover_bg_color' ] ) {
    			$inline_css .= "." . $sigma_shortcodes_class_unique . ".sigma_megamenu_tabs_wrapper .sigma_megamenu-tab-item.style-1 .nav-tabs .nav-item a.active{ background-color: " . $atts[ 'tab_hover_bg_color' ] . ";}";
    			$inline_css .= "." . $sigma_shortcodes_class_unique . ".sigma_megamenu_tabs_wrapper .sigma_megamenu-tab-item.style-1 .nav-tabs .nav-item a:hover { background-color: " . $atts[ 'tab_hover_bg_color' ] . ";}";
    		}
        if ( $atts[ 'tab_color' ] ) {
    			$inline_css .= "." . $sigma_shortcodes_class_unique . ".sigma_megamenu_tabs_wrapper .sigma_megamenu-tab-item.style-1 .nav-tabs .nav-item a { color: " . $atts[ 'tab_color' ] . ";}";
    		}
        if ( $atts[ 'tab_icon_color' ] ) {
    			$inline_css .= "." . $sigma_shortcodes_class_unique . ".sigma_megamenu_tabs_wrapper .sigma_megamenu-tab-item.style-1 .nav-tabs .nav-item a i { color: " . $atts[ 'tab_icon_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . ".sigma_megamenu_tabs_wrapper .sigma_megamenu-tab-item.style-1 .nav-tabs .nav-item a .sigma_info-icon svg { fill: " . $atts[ 'tab_icon_color' ] . ";}";
    			$inline_css .= "." . $sigma_shortcodes_class_unique . ".sigma_megamenu_tabs_wrapper .sigma_megamenu-tab-item.style-1 .nav-tabs .nav-item a .sigma_info-icon svg { fill: " . $atts[ 'tab_icon_color' ] . ";}";
    		}
        if ( $atts[ 'tab_hover_color' ] ) {
          $inline_css .= "." . $sigma_shortcodes_class_unique . ".sigma_megamenu_tabs_wrapper .sigma_megamenu-tab-item.style-1 .nav-tabs .nav-item a.active{ color: " . $atts[ 'tab_hover_color' ] . ";}";
    			$inline_css .= "." . $sigma_shortcodes_class_unique . ".sigma_megamenu_tabs_wrapper .sigma_megamenu-tab-item.style-1 .nav-tabs .nav-item a:hover { color: " . $atts[ 'tab_hover_color' ] . ";}";
    		}
        if ( $atts[ 'tab_icon_hover_color' ] ) {
    			$inline_css .= "." . $sigma_shortcodes_class_unique . ".sigma_megamenu_tabs_wrapper .sigma_megamenu-tab-item.style-1 .nav-tabs .nav-item a.active i { color: " . $atts[ 'tab_icon_hover_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . ".sigma_megamenu_tabs_wrapper .sigma_megamenu-tab-item.style-1 .nav-tabs .nav-item a:hover i { color: " . $atts[ 'tab_icon_hover_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . ".sigma_megamenu_tabs_wrapper .sigma_megamenu-tab-item.style-1 .nav-tabs .nav-item a:hover .sigma_info-icon svg { fill: " . $atts[ 'tab_icon_hover_color' ] . ";}";
    			$inline_css .= "." . $sigma_shortcodes_class_unique . ".sigma_megamenu_tabs_wrapper .sigma_megamenu-tab-item.style-1 .nav-tabs .nav-item a.active .sigma_info-icon svg { fill: " . $atts[ 'tab_icon_hover_color' ] . ";}";
    		}
        if ( $atts[ 'tab_border_color' ] ) {
    			$inline_css .= "." . $sigma_shortcodes_class_unique . ".sigma_megamenu_tabs_wrapper .sigma_megamenu-tab-item.style-1 .nav-tabs .nav-item a { border-bottom-color: " . $atts[ 'tab_border_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . ".sigma_megamenu_tabs_wrapper .sigma_megamenu-tab-item.style-1 .nav-tabs .nav-item a:hover { border-color: " . $atts[ 'tab_border_color' ] . ";}";
    		}
        if ( $atts[ 'tab_content_bg_color' ] ) {
    			$inline_css .= "." . $sigma_shortcodes_class_unique . ".sigma_megamenu_tabs_wrapper .tab-content { background-color: " . $atts[ 'tab_content_bg_color' ] . ";}";
    		}
        if ($atts['add_icon'] && $atts['icon_as']) {
            $sigma_shortcodes_classes .= ' icon-type-' . $atts['icon_as'];
        }
        if ($atts['css_animation'] && 'none' !== $atts['css_animation']) {
            wp_enqueue_script('vc_waypoints');
            wp_enqueue_style('vc_animate-css');
            $sigma_shortcodes_classes .= ' wpb_animate_when_almost_visible wpb_' . $atts['css_animation'] . ' ' . $atts['css_animation'];
        }
        if (isset($atts['css']) && $atts['css']) {
            $sigma_shortcodes_classes .= ' ' . vc_shortcode_custom_css_class($atts['css'], ' ');
        }
    		if ( $inline_css ) {
    			$sigma_vc_inline_css[] = $inline_css;
    		}
        ob_start();
        if (!$atts['megamenu_tab_list']) {
            return;
        }
        ?>
        <div <?php echo ($atts['el_id']) ? 'id=' . esc_attr($atts["el_id"]) : ''; ?> class="<?php echo esc_attr($sigma_shortcodes_classes); ?>">
            <?php
            $megamenu_tab_lists = vc_param_group_parse_atts($atts['megamenu_tab_list']);
            $link_tab_lists = vc_param_group_parse_atts($atts['link_tab_list']);
            $identifier = $sigma_shortcodes_class_unique;
            if (!empty($megamenu_tab_lists)) {
              $i = 0;
              $y = 0;
              ?>
              <div class="row no-gutters d-megamenu">
                  <div class="col-lg-3 col-md-12">
                      <div class="sigma_megamenu-tab-item style-1">
                          <ul class="nav nav-tabs" id="myTab" role="tablist">
                              <?php foreach ($megamenu_tab_lists as $megamenu_tab_list) {
                                  if (isset($megamenu_tab_list['megamenu_tab_title']) && !empty($megamenu_tab_list['megamenu_tab_title'])) { ?>
                                      <li class="nav-item">
                                          <a class="nav-link <?php if ($i == 0) {
                                              echo 'active';
                                          } ?>" id="photo-tab-<?php echo esc_attr($identifier . $i); ?>" data-toggle="tab"
                                             href="#photo-<?php echo esc_attr($identifier . $i); ?>" role="tab"
                                             aria-controls="photo-tab-<?php echo esc_attr($identifier . $i); ?>" aria-selected="true">
                                              <?php if (isset($megamenu_tab_list['add_icon']) && $megamenu_tab_list['add_icon']) {
                                                  if ($megamenu_tab_list['icon_as'] === 'image') {
                                                      ?>
                                                      <?php
                                                      if ($megamenu_tab_list['icon_image']) {
                                                          $image_data = wp_get_attachment_image_src($megamenu_tab_list['icon_image'], 'thumbnail');
                                                          $image_url = (isset($image_data[0]) && $image_data[0]) ? $image_data[0] : '';
                                                          if ($image_url) {
                                                              ?>
                                                              <span class="sigma_info-icon">
                                                                <?php echo SigmaBase_Lazy_Load::show_resized_image($image_url, 14, 14, true, '', 'img'); ?>
                                                              </span>
                                                              <?php
                                                          }
                                                      }
                                                      ?>
                                                      <?php
                                                  } elseif ($megamenu_tab_list['icon_as'] === 'svg') {
                                                      if ($megamenu_tab_list['icon_svg']) {
                                                          ?>
                                                          <span class="sigma_info-icon"><?php echo html_entity_decode(vc_value_from_safe($megamenu_tab_list['icon_svg'], true)); ?></span>
                                                          <?php
                                                      }
                                                  } else {
                                                      if ($megamenu_tab_list['icon_type']) {
                                                          $icon_type = 'icon_' . $megamenu_tab_list['icon_type'];
                                                          vc_icon_element_fonts_enqueue($megamenu_tab_list['icon_type']);
                                                          if (isset($megamenu_tab_list[$icon_type]) && $megamenu_tab_list[$icon_type]) {
                                                              ?>
                                                              <span class="sigma_info-icon"><i class="<?php echo esc_attr($megamenu_tab_list[$icon_type]); ?>"></i></span>
                                                              <?php
                                                          }
                                                      }
                                                  }
                                              } ?>
                                              <?php echo html_entity_decode(vc_value_from_safe($megamenu_tab_list['megamenu_tab_title'], true)); ?>
                                          </a>
                                      </li>
                                      <?php $i++;
                                  }
                              } ?>
                              <?php if(!empty($link_tab_lists)) {
                                foreach($link_tab_lists as $link_tab_list) {
                                  $tab_link = vc_build_link( $link_tab_list['tab_link'] );
                                  $tab_url = isset($tab_link['url']) && !empty($tab_link['url']) ? $tab_link['url'] : '';
                                  $tab_link_bg_color = !empty($link_tab_list['link_tab_bg_color']) ? $link_tab_list['link_tab_bg_color']: '';
                                  $tab_link_color = !empty($link_tab_list['link_tab_color']) ? $link_tab_list['link_tab_color']: '';
                                  ?>
                                  <li class="nav-item">
                                    <a href="<?php echo esc_url($tab_url); ?>" class="nav-link custom-link-tab" style="background-color: <?php echo $tab_link_bg_color; ?>; color: <?php echo $tab_link_color; ?>" target="_blank">
                                      <?php if (isset($link_tab_list['link_tab_add_icon']) && $link_tab_list['link_tab_add_icon']) {
                                          if ($link_tab_list['link_tab_icon_as'] === 'image') {
                                              ?>
                                              <?php
                                              if ($link_tab_list['link_tab_icon_image']) {
                                                  $image_data = wp_get_attachment_image_src($link_tab_list['link_tab_icon_image'], 'thumbnail');
                                                  $image_url = (isset($image_data[0]) && $image_data[0]) ? $image_data[0] : '';
                                                  if ($image_url) {
                                                      ?>
                                                      <span class="sigma_info-icon">
                                                        <?php echo SigmaBase_Lazy_Load::show_resized_image($image_url, 14, 14, true, '', 'img'); ?>
                                                      </span>
                                                      <?php
                                                  }
                                              }
                                              ?>
                                              <?php
                                          } elseif ($link_tab_list['link_tab_icon_as'] === 'svg') {
                                              if ($link_tab_list['link_tab_icon_svg']) {
                                                  ?>
                                                  <span class="sigma_info-icon"><?php echo html_entity_decode(vc_value_from_safe($link_tab_list['link_tab_icon_svg'], true)); ?></span>
                                                  <?php
                                              }
                                          } else {
                                              if ($link_tab_list['link_tab_icon_type']) {
                                                  $icon_type = 'link_tab_icon_' . $link_tab_list['link_tab_icon_type'];
                                                  vc_icon_element_fonts_enqueue($link_tab_list['link_tab_icon_type']);
                                                  if (isset($link_tab_list[$icon_type]) && $link_tab_list[$icon_type]) {
                                                      ?>
                                                      <span class="sigma_info-icon"><i class="<?php echo esc_attr($link_tab_list[$icon_type]); ?>"></i></span>
                                                      <?php
                                                  }
                                              }
                                          }
                                      } ?>
                                      <?php echo esc_html($link_tab_list['link_tab_title']); ?>
                                    </a>
                                  </li>
                                  <?php
                                }
                               } ?>
                          </ul>
                      </div>
                  </div>
                  <div class="tab-content col-lg-9 col-md-12" id="myTabContent">
                      <?php foreach ($megamenu_tab_lists as $megamenu_tab_list) {
                          $page_template = isset($megamenu_tab_list['page_template']) ? get_post($megamenu_tab_list['page_template']) : '';
                          if (!empty($page_template)) {
                              ?>
                              <div class="tab-pane fade <?php if ($y == 0) {
                                  echo 'show active';
                              }; ?>" id="photo-<?php echo esc_attr($identifier . $y); ?>" role="tabpanel"
                                   aria-labelledby="photo-tab-<?php echo esc_attr($identifier . $y); ?>">
                                  <?php echo do_shortcode($page_template->post_content); ?>
                              </div>
                              <?php $y++;
                          }
                      } ?>
                  </div>
              </div>
              <div class="m-megamenu">
                <div class="m-megamenu-content-wrapper" id="megamenu-collapse">
        				<?php foreach ($megamenu_tab_lists as $megamenu_tab_list) {
                  $rand_id = mt_rand();
                  ?>
                    <div class="m-megamenu-collapse-card">
                      <?php  if (isset($megamenu_tab_list['megamenu_tab_title']) && !empty($megamenu_tab_list['megamenu_tab_title'])) { ?>
                              <a class="nav-link-tab-item  <?php if ($i == 0) {
                                  echo 'active';
                              } ?>">
                                  <?php if (isset($megamenu_tab_list['add_icon']) && $megamenu_tab_list['add_icon']) {
                                      if ($megamenu_tab_list['icon_as'] === 'image') {
                                          ?>
                                          <?php
                                          if ($megamenu_tab_list['icon_image']) {
                                              $image_data = wp_get_attachment_image_src($megamenu_tab_list['icon_image'], 'thumbnail');
                                              $image_url = (isset($image_data[0]) && $image_data[0]) ? $image_data[0] : '';
                                              if ($image_url) {
                                                  ?>
                                                  <span class="sigma_info-icon">
                                                    <?php echo SigmaBase_Lazy_Load::show_resized_image($image_url, 14, 14, true, '', 'img'); ?>
                                                  </span>
                                                  <?php
                                              }
                                          }
                                          ?>
                                          <?php
                                      } elseif ($megamenu_tab_list['icon_as'] === 'svg') {
                                          if ($megamenu_tab_list['icon_svg']) {
                                              ?>
                                              <span class="sigma_info-icon"><?php echo html_entity_decode(vc_value_from_safe($megamenu_tab_list['icon_svg'], true)); ?></span>
                                              <?php
                                          }
                                      } else {
                                          if ($megamenu_tab_list['icon_type']) {
                                              $icon_type = 'icon_' . $megamenu_tab_list['icon_type'];
                                              vc_icon_element_fonts_enqueue($megamenu_tab_list['icon_type']);
                                              if (isset($megamenu_tab_list[$icon_type]) && $megamenu_tab_list[$icon_type]) {
                                                  ?>
                                                  <span class="sigma_info-icon"><i class="<?php echo esc_attr($megamenu_tab_list[$icon_type]); ?>"></i></span>
                                                  <?php
                                              }
                                          }
                                      }
                                  } ?>
                                  <?php echo html_entity_decode(vc_value_from_safe($megamenu_tab_list['megamenu_tab_title'], true)); ?>
                              </a>
                            <?php } ?>
                            <div class="content">
                              <?php $page_template = isset($megamenu_tab_list['page_template']) ? get_post($megamenu_tab_list['page_template']) : '';
                              if (!empty($page_template)) {
                                echo do_shortcode($page_template->post_content);
                              }
                              ?>
                            </div>
                    </div>
        					<?php $i++; } ?>
        				</div>
              </div>
            <?php } ?>
        </div>
        <?php
        return ob_get_clean();
    }
}
new Sigma_Vc_Megamenu_Tabs_Shortcode_Fields();
