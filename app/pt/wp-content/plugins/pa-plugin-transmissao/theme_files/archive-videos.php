<?php get_header(); ?>

<!-- *************************** -->
<!-- ********* Content ********* -->
<!-- *************************** -->

<section>
	<div class="container">
		<div class="row iasd-archive">
			<article class="col-xs-12">
				<h1 class="iasd-main-title"><?php _e( 'Vídeos', 'iasd' );?></h1>
				<div class="row xs-landscape iasd-post-list-ajax" data-page="<?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>" data-pages="<?php echo $wp_query->max_num_pages; ?>">
					<?php 
						if ( have_posts() ) {
							while ( have_posts() ) {
								the_post(); 
					?>
					<div class="video highlight-excerpt col-sm-4 iasd-post-list-item-ajax">
						<a href="<?php the_permalink() ?>" title="<?php _e('Clique para ver o vídeo', 'iasd'); ?>">
							<figure>
								<?php the_post_thumbnail('thumb_346x222', array('class' => 'img-responsive')); ?>
							</figure>
							<h2><?php the_title(); ?></h2>
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
			</article>
		</div>
	</div>
</section>

<!-- *************************** -->
<!-- ******* End Content ******* -->
<!-- *************************** -->

<?php get_footer(); ?>
