<?php
/**
 * Register "events" custom post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type/
 * @link https://developer.wordpress.org/reference/functions/register_post_type/
 *
 * @package Sigma Core
 */
if ( ! function_exists( 'sigmacore_register_cpt_events' ) ) {
    /**
     * Function to Register "events" custom post type.
     */
    function sigmacore_register_cpt_events() {

        $events_rewrite = !empty(maharatri_get_option('rewrite_events')) ? maharatri_get_option('rewrite_events') : 'events';

        $labels = array(
            'name'                  => esc_html__( 'Events', 'sigma-core' ),
            'singular_name'         => esc_html__( 'Events', 'sigma-core' ),
            'menu_name'             => esc_html__( 'Events', 'sigma-core' ),
            'name_admin_bar'        => esc_html__( 'Events', 'sigma-core' ),
            'add_new'               => esc_html__( 'Add New', 'sigma-core' ),
            'add_new_item'          => esc_html__( 'Add New Event', 'sigma-core' ),
            'new_item'              => esc_html__( 'New Event', 'sigma-core' ),
            'edit_item'             => esc_html__( 'Edit Event', 'sigma-core' ),
            'view_item'             => esc_html__( 'View Event', 'sigma-core' ),
            'all_items'             => esc_html__( 'All Events', 'sigma-core' ),
            'search_items'          => esc_html__( 'Search Events', 'sigma-core' ),
            'parent_item_colon'     => esc_html__( 'Parent Events:', 'sigma-core' ),
            'not_found'             => esc_html__( 'No Events found.', 'sigma-core' ),
            'not_found_in_trash'    => esc_html__( 'No Events found in Trash.', 'sigma-core' ),
            'featured_image'        => esc_html__( 'Event Image', 'sigma-core' ),
            'set_featured_image'    => esc_html__( 'Set Event Image', 'sigma-core' ),
            'remove_featured_image' => esc_html__( 'Remove Event Image', 'sigma-core' ),
            'use_featured_image'    => esc_html__( 'Use Event Image', 'sigma-core' ),
        );
        $cpt_events_args = array(
            'labels'             => $labels,
            'description'        => esc_html__( 'Description.', 'sigma-core' ),
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array( 'slug' => $events_rewrite , 'with_front' => false ),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => null,
            'supports'           => array( 'title', 'editor',  'comments', 'excerpt', 'author', 'thumbnail' ),
            'menu_icon'          => 'dashicons-calendar',
        );
        $cpt_events_args = apply_filters( 'sigmacore_register_cpt_events', $cpt_events_args );
        register_post_type( 'events', $cpt_events_args );
    }
}
/**
 * Register 'events-category' taxonomy for post type 'events'.
 *
 * @link https://developer.wordpress.org/reference/functions/register_taxonomy/
 */
if ( ! function_exists( 'sigmacore_register_taxonomy_events_category' ) ) {
    /**
     * Function to register events-category taxonomy.
     */
    function sigmacore_register_taxonomy_events_category() {
        $labels = array(
            'name'                       => esc_html__( 'Event Categories', 'sigma-core' ),
            'singular_name'              => esc_html__( 'Event Category', 'sigma-core' ),
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
        $events_category_args = array(
            'hierarchical'          => true,
            'labels'                => $labels,
            'show_ui'               => true,
            'show_admin_column'     => true,
            'public'                => true,
            'update_count_callback' => '_update_post_term_count',
            'query_var'             => true,
            'rewrite'               => array( 'slug' => 'events-category' ),
        );
        $events_category_args = apply_filters( 'sigmacore_register_taxonomy_events_category', $events_category_args, 'events' );
        register_taxonomy( 'events-category', 'events', $events_category_args );
    }
}



/**
 * Register 'events-tag' taxonomy to post type 'events'.
 *
 * @link https://developer.wordpress.org/reference/functions/register_taxonomy/
 */
if ( ! function_exists( 'sigmacore_register_taxonomy_events_tag' ) ) {
	/**
	 * Function to register events-tag taxonomy.
	 */
	function sigmacore_register_taxonomy_events_tag() {

		$labels = array(
			'name'                       => esc_html__( 'Events Tags', 'sigma-core' ),
			'singular_name'              => esc_html__( 'Events Tag', 'sigma-core' ),
			'search_items'               => esc_html__( 'Search Tags', 'sigma-core' ),
			'popular_items'              => esc_html__( 'Popular Tags', 'sigma-core' ),
			'all_items'                  => esc_html__( 'All Tags', 'sigma-core' ),
			'parent_item'                => null,
			'parent_item_colon'          => null,
			'edit_item'                  => esc_html__( 'Edit Tag', 'sigma-core' ),
			'update_item'                => esc_html__( 'Update Tag', 'sigma-core' ),
			'add_new_item'               => esc_html__( 'Add New Tag', 'sigma-core' ),
			'new_item_name'              => esc_html__( 'New Tag Name', 'sigma-core' ),
			'separate_items_with_commas' => esc_html__( 'Separate categories with commas', 'sigma-core' ),
			'menu_name'                  => esc_html__( 'Tags', 'sigma-core' ),
			'add_or_remove_items'        => esc_html__( 'Add or remove Tag', 'sigma-core' ),
			'choose_from_most_used'      => esc_html__( 'Choose from the most used Categories', 'sigma-core' ),
		);

		$events_tag_args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'singular_name'     => esc_html__( 'Tag', 'sigma-core' ),
			'show_admin_column' => true,
			'rewrite'           => true,
			'query_var'         => true,
			'show_in_rest'      => true,
		);

		$events_tag_args = apply_filters( 'sigmacore_register_taxonomy_events_tag', $events_tag_args, 'events' );

		register_taxonomy( 'events-tag', 'events', $events_tag_args );
	}
}
