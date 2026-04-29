<?php
/**
 * Register "holis" custom post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type/
 * @link https://developer.wordpress.org/reference/functions/register_post_type/
 *
 * @package Sigma Core
 */
if ( ! function_exists( 'sigmacore_register_cpt_holis' ) ) {
    /**
     * Function to Register "holis" custom post type.
     */
    function sigmacore_register_cpt_holis() {
        $holis_rewrite = !empty(maharatri_get_option('rewrite_holis')) ? maharatri_get_option('rewrite_holis') : 'holis';
        $labels = array(
            'name'                  => esc_html__( 'Holis', 'sigma-core' ),
            'singular_name'         => esc_html__( 'Holis', 'sigma-core' ),
            'menu_name'             => esc_html__( 'Holis', 'sigma-core' ),
            'name_admin_bar'        => esc_html__( 'Holis', 'sigma-core' ),
            'add_new'               => esc_html__( 'Add New', 'sigma-core' ),
            'add_new_item'          => esc_html__( 'Add New Holis', 'sigma-core' ),
            'new_item'              => esc_html__( 'New Holis', 'sigma-core' ),
            'edit_item'             => esc_html__( 'Edit Holis', 'sigma-core' ),
            'view_item'             => esc_html__( 'View Holis', 'sigma-core' ),
            'all_items'             => esc_html__( 'All Holis', 'sigma-core' ),
            'search_items'          => esc_html__( 'Search Holis', 'sigma-core' ),
            'parent_item_colon'     => esc_html__( 'Parent Holis:', 'sigma-core' ),
            'not_found'             => esc_html__( 'No Holis found.', 'sigma-core' ),
            'not_found_in_trash'    => esc_html__( 'No Holis found in Trash.', 'sigma-core' ),
            'featured_image'        => esc_html__( 'Holis Image', 'sigma-core' ),
            'set_featured_image'    => esc_html__( 'Set Holis Image', 'sigma-core' ),
            'remove_featured_image' => esc_html__( 'Remove Holis Image', 'sigma-core' ),
            'use_featured_image'    => esc_html__( 'Use Holis Image', 'sigma-core' ),
        );
        $cpt_holis_args = array(
            'labels'             => $labels,
            'description'        => esc_html__( 'Description.', 'sigma-core' ),
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array( 'slug' => $holis_rewrite, 'with_front' => false ),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => null,
            'supports'           => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail' ),
            'menu_icon'          => 'dashicons-feedback',
        );
        $cpt_holis_args = apply_filters( 'sigmacore_register_cpt_holis', $cpt_holis_args );
        register_post_type( 'holis', $cpt_holis_args );
    }
}

/**
 * Register 'holis-category' taxonomy for post type 'holis'.
 *
 * @link https://developer.wordpress.org/reference/functions/register_taxonomy/
 */
if ( ! function_exists( 'sigmacore_register_taxonomy_holis_category' ) ) {
    /**
     * Function to register holis-category taxonomy.
     */
    function sigmacore_register_taxonomy_holis_category() {
        $labels = array(
            'name'                       => esc_html__( 'Holis Categories', 'sigma-core' ),
            'singular_name'              => esc_html__( 'Holis Category', 'sigma-core' ),
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
        $holis_category_args = array(
            'hierarchical'          => true,
            'labels'                => $labels,
            'show_ui'               => true,
            'show_admin_column'     => true,
            'public'                => true,
            'update_count_callback' => '_update_post_term_count',
            'query_var'             => true,
            'rewrite'               => array( 'slug' => 'holis-category' ),
        );
        $holis_category_args = apply_filters( 'sigmacore_register_taxonomy_holis_category', $holis_category_args, 'holis' );
        register_taxonomy( 'holis-category', 'holis', $holis_category_args );
    }
}
