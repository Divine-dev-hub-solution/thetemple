<?php
/**
 * Puja settings
 *
 * @package Sigma
 */
return array(
    'title'  => esc_html__( 'Puja Settings', 'maharatri' ),
    'id'     => 'puja_settings',
    'icon'   => 'far fa-burn',
    'fields' => array(
        array(
            'id'       => 'puja_sidebar',
            'type'     => 'image_select',
            'title'    => esc_html__( 'Puja Sidebar', 'maharatri' ),
            'subtitle' => esc_html__( 'Select the puja sidebar position.', 'maharatri' ),
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
            'id'       => 'puja-style',
            'type'     => 'select',
            'title'    => esc_html__( 'Select Puja Style', 'maharatri' ),
            'subtitle' => esc_html__( 'Please select the Puja archive style to display.', 'maharatri' ),
            'options'  => array(
                'style-1' => esc_html__( 'Puja Style 1', 'maharatri' ),
                'style-2' => esc_html__( 'Puja Style 2', 'maharatri' ),
                'style-3' => esc_html__( 'Puja Style 3', 'maharatri' ),
            ),
            'default'  => 'style-1',
        ),
        array(
            'id'       => 'puja-columns',
            'type'     => 'select',
            'title'    => esc_html__( 'Number of Columns', 'maharatri' ),
            'subtitle' => esc_html__( 'Please select the number of columns in puja archive.', 'maharatri' ),
            'options'  => array(
                'col-lg-12' => esc_html__( '1 Column', 'maharatri' ),
                'col-lg-6' => esc_html__( '2 Columns', 'maharatri' ),
                'col-lg-4' => esc_html__( '3 Columns', 'maharatri' ),
                'col-lg-3' => esc_html__( '4 Columns', 'maharatri' ),
            ),
            'default'  => 'col-lg-12',
        ),
        array(
            'id' => 'show_puja_excerpt',
            'type' => 'switch',
            'title' => esc_html__('Show Puja Excerpt', 'maharatri'),
            'subtitle' => esc_html__('Enable to show puja excerpt.', 'maharatri'),
            'default' => true,
            'required' => array('puja-style', '=', 'style-1'),
        ),
        array(
            'id' => 'puja_excerpt_length',
            'type' => 'text',
            'title' => esc_html__('Excerpt Length', 'maharatri'),
            'subtitle' => esc_html__('Enter no of words to show in puja excerpt.', 'maharatri'),
            'default' => 20,
            'required' => array('show_puja_excerpt', '=', true),
        ),
        array(
            'id' => 'show_puja_infobox',
            'type' => 'switch',
            'title' => esc_html__('Show Puja Info', 'maharatri'),
            'subtitle' => esc_html__('Enable to show puja info on details page', 'maharatri'),
            'default' => true,
        ),
        array(
            'id' => 'show_puja_share',
            'type' => 'switch',
            'title' => esc_html__('Show Puja Share', 'maharatri'),
            'subtitle' => esc_html__('Enable to show puja share link on details page.', 'maharatri'),
            'default' => true,
        ),
    ),
);
