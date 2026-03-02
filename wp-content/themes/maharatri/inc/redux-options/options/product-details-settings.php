<?php
/**
 * Product Details Settings
 *
 * @package Maharatri
 */
return array(
	'title'            => esc_html__( 'Product Details', 'maharatri' ),
	'id'               => 'product_details_settings',
	'customizer_width' => '400px',
  'subsection'       => true,
	'fields'           => array(
    array(
      'id'       => 'select_first_variation',
      'type'     => 'switch',
      'title'    => esc_html__( 'Select First Variation by default', 'maharatri' ),
      'subtitle' => esc_html__( 'Check if you want to select the first variation in variable products by default (This overrites the WooCoomerce option on a product level)', 'maharatri' ),
      'default'  => false
    ),
		array(
			'id'       => 'display_product_share',
			'type'     => 'switch',
			'title'    => esc_html__( 'Display Product Social Share', 'maharatri' ),
			'subtitle' => esc_html__( 'Please choose if you want to display the social share for products', 'maharatri' ),
			'default'  => false
		),
		array(
			'id'       => 'display_payment_method',
			'type'     => 'switch',
			'title'    => esc_html__( 'Display Payment Method', 'maharatri' ),
			'subtitle' => esc_html__( 'Please choose if you want to display payment method details under product share', 'maharatri' ),
			'default'  => false
		),
		array(
			'id'       => 'payment_method_title',
			'type'     => 'text',
			'title'    => esc_html__( 'Payment Method Title', 'maharatri' ),
			'subtitle' => esc_html__( 'Enter the title to show under product share.', 'maharatri' ),
			'required'    => array( 'display_payment_method', '=', 'true' )
		),
		array(
			'id'       => 'payment_method_img',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Payment method Image', 'maharatri' ),
			'required'    => array( 'display_payment_method', '=', 'true' ),
			'compiler' => 'true',
		),
	),
);
