<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package kindergarten
 */

?>

  </div><!-- #content -->

  <div class="site-decor">
  </div>

  <footer id="colophon" class="site-footer">

    <div class="site-footer__row-top">
      <div class="site-footer__inner">

        <div class="socials">
          <?php
            wp_nav_menu( array(
              'theme_location' => 'socials-menu',
              'menu_id'        => 'socials',
              'link_before'    => '<span class="screen-reader-text">',
              'link_after'     => '</span>'
            ) );
          ?>
        </div>

        <div class="menu-secondary">
          <?php
            wp_nav_menu( array(
              'theme_location' => 'secondary-menu',
              'menu_id'        => 'secondary'
            ) );
          ?>
        </div>

      </div>
    </div>

    <div class="site-footer__row-bottom">
      <div class="site-footer__inner">

      <div class="site-info">
        <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'kindergarten' ) ); ?>"><?php
          /* translators: %s: CMS name, i.e. WordPress. */
          printf( esc_html__( 'Proudly powered by %s', 'kindergarten' ), 'WordPress' );
        ?></a>
        <span class="sep"> | </span>
        <?php
          /* translators: 1: Theme name, 2: Theme author. */
          printf( esc_html__( 'Theme: %1$s by %2$s.', 'kindergarten' ), 'kindergarten', '<a href="https://automattic.com/">Underscores.me</a>' );
        ?>
        </div>
      </div><!-- .site-info -->

    </div>

  </footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Afbfa40cb8d4cf3bbd42f863df7f8e57a89c71ec4e2425e68ecb86b5f0b7ad452&amp;width=100%25&amp;height=249&amp;id=map&amp;lang=ru_RU&amp;scroll=true"></script>
<script type="text/javascript" charset="utf-8" async>
jQuery(document).ready(function(){
  jQuery('.owl-carousel').owlCarousel({
    items:1,
    dotsContainer: '#slider-dots',
    navContainer: '#slider-nav',
    nav:true,
    loop:true,
    autoplay: true,
    autoplayTimeout:4000,
    animateOut: 'fadeOut'
  });
});
</script>

<!--script type="text/javascript" charset="utf-8" async>
jQuery(document).ready(function(){
  jQuery('.owl-carousel').owlCarousel({
    responsive: {
      0:{items:1}
    },
    nav: true
  });
});
</script-->


</body>
</html>
