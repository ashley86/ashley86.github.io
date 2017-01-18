<?php
# Le fichier doit être inclus
if( ! session_id() ) exit;

if( ! is_admin() )
{
    header('Location: ' . SITE_URL . 'err-0/');
    exit;
}

require_once( 'inc/tools/users.inc.php' );

view_users();