<?php	
	include 'header.php';
?>
<!-- *************************** -->
<!-- ********* Content ********* -->
<!-- *************************** -->
<section class="">
	<div class="container">
		<div class="row text-center">
			<div class="players col-md-8">
				<?php the_field('primary_player'); ?>
			</div>
			<div class="chat col-md-4">
				<iframe src="<?php the_field('chatroll'); ?>" width="100%" height="400px" frameborder="0"></iframe>
			</div>
		</div>
	</div>  
</section>

<section class="">
	<div class="container">
		<div class="row">
			<?php if ( $enable_videos ) { ?>
			<div class="videos col-md-8">
				<h1 class="iasd-main-title"><?php _e( 'Video gallery', 'iasd' );?></h1>
				<div class="row text-center">
					<?php
					$videos_query = new WP_Query(
						array(
							'post_type' => 'videos_cpt', 
							'posts_per_page' => $n_videos, 
							'order' => 'DESC'
						)
					);

					while ( $videos_query->have_posts() ) : $videos_query->the_post();

					$eventID = get_field('evento');

					if ( in_array($postID, $eventID) ) {

					?>
					<div class="video col-md-4">
						<a href="<?php echo get_permalink($post->ID); ?>">
							<figure>
								<?php echo get_the_post_thumbnail( $post_id, 'thumb_293x185', array( 'class' => 'img-thumbnail' ) ); ?>
								<figcaption><h5><?php the_title(); ?></h5></figcaption>
							</figure>
						</a>
					</div>
					<?php
					}
						endwhile;
						wp_reset_query();
					?>
					<div class="clearfix"></div>
					<div class="col-md-12">
						<a href="<?php echo get_post_type_archive_link( 'videos_cpt'); ?>" title="<?php _e( 'See more', 'iasd' );?>" class="more-link text-left"><?php _e( 'See all videos', 'iasd' );?> »</a>
					</div>
				</div>
			</div>
			<?php } ?>
			<?php if( $enable_program ) { ?>
			<div class="schedule col-md-4">
				<h1 class="iasd-main-title"><?php _e( 'Program', 'iasd' );?></h1>
				<div class="">
					<?php 
						if( have_rows('schedule') ){
							while ( have_rows('schedule') ) : the_row();
								if (get_sub_field('enable')) {
					?>
					<table class="table table-condensed">
						<thead>
							<tr>
								<th class="period"><?php the_sub_field('period'); ?></th>
								<th class="time"><?php _e( 'Time', 'iasd' );?></th>
							</tr>
						</thead>
						<tbody>
							<?php
								while ( have_rows('event') ) : the_row();
							?>
							<tr>
								<th><?php the_sub_field('event'); ?></th>
								<td><?php the_sub_field('time'); ?></td>
							</tr>					
							<?php
								endwhile;
							?>
						</tbody>
					</table>
					<?php
								} //endif
							endwhile;
						} //endif
					?>
				</div>
			</div>
			<?php } ?>
			<?php 
				$slug = $post->post_name;

				if (is_active_sidebar( $slug .'-sidebar' )) {
					dynamic_sidebar( $slug .'-sidebar' );
				}
			?>
		</div>
	</div>  
</section>
<!-- *************************** --> 
<!-- ******* End Content ******* --> 
<!-- *************************** -->
<?php if ( comments_open() ) { ?>
<section class="disqus">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 class="iasd-main-title"><?php _e( 'Comments', 'iasd' );?></h1>
				<?php comments_template(); ?>
			</div>
		</div>
	</div>
</section>
<?php } ?>

<?php 
	include 'footer.php';
?>
