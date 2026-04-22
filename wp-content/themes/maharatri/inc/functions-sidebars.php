<?php
/**
 * Maharatri Sidebars
 *
 * @package Maharatri
 */
if (!defined('ABSPATH')) {
    exit;
}
/**
 * Register widget area.
 *
 * @since 1.0.0
 */
function maharatri_widgets_init()
{
    register_sidebar(
        array(
            'name' => esc_html__('Blog Sidebar', 'maharatri'),
            'id' => 'sidebar-1',
            'description' => esc_html__('Blog Sidebar.', 'maharatri'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        )
    );
    // Footer sidebars.
    register_sidebar(
        array(
            'name' => esc_html__('Footer column 1', 'maharatri'),
            'id' => 'footer-column-1',
            'description' => esc_html__('Add widgets here.', 'maharatri'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h6 class="widget-title">',
            'after_title' => '</h6>',
        )
    );
    register_sidebar(
        array(
            'name' => esc_html__('Footer column 2', 'maharatri'),
            'id' => 'footer-column-2',
            'description' => esc_html__('Add widgets here.', 'maharatri'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h6 class="widget-title">',
            'after_title' => '</h6>',
        )
    );
    register_sidebar(
        array(
            'name' => esc_html__('Footer column 3', 'maharatri'),
            'id' => 'footer-column-3',
            'description' => esc_html__('Add widgets here.', 'maharatri'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h6 class="widget-title">',
            'after_title' => '</h6>',
        )
    );
    register_sidebar(
        array(
            'name' => esc_html__('Footer column 4', 'maharatri'),
            'id' => 'footer-column-4',
            'description' => esc_html__('Add widgets here.', 'maharatri'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h6 class="widget-title">',
            'after_title' => '</h6>',
        )
    );
    register_sidebar(
        array(
            'name' => esc_html__('Page Sidebar', 'maharatri'),
            'id' => 'page-sidebar',
            'description' => esc_html__('Add widgets here.', 'maharatri'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        )
    );
    register_sidebar(
        array(
            'name' => esc_html__('Stories Sidebar', 'maharatri'),
            'id' => 'stories-sidebar',
            'description' => esc_html__('Add widgets here.', 'maharatri'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        )
    );
    register_sidebar(
        array(
            'name' => esc_html__('Service Sidebar', 'maharatri'),
            'id' => 'service-sidebar',
            'description' => esc_html__('Add widgets here.', 'maharatri'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        )
    );
    register_sidebar(
        array(
            'name' => esc_html__('Ministries Sidebar', 'maharatri'),
            'id' => 'ministries-sidebar',
            'description' => esc_html__('Add widgets here.', 'maharatri'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        )
    );
    register_sidebar(
        array(
            'name' => esc_html__('Sermons Sidebar', 'maharatri'),
            'id' => 'sermons-sidebar',
            'description' => esc_html__('Add widgets here.', 'maharatri'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        )
    );
    register_sidebar(
        array(
            'name' => esc_html__('Header Collapse Sidebar', 'maharatri'),
            'id' => 'header-collapse-sidebar',
            'description' => esc_html__('Add widgets here.', 'maharatri'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        )
    );
    register_sidebar(
        array(
            'name' => esc_html__('Events Sidebar', 'maharatri'),
            'id' => 'events-sidebar',
            'description' => esc_html__('Add widgets here.', 'maharatri'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        )
    );
    register_sidebar(
        array(
            'name' => esc_html__('Events Details Sidebar', 'maharatri'),
            'id' => 'events-details-sidebar',
            'description' => esc_html__('Add widgets here.', 'maharatri'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        )
    );
    register_sidebar(
        array(
            'name' => esc_html__('Prayer Sidebar', 'maharatri'),
            'id' => 'prayer-sidebar',
            'description' => esc_html__('Add widgets here.', 'maharatri'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        )
    );
    register_sidebar(
        array(
            'name' => esc_html__('Community Sidebar', 'maharatri'),
            'id' => 'community-sidebar',
            'description' => esc_html__('Add widgets here.', 'maharatri'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        )
    );
    register_sidebar(
        array(
            'name' => esc_html__('Buddhism Sidebar', 'maharatri'),
            'id' => 'buddhism-sidebar',
            'description' => esc_html__('Add widgets here.', 'maharatri'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        )
    );
    register_sidebar(
        array(
            'name' => esc_html__('Philosophy Sidebar', 'maharatri'),
            'id' => 'philosophy-sidebar',
            'description' => esc_html__('Add widgets here.', 'maharatri'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        )
    );
    register_sidebar(
        array(
            'name' => esc_html__('Philosophy Details Sidebar', 'maharatri'),
            'id' => 'philosophy-details-sidebar',
            'description' => esc_html__('Add widgets here.', 'maharatri'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        )
    );
    register_sidebar(
        array(
            'name' => esc_html__('Puja Sidebar', 'maharatri'),
            'id' => 'puja-sidebar',
            'description' => esc_html__('Add widgets here.', 'maharatri'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        )
    );
    register_sidebar(
        array(
            'name' => esc_html__('Holis Sidebar', 'maharatri'),
            'id' => 'holis-sidebar',
            'description' => esc_html__('Add widgets here.', 'maharatri'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        )
    );
}

add_action('widgets_init', 'maharatri_widgets_init');
/**
 * Functiion that generates the template class
 *
 * @since 1.0.0
 */
function maharatri_grid_column_classes()
{
    $sidebar_position = 'right-sidebar';
    $current_sidebar = maharatri_get_current_sidebar();
    $sidebar_position = maharatri_sidebar_position();
    if (is_active_sidebar($current_sidebar)) {
        if ('left-sidebar' === $sidebar_position) {
            $grid_classes = 'col-lg-8 order-lg-2';
        } elseif ('right-sidebar' === $sidebar_position) {
            $grid_classes = 'col-lg-8';
        } else {
            $grid_classes = 'col-12';
        }
    } else {
        $grid_classes = 'col-12';
    }
    return apply_filters('maharatri/sidebar/grid_classes', $grid_classes);
}

/**
 * Get the current sidebar.
 *
 * @since 1.0.0
 */
function maharatri_get_current_sidebar()
{
    $sidebar_position = maharatri_sidebar_position();
    if ('full-width' === $sidebar_position) {
        return false;
    }
    if (is_page()) {
        $current_sidebar = 'page-sidebar';
    } elseif (is_search()) {
        $current_sidebar = 'sidebar-1';
    } elseif (is_singular('stories') || is_post_type_archive('stories')) {
        $current_sidebar = 'stories-sidebar';
    } elseif (is_singular('service') || is_post_type_archive('service')) {
        $current_sidebar = 'service-sidebar';
    } elseif (is_singular('ministries') || is_post_type_archive('ministries')) {
        $current_sidebar = 'ministries-sidebar';
    }  elseif (is_singular('sermons') || is_post_type_archive('sermons')) {
        $current_sidebar = 'sermons-sidebar';
    } elseif (is_singular('prayer') || is_post_type_archive('prayer')) {
        $current_sidebar = 'prayer-sidebar';
    } elseif (is_post_type_archive('events')) {
        $current_sidebar = 'events-sidebar';
    } elseif (is_singular('events')) {
        $current_sidebar = 'events-details-sidebar';
    } elseif (is_singular('community') || is_post_type_archive('community')) {
        $current_sidebar = 'community-sidebar';
    }  elseif (is_singular('buddhism') || is_post_type_archive('buddhism')) {
        $current_sidebar = 'buddhism-sidebar';
    } elseif (is_post_type_archive('philosophy')) {
        $current_sidebar = 'philosophy-sidebar';
    } elseif (is_singular('philosophy')) {
        $current_sidebar = 'philosophy-details-sidebar';
    } elseif (is_singular('puja') || is_post_type_archive('puja')) {
        $current_sidebar = 'puja-sidebar';
    } elseif (is_singular('holis') || is_post_type_archive('holis')) {
        $current_sidebar = 'holis-sidebar';
    } elseif ( is_singular( 'give_forms' ) || is_post_type_archive('give_forms') ) {
      $current_sidebar = 'give-forms-sidebar';
    } elseif (is_home() || is_archive() || is_singular('post')) {
        $current_sidebar = 'sidebar-1';
    } else {
        $current_sidebar = 'sidebar-1';
    }
    return apply_filters('maharatri/sidebar/current_sidebar', $current_sidebar);
}

/**
 * Get the current sidebar position.
 *
 * @since 1.0.0
 */
function maharatri_sidebar_position()
{
    // Current page ID
    $current_id = maharatri_get_page_id();
    // Possible sidebar positions
    $avaiable_sidebar_positions = array('full-width', 'left-sidebar', 'right-sidebar');
    // Page meta
    $page_settings = $current_id ? get_post_meta($current_id, 'sigma_page_settings', true) : '';
    $sidebar_custom_position = isset($page_settings['sigma_page_sidebar_position']) ? $page_settings['sigma_page_sidebar_position'] : '';
    // Default sidebar position value
    $sidebar_position = 'right-sidebar';
    if (in_array($sidebar_custom_position, $avaiable_sidebar_positions)) {
        $sidebar_position = $sidebar_custom_position;
    } else {
        if (is_page()) {
            $sidebar_position = maharatri_get_option('page_sidebar', $sidebar_position);
        } elseif (is_search()) {
            $sidebar_position = 'right-sidebar';
        } elseif (is_singular('service') || is_post_type_archive('service')) {
            $sidebar_position = maharatri_get_option('service_sidebar', $sidebar_position);
        } elseif (is_singular('ministries') || is_post_type_archive('ministries')) {
            $sidebar_position = maharatri_get_option('ministries_sidebar', $sidebar_position);
        } elseif (is_singular('stories') || is_post_type_archive('stories')) {
            $sidebar_position = maharatri_get_option('stories_sidebar', $sidebar_position);
        } elseif (is_singular('sermons') || is_post_type_archive('sermons')) {
            $sidebar_position = maharatri_get_option('sermons_sidebar', $sidebar_position);
        } elseif (is_post_type_archive('events')) {
            $sidebar_position = maharatri_get_option('events_sidebar', $sidebar_position);
        } elseif (is_singular('events')) {
            $sidebar_position = maharatri_get_option('events_details_sidebar', $sidebar_position);
        } elseif (is_singular('prayer') || is_post_type_archive('prayer')) {
            $sidebar_position = maharatri_get_option('prayer_sidebar', $sidebar_position);
        } elseif (is_singular('community') || is_post_type_archive('community')) {
            $sidebar_position = maharatri_get_option('community_sidebar', $sidebar_position);
        } elseif (is_singular('buddhism') || is_post_type_archive('buddhism')) {
            $sidebar_position = maharatri_get_option('buddhism_sidebar', $sidebar_position);
        } elseif (is_post_type_archive('philosophy')) {
            $sidebar_position = maharatri_get_option('philosophy_sidebar', $sidebar_position);
        } elseif (is_singular('philosophy')) {
            $sidebar_position = maharatri_get_option('philosophy_details_sidebar', $sidebar_position);
        } elseif (is_singular('holis') || is_post_type_archive('holis')) {
            $sidebar_position = maharatri_get_option('holis_sidebar', $sidebar_position);
        } elseif (is_singular('puja') || is_post_type_archive('puja')) {
            $sidebar_position = maharatri_get_option('puja_sidebar', $sidebar_position);
        } elseif ( is_singular( 'give_forms' )  || is_post_type_archive('give_forms')  ) {
          $sidebar_position = maharatri_get_option('donation_sidebar', $sidebar_position);
        } elseif (is_home() || is_archive() || is_singular('post')) {
            $sidebar_position = maharatri_get_option('blog_sidebar', $sidebar_position);
        }
    }
    return apply_filters('maharatri/sidebar/sidebar_position', $sidebar_position);
}
