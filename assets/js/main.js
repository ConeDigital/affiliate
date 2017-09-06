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

    $('.stream-link').on('click', function(){
        event.preventDefault();
        if ($('.stream-frame').attr('style') == 'display: none;') {
            var src = $(this).attr('href');
            $('.stream-frame iframe').attr('src', src);
            $('.stream-frame').show();
            $('html, body').animate({
                scrollTop: ($('.stream-frame').offset().top - 20)
            }, 800);
        }
    });

    $('.api-click').on('click', function(){
        $.ajax({
            url: ajaxApi.ajaxurl,
            type: 'POST',
            data: {
                action: 'api_everysport_ajax',
            },
            success: function(data) {
                console.log('Success');
                console.log(data);
                // var events = data.events;
                // for(var key in events){
                //     if(events.hasOwnProperty(key)){
                //         var event = '<div class="table-content">' +
                //             '<p>' + events[key].homeTeam.shortName + ' - '+ events[key].visitingTeam.shortName +'</p>' +
                //             '<p class="thin">'+events[key].startDate +'<span>'; (events[key].homeTeam.id == 141706) ? event += '(H)' : event += '(B)'; event += '</span></p>' +
                //         '</div>';
                //         $('.upcoming-games').append(event);
                //         console.log(events[key].homeTeam.shortName);
                //     }
                // }
            },
            error: function(response) {
                console.log(response);
                console.log('Error!!!!!!');
            }
        });
    })




});