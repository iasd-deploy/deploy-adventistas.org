<?php
	
	/* Template name: Página - 10 Dias de Oração */

	get_header("10-dias-oracao"); 
	if(have_posts())
		the_post();
?>
<!-- *************************** -->
<!-- ********* Content ********* -->
<!-- *************************** -->
<?php 
	$content = get_the_content(); 
	echo $content;
?>

<?php if ( comments_open() ) { ?>
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
<!-- *************************** --> 
<!-- ******* End Content ******* --> 
<!-- *************************** -->

<?php get_footer("10-dias-oracao"); ?>
