<?php
get_header();
global $wp_query;
?> 

<!-- *************************** -->
<!-- ********* Content ********* -->
<!-- *************************** -->

<div class="container">
	<section class="row iasd-archive">
		<article class="col-md-12">
			<header>
				<h1><?php _e('Testemunhos', 'iasd'); ?></h1>
			</header>
			<ul class="iasd-post-list-ajax" data-page="<?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>" data-pages="<?php echo $wp_query->max_num_pages; ?>">
				<?php 
					if ( have_posts() ) {
						while ( have_posts() ) {
							the_post(); 
				?>

							<li class="iasd-post-list-item-ajax">
								<a href="<?php the_permalink() ?>" title="<?php _e('Clique para ler o artigo completo', 'iasd'); ?>">
									<figure class="hidden-xs">
										<?php the_post_thumbnail('thumb_140x90'); ?>
									</figure>
									<div class="info">
										<time><?php the_time('j \d\e F \d\e Y'); ?></time>
										<h2><?php the_title(); ?></h2>
										<p class="hidden-xs"><?php echo get_the_excerpt(); ?></p>
									</div>
								</a>
							</li>

				<?php			
						} // end while
					} // end if
				?>
			</ul>
			<?php if (($wp_query->max_num_pages > 1) && (get_query_var('paged') < $wp_query->max_num_pages)): ?>
				<a href="<?php echo next_posts($wp_query->max_num_pages, false); ?>" class="btn btn-default btn-block load-more_posts-link" title="<?php _e('Mostrar mais', 'iasd'); ?>"><?php _e('Mostrar mais', 'iasd'); ?></a>
			<?php endif ?>
		</article>
	</section>
</div>

<!-- *************************** -->
<!-- ******* End Content ******* -->
<!-- *************************** -->

<?php get_footer(); ?>