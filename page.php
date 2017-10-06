<?php get_header(); ?>

	<div class="uk-section uk-padding-remove-bottom">
	<div class="uk-container">
	<div class="uk-margin-large" uk-grid id="block">
		<div class="uk-width-2-3">
			<?php while ( have_posts() ) : the_post(); ?>
				<h1 class="uk-margin-small uk-h1 uk-text-center">
					<span class="uk-display-block uk-text-break"><?php the_title() ?></span>
				</h1>
				<?php the_content(); ?>

			<?php endwhile; ?>
		</div>
		<?php get_template_part( 'navRight' ); ?>

	</div>


<?php get_footer(); ?>