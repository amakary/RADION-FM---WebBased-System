<?php

$groupswithaccess = 'RADIONER,CEO,FOUNDER';

require_once '../slpw/sitelokpw.php';
require_once './utils.php';

$tzstats = 'https://api.tzstats.com';
$fa2 = 'KT1WjTTTgHy5MojfoAe1yFUGU6roLaE2x8Uj';
$market = 'KT1BNXQ8XLbBqapbQjPVg3xFnxoade2UjxE6';

$contract_storage = get_json("$tzstats/explorer/contract/$fa2/storage");
$market_storage = get_json("$tzstats/explorer/contract/$market/storage");
$tokens_bigmap_id = $contract_storage->bigmaps->ledger;
$tokens_bigmap = get_json("$tzstats/explorer/bigmap/$tokens_bigmap_id/values?meta=1");
$editions_bigmap_id = $contract_storage->bigmaps->editions_metadata;
$editions_bigmap = get_json("$tzstats/explorer/bigmap/$editions_bigmap_id/values");
$sales_bigmap_id = $market_storage->bigmaps->sales;
$sales_bigmap = get_json("$tzstats/explorer/bigmap/$sales_bigmap_id/values");
$max_per_run = (int) $contract_storage->value->max_editions_per_run;

$song_query = "SELECT * FROM `song` WHERE `USER_NAME`='$slusername' AND `EDITION_ID`<>-1";
$result = $con->query($song_query);
$rows = [];
$edition_owns = [];

while ($row = $result->fetch_object()) $rows[] = $row;
foreach ($tokens_bigmap as $token) {
  if ($token->value === $slcustom6) {
    $token_id = (int) $token->key;
    $edition_id = floor($token_id / $max_per_run);

    if (!isset($edition_owns[$edition_id])) {
      $edition_owns[$edition_id] = 1;
      $rows[] = (object) array(
        'owned' => true,
        'EDITION_ID' => $edition_id,
        'RDON_ID' => '',
        'EDITION_HASH' => $token->meta->op
      );
    } else $edition_owns[$edition_id]++;
  }
}

foreach ($rows as $row) {
  $price = 0;
  $left = 0;
  $paid = '';
  $edition_details = $editions_bigmap[$row->EDITION_ID]->value;
  $quantity = (int) $edition_details->number_of_editions;
  $license = hex2bin($edition_details->edition_info->legal_contract_type);
  $license_name = '';

  foreach ($sales_bigmap as $sale) {
    $token_id = (int) $sale->key->sale_token->token_for_sale_token_id;
    $edition_id = floor($token_id / $max_per_run);

    if ($edition_id == $row->EDITION_ID) {
      $price = (int) $sale->value;
      $left++;
    }
  }

  $potential_payout = ($price * $quantity) / 1000000;
  $potential_payout = "$potential_payout tez";

  if ($row->owned) {
    $row->RDON_ID = hex2bin($edition_details->edition_info->asset_id);
    $left = $edition_owns[$row->EDITION_ID];
    $potential_payout = '';
    $paid = ($price * $left) / 1000000;
    $paid = "$paid tez";
  }

  switch ($license) {
    case 'basic':
      $license_name = 'Basic Lease';
      break;

    case 'youtube':
      $license_name = 'YouTube Lease';
      break;

    case 'trackout':
      $license_name = 'Trackout Lease';
      break;

    case 'premium':
      $license_name = 'Premium Lease';
      break;

    case 'exclusive':
      $license_name = 'Exclusive Rights';
      break;
  }

?>
  <tr>
    <td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd; font-size:11px;"><?= $row->EDITION_ID ?></td>
    <td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd; font-size:11px;"><?= $row->RDON_ID ?></td>
    <td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd; font-size:11px;"><?= $potential_payout ?></td>
    <td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd; font-size:11px;"><?= $paid ?></td>
    <td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd; font-size:11px; color:#2980B9;"><?= $row->EDITION_HASH ?></td>
    <td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd; font-size:11px;"><?= $price / 1000000 ?> tez</td>
    <td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd; font-size:11px;"><?= $left ?>/<?= $quantity ?></td>
    <td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd; font-size:11px;"><?= $license_name ?></td>
  </tr>
<?php
}
?>
