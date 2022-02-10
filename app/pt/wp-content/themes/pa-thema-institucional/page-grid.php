<?php 
/*
Template Name: Page Grid
*/
get_header(); ?> 


<nav class="iasd-institutional-menu">

		<?php
			$menuOpts = array(
					'theme_location'        => 'sub-menu',
					'container_class' => 'container',
					'echo'            => true,
					'fallback_cb'     => 'wp_page_menu',
					'depth'           => 1,
					'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>'
			);
			//$menuOpts['walker'] = new IASD_MainMenuWalker();
			
			wp_nav_menu( $menuOpts );

		?>

</nav>

<?php
	$thumb_id = get_post_thumbnail_id();
	$thumb_url = wp_get_attachment_image_src($thumb_id,'', true);
?>

<div id="iasd-institutional-cover">
	<header class="iasd-institutional-header" style="background: url(<?php echo $thumb_url[0]; ?>)">
		<div class="container">
			<figcaption>
				<h1><?php the_title(); ?> </h1>
			</figcaption>
		</div>
	</header>
	<div class="container iasd-institutional grid">
		<div class="row">
			<div class="col-md-12">
				<?php 
					the_post(); 
					the_content(); 
				?>
			</div>
		</div>
	</div>
</div>

<?php 
	if ( !is_front_page() ) { 
		if ( has_nav_menu( 'footer-menu' ) ) {
?>
<section class="menu-footer">
	<div class="container">
		<div class="row">
			<hr class="div">
			<div class="col-md-12 col-sm-12 col-xs-12 highlight-box">
				<div class="col-sm-2"><h3><?php _e('Veja Também', 'iasd'); ?></h3></div>
				<div class="col-sm-10">
					<nav class="footer">
						<?php
							$menuOpts = array(
									'theme_location'  => 'footer-menu',
									'container_class' => '',
									'echo'            => true,
									'fallback_cb'     => 'wp_page_menu',
									'depth'           => 1,
									'items_wrap'      => '<ul id="%1$s" class="nav nav-pills">%3$s</ul>'
							);	
							wp_nav_menu( $menuOpts );
						?>
					</nav>
				</div>
			</div>
		</div>
	</div>
</section> 
<?php } } ?>

<?php get_footer(); ?>