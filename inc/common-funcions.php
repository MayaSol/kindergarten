<?php

if ( ! function_exists( 'kindergarten_word_to_letters' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function kindergarten_word_to_letters($word) {

  $arr = preg_split('//u',$word,-1,PREG_SPLIT_NO_EMPTY);

//  $arr_out = print_r($arr,true);
//  error_log('kindergarten_word_to_letters ' . $arr_out);

  foreach ( $arr as $letter ) {
    echo '<span>' . $letter . '</span>';
  }

}

endif;

?>
