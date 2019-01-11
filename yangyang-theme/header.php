<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<script>
	  (adsbygoogle = window.adsbygoogle || []).push({
	    google_ad_client: "ca-pub-2828170763777117",
	    enable_page_level_ads: true
	  });
	</script>
</head>

<body>
	<div id="page" class="site">
		<header id="masthead" class="site-header">
			<?php get_template_part( 'template-parts/header', 'navigation' ); ?>
			<div class="header-content">
				<div class="header-content--img">
					<div class="header-content--img-01-wrap">
						<img
							src="<?php echo get_stylesheet_directory_uri(); ?>/img/yangyang01.png"
							class="header-content--img-01"
						/>
					</div>
					<div class="header-content--img-desc">
						<div class="header-content--img-desc-content">
							<span>やんやんと</span></br><span>やんやん</span>
						</div>
					</div>
					<div class="header-content--img-02-wrap">
						<img
							src="<?php echo get_stylesheet_directory_uri(); ?>/img/yangyang02.png"
							class="header-content--img-02"
						/>
					</div>
				</div>

				<div class="header-content--article-wrap">
					<div class="header-content--article-title">
						Pick Up
					</div>
					<?php
						get_template_part( 'template-parts/header', 'slider' );
					?>
				</div>
			</div>
		</header>

		<div id="content" class="site-content">
