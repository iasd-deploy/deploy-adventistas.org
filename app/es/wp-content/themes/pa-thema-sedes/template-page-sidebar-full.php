<?php

	/* Template name: Página com sidebar full */

	get_header(); 
	if(have_posts())
		the_post();
?>
<!-- *************************** -->
<!-- ********* Content ********* -->
<!-- *************************** -->
<div class="container">
	<div class="row">
		<?php do_action('iasd_dynamic_sidebar', 'sidebar-full'); ?>
    </div>
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