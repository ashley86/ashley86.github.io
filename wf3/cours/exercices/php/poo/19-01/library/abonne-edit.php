<?php

require 'inc/tools.php';
require 'inc/autoload.php';


use Model\Abonne;

$abonne = new Abonne();

if( ! empty( $_POST ) )
{
    if( ! Abonne::validatePrenom( $_POST['prenom'], $msg ) )
    {
        $errors['prenom'] = $msg;
    }

    if( ! Abonne::validateNom( $_POST['nom'], $msg ) )
    {
        $errors['nom'] = $msg;
    }

    $abonne = Abonne::find($_POST['id']);

    if( empty( $errors ) ) {
        $abonne->setNom($_POST['nom']);
        $abonne->setPrenom($_POST['prenom']);
        $abonne->update($msg);

        $success_msg = $msg;
    }

} elseif( isset( $_GET[ 'id' ] ) ) {
    $abonne = Abonne::find( $_GET[ 'id' ] );
}

require 'view/abonne-edit.php';
