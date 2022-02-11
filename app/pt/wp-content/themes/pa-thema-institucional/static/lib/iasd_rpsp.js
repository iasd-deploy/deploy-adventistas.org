(function($){

	$(document).ready(function (){
		$(".weekly-reading-img").owlCarousel({
			autoPlay: 7000,
			addClassActive: true,
			mouseDrag: false,
			singleItem: true,
			slideSpeed: 700,
			touchDrag: false,
			transitionStyle: "fade"
		});		
	});

})(jQuery);