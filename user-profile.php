<?php

date_default_timezone_set('UTC');
ini_set('display_errors', '1');
error_reporting(E_ALL);

$groupswithaccess = 'ALL,PUBLIC,RADIONER,RADION,FOUNDER';
$memberprofilepage = 1;

require_once 'slpw/sitelokpw.php';
require_once 'getID3/getid3/getid3.php';
require_once 'php/music_info_get.php';
require_once 'php/date.php';
require_once 'php/ranking.php';

$uid = !empty($_GET['uid']) ? $_GET['uid'] : null;
$hash = !empty($_GET['hash']) ? $_GET['hash'] : null;

if ($uid === null || $hash === null) {
  http_response_code(400);
  header('Content-Type: text/plain');
  die('Invalid UID and/or hash');
}

$page_no = !empty($_GET['page']) ? ((int) $_GET['page']) : 1;
$per_page = 5;

$profile_res = $con->query("SELECT * FROM `sitelok` WHERE `id`=$uid");
if ($profile_res->num_rows === 0) {
  http_response_code(400);
  header('Content-Type: text/plain');
  die('User does not exist');
}

if ($hash !== md5("$uid$SiteKey")) {
  http_response_code(400);
  header('Content-Type: text/plain');
  die('Hash is invalid');
}

$profile = $profile_res->fetch_object();
$profile_username = $profile->Username;
$followers = $profile->Custom20 !== '' ? explode(',', $profile->Custom20) : [];
$followers_count = count($followers);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- META SECTION -->
  <title>RADIONER</title>
  <meta charset="utf-8">
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
  <link rel="stylesheet" href="/css/bootstrap/font-awesome-animation.css">
  <link rel="stylesheet" href="/css/goodies.css">
  <!-- EOF CSS INCLUDE -->

  <script>var memberprofilepage = 1</script>
  <?php if (function_exists('startwhoisonline')) startwhoisonline('userid'); ?>
</head>

<body>
  <iframe name="download-iframe" style="display:none;"></iframe>

  <!-- PAGE CONTENT -->
  <!-- PAGE CONTENT WRAPPER -->
  <div class="page-content-wrap">
    <div class="row">
      <div class="col-md-12" style="background-image: linear-gradient(to bottom right, #1D2127, #4D5656); height:300px;">
        <div class="panel-body">
          <div style="margin-top:17px; font-size:12px; padding-right:10px;" align="right">
            <div style="color:#fff; font-family:Arial; padding-right:1%; margin-top:10px; margin-bottom:10px;" align="right">
              <strong>Tezos</strong>
              <span style="padding-left:15px; padding-right:15px;">|</span>
              <span style="padding-right:0px; color:#B3B6B7;">Market Cap:&nbsp;&nbsp;&nbsp;<i class="fas fa-dollar-sign"></i></span>
              <span style="color:#B3B6B7;" class="tezos-market-cap-usd"></span>
              <span style="padding-left:10px; padding-right:10px;">-</span>
              <span style="padding-right:0px; color:#B3B6B7;">24h Vol:&nbsp;&nbsp;&nbsp;<i class="fas fa-dollar-sign"></i></span>
              <span style="color:#B3B6B7;" class="tezos-volume-usd-24hr"></span>
              <span style="padding-left:15px; padding-right:15px;">-</span>
              <span>Price:&nbsp;&nbsp;&nbsp;<i class="fas fa-dollar-sign"></i></span>
              <span class="tezos-price-usd"></span>
              <span class="tezos-change-24hr-down" style="display:none;">
                <span class="fas fa-sort-down fa-xs" style="vertical-align:2px;"></span>
                <span class="tDown tezos-change-24hr" style="font-size:9px; vertical-align:2px;"></span>
              </span>
              <span class="tezos-change-24hr-up" style="display:none;">
                <span class="fas fa-sort-up fa-xs" style="vertical-align:-2px;"></span>
                <span class="tUp tezos-change-24hr" style="font-size:9px; vertical-align:2px;"></span>
              </span>
            </div>
          </div>

          <div class="col-md-3" align="center">
            <div class="text-center" id="user_image">
              <img src="<?= siteloklink($profile->Custom2, 0); ?>" class="img-thumbnail" style="border-radius:100px; height:133px; width:133px; object-fit:cover;">
              <h3 style="padding-top:10px; color:#F39C12;"><?= $profile->Username ?></h3>
              <p style="margin-top:-10px; color:#fff;"><?= $profile->Usergroups ?></p>
            </div>
          </div>

          <div class="col-md-6"></div>
          <div class="col-md-3">
            <div class="row">
              <div class="col-md-12" style="margin-bottom:10px;">
                <div align="center" style="padding:10px;">
                  <?php if ($profile->Username !== $slusername) { ?>
                  <button type="button" id="follow-button" class="btn btn-default btn-rounded" style="color:#777;"><?= in_array($slusername, $followers) ? 'Unfollow' : 'Follow' ?></button>
                  <?php } ?>
                  <button type="button" id="share-button" class="btn btn-default btn-rounded" style="color:#777;"><i class="fab fa-twitter"></i></button>
                  <button type="button" id="connect-wallet" class="btn btn-default btn-rounded" style="color:#777;"><i class="far fa-wallet"></i> CONNECT WALLET</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="col-md-6 col-sm-12">
          <div class="page-title" style="font-family:Arial; font-size:23px; padding:15px; color:#777777;">
            <b>ASSETS</b>
          </div>

<?php

$getID3 = new getID3();
$from = ($page_no - 1) * $per_page;
$to = $per_page;
$query = <<<EOD
SELECT
  `song`.`RDON_ID`,
  `song`.`SONG_ID`,
  `song`.`SONG_STATUS`,
  `song`.`SONG_NAME`,
  `song`.`SONG_SUBMIT_DATE`,
  `song`.`NFT`,
  (SELECT COUNT(*) FROM `song_like` WHERE `song_like`.`SONG_ID` = `song`.`SONG_ID` AND `song_like`.`SONG_LIKE_STATUS` = 1) -
  (SELECT COUNT(*) FROM `song_like` WHERE `song_like`.`SONG_ID` = `song`.`SONG_ID` AND `song_like`.`SONG_LIKE_STATUS` = 0) AS `likes`,
  (SELECT COUNT(*) FROM `song_love` WHERE `song_love`.`SONG_ID` = `song`.`SONG_ID`) AS `loves`,
  (SELECT COUNT(*) FROM `song_tweet` WHERE `song_tweet`.`SONG_ID` = `song`.`SONG_ID`) AS `shares`,
  (SELECT COUNT(*) FROM `song_play` WHERE `song_play`.`SONG_ID` = `song`.`SONG_ID`) AS `plays`
FROM `song`
WHERE `song`.`USER_NAME` = '{$profile_username}' AND `song`.`SONG_STATUS` <> 0
ORDER BY `song`.`SONG_ID` DESC
LIMIT $from,$to
EOD;

$result = $con->query($query);
if ($con->errno) die($con->error);

while ($song = $result->fetch_object()) {
  $rdon_id = $song->RDON_ID;
  $song_id = $song->SONG_ID;
  $img_src = get_art_work($rdon_id, $song->SONG_STATUS);
  $source = get_music_source($rdon_id, $song->SONG_STATUS);

  $likes = $song->likes;
  $hearts = $song->loves;
  $shares = $song->shares;
  $plays = $song->plays;
  $mp3info = $getID3->analyze($source);
  $duration = $mp3info['playtime_string'];

  // Get rank of the song
  $rank = get_rank($song_id);

  // Generate hash
  $hash = md5("asset-preview-$rdon_id");
  $b64_id = base64_encode($rdon_id);
  $href = "/$b64_id/$hash";
?>
          <div class="panel panel-default" style="margin-bottom:2px; border-radius:0 30px 0 0;">
            <div class="panel-body" style="margin-right:-135px;">
              <div align="right" style="padding-right:145px; color:#777777; font-size:18px; font-family:Arial; margin-bottom:-18px;">
                <?= $duration ?>
              </div>
              <div style="color:#777777; padding:10px 140px 0px 20px; font-size:18px; font-family:Arial; margin-top:-20px;">
                <span style="padding-right:20px;"><a href="<?= $href ?>" data-hash="<?= $hash ?>" class="text-warning"><i class="fas fa-play fa-lg"></i></a></span>
                <span><?= $song->SONG_NAME ?></span>

                <div class="progress progress-small" style="width:100%; margin-top:10px; margin-bottom:-5px;">
                  <div id="progress-<?= $rdon_id ?>" class="progress-bar progress-default" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                </div>

                <div style="padding-top:15px;" align="right">
                  <button type="button" class="btn btn-default btn-xs" id="like-<?= $rdon_id ?>"><i class="fas fa-thumbs-up"></i></button>
                  <button type="button" class="btn btn-default btn-xs" id="heart-<?= $rdon_id ?>"><i class="fas fa-heart"></i></button>
                  <button type="button" class="btn btn-default btn-xs" id="share-<?= $rdon_id ?>"><i class="fas fa-share"></i></button>
                  <button type="button" class="btn btn-primary btn-xs" id="buy-<?= $rdon_id ?>" disabled>CONNECT WALLET TO DOWNLOAD</button>
                </div>

                <div style="font-size:12px; margin-top:-30px;">
                  <span>Published:</span> <span style="color:#F39C12;"><?= $song->SONG_SUBMIT_DATE ?></span><br>
                  <span style="padding-right:10px;"><i class="fas fa-thumbs-up"></i> <span id="likes-<?= $rdon_id ?>"><?= $likes ?></span></span>
                  <span style="padding-right:10px;"><i class="fas fa-heart"></i> <span id="hearts-<?= $rdon_id ?>"><?= $hearts ?></span></span>
                  <span style="padding-right:10px;"><i class="fas fa-headphones"></i> <?= $plays ?></span>
                  <span style="padding-right:10px;"><i class="fas fa-share"></i> <span id="shares-<?= $rdon_id ?>"><?= $shares ?></span></span>
                  <span>CHART:</span> <span style="padding-right:10px;">#<?= $rank ?></span>
                  <?php if ($song->NFT) { ?><span><strong>NFT</strong> <i class="far fa-check-circle" style="color:#27AE60;"></i></span><?php } ?>
                </div>
              </div>

            </div>
            <span align="right"><img src="<?= $img_src ?>" style="height:135px; width:135px; border-radius:0 30px 0 30px;"></span>
          </div>
<?php } ?>
<div style="padding:100px;"></div>
<div class="panel-header" align="center">
<ul class="pagination pagination-sm">
<?php

$count_res = $con->query("SELECT COUNT(*) AS `count` FROM `song` WHERE `USER_NAME`='$profile_username' AND `SONG_STATUS`=1");
$count = $count_res->fetch_object()->count;
$pages = 1;

$query_string = '';

foreach ($_GET as $name => $value) {
  if ($name === 'page') continue;
  if ($query_string === '') {
    $query_string = "?$name=$value";
  } else {
    $query_string = "$query_string&$name=$value";
  }
}

function get_page_link ($page) {
  global $query_string;
  return $query_string === '' ? "?page=$page" : "$query_string&page=$page";
}

?>
<?php if ($page_no > 1) { ?>
              <li><a href="<?= get_page_link($page_no - 1) ?>">&laquo;</a></li>
<?php } else { ?>
              <li class="disabled"><a href="javascript:void(0);">&laquo;</a></li>
<?php } ?>

<?php

while ($count > 0) {
  if ($page_no === $pages) {
?>
              <li class="active"><a href="<?= get_page_link($pages) ?>"><?= $pages ?></a></li>
<?php } else { ?>
              <li><a href="<?= get_page_link($pages) ?>"><?= $pages ?></a></li>
<?php
  }

  $pages++;
  $count -= $per_page;
}

?>

<?php if ($page_no < $pages - 1) { ?>
              <li><a href="<?= get_page_link($page_no + 1) ?>">&raquo;</a></li>
<?php } else { ?>
              <li class="disabled"><a href="javascript:void(0);">&raquo;</a></li>
<?php } ?>
            </ul>
          </div>

        </div>

        <div class="col-md-3 col-sm-12">
          <div class="page-title" style="font-family:Arial; font-size:23px; padding:15px; color:#777777;">
            <b>ABOUT ME</b>
          </div>

          <div class="panel panel-default">
            <div class="panel-body">
              <h3></h3>
              <div class="text-muted" align="justify" style="padding:10px;"><?= $profile->Custom7 ?></div>
              <hr>
              <div class="text-muted">
                <span style="padding-right:4px;">My Website</span> <span style="padding:10px;">|</span><a href="<?= $profile->Custom8 ?>" target="_blank" class="text-warning" style="word-break:break-all;"> <?= $profile->Custom8 ?></a><br>
                <span style="padding-right:10px;">I am Social </span><span style="padding:10px;">|</span>
<?php

$socials = array(
  'twitter' => !empty($profile->Custom12) ? $profile->Custom12 : null,
  'youtube' => !empty($profile->Custom11) ? $profile->Custom11 : null,
  'facebook' => !empty($profile->Custom13) ? $profile->Custom13 : null,
  'soundcloud' => !empty($profile->Custom15) ? $profile->Custom15 : null,
  'spotify' => !empty($profile->Custom16) ? $profile->Custom16 : null,
  'itunes' => !empty($profile->Custom14) ? $profile->Custom14 : null
);

$first = true;
foreach ($socials as $social_name => $social_url) {
  if ($social_url === null) continue;
  if ($social_name === 'twitter' && !filter_var($social_url, FILTER_VALIDATE_URL)) {
    $username = $social_url[0] === '@' ? substr($social_url, 1) : $social_url;
    $social_url = 'https://twitter.com/' . $username;
  }

  if (!$first) { ?>
    <span> - </span>
  <?php } else $first = false; ?>
  <a href="<?= $social_url ?>" target="_blank" rel="nofollow" style="color: #F39C12;"><i class="fab fa-<?= $social_name ?> fa-lg"></i></a>
<?php } ?>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-3 col-sm-12">
          <div class="page-title" style="font-family:Arial; font-size:23px; padding:15px; color:#777777;">
            <b>FOLLOWERS</b>
          </div>

          <!-- CONTACT LIST WIDGET -->
          <div class="panel panel-default">
		  <div align="right" style="padding:10px;"><span class="text-muted"><i class="fad fa-user-friends"></i> Followers: <?= $followers_count ?></span></div>
            <div class="panel-body list-group list-group-contacts">
<?php

for ($i = $followers_count - 1; $i > -1 && $i >= $followers_count - 5; $i--) {
  $follower = $followers[$i];
  $follower_res = $con->query("SELECT * FROM `sitelok` WHERE `Username`='$follower'");
  if ($follower_res->num_rows > 0) {
    $follower = $follower_res->fetch_object();
    $follower_id = $follower->id;
    $follower_username = $follower->Username;
    $useridhash = md5("$follower_id$SiteKey");

    $avatar = $follower->Custom2 !== '' ? $follower->Custom2 : 'no-image.jpg';
    $expiry = 0;
    $param1 = 'NOLOG';
    $timenow = time();
    $hash = md5("$SiteKey$avatar$expiry$slusername$param1$timenow");
    $avatar_download = base64_encode("$avatar,0,$slusername,$param1,,0,$timenow,$hash");
    $avatar_link = "/?sldownload=$avatar_download/$avatar";
?>
<a href="/user-profile.php?uid=<?= $follower_id ?>&hash=<?= $useridhash ?>" class="list-group-item">

  <img src="<?= $avatar_link ?>" class="pull-left" alt="<?= $follower_username ?>">
  <span class="contacts-title"><?= $follower_username ?></span>
  <p><?= $follower->Usergroups ?></p>
</a>
<?php
  }
}

?>
            </div>
          </div>
          <!-- END CONTACT LIST WIDGET -->
        </div>
      </div>
    </div>

    <div style="padding-top:30px; padding-bottom:10px;" align="center">
      <p style="color:#85929E; margin-bottom:-3px;">&copy; 2018 - 2021 RADION V1.1 </p>
      <p style="color:#85929E;">Made with <i class="fas fa-heart"></i> in Delaware, U.S.</p>
    </div>
  </div>
  <!-- END PAGE CONTENT WRAPPER -->

  <!-- MESSAGE BOX-->
  <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
    <div class="mb-container">
      <div class="mb-middle">
        <div class="mb-title"><span class="fas fa-sign-out-alt"></span> Log <strong>Out</strong> ?</div>
        <div class="mb-content">
          <p>Are you sure you want to log out?</p>
          <p>Press No if you want to continue work. Press Yes to logout current user.</p>
        </div>
        <div class="mb-footer">
          <div class="pull-right">
            <a href="/slpw/sitelokpw.php?sitelokaction=logout" class="btn btn-success btn-lg">Yes</a>
            <button class="btn btn-default btn-lg mb-control-close">No</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- END MESSAGE BOX-->

  <!-- MESSAGE BOX-->
  <div class="message-box animated fadeIn" data-sound="alert" id="mb-dashboard">
    <div class="mb-container">
      <div class="mb-middle">
        <div class="mb-title"><span class="fas fa-sign-in-alt"></span> Let's Rock!</div>
        <div class="mb-content">
          <p>
            <strong>Important Note!</strong>
            <br>You will enter into RADION Dashboard. Please keep in mind that our official Beta version is not released yet, in fact; still under development! However, we put this limited version together in order to help you understand better what we explained in our white paper. This version is also intended to structure our concept and present it in our incoming membership sale, for potential investors.
          </p><br>
          <p>Press No if you want to stay on this page. Press Yes to Go.</p>
        </div>
        <div class="mb-footer">
          <div class="pull-right">
            <a href="submission.php" class="btn btn-success btn-lg">Yes</a>
            <button class="btn btn-default btn-lg mb-control-close">No</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- END MESSAGE BOX-->

  <template id="temp-buy-noty">
    <div class="noty-container">
      <div align="justify" style="padding:15px;">
        <div><i class="fad fa-cart-arrow-down fa-2x"></i> &nbsp;&nbsp;<strong>DOWNLOAD ASSET</strong></div>
        <div style="padding-left:60%; margin-top:-14px; font-size:10px; color:#F39C12;">
          <i class="fas fa-signal-stream fa-lg"></i>
          <strong data-temp="station-name">MAIN STATION</strong>
        </div>
        <div style="margin-top:10px; color:#999999; padding-bottom:1px;">
          <strong>Artist</strong>:&nbsp;&nbsp;&nbsp;<span style="color:#F2F4F4;" data-temp="artist"></span>
        </div>
        <div style="color:#999999; padding-bottom:2px;">
          <strong>Song</strong>:&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:#F2F4F4;" data-temp="title"></span>
        </div>
        <div style="color:#999999; padding-bottom:2px;">
          <strong>RDON:</strong>&nbsp;&nbsp;<span style="color:#F2F4F4;" data-temp="id"></span>
        </div>
        <div style="padding-left:50%; position:absolute; margin-top:-15px; font-size:10px;">
          <strong>License</strong>:
          <span style="color:#999999;">
            <i class="fab fa-creative-commons fa-lg" style="color:#ccc;"></i>
            <i class="fab fa-creative-commons-by fa-lg" style="color:#ccc;"></i>
            <i class="fab fa-creative-commons-nc fa-lg" style="color:#ccc;"></i>
            <i class="fab fa-creative-commons-nd fa-lg" style="color:#ccc;"></i>
          </span>
        </div>
        <div style="color:#999999; font-size:0px;">
          ID #:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:#fff; font-size:px;" data-temp="id"></span>
        </div>
      </div>

      <div style="padding-left:10px; margin-bottom:0px;">
        <strong>TOTAL:&nbsp;&nbsp;</strong>
        <span style="color:#F39C12;" class="tezos-price" data-temp="price"></span>&nbsp;&nbsp;=&nbsp;&nbsp; $1.00 USD
        <div style="font-size:10px; position: absolute;left: 20px; bottom: -25px; z-index: 1; color:#808080;">Powered by Tezos Blockchain</div>
      </div>
    </div>
  </template>

  <!-- START PRELOADS -->
  <audio id="audio-alert" src="audio/alert.mp3" preload="auto"></audio>
  <audio id="audio-fail" src="audio/fail.mp3" preload="auto"></audio>
  <!-- END PRELOADS -->

  <!-- START PLUGINS -->
  <script src="/js/plugins/jquery/jquery.min.js"></script>
  <script src="/js/plugins/jquery/jquery-ui.min.js"></script>
  <script src="/js/plugins/bootstrap/bootstrap.min.js"></script>
  <script src="/js/all.js"></script>
  <script src="/js/tezos.js"></script>
  <script src="https://unpkg.com/@airgap/beacon-sdk@2.3.1/dist/walletbeacon.min.js"></script>
  <script>window.beaconSdk = beacon</script>
  <script src="https://unpkg.com/@taquito/taquito@10.1.0/dist/taquito.min.js"></script>
  <script src="https://unpkg.com/@taquito/beacon-wallet@10.1.0/dist/taquito-beacon-wallet.umd.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.12/dist/sweetalert2.all.min.js"></script>
  <!-- END PLUGINS -->

  <!-- THIS PAGE PLUGINS -->
  <script src="/js/plugins/moment.min.js"></script>
  <script src="/js/plugins/icheck/icheck.min.js"></script>
  <script src="/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
  <script src="/js/plugins/owl/owl.carousel.min.js"></script>
  <script src="/js/plugins/noty/jquery.noty.js"></script>
  <script src="/js/plugins/noty/layouts/topRight.js"></script>
  <script src="/js/plugins/noty/themes/default.js"></script>
  <script src="/js/player.js"></script>
  <!-- END PAGE PLUGINS -->

  <!-- START TEMPLATE -->
  <script type="text/javascript" src="/js/plugins.js"></script>
  <script type="text/javascript" src="/js/actions.js"></script>
  <!-- END TEMPLATE -->

  <script>
  const profileUsername = '<?= $profile_username ?>'
  const { TezosToolkit } = taquito
  const { BeaconWallet } = taquitoBeaconWallet

  const rpc = 'https://mainnet.smartpy.io'
  const tezos = new TezosToolkit(rpc)
  const wallet = new BeaconWallet({
    name: 'RADION FM',
    iconUrl: 'https://www.radion.fm/favicon/apple-icon-60x60.png',
    appUrl: 'https://www.radion.fm'
  })

  tezos.setWalletProvider(wallet)
  let connected = false

  $('#follow-button').click(function (event) {
    event.preventDefault()
    $.ajax('/php/follow.php', {
      type: 'POST',
      dataType: 'text',
      data: { username: profileUsername },
      success: function (data, status, xhr) {
        if (data === '1') $('#follow-button').text('Unfollow')
        else $('#follow-button').text('Follow')
      },
      error: function (xhr, status, error) {
        console.error(error)
      }
    })
  })

  $('#share-button').click(function (event) {
    event.preventDefault()

    const username = '<?= $profile_username ?>'
    const uid = '<?= $uid ?>'
    const hash = '<?= md5("$uid$SiteKey") ?>'
    const text = encodeURIComponent('I visited ' + username + ' profile. Great #NFT #Music Collection on #Tezos blockchain.')
    const shareURL = encodeURIComponent('https://radion.fm/user-profile.php?uid=' + uid + '&hash=' + hash)
    const intentURL = 'https://twitter.com/intent/tweet?text=' + text + '&url=' + shareURL
    window.open(intentURL, 'childwindow', 'width=550,height=425,toolbar=0,status=0')
  })

  $('#connect-wallet').click(async function () {
    if (!connected) {
      await wallet.requestPermissions()
      connected = true
      $('[id|="buy"]').attr('disabled', null).text('DOWNLOAD')
      $(this).html('<i class="far fa-wallet"></i> DISCONNECT WALLET')
    } else if (connected) {
      await wallet.clearActiveAccount()
      connected = false
      $('[id|="buy"]').attr('disabled', true).text('CONNECT WALLET TO DOWNLOAD')
      $(this).html('<i class="far fa-wallet"></i> CONNECT WALLET')
    }
  })

  $('[id|="heart"]').click(async function () {
    const songId = $(this).attr('id').slice(6)
    $.ajax('/php/vote_send.php', {
      type: 'POST',
      data: {
        type: '3',
        music_id: songId
      },
      success: function (data, status, xhr) {
        getMetadata(songId).then(function (metadata) {
          $('#hearts-' + songId).text(metadata.isLoveIt)
        })
      },
      error: function (xhr, status, error) {
        alert(xhr.responseText)
      }
    })
  })

  $('[id|="like"]').click(async function () {
    const songId = $(this).attr('id').slice(5)
    $.ajax('/php/vote_send.php', {
      type: 'POST',
      data: {
        type: '1',
        music_id: songId
      },
      success: function (data, status, xhr) {
        getMetadata(songId).then(function (metadata) {
          $('#likes-' + songId).text(metadata.isLikes)
        })
      },
      error: function (xhr, status, error) {
        alert(xhr.responseText)
      }
    })
  })

  $('[id|="buy"]').click(async function () {
    const songId = $(this).attr('id').slice(4)
    const content = $('#temp-buy-noty').prop('content')
    const clone = $(content).clone(true, true)
    const metadata = await getMetadata(songId)

    $(clone).find('[data-temp="artist"]').text(metadata.artist.join('; '))
    $(clone).find('[data-temp="title"]').text(metadata.title.join('; '))
    $(clone).find('[data-temp="id"]').text(songId)
    $(clone).find('[data-temp="price"]').html(price + '&#42793;')
    $(clone).find('[data-temp]').removeAttr('data-temp')
    const html = $(clone).find('.noty-container').html()

    noty({
      text: html,
      layout: 'topRight',
      buttons: [{
        addClass: 'btn btn-primary btn-clean btn-sm',
        text: '&#42793; Pay',
        onClick: function (noti) {
          noti.close()
          makePurchase(songId, metadata.comment[0], price)
        }
      }, {
        addClass: 'btn btn-primary btn-clean btn-sm',
        text: 'Cancel',
        onClick: function (noti) {
          noti.close()
          noty({
            text: '<i class="far fa-exclamation-circle fa-lg"></i> Your Purchase was Canceled',
            layout: 'topRight',
            type: 'error'
          })
        }
      }]
    })
  })

  $('[id|="share"]').click(async function () {
    const songID = $(this).attr('id').slice(6)
    const metadata = await getMetadata(songID)
    const idhash = await getHash(songID)
    const text = encodeURIComponent('I am listening "' + metadata.title[0] + '". You can download this #song with #crypto - tez/$XTZ - If you are a musician, you can mint your #CleanNFT #music on #Tezos with RADION FM.')
    const shareURL = encodeURIComponent('https://radion.fm/song-player.php?id=' + songID + '&hash=' + idhash)
    const intentURL = 'https://twitter.com/intent/tweet?text=' + text + '&url=' + shareURL
    window.open(intentURL, 'childwindow', 'width=550,height=425,toolbar=0,status=0')
    $.post('/php/tweet.php', { id: songID })

    const newMetadata = await getMetadata(songID)
    $('#shares-' + songID).text(newMetadata.tweets)
  })

  async function getMetadata (songId) {
    return new Promise((resolve, reject) => {
      $.ajax('/php/get_song_metadata.php', {
        type: 'GET',
        dataType: 'json',
        data: { id: songId },
        success: function (data, status, xhr) {
          resolve(data)
        },
        error: function (xhr, status, error) {
          reject(error)
        }
      })
    })
  }

  async function getHash (id) {
    return new Promise((resolve, reject) => {
      $.ajax('/php/get_hash.php', {
        type: 'GET',
        data: { id: id },
        success: function (data) {
          resolve(data)
        },
        error: function () {
          const error = new Error('Error getting hash')
          reject(error)
        }
      })
    })
  }

  async function makePurchase (songId, address, payPrice) {
    if (!connected) return

    const downloadPrice = window.price
    const op = await tezos.wallet.transfer({
      to: address,
      amount: downloadPrice
    }).send()

    const hash = op.opHash
    noty({
      text: '<i class="far fa-exclamation-circle fa-lg"></i> Transaction Sent. Wait for confirmation!',
      layout: 'topRight',
      type: 'information',
      timeout: 9000
    })

    const result = await op.confirmation(1)
    if (result.completed) {
      const search = new URLSearchParams()
      search.append('op', hash)
      search.append('id', songId)
      search.append('xtz', downloadPrice)
      search.append('usd', 1.00)

      const download = '/php/download_song_script.php?' + search.toString()
      window.open(download, 'download-iframe')

      // Display SUCCESS
      const sweetAlert = await Swal.fire({
        icon: 'success',
        title: 'SUCCESS',
        width: 450,
        html: '<br><p align="left" style="padding-left:10px;">WE HAVE CONFIRMATION!</p><hr><p align="left" style="padding-left:10px;"><strong>Transaction ID/Hash:</strong></p><p align="left" style="font-size:13px;padding-left:10px;">' + hash + '</p>',
        confirmButtonText: '<i class="fas fa-external-link-alt"></i> View in TzStats',
        showCancelButton: true,
        cancelButtonText: "<i class='fas fa-thumbs-up'></i> Got It"
      })

      if (sweetAlert.value) window.open('https://tzstats.com/' + hash)
    } else {
      await Swal.fire({
        icon: 'error',
        title: 'Oh No. Unable to confirm payment',
        text: 'Please check your balance before submit an paying.'
      })
    }
  }
  </script>
</body>
</html>