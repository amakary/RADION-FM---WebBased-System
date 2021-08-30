<?php

require_once __DIR__ . '/music_info_get.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  $id = isset($_GET['id']) ? $_GET['id'] : null;
  if ($id === null) {
    http_response_code(400);
    die('');
  }

  $actualid = actualid($id);
  die($actualid);
}

?>
