<?php

require_once 'php/utils.php';

$cached_data = file_get_contents('./tezos/tezos.json');
$cached = json_decode($cached_data);
$time = time();
$last_date = explode('.', $cached->timestamp)[0] . 'Z';
$last = strtotime($last_date);

// Fetch the latest Tezos update every 3 minutes
if ($time - $last > 180) {
  $json = false;
  while (!$json) {
    $curl = curl_init();
    $supply_curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://api.tzstats.com/markets/tickers',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET'
    ));

    curl_setopt_array($supply_curl, array(
      CURLOPT_URL => 'https://api.tzstats.com/tables/supply?time.gte=today&limit=1',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET'
    ));

    $response = curl_exec($curl);
    $supply_res = curl_exec($supply_curl);
    curl_close($curl);
    curl_close($supply_curl);

    if (is_json($response) && is_json($supply_res)) {
      $json = true;
      $response = json_decode($response);
      $supply_res = json_decode($supply_res);

      foreach ($response as $ticker) {
        if ($ticker->pair === 'XTZ_USD' && $ticker->exchange === 'kraken') {
          $ticker->supply = $supply_res[0][4];
          $ticker->circulating_supply = $supply_res[0][9];

          $cached_data = json_encode($ticker);
          $cached = $ticker;
          $last_date = explode('.', $cached->timestamp)[0] . 'Z';
          $last = strtotime($last_date);
          file_put_contents('./tezos/tezos.json', $cached_data);
          break;
        }
      }
    }
  }
}

$date = gmdate('D, d M Y H:i:s', $last + 300);
header('Content-Type: application/json');
header("Expires: $date GMT");
echo $cached_data;

?>
