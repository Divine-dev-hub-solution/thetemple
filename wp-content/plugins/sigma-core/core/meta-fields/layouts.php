<?php
/**
 * File responsible for adding the layouts meta fields
 *
 * @package Sigma Core
 */
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register metafields for layouts.
 *
 * @package Sigma Core
 */
function sigmacore_layout_settings_metafields()
{
    add_meta_box('sigma_layout_settings', esc_html__('Layout Settings', 'sigma-core'), 'sigmacore_layout_settings_metafields_callback', 'layouts', 'advanced');
}

add_action('add_meta_boxes', 'sigmacore_layout_settings_metafields', 2);

/**
 * Layouts meta fields display callback.
 *
 * @param WP_Post $post Current post object.
 */
function sigmacore_layout_settings_metafields_callback($post){

    global $post;
    wp_nonce_field(basename(__FILE__), 'sigma-layout-meta-nonce');

    // The field values
    $layout_settings = get_post_meta($post->ID, 'sigma_layout_settings', true);
		$sigma_layout_header_style = isset($layout_settings['header-layout']) ? $layout_settings['header-layout'] : '';
		$sigma_layout_display_cta = isset($layout_settings['display_cta']) ? (bool)$layout_settings['display_cta'] : '';
		$sigma_layout_header_cta_title = isset($layout_settings['header_cta_title']) ? $layout_settings['header_cta_title'] : '';
		$sigma_layout_header_cta_link = isset($layout_settings['header_cta_link']) ? $layout_settings['header_cta_link'] : '';
		$sigma_layout_display_info_cta = isset($layout_settings['display_info_cta']) ? (bool)$layout_settings['display_info_cta'] : '';
		$sigma_layout_header_cta_info_title = isset($layout_settings['header_cta_info_title']) ? $layout_settings['header_cta_info_title'] : '';
		$sigma_layout_header_cta_info_subtitle = isset($layout_settings['header_cta_info_subtitle']) ? $layout_settings['header_cta_info_subtitle'] : '';
		$sigma_layout_header_cta_info_icon_class = isset($layout_settings['header_cta_info_icon_class']) ? $layout_settings['header_cta_info_icon_class'] : '';
		$sigma_layout_header_cta_info_link = isset($layout_settings['header_cta_info_link']) ? $layout_settings['header_cta_info_link'] : '';
		$sigma_layout_header_scheme = isset($layout_settings['header-scheme']) ? $layout_settings['header-scheme'] : '';
		$sigma_layout_header_position = isset($layout_settings['header-position']) ? $layout_settings['header-position'] : '';
		$sigma_layout_header_sticky_enable = isset($layout_settings['sticky-header-enable']) ? (bool)$layout_settings['sticky-header-enable'] : '';
		$sigma_layout_header_sticky_scheme = isset($layout_settings['header-sticky-scheme']) ? $layout_settings['header-sticky-scheme'] : '';
		$sigma_layout_header_sticky_bg = isset($layout_settings['header_sticky_bg']) ? $layout_settings['header_sticky_bg'] : '';
		$sigma_layout_header_sticky_color = isset($layout_settings['header_sticky_color']) ? $layout_settings['header_sticky_color'] : '';
		$sigma_layout_header_sticky_color_hover = isset($layout_settings['header_sticky_color_hover']) ? $layout_settings['header_sticky_color_hover'] : '';
		$sigma_layout_header_display_search_icon = isset($layout_settings['display-search-icon']) ? (bool)$layout_settings['display-search-icon'] : '';
		$sigma_layout_header_display_user_icon = isset($layout_settings['display-user-icon']) ? (bool)$layout_settings['display-user-icon'] : '';
		$sigma_layout_header_display_collapse_sidebar_icon = isset($layout_settings['display-collapse-sidebar-icon']) ? (bool)$layout_settings['display-collapse-sidebar-icon'] : '';
		$sigma_layout_header_display_header_top_menu = isset($layout_settings['display-header-top-menu']) ? (bool)$layout_settings['display-header-top-menu'] : '';
		$sigma_layout_header_display_livestream_status = isset($layout_settings['display-livestream-status']) ? (bool)$layout_settings['display-livestream-status'] : '';
		$sigma_layout_header_display_header_cart = isset($layout_settings['display-header-cart']) ? (bool)$layout_settings['display-header-cart'] : '';
		$sigma_layout_header_display_header_wishlist = isset($layout_settings['display-header-wishlist']) ? (bool)$layout_settings['display-header-wishlist'] : '';
		$sigma_layout_header_display_header_prayer_icon = isset($layout_settings['display-header-prayer-icon']) ? (bool)$layout_settings['display-header-prayer-icon'] : '';
		$sigma_layout_header_contact_info_phone = isset($layout_settings['header_contact_info_phone']) ? (bool)$layout_settings['header_contact_info_phone'] : '';
		$sigma_layout_header_contact_info_email = isset($layout_settings['header_contact_info_email']) ? (bool)$layout_settings['header_contact_info_email'] : '';
		$sigma_layout_header_contact_info_address = isset($layout_settings['header_contact_info_address']) ? (bool)$layout_settings['header_contact_info_address'] : '';
		$sigma_layout_header_bottom_bg = isset($layout_settings['header_bottom_bg']) ? $layout_settings['header_bottom_bg'] : '';
		$sigma_layout_header_bottom_color = isset($layout_settings['header_bottom_color']) ? $layout_settings['header_bottom_color'] : '';
		$sigma_layout_header_bottom_color_hover = isset($layout_settings['header_bottom_color_hover']) ? $layout_settings['header_bottom_color_hover'] : '';
		$sigma_layout_header_submenu_bg = isset($layout_settings['header_submenu_bg']) ? $layout_settings['header_submenu_bg'] : '';
		$sigma_layout_header_submenu_color = isset($layout_settings['header_submenu_color']) ? $layout_settings['header_submenu_color'] : '';
		$sigma_layout_header_submenu_color_hover = isset($layout_settings['header_submenu_color_hover']) ? $layout_settings['header_submenu_color_hover'] : '';
		$sigma_layout_header_contact_bg = isset($layout_settings['header_contact_bg']) ? $layout_settings['header_contact_bg'] : '';
		$sigma_layout_header_contact_bg_color = isset($layout_settings['header_contact_bg_color']) ? $layout_settings['header_contact_bg_color'] : '';

		$sigma_layout_display_top_header = isset($layout_settings['display_top_header']) ? (bool)$layout_settings['display_top_header'] : '';
		$sigma_layout_display_top_sm = isset($layout_settings['display_top_sm']) ? (bool)$layout_settings['display_top_sm'] : '';
		$sigma_layout_header_button_title = isset($layout_settings['header_button_title']) ? $layout_settings['header_button_title'] : '';
		$sigma_layout_header_button_liink = isset($layout_settings['header_button_liink']) ? $layout_settings['header_button_liink'] : '';
		$sigma_layout_header_top_bg = isset($layout_settings['header_top_bg']) ? $layout_settings['header_top_bg'] : '';
		$sigma_layout_header_top_color = isset($layout_settings['header_top_color']) ? $layout_settings['header_top_color'] : '';
		$sigma_layout_header_top_color_hover = isset($layout_settings['header_top_color_hover']) ? $layout_settings['header_top_color_hover'] : '';

		$sigma_layout_header_logo = isset($layout_settings['site-logo']) ? $layout_settings['site-logo'] : '';
	  $sigma_layout_header_sticky_logo = isset($layout_settings['sticky-logo']) ? $layout_settings['sticky-logo'] : '';

	  $sigma_layout_footer_layout = isset($layout_settings['footer-layout']) ? $layout_settings['footer-layout'] : '';
	  $sigma_layout_footer_skin = isset($layout_settings['footer-skin']) ? $layout_settings['footer-skin'] : '';
	  $sigma_layout_display_footer_topbar = isset($layout_settings['display-footer-topbar']) ? (bool)$layout_settings['display-footer-topbar'] : '';
	  $sigma_layout_footer_logo = isset($layout_settings['footer-logo']) ? $layout_settings['footer-logo'] : '';
	  $sigma_layout_display_footer_social_links = isset($layout_settings['display-footer-social-links']) ? (bool)$layout_settings['display-footer-social-links'] : '';
	  $sigma_layout_footer_column = isset($layout_settings['footer_layout']) ? $layout_settings['footer_layout'] : '';
	  $sigma_layout_footer_top_bg = isset($layout_settings['footer_top_bg']) ? $layout_settings['footer_top_bg'] : '';
	  $sigma_layout_footer_middle_bg = isset($layout_settings['footer_middle_bg']) ? $layout_settings['footer_middle_bg'] : '';
	  $sigma_layout_footer_bottom_bg = isset($layout_settings['footer_bottom_bg']) ? $layout_settings['footer_bottom_bg'] : '';
	  $sigma_layout_display_footer_logo = isset($layout_settings['display-footer-logo']) ? (bool)$layout_settings['display-footer-logo'] : '';
	  $sigma_layout_footer_bottom_logo = isset($layout_settings['footer-bottom-logo']) ? $layout_settings['footer-bottom-logo'] : '';
	  $sigma_layout_display_footer_bottom_social_links = isset($layout_settings['display-footer-bottom-social-links']) ? (bool)$layout_settings['display-footer-bottom-social-links'] : '';

		$sigma_layout_primary_color = isset($layout_settings['primary_color']) ? $layout_settings['primary_color'] : '';
	  $sigma_layout_secondary_color = isset($layout_settings['secondary_color']) ? $layout_settings['secondary_color'] : '';
	  $sigma_layout_tertiary_color = isset($layout_settings['tertiary_color']) ? $layout_settings['tertiary_color'] : '';

    // All metafields
    ?>
		<div class="sigma_tabs-wrapper">

	        <div class="sigma_tabs-nav">

	            <a class="sigma_tab active" href="#" data-target="#sigma-tab-header-options">
	                <?php echo esc_html__('Header Settings', 'sigma-core') ?>
	            </a>

							<a class="sigma_tab" href="#" data-target="#sigma-tab-header-top-options">
	                <?php echo esc_html__('Header Top Settings', 'sigma-core') ?>
	            </a>

							<a class="sigma_tab" href="#" data-target="#sigma-tab-logo-options">
	                <?php echo esc_html__('Logo Settings', 'sigma-core') ?>
	            </a>

	            <a class="sigma_tab" href="#" data-target="#sigma-tab-footer-options">
	                <?php echo esc_html__('Footer Settings', 'sigma-core') ?>
	            </a>

	            <a class="sigma_tab" href="#" data-target="#sigma-tab-color-options">
	                <?php echo esc_html__('Color Scheme Settings', 'sigma-core') ?>
	            </a>

	        </div>

					<div class="sigma_tab-item active" id="sigma-tab-header-options">
	            <?php
	            sigmacore_custom_metafield([
	                'type' => 'select',
	                'name' => 'header-layout',
	                'title' => __('Select Header Layout', 'sigma-core'),
	                'description' => __('Please select the header layout to display.', 'sigma-core'),
	                'value' => $sigma_layout_header_style,
	                'options' => sigmacore_get_redux_select_options('header-layout'),
	            ]);
							sigmacore_custom_metafield([
	                'type' => 'checkbox',
	                'name' => 'display_cta',
	                'title' => __('Display Call to Action Button', 'sigma-core'),
	                'description' => __('Please choose if you want to display the call to action button in header.', 'sigma-core'),
	                'value' => $sigma_layout_display_cta,
	                'options' => sigmacore_get_redux_select_options('display_cta'),
	                'required' => array(
	                  'name' => 'header-layout',
	                  'value' => array('layout-3', 'layout-4')
	                )
	            ]);
							sigmacore_custom_metafield([
	                  'type' => 'text',
	                  'name' => 'header_cta_title',
	                  'title' => __('Call to Action Button Title', 'sigma-core'),
	                  'description' => __('Enter Call to Action title', 'sigma-core'),
	                  'value' => $sigma_layout_header_cta_title,
	                  'required' => array(
	                    'name' => 'display_cta',
	                    'value' => 'true'
	                  )
	              ]);
								sigmacore_custom_metafield([
		                  'type' => 'text',
		                  'name' => 'header_cta_link',
		                  'title' => __('Call to Action Button Link', 'sigma-core'),
		                  'description' => __('Enter Call to Action Link', 'sigma-core'),
		                  'value' => $sigma_layout_header_cta_link,
		                  'required' => array(
		                    'name' => 'display_cta',
		                    'value' => 'true'
		                  )
		              ]);
									sigmacore_custom_metafield([
			                'type' => 'checkbox',
			                'name' => 'display_info_cta',
			                'title' => __('Display Call to action Info', 'sigma-core'),
			                'description' => __('Please choose if you want to display the call to action info in header', 'sigma-core'),
			                'value' => $sigma_layout_display_info_cta,
			                'options' => sigmacore_get_redux_select_options('display_info_cta'),
			                'required' => array(
			                  'name' => 'header-layout',
			                  'value' => 'layout-5'
			                )
			            ]);
									sigmacore_custom_metafield([
		                  'type' => 'text',
		                  'name' => 'header_cta_info_title',
		                  'title' => __('Call to Action Info Title', 'sigma-core'),
		                  'description' => __('Enter Call to Action title', 'sigma-core'),
		                  'value' => $sigma_layout_header_cta_info_title,
		                  'required' => array(
		                    'name' => 'display_info_cta',
		                    'value' => 'true'
		                  )
		              ]);
									sigmacore_custom_metafield([
		                  'type' => 'text',
		                  'name' => 'header_cta_info_subtitle',
		                  'title' => __('Call to Action Info Subtitle', 'sigma-core'),
		                  'description' => __('Enter Call to Action subtitle', 'sigma-core'),
		                  'value' => $sigma_layout_header_cta_info_subtitle,
		                  'required' => array(
		                    'name' => 'display_info_cta',
		                    'value' => 'true'
		                  )
		              ]);
									sigmacore_custom_metafield([
		                  'type' => 'text',
		                  'name' => 'header_cta_info_icon_class',
		                  'title' => __('Call to Action Info icon class', 'sigma-core'),
		                  'description' => __('Enter Call to Action icon class', 'sigma-core'),
		                  'value' => $sigma_layout_header_cta_info_icon_class,
		                  'required' => array(
		                    'name' => 'display_info_cta',
		                    'value' => 'true'
		                  )
		              ]);
									sigmacore_custom_metafield([
		                  'type' => 'text',
		                  'name' => 'header_cta_info_link',
		                  'title' => __('Call to Action link', 'sigma-core'),
		                  'description' => __('Enter Call to Actionton link', 'sigma-core'),
		                  'value' => $sigma_layout_header_cta_info_link,
		                  'required' => array(
		                    'name' => 'display_info_cta',
		                    'value' => 'true'
		                  )
		              ]);
									sigmacore_custom_metafield([
			                'type' => 'select',
			                'name' => 'header-scheme',
			                'title' => __('Select Header Color Scheme', 'sigma-core'),
			                'description' => __('Please select the header color scheme.', 'sigma-core'),
			                'value' => $sigma_layout_header_scheme,
			                'options' => sigmacore_get_redux_select_options('header-scheme'),
			            ]);
									sigmacore_custom_metafield([
			                'type' => 'select',
			                'name' => 'header-position',
			                'title' => __('Select Header Position', 'sigma-core'),
			                'description' => __('Please select the header position.', 'sigma-core'),
			                'value' => $sigma_layout_header_position,
			                'options' => sigmacore_get_redux_select_options('header-position'),
			            ]);
									sigmacore_custom_metafield([
			                'type' => 'checkbox',
			                'name' => 'sticky-header-enable',
			                'title' => __('Enable sticky header', 'sigma-core'),
			                'description' => __('Enable sticky header', 'sigma-core'),
			                'value' => $sigma_layout_header_sticky_enable,
			                'options' => sigmacore_get_redux_select_options('sticky-header-enable'),
			            ]);
									sigmacore_custom_metafield([
										'type' => 'select',
										'name' => 'header-sticky-scheme',
										'title' => __('Select Sticky Header Color scheme', 'sigma-core'),
										'description' => __('Please select the sticky header color scheme.', 'sigma-core'),
										'value' => $sigma_layout_header_sticky_scheme,
										'options' => sigmacore_get_redux_select_options('header-sticky-scheme'),
										'required' => array(
											'name' => 'sticky-header-enable',
											'value' => 'true'
										)
									]);
									sigmacore_custom_metafield([
		                'type' => 'color',
		                'name' => 'header_sticky_bg',
		                'title' => __('Header sticky background color', 'sigma-core'),
		                'description' => __('Set background color for the sticky header.', 'sigma-core'),
		                'value' => $sigma_layout_header_sticky_bg,
		                'options' => sigmacore_get_redux_select_options('header_sticky_bg'),
										'required' => array(
											'name' => 'sticky-header-enable',
											'value' => 'true'
										)
			            ]);
									sigmacore_custom_metafield([
										'type' => 'color',
										'name' => 'header_sticky_color',
										'title' => __('Header sticky color', 'sigma-core'),
										'description' => __('Set color for the sticky header.', 'sigma-core'),
										'value' => $sigma_layout_header_sticky_color,
										'options' => sigmacore_get_redux_select_options('header_sticky_color'),
										'required' => array(
											'name' => 'sticky-header-enable',
											'value' => 'true'
										)
								]);
								sigmacore_custom_metafield([
									'type' => 'color',
									'name' => 'header_sticky_color_hover',
									'title' => __('Header sticky color on hover', 'sigma-core'),
									'description' => __('Set color on hover for the sticky header.', 'sigma-core'),
									'value' => $sigma_layout_header_sticky_color_hover,
									'options' => sigmacore_get_redux_select_options('header_sticky_color_hover'),
									'required' => array(
										'name' => 'sticky-header-enable',
										'value' => 'true'
									)
								]);
								sigmacore_custom_metafield([
										'type' => 'checkbox',
										'name' => 'display-search-icon',
										'title' => __('Display Search', 'sigma-core'),
										'description' => __('Enable to display the search in header.', 'sigma-core'),
										'value' => $sigma_layout_header_display_search_icon,
										'options' => sigmacore_get_redux_select_options('display-search-icon'),
										'required' => array(
											'name' => 'header-layout',
											'value' => 'layout-3'
										)
								]);
								sigmacore_custom_metafield([
										'type' => 'checkbox',
										'name' => 'display-user-icon',
										'title' => __('Display Search', 'sigma-core'),
										'description' => __('Enable to display the user in header. (Woocommerce Profile)', 'sigma-core'),
										'value' => $sigma_layout_header_display_user_icon,
										'options' => sigmacore_get_redux_select_options('display-user-icon'),
										'required' => array(
											'name' => 'header-layout',
											'value' => 'layout-2'
										)
								]);
								sigmacore_custom_metafield([
										'type' => 'checkbox',
										'name' => 'display-collapse-sidebar-icon',
										'title' => __('Display collapse sidebar', 'sigma-core'),
										'description' => __('Enable to display the collapse sidebar icon in header', 'sigma-core'),
										'value' => $sigma_layout_header_display_collapse_sidebar_icon,
										'options' => sigmacore_get_redux_select_options('display-collapse-sidebar-icon'),
										'required' => array(
											'name' => 'header-layout',
											'value' => array('layout-1', 'layout-2', 'layout-3')
										)
								]);
								sigmacore_custom_metafield([
										'type' => 'checkbox',
										'name' => 'display-header-top-menu',
										'title' => __('Display Header Top Menu', 'sigma-core'),
										'value' => $sigma_layout_header_display_header_top_menu,
										'options' => sigmacore_get_redux_select_options('display-header-top-menu'),
										'required' => array(
											'name' => 'header-layout',
											'value' => array('layout-4', 'layout-5')
										)
								]);
								sigmacore_custom_metafield([
										'type' => 'checkbox',
										'name' => 'display-livestream-status',
										'title' => __('Display Livestream Status', 'sigma-core'),
										'value' => $sigma_layout_header_display_livestream_status,
										'options' => sigmacore_get_redux_select_options('display-livestream-status'),
										'required' => array(
											'name' => 'header-layout',
											'value' => 'layout-4'
										)
								]);
								sigmacore_custom_metafield([
										'type' => 'checkbox',
										'name' => 'display-header-cart',
										'title' => __('Display Header Cart', 'sigma-core'),
										'value' => $sigma_layout_header_display_header_cart,
										'options' => sigmacore_get_redux_select_options('display-header-cart'),
								]);
								sigmacore_custom_metafield([
										'type' => 'checkbox',
										'name' => 'display-header-wishlist',
										'title' => __('Display Header Wishlist', 'sigma-core'),
										'value' => $sigma_layout_header_display_header_wishlist,
										'options' => sigmacore_get_redux_select_options('display-header-wishlist'),
										'required' => array(
											'name' => 'header-layout',
											'value' => array('layout-4', 'layout-5')
										)
								]);
								sigmacore_custom_metafield([
										'type' => 'checkbox',
										'name' => 'display-header-prayer-icon',
										'title' => __('Display Prayer Icon', 'sigma-core'),
										'value' => $sigma_layout_header_display_header_prayer_icon,
										'options' => sigmacore_get_redux_select_options('display-header-prayer-icon'),
										'required' => array(
											'name' => 'header-layout',
											'value' => array('layout-4', 'layout-5')
										)
								]);
								sigmacore_custom_metafield([
										'type' => 'checkbox',
										'name' => 'header_contact_info_phone',
										'title' => __('Show Phone Contact Info', 'sigma-core'),
										'value' => $sigma_layout_header_contact_info_phone,
										'options' => sigmacore_get_redux_select_options('header_contact_info_phone'),
										'required' => array(
											'name' => 'header-layout',
											'value' => 'layout-3'
										)
								]);
								sigmacore_custom_metafield([
										'type' => 'checkbox',
										'name' => 'header_contact_info_email',
										'title' => __('Show Email Contact Info', 'sigma-core'),
										'value' => $sigma_layout_header_contact_info_email,
										'options' => sigmacore_get_redux_select_options('header_contact_info_email'),
										'required' => array(
											'name' => 'header-layout',
											'value' => 'layout-3'
										)
								]);
								sigmacore_custom_metafield([
										'type' => 'checkbox',
										'name' => 'header_contact_info_address',
										'title' => __('Show Address Contact Info', 'sigma-core'),
										'value' => $sigma_layout_header_contact_info_address,
										'options' => sigmacore_get_redux_select_options('header_contact_info_address'),
										'required' => array(
											'name' => 'header-layout',
											'value' => 'layout-3'
										)
								]);
								sigmacore_custom_metafield([
									'type' => 'color',
									'name' => 'header_bottom_bg',
									'title' => __('Header bottom background color', 'sigma-core'),
									'description' => __('Set background color for the bottom header.', 'sigma-core'),
									'value' => $sigma_layout_header_bottom_bg,
									'options' => sigmacore_get_redux_select_options('header_bottom_bg'),
								]);
								sigmacore_custom_metafield([
									'type' => 'color',
									'name' => 'header_bottom_color',
									'title' => __('Header bottom color', 'sigma-core'),
									'description' => __('Set color for the bottom header.', 'sigma-core'),
									'value' => $sigma_layout_header_bottom_color,
									'options' => sigmacore_get_redux_select_options('header_bottom_color'),
								]);
								sigmacore_custom_metafield([
									'type' => 'color',
									'name' => 'header_bottom_color_hover',
									'title' => __('Header bottom color on hover', 'sigma-core'),
									'description' => __('Set hover color for the bottom header.', 'sigma-core'),
									'value' => $sigma_layout_header_bottom_color_hover,
									'options' => sigmacore_get_redux_select_options('header_bottom_color_hover'),
								]);
								sigmacore_custom_metafield([
									'type' => 'color',
									'name' => 'header_submenu_bg',
									'title' => __('Header Submenu background color', 'sigma-core'),
									'description' => __('Set background color for the submenus', 'sigma-core'),
									'value' => $sigma_layout_header_submenu_bg,
									'options' => sigmacore_get_redux_select_options('header_submenu_bg'),
								]);
								sigmacore_custom_metafield([
									'type' => 'color',
									'name' => 'header_submenu_color',
									'title' => __('Header Submenu color', 'sigma-core'),
									'description' => __('Set color for the submenus', 'sigma-core'),
									'value' => $sigma_layout_header_submenu_color,
									'options' => sigmacore_get_redux_select_options('header_submenu_color'),
								]);
								sigmacore_custom_metafield([
									'type' => 'color',
									'name' => 'header_submenu_color_hover',
									'title' => __('Header Submenu color on hover', 'sigma-core'),
									'description' => __('Set color on hover for the submenus', 'sigma-core'),
									'value' => $sigma_layout_header_submenu_color_hover,
									'options' => sigmacore_get_redux_select_options('header_submenu_color_hover'),
								]);
								sigmacore_custom_metafield([
									'type' => 'color',
									'name' => 'header_contact_bg',
									'title' => __('Header Contact info background color', 'sigma-core'),
									'description' => __('Set background color for the contact info', 'sigma-core'),
									'value' => $sigma_layout_header_contact_bg,
									'options' => sigmacore_get_redux_select_options('header_contact_bg'),
									'required' => array(
										'name' => 'header-layout',
										'value' => 'layout-1'
									)
								]);
								sigmacore_custom_metafield([
									'type' => 'color',
									'name' => 'header_contact_bg_color',
									'title' => __('Header Contact info color', 'sigma-core'),
									'description' => __('Set color for the contact info', 'sigma-core'),
									'value' => $sigma_layout_header_contact_bg_color,
									'options' => sigmacore_get_redux_select_options('header_contact_bg_color'),
									'required' => array(
										'name' => 'header-layout',
										'value' => 'layout-1'
									)
								]);
	            ?>
	        </div>

					<div class="sigma_tab-item" id="sigma-tab-header-top-options">
						<?php
						sigmacore_custom_metafield([
								'type' => 'checkbox',
								'name' => 'display_top_header',
								'title' => __('Display Top Header', 'sigma-core'),
								'description' => __('Please choose if you want to display the top header or not. (Only for header layout 1,2 and 5)', 'sigma-core'),
								'value' => $sigma_layout_display_top_header,
								'options' => sigmacore_get_redux_select_options('display_top_header'),
						]);
						sigmacore_custom_metafield([
								'type' => 'checkbox',
								'name' => 'display_top_sm',
								'title' => __('Display Top Header Social Media', 'sigma-core'),
								'description' => __('Please choose if you want to display the top header social media links or not', 'sigma-core'),
								'value' => $sigma_layout_display_top_sm,
								'options' => sigmacore_get_redux_select_options('display_top_sm'),
								'required' => array(
									'name' => 'display_top_header',
									'value' => 'true'
								)
						]);
						sigmacore_custom_metafield([
									'type' => 'text',
									'name' => 'header_button_title',
									'title' => __('Button Title', 'sigma-core'),
									'description' => __('Enter Button Title', 'sigma-core'),
									'value' => $sigma_layout_header_button_title,
									'required' => array(
										'name' => 'display_top_header',
										'value' => 'true'
									)
							]);
						sigmacore_custom_metafield([
									'type' => 'text',
									'name' => 'header_button_liink',
									'title' => __('Button Link', 'sigma-core'),
									'description' => __('Header Button Link', 'sigma-core'),
									'value' => $sigma_layout_header_button_liink,
									'required' => array(
										'name' => 'display_top_header',
										'value' => 'true'
									)
							]);
							sigmacore_custom_metafield([
								'type' => 'color',
								'name' => 'header_top_bg',
								'title' => __('Header top background color', 'sigma-core'),
								'description' => __('Set background color for the top header', 'sigma-core'),
								'value' => $sigma_layout_header_top_bg,
								'options' => sigmacore_get_redux_select_options('header_top_bg'),
								'required' => array(
									'name' => 'display_top_header',
									'value' => 'true'
								)
							]);
							sigmacore_custom_metafield([
								'type' => 'color',
								'name' => 'header_top_color',
								'title' => __('Header top color', 'sigma-core'),
								'description' => __('Set color for the top header.', 'sigma-core'),
								'value' => $sigma_layout_header_top_color,
								'options' => sigmacore_get_redux_select_options('header_top_color'),
								'required' => array(
									'name' => 'display_top_header',
									'value' => 'true'
								)
							]);
							sigmacore_custom_metafield([
								'type' => 'color',
								'name' => 'header_top_color_hover',
								'title' => __('Header top color on hover', 'sigma-core'),
								'description' => __('Set color on hover for the top header.', 'sigma-core'),
								'value' => $sigma_layout_header_top_color,
								'options' => sigmacore_get_redux_select_options('header_top_color'),
								'required' => array(
									'name' => 'display_top_header',
									'value' => 'true'
								)
							]);
						?>
					</div>

					<div class="sigma_tab-item" id="sigma-tab-logo-options">
	            <?php
	            sigmacore_custom_metafield([
	                'type' => 'image',
	                'name' => 'site-logo',
	                'title' => __('Site Logo', 'sigma-core'),
	                'description' => __('Select a custom logo for the header', 'sigma-core'),
	                'value' => $sigma_layout_header_logo,
	            ]);
	            sigmacore_custom_metafield([
	                'type' => 'image',
	                'name' => 'sticky-logo',
	                'title' => __('Sticky Logo', 'sigma-core'),
	                'description' => __('Will display a secondary logo when header is sticky and scrolling the page. ONLY available if you have Sticky Header enabled in Header settings.', 'sigma-core'),
	                'value' => $sigma_layout_header_sticky_logo,
	            ]);
	            ?>
	        </div>

	        <div class="sigma_tab-item" id="sigma-tab-footer-options">
	            <?php
	              sigmacore_custom_metafield([
	                  'type' => 'select',
	                  'name' => 'footer-layout',
	                  'title' => __('Select Footer Layout', 'sigma-core'),
	                  'description' => __('Please select the footer style to display', 'sigma-core'),
	                  'value' => $sigma_layout_footer_layout,
	                  'options' => sigmacore_get_redux_select_options('footer-layout'),
	              ]);
	              sigmacore_custom_metafield([
	                  'type' => 'select',
	                  'name' => 'footer-skin',
	                  'title' => __('Select Footer Color Scheme', 'sigma-core'),
	                  'description' => __('Please select the footer color scheme to display.', 'sigma-core'),
	                  'value' => $sigma_layout_footer_skin,
	                  'options' => sigmacore_get_redux_select_options('footer-skin'),
	              ]);
								sigmacore_custom_metafield([
										'type' => 'checkbox',
										'name' => 'display-footer-topbar',
										'title' => __('Display Top Topbar', 'sigma-core'),
										'value' => $sigma_layout_display_footer_topbar,
										'options' => sigmacore_get_redux_select_options('display-footer-topbar'),
										'required' => array(
											'name' => 'footer-layout',
											'value' => array('layout-1', 'layout-2')
										)
								]);
								sigmacore_custom_metafield([
		                'type' => 'image',
		                'name' => 'footer-logo',
		                'title' => __('Footer Logo', 'sigma-core'),
		                'description' => __('Select a custom logo for the footer', 'sigma-core'),
		                'value' => $sigma_layout_footer_logo,
		            ]);
								sigmacore_custom_metafield([
									'type' => 'checkbox',
									'name' => 'display-footer-social-links',
									'title' => __('Display Footer Social Links', 'sigma-core'),
									'description' => __('Enable to display the social links in footer topbar.', 'sigma-core'),
									'value' => $sigma_layout_display_footer_social_links,
									'options' => sigmacore_get_redux_select_options('display-footer-social-links'),
									'required' => array(
										'name' => 'display-footer-topbar',
										'value' => 'true'
									)
								]);
								sigmacore_custom_metafield([
	                  'type' => 'select',
	                  'name' => 'footer_layout',
	                  'title' => __('Select Footer Columns', 'sigma-core'),
	                  'description' => __('Please select the footer Columns.', 'sigma-core'),
	                  'value' => $sigma_layout_footer_column,
	                  'options' => sigmacore_get_redux_select_options('footer_layout'),
	              ]);
								sigmacore_custom_metafield([
		                'type' => 'color',
		                'name' => 'footer_top_bg',
		                'title' => __('Footer top background color (This overlaps the Footer Background option)', 'sigma-core'),
		                'description' => __('Set background color for the footer top.', 'sigma-core'),
		                'value' => $sigma_layout_footer_top_bg,
		                'options' => sigmacore_get_redux_select_options('footer_top_bg')
		            ]);
								sigmacore_custom_metafield([
		                'type' => 'color',
		                'name' => 'footer_middle_bg',
		                'title' => __('Footer middle background color (This overlaps the Footer Background option)', 'sigma-core'),
		                'description' => __('Set background color for the footer middle.', 'sigma-core'),
		                'value' => $sigma_layout_footer_middle_bg,
		                'options' => sigmacore_get_redux_select_options('footer_middle_bg')
		            ]);
								sigmacore_custom_metafield([
		                'type' => 'color',
		                'name' => 'footer_bottom_bg',
		                'title' => __('Footer bottom background color (This overlaps the Footer Background option)', 'sigma-core'),
		                'description' => __('Set background color for the footer bottom.', 'sigma-core'),
		                'value' => $sigma_layout_footer_bottom_bg,
		                'options' => sigmacore_get_redux_select_options('footer_bottom_bg')
		            ]);
								sigmacore_custom_metafield([
									'type' => 'checkbox',
									'name' => 'display-footer-logo',
									'title' => __('Display Footer Logo', 'sigma-core'),
									'value' => $sigma_layout_display_footer_logo,
									'options' => sigmacore_get_redux_select_options('display-footer-logo'),
									'required' => array(
										'name' => 'footer-layout',
										'value' => 'layout-3'
									)
								]);
								sigmacore_custom_metafield([
		                'type' => 'image',
		                'name' => 'footer-bottom-logo',
		                'title' => __('Footer Bottom Logo', 'sigma-core'),
		                'description' => __('Select a custom logo for the bottom footer', 'sigma-core'),
		                'value' => $sigma_layout_footer_bottom_logo,
										'required' => array(
											'name' => 'display-footer-logo',
											'value' => 'true'
										)
		            ]);
								sigmacore_custom_metafield([
									'type' => 'checkbox',
									'name' => 'display-footer-bottom-social-links',
									'title' => __('Display Footer Bottom Social Links', 'sigma-core'),
									'value' => $sigma_layout_display_footer_bottom_social_links,
									'options' => sigmacore_get_redux_select_options('display-footer-bottom-social-links'),
									'required' => array(
										'name' => 'footer-layout',
										'value' => 'layout-3'
									)
								]);
	            ?>
	        </div>

	        <div class="sigma_tab-item" id="sigma-tab-color-options">
	          <?php
	            sigmacore_custom_metafield([
	                'type' => 'color',
	                'name' => 'primary_color',
	                'title' => __('Primary Color', 'sigma-core'),
	                'description' => __('Set primary color for the website.', 'sigma-core'),
	                'value' => $sigma_layout_primary_color,
	                'options' => sigmacore_get_redux_select_options('primary_color')
	            ]);
	            sigmacore_custom_metafield([
	                'type' => 'color',
	                'name' => 'secondary_color',
	                'title' => __('Secondary Color', 'sigma-core'),
	                'description' => __('Set secondary color for the website.', 'sigma-core'),
	                'value' => $sigma_layout_secondary_color,
	                'options' => sigmacore_get_redux_select_options('secondary_color')
	            ]);
	            sigmacore_custom_metafield([
	                'type' => 'color',
	                'name' => 'tertiary_color',
	                'title' => __('Tertiary Color', 'sigma-core'),
	                'description' => __('Set tertiary color for the website.', 'sigma-core'),
	                'value' => $sigma_layout_tertiary_color,
	                'options' => sigmacore_get_redux_select_options('tertiary_color')
	            ]);
	          ?>
	        </div>
				</div>

    <?php

}

/**
 * Save layouts fields content.
 *
 * @param int $post_id Post ID.
 */
function sigmacore_layout_settings_save_meta_box($post_id)
{

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!current_user_can('edit_posts')) {
        return;
    }
    if (!isset($_POST['sigma-layout-meta-nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['sigma-layout-meta-nonce'])), basename(__FILE__))) {
        return;
    }

    $layout_settings = array();
		$layout_settings['header-layout'] = isset($_POST['header-layout']) ? sanitize_text_field(wp_unslash($_POST['header-layout'])) : '';
		$layout_settings['display_cta'] = isset($_POST['display_cta']) ? sanitize_text_field(wp_unslash($_POST['display_cta'])) : '';
		$layout_settings['header_cta_title'] = isset($_POST['header_cta_title']) ? sanitize_text_field(wp_unslash($_POST['header_cta_title'])) : '';
		$layout_settings['header_cta_link'] = isset($_POST['header_cta_link']) ? sanitize_text_field(wp_unslash($_POST['header_cta_link'])) : '';
		$layout_settings['display_info_cta'] = isset($_POST['display_info_cta']) ? sanitize_text_field(wp_unslash($_POST['display_info_cta'])) : '';
		$layout_settings['header_cta_info_title'] = isset($_POST['header_cta_info_title']) ? sanitize_text_field(wp_unslash($_POST['header_cta_info_title'])) : '';
		$layout_settings['header_cta_info_subtitle'] = isset($_POST['header_cta_info_subtitle']) ? sanitize_text_field(wp_unslash($_POST['header_cta_info_subtitle'])) : '';
		$layout_settings['header_cta_info_icon_class'] = isset($_POST['header_cta_info_icon_class']) ? sanitize_text_field(wp_unslash($_POST['header_cta_info_icon_class'])) : '';
		$layout_settings['header_cta_info_link'] = isset($_POST['header_cta_info_link']) ? sanitize_text_field(wp_unslash($_POST['header_cta_info_link'])) : '';
		$layout_settings['header-scheme'] = isset($_POST['header-scheme']) ? sanitize_text_field(wp_unslash($_POST['header-scheme'])) : '';
		$layout_settings['header-position'] = isset($_POST['header-position']) ? sanitize_text_field(wp_unslash($_POST['header-position'])) : '';
		$layout_settings['sticky-header-enable'] = isset($_POST['sticky-header-enable']) ? sanitize_text_field(wp_unslash($_POST['sticky-header-enable'])) : '';
		$layout_settings['header-sticky-scheme'] = isset($_POST['header-sticky-scheme']) ? sanitize_text_field(wp_unslash($_POST['header-sticky-scheme'])) : '';
		$layout_settings['header_sticky_bg'] = isset($_POST['header_sticky_bg']) ? sanitize_text_field(wp_unslash($_POST['header_sticky_bg'])) : '';
		$layout_settings['header_sticky_color'] = isset($_POST['header_sticky_color']) ? sanitize_text_field(wp_unslash($_POST['header_sticky_color'])) : '';
		$layout_settings['header_sticky_color_hover'] = isset($_POST['header_sticky_color_hover']) ? sanitize_text_field(wp_unslash($_POST['header_sticky_color_hover'])) : '';
		$layout_settings['display-search-icon'] = isset($_POST['display-search-icon']) ? sanitize_text_field(wp_unslash($_POST['display-search-icon'])) : '';
		$layout_settings['display-user-icon'] = isset($_POST['display-user-icon']) ? sanitize_text_field(wp_unslash($_POST['display-user-icon'])) : '';
		$layout_settings['display-collapse-sidebar-icon'] = isset($_POST['display-collapse-sidebar-icon']) ? sanitize_text_field(wp_unslash($_POST['display-collapse-sidebar-icon'])) : '';
		$layout_settings['display-header-top-menu'] = isset($_POST['display-header-top-menu']) ? sanitize_text_field(wp_unslash($_POST['display-header-top-menu'])) : '';
		$layout_settings['display-livestream-status'] = isset($_POST['display-livestream-status']) ? sanitize_text_field(wp_unslash($_POST['display-livestream-status'])) : '';
		$layout_settings['display-header-cart'] = isset($_POST['display-header-cart']) ? sanitize_text_field(wp_unslash($_POST['display-header-cart'])) : '';
		$layout_settings['display-header-wishlist'] = isset($_POST['display-header-wishlist']) ? sanitize_text_field(wp_unslash($_POST['display-header-wishlist'])) : '';
		$layout_settings['display-header-prayer-icon'] = isset($_POST['display-header-prayer-icon']) ? sanitize_text_field(wp_unslash($_POST['display-header-prayer-icon'])) : '';
		$layout_settings['header_bottom_bg'] = isset($_POST['header_bottom_bg']) ? sanitize_text_field(wp_unslash($_POST['header_bottom_bg'])) : '';
		$layout_settings['header_contact_info_phone'] = isset($_POST['header_contact_info_phone']) ? sanitize_text_field(wp_unslash($_POST['header_contact_info_phone'])) : '';
		$layout_settings['header_contact_info_email'] = isset($_POST['header_contact_info_email']) ? sanitize_text_field(wp_unslash($_POST['header_contact_info_email'])) : '';
		$layout_settings['header_contact_info_address'] = isset($_POST['header_contact_info_address']) ? sanitize_text_field(wp_unslash($_POST['header_contact_info_address'])) : '';
		$layout_settings['header_bottom_color'] = isset($_POST['header_bottom_color']) ? sanitize_text_field(wp_unslash($_POST['header_bottom_color'])) : '';
		$layout_settings['header_bottom_color_hover'] = isset($_POST['header_bottom_color_hover']) ? sanitize_text_field(wp_unslash($_POST['header_bottom_color_hover'])) : '';
		$layout_settings['header_submenu_bg'] = isset($_POST['header_submenu_bg']) ? sanitize_text_field(wp_unslash($_POST['header_submenu_bg'])) : '';
		$layout_settings['header_submenu_color'] = isset($_POST['header_submenu_color']) ? sanitize_text_field(wp_unslash($_POST['header_submenu_color'])) : '';
		$layout_settings['header_submenu_color_hover'] = isset($_POST['header_submenu_color_hover']) ? sanitize_text_field(wp_unslash($_POST['header_submenu_color_hover'])) : '';
		$layout_settings['header_contact_bg'] = isset($_POST['header_contact_bg']) ? sanitize_text_field(wp_unslash($_POST['header_contact_bg'])) : '';
		$layout_settings['header_contact_bg_color'] = isset($_POST['header_contact_bg_color']) ? sanitize_text_field(wp_unslash($_POST['header_contact_bg_color'])) : '';

		$layout_settings['display_top_header'] = isset($_POST['display_top_header']) ? sanitize_text_field(wp_unslash($_POST['display_top_header'])) : '';
		$layout_settings['display_top_sm'] = isset($_POST['display_top_sm']) ? sanitize_text_field(wp_unslash($_POST['display_top_sm'])) : '';
		$layout_settings['header_button_title'] = isset($_POST['header_button_title']) ? sanitize_text_field(wp_unslash($_POST['header_button_title'])) : '';
		$layout_settings['header_button_liink'] = isset($_POST['header_button_liink']) ? sanitize_text_field(wp_unslash($_POST['header_button_liink'])) : '';
		$layout_settings['header_top_bg'] = isset($_POST['header_top_bg']) ? sanitize_text_field(wp_unslash($_POST['header_top_bg'])) : '';
		$layout_settings['header_top_color'] = isset($_POST['header_top_color']) ? sanitize_text_field(wp_unslash($_POST['header_top_color'])) : '';
		$layout_settings['header_top_color_hover'] = isset($_POST['header_top_color_hover']) ? sanitize_text_field(wp_unslash($_POST['header_top_color_hover'])) : '';

		$layout_settings['site-logo'] = isset($_POST['site-logo']) ? sanitize_text_field(wp_unslash($_POST['site-logo'])) : '';
		$layout_settings['sticky-logo'] = isset($_POST['sticky-logo']) ? sanitize_text_field(wp_unslash($_POST['sticky-logo'])) : '';

		$layout_settings['page_title_alignment'] = isset($_POST['page_title_alignment']) ? sanitize_text_field(wp_unslash($_POST['page_title_alignment'])) : '';

		$layout_settings['footer-layout'] = isset($_POST['footer-layout']) ? sanitize_text_field(wp_unslash($_POST['footer-layout'])) : '';
		$layout_settings['footer-skin'] = isset($_POST['footer-skin']) ? sanitize_text_field(wp_unslash($_POST['footer-skin'])) : '';
		$layout_settings['display-footer-topbar'] = isset($_POST['display-footer-topbar']) ? sanitize_text_field(wp_unslash($_POST['display-footer-topbar'])) : '';
		$layout_settings['footer-logo'] = isset($_POST['footer-logo']) ? sanitize_text_field(wp_unslash($_POST['footer-logo'])) : '';
		$layout_settings['display-footer-social-links'] = isset($_POST['display-footer-social-links']) ? sanitize_text_field(wp_unslash($_POST['display-footer-social-links'])) : '';
		$layout_settings['footer_layout'] = isset($_POST['footer_layout']) ? sanitize_text_field(wp_unslash($_POST['footer_layout'])) : '';
		$layout_settings['footer_top_bg'] = isset($_POST['footer_top_bg']) ? sanitize_text_field(wp_unslash($_POST['footer_top_bg'])) : '';
		$layout_settings['footer_middle_bg'] = isset($_POST['footer_middle_bg']) ? sanitize_text_field(wp_unslash($_POST['footer_middle_bg'])) : '';
		$layout_settings['footer_bottom_bg'] = isset($_POST['footer_bottom_bg']) ? sanitize_text_field(wp_unslash($_POST['footer_bottom_bg'])) : '';
		$layout_settings['display-footer-logo'] = isset($_POST['display-footer-logo']) ? sanitize_text_field(wp_unslash($_POST['display-footer-logo'])) : '';
		$layout_settings['footer-bottom-logo'] = isset($_POST['footer-bottom-logo']) ? sanitize_text_field(wp_unslash($_POST['footer-bottom-logo'])) : '';
		$layout_settings['display-footer-bottom-social-links'] = isset($_POST['display-footer-bottom-social-links']) ? sanitize_text_field(wp_unslash($_POST['display-footer-bottom-social-links'])) : '';

		$layout_settings['primary_color'] = isset($_POST['primary_color']) ? sanitize_text_field(wp_unslash($_POST['primary_color'])) : '';
		$layout_settings['secondary_color'] = isset($_POST['secondary_color']) ? sanitize_text_field(wp_unslash($_POST['secondary_color'])) : '';
		$layout_settings['tertiary_color'] = isset($_POST['tertiary_color']) ? sanitize_text_field(wp_unslash($_POST['tertiary_color'])) : '';

    update_post_meta($post_id, 'sigma_layout_settings', $layout_settings);

}

add_action('save_post', 'sigmacore_layout_settings_save_meta_box');
