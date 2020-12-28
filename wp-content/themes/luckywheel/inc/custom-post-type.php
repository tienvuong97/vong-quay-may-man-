<?php

/**
 * Tạo custom post type
 * https://piklist.com/learn/doc/piklist_post_types/
 */
function register_post_types($post_types)
{

 
    // Tạo post type tên 'tablerprice'
    $post_types['giai_thuong'] = array(
        'labels' => array(
            'name' => 'Giải thưởng',
            'singular_name' => 'giaithuong',
            'add_new' => 'Thêm giải thưởng',
            'add_new_item' => 'Thêm giải thưởng mới',
            'all_items' => 'Tất cả giải thưởng',
            'edit_item' => 'Sửa giải thưởng',
            'filter_item_list' => 'Lọc danh sách giải thưởng',
            'item_list' => 'Danh sách giải thưởng',
        ),
        'title' => 'Nhập tên giải thưởng',
        'public' => true,
        'supports' => array('title', 'thumbnail', 'editor', 'comment'),
        'rewrite' => array('slug' => 'tour'),
        'hide_meta_box' => array('author'),
        'has_archive' => true
    );
    $post_types['thong_tin'] = array(
        'labels' => array(
            'name' => 'Thông tin',
            'singular_name' => 'thongtin',
            'add_new' => 'Thêm thông tin',
            'add_new_item' => 'Thêm thông tin mới',
            'all_items' => 'Tất cả thông tin',
            'edit_item' => 'Sửa thông tin',
            'filter_item_list' => 'Lọc danh sách thông tin',
            'item_list' => 'Danh sách thông tin',
        ),
        'title' => 'Nhập tên tiêu đề thông tin',
        'public' => true,
        'supports' => array('title', 'thumbnail', 'editor', 'comment'),
        'rewrite' => array('slug' => 'tour'),
        'hide_meta_box' => array('author'),
        'has_archive' => true
    );

    

    return $post_types;
}
add_filter('piklist_post_types', 'register_post_types');
