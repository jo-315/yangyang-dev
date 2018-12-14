<?php
get_header();
?>

	<div class="content-area">
		<div class="content-wrap">

			<?php get_template_part( 'template-parts/content', 'navigation' ); ?>

			<main id="main" class="site-main">

				<div class="site-main-title-wrap">
					<div class="site-main-title">
	          新着記事
					</div>
					<div class="site-main-title--img-wrap">
						<img
							src="<?php echo get_stylesheet_directory_uri(); ?>/img/index-article-title.png"
							class="site-main-title--img"
						/>
					</div>
				</div>

				<div class="site-main-articles-wrap">

					<?php
					if ( have_posts() ) :

						while ( have_posts() ) :
							the_post();

							get_template_part( 'template-parts/content', get_post_type() );

						endwhile;

						the_posts_navigation();

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif;
					?>

				</div>

			</main>

			<?php get_template_part( 'template-parts/content', 'sidebar' ); ?>

		</div>

	</div>

<?php
get_footer();
