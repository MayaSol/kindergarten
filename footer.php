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

	<footer id="colophon" class="site-footer">

<h1>Footer</h1>

    <div class="socials">
      <?php
        wp_nav_menu( array(
          'theme_location' => 'socials-menu',
          'menu_id'        => 'socials',
        ) );
      ?>
    </div>
    <div class="main-menu  main-menu--second">
      <?php
        wp_nav_menu( array(
          'theme_location' => 'secondary-menu',
          'menu_id'        => 'secondary',
        ) );
      ?>
    </div>
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
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
