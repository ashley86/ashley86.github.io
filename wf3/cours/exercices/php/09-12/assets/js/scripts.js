$(document).ready(function(){
    $('a.delete').click(function(e){

        console.log($(this).parents('td'));

        if( ! confirm('Confirmer la suppresion ?'))
        {
            e.preventDefault();
        }
    });
});