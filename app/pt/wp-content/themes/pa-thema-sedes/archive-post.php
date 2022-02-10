<?php

/*
Template Name: Blog
*/

get_header();

/*
Não estava em uso
$currentTaxonomy = $wp_query->query_vars['taxonomy'];
$currentTermSlug = get_query_var($currentTaxonomy);
$currentTerm = get_term_by('slug', $currentTermSlug, $currentTaxonomy);
$currentTermName = $currentTerm->name;*/

// FIRST LEVEL QUERY
$args = array(
	'posts_per_page' => 1,
	'tax_query' => array(
		'relation' => 'AND',
		array( 'taxonomy' => 'xtt-pa-destaque', 'field' => 'slug','terms' => 'arquivo-principal')
	)
);
$highlightFirstLevel = new WP_Query( $args );


$highlighIds = array();
for ($i = 0; $i < count($highlightFirstLevel->posts); $i++){
	array_push($highlighIds, $highlightFirstLevel->posts[$i]->ID);
}


?>

<!-- *************************** -->
<!-- ********* Content ********* -->
<!-- *************************** -->

<div class="container">
	<section class="row iasd-archive">
		<article class="col-sm-8">
			<header>
				<h1><?php _e('Blog', 'iasd'); ?></h1>
			</header>
				<div class="iasd-main-highlight">
				<?php
				//THE LOOP FIRST LEVEL HIGHLIGHT
				while ( $highlightFirstLevel->have_posts() ):
					$highlightFirstLevel->the_post();
				?>
					<a href="<?php the_permalink() ?>" title="<?php _e('Clique para ler o artigo completo', 'iasd'); ?>">
						<figure>
							<?php the_post_thumbnail('thumb_720x350'); ?>
						</figure>
						<figcaption>
							<h2><?php the_title(); ?></h2>
							<?php the_excerpt(); ?>
						</figcaption>
					</a>
				<?php
					endwhile;
					wp_reset_query();
				?>					
				</div>
			<h1><?php _e('Últimas Postagens', 'iasd'); ?></h1>
			<ul class="iasd-post-list-ajax" data-page="<?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>" data-pages="<?php echo $wp_query->max_num_pages; ?>">			
<?php
// OTHER POSTS QUERY
global $wp_query;
$args = $wp_query->query_vars;
$args = array_filter($args);
$args['paged'] = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
$args['post__not_in'] = $highlighIds;

$wp_query = new WP_Query( $args );

				while ( have_posts() ):
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
					endwhile;
				?>
			</ul>
			<?php if (($wp_query->max_num_pages > 1) && (get_query_var('paged') < $wp_query->max_num_pages)): ?>
				<a href="<?php echo next_posts($wp_query->max_num_pages, false); ?>" class="btn btn-default btn-block load-more_posts-link" title="<?php _e('Mostrar mais', 'iasd'); ?>"><?php _e('Mostrar mais', 'iasd'); ?></a>
			<?php endif ?>
		</article>
		<aside class="col-sm-4 iasd-aside">
			<?php do_action('iasd_dynamic_sidebar', 'blog'); ?>
		</aside>
	</section>
</div>

<!-- *************************** -->
<!-- ******* End Content ******* -->
<!-- *************************** -->

<?php get_footer(); ?>