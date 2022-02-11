(function($){
	$(document).ready(function() {

		$('.accordeon li.has_children > a').on('click',function(event) {
			if(this == event.target) {
					var item_to_change = $(this).parent();
					var item_wants_to_close = item_to_change.hasClass('active');

					item_to_change.siblings().removeClass('active');
					item_to_change.removeClass('active');
					if(!item_wants_to_close)
						item_to_change.addClass('active');
					return false;
			}
			return false;
		});

		$('.more-category').click(function(event) {
			if(this == event.target) {
				if($(this).children('ul.category-dropdown').size()) {
					$(this).toggleClass('active');
					return false;
				}
			}
			return event;
		});
		
	});


	$('.flexslider').flexslider({
		animation: "slide",
		controlsContainer: ".flex-control-nav"
	});

/*
	$(".collapse").collapse({
		parent: true
	});
*/
	$('[rel="tooltip"]').tooltip({
		placement: 'top'
	});

})(jQuery);