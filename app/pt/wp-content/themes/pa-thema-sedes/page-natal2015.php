<?php
	
	/* Template name: Página - Natal 2015 */

	require_once('custom_natal2015/header.php');
	if(have_posts())
		the_post();
?>
<!-- *************************** -->
<!-- ********* Content ********* -->
<!-- *************************** -->

<section id="videos" class="videos">
	<div class="container">
		<div class="row text-center">
			<div class="video col-md-8 col-md-offset-2">
				<a href="https://www.youtube.com/watch?v=<?php the_field('video_1_id'); ?>&autoplay=1" data-rel="lightbox-1" onClick="ga('adventistasGeral.send', 'event', 'Video - <?php echo WPLANG; ?>', 'Play', 'Video1');">
					<figure>
						<img src="<?php the_field('video_1_thumbnail'); ?>" class="img-responsive" />
					</figure>
				</a>
			</div>
		</div>
	</div>	
</section>

<section class="botoes">
	<div class="container">
		<div class="row">
			<div class="botao col-md-3 col-sm-3 text-center">
				<a href="<?php the_field('url_playback'); ?>" onClick="ga('adventistasGeral.send', 'event', 'Botões - <?php echo WPLANG; ?>', 'Click', 'Mutirão de Natal');" download>
					<span class="icon icon_music"></span>
					<span class="title"><?php the_field('label_playback'); ?></span>
				</a>
			</div>
			<div class="botao col-md-3 col-sm-3 text-center">
				<a href="<?php the_field('link_mutirao'); ?>" onClick="ga('adventistasGeral.send', 'event', 'Botões - <?php echo WPLANG; ?>', 'Click', 'Mutirão de Natal');">
					<span class="icon icon_gift"></span>
					<span class="title"><?php the_field('titulo_mutirao'); ?></span>
				</a>
			</div>
			<div class="botao col-md-3 col-sm-3 text-center">
				<a href="<?php the_field('link_sermoes'); ?>" onClick="ga('adventistasGeral.send', 'event', 'Botões - <?php echo WPLANG; ?>', 'Click', 'Sermões');">
					<span class="icon icon_paperclip"></span>
					<span class="title"><?php the_field('titulo_sermoes'); ?></span>
				</a>
			</div>
			<div class="botao col-md-3 col-sm-3 text-center">
				<a href="<?php the_field('link_ja'); ?>" onClick="ga('adventistasGeral.send', 'event', 'Botões - <?php echo WPLANG; ?>', 'Click', 'JA');">
					<span class="icon icon_rocket"></span>
					<span class="title"><?php the_field('titulo_ja'); ?></span>
				</a>
			</div>
		</div>
	</div>	
</section>

<section id="artigos" class="artigos">
	<div class="container">
		<div class="row">
			<h2 class="text-center"><?php the_field('titulo_artigos'); ?><small><?php the_field('descricao_artigos'); ?></small></h2>
			<?php if(get_field('artigos')): ?>
				<?php while(has_sub_field('artigos')): ?>
			<div class="col-md-4 col-sm-4">
				<a href="<?php the_sub_field('link_artigo'); ?>" onClick="ga('adventistasGeral.send', 'event', 'Artigos - <?php echo WPLANG; ?>', 'Click', '<?php the_sub_field('titulo_artigo'); ?>');">
					<div class="artigo text-center">
						<figure>
							<img src="<?php the_sub_field('imagem_artigo'); ?>" class="img-responsive img-circle" />
							<figcaption class="text-center">
								<span class="titulo" ><?php the_sub_field('titulo_artigo'); ?></span>
								<span class="descricao"><?php the_sub_field('descricao_artigo'); ?></span>
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

<section id="cartoes" class="cartoes">
	<div class="container">
		<div class="row">
			<h2 class="text-center"><?php the_field('titulo_cartoes'); ?><small><?php the_field('descricao_cartoes'); ?></small></h2>
			<?php if(get_field('cartoes')): ?>
				<?php while(has_sub_field('cartoes')): 
					$count++;
				?>
			<div class="cartao col-md-4 col-sm-6 text-center">
				<div class="">
					<img src="<?php the_sub_field('cartao_imagem'); ?>" class="img-responsive img-rounded" />
					<div class="icons">
						<a class="icon icon_download" href="<?php the_sub_field('cartao_imagem'); ?>" role="button" target="_blank" download onClick="ga('adventistasGeral.send', 'event', 'Cartões - <?php echo WPLANG; ?>', 'Download', '<?php the_sub_field('cartao_imagem'); ?>');"></a>
						<a class="icon icon_facebook" href="http://www.facebook.com/sharer.php?u=<?php the_sub_field('url'); ?>" role="button" target="_blank" onClick="ga('adventistasGeral.send', 'event', 'Cartões - <?php echo WPLANG; ?>', 'Share Facebook', '<?php the_sub_field('cartao_imagem'); ?>');"></a>
						<a class="icon icon_twitter" href="https://twitter.com/intent/tweet?text=<?php the_sub_field('descricao'); ?>&amp;url=<?php the_permalink(); ?>&amp;via=iasd" target="_blank" onClick="ga('adventistasGeral.send', 'event', 'Cartões - <?php echo WPLANG; ?>', 'Share Twitter', '<?php the_sub_field('cartao_imagem'); ?>');"></a>
						<a class="icon icon_pinterest" href="//www.pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&amp;media=<?php the_sub_field('cartao_imagem'); ?>&amp;description=<?php the_sub_field('descricao'); ?>" data-pin-do="buttonPin" data-pin-config="beside" target="_blank" onClick="ga('adventistasGeral.send', 'event', 'Cartões - <?php echo WPLANG; ?>', 'Share Pinterest', '<?php the_sub_field('cartao_imagem'); ?>');"></a>
					</div>
				</div>
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
