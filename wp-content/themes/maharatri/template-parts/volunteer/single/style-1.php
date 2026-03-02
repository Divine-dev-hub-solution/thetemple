<?php
/**
 * Template part for displaying volunteer details.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Maharatri
 */
$volunteer_details = get_post_meta( get_the_ID(), 'sigma_volunteer_details', true );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'sigma-volunteer-detail' ); ?>>
	<div class="row">
		<div class="col-lg-5 col-md-12">
			<div class="sigma-volunteer-thumbnail">
				<?php if(has_post_thumbnail()){ ?>
					<div class="post-thumbnail">
						<?php the_post_thumbnail(); ?>
					</div>
				<?php } ?>
			</div>
		</div>
		<div class="col-lg-7 col-md-12">
			<div class="sigma-volunteer-textwrap">
				<div class="sigma-volunteer-details-container">
					<div class="sigma-volunteer-des"> <?php echo maharatri_custom_excerpt(20) ?> </div>
					<?php if ( isset( $volunteer_details[ 'sigma_volunteer_designation' ] ) && $volunteer_details[ 'sigma_volunteer_designation' ] ) { ?>
						<h5><?php echo esc_html($volunteer_details[ 'sigma_volunteer_designation' ]); ?></h5>
					<?php } ?>
					<div class="sigma-volunteer-details">
						<?php
						if ( isset( $volunteer_details['sigma_volunteer_phone_number'] ) && $volunteer_details['sigma_volunteer_phone_number'] ) {
							?>
							<div class="sigma-volunteer-detail sigma-volunteer_phone-number">
								<i class="fas fa-phone"></i>
								<div class="sigma-volunteer-detail-title"><?php echo esc_html__( 'Phone Number :', 'maharatri' ); ?></div>
								<div class="sigma-volunteer-detail-value"><?php echo esc_html( $volunteer_details['sigma_volunteer_phone_number'] ); ?></div>
							</div>
							<?php
						}
						if ( isset( $volunteer_details['sigma_volunteer_email'] ) && $volunteer_details['sigma_volunteer_email'] ) {
							?>
							<div class="sigma-volunteer-detail sigma-volunteer-email">
								<i class="fas fa-envelope"></i>
								<div class="sigma-volunteer-detail-title"><?php echo esc_html__( 'Email :', 'maharatri' ); ?></div>
								<div class="sigma-volunteer-detail-value"><?php echo esc_html( $volunteer_details['sigma_volunteer_email'] ); ?></div>
							</div>
							<?php
						}
						if ( isset( $volunteer_details['sigma_volunteer_website'] ) && $volunteer_details['sigma_volunteer_website'] ) {
							?>
							<div class="sigma-volunteer-detail sigma-volunteer-website">
								<i class="fas fa-globe"></i>
								<div class="sigma-volunteer-detail-title"><?php echo esc_html__( 'Website :', 'maharatri' ); ?></div>
								<div class="sigma-volunteer-detail-value"><a target="_blank" href="<?php echo esc_url( $volunteer_details['sigma_volunteer_website'] ); ?>"><?php echo esc_url( $volunteer_details['sigma_volunteer_website'] ); ?></a></div>
							</div>
							<?php
						}
						if ( isset( $volunteer_details['sigma_volunteer_address_info'] ) && $volunteer_details['sigma_volunteer_address_info'] ) {
							?>
							<div class="sigma-volunteer-detail sigma-volunteer-address-info">
								<i class="fas fa-map-marker-alt"></i>
								<div class="sigma-volunteer-detail-title"><?php echo esc_html__( 'Address Info :', 'maharatri' ); ?></div>
								<div class="sigma-volunteer-detail-value"><?php echo esc_html( $volunteer_details['sigma_volunteer_address_info'] ); ?></div>
							</div>
							<?php
						}
						?>
					</div>
					<div class="sigma-volunteer-link-profiles-container">
						<?php
						if ( ( isset( $volunteer_details['sigma_volunteer_socials_icon'] ) && $volunteer_details['sigma_volunteer_socials_icon'] ) && ( isset( $volunteer_details['sigma_volunteer_socials_total'] ) && $volunteer_details['sigma_volunteer_socials_total'] ) ) {
							?>
							<ul class="sigma-volunteer-link-profiles">
								<?php
								for ( $i = 0; $volunteer_details['sigma_volunteer_socials_total'] > $i; $i++ ) {
									$icon_name = explode( "-" ,$volunteer_details['sigma_volunteer_socials_icon'][$i]);
									?>
									<li class="sigma-volunteer-link-profile">
                    <i class="<?php echo esc_attr( $volunteer_details['sigma_volunteer_socials_icon'][ $i ] ); ?>"></i>
                    <span class="title"><?php  echo esc_html($icon_name['1']); ?></span><a href="<?php echo esc_url( $volunteer_details['sigma_volunteer_socials_link'][ $i ] ); ?>"> <?php echo esc_url( $volunteer_details['sigma_volunteer_socials_link'][ $i ] ); ?></a>
                  </li>
									<?php
								}
								?>
							</ul>
							<?php
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="sigma-volunteer-content">
		<?php the_content(); ?>
	</div>
</article>
<?php
  // Pagination
  maharatri_single_post_pagination();
?>
