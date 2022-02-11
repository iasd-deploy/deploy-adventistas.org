<?php

	/* Template name: Imprensa */

	get_header(); 
	if(have_posts())
		the_post();
?>
<!-- *************************** -->
<!-- ********* Content ********* -->
<!-- *************************** -->
<div class="container content">
	<section class="row iasd-archive">
		<article class="<?php if ( is_active_sidebar( 'pages_imprensa_lateral' ) ) { ?> col-md-8 <?php } else { ?> col-md-12 <?php } ?> entry-content">
			<header>
				<h1 class="iasd-main-title"><?php single_post_title(); ?></h1>
			</header>
			<div>
				<?php the_content(); ?>
			</div>
			<?php if ( comments_open() || get_comments_number() ) comments_template(); ?>
		</article>
	<?php if ( is_active_sidebar( 'pages_imprensa_lateral' ) ) : ?>
		<aside class="col-md-4 visible-md visible-lg iasd-aside">
			<?php dynamic_sidebar( 'pages_imprensa_lateral' ); ?>
		</aside>
	<?php endif; ?>	
	</section>
</div>
<!-- *************************** -->
<!-- ******* End Content ******* -->
<!-- *************************** -->

<?php get_footer(); ?>