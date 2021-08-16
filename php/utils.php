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
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => [
      'Accept: application/json',
      'User-Agent: RADION FM/v1.0.0 (https://www.radion.fm)'
    ]
  ));

  $response = curl_exec($curl);
  curl_close($curl);

  return is_json($response) ? json_decode($response) : $response;
}

function get_text ($url) {
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

  return $response;
}

function deldir ($path) {
  if (!file_exists($path)) return;

  if (!is_dir($path)) {
    throw new InvalidArgumentException("$path must be a directory");
  }

  if (substr($path, strlen($path) - 1, 1) !== '/') {
    $path .= '/';
  }

  $files = glob($path . '*', GLOB_MARK);
  foreach ($files as $file) {
    if (is_dir($file)) deldir($file);
    else unlink($file);
  }

  rmdir($path);
}

?>
