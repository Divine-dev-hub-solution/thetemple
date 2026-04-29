<?php
/**
 * Template part for displaying post details layout 1
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Maharatri
 */
if (function_exists('sigmacore_set_post_view')) {
    sigmacore_set_post_view();
}

 $post_format = get_post_format();
 $format_no_thumb = ['audio', 'quote', 'link', 'gallery', 'image'];
 $format_no_content = ['quote', 'link'];

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('sigma-post-details'); ?>>
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
        <div class="sigma-post-inner">
            <header class="entry-header">
                <div class="post-categories">
                    <?php maharatri_posts_categories(); ?>
                </div>
            </header><!-- .entry-header -->
            <!-- Footer -->
            <div class="entry-footer">
                <ul>
                    <?php if (function_exists('sigmacore_get_post_view')) { ?>
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
              						<span class="posted-on">
              							<i class="far fa-calendar-alt"></i>
              							<?php echo get_the_date(); ?>
              						</span>
                        </div>
                    </li>
                    <li>
                        <?php maharatri_posts_comments(); ?>
                    </li>
                </ul>
            </div>
            <?php if (!in_array($post_format, $format_no_content)) { ?>
              <div class="entry-content">
                  <?php
                  the_content();
                  wp_link_pages(
                      array(
                          'before' => '<div class="page-links">' . esc_html__('Pages:', 'maharatri'),
                          'after' => '</div>',
                      )
                  );
                  ?>
              </div>
            <?php } ?>
            <!-- .entry-content -->
            <footer class="entry-footer blog-post-detail-footer">
                <?php
                if (function_exists('sigmacore_posts_share') && maharatri_get_option('show_post_share') == true ) {
                    sigmacore_posts_share();
                }
                ?>
                <?php maharatri_posts_tags(); ?>
            </footer><!-- .entry-footer -->
        </div>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->
<?php
  // Pagination
  maharatri_single_post_pagination();

  // Related Post
  maharatri_related_post();
  maharatri_post_authorbox();

  // If comments are open or we have at least one comment, load up the comment template.
  if ( comments_open() || get_comments_number() ) :
    comments_template();
  endif;
