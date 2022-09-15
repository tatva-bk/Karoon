<?php
/*
 * Register Custom Posttype - team
 */
add_action('init', 'karoon_register_cpt_team');
if (!function_exists('karoon_register_cpt_team')) {
    function karoon_register_cpt_team() {
        $karoonTeamCptLabels = array(
            'name' => _x('Directors and Executive Team', 'post type general name', 'karoon'),
            'singular_name' => _x('Directors and Executive Team', 'post type singular name', 'karoon'),
            'menu_name' => _x('Directors and Executive Team', 'admin menu', 'karoon'),
            'name_admin_bar' => _x('Directors and Executive Team', 'add new on admin bar', 'karoon'),
            'add_new' => _x('Add New', 'Directors and Executive Team', 'karoon'),
            'add_new_item' => __('Add New Directors and Executive Team', 'karoon'),
            'new_item' => __('New Directors and Executive Team', 'karoon'),
            'edit_item' => __('Edit Directors and Executive Team', 'karoon'),
            'view_item' => __('View Directors and Executive Team', 'karoon'),
            'all_items' => __('All Directors and Executive Team', 'karoon'),
            'search_items' => __('Search Directors and Executive Team', 'karoon'),
            'parent_item_colon' => __('Parent Directors and Executive Team:', 'karoon'),
            'not_found' => __('No Directors and Executive Team found.', 'karoon'),
            'not_found_in_trash' => __('No Directors and Executive Team found in Trash.', 'karoon')
        );
        $karoonTeamCptArgs = array(
            'labels' => $karoonTeamCptLabels,
            'description' => __('Directors and Executive Team Custom Post type.', 'karoon'),
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'exclude_from_search' => false,
            'show_in_menu' => true,
            'query_var' => true,
            'rewrite' => array('slug' => 'team'),
            'capability_type' => 'post',
            'has_archive' => true,
            'hierarchical' => false,
            'menu_position' => null,
            'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'custom-fields')
        );
        register_post_type('team', $karoonTeamCptArgs);
    }
}