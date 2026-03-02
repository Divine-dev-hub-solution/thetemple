<?php
/**
 * Template Name: Full Width
 *
 * This template display the page in full width.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Maharatri
 * @since   1.0.0
 */
get_header();
?>
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div id="primary" class="content-area">
				<main id="main" class="site-main">
				<?php
				while ( have_posts() ) :
					the_post();
					?>
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="entry-content">
							<?php
							the_content();
							wp_link_pages(
								array(
									'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'maharatri' ),
									'after'  => '</div>',
								)
							);
							?>
						</div><!-- .entry-content -->
					</div>
					<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				endwhile; // End of the loop.
				?>
				</main><!-- #main -->
			</div><!-- #primary -->
		</div>
	</div>
</div>
<?php
get_footer();
