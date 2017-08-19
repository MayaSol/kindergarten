<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package kindergarten
 */

?>

<?php
  if (is_front_page()) {
    $kindergarden_classes[] = "post-short--front";
  }
?>

<article id="post-<?php the_ID(); ?>" <?php post_class($kindergarden_classes); ?> >
  <header class="entry-header">
    <?php
      the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
    ?>
  </header><!-- .entry-header -->


  <div class="entry-content">

    <?php
      the_post_thumbnail("thumbnail");
      the_excerpt( sprintf(
        wp_kses(
          /* translators: %s: Name of current post. Only visible to screen readers */
          __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'kindergarten' ),
          array(
            'span' => array(
            'class' => array(),
            ),
          )
        ),
        get_the_title()
      ) );

      wp_link_pages( array(
        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'kindergarten' ),
        'after'  => '</div>',
      ) );

      if (($post->post_name) == "contacts")
      {
        $read_more_text = "Как добраться...";
      }
      else {
        $read_more_text = "Подробнее...";
      };
    ?>

    <a href="<?php echo get_permalink(); ?>" class="kindergarten-btn"> <?php echo $read_more_text ?></a>
  </div><!-- .entry-content -->


</article><!-- #post-<?php the_ID(); ?> -->
