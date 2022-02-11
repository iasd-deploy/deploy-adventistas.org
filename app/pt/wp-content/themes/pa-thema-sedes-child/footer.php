<?php
if ( ! is_404( ) ){
	do_action( 'footer_content' );

	wp_footer(); ?>

	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/static/lib/iasd-bootstrap.min.js"></script>
	<?php
	if ( FlavoursController::GetFlavour( ) == 'iasd-dsa-home' ){
        echo '<script src="' . get_template_directory_uri() . '/custom_static/iasd-home-dsa.js"></script>';
    }
} ?>

<!-- Hotjar Tracking Code for http://ucb.adventistas.org -->
<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:261691,hjsv:5};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'//static.hotjar.com/c/hotjar-','.js?sv=');
</script>

</body>
</html>