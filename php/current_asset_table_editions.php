<?php

$groupswithaccess = 'RADIONER,CEO,FOUNDER';

require_once '../slpw/sitelokpw.php';
require_once './utils.php';

$tzstats = 'https://api.tzstats.com';
$fa2 = 'KT1WjTTTgHy5MojfoAe1yFUGU6roLaE2x8Uj';
$market = 'KT1BNXQ8XLbBqapbQjPVg3xFnxoade2UjxE6';

$song_query = "SELECT * FROM `song` WHERE `USER_NAME`='$slusername'";
$result = $con->query($song_query);

while ($row = $result->fetch_object()) {
  $price = 0;
  $left = 0;
  $quantity = 0;
  $license = '';
  $license_name = '';

  if ($row->EDITION_ID >= 0) {
    $contract_storage = get_json("$tzstats/explorer/contract/$fa2/storage");
    $market_storage = get_json("$tzstats/explorer/contract/$market/storage");
    $editions_bigmap_id = $contract_storage->bigmaps->editions_metadata;
    $editions_bigmap = get_json("$tzstats/explorer/bigmap/$editions_bigmap_id/values");
    $sales_bigmap_id = $market_storage->bigmaps->sales;
    $sales_bigmap = get_json("$tzstats/explorer/bigmap/$sales_bigmap_id/values");
    $max_per_run = (int) $contract_storage->value->max_editions_per_run;
    $edition_details = $editions_bigmap[$row->EDITION_ID]->value;
    $quantity = (int) $edition_details->number_of_editions;
    $license = hex2bin($edition_details->edition_info->legal_contract_type);

    foreach ($sales_bigmap as $sale) {
      $token_id = (int) $sale->key->sale_token->token_for_sale_token_id;
      $edition_id = floor($token_id / $max_per_run);

      if ($edition_id == $row->EDITION_ID) {
        $price = (int) $sale->value;
        $left++;
      }
    }
  }

  $sold = $quantity - $left;
  $potential_payout = ($price * $sold) / 1000000;

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
    <td class="rdon-id" style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd; font-size:11px;"><?= $row->RDON_ID ?></td>
    <td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd; font-size:11px;"><?= $potential_payout ?> tez</td>
    <td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd; font-size:11px;"><?= $row->SONG_NAME ?></td>
    <td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd; font-size:11px;"><?= $row->SONG_GENRE ?></td>
    <td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd; font-size:12px;">
      <?php if ($row->EDITION_ID < 0) { ?>
      <span class="btn-create-nft label label-warning" style="cursor:pointer;">Sell Editions <i class="far fa-exclamation-circle"></i></span>
      <?php } else { ?>
      &nbsp;&nbsp;&nbsp;&nbsp;<i class="far fa-check-circle fa-lg" style='color:#229954;'></i>
      <?php } ?>
    </td>
    <td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd; font-size:11px;"><?= $left ?>/<?= $quantity ?></td>
    <td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd; font-size:11px;"><?= $license_name ?></td>
  </tr>
<?php
}
?>
<script>
async function getSongData (id) {
  return new Promise((resolve, reject) => {
    $.ajax('/php/get_song_metadata.php', {
      type: 'GET',
      data: { id: id },
      dataType: 'json',
      success: function (data, xhr, status) {
        resolve(data)
      },
      error: function (xhr, status, error) {
        reject(error)
      }
    })
  })
}

$('.btn-create-nft').click(async function (event) {
  const id = $(this).parent().parent().find('.rdon-id').text()
  const username = '<?= $slusername ?>'
  const songData = await getSongData(id)
  if (username !== songData.uploader) return

  const license = songData.copyright_message[0]
  const attr = license.split(' ')[1].split('-')

  $('#cover-preview').attr('src', '/php/get_artwork.php?id=' + id)
  $('#id').val(id)
  $('#title').val(songData.title[0])
  $('#artist').val(songData.artist[0])
  $('#album').val(songData.album_saved)
  $('#year').val(songData.year[0])
  $('#track').val(songData.track_number[0])
  $('#genre').val(songData.genre[0])
  $('#license').val(songData.copyright_message[0])
  $('#record-label').val(songData.record)
  $('#filesize').val(songData.filesize)
  window.history.pushState('', '', '/mint-2.php?id=' + id)
})
</script>
