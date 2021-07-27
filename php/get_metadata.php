<?php
/**
 *  This file outputs the SHOUTcast's current song's metadata and fetches
 *  the song's votes/popularity from the database
 */

session_start();

require_once 'db.php';
require_once 'music_info_get.php';

$sid = isset($_GET['sid']) ? $_GET['sid'] : '1';
$SiteKey = $_SESSION['ses_SiteKey'];

function parse_id ($title) {
  preg_match('/([a-zA-Z]{8}[0-9]{7}) ([a-zA-Z0-9]{36})$/', $title, $matches);
  return $matches[1];
}

// Metadata
$curl = curl_init("https://www.radion.fm:8002/currentmetadata?sid=$sid&json=1");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$res = curl_exec($curl);
$res = json_decode($res);
curl_close($curl);

// Get song's ID from the TALB tag
$id = isset($res->talb) ? $res->talb : parse_id($res->tit2);

// Get song data from database
$song_data = $con->query("SELECT * FROM `song` WHERE `RDON_ID`='$id'");
$song_data = $song_data->fetch_object();
$username = $song_data->USER_NAME;
$mid = $song_data->SONG_ID;
$res->artwork = explode('..', get_art_work($id, $song_data->SONG_STATUS, true))[1];
$res->username = $username;
$res->copyright = $song_data->COPYRIGHT;
$res->nft = $song_data->NFT;
$res->token_id = $song_data->TOKEN_ID;

$user_data = $con->query("SELECT `id` FROM `sitelok` WHERE `Username`='$username'");
$user_data = $user_data->fetch_object();
$userid = $user_data->id;
$res->userid = $userid;
$res->useridhash = md5("$userid$SiteKey");

// Gets all likes, unlikes, loves, and shares
$likes = $con->query("SELECT COUNT(`SONG_LIKE_ID`) AS liked FROM `song_like` WHERE `SONG_ID`=$mid AND `SONG_LIKE_STATUS`=1");
$res->isLikes = $likes->fetch_object()->liked;

$unlikes = $con->query("SELECT COUNT(`SONG_LIKE_ID`) AS unlike FROM `song_like` WHERE `SONG_ID`=$mid AND `SONG_LIKE_STATUS`=0");
$res->isUnlike = $unlikes->fetch_object()->unlike;

$loves = $con->query("SELECT COUNT(`SONG_LOVE_ID`) AS loves FROM `song_love` WHERE `SONG_ID`=$mid AND `SONG_LOVE_STATUS`=1");
$res->isLoveIt = $loves->fetch_object()->loves;

$dedicate = $con->query("SELECT COUNT(`SONG_SHARE_ID`) AS dedicate FROM `song_share` WHERE `SONG_ID`=$mid AND `SONG_SHARE_STATUS`=1");
$res->isDedicate = $dedicate->fetch_object()->dedicate;

$tweets = $con->query("SELECT COUNT(`SONG_TWEET_ID`) AS tweets FROM `song_tweet` WHERE `SONG_ID`=$mid");
$res->tweets = $tweets->fetch_object()->tweets;

if (isset($_SESSION) && isset($_SESSION['ses_slusername'])) {
  // If logged in, this shows if the user liked, disliked, loved, and/or shared
  $slusername = $_SESSION['ses_slusername'];

  $isVoted = $con->query("SELECT `SONG_LIKE_STATUS` AS vote FROM `song_like` WHERE `SONG_LIKE_USERNAME`='$slusername' AND `SONG_ID`=$mid");
  if ($isVoted && $isVoted->num_rows > 0) {
    $vote = $isVoted->fetch_object()->vote;
    $res->isVoted = $vote;
  } else $res->isVoted = null;

  $isLoved = $con->query("SELECT `SONG_LOVE_STATUS` AS loved FROM `song_love` WHERE `SONG_LOVE_USERNAME`='$slusername' AND `SONG_ID`=$mid");
  if ($isLoved && $isLoved->num_rows > 0) {
    $loved = $isLoved->fetch_object()->loved;
    $res->isLoved = $loved;
  } else $res->isLoved = null;

  $isDedicate = $con->query("SELECT `SONG_SHARE_STATUS` AS share FROM `song_share` WHERE `SONG_SHARE_USERNAME`='$slusername' AND `SONG_ID`=$mid");
  if ($isDedicate && $isDedicate->num_rows > 0) {
    $share = $isDedicate->fetch_object()->share;
    $res->isShared = $share;
  } else $res->isShared = null;
}

header('Content-Type: application/json');
echo json_encode($res);

?>
