


	<?php

	$thiscat = get_category( get_query_var( 'cat' ) );

	$catlist = get_categories(
		array(
			'child_of' => $thiscat->term_id,
			'orderby' => 'rand',
			'order' => 'ASC',
//			'exclude' => $catid,
			'hide_empty' => '1'
		) );

	$count = 1;

	?>


    <?php foreach ($catlist as $list): ?>

        <?php

            $args = array(
                'posts_per_page' => 4,
                'tax_query' => [
                    [
                        'taxonomy' => 'category',
                        'terms' => $list->term_id,
                        'include_children' => true // Remove if you need posts from term 7 child terms
                    ],
                ]
            );

            $posts = get_posts($args);

            if($posts):
        ?>

        <div class="uk-banner-title uk-article<?= tr_taxonomies_field('suffix', 'category', $thiscat->term_id) ?> uk-grid-collapse uk-opensan-bold" uk-grid>
            <div class="uk-width-auto uk-padding-xsmall boundary-align-<?= $count ?> uk-box-shadow-medium">
                <div class="uk-inline">
                    <div><span class="uk-margin-right"><?= single_cat_title( '', false ) ?></span> <span uk-icon="icon: menu"></span></div>

                    <?php

                    $catlist_exclus = get_categories(
                        array(
                            'child_of' => $thiscat->term_id,
                            'orderby' => 'id',
                            'order' => 'ASC',
                            'exclude' => $list->term_id,
                            'hide_empty' => '1'
                        ) );
                    ?>

                    <div uk-dropdown="pos: bottom-justify; boundary: .boundary-align-<?= $count ?>; boundary-align: true" class="uk-margin-remove">

                        <ul class="uk-nav uk-dropdown-nav">
                            <?php foreach ($catlist_exclus as $exclus): ?>
                                <li><a href="<?= get_category_link($exclus->term_id);?>"><?= $exclus->name; ?></a></li>
                                <li class="uk-nav-divider"></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="uk-width-expand uk-padding-xsmall"> <?= $list->name; ?> </div>



        </div>

		<?php

		$count_post = 1;

		?>

        <div class="uk-margin uk-margin-large-bottom uk-grid-small" uk-grid uk-scrollspy="target: > div; cls:uk-animation-slide-bottom-medium; delay: 500">

		<?php foreach ($posts as $post): ?>
			<?php
			if($count_post <= 2):
				?>
            <div class="uk-width-1-2 uk-margin-medium-top">
                <div class="uk-article<?= tr_taxonomies_field('suffix', 'category', $list->parent) ?> uk-transition-toggle">
                    <article class="uk-article">

                        <div class="uk-cover-container uk-height-small">
	                        <?=  get_the_post_thumbnail( $post->ID, 'full', array('class' => 'uk-transition-scale-up uk-transition-opaque'));?>
                        </div>
                        <h2 class="dotdot uk-margin-small uk-h4" style="max-height: 3em">
                            <a href="<?= get_the_permalink($post->ID) ?>" class="uk-link-reset uk-display-block uk-text-break"><?= $post->post_title; ?></a>
                        </h2>

                        <div class="uk-article-meta uk-categorie"><a href="<?= get_category_link(get_the_category($post->ID)[0]->term_id); ?>" class="uk-text-uppercase uk-text-bold"><?= get_the_category($post->ID)[0]->name; ?></a></div>


                        <div class="uk-height-content dotdot uk-margin-small uk-text-justify">
                            <p>
                                <?= $post->post_excerpt; ?>
                            </p>
                        </div>
                        <div class="uk-margin-medium"></div>

                    </article>
                </div>
            </div>
			<?php  endif; ?>

            <?php if($count_post > 2): ?>

                <div class="uk-width-1-1">
                    <div class="uk-article<?= tr_taxonomies_field('suffix', 'category', $list->parent) ?> uk-margin uk-article-horizontal uk-transition-toggle">
                        <article class="uk-article">
                            <div class="uk-padding-small uk-padding-remove-horizontal" uk-grid>
                                <div class="uk-width-1-3">
                                    <div class="uk-cover-container uk-height-1-1 uk-flex uk-flex-middle">
	                                    <?=  get_the_post_thumbnail( $post->ID, 'full', array('class' => 'uk-transition-scale-up uk-transition-opaque'));?>
                                    </div>
                                </div>
                                <div class="uk-width-2-3">
                                    <div class="uk-article-meta uk-categorie">
	                                    <?= get_the_date('d/m/Y', $post->ID) ?> <br>
                                        <a href="<?= get_category_link(get_the_category($post->ID)[0]->term_id); ?>" class="uk-text-uppercase uk-text-bold"><?= get_the_category($post->ID)[0]->name; ?></a>
                                    </div>
                                    <h2 class="dotdot uk-margin-small uk-h4" style="max-height: 3em">
                                        <a href="<?= get_the_permalink($post->ID) ?>" class="uk-link-reset uk-display-block uk-text-break"><?= $post->post_title; ?></a>
                                    </h2>
                                    <div class="uk-height-content dotdot uk-margin-small uk-text-justify">
                                        <p>
	                                        <?= $post->post_excerpt; ?>
                                        </p>
                                    </div>
                                    <div class="uk-grid-small uk-child-width-auto uk-margin-small" uk-grid>
                                        <div>
	                                        <?php $auteur_id = $post->post_author; ?>
                                            Ajouté par : <a class="uk-link-reset" href=""><?php the_author_meta( 'display_name' , $auteur_id ); ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </article>
                    </div>
                </div>

            <?php endif; ?>


		<?php $count_post++; ?>
		<?php endforeach; ?>

            <div class="uk-width-1-1">
                <hr>
            </div>
            <div class="uk-width-1-1 uk-flex uk-flex-center uk-padding-small uk-padding-remove-vertical uk-margin-small uk-article<?= tr_taxonomies_field('suffix', 'category', $thiscat->term_id) ?> uk-article-button uk-animation-toggle">

                <a href="<?= get_category_link($list->term_id); ?>" class="uk-button uk-button-default">Plus d'articles</a>
            </div>
        </div>

        <?php $count++;  ?>

        <?php if (function_exists('the_ad_placement') && the_ad_placement('placement-manuel') ): ?>
            <div class="uk-position-relative">
                <div class="uk-width-3-4 uk-position-top-right uk-text-right uk-background-pc-3 uk-padding uk-padding-remove-vertical">
                    Publicité
                </div>

                <?php the_ad_placement('placement-manuel') ?>

            </div>
        <?php endif ?>


    <?php endif;  ?>
    <?php endforeach;  ?>
