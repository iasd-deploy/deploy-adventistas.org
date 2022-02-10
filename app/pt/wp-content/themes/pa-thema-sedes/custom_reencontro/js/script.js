(function($){
	$('#content').click(function() {
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

	var $container = $('.videos');
	// initialize
		$container.masonry({
		columnWidth: 200,
		itemSelector: '.video'
	});


})(jQuery);