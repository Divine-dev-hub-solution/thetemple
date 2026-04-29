<?php
/**
 * Youtube Playlist shortcode style 1 template file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $sigma_shortcodes;
$atts = $sigma_shortcodes[ 'sigma_youtube_playlist' ][ 'atts' ];

if(function_exists('maharatri_get_option')) {
  $youtube_api = maharatri_get_option('youtube_api');
}

$playlist_video_count = isset($atts['playlist_count']) && !empty($atts['playlist_count']) && is_numeric($atts['playlist_count']) ? $atts['playlist_count'] : 4;

$playlistID = isset($atts['playlist_id']) ? $atts['playlist_id'] : '';

$data_attributes = '{ "api":"'.$youtube_api.'", "playlistID": "'.$playlistID.'", "maxResults":"'.$playlist_video_count.'"}';

  if(!empty($playlistID) && !empty($youtube_api)){
?>
      <div class="sigma_video-popup-wrap sigma_youtube-playlist" data-attributes="<?php echo esc_js($data_attributes); ?>">
        <div class="sigma_youtube-playlist-content-slider">
        </div>
      </div>
<?php } else {
  echo '<p>'.esc_html__('You must first enter an API and a playlist ID before you can display a playlist', 'sigma-core').'</p>';
}
