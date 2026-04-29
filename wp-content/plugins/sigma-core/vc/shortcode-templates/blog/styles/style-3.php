<?php
/**
 * Blog shortcode style 2 template file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $post, $sigma_shortcodes;
$atts = $sigma_shortcodes[ 'sigma_blog' ][ 'atts' ];

$post_format = get_post_format();
$format_no_thumb = ['audio', 'quote', 'link', 'gallery', 'image'];
$format_no_content = ['quote', 'link'];

$thumb_size = function_exists('maharatri_get_thumb_size') ? maharatri_get_thumb_size('maharatri-blog') : 'maharatri-blog';

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('sigma-post sigma-post-style-3'); ?>>
	<div class="sigma-post-wrapper">
		<?php if(has_post_thumbnail() && !in_array($post_format, $format_no_thumb)) { ?>
			<div class="sigma_post-thumb">
				<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
					<?php the_post_thumbnail($thumb_size); ?>
				</a>
				<?php
					if ($post_format == 'video') {
							Maharatri_Blog_Post::get_format_markup($post_format);
					}
					?>
			</div>
		<?php }
		if ($post_format == 'video' && !has_post_thumbnail()) {
				Maharatri_Blog_Post::get_format_markup($post_format);
		}
		if ($post_format == 'audio') {
				Maharatri_Blog_Post::get_format_markup($post_format);
		}
		if ($post_format == 'quote') {
				Maharatri_Blog_Post::get_format_markup($post_format);
		}
		if ($post_format == 'link') {
				Maharatri_Blog_Post::get_format_markup($post_format);
		}
		if ($post_format == 'image') {
				Maharatri_Blog_Post::get_format_markup($post_format, 'full');
		}
		if ($post_format == 'gallery') {
				Maharatri_Blog_Post::get_format_markup($post_format, 'full');
		} ?>
		<?php if (!in_array($post_format, $format_no_content)) { ?>
			<div class="sigma-post-inner">
				<header class="entry-header">
					<?php if(function_exists('maharatri_posts_author')){ ?>
					<div class="author-details">
						<?php maharatri_posts_author(); ?>
					</div>
					<?php } ?>
					<?php
					if(function_exists('maharatri_posted_on')){
						maharatri_posted_on();
					}
					?>
				</header>
				<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>

				<?php if(function_exists('maharatri_custom_excerpt')){ ?>
				<div class="entry-content">
					<p><?php echo maharatri_custom_excerpt(20); ?></p>
				</div>
				<?php } ?>
				<footer class="entry-footer">
						<div class="post-read-more-link">
							<a href="<?php the_permalink(); ?>">
								<i class="far fa-arrow-right"></i><?php echo esc_html('Read More', 'sigma-core'); ?>
							</a>
						</div>
				</footer>
			</div>
		<?php } ?>
	</div>
</article>
