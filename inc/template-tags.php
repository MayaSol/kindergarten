<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package kindergarten
 */

if ( ! function_exists( 'kindergarten_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function kindergarten_posted_on() {
  $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
  if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
    $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
  }

  $time_string = sprintf( $time_string,
    esc_attr( get_the_date( 'c' ) ),
    esc_html( get_the_date() ),
    esc_attr( get_the_modified_date( 'c' ) ),
    esc_html( get_the_modified_date() )
  );

  $svg_icon_time = '<span class="icon-wrapper  icon-wrapper-date">'
  . kindergarten_get_svg( $args = array( 'icon' => 'calendar', 'size' => array('1em','1em')) ) . '</span>';

  $posted_on = sprintf(
    /* translators: %s: post date. */
    esc_html_x( '%s', 'post date', 'kindergarten' ),
    $svg_icon_time . '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' .  $time_string . '</a>'
  );

  $svg_icon_author = '<span class="icon-wrapper  icon-wrapper-author">'
  . kindergarten_get_svg( $args = array( 'icon' => 'person', 'size' => array('1em','1em')) ) . '</span>';

  $byline = sprintf(
    /* translators: %s: post author. */
    esc_html_x( '%s', 'post author', 'kindergarten' ),
    '<span class="author vcard">' . $svg_icon_author . '<a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
  );

  echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

}
endif;

if ( ! function_exists( 'kindergarten_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function kindergarten_entry_footer() {
  // Hide category and tag text for pages.
  if ( 'post' === get_post_type() ) {
    /* translators: used between list items, there is a space after the comma */
    $categories_list = get_the_category_list( esc_html__( ', ', 'kindergarten' ) );
    if ( $categories_list ) {
      /* translators: 1: list of categories. */
      printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'kindergarten' ) . '</span>', $categories_list ); // WPCS: XSS OK.
    }

    /* translators: used between list items, there is a space after the comma */
    $tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'kindergarten' ) );
    if ( $tags_list ) {
      /* translators: 1: list of tags. */
      printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'kindergarten' ) . '</span>', $tags_list ); // WPCS: XSS OK.
    }
  }

  if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
    echo '<span class="comments-link">';
    comments_popup_link(
      sprintf(
        wp_kses(
          /* translators: %s: post title */
          __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'kindergarten' ),
          array(
            'span' => array(
              'class' => array(),
            ),
          )
        ),
        get_the_title()
      )
    );
    echo '</span>';
  }

  edit_post_link(
    sprintf(
      wp_kses(
        /* translators: %s: Name of current post. Only visible to screen readers */
        __( 'Edit <span class="screen-reader-text">%s</span>', 'kindergarten' ),
        array(
          'span' => array(
            'class' => array(),
          ),
        )
      ),
      get_the_title()
    ),
    '<span class="edit-link">',
    '</span>'
  );
}
endif;

if ( ! function_exists( 'kindergarten_contacts' ) ) :

  function kindergarten_contacts() {

    $page = get_page_by_path("contacts");
    if ($page) {
      $id = $page->ID;
    }
    else {
      $id = get_the_ID();
    };

    echo '<section class="contacts-container"> <h2 class="contacts-title">' . esc_html( get_post_meta( $id, 'phone_01_title', true) ) . '</h2>';

    $svg_icon_phone = '<span class="icon-wrapper icon-wrapper-phone">'
    . kindergarten_get_svg( $args = array( 'icon' => 'phone', 'size' => array('1em','1em')) ) . '</span>';
    $tel_01 = esc_html( get_post_meta( $id, 'phone_01_number', true) );
    echo '<p>' . $svg_icon_phone;
    echo '<a class="contacts-phone-tel" href="tel:' . $tel_01 . '">' . $tel_01 . '</a> ';
    echo '<a class="contacts-phone-skype" href="skype:' . $tel_01 . '?call">' . $tel_01 . '</a> </p>';

    echo '<h2 class="contacts-title">' . esc_html( get_post_meta( $id, 'phone_02_title', true) ) . '</h2>';

    $tel_02 = esc_html( get_post_meta( $id, 'phone_02_number', true) );
    echo '<p>' . $svg_icon_phone;
    echo '<a class="contacts-phone-tel" href="tel:' . $tel_02 . '">' . $tel_01 . '</a> ';
    echo '<a class="contacts-phone-skype" href="skype:' . $tel_02 . '?call">' . $tel_02 . '</a> </p>';

    $svg_icon_map = '<p> <span class="icon-wrapper icon-wrapper-map">'
    . kindergarten_get_svg( $args = array( 'icon' => 'map', 'size' => array('1em','1em')) ) . '</span>';
    $address = nl2br( esc_html( get_post_meta( $id, 'address', true) ) );
    echo $svg_icon_map;
    echo $address;
    echo '</p> </section>';

  }

endif;
