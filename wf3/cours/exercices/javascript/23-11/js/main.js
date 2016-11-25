// Galerie
$(document).ready(function(){

    /*----------------------------------
     |  Initialisation des variables   |
     ----------------------------------*/

    // Contient les grandes images
    var imagesBig = [];
    // Contient les petites images
    var imagesThb = [];
    // Nombre d'images chargé
    var imgLoaded = 1;
    // Pourcentage chargé
    var percentLoaded = 0;
    // Conteneur de la galerie
    var conteneurVignettes = $('#conteneurVignettes');
    // Conteneur des vignettes
    var pellicule = conteneurVignettes.children();


    /*----------------------------------
     |        Barre de chargement      |
     ----------------------------------*/

    // Stock les images en mémoire
    function stockImg()
    {
        // Nombre d'images disponibles
        var items = item.imagesSrc();

        for( img in items )
        {
            // Pour chaque image, créé un nouvel objet image
            // et on la stock en mémoire
            var imgBig = new Image();
            var imgThb = new Image();

            // Une fois que l'image est chargé, on execute le code ci-dessous
            imgBig.onload = function()
            {
                var pos = calcProgression( items.length, imgLoaded );
                animateProgressBar( pos );

                imgLoaded++;
            };

            // Ajout de l'attribut SRC
            imgBig.src = item.fileRoot + '/' + items[img];
            imgThb.src = item.fileRootVignettes() + '/' + items[img];

            // On insère l'image à la mémoire
            imagesBig.push( imgBig );
            imagesThb.push( imgThb );
        }
    }

    // Calcul la position et le nombre à afficher
    function calcProgression(nbItems, index)
    {
        // Longueur de la barre lorsqu'une image est chargée
        var percentToLoad = Math.ceil( 100 / nbItems);

        // Calcul de la proportion chargée
        percentLoaded += percentToLoad;

        //Calcul de la longueur totale de la barre chargée
        var posProgressBar = 100 - percentLoaded;

        // Calcul finaux, si on a chargé 100% des images
        if( index >= nbItems-1 )
        {
            // On met tous les compteurs à 100%
            posProgressBar = 0;
            percentLoaded = 100;

            // Cache la barre de progression
            hideProgressBar();
        }

        // Retourne [ longueurBar, nombreAAfficher ]
        return [posProgressBar, percentLoaded];
    }

    // Modifie l'affichage de la barre de progression
    function animateProgressBar( val )
    {
        $('#conteneurBarre')
            // Modifie la longueur de la barre
            .find('#progresseBarre').stop().animate({width : val[1]+'%'})
            // Modifie le chiffre affiche
            .find('h2').text( val[1] +'%');
    }

    // Cache la barre de progression
    function hideProgressBar()
    {
        $('#conteneurBarre').delay(1000).fadeOut(400, function(){
            showThumbsContainer();
        });
    }

    /*----------------------------------
     |         Galerie d'images        |
     ----------------------------------*/

    // Affiche le conteneur de vignettes
    function showThumbsContainer()
    {
        // Calcul la largeur de la péllicule
        pellicule.css({
            width: (item.imagesSrc().length * 150) + 'px'
        });

        // Affiche le conteneur des vignettes
        conteneurVignettes.delay(500).animate({
            opacity: 1
        });

        // Ajoute les images au DOM
        generateImages();

        // Ecoute le click sur les images
        listenImagesClick(pellicule.children());
    }

    // Ajoute les images au DOM
    function generateImages()
    {
        var images = item.imagesSrc();
        for (var i = 0; i < images.length; i++) {
            pellicule.append(imagesThb[i]);
        }
    }

    function listenImagesClick(elt)
    {
        for(var i = 0; i < elt.length; i++)
        {
            console.log(elt.children().eq(i))
            elt.children().eq(i).on('click', function(e){
                e.preventDefault();
                console.log('coucou');
                //openPopup(elt);
            });
        }
    }




    /*----------------------------------
     |          Initialisation         |
     ----------------------------------*/

    // Lancement au chargement de la page
    function init()
    {
        // On stock directement les images en mémoire
        stockImg();
    }


    // Et c'est parti !!
    init();

});

// Fonction raccourci pour débugger dans la console
function d(txt){ console.log(txt); }