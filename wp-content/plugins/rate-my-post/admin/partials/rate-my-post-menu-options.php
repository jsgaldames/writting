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

<?php $rmp_options = get_option( 'rmp_options' ); ?>

<div class="rmp-options rmp-tabcontent rmp-tabcontent-current" id="rmp-tab-1">
  <!-- RATING AND RESULTS WIDGET SETTINGS -->
  <h2 class="rmp-admin-title"><?php echo ( esc_html__( 'Rating Widget Settings', 'rate-my-post' ) ); ?></h2>
  <div class="rmp-option-group">
    <label class="rmp-label" for="rmp-posts">
      <?php echo ( esc_html__( 'Type of rating widget', 'rate-my-post' ) ); ?>
    </label>
    <select id="rmp-icon-type">
      <option value="1" <?php echo ($rmp_options['icon_type'] === 1) ? 'selected="selected"':""; ?>><?php echo ( esc_html__( 'Stars', 'rate-my-post' ) ); ?></option>
      <option value="2" <?php echo ($rmp_options['icon_type'] === 2) ? 'selected="selected"':""; ?>><?php echo ( esc_html__( 'Thumbs', 'rate-my-post' ) ); ?></option>
      <option value="3" <?php echo ($rmp_options['icon_type'] === 3) ? 'selected="selected"':""; ?>><?php echo ( esc_html__( 'Hearts', 'rate-my-post' ) ); ?></option>
      <option value="4" <?php echo ($rmp_options['icon_type'] === 4) ? 'selected="selected"':""; ?>><?php echo ( esc_html__( 'Smileys', 'rate-my-post' ) ); ?></option>
      <option value="5" <?php echo ($rmp_options['icon_type'] === 5) ? 'selected="selected"':""; ?>><?php echo ( esc_html__( 'Trophies', 'rate-my-post' ) ); ?></option>
    </select>
    <p class="rmp-notice">
      <?php echo ( esc_html__( 'Rate my Post supports the following icons: Stars, thumbs and hearts', 'rate-my-post' ) ); ?>.
    </p>
  </div>
  <div class="rmp-option-group">
    <label class="rmp-label" for="rmp-widget-align">
      <?php echo ( esc_html__( 'Rating widget alignment', 'rate-my-post' ) ); ?>
    </label>
    <select id="widget-align">
      <option value="1" <?php echo ($rmp_options['widgetAlign'] === 1) ? 'selected="selected"':""; ?>><?php echo ( esc_html__( 'Center', 'rate-my-post' ) ); ?></option>
      <option value="2" <?php echo ($rmp_options['widgetAlign'] === 2) ? 'selected="selected"':""; ?>><?php echo ( esc_html__( 'Left', 'rate-my-post' ) ); ?></option>
      <option value="3" <?php echo ($rmp_options['widgetAlign'] === 3) ? 'selected="selected"':""; ?>><?php echo ( esc_html__( 'Right', 'rate-my-post' ) ); ?></option>
    </select>
    <p class="rmp-notice">
      <?php echo ( esc_html__( 'You can align the widget left, right or center', 'rate-my-post' ) ); ?>.
    </p>
  </div>
  <table id="rmp-settings-rating-table">
    <tr>
      <td>
        <div class="rmp-option-group">
          <input id="rmp-posts" type="checkbox" <?php echo ($rmp_options['posts'] === 2) ? 'checked':""; ?>>
          <label class="rmp-label" for="rmp-posts">
            <?php echo ( esc_html__( 'Add rating widget to all posts', 'rate-my-post' ) ); ?>
          </label>
          <p class="rmp-notice">
            <?php echo ( esc_html__( 'Automatically adds rating widget to all your posts, after the content. You can also manually add the rating widget with shortcode: [ratemypost]', 'rate-my-post' ) ); ?>
          </p>
        </div>
      </td>
      <td>
        <div class="rmp-option-group">
          <input id="rmp-pages" type="checkbox" <?php echo ($rmp_options['pages'] === 2) ? 'checked':""; ?>>
          <label class="rmp-label" for="rmp-pages">
            <?php echo ( esc_html__( 'Add rating widget to all pages', 'rate-my-post' ) ); ?>
          </label>
          <p class="rmp-notice">
            <?php echo ( esc_html__( 'Automatically adds rating widget to all your pages, after the content. You can also manually add the rating widget with shortcode: [ratemypost]', 'rate-my-post' ) ); ?>
          </p>
        </div>
      </td>
    </tr>
    <tr>
      <td>
        <div class="rmp-option-group">
            <input id="rmp-post-results" type="checkbox" <?php echo ($rmp_options['resultPost'] === 2) ? 'checked':""; ?>>
            <label class="rmp-label" for="rmp-post-results">
              <?php echo ( esc_html__( 'Add result widget to all posts', 'rate-my-post' ) ); ?>
            </label>
            <p class="rmp-notice">
              <?php echo ( esc_html__( 'Automatically adds result widget to all your posts, before the content. Results widget will be displayed only if post has already been rated. You can also manually add the result widget with shortcode: [ratemypost-result]', 'rate-my-post' ) ); ?>
            </p>
        </div>
      </td>
      <td>
        <div class="rmp-option-group">
            <input id="rmp-page-results" type="checkbox" <?php echo ($rmp_options['resultPages'] === 2) ? 'checked':""; ?>>
            <label class="rmp-label" for="rmp-page-results">
              <?php echo ( esc_html__( 'Add result widget to all pages', 'rate-my-post' ) ); ?>
            </label>
            <p class="rmp-notice">
              <?php echo ( esc_html__( 'Automatically adds result widget to all your pages, before the content. Results widget will be displayed only if page has already been rated. You can also manually add the result widget with shortcode: [ratemypost-result]', 'rate-my-post' ) ); ?>
            </p>
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <div class="rmp-option-group">
            <input id="rmp-rate-email" type="checkbox" <?php echo ($rmp_options['rate_email'] === 2) ? 'checked':""; ?>>
            <label class="rmp-label" for="rmp-rate-email">
              <?php echo ( esc_html__( 'Send me email whenever post gets rated', 'rate-my-post' ) ); ?>
            </label>
            <p class="rmp-notice">
              <?php echo ( esc_html__( 'You will get an email whenever somebody rates your post or page', 'rate-my-post' ) ); ?>.
            </p>
          </div>
        </td>
        <td>
          <div class="rmp-option-group">
            <input id="rmp-rich-snippet" type="checkbox" <?php echo ($rmp_options['richSnippet'] === 2) ? 'checked':""; ?>>
            <label class="rmp-label" for="rmp-rich-snippet">
              <?php echo ( esc_html__( 'Enable rich snippets', 'rate-my-post' ) ); ?>
            </label>
            <p class="rmp-notice">
              <?php echo ( esc_html__( 'Includes structured data for stars to be displayed in search engine results', 'rate-my-post' ) ); ?>.
              <span id="show-rmp-checkbox-notice">
                <a><?php echo ( esc_html__( 'Read more', 'rate-my-post' ) ); ?>&raquo;</a>
              </span>
            </p>
            <p id="rmp-checkbox-notice-hidden">
              <?php echo ( esc_html__( 'This feature adds aggregate rating for creative work structured data to your posts/pages. Structured data will be added only if the post has been rated at least once. You can test this feature with Google Structured Data testing tool. ', 'rate-my-post' ) ); ?><a href="https://search.google.com/structured-data/testing-tool" target="_blank">Structured Data Testing Tool</a>
            </p>
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <div class="rmp-option-group">
            <input id="rmp-rating-widget-result" type="checkbox" <?php echo ($rmp_options['ratingWidgetResult'] === 2) ? 'checked':""; ?>>
            <label class="rmp-label" for="rmp-rating-widget-result">
              <?php echo ( esc_html__( 'Color the stars in rating widget', 'rate-my-post' ) ); ?>
            </label>
            <p class="rmp-notice">
              <?php echo ( esc_html__( 'For example, if a post has an average rating of 4, 4 stars in rating widget will be colored', 'rate-my-post' ) ); ?>.
            </p>
          </div>
        </td>
        <td>
          <div class="rmp-option-group">
            <input id="rmp-half-stars" type="checkbox" <?php echo ($rmp_options['halfStars'] === 2) ? 'checked':""; ?>>
            <label class="rmp-label" for="rmp-half-stars">
              <?php echo ( esc_html__( 'Enable half stars', 'rate-my-post' ) ); ?>
            </label>
            <p class="rmp-notice">
              <?php echo ( esc_html__( 'For example, if a post has an average rating of 4.5, 4.5 stars in rating widget and/or results widget will be colored.', 'rate-my-post' ) ); ?>.
            </p>
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <div class="rmp-option-group">
            <input id="rmp-hover-texts" type="checkbox" <?php echo ($rmp_options['hoverTexts'] === 2) ? 'checked':""; ?>>
            <label class="rmp-label" for="rmp-hover-texts">
              <?php echo ( esc_html__( 'Show star hover texts', 'rate-my-post' ) ); ?>
            </label>
            <p class="rmp-notice">
              <?php echo ( esc_html__( 'When user hovers over a star, a descriptive rating will be showed under the stars', 'rate-my-post' ) ); ?>.
            </p>
          </div>
        </td>
        <td>
          <div class="rmp-option-group">
            <input id="rmp-prevent-accidental" type="checkbox" <?php echo ($rmp_options['preventAccidental'] === 2) ? 'checked':""; ?>>
            <label class="rmp-label" for="rmp-prevent-accidental">
              <?php echo ( esc_html__( 'Prevent accidental votes', 'rate-my-post' ) ); ?>
            </label>
            <p class="rmp-notice">
              <?php echo ( esc_html__( 'Vote has to be confirmed by clicking the rate button', 'rate-my-post' ) ); ?>.
            </p>
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <div class="rmp-option-group">
            <input id="rmp-not-show-rating" type="checkbox" <?php echo ($rmp_options['notShowRating'] === 2) ? 'checked':""; ?>>
            <label class="rmp-label" for="rmp-not-show-rating">
              <?php echo ( esc_html__( 'Do not show average rating', 'rate-my-post' ) ); ?>
            </label>
            <p class="rmp-notice">
              <?php echo ( esc_html__( 'Removes average rating and vote count information under the rating widget', 'rate-my-post' ) ); ?>.
            </p>
          </div>
        </td>
        <td>
          <div class="rmp-option-group">
            <input id="rmp-recalculate" type="checkbox" <?php echo ($rmp_options['recalculate'] === 2) ? 'checked':""; ?>>
            <label class="rmp-label" for="rmp-recalculate">
              <?php echo ( esc_html__( 'Do not recalculate after vote', 'rate-my-post' ) ); ?>
            </label>
            <p class="rmp-notice">
              <?php echo ( esc_html__( 'Disable recalculating average rating and vote count for visitors after vote', 'rate-my-post' ) ); ?>.
            </p>
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <div class="rmp-option-group">
            <input id="rmp-analytics" type="checkbox" <?php echo ($rmp_options['analytics'] === 2) ? 'checked':""; ?>>
            <label class="rmp-label" for="rmp-analytics">
              <?php echo ( esc_html__( 'Google Analytics event tracking', 'rate-my-post' ) ); ?>
            </label>
            <p class="rmp-notice">
              <?php echo ( esc_html__( 'Track votes with Google Analytics - see supported plugins in the plugin description.', 'rate-my-post' ) ); ?>.
            </p>
          </div>
        </td>
        <td>
          <div class="rmp-option-group">
            <input id="rmp-cookie-disable" type="checkbox" <?php echo ($rmp_options['cookieDisable'] === 2) ? 'checked':""; ?>>
            <label class="rmp-label" for="rmp-cookie-disable">
              <?php echo ( esc_html__( 'Delete cookie on page load', 'rate-my-post' ) ); ?>
            </label>
            <p class="rmp-notice">
              <?php echo ( esc_html__( 'Enable only while you are cutomizing the plugin', 'rate-my-post' ) ); ?>.
            </p>
          </div>
        </td>
      </tr>
  </table>
  <div class="rmp-option-group">
    <label class="rmp-label" for="rmp-structured-data-type">
      <?php echo ( esc_html__( 'Type of structured data for rich snippets', 'rate-my-post' ) ); ?>
    </label>
    <select id="rmp-structured-data-type">
      <option value="none" <?php echo ($rmp_options['structuredDataType'] === 'none') ? 'selected="selected"':""; ?>>None</option>
      <option value="Product" <?php echo ($rmp_options['structuredDataType'] === 'Product') ? 'selected="selected"':""; ?>>Product</option>
      <option value="Book" <?php echo ($rmp_options['structuredDataType'] === 'Book') ? 'selected="selected"':""; ?>>Book</option>
      <option value="Course" <?php echo ($rmp_options['structuredDataType'] === 'Course') ? 'selected="selected"':""; ?>>Course</option>
      <option value="CreativeWorkSeason" <?php echo ($rmp_options['structuredDataType'] === 'CreativeWorkSeason') ? 'selected="selected"':""; ?>>CreativeWorkSeason</option>
      <option value="CreativeWorkSeries" <?php echo ($rmp_options['structuredDataType'] === 'CreativeWorkSeries') ? 'selected="selected"':""; ?>>CreativeWorkSeries</option>
      <option value="Episode" <?php echo ($rmp_options['structuredDataType'] === 'Episode') ? 'selected="selected"':""; ?>>Episode</option>
      <option value="Game" <?php echo ($rmp_options['structuredDataType'] === 'Game') ? 'selected="selected"':""; ?>>Game</option>
      <option value="LocalBusiness" <?php echo ($rmp_options['structuredDataType'] === 'LocalBusiness') ? 'selected="selected"':""; ?>>LocalBusiness</option>
      <option value="MediaObject" <?php echo ($rmp_options['structuredDataType'] === 'MediaObject') ? 'selected="selected"':""; ?>>MediaObject</option>
      <option value="Movie" <?php echo ($rmp_options['structuredDataType'] === 'Movie') ? 'selected="selected"':""; ?>>Movie</option>
      <option value="MusicPlaylist" <?php echo ($rmp_options['structuredDataType'] === 'MusicPlaylist') ? 'selected="selected"':""; ?>>MusicPlaylist</option>
      <option value="MusicRecording" <?php echo ($rmp_options['structuredDataType'] === 'MusicRecording') ? 'selected="selected"':""; ?>>MusicRecording</option>
      <option value="Organization" <?php echo ($rmp_options['structuredDataType'] === 'Organization') ? 'selected="selected"':""; ?>>Organization</option>
      <option value="Recipe" <?php echo ($rmp_options['structuredDataType'] === 'Recipe') ? 'selected="selected"':""; ?>>Recipe</option>
    </select>
    <p class="rmp-notice">
      <?php echo ( esc_html__( 'The plugin supports all types of structured data for rich snippets besides from Event, HowTo and SoftwareApplication. Those can be implemented by using the rmp_structured_data filter', 'rate-my-post' ) ); ?>.
    </p>
  </div>
  <div class="form-group">
    <label class="rmp-label" for="rmp-exclude">
      <?php echo ( esc_html__( 'Exclude rating and result widget from', 'rate-my-post' ) ); ?>:
    </label>
    <input type="text" class="form-control rmp-settings-input" id="rmp-exclude" value="<?php echo esc_html( implode(',', $rmp_options['exclude'] ) ); ?>">
    <p class="rmp-notice">
      *<?php echo ( esc_html__( 'Insert comma separated post/page IDs', 'rate-my-post' ) ); ?>.
      <span id="show-rmp-notice">
        <a><?php echo ( esc_html__( 'Read more', 'rate-my-post' ) ); ?>&raquo;</a>
      </span>
    </p>
    <p id="rmp-notice-hidden">
      <?php echo ( esc_html__( 'Visit posts/pages menu in your admin dashboard and click on the page/post that you need an ID for. Then check the URL and you should see something like "www.expample.com/wp-admin/post.php?post=61&action=edit". The ID is the number in the URL. In this case it is 61.', 'rate-my-post' ) ); ?>
    </p>
  </div>
  <div class="form-group">
    <label class="rmp-label" for="rmp-negative-positive">
      <?php echo ( esc_html__( 'If post or page is rated X/5 stars or less, consider rating negative. X=', 'rate-my-post' ) ); ?>
    </label>
    <input type="text" class="form-control rmp-settings-input" id="rmp-negative-positive" value="<?php echo esc_html( $rmp_options['positiveNegative'] ); ?>">
    <p class="rmp-notice">
      *<?php echo ( esc_html__( 'Define what is a negative rating to use the feedback and social widget.', 'rate-my-post' ) ); ?>.
    </p>
  </div>

  <hr class="rmp-divider" />

  <!-- FEEDBACK WIDGET SETTINGS -->
  <h2 class="rmp-admin-title"><?php echo ( esc_html__( 'Feedback Widget Settings', 'rate-my-post' ) ); ?></h2>
  <table id="rmp-settings-feedback-table">
    <tr>
      <td>
        <div class="rmp-option-group">
          <input id="rmp-feedback" type="checkbox" <?php echo ($rmp_options['feedback'] === 2) ? 'checked':""; ?>>
          <label class="rmp-label" for="rmp-feedback">
            <?php echo ( esc_html__( 'Show feedback widget if rating is negative', 'rate-my-post' ) ); ?>
          </label>
          <p class="rmp-notice">
            <?php echo ( esc_html__( 'Encourage users to help you improve your posts. Only you can see the feedback. The feedback widget will be shown in case of a negative rating', 'rate-my-post' ) ); ?>.
          </p>
        </div>
      </td>
      <td>
        <div class="rmp-option-group">
          <input id="rmp-feedback-email" type="checkbox" <?php echo ($rmp_options['feedback_email'] === 2) ? 'checked':""; ?>>
          <label class="rmp-label" for="rmp-feedback-email">
            <?php echo ( esc_html__( 'Send me email whenever feedback is left', 'rate-my-post' ) ); ?>
          </label>
          <p class="rmp-notice">
            <?php echo ( esc_html__( 'You will get an email whenever somebody leaves you private feedback', 'rate-my-post' ) ); ?>.
          </p>
        </div>
      </td>
    </tr>
    <tr>
      <td>
        <div class="rmp-option-group">
          <input id="rmp-limited-negative-count" type="checkbox" <?php echo ($rmp_options['limitedNegCount'] === 2) ? 'checked':""; ?>>
          <label class="rmp-label" for="rmp-limited-negative-count">
            <?php echo ( esc_html__( 'Count negative ratings only if feedback is left', 'rate-my-post' ) ); ?>
          </label>
          <p class="rmp-notice">
            <?php echo ( esc_html__( 'If enabled negative ratings will be counted only if user leaves a feedback.', 'rate-my-post' ) ); ?>.
          </p>
        </div>
      </td>
    </tr>
  </table>

  <hr class="rmp-divider" />

  <!-- SOCIAL WIDGET SETTINGS -->
  <h2 class="rmp-admin-title"><?php echo ( esc_html__( 'Social Widget Settings', 'rate-my-post' ) ); ?></h2>
  <table id="rmp-settings-first-social-table">
    <tr>
      <td>
        <div class="rmp-option-group">
          <input id="rmp-social" type="checkbox" <?php echo ($rmp_options['social'] === 2) ? 'checked':""; ?>>
          <label class="rmp-label" for="rmp-social">
            <?php echo ( esc_html__( 'Show social widget if rating is positive', 'rate-my-post' ) ); ?>
          </label>
          <p class="rmp-notice">
            <?php echo ( esc_html__( 'Encourage users to follow you on social media. Insert links to your social media profiles below. The social widget will be shown in case of a positive rating', 'rate-my-post' ) ); ?>.
          </p>
        </div>
      </td>
      <td>
        <div class="rmp-option-group">
          <input id="rmp-social-share" type="checkbox" <?php echo ($rmp_options['socialShare'] === 2) ? 'checked':""; ?>>
          <label class="rmp-label" for="rmp-social-share">
            <?php echo ( esc_html__( 'Show social share links', 'rate-my-post' ) ); ?>
          </label>
          <p class="rmp-notice">
            <?php echo ( esc_html__( 'Enable this option if you want to show social share links instead of social follow links. Supported networks: Facebook, Pinterest, Twitter and Reddit', 'rate-my-post' ) ); ?>.
          </p>
        </div>
      </td>
    </tr>
  </table>
  <!-- SOCIAL WIDGET URLS-->
  <p>
    <i>*<?php echo ( esc_html__( 'If you do not want an icon to be displayed, leave the field below empty!', 'rate-my-post' ) ); ?></i>
  </p>
  <table id="rmp-settings-social-table">
    <tr>
      <td>
        <div class="form-group rmp-rate-line">
          <label for="rmp-facebook"><?php echo ( esc_html__( 'Your Facebook Page URL', 'rate-my-post' ) ); ?>:</label>
          <input type="text" class="form-control rmp-social-input" id="rmp-facebook" value="<?php echo esc_html( $rmp_options['fb'] ); ?>">
        </div>
      </td>
      <td>
        <div class="form-group rmp-rate-line">
          <label for="rmp-pinterest"><?php echo ( esc_html__( 'Your Pinterest Page URL', 'rate-my-post' ) ); ?>:</label>
          <input type="text" class="form-control rmp-social-input" id="rmp-pinterest" value="<?php echo esc_html( $rmp_options['pinterest'] ); ?>">
        </div>
      </td>
    </tr>
    <tr>
      <td>
        <div class="form-group rmp-rate-line">
          <label for="rmp-youtube"><?php echo ( esc_html__( 'Your Youtube Page URL', 'rate-my-post' ) ); ?>:</label>
          <input type="text" class="form-control rmp-social-input" id="rmp-youtube" value="<?php echo esc_html( $rmp_options['youtube'] ); ?>">
        </div>
      </td>
      <td>
        <div class="form-group rmp-rate-line">
          <label for="rmp-flickr"><?php echo ( esc_html__( 'Your Flickr Page URL', 'rate-my-post' ) ); ?>:</label>
          <input type="text" class="form-control rmp-social-input" id="rmp-flickr" value="<?php echo esc_html( $rmp_options['flickr'] ); ?>">
        </div>
      </td>
    </tr>
    <tr>
      <td>
        <div class="form-group rmp-rate-line">
          <label for="rmp-instagram"><?php echo ( esc_html__( 'Your Instagram Page URL', 'rate-my-post' ) ); ?>:</label>
          <input type="text" class="form-control rmp-social-input" id="rmp-instagram" value="<?php echo esc_html( $rmp_options['instagram'] ); ?>">
        </div>
      </td>
      <td>
        <div class="form-group rmp-rate-line">
          <label for="rmp-twitter"><?php echo ( esc_html__( 'Your Twitter Page URL', 'rate-my-post' ) ); ?>:</label>
          <input type="text" class="form-control rmp-social-input" id="rmp-twitter" value="<?php echo esc_html( $rmp_options['twitter'] ); ?>">
        </div>
      </td>
    </tr>
    <tr>
      <td>
        <div class="form-group rmp-rate-line">
          <label for="rmp-linkedin"><?php echo ( esc_html__( 'Your Linkedin Page URL', 'rate-my-post' ) ); ?>:</label>
          <input type="text" class="form-control rmp-social-input" id="rmp-linkedin" value="<?php echo esc_html( $rmp_options['linkedin'] ); ?>">
        </div>
      </td>
    </tr>
  </table>
  <hr class="rmp-divider" />
  <!-- CPT Settings -->
  <h2 class="rmp-admin-title"><?php echo ( esc_html__( 'Custom Post Types', 'rate-my-post' ) ); ?></h2>
  <div class="rmp-option-group">
    <label class="rmp-label" for="rmp-custom-post-types-rating">
      <?php echo ( esc_html__( 'Add rating widget automatically to custom post types', 'rate-my-post' ) ); ?>:
    </label>
    <input type="text" class="form-control rmp-settings-input" id="rmp-custom-post-types-rating" value="<?php echo esc_html( implode(',', $rmp_options['cptRating'] ) ); ?>">
    <p class="rmp-notice">
      <?php echo ( esc_html__( 'Insert comma separated post types. Registered custom post types', 'rate-my-post' ) ); ?>:
      <?php if ( Rate_My_Post_Admin_Helper::custom_post_types() !== false ): ?>
        <span class="rmp-cpt-detect" id="rmp-cpt-rating"><?php echo Rate_My_Post_Admin_Helper::custom_post_types(); ?></span>
      <?php else: ?>
        <span>/</span>
      <?php endif; ?>
    </p>
  </div>
  <div class="rmp-option-group">
    <label class="rmp-label" for="rmp-custom-post-types-result">
      <?php echo ( esc_html__( 'Add result widget automatically to custom post types', 'rate-my-post' ) ); ?>:
    </label>
    <input type="text" class="form-control rmp-settings-input" id="rmp-custom-post-types-result" value="<?php echo esc_html( implode(',', $rmp_options['cptResult'] ) ); ?>">
    <p class="rmp-notice">
      <?php echo ( esc_html__( 'Insert comma separated post types. Registered custom post types', 'rate-my-post' ) ); ?>:
      <?php if ( Rate_My_Post_Admin_Helper::custom_post_types() !== false ): ?>
        <span class="rmp-cpt-detect" id="rmp-cpt-result"><?php echo Rate_My_Post_Admin_Helper::custom_post_types(); ?></span>
      <?php else: ?>
        <span>/</span>
      <?php endif; ?>
    </p>
  </div>
  <hr class="rmp-divider" />
  <!-- Archive Pages Settings -->
  <h2 class="rmp-admin-title"><?php echo ( esc_html__( 'Archive Pages', 'rate-my-post' ) ); ?></h2>
  <table id="rmp-settings-archive-table">
    <tr>
      <td>
        <div class="rmp-option-group">
          <input id="rmp-archives" type="checkbox" <?php echo ($rmp_options['archivePages'] === 2) ? 'checked':""; ?>>
          <label class="rmp-label" for="rmp-archives">
            <?php echo ( esc_html__( 'Show ratings on archive pages', 'rate-my-post' ) ); ?>
          </label>
          <p class="rmp-notice">
            <?php echo ( esc_html__( 'Ratings will be shown on archive pages (categories, tags, author pages etc.) next to the title', 'rate-my-post' ) ); ?>.
          </p>
        </div>
      </td>
    </tr>
  </table>
  <hr class="rmp-divider" />
  <!-- ADVANCED SETTINGS -->
  <h2 class="rmp-admin-title"><?php echo ( esc_html__( 'Advanced Settings', 'rate-my-post' ) ); ?></h2>
  <table id="rmp-settings-advanced-table">
    <tr>
      <td>
        <div class="rmp-option-group">
          <input id="rmp-no-headings" type="checkbox" <?php echo ($rmp_options['noHeadings'] === 2) ? 'checked':""; ?>>
          <label class="rmp-label" for="rmp-no-headings">
            <?php echo ( esc_html__( 'Remove headings in rating widget', 'rate-my-post' ) ); ?>
          </label>
          <p class="rmp-notice">
            <?php echo ( esc_html__( 'Replaces headings in rating widget with paragraphs. A useful feature if you are using a table of contents plugin. You can style titles in the customize section or with custom CSS (.rmp-main-title)', 'rate-my-post' ) ); ?>.
          </p>
        </div>
      </td>
      <td>
        <div class="rmp-option-group">
          <input id="rmp-multilingual" type="checkbox" <?php echo ($rmp_options['multiLingual'] === 2) ? 'checked':""; ?>>
          <label class="rmp-label" for="rmp-multilingual">
            <?php echo ( esc_html__( 'Multilingual website compatibility mode', 'rate-my-post' ) ); ?>
          </label>
          <p class="rmp-notice">
            <?php echo ( esc_html__( 'If your website is available in multiple languages enable this option. You will not be able to customize strings in the customize section. Instead customize strings through your plugin for translations', 'rate-my-post' ) ); ?>.
          </p>
        </div>
      </td>
    </tr>
    <tr style="display:none">
      <!-- Legacy feature -->
      <td style="display:none">
        <div class="rmp-option-group">
          <input id="rmp-no-fontawesome" type="checkbox" <?php echo ($rmp_options['noFontawesome'] === 2) ? 'checked':""; ?>>
          <label class="rmp-label" for="rmp-no-fontawesome">
            <?php echo ( esc_html__( 'Do not load FontAwesome', 'rate-my-post' ) ); ?>
          </label>
          <p class="rmp-notice">
            <?php echo ( esc_html__( 'Plugin uses FontAwesome 4 to display icons (stars, thumbs etc.). If your theme or plugins load FontAwesome 4 enable this feature for better performance. Do not enable if you do not know what you are doing', 'rate-my-post' ) ); ?>.
          </p>
        </div>
      </td>
      <!-- Legacy feature -->
      <td style="display:none">
        <div class="rmp-option-group">
          <input id="rmp-load-modernizr" type="checkbox" <?php echo ($rmp_options['loadModernizr'] === 2) ? 'checked':""; ?>>
          <label class="rmp-label" for="rmp-load-modernizr">
            <?php echo ( esc_html__( 'Load Modernizr', 'rate-my-post' ) ); ?>
          </label>
          <p class="rmp-notice">
            <?php echo ( esc_html__( 'Modernizr is used for better compatibility with very old browsers. If your theme or plugins load Modernizr, this feature in rare cases causes conflicts. It is recommended that you test your website after enabling', 'rate-my-post' ) ); ?>.
          </p>
        </div>
      </td>
    </tr>
    <tr>
      <td>
        <div class="rmp-option-group">
          <input id="rmp-uninstall-wipe" type="checkbox" <?php echo ($rmp_options['wipeOnUninstall'] === 2) ? 'checked':""; ?>>
          <label class="rmp-label" for="rmp-uninstall-wipe">
            <?php echo ( esc_html__( 'Delete all plugin data on uninstall', 'rate-my-post' ) ); ?>
          </label>
          <p class="rmp-notice">
            <?php echo ( esc_html__( 'If enabled all plugin data (settings, customization, vote count, rating and feedback) will be deleted when you uninstall the plugin', 'rate-my-post' ) ); ?>.
          </p>
        </div>
      </td>
      <td>
        <div class="rmp-option-group">
          <input id="rmp-amp-compatibility" type="checkbox" <?php echo ($rmp_options['ampCompatibility'] === 2) ? 'checked':""; ?>>
          <label class="rmp-label" for="rmp-amp-compatibility">
            <?php echo ( esc_html__( 'AMP compatibility mode (BETA)', 'rate-my-post' ) ); ?>
          </label>
          <p class="rmp-notice">
            <?php echo ( esc_html__( 'Adds a minimalistic rating and result widget on AMP pages. This is a beta feature - check the', 'rate-my-post' ) ); ?>
            <a href="https://wordpress.org/support/plugin/rate-my-post/" target="_blank"><?php echo ( esc_html__( 'support forum', 'rate-my-post' ) ); ?></a>
            <?php echo ( esc_html__( 'before enabling', 'rate-my-post' ) ); ?>.
          </p>
        </div>
      </td>
    </tr>
    <tr>
      <td>
        <div class="rmp-option-group">
          <input id="rmp-ajax-load" type="checkbox" <?php echo ($rmp_options['ajaxLoad'] === 2) ? 'checked':""; ?>>
          <label class="rmp-label" for="rmp-ajax-load">
            <?php echo ( esc_html__( 'AJAX load results', 'rate-my-post' ) ); ?>
          </label>
          <p class="rmp-notice">
            <?php echo ( esc_html__( 'If you are utilizing page caching, enable this option. Not required if you use WP Super Cache, LiteSpeed Cache, WP Fastest Cache, WP Rocket or SG Optimizer', 'rate-my-post' ) ); ?>.
          </p>
        </div>
      </td>
    </tr>
  </table>
  <hr class="rmp-divider" />
  <!-- SAVE BUTTONS-->
  <button type="button" class="btn btn-primary" id="rmp-save-settings"><?php echo ( esc_html__( 'Save Settings', 'rate-my-post' ) ); ?></button>
  <button type="button" class="btn btn-primary" id="rmp-reset-settings"><?php echo ( esc_html__( 'Reset Settings', 'rate-my-post' ) ); ?></button>
  <p id="rmp-options-update-alert"></p>
</div>
