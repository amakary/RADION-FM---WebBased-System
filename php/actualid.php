<?php

require_once __DIR__ . '/db.php';

function actualid ($id) {
  global $con;

  $id = $con->real_escape_string($id);
  $ids_res = $con->query("SELECT * FROM `song_transfer` WHERE `RDON_ID`='$id'");
  if ($ids_res->num_rows > 0) {
    $ids = $ids_res->fetch_object();
    return $ids->NEW_RDON_ID;
  } else return $id;
}

if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'GET') {
  $id = isset($_GET['id']) ? $_GET['id'] : null;
  if ($id === null) {
    http_response_code(400);
    die('');
  }

  $actualid = actualid($id);
  die($actualid);
}

?>
