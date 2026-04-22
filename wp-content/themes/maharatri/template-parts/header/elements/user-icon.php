<?php
/**
 * Template part for header user icon
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Maharatri
 */
 $display_user = maharatri_get_option('display-user-icon');
?>
<?php if($display_user){ ?>
  <div class="user-control">
    <a href="<?php echo esc_url(get_permalink( get_option('woocommerce_myaccount_page_id') )); ?>" title="<?php echo esc_attr__('My Account', 'maharatri') ?>">
      <i class="fal fa-user"></i>
    </a>
</div>
<?php } ?>
