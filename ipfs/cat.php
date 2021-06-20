<?php

function exit_result ($code = 200, $message = '') {
  $result = [
    'success' => $code === 200,
    'message' => $message
  ];

  http_response_code($code);
  header('Content-Type: application/json');
  $result_json = json_encode($result);
  die($result_json);
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  $cid = !empty($_GET['cid']) ? $_GET['cid'] : null;

  if ($cid !== null) {
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://www.radion.fm:8980/ipfs/$cid",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET'
    ));

    $response = curl_exec($curl);
    $content_type = curl_getinfo($curl, CURLINFO_CONTENT_TYPE);
    curl_close($curl);

    header("Content-Type: $content_type");
    echo $response;
  } else exit_result(400, 'CID is empty');
} else exit_result(405, 'Method not allowed');

?>
