// Une fois que le chargement de la page est terminé
// On créé une fonction anonyme
window.onload = function(){

    // Assignation de l'élément form à une variable
    var form = document.getElementById('form');

    // Verifie si le champ est un email
    function verifMail(pChaine) {

        // Si la chaîne n'est pas vide
		if (pChaine !== "") {

            // On scinde la chaîne autour du/des caractère(s) '@'
			var tab01 = pChaine.split('@');

            // Si le caractère '@' était présent, on aura donc 2 tableaux
            if (tab01.length === 2) {

                // On scinde la seconde partie récupérée autour des '.'
                var tab02 = tab01[1].split('.');

                // S'il y a au moins un '.'
                if( tab02.length > 1 ){

                    // On retourne true
                    return true;
                } else {

                    // Sinon on retourne false
                    return false;
                }
			} else {
                // Si le caractère '@' n'était pas présent
                return false;
            }
		} else {
            // Si le champ était vide
			return false;
		}
	}

    // Quand on envoie le formulaire
    form.addEventListener('submit', function(e){
        // On annule le comportement par défaut (action)
        e.preventDefault();

        // Si le champ correspond à un email
        if( verifMail(this.children[0].value) ) {
            // Wouhou
            alert('bon !');
        } else {
            // Baaaaad !!
            alert('pas bon !');
        }
    });

};
