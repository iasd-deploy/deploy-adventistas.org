<?php
/*
Template Name: PA - Cards Archives
*/
get_header();
wp_enqueue_script( 'cards-js', plugins_url('/static/js/script.js', __FILE__), array('jquery'), 1, true );

?> 

<!-- *************************** -->
<!-- ********* Content ********* -->
<!-- *************************** -->

<?php 

$flavour_name = FlavoursController::GetFlavour();

if ( ( $flavour_name == 'iasd-dsa-home' ) && is_post_type_archive( 'pa_cards' ) ) { 

?>
<header class="pa-cpt-header">
	<div class="container">
		<?php _e( '<h1>Chegaram! <br />Compartilhe estes cartões <small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam vitae nulla quis turpis cursus pharetra. Fusce blandit nec tortor sit amet ullamcorper.</small></h1>', 'pa-cpt' ); ?>
	</div>
</header>
<?php 
} 
if ( ( $flavour_name == 'iasd-dsa-home' ) && is_post_type_archive( 'pa_infographics' ) ) { ?>
<!-- <header class="pa-infographics-header">
	<div class="container">
		<?php _e( '<h1>Infográficos<small>Uma maneira simples de entender as coisas</small></h1>', 'pa-cpt' ); ?>
	</div>
</header> -->
<?php } ?>


<div class="content container">
	<section class="row iasd-archive">
		<article class="col-md-12">
			<div class="items row xs-landscape iasd-post-list-ajax" data-page="<?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>" data-pages="<?php echo $wp_query->max_num_pages; ?>">
				<?php 
					if ( have_posts() ) {
						while ( have_posts() ) {
							the_post(); 
							$_pa_card_fb_url = get_post_meta( $post->ID, '_pa_cards_fb_url', true );
							$_pa_card_thumb_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
							$_pa_card_content = get_the_content();
							$_pa_card_content = strip_tags($_pa_card_content);
				?>
				<div class="item col-md-4 iasd-post-list-item-ajax">
					<div class="item-item">
						<figure>
							<a href="<?php the_permalink() ?>">
								<?php echo the_post_thumbnail('pa_cpt-archive', array('class' => 'img-responsive no-lazy')); ?>
							</a>
							<figcaption class="text-center">
								<a class="icon icon_download" href="<?php echo $_pa_card_thumb_url; ?>" role="button" target="_blank" title="<?php _e( 'Faça download do cartão', 'pa-cpt' ); ?>" download></a>
								<a class="icon icon_facebook popup" href="http://www.facebook.com/sharer.php?u=<?php echo $_pa_card_fb_url; ?>" role="button" target="_blank" title="<?php _e( 'Compartilhe esse cartão no Facebook', 'pa-cpt' ); ?>"></a>
								<a class="icon icon_twitter popup" href="https://twitter.com/intent/tweet?url=<?php echo $_pa_card_fb_url; ?>&amp;text=<?php echo $_pa_card_content; ?>&amp;via=iasd" title="<?php _e( 'Compartilhe esse cartão no Twitter', 'pa-cpt' ); ?>"></a>
								<a class="icon icon_pinterest popup" href="//www.pinterest.com/pin/create/button/?url=<?php echo $_pa_card_thumb_url; ?>&media=<?php echo $_pa_card_thumb_url; ?>&description=<?php echo $_pa_card_content; ?>" data-pin-do="buttonPin" data-pin-config="beside" title="<?php _e( 'Compartilhe esse cartão no Pinterest', 'pa-cpt' ); ?>"></a>
							</figcaption>
						</figure>
					</div>
				</div>

				<?php			
						} // end while
					} // end if
				?>
			</div>
			<?php if (($wp_query->max_num_pages > 1) && (get_query_var('paged') < $wp_query->max_num_pages)): ?>
				<a href="<?php echo next_posts($wp_query->max_num_pages, false); ?>" class="btn btn-default btn-block load-more_posts-link" title="<?php _e('Mostrar mais', 'pa-cpt'); ?>"><?php _e('Mostrar mais', 'pa-cpt');?></a>
			<?php endif ?>
		</article>
	</section>
</div>

<!-- *************************** -->
<!-- ******* End Content ******* -->
<!-- *************************** -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&appId=579965948739249&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<?php get_footer(); ?>
