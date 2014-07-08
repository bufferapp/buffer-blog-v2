<?php
/**
 * Buffer functions and definitions
 *
 * @package Buffer
 */

if ( ! function_exists( 'buffer_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function buffer_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Buffer, use a find and replace
	 * to change 'buffer' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'buffer', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'buffer' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link'
	) );

	add_theme_support( 'post-thumbnails' );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'buffer_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // buffer_setup
add_action( 'after_setup_theme', 'buffer_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function buffer_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'buffer' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'buffer_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function buffer_scripts() {
	wp_enqueue_style( 'buffer-style', get_stylesheet_uri() );

	wp_enqueue_script( 'buffer-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'buffer-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'buffer_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


// Makes More Link go to page without anchor tag
function remove_more_link_scroll( $link ) {
	$link = preg_replace( '|#more-[0-9]+|', '', $link );
	return $link;
}
add_filter( 'the_content_more_link', 'remove_more_link_scroll' );

// Changes text for More Link
add_filter( 'the_content_more_link', 'modify_read_more_link' );
function modify_read_more_link() {
return '<a class="continue-reading" href="' . get_permalink() . '">Continue Reading &rarr;';
}

// Replaces the excerpt "more" text by a link
function new_excerpt_more($more) {
       global $post;
	return '<p><a class="continue-reading" href="'. get_permalink($post->ID) . '">Continue Reading &rarr;</a></p>';
}
add_filter('excerpt_more', 'new_excerpt_more');


// Creates/hides inputs for user contact info
function extra_contact_info($contactmethods) {
    $contactmethods['twitter']    = 'Twitter';
    unset($contactmethods['aim']);
    unset($contactmethods['yim']);
    unset($contactmethods['jabber']);
    unset($contactmethods['facebook']);
    unset($contactmethods['linkedin']);
    unset($contactmethods['google']);
    unset($contactmethods['tumblr']);

    return $contactmethods;
}
add_filter('user_contactmethods', 'extra_contact_info');