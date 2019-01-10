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

  <div class="single_ad_block">
    <a href="https://px.a8.net/svt/ejp?a8mat=356QIC+C7ZCTU+29HM+6AC5D" target="_blank" rel="nofollow">
    <img border="0" width="300" height="250" alt="" src="https://www25.a8.net/svt/bgt?aid=190110900739&wid=001&eno=01&mid=s00000010561001056000&mc=1"></a>
    <img border="0" width="1" height="1" src="https://www11.a8.net/0.gif?a8mat=356QIC+C7ZCTU+29HM+6AC5D" alt="">

    <a href="https://px.a8.net/svt/ejp?a8mat=356QIC+CR186Q+465A+60H7L" target="_blank" rel="nofollow">
    <img border="0" width="300" height="250" alt="" src="https://www22.a8.net/svt/bgt?aid=190110900771&wid=001&eno=01&mid=s00000019459001010000&mc=1"></a>
    <img border="0" width="1" height="1" src="https://www14.a8.net/0.gif?a8mat=356QIC+CR186Q+465A+60H7L" alt="">
  </div>

  </div>
</div>
