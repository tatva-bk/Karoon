<?php


/*
 * Register Custom Posttype - project
 */

add_action('init', 'karoon_register_cpt_project');

if (!function_exists('karoon_register_cpt_project')) :

    function karoon_register_cpt_project() {

        $karoon_project_cpt_labels = array(
            'name' => _x('Projects', 'post type general name', 'karoon'),
            'singular_name' => _x('Project', 'post type singular name', 'karoon'),
            'menu_name' => _x('Projects', 'admin menu', 'karoon'),
            'name_admin_bar' => _x('Projects', 'add new on admin bar', 'karoon'),
            'add_new' => _x('Add New', 'Projects', 'karoon'),
            'add_new_item' => __('Add New Project', 'karoon'),
            'new_item' => __('New Project', 'karoon'),
            'edit_item' => __('Edit Project', 'karoon'),
            'view_item' => __('View Project', 'karoon'),
            'all_items' => __('All Projects', 'karoon'),
            'search_items' => __('Search Projects', 'karoon'),
            'parent_item_colon' => __('Parent Projects:', 'karoon'),
            'not_found' => __('No Projects found.', 'karoon'),
            'not_found_in_trash' => __('No Projects found in Trash.', 'karoon')
        );

        $karoon_project_cpt_args = array(
            'labels' => $karoon_project_cpt_labels,
            'description' => __('Projects Custom Post type.', 'karoon'),
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'exclude_from_search' => false,
            'show_in_menu' => true,
            'query_var' => true,
            'rewrite' => array('slug' => 'project'),
            'capability_type' => 'post',
            'has_archive' => true,
            'hierarchical' => false,
            'menu_position' => null,
            'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'custom-fields')
        );

        register_post_type('project', $karoon_project_cpt_args);
    }

endif;

