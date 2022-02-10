(function($){
	$('#menu-principal a').click(function() {
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
	

	//PROJETOS
	$(".projects .project:first").addClass("active");
	$(".p_projects .col-md-3:first .p_select").addClass("open");
	$(".p_select").click(function() {
		var target = $(this).attr( "data-target" );
		var bg = $(this).attr( "data-bg" );

		$( ".p_select" ).removeClass("open");

		$(this).addClass("open");

		$(".project").removeClass("active");
		$('.'+target).addClass("active");
		$( ".projects" ).removeClass("p_1 p_2 p_3 p_4");
		$( ".projects" ).addClass( bg );
	});



	// TIMELINE DO LIVRO
	$(".t_livro:last-child").addClass("active");
	$(".livro:last-child").addClass("active");
	$(".t_livro").click(function() {
		var target = $(this).attr( "data-target" );
		
		$( ".t_livro" ).removeClass("active");
		$(this).addClass("active");

		$( ".livro" ).removeClass("active");
		$('.'+target).addClass("active");
	});

	$(".timeline-slider").owlCarousel({
		items : 8,
		itemsCustom : false,
		itemsDesktop : [1199,8],
		itemsDesktopSmall : [980,6],
		itemsTablet: [768,5],
		itemsTabletSmall: false,
		itemsMobile : [479,2],
		singleItem : false,
		itemsScaleUp : false,
	});



})(jQuery);