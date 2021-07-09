<?php

require_once 'db.php';

header('Content-Type: text/plain');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = isset($_POST['id']) ? $con->real_escape_string($_POST['id']) : null;
  if ($id === null) {
    http_response_code(400);
    die('ID is not defined');
  }

  $exists = $con->query("SELECT * FROM `song` WHERE `RDON_ID`='$id'");
  if ($exists->num_rows > 0) {
    $mid = $exists->fetch_object()->SONG_ID;
    $con->query("INSERT INTO `song_fullplay` (`SONG_ID`) VALUES ($mid)");
    die('success');
  } else {
    http_response_code(400);
    die('ID does not exist');
  }
} else {
  http_response_code(405);
  die('Unsupported method');
}

?>
