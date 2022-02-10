<?php
/*
Template Name: Front Page
*/
get_header();
?>
<div class="container">
	<?php 
		$flavour_name = FlavoursController::GetFlavour();
		if($flavour_name == 'dsa-sedes'):
		$slider_home = array();
			$q = new WP_Query (array ('post_type'=>'slider_home', 'meta_key' => '_thumbnail_id'));
			if($q->have_posts()):
	?>
	<div class="row">
		<div class="iasd-widget iasd-widget-slider col-md-12">
			<h1><?php _e( 'Destaques', 'iasd' ); ?></h1>
			<div class="owl-carousel header">
				<?php
					while($q->have_posts()):
						$q->the_post();
						$slider_home[] = get_the_ID();
						$image_id = get_post_thumbnail_id();
						$image_src = wp_get_attachment_image_src( $image_id, 'thumb_940x415' );
						$image_data = wp_prepare_attachment_for_js( $image_id );
						$image_title = $image_data['title'];
						$url = $url = get_post_meta(get_the_ID(), 'link_veja_mais', true);
				?>
				<div class="slider-item">
					<a href="<?php echo $url; ?>" title="<?php _e('Clique para saber mais', 'iasd'); ?>">
						<figure>
							<img data-src="<?php echo $image_src[0]; ?>" alt="<?php echo $image_title; ?>" class="lazyOwl">
							<figcaption><h2><?php the_title(); ?></h2></figcaption>
						</figure>
					</a>
				</div>
			<?php 
					endwhile; // loop end
			?>
			</div>
		</div>
	</div>
	<?php
			endif; //have_posts end
			wp_reset_query(); 
		endif; //flavour_name end 
	?>

	<?php if(function_exists('get_field') && get_field('enabledisable', 'option')) { ?>

	<div class="row special_banner"> 
		<a href="<?php the_field('link', 'option'); ?>">
			<div class="col-md-6 col-sm-6 texto">
				<?php the_field('texto_1', 'option'); ?>
			</div>
			<div class="col-md-6 col-sm-6 text-right call_action">
				<?php the_field('texto_2', 'option'); ?>
			</div>	
		</a>
	</div>
	<?php } ?>

	<div class="row">
		<?php do_action('iasd_dynamic_sidebar', 'front-page'); ?>
	</div>
</div>
<?php get_footer(); ?>