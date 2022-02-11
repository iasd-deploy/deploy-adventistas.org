<?php
	get_header('internas'); 

	if(have_posts())
		the_post();

	global $post;
	$post_type = get_post_type_object($post->post_type);
	$archive_link = get_post_type_archive_link( $post->post_type );

	$post_title = get_the_title();
	$post_link = get_permalink();
?>
<!-- *************************** -->
<!-- ********* Content ********* -->
<!-- *************************** -->
<div class="container">
	<section class="row">
		<article class="col-sm-8 entry-content">
			<header>
				<time><?php the_time('j \d\e F \d\e Y'); ?></time>
				<h1><?php single_post_title(); ?></h1>
				<div class="sharing-links">
					<?php do_action('sharing_links'); ?>
				</div>
			</header>

			<?php the_content(); ?>

			<hr class="iasd-footer-top">
			<footer>
				<?php /* MARCADORES REMOVIDOS - LOGICA SERA REVISTA (aparecem marcadores repetidos/desnecessários)
				<h2>Marcadores:</h2>
				<nav class="iasd-tags">

					<?php
						$taxonomies = wp_get_object_terms(get_the_ID(), get_taxonomies(array('public' => true)));
						foreach($taxonomies as $taxonomy) :
					?>

							<a href="<?php echo get_term_link($taxonomy); ?>" title="<?php echo $taxonomy->name; ?>"><?php echo $taxonomy->name; ?></a>

					<?php endforeach; ?>

				</nav> */
				?>

				<?php if(function_exists('wp_related_posts')) wp_related_posts(); ?>
				<!-- POSTS RELACIONADOS -->

				<?php do_action('post_navigation'); ?>

				<div class="clearfix"></div>
				
				<?php if ( comments_open() || get_comments_number() ) comments_template(); ?>
				<?php do_action('iasd_disqus_javascript'); ?>
			</footer>
		</article>
		<aside class="col-sm-4 mar-top-0-xs iasd-aside">
			<?php if ( is_active_sidebar( 'single_historias-sidebar' ) ) : ?>	
					<?php dynamic_sidebar( 'single_historias-sidebar' ); ?>
			<?php endif; ?>
		</aside>
	</section>
</div>

<!-- *************************** -->
<!-- ******* End Content ******* -->
<!-- *************************** -->


<!-- *************************** -->
<!--   Begin Return Page Plugin  -->
<!-- *************************** -->
<?php /*
<div class="iasd-plugin-return_page visible-md visible-lg collapsed">
	<a href="#" title="Clique para visualizar o link da página anterior" class="toggle-visibility-link">Esconder</a>
	<a href="#" title="Clique para voltar para <Título da página>" class="page-link">Título da página comprido em várias linhas para assegur...</a>
</div> */ ?>

<!-- *************************** -->
<!--    End Return Page Plugin   -->
<!-- *************************** -->

<?php get_footer(); ?>