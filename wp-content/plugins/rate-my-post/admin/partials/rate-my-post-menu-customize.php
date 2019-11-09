<?php

/**
 * Admin template
 *
 * @link       http://wordpress.org/plugins/rate-my-post/
 * @since      2.0.0
 *
 * @package    Rate_My_Post
 * @subpackage Rate_My_Post/admin/partials
 */
?>

<?php
  if ( ! defined( 'WPINC' ) ) {
  	die;
  }
?>

<?php $rmp_customization = get_option( 'rmp_customize_strings' ); ?>

<div class="rmp-stats rmp-tabcontent" id="rmp-tab-2">
  <h2 class="rmp-admin-title"><?php echo ( esc_html__( 'Customize Plugin', 'rate-my-post' ) ); ?></h2>
  <p class="rmp-tip">
    <i>*<?php echo ( esc_html__( 'Tip: First enable delete cookie on page load in settings. Add shortcode [ratemypost] to one of your posts and open it in the preview mode. Then custmize this plugin to your liking - after saving settings reload the post in the preview mode to see the changes you have made. After testing you can reset the ratings in meta box in edit post.', 'rate-my-post' ) ); ?></i>
  </p>
  <h3><?php echo ( esc_html__( 'Strings - Rating Widget', 'rate-my-post' ) ); ?></h3>
  <div class="admin-main-view">
    <table id="rmp-customize-main-table">
      <tr>
        <td>
          <div class="form-group rmp-rate-line">
            <label for="rmp-rate-title">
              <?php echo ( esc_html__( 'Title', 'rate-my-post' ) ); ?>:
            </label>
            <input type="text" class="form-control rmp-customize-input" id="rmp-rate-title" value="<?php echo stripslashes( esc_html( $rmp_customization['rateTitle'] ) ); ?>">
          </div>
        </td>
        <td>
          <div class="form-group rmp-rate-line">
            <label for="rmp-rate-subtitle">
              <?php echo ( esc_html__( 'Subtitle', 'rate-my-post' ) ); ?>:
            </label>
            <input type="text" class="form-control rmp-customize-input" id="rmp-rate-subtitle" value="<?php echo stripslashes( esc_html( $rmp_customization['rateSubtitle'] ) ); ?>">
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <div class="form-group rmp-rate-line">
            <label for="rmp-rate-result">
              <?php echo ( esc_html__( 'Result text - average rating', 'rate-my-post' ) ); ?>:
            </label>
            <input type="text" class="form-control rmp-customize-input" id="rmp-rate-result" value="<?php echo stripslashes( esc_html( $rmp_customization['rateResult'] ) ); ?>">
          </div>
        </td>
        <td>
          <div class="form-group rmp-rate-line">
            <label for="rmp-rate-result2">
              <?php echo ( esc_html__( 'Result text - vote count', 'rate-my-post' ) ); ?>:
            </label>
            <input type="text" class="form-control rmp-customize-input" id="rmp-rate-result2" value="<?php echo stripslashes( esc_html( $rmp_customization['rateResult2'] ) ); ?>">
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <div class="form-group rmp-rate-line">
            <label for="rmp-rate-cookie">
              <?php echo ( esc_html__( 'Text if somebody tries to vote twice', 'rate-my-post' ) ); ?>:
              </label>
            <input type="text" class="form-control rmp-customize-input" id="rmp-rate-cookie" value="<?php echo stripslashes( esc_html( $rmp_customization['cookieNotice'] ) ); ?>">
          </div>
        </td>
        <td>
          <div class="form-group rmp-rate-line">
          <label for="rmp-rate-norate">
            <?php echo ( esc_html__( 'Result text if no votes', 'rate-my-post' ) ); ?>:
            </label>
          <input type="text" class="form-control rmp-customize-input" id="rmp-rate-norate" value="<?php echo stripslashes( esc_html( $rmp_customization['noRating'] ) ); ?>">
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <div class="form-group rmp-rate-line">
            <label for="rmp-rate-aftervote">
              <?php echo ( esc_html__( 'Text after vote', 'rate-my-post' ) ); ?>:
            </label>
            <input type="text" class="form-control rmp-customize-input" id="rmp-rate-aftervote" value="<?php echo stripslashes( esc_html( $rmp_customization['afterVote'] ) ); ?>">
          </div>
        </td>
        <td>
          <div class="form-group rmp-rate-line">
            <label for="rmp-rate-star1">
              <?php echo ( esc_html__( 'One star hover text', 'rate-my-post' ) ); ?>:
            </label>
            <input type="text" class="form-control rmp-customize-input" id="rmp-rate-star1" value="<?php echo stripslashes( esc_html( $rmp_customization['star1'] ) ); ?>">
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <div class="form-group rmp-rate-line">
            <label for="rmp-rate-star2"><?php echo ( esc_html__( 'Two stars hover text', 'rate-my-post' ) ); ?>:</label>
            <input type="text" class="form-control rmp-customize-input" id="rmp-rate-star2" value="<?php echo stripslashes( esc_html( $rmp_customization['star2'] ) ); ?>">
          </div>
        </td>
        <td>
          <div class="form-group rmp-rate-line">
            <label for="rmp-rate-star3"><?php echo ( esc_html__( 'Three stars hover text', 'rate-my-post' ) ); ?>:</label>
            <input type="text" class="form-control rmp-customize-input" id="rmp-rate-star3" value="<?php echo stripslashes( esc_html( $rmp_customization['star3'] ) ); ?>">
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <div class="form-group rmp-rate-line">
          <label for="rmp-rate-star4"><?php echo ( esc_html__( 'Four stars hover text', 'rate-my-post' ) ); ?>:</label>
          <input type="text" class="form-control rmp-customize-input" id="rmp-rate-star4" value="<?php echo stripslashes( esc_html( $rmp_customization['star4'] ) ); ?>">
          </div>
        </td>
        <td>
          <div class="form-group rmp-rate-line">
            <label for="rmp-rate-star5"><?php echo ( esc_html__( 'Five stars hover text', 'rate-my-post' ) ); ?>:</label>
            <input type="text" class="form-control rmp-customize-input" id="rmp-rate-star5" value="<?php echo stripslashes( esc_html( $rmp_customization['star5'] ) ); ?>">
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <div class="form-group rmp-rate-line">
            <label for="rmp-submit-rating-button"><?php echo ( esc_html__( 'Submit rating button text', 'rate-my-post' ) ); ?>:</label>
            <input type="text" class="form-control rmp-customize-input" id="rmp-submit-rating-button" value="<?php echo stripslashes( esc_html( $rmp_customization['submitButtonText'] ) ); ?>">
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <div class="form-group rmp-rate-line">
          <label for="rmp-custom-results-text"><?php echo ( esc_html__( 'Custom results text', 'rate-my-post' ) ); ?>:</label>
          <input type="text" class="form-control rmp-customize-input" id="rmp-custom-results-text" value="<?php echo stripslashes( esc_html( $rmp_customization['customResultsText'] ) ); ?>">
          <p class="rmp-notice" style="max-width:380px;">
            <?php echo ( esc_html__( 'Replace the generic vote count and average rating text under the stars. Use {{votecount}} for number of votes and {{avgrating}} for average rating. Leave empty for default. This feature does not work in the multilingual website compatibility mode.', 'rate-my-post' ) ); ?>
          </p>
          </div>
        </td>
      </tr>
    </table>
  </div>

  <hr class="rmp-divider" />

  <div class="admin-social-view">
    <h3><?php echo ( esc_html__( 'Strings - Social Widget', 'rate-my-post' ) ); ?></h3>
    <table id="rmp-customize-social-table">
      <tr>
        <td>
          <div class="form-group rmp-rate-line">
            <label for="rmp-social-title">
              <?php echo ( esc_html__( 'Title', 'rate-my-post' ) ); ?>:
            </label>
            <input type="text" class="form-control rmp-customize-input" id="rmp-social-title" value="<?php echo stripslashes( esc_html( $rmp_customization['socialTitle'] ) ); ?>">
          </div>
        </td>
        <td>
          <div class="form-group rmp-rate-line">
            <label for="rmp-social-subtitle">
              <?php echo ( esc_html__( 'Subtitle', 'rate-my-post' ) ); ?>:
            </label>
            <input type="text" class="form-control rmp-customize-input" id="rmp-social-subtitle" value="<?php echo stripslashes( esc_html( $rmp_customization['socialSubtitle'] ) ); ?>">
          </div>
        </td>
      </tr>
    </table>
  </div>

  <hr class="rmp-divider" />

  <div class="admin-feedback-view">
    <h3><?php echo ( esc_html__( 'Strings - Feedback Widget', 'rate-my-post' ) ); ?></h3>
    <table id="rmp-customize-feedback-table">
      <tr>
        <td>
          <div class="form-group rmp-rate-line">
            <label for="rmp-feedback-title">
              <?php echo ( esc_html__( 'Title', 'rate-my-post' ) ); ?>:
            </label>
            <input type="text" class="form-control rmp-customize-input" id="rmp-feedback-title" value="<?php echo stripslashes( esc_html( $rmp_customization['feedbackTitle'] ) ); ?>">
          </div>
        </td>
        <td>
          <div class="form-group rmp-rate-line">
            <label for="rmp-feedback-subtitle"><?php echo ( esc_html__( 'Subtitle', 'rate-my-post' ) ); ?>:</label>
            <input type="text" class="form-control rmp-customize-input" id="rmp-feedback-subtitle" value="<?php echo stripslashes( esc_html( $rmp_customization['feedbackSubtitle'] ) ); ?>">
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <div class="form-group rmp-rate-line">
            <label for="rmp-feedback-text">
              <?php echo ( esc_html__( 'Text', 'rate-my-post' ) ); ?>:
            </label>
            <input type="text" class="form-control rmp-customize-input" id="rmp-feedback-text" value="<?php echo stripslashes( esc_html( $rmp_customization['feedbackText'] ) ); ?>">
          </div>
        </td>
        <td>
          <div class="form-group rmp-rate-line">
            <label for="rmp-feedback-notice">
              <?php echo ( esc_html__( 'Text after sending feedback', 'rate-my-post' ) ); ?>:
            </label>
            <input type="text" class="form-control rmp-customize-input" id="rmp-feedback-notice" value="<?php echo stripslashes( esc_html( $rmp_customization['feedbackNotice'] ) ); ?>">
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <div class="form-group rmp-rate-line">
            <label for="rmp-feedback-button">
              <?php echo ( esc_html__( 'Feedback button text', 'rate-my-post' ) ); ?>:
            </label>
            <input type="text" class="form-control rmp-customize-input" id="rmp-feedback-button" value="<?php echo stripslashes( esc_html( $rmp_customization['feedbackButton'] ) ); ?>">
          </div>
        </td>
        <td>
          <div class="form-group rmp-rate-line">
            <label for="rmp-feedback-empty">
              <?php echo ( esc_html__( 'Text if feedback is empty', 'rate-my-post' ) ); ?>:
            </label>
            <input type="text" class="form-control rmp-customize-input" id="rmp-feedback-empty" value="<?php echo stripslashes( esc_html( $rmp_customization['feedbackAlert'] ) ); ?>">
          </div>
        </td>
      </tr>
    </table>
  </div>
  <hr class="rmp-divider" />
  <div class="admin-custom-style">
    <p class="rmp-tip">
      <i>*<?php echo ( esc_html__( 'Leave empty for default style.', 'rate-my-post' ) ); ?></i>
    </p>
    <h3><?php echo ( esc_html__( 'Style - Global', 'rate-my-post' ) ); ?></h3>
    <table id="rmp-customize-style-global-table">
      <tr>
        <td>
          <div class="form-group rmp-rate-line">
            <label for="rmp-title-font">
              <?php echo ( esc_html__( 'Title Font Size', 'rate-my-post' ) ); ?>:
            </label>
            <input type="number" class="form-control rmp-customize-style-input" id="rmp-title-font" value="<?php echo Rate_My_Post_Admin_Helper::numeric_option( $rmp_customization['titleFontSize'] ); ?>">px
          </div>
        </td>
        <td>
          <div class="form-group rmp-rate-line">
            <label for="rmp-subtitle-font">
              <?php echo ( esc_html__( 'Subtitle Font Size', 'rate-my-post' ) ); ?>:
            </label>
            <input type="number" class="form-control rmp-customize-style-input" id="rmp-subtitle-font" value="<?php echo Rate_My_Post_Admin_Helper::numeric_option( $rmp_customization['subtitleFontSize'] ); ?>">px
          </div>
        </td>
        <td>
          <div class="form-group rmp-rate-line">
            <label for="rmp-text-font">
              <?php echo ( esc_html__( 'Text Font Size', 'rate-my-post' ) ); ?>:
            </label>
            <input type="number" class="form-control rmp-customize-style-input" id="rmp-text-font" value="<?php echo Rate_My_Post_Admin_Helper::numeric_option( $rmp_customization['textFontSize'] ); ?>">px
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <div class="form-group rmp-rate-line">
            <label for="rmp-title-margin">
              <?php echo ( esc_html__( 'Title Bottom Margin', 'rate-my-post' ) ); ?>:
            </label>
            <input type="number" class="form-control rmp-customize-style-input" id="rmp-title-margin" value="<?php echo Rate_My_Post_Admin_Helper::numeric_option( $rmp_customization['titleMarginBottom'] ); ?>">px
          </div>
        </td>
        <td>
          <div class="form-group rmp-rate-line">
            <label for="rmp-subtitle-margin">
              <?php echo ( esc_html__( 'Subtitle Bottom Margin', 'rate-my-post' ) ); ?>:
            </label>
            <input type="number" class="form-control rmp-customize-style-input" id="rmp-subtitle-margin" value="<?php echo Rate_My_Post_Admin_Helper::numeric_option( $rmp_customization['subtitleMarginBottom'] ); ?>">px
          </div>
        </td>
        <td>
          <div class="form-group rmp-rate-line">
            <label for="rmp-border-width">
              <?php echo ( esc_html__( 'Border Width', 'rate-my-post' ) ); ?>:
            </label>
            <input type="number" class="form-control rmp-customize-style-input" id="rmp-border-width" value="<?php echo Rate_My_Post_Admin_Helper::numeric_option( $rmp_customization['borderWidth'] ); ?>">px
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <div class="form-group rmp-rate-line">
            <label for="rmp-border-radius">
              <?php echo ( esc_html__( 'Border Radius', 'rate-my-post' ) ); ?>:
            </label>
            <input type="number" class="form-control rmp-customize-style-input" id="rmp-border-radius" value="<?php echo Rate_My_Post_Admin_Helper::numeric_option( $rmp_customization['borderRadius'] ); ?>">px
          </div>
        </td>
        <td>
          <div class="form-group rmp-rate-line">
            <label for="rmp-border-color">
              <?php echo ( esc_html__( 'Border Color', 'rate-my-post' ) ); ?>:
            </label>
            <input type="text" class="form-control rmp-customize-color-input" id="rmp-border-color" value="<?php echo esc_html( $rmp_customization['borderColor'] ); ?>">
          </div>
        </td>
        <td>
          <div class="form-group rmp-rate-line">
            <label for="rmp-background-color">
              <?php echo ( esc_html__( 'Background Color', 'rate-my-post' ) ); ?>:
            </label>
            <input type="text" class="form-control rmp-customize-color-input" id="rmp-background-color" value="<?php echo esc_html( $rmp_customization['backgroundColor'] ); ?>">
          </div>
        </td>
      </tr>
    </table>
    <h3><?php echo ( esc_html__( 'Style - Rating Widget', 'rate-my-post' ) ); ?></h3>
    <p class="rmp-tip">
      <i>*<?php echo ( esc_html__( 'Insert hexadecimal colors - for example, #ff0000 for red. You can use', 'rate-my-post' ) ); ?> <a href="https://www.w3schools.com/colors/colors_picker.asp" target="_blank">W3 HTML Color Picker</a>.</i>
    </p>
    <table id="rmp-customize-style-rating-table">
      <tr>
        <td>
          <div class="form-group rmp-rate-line">
            <label for="rmp-icon-size">
              <?php echo ( esc_html__( 'Icon Size', 'rate-my-post' ) ); ?>:
            </label>
            <input type="number" class="form-control rmp-customize-style-input" id="rmp-icon-size" value="<?php echo Rate_My_Post_Admin_Helper::numeric_option( $rmp_customization['iconSize'] ); ?>">px
          </div>
        </td>
        <td>
          <div class="form-group rmp-rate-line">
            <label for="rmp-icon-color-results-widget">
              <?php echo ( esc_html__( 'Results Color', 'rate-my-post' ) ); ?>:
            </label>
            <input type="text" class="form-control rmp-customize-color-input" id="rmp-icon-color-results-widget" value="<?php echo esc_html( $rmp_customization['iconColorResults'] ); ?>">
          </div>
        </td>
        <td>
          <div class="form-group rmp-rate-line">
            <label for="rmp-icon-color-hover">
              <?php echo ( esc_html__( 'Hover Color', 'rate-my-post' ) ); ?>:
            </label>
            <input type="text" class="form-control rmp-customize-color-input" id="rmp-icon-color-hover" value="<?php echo esc_html( $rmp_customization['iconColorHover'] ); ?>">
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <div class="form-group rmp-rate-line">
            <label for="rmp-icon-color-rated">
              <?php echo ( esc_html__( 'Rated Color', 'rate-my-post' ) ); ?>:
            </label>
            <input type="text" class="form-control rmp-customize-color-input" id="rmp-icon-color-rated" value="<?php echo esc_html( $rmp_customization['iconColorRated'] ); ?>">
          </div>
        </td>
        <td>
          <div class="form-group rmp-rate-line">
            <label for="rmp-icon-color-avg">
              <?php echo ( esc_html__( 'Highlight Color', 'rate-my-post' ) ); ?>:
            </label>
            <input type="text" class="form-control rmp-customize-color-input" id="rmp-icon-color-avg" value="<?php echo esc_html( $rmp_customization['iconColorAvg'] ); ?>">
          </div>
        </td>
        <td>
          <div class="form-group rmp-rate-line">
            <label for="rmp-icon-margin">
              <?php echo ( esc_html__( 'Icon Margin', 'rate-my-post' ) ); ?>:
            </label>
            <input type="number" class="form-control rmp-customize-style-input" id="rmp-icon-margin" value="<?php echo Rate_My_Post_Admin_Helper::numeric_option( $rmp_customization['iconMargin'] ); ?>">px
          </div>
        </td>
      </tr>
    </table>
    <h3><?php echo ( esc_html__( 'Style - Social Widget', 'rate-my-post' ) ); ?></h3>
    <table id="rmp-customize-style-social-table">
        <tr>
          <td>
            <div class="form-group rmp-rate-line">
              <label for="rmp-social-font"><?php echo ( esc_html__( 'Social Icon Size', 'rate-my-post' ) ); ?>:</label>
              <input type="number" class="form-control rmp-customize-style-input" id="rmp-social-font" value="<?php echo Rate_My_Post_Admin_Helper::numeric_option( $rmp_customization['socialFontSize'] ); ?>">px
            </div>
        </td>
      </tr>
    </table>
  </div>
  <hr class="rmp-divider" />
  <button type="button" class="btn btn-primary" id="rmp-save-customization">
    <?php echo ( esc_html__( 'Save Customization Options', 'rate-my-post' ) ); ?>
  </button>
  <button type="button" class="btn btn-primary" id="rmp-reset-customization">
    <?php echo ( esc_html__( 'Reset Customization Options', 'rate-my-post' ) ); ?>
  </button>
  <p id="rmp-customization-update-alert"></p>
  <p>
    <i><b>*<?php echo ( esc_html__( 'Note: If you are using a cache plugin, clear page cache after saving customization options.', 'rate-my-post' ) ); ?></b></i>
  </p>
</div>
