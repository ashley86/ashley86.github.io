// Une fois que le chargement de la page est terminé
// On créé une fonction anonyme
window.onload = function(){


    var cube = document.getElementById('conteneur');
    var btn = document.getElementById('link');

    function moveCube() {

        // Execute une fonction au bout de Xms
        var time = setTimeout(function(){
            cube.style.left = 50+'%';
        }, 500);

        // On initialise la position
        var step = 4;
        // Execute une fonction toutes les Xms
        var time = setInterval(function(){

            // On incrémente la position à chaque passage
            step++;
            // Si la position ne dépasse pas la valeur 92
            if( step < 93 ) {
                // On modifie la position de l'élément
                cube.style.left = step+'%';
            } else {
                // Sinon, on arrête l'execution de la boucle
                clearInterval(time);
            }
        }, 50);

    }

    // On écoute l'évenement clique sur le bouton
    btn.addEventListener('click', function(e){
        // On bloque le comportement par défaut du lien
        e.preventDefault();

        // On appelle la fonction moveCube
        moveCube();

    });

}
