<hr class="uk-hr-custom">
<h1 class="uk-h4 uk-text-uppercase uk-margin-small uk-une">à la une</h1>
<hr style="margin-top: 0;">
<div class="uk-margin-medium uk-grid-small" uk-grid uk-scrollspy="target: > div; cls:uk-animation-slide-bottom-medium; delay: 500">
	<?php

    $nbre_aticle = 5;

	$id_remove = [];

    $contenu = tr_posts_field('actuellement_la_une');

	$dossier = tr_posts_field('actuellement_sur_dossier');

    $count = 0;
    ?>
    <?php foreach ($contenu as $content):   ?>

            <?php $post = get_post($content['a_la_une']);   ?>

            <?php if($count == 0): ?>


                <div class="uk-width-1-1">
                    <div class="uk-article<?= tr_taxonomies_field('suffix', 'category', get_the_category($post->ID)[0]->parent) ?> uk-transition-toggle">
                        <article class="uk-article">
                            <h2 class="dotdot uk-h3 uk-margin-small" style="max-height: 3em">
                                <a href="<?= get_the_permalink($post->ID) ?>" class="uk-link-reset uk-display-block uk-text-break"><?= $post->post_title ?> </a>
                            </h2>

                            <div class="uk-article-meta uk-categorie"><a href="<?= get_category_link(get_the_category($post->ID)[0]->term_id);?>" class="uk-text-uppercase uk-text-bold uk-animation-shake"><?= get_the_category($post->ID)[0]->name; ?></a> <br> <?= get_the_date('d/m/Y', $post->ID) ?></div>

                            <div class="uk-margin uk-cover-container uk-height-medium">
                                <?=  get_the_post_thumbnail( $post->ID, 'full', array('class' => 'uk-transition-scale-up uk-transition-opaque'));?>

                            </div>

                            <div class="uk-height-content dotdot uk-margin-small uk-text-justify">
                                <p>
                                    <?= $post->post_excerpt; ?>
                                </p>
                            </div>
                            <div class="uk-margin-medium"></div>
                        </article>
                    </div>
                </div>
            <?php endif; ?>

	        <?php if($count >= 1): ?>
                <div class="uk-width-1-2 uk-margin-medium-top">
                    <div class="uk-article<?= tr_taxonomies_field('suffix', 'category', get_the_category($post->ID)[0]->parent) ?> uk-transition-toggle">
                        <article class="uk-article">

                            <div class="uk-cover-container uk-height-small">
                                <?=  get_the_post_thumbnail( $post->ID, 'full', array('class' => 'uk-transition-scale-up uk-transition-opaque'));?>
                            </div>
                            <h2 class="dotdot uk-margin-small uk-h4" style="max-height: 3em">
                                <a href="<?= get_the_permalink($post->ID) ?>" class="uk-link-reset uk-display-block uk-text-break"><?= $post->post_title ?></a>
                            </h2>

                            <div class="uk-article-meta uk-categorie"><a href="<?= get_category_link(get_the_category($post->ID)[0]->term_id);?>" class="uk-text-uppercase uk-text-bold"><?= get_the_category($post->ID)[0]->name; ?></a></div>


                            <div class="uk-height-content dotdot uk-margin-small uk-text-justify">
                                <p>
                                    <?= $post->post_excerpt; ?>
                                </p>
                            </div>
                            <div class="uk-margin-medium"></div>

                        </article>
                    </div>
                </div>
	        <?php endif; ?>

            <?php $count++; array_push($id_remove, $post->ID); ?>
	        <?php wp_reset_query(); ?>
            <?php
                if($count >= $nbre_aticle){
                    break;
                }
            ?>

    <?php endforeach; ?>


	<?php if($count < $nbre_aticle): ?>

		<?php
		$reste = $nbre_aticle - $count;

		$args = array(
			'post_type' => 'post',
//			'orderby'   => 'rand',
			'post__not_in' => $id_remove,
			'posts_per_page' => $reste,
		);

		$the_query = new WP_Query( $args );
		?>

		<?php if ( $the_query->have_posts() ): ?>
			<?php while ( $the_query->have_posts() ): $the_query->the_post(); ?>

				<?php if($reste == $nbre_aticle): ?>

                    <div class="uk-width-1-1">

                        <div class="uk-article<?= tr_taxonomies_field('suffix', 'category', get_the_category(get_the_ID())[0]->parent) ?> uk-transition-toggle">
                            <article class="uk-article">
                                <h2 class="dotdot uk-h3 uk-margin-small" style="max-height: 3em">
                                    <a href="<?= get_the_permalink($the_query->ID) ?>" class="uk-link-reset uk-display-block uk-text-break"><?= get_the_title() ?> </a>
                                </h2>

                                <div class="uk-article-meta uk-categorie"><a href="<?= get_category_link(get_the_category($the_query->ID)[0]->term_id);?>" class="uk-text-uppercase uk-text-bold uk-animation-shake"><?= get_the_category($the_query->ID)[0]->name; ?></a> <br> <?= get_the_date('d/m/Y', $the_query->ID) ?></div>

                                <div class="uk-margin uk-cover-container uk-height-medium">
									<?=  get_the_post_thumbnail( $the_query->ID, 'full', array('class' => 'uk-transition-scale-up uk-transition-opaque'));?>

                                </div>

                                <div class="uk-height-content dotdot uk-margin-small uk-text-justify">
                                    <p>
	                                    <?= get_the_excerpt(); ?>
                                    </p>
                                </div>
                                <div class="uk-margin-medium"></div>
                            </article>
                        </div>
                    </div>
				<?php endif; ?>

				<?php if($reste < $nbre_aticle): ?>

                    <div class="uk-width-1-2 uk-margin-medium-top">
                        <div class="uk-article<?= tr_taxonomies_field('suffix', 'category', get_the_category(get_the_ID())[0]->parent) ?> uk-transition-toggle">
                            <article class="uk-article">

                                <div class="uk-cover-container uk-height-small">
									<?=  get_the_post_thumbnail( get_the_ID(), 'full', array('class' => 'uk-transition-scale-up uk-transition-opaque'));?>
                                </div>
                                <h2 class="dotdot uk-margin-small uk-h4" style="max-height: 3em">
                                    <a href="<?= get_the_permalink(get_the_ID()) ?>" class="uk-link-reset uk-display-block uk-text-break"><?= get_the_title() ?></a>
                                </h2>

                                <div class="uk-article-meta uk-categorie"><a href="<?= get_category_link(get_the_category(get_the_ID())[0]->term_id);?>" class="uk-text-uppercase uk-text-bold"><?= get_the_category(get_the_ID())[0]->name; ?></a></div>


                                <div class="uk-height-content dotdot uk-margin-small uk-text-justify">
                                    <p>
										<?= get_the_excerpt(); ?>
                                    </p>
                                </div>
                                <div class="uk-margin-medium"></div>

                            </article>
                        </div>
                    </div>

				<?php endif; ?>
				<?php $reste--; array_push($id_remove, get_the_ID())?>

			<?php endwhile; ?>

			<?php wp_reset_query(); ?>
		<?php endif; ?>

	<?php endif; ?>



</div>

<?php if($dossier):  $count_dossier = 0; ?>

<div class="uk-padding-small uk-background-pc">
	<h2 class="uk-text-center uk-text-uppercase uk-text-title-reverse uk-h4 uk-margin-small-top uk-opensan-bold">Dossier</h2>
	<div class="uk-margin uk-margin-remove-left uk-child-width-1-2 uk-grid-small" uk-grid uk-scrollspy="target: > div; cls:uk-animation-slide-top-medium; delay: 500">

	<?php foreach ($dossier as $content):   ?>

		<?php $post = get_post($content['dossier']);   ?>

        <div class="uk-article<?= tr_taxonomies_field('suffix', 'category', get_the_category($post->ID)[0]->parent) ?> uk-padding-xsmall">
			<div class="uk-transition-toggle">
				<article class="uk-article">
					<h2 class="uk-margin-small uk-h5" style="max-height: 2.5em">
						<a href="<?= get_the_permalink($post->ID) ?>" class="uk-link-reset uk-display-block uk-text-truncate"><?= get_the_title() ?></a>
					</h2>

					<div class="uk-article-meta uk-categorie"><a href="<?= get_category_link(get_the_category($post->ID)[0]->term_id);?>" class="uk-text-uppercase uk-text-bold"><?= get_the_category($post->ID)[0]->name; ?></a> <br> <?= get_the_date('d/m/Y', $post->ID) ?></div>

					<div class="uk-margin uk-cover-container uk-height-small">
						<?=  get_the_post_thumbnail( $post->ID, 'full', array('class' => 'uk-transition-scale-up uk-transition-opaque'));?>
					</div>

					<div class="uk-height-content dotdot uk-margin uk-text-justify">
                        <p>
							<?= $post->post_excerpt; ?>
                        </p>
					</div>

				</article>
			</div>
		</div>

		<?php $count_dossier++; array_push($id_remove, $post->ID); ?>
		<?php wp_reset_query(); ?>
		<?php
            if($count_dossier >= 2){
                break;
            }
		?>
	<?php endforeach; ?>

	</div>
</div>

<?php endif; ?>
<?php if (function_exists('the_ad_placement') && the_ad_placement('placement-manuel') ): ?>
<div class="uk-position-relative">
	<div class="uk-width-3-4 uk-position-top-right uk-text-right uk-background-pc-3 uk-padding uk-padding-remove-vertical">
		Publicité
	</div>

	<?php the_ad_placement('placement-manuel') ?>

</div>
<?php endif ?>

<?php define('ID_REMOVE', $id_remove) ?>
