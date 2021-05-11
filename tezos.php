<?php

require_once './php/utils.php';

$cached_data = file_get_contents('./tezos/history.json');
$cached = json_decode($cached_data);
$time = time();
$last = $cached->timestamp / 1000;

// Fetch the latest Tezos update only once per day
if ($time - $last > 86400) {
  $json = false;
  while (!$json) {
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://api.coincap.io/v2/assets/tezos/history?interval=d1',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET'
    ));

    $response = curl_exec($curl);
    if (is_json($response)) {
      $json = true;
      $cached_data = $response;
      $cached = json_decode($cached_data);
      $last = $cached->timestamp / 1000;
      file_put_contents('./tezos/history.json', $cached_data);
    }

    curl_close($curl);
  }
}

$date = gmdate('D, d M Y H:i:s', $last + 86400);
header('Content-Type: application/json');
header("Expires: $date GMT");
echo $cached_data;

?>
