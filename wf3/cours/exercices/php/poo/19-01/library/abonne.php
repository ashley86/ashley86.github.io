<?php

require 'inc/tools.php';
require 'inc/autoload.php';


use Model\Abonne;

if( ! empty( $_GET[ 'search' ] ) ) {
    $abonnes = Abonne::search( trim( $_GET['search'] ) );
} else if( ! empty( $_GET[ 'filter' ] ) ) {
    $abonnes = Abonne::filterByFirstLetterOfName( trim( $_GET['filter'] ) );
} else {
    $abonnes = Abonne::fetchAll();
}

require 'view/abonne.php';
