
<?php
    $args = array(
        'post_type' => 'post',
        'post__not_in' => ID_REMOVE,
        'posts_per_page' => 10,
    );

    $the_last = new WP_Query( $args );
?>
<?php if($the_last->have_posts() && !is_mobile()): ?>
<div class="uk-section uk-section-small uk-background-muted">
	<h2 class="uk-h4 uk-text-center uk-opensan-bold uk-une">Articles Récents</h2>
	<div class="owl-carousel owl-theme" id="owl-carousel">
	    <?php while ( $the_last->have_posts() ): $the_last->the_post(); ?>
            <div class="item uk-article<?= tr_taxonomies_field('suffix', 'category', get_the_category($the_last->ID)[0]->parent) ?> uk-transition-toggle">
                <div class="uk-padding-xsmall uk-padding-remove-bottom">
                    <article class="uk-article">

                        <div class="uk-cover-container uk-height-small">
	                        <?=  get_the_post_thumbnail( $the_last->ID, 'full', array('class' => 'uk-transition-scale-up uk-transition-opaque'));?>
                        </div>
                        <h2 class="dotdot uk-margin-small uk-h5" style="max-height: 3.6em">
                            <a href="" class="uk-link-reset uk-display-block uk-text-break"><?= get_the_title() ; ?></a>
                        </h2>

                        <div class="uk-article-meta uk-categorie"><a href="<?= get_category_link(get_the_category($the_last->ID)[0]->term_id);?>" class="uk-text-uppercase uk-text-bold"><?= get_the_category($the_last->ID)[0]->name; ?></a></div>

                        <div class="uk-margin-small"></div>

                    </article>
                </div>
            </div>
        <?php endwhile; ?>
	</div>
</div>

<?php endif; ?>


<?php if($the_last->have_posts() && is_mobile()): ?>
    <div class="uk-background-muted">
        <div class="">
            <table class="uk-table uk-shared uk-table-divider uk-margin-remove uk-table-middle">

                <tbody>
                    <tr>
                        <td colspan="2">
                            <h2 class="uk-h5 uk-opensan-bold uk-une">Articles Récents</h2>
                        </td>
                    </tr>
			    <?php while ( $the_last->have_posts() ) : $the_last->the_post(); ?>
                    <tr class="uk-article<?= tr_taxonomies_field('suffix', 'category', get_the_category($the_last->ID)[0]->parent) ?>">
                        <td>
                            <h2 class="uk-margin-small uk-h6 uk-text-break uk-opensan-regular uk-categorie-title uk-categorie" style="font-size: 13px;">
                                <a href="<?= get_the_permalink($the_last->ID) ?>" class="uk-link-reset"><?= get_the_title() ?></a>
                            </h2>
                            <div class="uk-categorie" style="font-size: 11px;">
                                Publié le <?= get_the_date('d/m/Y', $the_last->ID) ?>
                            </div>
                            <div class="uk-categorie uk-visible@l">
                                <a href="<?= get_category_link(get_the_category($the_last->ID)[0]->term_id);?>" class="uk-text-uppercase uk-text-bold"><?= get_the_category($the_last->ID)[0]->name; ?></a>
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
    </div>

<?php endif; ?>
