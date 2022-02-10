<?php
	
	/* Template name: Página - Eu Penso Assim */

	if(have_posts())
		the_post();

	get_header("eu-penso-assim"); 	
?>
<!-- *************************** -->
<!-- ********* Content ********* -->
<!-- *************************** -->
	
	<?php $bglink = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );?>

	<section id="tema" class="tema-da-semana" style="background-image: url(<?php echo $bglink; ?>);">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<?php /*<h1><?php _e('Tema da semana', 'iasd'); ?>: <?php echo $videos[0]['title']; ?></h1> */?>
					<h1><?php the_field('titulo_video_principal'); ?></h1>

					<div class="embed-responsive embed-responsive-16by9">
						<?php /*<iframe class="embed-responsive-item" width="500" height="281" src="https://www.youtube.com/embed/<?php echo $videos[0]['youtube_id']; ?>?feature=oembed&amp;wmode=opaque&amp;rel=0" frameborder="0" allowfullscreen=""></iframe>*/ ?>
						<?php the_field('video_principal'); ?>
					</div>

					<?php /*<p class="next"><?php _e('Próxima postagem: Sexta-feira às 18h30', 'iasd'); ?></p>*/ ?>
					<p class="next"><?php the_field('descricao_video_principal'); ?></p>
				</div>
			</div>
		</div>
	</section>
	
	
	<?php 

	$videos = array();

	if( have_rows('videos') ):

	    while ( have_rows('videos') ) : the_row();

	        // Your loop code
	        $videos[] = array(
	        	'title' => get_sub_field('title'),
	        	'youtube_id' => get_sub_field('youtube_id'),
	        	'description' => get_sub_field('description'),
	        );

	    endwhile;

	endif;

	?>

	<section>
	
		<div class="container">
			<div class="row">

				<div class="iasd-widget iasd-widget_video_anterior col-md-7">
					<h1><?php _e('Vídeo anterior', 'iasd'); ?></h1>
					<h2><?php echo $videos[0]['title']; ?></h2>

					<div class="embed-responsive embed-responsive-16by9">
						<iframe class="embed-responsive-item" width="500" height="281" src="https://www.youtube.com/embed/<?php echo $videos[0]['youtube_id']; ?>?feature=oembed&amp;wmode=opaque&amp;rel=0" frameborder="0" allowfullscreen=""></iframe>
					</div>

					<div class="content">
						<?php echo $videos[0]['description']; ?>

						<div class="share-bar">
							<iframe src="//www.facebook.com/plugins/share_button.php?href=<?php the_permalink(); ?>&amp;layout=button_count&amp;appId=623343481129107" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width: 170px;height: 20px;" allowTransparency="true"></iframe>
							<div class="g-plusone" data-size="medium" data-annotation="inline" data-width="120" data-href="<?php the_permalink(); ?>"></div>
							<a href="https://twitter.com/share" class="twitter-share-button" data-via="iasd" data-hashtags="<?php the_field('hashtag'); ?>">Tweet</a>
						</div>
					</div>
				</div>

				<div class="iasd-widget iasd-widget_participe col-md-5">
					<h1><?php _e('PARTICIPE', 'iasd'); ?></h1>
					<p class="description"><?php _e('Deixe seu comentário nas redes sociais', 'iasd'); ?>:</p>

					<ul class="nav nav-tabs" id="myTab">
						<li class="active"><a href="#twitter" data-toggle="tab">Twitter</a></li>
						<li><a href="#facebook" data-toggle="tab">Facebook</a></li>
						<li><a href="#instagram" data-toggle="tab">Instagram</a></li>
					</ul>
					<div class="tab-content">
		                <div class="tab-pane active" id="twitter">
		                 	<a class="twitter-timeline" href="<?php the_field('twitter'); ?>" height="400" data-chrome="noheader" data-link-color="#6A051B" data-widget-id="573205935197454336"><?php _e('Carregando', 'iasd'); ?> Tweets...</a>							
		                </div>
		                <div class="tab-pane" id="facebook">
		                 	<iframe src="//www.facebook.com/plugins/likebox.php?href=<?php the_field('facebook'); ?>&amp;width&amp;height=395&amp;colorscheme=light&amp;show_faces=false&amp;header=false&amp;stream=true&amp;show_border=false&amp;appId=623343481129107" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100%; height:395px;" allowTransparency="true"></iframe>
		                </div>
		                <div class="tab-pane" id="instagram">
		                  	<ul id="instafeed" class="instafeed"></ul>
		                </div>
		            </div>
				</div>

			</div>
		</div>

	</section>


	<section id="videos" class="videos">
		<div class="container">
			<div class="row">
				<div class="iasd-widget col-md-12">
					<h1><?php _e('GALERIA DE VÍDEOS', 'iasd'); ?></h1>

					<div class="content row">

						<?php for ($i = 0; $i < count($videos); $i++) : 

							$youtube_id = $videos[$i]['youtube_id']; ?>

							<div class="col-md-3 col-sm-4 col-xs-6">
								<a href="http://www.youtube.com/embed/<?php echo $youtube_id; ?>?autoplay=1" title="<?php echo $videos[$i]['title']; ?>" class="video-item fancybox.iframe">
									<figure style="background-image: url('<?php echo esc_url( get_template_directory_uri() ); ?>/flavours/static/img/widgets/no_image_740x475.png');">
										<img src="http://img.youtube.com/vi/<?php echo $youtube_id; ?>/mqdefault.jpg" class="img-responsive" alt="<?php echo $videos[$i]['title']; ?>">
									</figure>
									<h2><span class="badonkatrunc-wrapper"><?php echo $videos[$i]['title']; ?></span></h2>
								</a>
							</div>

						<? endfor; ?>

					</div>
				</div>
			</div>
		</div>
	</section>


	<section id="sobre">
		<div class="container">
			<div class="row">
				<div class="iasd-widget col-md-7">
					<h1><?php _e('SOBRE "EU PENSO ASSIM"', 'iasd'); ?></h1>
					<?php the_field('about'); ?>
				</div>
				<div id="contato" class="iasd-widget iasd-widget_contact col-md-5">
					<h1><?php _e('Entre em contato e Saiba tudo  sobre o projeto Eu Penso Assim!', 'iasd'); ?></h1>
					
					<?php the_field('contact'); ?>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="iasd-widget iasd-widget_share">
						<h1><?php _e('COMPARTILHE NAS SUAS REDES', 'iasd'); ?></h1>
						<div class="row">
							<div class="col-md-2 col-md-offset-3">
								<iframe src="//www.facebook.com/plugins/share_button.php?href=<?php the_permalink(); ?>&amp;layout=button_count&amp;appId=623343481129107" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width: 170px;height: 20px;" allowTransparency="true"></iframe>
							</div>
							<div class="col-md-2 col-md-offset-1">
								<div class="g-plusone" data-href="<?php the_permalink(); ?>"></div>
							</div>
							<div class="col-md-2">
								<a href="https://twitter.com/share" class="twitter-share-button" data-via="iasd"  data-hashtags="<?php the_field('hashtag'); ?>">Tweet</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<?php if ( comments_open() ) { ?>
	<section class="disqus">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1 class="iasd-main-title"><?php _e( 'Deixe seu comentário', 'iasd' );?></h1>
					<?php comments_template(); ?>
				</div>
			</div>
		</div>
	</section>
	<?php } ?>

<!-- *************************** --> 
<!-- ******* End Content ******* --> 
<!-- *************************** -->

<?php get_footer("eu-penso-assim"); ?>