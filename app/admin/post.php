<?php

$boxUne = tr_meta_box('Gallerie');
$boxUne->addScreen('post'); // updated
$boxUne->setCallback(function(){
	$form = tr_form();

	$repeater = $form->repeater('Image de la gallerie')->setFields([
		$form->image('Image')->setSetting('button', 'Inserez une image')
	]);

	echo $repeater;

});