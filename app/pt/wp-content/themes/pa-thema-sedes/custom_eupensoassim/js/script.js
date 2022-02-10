(function($){

	$(window).load(function(){

        $('.menu a').click(function() {
            if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 500);
                    return false;
                }
            }
        });

        $('.video-item').fancybox({
            maxWidth    : 800,
            maxHeight   : 600,
            fitToView   : false,
            width       : '70%',
            height      : '70%',
            autoSize    : false,
            closeClick  : false,
            openEffect  : 'none',
            closeEffect : 'none'
        });

        // var feed = new Instafeed({
        //     get: 'tagged',
        //     tagName: 'eupensoassim',
        //     clientId: '584a9e46583e4f0da21df46ec2e68306',
        //     resolution: 'low_resolution',
        //     target: 'instafeed',
        //     template: '<li><a href="{{link}}" target="_blank"><img src="{{image}}" /></a></li>',
        //     limit: 9
        // });
        // feed.run();

    });

})(jQuery);