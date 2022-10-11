<?php
/*
 * Register Custom Posttype - sustainability
 */
add_action('init', 'karoon_register_cpt_sustainability');
if (!function_exists('karoon_register_cpt_sustainability')) {
    function karoon_register_cpt_sustainability() {
        $karoonSustainabilityCptLabels = array(
            'name' => _x('Sustainability', 'post type general name', 'karoon'),
            'singular_name' => _x('Sustainability', 'post type singular name', 'karoon'),
            'menu_name' => _x('Sustainability', 'admin menu', 'karoon'),
            'name_admin_bar' => _x('Sustainability', 'add new on admin bar', 'karoon'),
            'add_new' => _x('Add New', 'Sustainability', 'karoon'),
            'add_new_item' => __('Add New Sustainability', 'karoon'),
            'new_item' => __('New Sustainability', 'karoon'),
            'edit_item' => __('Edit Sustainability', 'karoon'),
            'view_item' => __('View Sustainability', 'karoon'),
            'all_items' => __('All Sustainability', 'karoon'),
            'search_items' => __('Search Sustainability', 'karoon'),
            'parent_item_colon' => __('Parent Sustainability:', 'karoon'),
            'not_found' => __('No Sustainability found.', 'karoon'),
            'not_found_in_trash' => __('No Sustainability found in Trash.', 'karoon')
        );
        $karoonSustainabilityCptArgs = array(
            'labels' => $karoonSustainabilityCptLabels,
            'description' => __('Sustainability Custom Post type.', 'karoon'),
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'exclude_from_search' => false,
            'show_in_menu' => true,
            'query_var' => true,
            'rewrite' => array('slug' => 'sustainability-values'),
            'capability_type' => 'post',
            'has_archive' => true,
            'hierarchical' => false,
            'menu_position' => null,
            'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'custom-fields')
        );
        register_post_type('sustain-values', $karoonSustainabilityCptArgs);
    }
}