<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body>
	<div id="page" class="site">
		<header id="masthead" class="site-header">
			<?php get_template_part( 'template-parts/header', 'navigation' ); ?>
		</header>

		<div id="content" class="site-content">
