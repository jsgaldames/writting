<?php

/**
 * The public-specific functionality of the plugin.
 *
 * @link       http://wordpress.org/plugins/rate-my-post/
 * @since      2.0.0
 *
 * @package    Rate_My_Post
 * @subpackage Rate_My_Post/public/inc
 */
class Rate_My_Post_Public_Helper {

  //output an array of custom strings for use in templates and such
  public static function custom_strings() {
    $options = get_option( 'rmp_options' );

    if ( $options['multiLingual'] != 2 ) { //multilingual website compatibility mode is disabled
      $customStrings = get_option( 'rmp_customize_strings' );
      //Apply filters
      if( has_filter('rmp_custom_strings') ) {
        $customStrings = apply_filters( 'rmp_custom_strings', $customStrings );
      }
      //strip backslashes and escape html
      foreach( $customStrings as $key => $value ) {
        $customStrings[$key] = stripslashes( esc_html( $value ) );
      }
      return $customStrings;
    } else { //multilingual website compatibility mode is enabled
      $customStrings = self::multilingual_strings();
      //Apply filters
      if( has_filter('rmp_custom_strings') ) {
        $customStrings = apply_filters( 'rmp_custom_strings', $customStrings );
      }
      //strip backslashes and escape html
      foreach( $customStrings as $key => $value ) {
        $customStrings[$key] = stripslashes( esc_html( $value ) );
      }
      return $customStrings;
    }
  }

  //custom font sizes for templates - inline css
  public static function custom_inline_css( $property ) {
    $rmpCustomFonts = get_option( 'rmp_customize_strings' );
    foreach( $rmpCustomFonts as $key => $value ) {
      $value = intval( $value );
      if( $value ) {
        $rmpCustomFonts[$key] = $property . ':' . $value . 'px;';
      } else {
        $rmpCustomFonts[$key] = '';
      }
    }
    return $rmpCustomFonts;
  }

  //calculate average rating
  public static function average_rating( $postID = false ) {
    if( !$postID ) {
      $postID = get_the_id();
    }
    $sum = intval( get_post_meta( $postID, 'rmp_rating_val_sum', true ) );
    $votes = intval( get_post_meta( $postID, 'rmp_vote_count', true ) );
    if( $sum != 0 && $votes != 0 ) {
      return round( ($sum / $votes), 1 );
    } else {
      return 0;
    }
  }

//social icon size - inline css
  public static function custom_social_icon() {
    $rmpCustomSocial = get_option( 'rmp_customize_strings' );
    $rmpCustomSocial = intval( $rmpCustomSocial['socialFontSize'] );
    if ( $rmpCustomSocial !== 0 ) {
      $fontSize = $rmpCustomSocial;
      $padding = intval ($fontSize * 0.67 );
      $width = intval( $fontSize * 2.33 );;
      return 'style="font-size:' . $fontSize . 'px;padding:' . $padding . 'px;width:' . $width . 'px"';
    } else {
      return '';
    }
  }

  //icon type according to the options - stars, thumbs or hearts
  public static function icon_type() {
    $iconType = 'rmp-icon rmp-icon-star';
    $rmp_options = get_option( 'rmp_options' );
    if ( $rmp_options['icon_type'] == 3 ) {
      //hearts
      $iconType = 'rmp-icon rmp-icon-heart';
    } elseif ( $rmp_options['icon_type'] == 2 ) {
      //thumbs
      $iconType = 'rmp-icon rmp-icon-thumbs-up';
    } elseif ( $rmp_options['icon_type'] == 4 ) {
      //smileys
      $iconType = 'rmp-icon rmp-icon-smile-o';
    } elseif ( $rmp_options['icon_type'] == 5 ) {
      //thumbs
      $iconType = 'rmp-icon rmp-icon-trophy';
    } else {
      //stars default
      $iconType = 'rmp-icon rmp-icon-star';
    }

    if( has_filter('rmp_rating_icon_class') ) {
      $iconType = apply_filters( 'rmp_rating_icon_class', $iconType );
    }

    return $iconType;
  }

  //font size and color for stars tumbs or hearts - inline css
  public static function icon_size() {
    $rmp_customize = get_option( 'rmp_customize_strings' );
    $iconSize = intval( $rmp_customize['iconSize'] );

    if ( $iconSize ) {
      return 'style="font-size:' . $iconSize . 'px;"';
    } else {
      return '';
    }
  }

  //generates internal css for further customization
  public static function internal_css() {
    //get values for internal css from options
    $rmp_customize = get_option( 'rmp_customize_strings' );
    $rmp_options = get_option( 'rmp_options' );

    $widgetAlign = intval( $rmp_options['widgetAlign'] );
    $iconColorResults = esc_html( str_replace( ' ', '',$rmp_customize['iconColorResults'] ) );
    $iconColorHover = esc_html( str_replace( ' ', '',$rmp_customize['iconColorHover'] ) );
    $iconColorRated = esc_html( str_replace( ' ', '',$rmp_customize['iconColorRated'] ) );
    $iconColorAvg = esc_html( str_replace( ' ', '',$rmp_customize['iconColorAvg'] ) );
    $borderWidth = esc_html( str_replace( ' ', '',$rmp_customize['borderWidth'] ) );
    $borderRadius = esc_html( str_replace( ' ', '',$rmp_customize['borderRadius'] ) );
    $borderColor = esc_html( str_replace( ' ', '',$rmp_customize['borderColor'] ) );
    $backgroundColor = esc_html( str_replace( ' ', '',$rmp_customize['backgroundColor'] ) );
    $iconMargin = esc_html( str_replace( ' ', '',$rmp_customize['iconMargin'] ) );

    //here we store internal css by plugin customization options
    $internalStyleArray = array();
    //check if values are inserted and create css if they are
    if ( $widgetAlign !== 1 ) {
      if ( $widgetAlign === 2 ) {
        $widgetAlign = '.rmp-main{text-align:left;} ul#rmp-stars{margin: 10px 0}';
      } elseif ( $widgetAlign === 3 ) {
        $widgetAlign = '.rmp-main{text-align:right;} ul#rmp-stars{margin: 10px 0}';
      } else {
        $widgetAlign = '';
      }
      $internalStyleArray[] = $widgetAlign;
    }
    if( $iconColorResults !== '' ) {
      $iconColorResults = '.rmp-results .star-result .rmp-icon.star-highlight {color: ' . $iconColorResults . ';}.rmp-results .star-result .rmp-icon.star-half-highlight {background: linear-gradient(to right, ' . $iconColorResults . ' 50%,#ccc 50%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;}.rmp-archive-results .star-highlight{color: '. $iconColorResults . ';}.rmp-archive-results .star-half-highlight{background: linear-gradient(to right, ' . $iconColorResults . ' 50%,#ccc 50%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;}';
      $internalStyleArray[] = $iconColorResults;
    }
    if( $iconColorHover !== '' ) {
      $iconColorHover = '@media (hover: hover) {.rating-stars ul > li.star.hover > i.rmp-icon {color: ' . $iconColorHover . ';}}@media (hover: hover) {.rating-stars ul > li.star.widget-stars-highlight.hover > i.rmp-icon {color: ' . $iconColorHover . ';}}@media (hover: hover) {.rating-stars ul > li.star.half-icon-highlight.hover > i.rmp-icon {background: ' . $iconColorHover . ';-webkit-background-clip: text;-webkit-text-fill-color: transparent;}}';
      $internalStyleArray[] = $iconColorHover;
    }
    if( $iconColorRated !== '' ) {
      $iconColorRated = '.rating-stars ul > li.star.selected > i.rmp-icon {color: ' . $iconColorRated . ';}.rating-stars ul > li.star.widget-stars-highlight.selected > i.rmp-icon {color: '. $iconColorRated . ';}.rating-stars ul > li.star.half-icon-highlight.selected > i.rmp-icon {background: ' . $iconColorRated . ';-webkit-background-clip: text;-webkit-text-fill-color: transparent;}';
      $internalStyleArray[] = $iconColorRated;
      //fix for hover color exists but rated does not
    } elseif ($iconColorRated === '' && $iconColorHover !== '') { //custom hover color is inserted but not custom rated color
        $iconColorRated = '.rating-stars ul > li.star.selected > i.rmp-icon {color: #FF912C;}.rating-stars ul > li.star.widget-stars-highlight.selected > i.rmp-icon {color: #FF912C;}.rating-stars ul > li.star.half-icon-highlight.selected > i.rmp-icon {background: #FF912C;-webkit-background-clip: text;-webkit-text-fill-color: transparent;}';
        $internalStyleArray[] = $iconColorRated;
    } else {

    }
    if( $iconColorAvg !== '' ) {
      $iconColorAvg = '.rating-stars ul > li.star.widget-stars-highlight > i.rmp-icon {color: ' . $iconColorAvg . ';} .half-icon-highlight i {background: linear-gradient(to right, ' . $iconColorAvg . ' 50%,#ccc 50%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;}';
      $internalStyleArray[] = $iconColorAvg;
    }
    if( $borderWidth ) {
      $borderWidth = '.rmp-main {border: ' . $borderWidth . 'px solid ' . $borderColor . ';}';
      $internalStyleArray[] = $borderWidth;
    }
    if( $borderRadius && $borderWidth ) {
      $borderRadius = '.rmp-main {border-radius: ' . $borderRadius . 'px;}';
      $internalStyleArray[] = $borderRadius;
    }
    if( $backgroundColor !== '' ) {
      $backgroundColor = '.rmp-main {background-color: ' . $backgroundColor . ';}';
      $internalStyleArray[] = $backgroundColor;
    }
    if( $iconMargin ) {
      $iconMargin = '.rating-stars #rmp-stars .star .rmp-icon  {margin-left: ' . $iconMargin . 'px; margin-right:' . $iconMargin . 'px;}';
      $internalStyleArray[] = $iconMargin;
    }
    //generate output - all internal css
    if ( !empty($internalStyleArray) ) {
      return implode(' ',$internalStyleArray);
    } else {
      return '';
    }
  }

  //returns custom results text or false if not inserted
  public static function custom_results_text( $rmp_options, $avgRating = false, $voteCount = false ) {
    $rmpCustomization = get_option( 'rmp_customize_strings' );
    $rmpCustomResultsText = stripslashes (esc_html( $rmpCustomization['customResultsText'] ) );
    if ( str_replace( ' ', '',$rmpCustomResultsText ) !== '' ) {
      if( $rmp_options['ajaxLoad'] == 2 ) { //ajax load is enabled - do not populate
        $rmpCustomResultsText = str_replace( '{{votecount}}','<span id="votes"></span>',$rmpCustomResultsText );
        $rmpCustomResultsText = str_replace( '{{avgrating}}','<span id="rmp-rating"></span>', $rmpCustomResultsText );
      } else { //ajax load is disabled - populate
        $rmpCustomResultsText = str_replace( '{{votecount}}','<span id="votes">' . $voteCount .'</span>',$rmpCustomResultsText );
        $rmpCustomResultsText = str_replace( '{{avgrating}}','<span id="rmp-rating">' . $avgRating . '</span>', $rmpCustomResultsText );
      }
      return $rmpCustomResultsText;
    }

    return false;
  }

  //generate results text for amp version
  public static function amp_results_output($widgetType) {
    $customStrings = self::custom_strings();
    $postID = get_the_id();
    $ratingSum = get_post_meta( get_the_id(), 'rmp_rating_val_sum', true );
    $votesNumber = get_post_meta( get_the_id(), 'rmp_vote_count', true );
    $averageRating = self::average_rating();
    //check if the post has been rated yet
    if ( $widgetType == 'amp-rating' ) { //rating template
      if ( $averageRating != 0 ) { //return current ratings
        return $customStrings['rateResult'] . ' ' . $averageRating . ' / 5. ' . $customStrings['rateResult2'] . ' ' . $votesNumber;
      } else { //return generic text
        return $customStrings['noRating'];
      }
    } else { //results template
      if ( $averageRating != 0 ) { //return current ratings
        $ampResultsArray = array();
        $ampResultsArray['rating'] = $averageRating;
        $ampResultsArray['votes'] = '(' . $votesNumber . ')';
        //generate the stars
        $highlightedStars = round($averageRating);
        $notHighlightedStars = 5 - $highlightedStars;
        $starsContent = str_repeat( '<span class="rmp-amp-star rmp-amp-star-highlighted"></span>', $highlightedStars ) . str_repeat( '<span class="rmp-amp-star"></span>', $notHighlightedStars );
        $ampResultsArray['stars'] = $starsContent;
        return $ampResultsArray;
      } else { //return an empty array
        return array( 'rating' => '', 'votes' => '', 'stars' => '' );
      }
    }
  }

  //check if recaptcha is enabled
  public static function do_recaptcha() {
    $security = get_option( 'rmp_security' );
    $recaptcha = intval( $security['recaptcha'] );
    $siteKey = str_replace( ' ', '', $security['siteKey'] );
    $secretKey = str_replace( ' ', '', $security['secretKey'] );
    if ( $recaptcha === 2 && $siteKey !== '' && $secretKey !== '' ) { //recaptcha is on
      return 2;
    } else { //recaptcha is off
      return 1;
    }
  }

  //generate share links
  public static function social_share_links() {
    $socialLinks = array();
    $title = '';
    $url = '';
    $image = '';
    //get the necessary data
    $title = urlencode( get_the_title() );
    $url = urlencode( get_the_permalink() );
    $image = urlencode( get_the_post_thumbnail_url( get_the_id(), 'full' ) );

    //create social share links
    $socialLinks['facebook'] = 'https://www.facebook.com/sharer/sharer.php?u=' . $url;
    $socialLinks['pinterest'] = 'https://pinterest.com/pin/create/bookmarklet/?media=' . $image . '&url=' . $url . '&description=' . $title;
    $socialLinks['twitter'] = 'http://twitter.com/share?url=' . $url . '&text=' . $title;
    $socialLinks['reddit'] = 'http://www.reddit.com/submit?url=' . $url . '&title=' . $title;
    $socialLinks['linkedin'] = 'https://www.linkedin.com/shareArticle?mini=true&url=' . $url . '&title=' . $title . '&source=LinkedIn';

    if( has_filter('rmp_social_links') ) {
      $socialLinks = apply_filters( 'rmp_social_links', $socialLinks );
    }

    return $socialLinks;
  }

  //return an array of top rated posts
  public static function top_rated_posts( $maxPosts = 10, $requiredRating = 1,  $requiredVotes = 1 ) {
    $ratedPosts = array();
    $topRatedPosts = array();

    //get post types for the query
    $registeredPostTypes = get_post_types( array( 'public' => true ) );
    if ( array_search('attachment', $registeredPostTypes ) ) {
      unset( $registeredPostTypes['attachment'] );
    }

    $postTypes = array_values($registeredPostTypes);
    //args for the loop
    $args = array(
       'fields'          => 'ids',
       'post_type'       => $postTypes,
       'posts_per_page'  => -1
    );

    $the_query = new WP_Query( $args );

    if ( $the_query->have_posts() ) {
      while ( $the_query->have_posts() ) {
        $the_query->the_post();
        //data we'll need
        $postID = get_the_id();
        $avgRating = intval( self::average_rating() * 10 ); //floats are hassle
        $voteCount = intval( get_post_meta( $postID, 'rmp_vote_count', true ) );
        //save post ids and average rating
        if ( $avgRating && $avgRating >= ( $requiredRating * 10 ) && $voteCount && $voteCount >= $requiredVotes ) {
          $ratedPosts[$postID] = $avgRating;
        }
      } //end while

      //sort by averatge rating
      arsort( $ratedPosts );

      //reorganize to output the top rated posts
      $count = 0;
      foreach ( $ratedPosts as $key => $value ) {
        $count++;

        $postID = $key;
        $avgRating = $value / 10;
        $title = get_the_title( $postID );
        $link = get_the_permalink( $postID );
        $thumb = get_the_post_thumbnail_url( $postID );
        $votes = intval( get_post_meta( $postID, 'rmp_vote_count', true ) );

        $topRatedPosts[] = array(
          'postID'    => $key,
          'avgRating' => $avgRating,
          'title'     => $title,
          'postLink'  => $link,
          'thumb'     => $thumb,
          'votes'     => $votes,
        );

        //only output the defined number
        if( $count >= $maxPosts ) {
          break;
        }

      } //end foreach

      // Restore original Post Data
      wp_reset_postdata();
    } else {
      // no posts found
    }

    return $topRatedPosts;

  }

  //returns data for highlighting the stars
  public static function icons_highlight_count( $postID ) {
    $rmp_options = get_option( 'rmp_options' );
    $sum = intval( get_post_meta( $postID, 'rmp_rating_val_sum', true ) );
    $votes = intval( get_post_meta( $postID, 'rmp_vote_count', true ) );

    if( $sum && $votes ) {
      $averageRating = round( ($sum / $votes), 1 );
    } else {
      $averageRating = false;
    }

    if( !$averageRating ) { //not yet rated - return false
      return false;
    }

    $highlightedIcons = floor($averageRating);
    $halfHighlightedIcons = 0;
    $notHighlightedIcons = 0;

    //do some math as comparing floats is a hassle
    $decimals = intval( ( $averageRating * 10 ) - ( $highlightedIcons * 10 ) );

    //figure out if half stars are required
    if ( $rmp_options['halfStars'] == 2 ) { //half stars are enabled
      if ( $decimals > 7 ) {
        $highlightedIcons = $highlightedIcons + 1;
      } elseif ( $decimals <= 7 && $decimals >= 3 ) {
        $halfHighlightedIcons = 1;
      };
    } else { // not enabled - we readjust $highlightedIcons
      $highlightedIcons = round( $averageRating );
    }

    //calculate how many normal stars do we need
    $notHighlightedIcons = 5 - $highlightedIcons - $halfHighlightedIcons;

    $count = array(
      'fullIcons'     => intval( $highlightedIcons ),
      'halfIcons' => intval( $halfHighlightedIcons ),
      'emptyIcons'    => intval( $notHighlightedIcons )
    );

    return $count;

  }

  //returns star rating for post id
  public static function get_visual_rating ( $postID = false ) {
   if ( !$postID ) {
     $postID = get_the_id();
   }

   $highlightCount = self::icons_highlight_count( $postID );

   if( !$highlightCount ) { //return false if post hasn't been rated yet
     return false;
   }

   $iconType = self::icon_type();

   $iconsContent = str_repeat( '<i class="star-highlight ' . $iconType . '"></i>', $highlightCount['fullIcons'] ) . str_repeat( '<i class="star-half-highlight ' . $iconType . '"></i>', $highlightCount['halfIcons'] ) . str_repeat( '<i class="' . $iconType . '"></i>', $highlightCount['emptyIcons'] );

   return $iconsContent;
  }

  //returns an array of 5 icons and their highlight classes according to rating
  public static function icons_highlight_classes( $postID = false ) {
    if ( !$postID ) {
      $postID = get_the_id();
    }

    $highlightCount = self::icons_highlight_count( $postID );

    $iconsHighlightClasses = array();

    if( $highlightCount ) { //post has ratings
      $fullIconsCount = $highlightCount['fullIcons']; //number of full icons
      $halfIconsCount = $highlightCount['halfIcons']; //number of half icons
      $emptyIconsCount = $highlightCount['emptyIcons']; //number of empty icons

      $fullIconsArray = array();
      $halfIconsArray = array();
      $emptyIconsArray = array();

      if( $fullIconsCount ) { //push full icon class to array
        $fullIconsArray = array_fill( 0, $fullIconsCount, array( 'ratingWidget' => 'widget-stars-highlight', 'resultsWidget' => 'star-highlight' ) );
      }

      if( $halfIconsCount ) { //push half icon class to array
        $halfIconsArray = array_fill( $fullIconsCount, $halfIconsCount, array( 'ratingWidget' => 'half-icon-highlight', 'resultsWidget' => 'star-half-highlight' ) );
      }

      if( $emptyIconsCount ) { //push empty icons to array - no class
        $emptyIconsArray = array_fill( $fullIconsCount + $halfIconsCount, $emptyIconsCount, array( 'ratingWidget' => '', 'resultsWidget' => '' ) );
      }

      //merge arrays so we have a nice array with five classes for five icons
      $iconsHighlightClasses = array_merge( $fullIconsArray, $halfIconsArray, $emptyIconsArray );

    } else { //no rating - no star is highlighted
      $iconsHighlightClasses = array_fill( 0, 5, array( 'ratingWidget' => '', 'resultsWidget' => '' ) );
    }

    return $iconsHighlightClasses;

  }

  //returns an array of localized strings for use in the rating widget template
  public static function multilingual_strings() {
    $translatableStrings = array(
      'rateTitle'             => esc_html__( 'How useful was this post?', 'rate-my-post' ),
      'rateSubtitle'          => esc_html__( 'Click on a star to rate it!', 'rate-my-post' ),
      'rateResult'            => esc_html__( 'Average rating', 'rate-my-post' ),
      'rateResult2'           => esc_html__( 'Vote count:', 'rate-my-post' ),
      'cookieNotice'          => esc_html__( 'You already voted! This vote will not be counted!', 'rate-my-post' ),
      'noRating'              => esc_html__( 'No votes so far! Be the first to rate this post.', 'rate-my-post' ),
      'afterVote'             => esc_html__( 'Thank you for rating this post!', 'rate-my-post' ),
      'star1'                 => esc_html__( 'Not at all useful', 'rate-my-post' ),
      'star2'                 => esc_html__( 'Somewhat useful', 'rate-my-post' ),
      'star3'                 => esc_html__( 'Useful', 'rate-my-post' ),
      'star4'                 => esc_html__( 'Fairly useful', 'rate-my-post' ),
      'star5'                 => esc_html__( 'Very useful', 'rate-my-post' ),
      'socialTitle'           => esc_html__( 'As you found this post useful...', 'rate-my-post' ),
      'socialSubtitle'        => esc_html__( 'Follow us on social media!', 'rate-my-post' ),
      'feedbackTitle'         => esc_html__( 'We are sorry that this post was not useful for you!', 'rate-my-post' ),
      'feedbackSubtitle'      => esc_html__( 'Let us improve this post!', 'rate-my-post' ),
      'feedbackText'          => esc_html__( 'Tell us how we can improve this post?', 'rate-my-post' ),
      'feedbackNotice'        => esc_html__( 'Thanks for your feedback!', 'rate-my-post' ),
      'feedbackButton'        => esc_html__( 'Submit Feedback', 'rate-my-post' ),
      'feedbackAlert'         => esc_html__( 'Please insert your feedback in the box above!', 'rate-my-post' ),
      'submitButtonText'      => esc_html__( 'Submit Rating', 'rate-my-post' ),
    );
    return $translatableStrings;
  }

} //end of class
