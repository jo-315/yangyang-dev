<?php
get_header('portfolio');
?>

<div class="portfolio_header">
  <h1>ポートフォリオ</h1>
  <p>portfolio</p>
  <img src='<?php echo get_stylesheet_directory_uri(); ?>/img/index_05.png' />
</div>

<div class="portfolio">

  <?php
    $categories = array(
      array('class' => 'Daily', 'keyword' => ''),
      array('class' => 'Trip',  'keyword' => ''),
      array('class' => 'Trip',  'keyword' => 'Norway'),
      array('class' => 'Trip',  'keyword' => 'Hawaii'),
      array('class' => 'Food',  'keyword' => '')
    );

    foreach($categories as $category) {
  ?>

      <div class="portfolio_index_block">
        <h4 class="portfolio_index_title">
          <?php echo $category['keyword'] ? $category['keyword'] : $category['class']; ?>
        </h4>

        <?php
          $meta_query = array(
            array(
              'key'     =>   'class',
              'value'   =>   $category['class'],
              'compare' =>   '='
            ),
            array(
              'key'     =>   'keyword',
              'value'   =>   $category['keyword'],
              'compare' =>   '='
            )
          );

          $args = array(
                    'post_type'        =>   'attachment',
                    'posts_per_page'   =>   5,
                    'post_status'      =>   'any',
                    'post_mime_type'   =>   array('image/jpeg', 'image/png'),
                    'meta_query'         =>   $meta_query
          );

          $attachments = new WP_Query($args);

          if($attachments->have_posts()) {
            $index = 0;
            while ( $attachments->have_posts() ) {
              $attachments->the_post();
              $image = get_post();

              switch($index) {
                case 0:
                  echo '<div class="portfolio_index_main_img">';
                  echo "<img src='$image->guid' />";
                  echo '</div>';
                  break;
                case 1:
                  echo '<div class="portfolio_index_sub_imgs_wrap">';
                  echo "<img src='$image->guid' class='portfolio_index_sub_img portfolio_index_sub_img__$index' />";
                  break;
                case 4:
                  echo "<img src='$image->guid' class='portfolio_index_sub_img portfolio_index_sub_img__$index' />";
                  echo '</div>';
                  break;
                default:
                  echo "<img src='$image->guid' class='portfolio_index_sub_img portfolio_index_sub_img__$index' />";
                  break;
              }
              $index++;
            }
          }
        ?>

        <a
          href="/portfolio?class=<?php echo $category['class']; ?>&keyword=<?php echo $category['keyword'];?>">
            more...
        </a>
      </div>

  <?php } ?>
</div>

<?php
get_footer();
