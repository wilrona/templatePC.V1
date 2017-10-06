<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <title>
	    <?php if ( is_category() ) {
		    single_cat_title(); echo ' | '; bloginfo( 'name' );
//	    } elseif ( is_tag() ) {
//		    echo 'Tag Archive for &quot;'; single_tag_title(); echo '&quot; | '; bloginfo( 'name' );
//	    } elseif ( is_archive() ) {
//		    wp_title(''); echo ' Archive | '; bloginfo( 'name' );
//	    } elseif ( is_search() ) {
//		    echo 'Search for &quot;'.wp_specialchars($s).'&quot; | '; bloginfo( 'name' );
	    } elseif ( is_home() || is_front_page() ) {
		    bloginfo( 'name' ); echo ' | '; bloginfo( 'description' );
//	    }  elseif ( is_404() ) {
//		    echo 'Error 404 Not Found | '; bloginfo( 'name' );
	    } elseif ( is_single() ) {
		    wp_title('');
	    } else {
		    echo wp_title( ' | ', false, right ); bloginfo( 'name' );
	    } ?>
    </title>
    <meta http-equiv="x-ua-compatible" content="ie=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/images/favicon.png" />
    <?php
        wp_head();
    ?>
</head>

<body <?php body_class(); ?>>

<div class="uk-container uk-menu uk-margin">
    <nav class="uk-margin uk-navbar" uk-navbar="">
        <div class="uk-navbar-left uk-margin-medium-top">
            <div class="uk-width-1-1">
                <?php
                $menu_arg = array(
	                'container'       => false,
	                'container_class' => '',
	                'menu_class' => 'uk-navbar-nav uk-subnav-divider',
	                'theme_location' => 'header-left-nav',
	                'items_wrap' =>'<ul id="%1$s" class="%2$s">%3$s</ul>',
                );
                wp_nav_menu($menu_arg);

                ?>
            </div>
            <div class="uk-width-1-1">
                <ul class="uk-subnav uk-icone uk-padding-remove-vertical uk-margin-remove">
                    <li><a href="<?=  tr_options_field('pc_options.lien_facebook'); ?>" uk-icon="icon: facebook" class="uk-icon" target="_blank"></a></li>
                    <li><a href="<?= tr_options_field('pc_options.lien_instagram'); ?>" uk-icon="icon: instagram" class="uk-icon" target="_blank"></a></li>
                </ul>
            </div>
        </div>
        <div class="uk-navbar-center">
            <a href="<?php home_url() ?>" class="uk-logo ">
                <img src="<?= get_stylesheet_directory_uri() ?>/image/logo.png" alt="" style="height: 70px;">
            </a>
        </div>
        <div class="uk-navbar-right uk-margin-medium-top">
            <div class="uk-width-1-1 uk-flex uk-flex-right uk-padding-small uk-padding-remove-vertical uk-padding-remove-left">
                <?php
                    wp_nav_menu(
                            array(

                            'container'       =>  false,
                            'container_class' =>  '',
                            'menu_class' =>  'uk-navbar-nav uk-subnav-divider',
                            'theme_location' =>  'header-right-nav',
                            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',

                    ));
                ?>
            </div>
            <div class="uk-width-1-1 uk-flex uk-flex-right uk-padding uk-padding-remove-vertical uk-padding-remove-left">
                <a href="#modal-center" uk-toggle class="uk-button uk-button-default uk-button-menu">Abonnez-vous</a>
            </div>
        </div>

    </nav>
    <div id="modal-full" class="uk-modal-full uk-modal uk-modal-search" uk-modal="">
        <div class="uk-modal-dialog uk-flex uk-flex-center uk-flex-middle" uk-height-viewport>
            <button class="uk-modal-close-full" type="button" uk-close></button>
            <form class="uk-search uk-search-large" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
                <input type="hidden" value="post" name="post_type" id="post_type" />
                <input class="uk-search-input uk-text-center" type="search" name="s" value="<?php the_search_query(); ?>" placeholder="Recherche sur le site ..." autofocus>
            </form>
        </div>
    </div>
</div>
<div class="uk-container uk-submenu">
    <?php wp_nav_menu(
            array(
	            'container'       =>  false,
                'container_class' =>  '',
                'menu_class' =>  'uk-flex-center uk-margin-remove uk-tab',
                'theme_location' =>  'header-nav',
                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            ));
    ?>
    <div class="">
        <?php if( function_exists('the_ad_placement') ): ?>
        <?= the_ad_placement('sous-le-menu') ?>
        <?php endif ?>
    </div>
</div>
