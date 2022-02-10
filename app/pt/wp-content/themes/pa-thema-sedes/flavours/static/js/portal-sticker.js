(function($){
    RefererNavigationController = {
        currentOpenTimeout : null,

        toggleNavControl : function(event){
            if(parseInt(jQuery("#sticker-portal").css('left'),10) < 0){
                jQuery("#sticker-portal").animate({"left":"0px"}, "slow", function(){$(this).removeClass('closed')});   
            } else {
                jQuery("#sticker-portal").animate({"left":"-150px"}, "slow", function(){$(this).addClass('closed')});
            }

            clearTimeout(RefererNavigationController.currentOpenTimeout);
            event.preventDefault();
            event.stopPropagation();
        }
    };


    $(document).ready(function(){

    	$("#sticker-portal").children('a').click(RefererNavigationController.toggleNavControl);

    	var or_referer = url.referer;
        var base_url = url.baseurl;

    	$.ajax({
            //pegando a url apartir do href do link
            url: base_url+'/wp-admin/admin-ajax.php?action=parsereferer&url='+or_referer,
            type: 'GET',
            dataType: "json",
            context: document.body,
            success: function(data){
            	var sticker = $("#sticker-portal")
            	sticker.find("span").html(data.title);
                sticker.find('a:not(.icon)').attr('title', data.fullTitle.replace(/^\s+|\s+$/g, ''));
            	sticker.css('left','-200px');
            	sticker.show();
            	sticker.animate({"left":"0px"}, "slow");
                RefererNavigationController.currentOpenTimeout = setTimeout(function(){

                    sticker.find('> a').click();
                }, 10000);
            }
        }); 

    });

})(jQuery);
