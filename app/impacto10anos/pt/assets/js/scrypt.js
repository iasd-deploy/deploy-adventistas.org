	
// -- Define a variavel para os codigos JQuery. 
//var $ = "jQuery";

// -- Script do heder paralix

	srcV = "";
	vPastor = "";

	function scrollBanner() {
		var scrollPos;
		var headerText = document.querySelector('.header-paralax img');
		scrollPos = window.scrollY;

		if (scrollPos <= 700) {
		    headerText.style.transform =  "translateY(" + (-scrollPos/3) +"px" + ")";
		    headerText.style.opacity = 1 - (scrollPos/700);
		}
	}

	window.addEventListener('scroll', scrollBanner);

	
// -- Script do carrocel 

	$(document).ready(function() {
      $('#c1').owlCarousel({
        loop: true,
        margin: 10,
        responsiveClass: true,
        responsive: {
          0: {
            items: 2,
            nav: true
          },
          600: {
            items: 3,
            nav: false
          },
          1000: {
            items: 5,
            nav: true,
            loop: false,
            margin: 20
          }
        }
      })
    });

    $(document).ready(function() {
      $('#c2').owlCarousel({
        loop: true,
        margin: 10,
        responsiveClass: true,
        center: false,
        // autoplay: true,
        responsive: {
          0: {
            items: 1,
            nav: true
          },
          600: {
            items: 3,
            nav: false
          },
          1000: {
            items: 5,
            nav: true,
            margin: 20
          }
        }
      })
    });


// -- Script do modal

	$(document).ready(function() {	
		$('a[name=modal]').click(function(e) {
			e.preventDefault();
			
			var id = $(this).attr('href');

			var idF = id + "F";

			if ($(idF)[0].src == false){
				//alert("Esta aqui!");
				var name = $(idF)[0].name;
				$(idF)[0].src = name;
			}

			var maskHeight = $(document).height();
			var maskWidth = $(window).width();
		
			$('#mask').css({'width':maskWidth,'height':maskHeight});

			$('#mask').fadeIn(1000);	
			$('#mask').fadeTo("slow",0.8);	
		
			//Get the window height and width
			var winH = $(window).height();
			var winW = $(window).width();

			//alert("altura: " + winH + " " + " Largura: " +  winW);

			if (winW <= 750){

			$(id).css('top', 0);
			$(id).css('left', 0);

			}else {
				
				$(id).css('top', 0);
				$(id).css('left', 0);

			}
		
			$(id).fadeIn(1000); 
		
		});
		
		$('.window .close').click(function (e) {
			e.preventDefault();
			
			$('#mask').hide();
			$('.window').hide();
		});		
		
		$('#mask').click(function () {
			$(this).hide();
			$('.window').hide();
		});		
	
	});	

	function fechar(){

			//alert("ESTOU AQUI!");
			$('#mask').hide();
			$('.window').hide();
	}

	
// -- Script do video da linha editora 

	function vervideo (){
		
		//toggleVideo();

		play("#video");

		$( "#row1" ).fadeOut( 1000, function() {
		    $( "#row2" ).fadeIn( 900, function() {
		    	document.getElementById("editora").onclick = enableReturn;
		    	
		    });
		});
		return false;
	}

	function enableReturn(){

		pause("#video");

		$('#row2').fadeOut(1000, function() {
			
			$('#row1').fadeIn( 900, function() {
				document.getElementById("editora").onclick = null;
					
			});
		});
	}

	function play(e){

		//alert(e);

		srcV = $(e)[0].src;

		//alert(srcV + " 1");

	    $(e)[0].src += "&autoplay=1";
	    //ev.preventDefault();

	}

	function pause(e){

		//alert(srcV);

		$(e)[0].src = srcV;

		//alert($(e)[0].src + " 2");
	}
	
// -- Fim linha editor

// -- Modal da mensagem

	

	$(document).ready(function() {	
		$('a[name=modal2]').click(function(e) {
			e.preventDefault();
			
			var id = $(this).attr('href');


			vPastor = id + "V";

			play(vPastor);

			var maskHeight = $(document).height();
			var maskWidth = $(window).width();
		
			$('#mask2').css({'width':maskWidth,'height':maskHeight});

			$('#mask2').fadeIn(1000);	
			$('#mask2').fadeTo("slow",0.8);	
		
			//Get the window height and width
			var winH = $(window).height();
			var winW = $(window).width();
	              
			$(id).css('top', winH/3-$(id).height()/2);
			$(id).css('left', winW/2-$(id).width()/2);
		
			$(id).fadeIn(1000); 

		});
		
		// $('.window .close').click(function (e) {
		// 	e.preventDefault();
			
		// 	$('#mask2').hide();
		// 	$('.window').hide();
		// });

		$('.fechar3').click(function () {
			$('#mask2').hide();
			$('.window').hide();

			pause(vPastor);

		});		
		
		$('#mask2').click(function () {
			$(this).hide();
			$('.window').hide();


			pause(vPastor);

		});	
	});	

	// Efeito de rolagem suave

	// Select all links with hashes



