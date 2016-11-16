// Commentaire sur une ligne

/*
  Commentaire sur
  plusieurs lignes
 */

// Déclaration d'une variable
var maVar = 10;

    // Affichage de l'objet désigné dans le debugger du navigateur
    console.log( 'Valeur de la variable "maVar" : ' + maVar);

// Réassignation d'une nouvelle valeur à une variable
maVar = 10 * 3;

    console.log( 'Réassignation d\'une nouvelle valeur: ' + maVar);

// Création d'une nouvelle variable
var maVar02 = 33;

    // Opération mathématique avec 2 variables
    console.log( 'Opération mathématique de 2 variables: ' + maVar * maVar02 );

// Transformation du typage d'une variable
maVar = "10";

// Utilisation du caractère d'échappement avec des simples quotes
maVar = 'Vers l\'infini et au-delà !' + ' Rendez-vous à la planète : ';

    // Concaténation de différentes chaînes de caractères
    console.log( 'Concaténation de plusieurs chaînes de caractères: ' + maVar + maVar02 );

    // Afficher le type d'une variable
    console.log( 'Affichage du type de la variable "maVar02": ' + typeof( maVar02 ) );

// Instanciation d'un tableau
var monTab = new Array();

// Autre façon d'instancier un tableau (recommandé)
var monTab02 = [];

// Remplissage d'un tableau
var monTab03 = [
    'Capitaine Pabô',   // Nom du capitaine
    62,                 // Âge du capitaine
    9,                  // Esperance de vie
    92,                 // Moussaillons à charge

];

    // Affiche toutes les valeurs du tableau
    console.log( 'monTab03 : ' + monTab03 );

    // Affiche l'objet
    console.info( monTab03 );

    // Affiche une valeur précise du tableau
    console.log( 'Nom du capitaine : ' + monTab03[0] );

// Instanciation d'un tableau multi-dimensionnel
monTab04 = [
    'Equipage coulé',
    [
        'Capitaine Pabô',       // Nom du capitaine
        62,                     // Âge du capitaine
        9,                      // Esperance de vie
        92,                     // Moussaillons à charge
    ]
];

    console.log( monTab04 );

// Ajouter un élément à la fin d'un tableau
monTab04[1].push( 38 ); // Nombre de trésors trouvé

    console.log( monTab04 );

    // Retourne la longueur d'un tableau
    console.log( 'longueur du tableau "monTab04": ' + monTab04.length );
    console.log( 'longueur du tableau "monTab04" du capitaine Pabô: ' + monTab04[1].length );


// Conditions

// Compare la valeur
if( monTab04[1][2] == '9' ) {
    console.log('coucou');
} else {
    console.log('Dommage ! Retentez votre chance !!!');
}

// '===' Compare également le type de la variable
if( monTab04[1][2] === '9' ) {
    console.log('Cette fois-ci c\'est la bonne !!');
} else {
    console.log('Dommage ! Retentez votre chance !!!');
}

// Création d'une fonction
function maFonction(){
    console.log('Hello !');
}

// Appel de la fonction
maFonction();

/*
 * Pour info :
 * Une variable est stockée dans la mémoire de l'ordinateur de l'utilisateur
 * Une fonction de l'ordinateur ( appelée 'garbage collector' )
 * permet de vider cette mémoire utilisé par les variables
 */

// Définition d'une variable dans le 'scope' d'une fonction
function maFonction02() {
    var nouvelleVar = 2;
    return nouvelleVar;
}

// Assignation de la valeur de la fonction à une variable globale
var result = maFonction02();
console.log(result);
