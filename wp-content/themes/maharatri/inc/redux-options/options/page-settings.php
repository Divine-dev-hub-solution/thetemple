<?php
/**
 * Page Settings
 *
 * @package Maharatri
 */
return array(
	'title'  => esc_html__( 'Page Settings', 'maharatri' ),
	'id'     => 'page_settings',
	'icon'   => 'el el-file-edit',
	'fields' => array(
		array(
			'id'       => 'page_sidebar',
			'type'     => 'image_select',
			'title'    => esc_html__( 'Page Sidebar', 'maharatri' ),
			'subtitle' => esc_html__( 'Select the page sidebar position.', 'maharatri' ),
			'options'  => array(
				'full-width'    => array(
					'alt' => esc_html__( 'Full Width', 'maharatri' ),
					'img' => get_parent_theme_file_uri( 'assets/images/theme-options/page-settings/full-width.jpg' ),
				),
				'left-sidebar'  => array(
					'alt' => esc_html__( 'Left Sidebar', 'maharatri' ),
					'img' => get_parent_theme_file_uri( 'assets/images/theme-options/page-settings/left-sidebar.jpg' ),
				),
				'right-sidebar' => array(
					'alt' => esc_html__( 'Right Sidebar', 'maharatri' ),
					'img' => get_parent_theme_file_uri( 'assets/images/theme-options/page-settings/right-sidebar.jpg' ),
				),
			),
			'default'  => 'right-sidebar',
		),
		array(
			'id'       => 'page_layout',
			'type'     => 'select',
			'title'    => esc_html__( 'Select Page Layout', 'maharatri' ),
			'subtitle' => esc_html__( 'Please select the page layout.', 'maharatri' ),
			'options'  => array(
				'container' => esc_html__( 'Boxed', 'maharatri' ),
				'container-fluid' => esc_html__( 'Full Width', 'maharatri' ),
			),
			'default'  => 'container',
		),
	),
);
