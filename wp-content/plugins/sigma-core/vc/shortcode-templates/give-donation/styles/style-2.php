<?php
/**
 * Donation shortcode template file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $post, $sigma_shortcodes;
$atts   = $sigma_shortcodes[ 'sigma_give_donation' ][ 'atts' ];
$form = new Give_Donate_Form(get_the_ID());
$donate_id = $form->ID;
$maharatri_earn = intval($form->get_earnings());
$maharatri_goal = $form->get_goal() ? intval( $form->get_goal() ) : 0 ;
$progress = !empty( $maharatri_goal ) ? round(($maharatri_earn / $maharatri_goal) * 100, 2) : 0;
$thumb_size = function_exists('maharatri_get_thumb_size') ? maharatri_get_thumb_size('maharatri-service') : 'maharatri-blog';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('sigma_donation sigma-donation-style-2 sigma-donation-wrapper'); ?>>
  <?php if(has_post_thumbnail() && $atts['show_thumbnail'] == 'true') { ?>
    <div class="donation-post-thumb">
      <?php the_post_thumbnail( maharatri_get_thumb_size('maharatri-service') ) ?>
    </div>
  <?php } ?>
  <div class="sigma_donation-body">
    <h3 class="sigma_donation-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    <?php if ($atts['post_excerpt']== 'true' && function_exists('maharatri_custom_excerpt')) {
        $excerpt_length = !empty($atts['post_excerpt_length']) ? $atts['post_excerpt_length'] : 20;
        $give_form_content = get_post_meta(get_the_ID(), '_give_form_content', true);
        ?>
        <p class="sigma_donation-excerpt"><?php echo esc_html(maharatri_custom_excerpt($excerpt_length, $give_form_content)); ?></p>
        <?php
    } ?>
    <div class="sigma_donation_footer">
      <div class="signa_donation-collection">
        <p class="collected"><label><?php echo esc_html__('Raised:', 'sigma-core'); ?></label>
          <span><?php echo give_currency_filter($maharatri_earn, $donate_id); ?></span>
        </p>
        <p class="target">
          <label><?php echo esc_html__('Goal:', 'sigma-core'); ?></label>
          <span><?php echo give_currency_filter($maharatri_goal, $donate_id); ?></span>
        </p>
        <a class="sigma_donation-btn sigma_btn-custom" href="<?php the_permalink(); ?>"><?php echo esc_html__('Donate Now', 'sigma-core'); ?></a>
      </div>
      <div class="progress-rounded">
				<div class="progress-value"><?php print $progress; ?>%</div>
  				<svg>
  					<circle class="progress-cicle-sm" cx="40" cy="40" r="37" stroke-width="6"
  							fill="none" aria-valuenow="<?php print $progress; ?>" aria-orientation="vertical" role="slider" aria-valuemin="0" aria-valuemax="100"/>
  				</svg>
			</div>
    </div>
  </div>
</article>
