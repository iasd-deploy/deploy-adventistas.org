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

		<!--[if lt IE 9]>
			<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/static/lib/ltie9.min.js"></script>
		<![endif]-->
		
	</head>

<?php 
$flavour_name = FlavoursController::GetFlavour();
$body_id = '';
if ( in_array( 'page-template-template-prayer-requests-php', get_body_class( array( WPLANG, $flavour_name ) ) ) ){
	$body_id = 'iasd-institutional-cover'; 
}

	$sede = get_option('paheader_sede');
		if($sede > 0) {
			$aux = 'iasd-assoc';
	}

?>
	<body id="<?php echo esc_attr( $body_id ); ?>"  <?php body_class( array(WPLANG, $flavour_name, $aux) ) ?> >

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

	<?php if ( ! is_404() ) { ?>
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
		<header class="<?php if (( $flavour_name == 'iasd-dsa-home' ) && is_front_page()) { echo 'visible-xs bg-secundario';} ?>">
			<?php do_action( 'header_content', '', '' ); ?>
		</header>
	
	<?php if ( $flavour_name == 'iasd-dsa-home' ):
		if ( is_front_page() ):
			$slider_home = array();
			$q = new WP_Query( array( 'post_type' => 'slider_home', 'meta_key' => '_thumbnail_id' ) );
			
			if ( $q->have_posts() ): ?>

				<div class="owl-carousel dsa-home-carousel hidden-xs">
				
				<?php
				while ( $q->have_posts() ):
					$q->the_post();
					$slider_home[] = get_the_ID();
					$image_id = get_post_thumbnail_id();
					?>
						
					<div style="background-image: url('<?php echo esc_url( wp_get_attachment_url( $image_id ) ); ?>');"></div>
				<?php endwhile; ?>

				</div>
			<?php endif; //Have Posts ?>
		<?php wp_reset_query();
		
		endif; // Is Home
	
	endif; //Is flavour dsa-home
?>	

<!-- ************************ -->
<!--  Begin Local Navigation  -->
<!-- ************************ -->
<div class="header_menu">
	<div class="iasd-main_navbar container">
		<div class="col-md-8 col-md-offset-2">
			<nav class="navbar navbar-default" role="navigation">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<span class="navbar-brand visible-xs "><?php _e( 'Menu', 'iasd' ); ?></span>
				</div>
			<?php
				$menuOpts = array(
						'theme_location'  => 'menu-principal',
						'container_class' => 'collapse navbar-collapse navbar-nav',
						'echo'            => true,
						'fallback_cb'     => 'wp_page_menu',
						'depth'           => 0,
						'items_wrap'      => '<ul id="%1$s" class="nav nav-justified %2$s">%3$s</ul>',
				);
				$menuOpts['walker'] = new IASD_MainMenuWalker();
				
				wp_nav_menu( $menuOpts );

			?>	
			</nav>
		</div>
	</div>
</div>
<!-- ************************ -->
<!--  End Local Navigation  -->
<!-- ************************ -->
<?php }



