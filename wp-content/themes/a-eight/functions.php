<?php
/**
 * A eight functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package A_eight
 */

if ( ! function_exists( 'a_eight_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function a_eight_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on A eight, use a find and replace
	 * to change 'a-eight' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'a-eight', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	// this will set up the image to be set to this size.
  add_image_size('special_feauture_size', 200, 300, true);    

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'a-eight' ),
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
	add_theme_support( 'custom-background', apply_filters( 'a_eight_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'a_eight_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function a_eight_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'a_eight_content_width', 640 );
}
add_action( 'after_setup_theme', 'a_eight_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function a_eight_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'a-eight' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'a-eight' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'a_eight_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function a_eight_scripts() {
	wp_enqueue_style( 'a-eight-style', get_stylesheet_uri() );

	wp_enqueue_style( 'a-eight-sidebar', get_template_directory_uri() . '/layouts/content-sidebar.css');

	wp_enqueue_style( 'a-eight-googlefonts', 'https://fonts.googleapis.com/css?family=Architects+Daughter|Baloo+Paaji|Nunito');

	wp_enqueue_script( 'a-eight-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'a-eight-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'a_eight_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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

//this is for the excerpt to change the ugly 3 dots
// whatever i want to put there reflects it
function a8_excerpt_more( $more ) {

		if (is_post_type_archive('student')) {
			return '<a class="read-more" href="' . get_permalink() . '">...Know more about the student...</a>';
		}

	return '<a class="read-more" href="' . get_permalink() . '">...Continue reading...</a>';
        
}
 add_filter( 'excerpt_more', 'a8_excerpt_more' );

// this is for the length of the excerpt
function a8_excerpt_length( $length ) {
        
        // conditional statement if the page is archive work
				// return the excerpt to whatever the number
				if (is_post_type_archive('student') ) {
					return 30;
				}

        return 45;

}
 add_filter( 'excerpt_length', 'a8_excerpt_length', 999 );