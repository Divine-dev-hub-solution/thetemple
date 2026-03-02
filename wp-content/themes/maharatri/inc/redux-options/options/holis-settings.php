<?php
/**
 * Holis settings
 *
 * @package Sigma
 */
return array(
    'title'  => esc_html__( 'Holis Settings', 'maharatri' ),
    'id'     => 'holis_settings',
    'icon'   => 'far fa-file-invoice',
    'fields' => array(
        array(
            'id'       => 'holis_sidebar',
            'type'     => 'image_select',
            'title'    => esc_html__( 'Holis Sidebar', 'maharatri' ),
            'subtitle' => esc_html__( 'Select the holis sidebar position.', 'maharatri' ),
            'options'  => array(
                'left-sidebar'  => array(
                    'alt' => esc_html__( 'Left Sidebar', 'maharatri' ),
                    'img' => get_parent_theme_file_uri( 'assets/images/theme-options/services-settings/left-sidebar.jpg' ),
                ),
                'right-sidebar' => array(
                    'alt' => esc_html__( 'Right Sidebar', 'maharatri' ),
                    'img' => get_parent_theme_file_uri( 'assets/images/theme-options/services-settings/right-sidebar.jpg' ),
                ),
            ),
            'default'  => 'right-sidebar',
        ),
        array(
            'id'       => 'holis-style',
            'type'     => 'select',
            'title'    => esc_html__( 'Select Holis Style', 'maharatri' ),
            'subtitle' => esc_html__( 'Please select the Holis archive style to display.', 'maharatri' ),
            'options'  => array(
                'style-1' => esc_html__( 'Holis Style 1', 'maharatri' ),
            ),
            'default'  => 'style-1',
        ),
        array(
            'id'       => 'holis-columns',
            'type'     => 'select',
            'title'    => esc_html__( 'Number of Columns', 'maharatri' ),
            'subtitle' => esc_html__( 'Please select the number of columns in holis archive.', 'maharatri' ),
            'options'  => array(
                'col-lg-12' => esc_html__( '1 Column', 'maharatri' ),
                'col-lg-6' => esc_html__( '2 Columns', 'maharatri' ),
                'col-lg-4' => esc_html__( '3 Columns', 'maharatri' ),
                'col-lg-3' => esc_html__( '4 Columns', 'maharatri' ),
            ),
            'default'  => 'col-lg-12',
        ),
        array(
            'id' => 'show_holis_thumbnail',
            'type' => 'switch',
            'title' => esc_html__('Show Holi Featured Image', 'maharatri'),
            'subtitle' => esc_html__('Enable to show holi post featured image', 'maharatri'),
            'default' => true,
        ),
        array(
            'id' => 'show_holis_audio',
            'type' => 'switch',
            'title' => esc_html__('Show Holi Audio Link', 'maharatri'),
            'subtitle' => esc_html__('Enable to show holi audio link', 'maharatri'),
            'default' => true,
        ),
        array(
            'id'       => 'audio_format_style',
            'type'     => 'select',
            'title'    => esc_html__( 'Select Audio Format', 'maharatri' ),
            'subtitle' => esc_html__( 'Please select audio link format in holi archive.', 'maharatri' ),
            'options'  => array(
                'icon' => esc_html__( 'Icon', 'maharatri' ),
                'player' => esc_html__( 'Player', 'maharatri' ),
            ),
            'required' => array('show_holis_audio',  '=', 'true'),
            'default'  => 'icon',
        ),
        array(
            'id' => 'show_holis_video',
            'type' => 'switch',
            'title' => esc_html__('Show Holi Video Link', 'maharatri'),
            'subtitle' => esc_html__('Enable to show holi video link', 'maharatri'),
            'default' => true,
        ),
        array(
            'id' => 'show_holis_pdf',
            'type' => 'switch',
            'title' => esc_html__('Show Holi PDF Link', 'maharatri'),
            'subtitle' => esc_html__('Enable to show holi pdf link', 'maharatri'),
            'default' => true,
        ),
        array(
            'id' => 'show_holis_infobox',
            'type' => 'switch',
            'title' => esc_html__('Show Holis Info', 'maharatri'),
            'subtitle' => esc_html__('Enable to show holis info on details page', 'maharatri'),
            'default' => true,
        ),
        array(
            'id' => 'show_holis_share',
            'type' => 'switch',
            'title' => esc_html__('Show Holis Share', 'maharatri'),
            'subtitle' => esc_html__('Enable to show puja share link on archive page.', 'maharatri'),
            'default' => true,
        ),
    ),
);
