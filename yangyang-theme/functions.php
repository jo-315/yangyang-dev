<?php
/**
 * yangyang functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package yangyang
 */

if ( ! function_exists( 'yangyang_theme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function yangyang_theme_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on yangyang, use a find and replace
		 * to change 'yangyang-theme' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'yangyang-theme', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'yangyang-theme' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'yangyang_theme_custom_background_args', array(
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
add_action( 'after_setup_theme', 'yangyang_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function yangyang_theme_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'yangyang_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'yangyang_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function yangyang_theme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'yangyang-theme' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'yangyang-theme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'yangyang_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function yangyang_theme_scripts() {
	wp_enqueue_style( 'yangyang-theme-style', get_stylesheet_uri() );

	wp_enqueue_script( 'yangyang-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'yangyang-theme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'yangyang_theme_scripts' );

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

/**
 * パンくず
 */
function breadcrumb(){
 global $post;
 $str = '';
 $pNum = 2;
 $str.= '<div class="breadcrumb clear">';
 $str.= '<ul>';
 $str.= '<li ><a href="'.home_url('/').'" class="home">HOME</a></li>';

 /* 通常の投稿ページ  */
 if(is_singular('post')){
   $categories = get_the_category($post->ID);
   $cat = $categories[0];

   if($cat->parent != 0){
     $ancestors = array_reverse(get_ancestors($cat->cat_ID, 'category'));
     foreach($ancestors as $ancestor){
       $str.= '<li><img src="'.get_stylesheet_directory_uri().'/img/breadcrumb.png"><a href="'. get_category_link($ancestor).'"><span>'.get_cat_name($ancestor).'</span></a></li>';
     }
   }
   $str.= '<li><img src="'.get_stylesheet_directory_uri().'/img/breadcrumb.png"><a href="'. get_category_link($cat-> term_id). '"><span>'.$cat->cat_name.'</span></a></li>';
   $str.= '<li><img src="'.get_stylesheet_directory_uri().'/img/breadcrumb.png"><span>'.$post->post_title.'</span></li>';
 }

 /* 固定ページ */
 elseif(is_page()){
   $pNum = 2;
   if($post->post_parent != 0 ){
     $ancestors = array_reverse(get_post_ancestors($post->ID));
     foreach($ancestors as $ancestor){
       $str.= '<li><img src="'.get_stylesheet_directory_uri().'/img/breadcrumb.png"><a href="'. get_permalink($ancestor).'"><span>'.get_the_title($ancestor).'</span></a></li>';
     }
   }
   $str.= '<li><img src="'.get_stylesheet_directory_uri().'/img/breadcrumb.png"><span>'. $post->post_title.'</span></li>';
 }

 /* カテゴリページ */
 elseif(is_category()) {
   $cat = get_queried_object();
   $pNum = 2;
   if($cat->parent != 0){
     $ancestors = array_reverse(get_ancestors($cat->cat_ID, 'category'));
     foreach($ancestors as $ancestor){
       $str.= '<li><img src="'.get_stylesheet_directory_uri().'/img/breadcrumb.png"><a href="'. get_category_link($ancestor) .'"><span>'.get_cat_name($ancestor).'</span></a></li>';
     }
   }
   $str.= '<li><img src="'.get_stylesheet_directory_uri().'/img/breadcrumb.png"><span>'.$cat->name.'</span></li>';
 }

 /* タグページ */
 elseif(is_tag()){
   $str.= '<li><img src="'.get_stylesheet_directory_uri().'/img/breadcrumb.png"><span>'. single_tag_title('', false). '</span></li>';
 }

 /* 投稿者ページ */
 elseif(is_author()){
   $str.= '<li><img src="'.get_stylesheet_directory_uri().'/img/breadcrumb.png"><span>投稿者 : '.get_the_author_meta('display_name', get_query_var('author')).'</span></li>';
 }

 /* 404 Not Found ページ */
 elseif(is_404()){
   $str.= '<li><img src="'.get_stylesheet_directory_uri().'/img/breadcrumb.png"><span>お探しの記事は見つかりませんでした。</span></li>';
 }

 /* その他のページ */
 else{
   $str.= '<li><span>'.wp_title('', false).'</span></li>';
 }
 $str.= '</ul>';
 $str.= '</div>';

 echo $str;
}

// カテゴリーの表示
function yangyang_category() {
	$categories_list = get_the_category_list( ' ', '' );
	if ( $categories_list ) {
		printf(
			'<div class="cat-links-wrap">%1$s</span>',
			$categories_list
		);
	}
}
