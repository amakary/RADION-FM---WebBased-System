<?php

function is_json ($str) {
  json_decode($str);
  return json_last_error() === JSON_ERROR_NONE;
}

function get_json ($url) {
  $curl = curl_init();
  curl_setopt_array($curl, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET'
  ));

  $response = curl_exec($curl);
  curl_close($curl);

  return is_json($response) ? json_decode($response) : $response;
}

?>
