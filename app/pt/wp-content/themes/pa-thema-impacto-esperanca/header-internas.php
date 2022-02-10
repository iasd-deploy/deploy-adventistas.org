<!DOCTYPE html>
<html>

	<head>

		<link href="http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic" rel="stylesheet" type="text/css">
		<link href="http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
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

		<link rel="stylesheet" href="//blueimp.github.io/Gallery/css/blueimp-gallery.min.css">

		<!-- TO DO - corrigir para chamada local do html5shiv e respond.js antes de colocar em produção -->

		<!--[if lt IE 9]>
			<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/static/lib/ltie9.min.js"></script>
		<![endif]-->
		
	</head>

<?php 
$flavour_name = FlavoursController::GetFlavour();

$aux = "impacto";

?>
	<body <?php body_class( array(WPLANG, $flavour_name, $aux, 'internas') ) ?> >

	<?php if ( get_option( 'stylesheet' ) != 'pa-thema-capa' ) { ?>
		<!--[if lt IE 10]>
			<div class="ie-alert alert alert-danger">
				<div class="container">
					<div class="row">
						<div class="col-md-8"><p><strong><?php _e( 'Atenção', 'iasd' ); ?></strong>: <?php _e( 'o seu navegador está desatualizado e pode colocar seu computador em risco.', 'iasd' ); ?></p></div>
						<div class="col-md-4"><a href="http://www.whatbrowser.org/intl/pt-BR/" target="_blank" class="btn btn-danger"><?php _e( 'Clique aqui para atualizar seu navegador', 'iasd' ); ?></a></div>
					</div>
				</div>
			</div>
		<![endif]-->
	<?php } ?>

	<!-- *********************** -->
	<!-- Begin Global Navigation -->
	<!-- *********************** -->
	<div class="iasd-global_navbar">
	<!-- Begin Global Main Navigation -->	
		<?php do_action( 'global_nav_content', 'master_header', '' ); ?>
	</div>
	<!-- *********************** -->
	<!--  End Global Navigation  -->
	<!-- *********************** -->

	<!-- ******************* -->
	<!-- Begin Global Header -->
	<!-- ******************* -->	
	<header>
		<div class="container">
			<div class="row">
				<div class="impacto-identifier identifier text-center" >
					<!-- Institutional Headquarters Pattern -->
					<div class="brand">
						<a href="<?php echo get_home_url(); ?>" title="<?php _e('Clique aqui para retornar à página inicial', 'iasd'); ?>"><?php echo get_option('paheader_titulo'); ?></a>
					</div>
					<div class="title">
						<hgroup>
							<h1><?php bloginfo('name'); ?><small><?php bloginfo('description'); ?></small></h1>
						</hgroup>
					</div>
				</div>
			</div>
		</div>
		<div class="video">

		</div>
	</header>

	<!-- ************************ -->
	<!--  Begin Local Navigation  -->
	<!-- ************************ -->
	<div class="iasd-main_navbar container">
		<nav class="navbar navbar-default" role="navigation">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<span class="navbar-brand visible-xs"><?php _e( 'Menu', 'iasd' ); ?></span>
			</div>
		<?php
			$menuOpts = array(
					'theme_location'  => 'principal-menu',
					'container_class' => 'collapse navbar-collapse',
					'echo'            => true,
					'fallback_cb'     => 'wp_page_menu',
					'depth'           => 0,
					'items_wrap'      => '<ul id="%1$s" class="nav navbar-nav %2$s">%3$s</ul>',
			);
			$menuOpts['walker'] = new IASD_MainMenuWalker();
			
			wp_nav_menu( $menuOpts );

		?>	
		</nav>
	</div>
	<!-- ************************ -->
	<!--  End Local Navigation  -->
		<!-- ************************ -->



