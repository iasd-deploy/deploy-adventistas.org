<?php
	
	/* Template name: Página Customizada */

	if(have_posts())
		the_post();

	get_header("custom-page");
?>

<!-- *************************** -->
<!-- ********* Content ********* -->
<!-- *************************** -->
<div class="iasd-special-page">

	<div class="container">
		<div class="row">
			<article class="entry-content">
				<div class="col-md-12">
					<header class="special-page-title">
						<h1>
							<img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/custom_static/custom-page/img/slogan.png" />
						</h1>
						<small><?php the_field('subtitle'); ?></small>
					</header>
				</div>
			</article>
		</div>
	</div>

	<section class="content-flex-image" style="background: url(<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/custom_static/custom-page/img/bg-frame.jpg) no-repeat center center;min-height: 619px;margin-top: 80px;">

		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">

					<a href="<?php the_field('title'); ?>" class="ic-play">Play</a>

					<p class="lead">Neste Natal, o bombeiro Almeida vai trabalhar, mas nem
					<span>por isso deixou  de celebrar com a família</span>
					<a href="http://noticias.adventistas.org/pt/noticia/comunicacao/igreja-adventista-proporciona-ceia-de-natal-para-bombeiro-plantonista/" target="_blank">Conheça a história por trás da surpresa »</a></p>
				</div>
			</div>
		</div>

	</section>

	<!-- <section class="content-flex-video">
		<div class="container">
			<section class="row">
				<div class="col-md-12">
					Video Allan 
				</div>
			</section>
		</div>
	</section> -->
	
	<section id="mais-posts" class="content-flex-custom">

<?php
if( have_rows('special_flex_content') ):
    while ( have_rows('special_flex_content') ) : the_row();

        if( get_row_layout() == 'content_posts' ): ?>
			
        	<div class="content-flex-posts">
				<div class="container">
					<div class="row">
						<div class="section-header col-md-12">				
							<h2><?php the_sub_field('title'); ?></h2>
						</div>
						
						<?php while ( have_rows('posts') ) : the_row();

							$thumbnail = get_sub_field('thumbnail');
							$link = get_sub_field('link'); 
							$title = get_sub_field('title'); ?>

							<div class="col-md-6">
								<a href="<?php echo $link; ?>" title="<?php echo $title; ?>" target="_blank" class="video-item">
									<figure style="background-image: url('<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/flavours/static/img/widgets/no_image_740x475.png');">
										<img src="<?php echo $thumbnail; ?>" class="img-responsive" alt="<?php echo $title; ?>">
									</figure>
									<h3><?php echo $title; ?></h3>
								</a>
							</div>

						<?php endwhile; ?>

					</div>
				</div>
			</div>
		
		<?php elseif( get_row_layout() == 'content_sidebar' ): ?>

			<section id="sidebar" class="sidebar">
				<div class="container">
					<div class="row">
						<?php do_action('iasd_dynamic_sidebar', the_field('sidebar')); ?>
					</div>
				</div>
			</section>

        <?php endif;

    endwhile;
endif;
?>

	</section>

</div>
<!-- *************************** --> 
<!-- ******* End Content ******* --> 
<!-- *************************** -->

<?php get_footer("custom-page"); ?>