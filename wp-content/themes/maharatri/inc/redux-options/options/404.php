<?php
/**
 * 404 Settings
 *
 * @package Maharatri
 */
return array(
	'title'            => esc_html__( '404 Page', 'maharatri' ),
	'id'               => '404_page',
	'customizer_width' => '400px',
	'icon'             => 'el el-warning-sign',
	'fields'           => array(
		array(
			'id'      => 'fof_page_title',
			'type'    => 'text',
			'title'   => esc_html__( 'Page Title', 'maharatri' ),
			'desc'    => esc_html__( 'Enter 404 page title.', 'maharatri' ),
			'default' => esc_html__( '404', 'maharatri' ),
		),
		array(
			'id'       => 'fof_page_description',
			'type'     => 'textarea',
			'title'    => esc_html__( 'Page Description', 'maharatri' ),
			'desc'     => esc_html__( 'Enter 404 page description.', 'maharatri' ),
			'validate' => 'html_custom',
			'default'  => 'It looks like nothing was found at this location you can visit slidesigma website if you have some time on your shoulders',
		),
		array(
			'id'            => 'fof_page_background',
			'type'          => 'background',
			'title'         => esc_html__( '404 Background', 'maharatri' ),
			'desc'          => esc_html__( 'Set 404 background.', 'maharatri' ),
			'preview_media' => true,
			'output'        => '.fof-page-container',
		),
		array(
			'id'      => 'fof_page_back_to_home',
			'type'    => 'switch',
			'title'   => esc_html__( 'Back to Home', 'maharatri' ),
			'default' => true,
		),
	),
);
