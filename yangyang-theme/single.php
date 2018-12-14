<?php
get_header();
?>

<div class="content-area">
	<div class="content-wrap">

		<?php get_template_part( 'template-parts/content', 'navigation' ); ?>

		<main id="main" class="site-main">

			<div class="site-main-articles-wrap">

				<?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content-single', get_post_type() );

					the_post_navigation();

				endwhile;
				?>

			</div>

		</main>

		<?php get_template_part( 'template-parts/content', 'sidebar' ); ?>

	</div>
</div>

<?php
get_footer();
