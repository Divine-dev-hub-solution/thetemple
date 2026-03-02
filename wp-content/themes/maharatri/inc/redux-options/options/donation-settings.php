<?php
/**
 * Donation settings
 *
 * @package Sigma
 */
return array(
	'title'  => esc_html__( 'Donation Settings', 'maharatri' ),
	'id'     => 'donation_settings',
	'icon'   => 'el el-graph',
	'fields' => array(
		array(
			'id'       => 'donation_sidebar',
			'type'     => 'select',
			'title'    => esc_html__( 'Donation Sidebar', 'maharatri' ),
			'subtitle' => esc_html__( 'Select the Donation sidebar position.', 'maharatri' ),
			'options'  => array(
				'left-sidebar' => esc_html__( 'Left Sidebar', 'maharatri' ),
				'right-sidebar' => esc_html__( 'Right Sidebar', 'maharatri' ),
			),
			'default'  => 'right-sidebar',
		),
		array(
			'id'       => 'donation-style',
			'type'     => 'select',
			'title'    => esc_html__( 'Select Donation Style', 'maharatri' ),
			'subtitle' => esc_html__( 'Please select the Donation archive style to display.', 'maharatri' ),
			'options'  => array(
				'style-1' => esc_html__( 'Style 1', 'maharatri' ),
				'style-2' => esc_html__( 'Style 2', 'maharatri' ),
				'style-3' => esc_html__( 'Style 3', 'maharatri' ),
				'style-4' => esc_html__( 'Style 4', 'maharatri' ),
				'style-5' => esc_html__( 'Style 5', 'maharatri' ),
				'style-6' => esc_html__( 'Style 6', 'maharatri' ),

			),
			'default'  => 'style-1',
		),
		array(
			'id'       => 'donation-columns',
			'type'     => 'select',
			'title'    => esc_html__( 'Number of Columns', 'maharatri' ),
			'subtitle' => esc_html__( 'Please select the number of columns in donation archive.', 'maharatri' ),
			'options'  => array(
				'col-lg-12' => esc_html__( '1 Column', 'maharatri' ),
				'col-lg-6' => esc_html__( '2 Columns', 'maharatri' ),
				'col-lg-4' => esc_html__( '3 Columns', 'maharatri' ),
				'col-lg-3' => esc_html__( '4 Columns', 'maharatri' ),
			),
			'default'  => 'col-lg-12',
		),
		array(
			'id'       => 'show_donation_excerpt',
			'type'     => 'switch',
			'title'    => esc_html__( 'Show Excerpt', 'maharatri' ),
			'default'  => false,
			'required' => array('donation-style',  '=', 'style-5'),
		),
		array(
			'id'       => 'show_donation_subtitle',
			'type'     => 'switch',
			'title'    => esc_html__( 'Show Subtitle', 'maharatri' ),
			'default'  => false,
			'required' => array('donation-style',  '=', 'style-5'),
		),
		array(
        'id' => 'donation_subtitle',
        'type' => 'text',
        'title' => esc_html__('Donation Subtitle', 'maharatri'),
				'required' => array('show_donation_subtitle',  '=', 'true'),
    ),
	),
);
