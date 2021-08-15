<?php

ini_set('display_errors', '1');
error_reporting(E_ALL);

$groupswithaccess = 'RADIONER,CEO,FOUNDER';

require_once '../slpw/sitelokpw.php';
require_once '../slpw/slconfig.php';
require_once './utils.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  http_response_code(405);
  header('Content-Type: text/plain');
  die('Unsupported method');
}

$id = isset($_POST['id']) ? $con->real_escape_string($_POST['id']) : null;
if ($id === null) {
  http_response_code(400);
  header('Content-Type: text/plain');
  die('ID is undefined');
}

$res = $con->query("SELECT * FROM `song` WHERE `RDON_ID`='$id' AND `USER_NAME`='$slusername'");
if ($res->num_rows > 0) {
  $row = $res->fetch_object();
  $mid = $row->SONG_ID;
  @deldir(realpath(__DIR__ . "/../music/$id"));
  @unlink(realpath(__DIR__ . "/../slbackups_mlicqx83sq/Music/$id.png"));
  @unlink(realpath(__DIR__ . "/../slbackups_mlicqx83sq/Music/$id.jpg"));
  @unlink(realpath(__DIR__ . "/../slbackups_mlicqx83sq/Music/$id.mp3"));
  @unlink(realpath(__DIR__ . "/../slbackups_mlicqx83sq/Music/$id.wav"));
  $con->query("DELETE FROM `song_share` WHERE `SONG_ID`=$mid");
  $con->query("DELETE FROM `song_purchase` WHERE `SONG_ID`=$mid");
  $con->query("DELETE FROM `song_play` WHERE `SONG_ID`=$mid");
  $con->query("DELETE FROM `song_love` WHERE `SONG_ID`=$mid");
  $con->query("DELETE FROM `song_like` WHERE `SONG_ID`=$mid");
  $con->query("DELETE FROM `song_downloads` WHERE `SONG_ID`=$mid");
  $con->query("DELETE FROM `copyright_infringement` WHERE `RDON_ID`='$id'");
  $con->query("UPDATE `song` SET `USER_NAME`='', `SONG_NAME`='', `SONG_GENRE`='', `ARTIST_NAME`='', `ALBUM_NAME`='', `RECORD_LABEL`='', `COPYRIGHT`='', `COPYRIGHT_STATUS`=0, `COPYRIGHT_1`=0, `WANT_INVESTOR`=0, `INVEST_RADIO`=0, `TOTAL_STREAM`=0, `SONG_SUBMIT_DATE`=NULL, `SONG_STATUS`=3, `NFT`='', `TOKEN_ID`=-1, `IPFS_CID`='', `EDITION_ID`=-1, `EDITION_CID`='', `EDITION_HASH`='', `duration`=0, `fingerprint`='' WHERE `RDON_ID`='$id' AND `USER_NAME`='$slusername'");
} else {
  http_response_code(400);
  header('Content-Type: text/plain');
  die('Song does not exist');
}

?>
