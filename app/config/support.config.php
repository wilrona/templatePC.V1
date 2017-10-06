<?php
/**
 * Created by IntelliJ IDEA.
 * User: online2
 * Date: 03/10/2017
 * Time: 12:02
 */

add_theme_support( 'post-thumbnails' );

/* suppression de la barre d'administration sur le template */
add_filter('show_admin_bar','__return_false');


// action a faire pour activer une page d'option de theme
add_filter('tr_theme_options_page', function() {
	return get_template_directory() . '/theme-options.php';
});

add_filter('tr_theme_options_name', function() {
	return 'pc_options';
});


// active l'utilisation d'une page pour les sous categorie


function wpd_subcategory_template( $template ) {
	$cat = get_queried_object();
	if( 0 < $cat->category_parent )
		$template = locate_template( 'subcategory.php' );
	return $template;
}
add_filter( 'category_template', 'wpd_subcategory_template' );