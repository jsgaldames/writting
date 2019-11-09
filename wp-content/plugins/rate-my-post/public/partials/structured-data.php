<?php

/**
 * Public template
 *
 * @link       http://wordpress.org/plugins/rate-my-post/
 * @since      2.9.2
 *
 * @package    Rate_My_Post
 * @subpackage Rate_My_Post/public/partials
 */
?>

<?php
  $average_rating = Rate_My_Post_Public_Helper::average_rating();
  $schema_type = $this->schema_type();
?>

<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "<?php echo $schema_type; ?>",
  "aggregateRating": {
    "@type": "AggregateRating",
    "bestRating": "5",
    "ratingCount": "<?php echo intval( get_post_meta( get_the_ID(), 'rmp_vote_count', true ) ); ?>",
    "ratingValue": "<?php echo $average_rating; ?>"
  },
  "image": "<?php echo get_the_post_thumbnail_url(); ?>",
  "name": "<?php echo wp_strip_all_tags( get_the_title() ); ?>",
  "description": "<?php echo wp_strip_all_tags( get_the_title() ); ?>"
}
</script>
