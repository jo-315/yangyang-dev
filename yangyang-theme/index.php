<?php
get_header();
?>

	<div class="content-area">
		<div class="content-wrap">

			<?php get_template_part( 'template-parts/content', 'navigation' ); ?>

			<main id="main" class="site-main">

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

			</main><!-- #main -->

			<?php get_template_part( 'template-parts/content', 'sidebar' ); ?>

		</div>

	</div><!-- #primary -->

<?php
get_footer();
