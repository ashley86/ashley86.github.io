// Après le chargement de la page
$(document).ready(function(){
    
    // On stock la référence du formulaire dans une variable
    var form = $('form[name=adoptCat]');
    
    // Lors de la validation du formulaire
    form.submit(function(e){
        
        // On enlève le comportement par défaut
        e.preventDefault();
        
        var totalError = 0; // Nombre total d'erreur
        var listCats = ['sushi', 'maki', 'sashimi', 'yakitori', 'onigri']; // Liste des chats disponibles
        
        // champ selectCat
        var selectCat = form.find('[name=selectCat]');
        // Si la sélection n'est pas dans le tableau, on génère une erreur
        if( $.inArray(selectCat.val(), listCats) === -1)
        {
            console.log('pouet')
            selectCat.addClass('error');
            totalError++;
        }
        
        // Champ argumentation
        var arguments = form.find('[name=arguments]');
        // Si le nombre de caractères est inférieur à 15 on génère une erreur
        if(arguments.val().length < 15)
        {
            arguments.addClass('error');
            totalError++;
        }
        
        // S'il y a au moins une erreur, on ne valide pas le formulaire
        if( totalError > 0 )
        {
            return false;
        } else { // Sinon, on affiche un message de confirmation
            // On ajoute la classe success
            form.addClass('success');
            form.html('<p>Le formulaire a bien été envoyé.</p>')
        }
    });
    
    // On écoute l'évènement onChange sur le select et le textarea
    $('select, textarea').change(function(){
        // On ajoute la classe
        $(this).removeClass('error');
    });
    
    // Activation du slider
    $('.bxslider').bxSlider({
        captions: true // On affiche la légende
    });

    
});