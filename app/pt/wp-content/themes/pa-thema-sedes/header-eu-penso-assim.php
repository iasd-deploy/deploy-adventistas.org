<!DOCTYPE html>
<html>

	<head>

		<link href="//fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic" rel="stylesheet" type="text/css">
		<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
		<meta name="robots" content="index, follow">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!-- Favicons -->
		<link rel="shortcut icon" href="<?php echo esc_url( get_template_directory_uri() ); ?>/flavours/static/img/favicons/favicon.ico">
		<link rel="apple-touch-icon" sizes="57x57" href="<?php echo esc_url( get_template_directory_uri() ); ?>/flavours/static/img/favicons/apple-touch-icon-57x57.png" />
		<link rel="apple-touch-icon" sizes="114x114" href="<?php echo esc_url( get_template_directory_uri() ); ?>/flavours/static/img/favicons/apple-touch-icon-114x114.png" />
		<link rel="apple-touch-icon" sizes="72x72" href="<?php echo esc_url( get_template_directory_uri() ); ?>/flavours/static/img/favicons/apple-touch-icon-72x72.png" />
		<link rel="apple-touch-icon" sizes="144x144" href="<?php echo esc_url( get_template_directory_uri() ); ?>/flavours/static/img/favicons/apple-touch-icon-144x144.png" />
		<link rel="apple-touch-icon" sizes="60x60" href="<?php echo esc_url( get_template_directory_uri() ); ?>/flavours/static/img/favicons/apple-touch-icon-60x60.png" />
		<link rel="apple-touch-icon" sizes="120x120" href="<?php echo esc_url( get_template_directory_uri() ); ?>/flavours/static/img/favicons/apple-touch-icon-120x120.png" />
		<link rel="apple-touch-icon" sizes="76x76" href="<?php echo esc_url( get_template_directory_uri() ); ?>/flavours/static/img/favicons/apple-touch-icon-76x76.png" />
		<link rel="apple-touch-icon" sizes="152x152" href="<?php echo esc_url( get_template_directory_uri() ); ?>/flavours/static/img/favicons/apple-touch-icon-152x152.png" />
		<link rel="icon" type="image/png" href="<?php echo esc_url( get_template_directory_uri() ); ?>/flavours/static/img/favicons/favicon-196x196.png" sizes="196x196" />
		<link rel="icon" type="image/png" href="<?php echo esc_url( get_template_directory_uri() ); ?>/flavours/static/img/favicons/favicon-160x160.png" sizes="160x160" />
		<link rel="icon" type="image/png" href="<?php echo esc_url( get_template_directory_uri() ); ?>/flavours/static/img/favicons/favicon-96x96.png" sizes="96x96" />
		<link rel="icon" type="image/png" href="<?php echo esc_url( get_template_directory_uri() ); ?>/flavours/static/img/favicons/favicon-32x32.png" sizes="32x32" />
		<link rel="icon" type="image/png" href="<?php echo esc_url( get_template_directory_uri() ); ?>/flavours/static/img/favicons/favicon-16x16.png" sizes="16x16" />
		<meta name="msapplication-TileColor" content="#145351" />
		<meta name="msapplication-TileImage" content="<?php echo esc_url( get_template_directory_uri() ); ?>/flavours/static/img/favicons/mstile-144x144.png" />
		<meta name="msapplication-square70x70logo" content="<?php echo esc_url( get_template_directory_uri() ); ?>/flavours/static/img/favicons/mstile-70x70.png" />
		<meta name="msapplication-square144x144logo" content="<?php echo esc_url( get_template_directory_uri() ); ?>/flavours/static/img/favicons/mstile-144x144.png" />
		<meta name="msapplication-square150x150logo" content="<?php echo esc_url( get_template_directory_uri() ); ?>/flavours/static/img/favicons/mstile-150x150.png" />
		<meta name="msapplication-square310x310logo" content="<?php echo esc_url( get_template_directory_uri() ); ?>/flavours/static/img/favicons/mstile-310x310.png" />
		<meta name="msapplication-wide310x150logo" content="<?php echo esc_url( get_template_directory_uri() ); ?>/flavours/static/img/favicons/mstile-310x150.png" />

		<?php wp_head(); ?>

		<link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/custom_eupensoassim/css/style.css">
		<link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/custom_eupensoassim/fancybox/jquery.fancybox.css?v=2.1.5" media="screen" />

		<!-- TO DO - corrigir para chamada local do html5shiv e respond.js antes de colocar em produção -->

		<!--[if lt IE 9]>
			<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/static/lib/ltie9.min.js"></script>
		<![endif]-->
		
	</head>

<body <?php body_class( array(WPLANG, $flavour_name, $aux) ) ?> >
	<div class="iasd-global_navbar">
		<?php do_action( 'global_nav_content', 'master_header', '' ); ?>
	</div>
	<header>
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<a href="#" title="<?php _e('Clique aqui para retornar à página inicial', 'iasd'); ?>" class="logo"><?php _e('Eu penso assim', 'iasd'); ?></a>
				</div>
				<div class="col-md-7">
					<ul id="navigation" class="menu">
						<li class="active"><a href="#tema"><?php _e('Tema da semana', 'iasd'); ?></a></li>
						<li><a href="#videos"><?php _e('Vídeos', 'iasd'); ?></a></li>
						<li><a href="#sobre"><?php _e('Sobre', 'iasd'); ?></a></li>
						<li><a href="#contato"><?php _e('Contato', 'iasd'); ?></a></li>
					</ul>
				</div>
				<div class="col-md-2">
					<ul class="social-media">
			            <li><a href="<?php the_field('facebook'); ?>" title="Acesse a fanpage no Facebook" class="facebook" target="_blank">Facebook</a></li>
			            <li><a href="<?php the_field('twitter'); ?>" title="Acesse o perfil no Twitter" class="twitter" target="_blank">Twitter</a></li>
			            <li><a href="<?php the_field('instagram'); ?>" title="Acesse o perfil no Instagram" class="instagram" target="_blank">Instagram</a></li>
			            <li><a href="<?php the_field('youtube'); ?>" title="Acesse o canal no Youtube" class="youtube" target="_blank">Youtube</a></li>
			        </ul>
				</div>
			</div>
		</div>
	</header>


