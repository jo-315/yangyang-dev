<?php
get_header('portfolio');
?>

<?php
  if(isset($_GET['class'])) {
    $class = $_GET['class'];
  }
  if(isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
  }
?>

<div class="portfolio_header">
  <h1><?php echo $keyword ? $keyword : $class; ?></h1>
  <p>portfolio</p>
  <img src='<?php echo get_stylesheet_directory_uri(); ?>/img/index_05.png' />
</div>

<div class="portfolio_content">
  <?php
    $paged = get_query_var('paged') ? get_query_var('paged') : 1;

    $meta_query = array(
      array(
        'key'     =>   'class',
        'value'   =>   $class,
        'compare' =>   '='
      ),
      array(
        'key'     =>   'keyword',
        'value'   =>   $keyword,
        'compare' =>   '='
      )
    );

    $args = array(
              'paged' => $paged,//現在のページを判定。2ページ以降で正しい記事を表示するため。
              'post_type'        =>   'attachment',
              'posts_per_page'   =>   9,
              'post_status'      =>   'any',
              'post_mime_type'   =>   array('image/jpeg', 'image/png'),
              'meta_query'       =>   $meta_query
            );

    $attachments = new WP_Query($args);

    if($attachments->have_posts()) {
      while ( $attachments->have_posts() ) {
        $attachments->the_post();
        get_template_part( 'template-parts/portfolio', 'item' );
      }
    }

    /* ページャーの表示 */
    if ( function_exists( 'pagination' ) ) :
      pagination( $attachments->max_num_pages, $paged );
    endif;

    wp_reset_postdata();
  ?>

  <div class="portfolio_link_to_index">
    <a href="/portfolio_index">
      portfolio一覧へ
    </a>
  </div>

</div>

<?php
get_footer();
