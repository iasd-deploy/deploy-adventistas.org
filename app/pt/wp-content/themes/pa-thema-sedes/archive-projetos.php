<?php
/*
Template Name: Projetos
*/
get_header();
?> 

<!-- *************************** -->
<!-- ********* Content ********* -->
<!-- *************************** -->

<div class="container">
	<section class="row iasd-archive">
		<article class="col-md-12 xs-landscape">
			<header>
				<h1><?php _e('Projetos', 'iasd'); ?></h1>
			</header>
			<div class="row">
				<?php 
					if ( have_posts() ) {
						while ( have_posts() ) {
							the_post(); 
				?>
							<div class="col-sm-6 iasd-project-item">
								<a href="<?php the_permalink() ?>" title="<?php _e('Clique para ler o artigo completo', 'iasd'); ?>">
									<?php the_post_thumbnail('thumb_460x200', array('class' => 'img-responsive')); ?>
									<h2><?php the_title(); ?></h2>
									<p><?php echo get_the_excerpt(); ?></p>
								</a>
							</div>

				<?php			
						} // end while
					} // end if
				?>
			</div>
		</article>
	</section>
</div>

<!-- *************************** -->
<!-- ******* End Content ******* -->
<!-- *************************** -->

<?php get_footer(); ?>