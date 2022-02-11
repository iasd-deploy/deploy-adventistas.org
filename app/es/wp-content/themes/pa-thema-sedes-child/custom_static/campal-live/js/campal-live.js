(function($){

	$(window).load(function(){
		$('.live_link').click(function(e){
			e.preventDefault();

			$('.player').hide();
			$($(this).attr('href')).show();
			$('.live_link').removeClass('active'); 
			$(this).addClass('active');
		});
		$('.live_link').first().trigger('click');
	});

})(jQuery);