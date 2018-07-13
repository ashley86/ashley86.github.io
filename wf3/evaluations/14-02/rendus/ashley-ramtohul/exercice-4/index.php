<?php

    # Appel le fichier contenant la classe du chat
    require_once 'Chat.php';

/**********************************
 *                                *
 *        AJOUT DES CHATS         *
 *                                *
/*********************************/
    # Ajoute des informations au chat #1
    try {
        $chat1 = new Chat('Minou', 40, 'vert', 'femelle', 'Maine Coon');
    } catch(Exception $e) { # En cas d'erreur, une exception est retournée, on l'affiche
        echo 'Une erreur est survenue : <strong>' . $e->getMessage() . '</strong><hr />';
    }

    # Ajoute des informations au chat #2
    try {
        $chat2 = new Chat('GrosMinou', 30, 'Rose', 'male', 'Sphynx');
    } catch(Exception $e) {
        echo 'Une erreur est survenue : <strong>' . $e->getMessage() . '</strong><hr />';
    }

    # Ajoute des informations au chat #3
    try {
        $chat3 = new Chat('Garfield', 12, 'orange', 'male', 'unknown');
    } catch(Exception $e) {
        echo 'Une erreur est survenue : <strong>' . $e->getMessage() . '</strong><hr />';
    }

/**********************************
 *                                *
 *       AFFICHAGE DES CHATS      *
 *                                *
/*********************************/
    for( $i = 1; $i <= 3; $i++ )
    {
        # Si une erreur est survenue lors de l'instanciation du chat
        # Le chat n'existe pas, il ne sera donc pas affiché
        if( ! isset(${'chat' . $i}) ){
            continue;
        }

        # Affichage des informations du chat
        echo 'Chat n°' . $i . '<ul>';
        foreach(${'chat' . $i}->getInfos() as $infoName => $info){
            echo '<li>' . $infoName . ' : ' . $info . '</li>';
        }
        echo '</ul>';
        echo '<hr />';
    }


# GoTo Project !!!!