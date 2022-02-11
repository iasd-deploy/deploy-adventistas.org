(function($){

	$(document).ready(function(){
		if (window.is_headquarter){
			$('#cargo_lidergeral').closest('tr').hide();
		} else {
			$('#cargo_presidente, #cargo_tesoureiro, #cargo_secretario').closest('tr').hide();		
		}
	});

	$('input[name=cargo_tipo]').click(function(){
		var disable = ($(this).is('#cargo_presidente, #cargo_tesoureiro'));
		$('#cargo_titulo').attr('disabled', disable);
	})

})(jQuery);