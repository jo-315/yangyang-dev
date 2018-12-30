<div class='single-content'>
  <header>
		<div class="single-title-wrap">
			<?php
			the_title( '<h1 class="single-title">', '</h1>' );
      ?>
      <div class="single-category">
        <?php
  			yangyang_category();
  			?>
      </div>

      <div class="posted_by single-content-posted_by">
        <?php yangyang_theme_posted_by_with_link(); ?>
      </div>

      <div class="posted_on single-content-posted_on">
        <?php yangyang_theme_posted_on(); ?>
      </div>
		</div>
	</header>

  <div class="single-content-main">
    <?php
      the_content( sprintf(
        wp_kses(
          /* translators: %s: Name of current post. Only visible to screen readers */
          __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'yangyang-theme' ),
            array(
              'span' => array(
              'class' => array(),
            ),
          )
        ),
        get_the_title()
      ) );

    ?>

  <div>
    人気記事ランキングに反映されます。クリックお願いします！
  </div>

  </div>
</div>
