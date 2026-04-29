<?php
/**
 * Class used to create blog posts.
 *
 * @package WordPress
 * @subpackage sigma-base
 * @since 1.0.0
 */

class Maharatri_Blog_Post
{

    /**
     * Return attached url from post format link
     *
     * @return string
     *
     * @since 1.0.0
     */

    private static function get_post_attached_url()
    {
        if (!preg_match('/<a\s[^>]*?href=[\'"](.+?)[\'"]/i', get_the_content(), $post_url)) {
            return false;
        }
        return esc_url($post_url[1]);
    }

    /**
     * Return embed media type for post
     *
     * @param array $type - array of embed types(audio/video)
     *
     * @since 1.0.0
     */
    private static function get_embedded_media($type = array())
    {
        $content = do_shortcode(apply_filters('the_content', get_the_content()));
        $embed = get_media_embedded_in_content($content, $type);
        $audio_format_style = maharatri_get_option('audio-format-style', 'default');
        if (in_array('audio', $type) && $audio_format_style == 'default') {
            $output = str_replace('?visual=true', '?visual=false', (isset($embed[0]) ? $embed[0] : ''));
        } else {
            $output = isset($embed[0]) ? $embed[0] : '';
        }

        return $output;
    }

    /**
     * return media attachments images
     *
     * @param array $num_posts - number of media attachments
     * @param array $thumnail_size - adjust attachment image size
     * @return array $output - return post featured image/array of media attachments(if post thumbnail is empty)
     *
     * @since 1.0.0
     */
    private static function get_gallery_attachments($num_posts = 1, $thumbnail_size = '')
    {
        $output = '';
        if (has_post_thumbnail() && $num_posts == 1) {
            $output = wp_get_attachment_image_url(get_post_thumbnail_id(get_the_id()), $thumbnail_size);
        } else {
            $attachments = get_posts(
                array(
                    'post_type' => 'attachment',
                    'posts_per_page' => $num_posts,
                    'post_parent' => get_the_ID(),
                    'orderby' => 'menu_order',
                    'order' => 'ASC'
                )
            );
            if ($attachments && $num_posts == 1) {
                foreach ($attachments as $attachment) {
                    $output = wp_get_attachment_image_url($attachment->ID, $thumbnail_size);
                }
            } elseif ($attachments && $num_posts > 1) {
                $output = $attachments;
            }
        }
        wp_reset_postdata();
        return $output;
    }

    /**
     * Outputs post format markup.
     *
     * @param string $post_format to get the format of post
     * @since 1.0.0
     *
     */
    public static function get_format_markup($post_format, $thumbnail_size = 'full')
    {
        $format_function = 'get_' . $post_format . '_format_markup';
        echo self::$format_function($thumbnail_size);
    }

    /**
     * Outputs video post format.
     *
     * @since 2.0.0
     */
    private static function get_video_format_markup()
    {
        $video_embed_type = array('video', 'iframe');
        $video_embed_code = self::get_embedded_media($video_embed_type);
        if (has_post_thumbnail()) {
            preg_match('/src="([^"]+)"/', $video_embed_code, $match);
            $video_url = preg_replace('~/embed/~', '/watch?v=', $match[1]);

            if (!empty($video_url)) { ?>
                <a href="<?php echo esc_url($video_url); ?>" class="sigma_video-btn popup-video">
                    <i class="far fa-play"></i>
                </a>
                <?php
            }
        } else { ?>
            <div class="sigma_post-thumb">
                <div class="embed-responsive embed-responsive-16by9">
                    <?php
                    echo wp_kses($video_embed_code, array(
                         'a' => array(
                             'href' => array(),
                             'title' => array(),
                             'class' => array()

                         ),
                         'iframe' => array(
                             'title' => array(),
                             'width' => array(),
                             'height' => array(),
                             'src' => array(),
                             'frameborder' => array(),
                             'allowfullscreen' => array(),
                             'id' => array(),
                             'class' => array()

                         ),
                         'p'
                     ));
                   ?>
                </div>
            </div>
        <?php }
    }

    /**
     * Outputs audio post format.
     *
     * @since 1.0.0
     */
    private static function get_audio_format_markup()
    {
        $audio_embed_type = array('audio', 'iframe');
        $audio_format_style = maharatri_get_option('audio-format-style', 'default');
        $audio_embed_code = self::get_embedded_media($audio_embed_type);
        if(has_post_thumbnail() && empty($audio_embed_code)) {
          the_post_thumbnail();
        } elseif(!empty($audio_embed_code)) {
        ?>
        <div class="sigma_post-thumb <?php echo esc_attr($audio_format_style); ?>">
            <div class="embed-responsive embed-responsive-16by9">
              <?php
            echo wp_kses($audio_embed_code, array(
                 'a' => array(
                     'href' => array(),
                     'title' => array(),
                     'class' => array()

                 ),
                 'iframe' => array(
                     'title' => array(),
                     'width' => array(),
                     'height' => array(),
                     'src' => array(),
                     'frameborder' => array(),
                     'allowfullscreen' => array(),
                     'id' => array(),
                     'class' => array()

                 ),
                 'p'
             ));
           ?>
            </div>
        </div>
      <?php }
    }

    /**
     * Outputs quote post format.
     *
     * @since 1.0.0
     */
    private static function get_quote_format_markup()
    {
        ?>
        <a class="sigma_post-thumb" href="<?php the_permalink(); ?>">
            <?php echo get_the_content(); ?>
        </a>
        <?php
    }

    /**
     * Outputs link post format.
     *
     * @since 1.0.0
     */
    private static function get_link_format_markup()
    {
        $post_link_url = self::get_post_attached_url();
        ?>
        <div class="sigma_post-thumb">
            <h5><?php the_title(); ?></h5>
            <?php if (!empty($post_link_url)) { ?>
                <div class="sigma_post-meta"><a href="<?php echo esc_url($post_link_url); ?>"> <i class="fal fa-link"></i> <?php echo esc_html($post_link_url); ?> </a></div>
            <?php } ?>
            <a href="<?php the_permalink(); ?>" class="post-link"></a>
        </div>
        <?php
    }

    /**
     * Outputs image post format.
     *
     * @since 1.0.0
     */
    private static function get_image_format_markup($thumbnail_size)
    {
        $image_attachment = self::get_gallery_attachments(1, $thumbnail_size);
        if($image_attachment) {
        ?>
        <div class="sigma_post-thumb">
            <a href="<?php the_permalink(); ?>">
              <img src="<?php echo esc_url($image_attachment); ?>" alt="blog-post-img"/>
            </a>
        </div>
        <?php
      }
    }

    /**
     * Outputs gallery post format.
     *
     * @since 1.0.0
     */
    private static function get_gallery_format_markup($thumbnail_size)
    {
        $attachments_count = !empty(maharatri_get_option('gallery_attachments_count')) ? maharatri_get_option('gallery_attachments_count') : 4;
        $slider_wrapper_class = ($attachments_count > 1) ? 'has-slider' : '';
        $gallery_attachments = self::get_gallery_attachments($attachments_count);
        ?>
        <div class="sigma_post-thumb <?php echo esc_html($slider_wrapper_class); ?>">
            <?php
            if ($attachments_count == 1) {
                echo '<img src="' . self::get_gallery_attachments(1, $thumbnail_size) . '"/>';
            }
            if (is_array($gallery_attachments)) {
                foreach ($gallery_attachments as $gallery_attachment) {
                    $gallery_img_url = wp_get_attachment_image_url($gallery_attachment->ID, $thumbnail_size);
                    ?>
                    <div class="sigma_post-thumb-img">
                        <img src="<?php echo esc_url($gallery_img_url); ?>" alt="img">
                    </div>
                <?php }
            } ?>
        </div>
        <?php
    }

}
