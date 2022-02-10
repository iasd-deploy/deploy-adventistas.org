	
	<div class="row">
    	<div class="am-container" id="am-container">
    		<section id="photos">

	    		<div class="legenda">
	    			<div class="imagen">
	    				<img src="images/Logo.png" alt="Logo">
	    			</div>
	    			
	    			<p>Há muito o que recordar desses dez anos, e cada imagem ajuda a contar um pouco de cada história, de cada memória. Ajuda a perpetuar aquele sorriso, aquela surpresa, aquele momento em que a esperança brilhou para alguém.</p>
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
    		<a href="https://www.flickr.com/photos/advst/sets/72157683970320225/" target="_blank">Veja o álbum completo</a>
    	</div>

    	

    </div>