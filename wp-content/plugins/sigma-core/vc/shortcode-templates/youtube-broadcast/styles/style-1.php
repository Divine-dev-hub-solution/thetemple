<?php
/**
 * Youtube Broadcast shortcode style 1 template file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $sigma_shortcodes;
$atts = $sigma_shortcodes[ 'sigma_youtube_broadcast' ][ 'atts' ];
if(function_exists('maharatri_get_option')) {
  $youtube_api = maharatri_get_option('youtube_api');
}
$ChannelID = isset($atts['live_channel_id']) ? $atts['live_channel_id'] : '';
  if(!empty($ChannelID) && !empty($youtube_api)){
    $channelInfo = 'https://www.googleapis.com/youtube/v3/search?part=snippet&channelId='.$ChannelID.'&type=video&eventType=live&key='.$youtube_api;
    $extractInfo = file_get_contents($channelInfo);
    $extractInfo = str_replace('},]',"}]",$extractInfo);
    $showInfo = json_decode($extractInfo, true);
    if($showInfo['pageInfo']['totalResults'] !== 0){
      $eventType = "live";
    } else{
      $eventType = "upcoming";
    }
  } else{
    $eventType = "upcoming";
  }
  //Update Status
  if(function_exists('maharatri_update_livestream_status')){
    maharatri_update_livestream_status($eventType);
  }
  $data_attributes = '{ "api":"'.$youtube_api.'", "channelID": "'.$ChannelID.'", "eventType":"'.$eventType.'"}';
  if(!empty($youtube_api)){
  if(isset($atts['live_video_thumbnail_image'])){
  	$image_data = wp_get_attachment_image_src( $atts[ 'live_video_thumbnail_image' ], 'full' );
    $image_url  = ( isset( $image_data[0] ) && $image_data[0] ) ? $image_data[0] : '';
  }
 ?>
    <div class="row no-gutters">
      <div class="col-lg-6">
				<?php if((maharatri_update_livestream_status($eventType) != false && !empty($ChannelID)) && empty($atts['custom_vid_link'])) { ?>
        <div class="sigma_video-popup-wrap sigma_youtube-livestream" data-attributes="<?php echo esc_js($data_attributes); ?>">
          <div class="sigma_youtube-livestream-content-wrapper">
            <?php if(!empty($image_url)) { ?>
              <img src="<?php echo esc_url($image_url); ?>" alt="video">
            <?php } ?>
	            <a href="#" class="sigma_video-popup youtube-popup-trigger">
	              <i class="fas fa-play"></i>
	            </a>
          </div>
        </div>
			<?php } else { ?>
				<div class="sigma_video-popup-wrap sigma_youtube-livestream">
          <div class="sigma_youtube-livestream-content-wrapper">
            <?php if(!empty($image_url)) { ?>
              <img src="<?php echo esc_url($image_url); ?>" alt="video">
            <?php } ?>
	            <a href="<?php echo esc_url($atts['custom_vid_link']); ?>" class="sigma_video-popup youtube-popup-trigger">
	              <i class="fas fa-play"></i>
	            </a>
          </div>
        </div>
			<?php } ?>
      </div>
			<?php if(!empty($atts['live_date']) || $atts['title'] || $atts['description']) { ?>
	      <div class="col-lg-6">
	        <div class="sigma_box m-0 d-flex align-items-center h-100">
	          <div>
	            <?php if(!empty($atts['live_date'])) { ?>
	              <p class="custom-primary mb-0 fw-600 fs-16"><?php echo esc_html($atts['live_date']); ?></p>
	            <?php } if(!empty($atts['title'])) { ?>
	              <h4 class="title"><?php echo esc_html($atts['title']); ?></h4>
	            <?php } if(!empty($atts['description'])) { ?>
	              <p class="m-0"><?php echo esc_html($atts['description']); ?></p>
	            <?php } ?>
	          </div>
	        </div>
	      </div>
			<?php } ?>
    </div>
<?php } else {
  echo '<p>'.esc_html__('You must first enter an API and a channel ID before you can display a live broadcast', 'sigma-core').'</p>';
}
