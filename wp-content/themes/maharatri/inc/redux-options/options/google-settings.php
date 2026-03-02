<?php
/**
 * 404 Settings
 *
 * @package Maharatri
 */
return array(
	'title'            => esc_html__( 'Google Settings', 'maharatri' ),
	'id'               => 'google_options',
	'customizer_width' => '400px',
	'icon'             => 'el el-graph',
	'fields'           => array(
		array(
			'id'      => 'youtube_api',
			'type'    => 'textarea',
			'title'   => esc_html__( 'Youtube API', 'maharatri' ),
			'subtitle'    => esc_html__( 'Enter your Youtube API Code here', 'maharatri' ),
		),
		array(
			'id'      => 'google_analytics',
			'type'    => 'textarea',
			'title'   => esc_html__( 'Google Analytics', 'maharatri' ),
			'subtitle'    => esc_html__( 'Enter your Google Analytics tracking code here', 'maharatri' ),
		),
    array(
			'id'      => 'google_tag_manager',
			'type'    => 'textarea',
			'title'   => esc_html__( 'Google Tag Manager', 'maharatri' ),
			'subtitle'    => esc_html__( 'Enter your Google Tag Manager tracking code here', 'maharatri' ),
		),
    array(
			'id'      => 'google_web_master',
			'type'    => 'textarea',
			'title'   => esc_html__( 'Google Web Master Tools', 'maharatri' ),
			'subtitle'    => esc_html__( 'Enter your Google Web Master Tools <meta> tag here', 'maharatri' ),
		),
	),
);
