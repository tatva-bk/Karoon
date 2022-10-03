<?php
/**
 * karoon functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package karoon
 */

/**
 * Disable Gutenburg
 */
add_filter('use_block_editor_for_post', '__return_false', 10);

if ( ! function_exists( 'karoon_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function karoon_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on karoon, use a find and replace
		 * to change 'karoon' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'karoon', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'karoon' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'karoon_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'karoon_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function karoon_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'karoon_content_width', 640 );
}
add_action( 'after_setup_theme', 'karoon_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function karoon_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'karoon' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'karoon' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'karoon_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function karoon_scripts() {
	wp_enqueue_style( 'karoon-style', get_stylesheet_uri() );

	wp_enqueue_script( 'karoon-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'karoon-js', get_template_directory_uri() . '/js/developer.js', array(), '20151215', true );

	wp_enqueue_script( 'karoon-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'karoon_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
/**
 * Karoon helper function file.
 */
require get_template_directory() . '/inc/karoon-helper-functions.php';

/**
 * Custom post types
 */
require get_theme_file_path('custom-post-types/project.php');
require get_theme_file_path('custom-post-types/team.php');
require get_theme_file_path('custom-post-types/about.php');
require get_theme_file_path('custom-post-types/sustainability-content.php');

/**
 * Karoon Styles and Scripts.
 */
require get_theme_file_path('/inc/karoon-scripts-styles.php');

add_filter( 'nav_menu_link_attributes', 'karoon_sub_menu_atts', 10, 3 );
function karoon_sub_menu_atts( $atts, $item, $args )
{
  // The ID of the target menu item
  $menu_target = str_replace(array(' ',','),array('-',""),strtolower($item->title));
  // Check current parent item and apply href to only their subitems
  if ($item->menu_item_parent != 0 && $item->current == 1) {
    $atts['href'] = '#'.$menu_target;
  }
  return $atts;
}
function trim_search_query($query){
	if ( $query->is_main_query() && $query->is_search() ) {
		$trimmed_query = trim($_GET['s']);
		$query->set('s', $trimmed_query);
	}
}
add_action('pre_get_posts', 'trim_search_query');

// remove attachment pages
function cleanup_default_rewrite_rules( $rules ) { 
foreach ( $rules as $regex => $query ) { 
if ( strpos( $regex, 'attachment' ) || strpos( $query, 'attachment' ) ) { 
unset( $rules[ $regex ] ); } } return $rules; } 
add_filter( 'rewrite_rules_array', 'cleanup_default_rewrite_rules' );

function cleanup_attachment_link( $link ) { return; } add_filter( 'attachment_link', 'cleanup_attachment_link' );