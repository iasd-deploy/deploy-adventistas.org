<?php
	get_header(); 
	if(have_posts())
		the_post();
?>
<!-- *************************** -->
<!-- ********* Content ********* -->
<!-- *************************** -->
<div class="container content">
	<section class="row">
		<article class="col-md-12 entry-content">
			<header>
				<h1 class="iasd-main-title"><?php single_post_title(); ?></h1>
				<div class="sharing-links">
					<?php do_action('sharing_links'); ?>
				</div>
			</header>
			<div>
				<?php the_content(); ?>
			</div>
			<?php if ( comments_open() || get_comments_number() ) comments_template(); ?>
		</article>
	</section>
</div>

<!-- *************************** -->
<!-- ******* End Content ******* -->
<!-- *************************** -->

<?php get_footer(); ?>