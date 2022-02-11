<?php
	
	/* Template name: Página - História da Educação */

	//get_header("100-egw"); 

	include 'custom_historia-educacao/header.php';	


	if(have_posts())
		the_post();
?>
<!-- *************************** -->
<!-- ********* Content ********* -->
<!-- *************************** -->
<section class="videos_semana">
	<div class="container">
		<div class="row text-center">
			<?php _e( '<h1>Vídeos da Semana <small>Como surgiu a Educação Adventista?</small></h1>', 'iasd' );?>
			<?php 
				$loop = new WP_Query( array( 'post_type' => 'post', 'category_name' => 'he', 'posts_per_page' => 2 ) ); 
				while ( $loop->have_posts() ) : $loop->the_post(); 
			?>
			<div class="col-md-6 col-sm-6">
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>">
					<figure>
						<?php the_post_thumbnail('thumb_740x475', array('class' => 'img-responsive img-crop')); ?>
						<figcaption>
							<div>
								<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/custom_historia-educacao/img/play.png" class="hidden-sm hidden-xs">
								<h2><?php the_title(); ?></h2>
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


<?php if ( count($exclude) > 1 ) { ?>
<section class="videos">
	<div class="container">
		<div id="videos" class="row text-center">
			<?php _e( '<h1>Mais vídeos <small>Não perca os capítulos anteriores dessa série: História da Educação Adventista</small></h1>', 'iasd' );?>
			<?php 
				$loop = new WP_Query( array( 'post_type' => 'post', 'category_name' => 'he', 'posts_per_page' => 80, 'post__not_in' => $exclude ) ); 
				while ( $loop->have_posts() ) : $loop->the_post(); 
			?>
			<div class="video col-md-4 col-sm-4">
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>">
					<figure>
						<?php the_post_thumbnail('thumb_460x200', array('class' => 'img-responsive img-crop')); ?>
						<figcaption>
							<div>
								<h2><?php the_title(); ?></h2>
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

<?php } ?>

<!-- *************************** --> 
<!-- ******* End Content ******* --> 
<!-- *************************** -->
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

<?php 

include 'custom_historia-educacao/footer.php';	

//get_footer("100-egw");
?>
