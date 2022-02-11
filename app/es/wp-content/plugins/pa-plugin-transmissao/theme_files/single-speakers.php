<?php
	get_header(); 

	if(have_posts())
		the_post();

	global $post;
	$post_type = get_post_type_object($post->post_type);
	$archive_link = get_post_type_archive_link( $post->post_type );

	$post_title = get_the_title();
	$post_link = get_permalink();
?>
<!-- *************************** -->
<!-- ********* Content ********* -->
<!-- *************************** -->
<div class="container">
	<section class="row">
		<article class="col-sm-8 entry-content">
			<header>
				<time><?php the_time('j \d\e F \d\e Y'); ?></time>
				<h1><?php single_post_title(); ?></h1>
				<div class="sharing-links">
					<?php do_action('sharing_links'); ?>
				</div>
			</header>

			<?php the_content(); ?>

			<hr class="iasd-footer-top">
			<footer>
				<?php if(function_exists('wp_related_posts')) wp_related_posts(); ?>
				<!-- POSTS RELACIONADOS -->

				<?php do_action('post_navigation'); ?>

				<div class="clearfix"></div>
				
				<?php if ( comments_open() || get_comments_number() ) comments_template(); ?>
				<?php do_action('iasd_disqus_javascript'); ?>
			</footer>
		</article>
		<aside class="col-sm-4 mar-top-0-xs iasd-aside">
			<?php do_action('iasd_dynamic_sidebar', 'blog'); ?>
		</aside>
	</section>
</div>

<!-- *************************** -->
<!-- ******* End Content ******* -->
<!-- *************************** -->
<?php get_footer(); ?>