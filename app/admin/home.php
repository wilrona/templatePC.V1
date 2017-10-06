<?php

$home = (int) get_option('page_on_front');


$boxPages = tr_meta_box('Article de la cover');
$boxPages->addScreen('page'); // updated
$boxPages->setCallback(function(){
	$form = tr_form();


//	$query = tr_query()->table('wp_posts')->setIdColumn('ID');
//	$query = $query
//				->select('wp_posts.post_title', 'wp_posts.ID', 'wp_postmeta.meta_value')
//				->join('wp_postmeta', 'wp_postmeta.post_id', 'wp_posts.ID')
//				->where('wp_posts.post_type', '=', 'post')
//				->where('wp_posts.post_status','=', 'publish')
//				->where('wp_postmeta.meta_key', '=', 'affichage_sur_laccueil')
//				->where('wp_postmeta.meta_value', '=', 'cover')
//				->get();
//
//	$options = [];
//	foreach ($query as $item){
//		$options[$item->post_title] = $item->ID;
//	}
	echo $select = $form->search('Actuellement en cover')->setPostType('post');
});

$boxUne = tr_meta_box('Article à la une');
$boxUne->addScreen('page'); // updated
$boxUne->setCallback(function(){
	$form = tr_form();

	$repeater = $form->repeater('Actuellement à la une')->setFields([
		$form->search('A la une')->setPostType('post')
	]);

	echo $repeater;

});

$boxDossier = tr_meta_box('Article en dossier');
$boxDossier->addScreen('page'); // updated
$boxDossier->setCallback(function(){
	$form = tr_form();

	$repeater = $form->repeater('Actuellement sur dossier')->setFields([
		$form->search('dossier')->setPostType('post')
	]);

	echo $repeater;

});



add_action('admin_head', function () use ($home, $boxPages, $boxUne, $boxDossier) {
	if($home == get_the_ID()){
		remove_post_type_support('page', 'editor');

	}else{
		remove_meta_box( $boxPages->getId(), 'page', 'normal');
		remove_meta_box( $boxUne->getId(), 'page', 'normal');
		remove_meta_box( $boxDossier->getId(), 'page', 'normal');
	}
});











