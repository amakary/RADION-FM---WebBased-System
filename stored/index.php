<?php

$id = !empty($_GET['id']) ? $_GET['id'] : null;
$hash = !empty($_GET['hash']) ? $_GET['hash'] : null;

if ($id === null) {
  http_response_code(400);
  die('ID is not defined');
}

$path = __DIR__ . "/$id";
$type = file_get_contents(__DIR__ . "/$id-type");
$print = false;

if (file_exists($path)) $print = true;
else {
  http_response_code(400);
  die('Asset does not exist on the server');
}

if (explode('/', $type)[0] === 'audio') {
  if ($hash === null) {
    http_response_code(400);
    die('Hash is required to access this asset');
  }

  $curl = curl_init();
  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.tzstats.com/explorer/op/$hash",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET'
  ));

  $response = curl_exec($curl);
  $response = json_decode($response);
  curl_close($curl);

  if ($response[0]->data !== 'buy') {
    http_response_code(400);
    die('Invalid hash');
  }
}

if ($print) {
  header("Content-Type: $type");
  readfile($path);
}

?>
