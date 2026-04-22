<?php
/**
 * The footer for our theme
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Maharatri
 */
?>
		</div><!-- #content -->

	<?php
	$footer_layout = maharatri_get_option( 'footer-layout' );
	$footer_skin   = maharatri_get_option( 'footer-skin' ) ? maharatri_get_option( 'footer-skin' ) : 'footer-dark';
	if ( $footer_layout ) :
	?>
	<footer id="colophon" class="site-footer <?php echo esc_attr( $footer_skin ); ?> site-footer-layout-<?php echo esc_attr( str_replace( 'layout-', '', $footer_layout ) ); ?>">
		<?php get_template_part( 'template-parts/footer/layouts/' . $footer_layout ); ?>
	</footer><!-- #colophon -->
	<?php endif; ?>

<?php do_action( 'maharatri_after_footer' ); ?>
</div><!-- #page -->
<?php wp_footer(); ?>

</body>
</html>
