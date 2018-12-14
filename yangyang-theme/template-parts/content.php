<?php
	$category = get_the_category();
	$cat_name = $category[0]->cat_name;
	$cat_id   = $category[0]->cat_ID;
?>
<div class="article-wrap">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="article-category article-category-<?php echo $cat_id?>">
			<?php echo $cat_name ?>
		</div>

		<?php yangyang_theme_post_thumbnail(); ?>

		<header class="entry-header">
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;

			if ( 'post' === get_post_type() ) :
				?>
				<div class="entry-meta">
					<?php
					yangyang_theme_posted_on();
					yangyang_theme_posted_by();
					?>
				</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->
	</article>
</div>
