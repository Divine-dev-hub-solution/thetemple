<?php
/**
 * Template part for displaying donation style 4 items
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Maharatri
 */
 global $post, $sigma_shortcodes;
 $atts   = $sigma_shortcodes[ 'sigma_give_donation' ][ 'atts' ];
 $form = new Give_Donate_Form(get_the_ID());
 $donate_id = $form->ID;
 $maharatri_earn = intval($form->get_earnings());
 $maharatri_goal = $form->get_goal() ? intval( $form->get_goal() ) : 0 ;
 $progress = !empty( $maharatri_goal ) ? round(($maharatri_earn / $maharatri_goal) * 100, 2) : 0;
 $thumb_size = function_exists('maharatri_get_thumb_size') ? maharatri_get_thumb_size('maharatri-stories') : 'maharatri-blog';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('sigma_donation sigma-donation-style-4 sigma-donation-wrapper'); ?>>
  <?php if(has_post_thumbnail() && $atts['show_thumbnail'] == 'true') { ?>
    <div class="donation-post-thumb">
      <?php the_post_thumbnail( maharatri_get_thumb_size($thumb_size) ) ?>
    </div>
  <?php } ?>
  <div class="progress">
    <div class="progress-bar" role="progressbar" style="width: <?php echo esc_attr($progress); ?>%" aria-valuenow="<?php echo esc_attr($progress); ?>" aria-valuemin="0" aria-valuemax="100">
      <span><?php echo esc_html($progress .'%'); ?></span>
    </div>
  </div>
  <div class="sigma_donation-body">
    <div class="signa_donation-collection">
      <p class="collected"><label><?php echo esc_html__('Raised:', 'sigma-core'); ?></label>
        <span><?php echo give_currency_filter($maharatri_earn, $donate_id); ?></span>
      </p>
      <p class="target">
        <label><?php echo esc_html__('Goal:', 'sigma-core'); ?></label>
        <span><?php echo give_currency_filter($maharatri_goal, $donate_id); ?></span>
      </p>
    </div>
    <h3 class="sigma_donation-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    <?php if ($atts['post_excerpt']== 'true' && function_exists('maharatri_custom_excerpt')) {
        $excerpt_length = !empty($atts['post_excerpt_length']) ? $atts['post_excerpt_length'] : 20;
        $give_form_content = get_post_meta(get_the_ID(), '_give_form_content', true);
        ?>
        <p class="sigma_donation-excerpt"><?php echo esc_html(maharatri_custom_excerpt($excerpt_length, $give_form_content)); ?></p>
        <?php
    } ?>
    <a class="sigma_donation-btn sigma_btn-custom" href="<?php the_permalink(); ?>"><?php echo esc_html__('Donate Now', 'sigma-core'); ?></a>
  </div>
</article>
