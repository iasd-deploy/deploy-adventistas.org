<?php
if(!is_404()){
	do_action('footer_content');
    wp_footer();
?>
<script src="<?php echo get_template_directory_uri(); ?>/static/lib/iasd-bootstrap.js"></script>
<?php
    if(FlavoursController::GetFlavour() == 'missao-calebe')
        echo '<script src="' . get_template_directory_uri() . '/custom_static/iasd-home-dsa.js"></script>';
}
?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&appId=579965948739249&version=v2.0";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

	</body>
</html>
