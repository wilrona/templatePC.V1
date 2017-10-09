
<?php if ( have_posts() ) while ( have_posts() ) : the_post();  SetPostViews(get_the_ID()); ?>

<div class="uk-banner-title uk-article<?= tr_taxonomies_field('suffix', 'category', get_the_category(get_the_ID())[0]->parent) ?> uk-grid-collapse uk-opensan-bold" uk-grid>
	<div class="uk-width-auto uk-padding-xsmall boundary-align-1 uk-box-shadow-medium">
		<div class="uk-inline">
			<div><span class="uk-margin-right"> <?= get_category(get_the_category(get_the_ID())[0]->parent)->name ?> </span> <span uk-icon="icon: menu"></span></div>
			<div uk-dropdown="pos: bottom-justify; boundary: .boundary-align-1; boundary-align: true" class="uk-margin-remove">
				<?php

				$catlist_exclus = get_categories(
					array(
						'child_of' => get_the_category(get_the_ID())[0]->parent,
						'orderby' => 'id',
						'order' => 'ASC',
						'exclude' => get_the_category(get_the_ID())[0]->term_id,
						'hide_empty' => '1'
					) );
				?>
				<ul class="uk-nav uk-dropdown-nav">

					<?php foreach ($catlist_exclus as $exclus): ?>
						<li><a href="<?= get_category_link($exclus->term_id);?>"><?= $exclus->name; ?></a></li>
						<li class="uk-nav-divider"></li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
	</div>
	<div class="uk-width-expand uk-padding-xsmall"> <?= get_the_category(get_the_ID())[0]->name; ?> </div>

</div>

<div class="uk-margin uk-grid-small" uk-grid>
	<div class="uk-width-1-1">

		<div class="uk-article-eco uk-margin uk-article-horizontal">
			<article class="uk-article">
				<div class="uk-padding-small uk-padding-remove-horizontal" uk-grid>
					<div class="uk-width-1-1">

						<h1 class="uk-margin-small uk-h1" style="max-height: 3.6em">
							<span class="uk-display-block uk-text-break"><?= get_the_title(); ?></span>
						</h1>
						<div class="uk-margin-small uk-text-justify">
							<p>
								<?= get_the_excerpt() ?>
							</p>
						</div>
						<div class="uk-article-meta uk-text-uppercase uk-h6 uk-margin-remove uk-article-date">
							Pause café le <?= get_the_date('d/m/Y') ?> <br>
						</div>
						<div class="uk-grid-small uk-child-width-auto uk-text-uppercase uk-h6 uk-article-date" uk-grid>
							<div>
								Article ecrit par : <a class="uk-link-reset uk-text-lowercase" href=""><?php the_author_meta( 'display_name' , get_the_author_ID() ); ?></a>
							</div>
						</div>
					</div>
				</div>

			</article>
		</div>

	</div>
</div>

<div id="interaction" class="uk-margin uk-child-width-auto uk-grid-collapse uk-button-shared uk-article<?= tr_taxonomies_field('suffix', 'category', get_the_category(get_the_ID())[0]->parent) ?>" uk-grid>
	<div>
		<a href="#modal-center" uk-toggle class="uk-button uk-button-default">Abonnez-vous</a>
	</div>

	<div class="uk-bg-default">
		<a href="#comments" class="uk-button" uk-scroll> <span class="fa fa-comment uk-icon"></span> Réagir </a>
	</div>
	<div class="uk-bg-default">
		<a href="#modal-friend" uk-toggle class="uk-button"> <span  class="fa fa-envelope uk-icon"></span> Envoyer l'article à un ami </a>
	</div>
    <div data-network="facebook" class="st-custom-button uk-bg-default" data-image="<?= get_the_post_thumbnail_url() ?>">
        <a href="#"  class="uk-button" onclick="event.preventDefault();"><span uk-icon="icon: facebook" class=""></span> Partage(s) </a>
    </div>
	<div class="uk-bg-default st-custom-button" data-network="twitter" data-image="<?= get_the_post_thumbnail_url() ?>">
		<a href="#" class="uk-button" onclick="event.preventDefault()"><span uk-icon="icon: twitter" class=""></span> Twitte(s)  </a>
	</div>
</div>

<hr>

<div class="uk-margin uk-contenu">
	<?=  get_the_post_thumbnail(get_the_ID(), 'full', array('class' => 'uk-margin-auto uk-display-block uk-margin'));?>
	<?php the_content() ?>

    <?php
        $images = tr_posts_field('image_de_la_gallerie');
        if($images):
    ?>
    <div class="owl-carousel owl-theme" id="owl-carousel-post">
        <?php foreach ($images as $image): ?>
            <div class="item uk-transition-toggle">
                <?= wp_get_attachment_image($image['image'], '790') ?>
            </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
</div>

	<div class="uk-margin uk-grid-small" uk-grid>
		<div class="uk-width-1-1">

			<div class="uk-article-eco uk-margin uk-article-horizontal">
				<article class="uk-article">
					<div class="uk-padding-small uk-padding-remove-horizontal" uk-grid>
						<div class="uk-width-1-1">
							<div class="uk-article-meta uk-text-uppercase uk-h6 uk-margin-remove uk-article-date">
								Pause café le <?= get_the_date('d/m/Y') ?> <br>
							</div>
							<div class="uk-grid-small uk-child-width-auto uk-text-uppercase uk-h6 uk-article-date" uk-grid>
								<div>
									Article ecrit par : <a class="uk-link-reset uk-text-lowercase" href=""><?php the_author_meta( 'display_name' , get_the_author_ID() ); ?></a>
								</div>
							</div>
						</div>
					</div>

				</article>
			</div>

		</div>
	</div>

	<div class="uk-margin uk-child-width-auto uk-grid-collapse uk-button-shared uk-article<?= tr_taxonomies_field('suffix', 'category', get_the_category(get_the_ID())[0]->parent) ?>" uk-grid>
		<div>
			<a href="#modal-center" uk-toggle class="uk-button uk-button-default">Abonnez-vous</a>
		</div>

		<div class="uk-bg-default">
			<a href="#comments" class="uk-button" uk-scroll> <span class="fa fa-comment uk-icon"></span> Réagir </a>
		</div>
		<div class="uk-bg-default">
			<a href="#modal-friend" uk-toggle class="uk-button" > <span  class="fa fa-envelope uk-icon"></span> Envoyer l'article à un ami </a>
		</div>
        <div data-network="facebook" class="st-custom-button uk-bg-default" data-image="<?= get_the_post_thumbnail_url() ?>">
            <a href="#"  class="uk-button" onclick="event.preventDefault()"><span uk-icon="icon: facebook" class=""></span> Partage(s) </a>
        </div>
        <div class="uk-bg-default st-custom-button" data-network="twitter" data-image="<?= get_the_post_thumbnail_url() ?>">
            <a href="#" class="uk-button" onclick="event.preventDefault()"><span uk-icon="icon: twitter" class=""></span> Twitte(s)  </a>
        </div>
	</div>


	<hr>
	<?php if (function_exists('the_ad_placement') && the_ad_placement('placement-manuel') ): ?>
		<div class="uk-position-relative">
			<div class="uk-width-3-4 uk-position-top-right uk-text-right uk-background-pc-3 uk-padding uk-padding-remove-vertical">
				Publicité
			</div>

			<?php the_ad_placement('placement-manuel') ?>

		</div>
	<?php endif ?>

	<div class="uk-margin uk-banner-title uk-article<?= tr_taxonomies_field('suffix', 'category', get_the_category(get_the_ID())[0]->parent) ?> uk-grid-collapse uk-opensan-bold uk-margin-remove-bottom" uk-grid>
		<div class="uk-width-auto uk-padding-xsmall boundary-align-1 uk-box-shadow-medium">
			<div class="uk-inline">
				<div><span class="uk-margin-right">Sur le même sujet</div>
			</div>
		</div>
		<div class="uk-width-expand uk-padding-xsmall">  </div>

	</div>

	<div class="uk-margin-remove-top uk-margin-medium uk-padding-small uk-background-muted uk-article<?= tr_taxonomies_field('suffix', 'category', get_the_category(get_the_ID())[0]->parent) ?> uk-similaire" uk-scrollspy="target: > div; cls:uk-animation-slide-top-medium; delay: 500">
		<?php
		$args = array(

			'post_type' => 'post',
			'post_status' => 'publish',
			'posts_per_page' => '4',
			'post__not_in' => [get_the_ID()],
			'paged' => 1,
			'cat' => get_the_category(get_the_ID())[0]->term_id

		);
		wp_reset_query();

		$similraire = new WP_Query( $args );

		?>
		<?php while ( $similraire->have_posts() ) : $similraire->the_post(); ?>

			<div class="uk-article<?= tr_taxonomies_field('suffix', 'category', get_the_category(get_the_ID())[0]->parent) ?> uk-margin uk-article-horizontal the_post">
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
			<hr>
		<?php endwhile; wp_reset_query(); ?>


		<div class="uk-width-1-1 uk-flex uk-flex-center uk-padding-small uk-padding-remove-vertical uk-margin-small uk-article<?= tr_taxonomies_field('suffix', 'category', get_the_category(get_the_ID())[0]->parent) ?> uk-article-button uk-animation-toggle">
			<button class="uk-button uk-button-default loadmore">Plus d'articles</button>
		</div>
	</div>

	<div id="modal-friend" class="uk-flex-top" uk-modal  bg-close="false" esc-close="false">
		<div class="uk-modal-dialog uk-margin-auto-vertical">
			<div class="uk-modal-header">
				<h2 class="uk-modal-title">Envoyer l'article à un ami </h2>
			</div>
			<div class="uk-modal-body">
				<?php get_template_part( 'formFriend' ); ?>
			</div>
		</div>
	</div>




    <div id="comments" class="uk-margin uk-banner-title uk-article<?= tr_taxonomies_field('suffix', 'category', get_the_category(get_the_ID())[0]->parent) ?> uk-grid-collapse uk-opensan-bold uk-margin-small-bottom uk-comments-header" uk-grid>
        <div class="uk-width-auto uk-hidden">
        </div>
        <div class="uk-width-expand uk-padding-small uk-position-relative">
            Vos commentaires

            <div class="uk-position-center-right uk-padding-small uk-padding-remove-vertical uk-article<?= tr_taxonomies_field('suffix', 'category', get_the_category(get_the_ID())[0]->parent) ?> uk-article-button">
<!--                <a href="#formulaire" class="uk-button uk-button-default" >Reagir</a>-->
                <button uk-toggle="target: #formulaire; animation: uk-animation-fade" type="button" class="uk-button uk-button-default">Reagir</button>
            </div>
        </div>

    </div>
    <div id="formulaire" hidden class="uk-article-button uk-article<?= tr_taxonomies_field('suffix', 'category', get_the_category(get_the_ID())[0]->parent) ?>">
        <?php
        $comment_args = array(
            'fields' => apply_filters(
                                    'comment_form_default_fields',
                                    array(
                                        'author' => '<div class="uk-margin"><label for="author" class="uk-form-label">Quel est votre nom ? *</label>
                                                        <input id="author" class="uk-input" name="author" type="text" value="" placeholder="Nom"></div>',

                                        'email'  => '<div class="uk-margin"><label for="email" class="uk-form-label">Quel est votre email ? *</label><br>
                                                <input id="email" class="uk-input" name="email" type="text" value="" placeholder="Email"></div>',

                                        'url'    => ''
                                        )
                                ),

            'comment_field' => '<div class="uk-margin"><label for="comment" class="uk-form-label">Que souhaitez-vous dire ?</label><br>
                                        <textarea id="comment" class="uk-textarea" name="comment" placeholder="Commentaire" rows="10"></textarea></div>',

            'comment_notes_after' => '',
            'submit_button' => '<input name="%1$s" type="submit" id="%2$s" class="%3$s uk-button uk-button-default" value="%4$s"/>'

            );

            comment_form($comment_args);

        ?>
        <hr>
    </div>
    <div class="uk-margin-remove-top uk-margin-medium uk-comments-body">
        <?php

            $args_comment = array(
                    'post_id' => get_the_ID(),
                    'order' => 'DESC',
                    'hierarchical' => 'threaded',
                    'number' => 3,
                    'offset'=> 0,

                    'status' => 'approve'
            );
            $commentsArray = get_comments($args_comment);
//            var_dump($commentsArray);
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



            <?php  endforeach; ?>
        <div class="uk-width-1-1 uk-flex uk-flex-center uk-padding-small uk-padding-remove-vertical uk-margin-small uk-article<?= tr_taxonomies_field('suffix', 'category', get_the_category(get_the_ID())[0]->parent) ?> uk-article-button uk-animation-toggle">
            <button class="uk-button uk-button-default loadmoreComment">Plus de commentaires</button>
        </div>
        <?php else: ?>

                <div class="uk-heading-primary uk-text-center uk-margin-medium-top">Aucun commentaire</div>

        <?php endif; ?>

    </div>

    <script type="text/javascript">
        var ajaxurl = "<?php echo admin_url( 'admin-ajax.php' ); ?>";

        var page = 3;
        jQuery(function($) {
            $('body').on('click', '.loadmoreComment', function() {
                var data = {
                    'action': 'load_posts_by_ajax',
                    'security': '<?php echo wp_create_nonce("load_more_posts"); ?>',
                    'page': page,
                    'type' : 'comment',
                    'current_post': '<?= get_the_ID(); ?>'
                };

                $.post(ajaxurl, data, function(response) {
                    if(response === ''){
                        $('body .loadmoreComment').removeClass('uk-button-default').addClass('uk-animation-shake').prop('disabled', true);
                    }else{
                        $('.the_post_comment:last').after(response);
                        page = page + 3;
                    }
                });
            });
        });

//        var ajaxurl = "<?php //echo admin_url( 'admin-ajax.php' ); ?>//";
        var paged = 2;
        jQuery(function($) {
            $('body').on('click', '.loadmore', function() {
                var data = {
                    'action': 'load_posts_by_ajax',
                    'page': paged,
                    'security': '<?php echo wp_create_nonce("load_more_posts"); ?>',
                    'cat' : '<?php echo get_the_category(get_the_ID())[0]->term_id; ?>',
                    'type' : 'single',
                    'current_post' : '<?php echo get_the_ID(); ?>'
                };

                $.post(ajaxurl, data, function(response) {
                    if(response === ''){
                        $('body .loadmore').removeClass('uk-button-default').addClass('uk-animation-shake').prop('disabled', true);
                    }else{
                        $('.the_post:last').after(response);
                        paged++;
                    }
                });
            });
        });


    </script>

    <script>
        (function(document) {
            var shareButtons = document.querySelectorAll(".st-custom-button[data-network]");
            for(var i = 0; i < shareButtons.length; i++) {
                var shareButton = shareButtons[i];

                shareButton.addEventListener("click", function(e) {
                    var elm = e.target;
                    var network = elm.dataset.network;

//                    console.log("share click: " + network);
                });
            }
        })(document);
    </script>
    <script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property=59d7323924e793001110e213&product=custom-share-buttons"></script>



<?php endwhile; // end of the loop. ?>