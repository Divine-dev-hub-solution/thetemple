<?php
/**
 * Blog shortcode style 5 template file.
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
<article id="post-<?php the_ID(); ?>" <?php post_class('sigma-post sigma-post-style-1 grid-layout'); ?>>
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
	      <div class="entry-footer">
	        <ul>
	          <li>
	            <div class="entry-meta">
	              <?php maharatri_posted_on(); ?>
	            </div>
	          </li>
	        </ul>
	      </div>
	      <footer class="entry-footer">
	      <div class="entry-header">
	        <?php the_title( '<h4 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' ); ?>
	      </div>
	      </footer>
	    </div>
		<?php } ?>
  </div>
</article>
