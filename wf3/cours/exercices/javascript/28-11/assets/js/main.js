window.onload = function(){

    var formulaire = document.getElementById('formulaire');
    var totalErreur = 0;

    // Quand le formulaire est validé
    formulaire.addEventListener('submit', function(event)
    {
        // J'annule le comportement par défaut
        event.preventDefault();

        verifValue('lastName');
        verifValue('firstName');

        // Si longueur du champ nom est inférieur à 2 caractères
        if( totalErreur === 0 )
        {
            // Je décide d'envoyer le formulaire
            formulaire.submit();
        }

    });


    function verifValue(id)
    {
        // Je selectionne le champ nom
        var champ = document.getElementById(id);

        if( ( id === 'firstName' || id === 'lastName' ) && champ.value.length < 2)
        {
            if(id === 'lastName'){
                // J'affiche les erreurs
                document.getElementById('errorNom').style.display = 'block';
            } else if (id === 'firstName'){
                document.getElementById('errorPrenom').style.display = 'block';
            }


            // Je change la couleur border du champ
            champ.style.borderColor = '#f00';

            // Je mets le focus sur ce champ
            champ.focus();

        } else if( id === 'age' ) {
            // QQC
        } else if( id === 'pays' ) {
            // QQC
        } else if( id === 'email' ) {
            // QQC
        } else if( id === 'password' ) {
            // QQC
        } else {
            /// KaKaKa
        }


        switch(id)
        {
            case 'firstName':
            case 'lastName':
                if(champ.value.length < 2){
                    // error
                }
                break;

            case 'age':
                if(champ.value.length < 5 || champ.value.length > 140){
                    // error
                }
                break;

            case 'pays':
                if(champ.value === '')
                {
                    // error
                }
                break;

            case 'password':
                if(champ.value === '')
                {
                    // error
                }
                break;

            default:
                // Error: Cet ID n'existe pas
                break;
        }




        totalErreur++;
    }

};
