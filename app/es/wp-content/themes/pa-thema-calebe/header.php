<!DOCTYPE html>
<html>

	<head>

		<link href="http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic" rel="stylesheet" type="text/css">
		<link href="http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
		<meta name="author" content="">
		<meta name="keywords" content="">
		<meta name="robots" content="index, follow">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!-- Favicons -->
		<link rel="shortcut icon" href="../static/img/favicons/favicon.ico">
		<link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri(); ?>/static/img/favicons/apple-touch-icon-57x57.png" />
		<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/static/img/favicons/apple-touch-icon-114x114.png" />
		<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/static/img/favicons/apple-touch-icon-72x72.png" />
		<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/static/img/favicons/apple-touch-icon-144x144.png" />
		<link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_template_directory_uri(); ?>/static/img/favicons/apple-touch-icon-60x60.png" />
		<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri(); ?>/static/img/favicons/apple-touch-icon-120x120.png" />
		<link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri(); ?>/static/img/favicons/apple-touch-icon-76x76.png" />
		<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri(); ?>/static/img/favicons/apple-touch-icon-152x152.png" />
		<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/static/img/favicons/favicon-196x196.png" sizes="196x196" />
		<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/static/img/favicons/favicon-160x160.png" sizes="160x160" />
		<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/static/img/favicons/favicon-96x96.png" sizes="96x96" />
		<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/static/img/favicons/favicon-32x32.png" sizes="32x32" />
		<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/static/img/favicons/favicon-16x16.png" sizes="16x16" />
		<meta name="msapplication-TileColor" content="#145351" />
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/static/img/favicons/mstile-144x144.png" />
		<meta name="msapplication-square70x70logo" content="<?php echo get_template_directory_uri(); ?>/static/img/favicons/mstile-70x70.png" />
		<meta name="msapplication-square144x144logo" content="<?php echo get_template_directory_uri(); ?>/static/img/favicons/mstile-144x144.png" />
		<meta name="msapplication-square150x150logo" content="<?php echo get_template_directory_uri(); ?>/static/img/favicons/mstile-150x150.png" />
		<meta name="msapplication-square310x310logo" content="<?php echo get_template_directory_uri(); ?>/static/img/favicons/mstile-310x310.png" />
		<meta name="msapplication-wide310x150logo" content="<?php echo get_template_directory_uri(); ?>/static/img/favicons/mstile-310x150.png" />

		<?php wp_head(); ?>

		<!-- TO DO - corrigir para chamada local do html5shiv e respond.js antes de colocar em produção -->

		<!--[if lt IE 9]>
			<script src="<?php echo get_template_directory_uri(); ?>/static/lib/html5shiv.js"></script>
			<script src="<?php echo get_template_directory_uri(); ?>/static/lib/respond.min.js"></script>
		<![endif]-->
		
	</head>

	<body 
		<?php
			$flavour_name = FlavoursController::GetFlavour();
			
			if ( in_array('page-template-template-prayer-requests-php', get_body_class( array(WPLANG, $flavour_name) )) ){
				echo 'id="iasd-institutional-cover"'; 
			}

			body_class(array(WPLANG, $flavour_name)); 
		 ?> 
	 >

		<?php if(get_option('stylesheet') != 'pa-thema-capa') {
				?>
				<!--[if lt IE 10]>
					<div class="ie-alert alert alert-danger">
						<div class="container">
							<div class="row">
								<div class="col-md-8"><p><strong><?php _e('Atenção', 'iasd'); ?></strong>: <?php _e('o seu navegador está desatualizado e pode colocar seu computador em risco.', 'iasd'); ?></p></div>
								<div class="col-md-4"><a href="http://www.whatbrowser.org/intl/pt-BR/" target="_blank" class="btn btn-danger"><?php _e('Clique aqui para atualizar seu navegador', 'iasd'); ?></a></div>
							</div>
						</div>
					</div>
				<![endif]-->
				<?php
			} ?>

<?php
	if (!is_404()) {
?>
		<!-- *********************** -->
		<!-- Begin Global Navigation -->
		<!-- *********************** -->
		<div class="iasd-global_navbar">
		<!-- Begin Global Main Navigation -->	
			<?php do_action('global_nav_content', 'master_header', ''); ?>
		</div>
		<!-- *********************** -->
		<!--  End Global Navigation  -->
		<!-- *********************** -->

		<!-- ******************* -->
		<!-- Begin Global Header -->
		<!-- ******************* -->	
		<header>
			
			<div class="iasd-main_navbar">
				<nav class="navbar" role="navigation">
					<div class="container">
						<div class="row">
							<!-- Brand and toggle get grouped for better mobile display -->
							<div class="navbar-header">
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
								<a class="navbar-brand" href="<?php echo get_site_url(); ?>"></a>
							</div>

							<div class="collapse navbar-collapse">
								<?php
									$menu_principal = array(
										'theme_location'  => 'menu-principal',
										'container'       => 'ul',
										'items_wrap'      => '<ul class="nav navbar-nav navbar-right menu-principal">%3$s</ul>',
									);
									wp_nav_menu( $menu_principal );
								?>
							</div>
						</div>
					</div>
				</nav>
			</div>
			
		</header>
		<!-- ******************* -->
		<!--  End Global Header  -->
		<!-- ******************* -->
<?php } ?>
	<?php
		if (is_front_page()) {
			$slider_home = array();
			$q = new WP_Query (array ('post_type'=>'slider_home', 'meta_key' => '_thumbnail_id'));
			if($q->have_posts()):
	?>
	<div class="slider row hidden-xs">
		<div class="owl-carousel dsa-home-carousel">
		<?php
			while($q->have_posts()):
				$q->the_post();
				$slider_home[] = get_the_ID();
				$image_id = get_post_thumbnail_id();
		?>
			<div style="background-image: url('<?php echo wp_get_attachment_url( $image_id ); ?>');">
				<section class="container">
					<article class="col-md-12 text-center">
						<h1><?php the_title(); ?></h1>
						<?php (function_exists('the_excerpt_x')) ? the_excerpt_x() : the_excerpt(); ?>
						<?php 
							$button_text = get_post_meta(get_the_ID(), 'texto_botao_veja_mais', true);
							if($url = get_post_meta(get_the_ID(), 'link_veja_mais', true)): 
						?>
						<a href="<?php echo $url; ?>" class="veja-mais" title="<?php if($button_text){ echo $button_text; } else { echo __('Clique para conhecer', 'iasd'); } ; ?>">
							<?php if($button_text){ echo $button_text; } else { echo __('Clique para conhecer', 'iasd'); } ; ?>
						</a>
						<?php endif; ?>
					</article>
				</section>
			</div>
		<?php	 
			endwhile; 
			endif; 
			wp_reset_query(); 

			} 
		?>
		</div>
	</div>






