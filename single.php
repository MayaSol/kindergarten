<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package kindergarten
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_format() );

			the_post_navigation(array(
        'prev_text' => '<span class="screen-reader-text">Предыдущая запись</span>'.
        '<span class="nav-title  kindergarten-btn"><span class="nav-title-icon-wrapper"><svg class="icon icon-arrow-left" "aria-hidden="true" role="img"> <use href="" xlink:href=""></use> </svg></span>%title</span>',
        'next_text' => '<span class="screen-reader-text">Следующая запись</span>'.
        '<span class="nav-title  kindergarten-btn"><span class="nav-title-icon-wrapper"><svg class="icon icon-arrow-right" "aria-hidden="true" role="img"> <use href="" xlink:href=""></use> </svg></span>%title</span>')
      );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
