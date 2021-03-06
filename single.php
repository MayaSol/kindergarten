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
      <div class="site-main-inner">

    <header class="page-header">
      <h1 class="page-title"><?php echo get_the_title( get_option('page_for_posts', true) ); ?></h1>
    </header>

    <?php
    while ( have_posts() ) : the_post();

      get_template_part( 'template-parts/content', get_post_format() );

      the_post_navigation(array(
        'prev_text' => '<span class="screen-reader-text">Предыдущая запись</span>'.
        '<span class="nav-title  kindergarten-btn"><span class="nav-title-icon-wrapper">'
        . kindergarten_get_svg( $args = array( 'icon' => 'arrow-left') )
        . '</span>%title</span>',
        'next_text' => '<span class="screen-reader-text">Следующая запись</span>'.
        '<span class="nav-title  kindergarten-btn">%title
        <span class="nav-title-icon-wrapper">'
        . kindergarten_get_svg( $args = array( 'icon' => 'arrow-right') )
        . '</span></span>'
        )
      );

      // If comments are open or we have at least one comment, load up the comment template.
      if ( comments_open() || get_comments_number() ) :
        comments_template();
      endif;

      endwhile; // End of the loop.
     ?>

      </div>
    </main><!-- #main -->
  </div><!-- #primary -->

<?php
get_footer();
