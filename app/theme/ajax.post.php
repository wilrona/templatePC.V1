<?php

add_action('wp_ajax_load_posts_by_ajax', 'load_posts_by_ajax_callback');
add_action('wp_ajax_nopriv_load_posts_by_ajax', 'load_posts_by_ajax_callback');



function load_posts_by_ajax_callback() {
	check_ajax_referer('load_more_posts', 'security');
	$paged = $_POST['page'];
	$cat = $_POST['cat'];
	$thiscat = get_category($cat);

	$type = $_POST['type'];

if($type == 'subcategory') :

	$args = array(
		'post_type' => 'post',
		'post_status' => 'publish',
		'posts_per_page' => '6',
		'paged' => $paged,
		'cat' => $cat
	);
	$my_posts = new WP_Query( $args );
	if ( $my_posts->have_posts() ) :
?>
		<?php while ( $my_posts->have_posts() ) : $my_posts->the_post() ?>

		<div class="uk-width-1-1 the_post">

			<div class="uk-article<?= tr_taxonomies_field('suffix', 'category', $thiscat->parent) ?> uk-margin uk-article-horizontal uk-transition-toggle">
				<article class="uk-article">
					<div class="uk-padding-small uk-padding-remove-horizontal" uk-grid>
						<div class="uk-width-1-3">
							<div class="uk-cover-container uk-height-1-1 uk-flex uk-flex-middle">
								<?=  get_the_post_thumbnail( get_the_ID(), 'full', array('class' => 'uk-transition-scale-up uk-transition-opaque')); ?>
							</div>
						</div>
						<div class="uk-width-2-3">
							<div class="uk-article-meta uk-categorie">
								<?= get_the_date('d/m/Y', get_the_ID()) ?> <br>
								<a href="<?= get_category_link(get_the_category(get_the_ID())[0]->term_id); ?>" class="uk-text-uppercase uk-text-bold"><?= get_the_category(get_the_ID())[0]->name; ?></a>
							</div>
							<h2 class="dotdot uk-margin-small uk-h4" style="max-height: 3em">
								<a href="" class="uk-link-reset uk-display-block uk-text-break"><?= get_the_title(); ?></a>
							</h2>
							<div class="uk-height-content dotdot uk-margin-small uk-text-justify">
								<p>
									<?= get_the_excerpt(); ?>
								</p>
							</div>
							<div class="uk-grid-small uk-child-width-auto uk-margin-small" uk-grid>
								<div>
									<?php $auteur_id = get_the_author_ID(); ?>
									Ajouté par : <a class="uk-link-reset" href=""><?php the_author_meta( 'display_name' , $auteur_id ); ?></a>
								</div>
							</div>
						</div>
					</div>

				</article>
			</div>

		</div>

		<?php endwhile ?>
<?php
	endif;

else:

	if($type == 'comment'):

		$current_post = $_POST['current_post'];

		$args_comment = array(
			'post_id' => $current_post,
			'order' => 'DESC',
			'hierarchical' => 'threaded',
			'number' => 3,
			'offset'=> $paged,
			'status' => 'approve'
		);
		$commentsArray = get_comments($args_comment);

		if($commentsArray) :
			foreach ($commentsArray as $e) :


				?>
                <div uk-grid class="uk-margin-remove uk-padding-small uk-grid-small uk-comments the_post_comment">
                    <div class="uk-width-1-6">
						<?= get_avatar($e->comment_author_email, 96, '', '', array('class' => 'uk-image-resize uk-border-circle')) ?>
                    </div>
                    <div class="uk-width-5-6">
                        <article class="uk-comment uk-margin-small-bottom">
                            <header class="uk-comment-header uk-grid-medium uk-flex-middle uk-margin-small-bottom" uk-grid>
                                <div class="uk-width-expand">
                                    <ul class="uk-comment-meta uk-subnav uk-subnav-divider uk-margin-remove-top">
                                        <li>Le <?= date_i18n(get_option('date_format'), strtotime($e->comment_date)) ?></li>
                                    </ul>
                                </div>
                                <div class="uk-width-1-1 uk-margin-remove uk-text-bold"><?= $e->comment_author ?></div>
                            </header>
                            <div class="uk-comment-body">
                                <p>
									<?= $e->comment_content; ?>
                                </p>

                            </div>
                        </article>
						<?php
						$args_comment_child = array(
							'order' => 'DESC',
							'parent' => $e->comment_ID,
							'status' => 'approve'
						);
						$commentsArray_child = get_comments($args_comment_child);

						foreach ($commentsArray_child as $e_child):
							?>
                            <hr>
                            <article class="uk-comment uk-margin-small-bottom">
                                <header class="uk-comment-header uk-grid-medium uk-flex-middle" uk-grid>
                                    <div class="uk-width-1-1 uk-margin-remove uk-text-bold">
										<?= get_avatar($e_child->comment_author_email, 40, '', '', array('class' => 'uk-border-circle uk-margin-small-right', 'style' => 'width: 40px; height: 40px')) ?>
										<?= $e_child->comment_author ?>
                                    </div>
                                    <div class="uk-width-expand uk-margin-remove-top uk-margin-medium-left">
                                        <ul class="uk-comment-meta uk-subnav uk-subnav-divider uk-margin-remove-top">
                                            <li>Reponse le <?= date_i18n(get_option('date_format'), strtotime($e_child->comment_date)) ?></li>
                                        </ul>
                                    </div>
                                </header>
                                <div class="uk-comment-body uk-margin-medium-left">
                                    <p>
										<?= $e_child->comment_content; ?>
                                    </p>

                                </div>
                            </article>
						<?php endforeach; ?>
                        <!--                        <a href="#" class="uk-button uk-button-default uk-border-rounded uk-button-reponse">Repondre</a>-->
                        <hr>
                    </div>
                </div>


			<?php endforeach; ?>
			<?php
		endif;
	endif;


    if($type == 'single'):
        $current_post = $_POST['current_post'];

        $args = array(

            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => '4',
            'post__not_in' => [$current_post],
            'paged' => $paged,
            'cat' => $thiscat->term_id

        );

        $similraire = new WP_Query( $args );

        if ( $similraire->have_posts() ) :


        ?>
        <?php while ( $similraire->have_posts() ) : $similraire->the_post() ?>
            <hr>
            <div class="uk-article<?= tr_taxonomies_field('suffix', 'category', get_the_category($similraire->ID)[0]->parent) ?> uk-margin uk-article-horizontal the_post">
                <article class="uk-article">
                    <div class="uk-padding-small uk-padding-remove-horizontal" uk-grid>
                        <div class="uk-width-1-3">
                            <div class="uk-cover-container uk-height-1-1">
                                <?=  get_the_post_thumbnail( $similraire->ID, 'full', array('class' => 'uk-transition-scale-up uk-transition-opaque'));?>
                            </div>
                        </div>
                        <div class="uk-width-2-3">
                            <div class="uk-article-meta uk-categorie">
                                <?= get_the_date('d/m/Y', $similraire->ID) ?> <br>
                                <a href="<?= get_category_link(get_the_category($similraire->ID)[0]->term_id);?>" class="uk-text-uppercase uk-text-bold"><?= get_the_category($similraire->ID)[0]->name; ?></a>
                            </div>
                            <h2 class="dotdot uk-margin-small uk-h5" style="max-height: 3.6em">
                                <a href="<?= get_the_permalink($similraire->ID) ?>" class="uk-link-reset uk-display-block uk-text-break"><?= get_the_title() ?></a>
                            </h2>
                            <div class="uk-height-content dotdot uk-margin-small uk-text-justify">
                                <p>
                                    <?= get_the_excerpt() ?>
                                </p>
                            </div>
                            <div class="uk-grid-small uk-child-width-auto uk-margin-small" uk-grid>
                                <div>
                                    Ajouté par : <a class="uk-link-reset" href=""><?php the_author_meta( 'display_name' , get_the_author_ID() ); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </article>
            </div>


        <?php endwhile; ?>
<?php

        endif;
    endif;
endif;

wp_die();
}