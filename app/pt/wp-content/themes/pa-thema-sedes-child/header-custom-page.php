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
		
		<link rel="stylesheet" href="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/custom_static/custom-page/css/custom-page.css">
		
		<!-- Go to www.addthis.com/dashboard to customize your tools --> 
		<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-581cb027a605a7d8"></script> 

		<style type="text/css">
			body{
				background-image: url(<?php the_field('bg_image'); ?>);
				background-color: <?php the_field('bg_color'); ?>;
				color: <?php the_field('text_color'); ?>;
			}
			body > footer {
				background-image: url(<?php the_field('bg_image_footer'); ?>);
			}

		</style>


		<!--[if lt IE 9]>
			<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/static/lib/ltie9.min.js"></script>
		<![endif]-->
		
	</head>

<body <?php body_class( array(WPLANG, $flavour_name, $aux) ) ?> >

	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.7&appId=531705787015619";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>


	<div class="iasd-global_navbar">
		<?php do_action( 'global_nav_content', 'master_header', '' ); ?>
	</div>
	<header>
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

