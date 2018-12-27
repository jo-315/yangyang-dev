<?php
get_header();
?>

<?php
	$page_category = get_the_category();
	$page_cat_name = $page_category[0]->cat_name;
	$page_cat_id   = $page_category[0]->cat_ID;
?>

<div class="content-area">
	<div class="content-wrap">

		<?php get_template_part( 'template-parts/content', 'navigation' ); ?>

		<div class="site-main-wrap">
			<main id="main" class="site-main">

				<div class="site-main-articles-wrap">

					<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content-single', get_post_type() );

					endwhile;
					?>

				</div>

				<div class="snsShareArea">
					<!-- Twitter -->
					<a class="btn--twitter" href="http://twitter.com/share?url=<?php the_permalink();?>&text=<?php echo get_the_title(); ?>&via=b3OJjuMQqAvlmO7&related=b3OJjuMQqAvlmO7" target="_blank" rel="nofollow">
						Twitter
					</a>

					<!-- Facebook -->
					<a href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>&t=<?php echo get_the_title(); ?>" class="btn--facebook" target="_blank" rel="nofollow">
						Facebook
					</a>

					<!-- Line -->
					<a class="btn--line" href="https://social-plugins.line.me/lineit/share?url=<?php the_permalink(); ?>" target="_blank" rel="nofollow">
						LINE
					</a>
				</div>


			</main>

			<?php get_template_part( 'template-parts/content', 'sidebar' ); ?>
		</div>
	</div>
</div>

<div class="single-show-article">
	<!-- 同カテゴリの記事 -->
	<div class="related-post-wrap">
		<div class="related-post-title">
			<?php echo $page_cat_name ?>の記事
		</div>

		<ul class="related-post-content clear">

			<?php
				$related_categories = get_the_category($post->ID);
				$related_cat_name = $related_categories[0]->cat_name;
				$related_cat_id   = $related_categories[0]->cat_ID;

				$category_ID = array();

				foreach($related_categories as $category){
						array_push($category_ID,$category->cat_ID);
				}

				$posts_number = 4; // 表示したい件数を指定

				$args = array(
						'post__not_in'=>array($post->ID), // 現在のページの投稿を除外
						'category__in'=>$category_ID, // 現在の投稿のカテゴリーの関連記事を取得
						'orderby'=>'rand', // ランダムに並べる
						'posts_per_page'=>$posts_number, // 表示する件数の指定
				);
				$query = new WP_Query($args);

				while($query->have_posts()):$query->the_post();
			?>

			<li class="article-wrap article-wrap-<?php echo $related_cat_name?>">
				<a href="<?php the_permalink(); ?>" class="article-link">
					<div class="article-category article-category-<?php echo $related_cat_name?> single-category">
						<?php echo $related_cat_name ?>
					</div>

					<div class="article-thumbnail-wrap single-post-thumbnail">
						<?php yangyang_theme_post_thumbnail(); ?>
					</div>

					<header class="article-header">

						<div class="article-title-wrap related-post-title-wrap">
							<?php the_title( '<span>', '</span>' ); ?>
						</div>

						<div class="article-meta">

							<?php if ( 'post' === get_post_type() ) : ?>

								<div class="posted_by single-posted_by">
									<?php yangyang_theme_posted_by(); ?>
								</div>

								<div class="posted_on single-posted_on">
									<?php yangyang_theme_posted_on(); ?>
								</div>

							<?php endif; ?>

						</div>
					</header>
				</a>
			</li>

			<?php endwhile; ?>

		</ul>
	</div>

	<!-- アクセスランキング -->
	<div class="single--popular-post-wrap">
		<div class="single--popular-post-title">
			アクセスランキング
		</div>

		<ul class="related-post-content clear">

			<?php if( is_single() && !is_user_logged_in() && !isBot() ): //個別記事 かつ ログインしていない かつ 非ボット
				set_post_views(); //アクセスをカウントする
			endif; ?>

			<?php
				$args = array(
					'post_type'     => 'post',
					'numberposts'   => 4,       //表示数
					'meta_key'      => 'pv_count',
					'orderby'       => 'meta_value_num',
					'order'         => 'DESC',
				);
				$posts = get_posts( $args );
				if( $posts ):
			?>

			<?php foreach( $posts as $post ) : setup_postdata( $post ); ?>

				<?php
					$category = get_the_category();
					$cat_name = $category[0]->cat_name;
					$cat_id   = $category[0]->cat_ID;
				?>

		 		<li class="article-wrap article-wrap-<?php echo $cat_name?>">
		 			<a href="<?php the_permalink(); ?>" class="article-link">
		 				<div class="article-category article-category-<?php echo $cat_name?> single-category">
		 					<?php echo $cat_name ?>
		 				</div>

		 				<div class="article-thumbnail-wrap single-post-thumbnail">
		 					<?php yangyang_theme_post_thumbnail(); ?>
		 				</div>

		 				<header class="article-header">

		 					<div class="article-title-wrap related-post-title-wrap">
		 						<?php the_title( '<span>', '</span>' ); ?>
		 					</div>

		 					<div class="article-meta">

		 						<?php if ( 'post' === get_post_type() ) : ?>

		 							<div class="posted_by single-posted_by">
		 								<?php yangyang_theme_posted_by(); ?>
		 							</div>

		 							<div class="posted_on single-posted_on">
		 								<?php yangyang_theme_posted_on(); ?>
		 							</div>

		 						<?php endif; ?>

		 					</div>
		 				</header>
		 			</a>
		 		</li>
			<?php
		    endforeach;
				wp_reset_postdata();
			?>
			<?php else : ?>
				<p>アクセスランキングはまだ集計されていません。</p>
			<?php endif; ?>

		</ul>
	</div>
</div>

<?php
get_footer();
