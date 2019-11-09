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

<div class="rmp-stats rmp-tabcontent rmp-about" id="rmp-tab-5">
  <h2 class="rmp-admin-title"><?php echo ( esc_html__( 'About Plugin', 'rate-my-post' ) ); ?></h2>
  <p>
    <?php echo ( esc_html__( 'Hi there', 'rate-my-post' ) ); ?>,
  </p>
  <p>
    <?php echo ( esc_html__( 'Thank you for installing Rate my Post plugin. If you like the plugin please rate it', 'rate-my-post' ) ); ?> <a href="https://wordpress.org/support/plugin/rate-my-post/reviews/" target="_blank"><?php echo ( esc_html__( 'here', 'rate-my-post' ) ); ?></a> - <?php echo ( esc_html__( 'it will take you 5 minutes (less if you are already registered on WordPress) and it means a lot to me since I made this plugin completely for free. If you encounter any problems with the plugin or you miss some features, let me know in the', 'rate-my-post' ) ); ?>
    <a href="https://wordpress.org/support/plugin/rate-my-post" target="_blank">
      <?php echo ( esc_html__( 'support forum', 'rate-my-post' ) ); ?>
    </a>.
    <br />
    <?php echo ( esc_html__( 'I hope you will enjoy the plugin', 'rate-my-post' ) ); ?>.
  </p>
  <p>
    <?php echo ( esc_html__( 'Best regards', 'rate-my-post' ) ); ?>,
    <br />
    Blaz, <?php echo ( esc_html__( 'the developer of Rate my Post plugin', 'rate-my-post' ) ); ?>
  </p>
  <div class="rmp-about__links">
    <a class="rmp-about__links__link" target="_blank" href="https://blazzdev.com/">
      <?php echo ( esc_html__( 'My Website', 'rate-my-post' ) ); ?>
    </a>
    <a class="rmp-about__links__link" target="_blank" href="https://blazzdev.com/documentation/rate-my-post-documentation/">
      <?php echo ( esc_html__( 'Documentation', 'rate-my-post' ) ); ?>
    </a>
    <p class="rmp-about__links__text">
      <?php echo ( esc_html__( 'Please do read the documentation before posting in the support forum.', 'rate-my-post' ) ); ?>
    </p>
  </div>
  <div class="rmp-about__links">
    <a class="rmp-about__links__link" target="_blank" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=HJH3AS8TP8FEC&source=url">
      <?php echo ( esc_html__( 'Donate', 'rate-my-post' ) ); ?>
    </a>
    <p class="rmp-about__links__text">
      <?php echo ( esc_html__( 'Become a supporter and ensure further development of the plugin!', 'rate-my-post' ) ); ?>
    </p>
  </div>
</div>
