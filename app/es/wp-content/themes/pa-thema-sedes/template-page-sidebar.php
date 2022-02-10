<?php

	/* Template name: Página com sidebar */

	get_header(); 
	if(have_posts())
		the_post();
?>
<!-- *************************** -->
<!-- ********* Content ********* -->
<!-- *************************** -->
<div class="container">
	<section class="row">
		<article class="col-md-8 entry-content">
			<header>
				<h1 class="iasd-main-title"><?php single_post_title(); ?></h1>
				<div class="sharing-links">
					<?php do_action('sharing_links'); ?>
				</div>
			</header>
			<?php the_content(); ?>

			<?php if ( comments_open() ) { ?>
			<section class="comments">
				<?php comments_template(); ?>
			</section>
			<?php } ?>		
		</article>
		<aside class="col-md-4 visible-md visible-lg iasd-aside">
			<?php do_action('iasd_dynamic_sidebar', 'page'); ?>
		</aside>		
	</section>
</div>

<!-- *************************** -->
<!-- ******* End Content ******* -->
<!-- *************************** -->

<?php get_footer(); ?>