<!DOCTYPE html>
<html lang="pt">
<head>
	

	<?php include_once "pages/meta.html"; ?>

	<title>Impacto Esperança 10 Anos</title>

	<script>

	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-33684424-20', 'auto');
	  ga('send', 'pageview');
	</script>

	<!-- Hotjar Tracking Code for http://www.adventistas.org/impacto10anos/ -->
	<script>
	    (function(h,o,t,j,a,r){
	        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
	        h._hjSettings={hjid:511735,hjsv:5};
	        a=o.getElementsByTagName('head')[0];
	        r=o.createElement('script');r.async=1;
	        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
	        a.appendChild(r);
	    })(window,document,'//static.hotjar.com/c/hotjar-','.js?sv=');
	</script>

	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
 	

	<!-- Independeste CSS -->
	<link rel="stylesheet" type="text/css" href="assets/style/css/style.css">

	<!-- Script - jquery -->
	<script src="assets/js/owlcarousel/jquery.min.js"></script>
 
    <script src="assets/js/owlcarousel/owl.carousel.js"></script>

    <!-- Independeste JS -->
	<script type="text/javascript" src="assets/js/scrypt.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <link rel="stylesheet" type="text/css" href="assets/style/css/bootstrap.min.css">

    <!-- Fontes -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:300" rel="stylesheet">
</head>
<body id="topo">


	<header class="header-paralax">
		<div class="container">
			<div class="row">
				<div class="item col-md-12 text-center">
					<img class="img-responsive" src="images/Logo.png" alt="Logo">
				</div>
			</div>
		</div>
	</header>

	<div id="projeto" class="corpo">

		<!-- Video inicial -->
		<div class="wrapper fino">
			<div class="container">
			    
				<?php include_once "pages/video.html"; ?>

			</div>
		</div>

		<!-- Livros -->
		<div id="livros" class="wrapper livros">
			<div class="container">
			    <div class="row">

			    	<?php include_once "pages/livros.html"; ?>

			    </div>
			</div>
		</div>

		<!-- Galeria de foto -->
		<div id="fotos" class="galeria">
			<div class="container-fluid">
			    
				<?php include_once "pages/galeria.php"; ?>

			</div>
		</div>

		<!-- Editora -->
		<div id="editora" class="editora">
			<div class="wrapper editora2">
				<div id="container" class="container">

				    <?php include_once "pages/editora.html"; ?>

				</div>
			</div>
		</div>

		<!-- Historias -->
		<div id="historias" class="wrapper fino historia">
			<div class="container">
				<div class="row">
			    	<h1>Histórias reais</h1>
			    	<p>Veja relatos incríveis sobre como um livro e sua mensagem foram capazes de mudar a vida de quem estava em busca de esperança.</p>
				</div>
			</div>
			<div class="container-fluid">
			    <div class="row">

			    	<?php include_once "pages/historias.html"; ?>

			    </div>
			</div>
		</div>

		<!-- Mapa -->
		<div id="mapa" class="mapa fino">
			<div class="wrapper">
				<div class="container">
				    <div class="row">

				    	<?php include_once "pages/mapa.html"; ?>

				    </div>
				</div>
			</div>
		</div>

		<!-- Administrador -->
		<div class="mensagem fino">
			<div class="wrapper">
				<div class="container">
				    <div class="row">

				    	<?php include_once "pages/mensagem.html"; ?>

				    </div>
				</div>
			</div>
		</div>

		<!-- Social -->
		<div class="social galeria">
			<div class="wrapper">
				<div class="container">
				    <div class="row">
				    	<?php include_once "pages/social.html"; ?>

				    </div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Pop op Livros -->
	<div id="boxes">
		<?php include_once "pages/box.html"; ?>
	</div>

		<!-- Pop op Livros -->
	<div id="boxes2">
		<?php include_once "pages/pastor.html"; ?>
	</div>  


	<div class="menu">
		<?php include_once "pages/menu.html"; ?>
	</div>

	<!-- Script do efeito de rolagem suave -->
	<script type="text/javascript">
		
		$('a[href*="#"]')
  		// Remove links that don't actually link to anything
	  .not('[href="#"]')
	  .not('[href="#0"]')
	  .click(function(event) {
	    // On-page links
	    if (
	      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
	      && 
	      location.hostname == this.hostname
	    ) {
	      // Figure out element to scroll to
	      var target = $(this.hash);

	      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
	      // Does a scroll target exist?
	      if (target.length) {
	        // Only prevent default if animation is actually gonna happen
	        event.preventDefault();
	        $('html, body').animate({
	          scrollTop: target.offset().top
	        }, 1000, function() {
	          // Callback after animation
	          // Must change focus!
	          var $target = $(target);
	          //$target.focus();
	          if ($target.is(":focus")) { // Checking if the target was focused
	            return false;
	          } else {
	            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
	           // $target.focus(); // Set focus again
	          };
	        });
	      }
	    }
	  });
	</script>


</body>
</html>