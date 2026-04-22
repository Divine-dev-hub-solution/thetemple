<?php
/**
 * Theme Layout
 *
 * @package Maharatri
 */
return array(
  'title' => esc_html__( 'Theme Layout', 'maharatri' ),
  'desc'  =>  esc_html__('This section control the theme\'s layout', 'maharatri'),
  'id'  => 'theme-layout-options' ,
  'customizer_width' => '400px' ,
  'icon'  =>  'el el-screen',
  'fields'  =>  array(
    array(
      'id'       => 'content_size',
      'type'     => 'select',
      'title'    => esc_html__('Content Size', 'maharatri'),
      'subtitle'     => esc_html__('Please choose the desired default size for the content.', 'maharatri'),
      'options'  => array(
        '1140' => '1140px',
        '960' => '960px',
        'custom'  =>  esc_html__('Custom Size', 'maharatri')
      ),
    ),
    array(
      'id'       => 'content_size_custom',
      'type'     => 'slider',
      'title'    => esc_html__('Custom Content Size', 'maharatri'),
      'subtitle' => esc_html__('Select your desired content size', 'maharatri'),
      'min'      => 960,
      'step'     => 1,
      'max'      => 1900,
      'resolution' => 1,
      'display_value' => 'text',
      'required'  =>  array( 'content_size', 'equals', 'custom' ),
    ),
     array(
       'id'       => 'body_bg',
       'type'     => 'background',
       'title'    => esc_html__('Website body Background color / Image', 'maharatri'),
       'compiler' => 'true',
       'background-color' => true,
       'background-attachment' => true,
       'output'  =>  'body',
     ),
     array(
       'id'       => 'mobile_view',
       'type'     => 'select',
       'title'    => esc_html__('Mobile View', 'maharatri'),
       'subtitle'     => esc_html__('Enabling App view will redirect your users to a custom home page if they were on mobile.', 'maharatri'),
       'options'  => array(
         'app_view' => esc_html__('App View', 'maharatri'),
         'responsive_view' => esc_html__('Responsive View', 'maharatri'),
         ),
        'default'  => 'responsive_view',
     ),
     array(
      'id'       => 'app_view_home',
      'type'     => 'select',
      'multi'    => false,
      'data'     => 'pages',
      'title'    => esc_html__( 'Your App view Home page', 'maharatri' ),
      'subtitle' => esc_html__( 'Enter the URL for the App view Home page', 'maharatri' ),
      'required' => array('mobile_view','equals', array('app_view'))
    ),
    array(
			'id'       => 'back_to_top',
			'type'     => 'switch',
			'title'    => esc_html__( 'Enable Back to Top', 'maharatri' ),
			'default'  => 1,
		),
    array(
			'id'       => 'enable_preloader',
			'type'     => 'switch',
			'title'    => esc_html__( 'Enable Preloader', 'maharatri' ),
			'default'  => 1,
		),
    array(
      'id'       => 'preloader_style',
      'type'     => 'select',
      'title'    => esc_html__( 'Select Preloader Style', 'maharatri' ),
      'subtitle' => esc_html__( 'Please select the preloader style to display.', 'maharatri' ),
      'options'  => array(
        'style-1' => esc_html__( 'Preloader Style 1', 'maharatri' ),
        'style-2' => esc_html__( 'Preloader Style 2', 'maharatri' ),
        'style-3' => esc_html__( 'Preloader Style 3', 'maharatri' ),
        'style-4' => esc_html__( 'Preloader Style 4', 'maharatri' ),
        'style-5' => esc_html__( 'Preloader Style 5', 'maharatri' ),
        'style-6' => esc_html__( 'Preloader Style 6', 'maharatri' ),
        'style-7' => esc_html__( 'Preloader Style 7', 'maharatri' ),
      ),
      'default'  => 'style-1',
      'required' => array('enable_preloader',  '=', '1'),
    ),
    array(
      'id'       => 'show_theme_cat_icon',
      'type'     => 'switch',
      'title'    => esc_html__( 'Enable to show icon in menus, heading and tags', 'maharatri' ),
      'default'  => 1,
    ),
    array(
			'id'       => 'enable_retina',
			'type'     => 'switch',
			'title'    => esc_html__( 'Enable Retina Display', 'maharatri' ),
			'default'  => 1,
		),
    array(
			'id'       => 'retina_ready',
			'type'     => 'text',
			'title'    => esc_html__( 'Retina Multiplier', 'maharatri' ),
      'subtitle' => esc_html__( 'Set the Retina Multiplier value. Example: 2. This will multiply the default image size by 2. If the image size was 700x700, and you set the multipler to 2, it will become 1400x1400. This will result in crispier images', 'maharatri' ),
			'required' => array( 'enable_retina', '=', '1' ),
      'placeholder' =>  esc_html__('Example 1,2 or 3', 'maharatri'),
      'validate' => array( 'numeric', 'not_empty' ),
      'default' =>  1,
		),
  ),
);
