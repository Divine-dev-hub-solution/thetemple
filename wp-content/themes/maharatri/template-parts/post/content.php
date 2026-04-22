<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Maharatri
 */
$blog_style = maharatri_get_option('blog-style', 'style-1');
$blog_columns = maharatri_get_option('blog-columns', 'col-lg-12');
?>
<div class="<?php echo esc_attr($blog_columns) ?>">
  <?php get_template_part( 'template-parts/post/styles/' . $blog_style ); ?>
</div>
