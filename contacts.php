<?php
//Template Name: Contacts

$context = Timber::get_context();

$context['contacts'] = [
	
];

Timber::render('templates/contacts.twig', $context);