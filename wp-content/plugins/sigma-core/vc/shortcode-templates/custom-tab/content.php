<?php
/**
 * Custom tab shortcode template file.
 *
 * @package sigma Core
 */
if (!defined('ABSPATH')) {
    exit;
}
global $sigma_shortcodes, $custom_tab_lists;
$atts = $sigma_shortcodes['sigma_custom_tabs']['atts'];
if (!$atts['custom_tab_list']) {
    return;
}
$custom_tab_lists = vc_param_group_parse_atts($atts['custom_tab_list']);
?>
<div class="sigma-custom-tabs">
    <?php
    if (!empty($custom_tab_lists)) {
        ?>
        <div class="tab-content" id="pills-tabContent">
            <?php
            $x = 0;
            foreach ($custom_tab_lists as $custom_tab_list) {
                if (isset($custom_tab_list['custom_tab_content']) && !empty($custom_tab_list['custom_tab_content'])) {
                    ?>
                    <div class="tab-pane fade <?php if ($x == 0) {
                        echo 'show active';
                    } ?>" id="tab-id-<?php echo esc_attr($x); ?>" role="tabpanel">
                        <p><?php echo $custom_tab_list['custom_tab_content']; ?></p>
                    </div>
                <?php }
                $x++;
            } ?>
        </div>
        <ul class="framework-list nav nav-pills mt-25" id="pills-tab" role="tablist">
            <?php
            $y = 0;
            foreach ($custom_tab_lists as $custom_tab_list) {
                if (isset($custom_tab_list['custom_tab_title']) && !empty($custom_tab_list['custom_tab_title'])) { ?>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($y == 0) {
                            echo 'active';
                        } ?>" id="pills-<?php echo esc_attr($y); ?>-tab" data-toggle="pill"
                           href="#tab-id-<?php echo esc_attr($y); ?>">
                            <?php
                            if (isset($custom_tab_list['add_icon'])) {
                                ?>
                                <span class="icon">
                                    <?php if ($custom_tab_list['icon_as'] === 'image') {
                                        if ($custom_tab_list['icon_image']) {
                                            $image_data = wp_get_attachment_image_src($custom_tab_list['icon_image'], 'thumbnail');
                                            $image_url = (isset($image_data[0]) && $image_data[0]) ? $image_data[0] : '';
                                            if ($image_url) {
                                                ?>
                                                <img src="<?php echo esc_url($image_url); ?>"
                                                     alt="<?php esc_attr_e('Icon', 'sigma-core') ?>">
                                                <?php
                                            }
                                        }
                                    } else {
                                        if ($custom_tab_list['icon_type']) {
                                            $icon_type = 'icon_' . $custom_tab_list['icon_type'];
                                            vc_icon_element_fonts_enqueue($custom_tab_list['icon_type']);
                                            if (isset($custom_tab_list[$icon_type]) && $custom_tab_list[$icon_type]) {
                                                ?>
                                                <i class="<?php echo esc_attr($custom_tab_list[$icon_type]); ?>"></i>
                                                <?php
                                            }
                                        }
                                    } ?>
                                    </span>
                            <?php } ?>
                            <?php echo esc_attr($custom_tab_list['custom_tab_title']); ?>
                        </a>
                    </li>
                <?php }
                $y++;
            } ?>
        </ul>
    <?php } ?>
</div>
