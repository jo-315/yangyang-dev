<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package yangyang
 */

if ( ! function_exists( 'yangyang_theme_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function yangyang_theme_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date('Y年 F d日') ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date('Y年 F d日') )
		);

		echo '<span class="posted-on">' . $time_string . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'yangyang_theme_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function yangyang_theme_posted_by() {
		$path = get_stylesheet_directory_uri() .'/img/'. get_the_author_meta('user_nicename') . '.png';
		$byline = (
			'<span class="author vcard">' . esc_html( get_the_author() ) . '</span>'
		);

		echo '<img data-src="'. $path .'" class="lazyload"><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'yangyang_theme_posted_by_with_link' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function yangyang_theme_posted_by_with_link() {
		$author = get_the_author();
		$path = get_stylesheet_directory_uri() .'/img/'. get_the_author_meta('user_nicename') . '.png';
		$byline = (
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( $author ) . '</a></span>'
		);

		echo '<img data-src="'. $path .'" class="lazyload"><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'yangyang_theme_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function yangyang_theme_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'yangyang-theme' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'yangyang-theme' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'yangyang-theme' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'yangyang-theme' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'yangyang-theme' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'yangyang-theme' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'yangyang_theme_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function yangyang_theme_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="article-thumbnail">
				<?php echo get_thumb_img(); ?>
			</div>

		<?php else : ?>

      <div class="index-article-thumbnail article-thumbnail">
				<?php echo get_thumb_img(); ?>
			</div>

		<?php
		endif; // End is_singular().
	}
endif;

if ( ! function_exists( 'get_thumb_img' ) ) :
	function get_thumb_img($size = 'full') {

		$thumb_id = get_post_thumbnail_id();                         // アイキャッチ画像のIDを取得

		$thumb_img = wp_get_attachment_image_src($thumb_id, $size);  // $sizeサイズの画像内容を取得

		$thumb_src = $thumb_img[0];    // 画像のurlだけ取得

		$thumb_alt = get_the_title();  //alt属性に入れるもの（記事のタイトルにしています）

		return '<img data-src="'.$thumb_src.'" alt="'.$thumb_alt.'" class="lazyload">';
	}
endif;
