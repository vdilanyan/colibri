<?php

$context = Timber::get_context();

$context['blog'] = [

];

Timber::render('templates/blog.twig', $context);
