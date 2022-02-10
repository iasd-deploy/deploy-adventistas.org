<?php
/*
Template Name: Pedidos de oração
*/
get_header(); 
?>
<!-- *************************** -->
<!-- ********* Content ********* -->
<!-- *************************** -->
<header class="iasd-institutional-header" style="background: url(<?php echo get_template_directory_uri(); ?>/custom_static/destaque-pedidos-de-oracao.png)">
	<div class="container">
		<figcaption>
			<h1><?php _e('Pedidos', 'iasd'); ?><br /><?php _e('de Oração', 'iasd'); ?></h1>
		</figcaption>
	</div>
</header>
<div class="container">
	<section class="row">
		<article class="col-sm-8 entry-content">
			<header>
				<div class="sharing-links mar-top-0">
					<?php do_action('sharing_links'); ?>
				</div>
			</header>
			<h2><?php _e('Prezado(a) amigo(a)', 'iasd'); ?></h2>
			<p>&nbsp;</p>
			<p><?php _e('Envie-nos seu pedido de oração. De segunda a sexta-feira estaremos orando por você, aqui no escritório da Igreja Adventista para a América do Sul.', 'iasd'); ?></p>
			<p><?php _e('Seu pedido não será exposto, nós o trataremos de forma confidêncial.', 'iasd'); ?></p>
			<p><?php _e('Confie no poder da oração intercessória. Bênçãos sem medida estão à sua disposição.', 'iasd'); ?></p>
			<p><?php _e('Nós oraremos por você!', 'iasd'); ?></p>
			<?php echo (!empty($_REQUEST['result'])) ? $_REQUEST["result"] : ''; ?>
			<form action="" class="col-sm-12 highlight-box mar-top-30" method="post">
				<h5><?php _e('Seu Nome (obrigatório)', 'iasd'); ?></h5>
				<input type="text" name="nome" value="" maxlength="100" style="width:100%" />
				<br />
				<br />
				<h5><?php _e('Seu e-mail (obrigatório)', 'iasd'); ?></h5>
				<input type="text" name="email" value="" maxlength="100" style="width:100%" />
				<br />
				<br />
				<h5><?php _e('Pedido de Oração', 'iasd'); ?></h5>
				<textarea name="message" rows="6" style="width:100%"></textarea>
				<br />
				<br />
				<label><input type="checkbox" name="checkbox-email" value="1" class="check"><?php _e('Enviar cópia dessa mensagem para o seu endereço de e-mail.', 'iasd'); ?></label>
				<br />
				<label><input type="checkbox" name="checkbox-news" value="1" class="check"><?php _e('Assinar newsletter para receber notícias da IASD semanalmente.', 'iasd'); ?></label>
				<br />
				<br />
				<input type="submit" value="<?php _e('Enviar', 'iasd'); ?>" class="btn btn-default" />
				<?php wp_nonce_field( 'new_pray_request' ); ?>
			</form>
		</article>
		<div class="clearfix visible-xs"></div>
		<aside class="col-sm-4 iasd-aside mar-top-50-xs">
			<?php /* <h1 class="iasd-main-title"><?php _e('Estudos Bíblicos Online', 'iasd'); ?></h1> */ ?>
			<?php do_action('iasd_dynamic_sidebar', 'prayer-requests'); 
			?>
		</aside>
	</section>
</div>

<!-- *************************** -->
<!-- ******* End Content ******* -->
<!-- *************************** -->

<?php get_footer(); ?>