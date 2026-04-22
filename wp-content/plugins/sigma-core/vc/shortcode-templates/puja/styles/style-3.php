<?php
/**
 * Puja shortcode style 3 template file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
global $post, $sigma_shortcodes;
$atts   = $sigma_shortcodes[ 'sigma_puja' ][ 'atts' ];
$thumb_size = function_exists('maharatri_get_thumb_size') ? maharatri_get_thumb_size('maharatri-portfolio') : 'maharatri-portfolio';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('sigma-puja sigma-puja-style-3 sigma-puja-wrapper'); ?>>
    <?php if (has_post_thumbnail()) {
        the_post_thumbnail($thumb_size);
    } ?>
    <div class="sigma_portfolio-item-content">
        <div class="sigma_portfolio-item-content-inner">
            <?php
            $get_terms = get_the_terms(get_the_ID(), 'puja-category');
            if ($get_terms) {
                ?>
                <span class="sigma-puja-category">
              <?php
              $terms_data = array();
              foreach ($get_terms as $get_term) {
                  $terms_data[$get_term->slug] = $get_term->name;
              }
              echo esc_html(implode(', ', $terms_data));
              ?>
            </span>
            <?php } ?>
            <h5><a href="<?php the_permalink(); ?>" tabindex="0"><?php the_title(); ?></a></h5>
        </div>
        <a href="<?php the_permalink(); ?>" class="portfolio-link" tabindex="0"><i class="far fa-arrow-right"></i></a>
    </div>
</article>
