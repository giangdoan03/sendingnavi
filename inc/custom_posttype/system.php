<?php
function tech5s_register_post_type_system()
{
    $args = array(
        'label' => esc_html__('Cửa hàng', 'system'),
        'labels' => array(
            'menu_name' => esc_html__('Cửa hàng', 'system'),
            'name_admin_bar' => esc_html__('Cửa hàng', 'system'),
            'add_new' => esc_html__('Thêm cửa hàng', 'system'),
            'add_new_item' => esc_html__('Thêm cửa hàng', 'system'),
            'new_item' => esc_html__('New cửa hàng', 'system'),
            'edit_item' => esc_html__('Sửa cửa hàng', 'system'),
            'view_item' => esc_html__('Xem cửa hàng', 'system'),
            'update_item' => esc_html__('Cập nhật cửa hàng', 'system'),
            'all_items' => esc_html__('Cửa hàng', 'system'),
            'search_items' => esc_html__('Tìm kiếm cửa hàng', 'system'),
            'parent_item_colon' => esc_html__('Danh mục cửa hàng', 'system'),
            'not_found' => esc_html__('Không có dữ liệu phù hợp', 'system'),
            'not_found_in_trash' => esc_html__('Không có Cửa hàng trong thùng rác', 'system'),
            'name' => esc_html__('Cửa hàng', 'system'),
            'singular_name' => esc_html__('Cửa hàng', 'system'),
        ),
        'public' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_nav_menus' => true,
        'show_in_menu' => true,
        'show_in_admin_bar' => true,
        'show_in_rest' => false,
        'capability_type' => 'post',
        'hierarchical' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite_no_front' => false,
        'menu_icon' => 'dashicons-store',
        'supports' => array(
            'title',
            'editor',
        ),
        'rewrite' => ['slug' => 'he-thong-cua-hang'],
    );
    register_post_type('system', $args);
}
add_action('init', 'tech5s_register_post_type_system');
function tech5s_register_taxonomy_system_category()
{
    $args = array(
        'label' => esc_html__('Danh mục cửa hàng', 'tech5s-system-category'),
        'labels' => array(
            'menu_name' => esc_html__('Danh mục cửa hàng', 'tech5s-system-category'),
            'all_items' => esc_html__('Tất cả danh mục cửa hàng', 'tech5s-system-category'),
            'edit_item' => esc_html__('Sửa danh mục cửa hàng', 'tech5s-system-category'),
            'view_item' => esc_html__('Xem danh mục cửa hàng', 'tech5s-system-category'),
            'update_item' => esc_html__('Cập nhật danh mục cửa hàng', 'tech5s-system-category'),
            'add_new_item' => esc_html__('Thêm mới danh mục cửa hàng', 'tech5s-system-category'),
            'new_item_name' => esc_html__('Danh mục cửa hàng mới', 'tech5s-system-category'),
            'parent_item' => esc_html__('Danh mục cha', 'tech5s-system-category'),
            'parent_item_colon' => esc_html__('Danh mục cha:', 'tech5s-system-category'),
            'search_items' => esc_html__('Tìm kiếm danh mục cửa hàng', 'tech5s-system-category'),
            'popular_items' => esc_html__('Popular Danh mục cửa hàng', 'tech5s-system-category'),
            'separate_items_with_commas' => esc_html__('Separate Danh mục cửa hàng with commas', 'tech5s-system-category'),
            'add_or_remove_items' => esc_html__('Add or remove Danh mục cửa hàng', 'tech5s-system-category'),
            'choose_from_most_used' => esc_html__('Choose most used Danh mục cửa hàng', 'tech5s-system-category'),
            'not_found' => esc_html__('Chưa có dữ liệu phù hơp', 'tech5s-system-category'),
            'name' => esc_html__('Danh mục cửa hàng', 'tech5s-system-category'),
            'singular_name' => esc_html__('system_category', 'tech5s-system-category'),
        ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
        'show_in_quick_edit' => true,
        'show_admin_column' => true,
        'show_in_rest' => false,
        'hierarchical' => true,
        'query_var' => true,
        'sort' => false,
        'rewrite_no_front' => false,
        'rewrite_hierarchical' => false,
        'supports' => array(
            'title',
        ),
        'rewrite' => ['slug' => 'system-category'],
    );
    register_taxonomy('system-category', array('system'), $args);
}
add_action('init', 'tech5s_register_taxonomy_system_category', 0);
add_filter('rwmb_meta_boxes', 'tech5s_post_type_system_meta_boxes');
function tech5s_post_type_system_meta_boxes($meta_boxes)
{
    $meta_boxes[] = array(
        'title' => 'Cấu hình cửa hàng',
        'post_types' => 'system',
        'fields' => array(
            array(
                'name' => 'Hiển thị Cửa hàng',
                'id' => 'act',
                'type' => 'checkbox',
                'std' => 1
            ),
            array(
                'name' => 'Sắp xêp',
                'id' => 'ord',
                'type' => 'text',
                'std' => 1
            ),
        )
    );
    $meta_boxes[] = array(
        'title' => 'Danh sách cửa hàng',
        'post_types' => 'system',
        'fields' => array(
            array(
                'name' => 'Phố',
                'id' => 'system-item',
                'type' => 'group',
                'clone' => true,
                'sort_clone' => true,
                'fields' => array(
                    array(
                        'name' => 'Tên',
                        'id' => 'name',
                        'type' => 'text',
                        'size' => 100
                    ),
                    array(
                        'name' => 'Cửa hàng thuốc',
                        'id' => 'system-doctor-item',
                        'type' => 'group',
                        'clone' => true,
                        'sort_clone' => true,
                        'fields' => array(
                            array(
                                'name' => 'Tên',
                                'id' => 'name',
                                'type' => 'text',
                                'size' => 100
                            ),
                            array(
                                'name' => 'Địa chỉ',
                                'id' => 'address',
                                'type' => 'text',
                                'size' => 100
                            ),
                            array(
                                'name' => 'Điện thoại',
                                'id' => 'phone',
                                'type' => 'text',
                                'size' => 100
                            ),
                        )
                    )
                )
            )
        )
    );
    return $meta_boxes;
}
add_filter('rwmb_meta_boxes', 'tech5s_taxonomy_system_category_meta_boxes');
function tech5s_taxonomy_system_category_meta_boxes($meta_boxes)
{
    $meta_boxes[] = array(
        'title' => 'Cấu hình danh mục cửa hàng',
        'taxonomies' => 'system-category',
        'fields' => array(
            array(
                'name' => 'Hiển thị',
                'id' => 'act',
                'type' => 'checkbox',
                'std' => 0
            ),
            array(
                'name' => 'Sắp xếp',
                'id' => 'ord',
                'type' => 'text',
                'size' => 50,
                'std' => 0
            )
        )
    );
    return $meta_boxes;
}
