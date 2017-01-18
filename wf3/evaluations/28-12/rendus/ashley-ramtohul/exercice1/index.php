<?php
/**
 * -- Consigne --
 * Exercice 1 : « On se présente ! »
 * Créer un tableau en PHP contenant les infos suivantes :  ● Prénom ● Nom ● Adresse ● Code Postal ● Ville ● Email ● Téléphone ● Date de naissance au format anglais (YYYY-MM-DD)
 * A l’aide d’une boucle, afficher le contenu de ce tableau (clés + valeurs) dans une liste HTML. La date sera affichée au format français (DD/MM/YYYY).
 * Bonus :  Gérer l’affichage de la date de naissance à l’aide de la classe DateTime
 */

# Array contenant mes informations personnelles
$informations_personnelles = [
    'prenom'            =>  'Ashley',
    'nom'               =>  'Ramtohul',
    'adresse'           =>  '13 allée des fleurs',
    'code_postal'       =>  '75013',
    'ville'             =>  'Paris',
    'email'             =>  'ashley.ramtohul@gmail.com',
    'telephone'         =>  '06.28.63.41.45',
    'date_de_naissance' =>  '1986-12-25'
];
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Informations personnelles</title>
</head>
<body>
<?php

# Boucle pour afficher mes informations personnelles
foreach( $informations_personnelles as $type_info => $info )
{
    # Affiche le label
    echo ucfirst( str_replace( '_', ' ', $type_info ) ) . ' : ';

    # Affichage spécifique pour la date de naissance
    if( $type_info == 'date_de_naissance' )
    {
        $jour_naissance = substr($info, 5, 2); // On récupère le jour de naissance
        $mois_naissance = substr($info, 8, 2); // On récupère le mois de naissance
        $annee_naissance = substr($info, 0, 4); // On récupère l'année de naissance

        # On créé un objet DateTime avec les informations précédemment récupérées
        $date_de_naissance = new DateTime( $annee_naissance . '-' . $jour_naissance . '-' . $mois_naissance . 'T0:0:0' );

        # On affiche la date de naissance au format FR
        echo ' <strong> ' . $date_de_naissance->format('d/m/Y') . '</strong><br />';
    } else {
        # Affiche de l'information
        echo ' <strong> ' . $info . '</strong><br />';
    }
}
?>
</body>
</html>
