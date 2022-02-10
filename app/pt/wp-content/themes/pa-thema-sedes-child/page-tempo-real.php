<?php

	/* Template name: Tempo Real */

	get_header('tempo-real'); 
	if(have_posts())
		the_post();
?>
<!-- *************************** -->
<!-- ********* Content ********* -->
<!-- *************************** -->
<div class="container iasd-tempo-real">
	<section class="row">
		<article class="entry-content">
			<div class="col-md-12">
				<header class="tempo-real-title">
					<h1><?php single_post_title(); ?></h1>
					<small><?php the_excerpt(); ?></small>
				</header>
			</div>
		</article>
	</section>
</div>


<!-- TRANSMITION -->

<?php if (get_field('has_transmition')) : ?>

	<div class="iasd-tempo-real streaming">
		<div class="container">
			<section class="row">
				<div class="col-md-12">
					<?php 
					if( get_field('status') == 'waiting' ) { ?>

						<div class="embed-responsive embed-responsive-16by9 waiting-box">
							<div class="waiting-message">
								<?php the_content(); ?>
							</div>
						</div>

					<?php }else if( (get_field('status') == 'live' || get_field('status') == 'finished')
						 && ! empty( get_field('embed_live') ) ) { ?>

						<div class="embed-responsive embed-responsive-16by9">
							<?php the_field('embed_live'); ?>
						</div>

					<?php }else{ ?>
						
						<div class="embed-responsive embed-responsive-16by9 waiting-box">
							<div class="waiting-message">
								<h3><?php _e( 'Nenhuma transmissão ao vivo neste momento.', 'iasd' ); ?></h3>
							</div>
						</div>

					<?php } ?>
				</div>
			</section>

			<?php if( have_rows('broadcast_archive') ): ?> 

				<section class="row more-videos">
					<div class="col-md-12">
					 	<h2>Vídeos</h2>
						<div class="owl-carousel owl-theme">
							<?php while ( have_rows('broadcast_archive') ) : the_row();

								$thumbnail = get_sub_field('thumbnail');
								$link = get_sub_field('link'); 
								$title = get_sub_field('title'); ?>

								<div>
									<a href="<?php echo $link; ?>" title="<?php echo $title; ?>" target="_blank" class="video-item">
										<figure style="background-image: url('<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/flavours/static/img/widgets/no_image_740x475.png');">
											<img src="<?php echo $thumbnail; ?>" class="img-responsive" alt="<?php echo $title; ?>">
										</figure>
										<span class="iasd-play"></span>
									</a>
								</div>

							<?php endwhile; ?>
						</div>
					</div>
				</section>

			<?php endif; ?>
		</div>
	</div>

<?php /* else: ?>
	
	<div class="container iasd-tempo-real">
		<section class="row">
			<article class="entry-content">
				<div class="col-md-12">
					<?php the_content(); ?>
				</div>
			</article>
		</section>
	</div>

<?php */ endif; ?>

<!-- MINUTO A MINUTO -->

<div class="container iasd-tempo-real minute-minute">
	<section class="row">
		<article class="entry-content">
			<div class="col-md-8">
				<header>
					<h1 class="iasd-main-title"><?php _e( 'Minuto a minuto', 'iasd' ); ?></h1>
				</header>

				<?php 
				if( get_field('status') == 'waiting' ) { ?>

					<p><?php _e( 'Cobertura ainda não começou.', 'iasd' ); ?></p>

				<?php }else if( (get_field('status') == 'live' || get_field('status') == 'finished')
					 && ! empty( get_field('24liveblog_ID') ) ) { ?>

					<?php if( have_rows('filters') ): ?>
					<div class="threads-filter">
						<p class="label">Filtrar atualizações:</p>
						
						<?php while ( have_rows('filters') ) : the_row(); ?>
							<a href="<?php the_sub_field('text');?>"><?php the_sub_field('text');?></a>
						<?php endwhile; ?>
					</div>
					<?php endif; ?>

					<div id="24lb_thread" class="lb_<?php the_field('24liveblog_ID'); ?>"></div>
					<script type="text/javascript">
					(function() {
					var lb24 = document.createElement('script'); 
						lb24.type = 'text/javascript'; 
						lb24.id = '24lbScript'; 
						lb24.async = true; 
						lb24.charset="utf-8";
						lb24.src = '//v.24liveblog.com/embed/24.js?id=<?php the_field('24liveblog_ID'); ?>';
					(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(lb24);})();
					</script>

				<?php }else{ ?>

					<p><?php _e( 'Sem informações neste momento.', 'iasd' ); ?></p>
					
				<?php } ?>

				<?php if ( comments_open() ) { ?>
				<section class="comments">
					<?php comments_template(); ?>
				</section>
				<?php } ?>
			</div>
			<div class="col-md-4">
				<?php do_action('iasd_dynamic_sidebar', 'minuto-a-minuto'); ?>
			</div>
		</article>
	</section>
</div>

<!-- RESUMO -->

<?php if( have_rows('resumo') ): ?>

	<div class="container iasd-tempo-real resuming">
		<div class="row">
			<div class="entry-content">
				<div class="col-md-8">
					<header>
						<h1 class="iasd-main-title"><?php _e( 'Resumos', 'iasd' ); ?></h1>
					</header>

					<?php while ( have_rows('resumo') ) : the_row(); ?>
				        <div class="resumo-item">
				        	<p class="tag"><?php the_sub_field('tax'); ?></p>
				        	<h2><?php the_sub_field('title'); ?></h2>
				        	<?php the_sub_field('content'); ?>
				        </div>
				    <?php endwhile; ?>
				</div>
			</div>
		</div>
	</div>

<?php endif; ?>

<!-- *************************** -->
<!-- ******* End Content ******* -->
<!-- *************************** -->

<?php get_footer('tempo-real'); ?>