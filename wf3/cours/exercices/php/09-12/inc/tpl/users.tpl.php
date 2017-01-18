<?php
    # Le fichier doit être inclus
    if( ! session_id() ) exit;

    require_once( './inc/tools/users.inc.php');

    extract(view_profile());

    require_once('users/form.tpl.php');





