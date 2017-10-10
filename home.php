<?php /* Template Name: Page accueil */ ?>


<?php get_header(); ?>

	<?php get_template_part( 'cover' ); ?>


	<div class="uk-section uk-padding-remove">
		<div class="uk-container uk-container-small">
			<div class="uk-margin-large" uk-grid id="block">
				<div class="uk-width-2-3">
					<?php get_template_part( 'articleHome' ); ?>
				</div>
				<?php get_template_part( 'navRight' ); ?>

			</div>





<?php get_footer(); ?>