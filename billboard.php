<?php

require_once 'php/db.php';
require_once 'php/music_info_get.php';

$last_week_end = gmdate('Y-m-d H:i:s', strtotime('monday this week'));
$query_last = <<<EOD
SELECT
  `song`.`SONG_ID`,
  (
    (
      (SELECT COUNT(`song_like`.`SONG_LIKE_ID`) FROM `song_like` WHERE `song_like`.`SONG_ID` = `song`.`SONG_ID` AND `song_like`.`SONG_LIKE_STATUS` = 1 AND `song_like`.`DATE` BETWEEN '00-00-00 00:00:00' AND '{$last_week_end}') -
      (SELECT COUNT(`song_like`.`SONG_LIKE_ID`) FROM `song_like` WHERE `song_like`.`SONG_ID` = `song`.`SONG_ID` AND `song_like`.`SONG_LIKE_STATUS` = 0 AND `song_like`.`DATE` BETWEEN '00-00-00 00:00:00' AND '{$last_week_end}') +
      (SELECT COUNT(`song_love`.`SONG_LOVE_ID`) FROM `song_love` WHERE `song_love`.`SONG_ID` = `song`.`SONG_ID` AND `song_love`.`DATE` BETWEEN '00-00-00 00:00:00' AND '{$last_week_end}') +
      (SELECT COUNT(`song_tweet`.`SONG_TWEET_ID`) FROM `song_tweet` WHERE `song_tweet`.`SONG_ID` = `song`.`SONG_ID` AND `song_tweet`.`DATE` BETWEEN '00-00-00 00:00:00' AND '{$last_week_end}')
    ) * 0.25 +
    (
      (SELECT COUNT(`song_downloads`.`DOWNLOAD_ID`) FROM `song_downloads` WHERE `song_downloads`.`SONG_ID` = `song`.`SONG_ID` AND `song_downloads`.`DATE` BETWEEN '00-00-00 00:00:00' AND '{$last_week_end}')
    ) * 0.75
  ) AS `score`
FROM `song`
WHERE `song`.`SONG_STATUS` = 1
GROUP BY `song`.`SONG_ID`
ORDER BY `score` DESC
EOD;

$billboard_last = [];
$result_last = $con->query($query_last);
$i = 0;

while ($row = $result_last->fetch_object()) {
  if ($row->score > 0) {
    $billboard_last[$row->SONG_ID] = [
      'index' => $i,
      'score' => $row->score
    ];
    $i++;
  }
}

$this_week_start = gmdate('Y-m-d H:i:s', strtotime('monday this week'));
$this_week_end = gmdate('Y-m-d H:i:s', strtotime('monday next week'));
$query_this = <<<EOD
SELECT
  `song`.`SONG_ID`,
  (
    (
      (SELECT COUNT(`song_like`.`SONG_LIKE_ID`) FROM `song_like` WHERE `song_like`.`SONG_ID` = `song`.`SONG_ID` AND `song_like`.`SONG_LIKE_STATUS` = 1 AND `song_like`.`DATE` BETWEEN '{$this_week_start}' AND '{$this_week_end}') -
      (SELECT COUNT(`song_like`.`SONG_LIKE_ID`) FROM `song_like` WHERE `song_like`.`SONG_ID` = `song`.`SONG_ID` AND `song_like`.`SONG_LIKE_STATUS` = 0 AND `song_like`.`DATE` BETWEEN '{$this_week_start}' AND '{$this_week_end}') +
      (SELECT COUNT(`song_love`.`SONG_LOVE_ID`) FROM `song_love` WHERE `song_love`.`SONG_ID` = `song`.`SONG_ID` AND `song_love`.`DATE` BETWEEN '{$this_week_start}' AND '{$this_week_end}') +
      (SELECT COUNT(`song_tweet`.`SONG_TWEET_ID`) FROM `song_tweet` WHERE `song_tweet`.`SONG_ID` = `song`.`SONG_ID` AND `song_tweet`.`DATE` BETWEEN '{$this_week_start}' AND '{$this_week_end}')
    ) * 0.25 +
    (
      (SELECT COUNT(`song_downloads`.`DOWNLOAD_ID`) FROM `song_downloads` WHERE `song_downloads`.`SONG_ID` = `song`.`SONG_ID` AND `song_downloads`.`DATE` BETWEEN '{$this_week_start}' AND '{$this_week_end}')
    ) * 0.75
  ) AS `score`
FROM `song`
WHERE `song`.`SONG_STATUS` = 1
GROUP BY `song`.`SONG_ID`
ORDER BY `score` DESC
EOD;

$billboard_this = [];
$result_this = $con->query($query_this);
$i = 0;

while ($row = $result_this->fetch_object()) {
  if ($row->score > 0) {
    $billboard_this[$row->SONG_ID] = [
      'index' => $i,
      'score' => $row->score
    ];
    $i++;
  }
}

$query = <<<EOD
SELECT
  `song`.`SONG_ID`,
  (
    (
      (SELECT COUNT(`song_like`.`SONG_LIKE_ID`) FROM `song_like` WHERE `song_like`.`SONG_ID` = `song`.`SONG_ID` AND `song_like`.`SONG_LIKE_STATUS` = 1) -
      (SELECT COUNT(`song_like`.`SONG_LIKE_ID`) FROM `song_like` WHERE `song_like`.`SONG_ID` = `song`.`SONG_ID` AND `song_like`.`SONG_LIKE_STATUS` = 0) +
      (SELECT COUNT(`song_love`.`SONG_LOVE_ID`) FROM `song_love` WHERE `song_love`.`SONG_ID` = `song`.`SONG_ID`) +
      (SELECT COUNT(`song_tweet`.`SONG_TWEET_ID`) FROM `song_tweet` WHERE `song_tweet`.`SONG_ID` = `song`.`SONG_ID`)
    ) * 0.25 +
    (
      (SELECT COUNT(`song_downloads`.`DOWNLOAD_ID`) FROM `song_downloads` WHERE `song_downloads`.`SONG_ID` = `song`.`SONG_ID`)
    ) * 0.75
  ) AS `score`
FROM `song`
WHERE `song`.`SONG_STATUS` = 1
GROUP BY `song`.`SONG_ID`
ORDER BY `score` DESC
EOD;

$billboard = [];
$result = $con->query($query);
$i = 0;

while ($row = $result->fetch_object()) {
  if ($row->score > 0) {
    $billboard[$row->SONG_ID] = [
      'index' => $i,
      'score' => $row->score
    ];
    $i++;
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- META SECTION -->
  <title>Billboard Crypto Music</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="apple-touch-icon" sizes="57x57" href="/favicon/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="/favicon/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="/favicon/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="/favicon/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="/favicon/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="/favicon/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="/favicon/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="/favicon/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192" href="/favicon/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="/favicon/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
  <link rel="manifest" href="/favicon/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="/favicon/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">
  <!-- END META SECTION -->

  <!-- CSS INCLUDE -->
  <link rel="stylesheet" id="theme" href="/css/theme-dark.css">
  <link rel="stylesheet" href="/css/all.css">
  <link rel="stylesheet" href="/css/goodies.css">
  <!-- EOF CSS INCLUDE -->

  <script src="/js/plugins/jquery/jquery.min.js"></script>
  <script src="/js/all.js"></script>
</head>

<body>
  <div class="error-container">
    <div class="error-code">RADION</div>
    <div class="error-text">Crypto Billboard</div>
    <div class="error-subtext"></div>
  </div>

  <?php
  $limit = 10;
  $i = 0;
  foreach ($billboard as $song_id => $score) {
    if ($i < $limit) $i++;
    else break;

    $rank = $score['index'] + 1;
    $song_res = $con->query("SELECT * FROM `song` WHERE `SONG_ID`=$song_id");
    $song = $song_res->fetch_object();
    $peak = $song->peak;
    $wks = $song->wks;
    $wks_last = $song->wks_last;
    $rdon_id = $song->RDON_ID;
    $artwork = get_art_work($rdon_id, 1);
    $hash = md5("asset-preview-$rdon_id");

    if ($peak < $rank) {
      $peak = $rank;
      $con->query("UPDATE `song` SET `peak`=$rank WHERE `SONG_ID`=$song_id");
    }

    if ($wks_last !== $this_week_end) {
      $wks_last = $this_week_end;
      if ($billboard_last[$song_id]['index'] < 10) $wks++;
      else $wks = 1;

      $con->query("UPDATE `song` SET `wks`=$wks, `wks_last`=$this_week_end WHERE `SONG_ID`=$song_id");
    }

  ?>
  <div style="padding-right:50px; padding-left:50px;">
    <div class="panel panel-default" style="margin-bottom:2px; border-radius:0 30px 0 0;">
      <div class="panel-body" style="margin-right:-100px;">
        <div align="right" style="padding-right:145px; color:#777777; font-size:18px; font-family:Arial; margin-bottom:-33px;"></div>
        <div style="color:#777777; padding:30px 0px 0px 20px; font-size:50px; font-family:Arial;"><?= $rank ?></div>
        <div style="color:#777777; padding:30px 140px 0px 80px; font-size:18px; font-family:Arial; margin-top:-90px;">
          <div style="padding-right:20px;"><span style="padding-right:30px;"><?= $song->SONG_NAME ?></span></div>
          <div style="padding-right:40px;"><small><?= $song->ARTIST_NAME ?></small></div>
          <div style="margin-top:-45px;" align="right">
            <table style="width:50%">
              <tr>
                <th style="width:25%; font-size:14px; font-family:Arial; color:#F7DC6F;"><small>AWARD</small></th>
                <th style="width:25%; font-size:14px; font-family:Arial; color:#F7DC6F;"><small>LAST WEEK</small></th>
                <th style="width:25%;font-size:14px; font-family:Arial; color:#F7DC6F;"><small>PEAK</small></th>
                <th style="width:25%; font-size:14px; font-family:Arial; color:#F7DC6F;"><small>WKS ON CHART</small></th>
              </tr>
              <tr>
                <td><span style="padding-left:14px;"><i class="fas fa-record-vinyl fa-sm"></i></span></td>
                <td><span style="padding-left:30px; font-size:14px; font-family:Arial;"><?= $billboard_last[$song_id]['index'] + 1 ?></span></td>
                <td><span style="padding-left:10px; font-size:14px; font-family:Arial;"><?= $peak ?></span></td>
                <td><span style="padding-left:40px; font-size:14px; font-family:Arial;"><?= $wks ?></span></td>
              </tr>
            </table>
          </div>
        </div>
      </div>

      <span align="right">
        <button type="button" class="btn btn-default btn-rounded blob white" style="z-index:1;position:absolute;margin:31.5px 31.5px;" data-id="<?= $rdon_id ?>" data-hash="<?= $hash ?>">
          <i class="fas fa-play"></i>
        </button>
        <img src="<?= $artwork ?>" style="height:100px; width:100px; border-radius:0 30px 0 30px;">
      </span>
    </div>
  </div>
  <?php } ?>

  <div align="center" style="padding-bottom:50px;">
    <img src="img/logo-dark.png" style="width:75px; height:25px;">
  </div>

  <script>
  $(document).ready(function () {
    const audio = new Audio()
    let currentId = null

    $('[data-hash]').click(function () {
      const id = $(this).attr('data-id')
      const hash = $(this).attr('data-hash')
      const url = '/asset.php?id=' + id + '&hash=' + hash

      if (currentId !== id) {
        $('[data-hash]').html('<i class="fas fa-play"></i>')
        $(this).html('<i class="fas fa-pause"></i>')

        currentId = id
        audio.src = url
        audio.play()
      } else {
        if (audio.paused) {
          $(this).html('<i class="fas fa-pause"></i>')
          audio.play()
        } else {
          $(this).html('<i class="fas fa-play"></i>')
          audio.pause()
        }
      }
    })
  })
  </script>
</body>
</html>
