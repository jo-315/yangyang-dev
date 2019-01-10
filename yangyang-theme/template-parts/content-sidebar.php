<aside class="sidebar-wrap">

	<!-- 人気記事 -->
	<div class="sidebar-content recommend-article">
		<div class="sidebar-title">
			人気記事
		</div>
		<ul>
			<?php
				$the_query = new WP_Query(array(
					'post_status' => 'published',
					'post_type' => 'post',
					'orderby' => 'meta_value_num',
					'meta_key' => '_liked',
					'paged' => (get_query_var('paged')) ? get_query_var('paged') : 1,
					'posts_per_page'=> '3'
				));
			?>

			<?php
			  $count = 0;
			  while($the_query->have_posts()):$the_query->the_post();

				$count += 1;
			?>

				<?php
					// $category = get_the_category();
					// $cat_name = $category[0]->cat_name;
				?>

		 		<li class="article-wrap article-rank-wrap-<?php echo $count?>">
		 			<a href="<?php the_permalink(); ?>" class="article-link sidebar-link">
						<div class="article_rank_title article_rank_title-<?php echo $count?>">
							<?php echo $count?>
						</div>

						<div class="sidebar-img">
							<?php yangyang_theme_post_thumbnail(); ?>
						</div>

		 				<div class="sidebar-desc">

		 					<div class="sidebar-item-title">
		 						<?php the_title( '<span>', '</span>' ); ?>
		 					</div>

 							<div class="sidebar-desc-author">
 								<?php yangyang_theme_posted_by(); ?>
 							</div>
						</div>
		 			</a>
		 		</li>
			<?php
		    endwhile;
			?>
		</ul>
	</div>

	<!-- アクセスランキング -->
	<div class="sidebar-content popular-article">
		<div class="sidebar-title">
			アクセスランキング
			<!-- <img
				src="<?php echo get_stylesheet_directory_uri(); ?>/img/header-jo.png"
				class="header-logo"
			> -->
		</div>
		<ul>

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

			<?php
			  $count = 0;
			  foreach( $posts as $post ) : setup_postdata( $post );

				$count += 1;
			?>

				<?php
					// $category = get_the_category();
					// $cat_name = $category[0]->cat_name;
				?>

		 		<li class="article-wrap article-rank-wrap-<?php echo $count?>">
		 			<a href="<?php the_permalink(); ?>" class="article-link sidebar-link">
						<div class="article_rank_title article_rank_title-<?php echo $count?>">
							<?php echo $count?>
						</div>

						<div class="sidebar-img">
							<?php yangyang_theme_post_thumbnail(); ?>
						</div>

		 				<div class="sidebar-desc">

		 					<div class="sidebar-item-title">
		 						<?php the_title( '<span>', '</span>' ); ?>
		 					</div>

 							<div class="sidebar-desc-author">
 								<?php yangyang_theme_posted_by(); ?>
 							</div>
						</div>
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

	<a href="https://px.a8.net/svt/ejp?a8mat=356QIC+B2B0HE+4704+5Z6WX" target="_blank" rel="nofollow">
	<img border="0" width="300" height="250" alt="" src="https://www23.a8.net/svt/bgt?aid=190110900669&wid=001&eno=01&mid=s00000019570001004000&mc=1"></a>
	<img border="0" width="1" height="1" src="https://www19.a8.net/0.gif?a8mat=356QIC+B2B0HE+4704+5Z6WX" alt="">
</aside>
