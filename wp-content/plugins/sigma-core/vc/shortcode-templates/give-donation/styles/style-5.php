<?php
/**
 * Template part for displaying donation style 2 items
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
 $progress_bar_data_color = !empty(maharatri_get_option('primary_color')) ? maharatri_get_option('primary_color') : '#7E4555';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('sigma_donation sigma-donation-style-5 sigma-donation-wrapper'); ?>>
  <div class="sigma_donation-body">
    <?php if($atts['show_donation_subtitle'] == 'true' && !empty($atts['donation_subtitle'])) { ?>
        <h6><?php echo esc_html($atts['donation_subtitle']); ?></h6>
    <?php } ?>
      <h3 class="sigma_donation-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
      <?php if ($atts['post_excerpt']== 'true' && function_exists('maharatri_custom_excerpt')) {
          $excerpt_length = !empty($atts['post_excerpt_length']) ? $atts['post_excerpt_length'] : 20;
          $give_form_content = get_post_meta(get_the_ID(), '_give_form_content', true);
          ?>
          <p class="sigma_donation-excerpt"><?php echo esc_html(maharatri_custom_excerpt($excerpt_length, $give_form_content)); ?></p>
          <?php
      } ?>
      <div class="chart-two" data-percent="<?php echo esc_attr( $progress ); ?>"
  				data-size="130"
  				data-track-color= "#efefef"
  				data-bar-color="<?php echo esc_js($progress_bar_data_color); ?>"
  				data-line-width="14"
          data-line-cap = "square"
  				data-track-width="14" 	style="min-width:130px;
  					min-height:130px;
  					width:130px; ">
  					<div class="counter-flex">
  		        <span class="icon countup"><?php echo esc_attr( $progress ); ?></span>
  						<span><?php echo esc_html__('%', 'sigma-core'); ?></span>
  					</div>
      </div>
      <div class="signa_donation-collection">
        <p class="collected"><label><?php echo esc_html__('Raised:', 'sigma-core'); ?></label>
          <span><?php echo give_currency_filter($maharatri_earn, $donate_id); ?></span>
        </p>
        <p class="target">
          <label><?php echo esc_html__('Goal:', 'sigma-core'); ?></label>
          <span><?php echo give_currency_filter($maharatri_goal, $donate_id); ?></span>
        </p>
      </div>
      <a class="sigma_donation-btn sigma_btn-custom" href="<?php the_permalink(); ?>"><?php echo esc_html__('Donate Now', 'sigma-core'); ?></a>
  </div>
</article>
