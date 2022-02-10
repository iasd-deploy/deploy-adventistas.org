<?php
	
	/* Template name: Página - Finados 2016 */

	require_once('custom_finados2016/header.php');
?>
<!-- *************************** -->
<!-- ********* Content ********* -->
<!-- *************************** -->

<section id="videos" class="videos">
	<div class="container">
		<div class="row text-center principal">
			<h2 class=""><?php the_field('titulo_s2'); ?><small><?php the_field('subtitulo_s2'); ?></small></h2>
			<div class="col-md-10 col-md-offset-1">
				<a href="https://www.youtube.com/embed/<?php the_field('video_principal'); ?>?autoplay=1&rel=0" class="wplightbox"><img src="<?php echo $imagem_video_principal['url']; ?>" alt="<?php echo $imagem_video_principal['alt']; ?>" class="img-responsive"/><span class="icon icon_player"></span></a>
			</div>
		</div>
		<?php if( have_rows('video_adicional') ): ?>
		<div class="row text-center secundario">
		<?php
			while ( have_rows('video_adicional') ) : the_row(); 
			$imagem_video = get_sub_field('imagem_video');
			?>
			<div class="col-md-4 col-sm-4 itens">
				<a href="https://www.youtube.com/embed/<?php the_sub_field('id_youtube'); ?>?autoplay=1&rel=0" class="wplightbox">
				<div class="image_video"> 
					<img src="<?php echo $imagem_video['url']; ?>" alt="<?php echo $imagem_video['alt']; ?>" class="thumb img-responsive"/>
					<span class="icon icon_player"></span>
				</div>
				<span class="title">
					<?php the_sub_field('titulo_video'); ?>
				</span>
				</a>
			</div>
		<?php
			endwhile;
		endif;
		?>
		</div>
	</div>	
</section>

<?php 

$bg_banner = "dark";
if ( $infografico_imagem ) { 
	$bg_banner = "light";
?>

<!-- Visivel somente p/ desktop e tablets -->

<section class="infograficos-desktop visible-md visible-lg">
	<iframe src="<?php the_field("infografico_link"); ?>" frameborder="0"></iframe>
</section>


<!-- Visivel somente p/ mobile -->
<section class="infograficos-mobile visible-sm visible-xs">
	<div class="container">
		<div class="row text-center">
			<div class="col-md-12 infografico">
				<img src="<?php echo $infografico_imagem['url']; ?>" class="img-responsive"/>
			</div>
			<div class="col-md-6 col-md-offset-3">
				<h2><?php the_field("infografico_descricao"); ?></h2>
				<a href="<?php the_field("infografico_link"); ?>" target="_blank"><?php the_field("infografico_label"); ?></a>
			</div>
		</div>
	</div>	
</section>

<?php } ?>

<section class="banners <?php echo $bg_banner; ?>">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-sm-8 col-md-offset-2 banner">
				<a href="<?php the_field("url_a"); ?>" target="_blank"><img src="<?php echo $banner_a['url']; ?>" class="img-responsive"/></a>
			</div>
		</div>
	</div>	
</section>

<section id="artigos" class="artigos">
	<div class="container">
		<div class="row">
			<h2 class="text-center"><?php the_field('titulo_s4'); ?><small><?php the_field('subtitulo_s4'); ?></small></h2>
			<?php if(get_field('artigos')): ?>
				<?php
					while(has_sub_field('artigos')):
					$foto = get_sub_field('foto');
				?>
			<div class="col-md-4 col-sm-4">
				<a href="<?php the_sub_field('url'); ?>" onClick="ga('adventistasGeral.send', 'event', 'Artigos - <?php echo WPLANG; ?>', 'Click', '<?php the_sub_field('url'); ?>');" target="_blank">
					<div class="artigo text-center">
						<figure>
							<img src="<?php echo $foto['url']; ?>" class="img-responsive img-circle" />
							<figcaption class="text-center">
								<span class="titulo" ><?php the_sub_field('titulo'); ?></span>
								<span class="descricao"><?php the_sub_field('resumo'); ?></span>
							</figcaption>
						</figure>
					</div>
				</a>
			</div>
				<?php endwhile; ?>
			<?php endif; ?>
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
<?php } ?>

<?php require_once('custom_natal2015/footer.php'); ?>
