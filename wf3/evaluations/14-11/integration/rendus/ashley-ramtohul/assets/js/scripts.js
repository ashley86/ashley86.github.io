(function($){
    $(document).ready(function(){
        $('.main-menu a, a.burger').click(function(e){
            if( $(this).hasClass('burger') ) {
                e.preventDefault();
            }
            $('body').toggleClass('main-menu-open');
        });
    })
})(jQuery);
