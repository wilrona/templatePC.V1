
<div class="uk-margin uk-nav-right" uk-grid>
    <div class="uk-width-1-1">
	    <?php if ((int) get_option('page_on_front') == get_the_ID()): ?>
		    <?php get_template_part( 'recentPost' ); ?>
	    <?php endif ?>

	    <?php if(!is_mobile()): ?>


            <?php if ( function_exists('the_ad_placement')): ?>
                <div class="uk-position-relative">

                    <?php

                        the_ad_placement('home-apres-recent-article');
                    ?>

                </div>
            <?php endif ?>

	    <?php endif ?>
    </div>
</div>
</div>
</div>


<div class="uk-section uk-section-secondary">
    <div class="uk-container uk-container-small">
        <div class="uk-margin" uk-grid>
            <div class="uk-width-1-3@m">
                <img src="<?= get_stylesheet_directory_uri() ?>/image/logo-w.png" alt="" class="uk-display-block uk-margin-auto uk-margin-medium uk-visible@l">
                <div class="uk-width-1-1 uk-flex uk-flex-center uk-padding-small uk-padding-remove-vertical uk-margin-small">
                    <a href="#modal-center" uk-toggle class="uk-button uk-button-default uk-button-menu-reverse">Abonnez-vous</a>
                </div>
                <div class="uk-width-1-1 uk-flex uk-flex-center uk-social-reverse uk-padding-xsmall">
                    <div>
                        <ul class="uk-subnav uk-icone uk-padding-remove-vertical uk-margin-remove uk-margin-small">
                            <li><a href="<?=  tr_options_field('pc_options.lien_facebook'); ?>" uk-icon="icon: facebook" class="uk-icon" target="_blank"></a></li>
                            <li><a href="<?= tr_options_field('pc_options.lien_instagram'); ?>" uk-icon="icon: instagram" class="uk-icon" target="_blank"></a></li>
                        </ul>
                    </div>

                </div>
            </div>
            <div class="uk-width-1-4@m">
                <div class="uk-padding-small">
	                <?php

	                wp_nav_menu(array(

		                'container'       =>  false,
		                'container_class' =>  '',
		                'menu_class' =>  'uk-list-link uk-opensan-regular',
		                'theme_location' =>  'footer-nav',
		                'items_wrap' => '<div id="%1$s" class="%2$s">%3$s</div>',

	                ));

	                ?>
                </div>

            </div>
            <div class="uk-width-2-5@m">
                <div class="uk-padding-small">
	                <?php wp_nav_menu(
		                array(

			                'container'       =>  false,
			                'container_class' =>  '',
			                'menu_class' =>  'uk-column-1-2 uk-list-link uk-opensan-regular',
			                'theme_location' =>  'footer-right-nav',
			                'items_wrap' => '<div id="%1$s" class="%2$s">%3$s</div>',

		                ));
	                ?>
                </div>

            </div>

        </div>
    </div>
</div>

<div id="modal-center" class="uk-flex-top" uk-modal bg-close="false" esc-close="false">
    <div class="uk-modal-dialog uk-margin-auto-vertical">
        <div class="uk-modal-header">
            <h2 class="uk-modal-title">Pause Café Newsletter</h2>
        </div>
        <div class="uk-modal-body">
            <?= do_shortcode('[mc4wp_form id="13"]'); ?>
        </div>
    </div>
</div>

<?php wp_footer(); ?>

</body>
</html>
