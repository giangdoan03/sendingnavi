<?php
function tech_register_post_type_book()
{
    $args = array(
        'label' => esc_html__('Sách', 'faq'),
        'labels' => array(
            'menu_name' => esc_html__('Sách', 'faq'),
            'name_admin_bar' => esc_html__('Sách', 'faq'),
            'add_new' => esc_html__('Thêm sách', 'faq'),
            'add_new_item' => esc_html__('Thêm sách', 'faq'),
            'new_item' => esc_html__('New sách', 'faq'),
            'edit_item' => esc_html__('Sửa sách', 'faq'),
            'view_item' => esc_html__('Xem sách', 'faq'),
            'update_item' => esc_html__('Cập nhật sách', 'faq'),
            'all_items' => esc_html__('Sách', 'faq'),
            'search_items' => esc_html__('Tìm kiếm sách', 'faq'),
            'parent_item_colon' => esc_html__('Danh mục sách', 'faq'),
            'not_found' => esc_html__('Không có dữ liệu phù hợp', 'faq'),
            'not_found_in_trash' => esc_html__('Không có sách trong thùng rác', 'faq'),
            'name' => esc_html__('Sách', 'faq'),
            'singular_name' => esc_html__('Sách', 'faq'),
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
        'menu_icon' => 'dashicons-book',
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail',
        ),
        'rewrite' => ['slug' => 'sach'],
    );
    register_post_type('book', $args);
}
add_action('init', 'tech_register_post_type_book');
function tech_register_taxonomy_book_category()
{
    $args = array(
        'label' => esc_html__('Danh mục sách', 'tech-book-category'),
        'labels' => array(
            'menu_name' => esc_html__('Danh mục sách', 'tech-book-category'),
            'all_items' => esc_html__('Tất cả danh mục sách', 'tech-book-category'),
            'edit_item' => esc_html__('Sửa danh mục sách', 'tech-book-category'),
            'view_item' => esc_html__('Xem danh mục sách', 'tech-book-category'),
            'update_item' => esc_html__('Cập nhật danh mục sách', 'tech-book-category'),
            'add_new_item' => esc_html__('Thêm mới danh mục sách', 'tech-book-category'),
            'new_item_name' => esc_html__('Danh mục sách mới', 'tech-book-category'),
            'parent_item' => esc_html__('Danh mục cha', 'tech-book-category'),
            'parent_item_colon' => esc_html__('Danh mục cha:', 'tech-book-category'),
            'search_items' => esc_html__('Tìm kiếm danh mục sách', 'tech-book-category'),
            'popular_items' => esc_html__('Popular Danh mục sách', 'tech-book-category'),
            'separate_items_with_commas' => esc_html__('Separate Danh mục sách with commas', 'tech-book-category'),
            'add_or_remove_items' => esc_html__('Add or remove Danh mục sách', 'tech-book-category'),
            'choose_from_most_used' => esc_html__('Choose most used Danh mục sách', 'tech-book-category'),
            'not_found' => esc_html__('Chưa có dữ liệu phù hơp', 'tech-book-category'),
            'name' => esc_html__('Danh mục sách', 'tech-book-category'),
            'singular_name' => esc_html__('Danh mục sách', 'tech-book-category'),
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
        'rewrite' => ['slug' => 'book-category'],
    );
    register_taxonomy('book-category', array('book'), $args);
}
add_action('init', 'tech_register_taxonomy_book_category', 0);
function tech_register_taxonomy_author_category()
{
    $args = array(
        'label' => esc_html__('Tác giả', 'tech-author-category'),
        'labels' => array(
            'menu_name' => esc_html__('Tác giả', 'tech-author-category'),
            'all_items' => esc_html__('Tất cả tác giả', 'tech-author-category'),
            'edit_item' => esc_html__('Sửa tác giả', 'tech-author-category'),
            'view_item' => esc_html__('Xem tác giả', 'tech-author-category'),
            'update_item' => esc_html__('Cập nhật tác giả', 'tech-author-category'),
            'add_new_item' => esc_html__('Thêm mới tác giả', 'tech-author-category'),
            'new_item_name' => esc_html__('Tác giả mới', 'tech-author-category'),
            'parent_item' => esc_html__('Danh mục cha', 'tech-author-category'),
            'parent_item_colon' => esc_html__('Danh mục cha:', 'tech-author-category'),
            'search_items' => esc_html__('Tìm kiếm tác giả', 'tech-author-category'),
            'popular_items' => esc_html__('Popular tác giả', 'tech-author-category'),
            'separate_items_with_commas' => esc_html__('Separate tác giả with commas', 'tech-author-category'),
            'add_or_remove_items' => esc_html__('Add or remove tác giả', 'tech-author-category'),
            'choose_from_most_used' => esc_html__('Choose most used tác giả', 'tech-author-category'),
            'not_found' => esc_html__('Chưa có dữ liệu phù hơp', 'tech-author-category'),
            'name' => esc_html__('Tác giả', 'tech-author-category'),
            'singular_name' => esc_html__('Tác giả', 'tech-author-category'),
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
        'rewrite' => ['slug' => 'author-category'],
    );
    register_taxonomy('author-category', array('book'), $args);
}
add_action('init', 'tech_register_taxonomy_author_category', 0);
add_filter('rwmb_meta_boxes', 'tech_post_type_book_meta_boxes');
function tech_post_type_book_meta_boxes($meta_boxes)
{
    $meta_boxes[] = array(
        'title' => 'Cấu hình sách',
        'post_types' => 'book',
        'fields' => array(
            array(
                'name' => 'File',
                'id' => 'file',
                'type' => 'file',
                'max_file_uploads' => 1,
            ),
            array(
                'name' => 'Nhà xuất bản',
                'id' => 'publishing',
                'type' => 'text',
                'std' => "Đang cập nhật"
            ),
            array(
                'name' => 'Lượt tải',
                'id' => 'downloaded',
                'type' => 'text',
                'std' => 0
            ),
            array(
                'name' => 'Sách nên đọc',
                'id' => 'vote',
                'type' => 'checkbox',
                'std' => 1
            ),
        )
    );
    return $meta_boxes;
}
add_filter('rwmb_meta_boxes', 'tech_taxonomy_author_category_meta_boxes');
function tech_taxonomy_author_category_meta_boxes($meta_boxes)
{
    $meta_boxes[] = array(
        'title' => 'Cấu hình tác giả',
        'taxonomies' => 'author-category',
        'fields' => array(
            array(
                'name' => 'Ảnh tác giả',
                'id' => 'author-category-image',
                'type' => 'single_image',
            )
        )
    );
    return $meta_boxes;
}