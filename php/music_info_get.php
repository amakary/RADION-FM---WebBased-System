<?php

require_once __DIR__ . '/db.php';

function get_music_source ($song_id, $type = 0, $root = false) {
  $root = $root ? __DIR__ . '/../' : '';
  $base_path = $root . ($type == 1 ? "music/$song_id" : 'slbackups_mlicqx83sq/Music');
  $full_path = "$base_path/$song_id.*";
  $file_list = glob($full_path);
  $file_name = '';

  foreach ($file_list as $filename) {
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if (preg_match('/^(mp3|m4a)$/i', $ext)) {
      $file_name = $filename;
      break;
    }
  }

  return $file_name;
}

function get_art_work ($song_id, $type = 0, $root = false) {
  $root = $root ? __DIR__ . '/../' : '';
  $full_path = $root . ($type == 1 ? "music/$song_id/cover.*" : "slbackups_mlicqx83sq/Music/$song_id.*");
  $file_list = glob($full_path);
  $file_name = 'assets/images/users/pre-radion.jpg';

  foreach ($file_list as $filename) {
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if (preg_match('/^(png|jpg|jpeg)$/i', $ext)) {
      $file_name = $filename;
      break;
    }
  }

  return $file_name;
}

function actualid ($id) {
  global $con;

  $id = $con->real_escape_string($id);
  $ids_res = $con->query("SELECT * FROM `song_transfer` WHERE `RDON_ID`='$id'");
  if ($ids_res->num_rows > 0) {
    $ids = $ids_res->fetch_object();
    return $ids->NEW_RDON_ID;
  } else return $id;
}

?>
