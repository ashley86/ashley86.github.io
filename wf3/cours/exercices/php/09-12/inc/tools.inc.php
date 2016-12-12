<?php

    # dump...
    function d($msg, $exit = false){
        echo '<pre>';
        var_dump($msg);
        echo '</pre>';
        if($exit) exit;
    }

    # Vérifie si l'utilisateur est connecté
    function is_connected()
    {
        return isset($_SESSION['connected']) && $_SESSION['connected'] === true;
    }

    # Vérifie si l'utilisateur est un admin
    function is_admin()
    {
        if( ! is_connected() ) return false;

        return $_SESSION['user_type'] === 'admin';
    }