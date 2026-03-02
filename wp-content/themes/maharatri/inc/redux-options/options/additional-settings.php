<?php
/**
 * Addtional Settings
 *
 * @package maharatri
 */
return array(
	'title'  => esc_html( 'Additional Settings', 'maharatri' ),
	'id'     => 'addtional_settings',
	'icon'   => 'el el-cogs',
	'fields' => array(
    array(
        'id' => 'css_editor',
        'type' => 'ace_editor',
        'title' => esc_html__('Custom CSS', 'maharatri') ,
        'subtitle' => esc_html__('Paste your CSS code here.', 'maharatri') ,
        'mode' => 'css',
        'theme' => 'maharatri',
        'desc' => '',
        'default' => "#header{}"
    ),
		array(
        'id' => 'js_editor',
        'type' => 'ace_editor',
        'title' => esc_html__('Custom JS', 'maharatri') ,
        'subtitle' => esc_html__('Paste your JS code here.', 'maharatri') ,
        'mode' => 'javascript',
        'theme' => 'maharatri',
        'desc' => '',
        'default' => "jQuery(document).ready(function(){\n\n});"
    ),
	),
);
