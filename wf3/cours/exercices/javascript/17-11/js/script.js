// Au chargement de la page
window.onload = function()
{
    // Récupération du conteneur de liens
    var links = document.getElementById('tabLinks');
    // Récupération du conteneur des textes
    var txt = document.getElementById('tabTxt');
    // Définition de la liste des liens -- astuce JS
    var tabList = Array.prototype.slice.call( links.children );

    // On boucle pour ajouter une écoute sur tous les éléments tabs
    for(var i = 0; i < links.children.length; i++)
    {
        // Lors d'un clique sur le lien
        links.children[i].addEventListener('click', function(e)
        {
            // On annule le comportement par défaut
            e.preventDefault();
            // On cherche "l'index" du lien sur lequel on vient de cliquer
            var tabIndex = tabList.indexOf(this);
            // On demande à afficher le contenu associé
            showTab(tabIndex);
        });
    }

    // Affiche les onglets
    function showTab(index)
    {
        //->On cache l'ancien onglet ouvert

        // S'il y a déjà un élément affiché
        if( links.getElementsByClassName('open').length )
        {
            // On cherche le lien de l'onglet ouvert
            // On supprime la classe
            links.getElementsByClassName('open')[0].className = '';

            // On cherche le contenu ouvert
            // On supprime sa classe
            txt.getElementsByClassName('open')[0].className = '';
        }

        //-> On affiche l'onglet désiré

        // On ajoute la classe 'open' au lien
        links.children[index].className = 'open';

        // On ajoute
        txt.children[index].className = 'open';
    }

    // Initialisation du tab
    showTab(0);

}

// Raccourci print dans la console
function d(msg){
    console.log(msg);
}
