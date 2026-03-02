<?php
/**
 * Register metafields for service custom post type.
 *
 * @package Sigma Core
 */
if ( ! function_exists( 'sigmacore_register_service_metafields' ) ) {
	/**
	 * Register metafields for service members.
	 */
	function sigmacore_register_service_metafields() {
		add_meta_box( 'service_details', __( 'Service Details', 'sigma-core' ), 'sigmacore_service_details_callback', 'service' );
	}
}
add_action( 'add_meta_boxes', 'sigmacore_register_service_metafields' );
if ( ! function_exists( 'sigmacore_service_details_callback' ) ) {
	/**
	 * service meta fields display callback.
	 *
	 * @param WP_Post $post Current post object.
	 */
	function sigmacore_service_details_callback( $post ) {
		global $post;
		wp_nonce_field( basename( __FILE__ ), 'sigma-service-meta-nonce' );
		$service_details = get_post_meta( $post->ID, 'sigma_service_details', true );
		$kb_service_icon = isset( $service_details['kb_service_icon'] ) ? $service_details['kb_service_icon'] : '';
		$sigma_service_cta_enable	 = isset( $service_details['sigma_service_cta_enable'] ) ? (bool) $service_details['sigma_service_cta_enable'] : '';
		$sigma_service_cta_title  = isset( $service_details['sigma_service_cta_title'] ) ? $service_details['sigma_service_cta_title'] : '';
		$sigma_service_cta_description  = isset( $service_details['sigma_service_cta_description'] ) ? $service_details['sigma_service_cta_description'] : '';
		$sigma_service_features_total = isset($service_details['sigma_service_features_total']) ? (int)$service_details['sigma_service_features_total'] : '';
    $sigma_service_featured_title = isset($service_details['sigma_service_featured_title']) ? $service_details['sigma_service_featured_title'] : '';

		// All metafields
		sigmacore_custom_metafield([
			'type'	=>	'checkbox',
			'name'	=>	'sigma_service_cta_enable',
			'title'	=>	__('Enable Call To Action', 'sigma-core'),
			'description'	=>	__('Check this box if you want to enable the call to action for this service', 'sigma-core'),
			'value'	=>	$sigma_service_cta_enable
		]);
		sigmacore_custom_metafield([
			'type'	=>	'text',
			'name'	=>	'sigma_service_cta_title',
			'title'	=>	__('Call to action Title', 'sigma-core'),
			'value'	=>	$sigma_service_cta_title
		]);
		sigmacore_custom_metafield([
			'type'	=>	'text',
			'name'	=>	'sigma_service_cta_description',
			'title'	=>	__('Call to action description', 'sigma-core'),
			'value'	=>	$sigma_service_cta_description
		]);
		?>
		<div class="sigma-service-metafields-container">
			<div class="sigma-service-content">
				<div class="sigma-service-input-field">
					<label for="kb_service_icon"><?php esc_html_e( 'Service Icon', 'sigma-core' ); ?></label>
					<input class="widefat service-icons" type="text" name="kb_service_icon" value="<?php echo esc_attr( $kb_service_icon ); ?>">
				</div>
			</div>
		</div>
		<div class="sigma_repeater-section sigma-service-repeater-field">
        <label><?php esc_html_e('Features', 'sigma-core'); ?></label>
        <table class="features-table">
            <tr>
                <th><?php esc_html_e('No.', 'sigma-core'); ?></th>
                <th><?php esc_html_e('Title.', 'sigma-core'); ?></th>
                <th><?php esc_html_e('Remove.', 'sigma-core'); ?></th>
            </tr>
            <?php for ($i = 0; $sigma_service_features_total > $i; $i++) { ?>
                <tr>
                    <td class="row-index"><?php echo esc_html($i + 1); ?></td>
                    <td class="sigma_input-field">
                        <input class="sigma_text service-features" type="text" name="sigma_service_featured_title[]" value="<?php echo esc_attr($sigma_service_featured_title[$i]); ?>">
                    </td>
                    <td><a class="service-table-row-remove sigma_link-destructive" href="#"><?php echo esc_html__('Remove', 'sigma-core') ?></a></td>
                </tr>
            <?php } ?>
        </table>
        <input type="hidden" name="sigma_service_features_total"
               value="<?php echo esc_attr($sigma_service_features_total); ?>">
        <span class="button service-table-row-add"><?php echo esc_html__('Add Row', 'sigma-core') ?></span>
    </div>
		<?php
	}
}
if ( ! function_exists( 'sigmacore_service_save_meta_box' ) ) {
	/**
	 * Save service fields content.
	 *
	 * @param int $post_id Post ID.
	 */
	function sigmacore_service_save_meta_box( $post_id ) {
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		if ( ! current_user_can( 'edit_posts' ) ) {
			return;
		}
		if ( ! isset( $_POST['sigma-service-meta-nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['sigma-service-meta-nonce'] ) ), basename( __FILE__ ) ) ) {
			return;
		}
		$service_details                    = array();
		$service_details['kb_service_icon'] = isset( $_POST['kb_service_icon'] ) ? sanitize_text_field( wp_unslash( $_POST['kb_service_icon'] ) ) : '';
		$service_details['sigma_service_cta_enable'] = isset( $_POST['sigma_service_cta_enable'] ) ? sanitize_text_field( wp_unslash( $_POST['sigma_service_cta_enable'] ) ) : '';
		$service_details['sigma_service_cta_title'] = isset( $_POST['sigma_service_cta_title'] ) ? sanitize_text_field( wp_unslash( $_POST['sigma_service_cta_title'] ) ) : '';
		$service_details['sigma_service_cta_description'] = isset( $_POST['sigma_service_cta_description'] ) ? sanitize_text_field( wp_unslash( $_POST['sigma_service_cta_description'] ) ) : '';
		$service_details['sigma_service_features_total'] = isset($_POST['sigma_service_features_total']) ? sanitize_text_field(wp_unslash($_POST['sigma_service_features_total'])) : '';
    $service_details['sigma_service_featured_title'] = isset($_POST['sigma_service_featured_title']) ? wp_unslash($_POST['sigma_service_featured_title']) : '';
		update_post_meta( $post_id, 'sigma_service_details', $service_details );
	}
}
add_action( 'save_post', 'sigmacore_service_save_meta_box' );
