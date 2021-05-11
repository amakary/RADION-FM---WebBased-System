<?php

ini_set('display_errors', '1');
error_reporting(E_ALL);

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
$source = get_art_work($song->RDON_ID, $song->SONG_STATUS, true);

$parts = explode('.', $source);
$ext = array_pop($parts);
$mime = '';
if (preg_match('/^(png)$/i', $ext)) {
  $mime = 'image/png';
} else if (preg_match('/^(jpe?g)$/i', $source)) {
  $mime = 'image/jpeg';
} else if (preg_match('/^(gif)$/i', $source)) {
  $mime = 'image/gif';
}

header("Content-Type: $mime");
readfile($source);

?>
