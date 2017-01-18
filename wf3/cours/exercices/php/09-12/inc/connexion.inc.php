<?php
/************
 *
 * Fichier de connexion SQL
 *
 ***********/

    # Selon l'environnement, on utilise les logs qui conviennent
    if( IS_PROD )
    {
        $sql_server = '';
        $sql_user = '';
        $sql_pwd = '';
        $sql_db = '';
    }
    else
    {
        $sql_server = 'localhost';
        $sql_user = 'projet_php';
        $sql_pwd = 'projet_php';
        $sql_db = 'projet_php';
    }

    # Connexion au serveur
    $sql_conn = mysqli_connect($sql_server, $sql_user, $sql_pwd) or die('Erreur de connexion au serveur... <br /> ' . mysqli_connect_error() );

    # Connexion à la BDD
    mysqli_select_db( $sql_conn, $sql_db) or die('Erreur de connexion à la BDD <br /> ' . mysqli_error($sql_conn));

    # Pour avoir les retours des futures requêtes au format d'encodage UTF-8
    mysqli_set_charset( $sql_conn, "utf8" );
    mysqli_query($sql_conn, 'SET CHARACTER SET utf8');
    mysqli_query($sql_conn, 'SET NAMES utf8');