<?php
	get_header();

	$archive_link = get_post_type_archive_link( 'pa-post-inst' );

	//Telefone e fax
	$telefone = get_post_meta(get_the_ID(), 'instituicao_tel', true);
	$fax = get_post_meta(get_the_ID(), 'instituicao_fax', true);

	$telefone = ($telefone) ? '<em> '.__('Telefone: ', 'iasd').' <a href="tel: '.$telefone.'" title="'.$telefone.'">'.$telefone.'</a></em>' : '';
	$fax = ($fax) ? '<em> '.__('Fax: ', 'iasd').' <a href="tel: '.$fax.'" alt="'.$fax.'">'.$fax.'</a></em>' : '';
	//// SOCIALS
	$email = get_post_meta(get_the_ID(), 'instituicao_email', true);
	if($email)
		$email = '<em>'.__('E-mail: ').'<a href="mailto:'.$email.'" title="'.$email.'">'.$email.'</a></em>';
	$facebook = get_post_meta($post->ID, 'instituicao_facebook', true);
	if($facebook)
		$facebook = '<em>'.__('Facebook: ').'<a href="http://www.facebook.com/'.$facebook.'" target="_blank" title="http://www.facebook.com/'.$facebook.'">/'.$facebook.'</a></em>';
	$twitter = get_post_meta(get_the_ID(), 'instituicao_twitter', true);
	if($twitter)
		$twitter = '<em>'.__('Twitter: ').'<a href="http://twitter.com/'.$twitter.'" target="_blank" title="http://twitter.com/'.$twitter.'">@'.$twitter.'</a></em>';
	$website = get_post_meta($post->ID, 'instituicao_website', true);
	if($website)
		$website = '<a href="'.$website.'" title="'.__('Clique para acessar o website', 'iasd').'" target="_blank"><h3>'.$website.'</h3></a>';

	$video = get_post_meta(get_the_ID(), 'instituicao_video', true);

?>
<!-- *************************** -->
<!-- ********* Content ********* -->
<!-- *************************** -->
<div class="container">
	<section class="row">
		<article class="col-xs-12 entry-content inst-address">
			<div class="row">
				<div class="col-xs-12">
					<h1 class="iasd-main-title"><?php _e('Sedes', 'iasd'); ?></h1>
					<div class="col-sm-4">
						<div class="row">
							<?php the_post_thumbnail('thumb_293x185', array('class' => 'img-responsive img-rounded')); ?>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="row">
							<div class="col-md-12">
								<h1><?php echo apply_filters('trim', get_the_title(), 60); ?></h1>
								
								<?php echo $website, $telefone, $fax, $twitter, $facebook, $email; ?>

								<?php if ($video) { ?>
								<div class="mar-top-30">
									<h2><?php _e('Vídeo Institucional', 'iasd'); ?></h2>
									<iframe width="100%" height="350" src="//www.youtube.com/embed/<?php echo $video; ?>?rel=0" frameborder="0" allowfullscreen style="margin-top: 0;"></iframe>
								</div>
								<hr>
								<?php } ?>

								<div class="mar-top-30">
									<h2><?php _e('Localização', 'iasd'); ?></h2>
									<em><?php echo apply_filters('trim', get_the_excerpt(), 100),' ' , get_post_meta($post->ID, 'poboxzip', true); ?></em>
									<div class="mar-top-30" id="map-canvas" style="height:230px; width:100%;"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</article>

		<div class="col-xs-12">
			<div class="mar-top-30" id="iasd-page-prevnext">
				<div class="page-prevnext">
					<div class="btn btn-default">«</div>
					<a href="<?php echo $archive_link; ?>" class="single" title="<?php _e('Clique para voltar', 'iasd'); ?>"><?php _e('Voltar', 'iasd'); ?></a>
				</div>
			</div>
		</div>
	</section>
</div>

<!-- *************************** -->
<!-- ******* End Content ******* -->
<!-- *************************** -->
<?php /*
<!-- *************************** -->
<!--   Begin Return Page Plugin  -->
<!-- *************************** -->

<div class="iasd-plugin-return_page visible-md visible-lg collapsed">
	<a href="#" title="Clique para visualizar o link da página anterior" class="toggle-visibility-link">Esconder</a>
	<a href="#" title="Clique para voltar para <Título da página>" class="page-link">Título da página comprido em várias linhas para assegur...</a>
</div>

<!-- *************************** -->
<!--    End Return Page Plugin   -->
<!-- *************************** -->
*/  ?>

<?php
	$mapCoords = get_post_meta(get_the_ID(), 'instituicao_map', true);
	if($mapCoords != '' && $mapCoords != '0, 0'):
		list($lat, $long) = explode(',', $mapCoords);
		$lat = trim($lat);
		$long = trim($long);
		if($lat && $long): 
?>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBSDPzGC-b72c9uKgxbWs5uNPcTCEpRuBc&sensor=false"></script>
	<script>
	var map;
	function initialize() {
		var instituicao_marker = new google.maps.LatLng(<?php echo $lat; ?>, <?php echo $long; ?>);
		var mapOptions = {
			zoom: 13,
			center: instituicao_marker,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		};
		map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

		var marker = new google.maps.Marker({
			position: instituicao_marker,
			map: map,
			title: '<?php the_title(); ?>'
		});

		var center = map.getCenter();
		google.maps.event.trigger(map, "resize");
		map.setCenter(center); 
	}

	google.maps.event.addDomListener(window, "resize", initialize);

	google.maps.event.addDomListener(window, 'load', initialize);

</script>
<?php 
		endif;
	endif;
?>

<?php get_footer(); ?>