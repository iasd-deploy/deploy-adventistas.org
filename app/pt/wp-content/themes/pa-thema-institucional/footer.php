<?php
if(!is_404()){
  do_action('footer_content');
?>
    <?php wp_footer(); ?>

<script src="<?php echo get_template_directory_uri(); ?>/static/lib/iasd-bootstrap.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/static/js/masonry.pkgd.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/static/js/mediaelement-and-player.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/static/js/institutional.js"></script>

<?php } ?>
  </body>

</html>
