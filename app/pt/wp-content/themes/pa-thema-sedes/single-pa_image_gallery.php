<?php get_header(); ?>

<!-- *************************** -->
<!-- ********* Content ********* -->
<!-- *************************** -->

<div class="container">
    <section class="row">
        <article class="col-sm-8 entry-content">
            <header>
                <time><?php the_time('j \d\e F \d\e Y'); ?></time>
                <h1><?php single_post_title(); ?></h1>
                <div class="sharing-links">
                    <?php do_action('sharing_links'); ?>
                </div>
            </header>
            <?php
            if ( have_posts() ) :
                while (have_posts()):
                    the_post();
                    global $post;

                    echo do_shortcode('[iasd_gallery id="'.($post->ID).'"]');

                endwhile;
            endif;

            if($post->post_content != "") {
                echo '<div class="entry-content">';
                the_content();
                echo '</div>';
            }
            ?>
            <hr class="iasd-footer-top">
            <footer>
                <?php /* MARCADORES REMOVIDOS - LOGICA SERA REVISTA (aparecem marcadores repetidos/desnecessários)
				<h2><?php _e('Marcadores:', 'iasd'); ?></h2>
				<nav class="iasd-tags">

					<?php
						$taxonomies = wp_get_object_terms(get_the_ID(), get_taxonomies(array('public' => true)));
						foreach($taxonomies as $taxonomy) :
					?>

							<a href="<?php echo get_term_link($taxonomy); ?>" title="<?php echo $taxonomy->name; ?>"><?php echo $taxonomy->name; ?></a>

					<?php endforeach; ?>

				</nav> */
                ?>
                <?php if ( comments_open() || get_comments_number() ) comments_template(); ?>
                <?php do_action('iasd_disqus_javascript'); ?>
            </footer>

        </article>
        <div class="clearfix visible-xs"></div>
        <aside class="col-sm-4 col-xs-12 mar-top-0-xs iasd-aside">
            <?php do_action('iasd_dynamic_sidebar', 'galeria-de-imagens-lateral'); ?>
        </aside>
    </section>
</div>

<!-- *************************** -->
<!-- ******* End Content ******* -->
<!-- *************************** -->

<?php get_footer(); ?>
