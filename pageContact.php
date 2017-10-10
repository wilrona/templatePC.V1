<?php

/* Template Name: Page Contact */

?>

<?php get_header(); ?>

	<div class="uk-section uk-padding-remove">
	<div class="uk-container uk-container-small">
	<div class="uk-margin-large" uk-grid id="block">
		<div class="uk-width-2-3">
			<?php while ( have_posts() ) : the_post(); ?>
                <div class="uk-background-secondary uk-padding-small uk-margin">
                    <h1 class="uk-margin-remove uk-h4" style="color: #ffffff; font-family: 'Open Sans Bold', serif; "><?php the_title() ?></h1>
                </div>
				<?php the_content() ?>
                <br>

			<?php endwhile; ?>

			<?php if (function_exists('the_ad_placement')): ?>
                <div class="uk-position-relative uk-margin">

					<?php the_ad_placement('placement-manuel') ?>

                </div>
			<?php endif ?>
		</div>
		<?php get_template_part( 'navRight' ); ?>

	</div>


<?php get_footer(); ?>