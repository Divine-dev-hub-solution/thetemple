<?php
/**
 * Template part for header contact information.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Maharatri
 */
$contact_email   = maharatri_get_option('contact_email');
$contact_phone   = maharatri_get_option('contact_phone');
$contact_address = maharatri_get_option('contact_address');
$header_contact_info_phone = maharatri_get_option('header_contact_info_phone');
$header_contact_info_email = maharatri_get_option('header_contact_info_email');
$header_contact_info_address = maharatri_get_option('header_contact_info_address');
$header_layout = !empty(maharatri_get_option('header-layout')) ? maharatri_get_option('header-layout') : 'layout-1';
if ( empty( $contact_email ) && empty( $contact_phone ) && empty( $contact_address ) ) {
	return;
}
if($header_layout == 'layout-3') {
	if ( $contact_phone && $header_contact_info_phone == true) {
		?>
		<a href="<?php echo esc_attr( 'tel:' . str_replace( ' ', '', $contact_phone ) ); ?>" class="sigma_header-contact">
			<i class="fal fa-phone"></i>
			<div class="sigma_header-contact-inner">
				<span><?php esc_html_e( 'Get Support', 'maharatri' ); ?></span>
				<h6><?php echo esc_html( $contact_phone ); ?></h6>
			</div>
		</a>
	<?php } if ( $contact_email && $header_contact_info_email == true) { ?>
		<a href="<?php echo esc_attr( 'mailto:' . $contact_email ); ?>" class="sigma_header-contact">
			<i class="flaticon-email"></i>
			<div class="sigma_header-contact-inner">
				<span><?php esc_html_e( 'Connect Us', 'maharatri' ); ?></span>
				<h6><?php echo esc_html( $contact_email ); ?></h6>
			</div>
		</a>
	<?php } if ( $contact_address && $header_contact_info_address == true) { ?>
		<div class="sigma_header-contact">
			<i class="fal fa-paper-plane"></i>
			<div class="sigma_header-contact-inner">
				<span><?php esc_html_e( 'Locate', 'maharatri' ); ?></span>
				<h6><?php echo esc_html( $contact_address ); ?></h6>
			</div>
		</div>
	<?php } } elseif($header_layout == 'layout-4' || $header_layout == 'layout-5'){ ?>
	<div class="sigma_header-top">
		<div class="sigma_header-top-inner">
			<ul class="sigma_header-top-links">
				<?php if ( $contact_phone ) { ?>
					<li class="menu-item"> <a href="<?php echo esc_attr( 'tel:' . str_replace( ' ', '', $contact_phone ) ); ?>"> <i class="fal fa-phone"></i> <?php echo esc_html( $contact_phone ); ?></a> </li>
				<?php } if ( $contact_email ) { ?>
					<li class="menu-item"> <a href="<?php echo esc_attr( 'mailto:' . $contact_email ); ?>"> <i class="fal fa-envelope"></i> <?php echo esc_html( $contact_email ); ?></a> </li>
				<?php }  if ( $contact_address ) { ?>
				<li class="menu-item"> <span><i class="fal fa-map-marker-alt"></i> <?php echo esc_html( $contact_address ); ?></span> </li>
			<?php } ?>
			</ul>
			<?php if($header_layout == 'layout-4') { ?>
			<?php if(maharatri_get_option('display-header-top-menu') == true) {
				 maharatri_nav_menu('top-menu');
			 } ?>
			<?php if(maharatri_get_option('display-livestream-status') == true) {
				if(!empty(maharatri_get_option('livestream_link'))) {
					$stream_link_type = (maharatri_get_option('livestream-header-link-type') == 'popup') ? 'sigma_video-btn popup-video' : '';
					$stream_title  = !empty(maharatri_get_option('livestream_title')) ? maharatri_get_option('livestream_title') : maharatri_get_livestream_status();
					echo '<div class="sigma_base-livestream-status '.esc_attr(maharatri_get_livestream_status()).'">
									<span><a href="'. esc_url(maharatri_get_option('livestream_link')) .'" class="'.esc_attr($stream_link_type).'">'.esc_html($stream_title).'</a></span>
								</div>';
				} else {
				?>
					<div class="sigma_base-livestream-status <?php echo esc_attr(maharatri_get_livestream_status()); ?>">
							<span><?php echo esc_html(maharatri_get_livestream_status()); ?></span>
					</div>
			<?php } } } ?>
		</div>
	</div>
<?php } else { ?>
<div class="contact-info">
	<?php
	if ( $contact_phone ) {
		?>
		<div class="contact-phone contact-item">
			<a href="<?php echo esc_attr( 'tel:' . str_replace( ' ', '', $contact_phone ) ); ?>" title="<?php echo esc_attr__('Call us', 'maharatri') ?>"><i class="fal fa-phone skincolor"></i></a>
			<div class="contact-list">
				<span class="contact-label"><?php esc_html_e( 'Call Now', 'maharatri' ); ?></span>
				<span class="contact-value">
					<a href="<?php echo esc_attr( 'tel:' . str_replace( ' ', '', $contact_phone ) ); ?>"><?php echo esc_html( $contact_phone ); ?></a>
				</span>
			</div>
		</div>
		<?php
	}
	if ( $contact_email ) {
		?>
		<div class="contact-email contact-item">
			<a href="<?php echo esc_attr( 'mailto:' . $contact_email ); ?>" title="<?php echo esc_attr__('Email us', 'maharatri') ?>"><i class="fal fa-envelope skincolor"></i></a>
			<div class="contact-list">
				<span class="contact-label"><?php esc_html_e( 'Email', 'maharatri' ); ?></span>
				<span class="contact-value">
					<a href="<?php echo esc_attr( 'mailto:' . $contact_email ); ?>"><?php echo esc_html( $contact_email ); ?></a>
				</span>
			</div>
		</div>
		<?php
	}
	if ( $contact_address ) {
		?>
		<div class="contact-address contact-item">
			<i class="fal fa-map skincolor"></i>
			<div class="contact-list">
				<span class="contact-label"><?php esc_html_e( 'Address', 'maharatri' ); ?></span>
				<span class="contact-value"><?php echo esc_html( $contact_address ); ?></span>
			</div>
		</div>
		<?php
	}
	?>
</div>
<?php } ?>
