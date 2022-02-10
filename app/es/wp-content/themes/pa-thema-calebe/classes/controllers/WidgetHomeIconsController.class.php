<?php // Creating the widget 
class hi_widget extends WP_Widget {

	function __construct() {
		parent::__construct(
		'hi_widget', 

		__('Home Icon', 'hi_widget_domain'), 

		array( 'description' => __( 'Widget para criação dos botoes na home', 'hi_widget_domain' ), ) 
		);
	}

	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		$hi_icon = apply_filters( 'widget_texto', $instance['hi_icon'] );
		$hi_url = apply_filters( 'widget_url', $instance['hi_url'] );
		echo $args['before_widget'];

		echo '
		<div class="widget col-md-2 text-center">
			<a href="'. $hi_url .'" title="'. $title .'" alt="'. $title .'">
				<figure>
					<img src="'. get_template_directory_uri() . "/flavours/static/img/flavours/missao-calebe/" . $hi_icon .'" alt="'. $title .'">
					<figcaption>'. $title .'</figcaption>
				</figure>
			</a>
		</div>'
		;
		echo $args['after_widget'];
	}
			
	public function form( $instance ) {
		$title = $instance[ 'title' ];
		$hi_icon = $instance[ 'hi_icon' ];
		$hi_url = $instance[ 'hi_url' ];

		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Titulo:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>"  type="text" value="<?php echo esc_attr( $title ); ?>"/>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'hi_icon' ); ?>"><?php _e( 'Icone:' ); ?></label> 
			<select id="<?php echo $this->get_field_id( 'hi_icon' ); ?>" name="<?php echo $this->get_field_name( 'hi_icon' ); ?>">
				<option value="01.png" <?php if ( esc_attr( $hi_icon ) == "01.png" ) { echo 'selected="selected"'; } ?>>Lápis</option>
				<option value="02.png" <?php if ( esc_attr( $hi_icon ) == "02.png" ) { echo 'selected="selected"'; } ?>>Seta</option>
				<option value="03.png" <?php if ( esc_attr( $hi_icon ) == "03.png" ) { echo 'selected="selected"'; } ?>>Reciclável</option>
				<option value="04.png" <?php if ( esc_attr( $hi_icon ) == "04.png" ) { echo 'selected="selected"'; } ?>>Lampada</option>
				<option value="05.png" <?php if ( esc_attr( $hi_icon ) == "05.png" ) { echo 'selected="selected"'; } ?>>Exclamação</option>
				<option value="06.png" <?php if ( esc_attr( $hi_icon ) == "06.png" ) { echo 'selected="selected"'; } ?>>Chaves</option>
			</select>

			<textareas class="widefat" id="<?php echo $this->get_field_id( 'hi_icon' ); ?>" name="<?php echo $this->get_field_name( 'hi_icon' ); ?>" rows="4" ><?php echo esc_attr( $hi_icon ); ?></textarea>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'hi_url' ); ?>"><?php _e( 'Url botão:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'hi_url' ); ?>" name="<?php echo $this->get_field_name( 'hi_url' ); ?>" type="text" value="<?php echo esc_attr( $hi_url ); ?>" />
		</p>
		<?php 
	}
		
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['hi_icon'] = ( ! empty( $new_instance['hi_icon'] ) ) ? strip_tags( $new_instance['hi_icon'] ) : '';
		$instance['hi_url'] = ( ! empty( $new_instance['hi_url'] ) ) ? strip_tags( $new_instance['hi_url'] ) : '';
		return $instance;
	}
} // Class hi_widget ends here

// Register and load the widget
function wpb_load_HomeIcon() {
	register_widget( 'hi_widget' );
}
add_action( 'widgets_init', 'wpb_load_HomeIcon' );


