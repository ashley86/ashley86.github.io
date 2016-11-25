'use strict';


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
            $scope.errorConnection = true;

            $http({
                method: 'GET',
                url: 'listImages.php'
            }).then(
                function successCallback(response)
                {
                    var data = response.data;
                    if( typeof data === "object" ) {
                        setImages(data);
                        $scope.errorConnection = false;
                    } else {
                        $http({
                            method: 'GET',
                            url: 'listImages.json'
                        }).then(
                            function successCallback(response)
                            {
                                var data = response.data;
                                if( typeof data === "object" ) {
                                    setImages(data);
                                    $scope.errorConnection = false;
                                }
                            }
                        );
                    }
                }
            );

            function setImages(data) {

                $scope.imgPath = data.imgPath;
                $scope.imgPathThb = data.imgPathThb;

                for(var i = 0; i < data.images.length; i++){
                    $scope.images.push({src : data.images[i]});
                }
            }

            $scope.selectImage = function(e, i){
                $scope.currentImage = $scope.imgPath + $scope.images[i].src;
            };

        }
    ]
);