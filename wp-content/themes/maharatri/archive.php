<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Maharatri
 */
get_header();
global $post;
$post_type = $post->post_type;
$grid_column_classes = ($post_type !== 'volunteer') ? maharatri_grid_column_classes() : '';
?>
<div class="section section-padding">
	<div class="container">
		<div class="row">
			<div id="primary" class="content-area <?php echo esc_attr( $grid_column_classes ); ?>">
				<main id="main" class="site-main">
				<?php if ( have_posts() ) : ?>
					<div class="row">
						<?php
						/* Start the Loop */
						while ( have_posts() ) :
							the_post();
							/*
							 * Include the Post-Type-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
							 */
							 if($post_type && maharatri_get_post_type_file($post_type) == true) {
								 get_template_part( 'template-parts/'. $post_type .'/content' );
							 } else {
								 	get_template_part( 'template-parts/post/content' );
							 }

						endwhile;
						?>
					</div>
					<?php if(get_next_posts_link() != '' || get_previous_posts_link() != ''){ ?>
					<div class="post-pagination">
						<?php the_posts_pagination(); ?>
					</div>
					<?php } ?>
					<?php
					else :
						get_template_part( 'template-parts/content', 'none' );
					endif;
					?>
				</main><!-- #main -->
			</div><!-- #primary -->
			<?php if($post_type !== 'volunteer') {
			 get_sidebar();
		 	} ?>
		</div>
	</div>
</div>
<?php
get_footer();
