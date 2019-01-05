<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel='stylesheet' id='yangyang-theme-style_about-css'  href='<?php echo get_template_directory_uri()?>/css/about.css' type='text/css' media='all' />
	<?php wp_head(); ?>
</head>

<body>
  <div id="page" class="site">
    <header id="masthead" class="site-header">
      <?php get_template_part( 'template-parts/header', 'navigation' ); ?>
    </header>
  </div>

  <div id="content" class="site-content">
