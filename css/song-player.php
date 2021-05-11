<?php

date_default_timezone_set('UTC');

$groupswithaccess = 'ALL,PUBLIC,RADIONER,CEO,FOUNDER';
$memberprofilepage = 1;

require_once 'slpw/sitelokpw.php';
require_once 'php/music_info_get.php';
require_once 'php/date.php';
require_once 'php/ranking.php';

$mid = isset($_GET['mid']) ? $_GET['mid'] : '0';
$hash = isset($_GET['hash']) ? $_GET['hash'] : '0';

$hash_match = md5("asset-preview-$mid");
if ($hash !== $hash_match) {
  http_response_code(400);
  die('Invalid hash');
}

$song_res = $con->query("SELECT * FROM `song` WHERE `SONG_ID`=$mid");
$song = $song_res->fetch_object();
$title = $song->SONG_NAME;
$artist = $song->ARTIST_NAME;
$uploader = $song->USER_NAME;
$status = $song->SONG_STATUS;
$source = get_music_source($mid, $status);
$img_src = get_art_work($mid, $status);

$hearts_res = $con->query("SELECT COUNT(*) AS `hearts` FROM `song_love` WHERE `SONG_ID`=$mid AND `SONG_LOVE_STATUS`=1");
$hearts = $hearts_res->fetch_object()->hearts;
$shares_res = $con->query("SELECT COUNT(*) AS `shares` FROM `song_share` WHERE `SONG_ID`=$mid");
$shares = $shares_res->fetch_object()->shares;
$b64_id = base64_encode($mid);
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
  <meta name="twitter:player" content="https://radion.fm/song-player.php?mid=<?= $mid ?>">
  <meta name="twitter:player:width" content="128">
  <meta name="twitter:player:height" content="48">

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

  <link rel="stylesheet" href="/css/reset.css">
  <link rel="stylesheet" href="/css/player.css">
  <link rel="stylesheet" href="/css/all.css">

  <script src="/js/plugins/jquery/jquery.min.js"></script>
  <script src="/js/all.min.js"></script>
  <title><?= $title ?></title>
</head>

<body>
  <main class="pre-enter" ontouchstart>
    <div class="background">
      <div class="header" align="center">
        <img src="img/logo@2x.png" class="header">
      </div>
    </div>

    <div class="container">
      <div class="player">
        <div class="back">
          <header>
            <h1><a>&lsaquo;</a></h1>
            <h1>Up Next</h1>
          </header>

          <ol>
<?php

$result = $con->query("SELECT * FROM `song` WHERE `USER_NAME`='$uploader' ORDER BY `SONG_ID` DESC");
while ($pl_song = $result->fetch_object()) {
  $pl_song_id = $pl_song->SONG_ID;
  $pl_hash = md5("asset-preview-$pl_song_id");
  $pl_status = $pl_song->SONG_STATUS;
  $pl_title = $pl_song->SONG_NAME;
  $pl_artist = $pl_song->ARTIST_NAME;
  $pl_img = get_art_work($pl_song_id, $pl_status);
?>
  <li>
    <a href="/song-player.php?mid=<?= $pl_song_id ?>&hash=<?= $pl_hash ?>">
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
          <img class="art" src="<?= $img_src ?>">
          <div class="bar">
            <hr>
          </div>
          <div class="meta">
            <time>
              <span id="current">0:00</span>
              <span id="duration">0:40</span>
            </time>
            <div class="controls top">
              <a class="rewind skip">
                <i class="fas fa-backward fa-lg"></i>
              </a>
              <a class="play" href="<?= $href ?>" data-hash="<?= $hash ?>">
                <i class="fas fa-play fa-2x" style="font-size:2.5rem;"></i>
              </a>
              <a class="forward skip">
                <i class="fas fa-forward fa-lg"></i>
              </a>
            </div>
            <div class="info">
              <h1><?= $title ?></h1>
              <h2><?= $artist ?></h2>
            </div>
          </div>
          <div class="controls bottom">
            <a>
              <i class="fal fa-heart fa-2x"></i>
            </a>
            <a>
              <i class="fas fa-wallet fa-2x"></i>
            </a>
            <a>
              <i class="fas fa-download fa-2x"></i>
            </a>
            <a class="flip">
              <i class="fas fa-bars fa-2x"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </main>

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
  $(document).ready(function () {
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

    const iconPause = function (element) {
      $('[data-hash]').html('<i class="fas fa-play fa-2x"></i>')
      $(element).html('<i class="fas fa-pause fa-2x"></i>')
    }

    const iconPlay = function (element) {
      $(element).html('<i class="fas fa-play fa-2x" ></i>')
    }

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

    const search = new URLSearchParams(window.location.search)
    if (search.get('autoplay')) {
      const firstPlayer = $('[data-hash]')[0]
      $(firstPlayer).click()
    }
  })

  </script>
</body>
</html>
