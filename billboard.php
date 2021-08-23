<?php

ini_set('display_errors', '1');
error_reporting(E_ALL);

$groupswithaccess = 'ALL,PUBLIC';

require_once 'slpw/sitelokpw.php';
require_once 'php/music_info_get.php';

$last_week_start = gmdate('Y-m-d 00:00:00', strtotime('monday last week'));
$last_week_end = gmdate('Y-m-d 00:00:00', strtotime('monday this week'));
$query_last = <<<EOD
SELECT
  `song`.*,
  (SELECT COUNT(*) FROM `song_like` WHERE `song_like`.`SONG_ID` = `song`.`SONG_ID` AND `song_like`.`SONG_LIKE_STATUS` = 1 AND `song_like`.`DATE` BETWEEN '{$last_week_start}' AND '{$last_week_end}') * 0.03 -
  (SELECT COUNT(*) FROM `song_like` WHERE `song_like`.`SONG_ID` = `song`.`SONG_ID` AND `song_like`.`SONG_LIKE_STATUS` = 0 AND `song_like`.`DATE` BETWEEN '{$last_week_start}' AND '{$last_week_end}') * 0.03 +
  (SELECT COUNT(*) FROM `song_love` WHERE `song_love`.`SONG_ID` = `song`.`SONG_ID` AND `song_love`.`DATE` BETWEEN '{$last_week_start}' AND '{$last_week_end}') * 0.03 +
  (SELECT COUNT(*) FROM `song_tweet` WHERE `song_tweet`.`SONG_ID` = `song`.`SONG_ID` AND `song_tweet`.`DATE` BETWEEN '{$last_week_start}' AND '{$last_week_end}') * 0.03 +
  (SELECT COALESCE(SUM(`song_downloads`.`PRICE_USD`), 0) FROM `song_downloads` WHERE `song_downloads`.`SONG_ID` = `song`.`SONG_ID` AND `song_downloads`.`DATE` BETWEEN '{$last_week_start}' AND '{$last_week_end}') AS `score`
FROM `song`
WHERE `song`.`SONG_STATUS` = 1
ORDER BY `score` DESC
EOD;

$billboard_last = [];
$result_last = $con->query($query_last);
$i = 0;

while ($row = $result_last->fetch_object()) {
  $billboard_last[$row->SONG_ID] = [
    'index' => $i,
    'rank' => $i + 1,
    'score' => $row->score,
    'peak' => $row->peak,
    'wks' => $row->wks,
    'wks_last' => $row->wks_last,
    'uniq_id' => $row->RDON_ID,
    'username' => $row->USER_NAME,
    'title' => $row->SONG_NAME,
    'artist' => $row->ARTIST_NAME,
    'genre' => $row->SONG_GENRE,
    'token_id' => $row->TOKEN_ID,
    'hash' => $row->NFT
  ];
  $i++;
}

$this_week_start = gmdate('Y-m-d 00:00:00', strtotime('monday this week'));
$this_week_end = gmdate('Y-m-d 00:00:00', strtotime('monday next week'));
$week_of = gmdate('F d, Y', strtotime('monday this week'));
$query_this = <<<EOD
SELECT
  `song`.*,
  (SELECT COUNT(*) FROM `song_like` WHERE `song_like`.`SONG_ID` = `song`.`SONG_ID` AND `song_like`.`SONG_LIKE_STATUS` = 1 AND `song_like`.`DATE` BETWEEN '{$this_week_start}' AND '{$this_week_end}') * 0.03 -
  (SELECT COUNT(*) FROM `song_like` WHERE `song_like`.`SONG_ID` = `song`.`SONG_ID` AND `song_like`.`SONG_LIKE_STATUS` = 0 AND `song_like`.`DATE` BETWEEN '{$this_week_start}' AND '{$this_week_end}') * 0.03 +
  (SELECT COUNT(*) FROM `song_love` WHERE `song_love`.`SONG_ID` = `song`.`SONG_ID` AND `song_love`.`DATE` BETWEEN '{$this_week_start}' AND '{$this_week_end}') * 0.03 +
  (SELECT COUNT(*) FROM `song_tweet` WHERE `song_tweet`.`SONG_ID` = `song`.`SONG_ID` AND `song_tweet`.`DATE` BETWEEN '{$this_week_start}' AND '{$this_week_end}') * 0.03 +
  (SELECT COALESCE(SUM(`song_downloads`.`PRICE_USD`), 0) FROM `song_downloads` WHERE `song_downloads`.`SONG_ID` = `song`.`SONG_ID` AND `song_downloads`.`DATE` BETWEEN '{$this_week_start}' AND '{$this_week_end}') AS `score`
FROM `song`
WHERE `song`.`SONG_STATUS` = 1
ORDER BY `score` DESC
EOD;

$billboard_this = [];
$result_this = $con->query($query_this);
$i = 0;

while ($row = $result_this->fetch_object()) {
  $billboard_this[$row->SONG_ID] = [
    'index' => $i,
    'rank' => $i + 1,
    'score' => $row->score,
    'peak' => $row->peak,
    'wks' => $row->wks,
    'wks_last' => $row->wks_last,
    'uniq_id' => $row->RDON_ID,
    'username' => $row->USER_NAME,
    'title' => $row->SONG_NAME,
    'artist' => $row->ARTIST_NAME,
    'genre' => $row->SONG_GENRE,
    'token_id' => $row->TOKEN_ID,
    'hash' => $row->NFT
  ];
  $i++;
}

$billboard = array_slice($billboard_this, 0, 30, true);
$billboard_week = [];
$i = count($billboard);

foreach ($billboard_last as $song_id => $song) {
  if (!isset($billboard[$song_id]) && $i < 30) {
    $song_rank = $song;
    $song['index'] = $i;
    $song['rank'] = $i + 1;
    $i++;

    $billboard_week[$song_id] = $song_rank;
    $billboard[$song_id] = $song_rank;
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- META SECTION -->
  <title>Crypto Billboard</title>
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

  <style>
  .asset-container:hover {
    background-color: #eaecee;
    cursor: pointer;
  }

  .active {
    display: block !important;
  }

  .minimize, .maximize {
    display: none;
  }
  </style>
</head>

<body>
  <div class="error-container">
    <div><img src="img/logo-dark.png" style="width:75px; height:25px;"></div>
    <div align="center" style="font-family:Arial; font-size:42px;"><strong>THE TOP 30</strong></div>
    <div align="center" style="font-family:Arial; font-size:18px; margin-top:-10px; padding-left:56px; color:#7d7d7d;">CRYPTO BILLBOARD</div>
    <div class="error-subtext">
      <h6>THIS WEEK IN THE CHART</h6>
      <!-- <div style="background-image:linear-gradient(0deg, rgba(51,51,51,1) 20%, rgba(0,0,0,0.4181022750897234) 60%), url('https://radion.fm/img/no-image.jpg'); height:100px; width:100px; border-radius:30px 0px 30px 0px;">
        <span style="color:#fff; margin-left:10px; font-size:11px;"><br><br><br><br>&nbsp;&nbsp;<strong>ARTIST NAME</strong></span></div> -->
      <?php
      $i = 0;
      foreach ($billboard_week as $song_id => $song) {
        if ($i < 5) $i++;
        else break;

        $artwork = get_art_work($song['uniq_id'], 1);
      ?>
      <img src="<?= $artwork ?>" style="height:100px; width:100px; border-radius:0 30px 0 30px;">
      <?php } ?>
    </div>
    <div align="right" style="color:#5D6D7E; margin-top:30px;">WEEK OF <?= $week_of ?></div>
  </div>

  <?php
  $limit = 30;
  $i = 0;
  $prev_score = 0;

  foreach ($billboard as $song_id => $song) {
    if ($song['index'] === 1) {
      $prev_score = $song['score'];
      break;
    }
  }

  foreach ($billboard as $song_id => $song) {
    if ($i < $limit) $i++;
    else break;

    $score_this = isset($billboard[$song_id]) ? $billboard[$song_id]['score'] : 0;
    $rank = $song['rank'];
    $peak = $song['peak'];
    $wks = $song['wks'];
    $wks_last = $song['wks_last'];
    $rdon_id = $song['uniq_id'];
    $artwork = get_art_work($rdon_id, 1);
    $hash = md5("asset-preview-$rdon_id");
    $arrow = '';
    if ($score_this > $prev_score) {
      $arrow = '<i class="fas fa-caret-up" style="color:#27AE60;"></i>';
    } else if ($score_this === $prev_score) {
      $arrow = '<i class="fas fa-caret-right" style="color:#999;"></i>';
    } else {
      $arrow = '<i class="fas fa-caret-down" style="color:#C0392B;"></i>';
    }
    $prev_score = $score_this;

    if ($peak > $rank || $peak === 0) {
      $peak = $rank;
      $con->query("UPDATE `song` SET `peak`=$rank WHERE `SONG_ID`=$song_id");
    }

    if ($wks_last !== $this_week_start) {
      $wks_last = $this_week_start;
      if ($billboard[$song_id]['index'] < 30) $wks++;
      else $wks = 0;

      $con->query("UPDATE `song` SET `wks`=$wks, `wks_last`='$wks_last' WHERE `SONG_ID`=$song_id");
    }

    $username = $song['username'];
    $user_res = $con->query("SELECT `id` FROM `sitelok` WHERE `Username`='$username'");
    $user = $user_res->fetch_object();
    $userid = $user->id;
    $userhash = md5("$userid$SiteKey");

  ?>
  <div style="padding-right:50px; padding-left:50px;">
    <div class="panel panel-default asset-container" style="margin-bottom:2px; border-radius:0 30px 0 0;">
      <div class="minimize active">
        <div class="panel-body" style="width:calc(100% - 100px);">
          <div align="right" style="padding-right:145px; color:#777777; font-size:18px; font-family:Arial; margin-bottom:-33px;"></div>
          <div style="color:#34495E; padding:30px 0px 0px 20px; font-size:50px; font-family:Arial;"><span style="font-size:20px; padding-bottom:20px;"><?= $arrow ?></span> <?= $rank ?></div>
          <div style="color:#777777; padding:30px 140px 0px 80px; font-size:18px; font-family:Arial; margin-top:-90px;">
            <div style="padding-left:40px;"><span style="padding-right:30px; color:#34495E;"><?= $song['title'] ?></span> </div>
            <div style="padding-left:40px; color:#85929E;"><small><?= $song['artist'] ?></small></div>
            <div style="margin-top:-45px;" align="right">
              <table style="width:50%">
                <tr>
                  <th style="width:25%; font-size:14px; font-family:Arial; color:#F7DC6F;"><small>AWARD</small></th>
                  <th style="width:25%; font-size:14px; font-family:Arial; color:#F7DC6F;"><small>LAST WEEK</small></th>
                  <th style="width:25%;font-size:14px; font-family:Arial; color:#F7DC6F;"><small>PEAK</small></th>
                  <th style="width:25%; font-size:14px; font-family:Arial; color:#F7DC6F;"><small>WKS ON CHART</small></th>
                </tr>
                <tr>
                  <td><span style="padding-left:14px;"></span></td>
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

      <div class="maximize">
        <div class="panel-body" style="width:calc(100% - 300px);">
          <div align="right" style="padding-right:145px; color:#777777; font-size:18px; font-family:Arial; margin-bottom:-33px;"></div>
          <div style="color:#F39C12; padding:30px 0px 0px 20px; font-size:50px; font-family:Arial;"><span style="font-size:20px; padding-bottom:20px;"><?= $arrow ?></span> <?= $rank ?></div>
          <div style="color:#777777; padding:30px 140px 0px 80px; font-size:18px; font-family:Arial; margin-top:-90px;">
            <div style="padding-left:40px;"><span style="padding-right:30px; color:#34495E;"><strong><?= $song['title'] ?></strong></span></div>
            <div style="padding-left:40px;"><small style="color:#85929E;"><?= $song['artist'] ?></small></div>
            <div align="right"><h1 style="color:#273746;"><strong>NFT</strong></h1></div>
            <div align="right" style="margin-top:-20px; font-size:9px;"><?= $song['token_id'] != -1 ? 'AVAILABLE' : 'NO AVAILABLE' ?></div>
            <div style="margin:-50px 0 0 0; font-size:15px;">
              <div><small><strong>ASSET</strong>: <?= $song['uniq_id'] ?></small></div>
              <div><small><strong>UPLOADED BY</strong>: <a target="blank" href="/user-profile.php?uid=<?= $userid ?>&hash=<?= $userhash ?>"><?= $username ?></a></small></div>
              <div><small><strong>GENRE</strong>: <?= $song['genre'] ?></small></div>
            </div>
            <div class="row" style="margin:30px 200px 0 -75px;">
              <div class="col-sm-4" align="center">
                <span style="font-size:18px;"><?= $billboard_last[$song_id]['index'] + 1 ?></span><br>
                <span style="font-size:10px; color:#F39C12;">LAST WEEK</span>
              </div>
              <div class="col-sm-4" align="center">
                <span style="font-size:18px;"><?= $peak ?></span><br>
                <span style="font-size:10px; color:#F39C12;">PEAK</span>
              </div>
              <div class="col-sm-4" align="center">
                <span style="font-size:18px;"><?= $wks ?></span><br>
                <span style="font-size:10px; color:#F39C12;">WKS ON CHART</span>
              </div>
            </div>
          </div>
        </div>

        <span align="right" style="width:150px;">
          <button type="button" class="btn btn-warning btn-lg btn-rounded blob white;" style="z-index:1;position:absolute;margin:241.5px 241.5px;" data-id="<?= $rdon_id ?>" data-hash="<?= $hash ?>">
            <i class="fas fa-play"></i>
          </button>
          <img src="<?= $artwork ?>" style="height:300px; width:300px; border-radius:0 30px 0 30px;">
        </span>
      </div>
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

    $('.maximize,.minimize').click(function () {
      const parent = $(this).parent()
      const element = $(this).hasClass('minimize') ? 'minimize' : 'maximize'

      if (element === 'minimize') {
        $('.maximize.active').removeClass('active').parent().find('.minimize').addClass('active')
        $(parent).find('.minimize').removeClass('active')
        $(parent).find('.maximize').addClass('active')
      } else {
        $(parent).find('.minimize').addClass('active')
        $(parent).find('.maximize').removeClass('active')
      }
    })
  })
  </script>
</body>
</html>
