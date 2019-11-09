<?php

/**
 * The public-specific functionality of the plugin.
 *
 * @link       http://wordpress.org/plugins/rate-my-post/
 * @since      2.0.0
 *
 * @package    Rate_My_Post
 * @subpackage Rate_My_Post/admin/inc
 */

class Rate_My_Post_Admin_Helper {

  //define post types that can have ratings - exclude attacments
  public static function define_post_types() {
    $args = array(
      'public'       => true,
    );
    $registeredPostTypes = get_post_types( $args );
    if ( array_search('attachment', $registeredPostTypes ) !== false ) {
      unset($registeredPostTypes['attachment']);
    }
     //display stats for these post types - they are public
    $queriablePostTypes = array_values($registeredPostTypes);
     //return an array of posts where rmp might be used
    return $queriablePostTypes;
   }

   //returns a string of custom post types or false if none - used in plugin options
   public static function custom_post_types() {
     $args = array(
       'public'       => true,
     );
     $registeredPostTypes = get_post_types( $args );
     //remove default wordpress post types
     if ( array_search('attachment', $registeredPostTypes ) !== false ) {
       unset($registeredPostTypes['attachment']);
     }
     if ( array_search('page', $registeredPostTypes ) !== false ) {
       unset($registeredPostTypes['page']);
     }
     if ( array_search('post', $registeredPostTypes ) !== false ) {
       unset($registeredPostTypes['post']);
     }

     //array of custom post types
     $customPostTypes = array_values($registeredPostTypes);
     if ( !empty( $customPostTypes ) ) {
       //return a string of custom post types, shorten it before just in case somebody has million custom post types registered
       return substr( implode(', ', $customPostTypes), 0, 100 );
     } else { //array is empty - no custom post types
       return false;
     }
   }

   //feedback for meta boxes
   public static function feedbacks() {
     //get feedback before version 2.7.0
     $oldFeedback = get_post_meta( get_the_id(), 'rmp_feedback_val', true );
     //get feedback after version 2.7.0
     $feedback = get_post_meta( get_the_id(), 'rmp_feedback_val_new', true );

     //feedback before 2.7 has to be restructured to new format
     if ( $oldFeedback && !is_array( $oldFeedback ) ) { //there is feedback but in string format - upgrade to current structure
       $oldFeedback = str_replace( '<b>Feedback:</b> ','', $oldFeedback );
       $oldFeedback = explode( '<br />', $oldFeedback );

       foreach ( $oldFeedback as $key => $value ) {
         if ( $value ) {
           $oldFeedback[$key] = array(
             'feedback' => $value,
             'time'     => false,
             'id'       => false,
             'user'     => false,
             'ratingID' => false,
           );
         } else {
           unset( $oldFeedback[$key] );
         }
       }
     } //end of restructuring

     //merge old and new feedback
     $mergedFeedback = array();
     //add old feedback
     if( is_array( $oldFeedback ) && !empty( $oldFeedback ) ) {
       foreach( $oldFeedback as $singleOldFeedback ) {
         $mergedFeedback[] = $singleOldFeedback;
       }
     }
     //add new feedback
     if( is_array( $feedback ) && !empty( $feedback ) ) {
       foreach ( $feedback as $singleFeedback ) {
         $mergedFeedback[] = $singleFeedback;
       }
     }

     if ( !empty( $mergedFeedback ) ) {
       return $mergedFeedback;
     }

     return false;
   }

   //average rating for meta boxes
   public static function meta_box_average_rating() {
     //number of votes
     $votes = intval( get_post_meta( get_the_id(), 'rmp_vote_count', true ) );
     //sum of ratings
     $ratingSum = intval( get_post_meta( get_the_id(), 'rmp_rating_val_sum', true ) );
     //average rating
     if( intval($votes) ) {
       $avgRating = round( $ratingSum / $votes, 1 );
     } else {
       $avgRating = 'n/a';
     }

     return $avgRating;
   }

 //generate rows for table in stats section
   public static function stats_rows() {
     $rmpPostsArray = array();
     //args for the loop
     $args = array(
        'fields'          => 'ids',
        'post_type'       => self::define_post_types(),
        'posts_per_page'  => -1
     );
     $the_query = new WP_Query( $args );
     // The Loop
     if ( $the_query->have_posts() ) {
       while ( $the_query->have_posts() ) {
         $the_query->the_post();
         //data we'll need
         $postID = get_the_ID();
         $title = get_the_title();
         $editLink = get_edit_post_link( $postID );
         $votes = intval( get_post_meta( get_the_ID(), 'rmp_vote_count', true ) );
         $sum = intval( get_post_meta( get_the_ID(), 'rmp_rating_val_sum', true ) );
         $feedback = get_post_meta( get_the_ID(), 'rmp_feedback_val', true );
         $newFeedback = get_post_meta( get_the_ID(), 'rmp_feedback_val_new', true );
         //push to array
         $rmpPostsArray[$postID]['title'] = $title;
         $rmpPostsArray[$postID]['edit'] = $editLink;
         $rmpPostsArray[$postID]['votes'] = $votes;
         $rmpPostsArray[$postID]['sum'] = $sum;
         //calculate feedback count
         if( $feedback !== '' ) {
           $feedbackArray = explode( '<br />', $feedback );
           $feedbackNumber = count( $feedbackArray ) - 1;
         } else {
           $feedbackNumber = 0;
         }
         //calculate new feedback count
         if ( $newFeedback && is_array( $newFeedback ) && !empty( $newFeedback ) ) {
           $newFeedbackNumber = count( $newFeedback );
         } else {
           $newFeedbackNumber = 0;
         }

         $feedbackNumber = $feedbackNumber + $newFeedbackNumber;

         $rmpPostsArray[$postID]['feedback'] = $feedbackNumber;
         //calculate the average rating

         $avgRating = self::stats_average_rating($sum, $votes);

         $rmpPostsArray[$postID]['avg'] = $avgRating;
       }
       // Restore original Post Data
       wp_reset_postdata();
     } else {
       // no posts found
     }
     //generate dynamic data for table
     $tableRows = '';
     if( !empty($rmpPostsArray) ) {
       foreach( $rmpPostsArray as $rmpPost ) {
         if( $rmpPost["votes"] !== 0 ) {
           $tableRows .=
           '<tr>
             <td><a href="' . $rmpPost["edit"] . '" target="_blank">' . $rmpPost["title"] . '</a></td>
             <td>' . $rmpPost["votes"] . '</td>
             <td>' . $rmpPost["avg"] . '</td>
             <td>' . $rmpPost["feedback"] . '</td>
           </tr>';
         }
       }
     }
     return $tableRows;
   }

   //calculate average rating for stats
   public static function stats_average_rating($sum, $votes) {
     if( $sum !== 0 && $votes !== 0 ) {
       return round( ($sum / $votes), 1 );
     } else {
       return 0;
     }
   }

   //if numeric options are not inserted display nothing rather than 0
   public static function numeric_option($number) {
     if( intval( $number ) ) {
       return intval( $number );
     } else {
       return '';
     }
   }

  //sanitize option inputs
  public static function sanitize_options($key, $value) {
    if ( in_array( $key,self::$optionsNumeric ) ) {
      return intval($value);
    } elseif ( in_array( $key,self::$optionsUrl ) ) {
        return esc_url( str_replace(' ', '', $value ) );
    } elseif ( in_array( $key,self::$optionsString ) ) {
        return sanitize_text_field($value);
    } elseif ( $key === 'exclude' ) { //exclude is an array
        $new_array = array();
        $input_numbers = explode( ',',( $value ) );
        foreach ( $input_numbers as $input_number ) {
          $input_number = intval( $input_number );
          if ( $input_number !== 0 ) {
            $new_array[] = $input_number;
          }
        }
        return $new_array;
    } elseif( $key === 'cptRating' || $key === 'cptResult' ) { //cpt rating and cpt result are arrays
      $sanitized_array = array();
      $cptArray = explode( ',',( $value ) );
      foreach ( $cptArray as $cpt ) {
        $cpt = sanitize_text_field( $cpt );
        if ( $cpt !== '' ) {
          $sanitized_array[] = $cpt;
        }
      }
      return $sanitized_array;
    } else {
      return '';
    }
  }

  //sanitize option inputs
  public static function sanitize_customization($key, $value) {
    if ( in_array( $key,self::$customization_numeric ) ) {
      return intval($value);
    } else {
      return sanitize_text_field($value);
    }
  }

  //sanitize security inputs
  public static function sanitize_security($key, $value) {
    if ( in_array( $key,self::$security_numeric ) ) {
      return intval($value);
    } else {
      return sanitize_text_field($value);
    }
  }

  //return who can manipulate votes
  public static function required_manipulate_capability() {
    $rmp_security = get_option( 'rmp_security' );
    if ( $rmp_security['privileges'] == 1 ) {
      return 'publish_posts';
    } elseif ( $rmp_security['privileges'] == 2 ) {
      return 'edit_others_posts';
    } else {
      return 'manage_options';
    }
  }

  //check for existing rating plugin
  public static function existing_rating_plugin() {
    if ( function_exists( 'kk_star_ratings' ) ) {
      return 'KK StarRatings';
    } elseif ( function_exists('the_ratings') ) {
      return 'WP-PostRatings';
    } elseif ( function_exists('yasr_get_visitor_votes') ) {
      return 'Yasr – Yet Another Stars Rating';
    } else {
      return false;
    }
  }

  //default options
  public static function default_options() {
    $rmp_options = array(
      'posts'               => 1,
      'pages'               => 1,
      'rate_email'          => 1,
      'feedback_email'      => 1,
      'feedback'            => 1,
      'social'              => 1,
      'fb'                  => '',
      'pinterest'           => '',
      'flickr'              => '',
      'youtube'             => '',
      'instagram'           => '',
      'twitter'             => '',
      'linkedin'            => '',
      'exclude'             => array(),
      'cookieDisable'       => 1,
      'resultPost'          => 1,
      'resultPages'         => 1,
      'richSnippet'         => 1,
      'ratingWidgetResult'  => 1,
      'icon_type'           => 1,
      'notShowRating'       => 1,
      'positiveNegative'    => 2,
      'recalculate'         => 1,
      'halfStars'           => 1,
      'hoverTexts'          => 1,
      'noHeadings'          => 1,
      'multiLingual'        => 1,
      'noFontawesome'       => 1,
      'analytics'           => 1,
      'cptRating'           => array(),
      'cptResult'           => array(),
      'limitedNegCount'     => 1,
      'preventAccidental'   => 1,
      'wipeOnUninstall'     => 1,
      'loadModernizr'       => 1,
      'ampCompatibility'    => 1,
      'archivePages'        => 1,
      'socialShare'         => 1,
      'widgetAlign'         => 1,
      'structuredDataType'  => 'none',
      'ajaxLoad'            => 1,
    );
    return $rmp_options;
  }

  //numeric options
  public static $optionsNumeric = array(
    'posts',
    'pages',
    'rate_email',
    'feedback_email',
    'feedback',
    'social',
    'cookieDisable',
    'resultPost',
    'resultPages',
    'richSnippet',
    'ratingWidgetResult',
    'icon_type',
    'notShowRating',
    'positiveNegative',
    'recalculate',
    'halfStars',
    'hoverTexts',
    'noHeadings',
    'multiLingual',
    'noFontawesome',
    'analytics',
    'limitedNegCount',
    'preventAccidental',
    'wipeOnUninstall',
    'loadModernizr',
    'ampCompatibility',
    'archivePages',
    'socialShare',
    'widgetAlign',
    'ajaxLoad',
  );

  //url options
  public static $optionsUrl = array(
    'fb',
    'pinterest',
    'flickr',
    'youtube',
    'instagram',
    'twitter',
    'linkedin',
  );

  //string options
  public static $optionsString = array(
    'structuredDataType',
  );

  //default customization
  public static function default_customization() {
    $rmp_customize_strings = array(
      'rateTitle'             => 'How useful was this post?',
      'rateSubtitle'          => 'Click on a star to rate it!',
      'rateResult'            => 'Average rating',
      'rateResult2'           => 'Vote count:',
      'cookieNotice'          => 'You already voted! This vote will not be counted!',
      'noRating'              => 'No votes so far! Be the first to rate this post.',
      'afterVote'             => 'Thank you for rating this post!',
      'star1'                 => 'Not at all useful',
      'star2'                 => 'Somewhat useful',
      'star3'                 => 'Useful',
      'star4'                 => 'Fairly useful',
      'star5'                 => 'Very useful',
      'socialTitle'           => 'As you found this post useful...',
      'socialSubtitle'        => 'Follow us on social media!',
      'feedbackTitle'         => 'We are sorry that this post was not useful for you!',
      'feedbackSubtitle'      => 'Let us improve this post!',
      'feedbackText'          => 'Tell us how we can improve this post?',
      'feedbackNotice'        => 'Thanks for your feedback!',
      'feedbackButton'        => 'Submit Feedback',
      'titleFontSize'         => '',
      'subtitleFontSize'      => '',
      'textFontSize'          => '',
      'titleMarginBottom'     => '',
      'subtitleMarginBottom'  => '',
      'socialFontSize'        => '',
      'feedbackAlert'         => 'Please insert your feedback in the box above!',
      'iconSize'              => '',
      'iconColorResults'      => '',
      'iconColorHover'        => '',
      'iconColorRated'        => '',
      'iconColorAvg'          => '',
      'borderWidth'           => '',
      'borderRadius'          => '',
      'borderColor'           => '',
      'backgroundColor'       => '',
      'iconMargin'            => '',
      'customResultsText'     => '',
      'submitButtonText'      => 'Submit Rating',

    );
    return $rmp_customize_strings;
  }

  //numeric customization
  public static $customization_numeric = array(
    'titleFontSize',
    'subtitleFontSize',
    'textFontSize',
    'titleMarginBottom',
    'subtitleMarginBottom',
    'socialFontSize',
    'iconSize',
    'borderWidth',
    'borderRadius',
    'iconMargin',
  );

  //default security
  public static function security_options() {
    $rmp_security = array(
      'privileges'          => 1,
      'recaptcha'           => 1,
      'siteKey'             => '',
      'secretKey'           => '',
      'votingPriv'          => 1,
      'ipTracking'          => 1,
      'userTracking'        => 1,
      'ipDoubleVote'        => 1,
    );
    return $rmp_security;
  }

  //numeric security
  public static $security_numeric = array(
    'privileges',
    'recaptcha',
    'votingPriv',
    'ipTracking',
    'userTracking',
    'ipDoubleVote',
  );

} //end of class
