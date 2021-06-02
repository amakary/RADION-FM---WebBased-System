<?php

$id = !empty($_GET['id']) ? $_GET['id'] : null;
if ($id === null) {
  http_response_code(400);
  die('ID is not defined');
}

$path = __DIR__ . "/$id";
if (file_exists($path)) {
  $type = file_get_contents(__DIR__ . "/../$id-type");
  header("Content-Type: $type");
  readfile($path);
} else {
  http_response_code(400);
  die('Asset does not exist on the server');
}

?>
