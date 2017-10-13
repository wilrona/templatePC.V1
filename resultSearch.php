<?php
/**
 * Created by IntelliJ IDEA.
 * User: online2
 * Date: 10/10/2017
 * Time: 09:49
 */

global $wp_query;
?>
<nav class="uk-navbar-container" uk-navbar>
	<div class="uk-navbar-left">

		<div class="uk-navbar-item">
			<form class="uk-search uk-search-navbar" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
				<span uk-search-icon></span>
				<input class="uk-search-input" type="search" name="s" value="<?php the_search_query(); ?>" placeholder="Search...">
			</form>
		</div>

	</div>
</nav>
	<div class="uk-width-1-1">
		<hr>
	</div>
<div class="uk-background-secondary uk-padding-xsmall">
	<h1 class="uk-margin-remove uk-h4" style="color: #ffffff; font-family: 'Open Sans Bold', serif; ">Resultat de la recherche : " <?php the_search_query(); ?>"</h1>
</div>
<div><small><?php echo $wp_query->found_posts; ?> résultat(s) trouvé(s)</small></div>


<?php if ( have_posts() ) { ?>
	<?php while ( have_posts() ) { the_post(); ?>

			<div class="uk-width-1-1 the_post">

				<div class="uk-article<?= tr_taxonomies_field('suffix', 'category', get_the_category(get_the_ID())[0]->parent) ?> uk-margin uk-article-horizontal uk-transition-toggle">
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
								<h2 class="dotdot uk-margin-small uk-h5" style="max-height: 3em">
									<a href="<?= get_the_permalink(get_the_ID()) ?>" class="uk-link-reset uk-display-block uk-text-break"><?= get_the_title(); ?></a>
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

				<hr>

			</div>

	<?php  } ?>
	<?php if($wp_query->found_posts > 3): ?>


		<div class="uk-width-1-1 uk-flex uk-flex-center uk-padding-small uk-padding-remove-vertical uk-margin-small uk-article-button uk-animation-toggle">
			<button class="uk-button uk-button-secondary loadmore uk-button-small" style="color: #fff;">Plus de resultats</button>
		</div>

		<script type="text/javascript">
            var ajaxurl = "<?php echo admin_url( 'admin-ajax.php' ); ?>";
            var page = 2;
            jQuery(function($) {
                $('body').on('click', '.loadmore', function() {
                    var data = {
                        'action': 'load_posts_by_ajax',
                        'page': page,
                        'security': '<?php echo wp_create_nonce("load_more_posts"); ?>',
                        'type' : 'search',
	                    'query': '<?php the_search_query(); ?>'
                    };

                    $.post(ajaxurl, data, function(response) {
                        if(response === ''){
                            $('body .loadmore').removeClass('uk-button-secondary').addClass('uk-animation-shake').prop('disabled', true);
                        }else{
                            $('.the_post:last').after(response);
                            page++;
                        }
                    });
                });
            });
		</script>
	<?php endif; ?>
<?php }else{
	?>
	<div class="uk-heading-primary uk-text-center uk-padding">Aucun resultat</div>

<?php
}
?>