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

<div class="rmp-migration rmp-tabcontent" id="rmp-tab-4">
  <h2 class="rmp-admin-title"><?php echo ( esc_html__( 'Migration Tools', 'rate-my-post' ) ); ?></h2>
  <p class="rmp-tip">
    <i>*<?php echo ( esc_html__( 'The plugin allows you to easily migrate ratings from the following plugins: kk Star Ratings, WP-PostRatings and Yasr. More rating plugins will be supported in the future. Here you can submit requests', 'rate-my-post' ) ); ?>: <a href="https://wordpress.org/support/plugin/rate-my-post/" target="_blank">
      <?php echo ( esc_html__( 'Support Forum', 'rate-my-post' ) ); ?>
    </a> </i>
  </p>
  <h3>
    <?php echo ( esc_html__( 'Detected Rating Plugin', 'rate-my-post' ) ); ?>:
    <u>
      <?php if ( Rate_My_Post_Admin_Helper::existing_rating_plugin() ): ?>
        <?php echo Rate_My_Post_Admin_Helper::existing_rating_plugin();  ?>
      <?php else: ?>
        <?php echo esc_html__( 'No rating plugin found. Migration is not possible.', 'rate-my-post' ); ?>
      <?php endif; ?>
    </u>
  </h3>

  <?php if ( Rate_My_Post_Admin_Helper::existing_rating_plugin() ): ?>
    <p><b>
      <?php echo esc_html__( 'Note: If you already used Rate my Post plugin, the Rate my Post ratings will be overwritten during the migration!', 'rate-my-post' ); ?>
    </b></p>
    <button type="button" class="btn btn-primary" id="rmp-migrate">
      <?php echo ( esc_html__( 'Start Migration', 'rate-my-post' ) ); ?>
    </button>
  <?php endif; ?>

  <p id="rmp-migration-update-alert"></p>

</div>
