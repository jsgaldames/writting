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

<?php $feedback = Rate_My_Post_Admin_Helper::feedbacks(); ?>

<!-- Meta Box Template-->

<div class="rmp-rate-box">

  <div class="form-group rmp-rate-line">
    <label for="votes"><?php echo ( esc_html__( 'Number of Votes', 'rate-my-post' ) ); ?></label>
    <input type="text" class="form-control" id="votes" value="<?php echo intval( get_post_meta( get_the_id(), 'rmp_vote_count', true ) ); ?>">
  </div>

  <hr />

  <div class="form-group rmp-rate-line">
    <label for="sum"><?php echo ( esc_html__( 'Sum of Ratings', 'rate-my-post' ) ); ?></label>
    <input type="text" class="form-control" id="sum" value="<?php echo intval( get_post_meta( get_the_id(), 'rmp_rating_val_sum', true ) ); ?>">
  </div>

  <hr />

  <div class="form-group rmp-rate-line">
    <label for="avg"><?php echo ( esc_html__( 'Average Rating', 'rate-my-post' ) ); ?></label>
    <input type="text" class="form-control" id="avg" disabled value="<?php echo Rate_My_Post_Admin_Helper::meta_box_average_rating(); ?>">
  </div>

  <button type="button" class="btn btn-primary" id="update-rating"><?php echo ( esc_html__( 'Update Rating', 'rate-my-post' ) ); ?></button>

  <button type="button" class="btn btn-primary" id="delete-feedback"><?php echo ( esc_html__( 'Delete Feedback', 'rate-my-post' ) ); ?></button>

  <p id="update-result"></p>

  <p>
    <i><?php echo ( esc_html__( 'Tip: Average rating value should be between 1 and 5. To reset the rating insert 0 in both fields and click Update Rating!', 'rate-my-post' ) ); ?></i>
  </p>

  <hr />

  <div class="form-group rmp-rate-line">
    <p id="rmp-feedback-title-meta-box" class="rmp-rate-bold"><?php echo ( esc_html__( 'Feedback', 'rate-my-post' ) ); ?></p>

    <div id="rmp-feedback-values">
      <?php if( $feedback ): ?>
        <table class="rmp-feedback__table">
          <tr>
            <th>Time</th>
            <th>Rating ID</th>
            <th>User</th>
            <th>Feedback</th>
            <th>Delete</th>
          </tr>
          <?php foreach( $feedback as $singleFeedback ): ?>
            <?php
              //get username if enabled and exists
              $userID = $singleFeedback['user'];
              $user = 'n/a';
              if ( $userID ) {
                $userInfo = get_userdata( $userID );
                $user = $userInfo->user_login;
              }
            ?>
            <tr class="rmp-feedback__table__row rmp-feedback__table__row--<?php echo $singleFeedback['id']; ?>">
              <td><?php echo ( $singleFeedback['time'] === false ) ? 'n/a':  $singleFeedback['time']; ?></td>
              <td><?php echo ( !array_key_exists( 'ratingID', $singleFeedback ) || ( $singleFeedback['ratingID'] === false ) ) ? 'n/a':  $singleFeedback['ratingID']; ?></td>
              <td><?php echo $user; ?></td>
              <td><?php echo $singleFeedback['feedback']; ?></td>
              <td><span class="<?php echo ( $singleFeedback['id'] === false ) ? 'rmp-feedback__table__delete rmp-feedback__table__delete--disabled': 'rmp-feedback__table__delete rmp-feedback__table__delete--enabled'; ?>" data-id="<?php echo $singleFeedback['id']; ?>">  <?php echo ( esc_html__( 'Delete', 'rate-my-post' ) ); ?></span></td>
            </tr>
          <?php endforeach; ?>
        </table>
      <?php else: ?>
        <?php echo ( esc_html__( 'No feedback so far!', 'rate-my-post' ) ); ?>
      <?php endif; ?>
    </div>

  </div>

</div>
