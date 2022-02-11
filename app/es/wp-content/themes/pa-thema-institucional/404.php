<?php get_header(); ?>
<!-- *************************** -->
<!-- ********* Content ********* -->
<!-- *************************** -->

<div class="container">
	<section class="row">
		<article class="col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3 iasd-error-404">
			<h1><?php _e('Igreja Adventista do Sétimo Dia', 'iasd'); ?></h1>
			<h2><?php _e('Desculpe-nos, aconteceu um erro inesperado :(', 'iasd'); ?></h2>
			<p><?php _e('A página "', 'iasd'); ?><em>http://www.adventistas.org<?php echo $_SERVER['REQUEST_URI']; ?></em><?php _e('" não existe no Portal Adventista.', 'iasd'); ?></p>
			<a href="javascript:history.back(-1)" title="<?php _e('Clique aqui para retornar à página anterior', 'iasd'); ?>" class="btn btn-default"><?php _e('« Clique aqui para retornar à página anterior', 'iasd'); ?></a>
			<hr />
			<h3><?php _e('Faça uma busca', 'iasd'); ?></h3>
			<form method="get" action="<?php echo site_url(); ?>?">
				<div class="input-group">
					<input type="text" name="s" class="form-control" placeholder="<?php _e('Insira as palavras-chave aqui', 'iasd'); ?>">
					<span class="input-group-btn">
						<button class="btn btn-default" type="submit"><?php _e('Buscar','iasd'); ?></button>
					</span>
				</div>
			</form>
		</article>
	</section>
</div>

<!-- *************************** -->
<!-- ******* End Content ******* -->
<!-- *************************** -->

<?php get_footer(); ?>