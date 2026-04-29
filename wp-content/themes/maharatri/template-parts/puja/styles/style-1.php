<?php
/**
 * Template part for displaying puja style 1
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package maharatri
 */
$thumb_size = maharatri_get_thumb_size('maharatri-puja');
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('sigma-puja sigma-puja-style-1 sigma-puja-wrapper'); ?>>
        <?php if (has_post_thumbnail()) {
            the_post_thumbnail($thumb_size);
        } ?>
        <div class="sigma_puja-item-content">
            <div class="sigma_puja-item-content-inner">
                <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>

                <?php if (maharatri_get_option('show_puja_excerpt') == true) {
                    $excerpt_length = !empty(maharatri_get_option('puja_excerpt_length')) ? maharatri_get_option('puja_excerpt_length') : 20;
                    ?>
                    <p><?php echo esc_html(maharatri_custom_excerpt($excerpt_length)) ?></p>
                    <?php
                } ?>

            </div>
            <a href="<?php the_permalink(); ?>" class="puja-link"><i class="fal fa-plus"></i></a>
        </div>
</article>
