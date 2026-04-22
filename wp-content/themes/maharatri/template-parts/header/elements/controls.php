<?php
/**
 * Template part for header controls
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Maharatri
 */
 $display_search = maharatri_get_option('display-search-icon');
 $display_user = maharatri_get_option('display-user-icon');
 $display_sidepanel = maharatri_get_option('display-collapse-sidebar-icon') && is_active_sidebar('header-collapse-sidebar');
?>
<?php if( $display_search || $display_user || $display_sidepanel ){ ?>
<div class="header-controls">
  <?php if($display_user){ ?>
  <div class="user-control">
    <a href="<?php echo esc_url(get_permalink( get_option('woocommerce_myaccount_page_id') )); ?>" title="<?php echo esc_attr__('My Account', 'maharatri') ?>">
      <i class="fal fa-user"></i>
    </a>
  </div>
  <?php } ?>
  <?php if( $display_sidepanel ){ ?>
  <div class="panel-control">
    <div class="burger-icon aside-trigger">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
  <?php } ?>
</div>
<?php } ?>
