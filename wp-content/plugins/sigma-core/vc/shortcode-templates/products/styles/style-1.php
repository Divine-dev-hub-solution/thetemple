<?php
/**
 * Products shortcode style 1 template file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $post, $sigma_shortcodes;
$atts = $sigma_shortcodes[ 'sigma_products' ][ 'atts' ];
$slide_classes  = 'sigma-post-slide';
$product = wc_get_product($post->ID);
$id = $product->get_id();
?>
<div class="woocommerce">
<div class="product sigma_product style-1">
  <div class="sigma_product-inner">
    <?php
    if( function_exists('maharatri_product_badges') && $atts['show_featured_badge'] == 'true' ){
      maharatri_product_badges();
    }
    ?>
    <div class="sigma_product-thumb">
      <div class="sigma_product-controls">
          <?php do_action('maharatri/product/controls'); ?>
      </div>
      <?php
      if($atts['show_sale'] == 'true'){
        woocommerce_show_product_loop_sale_flash();
      }
        ?>
      <a href="<?php echo esc_url(get_the_permalink($id)) ?>">
        <?php echo $product->get_image('maharatri-product'); ?>
      </a>
      <?php
      if($atts['show_ratings'] == 'true'){
        woocommerce_template_loop_rating();
      }
      ?>
    </div>
    <div class="sigma_product-body">
        <h5 class="sigma_product-title"> <a href="<?php echo esc_url(get_the_permalink($id)) ?>"> <?php echo esc_html($product->get_name()); ?> </a> </h5>
        <div class="sigma_product-body-meta">
          <?php
          if($atts['show_price'] == 'true'){
            woocommerce_template_loop_price();
          }
          ?>
        </div>

        <?php if($atts['show_excerpt'] == 'true' && function_exists('maharatri_custom_excerpt')){ ?>
        <p><?php echo esc_html(maharatri_custom_excerpt($atts['excerpt_length'])) ?></p>
        <?php } ?>
    </div>
  </div>
</div>
</div>
