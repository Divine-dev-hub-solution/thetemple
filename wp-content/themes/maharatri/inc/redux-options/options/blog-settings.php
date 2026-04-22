<?php
/**
 * Blog Settings
 *
 * @package maharatri
 */
return array(
	'title'  => esc_html( 'Blog Settings', 'maharatri' ),
	'id'     => 'blog_settings',
	'icon'   => 'el el-blogger',
	'fields' => array(
		array(
			'id'       => 'blog-style',
			'type'     => 'select',
			'title'    => esc_html__( 'Select Blog Style', 'maharatri' ),
			'subtitle' => esc_html__( 'Please select the blog style to display.', 'maharatri' ),
			'options'  => array(
				'style-1' => esc_html__( 'Blog Style 1', 'maharatri' ),
				'style-2' => esc_html__( 'Blog Style 2', 'maharatri' ),
				'style-3' => esc_html__( 'Blog Style 3', 'maharatri' ),
				'style-4' => esc_html__( 'Blog Style 4', 'maharatri' ),
				'style-5' => esc_html__( 'Blog Style 5', 'maharatri' ),
			),
			'default'  => 'style-1',
		),
		array(
			'id'       => 'blog-columns',
			'type'     => 'select',
			'title'    => esc_html__( 'Number of Columns', 'maharatri' ),
			'subtitle' => esc_html__( 'Please select the number of columns in blog archive.', 'maharatri' ),
			'options'  => array(
				'col-lg-12' => esc_html__( '1 Column', 'maharatri' ),
				'col-lg-6' => esc_html__( '2 Columns', 'maharatri' ),
				'col-lg-4' => esc_html__( '3 Columns', 'maharatri' ),
				'col-lg-3' => esc_html__( '4 Columns', 'maharatri' ),
			),
			'default'  => 'col-lg-12',
		),
		array(
			'id'       => 'blog_sidebar',
			'type'     => 'image_select',
			'title'    => esc_html__( 'Blog Sidebar', 'maharatri' ),
			'subtitle' => esc_html__( 'Select the blog sidebar position.', 'maharatri' ),
			'options'  => array(
				'full-width'    => array(
					'alt' => esc_html__( 'Full Width', 'maharatri' ),
					'img' => get_parent_theme_file_uri( 'assets/images/theme-options/blog-settings/full-width.jpg' ),
				),
				'left-sidebar'  => array(
					'alt' => esc_html__( 'Left Sidebar', 'maharatri' ),
					'img' => get_parent_theme_file_uri( 'assets/images/theme-options/blog-settings/left-sidebar.jpg' ),
				),
				'right-sidebar' => array(
					'alt' => esc_html__( 'Right Sidebar', 'maharatri' ),
					'img' => get_parent_theme_file_uri( 'assets/images/theme-options/blog-settings/right-sidebar.jpg' ),
				),
			),
			'default'  => 'right-sidebar',
		),
		array(
			'id'       => 'post_single_show_author',
			'type'     => 'switch',
			'title'    => esc_html__( 'Show Post Author box in sidebar', 'maharatri' ),
			'default'  => false,
		),
		array(
			'id'       => 'post_show_related_posts',
			'type'     => 'switch',
			'title'    => esc_html__( 'Show Related Posts', 'maharatri' ),
			'default'  => false,
		),
		array(
			'id'       => 'show_post_share',
			'type'     => 'switch',
			'title'    => esc_html__( 'Show Post Share', 'maharatri' ),
			'default'  => false,
		),
		array(
			'id'       => 'facebook_share',
			'type'     => 'switch',
			'title'    => esc_html__( 'Facebook Share', 'maharatri' ),
			'subtitle' => esc_html__( 'You can share post on facebook.', 'maharatri' ),
			'default'  => false,
			'required' => array('show_post_share',  '=', '1'),
		),
		array(
			'id'       => 'twitter_share',
			'type'     => 'switch',
			'title'    => esc_html__( 'Twitter Share', 'maharatri' ),
			'subtitle' => esc_html__( 'You can share post on twitter', 'maharatri' ),
			'default'  => false,
			'required' => array('show_post_share',  '=', '1'),
		),
		array(
			'id'       => 'linkedin_share',
			'type'     => 'switch',
			'title'    => esc_html__( 'Linkedin Share', 'maharatri' ),
			'subtitle' => esc_html__( 'You can share post on linkedin', 'maharatri' ),
			'default'  => false,
			'required' => array('show_post_share',  '=', '1'),
		),
		array(
			'id'       => 'pinterest_share',
			'type'     => 'switch',
			'title'    => esc_html__( 'Pinterest Share', 'maharatri' ),
			'subtitle' => esc_html__( 'You can share post on pinterest', 'maharatri' ),
			'default'  => false,
			'required' => array('show_post_share',  '=', '1'),
		),
		array(
			'id'       => 'tumblr_share',
			'type'     => 'switch',
			'title'    => esc_html__( 'Tumblr Share', 'maharatri' ),
			'subtitle' => esc_html__( 'You can share post on Tumblr', 'maharatri' ),
			'default'  => false,
			'required' => array('show_post_share',  '=', '1'),
		),
		array(
			'id'       => 'skype_share',
			'type'     => 'switch',
			'title'    => esc_html__( 'Skype Share', 'maharatri' ),
			'subtitle' => esc_html__( 'You can share post on Skype', 'maharatri' ),
			'default'  => false,
			'required' => array('show_post_share',  '=', '1'),
		),
		array(
        'id' => 'gallery_attachments_count',
        'type' => 'text',
        'title' => esc_html__('Gallery post format images', 'maharatri'),
        'subtitle' => esc_html__('Enter no of gallery images attachments in post format gallery.', 'maharatri'),
        'default' => 4,
    ),
    array(
        'id' => 'audio-format-style',
        'type' => 'select',
        'title' => esc_html__('Select Audio Format Style', 'maharatri'),
        'subtitle' => esc_html__('Please select the audio format sytle for post.', 'maharatri'),
        'options' => array(
            'default' => esc_html__('Default', 'maharatri'),
            'full-screen' => esc_html__('Full Screen', 'maharatri'),
        ),
        'default' => 'default',
    ),
	),
);
