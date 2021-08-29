<?php

$groupswithaccess = 'ALL,PUBLIC';
require_once 'slpw/sitelokpw.php';
require_once 'php/music_info_get.php';

ini_set('display_errors', '1');
error_reporting(E_ALL);

function searchByID ($id, $array) {
  foreach ($array as $key => $value) {
    if ($value['song_id'] == $id) return $key;
  }
  return null;
}

$this_week_start = gmdate('Y-m-d H:i:s', strtotime('monday this week') - 18000);
$this_week_end = gmdate('Y-m-d H:i:s', strtotime('monday next week') - 18000);
$week_of = gmdate('F d, Y', strtotime('monday this week') - 18000);
$query_this = <<<EOD
SELECT
  `song`.*,
  (SELECT COUNT(*) FROM `song_like` WHERE `song_like`.`SONG_ID` = `song`.`SONG_ID` AND `song_like`.`SONG_LIKE_STATUS` = 1 AND `song_like`.`DATE` BETWEEN '{$this_week_start}' AND '{$this_week_end}') * 0.01 +
  (SELECT COUNT(*) FROM `song_love` WHERE `song_love`.`SONG_ID` = `song`.`SONG_ID` AND `song_love`.`DATE` BETWEEN '{$this_week_start}' AND '{$this_week_end}') * 0.01 +
  (SELECT COUNT(*) FROM `song_tweet` WHERE `song_tweet`.`SONG_ID` = `song`.`SONG_ID` AND `song_tweet`.`DATE` BETWEEN '{$this_week_start}' AND '{$this_week_end}') * 0.01 +
  (SELECT COALESCE(SUM(`song_downloads_nft`.`PRICE_USD`), 0) FROM `song_downloads_nft` WHERE `song_downloads_nft`.`SONG_ID` =  `song`.`SONG_ID` AND `song_downloads_nft`.`DATE` BETWEEN '{$this_week_start}' AND '{$this_week_end}') +
  (SELECT COALESCE(SUM(`song_downloads`.`PRICE_USD`), 0) FROM `song_downloads` WHERE `song_downloads`.`SONG_ID` = `song`.`SONG_ID` AND `song_downloads`.`DATE` BETWEEN '{$this_week_start}' AND '{$this_week_end}') AS `score`
FROM `song`
WHERE `song`.`SONG_STATUS` = 1
ORDER BY `score` DESC
EOD;

$billboard_this = [];
$result_this = $con->query($query_this);
$i = 0;
while ($row = $result_this->fetch_object()) {
  if ($i === 30) break;
  if ($row->score > 0) {
    $billboard_this[$i] = [
      'rank' => $i + 1,
      'score' => intval($row->score),
      'peak' => intval($row->peak),
      'wks' => intval($row->wks),
      'wks_last' => $row->wks_last,
      'song_id' => intval($row->SONG_ID),
      'uniq_id' => $row->RDON_ID,
      'username' => $row->USER_NAME,
      'title' => $row->SONG_NAME,
      'artist' => $row->ARTIST_NAME,
      'genre' => $row->SONG_GENRE,
      'token_id' => intval($row->TOKEN_ID),
      'hash' => $row->NFT
    ];
    $i++;
  }
}

$query_week = "SELECT `BILLBOARD` FROM `song_billboard` WHERE `DATE`='$this_week_start'";
$result_week = $con->query($query_week);
$billboard_week = [];
if ($result_week->num_rows > 0) {
  $billboard_res = $result_week->fetch_object();
  $billboard_week = json_decode($billboard_res->BILLBOARD, true);
}

usort($billboard_week, function ($a, $b) {
  return $a['rank'] < $b['rank'] ? -1 : 1;
});

$query_last = "SELECT `BILLBOARD` FROM `song_billboard_changes` ORDER BY `BILLBOARD_ID` DESC LIMIT 1";
$result_last = $con->query($query_last);
$billboard_last = [];
$billboard_last_text = '';
if ($result_last->num_rows > 0) {
  $billboard_res = $result_last->fetch_object();
  $billboard_last = json_decode($billboard_res->BILLBOARD, true);
  $billboard_last_text = $billboard_res->BILLBOARD;
} else {
  $billboard_last = $billboard_week;
}

usort($billboard_last, function ($a, $b) {
  return $a['rank'] < $b['rank'] ? -1 : 1;
});

// Merging this week's and last saved tops
$billboard = array_slice($billboard_this, 0, 30);
$i = count($billboard);
foreach ($billboard_last as $index => $song) {
  if ($i >= 30) break;
  if (searchById($song['song_id'], $billboard) === null) {
    $song['rank'] = $i + 1;
    $song['score'] = 0;
    $billboard[$i] = $song;
    $i++;
  }
}

usort($billboard, function ($a, $b) {
  return $a['rank'] < $b['rank'] ? -1 : 1;
});

$ids = '';
$count = 0;
foreach ($billboard as $index => $song) {
  $song_id = $song['song_id'];
  $song_check_res = $con->query("SELECT * FROM `song` WHERE `SONG_ID`=$song_id LIMIT 1");
  if ($song_check_res->num_rows > 0) {
    $song_check = $song_check_res->fetch_object();
    if (empty($song_check->USER_NAME)) {
      unset($billboard[$index]);
    } else {
      $billboard[$index]['rank'] = $count + 1;
      $ids = empty($ids) ? "`SONG_ID`<>$song_id" : "$ids AND `SONG_ID`<>$song_id";
      $count++;
    }
  } else $billboard[$index] = null;
}

$billboard = array_values($billboard);
if ($count < 30) {
  $left = 30 - $count;
  $query = <<<EOD
SELECT
  `song`.*,
  (SELECT COUNT(*) FROM `song_like` WHERE `song_like`.`SONG_ID` = `song`.`SONG_ID` AND `song_like`.`SONG_LIKE_STATUS` = 1) * 0.01 +
  (SELECT COUNT(*) FROM `song_love` WHERE `song_love`.`SONG_ID` = `song`.`SONG_ID`) * 0.01 +
  (SELECT COUNT(*) FROM `song_tweet` WHERE `song_tweet`.`SONG_ID` = `song`.`SONG_ID`) * 0.01 +
  (SELECT COALESCE(SUM(`song_downloads_nft`.`PRICE_USD`), 0) FROM `song_downloads_nft` WHERE `song_downloads_nft`.`SONG_ID` =  `song`.`SONG_ID`) +
  (SELECT COALESCE(SUM(`song_downloads`.`PRICE_USD`), 0) FROM `song_downloads` WHERE `song_downloads`.`SONG_ID` = `song`.`SONG_ID`) AS `score`
FROM `song`
WHERE `song`.`SONG_STATUS` = 1 AND {$ids}
ORDER BY `score` DESC
LIMIT {$left}
EOD;

  $i = $count;
  $result = $con->query($query);
  while ($row = $result->fetch_object()) {
    $billboard[] = [
      'rank' => $i + 1,
      'score' => intval($row->score),
      'peak' => intval($row->peak),
      'wks' => intval($row->wks),
      'wks_last' => $row->wks_last,
      'song_id' => intval($row->SONG_ID),
      'uniq_id' => $row->RDON_ID,
      'username' => $row->USER_NAME,
      'title' => $row->SONG_NAME,
      'artist' => $row->ARTIST_NAME,
      'genre' => $row->SONG_GENRE,
      'token_id' => intval($row->TOKEN_ID),
      'hash' => $row->NFT
    ];
    $i++;
  }
}

// Check and add arrows
foreach ($billboard as $index => $song) {
  $song_id = $song['song_id'];
  $index_last = searchById($song_id, $billboard_last);
  $index_this = searchById($song_id, $billboard_this);
  $prev_arrow = isset($billboard[$index - 1]['arrow']) ? $billboard[$index - 1]['arrow'] : 0;
  $next_arrow = isset($billboard[$index + 1]['arrow']) ? $billboard[$index + 1]['arrow'] : 0;
  $score_this = $index_this !== null ? $billboard_this[$index_this]['score'] : 0;

  if ($index_last > $index || $index_last === null) {
    $billboard[$index]['arrow'] = 1;
  } else if ($prev_arrow == -1) {
    $billboard[$index]['arrow'] = 0;
  } else if ($index_last < $index && $prev_arrow == 1) {
    $billboard[$index]['arrow'] = -1;
  } else if ($index_last == $index) {
    $billboard[$index]['arrow'] = isset($billboard_last[$index]['arrow']) ? $billboard_last[$index]['arrow'] : 0;
  } else if ($prev_arrow == 0 && $next_arrow == 0) {
    $billboard[$index]['arrow'] = 0;
  } else {
    $billboard[$index]['arrow'] = 0;
  }
}

// Save billboard
$encoded = json_encode($billboard);
if (strcmp($billboard_last_text, $encoded) !== 0) {
  $billboard_record = $con->real_escape_string($encoded);
  $con->query("INSERT INTO `song_billboard_changes` (`BILLBOARD`) VALUES ('$billboard_record')");
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
    background-color: #FCF3CF;
    cursor: pointer;
  }

  .minimize, .maximize {
    display: none;
  }

  .active {
    display: block;
  }

  .maximize:not(.active) * {
    visibility: hidden;
    opacity: 0;
    height: 0;
  }

  .maximize.active {
    height: 300px;
    -webkit-animation: maximize 1s ease;
  }

  .maximize.active * {
    visibility: visible;
    opacity: 1;
    height: auto;
    -webkit-animation: maximize-contents 2s ease;
  }

  @-webkit-keyframes maximize {
    0% { height: 0; }
    100% { height: 300px; }
  }

  @-webkit-keyframes maximize-contents {
    0% {
      visibility: hidden;
      opacity: 0;
      height: 0;
    }

    100% {
      visibility: visible;
      opacity: 1;
      height: auto;
    }
  }
  </style>
</head>

<body>
  <div class="error-container">
    <div><img src="img/logo-dark.png" style="width:75px; height:25px;"></div>
    <div align="center" style="font-family:Arial; font-size:42px;"><strong>THE TOP 30</strong></div>
    <div align="center" style="font-family:Arial; font-size:18px; margin-top:-10px; padding-left:56px; color:#7d7d7d;">BILLBOARD</div>
    <div class="error-subtext" id="week-chart">
      <h6>THIS WEEK IN THE CHART</h6>
      <!-- <div style="background-image:linear-gradient(0deg, rgba(51,51,51,1) 20%, rgba(0,0,0,0.4181022750897234) 60%), url('https://radion.fm/img/no-image.jpg'); height:100px; width:100px; border-radius:30px 0px 30px 0px;">
        <span style="color:#fff; margin-left:10px; font-size:11px;"><br><br><br><br>&nbsp;&nbsp;<strong>ARTIST NAME</strong></span></div> -->
    </div>
    <div align="right" style="color:#5D6D7E; margin-top:30px;">WEEK OF <?= $week_of ?></div>
  </div>

  <script>const assetsWeek = []</script>
  <?php
  $prev_score = 0;
  foreach ($billboard as $index => $song) {
    if ($index === 1) {
      $prev_score = $song['score'];
      break;
    }
  }

  foreach ($billboard as $index => $song) {
    $rank = $song['rank'];
    $song_id = $song['song_id'];
    $peak = $song['peak'];
    $wks = $song['wks'];
    $wks_last = $song['wks_last'];
    $rdon_id = $song['uniq_id'];
    $country = substr($rdon_id, 0, 2);
    $arrow = $song['arrow'];
    $artwork = get_art_work($rdon_id, 1);
    $hash = md5("asset-preview-$rdon_id");
    if ($arrow == 1) {
      $arrow = '<i class="fas fa-caret-up" style="color:#27AE60;"></i>';
    } else if ($arrow == 0) {
      $arrow = '<i class="fas fa-caret-right" style="color:#999;"></i>';
    } else if ($arrow == -1) {
      $arrow = '<i class="fas fa-caret-down" style="color:#C0392B;"></i>';
    }
    $prev_score = $song['score'];
    $username = $song['username'];
    $user_res = $con->query("SELECT `id` FROM `sitelok` WHERE `Username`='$username'");
    $user = $user_res->fetch_object();
    $userid = $user->id;
    $userhash = md5("$userid$SiteKey");

    if ($peak == 0) $peak = '';

    if ($wks_last !== $this_week_start) {
      $wks_last = $this_week_start;
      $search_id = searchById($song_id, $billboard_week);
      if ($search_id !== null && $search_id < 30) $wks++;
      else $wks = 0;

      $song['wks'] = $wks;
      $song['wks_last'] = $wks_last;
      $billboard[$index] = $song;
      $con->query("UPDATE `song` SET `wks`=$wks, `wks_last`='$wks_last' WHERE `SONG_ID`=$song_id");
    }

    $last_index = searchById($song_id, $billboard_week);

  ?>
  <?= $last_index === null ? "<script>assetsWeek.push('$artwork')</script>" : '' ?>
  <div class="panel panel-default asset-container" style="margin: 0 50px 2px 50px; border-radius:0 30px 0 0; width:calc(100% - 100px);">
    <div class="minimize active">
      <div class="panel-body" style="width:calc(100% - 100px);">
        <div style="color:#34495E; padding:0 0 0 20px; font-size:50px; font-family:Arial;">
          <span style="font-size:20px;"><?= $arrow ?></span> <?= $rank ?>
        </div>
        <div style="color:#777777; padding:30px 140px 0px 120px; font-size:18px; font-family:Arial; margin-top:-90px;">
          <div><span style="padding-right:30px; color:#34495E;"><?= $song['title'] ?></span></div>
          <div style="color:#85929E;"><small><?= $song['artist'] ?></small></div>
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
                <td><span style="padding-left:30px; font-size:14px; font-family:Arial;"><?= $last_index !== null ? $last_index + 1 : '' ?></span></td>
                <td><span style="padding-left:10px; font-size:14px; font-family:Arial;"><?= $peak ?></span></td>
                <?php if ($last_index !== null) { ?>
                <td><span style="padding-left:40px; font-size:14px; font-family:Arial;"><?= $wks ?></span></td>
                <?php } else { ?>
                <td><span style="padding-left:30px; font-size:13px; font-family Arial; color:#229954;"><strong>NEW</strong></span></td>
                <?php } ?>
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
        <div style="color:#F39C12; padding:0 0 0 20px; font-size:50px; font-family:Arial;"><span style="font-size:20px; padding-bottom:20px;"><?= $arrow ?></span> <?= $rank ?></div>
        <div style="color:#777777; padding:30px 140px 0px 80px; font-size:18px; font-family:Arial; margin-top:-90px;">
          <div style="padding-left:40px;"><span style="padding-right:30px; color:#34495E;"><strong><?= $song['title'] ?></strong></span></div>
          <div style="padding-left:40px;"><small style="color:#85929E;"><?= $song['artist'] ?></small></div>
          <div align="right" style="padding-right:10px;"><h1 style="color:#273746;"><strong>NFT</strong></h1></div>

          <div align="right" style="margin-top:-20px; padding-right:10px; font-size:9px; color:#F39C12;"><?= $song['token_id'] != -1 ? 'AVAILABLE' : 'NO AVAILABLE' ?></div>
          <div align="right" style="width:27px; height:27px; margin-left:100%; margin-top:-38px;">
            <svg xmlns="http://www.w3.org/2000/svg" width="47" height="64" viewBox="0 0 47 64">
              <path style="fill:#FCF3CF;" d="M30.252 63.441c-4.55 0-7.864-1.089-9.946-3.267-2.08-2.177-3.121-4.525-3.121-7.041 0-.92.181-1.694.544-2.323a3.993 3.993
          0 0 1 1.489-1.489c.629-.363 1.403-.544 2.323-.544.92 0 1.693.181 2.323.544.629.363 1.125.86 1.488 1.489.363.629.544 1.403.544
          2.323 0 1.113-.266 2.02-.798 2.722-.533.702-1.162 1.161-1.888 1.38.63.87 1.622 1.487 2.977 1.85 1.355.388 2.71.581 4.065.581
          1.887 0 3.593-.508 5.118-1.524 1.524-1.017 2.65-2.517 3.376-4.501.726-1.984 1.089-4.235 1.089-6.752
          0-2.734-.4-5.07-1.198-7.005-.775-1.96-1.924-3.412-3.449-4.356a9.21 9.21 0 0 0-4.936-1.415c-1.162 0-2.613.484-4.356
          1.452l-3.194 1.597v-1.597L37.076 16.4H17.185v19.89c0 1.646.363 3.001 1.089 4.066s1.839 1.597 3.34 1.597c1.16 0 2.274-.387
          3.339-1.162a11.803 11.803 0 0 0 2.758-2.83c.097-.219.218-.376.363-.473a.723.723 0 0 1 .472-.181c.266 0 .58.133.944.4.339.386.508.834.508
          1.342a9.243 9.243 0 0 1-.182 1.017c-.822 1.839-1.96 3.242-3.412 4.21a8.457 8.457 0 0
          1-4.79 1.452c-4.308 0-7.285-.847-8.93-2.54-1.645-1.695-2.468-3.994-2.468-6.897V16.4H.052v-3.703h10.164v-8.42L7.893
          1.952V.066h6.751l2.54 1.306v11.325l26.28-.072 2.614 2.613-16.116 16.116a10.807 10.807 0 0 1 3.049-.726c1.742
          0 3.702.557 5.88 1.67 2.202 1.089 3.896 2.59 5.081 4.5 1.186 1.888 1.948 3.703 2.287 5.445.363 1.743.545 3.291.545
          4.646 0 3.098-.654 5.977-1.96 8.64-1.307 2.661-3.291 4.645-5.953 5.952-2.662 1.307-5.542 1.96-8.639 1.96z"></path>
            </svg>
          </div>
          <div style="margin:-40px 0 0 0; font-size:15px;">
            <div style="padding-left:40px;"><small><strong>ASSET</strong>: <?= $song['uniq_id'] ?></small></div>
            <div style="padding-left:40px;"><small><strong>UPLOADED BY</strong>: <a target="blank" href="/user-profile.php?uid=<?= $userid ?>&hash=<?= $userhash ?>"><?= $username ?></a></small></div>
            <div style="padding-left:40px;"><small><strong>GENRE</strong>: <?= $song['genre'] ?></small></div>
          </div>
          <div class="row" style="margin:30px 200px 0 -75px;">
            <div class="col-sm-4" align="center">
              <span style="font-size:18px;"><?= $last_index !== null ? $last_index + 1 : '' ?></span><br>
              <span style="font-size:10px; color:#F39C12;">LAST WEEK</span>
            </div>
            <div class="col-sm-4" align="center">
              <span style="font-size:18px;"><?= $peak ?></span><br>
              <span style="font-size:10px; color:#F39C12;">PEAK</span>
            </div>
            <div class="col-sm-4" align="center">
              <?php if ($last_index !== null) { ?>
              <span style="font-size:18px;"><?= $wks ?></span><br>
              <?php } else { ?>
              <span style="font-size:18px; color:#229954;"><strong>NEW</strong></span><br>
              <?php } ?>
              <span style="font-size:10px; color:#F39C12;">WKS ON CHART</span>
            </div>
            
          </div>
          <div align="right"><img src="/img/flags/<?= $country ?>.png" width="16" height="16"></div>
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
  <?php } ?>

  <div align="center" style="padding-bottom:50px;">
    <img src="img/logo-dark.png" style="width:75px; height:25px;">
  </div>

  <template id="week-artwork">
    <img src="">
  </template>

  <script>
  $(document).ready(function () {
    const tempArtwork = $('#week-artwork').prop('content')
    const audio = new Audio()
    let currentId = null

    for (let i = 0; i < assetsWeek.length && i < 5; i++) {
      const artwork = $(tempArtwork).clone(true, true)
      $(artwork).find('img').attr({
        src: assetsWeek[i],
        width: 100,
        height: 100
      }).css('border-radius', '0 30px 0 30px');
      $('#week-chart').append(artwork)
    }

    $('[data-hash]').click(function (event) {
      event.preventDefault()
      event.stopPropagation()

      const id = $(this).attr('data-id')
      const hash = $(this).attr('data-hash')
      const buttons = $('[data-hash="' + hash + '"]')
      const url = '/asset.php?id=' + id + '&hash=' + hash

      if (currentId !== id) {
        $('[data-hash]').html('<i class="fas fa-play"></i>')
        $(buttons).html('<i class="fas fa-pause"></i>')

        currentId = id
        audio.src = url
        audio.play()
      } else {
        if (audio.paused) {
          $(buttons).html('<i class="fas fa-pause"></i>')
          audio.play()
        } else {
          $(buttons).html('<i class="fas fa-play"></i>')
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
