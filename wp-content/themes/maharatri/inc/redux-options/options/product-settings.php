<?php
/**
 * Product Settings
 *
 * @package Maharatri
 */
return array(
	'title'            => esc_html__( 'Product', 'maharatri' ),
	'id'               => 'product_settings',
	'customizer_width' => '400px',
  'subsection'       => true,
	'fields'           => array(
		array(
			'id'       => 'product_style',
			'type'     => 'select',
			'title'    => esc_html__('Product card style', 'maharatri'),
			'options'  => array(
				'style-1' => esc_html__('Style 1', 'maharatri'),
				'style-2' => esc_html__('Style 2', 'maharatri'),
			),
			'default'  => 'sigma_product-default',
		),
		array(
			'id'       => 'show_featured_badge',
			'type'     => 'switch',
			'title'    => esc_html__( 'Show featured badge?', 'maharatri' ),
			'subtitle' => esc_html__( 'Check if you want to show the featured product badge (Only if set)', 'maharatri' ),
			'default'  => true
		),
		array(
			'id'       => 'show_sale_badge',
			'type'     => 'switch',
			'title'    => esc_html__( 'Show sale badge?', 'maharatri' ),
			'subtitle' => esc_html__( 'Check if you want to show the sale product badge', 'maharatri' ),
			'default'  => true
		),
		array(
			'id'       => 'product_show_excerpt',
			'type'     => 'switch',
			'title'    => esc_html__( 'Show Excerpt?', 'maharatri' ),
			'subtitle' => esc_html__( 'Check if you want to show the recipe excerpt', 'maharatri' ),
			'default'  => true
		),
		array(
			'id'       => 'product_excerpt_length',
			'type'     => 'text',
			'title'    => esc_html__( 'Excerpt Length', 'maharatri' ),
			'subtitle' => esc_html__( 'Number of words to display in the text', 'maharatri' ),
			'default'  => 10,
			'required' => array('product_show_excerpt','=','1'),
		),
		array(
			'id'       => 'add_to_cart_snackbar',
			'type'     => 'switch',
			'title'    => esc_html__( 'Show Notification On added to cart', 'maharatri' ),
			'subtitle' => esc_html__( 'Check if you want to show a notification popup when a user adds an item to the cart.', 'maharatri' ),
			'default'  => false
		),
		array(
			'id'       => 'show_woo_compare_btn',
			'type'     => 'switch',
			'title'    => esc_html__( 'Show Woo Product Compare Button?', 'maharatri' ),
			'default'  => true
		),
		array(
			'id'       => 'compare_page',
			'type'     => 'select',
			'title'    => esc_html__('Select Compare Page', 'maharatri'),
			'subtitle' => esc_html__('Select a page for compare table. It should contain the shortcode shortcode: [sigma_base_compare]', 'maharatri'),
			'data'     => 'pages',
			'required' => array('show_woo_compare_btn','=','true'),
		),
		array(
			'id'       => 'compare_fields',
			'type'     => 'select',
			'multi'    => true,
			'title'    => esc_html__('Select Compare Fields', 'maharatri'),
			'subtitle' => esc_html__('Select fields should be presented on the product compare page with table.', 'maharatri'),
			'options'  => array(
				'description' => esc_html__('Description', 'maharatri'),
				'sku' => esc_html__('SKU', 'maharatri'),
				'availability' => esc_html__('Availability', 'maharatri'),
				'dimensions' => esc_html__('Dimension', 'maharatri'),
				'weight' => esc_html__('Weight', 'maharatri'),
			),
			'required' => array('show_woo_compare_btn','=','true'),
		),
		array(
			'id'       => 'compare_snackbar',
			'type'     => 'switch',
			'title'    => esc_html__( 'Show Notification On added to compare', 'maharatri' ),
			'subtitle' => esc_html__( 'Check if you want to show a notification popup when a user adds an item to the compare.', 'maharatri' ),
			'default'  => false,
			'required' => array('show_woo_compare_btn','=','true'),
		),
	),
);
