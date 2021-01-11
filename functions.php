<?php
/**
 * Citydreams-wp functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Citydreams-wp
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'citydreams_wp_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function citydreams_wp_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Citydreams-wp, use a find and replace
		 * to change 'citydreams-wp' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'citydreams-wp', get_template_directory() . '/languages' );

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
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'citydreams-wp' ),
				'headermenu' => esc_html__( 'Header Menu', 'citydreams-wp' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
        
        add_filter( 'nav_menu_item_id', 'change_menu_item_css_id', 10, 4 );

        function change_menu_item_css_id( $menu_id, $item, $args, $depth ) {
            return $args->theme_location === 'headermenu' ? '' : $menu_id;
        }
        /*удаление id в li
        */
        
        
        add_filter( 'nav_menu_css_class', 'change_menu_item_css_classes', 10, 4 );

        function change_menu_item_css_classes( $classes, $item, $args, $depth ) {
            if ( $args->theme_location === 'headermenu' ) {
                $classes = [ 'header__item' ];
            } else {
                $classes = [];
            }

            return $classes;
        }
        /*присвоение class в li
        */ 
        
        add_filter( 'nav_menu_link_attributes', 'change_menu_item_link_attributes', 10, 4 );

        function change_menu_item_link_attributes( $atts, $item, $args, $depth ) {
            if ( $args->theme_location === 'headermenu' ) {
                $atts['class'] = 'header__link';
            } else {
                $atts['class'] = '';
            }
            
            return $atts;
        }
        /*присвоение class в a
        */
        
        add_filter('navigation_markup_template', 'my_navigation_template', 10, 2 );
        
        function my_navigation_template( $template, $class ){
            /*
            Вид базового шаблона:
            <nav class="navigation %1$s" role="navigation">
                <h2 class="screen-reader-text">%2$s</h2>
                <div class="nav-links">%3$s</div>
            </nav>
            */

            return '
            <nav class="%1$s">
                <div class="pagination-links">%3$s</div>
            </nav>    
            ';
        }

        
        
        
        add_theme_support( 'custom-logo' );
        //*добавление свойства логотип
    
        
        
        add_filter('excerpt_more', function($more) {
            return "...";
        });
        //удаление [...] при обрезании текста с помощью excerpt_more
        
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

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'citydreams_wp_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'citydreams_wp_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function citydreams_wp_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'citydreams_wp_content_width', 640 );
}
add_action( 'after_setup_theme', 'citydreams_wp_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function citydreams_wp_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'citydreams-wp' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'citydreams-wp' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'citydreams_wp_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function citydreams_wp_scripts() {
	wp_enqueue_style( 'citydreams-wp-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'citydreams-wp-style', 'rtl', 'replace' );

	wp_enqueue_script( 'citydreams-wp-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'citydreams_wp_scripts' );

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

