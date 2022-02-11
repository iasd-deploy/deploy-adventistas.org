<?php 
$flavour_name = FlavoursController::GetFlavour();
$body_id = '';

	if ( in_array( 'page-template-template-prayer-requests-php', get_body_class( array( WPLANG, $flavour_name ) ) ) ){
		$body_id = 'iasd-institutional-cover'; 
	}

	$aux = '';
	$sede = get_option('paheader_sede');
	if($sede > 0) {
		$aux = 'iasd-assoc';
	}
	
	$app_class = $_GET['app'];
	if( $app_class == '1' ){
		$aux .= ' showing-in-app';	
	}


	$lang = get_locale();

	$utm_sources = trim(get_site_url(), "http://");
	$utm_medium = "Banner%20Site%20Institucional";
	$utm_campaign = "Semana Jovem";
	$link_pt = "http://www.adventistas.org/pt/jovens/projeto/semana-de-oracao-jovem/";
	$link_es = "http://www.adventistas.org/es/jovenes/proyecto/semana-joven";
	$banner_background = "#fff";

	if ($lang == "pt_BR") {
		$link = $link_pt ."/?utm_source=". $utm_sources ."&utm_medium=". $utm_medium ." &utm_campaign=". $utm_campaign;
		$show = false;
	} else if ($lang == "es_ES") {
		$link = $link_es ."/?utm_source=". $utm_sources ."&utm_medium=". $utm_medium ." &utm_campaign=". $utm_campaign;
		$show = false;
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

		<!-- TO DO - corrigir para chamada local do html5shiv e respond.js antes de colocar em produÃ§Ã£o -->

		<!--[if lt IE 9]>
			<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/static/lib/ltie9.min.js"></script>
		<![endif]-->
		<style type="text/css">
			.banner {
				display: block;
				background: <?php echo $banner_background; ?>;
			}
			
			.showing-in-app .iasd-global_navbar,
			.showing-in-app > header,
			.showing-in-app > footer,
			.showing-in-app > .iasd-main_navbar,
			.showing-in-app .entry-content header
			{
				display: none !important;
				visibility: hidden;
			}
			.showing-in-app .entry-content h1{
				font-size: 15px;
				color: #0B658A;
			}
			.showing-in-app .entry-content p {
				color:#043447 !important;
			}
			.showing-in-app {
				background-color: #E9EFE0;
				padding-top: 50px;
				padding-bottom: 100px;
				color:#043447 !important;
			}
		</style>
		
	</head>
	<body id="<?php echo esc_attr( $body_id ); ?>"  <?php body_class( array($lang, $flavour_name, $aux) ) ?> >

	<?php if ( $show ) { ?>
		<div class="banner">
			<div class="container">
				<div class="row"> 
					<div class="col-md-12 text-center visible-md visible-lg"><a href="<?php echo $link; ?>" target="_blank" onClick="ga('adventistasGeral.send', 'event', 'Banner - <?php echo $utm_campaign; ?>', 'click', 'Banner - <?php echo $utm_sources; ?>');"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/banners/Large-<?php echo $lang; ?>.jpg"></a></div>
					<div class="col-md-12 text-center visible-sm"><a href="<?php echo $link; ?>" target="_blank" onClick="ga('adventistasGeral.send', 'event', 'Banner - <?php echo $utm_campaign; ?>', 'click', 'Banner - <?php echo $utm_sources; ?>');"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/banners/Medium-<?php echo $lang; ?>.jpg"></a></div>
					<div class="col-md-12 text-center visible-xs"><a href="<?php echo $link; ?>" target="_blank" onClick="ga('adventistasGeral.send', 'event', 'Banner - <?php echo $utm_campaign; ?>', 'click', 'Banner - <?php echo $utm_sources; ?>');"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/banners/Small-<?php echo $lang; ?>.jpg"></a></div>
				</div>
			</div>
		</div>
	<?php } ?>

	<?php if ( get_option( 'stylesheet' ) != 'pa-thema-capa' ) { ?>
		<!--[if lt IE 10]>
			<div class="ie-alert alert alert-danger">
				<div class="container">
					<div class="row">
						<div class="col-md-8"><p><strong><?php _e( 'AtenÃ§Ã£o', 'iasd' ); ?></strong>: <?php _e( 'o seu navegador estÃ¡ desatualizado e pode colocar seu computador em risco.', 'iasd' ); ?></p></div>
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
		<header class="<?php if (( $flavour_name == 'iasd-dsa-home' ) && is_front_page()) { echo 'visible-xs';} ?>">
			<?php do_action( 'header_content', '', '' ); ?>
		</header>
	
	<?php if ( $flavour_name == 'iasd-dsa-home' ):

		if ( is_front_page() ): ?>

			<!-- ******************* -->
			<!--  End Global Header  -->
			<!-- ******************* -->
			<div class="iasd-institutional hidden-xs"> 
				<?php
					$sede = get_option('paheader_sede');
						if($sede > 0) {
				?>
						<h2><?php do_action('iasd-headquarter-title'); ?></h2>
				<?php		
						}
				?>
			</div>

		<?php endif; 

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
						
					<div style="background-image: url('<?php echo esc_url( wp_get_attachment_url( $image_id ) ); ?>');">
						<section class="container">
							<article class="slider-clickable-area-link">
								<h1><?php the_title(); ?></h1>
					
					<?php (function_exists( 'the_excerpt_x' )) ? the_excerpt_x() : the_excerpt(); ?>
					<?php 
					$button_text = get_post_meta( get_the_ID(), 'texto_botao_veja_mais', true );
					$target = get_post_meta( get_the_ID(), 'slider_home_link_target', true);
					if ( $url = get_post_meta( get_the_ID(), 'link_veja_mais', true ) ): ?>
						<a href="<?php echo esc_url( $url ); ?>" title="<?php if ( $button_text ){ echo esc_attr( $button_text ); } else { _e( 'Clique para conhecer', 'iasd' ); } ; ?>" target="<?php echo $target; ?>">
							<?php if ( $button_text ){ echo esc_html( $button_text ); } else { _e( 'Clique para conhecer', 'iasd' ); } ; ?>
						</a>
					<?php endif; ?>
		
							</article>
						</section>
					</div>
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
<?php }