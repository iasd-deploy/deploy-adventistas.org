(function($){

	$(document).ready(function (){
		
		$('.iasd-global_navbar-main .open-more-link').on('click', GlobaNavEventHandler.openMoreMenu);
		$('.iasd-global_navbar-main .btn-navbar').on('click', GlobaNavEventHandler.openResponsiveMenu);
		$('.iasd-global_navbar-main .search-link').on('click', GlobaNavEventHandler.openSearchForm);

		//Bootstrap Tabs Component
		$('.iasd-global_navbar-more-tabs a').on('click',GlobaNavEventHandler.moreTabsShow);
		$('.iasd-global_navbar-more-tabs > li:not(".hidden-desktop") > a').on('click', GlobaNavEventHandler.openTabsMenu);

		$('.iasd-global_navbar-more .institutions .map-link').on('mouseover', GlobaNavEventHandler.changeMap);
		$('.iasd-global_navbar-more .institutions .map-link').on('mouseout', GlobaNavEventHandler.cleanMap);
		$('.iasd-global_navbar-more .institutions .open-associations-link').on('click', GlobaNavEventHandler.openInstitucionsList);
		$('.iasd-global_navbar-more .map').on('click', GlobaNavEventHandler.showHelp);
		$('.iasd-global_navbar-more .instructions.error').on('click', GlobaNavEventHandler.hideHelp);
		$('.iasd-global_navbar-more .hide_list-link').on('click', GlobaNavEventHandler.hideList);
		$('.iasd-global_navbar-more .back-link').on('click', GlobaNavEventHandler.closeTabsMenu);
		$('.iasd-global_navbar-more .close-more-link').on('click', GlobaNavEventHandler.closeMoreMenu);

	});

	var GlobaNavEventHandler = {
		
		openMoreMenu : function(e) {

			$(this).parent().toggleClass('active');
			$('.iasd-global_navbar-more').toggleClass('open');
			$('.iasd-search-box').removeClass('open');
			$('.iasd-global_navbar .search-link').removeClass('active');
			e.preventDefault();

		},
		
		closeMoreMenu : function() {

			$('.iasd-global_navbar-more').removeClass('open');
			return false;

		},

		openResponsiveMenu : function() {

			$('body, html').toggleClass('prevent-scrolling');
			$('.iasd-global_navbar-main .search-link').removeClass('active');
			$('.iasd-global_navbar-main .nav-collapse').toggleClass('open');
			$(this).closest('.iasd-global_navbar-main').toggleClass('open');
			if( $('.iasd-global_navbar-more').hasClass('open')){
				$('.iasd-global_navbar-more').removeClass('open');
				$('.iasd-global_navbar-more .tab-content').removeClass('open');
			}
			$('.iasd-search-box').removeClass('open');

		},

		openTabsMenu : function(){

			$('.iasd-global_navbar-more .tab-content').addClass('open');

		},

		closeTabsMenu : function(){

			$('.iasd-global_navbar-more .tab-content').removeClass('open');
			return false;

		},

		hideList : function(){
			$(this).closest('ul').removeClass('open');
		},

		openSearchForm : function(){

			var jqThis = $(this);
			jqThis.toggleClass('active');
			$('.open-more-link').parent().removeClass('active');
			$('.iasd-search-box').toggleClass('open');
			$('.iasd-global_navbar-more').removeClass('open');
			$('body, html').removeClass('prevent-scrolling');
			$('.iasd-global_navbar-main .nav-collapse').removeClass('open');
			$('.btn-navbar').closest('.iasd-global_navbar-main').removeClass('open');			
			return false;

		},

		openInstitucionsList : function(){

			var jqThis = $(this);
			var region = jqThis.attr('data-region');
			$('.institutions ul ul').removeClass('open');
			$('.institutions .open-associations-link').removeClass('active');
			jqThis.addClass('active');
			$('.map').addClass('global-nav-map-'+region);
			jqThis.siblings('ul').addClass('open');
			$('.first-steps').remove();
			$('.instructions.error').remove();
			return false;

		},

		changeMap : function(){
			var jqThis = $(this).attr('data-region');
			$('.map').attr('class', 'map visible-desktop');
			$('.map').addClass('global-nav-map-'+jqThis);
		},

		cleanMap : function(){
			var jqThis = $('.institutions .open-associations-link');
			var region = $('.institutions .open-associations-link.active').attr('data-region');
			if(jqThis.hasClass('active')){
				$(".map").attr('class', 'map visible-desktop map global-nav-map-'+region);
			} else{
				$(".map").attr('class', 'map visible-desktop map global-nav-map-map-01');
			}
		},

		showHelp : function(){
			$('.instructions.error').css('visibility', 'visible');
		},

		hideHelp : function(){
			$('.instructions.error').remove();
		},

		moreTabsShow : function (e) {
			e.preventDefault();
			$(this).tab('show');
		}	

	};

})(jQuery);