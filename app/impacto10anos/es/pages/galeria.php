	
	<div class="row">
    	<div class="am-container" id="am-container">
    		<section id="photos">

	    		<div class="legenda">
	    			<div class="imagen">
	    				<img src="images/Logo.png" alt="Logo">
	    			</div>
	    			
	    			<p>Hay mucho que recordar de estos diez años, y cada imagen ayuda a contar un poco de cada historia y ayuda a perpetuar aquella sonrisa, aquella sorpresa, aquél momento en que la esperanza brilló para alguien.</p>
	    		</div>

    			<?php
					$files = glob("images/galeria/*.*");

					for ($i=1; $i<count($files); $i++) { 
						
						$num = $files[$i]; 

						if ($i >= 10 ){
							echo '<a href="#"><img class="hidden-xs" alt="random image" src="' . $num . '" /></a>'; 
						} else {
							echo '<a href="#"><img class="" alt="random image" src="' . $num . '" /></a>'; 
						}
					
						
					}
    			?>
    		</section>
    	</div>
    	
    	<div class="text-center link">
    		<a href="https://flic.kr/s/aHskX4FqbJ" target="_blank">Mira el álbum completo</a>
    	</div>

    	

    </div>