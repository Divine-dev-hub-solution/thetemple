<?php
/**
 * WooCommerce Settings
 *
 * @package Maharatri
 */
return array(
	'title'            => esc_html__( 'WooCommerce settings', 'maharatri' ),
	'id'               => 'woocommerce_settings',
	'customizer_width' => '400px',
	'icon'             => 'el el-shopping-cart',
	'fields'           => array(
    array(
			'id'       => 'shop_layout',
			'type'     => 'select',
			'title'    => esc_html__('Shop Layout', 'maharatri'),
			'options'  => array(
				'container' => esc_html__('Boxed', 'maharatri'),
				'container-fluid' => esc_html__('Full Width', 'maharatri'),
			),
			'default'  => 'container',
		),
	),
);
