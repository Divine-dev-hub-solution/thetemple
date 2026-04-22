<?php
/**
 * Header Logo Settings
 *
 * @package Maharatri
 */
return array(
	'title'  => esc_html__( 'Header Top Settings', 'maharatri' ),
	'id'     => 'header_top_settings',
	'subtitle'  => '',
  'subsection'  =>  true,
	'fields' => array(
		array(
    'id'     => 'top-header-end',
		'title'   => 'Header Top Settings only will work for Header style 1, 2 and 5',
    'type'   => 'section',
    'indent' => false,		),
    array(
			'id'       => 'display_top_header',
			'type'     => 'switch',
			'title'    => esc_html__( 'Display Top Header', 'maharatri' ),
      'subtitle' => esc_html__( 'Please choose if you want to display the top header or not.', 'maharatri' ),
			'default'  => false,
		),
    array(
			'id'       => 'display_top_sm',
			'type'     => 'switch',
			'title'    => esc_html__( 'Display Top Header Social Media', 'maharatri' ),
      'subtitle' => esc_html__( 'Please choose if you want to display the top header social media links or not.', 'maharatri' ),
			'default'  => false,
      'required' => array('display_top_header',  '=', 'true'),
		),
    array(
			'id'       => 'header_button_title',
			'type'     => 'text',
			'title'    => esc_html__( 'Button Title', 'maharatri' ),
			'subtitle' => esc_html__( 'Enter button title.', 'maharatri' ),
      'required' => array(
				array('display_top_header',  '=', 'true'),
				array('header-layout',  '=', array('layout-1', 'layout-2')),
			),
		),
		array(
			'id'       => 'header_button_liink',
			'type'     => 'text',
			'title'    => esc_html__( 'Button link', 'maharatri' ),
			'subtitle' => esc_html__( 'Enter button link.', 'maharatri' ),
			'required' => array(
				array('display_top_header',  '=', 'true'),
				array('header-layout',  '=', array('layout-1', 'layout-2')),
			),
		),
		array(
			'id'          => 'header_top_bg',
			'type'        => 'color',
			'title'       => esc_html__( 'Header top background color', 'maharatri' ),
			'subtitle'    => esc_html__( 'Set background color for the top header.', 'maharatri' ),
		),
		array(
			'id'          => 'header_top_color',
			'type'        => 'color',
			'title'       => esc_html__( 'Header top color', 'maharatri' ),
			'subtitle'    => esc_html__( 'Set color for the top header.', 'maharatri' ),
			'output'			=> array('.site-header .site-header-top .social-info li a', '.site-header .site-header-top-inner > a')
		),
		array(
			'id'          => 'header_top_color_hover',
			'type'        => 'color',
			'title'       => esc_html__( 'Header top color on hover', 'maharatri' ),
			'subtitle'    => esc_html__( 'Set color on hover for the top header.', 'maharatri' ),
			'output'			=> array('.site-header .site-header-top .social-info li a:hover', '.site-header .site-header-top-inner > a:hover')
		),
	),
);
