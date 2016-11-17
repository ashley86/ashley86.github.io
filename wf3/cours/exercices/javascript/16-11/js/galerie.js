window.onload = function() {

    var btnOpen = document.getElementById('openGalerie');


    btnOpen.addEventListener('click', function(e){
        e.preventDefault();

        if( ! document.getElementById('conteneurVignettes').getElementsByTagName('img').length ) {
            addImg();
        } else {
//            removeImg();
        }
    });

//
//    // Taille du tableau : 8
//    tableau = [
//        '0' => 'Element n°1'
//        '1' => 'Element n°2'
//        '2' => 'Element n°3'
//        '3' => 'Element n°4'
//        '4' => 'Element n°5'
//        '5' => 'Element n°6'
//        '6' => 'Element n°7'
//        '7' => 'Element n°8'
//    ];
//    // Si je boucle sur i, qui est incrémenté
//    // Et que je supprime le 1er élément (0), puis le second (1), puis le troisième (2), etc...
//    // Au premier passage de la boucle, 'Element n°1' est supprimé,
//    // C'est donc 'Element n°1" qui devient le premier élément (0)
//    // Comme on incrémente i, on veut ensuite supprimer le second élément (1), qui est désormais occupé par 'Element N°3'
//


}
//
//function removeImg(){
//    var conteneurVignettes = document.getElementById('conteneurVignettes');
//    var nbChild = conteneurVignettes.children.length;
//
//    for(var i = 0; i < nbChild; i++)
//    {
//        conteneurVignettes.removeChild(conteneurVignettes.children[0]);
//    }
//}

function addImg(){


    // Suppression de l'ancien contenu
    var removeLinks = conteneurVignettes.getElementsByTagName('a');
    for(var i = 0; i < removeLinks.length; i++) {
        if( removeLinks.length > 0 ) {
            removeLinks.remove();
        }
    }

    // Définition des variables
    var dir = 'img/galerie/';
    var thExt = '.png';
    var imgExt = '.jpg';
    var imgFiles = [ 'img-1', 'img-2', 'img-3', 'img-4' ];

    /*
     * Pour inclure un élément dans un fichier, utiliser la méthode .appendChild()
     */
    for( var i = 0; i < imgFiles.length; i++ ) {

        // Création d'une balise lien
        var link = document.createElement('a');
        // Attribution de l'attribut href
        link.setAttribute('href', dir + imgFiles[i] + imgExt);

        // Création d'une balise img
        var vignette = document.createElement('img');

        // Atributions d'attributs
        vignette.setAttribute('src', dir + 'th/' + imgFiles[i] + thExt );
        vignette.setAttribute('alt', 'image N°' + i);

        // Insertion de l'image dans la balise lien
        link.appendChild( vignette );

        // Inclusion du DOM dans la page
        conteneurVignettes.appendChild( link );
    }



}
