<?php
if ( ! is_404( ) ){
	do_action( 'footer_content' );
	wp_footer();

	?>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/static/lib/iasd-bootstrap.min.js"></script>
	<?php
	if ( FlavoursController::GetFlavour( ) == 'iasd-dsa-home' ){
        echo '<script src="' . get_template_directory_uri() . '/custom_static/iasd-home-dsa.js"></script>';
    }
}
?>
	</body>

</html>
