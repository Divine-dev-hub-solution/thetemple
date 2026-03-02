<?php
/**
 * Template part for displaying services
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Maharatri
 */
$volunteer_details = get_post_meta( get_the_ID(), 'sigma_volunteer_details', true );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('sigma-volunteer sigma-volunteer-wrapper sigma-volunteer-style-2'); ?>>
	<div class="sigma-volunteer-image-container">
		<?php
		if (has_post_thumbnail()) {
			the_post_thumbnail( 'medium', array( 'class'	=>	'sigma-volunteer-image' ) );
		}
		?>
	</div>
	<div class="sigma-volunteer-content-cover">
		<h3 class="volunteer-title">
			<a href="<?php echo esc_attr( get_post_permalink() ); ?>" class="volunteer-title-link"><?php echo get_the_title(); ?></a>
		</h3>
		<?php if ( isset( $volunteer_details[ 'sigma_volunteer_designation' ] ) && $volunteer_details[ 'sigma_volunteer_designation' ] ) { ?>
			<span class="sigma-volunteer-designation"><?php echo esc_html( $volunteer_details[ 'sigma_volunteer_designation' ] ); ?></span>
		<?php } ?>
		<p> <?php echo maharatri_custom_excerpt(20); ?> </p>
		<?php if ( ( isset( $volunteer_details[ 'sigma_volunteer_socials_icon' ] ) && $volunteer_details[ 'sigma_volunteer_socials_icon' ] ) && ( isset( $volunteer_details[ 'sigma_volunteer_socials_total' ] ) && $volunteer_details[ 'sigma_volunteer_socials_total' ] ) ) { ?>
			<ul class="sigma-volunteer-social-profiles">
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
		<?php } ?>
	</div>
</article>
