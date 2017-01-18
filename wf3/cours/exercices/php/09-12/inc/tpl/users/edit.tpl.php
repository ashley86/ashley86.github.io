<?php
    # Le fichier doit être inclus
    if( ! session_id() ) exit;

    if( empty( $_GET['id'] ) )
    {
        header('Location: ' . SITE_URL . 'users/err-0/');
        exit;
    }

    if( ! is_admin() )
    {
        header('Location: ' . SITE_URL . 'err-0/');
        exit;
    }

    $user_id = $_GET['id'];

    require_once('inc/tools/users.inc.php');

    $user_infos = view_profile( $user_id );

    if( ! is_null( $user_infos ) )
    {
        extract( $user_infos );
    } else {
        header('Location: ' . SITE_URL . 'users/err-6/');
        exit;
    }


    require_once('form.tpl.php');