<?php
/**
 * Subheader Settings
 *
 * @package Maharatri
 */
return array(
	'title'  => esc_html__( 'Subheader Settings', 'maharatri' ),
	'id'     => 'subheader_settings',
	'icon'   => 'el el-file-edit',
	'fields' => array(
		array(
			'id'      => 'display_subheader',
			'type'    => 'switch',
			'title'   => esc_html__( 'Subheader', 'maharatri' ),
			'default' => 1,
		),
		array(
			'id'       => 'subheader_style',
			'type'     => 'select',
			'title'    => esc_html__('Subheader Style', 'maharatri'),
			'options'  => array(
				'style-1' => esc_html__('Style 1', 'maharatri'),
				'style-2' => esc_html__('Style 2', 'maharatri'),
				'style-3' => esc_html__('Style 3', 'maharatri'),
				'style-4' => esc_html__('Style 4', 'maharatri'),
			),
			'default'  => 'style-1',
			'required' => array(
				array('display_subheader','=', 1),
			),
		),
		array(
			'id'       => 'page_title_alignment',
			'type'     => 'select',
			'title'    => esc_html__('Page Title Alignment', 'maharatri'),
			'options'  => array(
				'text-left' => esc_html__('Left', 'maharatri'),
				'text-center' => esc_html__('Center', 'maharatri'),
				'text-right' => esc_html__('Right', 'maharatri'),
			),
			'default'  => 'text-center',
			'required' => array(
				array('display_subheader','=', 1),
			),
		),
		array(
			'id'       => 'page_title_pattern',
			'type'     => 'select',
			'title'    => esc_html__('Page Title Pattern', 'maharatri'),
			'options'  => array(
				'pattern-linear' => esc_html__('Linear', 'maharatri'),
				'pattern-skewed' => esc_html__('Skewed', 'maharatri'),
				'pattern-chalk' => esc_html__('Chalk', 'maharatri'),
				'pattern-circular' => esc_html__('Circular', 'maharatri'),
			),
			'default'  => 'pattern-linear',
			'required' => array(
				array('display_subheader','=', 1),
			),
		),
		array(
			'id'       => 'subheader_height',
			'type'     => 'slider',
			'title'    => esc_html__( 'Subheader Height', 'maharatri' ),
			'desc'     => esc_html__( 'Set height for the subheader.', 'maharatri' ),
			'default'  => 130,
			'min'      => 50,
			'step'     => 1,
			'max'      => 600,
			'required' => array(
				array( 'display_subheader', '=', 1 ),
			),
		),
		array(
			'id'       => 'display_breadcrumb',
			'type'     => 'switch',
			'title'    => esc_html__( 'Display Breadcrumb ?', 'maharatri' ),
			'default'  => 1,
			'required' => array(
				array( 'display_subheader', '=', 1 ),
			),
		),
		array(
			'id'       => 'breadcrumb_position',
			'type'     => 'select',
			'title'    => esc_html__('Breadcrumbs Position', 'maharatri'),
			'options'  => array(
				'inline' => esc_html__('Inline', 'maharatri'),
				'before-title' => esc_html__('Before title', 'maharatri'),
				'after-title' => esc_html__('After title', 'maharatri'),
				'below-image' => esc_html__('Below Image', 'maharatri'),
			),
			'default'  => 'after-title',
			'required' => array(
				array('display_breadcrumb','=','1'),
			),
		),
		array(
			'id'               => 'page_title_banner_image',
			'type'             => 'background',
			'title'            => esc_html__( 'Background Image', 'maharatri' ),
			'desc'             => esc_html__( 'Set page background image.', 'maharatri' ),
			'background-color' => true,
			'preview_media'    => true,
			'default'          => array(
				'background-size'   => 'cover',
				'background-repeat' => 'no-repeat',
				'background-color'  => '#999',
			),
			'output'           => '.sigma-subheader',
			'required'         => array(
				array( 'display_subheader', '=', 1 ),
			),
		),
		array(
			'id'       => 'subheader_caption',
			'type'     => 'text',
			'subtitle' => esc_html__( 'Enter caption title.', 'maharatri' ),
			'title'    => esc_html__( 'Subheader Caption', 'maharatri' ),
		),
		array(
			'id'       => 'subheader_background_color',
			'type'     => 'color_rgba',
			'title'    => esc_html__( 'Background Opacity Color', 'maharatri' ),
			'mode'     => 'background-color',
			'output' => array('background-color' => '.sigma-subheader:after'),
			'required' => array(
				array( 'display_subheader', '=', 1 ),
			),
		),
		array(
        'id'       => 'subheader_padding',
        'type'     => 'spacing',
        'units'    => array('em','px'),
				'mode'     => 'padding',
				'left'     => false,
				'right'     => false,
        'title'    => esc_html__('Subheader Padding', 'maharatri'),
				'output'   => array('.sigma-subheader .container', '.has-header-absolute .sigma-subheader .container'),
    ),
	),
);
