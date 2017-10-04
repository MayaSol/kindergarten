<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package kindergarten
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main  page-archive">

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'short' );

			endwhile;

			the_posts_navigation(array(
        'prev_text' => '<span class="screen-reader-text">Предыдущие</span>'.
        '<span class="nav-title  kindergarten-btn"><span class="nav-title-icon-wrapper"><svg class="icon icon-arrow-left" "aria-hidden="true" role="img"> <use href="" xlink:href=""></use> </svg></span>Предыдущие</span>',
        'next_text' => '<span class="screen-reader-text">Следующие</span>'.
        '<span class="nav-title  kindergarten-btn"><span class="nav-title-icon-wrapper"><svg class="icon icon-arrow-right" "aria-hidden="true" role="img"> <use href="" xlink:href=""></use> </svg></span>Следующие</span>'));

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
