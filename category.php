
<?php get_header(); ?>

<div class="uk-section uk-padding-remove">
	<div class="uk-container uk-container-small">
		<div class="uk-margin-large uk-nav-right" uk-grid id="block">
			<div class="uk-width-2-3@m uk-width-1-1@s">
				<?php get_template_part( 'categoryArticle' ); ?>
			</div>
			<?php get_template_part( 'navRight' ); ?>

		</div>


<?php get_footer(); ?>