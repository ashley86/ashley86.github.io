window.onload = function()
{
    // On stock le formulaire dans une variable
    var form = document.formulaire;
    // On initialise le nombre d'erreur
    var totalChampsValide = 0;
    // On liste le 'name' des champs a verifier
    var champsAVerifier = [ 'civility', 'lastName', 'firstName', 'age', 'country', 'email', 'password', 'passwordConfirmation'];
    // 
    var firstFocus = '';
    
    
    // Quand le formulaire est soumis
    formulaire.addEventListener('submit', function(event)
    {
        event.preventDefault(); // J'annule le comportement par défaut
        
        // On parcourt tous les éléments du tableau 'champsAVerifier'
        for(var i = 0; i < champsAVerifier.length; i++)
        {
            var champAAnalyser = form[ champsAVerifier[i] ]; // On defini le champ a analyser

            /*
                On envoie verifier la validité de la valeur du champ sur lequel on est
                La fonction nous retourne une valeur, si elle est à 'false', c'est qu'il y a une erreur
            */
            console.log('retour:',verifValue( champsAVerifier[i], champAAnalyser.value ))
            if( ! verifValue( champsAVerifier[i], champAAnalyser.value ) )
            {
                setClassError(champAAnalyser, false); // On ajoute la classe 'has-error' au parent
                
                // On choisi le champ sur lequel le focus se mettra
                if(firstFocus === ''){
                    firstFocus = ( champAAnalyser[0] !== undefined ) ? champAAnalyser[0] : champAAnalyser;
                }
            }
            // Sinon,
            else 
            {
                setClassError(champAAnalyser, true); // On supprime la classe 'has-error' du parent
            }
        }

        // S'il aucune erreur n'a été commise
        if( document.getElementsByClassName('has-error').length === 0 )
        {
            formulaire.submit(); // J'envoie le formulaire
        } else {
            // On selectionne le premier element qui est errone
            firstFocus.focus();
        }

    });

    // Ajoute ou supprime la classe 'has-error' au parent d'un champ
    function setClassError(elt, remove)
    {
        /*
            Cas particulier: pour les champs de type 'radio' ou 'checkbox'
            'elt' retourne un tableau de tous les elements inputs possedants le même attribut 'name'
            --> Bien faire attention aux parentheses pour comprendre cette condition
        */
        if( 
            ( elt[0] !== undefined ) // Si l'index '0' existe (autrement dit, c'est un Array)
            && ( ( elt[0].type === 'radio' ) || ( elt[0].type === 'checkbox' ) ) ) // ET Si le champ est de type radio ou checkbox...
        {
            var parent = elt[0].parentElement; // On selectionne le premier pour trouver son parent
        } else {
            var parent = elt.parentElement;
        }
        
        if( remove ){
            parent.className = ''; // On vide l'attribut 'class'
        } else {
            parent.className = 'has-error'; // On donne au parent la classe 'has-error'
        }
        
        // On retourne une valeur (quelconque) par defaut
        return true;
    }
    
    /*
        On verifie la validite de la valeur 
        par rapport a son critère de validation
    */
    function verifValue(nomDuChamp, valeur)
    {
        // Remplace une liste interminable de 'else if'...
        switch(nomDuChamp)
        {
            // Si la civilite n'a pas ete selectionnee
            case 'civility':
                
                if( valeur === '' || valeur === undefined ) {
                    console.log('dsflkjsdl')
                    return false;
                }
                
            break;
            
                
            // S'il y a moins de 2 caracteres dans les champs 'nom' et 'prenom'
            case 'firstName':
            case 'lastName':
            
                if(valeur.length < 2){
                    return false;
                }
                
            break;

                
            // Si l'age n'est pas compris entre 5 et 140 ans
            case 'age':
                // Si 'valeur' est vide, on transforme la chaîne en nombre entier, sinon on affecte 0
                valeur = ( valeur.length > 0 ) ? parseInt(valeur) : 0;
                
                if( ( valeur < 5 ) || ( valeur > 140 ) ) {
                    return false;
                }
                
            break;

                
            // Si le pays n'a pas ete selectionne
            case 'country':
                
                if(valeur === '')
                {
                    return false;
                }
                
            break;

                
            // Si l'email est dans un mauvais format
            case 'email':
                
                if(valeur === '')
                {
                    return false;
                }
                
            break;

                
            // Si le mot de passe ne contient pas au moins 6 caracteres
            case 'password':
                
                if(valeur.length < 6)
                {
                    return false;
                }
                
            break;

                
            // Si la confirmation du mot de passe est differente du mot de passe original
            case 'passwordConfirmation':
                
                if(valeur !== form.password.value)
                {
                    return false;
                }
                
            break;

                
            // Si le champ n'a pas ete trouve
            default:
                console.log('ERROR_FIELD_NAME');
                return false;
            break;
        }
        
        return true;
    }

};
