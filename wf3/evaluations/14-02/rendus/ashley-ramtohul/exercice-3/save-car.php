<?php

    // Connexion à la BDD
    require_once 'connect.php';

    // Initialise les erreurs à false
    $errors = false;

    // Prépare les données et cherche les erreurs
    foreach ($_POST as $key => $value) {
        if( empty( $value ) ){
            $errors = true;
            break;
        }

        $post[$key] = strip_tags(trim($value));
    }

    // Si une erreur est trouvée, on retourne une erreur à l'appelant
    if( $errors ) {
        exit( 'NOK' );
    }

    // Prépare la requête SQL
    $ajoutVoiture = $db->prepare('INSERT INTO voitures (marque, modele, annee, couleur) VALUES(:marque, :modele, :annee, :couleur)');

    // On donne les valeurs
    $ajoutVoiture->bindValue(':marque', $post['marque']);
    $ajoutVoiture->bindValue(':modele', $post['modele']);
    $ajoutVoiture->bindValue(':annee', $post['annee']);
    $ajoutVoiture->bindValue(':couleur', $post['couleur']);

    // Execution de la requête
    if( $ajoutVoiture->execute() ) {
        exit('OK');
    } else {
        exit('NOK');
    }