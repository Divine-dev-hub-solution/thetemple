<?php
/**
 * Template part for header layout 3.
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
<!-- Middle Header Start -->
<div class="sigma_header-middle">
  <nav class="navbar">
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
    <?php	maharatri_nav_menu();
    // Site logo
    get_template_part( 'template-parts/header/elements/logo' );
    ?>
    <!-- Button & Phone -->
    <div class="sigma_header-controls sigma_header-button">
      <?php
      // contact info
      get_template_part( 'template-parts/header/elements/contact-info' );
      if(maharatri_get_option('display_cta') == true) {
      // cta
      get_template_part( 'template-parts/header/elements/call-to-action' );
      }
      // header cart
      get_template_part( 'template-parts/header/elements/cart' );
      ?>
    </div>
    <!-- Controls -->
    <div class="sigma_header-controls style-1">
      <?php get_template_part( 'template-parts/header/elements/search' ); ?>
    </div>
  </nav>
</div>
<!-- Middle Header End -->
