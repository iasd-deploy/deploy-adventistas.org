<?php
	get_header(); 

	if(have_posts())
		the_post();
	
		$thumb_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
		$content = get_the_content();
		$content = strip_tags($content);
?>
<!-- *************************** -->
<!-- ********* Content ********* -->
<!-- *************************** -->
<div class="container">
	<section class="row">
		<article class="col-sm-12 entry-content">
			<header>
				<time><?php the_time('j \d\e F \d\e Y'); ?></time>
				<h1><?php single_post_title(); ?></h1>
				<div class="sharing-links">
					<?php do_action('sharing_links'); ?>
				</div>
			</header>
			<div class="item-content">
				<?php the_content(); ?>
			</div>
			<figure class="item">
				<?php echo the_post_thumbnail('pa_cpt-single-infographic', array('class' => 'img-responsive')); ?>
				<figcaption class="text-center">
					<a class="icon icon_download" href="<?php echo $thumb_url; ?>" role="button" target="_blank" title="<?php _e( 'Faça download do infográfico', 'pa-cpt' ); ?>" download></a>
					<a class="icon icon_facebook popup" href="http://www.facebook.com/sharer.php?u=<?php echo get_permalink(); ?>" role="button" target="_blank" title="<?php _e( 'Compartilhe esse infográfico no Facebook', 'pa-cpt' ); ?>"></a>
					<a class="icon icon_twitter popup" href="https://twitter.com/intent/tweet?url=<?php echo get_permalink(); ?>&amp;text=<?php single_post_title(); ?>&amp;via=iasd" title="<?php _e( 'Compartilhe esse infográfico no Twitter', 'pa-cpt' ); ?>"></a>
					<a class="icon icon_pinterest popup" href="//www.pinterest.com/pin/create/button/?url=<?php echo $thumb_url; ?>&media=<?php echo $thumb_url; ?>&description=<?php echo $content; ?>" data-pin-do="buttonPin" data-pin-config="beside" title="<?php _e( 'Compartilhe esse infográfico no Pinterest', 'pa-cpt' ); ?>"></a>
				</figcaption>
			</figure>

			<hr class="iasd-footer-top">
			<footer>
				<?php if(function_exists('wp_related_posts')) wp_related_posts(); ?>
				<div class="clearfix"></div>
				
				<?php if ( comments_open() || get_comments_number() ) comments_template(); ?>
				<?php do_action('iasd_disqus_javascript'); ?>
			</footer>
		</article>
	</section>
</div>

<!-- *************************** -->
<!-- ******* End Content ******* -->
<!-- *************************** -->

<?php get_footer(); ?>