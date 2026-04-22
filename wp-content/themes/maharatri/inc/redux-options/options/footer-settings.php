<?php
/**
 * Footer Settings
 *
 * @package Maharatri
 */
return array(
	'title'  => esc_html( 'Footer Settings', 'maharatri' ),
	'id'     => 'footer_settings',
	'icon'   => 'el el-align-center',
	'fields' => array(
		array(
			'id'       => 'footer-layout',
			'type'     => 'select',
			'title'    => esc_html__( 'Select Footer Layout', 'maharatri' ),
			'subtitle' => esc_html__( 'Please select the footer style to display.', 'maharatri' ),
			'options'  => array(
				'layout-1' => esc_html__( 'Footer Layout 1', 'maharatri' ),
				'layout-2' => esc_html__( 'Footer Layout 2', 'maharatri' ),
				'layout-3' => esc_html__( 'Footer Layout 3', 'maharatri' ),
			),
			'default'  => 'layout-1',
		),
		array(
			'id'       => 'footer-skin',
			'type'     => 'select',
			'title'    => esc_html__( 'Select Footer Color Scheme', 'maharatri' ),
			'subtitle' => esc_html__( 'Please select the footer color scheme to display.', 'maharatri' ),
			'options'  => array(
				'footer-light' => esc_html__( 'Light Scheme', 'maharatri' ),
				'footer-dark' => esc_html__( 'Dark Scheme', 'maharatri' ),
			),
			'default'  => 'footer-dark',
		),
		array(
			'id'       => 'display-footer-topbar',
			'type'     => 'switch',
			'title'    => esc_html__( 'Display Footer Topbar', 'maharatri' ),
			'default'  => true,
			'required' => array( 'footer-layout', '=', array('layout-1', 'layout-2')),
		),

		array(
			'id'       => 'footer-logo',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Footer Logo', 'maharatri' ),
			'required' => array( 'display-footer-topbar', '=', 'true' ),
			'compiler' => 'true',
			'default'  => array( 'url' => get_parent_theme_file_uri( 'assets/images/logo-white.png' ) ),
			'subtitle' => esc_html__( 'Upload image for logo.', 'maharatri' ),
		),
		array(
			'id'       => 'display-footer-social-links',
			'type'     => 'switch',
			'title'    => esc_html__( 'Display Footer Social Links', 'maharatri' ),
			'subtitle' => esc_html__( 'Enable to display the social links in footer topbar.', 'maharatri' ),
			'default'  => true,
			'required' => array( 'display-footer-topbar', '=', 'true' ),
		),
		array(
			'id'       => 'footer_layout',
			'type'     => 'image_select',
			'title'    => esc_html__( 'Footer Column layout', 'maharatri' ),
			'subtitle' => esc_html__( 'Please select the footer layout.', 'maharatri' ),
			'options'  => array(
				'6-6'     => array(
					'img' => get_parent_theme_file_uri( 'assets/images/theme-options/footer-settings/footer-6-6.jpg' ),
					'alt' => esc_html__( 'Footer column 6 - 6', 'maharatri' ),
				),
				'8-4'     => array(
					'img' => get_parent_theme_file_uri( 'assets/images/theme-options/footer-settings/footer-8-4.jpg' ),
					'alt' => esc_html__( 'Footer column 8 - 4', 'maharatri' ),
				),
				'4-8'     => array(
					'img' => get_parent_theme_file_uri( 'assets/images/theme-options/footer-settings/footer-4-8.jpg' ),
					'alt' => esc_html__( 'Footer column 4 - 8', 'maharatri' ),
				),
				'4-4-4'   => array(
					'img' => get_parent_theme_file_uri( 'assets/images/theme-options/footer-settings/footer-4-4-4.jpg' ),
					'alt' => esc_html__( 'Footer column 4 - 4 - 4', 'maharatri' ),
				),
				'3-3-3-3' => array(
					'img' => get_parent_theme_file_uri( 'assets/images/theme-options/footer-settings/footer-3-3-3-3.jpg' ),
					'alt' => esc_html__( 'Footer column 3 - 3 - 3 - 3', 'maharatri' ),
				),
				'6-3-3'   => array(
					'img' => get_parent_theme_file_uri( 'assets/images/theme-options/footer-settings/footer-6-3-3.jpg' ),
					'alt' => esc_html__( 'Footer column 6 - 3 - 3', 'maharatri' ),
				),
				'3-3-6'   => array(
					'img' => get_parent_theme_file_uri( 'assets/images/theme-options/footer-settings/footer-3-3-6.jpg' ),
					'alt' => esc_html__( 'Footer column 3 - 3 - 6', 'maharatri' ),
				),
				'8-2-2'   => array(
					'img' => get_parent_theme_file_uri( 'assets/images/theme-options/footer-settings/footer-8-2-2.jpg' ),
					'alt' => esc_html__( 'Footer column 8 - 2 - 2', 'maharatri' ),
				),
				'2-2-8'   => array(
					'img' => get_parent_theme_file_uri( 'assets/images/theme-options/footer-settings/footer-2-2-8.jpg' ),
					'alt' => esc_html__( 'Footer column 2 - 2 - 8', 'maharatri' ),
				),
				'6-2-2-2' => array(
					'img' => get_parent_theme_file_uri( 'assets/images/theme-options/footer-settings/footer-6-2-2-2.jpg' ),
					'alt' => esc_html__( 'Footer column 6 - 2 - 2 - 2', 'maharatri' ),
				),
				'2-2-2-6' => array(
					'img' => get_parent_theme_file_uri( 'assets/images/theme-options/footer-settings/footer-2-2-2-6.jpg' ),
					'alt' => esc_html__( 'Footer column 2 - 2 - 2 - 6', 'maharatri' ),
				),
				'2-2-4-4' => array(
					'img' => get_parent_theme_file_uri( 'assets/images/theme-options/footer-settings/footer-2-2-4-4.jpg' ),
					'alt' => esc_html__( 'Footer column 2 - 2 - 4 - 4', 'maharatri' ),
				),
				'4-2-2-4' => array(
					'img' => get_parent_theme_file_uri( 'assets/images/theme-options/footer-settings/footer-4-2-2-4.jpg' ),
					'alt' => esc_html__( 'Footer column 4 - 2 - 2 - 4', 'maharatri' ),
				),
			),
			'default'  => '3-3-3-3',
		),
		array(
			'id'            => 'footer_background',
			'type'          => 'background',
			'title'         => esc_html__( 'Footer Background (The Whole Footer)', 'maharatri' ),
			'desc'          => esc_html__( 'Set footer background.', 'maharatri' ),
			'preview_media' => true,
			'output'        => '#colophon.site-footer',
		),
		array(
			'id'          => 'footer_top_bg',
			'type'        => 'color',
			'title'       => esc_html__( 'Footer top background color (This overlaps the Footer Background option)', 'maharatri' ),
			'subtitle'    => esc_html__( 'Set background color for the footer top.', 'maharatri' ),
		),
		array(
			'id'          => 'footer_middle_bg',
			'type'        => 'color',
			'title'       => esc_html__( 'Footer middle background color (This overlaps the Footer Background option)', 'maharatri' ),
			'subtitle'    => esc_html__( 'Set background color for the footer middle.', 'maharatri' ),
		),
		array(
			'id'          => 'footer_bottom_bg',
			'type'        => 'color',
			'title'       => esc_html__( 'Footer bottom background color (This overlaps the Footer Background option)', 'maharatri' ),
			'subtitle'    => esc_html__( 'Set background color for the footer bottom.', 'maharatri' ),
		),
		array(
			'id'       => 'footer_newsletter_text',
			'type'     => 'text',
			'title'    => esc_html__( 'Newsletter Text', 'maharatri' ),
			'required' => array( 'footer-layout', '=', 'layout-2' ),
		),
		array(
			'id'       => 'footer_newsletter_shortcode',
			'type'     => 'text',
			'title'    => esc_html__( 'Newsletter Shortcode', 'maharatri' ),
			'placeholder'    => esc_html__( 'Example: [mc4wp_form id="47"]', 'maharatri' ),
			'subtitle'    => esc_html__( 'Enter your newsletter shortcode, we recommend using MC4WP', 'maharatri' ),
			'required' => array( 'footer-layout', '=', 'layout-2' ),
		),
		array(
			'id'       => 'display-footer-logo',
			'type'     => 'switch',
			'title'    => esc_html__( 'Display Footer Logo', 'maharatri' ),
			'default'  => true,
			'required' => array( 'footer-layout', '=', 'layout-3' ),
		),
		array(
			'id'       => 'footer-bottom-logo',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Footer Logo', 'maharatri' ),
			'required' => array('display-footer-logo', '=', 'true'),
			'compiler' => 'true',
			'default'  => array( 'url' => get_parent_theme_file_uri( 'assets/images/logo-white.png' ) ),
			'subtitle' => esc_html__( 'Upload image for logo.', 'maharatri' ),
		),
		array(
			'id'       => 'display-footer-bottom-social-links',
			'type'     => 'switch',
			'title'    => esc_html__( 'Display Footer Social Links', 'maharatri' ),
			'subtitle' => esc_html__( 'Enable to display the social links in footer topbar.', 'maharatri' ),
			'default'  => true,
			'required' => array( 'footer-layout', '=', 'layout-3' ),
		),

		array(
			'id'       => 'copyright_text_left',
			'type'     => 'editor',
			'title'    => esc_html__( 'Copyright Text Left', 'maharatri' ),
			'subtitle' => esc_html__( 'Enter the copyright right content', 'maharatri' ),
			'default'  => 'Copyright @ by <a href="#">Maharatri</a>',
		),
		array(
			'id'       => 'copyright_text_right',
			'type'     => 'editor',
			'title'    => esc_html__( 'Copyright Text Right', 'maharatri' ),
			'subtitle' => esc_html__( 'Enter the copyright right content', 'maharatri' ),
			'default'  => 'Design by <a href="#">Maharatri</a> 2022',
			'required' => array( 'footer-layout', '=', 'layout-1' ),
		),
		array(
			'id'          => 'footer_overlay_color',
			'type'        => 'color_rgba',
			'title'       => esc_html__( 'Footer Background Overlay', 'maharatri' ),
			'subtitle'    => esc_html__( 'Set background overlay color for the footer.', 'maharatri' ),
		),
	),
);
