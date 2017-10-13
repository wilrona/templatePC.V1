

	<?php

	$thiscat = get_category( get_query_var( 'cat' ) );

	$catlist = get_categories(
		array(
			'child_of' => $thiscat->parent,
			'orderby' => 'id',
			'order' => 'ASC',
			'exclude' => $thiscat->term_id,
			'hide_empty' => '1'
		) );
	?>

	<div class="uk-banner-title uk-article<?= tr_taxonomies_field('suffix', 'category', $thiscat->parent) ?> uk-grid-collapse uk-opensan-bold" uk-grid>
		<div class="uk-width-auto@m uk-padding-xsmall boundary-align-1 uk-box-shadow-medium">
			<div class="uk-inline uk-width-1-1">
				<div><span class="uk-margin-right"><?= get_cat_name( $thiscat->parent ) ?></span> <span uk-icon="icon: menu" class="uk-float-right"></span></div>
				<div uk-dropdown="pos: bottom-justify; boundary: .boundary-align-1; boundary-align: true" class="uk-padding-xsmall uk-margin-remove">

					<ul class="uk-nav uk-dropdown-nav">
						<?php foreach ($catlist as $exclus): ?>
							<li><a href="<?= get_category_link($exclus->term_id);?>"><?= $exclus->name; ?></a></li>
							<li class="uk-nav-divider"></li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
		</div>
		<div class="uk-width-expand uk-padding-xsmall"> <?= $thiscat->name ?> </div>

	</div>
	<?php
		$count = 1;
	?>

	<div class="uk-margin uk-margin-large-bottom uk-grid-small uk-nav-right" uk-grid>

        <?php
            $args = array(

                'post_type' => 'post',

                'post_status' => 'publish',

                'posts_per_page' => '6',

                'paged' => 1,

                'cat' => $thiscat->term_id

            );

            $my_posts = new WP_Query( $args );

        ?>

	<?php while ( $my_posts->have_posts() ) : $my_posts->the_post(); ?>

		<?php if($count <= 2): ?>

			<div class="uk-width-1-2@m uk-margin-medium-top uk-nav-right">
				<div class="uk-article<?= tr_taxonomies_field('suffix', 'category', $thiscat->parent) ?> uk-transition-toggle">
					<article class="uk-article">

						<div class="uk-cover-container uk-height-small">
							<?=  get_the_post_thumbnail( get_the_ID(), 'full', array('class' => 'uk-transition-scale-up uk-transition-opaque')); ?>
						</div>
						<div class="uk-padding-custom">
                            <h2 class="dotdot uk-margin-small uk-h5" style="max-height: 3em">
                                <a href="<?= get_the_permalink(get_the_ID()) ?>" class="uk-link-reset uk-display-block uk-text-break"><?= get_the_title(); ?></a>
                            </h2>

                            <div class="uk-article-meta uk-categorie">
                                <span class="uk-hidden@m"><?= get_the_date('d/m/Y', get_the_ID()) ?> <br></span>
                                <a href="<?= get_category_link(get_the_category(get_the_ID())[0]->term_id); ?>" class="uk-text-uppercase uk-text-bold"><?= get_the_category(get_the_ID())[0]->name; ?></a>
                            </div>


                            <div class="uk-height-content dotdot uk-margin-small uk-text-justify">
                                <p>
									<?= get_the_excerpt(); ?>
                                </p>
                            </div>
                        </div>
						<div class="uk-margin-small"></div>

					</article>
				</div>
			</div>

		<?php endif; ?>

		<?php if($count == 2): ?>

			<?php if (is_mobile()): ?>
				<?php if (function_exists('the_ad_placement')): ?>
                    <div class="uk-position-relative uk-publicite">

						<?php the_ad_placement('placement-manuel-mobile') ?>

                    </div>
				<?php endif ?>
			<?php else: ?>
				<?php if (function_exists('the_ad_placement')): ?>
                    <div class="uk-position-relative">

						<?php the_ad_placement('placement-manuel') ?>

                    </div>
				<?php endif ?>
			<?php endif ?>

		<?php endif; ?>

		<?php
			if($count > 2) :
		?>

		<div class="uk-width-1-1 the_post uk-nav-right">

			<div class="uk-article<?= tr_taxonomies_field('suffix', 'category', $thiscat->parent) ?> uk-margin <?php if(!is_mobile()): ?> uk-article-horizontal <?php endif; ?> uk-transition-toggle">
				<article class="uk-article">
					<div class="uk-padding-small uk-padding-remove-horizontal uk-padding-custom" uk-grid>
						<div class="uk-width-1-3 uk-flex-first@m">
							<div class="uk-cover-container uk-height-1-1 uk-flex uk-flex-middle">
								<?=  get_the_post_thumbnail( get_the_ID(), 'full', array('class' => 'uk-transition-scale-up uk-transition-opaque')); ?>
							</div>
						</div>
						<div class="uk-width-2-3 uk-flex-first uk-flex-last@m">
							<div class="uk-article-meta uk-categorie uk-visible@m">
								<?= get_the_date('d/m/Y', get_the_ID()) ?> <br>
								<a href="<?= get_category_link(get_the_category(get_the_ID())[0]->term_id); ?>" class="uk-text-uppercase uk-text-bold"><?= get_the_category(get_the_ID())[0]->name; ?></a>
							</div>
							<h2 class="dotdot uk-margin-small uk-h5" style="max-height: 3em">
								<a href="<?= get_the_permalink(get_the_ID()) ?>" class="uk-link-reset uk-display-block uk-text-break"><?= get_the_title(); ?></a>
							</h2>
                            <div class="uk-article-meta uk-categorie uk-hidden@m">
								<?= get_the_date('d/m/Y', get_the_ID()) ?> <br>
                                <a href="<?= get_category_link(get_the_category(get_the_ID())[0]->term_id); ?>" class="uk-text-uppercase uk-text-bold"><?= get_the_category(get_the_ID())[0]->name; ?></a>
                            </div>
							<div class="uk-height-content dotdot uk-margin-small uk-text-justify uk-visible@m">
								<p>
									<?= get_the_excerpt(); ?>
								</p>
							</div>
							<div class="uk-grid-small uk-child-width-auto uk-margin-small uk-visible@m" uk-grid>
								<div>
									<?php $auteur_id = get_the_author_ID(); ?>
									Ajouté par : <a class="uk-link-reset" href=""><?php the_author_meta( 'display_name' , $auteur_id ); ?></a>
								</div>
							</div>
						</div>

                        <div class="uk-width-1-1 uk-hidden@m uk-margin-small">
                            <div class="uk-height-content dotdot uk-margin-small uk-text-justify">
                                <p>
	                                <?= get_the_excerpt(); ?>
                                </p>
                            </div>
                        </div>
					</div>

				</article>
			</div>

		</div>


		<?php endif; ?>

		<?php
			$count++;
		?>

	<?php endwhile; ?>

		<div class="uk-width-1-1 uk-visible@m">
			<hr>
		</div>

		<div class="uk-width-1-1 uk-flex uk-flex-center@m uk-padding-small uk-padding-remove-vertical uk-margin-small uk-article<?= tr_taxonomies_field('suffix', 'category', $thiscat->parent) ?> uk-article-button uk-animation-toggle">
            <a href="<?= get_category_link($list->term_id); ?>" class="uk-button uk-button-default uk-width-auto@m uk-width-1-1 uk-display-block uk-margin-auto loadmore">Plus d'articles</a>
		</div>

	</div>

    <script type="text/javascript">
        var ajaxurl = "<?php echo admin_url( 'admin-ajax.php' ); ?>";
        var page = 2;
        jQuery(function($) {
            $('body').on('click', '.loadmore', function(e) {
                e.preventDefault();
                var data = {
                    'action': 'load_posts_by_ajax',
                    'page': page,
                    'security': '<?php echo wp_create_nonce("load_more_posts"); ?>',
                    'cat' : '<?php echo $thiscat->term_id; ?>',
                    'type' : 'subcategory'
                };

                $.post(ajaxurl, data, function(response) {
                    if(response === ''){
                        $('body .loadmore').removeClass('uk-button-default').addClass('uk-animation-shake').prop('disabled', true);
                    }else{
                        $('.the_post:last').after(response);
                        page++;
                    }
                });
            });
        });
    </script>



