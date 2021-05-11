<?php
/**
 *  Updates database with SHOUTcast's history
 */

require_once 'db.php';

$sid = isset($_GET['sid']) ? $_GET['sid'] : '1';
$last_playeddate = file_get_contents('../stream/last_playeddate.txt');
$json = file_get_contents("https://www.radion.fm:8002/played?sid=$sid&type=json");
$json = json_decode($json);
$last_song = $json[0];

if ($last_song->playedat != $last_playeddate) {
  foreach ($json as $song) {
    if ($song->playedat > $last_playeddate) {
      $rdon_id = $song->metadata->talb;
      $query = "UPDATE `song` SET `TOTAL_STREAM`=`TOTAL_STREAM`+1 WHERE `RDON_ID`='$rdon_id'";
      $con->query($query);
    }
  }

  $last_playeddate = $last_song->playedat;
  file_put_contents('../stream/last_playeddate.txt', $last_playeddate);
}

?>
