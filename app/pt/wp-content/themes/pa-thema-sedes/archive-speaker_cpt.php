<?php
	include 'custom_transmissao/header.php';
?>

<!-- *************************** -->
<!-- ********* Content ********* -->
<!-- *************************** -->


<section>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 class="iasd-main-title"><?php _e( 'Palestrantes', 'iasd' );?></h1>
				<div class="row">
					<?php 
					if ( have_posts() ) {
						while ( have_posts() ) {
							the_post(); 
					?>
					<div class="palestrante text-center col-md-3 col-sm-3">
						<a href="<?php echo get_permalink($post->ID); ?>">
							<figure>
								<?php echo get_the_post_thumbnail( $post_id, 'thumb_124x124', array( 'class' => 'img-circle img-thumbnail' ) ); ?>
								<figcaption><?php the_title( '<h5>', '</h5>' ); ?></figcaption>
							</figure>
						</a>
					</div>
					<?php
							} // end while
						} // end if
					?>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- *************************** -->
<!-- ******* End Content ******* -->
<!-- *************************** -->

<?php 
	include 'custom_transmissao/footer.php';	
?>
