<?php
/**
 * Sigma Single Event shortcode
 *
 * @package Sigma Core
 */

/**
 * Single Event shortcode.
 */
class Sigma_Vc_Single_Event_Shortcode_Fields
{

    /**
     * Shortcode title.
     *
     * @since 1.0.0
     * @var   string
     */
    protected $title;

    /**
     * Shortcode handle.
     *
     * @since 1.0.0
     * @var   string
     */
    protected $handle;

    /**
     * Shortcode description.
     *
     * @since 1.0.0
     * @var   string
     */
    protected $description;

    /**
     * Shortcode category.
     *
     * @since 1.0.0
     * @var   string
     */
    protected $category;

    /**
     * Shortcode wrraper class.
     *
     * @since 1.0.0
     * @var   string
     */
    protected $wrraper_class;

    /**
     * Shortcode map and callback
     */
    function __construct()
    {

        $this->title = esc_html__('Single Event', 'sigma-core');
        $this->handle = 'sigma_single_event';
        $this->description = esc_html__('Use this shortcode to show single event.', 'sigma-core');
        $this->category = esc_html__('Sigma', 'sigma-core');
        $this->wrraper_class = 'sigma-shortcode-wrapper';

        add_action('vc_before_init', array($this, 'shortcode_fields'));
        add_shortcode($this->handle, array($this, 'shortcode_callback'));
    }

    /**
     * Single Event shortcode mapping.
     *
     * @return void
     */
    function shortcode_fields()
    {

        $fields = array(
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Event Style', 'sigma-core'),
                'param_name' => 'style',
                'description' => esc_html__('Select style.', 'sigma-core'),
                'value' => array(
                    esc_html__('Style 1', 'sigma-core') => 'style-1',
                    esc_html__('Style 2', 'sigma-core') => 'style-2',
                ),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Select Event', 'sigma-core'),
                'param_name' => 'select_post',
                'value' => sigmacore_get_posts_select('events'),
            ),
            array(
                'type'             => 'checkbox',
                'heading'          => esc_html__( 'Show Event Thumbnail?', 'sigma-core' ),
                'param_name'       => 'show_post_thumbnail',
                'value'            => array( esc_html__( 'Yes', 'sigma-core' ) => 'true' ),
                'description'      => esc_html__( 'Select this checkbox to show event thumbnail.', 'sigma-core' ),
                'edit_field_class' => 'vc_col-sm-6 vc_column',
            ),
            array(
                'type'             => 'checkbox',
                'heading'          => esc_html__( 'Show Event Date?', 'sigma-core' ),
                'param_name'       => 'show_events_date',
                'value'            => array( esc_html__( 'Yes', 'sigma-core' ) => 'true' ),
                'description'      => esc_html__( 'Select this checkbox to show event date.', 'sigma-core' ),
                'edit_field_class' => 'vc_col-sm-6 vc_column',
            ),
            array(
                'type'             => 'checkbox',
                'heading'          => esc_html__( 'Show Event Time?', 'sigma-core' ),
                'param_name'       => 'show_events_time',
                'value'            => array( esc_html__( 'Yes', 'sigma-core' ) => 'true' ),
                'description'      => esc_html__( 'Select this checkbox to show event time.', 'sigma-core' ),
                'edit_field_class' => 'vc_col-sm-6 vc_column',
            ),
            array(
                'type'             => 'checkbox',
                'heading'          => esc_html__( 'Show Event Location?', 'sigma-core' ),
                'param_name'       => 'show_events_location',
                'value'            => array( esc_html__( 'Yes', 'sigma-core' ) => 'true' ),
                'description'      => esc_html__( 'Select this checkbox to show event location.', 'sigma-core' ),
                'edit_field_class' => 'vc_col-sm-6 vc_column',
            ),
            array(
                'type'             => 'checkbox',
                'heading'          => esc_html__( 'Show Excerpt?', 'sigma-core' ),
                'param_name'       => 'post_excerpt',
                'value'            => array( esc_html__( 'Yes', 'sigma-core' ) => 'true' ),
                'description'      => esc_html__( 'Select this checkbox to show post excerpt.', 'sigma-core' ),
                'edit_field_class' => 'vc_col-sm-6 vc_column',
                'dependency' => array(
                    'element' => 'style',
                    'value' => 'style-1',
                ),
            ),
            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Post Excerpt Length', 'sigma-core' ),
                'param_name'  => 'post_excerpt_length',
                'description' => esc_html__( 'Enter number of words to show in excerpt.', 'sigma-core' ),
                'edit_field_class' => 'vc_col-sm-6 vc_column',
                'dependency' => array(
                    'element' => 'post_excerpt',
                    'value'   => 'true',
                ),
            ),
            vc_map_add_css_animation(),
            array(
                'type' => 'el_id',
                'heading' => esc_html__('Element ID', 'sigma-core'),
                'param_name' => 'el_id',
                /* translators: 1: anchor tag start, 2: anchor tag end */
                'description' => sprintf(esc_html__('Enter element ID (Note: make sure it is unique and valid according to %1$sw3c specification%2$s).', 'sigma-core'), '<a href="https://www.w3schools.com/tags/att_global_id.asp" target="_blank">', '</a>'),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Extra class name', 'sigma-core'),
                'param_name' => 'el_class',
                'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.', 'sigma-core'),
            ),
            array(
                'type' => 'css_editor',
                'heading' => esc_html__('CSS box', 'sigma-core'),
                'param_name' => 'css',
                'group' => esc_html__('Design Options', 'sigma-core'),
            ),
        );

        // Shortcode Params
        $params = array(
            'name' => $this->title,
            'base' => $this->handle,
            'category' => $this->category,
            'description' => $this->description,
            'class' => $this->wrraper_class,
            'params' => $fields,
        );

        vc_map($params);
    }

    /**
     * Single Event shortcode callback functions.
     */
    function shortcode_callback($atts, $content = null, $handle = '')
    {

        $default_atts = array(
            'style' => 'style-1',
            'select_post' => '',
            'show_post_thumbnail' => '',
            'show_events_date' => '',
            'show_events_time' => '',
            'show_events_location' => '',
            'post_excerpt' => '',
            'post_excerpt_length' => '',
            'css_animation' => '',
            'el_id' => '',
            'el_class' => '',
            'css' => '',
            'handle' => $handle,
        );

        $atts = shortcode_atts($default_atts, $atts, $handle);

        global $sigma_shortcodes;

        $args = array(
            'post_type' => 'events',
            'post__in' => array($atts['select_post'])
        );
        $the_query = new WP_Query($args);
        if (!$the_query->have_posts()) {
            return;
        }

        $inline_css = '';
        $sigma_shortcodes[$handle]['atts'] = $atts;
        $sigma_shortcodes[$handle]['the_query'] = $the_query;
        $sigma_shortcodes_class_unique = 'sigma-single-event-' . mt_rand();
        $sigma_shortcodes_classes = $this->handle . '_wrapper';
        $sigma_shortcodes_classes .= ' ' . $sigma_shortcodes_class_unique;
        $sigma_shortcodes_classes .= ' ' . $this->wrraper_class;

        if ($atts['el_class']) {
            $sigma_shortcodes_classes .= ' ' . $atts['el_class'];
        }

        $sigma_shortcodes_classes .= ' single-event-' . $atts['style'];
        $sigma_shortcodes_classes .= ' event-' . $atts['style'];
        if ($atts['css_animation'] && 'none' !== $atts['css_animation']) {
            wp_enqueue_script('vc_waypoints');
            wp_enqueue_style('vc_animate-css');

            $sigma_shortcodes_classes .= ' wpb_animate_when_almost_visible wpb_' . $atts['css_animation'] . ' ' . $atts['css_animation'];
        }

        if (isset($atts['css']) && $atts['css']) {
            $sigma_shortcodes_classes .= ' ' . vc_shortcode_custom_css_class($atts['css'], ' ');
        }

        ob_start();
        ?>
        <div <?php echo ($atts['el_id']) ? 'id=' . esc_attr($atts["el_id"]) : ''; ?>
                class="<?php echo esc_attr($sigma_shortcodes_classes); ?>">
            <?php sigmacore_get_vc_shortcode_template('single-event/content'); ?>
        </div>
        <?php
        return ob_get_clean();
    }
}

new Sigma_Vc_Single_Event_Shortcode_Fields();
