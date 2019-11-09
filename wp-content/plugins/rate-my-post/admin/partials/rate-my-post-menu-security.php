<?php

/**
 * Admin template
 *
 * @link       http://wordpress.org/plugins/rate-my-post/
 * @since      2.4.0
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

<?php $rmp_security = get_option( 'rmp_security' ); ?>

<div class="rmp-security rmp-tabcontent" id="rmp-tab-3">
  <h2 class="rmp-admin-title"><?php echo ( esc_html__( 'Security Options', 'rate-my-post' ) ); ?></h2>
  <h3><?php echo ( esc_html__( 'Privileges', 'rate-my-post' ) ); ?></h3>

  <div class="rmp-option-group">
    <label class="rmp-label" for="rmp-privileges">
      <?php echo ( esc_html__( 'Ratings manipulation requires role of', 'rate-my-post' ) ); ?>
    </label>
    <select id="rmp-privileges">
      <option value="1" <?php echo ($rmp_security['privileges'] === 1) ? 'selected="selected"':""; ?>><?php echo ( esc_html__( 'Author', 'rate-my-post' ) ); ?></option>
      <option value="2" <?php echo ($rmp_security['privileges'] === 2) ? 'selected="selected"':""; ?>><?php echo ( esc_html__( 'Editor', 'rate-my-post' ) ); ?></option>
      <option value="3" <?php echo ($rmp_security['privileges'] === 3) ? 'selected="selected"':""; ?>><?php echo ( esc_html__( 'Admin', 'rate-my-post' ) ); ?></option>
    </select>
    <p class="rmp-notice">
      <?php echo ( esc_html__( 'Select which role is required to manipulate ratings in the backend. Authors can only manipulate ratings of their own posts.', 'rate-my-post' ) ); ?>.
    </p>
  </div>

  <div class="rmp-option-group">
    <label class="rmp-label" for="rmp-voting-priv">
      <?php echo ( esc_html__( 'Who can rate posts', 'rate-my-post' ) ); ?>
    </label>
    <select id="rmp-voting-priv">
      <option value="1" <?php echo ($rmp_security['votingPriv'] === 1) ? 'selected="selected"':""; ?>><?php echo ( esc_html__( 'Everybody', 'rate-my-post' ) ); ?></option>
      <option value="2" <?php echo ($rmp_security['votingPriv'] === 2) ? 'selected="selected"':""; ?>><?php echo ( esc_html__( 'Logged in users', 'rate-my-post' ) ); ?></option>
    </select>
    <p class="rmp-notice">
      <?php echo ( esc_html__( 'Select who can rate your posts. By default every visitor can rate posts.', 'rate-my-post' ) ); ?>.
    </p>
  </div>

  <hr class="rmp-divider" />

  <h3><?php echo ( esc_html__( 'Tracking', 'rate-my-post' ) ); ?></h3>

  <div class="rmp-option-group">
    <label class="rmp-label" for="rmp-ip-tracking">
      <?php echo ( esc_html__( 'Track IP addresses', 'rate-my-post' ) ); ?>
    </label>
    <select id="rmp-ip-tracking">
      <option value="1" <?php echo ($rmp_security['ipTracking'] === 1) ? 'selected="selected"':""; ?>><?php echo ( esc_html__( 'No', 'rate-my-post' ) ); ?></option>
      <option value="2" <?php echo ($rmp_security['ipTracking'] === 2) ? 'selected="selected"':""; ?>><?php echo ( esc_html__( 'Yes', 'rate-my-post' ) ); ?></option>
    </select>
    <p class="rmp-notice">
      <?php echo ( esc_html__( 'Track IP addresses of users who rate your posts or leave you feedback! This feature is NOT COMPLIANT WITH GDPR!', 'rate-my-post' ) ); ?>
    </p>
  </div>

  <div class="rmp-option-group">
    <label class="rmp-label" for="rmp-ip-double-vote">
      <?php echo ( esc_html__( 'Prevent double votes via IP', 'rate-my-post' ) ); ?>
    </label>
    <select id="rmp-ip-double-vote">
      <option value="1" <?php echo ($rmp_security['ipDoubleVote'] === 1) ? 'selected="selected"':""; ?>><?php echo ( esc_html__( 'No', 'rate-my-post' ) ); ?></option>
      <option value="2" <?php echo ($rmp_security['ipDoubleVote'] === 2) ? 'selected="selected"':""; ?>><?php echo ( esc_html__( 'Yes', 'rate-my-post' ) ); ?></option>
    </select>
    <p class="rmp-notice">
      <?php echo ( esc_html__( 'Prevent double votes by checking via IP if user already rated that post. This feature will only work if "Track IP addresses" is also enabled and is by default disabled for admins', 'rate-my-post' ) ); ?>.
    </p>
  </div>

  <div class="rmp-option-group">
    <label class="rmp-label" for="rmp-user-tracking">
      <?php echo ( esc_html__( 'Track users', 'rate-my-post' ) ); ?>
    </label>
    <select id="rmp-user-tracking">
      <option value="1" <?php echo ($rmp_security['userTracking'] === 1) ? 'selected="selected"':""; ?>><?php echo ( esc_html__( 'No', 'rate-my-post' ) ); ?></option>
      <option value="2" <?php echo ($rmp_security['userTracking'] === 2) ? 'selected="selected"':""; ?>><?php echo ( esc_html__( 'Yes', 'rate-my-post' ) ); ?></option>
    </select>
    <p class="rmp-notice">
      <?php echo ( esc_html__( 'This feature enables you to see who rated your posts and left you feedback!', 'rate-my-post' ) ); ?>
    </p>
  </div>

  <hr class="rmp-divider" />

  <h3><?php echo ( esc_html__( 'Spam Protection - Google reCAPTCHA v3', 'rate-my-post' ) ); ?></h3>
  <p class="rmp-tip">
    <i>*<?php echo ( esc_html__( 'The plugin supports Google reCAPTCHA v3 which verifies if an interaction is legitimate without any user interaction. You will need reCAPTCHA v3 site key and secret key to use this option. The service is free of charge. You can get the keys here', 'rate-my-post' ) ); ?>: <a href="https://www.google.com/recaptcha/admin/create" target="_blank">reCAPTCHA v3</a>. <?php echo ( esc_html__( 'ReCaptcha library adds a badge to your website with terms of use and privacy policy. You can hide it with custom css: .grecaptcha-badge {display: none;} However, note that you have to include link to terms of use and privacy policy according to reCAPTCHA v3 Terms of Use.', 'rate-my-post' ) ); ?> </i>
  </p>
  <p></p>
  <div class="form-group">
    <label class="rmp-label" for="rmp-site-key">
      <?php echo ( esc_html__( 'reCAPTCHA v3 Site Key', 'rate-my-post' ) ); ?>:
    </label>
    <input type="text" class="form-control rmp-settings-input" id="rmp-site-key" value="<?php echo esc_html( $rmp_security['siteKey'] ); ?>">
    <p class="rmp-notice">
      *<?php echo ( esc_html__( 'Insert Google reCAPTCHA v3 site key', 'rate-my-post' ) ); ?>.
    </p>
  </div>
  <div class="form-group">
    <label class="rmp-label" for="rmp-secret-key">
      <?php echo ( esc_html__( 'reCAPTCHA v3 Secret Key', 'rate-my-post' ) ); ?>:
    </label>
    <input type="text" class="form-control rmp-settings-input" id="rmp-secret-key" value="<?php echo esc_html( $rmp_security['secretKey'] ); ?>">
    <p class="rmp-notice">
      *<?php echo ( esc_html__( 'Insert Google reCAPTCHA v3 secret key', 'rate-my-post' ) ); ?>.
    </p>
  </div>
  <table id="rmp-settings-rating-table">
    <tr>
      <td>
        <div class="rmp-option-group">
          <input id="rmp-recaptcha" type="checkbox" <?php echo ($rmp_security['recaptcha'] === 2) ? 'checked':""; ?>>
          <label class="rmp-label" for="rmp-recaptcha">
            <?php echo ( esc_html__( 'Enable reCAPTCHA v3', 'rate-my-post' ) ); ?>
          </label>
          <p class="rmp-notice">
            <?php echo ( esc_html__( 'Automatically verifies if interactions are legitimate. Unlike the reCAPTCHA v2, it does not require any interaction from the visitor', 'rate-my-post' ) ); ?>.
          </p>
        </div>
      </td>
    </tr>
  </table>
  <button type="button" class="btn btn-primary" id="rmp-save-security">
    <?php echo ( esc_html__( 'Save Security Options', 'rate-my-post' ) ); ?>
  </button>
  <p id="rmp-security-update-alert"></p>

</div>
