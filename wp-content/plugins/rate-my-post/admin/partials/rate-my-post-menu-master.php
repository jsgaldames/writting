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

<!-- Menu Section Template -->
<h1>Rate my Post</h1>
<!-- TABS SECTION -->
<div class="rmp-tab">
  <button id="rmp-options-button" class="rmp-tablinks rmp-tabcontent-current" data-tab="rmp-tab-1">
    <?php echo ( esc_html__( 'Settings', 'rate-my-post' ) ); ?>
  </button>
  <button id="rmp-customize-button" class="rmp-tablinks" data-tab="rmp-tab-2">
    <?php echo ( esc_html__( 'Customize', 'rate-my-post' ) ); ?>
  </button>
  <button id="rmp-customize-button" class="rmp-tablinks" data-tab="rmp-tab-3">
    <?php echo ( esc_html__( 'Security', 'rate-my-post' ) ); ?>
  </button>
  <button id="rmp-customize-button" class="rmp-tablinks" data-tab="rmp-tab-4">
    <?php echo ( esc_html__( 'Migration Tools', 'rate-my-post' ) ); ?>
  </button>
  <button id="rmp-stats-button" class="rmp-tablinks" data-tab="rmp-tab-5">
    <?php echo ( esc_html__( 'About', 'rate-my-post' ) ); ?>
  </button>
</div>

<!-- ALERTS SECTION -->
<?php include_once plugin_dir_path( __FILE__ ) . 'rate-my-post-menu-alerts.php'; ?>
<!-- OPTIONS SECTION -->
<?php include_once plugin_dir_path( __FILE__ ) . 'rate-my-post-menu-options.php'; ?>
<!-- SECURITY SECTION -->
<?php include_once plugin_dir_path( __FILE__ ) . 'rate-my-post-menu-security.php'; ?>
<!-- MIGRATION TOOLS SECTION -->
<?php include_once plugin_dir_path( __FILE__ ) . 'rate-my-post-menu-migration.php'; ?>
<!-- CUSTOMIZE SECTION -->
<?php include_once plugin_dir_path( __FILE__ ) . 'rate-my-post-menu-customize.php'; ?>
<!-- ABOUT PLUGIN -->
<?php include_once plugin_dir_path( __FILE__ ) . 'rate-my-post-menu-about.php'; ?>
