<?php

require_once 'db.php';
require_once '../slpw/sitelokpw.php';

date_default_timezone_set('US/Eastern');

$type = $_POST['type']; // 1=like, 2=unlike, 3=love,4=share
$stream_id = $_POST['stream_id'];
$song_id = $_POST['music_id'];

if ($type == 1) {
  // Like or remove like
  $status_query = $con->query("SELECT `SONG_LIKE_STATUS` AS status FROM `song_like` WHERE `SONG_LIKE_USERNAME`='$slusername' AND `SONG_ID`=$song_id");
  $status = $status_query && $status_query->num_rows > 0 ? $status_query->fetch_object()->status : NULL;

  if ($status == NULL) {
    $con->query("INSERT INTO `song_like` (`SONG_ID`, `SONG_LIKE_USERNAME`, `SONG_LIKE_STATUS`) VALUES ($song_id, '$slusername', 1)");
  } else if ($status == 1) {
    // remove like if already liked
    $con->query("DELETE FROM `song_like` WHERE `SONG_ID`=$song_id AND `SONG_LIKE_USERNAME`='$slusername' AND `SONG_LIKE_STATUS`=$status");
  } else {
    $con->query("UPDATE `song_like` SET `SONG_LIKE_STATUS`=1 WHERE `SONG_LIKE_USERNAME`='$slusername' AND `SONG_ID`=$song_id");
  }

  // $removeVote = $con->query("DELETE FROM `vote_per_session` WHERE `SESSION_ID`=$stream_id AND `USER_NAME`='$slusername' AND VOTE_STATUS=1");

  // $query_add = $con->query("SELECT count(*) as songrow FROM `song_like` WHERE `SONG_ID`=$song_id AND `SONG_LIKE_USERNAME`='$slusername'");
  // $query_add = $con->query("SELECT count(*) as songrow FROM `vote_per_session` WHERE `SESSION_ID`=$stream_id AND `USER_NAME`='$slusername' AND VOTE_STATUS=0");
  // $isSongAvi = $query_add->fetch_object()->songrow;

  // if ($isSongAvi < 1) {
  //   $date = date('Y-m-d H:i:s');
  //   $query = $con->query("INSERT INTO `song_like` (`SONG_ID`, `SONG_LIKE_USERNAME`,`SONG_LIKE_STATUS`) VALUES ($song_id, '$slusername', 1)");
  //   $query = $con->query("INSERT INTO `vote_per_session` (`SESSION_ID`, `USER_NAME`, `VOTE_DATE_TIME`, `VOTE_STATUS`) VALUES ($stream_id, '$slusername', '$date', 1)");
	// } else {
  //   $removeVote = $con->query("DELETE FROM `song_like` WHERE `SONG_ID`=$song_id AND `SONG_LIKE_USERNAME`='$slusername' AND SONG_LIKE_STATUS=1");
  //   $removeVote = $con->query("DELETE FROM `vote_per_session` WHERE `SESSION_ID`=$stream_id AND `USER_NAME`='$slusername' AND VOTE_STATUS=1");
	// }
} else if ($type == 2) {
  // Dislike or remove dislike
  $status_query = $con->query("SELECT `SONG_LIKE_STATUS` AS status FROM `song_like` WHERE `SONG_LIKE_USERNAME`='$slusername' AND `SONG_ID`=$song_id");
  $status = $status_query && $status_query->num_rows > 0 ? $status_query->fetch_object()->status : NULL;

  if ($status == NULL) {
    $con->query("INSERT INTO `song_like` (`SONG_ID`, `SONG_LIKE_USERNAME`, `SONG_LIKE_STATUS`) VALUES ($song_id, '$slusername', 0)");
  } else if ($status == 0) {
    // remove dislike if already disliked
    $con->query("DELETE FROM `song_like` WHERE `SONG_ID`=$song_id AND `SONG_LIKE_USERNAME`='$slusername' AND `SONG_LIKE_STATUS`=$status");
  } else {
    $con->query("UPDATE `song_like` SET `SONG_LIKE_STATUS`=0 WHERE `SONG_LIKE_USERNAME`='$slusername' AND `SONG_ID`=$song_id");
  }

  // $removeVote = $con->query("DELETE FROM `vote_per_session` WHERE `SESSION_ID`=$stream_id AND `USER_NAME`='$slusername' AND VOTE_STATUS=0");
  // $query_add = $con->query("SELECT count(*) as songrow FROM `song_like` WHERE `SONG_ID`=$song_id AND `SONG_LIKE_USERNAME`='$slusername'AND SONG_LIKE_STATUS=1");
  // $query_add = $con->query("SELECT count(*) as songrow FROM `vote_per_session` WHERE `SESSION_ID`=$stream_id AND `USER_NAME`='$slusername' AND VOTE_STATUS=1");
  //
	// $isSongAvi = $query_add->fetch_object()->songrow;
	// if ($isSongAvi < 1) {
  //   $query = $con->query("INSERT INTO `song_like`(`SONG_ID`, `SONG_LIKE_USERNAME`,`SONG_LIKE_STATUS`) VALUES ($song_id,'$slusername',1)");
  //   $query = $con->query("INSERT INTO `vote_per_session`( `SESSION_ID`, `USER_NAME`, `VOTE_DATE_TIME`, `VOTE_STATUS`) VALUES ($stream_id,'$slusername','".date("Y-m-d H:i:s")."',1)");
	// } else {
  //   $removeVote = $con->query("DELETE FROM `song_like` WHERE `SONG_ID`=$song_id AND `SONG_LIKE_USERNAME`='$slusername' AND SONG_LIKE_STATUS=1");
  //   $removeVote = $con->query("DELETE FROM `vote_per_session` WHERE `SESSION_ID`=$stream_id AND `USER_NAME`='$slusername' AND VOTE_STATUS=1");
	// }
} else if ($type == 3) {
  $status_query = $con->query("SELECT `SONG_LOVE_STATUS` AS status FROM `song_love` WHERE `SONG_LOVE_USERNAME`='$slusername' AND `SONG_ID`=$song_id");
  $status = $status_query && $status_query->num_rows > 0 ? $status_query->fetch_object()->status : NULL;

  if ($status == NULL) {
    $con->query("INSERT INTO `song_love` (`SONG_ID`, `SONG_LOVE_USERNAME`) VALUES ($song_id, '$slusername')");
  } else {
    $con->query("DELETE FROM `song_love` WHERE `SONG_ID`=$song_id AND `SONG_LOVE_USERNAME`='$slusername'");
  }

  // $query_add = $con->query("SELECT COUNT(*) as songrow FROM `song_love` WHERE `SONG_ID`=$song_id AND `SONG_LOVE_USERNAME`='$slusername'");
  // $isSongAvi = $query_add->fetch_object()->songrow;
  // if ($isSongAvi < 1) {
  //   $query = $con->query("INSERT INTO `song_love`(`SONG_ID`, `SONG_LOVE_USERNAME`) VALUES ($song_id,'$slusername')");
	// } else {
  //   $removeVote = $con->query("DELETE FROM `song_love` WHERE `SONG_ID`=$song_id AND `SONG_LOVE_USERNAME`='$slusername'");
	// }
} else if ($type == 4) {
  $status_query = $con->query("SELECT `SONG_SHARE_STATUS` AS status FROM `song_share` WHERE `SONG_SHARE_USERNAME`='$slusername' AND `SONG_ID`=$song_id");
  $status = $status_query && $status_query->num_rows > 0 ? $status_query->fetch_object()->status : NULL;

  if ($status == NULL) {
    $con->query("INSERT INTO `song_share` (`SONG_ID`, `SONG_SHARE_USERNAME`) VALUES ($song_id, '$slusername')");
  } else {
    $con->query("DELETE FROM `song_share` WHERE `SONG_ID`=$song_id AND `SONG_SHARE_USERNAME`='$slusername'");
  }

  // $query_add = $con->query("SELECT COUNT(*) as songrow FROM `song_share` WHERE `SONG_ID`=$song_id AND `SONG_SHARE_USERNAME`='$slusername'");
  // $isSongAvi = $query_add->fetch_object()->songrow;
  // if ($isSongAvi < 1) {
  //   $query = $con->query("INSERT INTO `song_share`(`SONG_ID`, `SONG_SHARE_USERNAME`) VALUES ($song_id,'$slusername')");
  // } else {
  //   $removeVote = $con->query("DELETE FROM `song_share` WHERE `SONG_ID`=$song_id AND `SONG_SHARE_USERNAME`='$slusername'");
	// }
}

?>
