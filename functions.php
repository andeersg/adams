<?php
/**
 * Adams functions and definitions
 *
 * @package Adams
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'adams_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function adams_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Adams, use a find and replace
	 * to change 'adams' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'adams', get_template_directory() . '/languages' );

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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'adams' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'adams_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // adams_setup
add_action( 'after_setup_theme', 'adams_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function adams_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'adams' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'adams_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function adams_scripts() {
  if (ENVIRONMENT == 'development') {
	  wp_enqueue_style( 'adams-style', get_stylesheet_directory_uri() . '/assets/css/style.css' );
  }
  else {
    wp_enqueue_style( 'adams-style', get_stylesheet_directory_uri() . '/assets/css/style.min.css' );
  }

  wp_enqueue_script( 'adams-theme', get_stylesheet_directory_uri() . '/assets/js/adams.js', array(), null, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

  //wp_deregister_script('jquery');
}
add_action( 'wp_enqueue_scripts', 'adams_scripts' );


/**
 * Re-add baseurl to links for sitemap.
 */
function adams_fix_urls($url, $post) {
  if (substr($url, 0, 1) == '/') {
    return home_url() . $url;
  }
  else {
    return $url;
  }
}
add_filter('wpseo_xml_sitemap_post_url', 'adams_fix_urls', 10,  2);


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

/**
 * Load Comment stuff
 */
require get_template_directory() . '/inc/comments-extra.php';
