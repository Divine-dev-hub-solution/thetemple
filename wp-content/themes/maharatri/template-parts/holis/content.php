<?php
/**
 * Template part for displaying holis items
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package maharatri
 */
$holis_style = maharatri_get_option('holis-style', 'style-1');
$holis_columns = maharatri_get_option('holis-columns', 'col-lg-6');
?>
<div class="<?php echo esc_attr($holis_columns) ?> col-sm-12">
    <?php get_template_part( 'template-parts/holis/styles/' . $holis_style ); ?>
</div>
