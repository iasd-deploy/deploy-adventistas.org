<?php get_header(); ?> 

<!-- *************************** -->
<!-- ********* Content ********* -->
<!-- *************************** -->

<div class="container">
	<section class="row iasd-archive iasd-pressroom">
		<!-- <aside class="col-sm-4 col-xs-12 float-right mar-bot-50-xs mar-top-0-xs iasd-aside">
			<h1 class="iasd-main-title visible-xs"><?php _e('Sala de Imprensa', 'iasd'); ?></h1>
			<div class="clearfix visible-xs"></div> 
			<?php //do_action('iasd_dynamic_sidebar', 'galeria-de-imagens-topo'); ?>
		</aside> -->
		<div class="clearfix visible-xs"></div>
		<article class="col-sm-8">
			<header>
				<h1><span class="hidden-xs"><?php _e('Galeria de ', 'iasd'); ?></span><?php _e('Imagens', 'iasd'); ?></h1>
			</header>
			<div class="row xs-landscape">
				<?php 
					if ( have_posts() ) {
						while ( have_posts() ) {
							the_post(); 
				?>				
				<a href="<?php the_permalink() ?>" title="Clique para visualizar galeria <?php the_title(); ?>">
					<div class="col-md-4 col-sm-6 iasd-gallery-item">
						<figure class="img-rounded">
							<?php the_post_thumbnail('thumb_220x220', array('class' => 'img-responsive')); ?>
						</figure>							
						<h2><?php the_title(); ?></h2>
						<h3><?php the_time('j \d\e F \d\e Y'); ?></h3>
						<?php 
							$attachments = get_children( array( 'post_parent' => $post->ID ) );
							$count = count( $attachments );
							if($count == 0){
								$msg = __('Sem fotos', 'iasd');
							} else if($count == 1) {
								$msg = __('1 foto', 'iasd');
							} else{
								$msg = $count.' '.__('fotos', 'iasd');
							}
						?>
						<em><?php echo $msg ?></em>
					</div>
				</a>
				<?php			
						} // end while
					} // end if
				?>				
			</div>
		</article>
		<div class="col-md-4">
			<div class="row">
				<?php do_action('iasd_dynamic_sidebar', 'galeria-de-imagens-lateral'); ?>
			</div>
		</div>

	</section>

</div>

<!-- *************************** -->
<!-- ******* End Content ******* -->
<!-- *************************** -->

<?php get_footer(); ?>