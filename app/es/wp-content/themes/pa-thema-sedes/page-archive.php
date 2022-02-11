<?php

	/* Template name: Página Archive */

	get_header('special-pages'); 
?>
<!-- *************************** -->
<!-- ********* Content ********* -->
<!-- *************************** -->

<section class="special-pages">
	<div class="container">
		<div class="row">
			<div class="col-md-12 entry-content">
				<article>
					<header>
						<h1 class="text-center"><?php single_post_title(); ?></h1>
					</header>

					<div class="pages">
					<?php 
					
					$postid = get_the_ID();
					$the_query = new WP_Query( array( 'post_type' => 'page', 'post_parent' => $postid, 'posts_per_page' => 24, 'orderby' => 'date', 'order' => 'DESC' ) ); ?>

					<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
						<div class="page col-sm-4 iasd-post-list-item-ajax">
							<a href="<?php the_permalink() ?>" title="<?php _e('Clique para ler o artigo completo', 'iasd'); ?>">
								<figure>
									<?php the_post_thumbnail('thumb_346x222', array('class' => 'img-responsive')); ?>
									<figcaption><h2 class="text-center"><?php the_title(); ?></h2></figcaption>
								</figure>
							</a>
						</div>
					<?php endwhile; ?>
					</div>
				</article>
			</div>
		</div>
	</div>
</section>
<!-- *************************** -->
<!-- ******* End Content ******* -->
<!-- *************************** -->
<?php get_footer(); ?>