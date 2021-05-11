<?php

$groupswithaccess = 'ALL,PUBLIC,RADIONER,CEO,FOUNDER';

require_once 'slpw/sitelokpw.php';
require_once 'php/music_info_get.php';
require_once 'getID3/getid3/getid3.php';

$rdon_id = isset($_GET['id']) ? $_GET['id'] : '0';
$hash = isset($_GET['hash']) ? $_GET['hash'] : '';

if ($rdon_id === '0' || $hash === '') {
  http_response_code(400);
  header('Content-Type: text/plain');
  die('Invalid song ID or hash');
}

$song_res = $con->query("SELECT * FROM `song` WHERE `RDON_ID`='$rdon_id'");
$song = $song_res->fetch_object();
$song_id = $song->SONG_ID;
$status = $song->SONG_STATUS;
$hash_match = md5("asset-$rdon_id");
$hash_preview = md5("asset-preview-$rdon_id");
$getID3 = new getID3();

if ($hash === $hash_match) {
  $source = get_music_source($rdon_id, $status);
  $mp3info = $getID3->analyze($source);
  $fp = @fopen($source, 'rb');

  $mime = $mp3info['mime_type'];
  $size = (int) $mp3info['filesize'];
  $length = $size;
  $start = 0;
  $end = $size - 1;

  header("Content-Type: $mime");
  header("Accept-Ranges: 0-$length");

  if (isset($_SERVER['HTTP_RANGE'])) {
    $c_start = $start;
    $c_end = $end;

    list(, $range) = explode('=', $_SERVER['HTTP_RANGE'], 2);
    if (strpos($range, ',') !== false) {
      http_response_code(416);
      header("Content-Range: bytes $start-$end/$size");
      exit();
    }

    if ($range == '-') {
      $c_start = $size - substr($range, 1);
    } else {
      $range = explode('-', $range);
      $c_start = $range[0];
      $c_end = (isset($range[1]) && is_numeric($range[1])) ? $range[1] : $size;
    }

    $c_end = $c_end > $end ? $end : $c_end;
    if ($c_start > $c_end || $c_start > $size - 1 || $c_end >= $size) {
      http_response_code(416);
      header("Content-Range: bytes $start-$end/$size");
      exit();
    }

    $start = $c_start;
    $end = $c_end;
    $length = $end - $start + 1;
    fseek($fp, $start);
    http_response_code(206);
  }

  header("Content-Range: bytes $start-$end/$size");
  header("Content-Length: $length");

  $buffer = 1024 * 8;
  while (!feof($fp) && ($p = ftell($fp)) <= $end) {
    if ($p + $buffer > $end) $buffer = $end - $p + 1;
    set_time_limit(0);
    echo fread($fp, $buffer);
    flush();
  }

  fclose($fp);
} else if ($hash === $hash_preview) {
  $source = get_music_source($rdon_id, $status);
  $mp3info = $getID3->analyze($source);
  $filesize = $mp3info['filesize'];
  $mime = $mp3info['mime_type'];
  $byterate = $mp3info['bitrate'] / 8;
  $audio_offset = $mp3info['avdataoffset'];

  $offset = $audio_offset + ($byterate * 20); // offset 20 seconds for preview
  $length = $byterate * 50; // play 50 seconds

  if ($offset > $filesize) $offset = 0;
  if ($offset + $length > $filesize) $length = $filesize - $offset;

  header("Content-Type: $mime");
  header("Content-Length: $length");

  $file = fopen($source, 'rb');
  fseek($file, $offset);
  $data = fread($file, $length);
  fclose($file);
  print($data);

  $con->query("INSERT INTO `song_play` (`SONG_ID`,`SONG_PLAY_USERNAME`) VALUES ($song_id,'$slusername')");
} else {
  header('Content-Type: text/plain');
  http_response_code(400);
  echo 'Invalid hash';
}

?>
