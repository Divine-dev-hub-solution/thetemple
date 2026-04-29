<?php
/**
 * Custom Post types
 *
 * @package Maharatri
 */
return array(
	'title'            => esc_html__( 'Custom Post Types', 'maharatri' ),
	'id'               => 'custom_post_types',
	'customizer_width' => '400px',
	'icon'             => 'el el-envelope',
	'fields'           => array(
    array(
          'id'        => 'cpt_sort_content',
          'type'      => 'sorter',
          'title'     => esc_html__( 'Custom Post Types', 'maharatri' ),
          'subtitle'  => esc_html__( 'Please drag and arrange the cpt blocks. Update permalinks after enable/disable any custom post type block', 'maharatri' ),
          'ajax_save' => false,
          'options'   => array(
              'enabled' => array(
                'volunteer' => esc_html__('Volunteer', 'maharatri'),
                'testimonial' => esc_html__('Testimonial', 'maharatri'),
                'service' => esc_html__('Service', 'maharatri'),
                'events' => esc_html__('Events', 'maharatri'),
                'holis' => esc_html__('Holis', 'maharatri'),
                'puja' => esc_html__('Puja', 'maharatri'),
              ),
              'disabled' => array()
          )
      ),
	),
);
