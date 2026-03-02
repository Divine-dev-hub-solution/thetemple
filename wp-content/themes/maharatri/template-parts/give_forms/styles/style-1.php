<?php
/**
 * Template part for displaying donation items
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Maharatri
 */
 global $post;
$form = new Give_Donate_Form(get_the_ID());
$donate_id = $form->ID;
$maharatri_earn = intval($form->get_earnings());
$maharatri_goal = $form->get_goal() ? intval( $form->get_goal() ) : 0 ;
$progress = !empty( $maharatri_goal ) ? round(($maharatri_earn / $maharatri_goal) * 100, 2) : 0;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('sigma_donation sigma-donation-style-1 sigma-donation-wrapper'); ?>>
  <?php if(has_post_thumbnail()) { ?>
    <div class="donation-post-thumb">
      <?php the_post_thumbnail( maharatri_get_thumb_size('maharatri-blog') ) ?>
    </div>
  <?php } ?>
  <div class="sigma_donation-body">
    <h3 class="sigma_donation-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    <p class="sigma_donation-excerpt">
      <?php
      $give_form_content = get_post_meta(get_the_ID(), '_give_form_content', true);
      echo maharatri_custom_excerpt(20, $give_form_content);
      ?>
    </p>
    <div class="signa_donation-collection">
      <p class="collected"><label><?php echo esc_html__('Raised:', 'maharatri'); ?></label>
        <span><?php echo give_currency_filter($maharatri_earn, $donate_id); ?></span>
      </p>
      <p class="target">
        <label><?php echo esc_html__('Goal:', 'maharatri'); ?></label>
        <span><?php echo give_currency_filter($maharatri_goal, $donate_id); ?></span>
      </p>
    </div>
    <div class="progress">
      <div class="progress-bar" role="progressbar" style="width: <?php echo esc_attr($progress); ?>%" aria-valuenow="<?php echo esc_attr($progress); ?>" aria-valuemin="0" aria-valuemax="100">
        <span><?php echo esc_html($progress .'%'); ?></span>
      </div>
    </div>
    <a class="sigma_donation-btn sigma_btn-custom" href="<?php the_permalink(); ?>"><?php echo esc_html__('Donate Now', 'maharatri'); ?></a>
  </div>
</article>
