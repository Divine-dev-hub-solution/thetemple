<?php
/**
 * Button Settings
 *
 * @package Maharatri
 */
return array(
	'title'  => esc_html__( 'Button Settings', 'maharatri' ),
	'id'     => 'button_settings',
	'icon'   => 'el el-credit-card',
	'fields' => array(
		array(
			'id'       => 'button-style',
			'type'     => 'select',
			'title'    => esc_html__( 'Select Button Style', 'maharatri' ),
			'subtitle' => esc_html__( 'Please select the button style.', 'maharatri' ),
			'options'  => array(
				'style-1' => esc_html__( 'Button Style 1', 'maharatri' ),
				'style-2' => esc_html__( 'Button Style 2', 'maharatri' ),
				'style-3' => esc_html__( 'Button Style 3', 'maharatri' ),
				'style-4' => esc_html__( 'Button Style 4', 'maharatri' ),
			),
			'default'  => 'style-1',
		),
	),
);
