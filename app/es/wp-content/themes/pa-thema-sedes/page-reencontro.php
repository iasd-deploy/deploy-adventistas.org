<?php

	/* Template name: Página - Reencontro */

	function custom_style() {
		$file = get_template_directory_uri() . '/custom_reencontro/css/style.css';
		$version = md5( $file );

		wp_enqueue_style( 'reencontro', $file, false, $version );
	}
	add_action( 'wp_enqueue_scripts', 'custom_style', 99999 );

	get_header(); 
	if(have_posts())
		the_post();
?>
<!-- *************************** -->
<!-- ********* Content ********* -->
<!-- *************************** -->
<header class="iasd-institutional-header">
	<div class="container">
		<figcaption>
			<h1><?php single_post_title(); ?></h1>
			<em><?php the_excerpt(); ?></em>
		</figcaption>
	</div>
</header>
<div class="reencontro container">
	<section class="row">
		<article class="col-md-12 entry-content">
			<?php the_content(); ?>
		</article>
	</section>
</div>

<?php if ( comments_open() ) { ?>
<section class="comments">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php comments_template(); ?>
			</div>
		</div>
	</div>
</section>
<?php } ?>

<!-- *************************** -->
<!-- ******* End Content ******* -->
<!-- *************************** -->

<?php get_footer(); ?>