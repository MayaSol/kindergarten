<?php
/**
 * The front-page template file
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package kindergarten
 */

get_header(); ?>

  <div class="slider  slider-main">
    <div class="slider__toggles-wrapper">
      <ul class="slider__toggles">
        <li class="slider__toggle  slider__toggle--active"></li>
        <li class="slider__toggle"></li>
        <li class="slider__toggle"></li>
        <li class="slider__toggle"></li>
      </ul>
    </div>
    <div class="slider__btns">
      <a class="slider__btn  slider__btn--prev"></a>
      <a class="slider__btn  slider__btn--next"></a>
    </div>
  </div>

  <div id="primary" class="content-area">
    <main id="main" class="site-main">

<?php
    $args = [
    "post_name__in"      => ["about","timetable","contacts"],
    "post_type"          => "page",
    "ignore_sticky_posts" => 1,
    "orderby" => "post_name__in"
    ];

    $the_query = new WP_Query( $args );

    $query_s = $the_query -> request;

    if ( $the_query->have_posts() ) :

      /* Start the Loop */
      while ( $the_query->have_posts() ) : $the_query->the_post();

        /*
         * Include the Post-Format-specific template for the content.
         * If you want to override this in a child theme, then include a file
         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
         */

        get_template_part( "template-parts/content","short" );

      endwhile;

    endif;

/*    wp_reset_postdata();

    $the_query = new WP_Query("posts_per_page=1");

    if ( $the_query->have_posts() ) :

      /* Start the Loop */
 /*     while ( $the_query->have_posts() ) : $the_query->the_post();

        /*
         * Include the Post-Format-specific template for the content.
         * If you want to override this in a child theme, then include a file
         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
         */

/*        get_template_part( "template-parts/content","short" );

      endwhile;

    endif;*/
    ?>

    </main><!-- #main -->
  </div><!-- #primary -->

<?php
get_footer();
