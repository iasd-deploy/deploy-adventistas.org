<?php
	get_header(); 

	if(have_posts())
		the_post();

	global $post;
	$post_type = get_post_type_object($post->post_type);
	$archive_link = get_post_type_archive_link( $post->post_type );

	$post_title = get_the_title();
	$post_link = get_permalink();

	$attachment_filename = wp_get_attachment_thumb_file( );
	//$attachment_filename[0]
	$attachment_image = wp_get_attachment_image_src( $post->ID, 'orig_size' );
?>

<!-- *************************** -->
<!-- ********* Content ********* -->
<!-- *************************** -->

<div class="container">
	<section class="row">
		<article class="col-md-8 entry-content">
			<header>
				<time><?php the_time('j \d\e F \d\e Y'); ?></time>
				<h1><?php echo $post_title; ?></h1>
			</header>
			<p><img src="<?php echo $attachment_image[0]; ?>" class="img-responsive" /></p>
		</article>
		<aside class="col-md-4 iasd-aside">
			<div class="btn btn-default page-back">
				<a href="javascript:history.back(-1)" title="<?php _e('Clique para voltar para', 'iasd'); ?> <?php echo get_the_title($post->post_parent); ?>"><?php echo get_the_title($post->post_parent); ?></a>
			</div>
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