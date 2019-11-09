jQuery( document ).ready( function( $ ) {

  //OPTIONS PAGE - BASIC JS
  //tabs
  $('.rmp-tablinks').click(function(){
		var tab_id = $(this).attr('data-tab');

		$('.rmp-tablinks').removeClass('rmp-tabcontent-current');
		$('.rmp-tabcontent').removeClass('rmp-tabcontent-current');

		$(this).addClass('rmp-tabcontent-current');
		$("#"+tab_id).addClass('rmp-tabcontent-current');
	})

  //datatables - sorting in stats
  $('#rmp-table').DataTable();

  //datatables - sorting analytics
  $('#rmp-analytics-table').DataTable( {
        "order": [[ 0, "desc" ]]
  } );

	//Show notice in settings
	$('#show-rmp-notice').click(function() {
		$('#rmp-notice-hidden').toggle();
	});
	$('#show-rmp-checkbox-notice').click(function() {
		$('#rmp-checkbox-notice-hidden').toggle();
	});

  //CPT auto-insert
  $('#rmp-cpt-rating').click(function() {
    $('#rmp-custom-post-types-rating').val( $(this).text() );
  });
  $('#rmp-cpt-result').click(function() {
    $('#rmp-custom-post-types-result').val( $(this).text() );
  });


  //BACKEND METABOX
  //keep the average rating updated
  $( ".rmp-rate-line #votes" ).keyup(function() {
    $votes = $(this).val();
    $sum = $( "#sum" ).val();
    $avg = Math.round($sum / $votes * 10) / 10;
    $( "#avg" ).val($avg);
  });
  $( ".rmp-rate-line #sum" ).keyup(function() {
    $sum = $(this).val();
    $votes = $( "#votes" ).val();
    $avg = Math.round($sum / $votes * 10) / 10;
    $( "#avg" ).val($avg);
  });

  //AJAX update rating
  $( ".rmp-rate-box #update-rating" ).click(function() {
    $sum = $( "#sum" ).val();
    $votes = $( "#votes" ).val();
    $avg = $( "#avg" ).val();
    //update post meta via ajax
    $.ajax({
      type: 'POST',
      url: rmp_backend_update.admin_ajax,
      data: {
          action:'update_results',
          nonce:  rmp_backend_update.nonce,
          sum : $sum,
          votes : $votes,
          avg : $avg,
          postID : rmp_backend_update.postID
      },
      success: function (result) {
        $('#update-result').text(result);
        setTimeout(function(){ $('#update-result').text('');  }, 2000);
      }
    });
  });

  //AJAX delete feedback
  $( ".rmp-rate-box #delete-feedback" ).click(function() {
    //delete feedback via ajax
    $.ajax({
      type: 'POST',
      url: rmp_backend_update.admin_ajax,
      data: {
          action:'delete_feedback',
          nonce: rmp_backend_update.nonce,
          postID : rmp_backend_update.postID
      },
      success: function (result) {
        $('#update-result').text(result);
        setTimeout(function(){ $('#update-result').text('');  }, 2000);
        $('#rmp-feedback-values').hide();
      }
    });
  });

  //AJAX delete feedback individually
  //feedback submitted before v. 2.7 can't be deleted individually
  $( ".rmp-feedback__table__delete--disabled" ).click(function() {
    alert('Feedback submitted before version 2.7 cannot be deleted individually!');
  });
  //delete feedback individually
  $( ".rmp-feedback__table__delete--enabled" ).click(function() {
    //id of feedback to delete
    $feedbackID = $(this).attr('data-id');
    $.ajax({
      type: 'POST',
      url: rmp_backend_update.admin_ajax,
      data: {
          action:'individually_delete_feedback',
          nonce: rmp_backend_update.nonce,
          postID: rmp_backend_update.postID,
          feedbackID: $feedbackID,
      },
      success: function (result) {
        if( result == $feedbackID ) {
          $( ".rmp-feedback__table__row--" +  $feedbackID ).hide('slow');
        } else {
          alert(result);
        }
      }
    });
  });

	//AJAX SAVE SETTINGS
	$('#rmp-save-settings').click(function() {
		$('#rmp-options-update-alert').text(rmp_backend_update.save);
		//get checkbox settings
    $optionPosts = rmp_is_checked( 'input#rmp-posts' );
    $optionPages = rmp_is_checked( 'input#rmp-pages' );
    $optionPostsResult = rmp_is_checked( 'input#rmp-post-results' );
    $optionPagesResult = rmp_is_checked( 'input#rmp-page-results' );
    $optionRateEmail = rmp_is_checked( 'input#rmp-rate-email' );
    $optionFeedbackEmail = rmp_is_checked( 'input#rmp-feedback-email' );
    $optionFeedback = rmp_is_checked( 'input#rmp-feedback' );
    $optionSocial = rmp_is_checked( 'input#rmp-social' );
    $optionCookieDisabled = rmp_is_checked( 'input#rmp-cookie-disable' );
    $optionRichSnippet = rmp_is_checked( 'input#rmp-rich-snippet' );
    $ratingWidgetResult = rmp_is_checked( 'input#rmp-rating-widget-result' );
    $notShowRating = rmp_is_checked( 'input#rmp-not-show-rating' );
    $recalculate = rmp_is_checked( 'input#rmp-recalculate' );
		$halfStars = rmp_is_checked( 'input#rmp-half-stars' );
    $hoverTexts = rmp_is_checked( 'input#rmp-hover-texts' );
    $noHeadings = rmp_is_checked( 'input#rmp-no-headings' );
    $multiLingual = rmp_is_checked( 'input#rmp-multilingual' );
    $noFontawesome = rmp_is_checked( 'input#rmp-no-fontawesome' );
    $analytics = rmp_is_checked( 'input#rmp-analytics' );
    $limitedNegCount = rmp_is_checked( 'input#rmp-limited-negative-count' );
    $preventAccidental = rmp_is_checked( 'input#rmp-prevent-accidental' );
    $wipeOnUninstall = rmp_is_checked( 'input#rmp-uninstall-wipe' );
    $loadModernizr = rmp_is_checked( 'input#rmp-load-modernizr' );
    $ampCompatibility = rmp_is_checked( 'input#rmp-amp-compatibility' );
    $archivePages = rmp_is_checked( 'input#rmp-archives' );
    $socialShare = rmp_is_checked( 'input#rmp-social-share' );
    $ajaxLoad = rmp_is_checked( 'input#rmp-ajax-load' );

    //get value settings
    $icontype = $('select#rmp-icon-type').val();
    $structuredDataType = $('select#rmp-structured-data-type').val();
    $positiveNegative = $('input#rmp-negative-positive').val();
		$exclude = $('input#rmp-exclude').val();
    $cptRating = $('input#rmp-custom-post-types-rating').val();
    $cptResult = $('input#rmp-custom-post-types-result').val();
		$facebook = $('input#rmp-facebook').val();
		$pinterest = $('input#rmp-pinterest').val();
		$youtube = $('input#rmp-youtube').val();
		$flickr = $('input#rmp-flickr').val();
		$instagram = $('input#rmp-instagram').val();
		$twitter = $('input#rmp-twitter').val();
		$linkedin = $('input#rmp-linkedin').val();
    $widgetAlign = $('select#widget-align').val();

		$.ajax({
			type: 'POST',
			url: rmp_backend_update.admin_ajax,
			data: {
					action:             'update_options',
          nonce:               rmp_backend_update.nonce,
					posts:               $optionPosts,
					pages:               $optionPages,
					rate_email:          $optionRateEmail,
					feedback_email:      $optionFeedbackEmail,
					feedback:            $optionFeedback,
					social:              $optionSocial,
					exclude:             $exclude,
					cookieDisable:       $optionCookieDisabled,
					fb:                  $facebook,
					pinterest:           $pinterest,
					youtube:             $youtube,
					flickr:              $flickr,
					instagram:           $instagram,
					twitter:             $twitter,
					linkedin:            $linkedin,
					resultPost:          $optionPostsResult,
					resultPages:         $optionPagesResult,
					richSnippet:         $optionRichSnippet,
          ratingWidgetResult:  $ratingWidgetResult,
          icon_type:           $icontype,
          notShowRating:       $notShowRating,
          positiveNegative:    $positiveNegative,
          recalculate:         $recalculate,
          halfStars:           $halfStars,
          hoverTexts:          $hoverTexts,
          noHeadings:          $noHeadings,
          multiLingual:        $multiLingual,
          noFontawesome:       $noFontawesome,
          analytics:           $analytics,
          cptRating:           $cptRating,
          cptResult:           $cptResult,
          limitedNegCount:     $limitedNegCount,
          preventAccidental:   $preventAccidental,
          wipeOnUninstall:     $wipeOnUninstall,
          loadModernizr:       $loadModernizr,
          ampCompatibility:    $ampCompatibility,
          archivePages:        $archivePages,
          socialShare:         $socialShare,
          widgetAlign:         $widgetAlign,
          structuredDataType:  $structuredDataType,
          ajaxLoad:            $ajaxLoad,
			},
			success: function (result) {
				$('#rmp-options-update-alert').text(result);
				setTimeout(function(){ $('#rmp-options-update-alert').text('');  }, 3000);
			}
		});
	});

	//AJAX RESET SETTINGS
	$('#rmp-reset-settings').click(function() {
		if ( confirm( rmp_backend_update.resetConfirm ) ) {
			$.ajax({
				type: 'POST',
				url: rmp_backend_update.admin_ajax,
				data: {
						action:         'reset_options',
            nonce: rmp_backend_update.nonce,
				},
				success: function (result) {
					$('#rmp-options-update-alert').text(result);
					location.reload();
				}
			});
	}
	});

	//AJAX SAVE CUSTOMIZATION
	$('#rmp-save-customization').click(function() {
		$('#rmp-customization-update-alert').text(rmp_backend_update.save);
		//get customization
		$rateTitle = $('input#rmp-rate-title').val();
		$rateSubtitle = $('input#rmp-rate-subtitle').val();
		$rateResultText = $('input#rmp-rate-result').val();
		$rateResultText2 = $('input#rmp-rate-result2').val();
		$rateCookie = $('input#rmp-rate-cookie').val();
		$rateNoVotes = $('input#rmp-rate-norate').val();
		$rateAfterVote = $('input#rmp-rate-aftervote').val();
		$rateOneStar = $('input#rmp-rate-star1').val();
		$rateTwoStar = $('input#rmp-rate-star2').val();
		$rateThreeStar = $('input#rmp-rate-star3').val();
		$rateFourStar = $('input#rmp-rate-star4').val();
		$rateFiveStar = $('input#rmp-rate-star5').val();
		$socialTitle = $('input#rmp-social-title').val();
		$socialSubtitle = $('input#rmp-social-subtitle').val();
		$feedbackTitle = $('input#rmp-feedback-title').val();
		$feedbackSubtitle = $('input#rmp-feedback-subtitle').val();
		$feedbackText = $('input#rmp-feedback-text').val();
		$feedbackAfter = $('input#rmp-feedback-notice').val();
		$feedbackButton = $('input#rmp-feedback-button').val();
		$titleFontSize = $('input#rmp-title-font').val();
		$subtitleFontSize = $('input#rmp-subtitle-font').val();
		$textFontSize = $('input#rmp-text-font').val();
		$titleMarginBottom = $('input#rmp-title-margin').val();
		$subtitleMarginBottom = $('input#rmp-subtitle-margin').val();
		$socialFontSize = $('input#rmp-social-font').val();
		$feedbackEmpty = $('input#rmp-feedback-empty').val();
    $iconSize = $('input#rmp-icon-size').val();
    $iconColorResults = $('input#rmp-icon-color-results-widget').val();
    $iconColorHover = $('input#rmp-icon-color-hover').val();
    $iconColorRated = $('input#rmp-icon-color-rated').val();
    $iconColorAvg = $('input#rmp-icon-color-avg').val();
    $borderWidth = $('input#rmp-border-width').val();
    $borderRadius = $('input#rmp-border-radius').val();
    $borderColor = $('input#rmp-border-color').val();
    $backgroundColor = $('input#rmp-background-color').val();
    $iconMargin = $('input#rmp-icon-margin').val();
    $customResultsText = $('input#rmp-custom-results-text').val();
    $submitButtonText = $('input#rmp-submit-rating-button').val();

    //send customization
		$.ajax({
			type: 'POST',
			url: rmp_backend_update.admin_ajax,
			data: {
					action:                'update_customization',
          nonce:                 rmp_backend_update.nonce,
					rateTitle:             $rateTitle,
					rateSubtitle:          $rateSubtitle,
					rateResult:            $rateResultText,
					rateResult2:           $rateResultText2,
					cookieNotice:          $rateCookie,
					noRating:              $rateNoVotes,
					afterVote:             $rateAfterVote,
					star1:                 $rateOneStar,
					star2:                 $rateTwoStar,
					star3:                 $rateThreeStar,
					star4:                 $rateFourStar,
					star5:                 $rateFiveStar,
					socialTitle:           $socialTitle,
					socialSubtitle:        $socialSubtitle,
					feedbackTitle:         $feedbackTitle,
					feedbackSubtitle:      $feedbackSubtitle,
					feedbackText:          $feedbackText,
					feedbackNotice:        $feedbackAfter,
					feedbackButton:        $feedbackButton,
					titleFontSize:         $titleFontSize,
					subtitleFontSize:      $subtitleFontSize,
					textFontSize:          $textFontSize,
					titleMarginBottom:     $titleMarginBottom,
					subtitleMarginBottom:  $subtitleMarginBottom,
					socialFontSize:        $socialFontSize,
					feedbackAlert:         $feedbackEmpty,
          iconSize:              $iconSize,
          iconColorResults:      $iconColorResults,
          iconColorHover:        $iconColorHover,
          iconColorRated:        $iconColorRated,
          iconColorAvg:          $iconColorAvg,
          borderWidth:           $borderWidth,
          borderRadius:          $borderRadius,
          borderColor:           $borderColor,
          backgroundColor:       $backgroundColor,
          iconMargin:            $iconMargin,
          customResultsText:     $customResultsText,
          submitButtonText:      $submitButtonText,
			},
			success: function (result) {
        console.log(result);
				$('#rmp-customization-update-alert').text(result);
				setTimeout(function(){ $('#rmp-customization-update-alert').text('');  }, 3000);
			}
		});
	});

	//AJAX RESET CUSTOMIZATION
	$('#rmp-reset-customization').click(function() {
		if ( confirm( rmp_backend_update.resetConfirm ) ) {
			$.ajax({
				type: 'POST',
				url: rmp_backend_update.admin_ajax,
				data: {
						action: 'reset_customization',
            nonce: rmp_backend_update.nonce,
				},
				success: function (result) {
					$('#rmp-customization-update-alert').text(result);
					location.reload();
				}
			});
	}
	});

  //AJAX SAVE SECURITY OPTIONS
  $('#rmp-save-security').click(function() {
    $('#rmp-security-update-alert').text(rmp_backend_update.save);
    //get checkbox settings
    $recaptcha = rmp_is_checked( 'input#rmp-recaptcha' );
    //get value settings
    $privileges = $('select#rmp-privileges').val();
    $votingPriv = $('select#rmp-voting-priv').val();
    $siteKey = $('input#rmp-site-key').val();
    $secretKey = $('input#rmp-secret-key').val();
    $ipTracking = $('select#rmp-ip-tracking').val();
    $userTracking = $('select#rmp-user-tracking').val();
    $ipDoubleVote = $('select#rmp-ip-double-vote').val();

    $.ajax({
      type: 'POST',
      url: rmp_backend_update.admin_ajax,
      data: {
          action:             'update_security',
          nonce:               rmp_backend_update.nonce,
          recaptcha:           $recaptcha,
          privileges:          $privileges,
          siteKey:             $siteKey,
          secretKey:           $secretKey,
          votingPriv:          $votingPriv,
          ipTracking:          $ipTracking,
          userTracking:        $userTracking,
          ipDoubleVote:        $ipDoubleVote,
      },
      success: function (result) {
        $('#rmp-security-update-alert').text(result);
        setTimeout(function(){ $('#rmp-security-update-alert').text('');  }, 3000);
      }
    });
  });

  //AJAX MIGRATE
  $('#rmp-migrate').click(function() {
    $('#rmp-migration-update-alert').text('Migration in process...');

    $.ajax({
      type: 'POST',
      url: rmp_backend_update.admin_ajax,
      data: {
          action:             'migrate_data',
          nonce:               rmp_backend_update.nonce,
      },
      success: function (result) {
        $('#rmp-migration-update-alert').text(result);
        //setTimeout(function(){ $('#rmp-security-update-alert').text('');  }, 3000);
      }
    });
  });

  //FUNCTIONS
  //check if field is checked or not
  function rmp_is_checked ( $selector ) {
    if ( $( $selector ).is(':checked') ) {
      return 2;
    } else {
      return 1;
    };
  }


});
