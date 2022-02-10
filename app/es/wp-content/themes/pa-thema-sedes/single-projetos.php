<?php
	get_header(); 

	if(have_posts())
		the_post();

	global $post;
	$slug = $post->post_name;
	$post_type = get_post_type_object($post->post_type);
	$archive_link = get_post_type_archive_link( $post->post_type );

	$post_title = get_the_title();
	$post_link = get_permalink();
?>

<div class="container">
	<section class="row">
		<article class="col-md-12 entry-content">
			<header>
				<h1 class="iasd-main-title"><?php single_post_title(); ?></h1>
			</header>
			<?php the_content(); ?>
			<hr style="margin-bottom: -1px;">
		</article>
		<?php 
		$sidebar = is_active_sidebar('projeto-'.$slug);
		if($sidebar == true){
		?>
			<div class="col-xs-12 mar-top-50">
				<div class="row">
				<?php do_action('iasd_dynamic_sidebar', 'projeto-'.$slug); ?>
				</div>
			</div>
		<?php } ?>
	</section>
	<?php do_action('post_navigation'); ?>
</div>

<?php get_footer(); ?>