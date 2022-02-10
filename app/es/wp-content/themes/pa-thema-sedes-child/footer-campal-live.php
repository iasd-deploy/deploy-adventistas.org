<?php
	do_action( 'footer_content' );
	wp_footer();
?>
	</body>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/static/lib/iasd-bootstrap.min.js"></script>
	<script src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/custom_static/campal-live/js/campal-live.js"></script>

	<!-- social media includes -->
    <script src="https://apis.google.com/js/platform.js" async defer>{lang: 'pt-BR'}</script>
	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>

	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-37179104-7', 'auto');
	  ga('send', 'pageview');

	</script>
</html>