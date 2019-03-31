<aside class="sidebar-wrap">

	<div class="sidebar_ad_wrap">
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<!-- リンク広告01 -->
		<ins class="adsbygoogle"
				style="display:block"
				data-ad-client="ca-pub-2828170763777117"
				data-ad-slot="2150476266"
				data-ad-format="link"
				data-full-width-responsive="true"></ins>
		<script>
		(adsbygoogle = window.adsbygoogle || []).push({});
		</script>
	</div>

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

	<div class="sidebar_follow">
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

		<div class="sidebar-content sidebar_ad_wrap">
			<a href="/tag/ノルウェー/" class="sidebar-img-link">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/norway.png" alt="" />
			</a>
		</div>

		<div class="sidebar_ad_wrap">
			<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
			<!-- サイドバー下部 -->
			<ins class="adsbygoogle"
					style="display:block"
					data-ad-client="ca-pub-2828170763777117"
					data-ad-slot="2874963630"
					data-ad-format="auto"
					data-full-width-responsive="true"></ins>
			<script>
			(adsbygoogle = window.adsbygoogle || []).push({});
			</script>
		</div>
	</div>
</aside>
