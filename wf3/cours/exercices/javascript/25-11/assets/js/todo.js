'use strict'; // On dit au navigateur, qu'on va utiliser JavaScript de maniere stricte

// Declaration du module angular
// Angular va chercher la reference qu'on lui donne en parametre,
//      dans l'element HTML qui possede l'attribut 'ng-app'
var testApp = angular.module('test', []);
//
//// On defini un controleur
//// Angular va chercher la reference qu'on lui donne en parametre,
////      dans l'element HTML qui possede l'attribut 'ng-controller'
testApp.controller(
    'testCtrl', // identifiant du controleur
    [
        // Liste de dependances
        '$scope', //
        '$http', //

        // Definition des instructions traitees par le controleur
        function($scope, $http){


            $scope.titleHasChange = false;

            // Defini une valeur a la variable title
            // Et on enregistre la valeur par defaut
            $scope.title = $scope.defaultTitle = 'Titre de la page TEST !!';

            // Definition d'une methode pour le controleur
            $scope.changeTitle = function(e, i)
            {
                e.preventDefault();

                // On annule le changement de titre
                if(i === undefined){
                    $scope.title = $scope.defaultTitle;
                    $scope.titleHasChange = false;
                    return;
                }

                var listTitle = [
                    'Retour vers le futur',
                    'The Mask',
                    'Les Goonies',
                    'Forrest Gump'
                ];

                if( ! $scope.titleHasChange){
                    $scope.titleHasChange = ! $scope.titleHasChange;
                }

                // Modifie la valeur de la variable title, en memoire et dans la vue
                $scope.title = listTitle[i];

            };

            $scope.formDatas = [];
            $scope.testTwoWays = function(e)
            {
                e.preventDefault();
                $scope.formDatas.push( { name : $scope.formData });
                $scope.formData = '';
            };

            $scope.removeData = function(e, i){
                e.preventDefault();
                $scope.formDatas.splice(i, 1);
            };



        }
    ]
);