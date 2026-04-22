<?php
/**
 * Template part for header layout 5.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Maharatri
 */
?>
<?php
// mobile sidebar
get_template_part( 'template-parts/header/elements/mobile-sidebar' );
?>
  <?php if(maharatri_get_option('display_top_header') == true) { ?>
    <!-- Top Header Start -->
    <div class="sigma_header-top">
      <div class="container">
        <div class="sigma_header-top-inner">
          <?php
            // contact info
            get_template_part( 'template-parts/header/elements/contact-info' );

            // top menu
            if(maharatri_get_option('display-header-top-menu') == true) {
              maharatri_nav_menu('top-menu');
            }

            if(maharatri_get_option('display-livestream-status') == true) {
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

      			<?php } }
            // social links
            if(maharatri_get_option('display_top_sm') == true) {
              // social info
              get_template_part( 'template-parts/header/elements/social-info' );
            }
          ?>
        </div>
      </div>
    </div>
    <!-- Top Header End -->
  <?php } ?>
    <!-- Middle Header Start -->
    <div class="sigma_header-middle">
      <div class="container">
        <nav class="navbar">
          <?php
          // Site logo
          get_template_part( 'template-parts/header/elements/logo' );
          // navigation
          maharatri_nav_menu();

          if(maharatri_get_option('display_info_cta') == true) {
            // call to action info
            get_template_part( 'template-parts/header/elements/cta-info' );
          }
          // header cart
          get_template_part( 'template-parts/header/elements/cart' );
          ?>
          <!-- Controls -->
          <div class="sigma_header-controls style-2">
            <ul class="sigma_header-controls-inner">
              <?php if(maharatri_get_option('display-collapse-sidebar-icon') == true) { ?>
              <li class="aside-toggler style-2 aside-trigger-right desktop-toggler">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
              </li>
              <?php } ?>
              <!-- Mobile Toggler -->
              <li class="aside-toggler style-2 aside-trigger-left">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </div>
    <!-- Middle Header End -->
