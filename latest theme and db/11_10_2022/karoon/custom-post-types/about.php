<?php
/*
 * Register Custom Posttype - team
 */
add_action('init', 'karoon_register_cpt_about');
if (!function_exists('karoon_register_cpt_about')) {
    function karoon_register_cpt_about() {
        $karoonAboutCptLabels = array(
            'name' => _x('About us', 'post type general name', 'karoon'),
            'singular_name' => _x('About us', 'post type singular name', 'karoon'),
            'menu_name' => _x('About us', 'admin menu', 'karoon'),
            'name_admin_bar' => _x('About us', 'add new on admin bar', 'karoon'),
            'add_new' => _x('Add New', 'About us', 'karoon'),
            'add_new_item' => __('Add New About us', 'karoon'),
            'new_item' => __('New About us', 'karoon'),
            'edit_item' => __('Edit About us', 'karoon'),
            'view_item' => __('View About us', 'karoon'),
            'all_items' => __('All About us', 'karoon'),
            'search_items' => __('Search About us', 'karoon'),
            'parent_item_colon' => __('Parent About us:', 'karoon'),
            'not_found' => __('No About us found.', 'karoon'),
            'not_found_in_trash' => __('No About us found in Trash.', 'karoon')
        );
        $karoonAboutCptArgs = array(
            'labels' => $karoonAboutCptLabels,
            'description' => __('About us Custom Post type.', 'karoon'),
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'exclude_from_search' => false,
            'show_in_menu' => true,
            'query_var' => true,
            'rewrite' => array('slug' => 'about-us-detail'),
            'capability_type' => 'post',
            'has_archive' => true,
            'hierarchical' => false,
            'menu_position' => null,
            'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'custom-fields')
        );
        register_post_type('about-us-detail', $karoonAboutCptArgs);
    }
}
