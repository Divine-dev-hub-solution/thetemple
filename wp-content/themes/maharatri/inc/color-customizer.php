<?php
if ( ! function_exists( 'maharatri_color_customize_classes' ) ) {
	/**
	 * Get color customizer classe
	 *
	 * @param  array $data contains the css values.
	 * @return string
	 */
	function maharatri_custom_dynamic_style() {

		// Primary Color
		$primary_color = maharatri_get_option('primary_color', '#7E4555');;
		if(!empty($primary_color)){
			$primary_color_dark = maharatri_darken_color($primary_color, $darker = 1.2);
			$primary_color_rgba = maharatri_hex_to_rgb($primary_color, $alpha = 0.2);
		}

		// Secondary Color
		$secondary_color = maharatri_get_option('secondary_color', '#DB4242');
		if(!empty($secondary_color)){
			$secondary_color_dark = maharatri_darken_color($secondary_color, $darker = 1.2);
			$secondary_color_rgba = maharatri_hex_to_rgb($secondary_color, $alpha = 0.2);
		}

		// Tertiary Color
		$tertiary_color = maharatri_get_option('tertiary_color', '#f7f7f7');
		if(!empty($secondary_color)){
			$tertiary_color_dark = maharatri_darken_color($tertiary_color, $darker = 1.2);
			$tertiary_color_rgba = maharatri_hex_to_rgb($tertiary_color, $alpha = 0.2);
		}

		// Typography
		$ch_title_typography    = maharatri_get_option('custom_heading_title_typography');
		$ch_title_typography_ff = maharatri_is_not_empty($ch_title_typography, 'font-family') ? $ch_title_typography['font-family'] : '';
		$ch_title_typography_fw = maharatri_is_not_empty($ch_title_typography, 'font-weight') ? $ch_title_typography['font-weight'] : '';
		$ch_title_typography_ls = maharatri_is_not_empty($ch_title_typography, 'letter-spacing') ? $ch_title_typography['letter-spacing'] : '';
		$ch_title_typography_lh = maharatri_is_not_empty($ch_title_typography, 'line-height') ? $ch_title_typography['line-height'] : '';
		$ch_title_typography_fs = maharatri_is_not_empty($ch_title_typography, 'font-size') ? $ch_title_typography['font-size'] : '';

		$ch_subtitle_typography 	 = maharatri_get_option('custom_heading_subtitle_typography');
		$ch_subtitle_typography_ff = maharatri_is_not_empty($ch_subtitle_typography, 'font-family') ? $ch_subtitle_typography['font-family'] : '';
		$ch_subtitle_typography_fw = maharatri_is_not_empty($ch_subtitle_typography, 'font-weight') ? $ch_subtitle_typography['font-weight'] : '';
		$ch_subtitle_typography_ls = maharatri_is_not_empty($ch_subtitle_typography, 'letter-spacing') ? $ch_subtitle_typography['letter-spacing'] : '';
		$ch_subtitle_typography_lh = maharatri_is_not_empty($ch_subtitle_typography, 'line-height') ? $ch_subtitle_typography['line-height'] : '';
		$ch_subtitle_typography_fs = maharatri_is_not_empty($ch_subtitle_typography, 'font-size') ? $ch_subtitle_typography['font-size'] : '';

		$body_typography		= maharatri_get_option('body_typography');
		$body_typography_ff = maharatri_is_not_empty($body_typography, 'font-family') ? $body_typography['font-family'] : '';
		$body_typography_fw = maharatri_is_not_empty($body_typography, 'font-weight') ? $body_typography['font-weight'] : '';
		$body_typography_ls = maharatri_is_not_empty($body_typography, 'letter-spacing') ? $body_typography['letter-spacing'] : '';
		$body_typography_lh = maharatri_is_not_empty($body_typography, 'line-height') ? $body_typography['line-height'] : '';
		$body_typography_fs = maharatri_is_not_empty($body_typography, 'font-size') ? $body_typography['font-size'] : '';

		$h1_typography		= maharatri_get_option('h1_typography');
		$h1_typography_ff = maharatri_is_not_empty($h1_typography, 'font-family') ? $h1_typography['font-family'] : '';
		$h1_typography_fw = maharatri_is_not_empty($h1_typography, 'font-weight') ? $h1_typography['font-weight'] : '';
		$h1_typography_ls = maharatri_is_not_empty($h1_typography, 'letter-spacing') ? $h1_typography['letter-spacing'] : '';
		$h1_typography_lh = maharatri_is_not_empty($h1_typography, 'line-height') ? $h1_typography['line-height'] : '';
		$h1_typography_fs = maharatri_is_not_empty($h1_typography, 'font-size') ? $h1_typography['font-size'] : '';

		$h2_typography		= maharatri_get_option('h2_typography');
		$h2_typography_ff = maharatri_is_not_empty($h2_typography, 'font-family') ? $h2_typography['font-family'] : '';
		$h2_typography_fw = maharatri_is_not_empty($h2_typography, 'font-weight') ? $h2_typography['font-weight'] : '';
		$h2_typography_ls = maharatri_is_not_empty($h2_typography, 'letter-spacing') ? $h2_typography['letter-spacing'] : '';
		$h2_typography_lh = maharatri_is_not_empty($h2_typography, 'line-height') ? $h2_typography['line-height'] : '';
		$h2_typography_fs = maharatri_is_not_empty($h2_typography, 'font-size') ? $h2_typography['font-size'] : '';

		$h3_typography		= maharatri_get_option('h3_typography');
		$h3_typography_ff = maharatri_is_not_empty($h3_typography, 'font-family') ? $h3_typography['font-family'] : '';
		$h3_typography_fw = maharatri_is_not_empty($h3_typography, 'font-weight') ? $h3_typography['font-weight'] : '';
		$h3_typography_ls = maharatri_is_not_empty($h3_typography, 'letter-spacing') ? $h3_typography['letter-spacing'] : '';
		$h3_typography_lh = maharatri_is_not_empty($h3_typography, 'line-height') ? $h3_typography['line-height'] : '';
		$h3_typography_fs = maharatri_is_not_empty($h3_typography, 'font-size') ? $h3_typography['font-size'] : '';

		$h4_typography		= maharatri_get_option('h4_typography');
		$h4_typography_ff = maharatri_is_not_empty($h4_typography, 'font-family') ? $h4_typography['font-family'] : '';
		$h4_typography_fw = maharatri_is_not_empty($h4_typography, 'font-weight') ? $h4_typography['font-weight'] : '';
		$h4_typography_ls = maharatri_is_not_empty($h4_typography, 'letter-spacing') ? $h4_typography['letter-spacing'] : '';
		$h4_typography_lh = maharatri_is_not_empty($h4_typography, 'line-height') ? $h4_typography['line-height'] : '';
		$h4_typography_fs = maharatri_is_not_empty($h4_typography, 'font-size') ? $h4_typography['font-size'] : '';

		$h5_typography		= maharatri_get_option('h5_typography');
		$h5_typography_ff = maharatri_is_not_empty($h5_typography, 'font-family') ? $h5_typography['font-family'] : '';
		$h5_typography_fw = maharatri_is_not_empty($h5_typography, 'font-weight') ? $h5_typography['font-weight'] : '';
		$h5_typography_ls = maharatri_is_not_empty($h5_typography, 'letter-spacing') ? $h5_typography['letter-spacing'] : '';
		$h5_typography_lh = maharatri_is_not_empty($h5_typography, 'line-height') ? $h5_typography['line-height'] : '';
		$h5_typography_fs = maharatri_is_not_empty($h5_typography, 'font-size') ? $h5_typography['font-size'] : '';

		$h6_typography		= maharatri_get_option('h6_typography');
		$h6_typography_ff = maharatri_is_not_empty($h6_typography, 'font-family') ? $h6_typography['font-family'] : '';
		$h6_typography_fw = maharatri_is_not_empty($h6_typography, 'font-weight') ? $h6_typography['font-weight'] : '';
		$h6_typography_ls = maharatri_is_not_empty($h6_typography, 'letter-spacing') ? $h6_typography['letter-spacing'] : '';
		$h6_typography_lh = maharatri_is_not_empty($h6_typography, 'line-height') ? $h6_typography['line-height'] : '';
		$h6_typography_fs = maharatri_is_not_empty($h6_typography, 'font-size') ? $h6_typography['font-size'] : '';

		$logo_text_typography		 = maharatri_get_option('logo_text_typo');
		$logo_text_typography_ff = maharatri_is_not_empty($logo_text_typography, 'font-family') ? $logo_text_typography['font-family'] : '';
		$logo_text_typography_fw = maharatri_is_not_empty($logo_text_typography, 'font-weight') ? $logo_text_typography['font-weight'] : '';
		$logo_text_typography_ls = maharatri_is_not_empty($logo_text_typography, 'letter-spacing') ? $logo_text_typography['letter-spacing'] : '';
		$logo_text_typography_lh = maharatri_is_not_empty($logo_text_typography, 'line-height') ? $logo_text_typography['line-height'] : '';
		$logo_text_typography_fs = maharatri_is_not_empty($logo_text_typography, 'font-size') ? $logo_text_typography['font-size'] : '';
		$logo_text_typography_clr = maharatri_is_not_empty($logo_text_typography, 'color') ? $logo_text_typography['color'] : '';

		// Heading and body colors
		$body_color = maharatri_get_option('body_color');
		$headings_color = maharatri_get_option('headings_color', '#44233b');

		// Header
		$header_content_size = maharatri_get_option('header_content_size_custom');
		$header_size = maharatri_get_option( 'adjust-custom-header-width') ? maharatri_get_option( 'header_content_size_custom' ) : '';
		$header_top_bg = maharatri_get_option( 'header_top_bg' );
		$header_top_color = maharatri_get_option( 'header_top_color' );
		$header_top_color_hover = maharatri_get_option( 'header_top_color_hover' );
		$header_bottom_color = maharatri_get_option( 'header_bottom_color' );
		$header_bottom_color_hover = maharatri_get_option( 'header_bottom_color_hover' );
		$header_bottom_bg = maharatri_get_option( 'header_bottom_bg' );
		$header_contact_bg = maharatri_get_option( 'header_contact_bg' );
		$header_submenu_bg = maharatri_get_option( 'header_submenu_bg' );
		$header_submenu_color = maharatri_get_option( 'header_submenu_color' );
		$header_submenu_color_hover = maharatri_get_option( 'header_submenu_color_hover' );
		$header_sticky_bg = maharatri_get_option( 'header_sticky_bg' );
		$header_sticky_color = maharatri_get_option( 'header_sticky_color' );
		$header_sticky_color_hover = maharatri_get_option( 'header_sticky_color_hover' );

		// Footer
		$footer_top_bg = maharatri_get_option( 'footer_top_bg' );
		$footer_middle_bg = maharatri_get_option( 'footer_middle_bg' );
		$footer_bottom_bg = maharatri_get_option( 'footer_bottom_bg' );
		$footer_overlay_color = maharatri_get_option( 'footer_overlay_color' );

		// Logo size
		$header_logo_size = maharatri_get_option('header_logo_size');
		$header_logo_size_sm = maharatri_get_option('header_logo_size_sm');

		// Content Size
		$is_custom = maharatri_get_option( 'content_size', '1140' );
		$content_size = $is_custom != 'custom' ? maharatri_get_option( 'content_size' ) : maharatri_get_option( 'content_size_custom' );

		// Info Card
		$info_card_bg = maharatri_get_option( 'info_card_bg' );
		$info_card_color = maharatri_get_option( 'info_card_color' );

		// Page title height
		$page_title_height      = maharatri_get_option('subheader_height');
		ob_start();

		?>

		<?php if( !empty( $primary_color ) ){ ?>

			.sigma-post-style-2 .sigma-post-wrapper .sigma-post-inner .entry-footer ul li .entry-meta i, .sigma-post-style-2 .sigma-post-wrapper .sigma-post-inner .entry-footer ul li .meta-comment i,
			.sigma-post-style-2 .sigma-post-wrapper .sigma-post-inner .entry-footer ul li .post-meta-item i ,
			.sigma-volunteer-style-1 h5.sigma-volunteer-designation, .sigma-volunteer-detail .sigma-volunteer-designation,
			.sigma-video-box-style1 .vc_icon_element.vc_icon_element-outer .vc_icon_element-inner .vc_icon_element-icon:before,
			.sigma-footer-widgets-wrapper .widget_sigma_recent_entries .sigma-post-content a:hover,
			.site-footer.footer-light .sigma-footer-widgets-wrapper a:hover, .input-group .icon, .sigma-video-box-style2.vc_icon_element.vc_icon_element-outer .vc_icon_element-inner .vc_icon_element-icon:before,
			.site-header.header-scheme-dark .site-header-top .social-info li a:hover, .site-header.header-scheme-dark .site-header-top-inner > a:hover,
			.site-header.header-scheme-dark .site-header-bottom-inner > ul > li > a:hover, .site-header.header-scheme-dark .site-header-top-inner > ul > li > a:hover,
			.site-header .site-header-top .social-info li a:hover, .site-header .site-header-top-inner > a:hover, .widget-area.sidebar .widget.widget_sigma_recent_entries .sigma-post-content a:hover,
			.site-header .site-header-bottom-inner > ul > li > a:hover, .site-header .site-header-top-inner > ul > li > a:hover, .site-header .site-header-bottom-inner > ul > li.current_page_item > a,
			.site-header .site-header-top-inner > ul > li.current_page_item > a, .site-header .site-header-bottom-inner > ul > li.current-menu-item > a,
			.site-header .site-header-top-inner > ul > li.current-menu-item > a, .sigma-footer-widgets-wrapper a:hover,
			.comment-respond p.comment-form-comment .icon, .comment-respond .sigma-comment-form-input-wrapper>p .icon,
			.custom-primary, .masonry-item .sigma-stories-content-cover h3.stories-title a:hover, .post-author-box .post-author-details>span,
			.related-posts .sigma-post .entry-title a:hover, .related-posts .sigma-blog-link, .sigma-subheader .breadcrumb,
			.sigma-subheader .breadcrumb a:hover, .site-logo-wrapper .logo-infocard, .site-logo-wrapper ul.social-info li a:hover,
			.woocommerce table.shop_table .product-name .product-name:hover, .woocommerce table.shop_table td.product-name a:hover,
			.woocommerce ul.product_list_widget li .sigma_product-widget-body del + ins, ul.product_list_widget li .sigma_product-widget-body del + ins,
			.woocommerce ul.product_list_widget li .sigma_product-widget-body a:hover, ul.product_list_widget li .sigma_product-widget-body a:hover,
			.woocommerce ul.cart_list li .cart-item-body a:hover, .woocommerce ul.product_list_widget li .cart-item-body a:hover, ul.cart_list li .cart-item-body a:hover,
			ul.product_list_widget li .cart-item-body a:hover, .woocommerce div.product .woocommerce-tabs ul.tabs li:not(.active) a:hover,
			.woocommerce .sigma_product-single-content .product_meta > span a:hover,
			.woocommerce #respond input#submit.added::after, .woocommerce a.button.added::after, .woocommerce button.button.added::after, .woocommerce input.button.added::after,
			.woocommerce #respond input#submit.loading::after, .woocommerce a.button.loading::after,
			.woocommerce a.added_to_cart:hover, .woocommerce-LostPassword.lost_password a:hover, .woocommerce input.button.loading::after,
			.woocommerce-error a:hover, .woocommerce-info a:hover, .woocommerce-message a:hover, .woocommerce-message a:focus,
			.woocommerce a.added_to_cart:focus, .woocommerce-LostPassword.lost_password a:focus, .woocommerce-error a:focus, .woocommerce-info a:focus,
			.woocommerce .woocommerce-error .button:hover, .woocommerce .woocommerce-info .button:hover, .woocommerce .woocommerce-message .button:hover,
			.woocommerce-page .woocommerce-error .button:hover, .woocommerce-page .woocommerce-info .button:hover, .woocommerce-page .woocommerce-message .button:hover,
			.woocommerce .woocommerce-error .button:focus, .woocommerce .woocommerce-info .button:focus, .woocommerce-page .woocommerce-message .button:focus,
			.woocommerce .woocommerce-message .button:focus, .woocommerce-page .woocommerce-error .button:focus, .woocommerce-page .woocommerce-info .button:focus,
			.testimonial-box .clinet-post, a, table th a, table tbody th a:visited,
			 .post-navigation a:hover,
			.post-navigation .nav-previous a:hover:before, .post-navigation .nav-next a:hover:after,
			.widget.widget_rss .widget-title a::before, .woocommerce div.products .sigma_product-category-inner h2 mark,
		 	.sigma-service-icons li a, .sigma-post-wrapper .entry-title a:hover,
			.counter-style-1 .counter-box .icon i, .features-loop .feature-box .icon, .services-style-4 .single-service .service-link,
			.cta-section .cta-inner .cta-features .single-feature .icon, .services-btn a, .sigma_room_slider_wrapper .rooms-content-wrap .room-content-box .icon,
			.counter-style-2 .counter-box.counter-box-two .icon, .features-loop .feature-box:hover h3, .sigma-post-wrapper .entry-meta-footer .entry-meta-container i,
			.infobox-dark .features-loop .feature-box:hover h3, .sigma_room_slider_wrapper .rooms-slider-two .single-rooms-box .room-desc .price,
		 	.woocommerce .woocommerce-MyAccount-navigation ul li:not(.is-active) a:hover,
			#ctf .ctf-corner-logo,
			.widget.yith-woocompare-widget a.clear-all:hover,
			.stories-layout-tabs .stories-filter ul li:hover, .stories-style-1 .sigma-stories-action-icons i:hover, .sigma-stories-style-1 .stories-title a:hover,
			.sigma-stories-style-1 .sigma-stories-category, .sigma-stories-style-1 .sigma-stories-action-icons i:hover, .sigma-volunteer-style-2 .volunteer-title a:hover,
			.sigma-stories-style-2 .sigma-stories-thumbnail-wrapper .sigma-stories-content-cover .sigma-stories-category, .sigma-volunteer-style-2 .sigma-volunteer-designation,
			.stories-layout-tabs .stories-filter ul li.active, .services-style-4 .single-service i,
			.sigma-custom-tabs ul.nav li a span.icon, .services-style-1 .sigma-service-content a, .sigma-contact-box-style2.contact-page-box a:hover,
			.sigma-contact-box-style2.contact-page-box .infobox-style-4 i, .call-to-action.cta-style-two.home-3 .custom-heading-style-1 .heading-subtitle,
			.sigma-post-style-1 .sigma-post-wrapper .sigma-post-inner .entry-footer ul li a:hover,
			.sigma-post-wrapper .sigma-post-inner .entry-footer ul li span:hover, .widget-area.sidebar .widget.widget_sigma_recent_entries .sigma-post-content .sigma-post-date i,
			.widget-area.sidebar .widget.widget_categories ul li a:hover + span,
			.widget-area.sidebar .widget .author-box .social-icon li a:hover, .counter-style-1 .counter-box .icon i, .counter-style-2 .counter-box.counter-box-two .icon,
			.sigma_cta.cta-style-1 .sigma_cta.secondary-bg .sigma_cta-content span, .sigma_icon-block .icon-wrapper .icon i,
			.sigma-custom-tabs ul.nav li a span.icon, .sigma_timeline-image i, .cta-section .cta-inner .cta-features .single-feature .icon,
			.features-loop .feature-box .icon, .features-loop .feature-box:hover h3, .infobox-dark .features-loop .feature-box:hover h3,
			.infobox-style-4 .sigma_icon-block.icon-block-3 .icon-wrapper i,
			.infobox-style-4 .sigma_icon-block.icon-block-3 .icon-wrapper span.icon-number,
			.infobox-style-4 .sigma_icon-block.icon-block-3 .icon-wrapper img,
			.infobox-style-5 .sigma_icon-block .icon-wrapper i,
			 .stories-style-1 .sigma-stories-action-icons i:hover,
			.stories-layout-tabs .stories-filter ul li:hover,
			.stories-layout-tabs .stories-filter ul li.active, .sigma-stories-style-3 .sigma_stories-item.style-2:hover .sigma_stories-item-content a i,
			.progress-bar-style-3 .chart span b, .services-style-1 .sigma-service-content a, .services-style-2.services-layout-single .single-service i,
			.services-style-4 .single-service i, .services-style-4 .single-service .service-link,
			.service-style-3 .sigma_service i,
			.testimonial-box .clinet-post, .video-style-3 .popup-video.white,
			.custom-primary, .masonry-item .sigma-stories-content-cover h3.stories-title a:hover, .sigma-post-wrapper .entry-title a:hover,
			.sigma-post-wrapper .entry-meta-footer .entry-meta-container i, .post-author-box .post-author-details>span, .widget-area.sidebar .widget .author-box .social-icon li a:hover,
			.related-posts .sigma-post .entry-title a:hover, .related-posts .sigma-blog-link,
			.sigma-subheader .breadcrumb, .sigma-subheader .breadcrumb a:hover, .site-logo-wrapper ul.social-info li a:hover,
			.site-header .site-header-bottom-inner > ul > li > a:hover,
			.site-header .site-header-top-inner > ul > li > a:hover,
			.site-header .site-header-bottom-inner > ul > li.current_page_item > a,
			.site-header .site-header-top-inner > ul > li.current_page_item > a,
			.site-header .site-header-bottom-inner > ul > li.current-menu-item > a,
			.site-header .site-header-top-inner > ul > li.current-menu-item > a,
			.site-header .site-header-top .social-info li a:hover,
			.site-header .site-header-top-inner > a:hover, .sigma_aside ul .menu-item a:hover,
			.sigma_aside ul .menu-item a.active, .site-header.header-scheme-dark .site-header-top .social-info li a:hover,
			.site-header.header-scheme-dark .site-header-top-inner > a:hover,
			.site-header.header-scheme-dark .site-header-bottom-inner > ul > li > a:hover,
			.site-header.header-scheme-dark .site-header-top-inner > ul > li > a:hover, .site-header.header-scheme-dark .contact-info .contact-item i,
			.sigma-footer-widgets-wrapper a:hover, .sigma-footer-widgets-wrapper .widget_sigma_recent_entries .sigma-post-content a:hover,
			.input-group .icon, .vc_tta.vc_general .vc_tta-panel.vc_active .vc_tta-panel-title a i,
			.vc_tta.vc_general .vc_tta-tabs-list .vc_tta-tab a:hover,
			.sigma-video-box-style1 .vc_icon_element.vc_icon_element-outer .vc_icon_element-inner .vc_icon_element-icon:before,
			.sigma-video-box-style2.vc_icon_element.vc_icon_element-outer .vc_icon_element-inner .vc_icon_element-icon:before,
			.sigma-action-style1.sigma_custom_heading_wrapper .sigma-heading-title-wrapper .heading-title:before,
			.widget-area.sidebar .widget.widget_sigma_recent_entries .sigma-post-content a:hover,
			.widget-area.sidebar .widget.widget_sigma_recent_entries .sigma-post-content .sigma-post-date i,
			.sigma-contact-box-style2.contact-page-box a:hover, .sigma-contact-box-style2.contact-page-box .infobox-style-4 i,
			.widget-area.sidebar .widget.widget_categories ul li a:hover + span,
			.call-to-action.cta-style-two.home-3 .custom-heading-style-1 .heading-subtitle,
			.sigma-stories-style-1 .stories-title a:hover, .sigma-stories-style-1 .sigma-stories-action-icons i:hover,
			.sigma-stories-style-2 .sigma-stories-thumbnail-wrapper .sigma-stories-content-cover .sigma-stories-category,
			.sigma-volunteer-style-1 h5.sigma-volunteer-designation, .sigma-volunteer-style-2 .volunteer-title a:hover,
			.sigma-volunteer-style-2 .sigma-volunteer-designation, .sigma-volunteer-detail .sigma-volunteer-designation,
			.sigma-post-style-1 .sigma-post-wrapper .sigma-post-inner .entry-footer ul li a:hover,
			.sigma-post-wrapper .sigma-post-inner .entry-footer ul li span:hover,
			.sigma-post-style-2 .sigma-post-wrapper .sigma-post-inner .entry-footer ul li .entry-meta i,
			.sigma-post-style-2 .sigma-post-wrapper .sigma-post-inner .entry-footer ul li .meta-comment i,
			.sigma-post-style-2 .sigma-post-wrapper .sigma-post-inner .entry-footer ul li .post-meta-item i,
			.post-details-box .sigma-post-wrapper .sigma-post-inner .entry-footer ul li span a:hover, .sigma-shortcode-wrapper.testimonials-style-2 .slick-arrow:hover,
			 .sigma-shortcode-wrapper .sigma_post-filter a.active, .site-header.header-layout-3 .sub-menu a:hover,
			.woocommerce div.product .woocommerce-tabs ul.tabs li.active,
			.woocommerce-form-login-toggle .woocommerce-info a, .woocommerce-form-coupon-toggle .woocommerce-info a,
			.site-header.header-layout-3 .sigma_header-contact i,
			.site-footer.footer-light .sigma-footer-widgets-wrapper .widget_sigma_recent_entries .sigma-post-content a:hover,
			.woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce nav.woocommerce-pagination ul li a:hover, .nav-links .page-numbers:hover,
			 .woocommerce .widget ul.product-categories li>a:hover+.count,
			.woocommerce #reviews #comments ol.commentlist li .comment-text p.meta .woocommerce-review__published-date,
			.page-links a:hover, .site-header.header-layout-3 .sigma_header-middle .sigma_header-button .cart.dropdown-btn a,
			.wp-block-archives-list li a:hover, .entry-content .wp-block-latest-comments a:hover,
			.widget-area.sidebar .widget.widget_archive ul li a:hover + span,
			.widget-area.sidebar .widget.widget_recent_entries ul li a:hover + span,
			.widget-area.sidebar .widget.widget_meta ul li a:hover + span,
			.widget-area.sidebar .widget.widget_pages ul li a:hover + span,
			.woocommerce div.product form.cart .group_table td.woocommerce-grouped-product-list-item__label a:hover,
			.woocommerce div.product form.cart .group_table td.woocommerce-grouped-product-list-item__price,
			.sigma-post-style-1 .sigma-post-wrapper .sigma-post-inner .entry-footer ul li .meta-comment a:hover span,
			.site-header.header-layout-2 .site-header-bottom-inner > ul ul.sub-menu > li > a:hover,
			.sigma-ministries-style-2:hover .sigma_stories-item-content h5 a,
			.sigma-ministries-style-2:hover .sigma_stories-item-content .stories-link i, .sigma-ministries-style-3:hover .sigma_stories-item-content .stories-link i,
			.sigma-shortcode-wrapper .sigma_post-filter a.active,
			.sigma-ministries-style-3:hover .sigma_stories-item-content h5 a, .sigma-ministries-style-3 .sigma_stories-item-content .sigma_stories-item-content-inner .sigma-ministries-category,
			.sigma-sermons-style-1 .sigma_box .sigma_sermon-info li i,
			.sigma-sermons-style-1 .sigma_box .sigma_sm li a:hover,
			.sigma-sermons-style-1 .sigma_box .sigma_sm .social-icon-share .social-share-icons li a:hover,
			.sigma-events-style-2 .sigma_box .sigma_event-info .event-date-wrapper span,
			.sigma-ministries-style-1 .sigma_ministries-item-content .sigma_ministries-item-content-inner h5 a:hover,
			.sigma-sermons-style-1 .sigma_box .sigma_sm .social-icon-share .social-share-button:hover,
			button[name=audioplay]:before,
			.timeupdate, .entry-footer.event-detail-footer-meta .social-icon-share .social-share-icons li a:hover,
			.widget-area.sidebar .widget.widget_sigma_recent_events ul li .event-date span,
			.sigma_recent-prayer .sigma_recent-post-body h6 a:hover, .sigma_recent-prayer .sigma_recent-post-body > a i,
			.site-header.header-layout-5 .sigma_header-top .sigma_header-top-inner .navbar-nav .sub-menu a:hover, .header-layout-5 .cart.dropdown-btn a:hover,
			.site-header.header-layout-5 .sigma_header-middle .prayer-icon:hover i,
			.site-header.header-layout-4 .sigma_header-inner .navbar-nav .sub-menu a:hover,
			.header-layout-4 .sigma_header-inner .cart.dropdown-btn a:hover,
			.site-header.header-layout-4 .sigma_header-inner .prayer-icon:hover, .header-layout-4.header-scheme-dark .sigma_header-inner .sigma_header-top .sigma_header-top-inner ul.sub-menu li a:hover,
			.sigma-volunteer-detail .sigma-volunteer-textwrap .sigma-volunteer-details-container h5,
			#content [id*=give-form] .give-goal-progress .raised .income,
			.wp-calendar-table td#today a,
			.header-layout-4 .sigma_header-inner .sigma_header-top .sigma_base-livestream-status.Offline span::before,
			.header-layout-4 .sigma_header-inner .sigma_header-top .sigma_base-livestream-status.Upcoming span::before,
			.header-layout-5 .sigma_header-top .sigma_header-top-inner .sigma_base-livestream-status.Offline span::before,
			.header-layout-5 .sigma_header-top .sigma_header-top-inner .sigma_base-livestream-status.Upcoming span::before,
			.maharatri-compare-table .maharatri-compare-row .maharatri-compare-col .compare-basic-content .maharatri-compare-remove:hover,
			.sigma_product .sigma_product-thumb .sigma_product-controls .maharatri-compare-btn a.added::before,
			.maharatri-product-single-compare-btn a.added::before,
			.sigma_donation.sigma-donation-style-2 .sigma_donation-body .signa_donation-collection p span,
			.sigma-donation-style-4 .signa_donation-collection p span,
			.sigma-donation-style-5 .signa_donation-collection p span,
			.sigma-donation-style-6 .signa_donation-collection p span,
			.sigma-donation-style-5 .sigma_donation-body h6,
			.sigma-donation-style-6 .sigma_donation-body h6,
			.post-thumbnail .cta-style-3 .sigma_icon-block .sigma_service-footer ul li::before,
			.widget-area.sidebar .widget.widget_sigma_recent_events ul li .event-name h6 a:hover,
      .elementor-widget-sc-infobox .infobox-style-3 .sigma_icon-block.icon-block-3 .icon i,
      .elementor-widget-sc-infobox .infobox-style-4 .sigma_icon-block .sigma_icon-block-content > span,
      .elementor-widget-sc-infobox .infobox-style-4 .sigma_icon-block .icon-wrapper i,
      .elementor-widget-sc-list .sigma-list .list-item .sigma-list-icon,
      .widget-area.sidebar .widget.widget_categories ul li span,
      .widget-area.sidebar .widget.widget_archive ul li span,
      .widget-area.sidebar .widget.widget_recent_entries ul li span,
      .widget-area.sidebar .widget.widget_meta ul li span,
      .widget-area.sidebar .widget.widget_pages ul li span,
			.elementor-widget-sc-counter .sigma_counter_wrapper.counter-style-1 .icon i,
			.elementor-widget-sc-counter .counter-style-2 .counter-box-two .icon,
			.elementor-widget-sc-custom-tabs .sigma_custom_tab_wrapper .sigma_tab-item ul li a i,
			.elementor-widget-sc-infobox .infobox-style-3 .sigma_icon-block.icon-block-3 .icon i,
			.elementor-widget-sc-infobox .infobox-style-3 .sigma_icon-block.icon-block-3 .icon img,
			.elementor-widget-sc-infobox .infobox-style-4 .sigma_icon-block .sigma_icon-block-content > span,
			.elementor-widget-sc-infobox .infobox-style-4 .sigma_icon-block .icon-wrapper i,
			.elementor-widget-sc-list .sigma-list .list-item .sigma-list-icon,
			.sigma-service-icons li a,
			#prayer-submit-error,
			.sigma-philosophy-style-1 .sigma_post-thumb .philosophy-date-wrapper span,
			.sigma-philosophy-style-1 .sigma_post-body .sigma_post-meta span i,
			.sigma-philosophy-style-2 .sigma_box .sigma_philosophy-info .philosophy-date-wrapper span,
			.sigma-philosophy-style-2 .sigma_box .sigma_philosophy-info .sigma_philosophy-descr li i,
			.sigma-philosophy-details .gallery-thumb .sigma_philosophy-timer .sigma_philosophy-date span,
			.sigma-philosophy-details .sigma_post-meta span i,
			.entry-footer.philosophy-detail-footer-meta .social-icon-share .social-share-icons li a:hover,
			.widget-area.sidebar .widget.widget_sigma_recent_philosophy ul li .philosophy-date span,
			.widget-area.sidebar .widget.widget_sigma_recent_philosophy ul li .philosophy-name h6 a:hover,
			.sigma-buddhism-style-1 .sigma_box .sigma_buddhism-info li i,
			.sigma-buddhism-style-1 .sigma_box .sigma_sm li a:hover,
			.sigma-buddhism-style-1 .sigma_box .sigma_sm .social-icon-share .social-share-button:hover,
			.sigma-buddhism-style-1 .sigma_box .sigma_sm .social-icon-share .social-share-icons li a:hover,
			.sigma-community-style-1 .sigma_community-item-content .sigma_community-item-content-inner h5 a:hover,
			.sigma-community-style-2:hover .sigma_portfolio-item-content h5 a,
			.sigma-community-style-2:hover .sigma_portfolio-item-content .portfolio-link i,
			.sigma-community-style-3:hover .sigma_portfolio-item-content .portfolio-link i,
			.sigma-community-style-3:hover .sigma_portfolio-item-content h5 a,
			.sigma-community-style-3 .sigma_portfolio-item-content .sigma_portfolio-item-content-inner .sigma-community-category,
			.sigma-community-details .sigma_post-single-thumb .sigma_box .social-icon-share .social-share-icons li a:hover,
			.sigma-puja-style-2:hover .sigma_portfolio-item-content h5 a,
			.sigma-puja-style-2:hover .sigma_portfolio-item-content .portfolio-link i,
			.sigma-puja-style-3:hover .sigma_portfolio-item-content .portfolio-link i,
			.sigma-puja-details .sigma_post-single-thumb .sigma_box .social-icon-share .social-share-icons li a:hover,
			.sigma-holis-style-1 .sigma_box .sigma_sm li a:hover,
			.sigma-holis-style-1 .sigma_box .sigma_sm .social-icon-share .social-share-button:hover,
			.sigma-holis-style-1 .sigma_box .sigma_sm .social-icon-share .social-share-icons li a:hover,
			body.custom-button-style-1 .vc_general.vc_btn3.vc_btn3-color-primary.vc_btn3-style-outline,
			body.custom-button-style-2 .vc_general.vc_btn3.vc_btn3-color-primary.vc_btn3-style-outline,
			body.custom-button-style-3 .vc_btn3.vc_general.vc_btn3-color-primary.vc_btn3-style-outline,
			body.custom-button-style-4 .vc_btn3.vc_general.vc_btn3-color-primary.vc_btn3-style-outline,
			.m-megamenu .m-megamenu-content-wrapper .sigma_megamenu_menu_wrapper ul.menu li.menu-item a span.badge,
			.sigma_megamenu-tab-item.style-1 .nav-tabs .nav-item a.active i,
			.m-megamenu .m-megamenu-content-wrapper .nav-link-tab-item.active,
			.m-megamenu .m-megamenu-content-wrapper .nav-link-tab-item:hover,
			.m-megamenu .m-megamenu-content-wrapper .sigma_megamenu_menu_wrapper ul.menu li.menu-item a:hover,
			.elementor-widget-sc-megamenu-menu .sigma_megamenu_menu_wrapper ul li a:hover,
			.elementor-widget-sc-megamenu-menu .sigma_megamenu_menu_wrapper ul li a .menu-icon,
			.elementor-widget-sc-megamenu-menu .sigma_megamenu_menu_wrapper ul li a .menu-badge,
			.site-header .sigma_mega-menu-item ul.menu li a:hover,
			.site-header div .sigma_mega-menu-item ul.menu li a span.badge,
			.m-megamenu .m-megamenu-content-wrapper .sigma_megamenu_menu_wrapper ul.menu li.menu-item a span.badge,
			.testimonials-style-2 .sigma_testimonial-footer cite, .vc_tta-color-grey.vc_tta-style-classic .vc_tta-tab.vc_active>a,
			.vc_tta.vc_general .vc_tta-tabs-list .vc_tta-tab a, .entry-footer.event-detail-footer-meta .event-tags-meta .tagcloud a,
			.tagcloud a, .wp-block-tag-cloud a,
			.site-header.header-layout-4 .sigma_header-inner .navbar-nav .sub-menu a:hover,
			.site-header.header-layout-5 .sigma_header-middle .navbar-nav .sub-menu a:hover
			{
				color: <?php echo esc_attr($primary_color); ?>;
			}
			@media(max-width: 1500px) {
				.site-header.header-layout-3 .sigma_header-button .sigma_header-contact i{
					color: <?php echo esc_attr($primary_color); ?>;
				}
			}

			.sigma-btn-dark .vc_btn3-color-primary:after, .sigma-btn-dark .vc_btn3-color-primary:before, .sigma-btn-dark .vc_btn3-color-secondary:after,
			.sigma-btn-dark .vc_btn3-color-secondary:before, .theme-btn:after, .theme-btn:before, .sigma-btn-dark .vc_btn3-color-secondary,
			.theme-btn.btn-yellow, .sigma-btn-dark .vc_btn3-color-secondary:hover:after, .sigma-btn-dark .vc_btn3-color-secondary:hover:before,
			.theme-btn.btn-yellow:hover:after, .theme-btn.btn-yellow:hover:before, .sigma-btn-dark .vc_btn3-color-primary,
			.sigma-btn-dark .vc_btn3-color-primary:hover:after, .sigma-btn-dark .vc_btn3-color-primary:hover:before,
			.theme-btn.btn-white:after, .single-detail-page .page-service-list li i, .sigma-post-wrapper footer .sigma_post_tags .entry-meta-container>.tag-list a:hover,
			.theme-btn.btn-white:before, .rounded-frame:after, .widget-area.sidebar .widget.widget_sigma_social_share .social-icons li>a:hover,
			.sigma-stories-details .sigma-stories-content blockquote, .sigma-volunteer-style-1 .sigma-volunteer-social-profiles li.share-main:hover a,
			.sigma-stories-style-2 .sigma-stories-thumbnail-wrapper .sigma-stories-content-cover .sigma-stories-category:before,
			.sigma-volunteer-style-1 .sigma-volunteer-social-profiles li:hover a,
			.call-to-action.cta-style-two.home-3 .custom-heading-style-1 .heading-subtitle:before, .call-to-action.cta-style-two.home-3 .cat-link,
			.sigma-video-box-style2.vc_icon_element.vc_icon_element-outer .vc_icon_element-inner:hover .vc_icon_element-icon:before,  .call-to-action.cta-style-two.home-3 .need-cta-img:before,
			.sigma-video-box-style1 .vc_icon_element.vc_icon_element-outer .vc_icon_element-inner:hover .vc_icon_element-icon:before, .sigma-video-box-style1 h5,
			body .vc_btn3.vc_btn3-color-white:hover, body .vc_btn3.vc_btn3-color-white.vc_btn3-style-flat:hover, .half-bg:before, .sigma-stories-style-1 .sigma-stories-action-icons i,
			body .vc_btn3.vc_btn3-color-tertiary:hover, body .vc_btn3.vc_btn3-color-tertiary.vc_btn3-style-flat:hover, .video-link.home .popup-video, .video-link.home .popup-video::after,
			body .vc_btn3.vc_btn3-color-secondary:hover, body .vc_btn3.vc_btn3-color-secondary:focus, body .vc_btn3.vc_btn3-color-secondary.vc_btn3-style-flat:hover,
			body .vc_btn3.vc_btn3-color-primary, body .vc_btn3.vc_btn3-color-primary.vc_btn3-style-flat, .vc_btn3.vc_btn3-style-custom, .sigma-volunteer-style-2 .sigma-volunteer-social-profiles li a:hover,
			body .vc_general.vc_btn3, .sigma-year, .sigma-about-introbox:before, .sigma-contact-box-style1:after, footer .social-icon a:hover,
			.header-controls > div > a:hover, .header-controls > .panel-control:hover, .site-header.header-scheme-dark .contact-info .contact-item i,
			.site-header .contact-info .contact-item:hover i, .site-header .site-header-bottom-inner > ul ul.sub-menu li a:hover, .site-footer.site-footer-layout-2 .form-group button,
			.down-arrow-wrap a, .primary-bg, .slick-arrow:hover, .arrow-style .slick-arrow:hover, .arrow-style .slick-arrow.slider-next,
			.slick-slider .slick-dots .slick-active button, .sigma-stories-detail-title:before, .sigma-volunteer-link-profiles li a:hover, .sigma-volunteer-detail-title:before,
			.woocommerce .yith-woocompare-widget a.button:hover, .yith-woocompare-widget a.button:hover, .woocommerce #payment #place_order, .woocommerce-page #payment #place_order,
			.select_option_label.select_option.selected span, .woocommerce .widget_layered_nav ul.yith-wcan-label li.chosen a, .woocommerce-page .widget_layered_nav ul.yith-wcan-label li.chosen a,
			.woocommerce-mini-cart__buttons a.button.checkout:hover, .woocommerce-mini-cart__buttons a.button.checkout::before, .sigma-stories-style-1 .sigma-stories-category:before,
			.sigma_product-controls a:hover, .woocommerce-page .widget_layered_nav .yith-wcan-select-wrapper ul li.chosen a,
			.woocommerce .cart .button.alt, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,
			.cart .button.alt, #respond input#submit, a.button, button.button, input.button, .woocommerce #respond input#submit.alt:focus,
			.woocommerce a.button.alt:focus, .woocommerce button.button.alt:focus, .woocommerce input.button.alt:focus, .woocommerce #respond input#submit.alt:hover,
			.woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .video-style-2 .video-text .video-link-two .popup-video,
			.select2-container--default .select2-results__option--highlighted[aria-selected], .select2-container--default .select2-results__option--highlighted[data-selected],
			.sigma_room_slider_wrapper .rooms-slider-two .slick-arrow:hover, .sigma_room_slider_wrapper .rooms-slider-two .slick-arrow.next-arrow,
			.sigma_room_slider_wrapper .rooms-content-wrap .room-content-box .room-content-slider ul.slick-dots li.slick-active button, .sigma-shortcode-wrapper .slick-arrow:hover,
			 .widget-area.sidebar .widget.widget_categories ul li a:hover, button.sigma-search-button,
			button, html input[type=button], input[type=reset], input[type=submit], .arrow-middle-right .owl-nav button:hover,
			.widget_calendar td#today:before, .wp-block-calendar td#today:before, .widget_tag_cloud a:hover, .arrow-on-hover .owl-nav button:hover,
			.testimonial-box .client-img .check, .testimonial-slider ul.slick-dots li.slick-active button, .owl-dots .owl-dot.active, .call-to-action.cta-inner.vc_row:after,
			.services-style-1 .sigma-service-date, .services-style-2 .sigma-service-date i, .services-style-2.services-layout-single .single-service i,
			.stories-style-1 .sigma-stories-action-icons i, .services-style-3 .sigma-service-service-wrapper .service-title, .image-frame::after,
			.stories-layout-tabs .stories-filter:after, .sigma_progress_bar_wrapper .sigma-progress-bar-inner, .sigma-post-wrapper .sigma_post_categories .categories-list a,
			.cta-section .cta-inner .cta-features .single-feature:hover .icon, .woocommerce .woocommerce-MyAccount-navigation ul li.is-active a,
			.cta-section .cta-inner .cta-text a.main-btn.btn-filled:hover, .woocommerce .widget_price_filter .price_slider_amount .button:hover,
			.sigma-custom-tabs ul.nav li a:hover span.icon, .sigma-service-icons li a:hover, .post.sticky .sigma-post-inner:after, .sigma-contact-info .wpcf7-submit,
			.sigma-custom-tabs ul.nav li a.active span.icon, .wpb-js-composer .sigma-accordion-style-1 .vc_tta.vc_general .vc_tta-panel.vc_active .vc_tta-panel-title>a:before,
			.widget h2.widget-title:after,
			body.custom-button-style-1 .vc_btn3.vc_btn3-style-classic.vc_btn3-color-primary:hover, body.custom-button-style-1 .vc_general.vc_btn3.vc_btn3-style-outline.vc_btn3-color-primary:before,
			body.custom-button-style-2 .vc_general.vc_btn3.vc_btn3-style-outline.vc_btn3-color-primary:before,
			.custom-images-style-1 .img-group-inner span, .sigma-custom-tabs ul.nav li a:hover span.icon,
			.sigma-custom-tabs ul.nav li a.active span.icon, .cta-section .cta-inner .cta-text a.main-btn.btn-filled:hover, .cta-section .cta-inner .cta-features .single-feature:hover .icon,
			.stories-style-1 .sigma-stories-action-icons i, .sigma-stories-style-4 .sigma_stories-item .sigma_stories-item-content a i,
			.sigma-shortcode-wrapper .sigma_post-filter.tabs-style-2 a.active,
			.sigma-shortcode-wrapper .sigma_post-filter.tabs-style-2 a:hover,
			.sigma-shortcode-wrapper .sigma_post-filter.tabs-style-3 a.active,
			.sigma-shortcode-wrapper .sigma_post-filter.tabs-style-3 a:hover,
			.sigma-shortcode-wrapper .sigma_post-filter.tabs-style-4 a.active,
			.sigma-shortcode-wrapper .sigma_post-filter.tabs-style-4 a:hover, .sigma_progress_bar_wrapper .sigma-progress-bar-inner, .services-style-1 .sigma-service-date,
			.services-btn a, .services-style-2 .sigma-service-date i, .services-style-3 .sigma-service-service-wrapper .service-title, .service-style-3 .sigma_service .sigma_service-thumb::before,
			.service-style-3 .sigma_service .sigma_service-thumb::after, .sigma-volunteer-style-2 .sigma_volunteer.volunteer-5 .sigma_volunteer-thumb .sigma_sm.visible a.trigger-volunteer-socials,
			.sigma-volunteer-style-2 .sigma_volunteer.volunteer-5 .sigma_volunteer-thumb .sigma_sm a:hover,
			.sigma-volunteer-style-2 .sigma_volunteer.volunteer-4 .sigma_volunteer-thumb .sigma_sm.visible a.trigger-volunteer-socials,
			.sigma-volunteer-style-2 .sigma_volunteer.volunteer-4 .sigma_volunteer-thumb .sigma_sm a:hover, .sigma_volunteer.volunteer-4 .sigma_volunteer-thumb .sigma_sm a.trigger-volunteer-socials:hover,
			.sigma_volunteer.volunteer-4 .sigma_sm li a:hover,
			.sigma_volunteer.volunteer-4 .sigma_volunteer-thumb .sigma_sm.visible a.trigger-volunteer-socials, .testimonial-box .client-img .check,
			.testimonial-slider ul.slick-dots li.slick-active button, .testimonials-style-2 .sigma_testimonial-thumb:before,
			.video-style-3 .popup-video, .video-style-3 .popup-video.white:hover,
			.down-arrow-wrap a, .primary-bg, .sigma-shortcode-wrapper .slick-arrow:hover,
			.slick-arrow:hover, .arrow-style .slick-arrow:hover, .arrow-style .slick-arrow.slider-next,
			.slick-slider .slick-dots .slick-active button, .sigma-stories-detail-title:before, .sigma-volunteer-link-profiles li a:hover,
			.sigma-volunteer-detail-title:before, .post.sticky .sigma-post-inner:after, .breadcrumb-nav.below-image,
			.site-logo-wrapper .logo-infocard, .site-header .contact-info .contact-item:hover i,
			.site-header .site-header-bottom-inner > ul ul.sub-menu li a:hover,.header-controls > div > a:hover,
			.header-controls > .panel-control:hover, .site-header.header-layout-3 .sigma_btn-custom, .header-layout-6 .sigma_header-controls .sigma_btn-custom, .site-header.header-layout-3.header-scheme-dark .sigma_header-middle,
			.site-header.header-layout-5.header-scheme-dark,
			.site-header.header-layout-5.header-absolute.header-scheme-dark .sigma_header-middle .navbar,
			.site-header.header-layout-3.header-scheme-dark .sigma_btn-custom:hover, .site-footer.site-footer-layout-2 .form-group button,
			footer.footer-light.site-footer-layout-3 .social-icon a:hover, .wpb-js-composer .sigma-accordion-style-1 .vc_tta.vc_general .vc_tta-panel.vc_active .vc_tta-panel-title>a:before,
			.owl-dots .owl-dot.active, .arrow-on-hover .owl-nav button:hover, .arrow-middle-right .owl-nav button:hover, button.sigma-search-button,
			body .vc_btn3.vc_btn3-color-white:hover,
			body .vc_btn3.vc_btn3-color-white.vc_btn3-style-flat:hover,
			body .vc_btn3.vc_btn3-color-tertiary:hover,
			body .vc_btn3.vc_btn3-color-tertiary.vc_btn3-style-flat:hover,
			body .vc_btn3.vc_btn3-color-secondary:hover,
			body .vc_btn3.vc_btn3-color-secondary:focus,
			body .vc_btn3.vc_btn3-color-secondary.vc_btn3-style-flat:hover,
			body .vc_btn3.vc_btn3-color-primary,
			body .vc_btn3.vc_btn3-color-primary.vc_btn3-style-flat, .vc_btn3.vc_btn3-style-custom,
			body .vc_general.vc_btn3, body.custom-button-style-1 .vc_btn3.vc_btn3-style-classic.vc_btn3-color-primary:hover,
			body.custom-button-style-1 .vc_general.vc_btn3.vc_btn3-style-outline.vc_btn3-color-primary:before,
			body.custom-button-style-2 .vc_general.vc_btn3.vc_btn3-style-outline.vc_btn3-color-primary:before,
			body .vc_toggle.vc_toggle_default.vc_toggle_active .vc_toggle_title, .sigma-year,
			.sigma-about-introbox:before, .sigma-contact-box-style1:after, .sigma-video-box-style1 .vc_icon_element.vc_icon_element-outer .vc_icon_element-inner:hover .vc_icon_element-icon:before,
			.sigma-video-box-style1 h5, .sigma-video-box-style2.vc_icon_element.vc_icon_element-outer .vc_icon_element-inner:hover .vc_icon_element-icon:before,
			.widget_sigma_cta_widget .cta-content, .half-bg:before, .sigma-contact-info .wpcf7-submit, .sigma-post-wrapper .sigma_post_categories .categories-list a,
			.image-frame::after, .widget-area.sidebar .widget.widget_categories ul li a:hover,
			.call-to-action.cta-inner.vc_row:after, .call-to-action.cta-style-two.home-3 .custom-heading-style-1 .heading-subtitle:before,
			.call-to-action.cta-style-two.home-3 .cat-link,
			.call-to-action.cta-style-two.home-3 .need-cta-img:before, .video-link.home .popup-video, .video-link.home .popup-video::after,
			footer .social-icon a:hover, .sigma-stories-style-1 .sigma-stories-category:before, .sigma-stories-style-1 .sigma-stories-action-icons i,
			.sigma-stories-details .sigma-stories-content blockquote, .sigma-volunteer-style-1 .sigma-volunteer-social-profiles li.share-main:hover a,
			.sigma-volunteer-style-1 .sigma-volunteer-social-profiles li:hover a, .sigma-volunteer-style-2 .sigma-volunteer-social-profiles li a:hover,
			.sigma-btn-dark .vc_btn3-color-primary:after,
			.sigma-btn-dark .vc_btn3-color-primary:before,
			.sigma-btn-dark .vc_btn3-color-secondary:after,
			.sigma-btn-dark .vc_btn3-color-secondary:before,
			.theme-btn:after,
			.theme-btn:before, .sigma-btn-dark .vc_btn3-color-secondary,
			.theme-btn.btn-yellow, .sigma-btn-dark .vc_btn3-color-secondary:hover:after,
			.sigma-btn-dark .vc_btn3-color-secondary:hover:before,
			.theme-btn.btn-yellow:hover:after,
			.theme-btn.btn-yellow:hover:before, .sigma-btn-dark .vc_btn3-color-primary, .sigma-btn-dark .vc_btn3-color-primary:hover:after,
			.sigma-btn-dark .vc_btn3-color-primary:hover:before, .theme-btn.btn-white:after,
			.theme-btn.btn-white:before, .theme-btn.btn-white:hover, .video-style-2 .video-text .video-link-two .popup-video,
			.single-detail-page .page-service-list li i, .widget-area.sidebar .widget.widget_sigma_social_share .social-icons li>a:hover,
			.contact-form-1 .sigma_btn-custom,
			.sigma_btn-custom,  .custom-form .form-group .sigma_btn-custom, .contact-us-form .sigma_btn-custom,
			.vertical-seperator,
			.woocommerce .widget ul.product-categories li>a:hover, .woocommerce a.button.alt,
			.product_meta_controls .yith-wcwl-add-to-wishlist a:hover, .product_meta_controls .compare:hover,
			.sigma-bg-color-primary, .sigma_product .sigma_product-thumb .sigma_product-controls .button.ajax_add_to_cart:hover,
			.sigma_product .sigma_product-controls a:hover, .woocommerce .widget ul.product-categories li span.count,
			.woocommerce .widget_price_filter .ui-slider .ui-slider-range, .woocommerce .widget_price_filter .ui-slider .ui-slider-handle,
			.tagcloud a:hover, .sigma_product .sigma_product-thumb .sigma_product-controls .button.ajax_add_to_cart.added, .sigma_product .sigma_product-thumb .sigma_product-controls a.button.product_type_variable:hover,
			.sigma_product .sigma_product-controls .yith-wcwl-add-to-wishlist.exists a:hover,
			.site-footer.footer-dark .sigma-footer-widgets-wrapper .widget_tag_cloud a:hover,
			.wp-block-button__link, .is-style-outline .wp-block-button__link:before, .wp-block-search .wp-block-search__button,
			.sigma_product .sigma_product-thumb .sigma_product-controls a.button.product_type_grouped:hover,
			.sigma_product .sigma_product-thumb .sigma_product-controls .button.product_type_external:hover,
			.header-layout-2 .cart.dropdown-btn a:hover, .site-header.header-layout-1.header-scheme-dark .cart.dropdown-btn a,
			.lds-grid div, .preloader-style-2 div, .wp-block-calendar table th, .wp-block-calendar table caption,
			.calendar_wrap caption, .site-header .aside-toggler.style-2:hover span:nth-child(2),
			.site-header .aside-toggler.style-2:hover span:nth-child(7),
			.site-header .aside-toggler.style-2:hover span:nth-child(9),
			.site-header .aside-toggler.style-2:hover span:nth-child(8),
			.widget-area.sidebar .widget.widget_archive ul li a:hover,
			.widget-area.sidebar .widget.widget_recent_entries ul li span,
			.widget-area.sidebar .widget.widget_meta ul li span,
			.widget-area.sidebar .widget.widget_pages ul li span,
			.widget-area.sidebar .widget.widget_recent_entries ul li a:hover,
			.widget-area.sidebar .widget.widget_meta ul li a:hover,
			.widget-area.sidebar .widget.widget_pages ul li a:hover,
			.quantity span:hover, .sigma-subheader .subheader-caption::before, .cart.dropdown-btn a span,
			.header-layout-4 .sigma_header-inner .cart.dropdown-btn a span,
			.sigma-ministries-style-1 .sigma_ministries-item-content .ministries-link i,
			.sigma_video-popup-wrap.sigma_youtube-livestream .sigma_youtube-livestream-content-wrapper .sigma_video-popup, .sigma_youtube_playlist_wrapper .video-full .player-w-thumb .video-iframe,
			.sigma_video_wrapper.video-style-4 .sigma_video-popup-wrap .sigma_video-popup,
			.timeline, .entry-footer.event-detail-footer-meta .event-tags-meta .tagcloud a:hover,
			.prayer-detail-footer .prayer-tags span a:hover,
			.service-style-2 .sigma_service:hover,
			.post-thumbnail .cta-style-3 .sigma_icon-block .social-icon-share ul li a:hover,
			.site-header.header-layout-4 .sigma_header-inner .cart.dropdown-btn a span,
			.sigma_progress_bar_wrapper.progress-bar-style-1 .sigma-progress-bar-inner span,
			.border-before p::before,
			.site-header.header-layout-3 .aside-toggler.desktop-toggler span,
			.site-header.header-layout-5 .aside-toggler.desktop-toggler span,
			.woocommerce .sigma_product .sigma_product-inner .sigma_product-controls .compare:hover,
			.sigma_product .sigma_product-thumb .sigma_product-controls .button.product_type_simple:hover,
			.sigma_product .sigma_product-thumb .sigma_product-controls .maharatri-compare-btn a:hover,
			.maharatri-product-single-compare-btn a:hover,
			.sigma_preloader.style-4,
			.sigma-shortcode-wrapper.testimonials-style-2 .slick-arrow:hover,
			.post_format-post-format-gallery .sigma_post-thumb .slick-arrow.slick-next:hover, .post_format-post-format-gallery .sigma_post-thumb .slick-arrow.slick-prev:hover,
			.sigma-post.format-link .sigma_post-thumb, .post-details-box .sigma-post-details.format-link .sigma_post-thumb,
			.post_format-post-format-video .sigma_post-thumb .sigma_video-btn,
			.service-style-2 .sigma_service:hover, .sigma_button_wrapper .sigma_btn,
			.sigma_faq_wrapper .card-header .accordion-link[aria-expanded="true"],
			.sigma-service-icons li a:hover, .entry-footer.philosophy-detail-footer-meta .philosophy-tags-meta .tagcloud a:hover,
			.sigma-community-style-1 .sigma_community-item-content .community-link i,
			.sigma-puja-style-1 .sigma_puja-item-content .puja-link i,
			.theme-icon-cat-temple .border-before p::before,
			.theme-icon-cat-temple .border-before p::after,
			.sigma_preloader.style-5,
			.sigma_preloader.style-6,
			.theme-icon-cat-mosque .custom-heading-style-2 .section-title .heading-subtitle:before,
			.theme-icon-cat-mosque .custom-heading-style-2.text-center .section-title .heading-subtitle:after,
			.theme-icon-cat-mosque .border-before p::before,
			.theme-icon-cat-mosque .sigma_cta.secondary-bg .sigma_search-adv-input button,
			.header-login-register-form .sigma_close span,
			.login-register-form-toggle:before, .login-register-form-toggle:after,
			body.theme-icon-cat-mosque .elementor-widget-sc-heading .section-title.sigma-custom-heading-wrapper .heading-subtitle:before,
			body.theme-icon-cat-mosque .elementor-widget-sc-heading.text-center .section-title.sigma-custom-heading-wrapper .heading-subtitle:after,
			body.theme-icon-cat-mosque .elementor-widget-sc-heading .section-title.sigma-custom-heading-wrapper .heading-subtitle:before,
			body.theme-icon-cat-mosque .elementor-widget-sc-heading .section-title.sigma-custom-heading-wrapper .heading-subtitle.show-icon::after,
			body .vc_btn3.vc_btn3-color-primary.vc_btn3-style-modern,
			body .vc_btn3.vc_btn3-color-primary, body .vc_btn3.vc_btn3-color-primary.vc_btn3-style-flat, body .vc_btn3.vc_btn3-color-primary:hover, body .vc_btn3.vc_btn3-color-primary.vc_btn3-style-flat:hover,
			body.custom-button-style-3 .vc_btn3.vc_general.vc_btn3-color-primary,
			body.custom-button-style-3 .vc_general.vc_btn3.vc_btn3-style-outline.vc_btn3-color-primary:before,
			body.custom-button-style-3 .vc_btn3.vc_general.vc_btn3-color-secondary.vc_btn3-style-flat::before,
			body.custom-button-style-4 .vc_btn3.vc_general.vc_btn3-color-primary,
			body.custom-button-style-4 .vc_general.vc_btn3.vc_btn3-style-outline.vc_btn3-color-primary:before,
			body.custom-button-style-4 .vc_btn3.vc_general.vc_btn3-color-secondary.vc_btn3-style-flat::before,
			body.custom-button-style-2 .vc_general.vc_btn3.vc_btn3-color-primary.vc_btn3-style-classic,
			body.custom-button-style-4 .vc_general.vc_btn3.vc_btn3-style-outline.vc_btn3-color-primary:before,
			body.custom-button-style-4 .vc_btn3.vc_general.vc_btn3-color-secondary.vc_btn3-style-flat::before,
			.theme-icon-cat-buddha .sigma_cta.secondary-bg .sigma_search-adv-input button, .sigma-events-style-2 .sigma_box .section-button .sigma_btn-custom::before,
			.sigma-donation-style-1 .sigma_donation-body .sigma_donation-btn:before, .sigma-donation-style-3 .sigma_donation-body .sigma_donation-btn:before, .sigma-donation-style-4 .sigma_donation-body .sigma_donation-btn:before,
			.sigma_contact_form_wrapper .custom-form .sigma_btn-custom:hover
			{
				background-color: <?php echo esc_attr($primary_color); ?>;
			}
			@media(max-width: 1500px) {
				.site-header.header-layout-3.header-scheme-light.sticky .sigma_header-contact{
						background-color: <?php echo esc_attr($primary_color); ?>;
				}
			}
				.sigma_cta.cta-style-2 .sigma_cta.primary-overlay:before,
				.sigma_cta.cta-style-2 .sigma_cta.secondary-overlay:before{
						background-color: <?php echo esc_attr($primary_color); ?>96;
					}
			.custom-heading-style-3 .section-title .heading-subtitle {
					background-color: <?php echo esc_attr($primary_color); ?>33;
				}
				button[name=audioplay],
				button[name=audioplay]:hover, button[name=audioplay]:focus,
				.player-timestamp{
					background-color: <?php echo esc_attr($primary_color); ?>3d;
				}
				.primary-overlay::before {
					background-color: <?php echo esc_attr($primary_color); ?>9e;
				}

      .elementor-widget-sc-list .sigma-list .list-item .sigma-list-icon{
          background-color: <?php echo esc_attr($primary_color); ?>1c;
      }

			#prayer-submit-error{
				background-color: <?php echo esc_attr($primary_color); ?>1a;
			}

				.sigma_megamenu-tab-item.style-1 .nav-tabs .nav-item a:hover .sigma_info-icon svg,
				.sigma_megamenu-tab-item.style-1 .nav-tabs .nav-item a.active .sigma_info-icon svg,
				.m-megamenu .m-megamenu-content-wrapper .nav-link-tab-item.active .sigma_info-icon svg,
				.m-megamenu .m-megamenu-content-wrapper .nav-link-tab-item:hover .sigma_info-icon svg{
					fill: <?php echo esc_attr($primary_color); ?>;
				}

			.theme-btn.btn-white:hover,
			.sigma-btn-dark .vc_btn3-color-secondary, .theme-btn.btn-yellow, .sigma-btn-dark .vc_btn3-color-primary,
			.arrow-middle-right .owl-nav button:hover, .sigma-contact-info .wpcf7-submit,
			.woocommerce #review_form #respond textarea:focus, .site-header .site-header-bottom-inner > ul ul.sub-menu li a:hover,
			.woocommerce nav.woocommerce-pagination ul li a:focus,
			input:focus, select:focus, textarea:focus, .navigation-dots span, .post.sticky .sigma-post-inner,
			.services-style-1 .sigma-service-image-container:before, .services-style-1 .sigma-service-content-cover:before,
			.stories-style-1 .h-one, .stories-style-1 .h-two, .stories-style-1 .h-three, .stories-style-1 .h-four,
			.cta-section .cta-inner .cta-text a.main-btn.btn-filled:hover, .services-style-4 .single-service:hover,
			.sigma-subheader .subheader-caption, .cta-section .cta-inner .cta-text a.main-btn.btn-filled:hover,
			.stories-style-1 .h-one, .stories-style-1 .h-two, .stories-style-1 .h-three, .stories-style-1 .h-four,
			.services-style-1 .sigma-service-image-container:before,
			.services-style-4 .single-service:hover,
			.services-style-1 .sigma-service-content-cover:before, .post.sticky .sigma-post-inner, .site-header .site-header-bottom-inner > ul ul.sub-menu li a:hover,
			.arrow-middle-right .owl-nav button:hover, .sigma-contact-info .wpcf7-submit, .sigma-btn-dark .vc_btn3-color-secondary,
			.theme-btn.btn-yellow, .sigma-btn-dark .vc_btn3-color-primary, .theme-btn.btn-white:hover,
			.header-layout-2 .cart.dropdown-btn a:hover, .site-header.header-layout-3 .aside-toggler.desktop-toggler span, .site-header.header-layout-5 .aside-toggler.desktop-toggler span,
			.site-header.header-layout-3 .aside-toggler.desktop-toggler span, .site-header.header-layout-5 .aside-toggler.desktop-toggler span,
			.sigma-sermons-style-1 .sigma_box .sigma_sm li a:hover,
			.sigma-sermons-style-1 .sigma_box .sigma_sm .social-icon-share .social-share-button:hover,
			#give-recurring-form .form-row input[type=email]:focus, #give-recurring-form .form-row input[type=password]:focus, #give-recurring-form .form-row input[type=tel]:focus, #give-recurring-form .form-row input[type=text]:focus, #give-recurring-form .form-row input[type=url]:focus, #give-recurring-form .form-row select:focus, #give-recurring-form .form-row textarea:focus, form.give-form .form-row input[type=email]:focus, form.give-form .form-row input[type=password]:focus, form.give-form .form-row input[type=tel]:focus, form.give-form .form-row input[type=text]:focus, form.give-form .form-row input[type=url]:focus, form.give-form .form-row select:focus, form.give-form .form-row textarea:focus, form[id*=give-form] .form-row input[type=email]:focus, form[id*=give-form] .form-row input[type=password]:focus, form[id*=give-form] .form-row input[type=tel]:focus, form[id*=give-form] .form-row input[type=text]:focus, form[id*=give-form] .form-row input[type=url]:focus, form[id*=give-form] .form-row select:focus, form[id*=give-form] .form-row textarea:focus,
			.service-style-2 .sigma_service:hover,
			.sigma-buddhism-style-1 .sigma_box .sigma_sm li a:hover,
			.sigma-buddhism-style-1 .sigma_box .sigma_sm .social-icon-share .social-share-button:hover,
			.sigma-holis-style-1 .sigma_box .sigma_sm li a:hover,
			.sigma-holis-style-1 .sigma_box .sigma_sm .social-icon-share .social-share-button:hover,
			body .vc_btn3.vc_btn3-color-primary.vc_btn3-style-modern
			{
				border-color: <?php echo esc_attr($primary_color); ?>;
			}
			@keyframes preloader-style-2 {
			  12.625% { background: <?php echo esc_attr($primary_color); ?> }
			  100% { background: <?php echo esc_attr($primary_color); ?> }
			}

			.sigma-volunteer-detail .sigma-volunteer-details .sigma-volunteer-detail svg{
				fill: <?php echo esc_attr($primary_color); ?>;
			}

			.sigma-stories-details .sigma-stories-details-container,
			.sigma-room.sigma-room-style-3 .sigma-room-body,
			.services-style-1 .sigma-service-image-container:before,
			.sigma-shortcode-wrapper.blog-style-5 .sigma-post-style-1.grid-layout .sigma-post-inner,
			.services-style-1 .sigma-service-image-container:before, .sigma-post-style-1.sigma-post-style-5.grid-layout .sigma-post-inner
			{
				border-top-color: <?php echo esc_attr($primary_color); ?>;
			}
			.sigma_timeline-nodes::before,
			.sigma-subheader .subheader-caption{
				border-left-color: <?php echo esc_attr($primary_color); ?>;
			}
			.sigma-subheader.text-right .subheader-caption{
				border-right-color: <?php echo esc_attr($primary_color); ?>;
			}

			.sigma-action-box a, .infobox-area:before,
			.sigma_booking-form form input[type="text"],
			.sigma_booking-form form select,
			.sigma-shortcode-wrapper .sigma_post-filter a.active,
			.vc_tta.vc_general .vc_tta-panel.vc_active .vc_tta-panel-title a, .vc_tta.vc_general .vc_tta-tabs-list .vc_tta-tab.vc_active,
			.infobox-area:before, body .sigma-shortcode-wrapper .sigma_post-filter a.active,
			.elementor-widget-sc-custom-tabs .sigma_custom_tab_wrapper .sigma_tab-item ul li a.active,
			.sigma_booking-form form input[type="text"],
			.sigma_booking-form form select,
			.m-megamenu .m-megamenu-content-wrapper .nav-link-tab-item.active,
			.m-megamenu .m-megamenu-content-wrapper .nav-link-tab-item:hover
			{
				border-bottom-color: <?php echo esc_attr($primary_color); ?>;
			}

			.sigma-volunteer-detail .sigma-volunteer-details .sigma-volunteer-detail svg{
				fill: <?php echo esc_attr($primary_color); ?>;
			}

			.sigma_donation.sigma-donation-style-2 .sigma_donation-body .progress-rounded svg circle{
				stroke: <?php echo esc_attr($primary_color); ?>;
			}

			@media(max-width:767px){
				.call-to-action.cta-inner .cta-text {
					background-color: <?php echo esc_attr($primary_color); ?>;
				}
			}
			.sigma_preloader li {
			  background: <?php echo esc_attr($primary_color); ?>;
			  box-shadow: 0 0 1px #fff, 0 0 5px <?php echo esc_attr($primary_color); ?>, 0 0 10px <?php echo esc_attr($primary_color); ?>, 0 0 15px <?php echo esc_attr($primary_color); ?>, 0 0 25px <?php echo esc_attr($primary_color); ?>, 0 0 55px <?php echo esc_attr($primary_color); ?>;

			}

			.down-arrow-wrap a:focus, .down-arrow-wrap a:hover,
			button:hover, html input[type=button]:hover, input[type=reset]:hover, input[type=submit]:hover, button:focus,
			html input[type=button]:focus, input[type=reset]:focus, input[type=submit]:focus,
			.woocommerce #payment #place_order:hover, .woocommerce-page #payment #place_order:hover, .woocommerce #payment #place_order:focus, .woocommerce-page #payment #place_order:focus,
			.woocommerce .cart .button.alt:hover, .woocommerce .cart .button.alt:focus, .woocommerce #respond input#submit:focus, .woocommerce a.button:focus,
			.woocommerce button.button:focus, .woocommerce input.button:focus, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover,
			.woocommerce button.button:hover, .woocommerce input.button:hover, .cart .button.alt:hover, .cart .button.alt:focus,
			#respond input#submit:focus, a.button:focus, button.button:focus, input.button:focus, #respond input#submit:hover, a.button:hover,
			button.button:hover, input.button:hover, .sigma-post-wrapper .sigma_post_categories .categories-list a:hover,
			.vc_btn3.vc_btn3-style-custom:hover,
			body .vc_general.vc_btn3:hover, body .vc_general.vc_btn3:focus,
			.sigma-prayer.sigma-prayer-style-1 .prayer-link-btn:hover,
			.sigma-post-wrapper .sigma_post_categories .categories-list a:hover,
			body.custom-button-style-3 .vc_btn3.vc_general.vc_btn3-color-primary::before,
			body.custom-button-style-1 .vc_general.vc_btn3.vc_btn3-style-modern:hover,
			body.custom-button-style-2 .vc_general.vc_btn3.vc_btn3-style-modern:hover,
			body.custom-button-style-3 .vc_general.vc_btn3.vc_btn3-style-modern:hover,
			.custom-button-style-3 .sigma_btn-custom::before,
			body.custom-button-style-4 .vc_general.vc_btn3.vc_btn3-style-modern:hover,
			.custom-button-style-4 .sigma_btn-custom::before,
			body.custom-button-style-4 .vc_btn3.vc_general.vc_btn3-color-primary::before,
			.sigma_contact_form_wrapper .custom-form .sigma_btn-custom::before
			{
				background-color: <?php echo esc_attr($primary_color_dark); ?>;
			}

			body.custom-button-style-1 .vc_general.vc_btn3.vc_btn3-style-modern:hover,
			body.custom-button-style-2 .vc_general.vc_btn3.vc_btn3-style-modern:hover,
			body.custom-button-style-3 .vc_general.vc_btn3.vc_btn3-style-modern:hover,
			body.custom-button-style-4 .vc_general.vc_btn3.vc_btn3-style-modern:hover{
				border-color: <?php echo esc_attr($primary_color_dark); ?>;
			}

			h1 a:focus, h2 a:focus, h3 a:focus, h4 a:focus, h5 a:focus, h6 a:focus,
			h1 a:hover, h2 a:hover, h3 a:hover, h4 a:hover, h5 a:hover, h6 a:hover,
			a:hover, a:active, a:focus, .widget ul a:hover,
			.yith-woocompare-widget ul.products-list li .title:hover{
				color: <?php echo esc_attr($primary_color_dark); ?>;
			}

			 .down-arrow-wrap a,
			.sigma-shortcode-wrapper .slick-arrow:hover,
			.slick-arrow:hover, .arrow-style .slick-arrow:hover, .arrow-style .slick-arrow.slider-next,
			.sigma_room_slider_wrapper .rooms-slider-two .slick-arrow:hover,
			.sigma_room_slider_wrapper .rooms-slider-two .slick-arrow.next-arrow{
				-webkit-box-shadow: 0px 14px 24px 0px rgba(<?php echo esc_attr($primary_color_rgba['r']) ?>, <?php echo esc_attr($primary_color_rgba['g']) ?>, <?php echo esc_attr($primary_color_rgba['b']) ?>, 0.3);
		    box-shadow: 0px 14px 24px 0px rgba(<?php echo esc_attr($primary_color_rgba['r']) ?>, <?php echo esc_attr($primary_color_rgba['g']) ?>, <?php echo esc_attr($primary_color_rgba['b']) ?>, 0.3);
			}


		<?php } ?>

		<?php if( !empty( $secondary_color ) ){ ?>

			.site-header .contact-info .contact-item i,
			.sigma_room_slider_wrapper .rooms-content-wrap .room-content-box,
			.woocommerce nav.woocommerce-pagination ul li span.current, .nav-links .page-numbers.current,
			body.custom-button-style-1 .vc_btn3.vc_btn3-style-classic.vc_btn3-color-secondary,
			body.custom-button-style-1 .vc_general.vc_btn3.vc_btn3-style-classic.vc_btn3-color-tertiary:before,
			body.custom-button-style-1 .vc_general.vc_btn3.vc_btn3-style-outline.vc_btn3-color-secondary:before,
			body.custom-button-style-2 .vc_btn3.vc_btn3-style-classic.vc_btn3-color-secondary,
			body.custom-button-style-2 .vc_btn3.vc_btn3-style-classic.vc_btn3-color-tertiary:before,
			body.custom-button-style-2 .vc_general.vc_btn3.vc_btn3-style-outline.vc_btn3-color-secondary:before,
			.counter-style-2.counter-dark-layout .counter-box, .custom-form,
			.sigma_cta.cta-style-1 .sigma_cta.secondary-bg, .sigma_cta.cta-style-2 .sigma_cta.secondary-bg,
			.cta-style-3 .sigma_icon-block.secondary-bg, .cta-style-3 .sigma_icon-block.primary-bg .sigma_search-adv-input button,
			.video-style-3 .popup-video.secondary, .site-header .contact-info .contact-item i,
			body.custom-button-style-1 .vc_general.vc_btn3.vc_btn3-style-outline.vc_btn3-color-secondary:before,
			body.custom-button-style-2 .vc_btn3.vc_btn3-style-classic.vc_btn3-color-tertiary:before,
			body.custom-button-style-2 .vc_general.vc_btn3.vc_btn3-style-outline.vc_btn3-color-secondary:before,
			body.custom-button-style-2 .vc_general.vc_btn3.vc_btn3-style-outline.vc_btn3-color-tertiary:before,
			.call-to-action .need-cta-img:before, .call-to-action.cta-style-two .cat-link, footer .social-icon a,
			.sigma-btn-dark .vc_btn3-color-secondary:after,
			.sigma-btn-dark .vc_btn3-color-secondary:before,
			.theme-btn.btn-yellow:after,
			.theme-btn.btn-yellow:before, .sigma-btn-dark .vc_btn3-color-secondary:hover,
			.theme-btn.btn-yellow:hover, .sigma-btn-dark .vc_btn3-color-primary:after,
			.sigma-btn-dark .vc_btn3-color-primary:before, .sigma-btn-dark .vc_btn3-color-primary:hover, .theme-btn.btn-white:hover:after,
			.theme-btn.btn-white:hover:before, .sigma-shortcode-wrapper .slick-arrow, .sigma-bg-color-secondary,
			.site-header.header-layout-1.header-scheme-dark,
			.site-header.header-layout-2.header-scheme-dark, .site-header.header-layout-2.header-scheme-dark .site-header-bottom-inner,
			.header-layout-1 .cart.dropdown-btn a,
			.sigma-events-style-1 .sigma_post-thumb .event-date-wrapper,
			.sigma_testimonial_slider_wrapper,
			.sigma_testimonial_slider_wrapper::after,
			.sigma_mass-timing .sigma_mass-content-wrapper h4,
			.sigma_volunteer.volunteer-4 .sigma_sm li a,
			.post_format-post-format-gallery .sigma_post-thumb .slick-arrow,
			.theme-icon-cat-temple .sigma_product .sigma_badge-sale,
			.sigma_product .sigma_badge-sale,
			body .vc_btn3.vc_btn3-color-primary:hover,
			body .vc_btn3.vc_btn3-color-primary.vc_btn3-style-flat:hover,
			body .vc_btn3.vc_btn3-color-secondary,
			body .vc_btn3.vc_btn3-color-secondary.vc_btn3-style-flat,
			body.custom-button-style-3 .vc_btn3.vc_general.vc_btn3-color-primary.vc_btn3-style-flat::before,
			body.custom-button-style-3 .vc_btn3.vc_general.vc_btn3-color-secondary:hover,
			body.custom-button-style-3 .vc_btn3.vc_general.vc_btn3-color-secondary.vc_btn3-style-outline::before,
			body.custom-button-style-4 .vc_btn3.vc_general.vc_btn3-color-secondary.vc_btn3-style-outline::before,
			body.custom-button-style-4 .vc_btn3.vc_general.vc_btn3-color-primary.vc_btn3-style-flat:hover::before,
			body.custom-button-style-4 .vc_btn3.vc_general.vc_btn3-color-secondary:hover,
			.custom-button-style-3 .site-header.header-layout-3 .sigma_header-middle .sigma_header-button a:hover,
			.custom-button-style-3 .sigma_btn-custom:hover,
			.custom-button-style-3 .site-header.header-layout-3 .sigma_header-controls .sigma_btn-custom:hover,
			.contact-form-1 .sigma_btn-custom input:hover,
			.sigma-events-style-2 .sigma_box .section-button .sigma_btn-custom,
			.sigma-donation-style-1 .sigma_donation-body .progress .progress-bar,
			.sigma-donation-style-3 .sigma_donation-body .progress .progress-bar,
			.sigma-donation-style-4 .progress .progress-bar,
			.sigma-donation-style-1 .sigma_donation-body .progress .progress-bar span,
			.sigma-donation-style-3 .sigma_donation-body .progress .progress-bar span,
			.sigma-donation-style-4 .progress .progress-bar span,
			.sigma-donation-style-1 .sigma_donation-body .sigma_donation-btn,
			.sigma-donation-style-3 .sigma_donation-body .sigma_donation-btn,
			.sigma-donation-style-4 .sigma_donation-body .sigma_donation-btn,
			.widget h2.widget-title:before, .widget-area.sidebar .widget .wp-block-group h2::before,
			.widget h2.widget-title:after, .widget-area.sidebar .widget .wp-block-group h2::after,
			form[id*=give-form] #give-final-total-wrap .give-donation-total-label,
			form[id*=give-form] .give-donation-amount .give-currency-symbol.give-currency-position-before,
			form[id*=give-form].give-form .sigma_single-donation-content-wrapper #give-donation-level-button-wrap li .give-btn.give-default-level, form[id*=give-form].give-form .sigma_single-donation-content-wrapper #give-donation-level-button-wrap li .give-btn:hover,
		 input[type=checkbox]:checked, input[type=radio]:checked, .custom-button-style-3 .sigma_btn-custom::before
			{
				background-color: <?php echo esc_attr($secondary_color); ?>;
			}
			@keyframes preloader-style-2 {
			  0% { background: <?php echo esc_attr($secondary_color); ?> }
			  12.5% { background: <?php echo esc_attr($secondary_color); ?> }
			}
			.sigma_cta.cta-style-2 .sigma_cta.secondary-overlay:before	{
					background-color: <?php echo esc_attr($secondary_color); ?>a6;
				}
				.sigma-btn-dark .vc_btn3-color-secondary:hover,
				.theme-btn.btn-yellow:hover, .sigma-btn-dark .vc_btn3-color-primary:hover, .theme-btn.btn-white,
				.woocommerce nav.woocommerce-pagination ul li span.current,
				form[id*=give-form].give-form .sigma_single-donation-content-wrapper #give-donation-level-button-wrap li .give-btn.give-default-level, form[id*=give-form].give-form .sigma_single-donation-content-wrapper #give-donation-level-button-wrap li .give-btn:hover,
				.nav-links .page-numbers.current{
						border-color: <?php echo esc_attr($secondary_color); ?>;
					}
					.sigma-donation-style-1 .sigma_donation-body .progress .progress-bar span::after,
					.sigma-donation-style-3 .sigma_donation-body .progress .progress-bar span::after,
					.sigma-donation-style-4 .progress .progress-bar span::after{
						border-top-color: <?php echo esc_attr($secondary_color); ?>;
					}
		<?php } ?>
		.sigma_product .sigma_badge-sale::after,  .woocommerce div.product .woocommerce-tabs ul.tabs li.active a{
			border-bottom-color: <?php echo esc_attr($secondary_color); ?>;
		}
		.sigma_product .sigma_badge-sale::after{
			border-top-color: <?php echo esc_attr($secondary_color); ?>;
		}

		<?php if( !empty( $secondary_color ) ){ ?>
			body.custom-button-style-1 .vc_general.vc_btn3.vc_btn3-style-classic.vc_btn3-color-tertiary, .sigma_cta.cta-style-2 .sigma_cta .sigma_box-content a:hover,
			.sigma_timeline-date span>span, .infobox-style-5 .sigma_icon-block > i,
			.sigma-list-wrapper.style-2 ul li, .sigma-stories-style-3 .sigma_stories-item.style-2 .sigma_stories-item-content a,
			.progress-bar-style-3 .chart span, .service-style-2 .sigma_service .btn-link,
			.service-style-3 .sigma_service .btn-link, .service-style-2 .sigma_service .btn-link i,
			.service-style-3 .sigma_service .btn-link i, .sigma-volunteer-style-2 .sigma_volunteer.volunteer-5 .sigma_volunteer-thumb .sigma_sm li a, .video-style-3 .popup-video.secondary:hover,
			.sigma-post-wrapper .sigma-post-inner footer.entry-footer .post-read-more-link a,
			body .vc_btn3.vc_btn3-color-white:hover,
			body .vc_btn3.vc_btn3-color-white.vc_btn3-style-flat:hover,
			body .vc_btn3.vc_btn3-color-tertiary:hover,
			body .vc_btn3.vc_btn3-color-tertiary.vc_btn3-style-flat:hover,
			body .vc_btn3.vc_btn3-color-primary,
			body .vc_btn3.vc_btn3-color-primary.vc_btn3-style-flat,
			body .vc_btn3.vc_btn3-color-primary:hover,
			body .vc_btn3.vc_btn3-color-primary.vc_btn3-style-flat:hover,
			.btn.btn-outline-light.footer-button:hover,
			.btn.btn-outline-light.footer-button:focus,
			body .sigma-bg-color-secondary .vc_btn3.vc_btn3-color-primary:hover,
			body .sigma-bg-color-secondary .vc_btn3.vc_btn3-color-primary:focus,
			body .sigma-bg-color-secondary .vc_btn3.vc_btn3-color-primary.vc_btn3-style-flat:hover,
			body .vc_btn3.vc_btn3-color-tertiary,
			body .vc_btn3.vc_btn3-color-tertiary.vc_btn3-style-flat, body.custom-button-style-1 .vc_general.vc_btn3.vc_btn3-style-classic.vc_btn3-color-tertiary, body.custom-button-style-1 .vc_general.vc_btn3.vc_btn3-style-classic.vc_btn3-color-tertiary:before,
			body.custom-button-style-1 .vc_general.vc_btn3.vc_btn3-style-outline,
			body.custom-button-style-2 .vc_general.vc_btn3.vc_btn3-style-outline,
			body.custom-button-style-2 .vc_btn3.vc_btn3-style-classic.vc_btn3-color-tertiary,
			.widget-area.sidebar .widget.widget_sigma_recent_entries .sigma-post-content a,
			 .sigma-stories-style-2 .sigma-stories-thumbnail-wrapper .sigma-stories-content-cover .stories-title a,
			.sigma-stories-details .sigma-stories-details-container .sigma-stories-detail .sigma-stories-detail-title, .sigma-volunteer-style-1 .sigma-volunteer-social-profiles li a,
			.sigma-volunteer-style-1 .sigma-volunteer-social-profiles li.share-main a, .sigma-btn-dark .vc_btn3-color-primary:hover, .theme-btn.btn-white, .theme-btn.btn-white:hover, .sigma-volunteer-detail .sigma-volunteer-details .sigma-volunteer-detail,
			.video-style-2 .video-text .video-link-two .popup-video, .single-detail-page .page-service-list li i,
			 .sigma-shortcode-wrapper.testimonials-style-2 .slick-arrow:before, .sigma-shortcode-wrapper.testimonials-style-2 .slick-arrow:after,
			  .is-style-outline .wp-block-button__link, .entry-content .is-style-outline .wp-block-button__link:not(.has-color),
			 .header-layout-1 .cart.dropdown-btn a span,
			 .sigma_donation.sigma-donation-style-2 .sigma_donation-body .signa_donation-collection p label,
      .elementor-widget-sc-video .video-wrapper .popup-video, .sigma-room .sigma-room-facilities li,
			body.custom-button-style-3 .vc_btn3.vc_general.vc_btn3-color-secondary.vc_btn3-style-outline,
			body.custom-button-style-4 .vc_btn3.vc_general.vc_btn3-color-secondary.vc_btn3-style-outline,
			.m-megamenu .m-megamenu-content-wrapper .sigma_megamenu_menu_wrapper ul.menu li.menu-item a span.badge.badge-secondary,
			.site-header div .sigma_mega-menu-item ul.menu li a span.badge.badge-secondary,
			.m-megamenu .m-megamenu-content-wrapper .sigma_megamenu_menu_wrapper ul.menu li.menu-item a span.badge.badge-secondary,
			.sigma-progress-bar-title,
			.go-top-wrap .go-top-btn i,
			.custom-heading-style-2 .section-title .heading-subtitle, .custom-heading-style-3 .section-title .heading-subtitle,
			.sigma-list-wrapper.style-2 ul li .sigma-list-icon, .sigma-list-wrapper ul li i, .sigma-volunteer-style-2 .sigma_volunteer-info p,
			.sigma-volunteer-style-3 .sigma_volunteer-info p,
			.sigma-post-style-1 .sigma-post-wrapper .sigma-post-inner .entry-footer ul li i,
			.woocommerce div.product p.price ins, .woocommerce div.product p.price, .woocommerce div.product p.price,
			.woocommerce div.product span.price ins, .woocommerce div.product span.price, .infobox-style-6 .sigma_icon-block .sigma_icon-block-content i,
			.sigma-puja-style-3:hover .sigma_portfolio-item-content h5 a,
			.sigma-puja-style-3 .sigma_portfolio-item-content .sigma_portfolio-item-content-inner .sigma-puja-category,
			.sigma-events-details .gallery-thumb .sigma_event-timer .sigma_event-date span, .sigma-events-style-2 .sigma_box .subtitle,
			.sigma-holis-style-1 .sigma_box .subtitle, .sigma-puja-style-2 .sigma_portfolio-item-content .portfolio-link,
			.sigma-puja-style-2 .sigma_portfolio-item-content .portfolio-link i,
			.sigma-puja-style-3 .sigma_portfolio-item-content .portfolio-link i,
			.sigma-post-style-1 .sigma-post-wrapper .sigma-post-inner footer.entry-footer .sigma_post_author .author.vcard a,
			.sigma-footer-widgets-wrapper .widget_sigma_recent_entries .sigma-post-content .sigma-post-date i,
			.sigma-events-style-2 .sigma_box .sigma_event-info .sigma_event-descr li i,
			.sigma-holis-style-1 .sigma_box .sigma_holi-info li i,
			 .infobox-style-6 .sigma_icon-block .icon-wrapper i, .infobox-style-6 .sigma_icon-block .icon-wrapper span.numbers,
			 .sigma-puja-style-1 .sigma_puja-item-content .sigma_puja-item-content-inner h5 a:hover,
			 .sigma_youtube_broadcast_wrapper.sigma_youtube-broadcast .sigma_box .custom-primary,
			 .widget-area.sidebar .widget.widget_sigma_recent_entries .sigma-post-content .sigma-post-date i,
			 .sigma-post-details .sigma-post-wrapper .sigma-post-inner .entry-footer ul li i,
			 .sigma-post-wrapper .entry-content ul.blog-list li:before, .sigma-post-wrapper blockquote cite,
 			.sigma-post-wrapper blockquote cite strong,
			.sigma-post-details .sigma-post-wrapper .sigma-post-inner .entry-footer ul li.social-share-icon a.icon-link:hover i,
			.post-navigation .nav-previous a span, .post-navigation .nav-next a span,
			.comment-list .comment-date a, .vc_tta.vc_general .vc_tta-tabs-list .vc_tta-tab a i,
			.sigma-subheader .breadcrumb li.active, .sigma-events-style-1 .sigma_post-body .sigma_post-meta span i,
			.widget-area.sidebar .widget.widget_sigma_recent_events ul li .event-name p i,
			[id*=give-form].sigma_donation-details div.summary .give-goal-progress .raised .income,
			#content [id*=give-form] .give-goal-progress .raised .income,
			[id*=give-form] div.give-form-content-wrap .blog-list li:before, .sigma-volunteer-detail .sigma-volunteer-details .sigma-volunteer-detail i,
			.sigma-volunteer-detail .sigma-volunteer-link-profiles li i, .woocommerce div.product .woocommerce-tabs ul.tabs li.active,
			.infobox-style-5 .sigma_icon-block .sigma_icon-block-content > span
			{
				color: <?php echo esc_attr($secondary_color); ?>;
			}
			@media(max-width: 1200px) {
				.header-layout-1 .cart.dropdown-btn a{
					color: <?php echo esc_attr($secondary_color); ?>;
				}
				.header-layout-1 .cart.dropdown-btn a span{
					background-color: <?php echo esc_attr($secondary_color); ?>;
				}
			}
				.secondary-overlay::before{
					background-color: <?php echo esc_attr($secondary_color); ?>9e;
				}
				.sigma_product .sigma_product-thumb .sigma_product-controls .maharatri-compare-btn a.loading::before,
				.maharatri-compare-table .maharatri-compare-row .maharatri-compare-col .compare-basic-content .maharatri-compare-remove.loading::before,
				.maharatri-product-single-compare-btn a.loading::before,
				.sigma_product .sigma_product-thumb .sigma_product-controls .maharatri-compare-btn a.loading:hover::before,
				.maharatri-product-single-compare-btn a.loading:hover::before{
						border-left-color: <?php echo esc_attr($secondary_color); ?>;
				}
				.theme-icon-cat-temple .sigma_product .sigma_badge-sale::after{
					border-color: <?php echo esc_attr($secondary_color); ?>;
					border-right-color: transparent;
				}
				.go-top-area .go-top::before{
					border-color:  <?php echo esc_attr($secondary_color); ?>;
				}
				.sigma-list-wrapper.style-2 ul li .sigma-list-icon{
					background-color: <?php echo esc_attr($secondary_color); ?>2e;
				}
		<?php } ?>

		<?php if( !empty( $tertiary_color ) ){ ?>
			blockquote, .sigma-extend-right-bg .sigma-extend-right-col:after,
			.wpb-js-composer .sigma-accordion-style-1 .vc_tta.vc_general .vc_tta-panel-title>a:before,
			.wpb-js-composer .sigma-accordion-style-1 .vc_tta.vc_general .vc_tta-panel-title>a:before,
			.btn.btn-outline-light.footer-button:hover,
			.btn.btn-outline-light.footer-button:focus,
			body .sigma-bg-color-secondary .vc_btn3.vc_btn3-color-primary:hover,
			body .sigma-bg-color-secondary .vc_btn3.vc_btn3-color-primary:focus,
			body .sigma-bg-color-secondary .vc_btn3.vc_btn3-color-primary.vc_btn3-style-flat:hover,
			body .vc_btn3.vc_btn3-color-tertiary,
			body .vc_btn3.vc_btn3-color-tertiary.vc_btn3-style-flat,
			body.custom-button-style-1 .vc_general.vc_btn3.vc_btn3-style-classic.vc_btn3-color-tertiary,
			body.custom-button-style-1 .vc_general.vc_btn3.vc_btn3-style-classic.vc_btn3-color-tertiary:hover,
			body.custom-button-style-1 .vc_general.vc_btn3.vc_btn3-style-outline.vc_btn3-color-tertiary:before,
			.sigma-contact-info .infobox-style-3 i:after, .widget-area.sidebar .widget.widget_categories ul li a,
			.sigma-volunteer-style-2 .sigma-volunteer-social-profiles li a, .sigma-shortcode-wrapper.testimonials-style-2 .slick-arrow,
			.widget-area.sidebar .widget.widget_archive ul li a, .widget-area.sidebar .widget.widget_recent_entries ul li a,
			.widget-area.sidebar .widget.widget_meta ul li a,
			.widget-area.sidebar .widget.widget_pages ul li a
			{
				background-color: <?php echo esc_attr($tertiary_color); ?>;
			}
		<?php } ?>

		<?php if( !empty( $headings_color ) ){ ?>
			table th, table th a:hover, .widget ul a, .widget_archive ul li span, .widget_categories ul li span,
			.widget_tag_cloud a, .navigation .nav-links .nav-next a, .navigation .nav-links .nav-previous a,
			.woocommerce nav.woocommerce-pagination ul li a, .woocommerce nav.woocommerce-pagination ul li span,
			.nav-links .page-numbers,	ul.wp-block-categories li span, .sigma-room .sigma-room-facilities li,
			.sigma_room_slider_wrapper .rooms-slider-two .slick-arrow, .sigma_room_type_tab_wrapper .room-box .room-link:hover,
			.sigma_room_type_tab_wrapper .nav-pills .nav-link.active, .sigma_room_type_tab_wrapper .nav-pills .show>.nav-link,
			.sigma_room_type_tab_wrapper .nav-pills .nav-link:hover, .woocommerce .woocommerce-error .button,
			.woocommerce .woocommerce-info .button, .woocommerce .woocommerce-message .button, .woocommerce-page .woocommerce-error .button,
			.woocommerce-page .woocommerce-info .button, .woocommerce-page .woocommerce-message .button, .woocommerce-error,
			.woocommerce-info, .woocommerce-message, .woocommerce a.added_to_cart,
			.woocommerce-LostPassword.lost_password a, .woocommerce-error a, .woocommerce-info a,
			.woocommerce-message a, .woocommerce .woocommerce-product-rating .star-rating + .woocommerce-review-link:hover,
			.woocommerce .sigma_product-single-content .product_meta > span, .woocommerce .sigma_product-single-content .product_meta > span a,
			.woocommerce #reviews #comments ol.commentlist li .comment-text p.meta .woocommerce-review__author, .woocommerce ul.cart_list li .cart-item-body a,
			.woocommerce ul.product_list_widget li .cart-item-body a, ul.cart_list li .cart-item-body a, ul.product_list_widget li .cart-item-body a,
			.woocommerce .widget_shopping_cart .total, .woocommerce.widget_shopping_cart .total, .widget_shopping_cart .total, .cart-dropdown .total,
			.woocommerce ul.product_list_widget li .sigma_product-widget-body a, ul.product_list_widget li .sigma_product-widget-body a,
			.woocommerce table.shop_table td.product-name .product-name, .woocommerce table.shop_table td.product-name a, .woocommerce a.button.show-title-form:hover,
			.woocommerce a.button.hide-title-form:hover, .widget.yith-woocompare-widget a.clear-all, .yith-woocompare-widget ul.products-list li .title,
			.woocommerce-privacy-policy-text p a, .entry-content .woocommerce-privacy-policy-text p a, .woocommerce-account .addresses .title .edit:hover,
			blockquote, blockquote p, h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, b, strong, .sigma-post-wrapper .sigma-post-inner footer.entry-footer .post-read-more-link a:hover,
			.sigma-shortcode-wrapper .slick-arrow, .slick-arrow, .sigma-stories-detail-title, h5.sigma-volunteer-designation, .sigma-volunteer-detail-title,
			.sigma-volunteer-link-profiles li a, .comment-list a.comment-reply-link, .related-posts .sigma-blog-link:hover, .sigma-subheader .breadcrumb a,
			.aside-collapse.mobile-aside .contact-info .contact-item .contact-list span:last-child, .aside-collapse.mobile-aside .contact-info .contact-item .contact-list span:last-child a,
			.site-header .site-header-bottom-inner > ul > li > a, .site-header .site-header-top-inner > ul > li > a, .site-header .site-header-top .social-info li a,
			.sigma-subheader .breadcrumb li, .site-header .contact-info .contact-item .contact-list span:last-child, .site-header .contact-info .contact-item .contact-list span:last-child a,
			.site-header .site-header-top-inner > a, .header-controls > div, .header-controls > div > a,
			.site-footer.footer-light .sigma-footer-widgets-wrapper .widget h6.widget-title, .wpb-js-composer .sigma-accordion-style-1 .vc_tta.vc_general .vc_tta-panel-title>a:before,
			.wpb-js-composer .sigma-accordion-style-1 .vc_tta.vc_general .vc_tta-panel-title>a:before,
			.arrow-on-hover .owl-nav button i, body .vc_btn3.vc_btn3-color-white:hover, body .vc_btn3.vc_btn3-color-white.vc_btn3-style-flat:hover,
			body .vc_btn3.vc_btn3-color-tertiary:hover, body .vc_btn3.vc_btn3-color-tertiary.vc_btn3-style-flat:hover, body .vc_btn3.vc_btn3-color-secondary:hover,
			body .vc_btn3.vc_btn3-color-secondary:focus, body .vc_btn3.vc_btn3-color-secondary.vc_btn3-style-flat:hover, body .vc_btn3.vc_btn3-color-primary,
			body .vc_btn3.vc_btn3-color-primary.vc_btn3-style-flat, .btn.btn-outline-light.footer-button:hover,
			.btn.btn-outline-light.footer-button:focus, body .sigma-bg-color-secondary .vc_btn3.vc_btn3-color-primary:hover,
			body .sigma-bg-color-secondary .vc_btn3.vc_btn3-color-primary:focus, body .sigma-bg-color-secondary .vc_btn3.vc_btn3-color-primary.vc_btn3-style-flat:hover,
			body .vc_btn3.vc_btn3-color-tertiary, body .vc_btn3.vc_btn3-color-tertiary.vc_btn3-style-flat,
			.sigma-about-us2 .vc_custom_heading a:before, .sigma-action-style1.sigma_custom_heading_wrapper .sigma-heading-title-wrapper .heading-title:before,
			.sigma-action-box a, .widget-area.sidebar .widget .btn-outline-light, .widget-area.sidebar .widget.widget_sigma_recent_entries .sigma-post-content a,
			.sigma-contact-box-style2.contact-page-box .infobox-style-4 .sigma-infobox-title, .sigma-contact-box-style2.contact-page-box .infobox-style-4 .sigma-infobox-text,
			.sigma-contact-info .wpcf7-submit:hover, .sigma-contact-info .wpcf7-submit:focus,
			.sigma-post-wrapper footer ul.social-share-icons a.icon-link i:hover, .sigma-post-wrapper footer ul.social-share-icons a.icon-link:hover,
			.call-to-action.cta-style-two .custom-heading-style-1 .heading-subtitle,
			.call-to-action.cta-inner .cta-text .custom-heading-style-1 .heading-subtitle,
			.call-to-action.cta-inner .cat-link:hover, .call-to-action.cta-style-two .cat-link:hover, .video-link.home .popup-video,
			.sigma-stories-style-1 .stories-title a, .sigma-stories-style-2 .sigma-stories-thumbnail-wrapper .sigma-stories-content-cover .stories-link,
			.sigma-volunteer-style-1 .sigma-volunteer-social-profiles li a, .sigma-volunteer-style-1 .sigma-volunteer-social-profiles li.share-main a,
			.sigma-btn-dark .vc_btn3-color-primary, .sigma-btn-dark .vc_btn3-color-secondary, .theme-btn, .sigma-btn-dark .vc_btn3-color-primary,
			.theme-btn.btn-white, .theme-btn.btn-white:hover, .sigma-volunteer-detail .sigma-volunteer-details .sigma-volunteer-detail, .video-style-2 .video-text .video-link-two .popup-video,
			.single-detail-page .page-service-list li i, .sigma-post-style-1 .sigma-post-wrapper .sigma-post-inner .entry-footer ul li a:hover,
			.sigma-post-style-1 .sigma-post-wrapper .sigma-post-inner footer.entry-footer .sigma_post_author .author.vcard a:hover,
			.sigma-post-style-3 .sigma-post-wrapper .entry-meta-footer a:hover,
			.sigma-post-style-3 .sigma-post-wrapper header .posted-on a:hover,
			.features-loop .feature-box.dark-box .count,
			.sigma_booking-form label, .sigma_room_slider_wrapper .rooms-slider-two .single-rooms-box .sigma-room-facilities li,
			 .widget.widget_rss .widget-title a, .wp-calendar-table td, .wp-calendar-table th, .sigma-list-wrapper.style-2 ul li p,
			 .sigma-donation-style-1 .sigma_donation-body .signa_donation-collection p,
			 .sigma-donation-style-3 .sigma_donation-body .signa_donation-collection p,
			 .sigma-donation-style-4 .signa_donation-collection p,
			 .sigma-post-style-1 .sigma-post-wrapper .sigma-post-inner .entry-footer ul li a,
			 .sigma-footer-widgets-wrapper .widget_sigma_recent_entries .sigma-post-content h4 a,
 			.sigma-footer-widgets-wrapper .widget_sigma_recent_entries .sigma-post-content .sigma-post-date,
			.sigma-events-style-2 .sigma_box .sigma_event-info .event-date-wrapper,
			.sigma-holis-style-1 .sigma_box .sigma_holi-info li,
			.sigma-holis-style-1 .sigma_box .sigma_holi-info li.holis-date .posted-on a,
			.sigma-holis-style-1 .sigma_box .sigma_holi-info li .author-link,
			.infobox-style-6 .sigma_icon-block .sigma_icon-block-content a i,
			body .vc_toggle_title h4, .widget h2.widget-title,
			.widget-area.sidebar .widget .wp-block-group h2,
			.widget-area.sidebar .widget.widget_sigma_recent_entries .sigma-post-content .sigma-post-date,
			.sigma-post-wrapper blockquote p, .sigma-post-wrapper footer .sigma_post_tags .entry-meta-container>.tag-list a,
			.comment-list span.comment-author, .sigma_timeline-date>span, .service-style-2 .sigma_service .btn-link,
			.service-style-2 .sigma_service .btn-link i,
			.sigma-events-style-1 .sigma_post-body .sigma_post-meta span, .widget-area.sidebar .widget.widget_sigma_recent_events ul li .event-date,
			.widget-area.sidebar .widget.widget_sigma_recent_events ul li .event-name p,
			.widget-area.sidebar .widget.event-info-widget ul li span,
			.sigma-events-details .sigma_post-meta span, [id*=give-form].sigma_donation-details fieldset#give-payment-mode-select .give-payment-mode-label,
			[id*=give-form].sigma_donation-details #give_purchase_form_wrap  legend,
			form[id*=give-form].give-form .sigma_single-donation-content-wrapper .give-donation-amount .give-hidden,
			#content [id*=give-form].give-form #give-payment-mode-select legend,
			#content [id*=give-form].give-form #give_purchase_form_wrap legend,
			.sigma_shop-global .woocommerce-result-count, .sigma_product-stock-status span,
			 .infobox-style-5 .sigma_icon-block .sigma_icon-block-content h5, .no-results.not-found .page-header h1,
			 .comments-area .comments-title,
			 .comment-respond .comment-reply-title, .post-details-box .sigma-related-title,
			 .post-details-box .sigma-post-wrapper .sigma-post-inner .entry-content strong, .sigma-post-wrapper .sigma_post_tags h5,
			 .post-details-box h1,
			 .post-details-box h2,
			 .post-details-box h3,
			 .post-details-box h4,
			 .post-details-box h5,
			 .post-details-box h6, .comment-list .comment-content blockquote p, .entry-content strong,
			 .entry-content h1,
			 .entry-content h2,
			 .entry-content h3,
			 .entry-content h4,
			 .entry-content h5,
			 .entry-content h6, .sigma_product .sigma_product-body h5 a, .woocommerce div.product form.cart .variations label
			{
				color: <?php echo esc_attr($headings_color); ?>;
			}
		<?php } ?>

		<?php if( !empty( $body_color ) ){ ?>
			body, p{
				color: <?php echo esc_attr($body_color); ?>;
			}
		<?php } ?>

		<?php if( !empty( $footer_top_bg ) ){ ?>
		footer .footer-top,
		.site-footer.site-footer-layout-2 .footer-top,
		.site-footer.footer-dark.site-footer.site-footer-layout-2 .footer-top{
			background-color: <?php echo esc_attr( $footer_top_bg ); ?>
		}
		<?php } ?>

		<?php if( !empty( $footer_middle_bg ) ){ ?>
		.sigma-footer-widgets-wrapper{
			background-color: <?php echo esc_attr( $footer_middle_bg ); ?>
		}
		<?php } ?>

		<?php if( !empty( $footer_bottom_bg ) ){ ?>
		.sigma-copyright,
		.site-footer-layout-3 .sigma_footer-bottom{
			background-color: <?php echo esc_attr( $footer_bottom_bg ); ?>
		}
		<?php } ?>

		<?php if(isset($footer_overlay_color['rgba']) && !empty($footer_overlay_color['rgba'])) { ?>
			#colophon.site-footer::before {
			    content: "";
			    width: 100%;
			    height: 100%;
			    position: absolute;
			    background: <?php echo esc_attr($footer_overlay_color['rgba']); ?>;
			    top: 0;
			    left: 0;
			}
		<?php } ?>

		<?php if( !empty( $header_sticky_color ) ){ ?>
		.site-header.sticky .site-header-bottom .burger-icon span,
		#header-sec.site-header.header-layout-3.sticky .sigma_header-middle .navbar>.navbar-nav>.menu-item>a,
		#header-sec.site-header.header-layout-3.sticky .sigma_header-contact i,
		#header-sec.site-header.header-layout-3.sticky .sigma_header-contact span,
		#header-sec.site-header.header-layout-3.sticky .sigma_header-contact h6,
		#header-sec.site-header.header-layout-3.sticky .sigma_header-controls.style-1 a,
		#header-sec.site-header.header-layout-4.sticky .sigma_header-inner .navbar-nav > li > a,
		#header-sec.header-layout-4.sticky .sigma_header-inner .sigma_header-top .sigma_header-top-inner ul li a,
		#header-sec.site-header.header-layout-5.sticky .sigma_header-middle .navbar>.navbar-nav>.menu-item>a,
		#header-sec.header-layout-5.sticky .sigma_header-controls.sigma_header-button a.sigma_header-contact,
		#header-sec.header-layout-5.sticky .sigma_header-controls.sigma_header-button a.sigma_header-contact h6,
		#header-sec.header-layout-5.sticky .sigma_header-controls.sigma_header-button a.sigma_header-contact span,
		.site-header.can-sticky.header-layout-1 .contact-info .contact-item .contact-list span a,
		.site-header.can-sticky .contact-info .contact-item .contact-list span,
		.site-header.header-layout-3.sticky .sigma_header-middle .sigma_header-button .cart.dropdown-btn a,
		.header-layout-2.sticky .cart.dropdown-btn a,
		.header-layout-1.sticky .cart.dropdown-btn a:hover,
		.header-layout-4.sticky .sigma_header-inner .cart.dropdown-btn a,
		.site-header.header-layout-5.sticky .cart.dropdown-btn a,
		.site-header.header-layout-5.sticky .cart.dropdown-btn a,
		.header-layout-4.sticky .sigma_header-inner .sigma_header-top .sigma_base-livestream-status span
		{
			color: <?php echo esc_attr( $header_sticky_color ); ?>;
		}
		#header-sec.site-header.header-layout-5.sticky .aside-toggler.desktop-toggler span,
		.site-header.header-layout-1.can-sticky.header-scheme-dark .burger-icon span,
		.site-header.can-sticky.header-layout-2 .site-header-bottom .burger-icon span	{
				background-color: <?php echo esc_attr( $header_sticky_color ); ?>;
			}
		<?php } ?>

		<?php if( !empty( $header_sticky_color_hover ) ){ ?>
			#header-sec.site-header.header-layout-3.sticky .sigma_header-middle .navbar>.navbar-nav>.menu-item>a:hover,
			#header-sec.site-header.header-layout-3.sticky .sigma_header-contact:hover,
			#header-sec.site-header.header-layout-3.sticky .sigma_header-controls.style-1 a:hover,
			#header-sec.site-header.header-layout-4.sticky .sigma_header-inner .navbar-nav > li > a:hover,
			#header-sec.header-layout-4.sticky .sigma_header-inner .sigma_header-top .sigma_header-top-inner ul li a:hover,
			#header-sec.site-header.header-layout-5.sticky .sigma_header-middle .navbar>.navbar-nav>.menu-item>a:hover,
			#header-sec.header-layout-5.sticky .sigma_header-controls.sigma_header-button a.sigma_header-contact:hover,
			#header-sec.header-layout-5.sticky .sigma_header-controls.sigma_header-button a.sigma_header-contact:hover h6,
			#header-sec.header-layout-5.sticky .sigma_header-controls.sigma_header-button a.sigma_header-contact:hover span,
			.site-header.header-layout-3.sticky .sigma_header-middle .sigma_header-button .cart.dropdown-btn a:hover,
			.header-layout-2.sticky .cart.dropdown-btn a:hover,
			.header-layout-1.sticky .cart.dropdown-btn a:hover,
			.header-layout-4.sticky .sigma_header-inner .cart.dropdown-btn a:hover,
			.site-header.header-layout-5.sticky .cart.dropdown-btn a:hover,
			.site-header.header-layout-5.sticky .cart.dropdown-btn a:hover
			{
			color: <?php echo esc_attr( $header_sticky_color_hover ); ?>;
		}
		<?php } ?>

		<?php if( !empty( $header_sticky_bg ) ){ ?>
		.site-header.sticky .site-header-bottom,
		#header-sec.site-header.header-layout-3.sticky .sigma_header-middle,
		#header-sec.site-header.header-layout-4.sticky .sigma_header-middle,
		#header-sec.site-header.header-layout-5.sticky .sigma_header-middle,
		.site-header.can-sticky.header-layout-2 .site-header-bottom-inner
		{
			background-color: <?php echo esc_attr( $header_sticky_bg ); ?>;
		}
		<?php } ?>

		<?php if( !empty( $header_submenu_bg ) ){ ?>
		.sigma_mega-menu-wrapper,
		.site-header .site-header-bottom-inner > ul ul.sub-menu,
		.site-header .site-header-top-inner > ul ul.sub-menu,
		.site-header.header-layout-3 .sub-menu,
		.site-header.header-layout-4 .sigma_header-inner .navbar-nav .sub-menu,
		.site-header.header-layout-5 .sigma_header-middle .navbar-nav .sub-menu{
			background-color: <?php echo esc_attr( $header_submenu_bg ); ?> !important;
		}
		<?php } ?>

		<?php if( !empty($header_submenu_color)) { ?>
			#header-sec.site-header.header-layout-3 .sub-menu a,
			#header-sec.site-header.header-layout-4 .sigma_header-inner .navbar-nav .sub-menu a,
				#header-sec.site-header.header-layout-5 .sigma_header-middle .navbar-nav .sub-menu a{
				color: <?php echo esc_attr( $header_submenu_color ); ?>;
			}
		<?php } ?>

		<?php if( !empty($header_submenu_color_hover)) { ?>
			#header-sec.site-header.header-layout-3 .sub-menu a:hover,
			#header-sec.site-header.header-layout-4 .sigma_header-inner .navbar-nav .sub-menu a:hover,
			#header-sec.site-header.header-layout-5 .sigma_header-middle .navbar-nav .sub-menu a:hover{
				color: <?php echo esc_attr( $header_submenu_color_hover ); ?>;
			}
		<?php } ?>

		<?php if( !empty( $header_top_bg ) ){ ?>
		.site-header .site-header-top,
		.site-header.header-layout-5 .sigma_header-top{
			background-color: <?php echo esc_attr( $header_top_bg ); ?>;
		}
		<?php } ?>

				<?php if( !empty( $header_top_color ) ){ ?>
				#header-sec.site-header.header-layout-5 .sigma_header-top .sigma_header-top-inner ul.sigma_header-top-links a,
				.site-header.header-layout-5 .sigma_header-top .sigma_header-top-inner .sigma_header-top-links > li span,
				#header-sec.site-header.header-layout-5 .sigma_header-top .sigma_header-top-inner .social-info a,
					#header-sec.site-header.header-layout-1 .site-header-top .social-info li a,
					#header-sec.site-header.header-layout-1 .site-header-top-inner > a,
						#header-sec.site-header.header-layout-2 .site-header-top .social-info li a,
						#header-sec.site-header.header-layout-2 .site-header-top-inner > a
				{
					color: <?php echo esc_attr( $header_top_color ); ?>;
				}
				<?php } ?>

				<?php if( !empty( $header_top_color_hover ) ){ ?>
				#header-sec.site-header.header-layout-5 .sigma_header-top .sigma_header-top-inner ul.sigma_header-top-links a:hover,
				#header-sec.site-header.header-layout-5 .sigma_header-top .sigma_header-top-inner .social-info a:hover,
					#header-sec.site-header.header-layout-1 .site-header-top .social-info li a:hover,
					#header-sec.site-header.header-layout-1 .site-header-top-inner > a:hover,
					#header-sec.site-header.header-layout-2 .site-header-top .social-info li a:hover,
					#header-sec.site-header.header-layout-2 .site-header-top-inner > a:hover
				{
					color: <?php echo esc_attr( $header_top_color_hover ); ?>;
				}
				<?php } ?>

		<?php if( !empty( $header_bottom_bg ) ){ ?>
		.site-header.header-layout-1:not(.sticky) .site-header-bottom,
		.site-header.header-layout-2:not(.sticky) .site-header-bottom-inner,
		.site-header.header-layout-2:not(.sticky),
		#header-sec.site-header.header-layout-3:not(.sticky) .sigma_header-middle,
		.site-header.header-layout-5 .sigma_header-middle,
		#header-sec.site-header.header-layout-5.header-absolute .sigma_header-middle .navbar
		{
			background-color: <?php echo esc_attr( $header_bottom_bg ); ?>;
		}
		<?php } ?>

		<?php if( !empty( $header_bottom_color ) ){ ?>
		.site-header-bottom-inner .burger-icon span,
		#header-sec.site-header.header-layout-3:not(.sticky) .sigma_header-middle .navbar>.navbar-nav>.menu-item>a,
		#header-sec.site-header.header-layout-3:not(.sticky) .sigma_header-contact i,
		#header-sec.site-header.header-layout-3:not(.sticky) .sigma_header-contact span,
		#header-sec.site-header.header-layout-3:not(.sticky) .sigma_header-contact h6,
		#header-sec.site-header.header-layout-3:not(.sticky) .sigma_header-controls.style-1 a,
		#header-sec.header-layout-4:not(.sticky) .sigma_header-inner .sigma_header-top .sigma_header-top-inner ul li a,
		#header-sec.site-header.header-layout-4:not(.sticky) .sigma_header-inner .navbar-nav > li > a,
		#header-sec.site-header.header-layout-5:not(.sticky) .sigma_header-middle .navbar>.navbar-nav>.menu-item>a,
		#header-sec.header-layout-5:not(.sticky) .sigma_header-controls.sigma_header-button a.sigma_header-contact,
		#header-sec.header-layout-5:not(.sticky) .sigma_header-controls.sigma_header-button a.sigma_header-contact h6,
		#header-sec.header-layout-5:not(.sticky) .sigma_header-controls.sigma_header-button a.sigma_header-contact span,
		.site-header.header-layout-1:not(.sticky) .site-header-bottom-inner > ul > li > a,
		.site-header.header-layout-1:not(.sticky) .contact-info .contact-item .contact-list span:last-child a,
		 .site-header.header-layout-1:not(.sticky) .contact-info .contact-item .contact-list span,
		 .site-header.header-layout-2 .site-header-bottom-inner > ul > li > a,
		 .site-header.header-layout-3:not(.sticky) .sigma_header-middle .sigma_header-button .cart.dropdown-btn a,
		 .header-layout-2:not(.sticky) .cart.dropdown-btn a, .header-layout-1:not(.sticky) .cart.dropdown-btn a,
		 .header-layout-4:not(.sticky) .sigma_header-inner .cart.dropdown-btn a,
		 .site-header.header-layout-5:not(.sticky) .cart.dropdown-btn a,
		 .site-header.header-layout-5:not(.sticky) .cart.dropdown-btn a,
		 .header-layout-4:not(.sticky) .sigma_header-inner .sigma_header-top .sigma_base-livestream-status span,
		 .site-header.header-layout-5 .sigma_header-middle .prayer-icon i,
		 .site-header.header-layout-4 .sigma_header-inner .prayer-icon
		{
			color: <?php echo esc_attr( $header_bottom_color ); ?>
		}
		#header-sec.site-header.header-layout-3:not(.sticky) .aside-toggler.desktop-toggler span,
		#header-sec.site-header.header-layout-5:not(.sticky) .aside-toggler.desktop-toggler span{
			background: <?php echo esc_attr( $header_bottom_color ); ?>
		}
		<?php } ?>


				<?php if( !empty( $header_bottom_color_hover ) ){ ?>
				.site-header-bottom-inner .burger-icon span,
				#header-sec.site-header.header-layout-3:not(.sticky) .sigma_header-middle .navbar>.navbar-nav>.menu-item>a:hover,
				#header-sec.site-header.header-layout-3:not(.sticky) .sigma_header-contact:hover,
				#header-sec.site-header.header-layout-3:not(.sticky) .sigma_header-controls.style-1 a:hover,
				#header-sec.header-layout-4:not(.sticky) .sigma_header-inner .sigma_header-top .sigma_header-top-inner ul li a:hover,
				#header-sec.site-header.header-layout-4:not(.sticky) .sigma_header-inner .navbar-nav > li > a:hover,
				#header-sec.site-header.header-layout-5:not(.sticky) .sigma_header-middle .navbar>.navbar-nav>.menu-item>a:hover,
				#header-sec.header-layout-5:not(.sticky) .sigma_header-controls.sigma_header-button a.sigma_header-contact:hover,
				#header-sec.header-layout-5:not(.sticky) .sigma_header-controls.sigma_header-button a.sigma_header-contact:hover h6,
				#header-sec.header-layout-5:not(.sticky) .sigma_header-controls.sigma_header-button a.sigma_header-contact:hover span,
				.site-header.header-layout-1:not(.sticky) .site-header-bottom-inner > ul > li > a:hover,
				.site-header.header-layout-1:not(.sticky) .contact-info .contact-item .contact-list span:last-child a:hover,
				.site-header.header-layout-2:not(.sticky) .site-header-bottom-inner > ul > li > a:hover,
				.site-header.header-layout-3:not(.sticky) .sigma_header-middle .sigma_header-button .cart.dropdown-btn a:hover,
				.header-layout-2:not(.sticky) .cart.dropdown-btn a:hover, .header-layout-1:not(.sticky) .cart.dropdown-btn a:hover,
				.header-layout-4:not(.sticky) .sigma_header-inner .cart.dropdown-btn a:hover,
				.site-header.header-layout-5:not(.sticky) .cart.dropdown-btn a:hover,
				.site-header.header-layout-5:not(.sticky) .cart.dropdown-btn a,
				.site-header.header-layout-5 .sigma_header-middle .prayer-icon:hover i,
				.site-header.header-layout-4 .sigma_header-inner .prayer-icon:hover
				{
					color: <?php echo esc_attr( $header_bottom_color_hover ); ?>
				}
				<?php } ?>

		<?php if( !empty( $header_contact_bg ) ){ ?>
		.site-header .contact-info .contact-item i{
			background-color: <?php echo esc_attr( $header_contact_bg ); ?>
		}
		<?php } ?>

		<?php if( !empty( $info_card_bg ) ){ ?>
		.site-logo-wrapper .logo-infocard{
			background-color: <?php echo esc_attr( $info_card_bg ); ?>
		}
		<?php } ?>

		<?php if( !empty( $info_card_color ) ){ ?>
		.site-logo-wrapper .logo-infocard p,
		.site-logo-wrapper .logo-infocard strong,
		.site-logo-wrapper .logo-infocard a,
		.site-logo-wrapper ul.social-info li a{
			color: <?php echo esc_attr( $info_card_color ); ?>
		}
		.site-logo-wrapper .logo-infocard .contact-item svg path{
			fill: <?php echo esc_attr( $info_card_color ); ?>
		}
		<?php } ?>

		<?php if( !empty( $content_size ) ){ ?>
		@media (min-width: 1200px){
			.container{
				max-width: <?php echo esc_attr( $content_size ); ?>px;
			}
		}
		<?php } ?>

		<?php if( !empty( $header_size ) ){ ?>
			@media (min-width: 1600px){
				.site-header.header-layout-2 .container,
				.site-header.header-layout-1 [class*="site-header-"] > .container,
				.site-header.header-layout-5 .container,
				.site-header.header-layout-6 .container-fluid{
					max-width: <?php echo esc_attr( $header_size ); ?>px;
				}
				.site-header.header-layout-3 > .sigma_header-middle{
					max-width: 100%;
					margin: 0 auto;
				}
			}
		<?php } ?>

		<?php
		if ( ! empty( $page_title_height ) ) { ?>
				.sigma-subheader .container{
					padding-top: <?php echo esc_attr($page_title_height); ?>px;
					padding-bottom: <?php echo esc_attr($page_title_height); ?>px;
				}
		<?php }	?>
		/* Custom Title Typography */
		<?php if(!empty($ch_title_typography)){ ?>
		.sigma_custom_heading_wrapper .sigma-heading-title-wrapper .heading-title,
		.custom-heading-style-2 .section-title .heading-title{
			<?php if( $ch_title_typography_ff ){ ?>
			font-family: <?php echo esc_attr($ch_title_typography_ff); ?>;
			<?php } ?>
			<?php if( $ch_title_typography_fw ){ ?>
			font-weight: <?php echo esc_attr($ch_title_typography_fw); ?>;
			<?php } ?>
			<?php if( $ch_title_typography_ls ){ ?>
			letter-spacing: <?php echo esc_attr($ch_title_typography_ls); ?>;
			<?php } ?>
			<?php if( $ch_title_typography_lh ){ ?>
			line-height: <?php echo esc_attr($ch_title_typography_lh); ?>;
			<?php } ?>
			<?php if( $ch_title_typography_fs ){ ?>
			font-size: <?php echo esc_attr($ch_title_typography_fs); ?>;
			<?php } ?>
		}
		<?php } ?>

		/* Custom Subtitle Typography */
		<?php if(!empty($ch_subtitle_typography)){ ?>
		.sigma_custom_heading_wrapper .sigma-heading-subtitle-wrapper .heading-subtitle,
		.custom-heading-style-2 .section-title .heading-subtitle{
			<?php if( $ch_subtitle_typography_ff ){ ?>
			font-family: <?php echo esc_attr($ch_subtitle_typography_ff); ?>;
			<?php } ?>
			<?php if( $ch_subtitle_typography_fw ){ ?>
			font-weight: <?php echo esc_attr($ch_subtitle_typography_fw); ?>;
			<?php } ?>
			<?php if( $ch_subtitle_typography_ls ){ ?>
			letter-spacing: <?php echo esc_attr($ch_subtitle_typography_ls); ?>;
			<?php } ?>
			<?php if( $ch_subtitle_typography_lh ){ ?>
			line-height: <?php echo esc_attr($ch_subtitle_typography_lh); ?>;
			<?php } ?>
			<?php if( $ch_subtitle_typography_fs ){ ?>
			font-size: <?php echo esc_attr($ch_subtitle_typography_fs); ?>;
			<?php } ?>
		}
		<?php } ?>

		/* Body Typography */
		<?php if(!empty($body_typography)){ ?>
		body{
			<?php if( $body_typography_ff ){ ?>
			font-family: <?php echo esc_attr($body_typography_ff); ?>;
			<?php } ?>
			<?php if( $body_typography_fw ){ ?>
			font-weight: <?php echo esc_attr($body_typography_fw); ?>;
			<?php } ?>
			<?php if( $body_typography_ls ){ ?>
			letter-spacing: <?php echo esc_attr($body_typography_ls); ?>;
			<?php } ?>
			<?php if( $body_typography_lh ){ ?>
			line-height: <?php echo esc_attr($body_typography_lh); ?>;
			<?php } ?>
			<?php if( $body_typography_fs ){ ?>
			font-size: <?php echo esc_attr($body_typography_fs); ?>;
			<?php } ?>
		}
		<?php } ?>

		/* h1 Typography */
		<?php if(!empty($h1_typography)){ ?>
		h1,
		.woocommerce div.product .sigma_product-single-content .product_title{
			<?php if( $h1_typography_ff ){ ?>
			font-family: <?php echo esc_attr($h1_typography_ff); ?>;
			<?php } ?>
			<?php if( $h1_typography_fw ){ ?>
			font-weight: <?php echo esc_attr($h1_typography_fw); ?>;
			<?php } ?>
			<?php if( $h1_typography_ls ){ ?>
			letter-spacing: <?php echo esc_attr($h1_typography_ls); ?>;
			<?php } ?>
			<?php if( $h1_typography_lh ){ ?>
			line-height: <?php echo esc_attr($h1_typography_lh); ?>;
			<?php } ?>
			<?php if( $h1_typography_fs ){ ?>
			font-size: <?php echo esc_attr($h1_typography_fs); ?>;
			<?php } ?>
		}
		<?php } ?>

		/* h2 Typography */
		<?php if(!empty($h2_typography)){ ?>
		h2, .sigma-post-wrapper .entry-title, .widget h2.widget-title,
		.custom-heading-style-2 .section-title .heading-title,
		.custom-heading-style-2 .section-title .heading-subtitle,
		.site-footer.footer-light .sigma-footer-widgets-wrapper .widget h6.widget-title,
		.woocommerce div.product .woocommerce-tabs .panel h2,
		section.related.sigma_related-posts h2
		{
			<?php if( $h2_typography_ff ){ ?>
			font-family: <?php echo esc_attr($h2_typography_ff); ?>;
			<?php } ?>
			<?php if( $h2_typography_fw ){ ?>
			font-weight: <?php echo esc_attr($h2_typography_fw); ?>;
			<?php } ?>
			<?php if( $h2_typography_ls ){ ?>
			letter-spacing: <?php echo esc_attr($h2_typography_ls); ?>;
			<?php } ?>
			<?php if( $h2_typography_lh ){ ?>
			line-height: <?php echo esc_attr($h2_typography_lh); ?>;
			<?php } ?>
			<?php if( $h2_typography_fs ){ ?>
			font-size: <?php echo esc_attr($h2_typography_fs); ?>;
			<?php } ?>
		}
		<?php } ?>

		/* h3 Typography */
		<?php if(!empty($h3_typography)){ ?>
		h3,
		.custom-heading-style-3 .section-title .heading-title,
		.post-author-box .author-title
		{
			<?php if( $h3_typography_ff ){ ?>
			font-family: <?php echo esc_attr($h3_typography_ff); ?>;
			<?php } ?>
			<?php if( $h3_typography_fw ){ ?>
			font-weight: <?php echo esc_attr($h3_typography_fw); ?>;
			<?php } ?>
			<?php if( $h3_typography_ls ){ ?>
			letter-spacing: <?php echo esc_attr($h3_typography_ls); ?>;
			<?php } ?>
			<?php if( $h3_typography_lh ){ ?>
			line-height: <?php echo esc_attr($h3_typography_lh); ?>;
			<?php } ?>
			<?php if( $h3_typography_fs ){ ?>
			font-size: <?php echo esc_attr($h3_typography_fs); ?>;
			<?php } ?>
		}
		<?php } ?>

		/* h4 Typography */
		<?php if(!empty($h4_typography)){ ?>
		h4,
		.sigma_cta.cta-style-1 .sigma_cta .sigma_cta-content h4,
		.sigma-shortcode-wrapper.blog-style-4 .sigma-post-style-1 .sigma-post-wrapper .sigma-post-inner .entry-title, .sigma-shortcode-wrapper.blog-style-5 .sigma-post-style-1 .sigma-post-wrapper .sigma-post-inner .entry-title
		{
			<?php if( $h4_typography_ff ){ ?>
			font-family: <?php echo esc_attr($h4_typography_ff); ?>;
			<?php } ?>
			<?php if( $h4_typography_fw ){ ?>
			font-weight: <?php echo esc_attr($h4_typography_fw); ?>;
			<?php } ?>
			<?php if( $h4_typography_ls ){ ?>
			letter-spacing: <?php echo esc_attr($h4_typography_ls); ?>;
			<?php } ?>
			<?php if( $h4_typography_lh ){ ?>
			line-height: <?php echo esc_attr($h4_typography_lh); ?>;
			<?php } ?>
			<?php if( $h4_typography_fs ){ ?>
			font-size: <?php echo esc_attr($h4_typography_fs); ?>;
			<?php } ?>
		}
		<?php } ?>

		/* h5 Typography */
		<?php if(!empty($h5_typography)){ ?>
		h5,
		.sigma-volunteer-style-2 .sigma_volunteer.volunteer-5 .sigma_volunteer-info h5, .sigma-volunteer-style-3 .sigma_volunteer.volunteer-4 .sigma_volunteer-info h5,
		.infobox-style-4 .sigma_icon-block.icon-block-3 .sigma_icon-block-content h5, .sigma-post-wrapper .sigma_post_tags h5,
		.sigma-post-wrapper footer.entry-footer .social-icon-share h5, .comments-area .comments-title, .comment-respond .comment-reply-title,
		.sigma_product .sigma_product-body h5
		{
			<?php if( $h5_typography_ff ){ ?>
			font-family: <?php echo esc_attr($h5_typography_ff); ?>;
			<?php } ?>
			<?php if( $h5_typography_fw ){ ?>
			font-weight: <?php echo esc_attr($h5_typography_fw); ?>;
			<?php } ?>
			<?php if( $h5_typography_ls ){ ?>
			letter-spacing: <?php echo esc_attr($h5_typography_ls); ?>;
			<?php } ?>
			<?php if( $h5_typography_lh ){ ?>
			line-height: <?php echo esc_attr($h5_typography_lh); ?>;
			<?php } ?>
			<?php if( $h5_typography_fs ){ ?>
			font-size: <?php echo esc_attr($h5_typography_fs); ?>;
			<?php } ?>
		}
		<?php } ?>

		/* h6 Typography */
		<?php if(!empty($h6_typography)){ ?>
		h6{
			<?php if( $h6_typography_ff ){ ?>
			font-family: <?php echo esc_attr($h6_typography_ff); ?>;
			<?php } ?>
			<?php if( $h6_typography_fw ){ ?>
			font-weight: <?php echo esc_attr($h6_typography_fw); ?>;
			<?php } ?>
			<?php if( $h6_typography_ls ){ ?>
			letter-spacing: <?php echo esc_attr($h6_typography_ls); ?>;
			<?php } ?>
			<?php if( $h6_typography_lh ){ ?>
			line-height: <?php echo esc_attr($h6_typography_lh); ?>;
			<?php } ?>
			<?php if( $h6_typography_fs ){ ?>
			font-size: <?php echo esc_attr($h6_typography_fs); ?>;
			<?php } ?>
		}
		<?php } ?>

		/* Logo Text Typography */
		<?php if(!empty($logo_text_typography)){ ?>
		.site-slogan span,
		.site-slogan h5{
			<?php if( $logo_text_typography_ff ){ ?>
			font-family: <?php echo esc_attr($logo_text_typography_ff); ?>;
			<?php } ?>
			<?php if( $logo_text_typography_fw ){ ?>
			font-weight: <?php echo esc_attr($logo_text_typography_fw); ?>;
			<?php } ?>
			<?php if( $logo_text_typography_ls ){ ?>
			letter-spacing: <?php echo esc_attr($logo_text_typography_ls); ?>;
			<?php } ?>
			<?php if( $logo_text_typography_lh ){ ?>
			line-height: <?php echo esc_attr($logo_text_typography_lh); ?>;
			<?php } ?>
			<?php if( $logo_text_typography_fs ){ ?>
			font-size: <?php echo esc_attr($logo_text_typography_fs); ?>;
			<?php } ?>

		}

		<?php if( $logo_text_typography_clr ){ ?>
			.site-slogan h5{
				color: <?php echo esc_attr($logo_text_typography_clr); ?>;
			}
		<?php } ?>

		<?php } ?>


		<?php

		$content = apply_filters('maharatri/custom_css', ob_get_clean());
		$content = str_replace(array("\r\n", "\r"), "\n", $content);
		$lines = explode("\n", $content);
		$new_lines = array();
		foreach ($lines as $i => $line) {
			if (!empty($line)) {
				$new_lines[] = trim($line);
			}
		}

		return implode($new_lines);

	}
}
/* ACE CSS Editor */
function maharatri_dynamic_css_options() {
    $maharatri_css_editor = maharatri_get_option( 'css_editor' );
    ?>
  <style>
    <?php echo esc_html($maharatri_css_editor); ?>
  </style>
    <?php
}
add_action('wp_head',  'maharatri_dynamic_css_options', 100);
