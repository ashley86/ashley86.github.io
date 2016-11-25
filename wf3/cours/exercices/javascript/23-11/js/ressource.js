var item;

// Images
item = {

    // Dossier img
    fileRoot: 'img/galerie',

    // Dossier vignettes
    fileRootVignettes: function () {
        return this.fileRoot + '/vignettes';
    },

    // Liste des images
    imagesSrc: function () {
        var nbImg = 16;
        var tab = [];
        for(var i = 1; i <= nbImg; i++ ){
            var index = ( i < 10 ) ? '0'+i : i;
            var imgName = 'img' + index + '.jpg';
            tab.push( imgName );
        }
        return tab;
    }

};
