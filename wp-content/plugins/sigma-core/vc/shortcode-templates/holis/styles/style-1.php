<?php
/**
 * Holis shortcode style 1 template file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
global $post, $sigma_shortcodes;
$atts   = $sigma_shortcodes[ 'sigma_holis' ][ 'atts' ];
$thumb_size = function_exists('maharatri_get_thumb_size') ? maharatri_get_thumb_size('maharatri-blog') : 'maharatri-blog';

$holis_details = get_post_meta(get_the_ID(), 'sigma_holis_details', true);

$holis_tagline = isset($holis_details['sigma_holis_tagline']) ? $holis_details['sigma_holis_tagline'] : '';
$holis_audio_link = isset($holis_details['sigma_holis_audio_link']) ? $holis_details['sigma_holis_audio_link'] : '';
$holis_video_link = isset($holis_details['sigma_holis_video_link']) ? $holis_details['sigma_holis_video_link'] : '';
$holis_pdf_link = isset($holis_details['sigma_holis_pdf_link']) ? $holis_details['sigma_holis_pdf_link'] : '';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('sigma-holis sigma-holis-style-1 sigma-holis-wrapper'); ?>>
    <?php if (has_post_thumbnail() && $atts['show_featured_image'] == 'true') { ?>
        <div class="sigma_holi-image">
            <?php the_post_thumbnail($thumb_size); ?>
        </div>
    <?php } ?>
    <div class="sigma_box">
        <?php if (!empty($holis_tagline)) { ?>
            <span class="subtitle"><?php echo esc_html($holis_tagline); ?></span>
        <?php } ?>
        <h4 class="title mb-0">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h4>
        <ul class="sigma_holi-info mb-0">
            <?php if($atts['show_holi_author'] == 'true') { ?>
            <li>
                <i class="far fa-user"></i>
                <?php echo esc_html__('Message From', 'sigma-core'); ?>
                <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"
                   class="author-link"><?php echo get_the_author_meta('display_name'); ?></a>
            </li>
            <?php } if($atts['show_holi_date'] == 'true') { ?>
            <li class="mt-0 ms-4 holis-date">
                <?php maharatri_posted_on(); ?>
            </li>
            <?php } ?>
        </ul>

        <ul class="sigma_sm square">
            <?php if (!empty($holis_audio_link) && $atts['show_holi_link'] == 'true' && $atts['holi_audio_format'] == 'icon') { ?>
                <li>
                    <a href="<?php echo esc_url($holis_audio_link); ?>" class="link-popup">
                        <i class="fas fa-music"></i>
                    </a>
                </li>
            <?php }
            if (!empty($holis_video_link) && $atts['show_holi_video'] == 'true') { ?>
                <li>
                    <a href="<?php echo esc_url($holis_video_link); ?>"  class="link-popup">
                        <i class="fab fa-youtube"></i>
                    </a>
                </li>
            <?php }
            if (!empty($holis_pdf_link) && $atts['show_holi_pdf'] == 'true') { ?>
                <li>
                    <a href="<?php echo esc_url($holis_pdf_link); ?>" target="_blank">
                        <i class="far fa-file-pdf"></i>
                    </a>
                </li>
            <?php }
            if (function_exists('sigmacore_get_social_share_icons') && $atts['show_holi_link'] == 'true') {

              $social_icons = sigmacore_get_social_share_icons();
              if ( ! empty( $social_icons )) {
                ?>
                <li class="social-icon-share">
                  <a href="javascript:void(0)" class="social-share-button">
          					<i class="fas fa-share-alt mr-1"></i>
          				</a>
                  <ul class="social-share-icons">
                    <?php foreach ( $social_icons as $icon ) { ?>
                      <li class="social-share-icon">
                        <a href="<?php echo esc_url( $icon['link'] ); ?>" class="icon-link" target="popup" onclick="window.open('<?php echo esc_url( $icon['link'] ); ?>','popup','width=600,height=600'); return false;">
                          <i class="<?php echo esc_attr( $icon['icon_class'] ); ?>"></i>
                        </a>
                      </li>
                    <?php } ?>
                  </ul>
                </li>
                <?php
              }
            }

            ?>
        </ul>
        <?php if (!empty($holis_audio_link) && $atts['show_holi_link'] == 'true' && $atts['holi_audio_format'] == 'player') { ?>
            <audio id="music1">
                <source src="<?php print $holis_audio_link; ?>">
            </audio>
            <div id="audioplayer1" class="audioplayer">
                <button id="pButton1" class="play-btn" name="audioplay"></button>
                <div class="player-timestamp">
                    <span class="timeupdate" id="timeupdate1"><?php echo esc_html('0:00', 'sigma-core'); ?></span>
                    <div id="timeline1" class="timeline">
                        <div id="playhead1" class="playhead"></div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</article>
