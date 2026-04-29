<?php
/**
 * Template part for displaying volunteers
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Maharatri
 */
$volunteer_style = maharatri_get_option('volunteer-style', 'style-1');
$volunteer_columns = maharatri_get_option('volunteer-columns', 'col-lg-6');
?>
<div class="<?php echo esc_attr($volunteer_columns) ?> col-md-6 col-sm-12">
  <?php get_template_part( 'template-parts/volunteer/styles/' . $volunteer_style ); ?>
</div>
