<?php
/**
 * Color Scheme
 *
 * @package Maharatri
 */
return array(
	'title'  => esc_html__( 'Color Scheme', 'maharatri' ),
	'id'     => 'color_scheme_settings',
	'desc'   => esc_html__( 'In color schemes, you can change the site default color and set as per your site design.', 'maharatri' ),
	'icon'   => 'el el-brush',
	'fields' => array(
		array(
			'id'          => 'primary_color',
			'type'        => 'color',
			'title'       => esc_html__( 'Primary Color', 'maharatri' ),
			'subtitle'    => esc_html__( 'Set primary color for the website.', 'maharatri' ),
			'transparent' => false,
			'default'     => '#7E4555',
		),
		array(
			'id'          => 'secondary_color',
			'type'        => 'color',
			'title'       => esc_html__( 'Secondary Color', 'maharatri' ),
			'subtitle'    => esc_html__( 'Set secondary color for the website.', 'maharatri' ),
			'transparent' => false,
			'default'     => '#db4242',
		),
		array(
			'id'          => 'tertiary_color',
			'type'        => 'color',
			'title'       => esc_html__( 'Tertiary Color', 'maharatri' ),
			'subtitle'    => esc_html__( 'Set tertiary color for the website.', 'maharatri' ),
			'transparent' => false,
			'default'     => '#F7F7F7',
		),
	),
);
