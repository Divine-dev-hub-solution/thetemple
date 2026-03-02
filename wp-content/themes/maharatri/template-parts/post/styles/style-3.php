<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Maharatri
 */
 $post_format = get_post_format();
 $format_no_thumb = ['audio', 'quote', 'link', 'gallery', 'image'];
 $format_no_content = ['quote', 'link'];

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('sigma-post sigma-post-style-3'); ?>>
	<div class="sigma-post-wrapper">
		<?php if(has_post_thumbnail() && !in_array($post_format, $format_no_thumb)) { ?>
			<div class="sigma_post-thumb">
				<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
					<?php the_post_thumbnail(); ?>
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
				<div class="entry-header">
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
				</div>
				<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
				<div class="entry-content">
					<p><?php echo maharatri_custom_excerpt(20); ?></p>
				</div>
				<div class="entry-footer">
						<div class="post-read-more-link">
							<a href="<?php the_permalink(); ?>">
								<i class="far fa-arrow-right"></i><?php esc_html_e('Read More', 'maharatri'); ?>
							</a>
						</div>
				</div>
			</div>
		<?php } ?>
	</div>
</article>
