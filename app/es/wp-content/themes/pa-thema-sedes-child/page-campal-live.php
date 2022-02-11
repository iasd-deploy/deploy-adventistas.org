<?php
	
	/* Template name: Página - Campal Live */

	if(have_posts())
		the_post();

	get_header("campal-live"); 	
?>
<!-- *************************** -->
<!-- ********* Content ********* -->
<!-- *************************** -->

	<section id="live" class="live">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2 class="section-title"><?php _e('Assista ao vivo:', 'iasd'); ?></h2>
					<a href="#transmissao" id="generic-link" class="live_link"><?php _e('Transmissão', 'iasd'); ?></a>
					<a href="#facebook-live" id="facebook-link" class="live_link"><?php _e('Facebook Live', 'iasd'); ?></a>
					<a href="#youtube-360" id="youtube-link" class="live_link"><?php _e('Youtube', 'iasd'); ?> <img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/custom_static/campal-live/img/icon-360.svg" /></a>
				</div>
			</div>
			<div id="youtube-360" class="row player">
				<div class="col-md-12">
					<?php if( get_field('youtube_aovivo') ) { ?>
						<div class="embed-responsive embed-responsive-16by9">
							<?php the_field('youtube_live'); ?>
						</div>
					<?php }else{
						echo '<div class="next-transmission"><h3>Aguarde a próxima transmissão começar.</h3></div>';
					} ?>
				</div>
			</div>
			<div id="facebook-live" class="row player">
				<div class="col-md-12">
					<?php if( get_field('facebook_aovivo') ) {
						the_field('facebook_live');
					}else{
						echo '<div class="next-transmission"><h3>Aguarde a próxima transmissão começar.</h3></div>';
					} ?>
				</div>
			</div>
			<div id="transmissao" class="row player">
				<div class="col-md-12">
					<?php if( get_field('generic_aovivo') ) { 
						the_field('generic_live');
					}else{
						echo '<div class="next-transmission"><h3>Aguarde a próxima transmissão começar.</h3></div>';
					} ?>
				</div>
			</div>
		</div>

		<?php if( have_rows('broadcast_schedules') ): ?>
			<div class="container broadcast-schedules">
				<div class="row">
					<div class="col-md-12">
						<h3><?php _e('Horários de transmissão', 'iasd'); ?></h3>
						<ul>
						<?php while ( have_rows('broadcast_schedules') ) : the_row(); ?>
							
							<li>
								<span class="date"><?php the_sub_field('week'); ?></span>
								<span class="hour"><?php the_sub_field('hour'); ?></span>
							</li>

						<?php endwhile; ?>
						</ul>
					</div>
				</div>
			</div>
		<?php endif; ?>

	</section>


	<?php if( have_rows('broadcast_archive') ): ?> 
		<section id="videos" class="videos">
			<div class="container">
				<div class="row">
					<div class="iasd-widget col-md-12">
						<h1><?php _e('Transmissões na Íntegra', 'iasd'); ?></h1>

						<div class="content row">

							<?php while ( have_rows('broadcast_archive') ) : the_row();

								$thumbnail = get_sub_field('thumbnail');
								$link = get_sub_field('link'); 
								$title = get_sub_field('title'); ?>

								<div class="col-md-3 col-sm-4 col-xs-6">
									<a href="<?php echo $link; ?>" title="<?php echo $title; ?>" class="video-item">
										<figure style="background-image: url('<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/flavours/static/img/widgets/no_image_740x475.png');">
											<img src="<?php echo $thumbnail; ?>" class="img-responsive" alt="<?php echo $title; ?>">
										</figure>
										<h2><span class="badonkatrunc-wrapper"><?php echo $title; ?></span></h2>
									</a>
								</div>

							<?php endwhile; ?>

						</div>
					</div>
				</div>
			</div>
		</section>
	<?php endif; ?>

	
	<section id="sidebar" class="sidebar">
		<div class="container">
			<div class="row">
				<?php do_action('iasd_dynamic_sidebar', 'campal-live'); ?>
			</div>
		</div>
	</section>

<!-- *************************** --> 
<!-- ******* End Content ******* --> 
<!-- *************************** -->

<?php get_footer("campal-live"); ?>