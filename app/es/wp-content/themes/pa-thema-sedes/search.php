<?php get_header(); ?>
		<!-- *************************** -->
		<!-- ********* Content ********* -->
		<!-- *************************** -->

		<div class="container">
			<section class="row iasd-archive">
				<article class="col-md-12 solr-results">
					<header>
						<h1><?php printf( __( 'Busca: %s', 'iasd' ), get_search_query() ); ?></h1>
					</header>
					<?php if ( have_posts() ) { ?>
					<ol class="row iasd-post-list-ajax" data-page="<?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>" data-pages="<?php echo $wp_query->max_num_pages; ?>">
						<?php				
						while ( have_posts() ) {
							the_post(); 
						?>
					
						<li class="iasd-post-list-item-ajax">
							<a href="<?php the_permalink() ?>" title="Clique para ler o artigo completo">
								<figure class="hidden-xs">
									<?php the_post_thumbnail('thumb_140x90'); ?>
								</figure>
								<div class="info">
									<h2><?php the_title(); ?></h2>
									<p><?php echo apply_filters('trim', get_the_excerpt(), 260); ?></p>
								</div>
							</a>
						</li>
						<?php	} // end while ?>
					</ol>
					<?php if (($wp_query->max_num_pages > 1) && (get_query_var('paged') < $wp_query->max_num_pages)): ?>
						<a href="<?php echo next_posts($wp_query->max_num_pages, false); ?>" class="btn btn-default btn-block load-more_posts-link" title="<?php _e('Mostrar mais', 'iasd'); ?>"><?php _e('Mostrar mais', 'iasd'); ?></a>
					<?php endif ?>					
					<?php } else { ?>
					<div class="row">
						<div class="col-md-12">
							<p>Não encontramos resultados para o termo <em><?php printf( get_search_query() ); ?></em>. Por favor, tente fazer uma busca nova com termos diferentes.</p>
							<hr/>
							<form method="get" action="<?php echo site_url(); ?>?">
								<div class="input-group">
									<input type="text" name="s" class="form-control" placeholder="Insira as palavras-chave aqui">
									<span class="input-group-btn">
										<button class="btn btn-default" type="submit">Buscar</button>
									</span>
								</div>
							</form>
						</div>
					</div>				
					<?php } ?>
				</article>
			</section>
		</div>

		<!-- *************************** -->
		<!-- ******* End Content ******* -->
		<!-- *************************** -->

<?php get_footer(); ?>