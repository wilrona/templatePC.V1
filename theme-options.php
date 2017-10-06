<?php
if ( ! function_exists( 'add_action' )) {
    echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
    exit;
}

// Setup Form
$form = tr_form()->useJson()->setGroup( $this->getName() );
?>

<h1>Theme Options</h1>
<div class="typerocket-container">
    <?php
    echo $form->open();

    // About
    $about = function() use ($form) {
        echo $form->text('Lien facebook');
        echo $form->text('Lien instaggram');
    };

    $send = function() use ($form) {
	    echo $form->text('envoyeur')->setLabel('Email de l\'envoyeur');
	    echo $form->text('subject')->setLabel('Sujet du mail')->setHelp('il sera automatiquement suivie du title de l\'article lors de l\'envoie du message');
	    echo $form->textarea('message')->setLabel('Message du mail')->setHelp('Vous devez utiliser les parametres suivant pour ajouter plus d\'information : %NOM%, %EMAIL_FRIEND% %URL_ARTICLE%, %TITLE_ARTICLE%, %EXCPET_ARTICLE%');
    };

    // Save
    $save = $form->submit( 'Save' );

    // Layout
    tr_tabs()->setSidebar( $save )
    ->addTab( 'Reseaux sociaux', $about )
    ->addTab( 'Message de recommendation', $send )
    ->render( 'box' );
    echo $form->close();
    ?>

</div>
