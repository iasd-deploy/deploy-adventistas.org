<form role="search" method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" >
	<div class="input-append">
	  <input class="input-xlarge" id="appendedInputButton" name="s"  size="16" type="text">
	  <button class="btn" id="searchsubmit" type="submit" onclick="jQuery('#searchform').submit();"><span class="iasd-icon search"></span></button>
	</div>
</form>