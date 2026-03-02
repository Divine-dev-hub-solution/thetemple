<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Maharatri
 */
get_header();
global $post;
$post_type = $post->post_type;
$grid_column_classes = ($post_type !== 'volunteer' && $post_type !== 'megamenu' && $post_type !== 'sigma_templates') ? maharatri_grid_column_classes() : '';
?>
<div class="section section-padding">
	<div class="container">
		<div class="row">
			<div id="primary" class="content-area <?php echo esc_attr( $grid_column_classes ); ?>">
				<main id="main" class="site-main">
					<?php if($post_type == 'post' || maharatri_get_post_type_file($post_type) !== true) { ?>
						<div class="post-details-box">
					<?php } ?>
						<?php
						while ( have_posts() ) :
							the_post();
							if($post_type && maharatri_get_post_type_file($post_type) == true) {
								get_template_part( 'template-parts/'. $post_type .'/single/style-1' );
							} else {
								 get_template_part( 'template-parts/post/single/style-1' );
							}
						endwhile; // End of the loop.
						?>
					</div>
				</main><!-- #main -->
				<?php if($post_type == 'post' || maharatri_get_post_type_file($post_type) !== true) { ?>
				</div><!-- #primary -->
			<?php } ?>
			<?php if($post_type !== 'volunteer' && $post_type !== 'megamenu' && $post_type !== 'sigma_templates') {
			 get_sidebar();
		 	} ?>
		</div>
	</div>
</div>
<?php
 get_footer();
 ?>
