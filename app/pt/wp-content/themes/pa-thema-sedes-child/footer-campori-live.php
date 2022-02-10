<?php

if ( ! is_404( ) ){
	do_action( 'footer_content' );
	wp_footer();	
}

$json_url = get_option('s3_json_url');
$titulo = get_field('titulo_video', 'option');
$id_youtube = get_field('id_youtube', 'option');
$autoplay = get_field('autoplay', 'option');
$texto_auxiliar = get_field('texto_auxiliar', 'option');


?>

<script type="text/javascript">
"use strict";

var g = {};
g.current = "youtube";

var app = angular.module('app', ['ngSanitize']);
app.controller('liveStreaming', ['$scope', '$http', '$sce', function liveStreaming($scope, $http, $sce) {
	$scope.titulo = "<?php echo $titulo; ?>";
	$scope.player = $sce.trustAsResourceUrl("https://www.youtube.com/embed/<?php echo $id_youtube; ?>?showinfo=0&modestbranding=1&autoplay=<?php echo $autoplay; ?>");
	$scope.texto_auxiliar = "<?php echo $texto_auxiliar; ?>";

	setInterval(function () {
		$http.get('<?php echo $json_url; ?>').then(function(res){
			var $d = res.data;
			if  ($d.is_live == "1") {
				jQuery(".player_container .live_label").removeClass("hide");
				jQuery(".player_container .players").removeClass("hide");
			} else {
				jQuery(".player_container .live_label").addClass("hide");
				jQuery(".player_container .players").addClass("hide");
			}

			if ($d.is_facebook == "1"){
				jQuery(".players .facebook").removeClass("hide");
			} else {
				jQuery(".players .facebook").addClass("hide");
			}

			$scope.live_label = $d.live_label;
			$scope.titulo = $d.titulo;

			g.y_player_src = "https://www.youtube.com/embed/"+ $d.id_youtube +"?showinfo=0&modestbranding=1&autoplay="+ $d.autoplay;
			g.f_player_src = "https://www.facebook.com/plugins/video.php?href=https%3A%2F%2Fwww.facebook.com%2Fchapeleirolive%2Fvideos%2F"+ $d.id_facebook +"%2F&show_text=0&width=560";

			if (g.current == "youtube"){
				$scope.player = $sce.trustAsResourceUrl(g.y_player_src);
			} else if (g.current == "facebook") {
				$scope.player = $sce.trustAsResourceUrl(g.f_player_src);
			} else if (g.current == "v360") {
				$scope.player = $sce.trustAsResourceUrl(g.v_player_src);
			}

			$scope.texto_auxiliar = $d.texto_auxiliar;
			
			if ($d.show_log == "1") {
				console.log($d);
				console.log("titulo: "+ JSON.stringify($d.titulo));
				console.log("is_live: "+ JSON.stringify($d.is_live));
				console.log("live_label: "+ JSON.stringify($d.live_label));
				console.log("autoplay: "+ JSON.stringify($d.autoplay));
				console.log("id_youtube: "+ JSON.stringify($d.id_youtube));
				console.log("show_log: "+ JSON.stringify($d.show_log));
				console.log("is_facebook: "+ JSON.stringify($d.is_facebook));
				console.log("id_facebook: "+ JSON.stringify($d.id_facebook));
				console.log("texto_auxiliar: "+ JSON.stringify($d.texto_auxiliar));
				console.log("time: "+ JSON.stringify($d.time));
				console.log("");
			}
		});
	}, 3000);

	jQuery(function($) {
		$(".players a").click(function() {
			var player = this.hash;
			//console.log(player);
			switch(player) {
				case "#youtube":
				default:
					$(".players a.youtube").addClass("active");
					$(".players a.facebook").removeClass("active");
					$(".players a.v360").removeClass("active");
					g.current = "youtube";
					break;
				case "#facebook":
					$(".players a.youtube").removeClass("active");
					$(".players a.facebook").addClass("active");
					$(".players a.v360").removeClass("active");
					g.current = "facebook";
					break;
				case "#v360":
					$(".players a.youtube").removeClass("active");
					$(".players a.facebook").removeClass("active");
					$(".players a.v360").addClass("active");
					g.current = "v360";
					break;
			}
		});
	});
}]);

</script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/static/lib/iasd-bootstrap.min.js"></script>
<script src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/custom_static/campal-live/js/campal-live.js"></script>

<!-- social media includes -->
<script src="https://apis.google.com/js/platform.js" async defer>{lang: 'pt-BR'}</script>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-37179104-7', 'auto');
  ga('send', 'pageview');

</script>

</body>

</html>