<?php
/**
 * CTA shortcode template file 3.
 *
 * @package sigma Core
 */
if (!defined('ABSPATH')) {
    exit;
}
global $sigma_shortcodes;
$atts = $sigma_shortcodes['sigma_cta']['atts'];
$cta_bg = isset($atts['background']) ? $atts['background'] : 'primary-bg';
$custom_form_shortcode = isset($atts['custom_shortcode']) ? $atts['custom_shortcode'] : '';
?>

<div class="sigma_icon-block icon-block-7 <?php echo esc_attr($cta_bg); ?>">
    <?php if ($atts['add_icon']) {
        if ($atts['icon_type']) {
            $icon_type = 'icon_' . $atts['icon_type'];
            vc_icon_element_fonts_enqueue($atts['icon_type']);
            if (isset($atts[$icon_type]) && $atts[$icon_type]) {
                ?>
                <div class="icon"><i class="<?php echo esc_attr($atts[$icon_type]); ?>"></i></div>
                <?php
            }
        } ?>
        <div class="icon-wrapper">
            <?php if ($atts['icon_type']) {
                $icon_type = 'icon_' . $atts['icon_type'];
                vc_icon_element_fonts_enqueue($atts['icon_type']);
                if (isset($atts[$icon_type]) && $atts[$icon_type]) {
                    ?>
                    <div class="icon"><i class="<?php echo esc_attr($atts[$icon_type]); ?>"></i></div>
                    <?php
                }
            } ?>
        </div>
    <?php } ?>
    <div class="sigma_icon-block-content">
        <h5><?php echo esc_html($atts['title']); ?></h5>
        <p><?php echo esc_html($atts['description']); ?></p>
        <?php if ($custom_form_shortcode) { ?>
            <div class="sigma_search-adv-input">
                <?php echo do_shortcode(html_entity_decode(vc_value_from_safe($custom_form_shortcode, true))); ?>
            </div>
        <?php } ?>
    </div>
</div>
