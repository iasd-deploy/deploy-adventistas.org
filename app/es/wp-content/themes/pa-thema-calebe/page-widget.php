<?php
/*
Template Name: Página - Widget
*/
	get_header(); 
	if(have_posts())
		the_post();
?>
<!-- *************************** -->
<!-- ********* Content ********* -->
<!-- *************************** -->
<div class="container content">
	<section class="row">
		<article class="col-md-8 entry-content">
		<?php if ( is_active_sidebar( 'pages_widget' ) ) : ?>
			<aside class="iasd-aside">
				<?php dynamic_sidebar( 'pages_widget' ); ?>
			</aside>
		<?php endif; ?>
		</article>
		<article class="col-md-4 visible-md visible-lg iasd-aside">
		<?php if ( is_active_sidebar( 'pages_widget_sidebar' ) ) : ?>
			<aside class="iasd-aside">
				<?php dynamic_sidebar( 'pages_widget_sidebar' ); ?>
			</aside>
		<?php endif; ?>
		</article>
	</section>
</div>

<!-- *************************** -->
<!-- ******* End Content ******* -->
<!-- *************************** -->

<?php get_footer(); ?>