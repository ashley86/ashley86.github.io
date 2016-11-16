// Au chargement de la page
// On appel une fonction anonyme
window.onload = function() {

    // Assignation d'un element du DOM à une variable
    // La variable est désormais un objet DOM
    var conteneur = document.getElementById('conteneur');
    var classConteneur = document.getElementsByClassName('conteneur');
    var toggle = false;

    // Fonction qui change la couleur et la taille
    // de l'élément #conteneur
    function onOff(element) {
        if( toggle === false ) {

            // On change la couleur du fond
            element.style.backgroundColor = '#7c7cea';

            // On change la taille
            element.style.width = 200 + 'px';

            // Assignation d'une nouvelle valeur à la variable 'toggle'
            toggle = true;

        } else {

            // On change la couleur du fond
            element.style.backgroundColor = '#ff9292';

            // On change la taille
            element.style.width = 400 + 'px';

            // Assignation d'une nouvelle valeur à la variable 'toggle'
            toggle = false;
        }
    }

    // Ecoute d'un evenement sur le clique de l'élément #conteneur
    conteneur.addEventListener('click', function(){

        // Appel de la fonction 'onOff'
        // Utilisation du mot clé 'this'
        // 'this' représente l'élément courant, celui qui appelle la fonction
        onOff(this);
    });

    // Ecoute tous les éléments .conteneur
    function addEvent() {
        for( var i = 0; i < classConteneur.length; i++ ) {

            // Ecoute d'un evenement sur le clique de les éléments .conteneur
            classConteneur[i].addEventListener('click', function(){

                // Appel de la fonction 'onOff'
                // Utilisation du mot clé 'this'
                // 'this' représente l'élément courant, celui qui appelle la fonction
                onOff(this);
            });
        }
    }



    addEvent();


}


