<?php
/**
 * Register "volunteer" custom post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type/
 * @link https://developer.wordpress.org/reference/functions/register_post_type/
 *
 * @package Sigma Core
 */
if ( ! function_exists( 'sigmacore_register_cpt_volunteer' ) ) {
	/**
	 * Function to Register "volunteer" custom post type.
	 */
	function sigmacore_register_cpt_volunteer() {
	    $volunteer_rewrite = !empty(maharatri_get_option('rewrite_volunteer')) ? maharatri_get_option('rewrite_volunteer') : 'volunteer';
		$labels = array(
			'name'                  => esc_html__( 'Volunteer', 'sigma-core' ),
			'singular_name'         => esc_html__( 'Volunteer', 'sigma-core' ),
			'menu_name'             => esc_html__( 'Volunteer', 'sigma-core' ),
			'name_admin_bar'        => esc_html__( 'Volunteer', 'sigma-core' ),
			'add_new'               => esc_html__( 'Add New', 'sigma-core' ),
			'add_new_item'          => esc_html__( 'Add New Volunteer', 'sigma-core' ),
			'new_item'              => esc_html__( 'New Volunteer', 'sigma-core' ),
			'edit_item'             => esc_html__( 'Edit Volunteer', 'sigma-core' ),
			'view_item'             => esc_html__( 'View Volunteer', 'sigma-core' ),
			'all_items'             => esc_html__( 'All Volunteers', 'sigma-core' ),
			'search_items'          => esc_html__( 'Search Volunteer', 'sigma-core' ),
			'parent_item_colon'     => esc_html__( 'Parent Volunteer:', 'sigma-core' ),
			'not_found'             => esc_html__( 'No Volunteer found.', 'sigma-core' ),
			'not_found_in_trash'    => esc_html__( 'No Volunteer found in Trash.', 'sigma-core' ),
			'featured_image'        => esc_html__( 'Volunteer Image', 'sigma-core' ),
			'set_featured_image'    => esc_html__( 'Set Volunteer Image', 'sigma-core' ),
			'remove_featured_image' => esc_html__( 'Remove Volunteer Image', 'sigma-core' ),
			'use_featured_image'    => esc_html__( 'Use Volunteer Image', 'sigma-core' ),
		);
		$cpt_volunteer_args = array(
			'labels'             => $labels,
			'description'        => esc_html__( 'Description.', 'sigma-core' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => $volunteer_rewrite ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' ),
			'menu_icon'          => 'dashicons-groups',
		);
		$cpt_volunteer_args = apply_filters( 'sigmacore_register_cpt_volunteer', $cpt_volunteer_args );
		register_post_type( 'volunteer', $cpt_volunteer_args );
	}
}
/**
 * Register 'volunteer-category' taxonomy for post type 'volunteer'.
 *
 * @link https://developer.wordpress.org/reference/functions/register_taxonomy/
 */
if ( ! function_exists( 'sigmacore_register_taxonomy_volunteer_category' ) ) {
	/**
	 * Function to register volunteer-category taxonomy.
	 */
	function sigmacore_register_taxonomy_volunteer_category() {
		$labels = array(
			'name'                       => esc_html__( 'Volunteer Categories', 'sigma-core' ),
			'singular_name'              => esc_html__( 'Volunteer Category', 'sigma-core' ),
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
		$volunteer_category_args = array(
			'hierarchical'          => true,
			'labels'                => $labels,
			'show_ui'               => true,
			'show_admin_column'     => true,
			'public'                => true,
			'query_var'             => true,
			'rewrite'               => array( 'slug' => 'volunteer-category' ),
		);
		$volunteer_category_args = apply_filters( 'sigmacore_register_taxonomy_volunteer_category', $volunteer_category_args, 'volunteer' );
		register_taxonomy( 'volunteer-category', 'volunteer', $volunteer_category_args );
	}
}
