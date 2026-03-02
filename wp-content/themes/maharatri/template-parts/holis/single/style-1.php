<?php
/**
 * Template part for displaying holis details.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package maharatri
 */
$holis_details = get_post_meta(get_the_ID(), 'sigma_holis_details', true);

$holis_tagline = maharatri_is_not_empty($holis_details, 'sigma_holis_tagline') ? $holis_details['sigma_holis_tagline'] : '';
$holis_audio_link = maharatri_is_not_empty($holis_details, 'sigma_holis_audio_link') ? $holis_details['sigma_holis_audio_link'] : '';
$holis_video_link = maharatri_is_not_empty($holis_details, 'sigma_holis_video_link') ? $holis_details['sigma_holis_video_link'] : '';
$holis_pdf_link = maharatri_is_not_empty($holis_details, 'sigma_holis_pdf_link') ? $holis_details['sigma_holis_pdf_link'] : '';

$holi_info_class = (maharatri_get_option('show_holis_infobox') == false) ? 'hide-info' : '';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('sigma-holis-details'); ?>>
    <?php if (has_post_thumbnail()) { ?>
        <div class="sigma_post-single-thumb <?php echo esc_attr($holi_info_class); ?>">
            <?php the_post_thumbnail(); ?>
            <?php if(maharatri_get_option('show_holis_infobox') == true) { ?>
            <div class="sigma-holis-style-1">
                <div class="sigma_box">
                    <?php if (!empty($holis_tagline)) { ?>
                        <span class="subtitle"><?php echo esc_html($holis_tagline); ?></span>
                    <?php } ?>
                    <h4 class="title mb-0">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h4>
                    <ul class="sigma_holi-info mb-0">
                        <li>
                            <i class="far fa-user"></i>
                            <?php echo esc_html__('Message From', 'maharatri'); ?>
                            <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"
                               class="author-link"><?php echo get_the_author_meta('display_name'); ?></a>
                        </li>
                        <li class="mt-0 ms-4 holis-date">
                            <?php maharatri_posted_on(); ?>
                        </li>
                    </ul>
                    <ul class="sigma_sm square">
                        <?php
                        if (!empty($holis_video_link)) { ?>
                            <li>
                                <a href="<?php echo esc_url($holis_video_link); ?>" class="link-popup">
                                    <i class="fab fa-youtube"></i>
                                </a>
                            </li>
                        <?php }
                        if (!empty($holis_pdf_link)) { ?>
                            <li>
                                <a href="<?php echo esc_url($holis_pdf_link); ?>" target="_blank">
                                    <i class="far fa-file-pdf"></i>
                                </a>
                            </li>
                        <?php }
                        if (function_exists('sigmacore_posts_share')) {
                          $wrapper_tag = "li";
                            sigmacore_posts_share($wrapper_tag);
                        }
                        ?>
                    </ul>
                    <?php if (!empty($holis_audio_link)) { ?>
                        <audio id="music1">
                            <source src="<?php print esc_url($holis_audio_link); ?>">
                        </audio>
                        <div id="audioplayer1" class="audioplayer">
                            <button id="pButton1" class="play-btn" name="audioplay"></button>
                            <div class="player-timestamp">
                                <span class="timeupdate"
                                      id="timeupdate1"><?php echo esc_html('0:00', 'maharatri'); ?></span>
                                <div id="timeline1" class="timeline">
                                    <div id="playhead1" class="playhead"></div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <?php } ?>
        </div>
    <?php } ?>
    <div class="sigma-holis-content">
        <?php the_content(); ?>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->
<?php
  // Pagination
  maharatri_single_post_pagination();

  // If comments are open or we have at least one comment, load up the comment template.
  if ( comments_open() || get_comments_number() ) :
    comments_template();
  endif;
