<?php
/**
 * Template part for header layout 2.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Maharatri
 */
?>
<?php if( maharatri_get_option('display_top_header') ){ ?>
<div class="site-header-top">
  <div class="container">
    <div class="site-header-top-inner">
      <?php
      // Social media
      if( maharatri_get_option('display_top_sm') ){
        get_template_part( 'template-parts/header/elements/social-info' );
      }
      // Call to action button
      get_template_part( 'template-parts/header/elements/button' );
      ?>
    </div>
  </div>
</div>
<?php } ?>
<div class="site-header-bottom">
  <div class="container">
    <div class="site-header-bottom-inner">
      <?php
      // Site logo
      get_template_part( 'template-parts/header/elements/logo' );
      maharatri_nav_menu();
      // Contact info
      get_template_part( 'template-parts/header/elements/controls' );
      // header cart
      get_template_part( 'template-parts/header/elements/cart' );
      ?>
      <!-- Mobile Aside trigger -->
      <div class="burger-icon aside-m-trigger">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
</div>
