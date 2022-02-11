<?php
/*
Template Name: Líderes Departamentos
*/
get_header();
?>

<!-- *************************** -->
<!-- ********* Content ********* -->
<!-- *************************** -->

<?php
$lider_geral_query = new WP_Query(
	array(
		'meta_key' => 'cargo_tipo', 
		'meta_value' => 'lidergeral', 
		'post_type' => 'lideres',
	) 
);
$lider_geral = ( count( $lider_geral_query->posts ) ) ? reset( $lider_geral_query->posts ) : null;
unset($lider_geral_query);

$lideres_query = new WP_Query(
	array(
		'post_type' => 'lideres', 
		'posts_per_page' => -1, 
		'orderby' => 'menu_order', 
		'order' => 'ASC', 
		'parent' => 0,
		'meta_query' => array( array( 'key' => 'cargo_tipo', 'value' => 'departamental' ) ),
	)
);

$lideres = ( count( $lideres_query->posts ) ) ? $lideres_query->posts : array();
unset($lideres_query);
?>

<div class="container">
	<section class="row iasd-author-list">
		<article class="col-md-12">
			<header>
				<h1 class="iasd-main-title"><?php _e( 'Líderes', 'iasd' );?></h1>
			</header>
			
			<?php if ( $lider_geral ):
				global $post;
				$post = $lider_geral;
				setup_postdata( $post );

				?>

			<div class="row entry-content">
				<div class="col-sm-3 col-md-2">
					<figure class="img-circle active">
						<?php
							add_filter('no_default_image', '__return_true');
							$lider_thumb_id = get_post_thumbnail_id($lider_geral->ID);
							$lider_thumb_url = wp_get_attachment_image_src( $lider_thumb_id, 'thumb_124x124' );
							remove_filter('no_default_image', '__return_true');
						?>
						<div class="img-holder" style="background: url(<?php if($lider_thumb_url) echo $lider_thumb_url[0] ?>);" >
							<div class="img-gradient"></div>
						</div>
					</figure>
				</div>
				<div class="col-sm-9 col-md-10">
					<h1><?php echo $lider_geral->post_title; ?></h1>
					<h2><?php echo esc_html( LideresController::get_cargo( $lider_geral->ID ) ); ?></h2>
					<p><?php echo $lider_geral->post_content; ?></p>
					<?php if($twitter = get_post_meta($lider_geral->ID, 'social-networks_twitter', true)): ?>
							<em>Twitter:
								<a href="http://www.twitter.com/<?php echo $twitter; ?>" alt="<?php _e('Acesse o perfil no Twitter', 'iasd');?>">
									<?php echo $twitter; ?>
								</a>
							</em>
					<?php endif; ?>
					<?php if($facebook = get_post_meta($lider_geral->ID, 'social-networks_facebook', true)): ?>
						<em>Faceboook:
							<a href="http://www.facebook.com/<?php echo $facebook; ?>" alt="<?php _e('Acesse o perfil no Facebook', 'iasd');?>">
								<?php echo $facebook; ?>
							</a>
						</em>
					<?php endif; ?>
					<?php if($email = get_post_meta($lider_geral->ID, 'social-networks_email', true)): ?>
						<em>E-mail:
							<a href="mailto:<?php echo $email; ?>">
								<!--<span class="iasd-icon lideres-email"></span>-->
								<?php echo $email; ?>
							</a>
						</em>
					<?php endif; ?>
				</div>
			</div>
			<hr/>
			<?php endif; ?>

			<span class="xs-landscape">
<?php 
foreach ( $lideres as $lider ): 
	?>
				<div class="col-sm-4 col-md-3">
					<a href="<?php echo esc_url( get_permalink( $lider->ID ) ); ?>">
						<figure class="img-circle">
							<?php

								add_filter('no_default_image', '__return_true');
								$lider_thumb_id = get_post_thumbnail_id($lider->ID);
								$lider_thumb_url = wp_get_attachment_image_src( $lider_thumb_id, 'thumb_124x124' );
								remove_filter('no_default_image', '__return_true');
							?>
							<div class="img-holder" style="background: url(<?php if($lider_thumb_url) echo $lider_thumb_url[0] ?>);" >
								<div class="img-gradient"></div>
							</div>
						</figure>
						<h3><?php echo esc_html( $lider->post_title ); ?></h3>
						<h4><?php echo esc_html( LideresController::get_cargo( $lider->ID ) ); ?></h4>
					</a>
				</div>
			<?php endforeach; // end foreach ?>
			</span>
		</article>
	</section>
</div>

<!-- *************************** -->
<!-- ******* End Content ******* -->
<!-- *************************** -->

<?php get_footer(); ?>
