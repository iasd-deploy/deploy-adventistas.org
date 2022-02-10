(function($){

	if(window.navigator.userAgent.indexOf('MSIE 8') == -1){
		$(window).load(function(){
			
			$('.popup').popupWindow({ 
				centerScreen:1, 
				height:300, 
				width:630
			}); 


			var msnry = new Masonry( '.items' , {
	  				columnWidth: 323,
					itemSelector: '.item'
			});


			$('.load-more_posts-link').live('after-render-page.iasd', function(){	

				window.setInterval(function(){var msnry = new Masonry( '.items' , {
		  			columnWidth: 323,
					itemSelector: '.item'
				});}, 1000);

			 });

		});
	} else {
		alert('Alguns recursos desta página são incompatíveis com a versão 8.0 do Internet Explorer. Sugerimos que atualize seu navegador.')
	}

})(jQuery);