<?php

/* Template name: Home - Impacto Esperança */

get_header();
?>
<section id="projects" class="projects p_1">
	<div class="bg">
		<div class="container">
			<div class="row">
				<div class="p_projects col-md-12">
					<h1 class="section_title text-center"><?php _e('Projetos', 'impacto'); ?></h1>
					<?php 
						$loop = new WP_Query( array( 'post_type' => 'project_cpt', 'posts_per_page' => 4, 'orderby' => 'menu_order', 'order'  => 'ASC' ) ); 
						while ( $loop->have_posts() ) : $loop->the_post(); 
						$slug = $post->post_name;
						$i++;
					?>
					<div class="col-md-3 col-sm-3"><a class="p_select" data-target="<?php echo $slug; ?>" rel="<?php echo $slug; ?>" data-bg="p_<?php echo $i; ?>"><?php the_post_thumbnail('thumb_205x150', array('class' => 'img-rounded img-responsive')); ?></a></div>
					<?php 
						endwhile; 
						wp_reset_query(); 
					?>
				</div>
			</div>
		</div>
	</div>
	<?php 
		$loop = new WP_Query( array( 'post_type' => 'project_cpt', 'posts_per_page' => 4, 'orderby' => 'menu_order', 'order'  => 'ASC' ) ); 
		while ( $loop->have_posts() ) : $loop->the_post(); 

		$slug = $post->post_name;
		$date = get_field('data');
	?>
	<div class="project <?php echo $slug; ?> container">
		<div class="row">		
			<h2 class="p_title text-center"><?php the_title(); ?></h2>
			<div class="col-md-8 col-sm-8">
				<div class="content"><?php the_content(); ?></div>

			<?php 
				if ($slug == 'feira-de-saude') {
					$hasposts = get_posts( array('post_type' => 'feira_videos-cpt', 'posts_per_page' => -1) );
					if ($hasposts) {
			?>

				<div class="video_gallery widget row">
					<h1><?php _e('Vídeos', 'impacto'); ?></h1>
					<?php 
						$loop_videos = new WP_Query( array( 'post_type' => 'feira_videos-cpt', 'posts_per_page' => 4, 'orderby' => 'rand', ) ); 
						while ( $loop_videos->have_posts() ) : $loop_videos->the_post(); 
					?>
					<div class="video col-md-3 col-sm-3"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumb_205x150', array('class' => 'img-responsive')); ?></a></div>
					<?php 
						endwhile; 
						wp_reset_query(); 
					?>
					<div class="clearfix"></div>
					<div class="see_more col-md-12">
						<a href="<?php echo get_post_type_archive_link( 'feira_videos-cpt'); ?>" class=""><?php _e('Veja mais vídeos', 'impacto'); ?> »</a>
					</div>
				</div>
			<?php 
					} //endif 
				} //endif ?>
			</div>
			<div class="col-md-4 col-sm-4 mar-top-0-xs iasd-aside">
				<div class="w_date text-center">
					<h3><span class="icon"></span><?php _e('Data Sugerida', 'impacto'); ?></h3>
					<span class="date"><?php echo $date; ?></span>
				</div>

				<?php 
				switch ($slug) {
					case 'viva-com-esperanca':
						$sidebar = 'viva-sidebar';
						break;
					case 'passos-que-salvam':
						$sidebar = 'passos-que-salvam';
						break;
					case 'feira-de-saude':
						$sidebar = 'feira-sidebar';
						break;
					case 'mexa-se-pela-vida':
						$sidebar = 'mexase-sidebar';
						break;
				}

				?>

				<div class="widgets">
					<?php
						if( have_rows('outros_formatos') ){
					?>
					<div class="widget formatos">
						<h1><?php _e('Outros Formatos', 'impacto'); ?></h1>
						<div class="btns">
						<?php
							while ( have_rows('outros_formatos') ) : the_row();
						?>
							<a class="btn btn-warning" href="<?php the_sub_field('url'); ?>" role="button" target="<?php the_sub_field('target'); ?>"><?php the_sub_field('formato'); ?></a>
					
						<?php
							endwhile;
						?>
						</div>
					</div>
					<?php

					}
					?>	
				<?php if ( is_active_sidebar( $sidebar ) ) : ?>	
					<?php dynamic_sidebar( $sidebar ); ?>
				<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	<?php 
		endwhile; 
		wp_reset_query(); 
	?>
</section>

<section id="photos" class="photos">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 class="section_title text-center"><?php _e('Galeria de Fotos', 'impacto'); ?></h1>
				<div id="links">
					<?php 
						$loop = new WP_Query( array( 'post_type' => 'photo_cpt', 'posts_per_page' => 28 ) ); 
						while ( $loop->have_posts() ) : $loop->the_post(); 
						$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
					?>
					<a href="<?php echo $url; ?>" data-gallery class="photo" title="<?php the_field('author'); ?>" data-description="<?php the_field('texto'); ?>">
						<?php the_post_thumbnail('thumb_124x124', array('class' => '')); ?>
					</a>
					<?php 
						endwhile; 
						wp_reset_query(); 
					?>
				</div>
				<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
					<!-- The container for the modal slides -->
					<div class="slides"></div>
					<!-- Controls for the borderless lightbox -->
					<h3 class="title"></h3>
					<a class="prev">‹</a>
					<a class="next">›</a>
					<a class="close">×</a>
					<a class="play-pause"></a>
				</div>
			</div>
		</div>
	</div>
</section>

<section id="histories" class="histories">
	<div class="container">
		<div class="row">
			<h1 class="section_title text-center"><?php _e('Histórias de Esperança', 'impacto'); ?></h1>
			<div class="col-md-8">
				<div class="row last-history">
					<?php 
						$loop = new WP_Query( array( 'post_type' => 'post', 'category_name' => 'he', 'posts_per_page' => 1 ) ); 
						while ( $loop->have_posts() ) : $loop->the_post(); 
					?>
					<div class="col-md-4 col-sm-4 col-xs-12 text-center">
						<figure>
							<?php the_post_thumbnail('thumb_400x400', array('class' => 'img-responsive img-thumbnail')); ?>
							<figcaption>
								<strong class="autor"><?php the_field('autor'); ?></strong>
								<span class="city"><?php the_field('cidade'); ?></span>
							</figcaption>
						</figure>
					</div>
					<div class="col-md-8 col-sm-8">
						<div>
							<h2><?php the_title(); ?></h2>
							<div class="content">
								<?php the_content(); ?>
							</div>
						</div>
					</div>
					<?php 
						$exclude[] = get_the_ID();
						endwhile; 
						wp_reset_query(); 
					?>

				</div>
			</div>
			<div class="col-md-4 widget">
				<h1><?php _e('Histórias de Esperança', 'impacto'); ?></h2>
				<div class="row">
					<div class="other_histories">
						<?php 
							$loop = new WP_Query( array( 'post_type' => 'post', 'category_name' => 'he', 'posts_per_page' => 5, 'post__not_in' => $exclude ) ); 
							while ( $loop->have_posts() ) : $loop->the_post(); 
						?>
						<div class="history col-md-12">
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>">
								<figure>
									<?php the_post_thumbnail('thumb_95x95', array('class' => 'img-responsive img-thumbnail image')); ?>
									<figcaption class="meta">
										<strong class="title"><?php the_title(); ?></strong>
										<span class="meta"><?php the_field('autor'); ?> - <?php the_field('cidade'); ?></span>
									</figcaption>
								</figure>
							</a>
						</div>
						<?php 
							endwhile; 
							wp_reset_query(); 
							unset($exclude);
						?>
						<div class="clearfix"></div>
						<div class="see_more col-md-12">
							<a href="<?php echo site_url(); ?>/he/" class=""><?php _e('Veja mais histórias', 'impacto'); ?> »</a>
						</div>
					</div>
				</div>
				<!-- <a href="#" class="send_history btn btn-danger btn-lg" data-toggle="modal" data-target="#myModal"><?php _e('Envie sua história', 'impacto'); ?></a> -->
				<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title" id="myModalLabel"><?php _e('Envie Sua História', 'impacto'); ?></h4>
							</div>
							<div class="modal-body">
								<?php echo do_shortcode( '[contact-form-7 title="Envio de Histórias"]' );?>
							</div>
							<!-- <div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
								<button type="button" class="btn btn-danger">Enviar</button>
							</div> -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section id="timeline" class="timeline">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 class="section_title text-center"><?php _e('Impacto Esperança - Anos Anteriores', 'impacto'); ?></h1>
				<ul class="timeline-slider list-unstyled">
					<?php 
						$loop = new WP_Query( array( 'post_type' => 'books_cpt', 'posts_per_page' => 8, 'meta_key' => 'ano', 'orderby' => 'meta_value_num', 'order' => 'ASC' ) ); 
						while ( $loop->have_posts() ) : $loop->the_post(); 
					?>
					<li class="t_livro text-center" data-target="y_<?php the_field('ano'); ?>">
						<span><?php the_field('ano'); ?></span>
						<?php the_post_thumbnail('thumb_100x150', array('class' => 'img-rounded')); ?>
					</li>
					<?php 
						endwhile; 
						wp_reset_query(); 
					?>
				</ul>
			</div>
		</div>
		<?php 
			$loop = new WP_Query( array( 'post_type' => 'books_cpt', 'posts_per_page' => 8, 'meta_key' => 'ano', 'orderby' => 'meta_value_num', 'order' => 'ASC' ) ); 
			while ( $loop->have_posts() ) : $loop->the_post(); 
		?>
		<div class="livro row y_<?php the_field('ano'); ?>">
			<div class="col-md-8 col-md-offset-2">
				<div class="row">
					<div class="thumb col-md-4 col-sm-5">
						<?php the_post_thumbnail('thumb_300x450', array('class' => 'img-responsive img-rounded')); ?>
					</div>
					<div class="infos col-md-8 col-sm-7">
						<h2><?php the_field('ano'); ?> - <?php the_title(); ?></h2>
						<?php if ( get_field('entregues-rua') ) { ?><p><span><?php  echo number_format(get_field('entregues-rua'),0,"","."); ?></span> <?php _e('Livros Entregues', 'impacto'); ?></p><?php } //endif ?>
						<?php if ( get_field('entregues-internet') ) { ?><p><span><?php  echo number_format(get_field('entregues-internet'),0,"",".");  ?></span> <?php _e('Livros Lidos na Internet', 'impacto'); ?></p><?php } //endif ?>
						<?php
							if( have_rows('links') ){
						?>
						<div class="widget formatos">
							<div class="btns">
							<?php
								while ( have_rows('links') ) : the_row();
							?>
								<a class="btn btn-default" href="<?php the_sub_field('url'); ?>" role="button" target="<?php the_sub_field('target'); ?>"><?php the_sub_field('formato'); ?></a>
						<?php
							endwhile;
						?>
							</div>
						</div>
						<?php

						}
						?>	
					</div>
				</div>
			</div>
		</div>	
		<?php 
			endwhile; 
			wp_reset_query(); 
		?>
	</div>
</section>

<?php if ( is_active_sidebar( 'sidebar-sidebar' ) ) : ?>	
<section id="sidebar" class="sidebar">
	<div class="container">
		<div class="row">
			<?php dynamic_sidebar( 'sidebar-sidebar' ); ?>
		</div>
	</div>
</section>
<?php endif; ?>

<?php if ( comments_open() ) { ?>
<section class="disqus">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 class="section_title text-center"><?php _e( 'Deixe seu comentário', 'iasd' );?></h1>
				<?php comments_template(); ?>
			</div>
		</div>
	</div>
</section>
<?php } ?>

<?php 
get_footer(); 
?>
