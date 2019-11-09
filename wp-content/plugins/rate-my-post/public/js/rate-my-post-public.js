jQuery( document ).ready( function( $ ) {
  //remove cookies depending on the settings
  if( rmp_frontend.cookieDisable == 2 ) {
    Cookies.remove( 'rmp-rate' );
  };

  //store time for actions
  $startTime = Math.floor(Date.now() / 1000);

  //check for cookie on page load and append class
  if( !rmp_can_vote() ) {
    //add class to the main div if user wants to hide it - here we could also disable interaction with the widget?
    $(".rmp-main").addClass("rmp-rated");
  }

  //interaction is possible on page load
  $noInteract = false;
  //no token on page load
  $rating_token = false;
  //no id on page load
  $rating_id = false;
  //no feedback text on page load
  var feedbackText = false;

  //check if browser support background clip text
  var rmpTestEl = document.createElement( "x-test" );
  var rmpSupportsBCT = typeof rmpTestEl.style.webkitBackgroundClip !== "undefined" && ( rmpTestEl.style.webkitBackgroundClip = "text", rmpTestEl.style.webkitBackgroundClip === "text" );

  //if not ajax load and no bct support and half stars enabled remove half stars on page load
  if ( !rmpSupportsBCT && rmp_frontend.halfStars == 2 && rmp_frontend.ajaxLoad != 2 ) {
    $halfIconsRating = $('#rmp-stars').children('.half-icon-highlight');
    $halfIconsResults = $('.star-result').children('.star-half-highlight');
    if ( $halfIconsRating.length ) { //adjust the rating widget
      $halfIconsRating.removeClass('half-icon-highlight'); //we make it a blank star
      $halfIconsResults.removeClass('star-half-highlight');
      $avgRating = parseFloat ($('#voting-results #rmp-rating').text());
      if (($avgRating % 1) >= 0.5) {
        $halfIconsRating.addClass('widget-stars-highlight'); //we make it a colored star
        $halfIconsResults.addClass('star-highlight');
      }
    }
  }

  //check if only logged in users can interact
  if ( rmp_frontend.votingPriv == 2 && rmp_frontend.loggedIn != 1 ) { //only logged in can vote and user is not logged in
    $(".rmp-main").addClass("rmp-not-logged-in");
    $('.rating-stars ul > li.star > i.rmp-icon').css( 'cursor', 'default' );
    $noInteract = true;
    $privGranted = false;
  } else {
    $privGranted  = true;
  }

  //on page load, load results for each post via ajax if enabled
  if( rmp_frontend.ajaxLoad == 2 ) {
    $.ajax({
      type: 'POST',
      url: rmp_frontend.admin_ajax,
      data: {
          action:'load_results',
          postID : rmp_frontend.postID
      },
      dataType: 'JSON',
      success: function (result) {
        load_results(result);
      }
    });
  }

  //define rating value
  var ratingValue = false;
  //hovering the stars - color on hover, decolor on mouseout
  $('#rmp-stars li').on('mouseover', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on
    // Highlight hovered stars
    $(this).parent().children('li.star').each(function(e){
      if ( e < onStar ) {
        //highlight the stars on hover unless post has been already rated in this session
        if( $noInteract === false ) {
          $(this).addClass('hover');
        }
      }
      else {
        $(this).removeClass('hover');
      }
    });
  //stars mouse out
  }).on('mouseout', function(){
    $(this).parent().children('li.star').each(function(e){
      $(this).removeClass('hover');
    });
  });

  //descriptive ratings - mouseover injects descriptive rating
  $('#rmp-stars li').on('mouseover', function(){
    //check if device supports hover - to avoid double tap on ios
    var supportsHover = window.matchMedia('(hover: hover)');
    if( $noInteract === false && rmp_frontend.hoverTexts == 2 && supportsHover.matches ) { //not already voted within this session, hover texts enabled and device supports hover
      $descriptiveRating = $(this).attr('data-descriptive-rating');
      $('#descriptive-rating').show();
      $('#descriptive-rating').text($descriptiveRating);
    }
  });
  //mouseleave hides paragraph for descriptive rating
  $('#rmp-stars').on('mouseleave', function(){
    if( rmp_frontend.hoverTexts == 2 ) {
      $('#descriptive-rating').hide();
    }
  });

  // Action to perform on star click
  $('#rmp-stars li').on('click', function(){
     var onStar = parseInt($(this).data('value'), 10); // The star currently selected
     var stars = $(this).parent().children('li.star');
     //color the stars after clicked if interaction is allowed
     if ( $noInteract === false ) {
       for ( i = 0; i < stars.length; i++ ) {
         $(stars[i]).removeClass('selected');
       }
       for ( i = 0; i < onStar; i++ ) {
         $(stars[i]).addClass('selected');
       }
     }

     ratingValue = parseInt($('#rmp-stars li.selected').last().data('value'), 10);
     //save rating via ajax if prevent accidental and limited negative count is not enabled
     if ( rmp_frontend.limitedNegCount != 2 && rmp_frontend.preventAccidental != 2 ) {
       save_rating(ratingValue, false);
     } else if ( rmp_frontend.preventAccidental == 2 ) { //prevent accidental votes on touch devices
       var supportsHover = window.matchMedia('(hover: hover)');
       if ( ( !supportsHover.matches && $(window).width() < 768 ) || rmp_frontend.preventAccidentalAll == 2 ) { //must be a touch device
         if ( $noInteract === false) { //interaction is allowed, show button to rate
           $('#prevent-accidental-button').show();
         }
       } else { //not a touch device, save rating
         //check for limited negative count
         if (rmp_frontend.limitedNegCount == 2 && ratingValue <= rmp_frontend.positiveNegative && rmp_frontend.feedback == 2 ) {
           if( rmp_can_vote() ) {
             thank_you_msg_wo_recalculate();
             social_view();
             feedback_view();
           } else {
             cookie_prevent_interaction();
           }
         } else { //limited negative count does not apply
           save_rating(ratingValue, false);
         }
       }
     } else if ( rmp_frontend.limitedNegCount == 2 &&  rmp_frontend.preventAccidental != 2 ) { //only count negative if feedback is left - prevent accidental votes must be disabled
       if ( ratingValue <= rmp_frontend.positiveNegative && rmp_frontend.feedback == 2 ) { //don't save rating just yet
         //check for cookies
         if( rmp_can_vote() ) {
           thank_you_msg_wo_recalculate();
           social_view();
           feedback_view();
         } else {
           cookie_prevent_interaction();
         }
       } else { //save rating immediately because it's positive
         save_rating(ratingValue, false);
       }
     }
  }); //end of action to perform on star click

  //action to perform on submit rating button click (for touch devices)
  $('#prevent-accidental-button').on('click', function(){
    $('#prevent-accidental-button').hide();
    //check for limited negative count
    if (rmp_frontend.limitedNegCount == 2 && ratingValue <= rmp_frontend.positiveNegative && rmp_frontend.feedback == 2 ) {
      if( rmp_can_vote() ) {
        thank_you_msg_wo_recalculate();
        social_view();
        feedback_view();
      } else {
        cookie_prevent_interaction();
      }
    } else { //limited negative count does not apply
      save_rating(ratingValue, false);
    }
  });

  // Action to perform on send feedback click
  $('#feedback-button').click(function() {
    //process and save feedback
    feedbackText = $('#feedback-text').val();
    if ( ( feedbackText.length && $rating_token && $rating_id && ( $rating_token != '-1') ) || ( feedbackText.length && rmp_frontend.limitedNegCount == 2 ) ) {
      $(".feedback-subview").fadeOut(200, function(){
        $(".feedback-sent").fadeIn(500);
        $(".feedback-subview").remove();
      });
      $duration = Math.floor(Date.now() / 1000) - $startTime;
      // limited negative count is disabled
      if( rmp_frontend.limitedNegCount != 2 ) {
        //send feedback
        ajax_send_feedback(feedbackText);
      } else {
        //first save rating and then save feedback
        save_rating(ratingValue, true);
      }

      //hide subtitle
      $('.rmp-main-subtitle').hide();
    } else if (!feedbackText.length) { //text if missing
      $(' .rmp-main .rmp-feedback-view #feedback-alert ').text(rmp_frontend.emptyFeedback);
      setTimeout(function(){ $(' .rmp-main .rmp-feedback-view #feedback-alert ').text('');  }, 2000);
    } else { //token or id is missing
      $(' .rmp-main .rmp-feedback-view #feedback-alert ').text('Invalid token! Please try again');
      setTimeout(function(){ $(' .rmp-main .rmp-feedback-view #feedback-alert ').text('');  }, 2000);
    }
  });

  //FUNCTIONS
  //loads results function
  function load_results(result) {
    votesNumber = result.voteCount;
    avgRating = result.avgRating;

    //vote was not counted due to an error (recaptcha, ip blocked etc.)
    if ( result.errorMsg ) {

      //if social or feedback view is on hide it
      $(".rmp-social-view").hide();
      $(".rmp-feedback-view").hide();
      $(".rmp-rate-view").show();

      //use current vote count and average rating
      votesNumber = $('.rmp-main .rmp-rate-view #voting-results #votes ').text();
      avgRating = $('.rmp-main .rmp-rate-view #voting-results #rmp-rating').text();

      //if do not show average rating is on
      if( $('.rmp-main .rmp-rate-view #voting-results #rmp-rating').length == 0 ) {
        //as a precaution we hide/remove all features that could show rating or vote count
        $('.rmp-results').hide();
        $('.rmp-main .rmp-rate-view #no-vote').remove();
        $('#rmp-stars li').parent().children('li.star').each(function(e){
          $(this).removeClass('widget-stars-highlight');
          $(this).removeClass('half-icon-highlight');
        });
      }

      //give notice about the error
      $('.rmp-main .rmp-rate-view #vote-alert ').text(result.errorMsg);
      //setTimeout(function(){ $('.rmp-main .rmp-rate-view #vote-alert').text('');  }, 2000);
    } //end errors

    //article has been already rated
    if( votesNumber != 0 ) {
      //show results in the rating widget
      $('.rmp-main .rmp-rate-view #voting-results #votes ').text(votesNumber);
      $('.rmp-main .rmp-rate-view #voting-results #rmp-rating').text(avgRating);
      //color the rating widget according to the rating with disabled half stars
      if( ( rmp_frontend.ratingWidgetResult == 2 && rmp_frontend.halfStars != 2 ) || ( !rmpSupportsBCT &&  rmp_frontend.ratingWidgetResult == 2 ) ) {
        $('#rmp-stars li').parent().children('li.star').each(function(e){
          if ( e < Math.round( avgRating ) ) {
            $(this).addClass('widget-stars-highlight');
          }
        });
      };
      //color the rating widget according to the rating with enabled half stars
      if( rmp_frontend.ratingWidgetResult == 2 && rmp_frontend.halfStars == 2 && rmpSupportsBCT ) {
          //check if half star is required
          $halfstar = halfstar_required(avgRating);

          //loop thorugh stars in rating template
          $('#rmp-stars li').parent().children('li.star').each(function(e){
            //remove half star class - maybe we are updating live and half star is not required anymore
            $(this).removeClass('half-icon-highlight');
            if( !$halfstar ) { //half stars not required - just color them as with half stars disabled
              if ( e < Math.round( avgRating ) ) {
                  $(this).addClass('widget-stars-highlight');
                }
            } else { //half stars are required - decimals are between .3 and .8
                if ( e === Math.ceil(avgRating) - 1 ) { //last element - half star
                  $(this).addClass('half-icon-highlight');
                }
                if(e < Math.ceil(avgRating) - 1) { //these are elements before the last one - therefore full stars
                  $(this).addClass('widget-stars-highlight');
                }
            } //end of half stars required
          }); //end of each
      }; //end if half stars enabled

      //populate the result widget
      if ($(".rmp-results")[0]){ //check if results widget is there
        //show stars in results widget
        $('.rmp-results .star-result').removeClass('rmp-no-display');
        //color the stars in results widget - half stars enabled
        if ( rmp_frontend.halfStars == 2 && rmpSupportsBCT ) {
          $halfstar = halfstar_required(avgRating);
          $('.rmp-results .star-result').children('.rmp-icon').each(function(e){
            //remove star highlight - maybe we are updating live and star is not required anymore
            $(this).removeClass('star-half-highlight');
            $(this).removeClass('star-highlight');
            if( !$halfstar ) { //half stars not required - just color them as with half stars disabled
              if ( e < Math.round( avgRating ) ) {
                  $(this).addClass('star-highlight');
                }
            } else { //half stars are required - decimals are between .3 and .8
                if ( e === Math.ceil(avgRating) - 1 ) { //last element - half star
                  $(this).addClass('star-half-highlight');
                }
                if(e < Math.ceil(avgRating) - 1) { //these are elements before the last one - therefore full stars
                  $(this).addClass('star-highlight');
                }
            } //end of half stars required
          }); //end of each
        } else {//color the stars in results widget - half stars disabled
          $('.rmp-results .star-result').children('.rmp-icon').each(function(e){
            $(this).removeClass('star-highlight');
            if ( e < Math.round( avgRating ) ) {
              $(this).addClass('star-highlight');
            }
          });
        }
        //rating number in results widget
        $('.rmp-results .number-result #avg-rating').text(avgRating);
        //number of votes in results widget
        $('.rmp-results .total-votes #num-votes').text('(' + votesNumber + ')');
      }
    } else { //this post has not been rated yet
        if( rmp_frontend.recalculate != 1 ) { //recalculate is disabled - we inject not rated text over the results
          $('.rmp-main .rmp-rate-view #voting-results').text(rmp_frontend.noVotes);
        } else { //recalculate is enabled we hide results instead of overwriting them as we'll have to show them after the first vote
          $('.rmp-main .rmp-rate-view #voting-results').hide();
          $('.rmp-main .rmp-rate-view #no-vote').show();
          $('.rmp-main .rmp-rate-view #no-vote').text(rmp_frontend.noVotes);
        }
    }
  } //end of load results function

  function save_rating(ratingValue, sendFeedback) {
    //don't allow interaction with the widget anymore
    $('.rating-stars ul > li.star > i.rmp-icon').css( 'cursor', 'default' );
    //check or push cookie
    if( rmp_can_vote() && $privGranted ) {
      rmp_set_cookie();
      $noInteract = true;
      //hide descriptive rating if Show star hover texts is enabled
      if( rmp_frontend.hoverTexts == 2 ) {
        $('#descriptive-rating').hide();
      }
      //ajax save votes
      rmp_send_rating_ajax(ratingValue, sendFeedback);
      //google analytics and matomo tracking
      if( rmp_frontend.analytics == 2 ) {
        if ( typeof _paq !== 'undefined' ) {
         console.log('Running Matomo');
         _paq.push(['trackEvent', 'Rate my Post', 'Post Rated ', + ratingValue + '/5']);
         }
        if ( typeof ga !== 'undefined' ) {
          console.log('Running Analytics - ga');
          ga('send', 'event', 'Rate my Post', 'Post Rated ' + ratingValue + '/5');
        } else if ( typeof __gaTracker !== 'undefined' ) { //compatibiltiy with MonsterInsights
          console.log('Running Analytics - MonsterInsights');
          __gaTracker('send', 'event', 'Rate my Post', 'Post Rated ' + ratingValue + '/5');
        };
      }
      //change view after article is rated
      thank_you_msg_wo_recalculate();
      social_view();
    } else { //cookie - he/she already rated this post
        //if noInteracts is true, user already voted during this session
        if (  $noInteract !== true  ) {
          cookie_prevent_interaction();
        }
    }
  } //end of save rating function

  //blocks interaction with the widget
  function cookie_prevent_interaction() {
    $noInteract = true;
    $('.rating-stars #rmp-stars li').removeClass('selected');
    $('#descriptive-rating').hide();
    $('.rating-stars ul > li.star > i.rmp-icon').css( 'cursor', 'default' );
    $('.rmp-main .rmp-rate-view #vote-alert ').text(rmp_frontend.cookie);
    setTimeout(function(){ $('.rmp-main .rmp-rate-view #vote-alert').text('');  }, 2000);
  }

  //show thank you msg if don't recalculate is enabled
  function thank_you_msg_wo_recalculate() {
    if( ratingValue > rmp_frontend.positiveNegative && rmp_frontend.social == 1 ) {
       //if we are not recalculating we show the thank you msg instead
       if( rmp_frontend.recalculate != 1 ) {
         //we inject thank you msg over the rating since it's not being recalculated
         $('.rmp-main .rmp-rate-view #voting-results').text(rmp_frontend.afterVote);
       }
     }

     if ( ratingValue <= rmp_frontend.positiveNegative && rmp_frontend.feedback == 1 ) {
        //if we are not recalculating we show the thank you msg instead
        if( rmp_frontend.recalculate != 1 ) {
          //we inject thank you msg over the rating since it's not being recalculated
          $('.rmp-main .rmp-rate-view #voting-results').text(rmp_frontend.afterVote);
        }
      }
  }

  //show social view
  function social_view() {
    if ( ratingValue > rmp_frontend.positiveNegative && rmp_frontend.social == 2 ) { // rating is positive and social widget is enabled
      $(".rmp-rate-view").fadeOut(200, function(){
          $(".rmp-social-view").fadeIn(500);
      });
    }
  }

  //show feedback view
  function feedback_view() {
    if( ratingValue <= rmp_frontend.positiveNegative && rmp_frontend.feedback == 2 ) { //rating is negative and feedback widget is enabled
       $(".rmp-rate-view").fadeOut(200, function(){
         $(".rmp-feedback-view").fadeIn(500);
       });
     }
  }

  //check if half star is required
  function halfstar_required(avgRating) {
    //convert to string for further manipulation
    avgRating = avgRating.toString();
    if( avgRating.length > 1) { //we are dealing with decimals and posibly half stars
      //get the decimals
      $decimals = avgRating.substring(avgRating.indexOf('.') + 1);
      //check if half stars are really required
      if ($decimals > 2 && $decimals < 8) { //half star is required
        return true;
      } else { //half star is not required - we round up or down
        return false;
      }
    } else { //half star is not required since there are no decimals
      return false;
    }
  }

  //function to set cookie
  function rmp_set_cookie() {
    //check for existing cookie
    $rmpCookie = Cookies.get('rmp-rate');
    if(typeof $rmpCookie === 'undefined') {
      //set a cookie
      Cookies.set('rmp-rate', rmp_frontend.postID, { expires: 20 });
    } else {
      //remove cookie
      Cookies.remove('rmp-rate');
      //cookie is already present
      $postIds = $rmpCookie.split(',');
      //check length of array and remove if necessary
      if ($postIds.length >= 20){
        //don't allow more than 20 ids in array that goes in cookie
        $postIds.shift();
      }
      $postIds.push(rmp_frontend.postID);
      $postIds = $postIds.toString();
      Cookies.set('rmp-rate', $postIds, { expires: 20 });
    }
  }

  //function to detect if user already voted
  function rmp_can_vote() {
    $rmpCookie = Cookies.get('rmp-rate');
    if(typeof $rmpCookie === 'undefined') {
      return true;
    } else {
      //let's check if user voted this post
      $canVote = true; //set to true
      $postIds = $rmpCookie.split(',');
      for (var rmpCount = 0; rmpCount < $postIds.length; rmpCount++) {
        if( $postIds[rmpCount] === rmp_frontend.postID ) {
          $canVote = false;
          break;
        }
        if(rmpCount === 25) { //shouldn't be possible but just in case to avoid some very long loops
          break;
        }
      }
      return $canVote;
    }
  }

  //do stuff after post has ben successfully rated
  function rmp_successfully_rated(result) {
    $noInteract = true; //disables interaction with widget
    //check if recalculate is enabled
    if( rmp_frontend.recalculate == 1 ) { //recalculate is enabled
      //remove highlight from stars in rating widget since we'll color them again
      $('#rmp-stars li').parent().children('li.star').each(function(e){
        $(this).removeClass('widget-stars-highlight');
      });
      //remove highlight from stars in results widget since we'll color them again
      $('.rmp-results .star-result').children('.rmp-icon').each(function(e){
        $(this).removeClass('star-highlight');
      });
      //remove not rated text and show rated text - important if post is rated for the first time
      $('.rmp-main .rmp-rate-view #voting-results').show();
      $('.rmp-main .rmp-rate-view #no-vote').hide();
      //show thank you msg in case that there was no error
      if ( !result.errorMsg ) {
        $('.rmp-main .rmp-rate-view #thank-you-msg').text(rmp_frontend.afterVote);
      }
      //set token and id
      $rating_token = result.token;
      $rating_id = result.id;
      //load new results
      load_results(result);
    } //end of recalculate is enabled
    //remove rated color of stars only if we are coloring the stars with avg rating
    if( rmp_frontend.ratingWidgetResult == 2 ) {
      $('.rating-stars #rmp-stars li').removeClass('selected');
    }
  }

  //ajax send the rating
  function rmp_send_rating_ajax(ratingValue, sendFeedback) {
    //get duration
    $duration = Math.floor(Date.now() / 1000) - $startTime;

    if(rmp_frontend.grecaptcha == 2) { //grecaptha is enabled
      grecaptcha.ready(function() {
          grecaptcha.execute(rmp_frontend.siteKey, {action: 'ratemypost'}).then(function(token) {
            //ajax save votes
              $.ajax({
                type: 'POST',
                url: rmp_frontend.admin_ajax,
                data: {
                    action:'process_rating',
                    star_rating : ratingValue,
                    postID : rmp_frontend.postID,
                    token: token,
                    duration: $duration,
                },
                dataType: 'JSON',
                success: function (result) {
                  rmp_successfully_rated(result);
                  //send feedback for limited negative count
                  if(sendFeedback) {
                    ajax_send_feedback();
                  }
                  //show feedback widget only after rating has been processed
                  feedback_view();
                }
              }); //end of ajax
          }); //end of grecaptcha execute
      });
    } else { //grecaptcha is disabled
    //ajax save votes
      $.ajax({
        type: 'POST',
        url: rmp_frontend.admin_ajax,
        data: {
            action:'process_rating',
            star_rating : ratingValue,
            postID : rmp_frontend.postID,
            duration: $duration,
        },
        dataType: 'JSON',
        success: function (result) {
          rmp_successfully_rated(result);
          //send feedback for limited negative count
          if(sendFeedback) {
            ajax_send_feedback();
          }
          //show feedback widget only after rating has been processed
          feedback_view();
        }
      }); //end of ajax
    }
  }

  //inserts feedback
  function ajax_send_feedback() {
    //send feedback via ajax
    if(rmp_frontend.grecaptcha == 2) { //grecaptha is enabled
      grecaptcha.ready(function() {
          grecaptcha.execute(rmp_frontend.siteKey, {action: 'ratemypostFeedback'}).then(function(token) {
            $.ajax({
              type: 'POST',
              url: rmp_frontend.admin_ajax,
              data: {
                  action:'process_feedback',
                  feedback : feedbackText,
                  postID : rmp_frontend.postID,
                  token : token,
                  duration: $duration,
                  rating_id: $rating_id,
                  rating_token: $rating_token,
              },
              success: function (result) {
                //alert(result); here goes rating success msg at some point
              }
            });
          }); //end of grecaptcha execute
      });
    } else {
      $.ajax({
        type: 'POST',
        url: rmp_frontend.admin_ajax,
        data: {
            action:'process_feedback',
            feedback : feedbackText,
            postID : rmp_frontend.postID,
            duration: $duration,
            rating_id: $rating_id,
            rating_token: $rating_token,
        },
        success: function (result) {
          //alert(result); here goes rating success msg at some point
        }
      });
    }
  }

});
