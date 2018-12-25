<?php
	$category = get_the_category();
	$cat_name = $category[0]->cat_name;
?>
<div class="content-article-wrap article-wrap article-wrap-<?php echo $cat_name?>">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<a href="<?php the_permalink(); ?>" class="article-link">
		<div class="article-category article-category-<?php echo $cat_name?>">
			<?php echo $cat_name ?>
		</div>

		<div class="article-thumbnail-wrap">
			<?php yangyang_theme_post_thumbnail(); ?>
		</div>

		<header class="article-header">

			<div class="article-title-wrap">
				<?php
					if ( is_singular() ) :
						the_title( '<h1 class="article-title">', '</h1>' );
					else :
						the_title( '<h2 class="article-title">', '</h2>' );
					endif;
				?>
			</div>

			<div class="article-meta">

				<?php if ( 'post' === get_post_type() ) : ?>

					<div class="posted_by content-posted_by">
						<?php yangyang_theme_posted_by(); ?>
					</div>

					<div class="posted_on content-posted_on">
						<?php yangyang_theme_posted_on(); ?>
					</div>

				<?php endif; ?>

			</div>
		</header>

		</a>

	</article>
</div>
