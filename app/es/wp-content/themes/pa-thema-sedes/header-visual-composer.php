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

		<!-- TO DO - corrigir para chamada local do html5shiv e respond.js antes de colocar em produção -->

		<!--[if lt IE 9]>
			<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/static/lib/ltie9.min.js"></script>
		<![endif]-->
<?php 
	$flavour_name = FlavoursController::GetFlavour();

	$sede = get_option('paheader_sede');
	
	if($sede > 0) {
		$aux = 'iasd-assoc';
	}
	
	$cor_header = get_field('cor-header');
	$cor_footer = get_field('cor-footer');
	$imagem_header = get_field('imagem-header');
	$imagem_footer = get_field('imagem-footer');
	
?>

	<style type="text/css">
		<?php if ($cor_header || $imagem_header) { ?>
		body>header, .iasd-global_navbar {
			background-color: <?php echo $cor_header; ?> !important;
			background-image: url(<?php echo $imagem_header; ?>) !important;
		}
		<?php }?>
	
		<?php if ($cor_footer || $imagem_footer) { ?>
		body>footer {
		
			background-color: <?php echo $cor_footer; ?> !important;
			background-image: url(<?php echo $imagem_footer; ?>) !important;			
		}
		<?php }?>

		.navbar, .iasd-main_navbar {
			margin-bottom: 0;
		}

		body>footer {
			margin-top: 0;
		}
	</style>

	</head>
<body <?php body_class( array(WPLANG, $flavour_name, $aux) ) ?> >

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

<header class="<?php if (( $flavour_name == 'iasd-dsa-home' ) && is_front_page()) { echo 'visible-xs';} ?>">
	<?php do_action( 'header_content', '', '' ); ?>
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
				'theme_location'  => 'menu-principal',
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


