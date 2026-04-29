<?php
/**
 * Events settings
 *
 * @package Sigma
 */
return array(
    'title'  => esc_html__( 'Events Settings', 'maharatri' ),
    'id'     => 'events_settings',
    'icon'   => 'el el-indent-right',
    'fields' => array(
        array(
            'id'       => 'events-style',
            'type'     => 'select',
            'title'    => esc_html__( 'Select Events Style', 'maharatri' ),
            'subtitle' => esc_html__( 'Please select the Events archive style to display.', 'maharatri' ),
            'options'  => array(
                'style-1' => esc_html__( 'Events Style 1', 'maharatri' ),
            ),
            'default'  => 'style-1',
        ),
        array(
            'id'       => 'events-columns',
            'type'     => 'select',
            'title'    => esc_html__( 'Number of Columns', 'maharatri' ),
            'subtitle' => esc_html__( 'Please select the number of columns in events archive.', 'maharatri' ),
            'options'  => array(
                'col-lg-12' => esc_html__( '1 Column', 'maharatri' ),
                'col-lg-6' => esc_html__( '2 Column', 'maharatri' ),
                'col-lg-4' => esc_html__( '3 Column', 'maharatri' ),
                'col-lg-3' => esc_html__( '4 Column', 'maharatri' ),
            ),
            'default'  => 'col-lg-12',
        ),
        array(
            'id' => 'show_events_date',
            'type' => 'switch',
            'title' => esc_html__('Show Events Date', 'maharatri'),
            'subtitle' => esc_html__('Enable to show events excerpt.', 'maharatri'),
            'default' => true,
        ),
        array(
            'id' => 'show_events_excerpt',
            'type' => 'switch',
            'title' => esc_html__('Show Events Excerpt', 'maharatri'),
            'subtitle' => esc_html__('Enable to show events excerpt.', 'maharatri'),
            'default' => true,
        ),
        array(
            'id' => 'events_excerpt_length',
            'type' => 'text',
            'title' => esc_html__('Excerpt Length', 'maharatri'),
            'subtitle' => esc_html__('Enter no of words to show in events excerpt.', 'maharatri'),
            'default' => 20,
            'required' => array('show_events_excerpt', '=', true),
        ),
        array(
            'id' => 'show_events_time',
            'type' => 'switch',
            'title' => esc_html__('Show Events Time', 'maharatri'),
            'subtitle' => esc_html__('Enable to show events time.', 'maharatri'),
            'default' => true,
        ),
        array(
            'id' => 'show_events_location',
            'type' => 'switch',
            'title' => esc_html__('Show Events Location', 'maharatri'),
            'subtitle' => esc_html__('Enable to show events location.', 'maharatri'),
            'default' => true,
        ),
        array(
            'id'       => 'events_sidebar',
            'type'     => 'image_select',
            'title'    => esc_html__( 'Events Sidebar', 'maharatri' ),
            'subtitle' => esc_html__( 'Select the events sidebar position.', 'maharatri' ),
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
          'id'   =>'event_details_separator',
          'title' => __('Event Details', 'maharatri'),
          'type' => 'section'
        ),
        array(
            'id'       => 'events_details_sidebar',
            'type'     => 'image_select',
            'title'    => esc_html__( 'Events Details Sidebar', 'maharatri' ),
            'subtitle' => esc_html__( 'Select the events details sidebar position.', 'maharatri' ),
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
            'id' => 'show_events_details_infobox',
            'type' => 'switch',
            'title' => esc_html__('Show Events Details Info', 'maharatri'),
            'subtitle' => esc_html__('Enable to show events details info on details page', 'maharatri'),
            'default' => true,
        ),
        array(
            'id' => 'show_events_details_speakers',
            'type' => 'switch',
            'title' => esc_html__('Show Events Speakers', 'maharatri'),
            'subtitle' => esc_html__('Enable to show events speakers on details page.', 'maharatri'),
            'default' => true,
        ),
    ),
);
