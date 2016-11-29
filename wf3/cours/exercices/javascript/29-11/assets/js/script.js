$(document).ready(function(){

    /*
        Faire un jeu : Chifoumi !
        1 - Je dois choisir entre Pierre, Feuille ou ciseaux
        2 - Une fois que j'ai fais mon choix, je peux lancer la partie
        3 - Quand la partie est lancée, l'ordinateur fait son choix (P-F-C)
        4 - Selon mon choix et celui de l'ordinateur, j'ai gagné, perdu ou égalité
        5 - Celui qui gagne la manche, gagne un point
        6 - Le premier arrivé à 5 points, gagne
    */

    // Définition des choix possible
    var choix = [ 'pierre', 'feuille', 'ciseaux' ];

    var jeu = $('#chifoumi');

    var msg = $('#message');

    var scoreJoueur = 0;
    var scoreOrdinateur = 0;
    var partieTerminee = false;

    var isChewee = false;

    var fw = null;

    jeu.on('submit', function(e){
        e.preventDefault();

        if( partieTerminee ) {
            return;
        }

        msg.attr('class', '');
        msg.text('');
        var choixJoueur = jeu.find('#choixJoueur').val().toLowerCase();

        if( $.inArray(choixJoueur, ['chewee', 'chewbacca', 'chewie', 'wookiee']) != -1 ) {
            isChewee = true;
            finirPartie();
            return;
        }

        // 1 - Je dois choisir entre Pierre, Feuille ou ciseaux
        if( choixJoueur.length === 0 )
        {
            msg.addClass('error');
            msg.text('Vous devez insérer une valeur');

            // On arrête le jeu !
            return;
        }

        // Si le choix n'est pas dans la liste
        if( $.inArray( choixJoueur, choix ) < 0 )
        {
            msg.addClass('error');
            msg.text('Vous devez choisir une valeur entre "Pierre", "Feuille" ou "Ciseaux"');

            // On arrête le jeu !
            return;
        }

        // L'ordinateur fait son choix
        var choixOrdinateur = choix[Math.floor(Math.random() * choix.length)];
        // On affiche la valeur dans le formulaire
        jeu.find('#choixOrdinateur').val(choixOrdinateur);


        // On vérifie qui gagne
        if( choixOrdinateur == choixJoueur){
            msg.text('Égalité !!')
        }
        else if (choixJoueur == 'pierre'  &&  choixOrdinateur == 'ciseaux'){
            scoreJoueur++;
            msg.addClass('success');
            msg.text('Vous avez gagné la manche !!! :-D');
        }
        else if (choixJoueur == 'feuille'  &&  choixOrdinateur == 'pierre'){
            scoreJoueur++;
            msg.addClass('success');
            msg.text('Vous avez gagné la manche !!! :-D');
        }
        else if (choixJoueur == 'ciseaux'  &&  choixOrdinateur == 'feuille'){
            scoreJoueur++;
            msg.addClass('success');
            msg.text('Vous avez gagné la manche !!! :-D');
        }
        else{
            scoreOrdinateur++;
            msg.addClass('error');
            msg.text('Vous avez perdu la manche');
        }

        // On affiche le nouveau score
        $('#joueur .score').text(scoreJoueur);
        $('#ordinateur .score').text(scoreOrdinateur);

        if( scoreJoueur >= 5 || scoreOrdinateur >= 5 ) {
            finirPartie();
        }

        return;

    });

    $('#btn input[type=button]').on('click', function(e)
    {
        e.preventDefault();

        deactivateFireworks();
        scoreJoueur = 0;
        scoreOrdinateur = 0;
        partieTerminee = false;
        msg.removeAttr('class');
        msg.text('');
        jeu.find('#choixJoueur').val('').removeAttr('disabled');
        jeu.find('#choixOrdinateur').val('');
        $('#joueur .score').text('0');
        $('#ordinateur .score').text('0');
        $('#btn input[type=submit]').removeAttr('disabled');
        $('#btn input[type=button]').attr('disabled', 'disabled');
        $('body').removeClass('win');
    });



    function finirPartie()
    {
        partieTerminee = true;

        if(isChewee || scoreJoueur >= 5) {
            $('body').addClass('win');
            jeu.find('#choixJoueur').attr('disabled', 'disabled');
            msg.addClass('success');
            msg.text('Vous avez gagné la partie !!!! Youpi !!!!!');
            activateFireworks();
        } else {
            msg.addClass('error');
            msg.text('Vous avez perdu la partie ! :\'(');
        }

        $('#btn input[type=submit]').attr('disabled', 'disabled');
        $('#btn input[type=button]').removeAttr('disabled');
    }


});

// récompense
function activateFireworks()
{
    document.querySelector('#fireContainer').style.display = 'block';
    var i = 0;
    fw = setInterval(function(){
        createFirework(null, null, 1, 1, null, null, null, null, true, true);
        i++;
    }, 1500);
}


// reinitialise la récompense
function deactivateFireworks()
{
//    document.querySelector('div#back').style.display = 'none';
    clearInterval(fw);

}
