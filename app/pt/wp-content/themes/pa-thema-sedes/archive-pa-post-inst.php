<?php
/*
Template Name: Instituições
*/
get_header();
?> 

<!-- *************************** -->
<!-- ********* Content ********* -->
<!-- *************************** -->

<div class="container">
	<section class="row">
		<article class="col-md-12">
			<div class="row">
				<?php do_action('iasd_dynamic_sidebar', 'archive-instituicao'); ?>
			</div>
		</article>
	</section>
</div>

<!-- *************************** -->
<!-- ******* End Content ******* -->
<!-- *************************** -->

<?php get_footer(); ?>