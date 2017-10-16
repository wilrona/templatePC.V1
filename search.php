<?php
/**
 * Created by IntelliJ IDEA.
 * User: online2
 * Date: 09/10/2017
 * Time: 17:13
 */

?>




<?php get_header(); ?>

	<div class="uk-section uk-padding-remove">
	<div class="uk-container uk-container-small">
	<div class="uk-margin-large" uk-grid id="block">
		<div class="uk-width-2-3@m">
			<?php get_template_part( 'resultSearch' ); ?>
		</div>
		<?php get_template_part( 'navRight' ); ?>

	</div>

<?php get_footer(); ?>