<?php
	
	/* Template name: Página - Semana Santa 2015 */

	get_header("ss2015"); 
	if(have_posts())
		the_post();
?>
<!-- *************************** -->
<!-- ********* Content ********* -->
<!-- *************************** -->
<section class="videos_semana">
	<div class="container">
		<div class="row text-center">
			<?php _e( '<h1>Evangelismo da Semana Santa<small>Há 45 anos, a Igreja Adventista aproveita a comoção que existe no mundo cristão nesta época, para realizar um evangelismo que reflete sobre os últimos dias da vida de Jesus na Terra.</small></h1>', 'iasd' );?>
			<?php 
				$loop = new WP_Query( array( 'post_type' => 'post', 'category_name' => 'ss2015', 'posts_per_page' => 1 ) ); 
				while ( $loop->have_posts() ) : $loop->the_post(); 
			?>
			<div class="col-md-8 col-sm-8 col-xs-12 col-md-offset-2 col-sm-offset-2">
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>">
					<figure>
						<?php the_post_thumbnail('thumb_740x475', array('class' => 'img-responsive')); ?>
						<figcaption>
							<div>
								<h2><?php the_title(); ?> <?php if (get_the_tag_list()) { ?> <small>por: <?php echo strip_tags(get_the_tag_list('',', ','')); ?></small> <?php } ?></h2>
							</div>
						</figcaption>
					</figure>
				</a>
			</div>
			<?php 
				$exclude[] = get_the_ID();

				endwhile; 
				wp_reset_query(); 
			?>

		</div>
	</div>	
</section>

<section class="videos">
	<div class="container">
		<div id="videos" class="row text-center">
			<?php _e( '<h1>Mais videos <small>Saiba mais sobre este evangelismo, assista aos sermões e medite nas maravilhosas lições da vida de Jesus.</small></h1>', 'iasd' );?>
			<?php 
				$loop = new WP_Query( array( 'post_type' => 'post', 'category_name' => 'ss2015', 'posts_per_page' => 20, 'post__not_in' => $exclude ) ); 
				while ( $loop->have_posts() ) : $loop->the_post(); 
			?>
			<div class="video col-md-4 col-sm-6 col-xs-12">
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>">
					<figure>
						<?php the_post_thumbnail('thumb_325x183', array('class' => 'img-responsive')); ?>
						<figcaption>
							<div>
								<h2><?php the_title(); ?> <?php if (get_the_tag_list()) { ?> <small>por: <?php echo strip_tags(get_the_tag_list('',', ','')); ?></small> <?php } ?></h2>
							</div>
						</figcaption>
					</figure>
				</a>
			</div>
			<?php 
				endwhile; 
				wp_reset_query(); 
				unset($exclude);
			?>
		</div>
	</div>	
</section>

<!-- *************************** --> 
<!-- ******* End Content ******* --> 
<!-- *************************** -->
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
<?php do_action('iasd_disqus_javascript'); ?>
<?php } ?>

<?php get_footer("ss2015"); ?>
