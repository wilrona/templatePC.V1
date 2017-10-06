<?php

$boxPages = tr_meta_box('Article de la cover');
$boxPages->addScreen('post'); // updated
$boxPages->setCallback(function(){
	$form = tr_form();

	$options = [
		'Aucune position' => 'aucun',
		'Position article cover' => 'cover',
		'Position article à la une' => 'une',
		'Position dossier' => 'dossier'
	];

	echo $form->radio('Affichage sur l\'accueil')->setOptions($options)->setSetting('default', 'aucun');
});