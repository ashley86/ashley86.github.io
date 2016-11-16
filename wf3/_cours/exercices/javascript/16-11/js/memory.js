var selectedImages = [];
var foundedImages = [];

window.onload = function() {

    var btnStart = document.getElementById('startGame');
    var gameContainer = document.getElementById('memory');

    var nbImg = 8;
    var listShowedImg = [1,2,3,4,5,6,7,8,1,2,3,4,5,6,7,8];

    btnStart.addEventListener('click', function(e){
        e.preventDefault();

        var totalImg = listShowedImg.length;
        var imgIndex = 0;

        while(totalImg > 0)
        {
            random = ( totalImg >= 8 ) ? 8 : ( totalImg - 1 );
            imgIndex = ( totalImg > 1 ) ? Math.floor((Math.random() * random) + 1) : 0;

            if( listShowedImg.indexOf(imgIndex) >= 0 )
            {
                createImg( listShowedImg[imgIndex] );

                listShowedImg.splice(imgIndex, 1);
                totalImg--;

            } else { if(imgIndex == 0) { break; } }

        }

        // Debug !!
        // Affichage manuel du dernier element du tableau
        createImg( listShowedImg[0] );

        var images = gameContainer.getElementsByTagName('a');
        for(var i = 0; i < images.length; i++ ) {
            images[i].addEventListener('click', function(e){
                e.preventDefault();

                var imgSrc = this.children[0].src;
                if( selectedImages.length == 0 ) {
                    selectedImages.push( imgSrc )
                } else {
                    if( foundedImages.indexOf(imgSrc) === -1 && selectedImages[0] === imgSrc ) {
                        foundedImages.push(imgSrc);
                        d('Trouvé  !!!!');
                    }

                    // Suppression de la sauvegarde
                    selectedImages.shift();
                }

            });
        }

    });

}

// Effectue un console.log
function d(msg) {
    console.log(msg);
}

// Créer une image
function createImg(imgName){
    var imgDir = 'img/galerie/';
    var gameContainer = document.getElementById('memory');

    var link = document.createElement('a');
    link.href = '#';

    var img = document.createElement('img');
    img.src = imgDir + 'img0' + imgName + '.jpg';

    link.appendChild(img);
    gameContainer.appendChild(link);
}
