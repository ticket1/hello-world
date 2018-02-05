<?php
require_once('/home/kusanagi/nri/DocumentRoot/wp-load.php');

$current_time = current_time('timestamp');
$year = date('Y', $current_time );
$month = date('m', $current_time );
$day = date('d', $current_time );
$hour = date('H', $current_time - (3*HOUR_IN_SECONDS));

$args = array(
  'post_status' => 'draft',
  'post_type' => 'document',
  'posts_per_page' => -1,
  'date_query' => array(
  'column' => 'post_modified',
  'before' => array(
  'year' => $year,
  'month' => $month,
  'day' => $day,
  'hour' => $hour,
                     )
                 ),
             );

$mydata = get_posts($args);
  foreach ( $mydata as $id ){
  setup_postdata($id);
}

wp_delete_post($id,true);

?>
