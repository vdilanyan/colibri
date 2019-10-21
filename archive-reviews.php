<?php
$context = Timber::get_context();

$context['reviews'] = [

];

Timber::render('templates/archive-reviews.twig', $context);
