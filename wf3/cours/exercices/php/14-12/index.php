<?php

    /**
     *	Affiche un titre dans un <h2>
     *
     *	@param $txt : le texte à afficher en h2
     *
     *	@return html
     */

    function displayTitle2($txt) {
        echo '<h2>' . $txt . '</h2>';
    }


    /**
     *	Réalise un print_r d'un array avec des balises <pre> pour l'affichage
     *
     *	@param $array : l'array à afficher
     *
     *	@return html
     */

    function print_array($array) {
        echo '<pre>';
        var_dump($array);
        echo '</pre>';
    }

    /**
     *	CRÉATION D'UN OBJET
     */

    displayTitle2('CRÉATION D\'UN OBJET');

    $tab = array(
        'index1' => 'Premier index',
        'index2' => 'Deuxième index',
        'index3' => 'Troisième index'
    );

    $tab2 = array(
        'Premier index',
        'Deuxième index',
        'Troisième index'
    );

    print_array($tab);

    echo '<br />';

    echo $tab['index2'];

    echo '<br />';

    // Instanciation d'un objet grâce à (objet)$
    $obj = (object) $tab;
    $obj2 = (object) $tab2;

    print_array($obj);
    print_array($obj2);

    // Pour récupérer une valeur stockée dans un objet, on utilise "le nom de l'objet"->"le nom de l'index"
    echo $obj->index2;
//    echo $obj->{0];

    // On peut créer une nouvelle propriété à cet objet
    $obj->index4 = 'Quatrième index';

    echo '<br />';

    echo $obj->index4;

    /**
     *	LES DATES http://php.net/manual/fr/function.date.php
     */

    displayTitle2('LES DATES');

    $dateDuJour = date('Y-m-d');

    echo 'La date du jour est : ' . $dateDuJour;

    // Timestamp : c'est le nombre de secondes écoulées depuis le 1er Janvier 1970 à 00h00

    $time = time();

    echo '<br />';

    echo 'Il s\'est écoulé ' . $time . ' secondes depuis le 1er Janvier 1970 à 00h00';
    // http://timestamp.fr/

    echo '<br />';
    echo '<br />';

    $uneDate = date('Y-m-d', 100);
    echo "la date est : " . $uneDate;

    echo '<br />';
    echo '<br />';

    // mktime permet de convertir une date en timestamp
    $timeTemporaire = mktime(12,59,36,12,25,1986);

    echo "Je suis né le : " . date('d/m/Y à H\h i\m', $timeTemporaire);

    echo '<hr />';

    // Récupérer la date d'il y a une semaine
    $dateSemaineDerniere = date('d/m/Y', (time() - (60*60*24*7))); // Calcul 7 jours
    $dateSemaineMoinsDeux = date('d/m/Y', mktime( 0,0,0,date('m'), date('d') - 15, date('Y') )); // Calcul 15 jours
    echo "La semaine dernière, nous étions le " . $dateSemaineDerniere;
    echo "<br />Il y a deux semaines, nous étions le " . $dateSemaineMoinsDeux;

    echo '<hr />';

    function biss($y)
    {
        return date('L', mktime(0,0,0,1,1,$y));
    }

    for($i = 2012; $i <= 2016; $i++)
    {
        echo "<br /><strong>" . $i . "</strong> " . ( biss( $i ) ? "est" : "n'est pas" ) . " une année bissextile";
    }

    echo '<hr />';

    // test si une date est valide
    $result = checkdate(2,29,2014);
    echo "29/02/2014 : " . ( ($result) ? 'Date valide' : 'Date non valide' );

    $result = checkdate(2,25,2014);
    echo "<br />25/02/2014 : " . ( ($result) ? 'Date valide' : 'Date non valide' );

    echo '<hr />';






















