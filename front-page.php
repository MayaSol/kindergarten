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

    <div class="owl-carousel">

    <?php
      $args = array (
        'post_parent' => $post->ID,
        'post_type' => 'attachment',
        'orderby' => 'menu_order', // you can also sort images by date or be name
        'order' => 'ASC',
        'numberposts' => 5, // number of images (slides)
        'post_mime_type' => 'image'
      );
      if ( $images = get_children( $args ) ) {
        foreach( $images as $image ) {
          echo '<div class="item">
            <svg width="670" height="397" viewBox="0 0 670 397">
              <defs>
                <clipPath id="cloudView">
                  <path d="m 544.4101,92.564782 a 134.41933,134.37182 0 0 0 -47.91403,5.353731 l -0.66118,-0.616896 A 157.75923,157.70347 0 0 0 225.78406,60.618709 C 218.79751,59.473056 211.65669,58.635849 204.40568,58.129118 97.998631,50.858629 6.622578,119.59777 0.34130095,211.62449 -5.9399757,303.67328 75.231753,384.19943 181.6388,391.46992 c 38.45905,2.64381 74.93453,-4.64871 106.1646,-19.38798 A 172.48166,172.4207 0 0 0 365.53696,396.58129 172.65798,172.59695 0 0 0 491.11842,354.41245 134.77196,134.72433 0 0 0 669.683,236.23401 134.794,134.74636 0 0 0 544.38806,92.564782 Z"/>
                </clipPath>
              </defs>
              <image width="670" height="397" xlink:href="' .
              wp_get_attachment_url( $image->ID ) . '" clip-path="url(#cloudView)" preserveAspectRatio="xMidYMid slice"></image>' .
            '</svg>
          </div>';
        }
      }
      ?>

    </div>

      <div class="slider__dots-wrapper">
        <ul id="slider-dots" class="owl-dots slider__dots">
        </ul>
      </div>
      <div id="slider-nav" class="owl-nav  slider__nav-wrapper">
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
