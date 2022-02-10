$(document).ready(function(){
	$(".youtube").colorbox({iframe:true, innerWidth:640, innerHeight:390});
	$(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
	$(".livestream").colorbox({iframe:true, width:"80%", height:"80%"});


	//Example of preserving a JavaScript event for inline calls.
	$("#click").click(function(){ 
		$('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
		return false;
	});
});