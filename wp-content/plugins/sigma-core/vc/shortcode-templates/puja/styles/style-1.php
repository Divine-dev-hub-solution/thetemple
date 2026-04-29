<?php
/**
 * Puja shortcode style 1 template file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
global $post, $sigma_shortcodes;
$atts   = $sigma_shortcodes[ 'sigma_puja' ][ 'atts' ];
$thumb_size = function_exists('maharatri_get_thumb_size') ? maharatri_get_thumb_size('maharatri-puja') : 'maharatri-portfolio';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('sigma-puja sigma-puja-style-1 sigma-puja-wrapper'); ?>>
    <?php if (has_post_thumbnail()) {
        the_post_thumbnail($thumb_size);
    } ?>
    <div class="sigma_puja-item-content">
        <div class="sigma_puja-item-content-inner">
            <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>

            <?php if ($atts['post_excerpt']== 'true' && function_exists('maharatri_custom_excerpt')) {
                $excerpt_length = !empty($atts['post_excerpt_length']) ? $atts['post_excerpt_length'] : 20;
                ?>
                <p><?php echo esc_html(maharatri_custom_excerpt($excerpt_length)) ?></p>
                <?php
            } ?>

        </div>
        <a href="<?php the_permalink(); ?>" class="puja-link"><i class="fal fa-plus"></i></a>
    </div>
</article>
