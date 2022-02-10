<?php 
/*
Template Name: Front Page - Coadjuvantes
*/

get_header(); ?>

<section id="videos" class="video_semana">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<h1 class="title"><?php the_field('titulo-estreia'); ?><small><?php the_field('subtitulo-estreia'); ?></small></h1>
				<div class="row">
					<div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1">
						<div class="video-container"><?php the_field('video_destaque-estreia'); ?></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="mais_videos">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<h1 class="title"><?php the_field('titulo-videos'); ?><small><?php the_field('subtitulos-videos'); ?></small></h1>
				<div class="row videos">
				<?php 
					$loop = new WP_Query( array( 'post_type' => 'videos-cpt', 'order' => 'ASC', 'orderby' => 'menu_order' ) ); 
					while ( $loop->have_posts() ) : $loop->the_post(); 

					$cont++;

					if ( get_field('publico') ) { 
				?>
					<div class="col-md-3 col-sm-6 video">
						<a href="https://www.youtube.com/watch?v=<?php the_field('youtube_id'); ?>&autoplay=1" data-rel="lightbox-<?php echo $cont; ?>">
							<?php the_post_thumbnail('thumb_740x475', array('class' => 'img-responsive grayscale')); ?>
							<h3><?php the_title(); ?></h3>
						</a>
					</div>
				<?php } else { ?>
					<div class="col-md-3 col-sm-6 video">
						<?php the_post_thumbnail('thumb_740x475', array('class' => 'img-responsive disable')); ?>
						<h3><?php the_title(); ?></h3>
					</div>
				<?php 
				}
					endwhile;
					wp_reset_query(); 
					unset($cont);
				?>
				</div>
			</div>
		</div>
	</div>
</section>

<section id="coadjuvantes" class="coadjuvantes">
	<div class="container">
		<div class="row">
			<h1 class="title text-center"><?php the_field('titulo-coadjuvantes'); ?><small><?php the_field('subtitulo-coadjuvantes'); ?></small></h1>
			<div class="personagens">
			<?php 
			$loop = new WP_Query( array( 'post_type' => 'post', 'category_name' => 'coadjuvante', 'order'  => 'ASC' ) ); 
			while ( $loop->have_posts() ) : $loop->the_post(); 
				$cont++;
			if ($cont % 2 == 0) { ?>
				<div class="col-md-9 pull-right personagem">
					<div class="row">
						<div class="photo"><?php the_post_thumbnail('thumb_140x140', array('class' => 'img-responsive img-circle')); ?></div>
						<div class="bio">
							<h2><?php the_title(); ?></h2>
							<?php the_content(); ?>
						</div>
					</div>
				</div>
			<?php 
			} else {  
			?>
				<div class="col-md-9 pull-left personagem">
					<div class="row">
						<div class="photo"><?php the_post_thumbnail('thumb_140x140', array('class' => 'img-responsive img-circle')); ?></div>
						<div class="bio text-right">
							<h2><?php the_title(); ?></h2>
							<?php the_content(); ?>
						</div>
					</div>
				</div>
			<?php 
			}  
			endwhile; 
			unset($cont);
			wp_reset_query(); 
			?>
			</div>
		</div>
	</div>
</section>

<section id="sobre" class="sobre">
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1 text-center">
				<h1 class="title"><?php the_field('titulo-sobre'); ?></h1>
				<?php the_field('descricao-sobre'); ?>
			</div>
		</div>
	</div>
</section>

<?php if ( is_active_sidebar( 'front-page-sidebar' ) ) : ?>	
<section class="widgets">
	<div class="container">
		<div class="row">
			<?php dynamic_sidebar( 'front-page-sidebar' ); ?>
		</div>
	</div>
</section>
<?php endif; ?>

<?php if ( comments_open() ) { ?>
<section class="comments">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php comments_template(); ?>
			</div>
		</div>
	</div>
</section>
<?php } ?>

<?php get_footer(); ?>