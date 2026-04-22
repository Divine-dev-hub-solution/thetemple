<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Maharatri
 */
get_header();
?>
<div class="fof-page-container">
	<div class="container">
		<div id="primary" class="content-area">
			<main id="main" class="site-main">
				<section class="error-404 not-found">
					<div class="error-404-inner">
						<header class="page-header">
							<h1 class="subheader">
								<?php  echo !empty(maharatri_get_option('fof_page_title')) ? esc_html(maharatri_get_option('fof_page_title')) : esc_html__( '404', 'maharatri' ); ?>
							</h1>
						</header><!-- .page-header -->
						<div class="page-content">
							<p>
								<?php  echo !empty(maharatri_get_option('fof_page_description')) ? esc_html(maharatri_get_option('fof_page_description')) : esc_html__( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'maharatri' ); ?>
							</p>
							<?php get_search_form(); ?>
							<?php if ( maharatri_get_option('fof_page_back_to_home') ) { ?>
								<a href="<?php echo esc_url( get_home_url(), 'maharatri' ); ?>" class="fof-back-buttton" role="button"><?php esc_html_e( 'Back to Home', 'maharatri' ); ?></a>
							<?php } ?>
						</div><!-- .page-content -->
					</div>
				</section><!-- .error-404 -->
			</main><!-- #main -->
		</div>
	</div>
</div>
<?php
get_footer();
