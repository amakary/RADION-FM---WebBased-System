<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once '../slpw/sitelokpw.php';

$type = $_POST['type']; // 1=like, 2=unlike, 3=love, 4=share
$rdon_id = $_POST['music_id'];

$song_res = $con->query("SELECT * FROM `song` WHERE `RDON_ID`='$rdon_id'");
$song = $song_res && $song_res->num_rows > 0 ? $song_res->fetch_object() : null;
$song_id = $song !== null ? $song->SONG_ID : null;

if ($song_id === null) {
    http_response_code(400);
    die('Unknown song ID');
}

if ($type == 1) {
  // Like or remove like
  $status_query = $con->query("SELECT `SONG_LIKE_STATUS` AS status FROM `song_like` WHERE `SONG_LIKE_USERNAME`='$slusername' AND `SONG_ID`=$song_id");
  $status = $status_query && $status_query->num_rows > 0 ? $status_query->fetch_object()->status : null;

  if ($status === null) {
    // insert like
    $con->query("INSERT INTO `song_like` (`SONG_ID`, `SONG_LIKE_USERNAME`, `SONG_LIKE_STATUS`) VALUES ($song_id, '$slusername', 1)");
  } else if ($status == 1) {
    // remove like if already liked
    $con->query("UPDATE `song_like` SET `SONG_LIKE_STATUS`=2 WHERE `SONG_LIKE_USERNAME`='$slusername' AND `SONG_ID`=$song_id AND `SONG_LIKE_STATUS`=$status");
  } else {
    // song was dislike, update to like
    $con->query("UPDATE `song_like` SET `SONG_LIKE_STATUS`=1 WHERE `SONG_LIKE_USERNAME`='$slusername' AND `SONG_ID`=$song_id AND `SONG_LIKE_STATUS`=$status");
  }
} else if ($type == 2) {
  // Dislike or remove dislike
  $status_query = $con->query("SELECT `SONG_LIKE_STATUS` AS status FROM `song_like` WHERE `SONG_LIKE_USERNAME`='$slusername' AND `SONG_ID`=$song_id");
  $status = $status_query && $status_query->num_rows > 0 ? $status_query->fetch_object()->status : null;

  if ($status === null) {
    // insert dislike
    $con->query("INSERT INTO `song_like` (`SONG_ID`, `SONG_LIKE_USERNAME`, `SONG_LIKE_STATUS`) VALUES ($song_id, '$slusername', 0)");
  } else if ($status == 0) {
    // remove dislike if already disliked
    $con->query("UPDATE `song_like` SET `SONG_LIKE_STATUS`=4 WHERE `SONG_LIKE_USERNAME`='$slusername' AND `SONG_ID`=$song_id AND `SONG_LIKE_STATUS`=$status");
  } else {
    // remove like, then update to dislike
    $con->query("UPDATE `song_like` SET `SONG_LIKE_STATUS`=0 WHERE `SONG_LIKE_USERNAME`='$slusername' AND `SONG_ID`=$song_id AND `SONG_LIKE_STATUS`=$status");
  }
} else if ($type == 3) {
  $status_query = $con->query("SELECT `SONG_LOVE_STATUS` AS status FROM `song_love` WHERE `SONG_LOVE_USERNAME`='$slusername' AND `SONG_ID`=$song_id");
  $status = $status_query && $status_query->num_rows > 0 ? $status_query->fetch_object()->status : null;

  if ($status === null) {
    $con->query("INSERT INTO `song_love` (`SONG_ID`, `SONG_LOVE_USERNAME`) VALUES ($song_id, '$slusername')");
  } else if ($status == 1) {
    $con->query("UPDATE `song_love` SET `SONG_LOVE_STATUS`=2 WHERE `SONG_LOVE_USERNAME`='$slusername' AND `SONG_ID`=$song_id AND `SONG_LOVE_STATUS`=$status");
  } else {
    $con->query("UPDATE `song_love` SET `SONG_LOVE_STATUS`=1 WHERE `SONG_LOVE_USERNAME`='$slusername' AND `SONG_ID`=$song_id AND `SONG_LOVE_STATUS`=$status");
  }
}

?>
