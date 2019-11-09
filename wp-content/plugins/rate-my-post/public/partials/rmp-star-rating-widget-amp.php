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

<?php
  //retrive necessary data for the template
  $rmp_options = get_option( 'rmp_options' );
  $rmp_custom_strings = Rate_My_Post_Public_Helper::custom_strings();
  $results_output = esc_html__( Rate_My_Post_Public_Helper::amp_results_output('amp-rating') );
  $average_rating = Rate_My_Post_Public_Helper::average_rating();
?>

<!-- Rate my Post AMP template -->
<!-- This template was biilt on top of AMP by Example showcase -  https://ampbyexample.com/advanced/star_rating/ -->

<div class="rmp-amp-rating-widget">
  <?php do_action( 'rmp_before_widget_amp' ); ?>
  <h2 id="rmp-amp-rating-widget-title">
    <?php echo $rmp_custom_strings['rateTitle']; ?>
  </h2>

  <form
    id="rmp-amp-rating-form"
    class="p2"
    method="post"
    action-xhr="<?php echo admin_url( 'admin-ajax.php' ); ?>"
    target="_top">

    <p id="rmp-amp-rating-widget-subtitle">
      <?php echo $rmp_custom_strings['rateSubtitle']; ?>
    </p>
    <div class="rmp-amp-centered-fieldset">

      <fieldset id="rmp-amp-rating-fieldset" class="rmp-amp-rating">

        <label id="rmp-amp-action" style="display: none;">
          <span>Action:</span>
          <input type="text"
            name="action"
            required value="process_rating_amp">
        </label>

        <label id="rmp-amp-post-id" style="display: none;">
          <span>Post ID:</span>
          <input type="text"
            name="postID"
            required value="<?php echo get_the_id() ?>">
        </label>

        <input name="star_rating"
         type="radio"
         id="rating5"
         value="5"
         on="change:rmp-amp-rating-form.submit,rmp-amp-rating-fieldset.hide,rmp-amp-rating-widget-subtitle.hide,rmp-amp-rating-widget-results.hide" />
       <label for="rating5"
         title="5 stars">☆</label>

       <input name="star_rating"
         type="radio"
         id="rating4"
         value="4"
         on="change:rmp-amp-rating-form.submit,rmp-amp-rating-fieldset.hide,rmp-amp-rating-widget-subtitle.hide,rmp-amp-rating-widget-results.hide" />
       <label for="rating4"
         title="4 stars">☆</label>

       <input name="star_rating"
         type="radio"
         id="rating3"
         value="3"
         on="change:rmp-amp-rating-form.submit,rmp-amp-rating-fieldset.hide,rmp-amp-rating-widget-subtitle.hide,rmp-amp-rating-widget-results.hide" />
       <label for="rating3"
         title="3 stars">☆</label>

       <input name="star_rating"
         type="radio"
         id="rating2"
         value="2"
         on="change:rmp-amp-rating-form.submit,rmp-amp-rating-fieldset.hide,rmp-amp-rating-widget-subtitle.hide,rmp-amp-rating-widget-results.hide" />
       <label for="rating2"
         title="2 stars">☆</label>

       <input name="star_rating"
         type="radio"
         id="rating1"
         value="1"
         on="change:rmp-amp-rating-form.submit,rmp-amp-rating-fieldset.hide,rmp-amp-rating-widget-subtitle.hide,rmp-amp-rating-widget-results.hide" />
       <label for="rating1"
         title="1 stars">☆</label>

       </fieldset>

    </div>

    <div submitting>
    <template type="amp-mustache">
      <?php echo esc_html__( 'Processing your rating...', 'rate-my-post' ); ?>
    </template>
    </div>

    <div submit-success>
      <template type="amp-mustache">
        <?php echo $rmp_custom_strings['rateResult']; ?>
        {{rating}} / 5.
        <?php echo $rmp_custom_strings['rateResult2']; ?>
        {{votes}}
        <br />
        {{msg}}
      </template>
    </div>

    <div submit-error>
      <template type="amp-mustache">
        <?php echo esc_html__( 'There was an error rating this post!', 'rate-my-post' ); ?>
      </template>
    </div>

    <div id="rmp-amp-rating-widget-results">
      <?php echo $results_output; ?>
    </div>

  </form>

  <?php if ($rmp_options['richSnippet'] === 2 && intval( get_post_meta( get_the_ID(), 'rmp_vote_count', true ) )): ?>
    <?php echo $this->structured_data(); ?>
  <?php endif; ?>

  <?php do_action( 'rmp_after_widget_amp' ); ?>
</div>
