'use strict'; // On dit au navigateur, qu'on va utiliser JavaScript de mani�re stricte

// D�claration du module angular
// Angular va chercher la r�f�rence qu'on lui donne en param�tre,
//      dans l'�l�ment HTML qui poss�de l'attribut 'ng-app'
//var testApp = angular.module('test', []);
//
//// On d�fini un contr�leur
//// Angular va chercher la r�f�rence qu'on lui donne en param�tre,
////      dans l'�l�ment HTML qui poss�de l'attribut 'ng-controller'
//testApp.controller(
//    'testCtrl', // identifiant du contr�leur
//    [
//        // Liste de d�pendances
//        '$scope', //
//        '$http', //
//
//        // D�finition des instructions trait�es par le contr�leur
//        function($scope, $http){
//
//
//            $scope.titleHasChange = false;
//
//            // D�fini une valeur � la variable title
//            // Et on enregistre la valeur par d�faut
//            $scope.title = $scope.defaultTitle = 'Titre de la page TEST !!';
//
//            // D�finition d'une m�thode pour le contr�leur
//            $scope.changeTitle = function(e, i)
//            {
//                e.preventDefault();
//
//                // On annule le changement de titre
//                if(i === undefined){
//                    $scope.title = $scope.defaultTitle;
//                    $scope.titleHasChange = false;
//                    return;
//                }
//
//                var listTitle = [
//                    'Retour vers le futur',
//                    'The Mask',
//                    'Les Goonies',
//                    'Forrest Gump'
//                ];
//
//                if( ! $scope.titleHasChange){
//                    $scope.titleHasChange = ! $scope.titleHasChange;
//                }
//
//                // Modifie la valeur de la variable title, en m�moire et dans la vue
//                $scope.title = listTitle[i];
//
//            };
//
//            $scope.formDatas = [];
//            $scope.testTwoWays = function(e)
//            {
//                e.preventDefault();
//                $scope.formDatas.push( { name : $scope.formData });
//                $scope.formData = '';
//            };
//
//            $scope.removeData = function(e, i){
//                e.preventDefault();
//                $scope.formDatas.splice(i, 1);
//            };
//
//
//
//        }
//    ]
//);



var images = angular.module('galerie', []);

images.controller(
    'imagesList',
    [
        '$scope',
        '$http',
        function($scope, $http){

            $scope.images = [];
            $scope.imgPath = '';
            $scope.imgPathThb = '';

            $http.get('listImages.php').success(function(data)
            {
                $scope.imgPath = data.imgPath;
                $scope.imgPathThb = data.imgPathThb;

                for(var i = 0; i < data.images.length; i++){
                    $scope.images.push({src : data.images[i]});
                }

            });

            $scope.selectImage = function(e, i){
                $scope.currentImage = $scope.imgPath + $scope.images[i].src;
            };

        }
    ]
);