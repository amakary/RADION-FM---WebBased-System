<?php

session_start();
error_reporting(0);

require_once 'db.php';
require_once '../slpw/sitelokpw.php';

date_default_timezone_set('US/Eastern');

$sid = isset($_GET['sid']) ? $_GET['sid'] : '1';
$json = file_get_contents('https://radion.fm:8002/statistics?json=1');
$obj = json_decode($json);

foreach ($obj->streams as $stream) {
	if ($stream->id == $sid) {
		$songTitle = $stream->songtitle;
		$nextSong = $stream->nexttitle;
	}
}

$result = array();
$result['songTitle'] = $songTitle;
$result['nextSong'] = $nextSong;

$curl = curl_init("https://radion.fm:8002/playingart?sid=$sid");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$res = curl_exec($curl);
curl_close($curl);

// get download share loves purchase like dislike details code start
$metadata_file = file_get_contents("https://radion.fm:8002/currentmetadata?sid=$sid&json=1");
$metadata = json_decode($metadata_file);

$song_title = $metadata->tit2;
$music_album_title = $metadata->talb;
$artist_name = $metadata->tpe1;

$result['artwork'] = $res === '' ? 0 : 1;
$result['stream_id'] = $sid;

// ID is fetched from the song's TALB tag
$sid = $music_album_title;
$result['music_id'] = $sid;

if ($sid != NULL && $sid > 0) {
	// check paly song is ava. or not. and add new song
	// $check_music = "SELECT `MUSIC_ID` as mid FROM `song_play_session` ORDER BY `ID` DESC LIMIT 1";
  //
	// $mid_query = $con->query($check_music);
	// $mid = $mid_query->fetch_object()->mid;
	// $stream_id = 0;
  //
	// if ($mid == $sid) {
  //   $stream_id_query = "SELECT `ID` AS stid FROM `song_play_session` WHERE `MUSIC_ID`=$mid ORDER BY `ID` DESC LIMIT 1";
  //   $mstid_query = $con->query($stream_id_query);
  //   $stid = $mstid_query->fetch_object()->mid;
  //   $stream_id = $stid;
	// 	$result['is_New'] = 1;
	// } else {
  //   $date = date('Y-m-d H:i:s');
  //   $st_insert = "INSERT INTO `song_play_session`(`MUSIC_ID`, `PLAY_DATE_TIME`) VALUES ($sid,'$date')";
	// 	$mstid_query = $con->query($st_insert);
	// 	$stream_id = $con->insert_id;
  //   $query = $con->query("UPDATE song SET PLAY_TIMEDATE='".date("Y-m-d H:i:s")."',TOTAL_STREAM=TOTAL_STREAM+1 WHERE SONG_NAME ='$song_title'");
  //   $result['is_New'] = 0;
  // }

  $q = $con->query("SELECT COUNT(`SONG_LIKE_ID`) AS liked FROM `song_like` WHERE `SONG_ID`=$sid AND `SONG_LIKE_STATUS`=1");
	// $q = $con->query("SELECT COUNT(`ID`) AS like FROM `vote_per_session` WHERE `SESSION_ID`=$stream_id AND VOTE_STATUS=0");
  $result['isLikes'] = $q->fetch_object()->liked;

  $q = $con->query("SELECT COUNT(`SONG_LIKE_ID`) AS unlike FROM `song_like` WHERE `SONG_ID`=$sid AND `SONG_LIKE_STATUS`=0");
  // $q = $con->query("SELECT COUNT(`ID`) AS unlike FROM `vote_per_session` WHERE `SESSION_ID`=$stream_id AND VOTE_STATUS=1");
  $result['isUnLike'] = $q->fetch_object()->unlike;

  $q = $con->query("SELECT COUNT(`SONG_LOVE_ID`) AS loveit FROM `song_love` WHERE `SONG_ID`=$sid AND `SONG_LOVE_STATUS`=1");
  // $q = $con->query("SELECT COUNT(`SONG_LOVE_ID`) AS loveit FROM `song_love` JOIN `song` ON `song_love`.`SONG_ID`=`song`.`SONG_ID` WHERE `song`.`SONG_NAME`='$song_title'");
  $result['isLoveit'] = $q->fetch_object()->loveit;

  $q = $con->query("SELECT COUNT(`SONG_SHARE_ID`) AS dedicate FROM `song_share` WHERE `SONG_ID`=$sid AND `SONG_SHARE_STATUS`=1");
  // $q = $con->query("SELECT COUNT(`SONG_SHARE_ID`) AS dedicat FROM `song_share` JOIN `song` ON `song_share`.`SONG_ID`=`song`.`SONG_ID` WHERE `song`.`SONG_NAME`='$song_title'");
  $result['isDedicate'] = $q->fetch_object()->dedicate;

  $q = $con->query("SELECT COUNT(`SONG_PURCHASE_ID`) AS downsong FROM `song_purchase` JOIN `song` ON `song_purchase`.`SONG_ID`=`song`.`SONG_ID` WHERE `song`.`SONG_NAME`='$song_title'");
  $result['isDownload'] = $q->fetch_object()->downsong;

  $q = $con->query("SELECT COUNT(*) as totUser FROM sl_whoisonline");
  $result['isTotUser'] = $q->fetch_object()->totUser;

	if (isset($_SESSION) && isset($_SESSION['ses_slusername'])) {
    $slusername = $_SESSION['ses_slusername'];

    $q = $con->query("SELECT `VOTE_STATUS` AS vote FROM `vote_per_session` WHERE `USER_NAME`='$slusername' AND `ID`=$stream_id");
    if ($q && $q->num_rows > 0) {
      $isVoted = $q->fetch_object()->vote;
      $result['isVoted'] = $isVoted === NULL ? 'not voted' : $isVoted;
    }

    $query_add = $con->query("SELECT COUNT(*) AS songrow FROM `song_love` JOIN `song` ON `song_love`.`SONG_ID`=`song`.`SONG_ID` WHERE `song`.`SONG_NAME`= '$song_title' AND `song_love`.`SONG_LOVE_USERNAME`='$slusername'");
    $isSongAvi = $query_add->fetch_object()->songrow;
    $result['isLoved'] = $isSongAvi < 1 ? 0 : 1;

    // $q2 = $con->query("SELECT `SONG_SHARE_STATUS` AS dedicate FROM `song_share` JOIN `song` ON `song_share`.`SONG_ID`=`song`.`SONG_ID` WHERE `song`.`SONG_NAME`= '$song_title' AND `song_share`.`SONG_SHARE_USERNAME`='$slusername'");
    // $isDedicate = $q2->fetch_object()->dedicate;
    // $result['isDedicate'] = $isDedicate === NULL ? 0 : $isDedicate;
  }

  // $get_music_id = "SELECT `SONG_LENGTH` as length FROM `song` WHERE `SONG_NAME`='$song_title' AND `ALBUM_NAME`='$music_album_title'";
  // $sid_query = $con->query($get_music_id);
	// $length = $sid_query->fetch_object()->length;
  // $result['length'] = $length;

	$online_query = $con->query("SELECT COUNT(*) AS online_count FROM `sl_whoisonline`");
	$totalonline = $online_query->fetch_object()->online_count;
  $radio_market_price_q = $con->query("SELECT `convert_value` AS MARKET_PRICE FROM `slconfig`");

	$radio_market_price = $radio_market_price_q->fetch_object()->MARKET_PRICE;
  $potential_radio = $totalonline * $radio_market_price;
  $deductable_price = ($potential_radio * 61) / 100;
  $potential_radio = $potential_radio - $deductable_price;
  $potential_usd = $potential_radio*$radio_market_price;
  $potential_usd = number_format((float)$potential_usd, 2, '.', '');
  $result['potential_usd'] = $potential_usd;
}

header('Content-Type: application/json');
echo json_encode($result);

?>
