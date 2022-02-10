<?php

	/* Template name: Página - Visual Composer */

	get_header("visual-composer"); 
	if(have_posts())
		the_post();
?>
<!-- *************************** -->
<!-- ********* Content ********* -->
<!-- *************************** -->
<div class="container">
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