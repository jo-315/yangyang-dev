<div id="slider-area">
  <div id="slides" class="slides">
    <div id="slides-inner" class="slides-inner">
      <?php $args = array(
      'posts_per_page' => 4,
      'order' => 'DESC',
      'post__in' => array( '98', '109', '112' )
        );
        $my_query = new WP_Query( $args );?>
        <?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>

      <article <?php post_class( 'slidekiji' ); ?>>
        <a href="<?php the_permalink(); ?>">
          <?php the_post_thumbnail('large'); ?>
          <div class="text">
            <span class="kiji-date">
              <time
               datetime="<?php echo get_the_date( 'Y-m-d' ); ?>">
              <?php echo get_the_date(); ?>
               </time>
            </span>
            <span class="cat-data ">
               <?php if( has_category() ): ?>
                <?php $postcat=get_the_category(); echo $postcat[0]->name; ?>
              <?php endif; ?>
            </span>
            <h2><?php the_title(); ?></h2>
          </div>
        </a>
      </article>

      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
    </div>
  </div>
  <div id="slides-nav" class="slides-nav"></div>
</div>
