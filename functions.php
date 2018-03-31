<?php
/**
 * Alumni functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Alumni
 */
 
if (!function_exists('alumni_setup'))
{
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function alumni_setup()
	{
		date_default_timezone_set('America/New_York');
		
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Alumni, use a find and replace
		 * to change 'alumni' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('alumni', get_template_directory() . '/languages');

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
		add_image_size('standard-monitor', 1280, 960, true);
		add_image_size('hd-video', 1280, 720, true);
		add_image_size('feature-jumbotron', 1480, 560, true);
		add_image_size('169-preview-large', 1600, 900, true);
		add_image_size('169-preview-medium', 800, 450, true);
		add_image_size('169-preview-small', 400, 225, true);

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(array(
			'main' => esc_html__( 'Main', 'alumni' ),
			'sub' => esc_html__( 'Sub', 'alumni' ),
		));

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support('html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		));

		// Set up the WordPress core custom background feature.
		add_theme_support('custom-background', apply_filters( 'alumni_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		)));
	}
}
add_action('after_setup_theme', 'alumni_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function alumni_content_width()
{
	$GLOBALS['content_width'] = apply_filters('alumni_content_width', 640);
}
add_action('after_setup_theme', 'alumni_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function alumni_widgets_init()
{
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'alumni' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'alumni' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	));
}
add_action('widgets_init', 'alumni_widgets_init');

// Disable admin bar
add_filter( 'show_admin_bar', '__return_false' );
show_admin_bar(false);
show_admin_bar(0);

// Enqueue scripts and styles.
function alumni_scripts()
{
	// jQuery
	wp_deregister_script('jquery');
	wp_register_script('jquery', "https" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js", false, null);
	wp_enqueue_script('jquery');
	
	// Bootstrap JS
	wp_deregister_script('bootstrap-js');
	wp_register_script('bootstrap-js', "https" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js", false, null);
	wp_enqueue_script('bootstrap-js');
	
	// Bootstrap stylesheet
	wp_enqueue_style('bootstrap-style', "https" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css", false, null);
	
	// Font-awesome stylesheet
	//wp_enqueue_style('fa-style', "https" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css", false, null);
	
	//Custom stylesheet
	wp_enqueue_style('alumni-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'alumni_scripts');

// BuddyPress function overrides
require get_template_directory() . '/inc/buddypress.php';

// BuddyPress configuration file
require get_template_directory() . '/inc/buddypress-config.php';




// NON WORKING CODE FROM STACK OVERFLOW NEED TO FIX
// Here we change the PHP class name to be used to handle Text Box fields.
/*function alumni_bp_xprofile_get_field_types($fields)
{
    $fields['textbox'] = 'Alumni_BP_XProfile_Field_Type_Textbox';
    return $fields;
}
add_filter('bp_xprofile_get_field_types', 'alumni_bp_xprofile_get_field_types');

// Here we load the PHP class file to be used to handle Text Box fields.
function alumni_bp_core_components_included()
{
	echo 'debug1';	
    if (class_exists('BP_XProfile_Field_Type_Textbox'))
	{
		echo 'debug2';
        require_once get_template_directory() . '/inc/xprofile_field_type_textbox.php';
    }
}
add_action('bp_core_components_included', 'alumni_bp_core_components_included');*/
// NON WORKING CODE FROM STACK OVERFLOW NEED TO FIX