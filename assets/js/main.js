jQuery(document).ready( function($) {

    //Hamburger script
    $('.hamburger').on('click', function(){
        closeOpen($(this));
    });
    function closeOpen (a){
        if(a.hasClass('is-active')){
            $(".mobile-menu").fadeOut('fast');
            $(".mobile-menu").removeClass('mobile-links');
            a.removeClass('is-active');
            $("html, body").css({
                height: 'auto',
                overflow: 'visible'
            });
        }
        else{
            a.addClass('is-active');
            $(".mobile-menu").fadeIn('fast');
            $(".mobile-menu").addClass('mobile-links');
            $("html, body").css({
                height: '100%',
                overflow: 'hidden',
                position: 'relative'
            });
        }
    }
});