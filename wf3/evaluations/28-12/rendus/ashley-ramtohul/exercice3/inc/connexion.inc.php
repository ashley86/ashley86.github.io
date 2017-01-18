<?php
/************
 *
 * Fichier de connexion SQL
 *
 ***********/

    # Connexion au serveur
    $sql_conn = mysqli_connect(BDD_HOST, BDD_USER, BDD_PWD) or die('Erreur de connexion au serveur... <br /> ' . mysqli_connect_error() );

    # Connexion à la BDD
    mysqli_select_db( $sql_conn, BDD_DB) or die('Erreur de connexion à la BDD <br /> ' . mysqli_error($sql_conn));

    # Pour avoir les retours des futures requêtes au format d'encodage UTF-8
    mysqli_set_charset( $sql_conn, "utf8" );
    mysqli_query($sql_conn, 'SET CHARACTER SET utf8');
    mysqli_query($sql_conn, 'SET NAMES utf8');
