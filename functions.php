<?php
/**
 * CleanBlog functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package CleanBlog
 */

if ( ! function_exists( 'cleanblog_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function cleanblog_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on CleanBlog, use a find and replace
	 * to change 'cleanblog' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'cleanblog', get_template_directory() . '/languages' );

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

	/**
	 * Image size
	 */
	add_image_size('header_banner' , 1900 , 872);
	add_image_size('post_fet' , 850 , 450);

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu('primaryMenu' , __('Primary Menu','cleanblog'));

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
	add_theme_support( 'custom-background', apply_filters( 'cleanblog_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'cleanblog_setup' );





/**
 * Enqueue scripts and styles.
 */
function cleanblog_scripts() {
	/**
	 * stylesheets
	 */
	wp_enqueue_style( 'cleanblog-style', get_stylesheet_uri() );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/vendor/bootstrap/css/bootstrap.min.css' );
	wp_enqueue_style( 'google-fonts-1', 'https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' );
	wp_enqueue_style( 'google-fonts-2', 'https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/vendor/font-awesome/css/font-awesome.min.css' );
	wp_enqueue_style( 'clean-blog', get_template_directory_uri() . '/css/clean-blog.min.css' );

	wp_enqueue_script( 'jquery-js', get_template_directory_uri() . '/vendor/jquery/jquery.min.js' );
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/vendor/bootstrap/js/bootstrap.min.js');
	wp_enqueue_script( 'jqBootstrapValidation-js', get_template_directory_uri() . '/js/jqBootstrapValidation.js' );
	wp_enqueue_script( 'contact_me-js', get_template_directory_uri() . '/js/contact_me.js' );
	wp_enqueue_script( 'clean-blog-js', get_template_directory_uri() . '/js/clean-blog.min.js' );


	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'cleanblog_scripts' );



	function cleanblog_inline_style(){ ?>
	
	<style type="text/css">
		a{
			color: <?php echo get_theme_mod('cleanblog_link_color'); ?>;
		}
		a:hover{
			color: <?php echo get_theme_mod('cleanblog_link_hover_color'); ?>;
		}
	</style>

	<?php }
	add_action('wp_head','cleanblog_inline_style');




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
