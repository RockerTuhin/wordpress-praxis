<?php
/**
 * Praxis functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Praxis
 */

if ( ! function_exists( 'praxis_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function praxis_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Praxis, use a find and replace
		 * to change 'praxis' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'praxis', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Header Top Menu', 'praxis' ),
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
		add_theme_support( 'custom-background', apply_filters( 'praxis_custom_background_args', array(
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
add_action( 'after_setup_theme', 'praxis_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function praxis_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'praxis_content_width', 640 );
}
add_action( 'after_setup_theme', 'praxis_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function praxis_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'praxis' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'praxis' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'praxis' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'praxis' ),
		'before_widget' => '<div id="%1$s" class="widget text-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 2', 'praxis' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here.', 'praxis' ),
		'before_widget' => '<div id="%1$s" class="widget text-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 3', 'praxis' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Add widgets here.', 'praxis' ),
		'before_widget' => '<div id="%1$s" class="widget text-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 4', 'praxis' ),
		'id'            => 'footer-4',
		'description'   => esc_html__( 'Add widgets here.', 'praxis' ),
		'before_widget' => '<div id="%1$s" class="widget text-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'praxis_widgets_init' );
//FONTS ENQUEUE KORAR JONNO EI FUNCTION
function praxis_fonts_url()
{
	$fonts_url = '';

	/*
	 * Translators: If there are characters in your language that are not
	 * supported by Libre Franklin, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$libre_franklin = _x( 'on', 'Libre Franklin font: on or off', 'praxis' );

	if ( 'off' !== $libre_franklin ) {
		$font_families = array();

		$font_families[] = 'Roboto:300,400,500';
		$font_families[] = 'Source Sans Pro:300,400,600,700';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

/**
 * Enqueue scripts and styles.
 */
function praxis_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'praxis-fonts', praxis_fonts_url(), array(), null );
	wp_enqueue_style( 'praxis-style',get_stylesheet_uri() );
	wp_enqueue_style('plugins',get_template_directory_uri() . '/assets/css/plugins.css');
	wp_enqueue_style('style',get_template_directory_uri() . '/assets/css/style.css');
	wp_enqueue_style('custom',get_template_directory_uri() . '/assets/css/custom.css');
	wp_enqueue_script( 'modernizr',get_template_directory_uri() . '/assets/js/vendor/modernizr-2.8.3.min.js', array(), '20151215', false );
	wp_enqueue_script( 'plugins',get_template_directory_uri() . '/assets/js/plugins.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'main',get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'praxis_scripts' );

//CODESTAR FRAMEWORK USE KORE METABOX OPTION BANANOR JONNO BY ME
require get_template_directory() . '/inc/metabox-option-codestar.php';
//FOR ADDING INLINE STYLE USING THEME OPTION BY CODESTAR FRAMEWORK
require get_template_directory() . '/inc/theme-option-inline-style.php';
//FOR ADDING SOME FUNCTION BY ME
require get_template_directory() . '/inc/helper.php';
//CODESTAR FRAMEWORK USE KORE THEME OPTION BANANOR JONNO BY ME
require get_template_directory() . '/inc/theme-option-codestar-framework.php';
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


//SHORT CODE LEKHAR RULES
add_shortcode('service','shortcode_service');
function shortcode_service($attr)
{
	$output = shortcode_atts(array(
		's_title' => '',
		'color' => '',
	),$attr);
	extract($output);

	?>
	<!-- Start Service Section -->
        <section class="service section black-bg">
            <div class="container">
                <div class="section-header text-center">
                    <h2 style="color: <?php echo $color;?>"><?php echo $s_title;?></h2>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit</p>
                </div>
                <div class="row flex">
                    <div class="col-md-4 col-sm-6">
                        <div class="single-service">
                            <i class="icon-circle-compass"></i>
                            <h3>DESIGN</h3>
                            <p>Lorem ipsum dolor sit amet, consectet-uer adipiscing elit. </p>
                        </div>
                    </div><!-- .col -->
                    <div class="col-md-4 col-sm-6">
                        <div class="single-service">
                            <i class="icon-tools2"></i>
                            <h3>SUPPORT</h3>
                            <p>Lorem ipsum dolor sit amet, consectet-uer adipiscing elit. </p>
                        </div>
                    </div><!-- .col -->
                    <div class="col-md-4 col-sm-6">
                        <div class="single-service">
                            <i class="icon-anchor"></i>
                            <h3>BRANDING</h3>
                            <p>Lorem ipsum dolor sit amet, consectet-uer adipiscing elit. </p>
                        </div>
                    </div><!-- .col -->
                    <div class="col-md-4 col-sm-6">
                        <div class="single-service">
                            <i class="icon-linegraph"></i>
                            <h3>MARKETING</h3>
                            <p>Lorem ipsum dolor sit amet, consectet-uer adipiscing elit. </p>
                        </div>
                    </div><!-- .col -->
                    <div class="col-md-4 col-sm-6">
                        <div class="single-service">
                            <i class="icon-megaphone"></i>
                            <h3>PROMOTION</h3>
                            <p>Lorem ipsum dolor sit amet, consectet-uer adipiscing elit. </p>
                        </div>
                    </div><!-- .col -->
                    <div class="col-md-4 col-sm-6">
                        <div class="single-service">
                            <i class="icon-computer_duel"></i>
                            <h3>DEVELOPMENT</h3>
                            <p>Lorem ipsum dolor sit amet, consectet-uer adipiscing elit. </p>
                        </div>
                    </div><!-- .col -->
                </div>
            </div>
        </section>
        <!-- End Service Section -->
	<?
}

