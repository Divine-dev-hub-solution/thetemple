<?php
/**
 * Template part for displaying events items
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Maharatri
 */
$events_style = maharatri_get_option('events-style', 'style-1');
$events_columns = maharatri_get_option('events-columns', 'col-lg-12');
?>
<div class="<?php echo esc_attr($events_columns) ?> col-sm-12">
    <?php get_template_part( 'template-parts/events/styles/' . $events_style ); ?>
</div>
