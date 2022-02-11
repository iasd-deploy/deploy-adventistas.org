/* global jQuery */
(function($) {
	'use strict';

	//TODO Colocar estas funções em um controller!
	$('.back-to-top a').click(function(eventObject) {
		eventObject.preventDefault();
		$('body,html').animate({ scrollTop: 0 }, 500);
		return false;
	});

	$('.header-top .nav.nav-hover .dropdown').hover(function (eventObject) {
		if($('.header-top').width() >= 979)
			$(this).addClass('open');
	}, function (eventObject) {
		if($('.header-top').width() >= 979)
			$(this).removeClass('open');
	});
	$('.nav-principal .btn.btn-navbar').click(function () {
		var btnNavbarAtual = $(this);
		if(btnNavbarAtual.hasClass('collapsed')) { //Vai abrir
			var btnNavbars = $('.nav-principal .btn.btn-navbar');
			for (var i = btnNavbars.length - 1; i >= 0; i--) {
				var btnNavbar = $(btnNavbars[i]);
				if(btnNavbar.attr('data-target') != btnNavbarAtual.attr('data-target')) {
					if(!btnNavbar.hasClass('collapsed')) {
						var dataTarget = $(btnNavbar.attr('data-target'));
						dataTarget.collapse('toggle');
						btnNavbar.addClass('collapsed');
					}
				}
			}
		}
		return true;
	});

	$('.sub-menu .dropdown a').click(function (eventObject) {
		var parent = $(this).parent();
		if(parent.hasClass('dropdown')) {
			parent.toggleClass('open');

			eventObject.preventDefault();
			eventObject.stopPropagation();
		}

		return true;
	});


	function toggleRegionPickerForm(){
		var $widget = $(this).closest('.iasd-widget');
		var $pickerForm = $widget.find('.region-picker-form');
		
		if ($pickerForm.is(':visible')){
			$widget.find('.see-more').addClass('invisible');
			$widget.find('.picker-trigger').addClass('open');
		} else {
			$widget.find('.see-more').removeClass('invisible');
			$widget.find('.picker-trigger').removeClass('open');
		}

	}

	$('.picker-trigger').click(function (eventObject){
		$(this).closest('.iasd-widget').find('.region-picker-form').slideToggle(toggleRegionPickerForm);
		eventObject.preventDefault();
	}).each(toggleRegionPickerForm);

	var IASDCarouselController = {
		updateCarouselWidth : function(){
			$('.iasd-widget-carousel').each(function(){
				var $this = $(this);

				var idealItemWidth = $this.data('idealItemWidth') || 140;
				$this.find('.iasd-widget-carousel_mask').each(function(){
					var $mask = $(this);
					var $items = $mask.find('li');
					var maskWidth = $mask.width();

					var numItems = Math.floor( maskWidth / idealItemWidth ) || 1;
					numItems = ($items.size() < numItems) ? $items.size() : numItems;
					
					var itemWidth = (maskWidth > (idealItemWidth*$items.size())) ? idealItemWidth : (maskWidth / numItems);

					$mask.find('li').width(itemWidth);
					$mask.find('h2').width(itemWidth-30);
				});

				var $items = $this.find('li');
				var itemWidth = $items.first().outerWidth(true);

				//Adicionados 10px por segurança
				$this.find('ul').width((itemWidth+1)*$items.length+10);

			});


		},

		scrollItems : function (eventObject){
			var $this = $(this);
			var $mask = $this.closest('.iasd-widget-carousel').find('.iasd-widget-carousel_mask');
			var $item = $mask.find('li:first');
			var $list = $mask.find('ul');

			var isRight = $this.is('.right');
			var listWidth = $list.width();
			var nextWidth = $mask.width() + $mask.scrollLeft() + $item.width();
			
			if((nextWidth < listWidth) || !isRight) {
				var scrollValue = ((isRight) ? '+=' : '-=') + $item.width();
				$mask.animate({'scrollLeft': scrollValue}, 500);
			}
		}
	};


	$(document).ready(function(){
		IASDCarouselController.updateCarouselWidth();
		$('.iasd-widget-carousel_control.right, .iasd-widget-carousel_control.left').click(IASDCarouselController.scrollItems);

		$('.faq-question').click(function(){
			$(this).next().slideToggle();
			return false;
		});

		$('.more-faq').click(function(){
			$('.hidden-faq').slideToggle();
			return false;
		});

	});

	$(window).resize(IASDCarouselController.updateCarouselWidth);
	
	var WidgetController = {

		// For this widget work well, depends on setting the proper width on
		// .single_gallery_widget_item (we are using .span5)
		initialize : function(){
			$('.iasd-widget-single_gallery').each(function(){
				var $this = $(this);
				var $items = $this.find('.iasd-widget-single_gallery_item');
				var widgetWidth = ($this.closest('[class*=span]').outerWidth()+3) * $items.size();
				$this.find('.iasd-widget-single_gallery_mask').width(widgetWidth);
				$items.width($this.width());
				$this.closest('.iasd-widget-single_gallery_container').scrollLeft(0);
			});
			
		},

		nextPrevClick : function(event) {
			var jqThis = $(this);
			var width = jqThis.closest('.iasd-widget-single_gallery_item').outerWidth()+3;
			var scrollChange = ((jqThis.is('.next')) ? '+=' : '-=') + width;
			jqThis.closest('.iasd-widget-single_gallery_container').animate({
				scrollLeft: scrollChange
			}, 400);
		
			return false;
		}
	};

	$(document).ready(function () {

		WidgetController.initialize();
		$(window).resize(WidgetController.initialize);
		$('.iasd-widget-single_gallery_item .slider-nav').click(WidgetController.nextPrevClick);

	});
})(jQuery);




