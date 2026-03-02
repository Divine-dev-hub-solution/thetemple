<?php
/**
 * Volunteer shortcode style 2 template file.
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
<div class="sigma_volunteer volunteer-5">
                  <div class="sigma_volunteer-thumb">
                    <?php
            				if (has_post_thumbnail()) {
            					the_post_thumbnail( $thumb_size, array( 'class'	=>	'sigma-volunteer-image' ) );
            				}
                    	if ( ( isset( $volunteer_details[ 'sigma_volunteer_socials_icon' ] ) && $volunteer_details[ 'sigma_volunteer_socials_icon' ] ) && ( isset( $volunteer_details[ 'sigma_volunteer_socials_total' ] ) && $volunteer_details[ 'sigma_volunteer_socials_total' ] ) ) {
            				?>
                    <ul class="sigma_sm">
                      <li> <a href="#" class="trigger-volunteer-socials"> <i class="fal fa-plus"></i> </a> </li>
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
                  <div class="sigma_volunteer-body">
                    <div class="sigma_volunteer-info">
                      <?php 	if ( isset( $volunteer_details[ 'sigma_volunteer_designation' ] ) && $volunteer_details[ 'sigma_volunteer_designation' ] ) { ?>
                      <p><?php echo esc_html( $volunteer_details[ 'sigma_volunteer_designation' ] ); ?></p>
                    <?php } ?>
                      <h5><a href="<?php echo esc_attr( get_post_permalink( $post->ID ) ); ?>" class="volunteer-title-link"><?php echo esc_html( $post->post_title ); ?></a></h5>
                    </div>
                  </div>
                </div>
