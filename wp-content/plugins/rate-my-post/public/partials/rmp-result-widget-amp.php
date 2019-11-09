<?php

/**
 * Rating Widget for AMP
 *
 * @link       http://wordpress.org/plugins/rate-my-post/
 * @since      2.3.0
 *
 * @package    Rate_My_Post
 * @subpackage Rate_My_Post/public/partials
 */
?>
<?php $rmpAmpContent = Rate_My_Post_Public_Helper::amp_results_output('amp-result'); ?>
<!-- Rate my Post AMP Results template -->
<div class="rmp-amp-results">
  <div class="rmp-amp-stars">
    <?php echo $rmpAmpContent['stars']; ?>
  </div>
  <div class="rmp-amp-average">
    <span><?php echo $rmpAmpContent['rating']; ?></span>
  </div>
  <div class="rmp-amp-votes">
    <span><?php echo $rmpAmpContent['votes']; ?></span>
  </div>
</div>
<div style="clear: both;"></div>
