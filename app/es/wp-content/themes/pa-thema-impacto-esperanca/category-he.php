<?php
get_header('internas');
?>
<section>
	<div class="container">
		<div class="row">
			<h1 class="section_title text-center">Histórias de Esperança</h1>
			<ul class="history-list js-masonry" data-masonry-options='{ "itemSelector": ".col-md-3" }'>
			<?php 
				if ( have_posts() ) {
					while ( have_posts() ) {
						the_post(); 
			?>

				<li class="col-md-3 col-sm-4">
					<a href="<?php echo get_permalink(); ?>" class="history-item">
						<?php the_post_thumbnail( 'thumb_290x220', array( 'class' => 'img-responsive' ) ); ?>
						<div class="history-item-inner">
							<h3><?php the_title(); ?></h3>
							<strong><?php echo get_field( 'autor' ); ?></strong>
							<span><?php echo get_field( 'cidade' ); ?></span>
						</div>
					</a>
				</li>

			<?php
					}
				}
			?>
			</ul>
		</div>
	</div>
</section>

<script src="<?php echo get_stylesheet_directory_uri(); ?>/static/lib/masonry.pkgd.min.js"></script>

<?php
get_footer();
?>