'use strict';

// On defini le module angular vise
var images = angular.module('galerie', []);

// On agi sur le controleur
images.controller(
    'imagesList',
    [
        // Appel des dependances requises
        '$scope',
        '$http',

        // Actions du controleur
        function($scope, $http){

            // Declaration des variables
            $scope.images = []; // Liste des noms des images
            $scope.imgPath = ''; // Chemin du dossier des images
            $scope.imgPathThb = ''; // Chemin du dossier des vignettes
            $scope.currentIndex = null; // Index de la grande image affichee
            $scope.errorConnection = true; // S'il y a une erreur de connexion

            // On effectue une requete AJAX
            // Pour recuperer la liste des images
            $http({
                method: 'GET',
                url: 'listImages.php'
            }).then(
                function successCallback(response)
                {
                    // Si les donnees recuperee sont de type Object (format JSON)
                    if( typeof response.data === "object" ) {
                        // On affiche les images
                        setImages(response.data);
                        // On specifie qu'il n'y a pas d'erreur de connexion
                        $scope.errorConnection = false;
                    }
                    // Si les donnees recuperees ne sont pas de type Object (format JSON)
                    // Il y a peut-être eu un probleme avec le fichier PHP
                    else
                    {
                        // Pour les besoins du test, on effectue une autre requête
                        // qui contient les donnees requises
                        $http({
                            method: 'GET',
                            url: 'listImages.json'
                        }).then(
                            function successCallback(response)
                            {
                                // Idem que plus haut...
                                if( typeof response.data === "object" ) {
                                    setImages(response.data);
                                    $scope.errorConnection = false;
                                }
                            }
                        );
                    }
                }
            );

            // Stock les chemins des images
            function setImages(data)
            {
                // On stock le chemin du dossier des images
                $scope.imgPath = data.imgPath;
                // On stock le chemin du dossier des vignettes
                $scope.imgPathThb = data.imgPathThb;

                // On récupère tous les noms des fichiers image
                for(var i = 0; i < data.images.length; i++){
                    $scope.images.push({src : data.images[i]});
                }
            }

            // On affiche la grande image
            // en fonction de son index
            $scope.selectImage = function(e, i)
            {
                if(e) e.preventDefault();

                // On reatribue la valeur de l'index courant
                $scope.currentIndex = i;
                // On deduit et assigne le chemin de l'image
                // que l'on souhaite afficher
                $scope.currentImage = $scope.imgPath + $scope.images[i].src;
            };

            // Navigue dans la galerie d'images
            $scope.slideTo = function(e, direction)
            {
                e.preventDefault();

                // Stock le nombre total d'images
                var totalImages = $scope.images.length;

                // Si le currentIndex n'a jamais ete initialise
                // il vaudra null
                if( $scope.currentIndex !== null ){

                    // Navigation vers la gauche
                    if( direction === 'prev' && $scope.currentIndex > 0 ){
                        // On selectionne l'image, via son index
                        // Et on assigne le nouvel index courant, en meme temps
                        $scope.selectImage(null, --$scope.currentIndex);
                    }
                    // Navigation vers la droite
                    else if( direction === 'next' && $scope.currentIndex < totalImages-1 ) {
                        // On selectionne l'image, via son index
                        // Et on assigne le nouvel index courant, en meme temps
                        $scope.selectImage(null, ++$scope.currentIndex);
                    }

                }
            }

        }
    ]
);