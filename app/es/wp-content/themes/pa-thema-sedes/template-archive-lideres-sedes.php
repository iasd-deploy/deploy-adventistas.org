<?php
/*
Template Name: Líderes Sedes
*/
get_header();


$args = array(
	'post_type' => 'lideres',
	'orderby' => 'menu_order',
	'order' => 'ASC',
	'post_parent' => 0,
	'meta_query' => array(
		'relation' => 'OR',
		array(
			'key' => 'cargo_tipo',
			'value' => 'presidente',
		),
		array(
			'key' => 'cargo_tipo',
			'value' => 'secretario',
		),
		array(
			'key' => 'cargo_tipo',
			'value' => 'tesoureiro',
		),
	),
);

$admin_query = new WP_Query( $args );


?>

<div class="container">
	<section class="row iasd-author-list">
		<article class="col-md-12">

<?php 
if ( $admin_query->have_posts() ): ?>
			<header>
				<h1 class="iasd-main-title"><?php _e( 'Líderes Administrativos', 'iasd' ); ?></span><span class="visible-xs">.</span></h1>
			</header>
	<?php	

	while ( $admin_query->have_posts() ):
		$admin_query->the_post();
		?>
			<span class="xs-landscape">
				<div class="col-sm-4 col-md-3">
					<a href="<?php echo get_permalink($post->ID); ?>">
						<figure class="img-circle">
							<?php
								add_filter('no_default_image', '__return_true');
								$lider_thumb_id = get_post_thumbnail_id($post->ID);
								$lider_thumb_url = wp_get_attachment_image_src( $lider_thumb_id, 'thumb_124x124' );
								remove_filter('no_default_image', '__return_true');
							?>
							<div class="img-holder" style="background: url(<?php echo $lider_thumb_url[0] ?>);" >
								<div class="img-gradient"></div>
							</div>
						</figure>
						<h3><?php echo esc_html( $post->post_title ); ?></h3>
						<h4><?php echo esc_html( LideresController::get_cargo( $post->ID ) ); ?></h4>
					</a>
				</div>
			</span>

		<?php
	endwhile;
endif;
	
wp_reset_query();

$args = array_merge( $args, array( 'meta_query' => array( array( 'key' => 'cargo_tipo', 'value' => 'departamental' ) ) ) );

$deptos_query = new WP_Query( $args );

if ( $deptos_query->have_posts() ): ?>
			<header class="mar-top-50">
				<h1 class="iasd-main-title"><?php _e( 'Departamentais', 'iasd' ); ?></span><span class="visible-xs">.</span></h1>
			</header>
	<?php	

	while ( $deptos_query->have_posts() ):
		$deptos_query->the_post();
		?>
			<span class="xs-landscape">
				<div class="col-sm-4 col-md-3">
					<a href="<?php echo get_permalink($post->ID); ?>">
						<figure class="img-circle">
							<?php
								add_filter('no_default_image', '__return_true');
								$lider_thumb_id = get_post_thumbnail_id($post->ID);
								$lider_thumb_url = wp_get_attachment_image_src( $lider_thumb_id, 'thumb_124x124' );
								remove_filter('no_default_image', '__return_true');
							?>
							<div class="img-holder" style="background: url(<?php echo $lider_thumb_url[0] ?>);" >
								<div class="img-gradient"></div>
							</div>
						</figure>
						<h3><?php echo esc_html( $post->post_title ); ?></h3>
						<h4><?php echo esc_html( LideresController::get_cargo( $post->ID ) ); ?></h4>
					</a>
				</div>
			</span>

		<?php
		endwhile;
	endif;

?>

		</article>
	</section>
</div>
<!-- *************************** -->
<!-- ******* End Content ******* -->
<!-- *************************** -->

<?php get_footer(); ?>
