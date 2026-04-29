<?php
/**
 * Register metafields for holis.
 *
 * @package Sigma Core
 */
function sigmacore_holis_settings_metafields() {
    add_meta_box( 'sigma_holis_details', __( 'Holis Details', 'sigma-core' ), 'sigmacore_holis_settings_metafields_callback', 'holis', 'advanced' );
}
add_action( 'add_meta_boxes', 'sigmacore_holis_settings_metafields', 2 );

/**
 * holis meta fields display callback.
 *
 * @param WP_Post $post Current post object.
 */

function sigmacore_holis_settings_metafields_callback( $post ) {

    global $post;

    wp_nonce_field( basename( __FILE__ ), 'sigma-holis-meta-nonce' );

    // Field values
    $holis_details        = get_post_meta( $post->ID, 'sigma_holis_details', true );
    $sigma_holis_tagline = isset( $holis_details['sigma_holis_tagline'] ) ? $holis_details['sigma_holis_tagline'] : '';
    $sigma_holis_audio_link = isset( $holis_details['sigma_holis_audio_link'] ) ? $holis_details['sigma_holis_audio_link'] : '';
    $sigma_holis_video_link = isset( $holis_details['sigma_holis_video_link'] ) ? $holis_details['sigma_holis_video_link'] : '';
    $sigma_holis_pdf_link = isset( $holis_details['sigma_holis_pdf_link'] ) ? $holis_details['sigma_holis_pdf_link'] : '';

    // All metafields
    sigmacore_custom_metafield([
        'type'	=>	'text',
        'name'	=>	'sigma_holis_tagline',
        'title'	=>	__('Tagline', 'sigma-core'),
        'description'	=>	__('Add Tagline here', 'sigma-core'),
        'value'	=>	$sigma_holis_tagline
    ]);
    sigmacore_custom_metafield([
        'type'	=>	'text',
        'name'	=>	'sigma_holis_audio_link',
        'title'	=>	__('Audio Link', 'sigma-core'),
        'description'	=>	__('Add Audio link here', 'sigma-core'),
        'value'	=>	$sigma_holis_audio_link
    ]);
    sigmacore_custom_metafield([
        'type'	=>	'text',
        'name'	=>	'sigma_holis_video_link',
        'title'	=>	__('Video Link', 'sigma-core'),
        'description'	=>	__('Add Video link here', 'sigma-core'),
        'value'	=>	$sigma_holis_video_link
    ]);
    sigmacore_custom_metafield([
        'type'	=>	'text',
        'name'	=>	'sigma_holis_pdf_link',
        'title'	=>	__('PDF Link', 'sigma-core'),
        'description'	=>	__('Add PDF link here', 'sigma-core'),
        'value'	=>	$sigma_holis_pdf_link
    ]);

}

/**
 * Save holis fields content.
 *
 * @param int $post_id Post ID.
 */
function sigmacore_holis_settings_save_meta_box( $post_id ) {

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    if ( ! current_user_can( 'edit_posts' ) ) {
        return;
    }
    if ( ! isset( $_POST['sigma-holis-meta-nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['sigma-holis-meta-nonce'] ) ), basename( __FILE__ ) ) ) {
        return;
    }


    // Fields to be saved
    $holis_details = array();
    $holis_details['sigma_holis_tagline'] = isset( $_POST['sigma_holis_tagline'] ) ? sanitize_text_field( wp_unslash( $_POST['sigma_holis_tagline'] ) ) : '';
    $holis_details['sigma_holis_audio_link'] = isset( $_POST['sigma_holis_audio_link'] ) ? sanitize_text_field( wp_unslash( $_POST['sigma_holis_audio_link'] ) ) : '';
    $holis_details['sigma_holis_video_link'] = isset( $_POST['sigma_holis_video_link'] ) ? sanitize_text_field( wp_unslash( $_POST['sigma_holis_video_link'] ) ) : '';
    $holis_details['sigma_holis_pdf_link'] = isset( $_POST['sigma_holis_pdf_link'] ) ? sanitize_text_field( wp_unslash( $_POST['sigma_holis_pdf_link'] ) ) : '';

    update_post_meta( $post_id, 'sigma_holis_details', $holis_details );

}
add_action( 'save_post', 'sigmacore_holis_settings_save_meta_box' );
