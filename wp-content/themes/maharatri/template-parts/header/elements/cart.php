<?php
/**
 * Template part for header cart.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Maharatri
 */
 $header_cart_enable = maharatri_get_option('display-header-cart');
 $header_wishlist_enable = maharatri_get_option('display-header-wishlist');
 $header_cart_style = maharatri_get_option('header_cart_style');
 $display_user = maharatri_get_option('display-user-icon');
 $header_layout = maharatri_get_option('header-layout');
 $header_prayer_btn = maharatri_get_option('display-header-prayer-icon');
if($header_cart_enable == true || $header_wishlist_enable == true || $display_user == true) {
?>
  <div class="cart dropdown-btn">
    <?php if(($header_layout == 'layout-3' || $header_layout == 'layout-4' || $header_layout == 'layout-5') && $header_prayer_btn == true) { ?>
      <a href="<?php echo get_post_type_archive_link( 'prayer' ); ?>" class="d-none d-sm-flex align-items-center prayer-icon">
        <i class="fal fa-gopuram"></i>
      </a>
    <?php } ?>
    <?php if($header_cart_enable == true && class_exists('WooCommerce')) { ?>
      <a class="sigma_header-cart-inner" href="<?php echo esc_url(wc_get_cart_url()) ?>" title="<?php echo esc_attr__('Your Cart', 'maharatri') ?>">
        <i class="far fa-shopping-basket"></i>
        <div class="sigma_header-cart-content">
          <span class="sigma_header-cart-count">
            <?php echo sprintf ( _n( '%d', '%d', WC()->cart->get_cart_contents_count(), 'maharatri' ), WC()->cart->get_cart_contents_count() ); ?>
          </span>
        </div>
      </a>
    <?php } if($header_wishlist_enable && class_exists( 'YITH_WCWL' ) && ($header_layout == 'layout-4' || $header_layout == 'layout-5')) {
        $wishlist_count = YITH_WCWL()->count_products();
       ?>
       <?php
             $wishlist_count = YITH_WCWL()->count_products();
           ?>
           <div class="header-wishlist-count">
             <a href="<?php echo get_permalink(get_option('yith_wcwl_wishlist_page_id')); ?>">
               <i class="far fa-heart"></i>
               <span class="wishlist-item"><?php echo esc_html($wishlist_count); ?></span>
             </a>
           </div>
      <?php }
      if($display_user){ ?>
        <div class="user-control">
          <a href="<?php echo esc_url(get_permalink( get_option('woocommerce_myaccount_page_id') )); ?>" title="<?php echo esc_attr__('My Account', 'maharatri') ?>">
            <i class="fal fa-user"></i>
          </a>
      </div>
      <?php } ?>
  </div>
<?php } ?>
