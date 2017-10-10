<?php
/**
 * Created by IntelliJ IDEA.
 * User: online2
 * Date: 10/10/2017
 * Time: 11:52
 */

/* Template Name: Page annonceur */
?>

<?php get_header(); ?>

<div class="uk-section uk-padding-remove uk-padding-xsmall">
	<div class="uk-container">
		<div class="uk-margin-large" uk-grid>
			<div class="uk-width-1-1">
				<?php while ( have_posts() ) : the_post(); ?>
						<div class="uk-cover-container uk-cover-slide uk-height-custom-2">
							<?=  get_the_post_thumbnail( get_the_ID(), 'full', array('class' => '', 'uk-cover'=> ''));?>
							<div class="uk-overlay uk-overlay-default uk-position-left uk-width-1-2 uk-padding uk-flex uk-flex-middle">
								<article class="uk-article" style="font-family: 'Open Sans Regular', serif; font-size: 14px;">
									<h2 class="dotdot uk-h3 uk-animation-slide-bottom-small" style="font-family: 'Open Sans Regular', serif; font-weight: normal;">
										<?= $post->post_title ?>
									</h2>

									<div class="uk-margin uk-margin-medium-bottom">
										<p>
											<?= wpautop( get_the_content(), true ); ?>
										</p>
									</div>

									<div class="uk-width-1-1 uk-flex uk-flex-center uk-padding-small uk-padding-remove-vertical uk-margin uk-article-button uk-animation-toggle">
										<button class="uk-button uk-button-secondary" style="color: #fff;">Nous contacter</button>
									</div>

								</article>
							</div>
						</div>

				<?php endwhile; ?>

			</div>

		</div>

<?php get_footer(); ?>
