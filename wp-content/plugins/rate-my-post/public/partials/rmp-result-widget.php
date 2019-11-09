<?php

/**
 * Public template
 *
 * @link       http://wordpress.org/plugins/rate-my-post/
 * @since      2.0.0
 *
 * @package    Rate_My_Post
 * @subpackage Rate_My_Post/public/partials
 */
?>

<?php
  $rmp_options = get_option( 'rmp_options' );
  $rating_icon_type = Rate_My_Post_Public_Helper::icon_type();
  $postID = get_the_id();
  $avgRating = Rate_My_Post_Public_Helper::average_rating( $postID );
  $voteCount = get_post_meta( $postID, 'rmp_vote_count', true );
  $iconClasses = Rate_My_Post_Public_Helper::icons_highlight_classes( $postID );
  $ajaxLoad = false;

  if ( $rmp_options['ajaxLoad'] == 2 ) {
    $ajaxLoad = true;
  }
?>

<!-- Rate my Post Results Template -->
<div class="rmp-results">
  <div class="star-result rmp-column <?php echo ( $ajaxLoad || !$avgRating ) ? 'rmp-no-display' : ''; ?>">
    <i class="<?php echo $rating_icon_type; ?> <?php echo ( !$ajaxLoad ) ? $iconClasses[0]['resultsWidget'] : ''; ?>"></i>
    <i class="<?php echo $rating_icon_type; ?> <?php echo ( !$ajaxLoad ) ? $iconClasses[1]['resultsWidget'] : ''; ?>"></i>
    <i class="<?php echo $rating_icon_type; ?> <?php echo ( !$ajaxLoad ) ? $iconClasses[2]['resultsWidget'] : ''; ?>"></i>
    <i class="<?php echo $rating_icon_type; ?> <?php echo ( !$ajaxLoad ) ? $iconClasses[3]['resultsWidget'] : ''; ?>"></i>
    <i class="<?php echo $rating_icon_type; ?> <?php echo ( !$ajaxLoad ) ? $iconClasses[4]['resultsWidget'] : ''; ?>"></i>
  </div>
  <div class="number-result rmp-column">
    <span id="avg-rating">
      <?php echo ( !$ajaxLoad && $avgRating ) ? $avgRating : ''; ?>
    </span>
  </div>
  <div class="total-votes rmp-column">
    <span id="num-votes">
      <?php echo ( !$ajaxLoad && $voteCount ) ? '(' . $voteCount . ')' : ''; ?>
    </span>
  </div>
</div>
<div class="rmp-spacer"></div>
