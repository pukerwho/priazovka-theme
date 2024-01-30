<?php
function vote_function() {
  $itemName = stripslashes_deep($_POST['itemName']);
  if (get_option('vote_'.$itemName)) {
    $voteValue = get_option('vote_'.$itemName);
    $voteValue = intval($voteValue);
    $newVoteValue = $voteValue + 1;
    update_option('vote_'.$itemName, $newVoteValue);
  } else {
    add_option('vote_'.$itemName, 1);
  }
  if (get_option('vote_timeyear_count')) {
    $voteCount = get_option('vote_timeyear_count');
    $voteCount = intval($voteCount);
    $newVoteCount = $voteCount + 1;
    update_option('vote_timeyear_count', $newVoteCount);
  } else {
    add_option('vote_timeyear_count', 1);
  }
  $itemNameValue = get_option('vote_'.$itemName);
  $voteTimeyearCount = get_option('vote_timeyear_count');
  echo json_encode(array($itemNameValue, $voteTimeyearCount));
  // echo $itemNameValue;
  wp_die();
}

add_action('wp_ajax_vote_click_action', 'vote_function');
add_action('wp_ajax_nopriv_vote_click_action', 'vote_function');

?>