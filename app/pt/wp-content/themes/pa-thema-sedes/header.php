<?php 
$flavour_name = FlavoursController::GetFlavour();
$body_id = '';

$lang = get_locale();

if ( in_array( 'page-template-template-prayer-requests-php', get_body_class( array( $lang, $flavour_name ) ) ) ){
	$body_id = 'iasd-institutional-cover'; 
}

	$sede = get_option('paheader_sede');
		if($sede > 0) {
			$aux = 'iasd-assoc';
	}

?>

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
		<style type="text/css">

			.page-template-page-busca .cse .gsc-control-cse, .page-template-page-busca .gsc-control-cse {
				padding: 0;
			}

			.page-template-page-busca .gcsc-branding {
				display: none;
			}

			.page-template-page-busca .cse .gsc-control-cse, .page-template-page-busca .gsc-control-cse {
				border: none;
				background-color: none;
			}
			.page-template-page-busca .gs-result .gs-title, .page-template-page-busca .gs-result .gs-title *{
				text-decoration: none;
				font-size: 20px !important;
				height: auto;
			}

			.page-template-page-busca .entry-content a:hover, .page-template-page-busca .entry-content a:focus {
				text-decoration: underline;
				border-bottom: none;
			}

			.page-template-page-busca .gsc-table-result, .page-template-page-busca .gsc-thumbnail-inside, .page-template-page-busca .gsc-url-top {
				padding: 0;
			}

			.page-template-page-busca .gsc-wrapper .gsc-adBlock {
				display: none;
			}

			<?php if(function_exists('get_field') && get_field('enabledisable', 'option')) { ?>

				.iasd-main_navbar {
					margin-bottom: 10px;
				}

				.special_banner {
					padding: 15px;
						margin-bottom: 20px;
						font-weight: bold;
						font-size: 1.1em;
				}

				.special_banner .col-md-6 {
					
				}

				.special_banner a {
					background: white;
					display: block;
					height: 50px;
					line-height: 50px;
					border: 1px solid #e0d8cd;
					border-radius: 5px;
				}

				.special_banner .texto{
					color: #3a3a3a;
				}

				.special_banner .call_action{
					color: red;
				}

				.special_banner .call_action:after {	
					content: '\f105';
					font-family: FontAwesome;
					margin-left: 10px;
				}

				@media only screen and (max-width: 600px) {
					.special_banner a{
						line-height: 40px;
						height: auto;
					}

					.special_banner .call_action{
						text-align: left;
					}
				}

				
				<?php the_field('css', 'option'); ?>
			<?php } ?>
		</style>

		<?php if ($lang == "pt_BR"){ ?>
		<!-- Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-KNNFLMF');</script>
		<!-- End Google Tag Manager -->
		<?php } ?>

	</head>
	<body id="<?php echo esc_attr( $body_id ); ?>"  <?php body_class( array($lang, $flavour_name, $aux) ) ?> >
	<?php if ($lang == "pt_BR"){ ?>
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KNNFLMF"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->	
	<?php } ?>

	<?php if (function_exists('banner_heder')) { banner_heder(); } ?>

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



