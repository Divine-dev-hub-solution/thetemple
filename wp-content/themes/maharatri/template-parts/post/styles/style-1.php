<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Maharatri
 */
 global $post;
 $post_format = get_post_format();
 $format_no_thumb = ['audio', 'quote', 'link', 'gallery', 'image'];
 $format_no_content = ['quote', 'link'];
 $post_type = $post->post_type;
 ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('sigma-post sigma-post-style-1'); ?>>
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
          <?php if($post_type !== 'product') { ?>
    				<div class="post-categories">
    					<?php maharatri_posts_categories(); ?>
    				</div>
          <?php } ?>
  				<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
  			</div>
        <?php if($post_type !== 'product') { ?>
  			<div class="entry-footer">
  				<ul>
  					<?php if(function_exists('sigmacore_get_post_view')){ ?>
  					<li class="post-views">
  						<div class="entry-meta-footer sigma_post_views">
  							<div class="entry-meta-container">
  								<span><i class="fas fa-eye"></i> <?php echo sigmacore_get_post_view(); ?></span>
  							</div>
  						</div>
  					</li>
  					<?php } ?>
  					<li>
  						<div class="entry-meta">
  							<?php maharatri_posted_on(); ?>
  						</div>
  					</li>
  					<li>
  						<?php maharatri_posts_comments(); ?>
  					</li>
  				</ul>
  			</div>
      <?php } ?>
  			<div class="entry-content">
  				<?php echo maharatri_custom_excerpt(20); ?>
  			</div>
        <?php if($post_type !== 'product') { ?>
    			<div class="entry-footer">
    				<div class="author-details">
    					<?php maharatri_posts_author(); ?>
    				</div>
    				<div class="post-read-more-link">
    					<a href="<?php the_permalink(); ?>">
    						<?php esc_html_e('Read More', 'maharatri'); ?><i class="far fa-arrow-right"></i>
    					</a>
    				</div>
    			</div>
        <?php } ?>
  		</div>
    <?php } ?>
	</div>
</article>
