<?php
/**
 * Register metafields for puja.
 *
 * @package Sigma Core
 */
function sigmacore_puja_settings_metafields() {
    add_meta_box( 'sigma_puja_details', __( 'Puja Details', 'sigma-core' ), 'sigmacore_puja_settings_metafields_callback', 'puja', 'side' );
}
add_action( 'add_meta_boxes', 'sigmacore_puja_settings_metafields', 2 );

/**
 * puja meta fields display callback.
 *
 * @param WP_Post $post Current post object.
 */

function sigmacore_puja_settings_metafields_callback( $post ) {

    global $post;

    wp_nonce_field( basename( __FILE__ ), 'sigma-puja-meta-nonce' );

    // Field values
    $puja_details        = get_post_meta( $post->ID, 'sigma_puja_details', true );
    $sigma_puja_client_name = isset( $puja_details['sigma_puja_client_name'] ) ? $puja_details['sigma_puja_client_name'] : '';
    $sigma_puja_year        = isset( $puja_details['sigma_puja_year'] ) ? $puja_details['sigma_puja_year'] : '';

    // All metafields
    sigmacore_custom_metafield([
        'type'	=>	'text',
        'name'	=>	'sigma_puja_client_name',
        'title'	=>	__('Puja Type', 'sigma-core'),
        'description'	=>	__('Enter the Client name', 'sigma-core'),
        'value'	=>	$sigma_puja_client_name
    ]);
    sigmacore_custom_metafield([
        'type'	=>	'date',
        'name'	=>	'sigma_puja_year',
        'title'	=>	__('Date', 'sigma-core'),
        'description'	=>	__('Enter the puja date', 'sigma-core'),
        'value'	=>	$sigma_puja_year
    ]);

}

/**
 * Save puja fields content.
 *
 * @param int $post_id Post ID.
 */
function sigmacore_puja_settings_save_meta_box( $post_id ) {

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    if ( ! current_user_can( 'edit_posts' ) ) {
        return;
    }
    if ( ! isset( $_POST['sigma-puja-meta-nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['sigma-puja-meta-nonce'] ) ), basename( __FILE__ ) ) ) {
        return;
    }


    // Fields to be saved
    $puja_details                           = array();
    $puja_details['sigma_puja_client_name'] = isset( $_POST['sigma_puja_client_name'] ) ? sanitize_text_field( wp_unslash( $_POST['sigma_puja_client_name'] ) ) : '';
    $puja_details['sigma_puja_year']        = isset( $_POST['sigma_puja_year'] ) ? sanitize_text_field( wp_unslash( $_POST['sigma_puja_year'] ) ) : '';

    update_post_meta( $post_id, 'sigma_puja_details', $puja_details );

}
add_action( 'save_post', 'sigmacore_puja_settings_save_meta_box' );
