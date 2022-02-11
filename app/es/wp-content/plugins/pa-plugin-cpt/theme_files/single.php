<?php
	get_header(); 

	if(have_posts())
		the_post();

		$_pa_card_fb_url = get_post_meta( $post->ID, '_pa_cards_fb_url', true );
		$_pa_card_thumb_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
		$_pa_card_content = get_the_content();
		$_pa_card_content = strip_tags($_pa_card_content);

?>
<!-- *************************** -->
<!-- ********* Content ********* -->
<!-- *************************** -->
<div class="container">
	<section class="row">
		<article class="col-sm-8 entry-content">
			<figure class="card">
				<?php echo the_post_thumbnail('pa_cpt-single', array('class' => 'img-responsive')); ?>
				<figcaption class="text-center">
					<a class="icon icon_download" href="<?php echo $_pa_card_thumb_url; ?>" role="button" target="_blank" title="<?php _e( 'Faça download do cartão', 'pa-cards' ); ?>" download></a>
					<a class="icon icon_facebook popup" href="http://www.facebook.com/sharer.php?u=<?php echo $_pa_card_fb_url; ?>" role="button" target="_blank" title="<?php _e( 'Compartilhe esse cartão no Facebook', 'pa-cards' ); ?>"></a>
					<a class="icon icon_twitter popup" href="https://twitter.com/intent/tweet?url=<?php echo $_pa_card_fb_url; ?>&amp;text=<?php echo $_pa_card_content; ?>&amp;via=iasd" title="<?php _e( 'Compartilhe esse cartão no Twitter', 'pa-cards' ); ?>"></a>
					<a class="icon icon_pinterest popup" href="//www.pinterest.com/pin/create/button/?url=<?php echo $_pa_card_thumb_url; ?>&media=<?php echo $_pa_card_thumb_url; ?>&description=<?php echo $_pa_card_content; ?>" data-pin-do="buttonPin" data-pin-config="beside" title="<?php _e( 'Compartilhe esse cartão no Pinterest', 'pa-cards' ); ?>"></a>
				</figcaption>
			</figure>

			<div class="card-content">
				<?php the_content(); ?>
			</div>

			<hr class="iasd-footer-top">
			<footer>
				<?php if(function_exists('wp_related_posts')) wp_related_posts(); ?>
				<div class="clearfix"></div>
				
				<?php if ( comments_open() || get_comments_number() ) comments_template(); ?>
				<?php do_action('iasd_disqus_javascript'); ?>
			</footer>
		</article>
		<aside class="col-sm-4 mar-top-0-xs iasd-aside">
			<?php
				if ( is_active_sidebar( 'pa_cards_single' ) ) dynamic_sidebar( 'pa_cards_single' );
			?>
		</aside>
	</section>
</div>

<!-- *************************** -->
<!-- ******* End Content ******* -->
<!-- *************************** -->

<?php get_footer(); ?>