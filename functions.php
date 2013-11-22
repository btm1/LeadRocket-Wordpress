<?php
/**
 * Functions and Definitions
 *
 * @package leadrocket
 */

/**
 * Set Content Width for Theme
 */

if ( ! isset( $content_width ) ) {
	$content_width = 640;
}

/**
 * Theme Setup
 *
 * Add Support for WordPress features and initialize
 * language support.
 */

if ( ! function_exists( 'lr_setup' ) ) :
	function lr_setup() {
		// Translation Support
		load_theme_textdomain( 'lr_framework', get_template_directory() . '/languages' );

		// Theme Support
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'post-formats', array( 'audio', 'video', 'gallery' ) );
		add_theme_support( 'custom-background' );
		add_theme_support( 'custom-header', array( 'header-text' => false, 'height' => 18, 'flex-width' => true ) );

		// Image Sizes
		add_image_size( 'marketing', '300', '300', true );

		// Register Nav
		register_nav_menus( array(
			'primary' => __( 'Primary Menu', 'lr_framework' ),
			'footer' => __('Footer Menu', 'lr_framework')
		));
	}
endif;

add_action( 'after_setup_theme', 'lr_setup' );

/**
 * Sidebar Setup
 */

function lr_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'lr_framework' ),
		'description'   => __( 'Sidebar that will display on all pages.', 'lr_framework' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));

	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'lr_framework' ),
		'description'   => __( 'Sidebar that will display on blog.', 'lr_framework' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));
}

add_action( 'widgets_init', 'lr_widgets_init' );

/**
 * Enqueue Scripts and Styles
 */

function lr_enqueue_scripts() {
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'lr_scripts', get_template_directory_uri().'/js/scripts.min.js', array( 'jquery' ) );
}

function lr_enqueue_stlyes() {
	wp_enqueue_style( 'lr_style', get_stylesheet_uri() );
}

function lr_enqueue_comment_reply_script() {
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'comment_form_before', 'lr_enqueue_comment_reply_script' );
add_action( 'wp_enqueue_scripts', 'lr_enqueue_scripts' );
add_action( 'wp_print_styles', 'lr_enqueue_stlyes' );

/**
 * Add HTML5 Shim
 */

function lr_add_ie_html5_shim() {
	wp_register_script( 'html5_shim', 'http://html5shim.googlecode.com/svn/trunk/html5.js', array(), false );
	wp_enqueue_script( 'html5_shim' );
}

if ( true === $is_IE ) {
	add_action( 'wp_enqueue_scripts', 'lr_add_ie_html5_shim' );
}

/**
 * WP Title
 */

function lr_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 ) {
		$title = "$title $sep " . sprintf( __( 'Page %s', 'twentytwelve' ), max( $paged, $page ) );
	}

	return $title;
}

add_filter( 'wp_title', 'lr_wp_title', 10, 2 );

/**
 * Users
 */

function lr_update_contact_methods( $contactmethods ) {
	// Add Twitter
	if ( !isset( $contactmethods['twitter'] ) ) {
		$contactmethods['twitter'] = 'Twitter';
	}

	// Add Google+
	if ( !isset( $contactmethods['googleplus'] ) ) {
		$contactmethods['googleplus'] = 'Google+';
	}

	return $contactmethods;
}

add_filter( 'user_contactmethods', 'lr_update_contact_methods', 10, 1 );

/**
 * Extras and Includes
 */

require get_template_directory() . '/inc/utilities.php';
require get_template_directory() . '/inc/blog_settings.php';
require get_template_directory() . '/inc/nav_walker.php';
require get_template_directory() . '/inc/shortcodes.php';
require get_template_directory() . '/inc/post_types.php';

?>