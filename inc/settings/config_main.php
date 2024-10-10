<?php
add_filter('rwmb_meta_boxes', 'tech5s_options_meta_boxes_config_main');
function tech5s_options_meta_boxes_config_main($meta_boxes)
{
    $meta_boxes[] = array(
        'id' => 'general',
        'title' => 'Cấu hình chung',
        'settings_pages' => 'my-options',
        'tab' => 'base-setting',
        'fields' => array(
            array(
                'name' => 'Favicon',
                'id' => 'favicon',
                'type' => "image_advanced",
                'max_file_uploads' => 1,
                'class' => 'hc-normal',
                'image_size' => ''
            ),
            array(
                'name' => 'Logo',
                'id' => 'logo',
                'type' => "image_advanced",
                'max_file_uploads' => 1,
                'class' => 'hc-normal',
                'image_size' => ''
            ),
            array(
                'name' => 'Logo footer',
                'id' => 'logo_footer',
                'type' => "image_advanced",
                'max_file_uploads' => 1,
                'class' => 'hc-normal',
                'image_size' => ''
            ),
            array(
                'name' => 'Địa chỉ',
                'id' => 'address',
                'type' => 'text',
                'size' => 100
            ),
            array(
                'name' => 'Hotline',
                'id' => 'hotline',
                'type' => 'text',
                'size' => 100
            ),
            array(
                'name' => 'Email',
                'id' => 'email',
                'type' => 'text',
                'size' => 100
            ),
            array(
                'name' => 'Bản đồ',
                'id' => 'insert_script_map',
                'type' => 'textarea',
                'size' => 100,
                'sanitize_callback' => 'none',
            ),
        )
    );
    $meta_boxes[] = array(
        'id' => 'social',
        'title' => 'Mạng xã hội',
        'settings_pages' => 'my-options',
        'tab' => 'social-setting',
        'fields' => array(
            array(
                'name' => 'Facebook',
                'id' => 'social_facebook',
                'type' => 'text',
                'size' => 100
            ),
            array(
                'name' => 'Linkedin',
                'id' => 'social_linkedin',
                'type' => 'text',
                'size' => 100
            ),
            array(
                'name' => 'Zalo',
                'id' => 'social_zalo',
                'type' => 'text',
                'size' => 100
            ),
        )
    );
    $meta_boxes[] = array(
        'id' => 'insert-code-all',
        'title' => 'Chèn mã',
        'settings_pages' => 'my-options',
        'tab' => 'insert-code-setting',
        'fields' => array(
            array(
                'name' => 'Chèn script header',
                'id' => 'insert_script_header',
                'type' => 'textarea',
                'size' => 100,
                'sanitize_callback' => 'none',
            ),
            array(
                'name' => 'Chèn script sau body',
                'id' => 'insert_script_before_body',
                'type' => 'textarea',
                'size' => 100,
                'sanitize_callback' => 'none',
            ),
            array(
                'name' => 'Chèn script footer',
                'id' => 'insert_script_footer',
                'type' => 'textarea',
                'size' => 100,
                'sanitize_callback' => 'none',
            ),
        )
    );
    return $meta_boxes;
}