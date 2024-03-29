<?php
	
	/* Template name: Página - 100 anos EGW INTERNA */

	get_header("100-egw"); 
	if(have_posts())
		the_post();
?>
<!-- *************************** -->
<!-- ********* Content ********* -->
<!-- *************************** -->

<section class="pg_interna">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php the_content(); ?>
			</div>
		</div>
	</div>
</section>

<!-- *************************** --> 
<!-- ******* End Content ******* --> 
<!-- *************************** -->
<?php if ( !comments_open() ) { ?>
<section class="disqus">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 class="iasd-main-title"><?php _e( 'Deixe seu comentário', 'iasd' );?></h1>
				<?php comments_template(); ?>
			</div>
		</div>
	</div>
</section>
<?php } ?>

<?php get_footer("100-egw"); ?>
