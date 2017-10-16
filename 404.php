<?php
/**
 * Created by IntelliJ IDEA.
 * User: online2
 * Date: 16/10/2017
 * Time: 09:46
 */
?>

<?php get_header(); ?>

<?php get_template_part( 'cover' ); ?>


<div class="uk-section uk-padding-remove">
	<div class="uk-container uk-container-small">
		<div class="uk-margin-large" uk-grid id="block">
			<div class="uk-width-2-3@m uk-width-1-1@s">
				<h1 class="uk-heading-primary uk-text-center">OOps !!! Aucun Resultat Trouvé</h1>
				<a href="<?= home_url() ?>" class="uk-text-center">Retour à l'accueil</a>
			</div>
			<?php get_template_part( 'navRight' ); ?>

		</div>

<?php get_footer(); ?>
