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

	if (is_single()) {
		wp_enqueue_style( 'yangyang-theme-style_single', get_template_directory_uri() . '/css/single.css' );
	} elseif (is_page()){
		wp_enqueue_script( 'yangyang-theme-style_modaal', get_template_directory_uri() . '/js/modaal.min.js', array('jquery') );
	} else {
		wp_enqueue_style( 'yangyang-theme-style_archive', get_template_directory_uri() . '/css/archive.css' );
	}

	wp_enqueue_style( 'yangyang-theme-font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css' );

	wp_enqueue_script( 'yangyang-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), '20151215', true );

	wp_enqueue_script( 'yangyang-theme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array('jquery'), '20151215', true );

	wp_enqueue_script( 'yangyang-theme-original', get_template_directory_uri() . '/js/original.js', array('jquery') );

	wp_enqueue_script( 'lazysize-yangyang' ,get_template_directory_uri() . '/js/lazysizes.min.js');

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'yangyang_theme_scripts' );

// headerの不要タグを削除
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'feed_links_extra', 3);

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

//アクセス数をカウントする
function set_post_views() {
	$postID = get_the_ID();
	$num = (int)date_i18n('H'); // 現在時間で番号取得
	$key = 'pv_count';
	$count_key = '_pv_count';
	$count_array = get_post_meta( $postID, $count_key, true );
	$sum_count = get_post_meta( $postID, $key, true );
	if( !is_array($count_array) ) { //配列ではない
		$count_array = array();
		$count_array[$num] = 1;
	} else { //配列である
		if ( isset( $count_array[$num] ) ) { //カウント配列[n]が存在する
			$count_array[$num] += 1;
		} else { //カウント配列[n]が存在しない
			$count_array[$num] = 1;
		}
	}
	//アクセス数を更新する
	update_post_meta( $postID, $count_key, $count_array );
	update_post_meta( $postID, $key, $sum_count + 1 );
}

//アクセス数をリセットする
function reset_post_views() {
	$num = (int)date_i18n('H');
	$key = 'pv_count';
	$reset_key = '_pv_count';
	$args = array(
		'posts_per_page'   => -1,
		'post_type' => 'post',
		'post_status'=>'publish',
		'meta_key' => $reset_key,
	);
	$reset_posts = get_posts($args);
	if($reset_posts):
		foreach($reset_posts as $reset_post):
			$postID = $reset_post->ID;
			$count_array = get_post_meta( $postID , $reset_key, true );
			if ( isset( $count_array[$num] ) ) { //カウント配列[n]が存在する
				$count_array[$num] = 0;
			}
			//アクセス数をリセットする
			update_post_meta( $postID, $reset_key, $count_array );
			update_post_meta( $postID, $key, array_sum( $count_array ) );
		endforeach;
	endif;
}

//リセット関数を実行するアクションフックを追加
add_action( 'set_hours_event', 'reset_post_views' );

//実行間隔の追加
function my_interval( $schedules ) {
	// 1時間ごとを追加
	$schedules['1hours'] = array(
		'interval' => 3600,
		'display' => 'every 1 hours'
	);
	return $schedules;
}
add_filter( 'cron_schedules', 'my_interval' );

//アクションフックを定期的に実行するスケジュールイベントの追加
function my_activation() {
	if ( ! wp_next_scheduled( 'set_hours_event' ) ) {
		wp_schedule_event( 1451574000, '1hours', 'set_hours_event' );
	}
}
add_action('wp', 'my_activation');

//ボットの判別
function isBot() {
	$bot_list = array (
	'Googlebot',
	'Yahoo! Slurp',
	'Mediapartners-Google',
	'msnbot',
	'bingbot',
	'MJ12bot',
	'Ezooms',
	'pirst; MSIE 8.0;',
	'Google Web Preview',
	'ia_archiver',
	'Sogou web spider',
	'Googlebot-Mobile',
	'AhrefsBot',
	'YandexBot',
	'Purebot',
	'Baiduspider',
	'UnwindFetchor',
	'TweetmemeBot',
	'MetaURI',
	'PaperLiBot',
	'Showyoubot',
	'JS-Kit',
	'PostRank',
	'Crowsnest',
	'PycURL',
	'bitlybot',
	'Hatena',
	'facebookexternalhit',
	'NINJA bot',
	'YahooCacheSystem',
	'NHN Corp.',
	'Steeler',
	'DoCoMo',
	);
	$is_bot = false;
	foreach ($bot_list as $bot) {
		if (stripos($_SERVER['HTTP_USER_AGENT'], $bot) !== false) {
			$is_bot = true;
			break;
		}
	}
	return $is_bot;
}

// add defer
if (!(is_admin() )) {
function add_defer_to_enqueue_script( $url ) {
    if ( FALSE === strpos( $url, '.js' ) ) return $url;
    if ( strpos( $url, 'jquery.min.js' ) ) return $url;
    return "$url' defer charset='UTF-8";
}
add_filter( 'clean_url', 'add_defer_to_enqueue_script', 11, 1 );
}

// ［メディアを挿入/編集］にメタフィールドを追加
// クラス
function my_add_attachment_class_field( $form_fields, $post ) {
	$field_value = get_post_meta( $post->ID, 'class', true );
	$form_fields['class'] = array(
			'value' => $field_value ? $field_value : '',
			'label' => __( 'class' ),
			'helps' => __( 'Trip, Daily, Art...' )
	);
	return $form_fields;
}
add_filter( 'attachment_fields_to_edit', 'my_add_attachment_class_field', 10, 2 );

function my_save_attachment_class( $attachment_id ) {
	if ( isset( $_REQUEST['attachments'][$attachment_id]['class'] ) ) {
			$class = $_REQUEST['attachments'][$attachment_id]['class'];
			update_post_meta( $attachment_id, 'class', $class );
	}
}
add_action( 'edit_attachment', 'my_save_attachment_class' );

// キーワード
function my_add_attachment_keyword_field( $form_fields, $post ) {
	$field_value = get_post_meta( $post->ID, 'keyword', true );
	$form_fields['keyword'] = array(
			'value' => $field_value ? $field_value : '',
			'label' => __( 'keyword' ),
			'helps' => __( 'Norway, Hawaii...' )
	);
	return $form_fields;
}
add_filter( 'attachment_fields_to_edit', 'my_add_attachment_keyword_field', 10, 2 );

function my_save_attachment_keyword( $attachment_id ) {
	if ( isset( $_REQUEST['attachments'][$attachment_id]['keyword'] ) ) {
			$keyword = $_REQUEST['attachments'][$attachment_id]['keyword'];
			update_post_meta( $attachment_id, 'keyword', $keyword );
	}
}
add_action( 'edit_attachment', 'my_save_attachment_keyword' );

// ユーザー
function my_add_attachment_author_field( $form_fields, $post ) {
	$field_value = get_post_meta( $post->ID, 'author', true );
	$form_fields['author'] = array(
			'value' => $field_value ? $field_value : '',
			'label' => __( 'author' ),
			'helps' => __( 'jo or yanyan' )
	);
	return $form_fields;
}
add_filter( 'attachment_fields_to_edit', 'my_add_attachment_author_field', 10, 2 );

function my_save_attachment_author( $attachment_id ) {
	if ( isset( $_REQUEST['attachments'][$attachment_id]['author'] ) ) {
			$author = $_REQUEST['attachments'][$attachment_id]['author'];
			update_post_meta( $attachment_id, 'author', $author );
	}
}
add_action( 'edit_attachment', 'my_save_attachment_author' );

// url
function my_add_attachment_relation_field( $form_fields, $post ) {
	$field_value = get_post_meta( $post->ID, 'relation', true );
	$form_fields['relation'] = array(
			'value' => $field_value ? $field_value : '',
			'label' => __( 'relation' ),
			'helps' => __( '画像を載せている記事のurl' )
	);
	return $form_fields;
}
add_filter( 'attachment_fields_to_edit', 'my_add_attachment_relation_field', 10, 2 );

function my_save_attachment_relation( $attachment_id ) {
	if ( isset( $_REQUEST['attachments'][$attachment_id]['relation'] ) ) {
			$relation = $_REQUEST['attachments'][$attachment_id]['relation'];
			update_post_meta( $attachment_id, 'relation', $relation );
	}
}
add_action( 'edit_attachment', 'my_save_attachment_relation' );

// url先の記事名
function my_add_attachment_article_field( $form_fields, $post ) {
	$field_value = get_post_meta( $post->ID, 'article', true );
	$form_fields['article'] = array(
			'value' => $field_value ? $field_value : '',
			'label' => __( 'article' ),
			'helps' => __( '画像を載せている記事のurl先の記事名' )
	);
	return $form_fields;
}
add_filter( 'attachment_fields_to_edit', 'my_add_attachment_article_field', 10, 2 );

function my_save_attachment_article( $attachment_id ) {
	if ( isset( $_REQUEST['attachments'][$attachment_id]['article'] ) ) {
			$article = $_REQUEST['attachments'][$attachment_id]['article'];
			update_post_meta( $attachment_id, 'article', $article );
	}
}
add_action( 'edit_attachment', 'my_save_attachment_article' );

/**
* ページネーション出力関数
* $paged : 現在のページ
* $pages : 全ページ数
* $range : 左右に何ページ表示するか
* $show_only : 1ページしかない時に表示するかどうか
*/
function pagination( $pages, $paged, $range = 2, $show_only = false ) {

	$pages = ( int ) $pages;    //float型で渡ってくるので明示的に int型 へ
	$paged = $paged ?: 1;       //get_query_var('paged')をそのまま投げても大丈夫なように

	//表示テキスト
	$text_first   = "« 最初へ";
	$text_before  = "‹ 前へ";
	$text_next    = "次へ ›";
	$text_last    = "最後へ »";

	if ( $show_only && $pages === 1 ) {
			// １ページのみで表示設定が true の時
			echo '<div class="pagination"><span class="current pager">1</span></div>';
			return;
	}

	if ( $pages === 1 ) return;    // １ページのみで表示設定もない場合

	if ( 1 !== $pages ) {
			//２ページ以上の時
			echo '<div class="pagination"><span class="page_num">Page ', $paged ,' of ', $pages ,'</span>';
			if ( $paged > $range + 1 ) {
					// 「最初へ」 の表示
					echo '<a href="', get_pagenum_link(1) ,'" class="first">', $text_first ,'</a>';
			}
			if ( $paged > 1 ) {
					// 「前へ」 の表示
					echo '<a href="', get_pagenum_link( $paged - 1 ) ,'" class="prev">', $text_before ,'</a>';
			}
			for ( $i = 1; $i <= $pages; $i++ ) {

					if ( $i <= $paged + $range && $i >= $paged - $range ) {
							// $paged +- $range 以内であればページ番号を出力
							if ( $paged === $i ) {
									echo '<span class="current pager">', $i ,'</span>';
							} else {
									echo '<a href="', get_pagenum_link( $i ) ,'" class="pager">', $i ,'</a>';
							}
					}

			}
			if ( $paged < $pages ) {
					// 「次へ」 の表示
					echo '<a href="', get_pagenum_link( $paged + 1 ) ,'" class="next">', $text_next ,'</a>';
			}
			if ( $paged + $range < $pages ) {
					// 「最後へ」 の表示
					echo '<a href="', get_pagenum_link( $pages ) ,'" class="last">', $text_last ,'</a>';
			}
			echo '</div>';
	}
}