<?php

/**
 * LegacyTheme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package LegacyTheme
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function legacytheme_setup()
{
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on LegacyTheme, use a find and replace
	 * to change 'legacytheme' to the name of your theme in all the template files.
	 */
	load_theme_textdomain('legacytheme', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support('title-tag');

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'legacytheme'),
		)
	);

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);


	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height' => 250,
			'width' => 250,
			'flex-width' => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'legacytheme_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function legacytheme_content_width()
{
	$GLOBALS['content_width'] = apply_filters('legacytheme_content_width', 640);
}
add_action('after_setup_theme', 'legacytheme_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function legacytheme_widgets_init()
{
	register_sidebar(
		array(
			'name' => esc_html__('Sidebar', 'legacytheme'),
			'id' => 'sidebar-1',
			'description' => esc_html__('Add widgets here.', 'legacytheme'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		)
	);
}
add_action('widgets_init', 'legacytheme_widgets_init');



/**
 * Enqueue scripts and styles.
 */
function legacytheme_scripts()
{
	// wp_enqueue_style('legacytheme-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_enqueue_style('legacytheme-style', get_template_directory_uri() . '/assets/css/styles.min.css', array(), _S_VERSION);
	wp_enqueue_style('legacytheme-style-custom', get_template_directory_uri() . '/assets/css/custom.css', array(), _S_VERSION);
	// wp_style_add_data('legacytheme-style', 'rtl', 'replace');

	wp_enqueue_script('legacytheme-scripts', get_template_directory_uri() . '/assets/js/scripts.min.js', array(), _S_VERSION, true);
	wp_enqueue_script('legacytheme-custom', get_template_directory_uri() . '/assets/js/custom.js', array(), _S_VERSION, true);
	if (is_front_page()) {
		wp_enqueue_script('legacytheme-libs', get_template_directory_uri() . '/assets/js/libs.js', array(), _S_VERSION, true);
	}
	wp_enqueue_script('legacytheme-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), _S_VERSION, true);


	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'legacytheme_scripts');


// add styles for gutenberg
add_action('enqueue_block_editor_assets', function () {
	wp_enqueue_style('mytheme/editor', get_template_directory_uri() . '/assets/css/block-editor__container.css');
});

// function my_cptui_add_post_types_to_archives($query)
// {
// 	if (is_admin() || !$query->is_main_query()) {
// 		return;
// 	}

// 	if (is_category() || is_tag() && empty($query->query_vars['suppress_filters'])) {
// 		$cptui_post_types = cptui_get_post_type_slugs();

// 		$query->set(
// 			'post_type',
// 			array_merge(
// 				array('post'),
// 				$cptui_post_types
// 			)
// 		);
// 	}
// }
// add_filter('pre_get_posts', 'my_cptui_add_post_types_to_archives');

// function my_cptui_add_post_types_to_archives($query)
// {
// 	if (is_admin() || !$query->is_main_query()) {
// 		return;
// 	}

// 	if (is_category() || is_tag() && empty($query->query_vars['suppress_filters'])) {
// 		$cptui_post_types = cptui_get_post_type_slugs();

// 		if (is_category()) {
// 			$query->set('category_name', get_query_var('category_name'));
// 		}

// 		$query->set(
// 			'post_type',
// 			array_merge(
// 				array('post'),
// 				$cptui_post_types
// 			)
// 		);
// 	}
// }
// add_filter('pre_get_posts', 'my_cptui_add_post_types_to_archives');


function my_custom_post_types_to_archives($query)
{
	if (is_admin() || !$query->is_main_query()) {
		return;
	}

	if ((is_category() || is_tag()) && empty($query->query_vars['suppress_filters'])) {
		$all_custom_post_types = get_post_types(array('_builtin' => false));

		$query->set(
			'post_type',
			array_merge(
				array('post'),
				$all_custom_post_types
			)
		);
	}
}
add_action('pre_get_posts', 'my_custom_post_types_to_archives');



function get_template_for_category($template)
{

	if (basename($template) === 'category.php') {
		$term = get_queried_object();


		$slug_template = locate_template("category-{$term->slug}.php");
		if ($slug_template)
			return $slug_template;


		$term_to_check = $term;
		while ($term_to_check->parent) {

			$term_to_check = get_category($term_to_check->parent);

			if (!$term_to_check || is_wp_error($term_to_check))
				break;


			$slug_template = locate_template("category-{$term_to_check->slug}.php");

			if ($slug_template)
				return $slug_template;
		}
	}

	return $template;
}
add_filter('category_template', 'get_template_for_category');


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
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

add_image_size('full', 0, 0, false);


/* disable auto plugins update */
add_filter('auto_update_plugin', '__return_false');


acf_add_options_page(array(
	'page_title' => 'Site Settings',
	'menu_title' => 'Site Settings',
	'menu_slug' => 'site-settings',
	'capability' => 'edit_posts',
	'redirect' => false
));
