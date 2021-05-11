<?php

session_start();

require_once 'music_info_get.php';
require_once 'db.php';

$sid = isset($_GET['sid']) ? $_GET['sid'] : '1';
$id = isset($_GET['id']) ? $_GET['id'] : null;

if ($id === null) {
  $curl = curl_init("https://radion.fm:8002/currentmetadata?sid=$sid");
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  $res = curl_exec($curl);
  curl_close($curl);

  $parser = xml_parser_create();
  xml_parse_into_struct($parser, $res, $xml);

  // Fetches the song ID from the album tag
  foreach ($xml as $tags) {
    if ($tags['tag'] === 'TALB') {
      $id = $tags['value'];
      break;
    }
  }
}

$audio_link = '';
$song_res = $con->query("SELECT `SONG_ID`,`SONG_STATUS` FROM `song` WHERE `RDON_ID`='$id'");
if (!$song_res || $song_res->num_rows === 0) {
  die('Song was not found on the server.');
}

/**
 *  Song locations:
 *  Pending - '/slbackups_mlicqx83sq/Music/$SONG_ID'
 *  Approved - '/music/$SONG_ID/$SONG_ID'
 */
$song = $song_res->fetch_object();
$song_id = $song->SONG_ID;
$status = $song->SONG_STATUS;
$full_path = __DIR__ . '/../' . ($status == 0 ? 'slbackups_mlicqx83sq/Music/' : "music/$id/") . "$id.*";
$file_list = glob($full_path);

foreach ($file_list as $filename) {
  $ext = pathinfo($filename, PATHINFO_EXTENSION);
  if (preg_match('/^(mp3|m4a)$/i', $ext)) {
    $audio_link = $filename;
    break;
  }
}

if (file_exists($audio_link)) {
  if ($status != 0) {
    $username = isset($_SESSION) && isset($_SESSION['ses_slusername']) ? $_SESSION['ses_slusername'] : 'Anonymous';
    $operation = $con->real_escape_string(isset($_GET['op']) ? $_GET['op'] : '');
    // @TODO: Validate operation and XTZ value
    $xtz = isset($_GET['xtz']) ? (float) $_GET['xtz'] : 0;
    $usd = isset($_GET['usd']) ? (float) $_GET['usd'] : 0;

    $con->query("INSERT INTO `song_downloads` (`SONG_ID`,`USERNAME`,`PRICE_XTZ`,`PRICE_USD`,`OPERATION`) VALUES ($song_id,'$username',$xtz,$usd,'$operation')");
  }

  // Output audio data
  header('Content-Type: audio/mpeg');
  header('Content-Disposition: attachment; filename="' . basename($audio_link) . '"');
  header('Expires: 0');
  header('Cache-Control: must-revalidate');
  header('Pragma: public');
  header('Content-Length: ' . filesize($audio_link));
  readfile($audio_link);
} else {
  die('File was not found in the server');
}

?>
