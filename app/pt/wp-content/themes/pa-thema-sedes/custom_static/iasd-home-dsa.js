(function($){

    $(document).ready(function (){
        homeDSA.handleEvents();
        $(".dsa-home-carousel").owlCarousel({
            autoPlay: 7000,
            addClassActive: true,
            mouseDrag: false,
            singleItem: true,
            slideSpeed: 700,
            touchDrag: false,
            transitionStyle: "fade"
        });

        $('.slider-clickable-area-link').click(function() {
            var button = $(this).find( "a" );
            var link = button.attr('href');
            var target = button.attr('target');
            if (!target) { target = "_self" }

            window.open(link, target);
        });

    });

    var deviceWidth = $(window).width();

    var homeDSA = {

        handleEvents : function(){
            $('.iasd-global_navbar-main .more, .iasd-global_navbar-main .navbar-toggle, .iasd-global_navbar-main .search-link').on('click', homeDSA.applyBackgroundImage);
        },

        applyBackgroundImage : function(){
            if (deviceWidth >= 768) {
                var imageURL = $(".dsa-home-carousel .active div").css('background-image');
                $('.iasd-global_navbar').css('background-image', imageURL);
                if( $('.iasd-global_navbar-more').hasClass('open') || $('.iasd-global_navbar-search').hasClass('open')){
                    $('.dsa-home-carousel .owl-controls').addClass('hidden');
                    $(".dsa-home-carousel").trigger('owl.stop');
                } else{
                    $(".dsa-home-carousel").trigger('owl.play',7000);
                    $('.dsa-home-carousel .owl-controls').removeClass('hidden');
                }
            }
        }
    };

})(jQuery);
