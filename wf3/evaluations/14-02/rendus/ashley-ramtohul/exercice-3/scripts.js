// Création d'une closure
(function($){
    // Lorsque que la page est chargé
    $(document).ready(function(){

        // Écoute à la validation du formulaire
        $('#ajout-voiture').on('submit', function(e){
            // Annule le comportement par défaut
            e.preventDefault();

            // Récupère le formulaire
            var form = $(this);
            // Prépare les données qui vont être envoyées
            var formData = {};
            // Récupère les valeurs insérées
            $(form).find("input[name]").each(function (index, node) {
                formData[node.name] = node.value;
            });

            // Récupère l'endroit où on affichera le retour
            $response = $('#response');

            $
                .ajax({
                    url: 'save-car.php',            // Page de destination
                    type: 'POST',                   // Méthode de transfert
                    data: formData,                 // Données
                    beforeSend: function(e){
                        $response
                            .removeClass('alert-success')
                            .removeClass('alert-danger');
                    },
                    success: function (response) {  // Lorsque le serveur répond

                        // La réponse du serveur
                        if( response == 'OK' ) {
                            $response.addClass('alert-success');
                            $response.html('L\'enregistrement s\'est bien déroulé.');
                        } else {
                            $response.addClass('alert-danger');
                            $response.html('Une erreur est survenue. L\'enregistrement n\'a pu aboutir.');
                        }
                    },
                });
        });

    });
})(jQuery);