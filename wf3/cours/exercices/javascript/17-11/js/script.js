// Lancer la commande javascript pour executer le code uniquement après le chargement de la pge

/*
 * 1ere étape : Je dois faire en sorte qu'un panel soit activé par un onglet
 * dont je récupère les composants HTML des onglets (les 'a')
 * et les panels ('div')
 */

/*
 * Déterminer l'index du lien sur lequel on a cliqué
 */

/*
 * Faire une fonction qui va permettre de changer le z-index des panels de façon à
 * pour faire en sorte que le panel correspondant à l'onglet sur lequel on a cliqué
 * soit au-dessus des autres
 */

/*
 * Placer un écouteur d'évenement sur les onglets afin que
 * l'utilisateur puisse cliquer et activer les panels
 */


window.onload = function()
{
    var links = document.getElementById('tabLinks');
    var txt = document.getElementById('tabTxt');
    var tabList = Array.prototype.slice.call( links.children );

    // On boucle pour écouter tous les éléments tabs
    for(var i = 0; i < links.children.length; i++)
    {
        links.children[i].addEventListener('click', function(e)
        {
            e.preventDefault();
            var tabIndex = tabList.indexOf(this);
            showTab(tabIndex);
        });
    }

    // Affiche les onglets
    function showTab(index)
    {
        if( links.getElementsByClassName('open').length )
        {
            links.getElementsByClassName('open')[0].className = '';
            txt.getElementsByClassName('open')[0].className = '';
        }
        links.children[index].className = 'open';
        txt.children[index].className = 'open';
    }

    // Initialisation du tab
    showTab(0);

}


function d(msg){
    console.log(msg);
}
