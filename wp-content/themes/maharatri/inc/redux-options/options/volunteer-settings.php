<?php
/**
 * Volunteer Settings
 *
 * @package Maharatri
 */
return array(
	'title'  => esc_html__( 'Volunteer Settings', 'maharatri' ),
	'id'     => 'volunteer_settings',
	'icon'   => 'el el-group',
	'fields' => array(
    array(
			'id'       => 'volunteer-style',
			'type'     => 'select',
			'title'    => esc_html__( 'Select Volunteer Style', 'maharatri' ),
			'subtitle' => esc_html__( 'Please select the volunteer archive style to display.', 'maharatri' ),
			'options'  => array(
				'style-1' => esc_html__( 'Volunteer Style 1', 'maharatri' ),
				'style-2' => esc_html__( 'Volunteer Style 2', 'maharatri' ),
			),
			'default'  => 'style-2',
		),
		array(
			'id'       => 'volunteer-columns',
			'type'     => 'select',
			'title'    => esc_html__( 'Number of Columns', 'maharatri' ),
			'subtitle' => esc_html__( 'Please select the number of columns in volunteer archive.', 'maharatri' ),
			'options'  => array(
				'col-lg-12' => esc_html__( '1 Column', 'maharatri' ),
				'col-lg-6' => esc_html__( '2 Columns', 'maharatri' ),
				'col-lg-4' => esc_html__( '3 Columns', 'maharatri' ),
				'col-lg-3' => esc_html__( '4 Columns', 'maharatri' ),
			),
			'default'  => 'col-lg-6',
		),
	),
);
