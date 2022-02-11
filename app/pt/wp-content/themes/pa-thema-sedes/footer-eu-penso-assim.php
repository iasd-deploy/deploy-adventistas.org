<?php
	do_action( 'footer_content' );
	wp_footer();
?>
	</body>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/static/lib/iasd-bootstrap.min.js"></script>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/custom_eupensoassim/js/instafeed.min.js"></script>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/custom_eupensoassim/fancybox/jquery.fancybox.js?v=2.1.5"></script>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/custom_eupensoassim/fancybox/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/custom_eupensoassim/js/script.js"></script>
	<script>
	$(window).load(function(){
		var feed = new Instafeed({
	        get: 'tagged',
	        tagName: '<?php the_field("hashtag"); ?>',
	        clientId: '584a9e46583e4f0da21df46ec2e68306',
	        resolution: 'low_resolution',
	        target: 'instafeed',
	        template: '<li><a href="{{link}}" target="_blank"><img src="{{image}}" /></a></li>',
	        limit: 9
	    });
	    feed.run();
	});
    </script>
    
    <!-- social media includes -->
    <script src="https://apis.google.com/js/platform.js" async defer>{lang: 'pt-BR'}</script>
	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
</html>