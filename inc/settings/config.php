<?php
require "config_main.php";
add_filter('mb_settings_pages', 'tech_settings_pages');
function tech_settings_pages($settings_pages)
{
    $settings_pages[] = array(
        'id' => 'my-options',
        'menu_title' => 'Cấu hình',
        'option_name' => 'my_options',
        'icon_url' => 'dashicons-admin-generic',
        'tabs' => array(
            'base-setting' => 'Thông tin chung',
            'insert-code-setting' => 'Chèn code',
            'social-setting' => 'Mạng xã hội',
        ),
        'submenu_title' => 'Thông tin chung'
    );
    return $settings_pages;
}