<?php
# Le fichier doit être inclus
if( ! session_id() ) exit;

require_once 'inc/tools/products.inc.php';
require_once 'inc/tools/orders.inc.php';

list_products_to_order();
