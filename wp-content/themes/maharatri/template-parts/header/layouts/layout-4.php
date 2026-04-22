<?php
/**
 * Template part for header layout 4.
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
    <?php
    // Site logo
    get_template_part( 'template-parts/header/elements/logo' ); ?>
    <!-- Menu -->
    <div class="sigma_header-inner">
      <?php
      // contact info
      get_template_part( 'template-parts/header/elements/contact-info' );
      // navigation
      maharatri_nav_menu();
      // header cart
      get_template_part( 'template-parts/header/elements/cart' );

      ?>
    </div>
    <!-- Controls -->
    <div class="sigma_header-controls style-2">
    <?php
      if(maharatri_get_option('display_cta') == true) {
      // cta
      get_template_part( 'template-parts/header/elements/call-to-action' );
      }
    ?>
      <ul class="sigma_header-controls-inner">
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
<!-- Middle Header End -->
