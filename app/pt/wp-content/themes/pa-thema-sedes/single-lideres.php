<?php
	get_header(); 

	if(have_posts())
		the_post();

	global $post;
	$post_type = get_post_type_object($post->post_type);
	$archive_link = get_post_type_archive_link( $post->post_type );

	$post_title = get_the_title();
	$post_link = get_permalink();

?>

<div class="container">
	<section class="row">
		<article class="col-md-12  iasd-author-list">
			<header>
				<h1 class="iasd-main-title"><?php _e('Líderes', 'iasd'); ?></h1>
			</header>
			<div class="row entry-content">
				<div class="col-sm-3 col-md-2">
					<figure class="img-circle active">
						<?php
							add_filter('no_default_image', '__return_true');
							$lider_thumb_id = get_post_thumbnail_id($post->ID);
							$lider_thumb_url = wp_get_attachment_image_src( $lider_thumb_id, 'thumb_124x124' );
							remove_filter('no_default_image', '__return_true');
						?>
						<div class="img-holder" style="background: url(<?php if($lider_thumb_url) echo $lider_thumb_url[0] ?>);" >
							<div class="img-gradient"></div>
						</div>
					</figure>
				</div>
				<div class="col-sm-9 col-md-10">
					<h1><?php single_post_title(); ?></h1>
					<h2><?php echo esc_html( LideresController::get_cargo( $post->ID ) ); ?></h2>
					<?php the_content(); ?>
					<?php if($twitter = get_post_meta($post->ID, 'social-networks_twitter', true)): ?>
						<em>Twitter: 
							<a href="http://www.twitter.com/<?php echo $twitter; ?>" alt="<?php _e('Acesse o perfil no Twitter', 'iasd'); ?>">
								<?php echo $twitter; ?>
							</a>
						</em>
					<?php endif; ?>
					<?php if($facebook = get_post_meta($post->ID, 'social-networks_facebook', true)): ?>
						<em>Faceboook: 
							<a href="http://www.facebook.com/<?php echo $facebook; ?>" alt="<?php _e('Acesse o perfil no Facebook', 'iasd'); ?>">
								<?php echo $facebook; ?>
							</a>
						</em>
					<?php endif; ?>
					<?php if($email = get_post_meta($post->ID, 'social-networks_email', true)): ?>
						<em>E-mail: 
							<a href="mailto:<?php echo $email; ?>">
								<?php echo $email; ?>
							</a>
						</em>
					<?php endif; ?>
				</div>
			</div>
		</article>

<?php
$child_query = new WP_Query( array('post_type' => 'lideres', 'post_parent' => $post->ID ) );

if ( $child_query->have_posts() ) :
	while ( $child_query->have_posts() ):
		$child_query->the_post();
		?>
		<div class="col-md-10 col-md-offset-2 col-sm-9 col-sm-offset-3">
			<div class="iasd-author-small">
				<figure class="img-circle active">
						<?php
							add_filter( 'no_default_image', '__return_true' );
							$lider_thumb_id = get_post_thumbnail_id( $post->ID );
							$lider_thumb_url = wp_get_attachment_image_src( $lider_thumb_id, 'thumb_124x124' );
							remove_filter( 'no_default_image', '__return_true' );
						?>
						<div class="img-holder" style="background: url(<?php if ( $lider_thumb_url ) echo esc_url( $lider_thumb_url[0] ) ?>);" >
							<div class="img-gradient"></div>
						</div>
				</figure>
				<div class="info">
					<h3><?php the_title() ?></h3>
					<h4><?php echo esc_html( LideresController::get_cargo( $post->ID ) ); ?></h4>
					<?php if ( $email = get_post_meta( $post->ID, 'social-networks_email', true ) ): ?>
						<em>E-mail: 
							<a title="<?php _e( 'Enviar e-mail', 'iasd' ); ?>" href="mailto:<?php echo esc_attr( $email ); ?>">
								<?php echo esc_html( $email ); ?>
							</a>
						</em>
					<?php endif; ?>
				</div>
			</div>
		</div>		
		<?php
	endwhile;
endif;
?>
	</section>
	<div class="row">
		<div class="container">
			<div class="single" id="iasd-page-prevnext">
				<div class="page-prevnext">
					<a href="<?php echo esc_url( $archive_link ); ?>" class="single" title="<?php _e( 'Clique para voltar a lista de líderes', 'iasd' ); ?>"><div class="btn btn-default">«</div></a>
					<a href="<?php echo esc_url( $archive_link ); ?>" class="single" title="<?php _e( 'Clique para voltar a lista de líderes', 'iasd' ); ?>"><?php _e( 'Voltar', 'iasd' ); ?><span class="hidden-xs"> <?php _e( 'para Lista de Líderes', 'iasd' ); ?></span></a>
				</div>
			</div>
		</div>
	</div>		
</div>

<?php get_footer(); ?>