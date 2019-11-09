<?php

/**
 * Public functions for developers
 *
 * @link       http://wordpress.org/plugins/rate-my-post/
 * @since      2.5.0
 *
 * @package    Rate_My_Post
 * @subpackage Rate_My_Post/includes
 */

 //returns average rating for any post
 function rmp_get_avg_rating( $postID = false ) {
   if ( !$postID ) {
     $postID = get_the_id();
   }

   $sum = intval( get_post_meta(  $postID, 'rmp_rating_val_sum', true ) );
   $votes = intval( get_post_meta(  $postID, 'rmp_vote_count', true ) );

   if( $sum && $votes && $postID ) {
     return round( ($sum / $votes), 1 );
   } else {
     return false;
   }
 }

 //returns vote count for any post
 function rmp_get_vote_count( $postID = false ) {
   if ( !$postID ) {
     $postID = get_the_id();
   }

   $votes = intval( get_post_meta(  $postID, 'rmp_vote_count', true ) );

   if ( $votes ) {
     return $votes;
   } else {
     return false;
   }
 }
