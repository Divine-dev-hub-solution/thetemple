<?php
/**
 * service settings
 *
 * @package Sigma
 */
return array(
	'title'  => esc_html__( 'Service Settings', 'maharatri' ),
	'id'     => 'service_settings',
	'icon'   => 'el el-file-edit',
	'fields' => array(
		array(
			'id'       => 'service_sidebar',
			'type'     => 'image_select',
			'title'    => esc_html__( 'Service Sidebar', 'maharatri' ),
			'subtitle' => esc_html__( 'Select the service sidebar position.', 'maharatri' ),
			'options'  => array(
				'left-sidebar'  => array(
					'alt' => esc_html__( 'Left Sidebar', 'maharatri' ),
					'img' => get_parent_theme_file_uri( 'assets/images/theme-options/services-settings/left-sidebar.jpg' ),
				),
				'right-sidebar' => array(
					'alt' => esc_html__( 'Right Sidebar', 'maharatri' ),
					'img' => get_parent_theme_file_uri( 'assets/images/theme-options/services-settings/right-sidebar.jpg' ),
				),
			),
			'default'  => 'right-sidebar',
		),
		array(
			'id'       => 'service-style',
			'type'     => 'select',
			'title'    => esc_html__( 'Select Service Style', 'maharatri' ),
			'subtitle' => esc_html__( 'Please select the Service archive style to display.', 'maharatri' ),
			'options'  => array(
				'style-1' => esc_html__( 'Service Style 1', 'maharatri' ),
				'style-2' => esc_html__( 'Service Style 2', 'maharatri' ),
				'style-3' => esc_html__( 'Service Style 3', 'maharatri' ),
			),
			'default'  => 'style-1',
		),
		array(
			'id'       => 'service-columns',
			'type'     => 'select',
			'title'    => esc_html__( 'Number of Columns', 'maharatri' ),
			'subtitle' => esc_html__( 'Please select the number of columns in service archive.', 'maharatri' ),
			'options'  => array(
				'col-lg-12' => esc_html__( '1 Column', 'maharatri' ),
				'col-lg-6' => esc_html__( '2 Columns', 'maharatri' ),
				'col-lg-4' => esc_html__( '3 Columns', 'maharatri' ),
				'col-lg-3' => esc_html__( '4 Columns', 'maharatri' ),
			),
			'default'  => 'col-lg-4',
		),
		array(
			'id'       => 'show_service_share',
			'type'     => 'switch',
			'title'    => esc_html__( 'Show Service Share', 'maharatri' ),
			'subtitle' => esc_html__( 'Enable to show service share in details page', 'maharatri' ),
			'default'  => false,
		),
	),
);
