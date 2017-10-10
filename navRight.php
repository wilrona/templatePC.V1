<div class="uk-width-1-3">
	<?php
	$popularpost = new WP_Query( array(
		'posts_per_page' => 5,
		'meta_key' => 'post_views_count',
		'orderby' => 'meta_value_num',
		'order' => 'DESC',
		'post_type' => 'post',
	) );
	?>
    <?php if($popularpost->have_posts()): ?>
	    <div class="uk-margin-medium uk-background-pc-2 uk-position-relative">
		<table class="uk-table uk-shared uk-table-divider uk-margin-remove">
			<thead>
			<tr>
				<th colspan="3" class="uk-text-title-reverse uk-text-bold uk-text-center">Les plus populaires</th>
			</tr>
			</thead>
		</table>
		<div class="">
			<table class="uk-table uk-shared uk-table-divider uk-margin-remove uk-table-middle">

				<tbody>
	                <?php while ( $popularpost->have_posts() ) : $popularpost->the_post(); ?>
                    <tr class="uk-article<?= tr_taxonomies_field('suffix', 'category', get_the_category($popularpost->ID)[0]->parent) ?>">
                        <td>
                            <h2 class="uk-margin-small uk-h6 uk-text-break uk-opensan-regular" style="font-size: 13px;">
                                <a href="<?= get_the_permalink($popularpost->ID) ?>" class="uk-link-reset"><?= get_the_title() ?></a>
                            </h2>
                            <div class="uk-categorie" style="font-size: 11px;">
                                Publié le <?= get_the_date('d/m/Y', $popularpost->ID) ?>
                            </div>
                            <div class="uk-categorie">
                                <a href="<?= get_category_link(get_the_category($popularpost->ID)[0]->term_id);?>" class="uk-text-uppercase uk-text-bold"><?= get_the_category($popularpost->ID)[0]->name; ?></a>
                            </div>
                        </td>

                        <td class="uk-table-badge uk-text-center">
                            <span class="uk-badge uk-badge-shared">
                                <?= displayMontant(get_post_meta(get_the_ID(), 'post_views_count')[0]) ?>
                            </span>
                        </td>
                    </tr>
                    <?php endwhile; ?>
				</tbody>
			</table>
		</div>
		<div class="uk-width-1-1 uk-text-right uk-background-pc-3 uk-padding uk-padding-remove-vertical uk-height-custom-pub">

		</div>

	</div>
    <?php endif; ?>
    <?php wp_reset_query(); ?>

	<div class="uk-width-1-1 uk-flex uk-flex-center uk-padding uk-padding-remove-vertical uk-margin-medium">
		<a href="#modal-center" uk-toggle class="uk-button uk-button-default uk-button-large uk-button-menu">Abonnez-vous</a>
	</div>
	<div uk-sticky="bottom: #block">
		<?php  if ( function_exists('the_ad_placement')): ?>
		<div class="uk-position-relative">
			<?=  the_ad_placement('sidebar-left') ?>
			<div class="uk-width-1-1 uk-position-bottom uk-text-right uk-background-pc-3 uk-padding uk-padding-remove-vertical uk-height-custom-pub">

			</div>
		</div>
		<?php  endif ?>
		<div class="uk-margin-small uk-background-pc-2 uk-position-relative">
			<table class="uk-table uk-gallery uk-shared uk-table-divider uk-margin-remove">
				<thead>
				<tr>
					<th colspan="3" class="uk-text-title-reverse uk-text-bold uk-text-center">Pause Café</th>
				</tr>
				</thead>
			</table>
			<div class="uk-gallery-show uk-padding-small uk-padding-remove-top uk-padding-remove-left uk-padding-remove-right" style="background-color: #000000;">
				<?= do_shortcode('[instagram-feed]'); ?>
			</div>
			<div class="uk-width-1-1 uk-background-pc-3 uk-flex uk-flex-center uk-social uk-padding-xsmall uk-height-custom-pub">
				<div>
					<ul class="uk-subnav uk-icone uk-padding-remove-vertical uk-margin-remove uk-margin-small">
						<li> Suivez nous sur</li>
						<li><a href="<?=  tr_options_field('pc_options.lien_facebook'); ?>" uk-icon="icon: facebook" class="uk-icon" target="_blank"></a></li>
						<li><a href="<?= tr_options_field('pc_options.lien_instagram'); ?>" uk-icon="icon: instagram" class="uk-icon" target="_blank"></a></li>
					</ul>
				</div>

			</div>

		</div>
	</div>

</div>