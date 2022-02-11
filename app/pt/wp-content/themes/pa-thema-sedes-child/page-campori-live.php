<?php
	
	/* Template name: Página - Campori Live */

	if(have_posts())
		the_post();

	get_header("campori-live");
?>
<!-- *************************** -->
<!-- ********* Content ********* -->
<!-- *************************** -->

<div class="iasd-live-page">

	<?php Video_Streaming_Controller::render_view(); ?>
	
	<?php if( have_rows('broadcast_schedules') ): ?>

		<section class="broadcast-schedules">
			<div class="container">
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
		</section>

	<?php endif; ?>

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
				<?php do_action('iasd_dynamic_sidebar', 'campori-live'); ?>
			</div>
		</div>
	</section>
</div>

<!-- *************************** --> 
<!-- ******* End Content ******* --> 
<!-- *************************** -->

<?php get_footer("campori-live"); ?>