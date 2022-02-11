<?php

class IASDPhotoGallery extends WP_Widget
{

	static function Init()
	{
		register_widget(__CLASS__);
	}

	function __construct()
	{
		$widget_ops = array('classname' => __CLASS__, 'description' => __('Mostra uma galeria de fotos.', 'iasd'));
		parent::__construct(__CLASS__, __('IASD: Galeria de Fotos', 'iasd'), $widget_ops);
	}

	function form($instance)
	{
		$instance = wp_parse_args($instance, array( 'title' => '', 'gallery' => $gallery->ID ));
		$title = strip_tags($instance['title']);
		$galleries_query = new WP_Query (array( 'post_type' => 'pa_image_gallery' ));
		$galleries = $galleries_query->posts;
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('gallery'); ?>"><?php _e( 'Selecione uma galeria:' ); ?></label>
			<select class="widefat" id="<?php echo $this->get_field_id('gallery'); ?>" name="<?php echo $this->get_field_name('gallery'); ?>">
			<?php
			foreach ( $galleries as $gallery ) {
				echo '<option value="' . intval( $gallery->ID ) . '"'
					. selected( $instance['gallery'], $gallery->ID, false )
					. '>' . $gallery->post_title . "</option>\n";
			}
			?>
			</select>
		</p>
		
	<?php
	}

	function getInstance() {
		return $this->instance;
	}

	function setInstance($instance) {
		$this->instance = $instance;
	}

	function getInstanceData($param) {
		if(is_array($this->instance)) {
			if(isset($this->instance[$param])) {
				return $this->instance[$param];
			}
		}

		return '';
	}

	function getWidgetTitle() {
		$title = apply_filters( 'widget_title', $this->getInstanceData('title'), $this->getInstance(), $this->id_base );
		if($title)
			return $title;
		return '';
	}

	function update($new_instance, $old_instance)
	{
		$instance['title'] = strip_tags($new_instance['title']);
		if(!count($new_instance))
			$new_instance = $old_instance;

		return $new_instance;
	}

	function widget($args, $instance)
	{
		$this->setInstance($instance);
?>

<div class="iasd-widget iasd-widget-slider col-md-4">
	<?php if($title = $this->getWidgetTitle()){ echo '<h1>',$title,'</h1>'; }else{ echo '<h1>',__('Galeria de Fotos', 'iasd'),'</h1>'; } ?>
	<div class="owl-carousel galleries">
		<?php 
				$gallery_post_id = $instance['gallery'];
					$args = array(
						'post_type' => 'attachment',
						'numberposts' => -1,
						'post_parent' => $gallery_post_id
					);
					$attachments = get_children( $args );	
					if ( $attachments ) {
						foreach ( $attachments as $attachment ) {
							$thumb_src = wp_get_attachment_image_src($attachment->ID, 'thumb_740x475');
							$attachment_object =  wp_prepare_attachment_for_js( $attachment->ID );
		?>
							<div class="slider-item">
								<a href="<?php echo get_permalink($gallery_post_id); ?>" target="_blank" title="<?php _e('Clique para ver a galeria', 'iasd'); ?>">
									<figure style="background-image: url('<?php echo $thumb_src[0]; ?> ');">
										<img data-src="<?php echo $thumb_src[0]; ?>" alt="<?php echo $attachment_object['title']; ?>" class="lazyOwl img-responsive">
									</figure>
									<h2><?php echo apply_filters('trim', $attachment_object['title'], 50); ?></h2>
									<time><?php echo $attachment_object['dateFormatted']; ?></time>
									<p><?php echo apply_filters('trim', $attachment_object['caption'], 120); ?></p>
								</a>
							</div>
		<?php 
						} 
					} 
			wp_reset_query(); 
		?>
	</div>
	<div class="row">
		<div class="col-md-12">
			<a href="<?php echo get_permalink($gallery_post_id); ?>" title="<?php _e('Clique para ver a galeria', 'iasd'); ?>" class="more-link"><?php _e('Mais imagens &raquo;', 'iasd'); ?></a>
		</div>
	</div>
	<div class="alert alert-danger">
		<strong>Atenção!</strong> O tamanho do Widget selecionado é incompatível com esta Sidebar. Por favor, reveja suas configurações.
	</div>
</div>

		<?php
	}

}

add_action('widgets_init', array('IASDPhotoGallery', 'Init'));