<?php
/*
Template Name: Front Page
*/
get_header();
?>

<?php if ( is_active_sidebar( 'pagina_inicial_mapa' ) ) : ?>
<div class="maps">
	<div class="container">
		<div class="row">
			<?php dynamic_sidebar( 'pagina_inicial_mapa' ); ?>
		</div>
	</div>
</div>
<?php endif; ?>
<?php if ( is_active_sidebar( 'pagina_inicial_apps' ) ) : ?>
<div class="apps">
	<div class="container">
		<div class="row text-center">
			<?php dynamic_sidebar( 'pagina_inicial_apps' ); ?>
		</div>
	</div>
</div>
<?php endif; ?>
<?php if ( is_active_sidebar( 'pagina_inicial_icons' ) ) : ?>
<div class="icons">
	<div class="container">
		<div class="row text-center">
			<h2><?php echo __('Dicas para ser um líder de Calebes', 'thema_deptos'); ?></h2>
			<?php dynamic_sidebar( 'pagina_inicial_icons' ); ?>
		</div>
	</div>
</div>
<?php endif; ?>
<?php if ( is_active_sidebar( 'pagina_inicial_social' ) ) : ?>
<div class="social hidden-xs">
	<div class="container">
		<div class="row">
			<?php dynamic_sidebar( 'pagina_inicial_social' ); ?>
		</div>
	</div>
</div>
<?php endif; ?>

<?php get_footer(); ?>