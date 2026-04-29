<?php
/**
 * Template part for displaying services
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Maharatri
 */
$service_style = maharatri_get_option('service-style', 'style-1');
$service_columns = maharatri_get_option('service-columns', 'col-lg-4');
?>
<div class="<?php echo esc_attr($service_columns) ?>">
  <?php get_template_part( 'template-parts/service/styles/' . $service_style ); ?>
</div>
