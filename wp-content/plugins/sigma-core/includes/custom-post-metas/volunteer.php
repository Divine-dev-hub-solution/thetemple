<?php

/**
 * Register metafields for volunteer.
 *
 * @package Sigma Core
 */
function sigmacore_volunteer_details_metafields() {
	add_meta_box( 'sigma_volunteer_details', __( 'Volunteer Details', 'sigma-core' ), 'sigmacore_volunteer_details_metafields_callback', 'volunteer', 'advanced' );
}
add_action( 'add_meta_boxes', 'sigmacore_volunteer_details_metafields', 2 );

if ( ! function_exists( 'sigmacore_volunteer_details_callback' ) ) {
	/**
	 * Volunteer meta fields display callback.
	 *
	 * @param WP_Post $post Current post object.
	 */
	function sigmacore_volunteer_details_metafields_callback( $post ) {
		global $post;

		wp_nonce_field( basename( __FILE__ ), 'sigma-volunteer-meta-nonce' );

		$volunteer_details                = get_post_meta( $post->ID, 'sigma_volunteer_details', true );
		$sigma_volunteer_designation   = isset( $volunteer_details['sigma_volunteer_designation'] ) ? $volunteer_details['sigma_volunteer_designation'] : '';
		$sigma_volunteer_email         = isset( $volunteer_details['sigma_volunteer_email'] ) ? $volunteer_details['sigma_volunteer_email'] : '';
		$sigma_volunteer_phone_number  = isset( $volunteer_details['sigma_volunteer_phone_number'] ) ? $volunteer_details['sigma_volunteer_phone_number'] : '';
		$sigma_volunteer_address_info  = isset( $volunteer_details['sigma_volunteer_address_info'] ) ? $volunteer_details['sigma_volunteer_address_info'] : '';
		$sigma_volunteer_website       = isset( $volunteer_details['sigma_volunteer_website'] ) ? $volunteer_details['sigma_volunteer_website'] : '';

		$sigma_volunteer_socials_total = isset( $volunteer_details['sigma_volunteer_socials_total'] ) ? (int) $volunteer_details['sigma_volunteer_socials_total'] : '';
		$sigma_volunteer_socials_link  = isset( $volunteer_details['sigma_volunteer_socials_link'] ) ? $volunteer_details['sigma_volunteer_socials_link'] : '';
		$sigma_volunteer_socials_icon  = isset( $volunteer_details['sigma_volunteer_socials_icon'] ) ? $volunteer_details['sigma_volunteer_socials_icon'] : '';

		sigmacore_custom_metafield([
			'type'	=>	'text',
			'name'	=>	'sigma_volunteer_designation',
			'title'	=>	__('Designation', 'sigma-core'),
			'description'	=>	__('Assign the volunteer designation', 'sigma-core'),
			'value'	=>	$sigma_volunteer_designation
		]);
		sigmacore_custom_metafield([
			'type'	=>	'text',
			'name'	=>	'sigma_volunteer_email',
			'title'	=>	__('Email', 'sigma-core'),
			'description'	=>	__('Assign the volunteer email', 'sigma-core'),
			'value'	=>	$sigma_volunteer_email
		]);
		sigmacore_custom_metafield([
			'type'	=>	'text',
			'name'	=>	'sigma_volunteer_phone_number',
			'title'	=>	__('Phone Number', 'sigma-core'),
			'description'	=>	__('Assign the volunteer Phone Number', 'sigma-core'),
			'value'	=>	$sigma_volunteer_phone_number
		]);
		sigmacore_custom_metafield([
			'type'	=>	'textarea',
			'name'	=>	'sigma_volunteer_address_info',
			'title'	=>	__('Address Info', 'sigma-core'),
			'description'	=>	__('Assign the volunteer address info', 'sigma-core'),
			'value'	=>	$sigma_volunteer_address_info
		]);
		sigmacore_custom_metafield([
			'type'	=>	'text',
			'name'	=>	'sigma_volunteer_website',
			'title'	=>	__('Website', 'sigma-core'),
			'description'	=>	__('Assign the volunteer website', 'sigma-core'),
			'value'	=>	$sigma_volunteer_website
		]);

		?>

		<div class="sigma_repeater-section sigma-volunteer-repeater-field">
			<label><?php esc_html_e( 'Social Profiles', 'sigma-core' ); ?></label>
			<table class="volunteer-social-icon-table">
				<tr>
					<th><?php esc_html_e( 'No.', 'sigma-core' ); ?></th>
					<th><?php esc_html_e( 'Icon.', 'sigma-core' ); ?></th>
					<th><?php esc_html_e( 'Link.', 'sigma-core' ); ?></th>
					<th><?php esc_html_e( 'Remove.', 'sigma-core' ); ?></th>
				</tr>
			<?php for ( $i = 0; $sigma_volunteer_socials_total > $i; $i++ ) { ?>
				<tr>
					<td class="row-index"><?php echo esc_html( $i + 1 ); ?></td>
					<td class="sigma_input-field">
						<input class="sigma_text volunteer-social-icons" type="text" name="sigma_volunteer_socials_icon[]" value="<?php echo esc_attr( $sigma_volunteer_socials_icon[ $i ] ); ?>">
					</td>
					<td class="sigma_input-field">
						<input class="sigma_text" type="text" name="sigma_volunteer_socials_link[]" value="<?php echo esc_attr( $sigma_volunteer_socials_link[ $i ] ); ?>">
					</td>
					<td><a class="volunteer-table-row-remove sigma_link-destructive" href="#"><?php echo __('Remove', 'sigma-core') ?></a></td>
				</tr>
				<?php } ?>
			</table>
			<input type="hidden" name="sigma_volunteer_socials_total" value="<?php echo esc_attr( $sigma_volunteer_socials_total ); ?>">
			<span class="button volunteer-table-row-add"><?php echo __('Add Row', 'sigma-core') ?></span>
		</div>

		<?php
	}
}

/**
 * Save volunteer fields content.
 *
 * @param int $post_id Post ID.
 */
function sigmacore_volunteer_details_save_meta_box( $post_id ) {


		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		if ( ! current_user_can( 'edit_posts' ) ) {
			return;
		}
		if ( ! isset( $_POST['sigma-volunteer-meta-nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['sigma-volunteer-meta-nonce'] ) ), basename( __FILE__ ) ) ) {
			return;
		}


	$volunteer_details                                = array();
	$volunteer_details['sigma_volunteer_designation']   = isset( $_POST['sigma_volunteer_designation'] ) ? sanitize_text_field( wp_unslash( $_POST['sigma_volunteer_designation'] ) ) : '';
	$volunteer_details['sigma_volunteer_email']         = isset( $_POST['sigma_volunteer_email'] ) ? sanitize_text_field( wp_unslash( $_POST['sigma_volunteer_email'] ) ) : '';
	$volunteer_details['sigma_volunteer_phone_number']  = isset( $_POST['sigma_volunteer_phone_number'] ) ? sanitize_text_field( wp_unslash( $_POST['sigma_volunteer_phone_number'] ) ) : '';
	$volunteer_details['sigma_volunteer_address_info']  = isset( $_POST['sigma_volunteer_address_info'] ) ? sanitize_text_field( wp_unslash( $_POST['sigma_volunteer_address_info'] ) ) : '';
	$volunteer_details['sigma_volunteer_website']       = isset( $_POST['sigma_volunteer_website'] ) ? sanitize_text_field( wp_unslash( $_POST['sigma_volunteer_website'] ) ) : '';

	$volunteer_details['sigma_volunteer_socials_total'] = isset( $_POST['sigma_volunteer_socials_total'] ) ? sanitize_text_field( wp_unslash( $_POST['sigma_volunteer_socials_total'] ) ) : '';
	$volunteer_details['sigma_volunteer_socials_icon']  = isset( $_POST['sigma_volunteer_socials_icon'] ) ? wp_unslash( $_POST['sigma_volunteer_socials_icon'] ) : '';
	$volunteer_details['sigma_volunteer_socials_link']  = isset( $_POST['sigma_volunteer_socials_link'] ) ? wp_unslash( $_POST['sigma_volunteer_socials_link'] ) : '';

	update_post_meta( $post_id, 'sigma_volunteer_details', $volunteer_details );
}
add_action( 'save_post', 'sigmacore_volunteer_details_save_meta_box' );
