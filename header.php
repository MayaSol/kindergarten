<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package kindergarten
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="noindex">
  <link rel="profile" href="http://gmpg.org/xfn/11">

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
  <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'kindergarten' ); ?></a>

  <header id="masthead" class="site-header">
    <div class="site-branding">

      <?php
        the_custom_logo();
      ?>
        <h1 class="site-title">
          <a class="site-title-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php kindergarten_word_to_letters(get_bloginfo( 'name' )); ?></a>
          <a class="kindergarten-menu-toggle"></a>
        </h1>

        <?php
        $description = get_bloginfo( 'description', 'display' );
        if ( $description || is_customize_preview() ) : ?>
          <p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
        <?php
        endif;
        ?>

    </div><!-- .site-branding -->

    <nav id="site-navigation" class="main-navigation">
      <?php
        wp_nav_menu( array(
          'theme_location' => 'main-menu',
          'menu_id'        => 'primary-menu',
          'menu_class'      => 'menu  primary-menu--top'
        ) );
      ?>
    </nav><!-- #site-navigation -->

  </header><!-- #masthead -->


  <div id="content" class="site-content">
