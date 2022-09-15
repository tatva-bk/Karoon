<?php

/**
 * Add style and script for Karoon website.
 */
add_action('wp_enqueue_scripts', 'karoon_enqueue_theme_styles',100);
add_action('wp_footer', 'karoon_enqueue_theme_scripts');

if (!function_exists('karoon_enqueue_theme_styles')) {
    function karoon_enqueue_theme_styles() {     
        wp_enqueue_style('karoon-main-style', get_theme_file_uri('/public/css/main.css'), '', time());      
    }
}

if (!function_exists('karoon_enqueue_theme_scripts')) {
    function karoon_enqueue_theme_scripts() {
        wp_enqueue_script("jquery");        
        wp_enqueue_script('karoon-vendor-js', get_theme_file_uri('/public/js/vendor.js'), '', '', true);
        wp_enqueue_script('karoon-main-js', get_theme_file_uri('/public/js/main.js'), 'karoon-vendor-js', time(), true);
    }
}

function wp_deque_stock() {
   wp_dequeue_style( 'stock-ticker' );
   wp_dequeue_style( 'stock-ticker-custom' );
}
add_action( 'wp_print_styles', 'wp_deque_stock', 100 );
