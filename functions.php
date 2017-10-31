<?php
/**
 * kindergarten functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package kindergarten
 */

if ( ! function_exists( 'kindergarten_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function kindergarten_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on kindergarten, use a find and replace
	 * to change 'kindergarten' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'kindergarten', get_template_directory() . '/languages' );

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
		'main-menu' => esc_html__( 'Primary', 'kindergarten' ),
    'socials-menu' => esc_html__( 'Socials', 'kindergarten' ),
    'secondary-menu' => esc_html__('Secondary', 'kindergarten')
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
	add_theme_support( 'custom-background', apply_filters( 'kindergarten_custom_background_args', array(
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
add_action( 'after_setup_theme', 'kindergarten_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function kindergarten_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'kindergarten_content_width', 640 );
}
add_action( 'after_setup_theme', 'kindergarten_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function kindergarten_widgets_init() {
	register_sidebar( array(
		'name'          => 'Нижний сайдбар',
		'id'            => 'sidebar-bottom',
		'description'   => 'Добавьте сюда виджеты',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'kindergarten_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function kindergarten_scripts() {
	wp_enqueue_style( 'kindergarten-style', get_stylesheet_uri() );

  wp_enqueue_style( 'owl-carousel-style', get_template_directory_uri() . '/node_modules/owl.carousel/dist/assets/owl.carousel.min.css' );

  wp_enqueue_style( 'owl-carousel-theme', get_template_directory_uri() . '/node_modules/owl.carousel/dist/assets/owl.theme.default.min.css' );

	wp_enqueue_script( 'kindergarten-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'kindergarten-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

  wp_enqueue_script( 'kindergarten-menu-toggle', get_template_directory_uri() . '/js/menu-toggle.js', array(), '20170816', true);

  wp_enqueue_script( 'owl-carousel-script', get_template_directory_uri() . '/node_modules/owl.carousel/dist/owl.carousel.min.js');

//  wp_enqueue_script( 'owl-carousel-init', get_template_directory_uri() . '/js/owl-carousel-init.js');

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'kindergarten_scripts' );

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
require get_template_directory() . '/inc/jetpack.php';

/**
 * SVG icons functions and filters.
 */
require get_parent_theme_file_path( '/inc/icon-functions.php' );

/**
 * Misc common php functions
 */
require get_parent_theme_file_path( '/inc/common-funcions.php' );


add_post_type_support( 'page', 'excerpt' );

/**/

add_filter('wp_nav_menu_items', 'kindergarten_add_login_logout_link', 10, 2);

function kindergarten_add_login_logout_link($items, $args) {

  if ( in_array($args->theme_location, array("secondary-menu","main-menu"), true) ) {

    ob_start();

    if ( ! is_user_logged_in() )
      $loginoutlink = '<a href="' . esc_url( wp_login_url($_SERVER['REQUEST_URI']) ) . '">' . __('Войти') . '</a>';
    else
      $loginoutlink = '<a href="' . esc_url( wp_logout_url("index.php") ) . '">' . __('Выйти') . '</a>';

    ob_end_clean();

    $items .= '<li class="kindergarten-loginout menu-item">'. $loginoutlink .'</li>';

  }


    return $items;
}

/*Add class if page is not a front page*/

add_filter( 'body_class', 'kindergarten_inner_page_class' );

function  kindergarten_inner_page_class( $classes ) {

  if ( !(is_front_page()) and (is_page())) {
    $classes[] = "page-inner";
  };

  return $classes;
}

/*Add widget with contact form */


