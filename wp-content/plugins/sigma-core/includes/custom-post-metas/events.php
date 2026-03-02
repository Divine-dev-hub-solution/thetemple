<?php
/**
 * Register metafields for events.
 *
 * @package Sigma Core
 */
function sigmacore_events_settings_metafields() {
    add_meta_box( 'sigma_events_details', __( 'Event Details', 'sigma-core' ), 'sigmacore_events_settings_metafields_callback', 'events', 'advanced' );
}
add_action( 'add_meta_boxes', 'sigmacore_events_settings_metafields', 2 );

/**
 * events meta fields display callback.
 *
 * @param WP_Post $post Current post object.
 */

function sigmacore_events_settings_metafields_callback( $post ) {

    global $post;

    wp_nonce_field( basename( __FILE__ ), 'sigma-events-meta-nonce' );

    // Field values
    $events_details        = get_post_meta( $post->ID, 'sigma_events_details', true );
    $sigma_event_start_date = isset( $events_details['sigma_event_start_date'] ) ? $events_details['sigma_event_start_date'] : '';
    $sigma_event_start_time        = isset( $events_details['sigma_event_start_time'] ) ? $events_details['sigma_event_start_time'] : '';
    $sigma_event_end_date = isset( $events_details['sigma_event_end_date'] ) ? $events_details['sigma_event_end_date'] : '';
    $sigma_event_end_time        = isset( $events_details['sigma_event_end_time'] ) ? $events_details['sigma_event_end_time'] : '';
    $sigma_event_location        = isset( $events_details['sigma_event_location'] ) ? $events_details['sigma_event_location'] : '';
    $sigma_event_city        = isset( $events_details['sigma_event_city'] ) ? $events_details['sigma_event_city'] : '';
    $sigma_event_state        = isset( $events_details['sigma_event_state'] ) ? $events_details['sigma_event_state'] : '';
    $sigma_event_zipcode        = isset( $events_details['sigma_event_zipcode'] ) ? $events_details['sigma_event_zipcode'] : '';
    $sigma_event_country        = isset( $events_details['sigma_event_country'] ) ? $events_details['sigma_event_country'] : '';
    $sigma_event_organizer        = isset( $events_details['sigma_event_organizer'] ) ? $events_details['sigma_event_organizer'] : '';
    $sigma_event_info_phone        = isset( $events_details['sigma_event_info_phone'] ) ? $events_details['sigma_event_info_phone'] : '';
    $sigma_event_info_email        = isset( $events_details['sigma_event_info_email'] ) ? $events_details['sigma_event_info_email'] : '';
    $sigma_event_authors_total = isset($events_details['sigma_event_authors_total']) ? (int)$events_details['sigma_event_authors_total'] : '';
    $sigma_event_authors_name = isset($events_details['sigma_event_authors_name']) ? $events_details['sigma_event_authors_name'] : '';
    $sigma_event_authors_time = isset($events_details['sigma_event_authors_time']) ? $events_details['sigma_event_authors_time'] : '';
    $sigma_event_authors_description = isset($events_details['sigma_event_authors_description']) ? $events_details['sigma_event_authors_description'] : '';
    $sigma_event_authors_image = isset($events_details['sigma_event_authors_image']) ? $events_details['sigma_event_authors_image'] : '';


    // All metafields
    ?>

    <div class="sigma_event-start-wrapper sigma-input-meta-wrapper row">
        <div class="sigma_input-field">
          <h4 class="input-field-label"><?php echo esc_html('Event Start Date', 'sigma-core'); ?></h4>
            <input class="sigma_text date-input-field" type="text" autocomplete="off" name="sigma_event_start_date"
                   value="<?php echo esc_attr($sigma_event_start_date); ?>">
        </div>
        <div class="sigma_input-field">
          <h4 class="input-field-label"><?php echo esc_html('Event Start Time', 'sigma-core'); ?></h4>
            <input class="sigma_text time-input-field" type="text" autocomplete="off" name="sigma_event_start_time"
                   value="<?php echo esc_attr($sigma_event_start_time); ?>">
        </div>
    </div>
    <div class="sigma_event-end-wrapper sigma-input-meta-wrapper row">
        <div class="sigma_input-field">
          <h4 class="input-field-label"><?php echo esc_html('Event End Date', 'sigma-core'); ?></h4>
            <input class="sigma_text date-input-field" type="text" autocomplete="off" name="sigma_event_end_date"
                   value="<?php echo esc_attr($sigma_event_end_date); ?>">
        </div>
        <div class="sigma_input-field">
          <h4 class="input-field-label"><?php echo esc_html('Event End Time', 'sigma-core'); ?></h4>
            <input class="sigma_text time-input-field" type="text" autocomplete="off" name="sigma_event_end_time"
                   value="<?php echo esc_attr($sigma_event_end_time); ?>">
        </div>
    </div>
    <div class="sigma_event-location-wrapper half-field sigma-input-meta-wrapper">
        <div class="sigma_input-field">
          <h4 class="input-field-label"><?php echo esc_html('Event Location', 'sigma-core'); ?></h4>
            <input class="sigma_text" type="text" autocomplete="off" name="sigma_event_location"
                   value="<?php echo esc_attr($sigma_event_location); ?>">
        </div>
    </div>
    <div class="sigma_event-city-wrapper half-field sigma-input-meta-wrapper">
        <div class="sigma_input-field">
            <h4 class="input-field-label"><?php echo esc_html('Event City', 'sigma-core'); ?></h4>
            <input class="sigma_text" type="text" autocomplete="off" name="sigma_event_city"
                   value="<?php echo esc_attr($sigma_event_city); ?>">
        </div>
    </div>
    <div class="sigma_event-state-wrapper half-field sigma-input-meta-wrapper">
        <div class="sigma_input-field">
            <h4 class="input-field-label"><?php echo esc_html('Event State', 'sigma-core'); ?></h4>
            <input class="sigma_text" type="text" autocomplete="off" name="sigma_event_state"
                   value="<?php echo esc_attr($sigma_event_state); ?>">
        </div>
    </div>
    <div class="sigma_event-zipcode-wrapper half-field sigma-input-meta-wrapper">
        <div class="sigma_input-field">
            <h4 class="input-field-label"><?php echo esc_html('Event Zipcode', 'sigma-core'); ?></h4>
            <input class="sigma_text" type="text" autocomplete="off" name="sigma_event_zipcode"
                   value="<?php echo esc_attr($sigma_event_zipcode); ?>">
        </div>
    </div>
    <div class="sigma_event-country-wrapper half-field sigma-input-meta-wrapper">
        <div class="sigma_input-field">
            <h4 class="input-field-label"><?php echo esc_html('Event Country', 'sigma-core'); ?></h4>
            <input class="sigma_text" type="text" autocomplete="off" name="sigma_event_country"
                   value="<?php echo esc_attr($sigma_event_country); ?>">
        </div>
    </div>
    <div class="sigma_event-organizer-wrapper half-field sigma-input-meta-wrapper">
        <div class="sigma_input-field">
          <h4 class="input-field-label"><?php echo esc_html('Event Organizer', 'sigma-core'); ?></h4>
            <input class="sigma_text" type="text" autocomplete="off" name="sigma_event_organizer"
                   value="<?php echo esc_attr($sigma_event_organizer); ?>">
        </div>
    </div>
    <div class="sigma_event-phone-wrapper half-field sigma-input-meta-wrapper">
        <div class="sigma_input-field">
          <h4 class="input-field-label"><?php echo esc_html('Phone', 'sigma-core'); ?></h4>
            <input class="sigma_text" type="text" autocomplete="off" name="sigma_event_info_phone"
                   value="<?php echo esc_attr($sigma_event_info_phone); ?>">
        </div>
    </div>
    <div class="sigma_event-email-wrapper half-field sigma-input-meta-wrapper">
        <div class="sigma_input-field">
          <h4 class="input-field-label"><?php echo esc_html('Email', 'sigma-core'); ?></h4>
            <input class="sigma_text" type="text" autocomplete="off" name="sigma_event_info_email"
                   value="<?php echo esc_attr($sigma_event_info_email); ?>">
        </div>
    </div>
    <div class="sigma_event-authors sigma-input-meta-wrapper">
            <h3 class="sigma_event-input-title"><?php esc_html_e('Event Authors', 'sigma-core'); ?></h3>
            <table class="event-author-details-table">
                <tr>
                    <th><?php esc_html_e('No.', 'sigma-core'); ?></th>
                    <th><?php esc_html_e('Name.', 'sigma-core'); ?></th>
                    <th class="time-column"><?php esc_html_e('Time.', 'sigma-core'); ?></th>
                    <th><?php esc_html_e('Link.', 'sigma-core'); ?></th>
                    <th><?php esc_html_e('Description.', 'sigma-core'); ?></th>
                    <th><?php esc_html_e('Remove.', 'sigma-core'); ?></th>
                </tr>
                <?php for ($i = 0; $sigma_event_authors_total > $i; $i++) { ?>
                    <tr>
                        <td class="row-index"><?php echo esc_html($i + 1); ?></td>
                          <td class="sigma_input-field">
                            <input class="sigma_text event-author-name" type="text"
                                   name="sigma_event_authors_name[]"
                                   value="<?php echo esc_attr($sigma_event_authors_name[$i]); ?>">
                        </td>
                        <td class="sigma_input-field">
                            <input class="sigma_text" type="text" name="sigma_event_authors_time[]"
                                   value="<?php echo esc_attr($sigma_event_authors_time[$i]); ?>">
                        </td>
                        <td class="sigma_input-field">
                            <input class="sigma_text" type="text" name="sigma_event_authors_image[]"
                                   value="<?php echo esc_attr($sigma_event_authors_image[$i]); ?>">
                        </td>
                        <td class="sigma_input-field">
                        <textarea class="sigma_text" id="sigma_event_authors_description[]"
                                  name="sigma_event_authors_description[]" ><?php echo esc_attr($sigma_event_authors_description[$i]); ?></textarea>
                        </td>
                        <td><a class="event-authors-row-remove sigma_link-destructive"
                               href="#"><?php echo esc_html__('Remove', 'sigma-core') ?></a></td>
                    </tr>
                <?php } ?>
            </table>
            <input type="hidden" name="sigma_event_authors_total"
                   value="<?php echo esc_attr($sigma_event_authors_total); ?>">
            <span class="button event-authors-table-row-add"><?php echo esc_html__('Add Row', 'sigma-core') ?></span>
        </div>
    <?php
}

/**
 * Save events fields content.
 *
 * @param int $post_id Post ID.
 */
function sigmacore_events_settings_save_meta_box( $post_id ) {

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    if ( ! current_user_can( 'edit_posts' ) ) {
        return;
    }
    if ( ! isset( $_POST['sigma-events-meta-nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['sigma-events-meta-nonce'] ) ), basename( __FILE__ ) ) ) {
        return;
    }


    // Fields to be saved
    $events_details                           = array();
    $events_details['sigma_event_start_date'] = isset( $_POST['sigma_event_start_date'] ) ? sanitize_text_field( wp_unslash( $_POST['sigma_event_start_date'] ) ) : '';
    $events_details['sigma_event_start_time']        = isset( $_POST['sigma_event_start_time'] ) ? sanitize_text_field( wp_unslash( $_POST['sigma_event_start_time'] ) ) : '';
    $events_details['sigma_event_end_date']       = isset( $_POST['sigma_event_end_date'] ) ? sanitize_text_field( wp_unslash( $_POST['sigma_event_end_date'] ) ) : '';
    $events_details['sigma_event_end_time']        = isset( $_POST['sigma_event_end_time'] ) ? sanitize_text_field( wp_unslash( $_POST['sigma_event_end_time'] ) ) : '';
    $events_details['sigma_event_location']        = isset( $_POST['sigma_event_location'] ) ? sanitize_text_field( wp_unslash( $_POST['sigma_event_location'] ) ) : '';
    $events_details['sigma_event_city']        = isset( $_POST['sigma_event_city'] ) ? sanitize_text_field( wp_unslash( $_POST['sigma_event_city'] ) ) : '';
    $events_details['sigma_event_state']        = isset( $_POST['sigma_event_state'] ) ? sanitize_text_field( wp_unslash( $_POST['sigma_event_state'] ) ) : '';
    $events_details['sigma_event_zipcode']        = isset( $_POST['sigma_event_zipcode'] ) ? sanitize_text_field( wp_unslash( $_POST['sigma_event_zipcode'] ) ) : '';
    $events_details['sigma_event_country']        = isset( $_POST['sigma_event_country'] ) ? sanitize_text_field( wp_unslash( $_POST['sigma_event_country'] ) ) : '';
    $events_details['sigma_event_organizer']        = isset( $_POST['sigma_event_organizer'] ) ? sanitize_text_field( wp_unslash( $_POST['sigma_event_organizer'] ) ) : '';
    $events_details['sigma_event_info_phone']        = isset( $_POST['sigma_event_info_phone'] ) ? sanitize_text_field( wp_unslash( $_POST['sigma_event_info_phone'] ) ) : '';
    $events_details['sigma_event_info_email']        = isset( $_POST['sigma_event_info_email'] ) ? sanitize_text_field( wp_unslash( $_POST['sigma_event_info_email'] ) ) : '';
    $events_details['sigma_event_authors_total']        = isset( $_POST['sigma_event_authors_total'] ) ? sanitize_text_field( wp_unslash( $_POST['sigma_event_authors_total'] ) ) : '';
    $events_details['sigma_event_authors_name']        = isset( $_POST['sigma_event_authors_name'] ) ?  wp_unslash( $_POST['sigma_event_authors_name'] )  : '';
    $events_details['sigma_event_authors_time']        = isset( $_POST['sigma_event_authors_time'] ) ?  wp_unslash( $_POST['sigma_event_authors_time'] )  : '';
    $events_details['sigma_event_authors_description']        = isset( $_POST['sigma_event_authors_description'] ) ?  wp_unslash( $_POST['sigma_event_authors_description'] )  : '';
    $events_details['sigma_event_authors_image']        = isset( $_POST['sigma_event_authors_image'] ) ?  wp_unslash( $_POST['sigma_event_authors_image'] )  : '';

    update_post_meta( $post_id, 'sigma_events_details', $events_details );

}
add_action( 'save_post', 'sigmacore_events_settings_save_meta_box' );
