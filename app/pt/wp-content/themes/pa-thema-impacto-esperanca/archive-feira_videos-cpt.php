<?php
/*
Template Name: Archives
*/
get_header('internas');
global $wp_query;

?> 

<!-- *************************** -->
<!-- ********* Content ********* -->
<!-- *************************** -->
<section>
	<div class="container">
		<div class="row iasd-archive">
			<h1 class="section_title text-center"><?php _e('Vídeos - Feira de Saúde', 'impacto'); ?></h1>
			<div class="col-md-12">
				<div class="row xs-landscape iasd-post-list-ajax" data-page="<?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>" data-pages="<?php echo $wp_query->max_num_pages; ?>">
					<?php 
						if ( have_posts() ) {
							while ( have_posts() ) {
								the_post(); 
					?>

					<div class="highlight-excerpt col-sm-4 iasd-post-list-item-ajax">
						<a href="<?php the_permalink() ?>" title="<?php _e('Clique para ler o artigo completo', 'iasd'); ?>">
							<figure>
								<?php the_post_thumbnail('thumb_346x222', array('class' => 'img-responsive')); ?>
							</figure>
							<h2><?php the_title(); ?></h2>
							<p><?php echo get_the_excerpt(); ?></p>
						</a>
					</div>

					<?php			
							} // end while
						} // end if
					?>
				</div>
				<?php if (($wp_query->max_num_pages > 1) && (get_query_var('paged') < $wp_query->max_num_pages)): ?>
					<a href="<?php echo next_posts($wp_query->max_num_pages, false); ?>" class="btn btn-default btn-block load-more_posts-link" title="<?php _e('Mostrar mais', 'iasd'); ?>"><?php _e('Mostrar mais', 'iasd');?></a>
				<?php endif ?>
			</div>
		</div>
	</div>
</section>

<!-- *************************** -->
<!-- ******* End Content ******* -->
<!-- *************************** -->

<?php get_footer(); ?>