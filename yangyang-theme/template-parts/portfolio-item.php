<?php
  $image = get_post();
  $metaData = get_post_custom();
  $ID = $image->ID;
  $author = $metaData["author"][0];
  $URL = $metaData["relation"][0];
  $keyword = $metaData["keyword"][0];
  $article = $metaData["article"][0];
?>

<div class="portfolio_item">
  <a href='#portfolio_modal_<?php echo $ID ?>' class="portfolio_modal">
    <img data-src=<?php echo $image->guid ?> class="lazyload"/>
  </a>
</div>

<div id="portfolio_modal_<?php echo $ID ?>" style="display:none;">
  <div class="portfolio_modal_img_wrap">
    <img data-src=<?php echo $image->guid ?> class="portfolio_modal_main_img lazyload" />
    <p class="portfolio_modal_keyword"><?php echo $keyword ?></p>
  </div>

  <div class="portfolio_modal_contents">

  <?php if($author !== '') { ?>
      <div class="portfolio_modal_author_img_wrap">
        <img
          data-src='<?php echo get_stylesheet_directory_uri(); ?>/img/<?php echo $author ?>.png'
          class="portfolio_modal_author_img lazyload"
        />
      </div>
    <?php } ?>

    <div class="portfolio_modal_desc">
      <?php echo $image->post_content ?>
    </div>

    <?php if($URL !== '') { ?>
      <div class="portfolio_modal_link">
        <a href=<?php echo $URL ?>><?php echo $article ?></a>
      </div>
    <?php } ?>

  </div>
</div>