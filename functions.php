<?php
/**
 * Scraply functions and definitions
 *
 * @package Scraply
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'scraply_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function scraply_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Scraply, use a find and replace
	 * to change 'scraply' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'scraply', get_template_directory() . '/languages' );

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
		'primary' => __( 'Primary Menu', 'scraply' ),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'scraply_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
	) );
}
endif; // scraply_setup
add_action( 'after_setup_theme', 'scraply_setup' );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function scraply_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'scraply' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'scraply_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function scraply_scripts() {
	wp_enqueue_style( 'scraply-style', get_stylesheet_uri() );

	wp_enqueue_script( 'scraply-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'scraply-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'scraply_scripts' );


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









/**
 * Image Gallery
 */

function the_attachment_link_2( $id = 0, $fullsize = false, $deprecated = false, $permalink = false ) {
	if ( !empty( $deprecated ) )
		_deprecated_argument( __FUNCTION__, '2.5' );

	if ( $fullsize )
		echo wp_get_attachment_link_2($id, 'full', $permalink);
	else
		echo wp_get_attachment_link_2($id, 'thumbnail', $permalink);
}

function wp_get_attachment_link_2( $id = 0, $size = 'thumbnail', $permalink = false, $icon = false, $text = false ) {
	$id = intval( $id );
	$_post = get_post( $id );

	if ( empty( $_post ) || ( 'attachment' != $_post->post_type ) || ! $url = wp_get_attachment_url( $_post->ID ) )
		return __( 'Missing Attachment' );

	if ( $permalink )
		$url = get_attachment_link( $_post->ID );

	$post_title = esc_attr( $_post->post_title );

	if ( $text )
		$link_text = $text;
	elseif ( $size && 'none' != $size )
		$link_text = wp_get_attachment_image( $id, $size, $icon );
	else
		$link_text = '';

	if ( trim( $link_text ) == '' )
		$link_text = $_post->post_title;

	return apply_filters( 'wp_get_attachment_link', "<a>$link_text</a>", $id, $size, $permalink, $icon, $text );
}

// unattached Images
function get_attachment_files(){
$args = array(
	 'posts_per_page'   => 15,
    'post_type' => 'attachment',
    'numberposts' => -1,
    'post_status' => null,
    'post_parent' => 0,
);
$attachments = get_posts($args);
 if ($attachments) {
 	echo '<section id="gallery">';
    foreach ($attachments as $post) {
        setup_postdata($post);
        the_attachment_link_2($post->ID);
    }
    echo '</section>';
 }
 else {
 	get_template_part( 'content', 'none' );
 }
}
