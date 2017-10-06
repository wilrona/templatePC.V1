
<div class="uk-hidden" id="resultat" uk-alert></div>
<div class="uk-margin">
	<div class="uk-margin uk-form-controls">
		<input class="uk-input" name="nomfriend" id="nomfriend" type="text" placeholder="Votre Nom">
	</div>
	<div class="uk-margin uk-form-controls">
		<input class="uk-input" name="emailfriend" id="emailfriend" type="text" placeholder="Adresse Email de votre ami">
	</div>
    <?php
        $digit1 = mt_rand(1,20);
        $digit2 = mt_rand(1,20);
        if( mt_rand(0,1) === 1 ) {
            $math = "$digit1 + $digit2";
            $resultat = $digit1 + $digit2;
        } else {
            $math = "$digit1 - $digit2";
            $resultat = $digit1 - $digit2;
        }
    ?>
    <div class="uk-margin uk-form-controls">
        <label for=""><?= $math ?></label>
        <input class="uk-input" name="math" id="math" type="text" placeholder="Entrez le resultat">
    </div>
</div>
<button id="submit" class="uk-button uk-button-default uk-button-menu">Envoyez</button>
<button class="uk-button uk-button-default uk-modal-close uk-button-menu-reverse" type="button">Fermez</button>



<script>
    jQuery(document).ready(function(){

        function isValidEmailAddress(emailAddress) {
            var pattern = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
            return pattern.test(emailAddress);
        };

        jQuery("#submit").on('click', function(e){
            e.preventDefault();
			var $email = jQuery("#emailfriend");
			var $name = jQuery("#nomfriend");
			var $math = jQuery("#math");

			if ($name !== '' && $email !== ''){

                if(isValidEmailAddress($email.val())){
                    jQuery.post(
                        '<?php echo get_template_directory_uri(); ?>/senderForm.php', // Un script PHP que l'on va créer juste après
                        {
                            email : $email.val(),
                            name : $name.val(),
                            math : $math.val(),
                            sender : '<?= tr_options_field('pc_options.envoyeur') ?>',
                            message: '<?= trim(preg_replace('/\s+/', ' ', addslashes(nl2br(tr_options_field( 'pc_options.message'))))); ?>',
                            subject: '<?= tr_options_field( 'pc_options.subject') ?>',
                            url : '<?= get_permalink() ?>',
                            titre: '<?= get_the_title() ?>',
                            except: '<?= get_the_excerpt(); ?>',
                            security : '<?= $resultat ?>'
                        },

                        function(data){ // Cette fonction ne fait rien encore, nous la mettrons à jour plus tard

                            if(data == 'Success'){
                                // Le membre est connecté. Ajoutons lui un message dans la page HTML.

                                jQuery("#resultat").removeClass('uk-hidden').addClass('uk-alert-success').html("<p>Votre Message a été envoyé avec succès</p>");
                                $email.val('');
                                $name.val('');
                            }else if(data === 'Error'){
                                jQuery("#resultat").removeClass('uk-hidden').addClass('uk-alert-danger').html("<p>Resultat incorrect</p>");
                                $math.addClass('uk-form-danger');
                            }
                            else{
                                // Le membre n'a pas été connecté. (data vaut ici "failed")

                                jQuery("#resultat").removeClass('uk-hidden').addClass('uk-alert-danger').html("<p>Nous avons rencontrer des erreurs</p>");
                            }

                        },

                        'text' // Nous souhaitons recevoir "Success" ou "Failed", donc on indique text !
                    );
                }else{
                    jQuery("#resultat").removeClass('uk-hidden').addClass('uk-alert-danger').html("<p>Adresse Email invalid</p>");
                    $email.addClass('uk-form-danger')
                }
            }



        });

    });
</script>


