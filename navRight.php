<div class="uk-width-1-3">
<!--	<div class="uk-margin-medium uk-background-pc-2 uk-position-relative">-->
<!--		<table class="uk-table uk-shared uk-table-divider uk-margin-remove">-->
<!--			<thead>-->
<!--			<tr>-->
<!--				<th colspan="3" class="uk-text-title-reverse uk-text-bold uk-text-center">Les plus partagés</th>-->
<!--			</tr>-->
<!--			</thead>-->
<!--		</table>-->
<!--		<div class="">-->
<!--			<table class="uk-table uk-shared uk-table-divider uk-margin-remove uk-table-middle">-->
<!---->
<!--				<tbody>-->
<!--				<tr class="uk-article-act">-->
<!--					<td>-->
<!--						<h2 class="uk-margin-small uk-h6 uk-text-break uk-opensan-regular" style="font-size: 13px;">-->
<!--							<a href="" class="uk-link-reset">Lorem ipsum dolor sit amet  consectetur adipiscing elit, consectetur adipiscing elit</a>-->
<!--						</h2>-->
<!--						<div class="uk-categorie" style="font-size: 11px;">-->
<!--							Publié le 12/02/2016-->
<!--						</div>-->
<!--						<div class="uk-categorie">-->
<!--							<a href="#" class="uk-text-uppercase uk-text-bold">Actualité</a>-->
<!--						</div>-->
<!---->
<!--						-->
<!--					<td class="uk-table-badge uk-text-center">-->
<!--						<span class="uk-badge uk-badge-shared uk-display-block">100 k</span>-->
<!--					</td>-->
<!--				</tr>-->
<!--				<tr class="uk-article-gas">-->
<!--					<td>-->
<!--						<h2 class="uk-margin-small uk-h6 uk-text-break uk-opensan-regular" style="font-size: 13px;">-->
<!--							<a href="" class="uk-link-reset">Lorem ipsum dolor sit amet  consectetur adipiscing elit, consectetur adipiscing elit</a>-->
<!--						</h2>-->
<!--						<div class="uk-categorie" style="font-size: 11px;">-->
<!--							Publié le 12/02/2016-->
<!--						</div>-->
<!--						<div class="uk-categorie">-->
<!--							<a href="#" class="uk-text-uppercase uk-text-bold">Actualité</a>-->
<!--						</div>-->
<!---->
<!--					</td>-->
<!--					<td class="uk-table-badge uk-text-center">-->
<!--						<span class="uk-badge uk-badge-shared uk-display-block">100 k</span>-->
<!--					</td>-->
<!--				</tr>-->
<!--				<tr class="uk-article-cul">-->
<!--					<td>-->
<!--						<h2 class="uk-margin-small uk-h6 uk-text-break uk-opensan-regular" style="font-size: 13px;">-->
<!--							<a href="" class="uk-link-reset">Lorem ipsum dolor sit amet  consectetur adipiscing elit, consectetur adipiscing elit</a>-->
<!--						</h2>-->
<!--						<div class="uk-categorie" style="font-size: 11px;">-->
<!--							Publié le 12/02/2016-->
<!--						</div>-->
<!--						<div class="uk-categorie">-->
<!--							<a href="#" class="uk-text-uppercase uk-text-bold">Actualité</a>-->
<!--						</div>-->
<!---->
<!--					</td>-->
<!--					<td class="uk-table-badge uk-text-center">-->
<!--						<span class="uk-badge uk-badge-shared uk-display-block">100 k</span>-->
<!--					</td>-->
<!--				</tr>-->
<!--				</tbody>-->
<!--			</table>-->
<!--		</div>-->
<!--		<div class="uk-width-1-1 uk-text-right uk-background-pc-3 uk-padding uk-padding-remove-vertical uk-height-custom-pub">-->
<!---->
<!--		</div>-->
<!---->
<!--	</div>-->

	<div class="uk-width-1-1 uk-flex uk-flex-center uk-padding uk-padding-remove-vertical uk-margin-medium">
		<a href="#modal-center" uk-toggle class="uk-button uk-button-default uk-button-large uk-button-menu">Abonnez-vous</a>
	</div>
	<div uk-sticky="bottom: #block">
		<?php  if ( function_exists('the_ad_placement') && the_ad_placement('sidebar-left') ): ?>
		<div class="uk-position-relative">
			<div class="uk-width-1-1 uk-position-top uk-text-right uk-background-pc-3 uk-padding uk-padding-remove-vertical">
				Publicité
			</div>
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