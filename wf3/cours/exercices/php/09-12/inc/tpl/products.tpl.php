<?php
    # Le fichier doit être inclus
    if( ! session_id() ) exit;

    require_once( './inc/tools/products.inc.php');

    view_products();





