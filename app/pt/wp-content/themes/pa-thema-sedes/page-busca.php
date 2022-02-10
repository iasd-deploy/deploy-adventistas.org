<?php

	/* Template name: Página - Busca Google */

	get_header(); 
	if(have_posts())
		the_post();

	if(WPLANG == "pt_BR"){
		$cx = "006860825493368957871:p9wqtl81gds";
	} else {
		$cx = "006860825493368957871:dhhtt8i5dmk";
	}
?>
<!-- *************************** -->
<!-- ********* Content ********* -->
<!-- *************************** -->
<div class="container">
	<section class="row">
		<article class="col-md-12 entry-content">
			<header>
				<h1 class="iasd-main-title"><?php single_post_title(); ?>: <?php echo $_GET['q']; ?></h1>
			</header>
			<form method="get" action="<?php echo site_url(); ?>/busca/?" class="search_form">
				<div class="input-group">
					<input type="text" name="q" class="form-control" value="<?php echo $_GET['q']; ?>">
					<span class="input-group-btn">
					<button class="btn btn-default" type="submit"><?php _e('Buscar', 'iasd'); ?></button>
					</span>
				</div>
			</form>
			<content>
				<script>
				(function() {
					var cx = "<?php echo $cx; ?>";
					var gcse = document.createElement('script');
					gcse.type = 'text/javascript';
					gcse.async = true;
					gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
					var s = document.getElementsByTagName('script')[0];
					s.parentNode.insertBefore(gcse, s);
				})();
				</script>
				<gcse:searchresults-only></gcse:searchresults-only>
			</content>
		</article>
	</section>
</div>

<!-- *************************** -->
<!-- ******* End Content ******* -->
<!-- *************************** -->

<?php get_footer(); ?>