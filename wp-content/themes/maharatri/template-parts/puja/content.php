<?php
/**
 * Template part for displaying puja items
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package maharatri
 */
$puja_style = maharatri_get_option('puja-style', 'style-1');
$puja_columns = maharatri_get_option('puja-columns', 'col-lg-6');
?>
<div class="<?php echo esc_attr($puja_columns) ?> col-sm-12">
    <?php get_template_part( 'template-parts/puja/styles/' . $puja_style ); ?>
</div>
