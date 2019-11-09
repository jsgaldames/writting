<?php

/**
 * Admin template
 *
 * @link       http://wordpress.org/plugins/rate-my-post/
 * @since      2.1.0
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

<?php
  global $wp_version;
  $options = get_option( 'rmp_options' );
  $schemaType = $options['structuredDataType'];
  $richSnippets = $options['richSnippet'];
  $ajaxLoad = $options['ajaxLoad'];
?>

<?php if ( !current_user_can( 'manage_options' ) ): ?>
<div class="rmp-alert">
  <p class="rmp-alert__text">
    <?php echo ( esc_html__( 'You need to be logged in as administrator to save settings for Rate my Post plugin', 'rate-my-post' ) ); ?>.
  </p>
</div>
<?php endif; ?>

<?php if ( version_compare( $wp_version, '4.7.0' ) < 0 ): ?>
  <div class="rmp-alert">
    <p class="rmp-alert__text">
      <?php echo ( esc_html__( 'Rate my Post requires WordPress version 4.7.0 or higher. Please update your WordPress', 'rate-my-post' ) ); ?>.
    </p>
  </div>
<?php endif; ?>

<?php if ( $richSnippets === 2 && $schemaType === 'none' ): ?>
  <div class="rmp-alert">
    <p class="rmp-alert__text">
      <?php echo ( esc_html__( 'Select type of structured data for rich snippets if you want rich snippets to show in search engines', 'rate-my-post' ) ); ?>.
    </p>
  </div>
<?php endif; ?>

<?php if ( $ajaxLoad != 2 && $this->has_incompatible_caching() ): ?>
  <div class="rmp-alert">
    <p class="rmp-alert__text">
      <?php echo ( esc_html__( 'We detected a caching system. It is recommended that you enable Ajax Load in the advanced settings for better user experience.', 'rate-my-post' ) ); ?>.
    </p>
  </div>
<?php endif; ?>
