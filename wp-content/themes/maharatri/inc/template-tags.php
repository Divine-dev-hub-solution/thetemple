<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Maharatri
 */
if ( ! function_exists( 'maharatri_posted_on' ) ) {
	/**
	 * Prints HTML with meta information for the current post-date/time with the social icons.
	 */
	function maharatri_posted_on() {
		?>
		<span class="posted-on">
			<a href="<?php echo get_the_permalink(); ?>" rel="bookmark">
				<i class="far fa-calendar-alt"></i>
				<?php echo get_the_date(); ?>
			</a>
		</span>
		<?php
	}
}
/**
 * Single Post pagination
 *
 * @since 1.0.0
 */
if(!function_exists('maharatri_single_post_pagination')){
	function maharatri_single_post_pagination($with_content = true){
		$previous = get_previous_post();
		$next = get_next_post();
		if( $next || $previous ){
			?>
			<div class="navigation post-navigation">
				 <h2 class="screen-reader-text"><?php esc_html_e('Post navigation', 'maharatri') ?></h2>
				 <div class="nav-links">
					 <?php if ( $previous ) { ?>
					 <div class="nav-previous">
						 <a title="<?php echo esc_attr(get_the_title($previous)) ?>" href="<?php echo esc_url(get_the_permalink($previous)) ?>">
							 <span><?php echo esc_html__('Previous Post', 'maharatri') ?></span>
							 <h3><?php echo esc_attr(get_the_title($previous)) ?></h3>
						 </a>
					 </div>
					 <?php } ?>
					 <?php if ( $next ) { ?>
					 <div class="nav-next">
						 <a title="<?php echo esc_attr(get_the_title($next)) ?>" href="<?php echo esc_url(get_the_permalink($next)) ?>">
							 <span><?php echo esc_html__('Next Post', 'maharatri') ?></span>
							 <h3><?php echo esc_attr(get_the_title($next)) ?></h3>
						 </a>
					 </div>
					 <?php } ?>
				 </div>
			 </div>
			<?php
		}
	}
}
if ( ! function_exists( 'maharatri_post_authorbox' ) ) {
	/**
	 * Displays an post authorbox.
	 */
	function maharatri_post_authorbox() {
		if ( get_the_author_meta( 'description' ) ) {
			$retina_mult = maharatri_get_retina_multiplier();
			?>
			<div class="post-author-box">
				<div class="post-author-image">
					<?php echo get_avatar( get_the_author_meta( 'ID' ), 150 * $retina_mult ); ?>
				</div>
				<div class="post-author-details">
					<?php
					if ( ! is_author() ) {
						?>
						<span> <?php esc_html_e('Written By ', 'maharatri') ?></span>
						<h3 class="author-title">
							<?php
							/* translators: 1: get the author name*/
							printf( esc_html__( '%s', 'maharatri' ), get_the_author() );
							?>
						</h3>
						<?php
					}
					?>
					<div class="post-author-description">
						<p class="author-description"><?php the_author_meta( 'description' ); ?></p>
					</div>
				</div>
			</div>
			<?php
		}
	}
}
/**
 * Displays related posts in single post page.
 *
 * @since 1.0.0
 */
function maharatri_related_post() {
	if(maharatri_get_option('post_show_related_posts') == true) {

	$related_category_ids = wp_get_post_categories( get_the_ID() );
	if ( empty( $related_category_ids )) {
		return;
	}
	$args = array(
		'post_type'      => 'post',
		'posts_per_page' => 2,
		'post__not_in'   => array( get_the_ID() ),
		'tax_query'      => array(
			array(
				'taxonomy' => 'category',
				'field'    => 'id',
				'terms'    => $related_category_ids,
			),
		),
	);
	$related_post_query = new WP_Query( $args );
	if ( $related_post_query->have_posts() ) {
		?>
		<h5 class="sigma-related-title"><?php esc_html_e('Related Posts', 'maharatri') ?></h5>
		<div class="related-posts sigma_blog_wrapper sigma-shortcode-wrapper">
			<div class="row">
				<?php
				while ( $related_post_query->have_posts() ) {
					$related_post_query->the_post();
					echo '<div class="col-lg-6">';
					?>
					<article id="post-<?php the_ID(); ?>" <?php post_class('sigma-post sigma-post-style-1'); ?>>
						<div class="sigma-post-wrapper">
							<?php if(has_post_thumbnail()){ ?>
								<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
									<?php the_post_thumbnail(); ?>
								</a>
							<?php } ?>
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
								<header class="entry-header">
									<?php the_title( '<h5 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h5>' ); ?>
								</header>
								<div class="entry-content">
									<?php echo maharatri_custom_excerpt(15); ?>
								</div>
							</div>
						</div>
					</article>
					<?php
					echo '</div>';
				}
				wp_reset_postdata();
				?>
			</div>
		</div>
		<?php
	}
}
}
/**
 * Posts author meta info
 */
if ( ! function_exists( 'maharatri_posts_author' ) ) {
	function maharatri_posts_author() {
		global $post;
		?>
		<div class="entry-meta-footer sigma_post_author">
			<div class="entry-meta-container">
				<span class="author vcard">
				<?php echo get_avatar(get_the_author_meta('email'), '', '', 'comment-author'); ?>
					<a class="url fn n" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
						<span><?php echo esc_html__('By ', 'maharatri'); ?></span> <?php echo esc_html( get_the_author() ); ?>
					</a>
				</span>
			</div>
		</div>
		<?php
	}
}
/**
* Prints HTML for post categories
 */
if ( ! function_exists( 'maharatri_posts_categories' ) ) {
	function maharatri_posts_categories() {
		global $post;
		?>
		<div class="entry-meta-footer sigma_post_categories">
			<div class="entry-meta-container">
			<?php
				$categories_list = get_the_category_list( esc_html__( ' ', 'maharatri' ) );
				if ( ! empty( $categories_list ) ) {
					?>
					<span class="categories-list">
						<?php print_r( $categories_list ); ?>
					</span>
					<?php
				}
			?>
			</div>
		</div>
		<?php
	}
}
/**
 * Prints HTML for post tags
 */
if ( ! function_exists( 'maharatri_posts_tags' ) ) {
	function maharatri_posts_tags() {
		global $post;
		?>
		<div class="entry-meta-footer sigma_post_tags">
		<?php
			$tags_list = get_the_tag_list( '', esc_html_x( '', 'list item separator', 'maharatri' ) );
			if ( ! empty( $tags_list ) ) {
			?>
			<h5><?php esc_html_e('Tags', 'maharatri'); ?></h5>
			<div class="entry-meta-container">
				<span class="tag-list">
					<i class="far fa-cross"></i>
					<?php print_r( $tags_list ); ?>
				</span>
			</div>
			<?php } ?>
		</div>
		<?php
	}
}
/**
 * Posts comments
 */
if ( ! function_exists( 'maharatri_posts_comments' ) ) {
	function maharatri_posts_comments() {
		global $post;
		?>
		<div class="entry-meta-footer sigma_post_comments">
			<div class="entry-meta-container">
			<?php
					if ( comments_open() ) {
						?>
						<span class="meta-comment">
							<i class="far fa-comments"></i>
							<?php
							$comment_template = '<span class="comment-count">%s</span> <span class="comment-count-label">%s</span>';
							comments_popup_link(
								sprintf( $comment_template, '0', esc_html__( 'comments', 'maharatri' ) ),
								sprintf( $comment_template, '1', esc_html__( 'comment', 'maharatri' ) ),
								sprintf( $comment_template, '%', esc_html__( 'comments', 'maharatri' ) )
							);
							?>
						</span>
						<?php
					}
			?>
			</div>
		</div>
		<?php
	}
}
	/**
	 * Get post single author.
	 *
	 * @since 1.0.0
	 */
	if(!function_exists('maharatri_get_post_author')){
	  function maharatri_get_post_author(){
				global $maharatri_options;
	    if( !empty( get_the_author_meta( 'description' ) ) && (is_single() && ('post' === get_post_type())) && $maharatri_options['post_single_show_author'] ){
	      ?>
				<div class="widget about-author-widget mb-40">
                <h2 class="widget-title"><?php esc_html_e('About Me', 'maharatri'); ?></h2>
                <div class="author-box">
                  	<?php echo get_avatar( get_the_author_meta( 'ID' ), 140 ); ?>
                    <h6><?php echo get_the_author_meta( 'display_name' ); ?></h6>
                     <?php echo wpautop(get_the_author_meta( 'description' )); ?>
										 <?php maharatri_get_post_author_sm_links(); ?>
                </div>
            </div>
	      <?php
	    }
	  }
	}
add_action('maharatri/before_default_sidebar', 'maharatri_get_post_author', 10);
