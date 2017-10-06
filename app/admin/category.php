<?php

// Ajouter un champ personnalisé sur la catégorie

$cat = new \TypeRocket\Register\Taxonomy('category');
$cat->setMainForm( array( $this, 'postLayout' ) );
\TypeRocket\Register\Registry::taxonomyFormContent( $cat );


function add_form_content_category_main(){

	$form = tr_form();

	echo $form->text('Suffix de la couleur')->setName('suffix')->setHelp('Entrer le suffix de la classe pour apliquer une couleur (ex: -act).');
}

