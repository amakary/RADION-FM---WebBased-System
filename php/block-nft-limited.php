<?php

require_once 'db.php';

header('Content-Type: text/plain');
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  $id = isset($_GET['id']) ? (int) $_GET['id'] : null;
  if ($id === null) {
    http_response_code(400);
    die('ID is not defined');
  }

  $blocked = $con->query("SELECT * FROM `blocklist_nft` WHERE `TOKEN_ID`=$id");
  echo $blocked->num_rows > 0 ? 'Blocked' : 'Good';
} else {
  http_response_code(405);
  die('Unsupported method');
}

?>