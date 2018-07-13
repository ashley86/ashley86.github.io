<?php

spl_autoload_register( function( $classname ){
    # __DIR__ Répertoire courant
    # $classname est le nom complet de la classe (avec son namespace)
    $file = __DIR__ . '/' . str_replace('\\', '/', $classname) . '.php';

    echo '<pre>' . $file . '</pre>';

    include $file;
});