<?php
/*
Template Name: Archives
*/
get_header();
global $wp_query;
$term = get_queried_object();
$archive_title = __('Artigos de', 'iasd');
if($term)
	$archive_title = '<span class="hidden-xs">'.__('Artigos de', 'iasd') . ' </span>' . $term->name;

?> 

<!-- *************************** -->
<!-- ********* Content ********* -->
<!-- *************************** -->

<div class="container">
	<section class="row iasd-archive">
		<article class="col-xs-12">
			<header>
				<h1><?php echo apply_filters('archive_title', $archive_title); ?></h1>
			</header>
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
										<figcaption class="post-taxonomy-tag"><span><?php echo get_post_type_object(get_post_type())->label; ?></span></figcaption>
									</figure>
									<time><?php the_time('j \d\e F \d\e Y'); ?></time>
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
		</article>
	</section>
</div>

<!-- *************************** -->
<!-- ******* End Content ******* -->
<!-- *************************** -->

<?php get_footer(); ?>