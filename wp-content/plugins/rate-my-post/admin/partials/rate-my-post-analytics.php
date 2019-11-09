<?php

/**
 * Admin template
 *
 * @link       http://wordpress.org/plugins/rate-my-post/
 * @since      2.8.0
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

<!-- Analytics Section Template -->
<?php
  $analyticsData = $this->retrieve_analytics_table_data();
?>
<h1>
  <?php echo ( esc_html__( 'Rate my Post Analytics', 'rate-my-post' ) ); ?>
</h1>
<p>
  <i>*<?php echo ( esc_html__( 'Here you can see the details about the last 100 votes on your website.', 'rate-my-post' ) ); ?></i>
</p>
<div class="rmp-table-wrapper">
  <table id="rmp-analytics-table" style="width: 100%;">
    <thead>
      <tr>
        <th><?php echo ( esc_html__( 'ID', 'rate-my-post' ) ); ?></th>
        <th><?php echo ( esc_html__( 'Time', 'rate-my-post' ) ); ?></th>
        <th><?php echo ( esc_html__( 'IP', 'rate-my-post' ) ); ?></th>
        <th><?php echo ( esc_html__( 'User', 'rate-my-post' ) ); ?></th>
        <th><?php echo ( esc_html__( 'Post', 'rate-my-post' ) ); ?></th>
        <th><?php echo ( esc_html__( 'Duration', 'rate-my-post' ) ); ?></th>
        <th><?php echo ( esc_html__( 'Average Rating', 'rate-my-post' ) ); ?></th>
        <th><?php echo ( esc_html__( 'Total Votes', 'rate-my-post' ) ); ?></th>
        <th><?php echo ( esc_html__( 'Rated', 'rate-my-post' ) ); ?></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach( $analyticsData as $row ): ?>
        <tr>
          <td><?php echo $row['id']; ?></td>
          <td><?php echo $row['time']; ?></td>
          <td><?php echo $row['ip']; ?></td>
          <td><?php echo $row['user']; ?></td>
          <td><a href="<?php echo $row['postLink']; ?>"><?php echo $row['postTitle']; ?></a></td>
          <td><?php echo $row['duration']; ?></td>
          <td><?php echo $row['newRating']; ?></td>
          <td><?php echo $row['newVotes']; ?></td>
          <td><?php echo $row['value']; ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
