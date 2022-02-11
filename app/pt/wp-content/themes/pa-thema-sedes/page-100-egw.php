<?php
	
	/* Template name: Página - 100 anos EGW */

	get_header("100-egw"); 
	if(have_posts())
		the_post();
?>
<!-- *************************** -->
<!-- ********* Content ********* -->
<!-- *************************** -->
<section class="videos_semana">
	<div class="container">
		<div class="row text-center">
			<?php _e( '<h1>Vídeos da Semana <small>Descubra, semana a semana, curiosidades e fatos interessantes sobre a vida de Ellen G. White.</small></h1>', 'iasd' );?>
			<?php 
				$loop = new WP_Query( array( 'post_type' => 'post', 'category_name' => 'videos-ewg', 'posts_per_page' => 2 ) ); 
				while ( $loop->have_posts() ) : $loop->the_post(); 
			?>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>">
					<figure>
						<?php the_post_thumbnail('thumb_740x475', array('class' => 'img-responsive')); ?>
						<figcaption>
							<div>
								<h2><?php the_title(); ?> <?php if (get_the_tag_list()) { ?> <small>por: <?php echo strip_tags(get_the_tag_list('',', ','')); ?></small> <?php } ?></h2>
							</div>
						</figcaption>
					</figure>
				</a>
			</div>
			<?php 
				$exclude[] = get_the_ID();

				endwhile; 
				wp_reset_query(); 
			?>

		</div>
	</div>	
</section>

<section class="videos">
	<div class="container">
		<div id="videos" class="row text-center">
			<?php _e( '<h1>Mais vídeos <small>Não deixe de conhecer sobre o dom de Profecia na Igreja Adventista do 7° Dia.</small></h1>', 'iasd' );?>
			<?php 
				$loop = new WP_Query( array( 'post_type' => 'post', 'category_name' => 'videos-ewg', 'posts_per_page' => 80, 'post__not_in' => $exclude ) ); 
				while ( $loop->have_posts() ) : $loop->the_post(); 
			?>
			<div class="video col-md-4 col-sm-4 col-xs-12">
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>">
					<figure>
						<?php the_post_thumbnail('thumb_460x200', array('class' => 'img-responsive')); ?>
						<figcaption>
							<div>
								<h2><?php the_title(); ?> <?php if (get_the_tag_list()) { ?> <small>por: <?php echo strip_tags(get_the_tag_list('',', ','')); ?></small> <?php } ?></h2>
							</div>
						</figcaption>
					</figure>
				</a>
			</div>
			<?php 
				endwhile; 
				wp_reset_query(); 
				unset($exclude);
			?>
		</div>
	</div>	
</section>

<!-- *************************** --> 
<!-- ******* End Content ******* --> 
<!-- *************************** -->
<?php if ( !comments_open() ) { ?>
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

<?php get_footer("100-egw"); ?>
