<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package kindergarten
 */

get_header();?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>

			<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content-short', get_post_format() );

			endwhile;

			the_posts_navigation(array(
        'prev_text' => '<span class="screen-reader-text">Предыдущие</span>'.
        '<span class="nav-title  kindergarten-btn"><span class="nav-title-icon-wrapper"><svg class="icon icon-arrow-left" "aria-hidden="true" role="img"> <use href="" xlink:href=""></use> </svg></span>Предыдущие</span>',
        'next_text' => '<span class="screen-reader-text">Следующие</span>'.
        '<span class="nav-title  kindergarten-btn"><span class="nav-title-icon-wrapper"><svg class="icon icon-arrow-right" "aria-hidden="true" role="img"> <use href="" xlink:href=""></use> </svg></span>Следующие</span>')
      );

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
