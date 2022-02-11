<?php // Creating the widget 
class tmc_widget extends WP_Widget {

	function __construct() {
		parent::__construct(
		'tmc_widget', 

		__('Terra de Calebe', 'tmc_widget_domain'), 

		array( 'description' => __( 'Widget para inserção correta do texto na seção Terra de Calebe', 'tmc_widget_domain' ), ) 
		);
	}

	public function widget( $args, $instance ) {
		$tmc_title = apply_filters( 'widget_title', $instance['tmc_title'] );
		$tmc_texto = apply_filters( 'widget_texto', $instance['tmc_texto'] );
		$tmc_botao = apply_filters( 'widget_botao', $instance['tmc_botao'] );
		$tmc_url = apply_filters( 'widget_url', $instance['tmc_url'] );
		echo $args['before_widget'];

		echo '
		<div class="widget col-md-7">
			<h2>'. $tmc_title .'</h2>
			<p>'. $tmc_texto .'</p>
			<a href="'. $tmc_url .'" class="btn btn-lg btn-maps" >'. $tmc_botao .'</a>
		</div>'
		;
		echo $args['after_widget'];
	}
			
	public function form( $instance ) {
		$tmc_title = $instance[ 'tmc_title' ];
		$tmc_texto = $instance[ 'tmc_texto' ];
		$tmc_botao = $instance[ 'tmc_botao' ];
		$tmc_url = $instance[ 'tmc_url' ];

		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'tmc_title' ); ?>"><?php _e( 'Titulo:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'tmc_title' ); ?>" name="<?php echo $this->get_field_name( 'tmc_title' ); ?>"  type="text" value="<?php echo esc_attr( $tmc_title ); ?>"/>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'tmc_texto' ); ?>"><?php _e( 'Texto:' ); ?></label> 
			<textarea class="widefat" id="<?php echo $this->get_field_id( 'tmc_texto' ); ?>" name="<?php echo $this->get_field_name( 'tmc_texto' ); ?>" rows="4" ><?php echo esc_attr( $tmc_texto ); ?></textarea>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'tmc_botao' ); ?>"><?php _e( 'Texto botão:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'tmc_botao' ); ?>" name="<?php echo $this->get_field_name( 'tmc_botao' ); ?>" type="text" value="<?php echo esc_attr( $tmc_botao ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'tmc_url' ); ?>"><?php _e( 'Url botão:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'tmc_url' ); ?>" name="<?php echo $this->get_field_name( 'tmc_url' ); ?>" type="text" value="<?php echo esc_attr( $tmc_url ); ?>" />
		</p>
		<?php 
	}
		
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['tmc_title'] = ( ! empty( $new_instance['tmc_title'] ) ) ? strip_tags( $new_instance['tmc_title'] ) : '';
		$instance['tmc_texto'] = ( ! empty( $new_instance['tmc_texto'] ) ) ? strip_tags( $new_instance['tmc_texto'] ) : '';
		$instance['tmc_botao'] = ( ! empty( $new_instance['tmc_botao'] ) ) ? strip_tags( $new_instance['tmc_botao'] ) : '';
		$instance['tmc_url'] = ( ! empty( $new_instance['tmc_url'] ) ) ? strip_tags( $new_instance['tmc_url'] ) : '';
		return $instance;
	}
} // Class tmc_widget ends here

// Register and load the widget
function wpb_load_widget() {
	register_widget( 'tmc_widget' );
}
add_action( 'widgets_init', 'wpb_load_widget' );


