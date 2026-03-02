<?php
/**
 * Clients shortcode template file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $post, $sigma_shortcodes;

$atts        = $sigma_shortcodes[ 'sigma_volunteer' ][ 'atts' ];
$volunteer_details = get_post_meta( get_the_ID(), 'sigma_volunteer_details', true );

$thumb_size = function_exists('maharatri_get_thumb_size') ? maharatri_get_thumb_size('maharatri-volunteer') : 'maharatri-volunteer';
?>
<div class="sigma-volunteer-slide">
	<div class="sigma-volunteer-wrapper">
		<div class="sigma-volunteer-thumbnail-wrapper">

			<div class="sigma-volunteer-image-container">
				<?php
				if (has_post_thumbnail()) {
					the_post_thumbnail( $thumb_size, array( 'class'	=>	'sigma-volunteer-image' ) );
				}
				?>
				<?php
				if ( ( isset( $volunteer_details[ 'sigma_volunteer_socials_icon' ] ) && $volunteer_details[ 'sigma_volunteer_socials_icon' ] ) && ( isset( $volunteer_details[ 'sigma_volunteer_socials_total' ] ) && $volunteer_details[ 'sigma_volunteer_socials_total' ] ) ) {
					?>
					<div class="sigma-volunteer-social-profiles-container">
						<ul class="sigma-volunteer-social-profiles">
							<li class="sigma-volunteer-social-profile share-main">
								<a href="#">
									<i class="fas fa-plus"></i>
								</a>
							</li>
							<?php
							for ( $i = 0; $volunteer_details[ 'sigma_volunteer_socials_total' ] > $i; $i++ ) {
								if ( isset( $volunteer_details[ 'sigma_volunteer_socials_link' ][$i] ) && isset( $volunteer_details[ 'sigma_volunteer_socials_icon' ][$i] ) ) {
									?>
									<li class="sigma-volunteer-social-profile">
										<a href="<?php echo esc_url( $volunteer_details[ 'sigma_volunteer_socials_link' ][$i] ); ?>" target="_blank">
											<i class="<?php echo esc_attr( $volunteer_details[ 'sigma_volunteer_socials_icon' ][$i] ); ?>"></i>
										</a>
									</li>
									<?php
								}
							}
							?>

						</ul>
					</div>
					<?php
				}?>
			</div>
		</div>
		<div class="sigma-volunteer-content-cover">
			<div class="sigma-volunteer-title">
				<h3 class="volunteer-title">
					<a href="<?php echo esc_attr( get_post_permalink( $post->ID ) ); ?>" class="volunteer-title-link"><?php echo esc_html( $post->post_title ); ?></a>
				</h3>
			</div>
			<?php
			if ( isset( $volunteer_details[ 'sigma_volunteer_designation' ] ) && $volunteer_details[ 'sigma_volunteer_designation' ] ) {
				?>
				<div class="sigma-volunteer-designation-container">
					<h5 class="sigma-volunteer-designation"><?php echo esc_html( $volunteer_details[ 'sigma_volunteer_designation' ] ); ?></h5>
				</div>
				<?php
			}?>
		</div>
	</div>
</div>
