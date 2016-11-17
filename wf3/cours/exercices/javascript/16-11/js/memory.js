// Définition de variables globales
var selectedImages = [];
var foundedImages = [];
var onWait = false;
var fw = null;

window.onload = function ()
{
    // element Conteneur
    var gameContainer = document.getElementById('memory');

    // bouton Commencer
    var btnStart = document.getElementById('startGame');

    // Définition du nombre d'image différentes
    var nbImg = 8;


    // Ajout d'un evenement lors d'un clique sur le bouton Commencer
    btnStart.addEventListener('click', function (e)
    {
        // On supprime le comportement par défaut du lien
        e.preventDefault();

        // On désactive la récompense
        deactivateFireworks();

        if( this.innerHTML === 'Recommencer' ) {

            startCount(true);

            gameContainer.style.display = 'none';

            removeImg( gameContainer );
        } else {
            this.innerHTML = 'Recommencer';
        }

        // Définition d'un Array qui liste les images
        var listShowedImg = [];
        for(var i = 1; i <= nbImg; i++) { listShowedImg.push(i); }
        listShowedImg = listShowedImg.concat(listShowedImg);

        // On récupère le nombre total d'image appellées
        var totalImg = listShowedImg.length;

        //
        var imgIndex = 0;

        //
        while( totalImg > 0 )
        {
            var random = (totalImg >= nbImg) ? nbImg : (totalImg - 1);
            imgIndex = (totalImg > 1) ? Math.floor((Math.random() * random) + 1) : 0;
            if (listShowedImg.indexOf(imgIndex) >= 0)
            {
                createImg(listShowedImg[imgIndex], gameContainer);
                listShowedImg.splice(imgIndex, 1);
                totalImg--;
            }
            else if (imgIndex == 0) { break; }
        }
        // Debug !!
        // Affichage manuel du dernier element du tableau
        createImg(listShowedImg[0], gameContainer);

        totalImg = listShowedImg.length;

        // Toutes les images et leurs liens
        var images = gameContainer.getElementsByTagName('a');

        //
        for (var i = 0; i < images.length; i++)
        {
            images[i].addEventListener('click', function (e)
            {
                e.preventDefault();

                // Si deux cases sont activées, on sort de la fonction
                if( onWait ) { console.log('onwait'); hideCards(); }

                if( this.className == 'show' ) { console.log('show'); return false; }

                if( this.className == 'founded' ) { console.log('founded'); return false; }

                // On affiche la case selectionnée
                this.className = 'show';

                var imgSrc = this.children[0].src;
                if (selectedImages.length == 0) {
                    selectedImages.push(imgSrc);
                }
                else {
                    if (foundedImages.indexOf(imgSrc) === -1 && selectedImages[0] === imgSrc) {
                        foundedImages.push(imgSrc);
                        this.className = 'founded';
                        document.querySelector('#memory a.show').className = 'founded';
                        //d('Trouvé  !!!!');

                        if( foundedImages.length === nbImg )
                        {
                            // On arrête le chrono
                            stopCount();
                            // On active la récompense
                            activateFireworks();
                        }
                    }
                    else {
                        onWait = true;
                        var currentLink = this;
                        currentLink.className = 'wrong';
                        document.querySelector('#memory a.show').className = 'wrong';

                        setTimeout(function()
                        {
                            hideCards();
                        },
                        1000);
                    }

                    // On vide la sauvegarde
                    selectedImages.shift();
                }
            });
        }

        // Affichage du plateau de jeu
        gameContainer.style.display = 'block';
        document.getElementById('clock').style.display = 'block';

        startCount();
    });

    // konami code
    //Haut, haut, bas, bas, gauche, droite, gauche, droite, B, A
    var k = [38, 38, 40, 40, 37, 39, 37, 39, 66, 65],
        n = 0;
    document.addEventListener('keydown', function (e) {
        if (e.keyCode === k[n++]) {
            if (n === k.length)
            {
                alert("Vous entrez désormais dans un monde étrange !!!\n Gare à vos oreilles !!!");
                activateFireworks();
            }
        } else {
            n = 0;
        }
    });

};

// Effectue un console.log
function d(msg)
{
    console.log(msg);
}

// Créer une image
function createImg(imgName, container)
{
    // Chemin du dossier
    var imgDir = 'img/galerie/';

    // Créer une balise lien
    var link = document.createElement('a');
    // Ajoute un attribut href
    link.href = '#';
    // Ajouter une classe
    link.className = 'hide';

    // Créer une balise img
    var img = document.createElement('img');
    // Ajoute l'attribut src
    img.src = imgDir + 'img0' + imgName + '.jpg';

    // Ajoute la balise img à la balise lien
    link.appendChild(img);

    // Ajoute la balise lien à l'élément conteneur
    container.appendChild(link);
}

// Suppression du contenu
function removeImg( container )
{
    var images = container.getElementsByTagName('a');

    var nbImg = images.length;

    for(var i = 0; i < nbImg; i++ )
    {
        container.removeChild(images[0]);
    }
}

// récompense
function activateFireworks()
{
    document.querySelector('div#back').style.display = 'block';

    var i = 0;
    fw = setInterval(function(){
        //if( i >= 20 ) {
        //    clearInterval(fw);
        //}

        createFirework(null, null, 1, 1, null, null, null, null, true, true);
        i++;

    }, 1500);
}

// reinitialise la récompense
function deactivateFireworks()
{
    document.querySelector('div#back').style.display = 'none';
    clearInterval(fw);

}


// chronomètre
var iHour = iMin = iSec = iCount = iM = iS = 0;
var clock = null;
function startCount(reset){
    if(reset != undefined) {
        iHour = iMin = iSec = iCount = iM = iS = 0;
        clock = null;
    }
    iCount++;
    iSec = iCount;
    if ( iSec>59 ) { iMin = iMin+1 ;  iSec = 0 ; iCount = 0; }
    if (  iSec<10 ) {  iS = "0" +iSec; } else { iS = iSec; }
    if ( iMin>59 ) { iHour = iHour+1 ; iMin = 0; }
    if (  iMin<10 ) {  iM = "0" +iMin; } else {iM = iMin; }
    var chrono = iM + "mn " + iS + 's';
    document.getElementById('clock').value = chrono;
    clock = setTimeout("startCount()",1000);
}

function stopCount(){
    clock = clearTimeout(clock);
}

function hideCards()
{
    var wrongs = document.querySelectorAll('#memory a.wrong');
    for( var i = wrongs.length; i > 0; i-- )
    {
        wrongs[ (i-1) ].className = 'hide';
    }

    onWait = false;
}











