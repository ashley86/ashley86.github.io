<?php
    # Le fichier doit être inclus
    if( ! session_id() ) exit;

    require_once( './inc/tools/orders.inc.php');

    view_orders();