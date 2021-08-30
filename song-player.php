<?php

date_default_timezone_set('UTC');

$groupswithaccess = 'ALL,PUBLIC,RADIONER,CEO,FOUNDER';
$memberprofilepage = 1;

require_once 'slpw/sitelokpw.php';
require_once 'getID3/getid3/getid3.php';
require_once 'php/music_info_get.php';
require_once 'php/date.php';
require_once 'php/ranking.php';

$id = isset($_GET['id']) ? $_GET['id'] : '0';
$hash = isset($_GET['hash']) ? $_GET['hash'] : '0';
$embed = isset($_GET['embed']);

$actualid = actualid($id);
if ($actualid !== $id) {
  $actualhash = md5("asset-preview-$actualid");
  header("Location: /song-player.php?id=$actualid&hash=$actualhash");
  exit(0);
}

$hash_match = md5("asset-preview-$id");
if ($hash !== $hash_match) {
  http_response_code(400);
  die('Invalid hash');
}

$getID3 = new getID3();
$song_res = $con->query("SELECT * FROM `song` WHERE `RDON_ID`='$id'");
$song = $song_res->fetch_object();
$mid = $song->SONG_ID;
$title = $song->SONG_NAME;
$artist = $song->ARTIST_NAME;
$uploader = $song->USER_NAME;
$copyright = $song->COPYRIGHT;
$status = $song->SONG_STATUS;
$nft = $song->NFT;
$source = get_music_source($id, $status);
$img_src = get_art_work($id, $status);
$mp3info = $getID3->analyze($source);
$owner_address = $mp3info['tags']['id3v2']['comment'][0];

$hearts_res = $con->query("SELECT COUNT(*) AS `hearts` FROM `song_love` WHERE `SONG_ID`=$mid AND `SONG_LOVE_STATUS`=1");
$hearts = $hearts_res->fetch_object()->hearts;
$shares_res = $con->query("SELECT COUNT(*) AS `shares` FROM `song_share` WHERE `SONG_ID`=$mid");
$shares = $shares_res->fetch_object()->shares;
$b64_id = base64_encode($id);
$href = "/$b64_id/$hash";
// Get rank of the song
$rank = get_rank($mid);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="twitter:card" content="player">
  <meta name="twitter:creator" content="@fm_radion">
  <meta name="twitter:title" content="&quot;<?= $title ?>&quot; by <?= $artist ?>">
  <meta name="twitter:description" content="Listen &quot;<?= $title ?>&quot; at RADION&trade; FM">
  <meta name="twitter:image" content="https://radion.fm/<?= $img_src ?>">
  <meta name="twitter:player" content="https://radion.fm/song-player.php?id=<?= $id ?>&hash=<?= $hash ?>">
  <meta name="twitter:player:width" content="320">
  <meta name="twitter:player:height" content="540">

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

  <link rel="stylesheet" href="/css/theme-dark.css" id="theme">
  <link rel="stylesheet" href="/css/reset.css">
  <link rel="stylesheet" href="/css/player.css">
  <link rel="stylesheet" href="/css/all.css">

  <script src="/js/plugins/jquery/jquery.min.js"></script>
  <script src="/js/plugins/bootstrap/bootstrap.min.js"></script>
  <script src="/js/plugins/noty/jquery.noty.js"></script>
  <script src="/js/plugins/noty/layouts/topCenter.js"></script>
  <script src="/js/plugins/noty/layouts/topLeft.js"></script>
  <script src="/js/plugins/noty/layouts/topRight.js"></script>
  <script src="/js/plugins/noty/themes/default.js"></script>
  <script src="/js/all.min.js"></script>
  <script src="/js/tezos.js"></script>
  <script src="https://unpkg.com/@airgap/beacon-sdk@2.3.1/dist/walletbeacon.min.js"></script>
  <script>window.beaconSdk = beacon</script>
  <script src="https://unpkg.com/@taquito/taquito@10.1.0/dist/taquito.min.js"></script>
  <script src="https://unpkg.com/@taquito/beacon-wallet@10.1.0/dist/taquito-beacon-wallet.umd.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.12/dist/sweetalert2.all.min.js"></script>

  <style>
  .download-iframe { display: none; }
  </style>

  <title><?= $title ?></title>
</head>

<body>
  <?php if (!$embed) { ?>
  <iframe name="download-iframe" class="download-iframe"></iframe>

  <main class="pre-enter" ontouchstart>
    <div class="background">
      <div class="header" align="center">
        <img src="img/logo@2x.png" class="header">
      </div>
    </div>
    <?php } ?>

    <div class="player-container">
      <div class="player">
        <div class="back">
          <header>
            <h1><a>&lsaquo;</a></h1>
            <h1>Other Assets</h1>
          </header>

          <ol>
<?php

$result = $con->query("SELECT * FROM `song` WHERE `USER_NAME`='$uploader' ORDER BY `SONG_ID` DESC");
while ($pl_song = $result->fetch_object()) {
  $pl_rdon_id = $pl_song->RDON_ID;
  $pl_hash = md5("asset-preview-$pl_rdon_id");
  $pl_status = $pl_song->SONG_STATUS;
  $pl_title = $pl_song->SONG_NAME;
  $pl_artist = $pl_song->ARTIST_NAME;
  $pl_img = get_art_work($pl_rdon_id, $pl_status);
?>
  <li>
    <a href="/song-player.php?id=<?= $pl_rdon_id ?>&hash=<?= $pl_hash ?>">
      <img src="<?= $pl_img ?>">
      <div>
        <h3><?= $pl_title ?></h3>
        <h4><?= $pl_artist ?></h4>
      </div>
    </a>
    <hr>
  </li>
<?php } ?>
          </ol>
        </div>

        <div class="front">
          <!-- <img src="/img/logo.png" style="height:25px; width:100px; z-index:2; position:absolute; bottom:230px; right:0px;"> -->
          <?php if ($nft) { ?>
          <span style="
          font-size:1.25em;
          z-index:2;
          position:absolute;
          bottom:235px;
          right:25px;
          color:#27AE60;
          background:#212121;
          height:25px;
          width:75px;
          border-radius:7px;
          font-family: Arial;

          border: 1px solid #303030;"><span style="margin:10px; color:#fff;">NFT</span><i class="far fa-check-circle" style="color:#27AE60;"></i></span>
          <?php } ?>
          <img class="art" src="<?= $img_src ?>">
          <div class="bar"><hr></div>
          <div class="meta">
            <time>
              <span id="current">0:00</span>
              <span id="duration">0:50</span>
            </time>

            <div>
              <i class="fab fa-creative-commons cc-icon" style="color:#ccc;"></i>
              <i class="fab fa-creative-commons-by cc-icon-by" style="display:none; color:#ccc;"></i>
              <i class="fab fa-creative-commons-nc cc-icon-nc" style="display:none; color:#ccc;"></i>
              <i class="fab fa-creative-commons-nd cc-icon-nd" style="display:none; color:#ccc;"></i>
              <i class="fab fa-creative-commons-sa cc-icon-sa" style="display:none; color:#ccc;"></i>
            </div>

            <div class="controls top">
              <a class="rewind skip">
                <i class="fas fa-backward fa-2x"></i>
              </a>
              <a class="play" href="<?= $href ?>" data-hash="<?= $hash ?>">
                <i class="fas fa-play fa-2x" style="font-size:2.5rem;"></i>
              </a>
              <a class="forward skip">
                <i class="fas fa-forward fa-2x"></i>
              </a>
            </div>
            <div class="info">
              <h1><?= $title ?></h1>
              <h2><?= $artist ?></h2>
            </div>
          </div>

          <div class="controls bottom">
            <a href="" id="like">
              <i class="fal fa-thumbs-up fa-2x"></i>
            </a>
            <a href="" id="heart">
              <i class="fal fa-heart fa-2x"></i>
            </a>
            <a href="" id="connect-wallet">
              <i class="fal fa-wallet fa-2x"></i>
            </a>
            <a href="" id="download-asset">
              <i class="fal fa-download fa-2x"></i>
            </a>
            <a href="" class="flip">
              <i class="fas fa-bars fa-2x"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
    <?php if (!$embed) { ?>
  </main>
  <?php } ?>

  <script>
  $('main').addClass('pre-enter').removeClass('with-hover');
  setTimeout(function () {
    $('main').addClass('on-enter')
  }, 500)

  setTimeout(function () {
    $('main').removeClass('pre-enter on-enter')
    setTimeout(function () {
      $('main').addClass('with-hover')
    }, 50)
  }, 2000)

  $('.flip, .back a').click(function () {
    $('.player').toggleClass('playlist')
  })

  $('.bottom a').not('.flip').click(function () {
    $(this).toggleClass('active')
  })
  </script>

  <script>
  const { TezosToolkit } = taquito
  const { BeaconWallet } = taquitoBeaconWallet
  const { NetworkType } = beacon

  const rpc = 'https://mainnet-tezos.giganode.io'
  const tezos = new TezosToolkit(rpc)
  const wallet = new BeaconWallet({
    name: 'RADION FM',
    iconUrl: 'https://www.radion.fm/favicon/apple-icon-60x60.png',
    appUrl: 'https://www.radion.fm'
  })

  tezos.setWalletProvider(wallet)
  let connected = false

  const player = new Audio()
  let currentId = null

  player.addEventListener('timeupdate', function (event) {
    if (currentId) {
      const percent = (player.currentTime / player.duration) * 100
      const currentTime = Math.round(player.currentTime)
      const time = (new Date(currentTime * 1000)).toISOString().substr(14, 5)
      $('.bar hr').css('width', percent + '%')
      $('#current').text(time)
    }
  })

  player.addEventListener('ended', function (event) {
    if (currentId) {
      const b64 = btoa(currentId)
      const element = $('[href^="/' + b64 + '/"]')
      iconPlay(element)
    }
  })

  function iconPause (element) {
    $('[data-hash]').html('<i class="fas fa-play fa-2x"></i>')
    $(element).html('<i class="fas fa-pause fa-2x"></i>')
  }

  function iconPlay (element) {
    $(element).html('<i class="fas fa-play fa-2x"></i>')
  }

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

  $(document).ready(function () {
    const license = ('<?= $copyright ?>').split('-')
    if (license.includes('by')) $('.cc-icon-by').show()
    if (license.includes('nc')) $('.cc-icon-nc').show()
    if (license.includes('nd')) $('.cc-icon-nd').show()
    if (license.includes('sa')) $('.cc-icon-sa').show()

    const songId = '<?= $id ?>'
    getMetadata(songId).then(function (metadata) {
      if (metadata.isLoved == '1') $('#love').html('<i class="fas fa-heart fa-2x"></i>')
      if (metadata.isVoted == '1') $('#like').html('<i class="fas fa-thumbs-up fa-2x"></i>')
    })

    $('#love').click(function (event) {
      event.preventDefault()
      $.ajax('/php/vote_send.php', {
        type: 'POST',
        data: {
          type: '3',
          music_id: songId
        },
        success: function (data, status, xhr) {
          getMetadata(songId).then(function (metadata) {
            if (metadata.isLoved == '1') $('#love').html('<i class="fas fa-heart fa-2x"></i>')
          })
        },
        error: function (xhr, status, error) {
          alert(xhr.responseText)
        }
      })
    })

    $('#like').click(function (event) {
      event.preventDefault()
      $.ajax('/php/vote_send.php', {
        type: 'POST',
        data: {
          type: '1',
          music_id: songId
        },
        success: function (data, status, xhr) {
          getMetadata(songId).then(function (metadata) {
            if (metadata.isVoted == '1') $('#like').html('<i class="fas fa-thumbs-up fa-2x"></i>')
          })
        },
        error: function (xhr, status, error) {
          alert(xhr.responseText)
        }
      })
    })

    $('[data-hash]').click(function (event) {
      event.preventDefault()

      const href = $(this).attr('href').split('/')[1]
      const songId = atob(href)

      if (songId !== currentId) {
        const hash = $(this).attr('data-hash')
        const search = new URLSearchParams()
        search.append('hash', hash)
        search.append('id', songId)

        currentId = songId
        player.src = '/asset.php?' + search.toString()
        player.play()
        iconPause(this)
      } else {
        if (player.paused) {
          player.play()
          iconPause(this)
        } else {
          player.pause()
          iconPlay(this)
        }
      }
    })

    $('#connect-wallet').click(async function (event) {
      event.preventDefault()
      if (connected) {
        await wallet.clearActiveAccount()
        connected = false
        return false
      }

      try {
        const network = { type: NetworkType.MAINNET, rpcUrl: rpc }
        await wallet.requestPermissions({ network })
        connected = true
      } catch (error) {
        noty({
          text: '<i class="far fa-exclamation-circle fa-lg"></i> Connection to wallet was not granted',
          layout: 'topRight',
          type: 'error',
          timeout: 5000
        })
        return false
      }
    })

    $('#download-asset').click(async function (event) {
      event.preventDefault()
      noty({
        text: '<div align="justify" style="padding:15px;"><div><i class="fad fa-cart-arrow-down fa-2x"></i> &nbsp;&nbsp;<strong>DOWNLOAD ASSET</strong></div><div style="padding-left:60%; margin-top:-14px; font-size:10px; color:#f2c945;"><i class="fas fa-signal-stream fa-lg"></i> <strong class="station-name">MAIN STATION</strong> </div><div style="margin-top:10px; color:#999999; padding-bottom:1px;"><strong>Artist</strong>:&nbsp;&nbsp;&nbsp;<span style="color:#F2F4F4;"><?= $artist ?></span></div><div style="color:#999999; padding-bottom:2px;"><strong>Song</strong>:&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:#F2F4F4;"><?= addslashes($title) ?></span></div><div style="color:#999999; padding-bottom:2px;"><strong>RDON:</strong>&nbsp;&nbsp;<span style="color:#F2F4F4;"><?= $id ?></span></div><div style="padding-left:50%; position:absolute; margin-top:-15px; font-size:10px;"><strong>License</strong>: <span style="color:#999999;"> <i class="fab fa-creative-commons fa-lg" style="color:#ccc;"></i> <i class="fab fa-creative-commons-by fa-lg" style="color:#ccc;"></i> <i class="fab fa-creative-commons-nc fa-lg" style="color:#ccc;"></i> <i class="fab fa-creative-commons-nd fa-lg" style="color:#ccc;"></i> </span></div><div style="color:#999999; font-size:0px;"">ID #:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:#fff; font-size:px;" class="id"> </span></div></div><div style="padding-left:10px; margin-bottom:0px;"><strong>TOTAL:&nbsp;&nbsp;</strong> <span style="color:#f2c945;" class="tezos-price">' + price + ' &#42793;</span>&nbsp;&nbsp;=&nbsp;&nbsp; $1.00 USD<div style="font-size:10px; position: absolute;left: 20px; bottom: -25px; z-index: 1; color:#808080;">Powered by Tezos Blockchain</div></div>',
        layout: 'topRight',
        buttons: [{
          addClass: 'btn btn-primary btn-clean btn-sm',
          text: '&#42793; Pay',
          onClick: function (noti) {
            noti.close()
            makePurchase()
          }
        }, {
          addClass: 'btn btn-primary btn-clean btn-sm',
          text: 'Cancel',
          onClick: function (noti) {
            noti.close()
            noty({
              icon: 'info',
              text: '<i class="far fa-exclamation-circle fa-lg"></i> Transaction has been canceled.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp <i class="fal fa-times-circle fa-lg"></i>',
              layout: 'topRight',
              type: 'error',
              timeout: 5000
            })
          }
        }]
      })
    })
  })

  async function makePurchase () {
    if (!connected) {
      noty({
        text: 'Please connect your wallet first then try again',
        layout: 'topRight',
        type: 'error',
        timeout: 5000
      })
      return
    }

    const ownerAddress = '<?= $owner_address ?>'
    const id = '<?= $id ?>'
    const downloadPrice = window.price
    const operation = await tezos.wallet.transfer({
      to: ownerAddress,
      amount: downloadPrice
    }).send()

    const hash = operation.opHash
    noty({
      text: '<i class="far fa-exclamation-circle fa-lg"></i> Transaction Sent. Wait for confirmation!',
      layout: 'topRight',
      type: 'information',
      timeout: 9000
    })

    const result = await operation.confirmation(1)
    if (result.completed) {
      const search = new URLSearchParams()
      search.append('op', hash)
      search.append('id', id)
      search.append('xtz', downloadPrice)
      search.append('usd', 1.00)

      const download = 'php/download_song_script.php?' + search.toString()
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

  function transactionCancelled () {
    noty({
      text: '<i class="far fa-exclamation-circle fa-lg"></i> Transaction has been canceled.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp <i class="fal fa-times-circle fa-lg"></i>',
      layout: 'topRight',
      type: 'error',
      timeout: 5000
    })
  }
  </script>
</body>
</html>
