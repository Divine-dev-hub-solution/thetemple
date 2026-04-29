<?php
/**
 * Get the site logo assigned from theme options.
 *
 * @param string $logo The logo option (Can be header_logo, footer_logo or mobile_logo)
 * @param bool $slogan Whether to show the slogan if no logo is set or not
 *
 * @since 1.0.0
 */
function maharatri_get_site_logo($logo = '', $slogan = true){
	$logo_url = isset( maharatri_get_option($logo)['url'] ) && !empty( maharatri_get_option($logo)['url'] ) ? maharatri_get_option($logo)['url'] : '';
	if($logo_url){
		?>
	<div class="logo-wrap <?php echo esc_attr($logo) ?>">
		<a href="<?php echo esc_url( get_home_url() ); ?>" rel="home">
			<img class="img-fluid" src="<?php echo esc_url( $logo_url ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"/>
		</a>
	</div>
	<?php }elseif(!$logo_url && $slogan){ ?>
		<a href="<?php echo esc_url( get_home_url() ); ?>" class="site-slogan">
			<h5><?php bloginfo( 'name' ); ?></h5>
			<span><?php bloginfo( 'description' ); ?></span>
		</a>
	<?php
	}
}
/**
* Returns a specific menu
*
* @since 1.0.0
*/
function maharatri_nav_menu($location = 'primary-menu', $menu_class = 'navbar-nav') {
  $defaults = array(
    'menu_class' => $menu_class,
    'menu_id' => '',
    'container' => '',
    'fallback_cb' => '',
  );
  if( has_nav_menu( $location ) ){
    $defaults['theme_location'] = $location;
  }
  return wp_nav_menu( $defaults );
}
/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function maharatri_body_classes( $classes ) {
	$classes[] = !empty(maharatri_get_option('header-position')) ? 'has-'.maharatri_get_option('header-position') : 'has-header-relative';
	$classes[] = !empty(maharatri_get_option('button-style')) ? 'custom-button-'.maharatri_get_option('button-style') : 'custom-button-style-3';
	$classes[] = 'theme-icon-cat-temple';
	return $classes;
}
add_filter( 'body_class', 'maharatri_body_classes' );
/**
 * Get all header related classes from theme options.
 *
 * @since 1.0.0
 */
function maharatri_header_classes( $classes = [] ){
	$classes[] = !empty(maharatri_get_option('header-layout')) ? 'header-'.maharatri_get_option('header-layout') : 'header-layout-5';
	$classes[] = !empty(maharatri_get_option('header-layout') == 'layout-4') ? 'header-layout-3' : '';
	$classes[] = !empty(maharatri_get_option('header-layout') == 'layout-6') ? 'header-layout-5' : '';
	$classes[] = !empty(maharatri_get_option('header-scheme')) ? maharatri_get_option('header-scheme') : 'header-scheme-light';
	$classes[] = !empty(maharatri_get_option('header-position')) ? maharatri_get_option('header-position') : 'header-relative';
  if(empty($classes)) return;
  return apply_filters( 'maharatri/header/header_classes',  str_replace(',', '', implode(', ', $classes)));
}
/**
 * Get all sticky headers related classes from theme options.
 *
 * @since 1.0.0
 */
function maharatri_header_sticky_classes( $classes = [] ){
	$classes[] = !empty(maharatri_get_option('header-layout')) ? 'header-'.maharatri_get_option('header-layout') : 'header-layout-5';
	$classes[] = !empty(maharatri_get_option('header-layout') == 'layout-4') ? 'header-layout-3' : '';
	$classes[] = !empty(maharatri_get_option('header-layout') == 'layout-6') ? 'header-layout-5' : '';
	$classes[] = !empty(maharatri_get_option('header-sticky-scheme')) ? maharatri_get_option('header-sticky-scheme') : 'header-scheme-light';
  if(empty($classes)) return;
  return apply_filters( 'maharatri/header/header_sticky_classes',  str_replace(',', '', implode(', ', $classes)));
}
/**
 * Return Customs excerpt
 *
 * @param int $limit - The limit of characters to display
 * @param string $text - The text to cut down, can be excerpt, custom text, or anything else.
 *
 * @since 1.0.0
 */
function maharatri_custom_excerpt( $limit, $text = '' ){
 $text = $text == '' ? get_the_excerpt() : $text;
 $excerpt = explode(' ', $text, $limit);
 if (count($excerpt)>=$limit) {
		 array_pop($excerpt);
		 $excerpt = implode(" ",$excerpt).'';
 } else {
		 $excerpt = implode(" ",$excerpt);
 }
 $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
 return $excerpt;
}
/**
 * Display Google analytics to page
 * @hooked to wp_head
 *
 * @since 1.0.0
 */
function maharatri_add_google_analytics(){
	if ( maharatri_get_option('google_analytics') ){
		echo stripslashes( maharatri_get_option('google_analytics') );
	}
}
add_action( 'wp_head', 'maharatri_add_google_analytics', 999 );
/**
 * Display Google web master tools to page
 * @hooked to wp_head
 *
 * @since 1.0.0
 */
function maharatri_add_google_webmastertools(){
	if ( maharatri_get_option('google_web_master') ){
		echo stripslashes( maharatri_get_option('google_web_master') );
	}
}
add_action( 'wp_head', 'maharatri_add_google_webmastertools' );
/**
 * Display Google tag manger to page (after opening body tag)
 * @hooked to wp_body_open action
 *
 * @since 1.0.0
 */
function maharatri_add_google_tagmanager(){
  if ( maharatri_get_option('google_tag_manager') ){
		echo maharatri_get_option('google_tag_manager');
	}
}
add_action('wp_body_open', 'maharatri_add_google_tagmanager', 1);
/**
 * Maharatri Home page app view (This function will redirect all users on mobile to your assigned page from
 * theme options instead of the main home page).
 *
 * @since 1.0.0
 */
function maharatri_mobile_homepage(){
  $mobile_view = maharatri_get_option('mobile_view', 'responsive_view');
  if(is_front_page() && wp_is_mobile() && $mobile_view == 'app_view'){
    $mobile_home_id = !empty(maharatri_get_option('app_view_home')) ? maharatri_get_option('app_view_home') : '';
    if( !empty($mobile_home_id) && get_option( 'page_on_front' ) != $mobile_home_id ){
      $app_view_home = esc_url(get_the_permalink($mobile_home_id));
      if(empty($app_view_home)) return false;
      ob_start();
      wp_safe_redirect($app_view_home);
      ob_flush();
    }
  }
}
add_action('template_redirect', 'maharatri_mobile_homepage');
/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function maharatri_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'maharatri_pingback_header' );
if ( ! function_exists( 'maharatri_comment_form_field' ) ) {
	/**
	 * Function for comment field order.
	 *
	 * @since  1.0.0
	 *
	 * @param  array $fields fields array.
	 * @return array
	 */
	function maharatri_comment_form_field( $fields ) {
		$comment_field = isset( $fields['comment'] ) ? $fields['comment'] : '';
		$cookies_field = isset( $fields['cookies'] ) ? $fields['cookies'] : '';
		unset( $fields['comment'] );
		unset( $fields['cookies'] );
		$fields['comment'] = $comment_field;
		$fields['cookies'] = $cookies_field;
		return $fields;
	}
}
add_filter( 'comment_form_fields', 'maharatri_comment_form_field' );
if ( ! function_exists( 'maharatri_widget_categories_args' ) ) {
	/**
	 * Change the walker for the categories widget.
	 *
	 * @param  array $instance fields array.
	 * @param  array $cat_args fields array.
	 * @return array
	 */
	function maharatri_widget_categories_args( $cat_args, $instance ) {
		$cat_args['walker'] = new Maharatri_Walker_Category;
		return $cat_args;
	}
}
add_filter( 'widget_categories_args', 'maharatri_widget_categories_args', 10, 2 );
if ( ! function_exists( 'maharatri_archive_count' ) ) {
	/**
	 * Change the sturcture for the archives link.
	 *
	 * @param  string $links string.
	 * @return string
	 */
	function maharatri_archive_count( $links ) {
		$links = str_replace( '&nbsp;(', '<span>', $links );
		$links = str_replace( ')', '</span>', $links );
		return $links;
	}
}
add_filter( 'get_archives_link', 'maharatri_archive_count' );
/**
 * Get the current page layout (Boxed - Full Width)
 *
 * @since  1.0.0
 */
function maharatri_get_page_layout(){
  // Current page ID
  $current_id = maharatri_get_page_id();
  // Possible layout values
  $avaiable_layouts = array('container', 'container-fluid');
  // Page meta
  $page_settings = $current_id ? get_post_meta( $current_id, 'sigma_page_settings', true ) : '';
  $page_custom_layout = isset( $page_settings['sigma_page_layout'] ) ? $page_settings['sigma_page_layout'] : '';
  // Default page layout value
  $page_layout = 'container';
  if(in_array($page_custom_layout, $avaiable_layouts)){
    $page_layout = $page_custom_layout;
  }elseif( maharatri_get_option('page_layout') ){
    $page_layout = maharatri_get_option('page_layout');
  }
  return apply_filters( 'maharatri/page/page_layout', $page_layout );
}
/*
* get post author social links
*/
function maharatri_get_post_author_sm_links() {
	global $post;
  $twitter = get_the_author_meta( 'twitter', $post->post_author );
  $facebook = get_the_author_meta( 'facebook', $post->post_author );
  $pinterest = get_the_author_meta( 'pinterest', $post->post_author );
  $linkedin = get_the_author_meta( 'linkedin', $post->post_author );
  $youtube = get_the_author_meta( 'youtube', $post->post_author );
  if(!empty($twitter) || !empty($facebook) || !empty($behance) || !empty($linkedin) || !empty($youtube) ) {
  ?>
    <ul class="social-icon">
      <?php if(!empty($facebook)) { ?>
        <li><a href="<?php echo esc_url($facebook); ?>"><i class="fab fa-facebook-f"></i></a></li>
      <?php } if(!empty($twitter)) { ?>
        <li><a href="<?php echo esc_url($twitter); ?>"><i class="fab fa-twitter"></i></a></li>
      <?php } if(!empty($pinterest)) { ?>
        <li><a href="<?php echo esc_url($pinterest); ?>"><i class="fab fa-pinterest"></i></a></li>
      <?php } if(!empty($linkedin)) { ?>
        <li><a href="<?php echo esc_url($linkedin); ?>"><i class="fab fa-linkedin"></i></a></li>
      <?php } if(!empty($youtube)) { ?>
        <li><a href="<?php echo esc_url($youtube); ?>"><i class="fab fa-youtube"></i></a></li>
      <?php } ?>
    </ul>
  <?php
  }
}
/*
** Site preloader
*/
function maharatri_site_preloader() {
	if(maharatri_get_option('enable_preloader') == true ) {
		$preloader_style = maharatri_get_option('preloader_style');
		 get_template_part( 'template-parts/preloader/' . $preloader_style );
	}
}
add_action('wp_body_open', 'maharatri_site_preloader', 10);


function maharatri_event_meta_info_widget(){
	global $post, $maharatri_options;
    if( (is_singular('events') && ('events' === get_post_type())) && $maharatri_options['show_events_details_infobox'] ){
	$event_details = get_post_meta( $post->ID, 'sigma_events_details', true );
	$event_start_date = maharatri_is_not_empty($event_details, 'sigma_event_start_date') ? $event_details['sigma_event_start_date'] : '';
	$event_start_time = maharatri_is_not_empty($event_details, 'sigma_event_start_time') ? $event_details['sigma_event_start_time'] : '';
	$event_end_time = maharatri_is_not_empty($event_details, 'sigma_event_end_time') ? $event_details['sigma_event_end_time'] : '';
	$event_location_details = maharatri_is_not_empty($event_details, 'sigma_event_location') ? $event_details['sigma_event_location'] : '';
    $event_city_details = maharatri_is_not_empty($event_details, 'sigma_event_city') ? $event_details['sigma_event_city'] : '';
    $event_state_details = maharatri_is_not_empty($event_details, 'sigma_event_state') ? $event_details['sigma_event_state'] : '';
    $event_zipcode_details = maharatri_is_not_empty($event_details, 'sigma_event_zipcode') ? $event_details['sigma_event_zipcode'] : '';
    $event_country_details = maharatri_is_not_empty($event_details, 'sigma_event_country') ? $event_details['sigma_event_country'] : '';
	$event_organizer = maharatri_is_not_empty($event_details, 'sigma_event_organizer') ? $event_details['sigma_event_organizer'] : '';
	$event_info_phone = maharatri_is_not_empty($event_details, 'sigma_event_info_phone') ? $event_details['sigma_event_info_phone'] : '';
	$event_info_email = maharatri_is_not_empty($event_details, 'sigma_event_info_email') ? $event_details['sigma_event_info_email'] : '';
	$event_terms = get_the_terms( get_the_ID(), 'events-category' );

	$event_datestamp = strtotime($event_start_date . $event_start_time);

	$event_calendar_url = 'https://www.google.com/calendar/render?action=TEMPLATE&amp;text='.get_the_title().'&amp;dates='.date('Ymd', $event_datestamp).'T'.date('Hi00', $event_datestamp).'Z&amp;details=For+details,+link+here:+'.get_the_permalink().'&amp;sf=true&amp;output=xml';
	?>
	<div class="widget event-info-widget">
			<h2 class="widget-title"> <?php esc_html_e('Information', 'maharatri'); ?> </h2>
			<ul class="sidebar-widget-list">
				<?php if(!empty($event_start_date)) { ?>
					<li><span><?php esc_html_e('Date:', 'maharatri'); ?></span> <?php echo esc_html($event_start_date); ?></li>
				<?php } ?>
				<?php if(!empty($event_start_time)) { ?>
					<li><span><?php esc_html_e('Time:', 'maharatri'); ?></span> <?php echo esc_html('(' . $event_start_time . '-' . $event_end_time .')'); ?></li>
				<?php }
				if(!empty($event_terms)) {
				$terms_data = array();
				foreach ( $event_terms as $get_term ) {
					$terms_data[ $get_term->slug ] = $get_term->name;
				}
				?>
					<li><span><?php esc_html_e('Event Category:', 'maharatri'); ?></span> <?php echo esc_html( implode( ',', $terms_data ) ); ?></li>
				<?php }
                if(!empty($event_city_details)) { ?>
                    <li><span><?php esc_html_e('City:', 'maharatri'); ?></span> <?php echo esc_htmL($event_city_details); ?></li>
                <?php }
                if(!empty($event_state_details)) { ?>
                    <li><span><?php esc_html_e('State:', 'maharatri'); ?></span> <?php echo esc_htmL($event_state_details); ?></li>
                <?php }
                if(!empty($event_zipcode_details)) { ?>
                    <li><span><?php esc_html_e('Zipcode:', 'maharatri'); ?></span> <?php echo esc_htmL($event_zipcode_details); ?></li>
                <?php }
                if(!empty($event_country_details)) { ?>
                    <li><span><?php esc_html_e('Country:', 'maharatri'); ?></span> <?php echo esc_htmL($event_country_details); ?></li>
                <?php }
                if(!empty($event_organizer)) { ?>
                    <li><span><?php esc_html_e('Organizer:', 'maharatri'); ?></span> <?php echo esc_htmL($event_organizer); ?></li>
                <?php }
                if(!empty($event_info_phone)) { ?>
                    <li><span><?php esc_html_e('Phone:', 'maharatri'); ?></span> <?php echo esc_html($event_info_phone); ?></li>
                <?php }
                if(!empty($event_info_email)) { ?>
                    <li><span><?php echo esc_html('Email:', 'maharatri'); ?></span> <?php echo esc_html($event_info_email); ?></li>
                <?php } ?>
				</ul>
				<a href="<?php echo esc_url($event_calendar_url); ?>" class="sigma_btn-custom d-block w-100 mt-4"><?php esc_html_e('Book Now', 'maharatri'); ?></a>
		</div>
	<?php } elseif( (is_singular('philosophy') && ('philosophy' === get_post_type())) && $maharatri_options['show_philosophy_details_infobox'] ){
		$philosophy_details = get_post_meta( $post->ID, 'sigma_philosophy_details', true );
		$philosophy_start_date = maharatri_is_not_empty($philosophy_details, 'sigma_philosophy_start_date') ? $philosophy_details['sigma_philosophy_start_date'] : '';
		$philosophy_start_time = maharatri_is_not_empty($philosophy_details, 'sigma_philosophy_start_time') ? $philosophy_details['sigma_philosophy_start_time'] : '';
		$philosophy_end_time = maharatri_is_not_empty($philosophy_details, 'sigma_philosophy_end_time') ? $philosophy_details['sigma_philosophy_end_time'] : '';
		$philosophy_location_details = maharatri_is_not_empty($philosophy_details, 'sigma_philosophy_location') ? $philosophy_details['sigma_philosophy_location'] : '';
		$philosophy_organizer = maharatri_is_not_empty($philosophy_details, 'sigma_philosophy_organizer') ? $philosophy_details['sigma_philosophy_organizer'] : '';
		$philosophy_info_phone = maharatri_is_not_empty($philosophy_details, 'sigma_philosophy_info_phone') ? $philosophy_details['sigma_philosophy_info_phone'] : '';
		$philosophy_info_email = maharatri_is_not_empty($philosophy_details, 'sigma_philosophy_info_email') ? $philosophy_details['sigma_philosophy_info_email'] : '';
		$philosophy_terms = get_the_terms( get_the_ID(), 'philosophy-category' );

		$philosophy_datestamp = strtotime($philosophy_start_date . $philosophy_start_time);

		$philosophy_calendar_url = 'https://www.google.com/calendar/render?action=TEMPLATE&amp;text='.get_the_title().'&amp;dates='.date('Ymd', $philosophy_datestamp).'T'.date('Hi00', $philosophy_datestamp).'Z&amp;details=For+details,+link+here:+'.get_the_permalink().'&amp;sf=true&amp;output=xml';
			?>
			<div class="widget philosophy-info-widget">
					<h2 class="widget-title"> <?php esc_html_e('Information', 'maharatri'); ?> </h2>
					<ul class="sidebar-widget-list">
						<?php if(!empty($philosophy_start_date)) { ?>
							<li><span><?php esc_html_e('Date:', 'maharatri'); ?></span> <?php echo esc_html($philosophy_start_date); ?></li>
						<?php } ?>
						<?php if(!empty($philosophy_start_time)) { ?>
							<li><span><?php esc_html_e('Time:', 'maharatri'); ?></span> <?php echo esc_html('(' . $philosophy_start_time . '-' . $philosophy_end_time .')'); ?></li>
						<?php }
						if(!empty($philosophy_terms)) {
						$terms_data = array();
						foreach ( $philosophy_terms as $get_term ) {
							$terms_data[ $get_term->slug ] = $get_term->name;
						}
						?>
							<li><span><?php esc_html_e('Philosophy Category:', 'maharatri'); ?></span> <?php echo esc_html( implode( ',', $terms_data ) ); ?></li>
						<?php }
							if(!empty($philosophy_organizer)) { ?>
								<li><span><?php esc_html_e('Organizer:', 'maharatri'); ?></span> <?php echo esc_htmL($philosophy_organizer); ?></li>
							<?php }
							if(!empty($philosophy_info_phone)) { ?>
								<li><span><?php esc_html_e('Phone:', 'maharatri'); ?></span> <?php echo esc_html($philosophy_info_phone); ?></li>
							<?php }
							if(!empty($philosophy_info_email)) { ?>
								<li><span><?php echo esc_html('Email:', 'maharatri'); ?></span> <?php echo esc_html($philosophy_info_email); ?></li>
							<?php } ?>
						</ul>
						<a href="<?php echo esc_url($philosophy_calendar_url); ?>" class="sigma_btn-custom d-block w-100 mt-4"><?php esc_html_e('Book Now', 'maharatri'); ?></a>
				</div>
			<?php }
}
add_action('maharatri/before_default_sidebar', 'maharatri_event_meta_info_widget', 10);


function maharatri_event_authors_widget(){
	global $post;
    if(is_singular('events') && maharatri_get_option('show_events_details_speakers') == true) {
	$event_details = get_post_meta( $post->ID, 'sigma_events_details', true );
	if ( ( isset( $event_details['sigma_event_authors_total'] ) && $event_details['sigma_event_authors_total'] ) && ( isset( $event_details['sigma_event_authors_name'] ) && $event_details['sigma_event_authors_name'] ) ) {
	?>
	<div class="widget widget-event-speakers">
				<h2 class="widget-title"><?php esc_html_e('Speakers', 'maharatri'); ?></h2>
				<div class="accordion" id="generalFAQExample">
					<?php
					for ( $i = 0; $event_details['sigma_event_authors_total'] > $i; $i++ ) {
							$rand_id = mt_rand();
						?>
						<div class="card">
							<div class="card-header" id="collpase-<?php echo esc_attr($rand_id); ?>">
								<div class="author-widget-box collapsed" data-toggle="collapse" role="button" data-target="#general-<?php echo esc_js($rand_id); ?>" aria-expanded="<?php echo esc_attr($i == 0 ? 'true' : 'false'); ?>" aria-controls="general-<?php echo esc_js($rand_id); ?>">
									<article class="sigma_recent-post">
										<?php if(!empty($event_details['sigma_event_authors_image'][$i])) { ?>
											<div class="speaker-image"><img src="<?php echo esc_url($event_details['sigma_event_authors_image'][$i]); ?>" alt="post"></div>
										<?php } ?>
										<div class="sigma_recent-post-body">
											<?php if(!empty($event_details['sigma_event_authors_name'][$i])) { ?>
												<h6><?php echo esc_html($event_details['sigma_event_authors_name'][$i]); ?></h6>
											<?php } if(!empty($event_details['sigma_event_authors_time'][$i])) { ?>
												<p class="m-0"><?php echo esc_html($event_details['sigma_event_authors_time'][$i]); ?></p>
											<?php } ?>
										</div>
									</article>
								</div>
							</div>
							<?php if(!empty($event_details['sigma_event_authors_description'][$i])) { ?>
								<div id="general-<?php echo esc_js($rand_id); ?>" class="collapse <?php if ($i == 0) {
                        echo 'show';
                    } ?>" data-parent="#generalFAQExample">
									<div class="card-body">
										<?php echo esc_html($event_details['sigma_event_authors_description'][$i]); ?>
									</div>
								</div>
							<?php } ?>
						</div>
					<?php } ?>
				</div>
			</div>

	<?php } } elseif(is_singular('philosophy') && maharatri_get_option('show_philosophy_details_speakers') == true) {
		$philosophy_details = get_post_meta( $post->ID, 'sigma_philosophy_details', true );
	if ( ( isset( $philosophy_details['sigma_philosophy_authors_total'] ) && $philosophy_details['sigma_philosophy_authors_total'] ) && ( isset( $philosophy_details['sigma_philosophy_authors_name'] ) && $philosophy_details['sigma_philosophy_authors_name'] ) ) {
	?>
	<div class="widget widget-philosophy-speakers">
				<h2 class="widget-title"><?php esc_html_e('Speakers', 'maharatri'); ?></h2>
				<div class="accordion" id="generalFAQExample">
					<?php
					for ( $i = 0; $philosophy_details['sigma_philosophy_authors_total'] > $i; $i++ ) {
							$rand_id = mt_rand();
						?>
						<div class="card">
							<div class="card-header" id="collpase-<?php echo esc_attr($rand_id); ?>">
								<div class="author-widget-box collapsed" data-toggle="collapse" role="button" data-target="#general-<?php echo esc_js($rand_id); ?>" aria-expanded="<?php echo esc_attr($i == 0 ? 'true' : 'false'); ?>" aria-controls="general-<?php echo esc_js($rand_id); ?>">
									<article class="sigma_recent-post">
										<?php if(!empty($philosophy_details['sigma_philosophy_authors_image'][$i])) { ?>
											<div class="speaker-image"><img src="<?php echo esc_url($philosophy_details['sigma_philosophy_authors_image'][$i]); ?>" alt="post"></div>
										<?php } ?>
										<div class="sigma_recent-post-body">
											<?php if(!empty($philosophy_details['sigma_philosophy_authors_name'][$i])) { ?>
												<h6><?php echo esc_html($philosophy_details['sigma_philosophy_authors_name'][$i]); ?></h6>
											<?php } if(!empty($philosophy_details['sigma_philosophy_authors_time'][$i])) { ?>
												<p class="m-0"><?php echo esc_html($philosophy_details['sigma_philosophy_authors_time'][$i]); ?></p>
											<?php } ?>
										</div>
									</article>
								</div>
							</div>
							<?php if(!empty($philosophy_details['sigma_philosophy_authors_description'][$i])) { ?>
								<div id="general-<?php echo esc_js($rand_id); ?>" class="collapse <?php if ($i == 0) {
                        echo 'show';
                    } ?>" data-parent="#generalFAQExample">
									<div class="card-body">
										<?php echo esc_html($philosophy_details['sigma_philosophy_authors_description'][$i]); ?>
									</div>
								</div>
							<?php } ?>
						</div>
					<?php } ?>
				</div>
			</div>

	<?php } }
}
add_action('maharatri/before_default_sidebar', 'maharatri_event_authors_widget', 15);



/**
 * Adds donation options to redux sections.
 *
 * @since 1.0.0
 */
function maharatri_donation_redux_options( $options_files ) {
	if(maharatri_is_give_active()){
	  $options_files[] = get_template_directory() . '/inc/redux-options/options/donation-settings.php';
	}

  return $options_files;
}
add_filter( 'maharatri_redux_option_files', 'maharatri_donation_redux_options', 10, 1 );


/**
* Open tag before donation levels on details page
*
* @since 1.0.0
*/
function sigma_base_single_donation_field_wrapper_start() {
	echo '<div class="sigma_single-donation-content-wrapper">';
}
add_action('give_before_donation_levels', 'sigma_base_single_donation_field_wrapper_start');

/**
* Clase tag before donation levels on details page
*
* @since 1.0.0
*/
function sigma_base_single_donation_field_wrapper_end() {
	echo '</div>';
}
add_action('give_after_donation_levels', 'sigma_base_single_donation_field_wrapper_end');

/**
* Update live stream status
*
* @since 1.0.0
*/
function maharatri_update_livestream_status($status){
	return ($status == 'upcoming') ? update_option('livestream_status', 'Offline') : update_option('livestream_status', 'Live');
}

/**
* Get live stream status
*
* @since 1.0.0
*/
function maharatri_get_livestream_status(){
  return !empty(get_option('livestream_status')) ? get_option('livestream_status') : '';
}

/**
 *  Show login/register form in after footer
 *
 * @since 1.0.0
 */

function maharatri_ajax_login_register_form(){
    get_template_part('template-parts/header/elements/login-register-popup-form');
}
add_action('maharatri_after_footer', 'maharatri_ajax_login_register_form', 99);

/**
 * Login with Ajax
 */
function maharatri_ajax_login()
{
    // First check the nonce, if it fails the function will break
    check_ajax_referer('ajax-login-nonce', 'security');
    // Nonce is checked, get the POST data and sign user on
    $info = array();
    $info['user_login'] = $_POST['username'];
    $info['user_password'] = $_POST['password'];
    $info['remember'] = true;
    $user_signon = wp_signon($info, false);
    if (is_wp_error($user_signon)) {
        echo json_encode(array('loggedin' => false, 'message' => esc_html('Wrong username or password.')));
    } else {
        echo json_encode(array('loggedin' => true, 'message' => esc_html('Login successful, redirecting...')));
    }
    die();
}

add_action('wp_ajax_nopriv_maharatri_ajax_login', 'maharatri_ajax_login');

/**
 * Register user using ajax
 *
 * @since 1.0.0
 */

function maharatri_ajax_user_registration(){

    if( $_POST['action'] == 'maharatri_register_user' ) {

        $error = '';

        $uname = trim( $_POST['username'] );
        $email = trim( $_POST['mail_id'] );
        $fname = trim( $_POST['firstname'] );
        $lname = trim( $_POST['lastname'] );
        $pswrd = $_POST['passwrd'];
        $cf_pswrd = $_POST['confirmPasswrd'];

        if( empty( $_POST['username'] ) ) {
            $error .= '<p class="error">'.esc_html('Enter Username', 'maharatri').'</p>';
        }

        if( empty( $_POST['mail_id'] ) ) {
            $error .= '<p class="error">Enter Email Id</p>';
        } elseif( !filter_var($email, FILTER_VALIDATE_EMAIL) ) {
            $error .= '<p class="error">'.esc_html('Enter Valid Email', 'maharatri').'</p>';
        }


        if( empty( $_POST['passwrd'] ) ) {
            $error .= '<p class="error">'.esc_html('Password should not be blank', 'maharatri').'</p>';
        }

        if(empty( $_POST['confirmPasswrd'] )){
            $error .= '<p class="error">'.esc_html('Confirm Password should not be blank', 'maharatri').'</p>';
        } elseif( $pswrd !== $cf_pswrd ){
            $error .= '<p class="error">'.esc_html("Password doesn't match", "maharatri").'</p>';
        }

        if( empty( $_POST['firstname'] ) ) {
            $error .= '<p class="error">'.esc_html('Enter First Name', 'maharatri').'</p>';
        } elseif( !preg_match("/^[a-zA-Z'-]+$/",$fname) ) {
            $error .= '<p class="error">'.esc_html('Enter Valid First Name', 'maharatri').'</p>';
        }

        if( empty( $_POST['lastname'] ) ) {
            $error .= '<p class="error">'.esc_html('Enter Last Name', 'maharatri').'</p>';
        } elseif( !preg_match("/^[a-zA-Z'-]+$/",$lname) ) {
            $error .= '<p class="error">'.esc_html('Enter Valid Last Name', 'maharatri').'</p>';
        }

        if( empty( $error ) ){

            $status = wp_create_user( $uname, $pswrd ,$email );

            if( is_wp_error($status) ){

                $msg = '';

                foreach( $status->errors as $key=>$val ){

                    foreach( $val as $k=>$v ){
                        $msg = '<p class="error">'.$v.'</p>';
                    }
                }

                echo wp_kses($msg, array(
                    'p' => array(
                        'class' => array(),
                    ),
                ));

            } else { ?>
                <script>
                    jQuery("#maharatri-register-form")[0].reset();
                </script>
                <?php $msg = '<p class="success">'.esc_html('Registration Successful', 'maharatri').'</p>';
                echo wp_kses($msg, array(
                    'p' => array(
                        'class' => array(),
                    ),
                ));
            }

        } else{
            echo wp_kses($error, array(
                'p' => array(
                    'class' => array(),
                ),
            ));
        }
        wp_die();
    }
}
add_action( 'wp_ajax_maharatri_register_user', 'maharatri_ajax_user_registration' );
add_action( 'wp_ajax_nopriv_maharatri_register_user', 'maharatri_ajax_user_registration' );


/**
* Prayer submit form html
*
* @since 1.0.0
*/
function maharatri_prayer_form_html() {
	?>
	<div class="prayer-submit-form-wrapper">
		<h3><?php esc_html_e('Submit Prayer', 'maharatri'); ?></h3>
		<p id="prayer-submit-error"></p>
		<form method="post" id="ajax-prayer-form">
			<p><label for="prayer_title"><?php _e('Enter Prayer Title', 'maharatri') ?></label>
			<input type="text" name="prayer_title" id="prayer_title" /></p>

			<p> <label for="prayer_content"><?php esc_html_e('Enter Prayer Content', 'maharatri') ?></label>
			<textarea name="prayer_content" id="prayer_content" rows="4" cols="20"></textarea> </p>

			<p><?php
				wp_dropdown_categories(
					array(
						'taxonomy'          => 'prayer-category',
					 'hierarchical'      => true,
					 'show_option_none'  => esc_html_e( 'Select Categories', 'maharatri' ),
					 'option_none_value' => '',
					 'name'              => 'prayer_cat',
					 'id'                => 'prayer_cat',
					 'selected'          => isset( $_GET['prayer_cat'] ) ? $_GET['prayer_cat'] : '',
					 'multiple'          => true
					)
				);
			?></p>
			<p><?php
				wp_dropdown_categories(
					array(
						'taxonomy'          => 'prayer-tag',
					 'hierarchical'      => true,
					 'show_option_none'  => esc_html_e( 'Select Tags', 'maharatri' ),
					 'option_none_value' => '',
					 'name'              => 'prayer_tag',
					 'id'                => 'prayer_tag',
					 'selected'          => isset( $_GET['prayer_tag'] ) ? $_GET['prayer_tag'] : '',
					 'multiple'          => true
					)
				);
			?></p>
			<?php wp_nonce_field( 'prayer_nonce_action', 'prayer_nonce_field' ); ?>
			<button type="submit" class="sigma_custom-btn"><?php esc_html_e('Submit Prayer', 'maharatri') ?></button>

			<input type="hidden" name="post_type" id="post_type" value="prayer" />

		</form>
	</div>
	<?php
}


/**
* Prayer ajax post submit form
*
* @since 1.0.0
*/

function maharatri_prayer_submit_form() {

	if(!is_user_logged_in()){
		return;
	}
	$results = '';


	// create post object with the form values
	$cpt_id = wp_insert_post(
		array(
		'post_title'    => $_POST['prayer_title'],
		'post_content'  => $_POST['prayer_content'],
		'post_category' => $_POST['prayer_cat'],
	  'tags_input'    => $_POST['prayer_tag'],
		'post_status'   => 'pending',
		'post_type' => $_POST['post_type']
		)
	);

	wp_set_post_terms($cpt_id, $_POST['prayer_cat'], 'prayer-category' );
	wp_set_post_terms($cpt_id, $_POST['prayer_tag'], 'prayer-tag' );

	if ( $cpt_id != 0 )
	{
			$results = esc_html__('Prayer submitted successfully', 'maharatri');
	}
	else {
			$results = esc_html__('*Error occurred while adding the post', 'maharatri');
	}
	// Return the String
	die($results);
}

add_action( 'wp_ajax_maharatri_prayer_submit_form', 'maharatri_prayer_submit_form' );
add_action( 'wp_ajax_nopriv_maharatri_prayer_submit_form', 'maharatri_prayer_submit_form' );


/**
* Get path of custom post type folder in template parts
*
* @since 1.0.0
*/

function maharatri_get_post_type_file($post_type) {
	$filename = get_stylesheet_directory().'/template-parts/'. $post_type;
	if(file_exists($filename)) {
		return true;
	}
}
