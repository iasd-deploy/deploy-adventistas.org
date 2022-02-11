<?php
	$aux = 'transmissao';
	$slug = $post->post_name;
	$title = $post->post_title;
	$header = get_field('header_image');
	$footer = get_field('footer_image');
	$contrast = get_field('contrast');
	$postID = $post->ID;
	$color = get_field('link_color');
	$n_videos = get_field('n_videos');
	$enable_videos = get_field('enable_videos');
	$enable_program = get_field('enable_program');

	if ($contrast) {
		$link_color = "#5C5144";
		$logo = plugins_url('/pa-plugin-transmissao/theme_files/assets/img/'. WPLANG .'/iasd_footer.png');
	} else {
		$link_color = "#fbf6f0";
	}
?>

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
		<!-- TO DO - corrigir para chamada local do html5shiv e respond.js antes de colocar em produção -->

		<style>

			<?php if ($header) { ?>
			body>header, .iasd-global_navbar { 	background-image: url('<?php echo $header; ?>') !important; background-position: bottom center; }
			.iasd-global_navbar { background-position: top center; } 
			.iasd-global_navbar-main { background-color: rgba(0,0,0,0.2); }
			.iasd-main_navbar .navbar { border-top: 1px solid rgba(<?php echo $link_color; ?>, 0.5); }
			<?php } ?>

			.iasd-main_navbar .navbar-nav>li>a:hover, .iasd-main_navbar .navbar-nav>li>a:focus {
				background: rgba(0,0,0,0.1) !important;
				border-color: rgba(0,0,0,0.1) !important;
			}

			<?php if ($footer) { ?>
			body>footer { background: url('<?php echo $footer; ?>') !important; }
			<?php } ?>

			.iasd-global_navbar-main .navbar-brand, body>header .identifier .title hgroup h1, body>header .identifier .title hgroup h2, .iasd-global_navbar-main .navbar-nav>li>a, .iasd-global_navbar-main .search-link:before, .iasd-main_navbar .navbar-nav>li>a, body>footer h1, body>footer a, body>footer a:hover, body>footer a:visited, body>footer .info .copyright { color: <?php echo $link_color; ?>; }
			
			<?php if ($contrast) { ?>
			body>footer .info, body.es_ES>footer .info {
				background-image: url('<?php echo $logo; ?>') !important;
			}
			<?php } ?>

			<?php the_field('css'); ?>

		</style>

		<!--[if lt IE 9]>
			<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/static/lib/ltie9.min.js"></script>
		<![endif]-->
		
	</head>

<body id="transmissao"  <?php body_class( array(WPLANG, $flavour_name, $aux, $slug) ) ?> >
	<div class="iasd-global_navbar">
		<?php do_action( 'global_nav_content', 'master_header', '' ); ?>
	</div>
	<header class="">
		<?php do_action( 'header_content', '', '' ); ?>
	</header>
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
						'theme_location'  => $slug .'-menu',
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
	



