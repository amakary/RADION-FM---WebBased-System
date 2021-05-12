<?php

session_start();

ini_set('display_errors', '1');
error_reporting(E_ALL);

require_once '../getID3/getid3/getid3.php';
require_once './db.php';
require_once './music_info_get.php';

$id = isset($_GET['id']) ? $_GET['id'] : null;
if ($id === null) {
  http_response_code(400);
  header('Content-Type: text/plain');
  die('Unknown ID');
}

$song_res = $con->query("SELECT * FROM `song` WHERE `RDON_ID`='$id'");
$song = $song_res->fetch_object();
$mid = $song->SONG_ID;
$source = get_music_source($song->RDON_ID, $song->SONG_STATUS, true);
$getID3 = new getID3();
$mp3info = $getID3->analyze($source);
$tags = $mp3info['tags']['id3v2'];
$tags['artwork'] = explode('..', get_art_work($song->RDON_ID, $song->SONG_STATUS, true))[1];
$tags['filesize'] = filesize($source) / 1000;
$tags['published'] = $song->SONG_SUBMIT_DATE;
$tags['record'] = $song->RECORD_LABEL;
$tags['album_saved'] = $song->ALBUM_NAME;
$tags['uploader'] = $song->USER_NAME;
$tags['token_id'] = $song->TOKEN_ID;

// Gets all likes, unlikes, loves, and shares
$likes = $con->query("SELECT COUNT(`SONG_LIKE_ID`) AS `liked` FROM `song_like` WHERE `SONG_ID`=$mid AND `SONG_LIKE_STATUS`=1");
$tags['isLikes'] = $likes->num_rows > 0 ? $likes->fetch_object()->liked : 0;

$unlikes = $con->query("SELECT COUNT(`SONG_LIKE_ID`) AS `unlike` FROM `song_like` WHERE `SONG_ID`=$mid AND `SONG_LIKE_STATUS`=0");
$tags['isUnlike'] = $unlikes->num_rows > 0 ? $unlikes->fetch_object()->unlike : 0;

$loves = $con->query("SELECT COUNT(`SONG_LOVE_ID`) AS `loves` FROM `song_love` WHERE `SONG_ID`=$mid AND `SONG_LOVE_STATUS`=1");
$tags['isLoveIt'] = $loves->num_rows > 0 ? $loves->fetch_object()->loves : 0;

$dedicate = $con->query("SELECT COUNT(`SONG_SHARE_ID`) AS `dedicate` FROM `song_share` WHERE `SONG_ID`=$mid AND `SONG_SHARE_STATUS`=1");
$tags['isDedicate'] = $dedicate->num_rows > 0 ? $dedicate->fetch_object()->dedicate : 0;

$plays = $con->query("SELECT COUNT(*) AS `plays` FROM `song_play` WHERE `SONG_ID`=$mid");
$tags['playedCount'] = $plays->num_rows > 0 ? $plays->fetch_object()->plays : 0;

if (isset($_SESSION) && isset($_SESSION['ses_slusername'])) {
  // If logged in, this shows if the user liked, disliked, loved, and/or shared
  $slusername = $_SESSION['ses_slusername'];

  $isVoted = $con->query("SELECT `SONG_LIKE_STATUS` AS vote FROM `song_like` WHERE `SONG_LIKE_USERNAME`='$slusername' AND `SONG_ID`=$mid");
  if ($isVoted && $isVoted->num_rows > 0) {
    $vote = $isVoted->fetch_object()->vote;
    $tags['isVoted'] = $vote;
  } else $tags['isVoted'] = null;

  $isLoved = $con->query("SELECT `SONG_LOVE_STATUS` AS loved FROM `song_love` WHERE `SONG_LOVE_USERNAME`='$slusername' AND `SONG_ID`=$mid");
  if ($isLoved && $isLoved->num_rows > 0) {
    $loved = $isLoved->fetch_object()->loved;
    $tags['isLoved'] = $loved;
  } else $tags['isLoved'] = null;

  $isDedicate = $con->query("SELECT `SONG_SHARE_STATUS` AS share FROM `song_share` WHERE `SONG_SHARE_USERNAME`='$slusername' AND `SONG_ID`=$mid");
  if ($isDedicate && $isDedicate->num_rows > 0) {
    $share = $isDedicate->fetch_object()->share;
    $tags['isShared'] = $share;
  } else $tags['isShared'] = null;
}

header('Content-Type: application/json');
echo json_encode($tags);

?>
