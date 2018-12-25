<aside class="sidebar-wrap">

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

				<?php foreach( $posts as $post ) : setup_postdata( $post ); ?>

					<?php
						$category = get_the_category();
						$cat_name = $category[0]->cat_name;
					?>

			 		<li class="article-wrap article-wrap-<?php echo $cat_name?>">
			 			<a href="<?php the_permalink(); ?>" class="article-link sidebar-link">
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

	</div>
	<div class="sidebar-content recommend-article">
	</div>
</aside>
