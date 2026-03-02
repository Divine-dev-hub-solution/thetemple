<?php
/**
 * Template part for header layout 6.
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
  <div class="container-fluid">
    <nav class="navbar">
      <!-- Logo Start -->
      <div class="d-block d-lg-none sticky-d-block">
        <?php
        // Site logo
        get_template_part( 'template-parts/header/elements/logo' );
        ?>
      </div>
      <!-- Logo End -->
      <div></div>
      <?php // navigation
      maharatri_nav_menu();
      ?>
      <!-- Controls -->
      <div class="sigma_header-controls style-2">
        <?php
        // header cart
        get_template_part( 'template-parts/header/elements/cart' );
        ?>
        <ul class="sigma_header-controls-inner">
          <?php
            if(maharatri_get_option('display_cta') == true) { ?>
              <div class="d-none d-lg-block">
            <?php // cta
                get_template_part( 'template-parts/header/elements/call-to-action' );
              ?>
            </div>
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
