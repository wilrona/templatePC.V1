

<?php if(tr_posts_field('actuellement_en_cover')): ?>

<?php $post_cover = get_post(tr_posts_field('actuellement_en_cover')); ?>

<div class="uk-container uk-container-small uk-submenu uk-margin-medium-bottom">
	<div class="uk-cover-container uk-height-custom uk-cover-slide uk-animation-fade uk-animation-toggle uk-transition-toggle">
		<?=  get_the_post_thumbnail( $post_cover->ID, 'full', array('class' => 'uk-transition-scale-up uk-transition-opaque'));?>
		<div class="uk-overlay uk-overlay-default uk-position-left uk-width-1-3@l uk-width-1-2@m uk-width-1-1@s uk-article<?= tr_taxonomies_field('suffix', 'category', get_the_category($post_cover->ID)[0]->parent) ?> uk-flex uk-flex-middle ">
			<article class="uk-article uk-article-cover uk-margin-medium-right">
				<h2 class="dotdot uk-h3 uk-margin-small uk-animation-slide-bottom-small" style="max-height: 4em">
					<a href="<?= get_the_permalink($post_cover->ID) ?>" class="uk-link-reset uk-display-block uk-text-break"><?= $post_cover->post_title ?></a>
				</h2>

				<div class="uk-article-meta uk-categorie"><a href="<?= get_category_link(get_the_category($post_cover->ID)[0]->term_id);?>" class="uk-text-uppercase uk-text-bold uk-animation-shake"><?= get_the_category($post_cover->ID)[0]->name; ?></a> <br> <?= get_the_date('d/m/Y', $post_cover->ID) ?></div>


				<div class="uk-height-small dotdot uk-margin">
					<p>
						<?= $post_cover->post_excerpt; ?>
                    </p>
				</div>

				<div class="uk-grid-small uk-child-width-auto uk-margin-small uk-animation-slide-left-small" uk-grid>
					<div>
                        <?php $auteur_id = $post_cover->post_author; ?>
						Ajouté par : <a class="uk-link-reset" href=""><?php the_author_meta( 'display_name' , $auteur_id ); ?></a>
					</div>
				</div>

			</article>
		</div>
	</div>
</div>
<?php endif; ?>