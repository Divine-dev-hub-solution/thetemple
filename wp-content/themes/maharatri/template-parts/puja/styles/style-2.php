<?php
/**
 * Template part for displaying puja style 2
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package maharatri
 */
$thumb_size = maharatri_get_thumb_size('maharatri-portfolio');
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('sigma-puja sigma-puja-style-2 sigma-puja-wrapper'); ?>>
    <?php if (has_post_thumbnail()) {
        the_post_thumbnail($thumb_size);
    } ?>
    <div class="sigma_portfolio-item-content">
        <div class="sigma_portfolio-item-content-inner">
            <h5> <a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a> </h5>
        </div>
        <a href="<?php the_permalink(); ?>" class="portfolio-link"><i class="far fa-arrow-right"></i></a>
    </div>
</article>
