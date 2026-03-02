<?php
/**
 * Register "puja" custom post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type/
 * @link https://developer.wordpress.org/reference/functions/register_post_type/
 *
 * @package Sigma Core
 */
if ( ! function_exists( 'sigmacore_register_cpt_puja' ) ) {
    /**
     * Function to Register "puja" custom post type.
     */
    function sigmacore_register_cpt_puja() {

        $puja_rewrite = !empty(maharatri_get_option('rewrite_puja')) ? maharatri_get_option('rewrite_puja') : 'puja';

        $labels = array(
            'name'                  => esc_html__( 'Puja', 'sigma-core' ),
            'singular_name'         => esc_html__( 'Puja', 'sigma-core' ),
            'menu_name'             => esc_html__( 'Puja', 'sigma-core' ),
            'name_admin_bar'        => esc_html__( 'Puja', 'sigma-core' ),
            'add_new'               => esc_html__( 'Add New', 'sigma-core' ),
            'add_new_item'          => esc_html__( 'Add New Puja', 'sigma-core' ),
            'new_item'              => esc_html__( 'New Puja', 'sigma-core' ),
            'edit_item'             => esc_html__( 'Edit Puja', 'sigma-core' ),
            'view_item'             => esc_html__( 'View Puja', 'sigma-core' ),
            'all_items'             => esc_html__( 'All Puja', 'sigma-core' ),
            'search_items'          => esc_html__( 'Search Puja', 'sigma-core' ),
            'parent_item_colon'     => esc_html__( 'Parent Puja:', 'sigma-core' ),
            'not_found'             => esc_html__( 'No Puja found.', 'sigma-core' ),
            'not_found_in_trash'    => esc_html__( 'No Puja found in Trash.', 'sigma-core' ),
            'featured_image'        => esc_html__( 'Puja Image', 'sigma-core' ),
            'set_featured_image'    => esc_html__( 'Set Puja Image', 'sigma-core' ),
            'remove_featured_image' => esc_html__( 'Remove Puja Image', 'sigma-core' ),
            'use_featured_image'    => esc_html__( 'Use Puja Image', 'sigma-core' ),
        );
        $cpt_puja_args = array(
            'labels'             => $labels,
            'description'        => esc_html__( 'Description.', 'sigma-core' ),
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array( 'slug' => $puja_rewrite , 'with_front' => false ),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => null,
            'supports'           => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail' ),
            'menu_icon'          => 'dashicons-buddicons-friends',
        );
        $cpt_puja_args = apply_filters( 'sigmacore_register_cpt_puja', $cpt_puja_args );
        register_post_type( 'puja', $cpt_puja_args );
    }
}

/**
 * Register 'puja-category' taxonomy for post type 'puja'.
 *
 * @link https://developer.wordpress.org/reference/functions/register_taxonomy/
 */
if ( ! function_exists( 'sigmacore_register_taxonomy_puja_category' ) ) {
    /**
     * Function to register puja-category taxonomy.
     */
    function sigmacore_register_taxonomy_puja_category() {
        $labels = array(
            'name'                       => esc_html__( 'Puja Categories', 'sigma-core' ),
            'singular_name'              => esc_html__( 'Puja Category', 'sigma-core' ),
            'search_items'               => esc_html__( 'Search Categories', 'sigma-core' ),
            'popular_items'              => esc_html__( 'Popular Categories', 'sigma-core' ),
            'all_items'                  => esc_html__( 'All Categories', 'sigma-core' ),
            'parent_item'                => null,
            'parent_item_colon'          => null,
            'edit_item'                  => esc_html__( 'Edit Category', 'sigma-core' ),
            'update_item'                => esc_html__( 'Update Category', 'sigma-core' ),
            'add_new_item'               => esc_html__( 'Add New Category', 'sigma-core' ),
            'new_item_name'              => esc_html__( 'New Category Name', 'sigma-core' ),
            'separate_items_with_commas' => esc_html__( 'Separate categories with commas', 'sigma-core' ),
            'add_or_remove_items'        => esc_html__( 'Add or remove Categories', 'sigma-core' ),
            'choose_from_most_used'      => esc_html__( 'Choose from the most used Categories', 'sigma-core' ),
            'not_found'                  => esc_html__( 'No categories found.', 'sigma-core' ),
            'menu_name'                  => esc_html__( 'Categories', 'sigma-core' ),
        );
        $puja_category_args = array(
            'hierarchical'          => true,
            'labels'                => $labels,
            'show_ui'               => true,
            'show_admin_column'     => true,
            'public'                => true,
            'update_count_callback' => '_update_post_term_count',
            'query_var'             => true,
            'rewrite'               => array( 'slug' => 'puja-category' ),
        );
        $puja_category_args = apply_filters( 'sigmacore_register_taxonomy_puja_category', $puja_category_args, 'puja' );
        register_taxonomy( 'puja-category', 'puja', $puja_category_args );
    }
}
