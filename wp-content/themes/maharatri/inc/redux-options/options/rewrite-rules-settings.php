<?php
/**
 * Rewrite rule settings
 *
 * @package Sigma
 */
return array(
    'title'  => esc_html__( 'Rewrite Rules Settings', 'maharatri' ),
    'id'     => 'rewrite_rule_settings',
    'icon'   => 'el el-link',
    'fields' => array(
        array(
            'id'       => 'rewrite_volunteer',
            'type'     => 'text',
            'title'    => esc_html__( 'Volunteer Rewrite Slug', 'maharatri' ),
            'subtitle' => esc_html__( 'Enter custom slug for volunteer custom post type.', 'maharatri' ),
        ),
        array(
            'id'       => 'rewrite_testimonials',
            'type'     => 'text',
            'title'    => esc_html__( 'Testimonials Rewrite Slug', 'maharatri' ),
            'subtitle' => esc_html__( 'Enter custom slug for testimonials custom post type.', 'maharatri' ),
        ),
        array(
            'id'       => 'rewrite_services',
            'type'     => 'text',
            'title'    => esc_html__( 'Services Rewrite Slug', 'maharatri' ),
            'subtitle' => esc_html__( 'Enter custom slug for services custom post type.', 'maharatri' ),
        ),
        array(
            'id'       => 'rewrite_events',
            'type'     => 'text',
            'title'    => esc_html__( 'Events Rewrite Slug', 'maharatri' ),
            'subtitle' => esc_html__( 'Enter custom slug for events custom post type.', 'maharatri' ),
        ),
        array(
            'id'       => 'rewrite_puja',
            'type'     => 'text',
            'title'    => esc_html__( 'Puja Rewrite Slug', 'maharatri' ),
            'subtitle' => esc_html__( 'Enter custom slug for puja custom post type.', 'maharatri' ),
        ),
        array(
            'id'       => 'rewrite_holis',
            'type'     => 'text',
            'title'    => esc_html__( 'Holis Rewrite Slug', 'maharatri' ),
            'subtitle' => esc_html__( 'Enter custom slug for holis custom post type.', 'maharatri' ),
        ),
    ),
);
