<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo wp_get_document_title(); ?></title>
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	<!-- Generate favicon here http://www.favicon-generator.org/ -->
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<?php
	$context = Timber::get_context();
	Timber::render('templates/header.twig', $context);