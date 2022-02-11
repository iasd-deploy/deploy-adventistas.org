<?php
	get_header('internas'); 
	if(have_posts())
		the_post();
?>
<!-- *************************** -->
<!-- ********* Content ********* -->
<!-- *************************** -->
<div class="container">
	<section class="row">
		<article class="col-md-12 entry-content">
			<header>
				<h1 class="iasd-main-title"><?php single_post_title(); ?></h1>
				<div class="sharing-links">
					<?php do_action('sharing_links'); ?>
				</div>
			</header>
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