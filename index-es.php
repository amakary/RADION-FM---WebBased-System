<?php
session_start();
$groupswithaccess = 'PUBLIC,RADIONER,FOUNDER';
$loginpage = $slpagename;
$logoutpage = $slpagename;
$loginredirect = 0;

require_once 'slpw/sitelokpw.php';

if (isset($_REQUEST['logout']) && $_REQUEST['logout'] == 'true') {
  require_once 'slpw/slconfig.php';

  $ses_sluserid = $_SESSION['ses_sluserid'];
  $sql = "DELETE FROM `sl_whoisonline` WHERE `userid`='$ses_sluserid'";
  $res = $con->query($sql);

  session_destroy();
  if ($res) header("Location: $base_address");
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <!-- META SECTION -->
  <title>RADION&trade;</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

	<meta property="og:url" content="https://radion.fm">
  <meta property="og:type" content="website">
  <meta property="og:title" content="RADION&trade; FM">
  <meta property="og:description" content="RADION FM es una plataforma de musica que ayuda a productoras de musica y artistas a crear musica genuina con technologia blockchain. Musicos pueden crear NFT para sus canciones.">
  <meta property="og:image" content="https://radion.fm/img/facebook-img.png">

  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
  <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">
  <!-- END META SECTION -->

  <!-- CSS INCLUDE -->
  <link rel="stylesheet" id="theme" href="/css/theme-dark.css">
  <link rel="stylesheet" href="/css/all.css">
  <link rel="stylesheet" href="/css/tezos-graph.css">
  <link rel="stylesheet" href="/css/goodies.css">
  <link rel="stylesheet" href="/css/ion/ion.rangeSlider.css">
  <link rel="stylesheet" href="/css/ion/ion.rangeSlider.skinFlat.css">
  <!-- EOF CSS INCLUDE -->

	<!-- RADIO STATIONS -->
  <link rel="stylesheet" type="text/css" href="/radio/radio.css">

  <!-- SWEET ALERT 2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.12/dist/sweetalert2.all.min.js"></script>
  <script src="https://platform.twitter.com/widgets.js" async></script>
  <script src="https://cdn.lordicon.com//libs/frhvbuzj/lord-icon-2.0.2.js"></script>

  <style>
  .download-iframe { display: none; }
  .linko { color: #FFF; }
  .linko:hover { color: #F39C12; }
  .fa-github: { color: #FFF; }
  .fa-github:hover { color:#F39C12; }

  .xn-dropdown-menu {
    display: none;
    width: 400px !important;
    max-height: 300px;
    background-color: #14171b;
    border: 1px solid #101215;
    overflow-y: scroll !important;
    overflow-x: hidden !important;
  }

  .xn-dropdown-menu::-webkit-scrollbar { display: none; }
  .xn-dropdown-menu > li > a { color: #aaa; border-bottom: 1px solid #14171b; }
  .xn-dropdown-menu > li > a:hover { color: #fff; }
  </style>
</head>

<body>
  <iframe name="download-iframe" class="download-iframe"></iframe>

  <!-- START PAGE CONTAINER -->
  <div class="page-container page-navigation-top page-navigation-top-custom">
    <!-- PAGE CONTENT -->
    <div class="page-content">
      <!-- FAIL MESSAGE -->
      <div class="message-box message-box-primary animated fadeIn" data-sound="fail" id="message-box-sound-2">
        <div class="mb-container">
          <div class="mb-middle">
            <div class="mb-title"><i class="fal fa-hand-paper"></i> UN MOMENTO</div>
            <div class="mb-content">
              <p align="justify">Para que su voto cuente, debe iniciar sesión. Si aún no tiene una cuenta, le recomendamos que se registre (es gratis).</p>
            </div>
            <div class="mb-footer">
  						<button class="btn btn-default" onclick="window.open('login.php', '_blank')"><i class="fad fa-sign-in-alt"></i> INICIAR SESIÓN</button>
  						<button class="btn btn-default" onclick="window.open('registration.php', '_blank')"><i class="fad fa-user-plus"></i> REGISTRATE</button>
              <button class="btn btn-danger pull-right mb-control-close"><i class="fas fa-times-octagon"></i> CERRAR</button>
            </div>
          </div>
        </div>
      </div>
      <button type="button" id="failed_btn" class="btn btn-danger mb-control hide" data-box="#message-box-sound-2">FALLO</button>
      <!-- END FAILED MESSAGE -->

      <!-- START X-NAVIGATION VERTICAL -->
      <div class="x-navigation x-navigation-horizontal">
        <!-- LOGO -->
        <li class="xn-logo">
          <a href="index.php">RADION</a>
          <a href="#" class="x-navigation-control"></a>
        </li>
        <!-- END LOGO -->

        <!-- STATIONS MENU -->
        <li class="xn-openable">
          <a href="#">
            <i class="fas fa-signal-stream fa-lg"></i>
            <span class="xn-text"> &nbsp; &nbsp; ESTACIONES DE RADIO</span>
          </a>
          <ul class="animated zoomIn">
            <li id="station0" class="station">
              <a href="#" class="title">
                <i class="fal fa-signal-stream fa-lg"></i>&nbsp;
                <div id="title0" class="subtitle"></div>
                <div id="playing0" class="playing">
    							<div class="rect1"></div>
    							<div class="rect2"></div>
    							<div class="rect3"></div>
    							<div class="rect4"></div>
    							<div class="rect5"></div>
                </div>
							</a>
              <div class="informer informer-danger"><i class="fas fa-volume-up"> </i> EN VIVO</div>
            </li>

            <li id="station1" class="station">
              <a href="#" class="title">
                <i class="fas fa-podcast fa-lg"></i>&nbsp;
                <div id="title1" class="subtitle"></div>
                <div id="playing1" class="playing">
    							<div class="rect1"></div>
    							<div class="rect2"></div>
    							<div class="rect3"></div>
    							<div class="rect4"></div>
    							<div class="rect5"></div>
                </div>
							</a>
							<div class="informer informer-default">OFF</div>
            </li>

            <li id="station2" class="station">
              <a href="#" class="title">
                <i class="fal fa-signal-stream fa-lg"></i>&nbsp;
  							<div id="title2" class="subtitle"></div>
  							<div id="playing2" class="playing">
    							<div class="rect1"></div>
    							<div class="rect2"></div>
    							<div class="rect3"></div>
    							<div class="rect4"></div>
    							<div class="rect5"></div>
                </div>
              </a>
              <div class="informer informer-default">OFF</div>
            </li>

            <li id="station3" class="station">
              <a href="#" class="title">
                <i class="fal fa-signal-stream fa-lg"></i>&nbsp;
                <div id="title3" class="subtitle"></div>
                <div id="playing3" class="playing">
    							<div class="rect1"></div>
    							<div class="rect2"></div>
    							<div class="rect3"></div>
    							<div class="rect4"></div>
    							<div class="rect5"></div>
                </div>
              </a>
							<div class="informer informer-default">OFF</div>
            </li>

            <li id="station4" class="station">
              <a href="#" class="title">
                <i class="fal fa-signal-stream fa-lg"></i>&nbsp;
                <div id="title4" class="subtitle"></div>
                <div id="playing4" class="playing">
    							<div class="rect1"></div>
    							<div class="rect2"></div>
    							<div class="rect3"></div>
    							<div class="rect4"></div>
    							<div class="rect5"></div>
                </div>
							</a>
							<div class="informer informer-default">OFF</div>
            </li>


            <li><a href="#"><i class="fal fa-signal-stream fa-lg"></i>&nbsp; INDIE ROCK</a><div class="informer informer-default">OFF</div></li>
            <li><a href="#"><i class="fal fa-signal-stream fa-lg"></i>&nbsp; COUNTRY MUSIC</a><div class="informer informer-default">OFF</div></li>
            <li><a href="#"><i class="fal fa-signal-stream fa-lg"></i>&nbsp; POP</a><div class="informer informer-default">OFF</div></li>
            <li><a href="#"><i class="fal fa-signal-stream fa-lg"></i>&nbsp; RAP</a><div class="informer informer-default">OFF</div></li>
            <li><a href="#"><i class="fal fa-signal-stream fa-lg"></i>&nbsp; HIP HOP / R&B</a><div class="informer informer-default">OFF</div></li>
          </ul>
        </li>
        <!-- END STATIONS MENU -->

        <!-- MARKETPLACE MENU -->
        <li class="xn-openable">
          <a href="#"><i class="fad fa-poll-people fa-lg"></i> <span class="xn-text"> &nbsp; &nbsp; ACTIVOS DIGITALES</span></a>
          <ul class="animated zoomIn">
            <li><a href="#" style="color:#FEA223;"><i class="far fa-exclamation-circle fa-lg"></i>&nbsp; <strong>ACTIVOS PENDIENTE</strong></a><div class="informer informer-warning" id="total_submission">+679</div></li>
            <li><a href="#"><i class="fad fa-podcast fa-lg"></i>&nbsp; PODCAST</a><div class="informer informer-default" id="talk_show">0</div></li>
      			<li><a href="#"><i class="far fa-headphones"></i>&nbsp; LATINO</a><div class="informer informer-default" id="latin">0</div></li>
      			<li><a href="#"><i class="far fa-headphones"></i>&nbsp; BEATS</a><div class="informer informer-default" id="djmix">0</div></li>
      			<li><a href="#"><i class="far fa-headphones"></i>&nbsp; INDIE ROCK</a><div class="informer informer-default" id="rock">0</div></li>
            <li><a href="#"><i class="far fa-headphones"></i>&nbsp; COUNTRY MUSIC</a> <div class="informer informer-default" id="country">0</div></li>
            <li><a href="#"><i class="far fa-headphones"></i>&nbsp; POP</a><div class="informer informer-default" id="pop">0</div></li>
      			<li><a href="#"><i class="far fa-headphones"></i>&nbsp; RAP</a><div class="informer informer-default" id="rap">0</div></li>
      			<li><a href="#"><i class="far fa-headphones"></i>&nbsp; HIP HOP / R&B</a><div class="informer informer-default" id="hip_hop">0</div></li>
          </ul>
        </li>
        <!-- END MARKETPLACE MENU -->
        <!-- SEARCH -->
        <li class="xn-search">
          <form id="search-form" action="/php/search.php" method="post" role="form" class="dropdown">
            <input type="text" id="search-q" name="search-q" placeholder="Buscar...">
            <button type="submit" style="display:none;"></button>
            <div class="dropdown">
              <button type="button" id="search-dropdown-toggle" style="display:none;"></button>
              <ul id="search-results" class="dropdown-menu xn-dropdown-menu" aria-labelledby="search-dropdown-toggle">
              </ul>
            </div>
          </form>
        </li>

        <template id="temp-result">
          <li>
            <a href="" class="result-link">
              <span class="result-name"></span> <small class="result-type" style="position:absolute; right:0; padding-right:20px;">- </small>
            </a>
          </li>
        </template>
        <!-- END SEARCH -->

        <li class="xn-icon-button pull-right" style="margin-right:0px;">
          <a href="#" class="sidebar-toggle"><i class="far fa-ellipsis-v-alt fa-lg"></i></a>
        </li>

        <!-- LANGUAGE BAR -->
        <li class="xn-icon-button pull-right">
          <a href="#"><i class="fad fa-language fa-lg"></i></a>
          <ul class="xn-drop-left xn-drop-dark animated zoomIn">
            <li><a href="index-es.php"><img src="/img/flags/es.png" style="height:20px; width:20px;">&nbsp; &nbsp; ESPAÑOL</a></li>
            <li><a href="index.php"><img src="/img/flags/us.png" style="height:20px; width:20px;">&nbsp; &nbsp; ENGLISH</a></li>
          </ul>
        </li>
        <!-- END LANGUAGE BAR -->

        <!-- PROFILE MENU UPPER CORNER RIGHT -->
        <li class="x-features-profile pull-right">
          <a href="#" style="background-color:inherit">
            <img src="<?= isset($_SESSION) && isset($_SESSION["ses_sluserid"]) ? siteloklink($slcustom2, 0) : '/img/no-image.jpg' ?>" style="display:inline-block; border-radius:50%; width:28px; height:28px; margin-top:-4px; margin-bottom:-7px; background-color:#1D2127;" alt="">
            <span class="fas fa-angle-down fa-lg"></span>
          </a>

          <ul class="xn-drop-left animated zoomIn">
            <?php if (isset($_SESSION) && isset($_SESSION["ses_sluserid"])) { ?>
            <div style="padding:10px;">
							<img src="<?php siteloklink($slcustom2, 0); ?>" style="display:inline-block; border-radius:50%; width:32px; height:32px; margin-bottom:-10px; background-color:#1D2127;" alt="">
							<span style="color:#fff; padding-top:15px; padding-left:10px; padding-bottom:5px; font-size:13px;"><strong><?php echo $slusername; ?></strong></span>
							<div style="color:#F39C12; padding-left:45px; font-size:10px;"><?= $slemail ?></div>
            </div>

            <li><a href="#" class="mb-control" data-box="#mb-dashboard"><span class="fas fa-sign-in-alt fa-lg"></span> &nbsp; &nbsp; PANEL DE CONTROL</a></li>
						<li><a href="#" class="mb-control"><i class="far fa-wallet fa-lg"></i><span> &nbsp; &nbsp; CONECTAR BILLETERA</span></a></li>
						<li><a href="#" class="mb-control" data-box="#mb-signout"><span class="fas fa-sign-out-alt fa-lg"></span> &nbsp; &nbsp; CERRAR SESIÓN</a></li>
            <?php } else { ?>
            <li><a href="login.php"><i class="fad fa-sign-in-alt fa-lg"></i> &nbsp; &nbsp; INICIAR SESIÓN</a></li>
            <li><a href="registration.php"><i class="fad fa-user-plus fa-lg"></i> &nbsp; &nbsp; REGISTRATE</a></li>
            <?php } ?>
          </ul>
        </li>
        <!-- END PROFILE MENU UPPER CORNER RIGHT -->
      </div>
      <!-- END X-NAVIGATION VERTICAL -->

      <!-- AD FEATURE / REQUIRE BACK-END -->
<?php

require_once 'php/db.php';
$get_image = "SELECT * FROM `slconfig` WHERE `confignum`=1";
$student_img = 'img/radion022.jpg';
$result = $con->query($get_image);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $last_ad_id = $row['LAST_AD_ID'];
    $select_ads = "SELECT `express_ads`.* FROM `express_ads` JOIN `sitelok` ON `sitelok`.`Username`=`express_ads`.`Username` WHERE `express_ads_main_home_page` > 0 AND `express_ads_id`=$last_ad_id AND `express_ads`.`express_ads_p_impress` > 0";
    $ads = $con->query($select_ads);

    if ($ads->num_rows > 0) {
      while ($ad = $ads->fetch_assoc()) {
        $username = $ad['Username'];
        $student_img = "ad_images/$last_ad_id/";

        if ($files = glob("$student_img/*")) $student_img = $files[0];
        if (isset($_SESSION['lastid']) && !empty($_SESSION['lastid'])) {
          if ($_SESSION['lastid'] != $last_ad_id) {
            $update_impression = "UPDATE `express_ads` SET `express_ads_impressions`=`express_ads_impressions`+1 WHERE `express_ads_id`=$last_ad_id";
            $con->query($update_impression);
          }
        }
      }
    }
  }
}

?>
      <!-- END AD FEATURE / REQUIRE BACK-END -->

      <!-- FRONT-END MODULE -->
      <div class="page-content-wrap">
        <div class="row backg" style="background-color:#101215; overflow:hidden; height:700px; background-image:<?= $student_img ?>;" >
          <div class="col-md-8" style="margin-top:0px; padding-top:0px; padding-bottom:0px; padding-left:0px;">
            <div style="padding-top:30px; padding-bottom:30px; padding-left:3%; border-radius:0 0 100% 0; background:radial-gradient(circle at 0% 0%, #000000 25%, #000000 40%, transparent 70%);margin-left:-15px; height:700px; width:85%;">
              <span style="clear:left;">
                <div style="color:#616A6B; margin-bottom:10px;">
                  <strong>ARTISTA:</strong>
                  <strong><span id="artist_name" style="color:#FFF; padding-left:5px; padding-top:4px; padding-bottom:4px;"></span></strong>
                </div>

                <div style="float:left;">
                  <div style="padding-right:165px;" class="blobs-container">
                    <button class="btn btn-default btn-rounded btn-paused blob white" style="z-index:1; position:absolute; margin-left:55px; margin-top:55px;" data-toggle="tooltip" data-placement="top" >
                      <i class="fad fa-play fa-lg" style="color:#2980b9;" id="play_icon"></i>
                    </button>
                  </div>

                  <div id="imgDiv">
                    <img src="https://radion.fm:8002/playingart?sid=1" id="playingart" height="150" width="150" style="z-index:-1; filter:alpha(opacity=40); opacity: 0.4; border-radius:15px 50px;">
                  </div>
                </div>

                <div style="padding-bottom:5px;">
                  <span style="color:#5D6D7E;"><lord-icon
    src="https://cdn.lordicon.com//rdjuyjtu.json"
    trigger="loop"
    colors="primary:#F39C12,secondary:#F39C12"
    stroke="100"
    delay="5000"
    style="width:35px;height:35px">
</lord-icon>
                    <strong id="station_name" style="color:#F39C12;"> ESTACIÓN PRINCIPAL </strong>
                    <i style="margin-left:10px; margin-bottom:10px; padding-left:10px; padding-right:10px; border-radius:3px; text-align: center; background-color:#A93226; height:18px; color:#fff;display:inline-block; family-font:Arial;">EN VIVO</i>
                  </span>
                </div>

                <span style="color:#616A6B; family-font:Arial; padding-right:5px;"><strong>TITULO</strong>:</span>
                <span style="color:#fff; family-font:Arial;" data-sid="1" id="songTitle" class="songTitleSpan"></span>
                <span style="padding-right:10px; padding-left:10px; color:#aaaaaa;">| </span>
                <span style="color:#616A6B; padding-right:5px;">LICENCIA: </span>
                <span>
                  <a href="creative-commons.php" target="blank" style="text-decoration: none">
                    <i class="fab fa-creative-commons fa-lg cc-icon" style="color:#D0D3D4;"></i>
              		<i class="fab fa-creative-commons-by fa-lg cc-icon-by" style="color:#D0D3D4;display:none;"></i>
              		<i class="fab fa-creative-commons-nc fa-lg cc-icon-nc" style="color:#D0D3D4;display:none;"></i>
              		<i class="fab fa-creative-commons-nd fa-lg cc-icon-nd" style="color:#D0D3D4;display:none;"></i>
                    <i class="fab fa-creative-commons-sa fa-lg cc-icon-sa" style="color:#D0D3D4;display:none;"></i>
                  </a>
                </span>


                <p style="color:#616A6B; padding-top:3px;">
                  <span>NFT <i id="nft-check" class="far fa-check-circle" style="color:#229954; display: none;"></i><i id="nft-warn" class="far fa-exclamation-circle" style="color:#F39C12;"></i></span>
                  <span style="padding-right:10px; padding-left:10px; color:#aaaaaa;"> | </span> Titular de los Derechos - <a href="#" id="username" style="color:#f2c945;"></a>
                </p>

                <p style="color:#616A6B; margin-top:-5px; width:500px;">Este trabajo tiene licencia de Creative Commons Attribution-NonCommercial-ShareAlike 4.0</p>

                <span style="padding-left:0px;"><button class="btn btn-primary btn-xs active download-btn" type="button" onclick="notyConfirm();"><strong>DESCARGAR</strong></button></span>
                <input type="text" class="hide" value="0" id="stream_id">
                <input type="text" class="hide" value="0" id="music_id">
                <span style="padding-left:10px;">

                  <lord-icon src="https://cdn.lordicon.com//hhzgyzgg.json" trigger="click" target="a" colors="primary:#616A6B,secondary:#ffffff" id="like_post" stroke="100" style="width:25px;height:25px"></lord-icon>
                  <!-- <button class="btn btn-primary btn-xs active" id="like_post" ><i class="fad fa-thumbs-up"></i></button> --> </span><span style="padding-right:5px; padding-left:5px; color:#AAAAAA;" id="like_count">0</span>
                <span>
                  <lord-icon src="https://cdn.lordicon.com//hrqwmuhr.json" trigger="click" target="a" colors="primary:#616A6B,secondary:#ffffff" id="unlike_post" stroke="100" style="width:25px;height:25px"></lord-icon>
                <!-- <button class="btn btn-primary btn-xs active" id="unlike_post"><i class="fad fa-thumbs-down"></i></button> -->
                </span>
                <span style="padding-right:5px; padding-left:5px; color:#AAAAAA;" id="unlike_count">0</span>

                <span>
                  <lord-icon src="https://cdn.lordicon.com//rjzlnunf.json" trigger="click" target="a" colors="primary:#616A6B,secondary:#ffffff" id="love_post" stroke="100" style="width:25px;height:25px"></lord-icon>
                  <!-- <button class="btn btn-primary btn-xs active" id="love_post"><i class="fal fa-heart fa-lg"></i> </button><--></span>
                  <span style="padding-right:5px; padding-left:5px; color:#AAAAAA;" id="love_count">0</span>

              <span>
                  <lord-icon src="https://cdn.lordicon.com//ycojtdqt.json" trigger="click" target"a" colors="primary:#616A6B,secondary:#ffffff" id="twitter-share-button" stroke="80" style="width:30px;height:30px"></lord-icon>
                  <span style="padding-right:5px; padding-left:5px; color:#AAAAAA;" id="tweet_count">0</span>
                <!-- <button id="twitter-share-button" class="btn btn-primary btn-xs"><i class="fab fa-twitter fa-lg"></i></button>-->
              </span>

              <!-- MAIN TITTLE -->
              <div id="audioDiv" align="center" style="padding-top:7%; padding-bottom:5%;">
                <h1 id="mainTitle" style="color:#FFF; padding-left:10%;" align="left"><strong></strong></h1>
                <h5 id="mainSubtitle" align="justify" style="color:#FFF; padding-right:15%; padding-left:15%;"></h5>
              </div>
              <!-- END MAIN TITTLE -->

              <!-- COMMING NEXT SONG -->
              <div style="width:55%; margin-left:3%; border-radius:15px 50px; opacity: 0.7;">
                <div style="padding-bottom:20px; padding-left:8%; padding-right:10px; color:#aaa;">
                  <div style="margin-left:0px; margin-bottom:10px; padding-left:10px; padding-right:10px; border-radius:3px; font-weight: bold;text-align: center; background-color:#2b2b2b; height:20px; color:#fff; display:inline-block;">A continuación:</div><br>
                  <span class="next_congcls"></span>
                </div>
              </div>
              <!-- END COMING NEXT SONG -->

              <!-- PREVIOUS SONGS -->
              <div style="width:55%; margin-left:55%; margin-top:-90px; border-radius:15px 50px; opacity: 0.7; margin-bottom:30px;">
                <div style="padding-bottom:20px; padding-left:8%; padding-right:10px; color:#aaa;">
                  <div style="margin-left:0px; margin-bottom:10px; padding-left:10px; padding-right:10px; border-radius:3px; font-weight: bold;text-align: center; background-color:#f2c945; height:20px; color:#333; display:inline-block;">Canciónes recientes:</div><br>
                  <div class="prev-song-1"></div>
                  <div class="prev-song-2"></div>
                  <div class="prev-song-3"></div>
                  <div class="prev-song-4"></div>
                  <div class="prev-song-5"></div>
                </div>
              </div>
              <!-- END PREVIOUS SONGS -->
            </div>
          </div>

          <!-- AUDIO PLAYER / CONTROLS -->
          <div id="_audio_player_canv" class="hide">
            <audio id="audio_player" controls>
              <source src="https://radion.fm:8002/index.htmlplayingart?sid=undefinedver=1523434610700" type="audio/mpeg">
            </audio>
          </div>
          <!-- END AUDIO PLAYER / CONTROLS -->

          <div class="col-md-4" style="margin-top:5%;">
            <!-- MESSAGES WITH IMAGES -->
            <div align="right" style="padding-right:1%;"></div>
            <div class="messages messages-img" id="message_box1"></div>
            <!-- END MESSAGES WITH IMAGES  -->
          </div>
        </div>

        <div class="x-navigation x-navigation-horizontal">
          <!-- CHART DATA MENU -->
          <div style="color:#fff; font-family:Arial; padding-right:3%; margin-top:15px; margin-bottom:15px;" align="right">
            <span><strong>Tezos</strong></span>
            <span style="padding-left:15px; padding-right:15px;">|</span>
            <span style="padding-right:0px; color:#B3B6B7;">Capitalización de mercado:&nbsp;&nbsp;&nbsp;<i class="fas fa-dollar-sign"></i></span>
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
          <!-- END CHART DATA MENU -->
        </div>
        <br><br><br>
      </div>
      <!-- END FRONT-END MODULE -->
    </div>
    <!-- END PAGE CONTENT -->
  </div>
  <!-- END PAGE CONTAINER -->

  <!-- PAGE TITLE -->
                <div class="page-title">
                    <h2><lord-icon src="https://cdn.lordicon.com//mmspidej.json" trigger="loop" delay="11000" colors="primary:#1B1E24,secondary:#F39C12" style="width:60px;height:60px">
                    </lord-icon> <strong>ÚLTIMOS NFTs &nbsp;</strong></h2><br>
                    <div>CON DERECHOS DE AUTOR</div>
                </div>
                <!-- END PAGE TITLE -->

                <!-- NFT MARKETPLACE -->
                <div class="row" id="nfts"></div>
                <template id="temp-nft">
                  <div class="col-md-2">
                    <div class="panel panel-default nft-wrapper" style="cursor: pointer; border-radius:22px 75px 0px 0px;">
                      <div class="panel-body panel-body-image">
                        <img class="nft-artwork" src="/img/NFT.jpg" width="205" height="205" style="border-radius:22px 75px;">
                        <a href="#" class="panel-body-inform">
                          <lord-icon src="https://cdn.lordicon.com//mfayjhaa.json" trigger="hover" colors="primary:#ffffff,secondary:#ffffff" stroke="100" style="width:30px;height:30px;margin-top:-4px;margin-left:-2px;"> </lord-icon>

                        </a>
                      </div>
                      <div class="panel-body">
                        <div align="right" style="margin-top:-20px; padding-bottom:10px;"><label class="label label-default label-sm">WAV</label> | <label class="label label-primary label-sm">MP3</label></div>
                        <h3 align="center" class="nft-artist"></h3>
                        <p align="center" class="nft-title" style="margin-top:-10px;"></p>
                        <div>Creador: <span class="nft-issuer-address" style="font-size:10px; color:#979A9A;"></span></div>
                        <div>Activo: <strong><span class="nft-id"></span></strong></div>
                        <div>Género: <strong><span class="nft-genre"></span></strong></div>
                        <div>Hospedaje: <strong>IPFS</strong></div>
                        <div>Archivo: <strong>Master</strong></div>
                        <div style="padding:5px 0px 0px 0px;"><strong>NFT</strong>: <strong style="color:#2980B9;">Derechos de Autor</strong></div>
                      </div>
                      <div class="panel-footer text-muted" align="center">

                      </div>
                    </div>
                  </div>
                </template>
                <!-- END NFT MARKETPLACE -->

                        <!-- PAGE TITLE -->
                                      <div class="page-title">
                                          <h2><lord-icon src="https://cdn.lordicon.com//gybcsrib.json" trigger="loop" delay="9000" colors="primary:#1B1E24,secondary:#F39C12" style="width:60px;height:60px"> </lord-icon> ARTISTAS DESTACADOS</h2>
                                          <div align="right" style="padding:0px 30px 30px 0px; margin-top:0px;">
                                            <div style="padding:0px 333px 10px 0px;">--- LEYENDA ---</div>
                                          <div style="font-size:10px;">
                                            <span style="padding-right:10px;"><i class="fas fa-crown temp-crown fa-lg" style="color:#F39C12;"></i> = Artista Destacado</span>
                                            <span style="padding-right:10px;"><i class="fas fa-star temp-star fa-lg" style="color:#F4D03F;"></i> = Artista a la vanguardia</span>
                                            <span style="padding-right:10px;"><i class="fas fa-award temp-award fa-lg" style="color:#229954;"></i> = Colaborador con NFT</span>
                                            <span style="padding-right:10px;"><i class="fas fa-microphone-stand fa-lg" style="color:#34495E;"></i> = Influencia Destacada</span>
                                            <span style="padding-right:10px;"><i class="fas fa-star-exclamation fa-lg"></i>= Artista en Ascenso</span><br><br>
                                            <span style="padding-right:10px;"><i class="fad fa-album-collection fa-lg" style="color:#2980B9"></i> = Colector Destacado</span>
                                            <span style="padding-right:10px;"><i class="fas fa-user-music temp-music fa-lg"></i> = Musician</span>
                                            <span style="padding-right:10px;"><i class="fas fa-compact-disc fa-lg" style="color:#717D7E;"></i> = Sello Discográfico</span>
                                            <span style="padding-right:10px;"><i class="far fa-sack-dollar fa-lg"></i> = Inversionista Destacado</span>
                                          </div>
                                          </div>
                                      </div>

                                      <!-- END PAGE TITLE -->

                        <!-- TOP ARTIST -->
                <div id="top-nfts" class="d-contents"></div>
                <template id="temp-user">
                  <div class="col-md-3">
                    <div class="panel panel-default">
                      <div class="panel-body">
                        <div class="user">
                          <img class="temp-image" src="assets/images/users/user3.jpg" style="width:44px; height:44px;" width="44" height="44">
                          <a href="#" class="temp-username">Username</a>
                          <div class="pull-right" style="width: 100px;">
                            <i class="fas fa-crown fa-lg temp-crown" style="display:none; color:#F39C12;"></i>
                            <i class="fas fa-star fa-lg temp-star" style="display:none;color:#F4D03F;"></i>
                            <i class="fas fa-award fa-lg temp-award" style="display:none;color:#229954;"></i>
                            <i class="fas fa-code fa-lg temp-code" style="display:none"></i>
                            <i class="fas fa-user-music fa-lg temp-music" style="display:none"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </template>

                <div class="page-title">
                    <h2><lord-icon src="https://cdn.lordicon.com//hciqteio.json" trigger="loop" delay="19000" colors="primary:#1B1E24,secondary:#F39C12" style="width:60px;height:60px">
                    </lord-icon> <strong>ÚLTIMOS NFTs &nbsp;</strong></h2><br>
                    <div>DE MÚSICA</div>
                    </div>
                <!-- END PAGE TITLE -->

                <!-- NFT MARKETPLACE -->
                <div class="row" id="nft-editions"></div>
                <template id="temp-edition">
                  <div class="col-md-2">
                    <div class="panel panel-default" style="border-radius:22px 75px 0px 0px;">
                      <div class="panel-body panel-body-image">
                        <img class="nft-artwork" src="/img/NFT.jpg" width="205" height="205" style="border-radius:22px 75px;">
                        <a href="#" class="panel-body-inform">
                          <lord-icon src="https://cdn.lordicon.com//iiegcyhs.json" class="nft-play" trigger="click" target="a" stroke="70" colors="primary:#ffffff,secondary:#ffffff" style="width:42px;height:42px; margin-top:-7px; margin-left:-7px;"></lord-icon>
                          <!-- <i class="fas fa-play nft-play"></i> -->
                        </a>
                      </div>

                      <div class="panel-body">
                        <div align="right" style="margin-top:-20px;"><label class="label label-default label-sm nft-format"></label></div>
                        <div class="fas fa-shield-check fa-lg nft-shield" style="display:none; color:#229954; position:absolute; right:1;"></div>
                        <h3 align="center" class="nft-artist"></h3>
                        <p align="center" style="margin-top:-10px;"><span class="nft-title"></span></p>
                        <div>Creador: <span class="nft-issuer-address" style="font-size:11px; color:#979A9A;"></span></div>
                        <div>Hospedaje: <span class="nft-host"></span></div>
                        <div>Precio: <span class="nft-price" style="color:#2980B9;"></span> <span style="color:#2980B9;">tz</span><span class="nft-sold-out"> / </span><strong class="nft-sold-out">$<span class="nft-price-usd"></span></strong></div>
                        <div>Ediciones Disponibles: <strong><span class="nft-editions-avail" style="color:#F39C12;"></span></strong></div>
                        <div>Género: <span class="nft-genre"></span></div>
                        <div>Contrato: <strong><span class="nft-terms"></span></strong></div>
                        </div>

                      <div class="panel-footer text-muted" align="center">
                        <button class="btn btn-primary btn-block btn-sm nft-buy">COMPRAR</button>
                      </div>
                    </div>
                  </div>
                </template>
                      </div>


                      <!-- PAGE TITLE -->
                        <div class="page-title">
                        <h2><lord-icon src="https://cdn.lordicon.com//tvyxmjyo.json" trigger="loop" delay="13000" colors="primary:#1B1E24,secondary:#F39C12" style="width:60px;height:60px"></lord-icon>INFORMACIÓN</h2>
                        </div>
                      <!-- END PAGE TITLE -->





  <div class="row">
    <div class="col-md-6">
      <div class="panel panel-default">
        <div class="panel-body">
          <!-- PAGE TITLE -->
          <div class="page-title">
            <h2><i class="fas fa-exclamation-circle"></i> PREGUNTAS MÁS FRECUENTES</h2>
          </div>
          <!-- END PAGE TITLE -->

          <!-- START ACCORDION -->
          <div class="panel-group accordion">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a href="#accOneColOne"><i class="fal fa-check-circle fa-lg" style="color:#27AE60;"></i> ¿QUÉ HACEMOS?</a>
                </h4>
              </div>
              <div class="panel-body panel-body" id="accOneColOne" align="justify">
                RADION está involucrado en una amplia gama de roles en la industria de la música. Nuestra principal contribución se centra en proporcionar herramientas
                únicas a sellos discográficos o músicos independientes con tecnología blockchain. Sin embargo, no dejamos de lado el reclutamiento y desarrollo de nuevos artistas,
                que quieren ser representado por un sello discográfico que ofrece gestión, registro de derechos de autor, distribución y licencia de música a nivel mundial con un costo mínimo.<br><br>
                Nuestro método de distribución ayuda a establecer un crecimiento constante en la cartera de seguidores de forma lucrativa, relación que solo puede establecer nuestro sistema,
                  a través de una experiencia descentralizada entre talentos musicales y amantes de la música. <br>Los usuarios de RADION (RADIONERS) pueden descargar música
                 con criptomonedas (XTZ) y los músicos pueden recibir sus derechos de autor directamente en sus billeteras criptográficas. Este proceso es posible porque RADION
                 incorpora billeteras criptográficas en cada archivo MP3 o WAV que se carga en nuestro sistema, de esta manera los músicos reciben un pago directo a sus billeteras,
                 cada vez que alguien descarga una de sus canciones.<br><br> Tal vez te preguntes; ¿Cómo operamos con la industria fuera del espectro blockchain? Sencillo, nuestra gestión
                 es 100% compatible con la industria musical! Nos encargamos que nuestros activos tengas lo necesario para competir y formar parte de la industria de manera legal.

              </div>
            </div>

            <div class="panel panel-primary">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a href="#accOneColFive"><i class="fal fa-check-circle fa-lg" style="color:#27AE60;"></i> ¿QUÉ ES UN NFT?</a>
                </h4>
              </div>

              <div class="panel-body" id="accOneColFive" align="justify">
                NFT es el acrónimo de "Non-fungible token", el cual se puede traducir como; "token no reemplazable o token no sustituible"  Este particular token posee características únicas, pues como el nombre lo dice no se puede gastar sino transferir. El valor de este token va a depender de lo que esté vinculado. La mejor manera de explicar el valor de este token y cómo funciona es con la réplica de algún producto en particular. Por ejemplo: Un reloj Rolex no tiene cómo demostrar a un comprador que es un producto original, la única manera de hacer esto es dando un certificado de autenticidad que la misma empresa otorga.<br><br>El problema con este procedimiento es el siguiente; si el producto puede ser replicado por una copia similar, que te hace pensar que el certificado no puede ser replicado también? Es aquí donde un NFT puede resolver este problema. Vamos a suponer que Rolex comienza a imprimir y adherir NFTs a cada uno de sus productos. El que hace réplica puede incluir el código hash del producto también, sin embargo; no puede tener acceso al token en sí, y menos transferirlo a otra billetera, por lo tanto no puede confirmar que el producto es original.
              </div>
            </div>

            <div class="panel panel-primary">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a href="#accOneColSeven"><i class="fal fa-check-circle fa-lg" style="color:#27AE60;"></i> ¿PUEDO CREAR MÚSICA NFT?</a>
                </h4>
              </div>

              <div class="panel-body" id="accOneColSeven" align="justify">
                Si eres el productor de tu música o tienes los derechos de autor como entidad comercial, claro que sí. Hemos desarrollado un sistema único que permite registrar música como NFT, el cual incluye huellas digitales de audio para prevenir copias ilegales o robo de derechos de autor. Sin mencionar que también incluimos contratos legales para tratos exclusivos o no exclusivos, licencia musical, derechos de autor, entre otros.

              </div>
            </div>

            <div class="panel panel-primary">
              <div class="panel-heading">
                <h4 class="panel-title"><a href="#accOneColSix"><i class="fal fa-check-circle fa-lg" style="color:#27AE60;"></i> ¿QUÉ ES UN CONTRATO INTELIGENTE?</a></h4>
              </div>
              <div class="panel-body" id="accOneColSix" align="justify">
                Un contrato inteligente es un acuerdo entre dos personas que se ejecuta a través de código de programación computacional. Los contratos inteligentes se implementan en la cadena de bloques. Puede decir que blockchain es una red de nodos / computadoras, y las transacciones deben ser confirmadas primero por la red para que sean públicas. Las transacciones que ocurren en un contrato inteligente son procesadas por la cadena de bloques, lo que significa que pueden enviarse automáticamente sin la intervención de un tercero.<br><br>

                Un ejemplo práctico en el mundo actual, seria el siguiente; Si un músico quiere vender su música, debe ponerse en contacto con un editor de música o un sello discográfico para distribuir y gestionar la promoción de su música. Esta entidad garantiza la colección de derechos de autor a cambio de una porcentaje de las ganancias. Esa intervención le costará al artista un porcentaje significativo de los ingresos totales. El músico recibirá un cheque de esta entidad pero sólo después de que este tercero tome su porcentaje. ¡Hoy, la industria de la música tradicional ofrece un promedio de $0,09 centavos al músico por copia vendida!<br><br>

                Por otro lado tenemos una plataforma como RADION que trabaja con contratos inteligentes, la aplicación es la que brinda la plataforma para permitir la interacción entre músicos y amantes de la música sin involucrar intermediarios. En otras palabras, si el músico pide $1,00 USD por copia y el comprador acepta el precio, el músico recibe $1,00 USD por esa copia.
</div>
            </div>

            <div class="panel panel-primary">
              <div class="panel-heading">
                <h4 class="panel-title"><a href="#accOneColTwo"><i class="fal fa-check-circle fa-lg" style="color:#27AE60;"></i> ¿TRABAJAMOS CON LICENCIAS DE MÚSICA?</a></h4>
              </div>
              <div class="panel-body" id="accOneColTwo" align="justify">
                RADION puede trabajar con otros sellos discográficos que trabajan bajo el modelo tradicional de licencias o también podemos trabajar con licencias de creative commons. Nuestra plataforma quiere mantener las cosas simples para sus usuarios, por lo que ofrecemos licencias de música creative commons para aquellos que no tienen un sello discográfico o una entidad que los represente. Este enfoque permite a los músicos comercializar su música y mantener sus derechos de autor sin sacrificar sus oportunidades de posibles acuerdos que puedan surgir con el tiempo.
              </div>
            </div>

            <div class="panel panel-primary">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a href="#accOneColThree"><i class="fal fa-check-circle fa-lg" style="color:#27AE60;"></i> ¿ES RADION UNA PLATAFORMA DE TRANSMISIÓN DE MÚSICA?</a>
                </h4>
              </div>
              <div class="panel-body" id="accOneColThree" align="justify">
                ¡Sí lo es! Pero lo que nos diferencia del resto es la forma en que trabajamos con la música. ¡Vemos canciones, podcasts y ritmos como activos! Producimos archivos (MP3) listos para realizar transacciones sin dañar el archivo o cambiar su formato, sin afectar los derechos de autor y 100% compatible con las principales plataformas de música del mercado actual, que incluyen, entre otras, iTunes, Spotify, YouTube Music , Soundcloud, Napster, ¡entre otros! Nuestra promoción y distribución es gratuita y está abierta a cualquier radio en línea que admita la alimentación de URL. La transmisión de nuestra estación depende de la retroalimentación de nuestras redes de igual a igual arbitrada por los usuarios.
              </div>
            </div>

            <div class="panel panel-primary">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a href="#accOneColFour"><i class="fal fa-check-circle fa-lg" style="color:#27AE60;"></i> ¿QUÉ TIPO DE TECNOLOGÍA UTILIZAMOS?</a>
                </h4>
              </div>
              <div class="panel-body" id="accOneColFour" align="justify">
                La plataforma RADION funciona con el protocolo Tezos. Tezos es una plataforma de contrato inteligente basada en el consenso de prueba de participación. Esta tecnología nos permite explorar y desarrollar herramientas web no convencionales para la industria de la música. Tezos está vinculado a una criptomoneda digital llamada tez (XTZ), que es parte de nuestro método de pago único para músicos.</div>
            </div>
          </div>
          <!-- END ACCORDION -->
        </div>
      </div>
    </div>

    <!-- FEATURES FORM -->
    <div class="col-md-3">
      <div class="panel panel-default">
        <div class="panel-body">
          <h2><i class="fad fa-sliders-v-square"></i> NOS CARACTERIZAMOS</h2>
        </div>
        <div class="panel-body list-group" style="padding:0px 10px 30px 10px;">
          <div class="list-group-item">
            <h6 style="padding-left:5px;"><strong><i class="fas fa-hashtag fa-2x"></i> CREAMOS NFT GENUINOS DE MÚSICA</strong></h6>
            Creamos NFT genuinos para proteger derechos de autor y distribuir legalmente.<br/>
          </div>

		  <div class="list-group-item">
            <h6 style="padding-left:5px;"><strong><i class="fab fa-creative-commons fa-2x"></i> LICENCIAS Y DERECHOS DE AUTOR</strong></h6>
            Trabajamos con diferentes tipos de licencias para descargas y ventas de musica NFT.<br/>
          </div>
          <div class="list-group-item">
            <h6 style="padding-left:5px;"><strong><i class="fal fa-fingerprint fa-2x"></i> HUELLA DACTILAR EN AUDIO</strong></h6>
            Usamos huella dactilar en audio para identificar y prevenir el uso no autorizado de canciones.<br/>
          </div>
          <div class="list-group-item">
            <h6 style="padding-left:5px;"><strong><i class="fas fa-file-contract fa-2x"></i> CONTRATOS LEGALES</strong></h6>
            Integramos contratos legales en todos nuestros activos digitales para cumplir con normas legales.<br/>
          </div>
          <div class="list-group-item">
            <h6 style="padding-left:5px;"><strong><i class="far fa-wallet fa-2x"></i> PAGOS DIRECTOS</strong></h6>
            Recibes pagos directos a tu billetera cada vez que alguien descarga tu canción.<br/>
          </div>
          <div class="list-group-item">
            <h6 style="padding-left:5px;"><strong><i class="fas fa-chart-network fa-2x"></i> RED SIN INTERMEDIARIOS</strong></h6>
            Transacciones sin intermediarios, directo entre musicos y amantes de la musica.<br/>
          </div>
        </div>
      </div>
    </div>
    <!-- END FEATURE FORM -->

    <!-- TWITTER FORM -->
    <div class="col-md-3">
      <div class="panel panel-default">
        <div class="panel-body">
          <h2><i class="fab fa-twitter"></i> TWEETS MÁS RECIENTES</h2>
          <div class="user">
            <img src="/img/logo-test.png" alt="RADION FM">
            <a href="#" class="name">@fm_radion</a>
            <div class="pull-right" style="width: 100px;">
              <button class="btn btn-info btn-block"><a href="https://twitter.com/fm_radion" target="blank" rel="nofollow"><i class="fab fa-twitter"></i> Follow</a></button>
            </div>
          </div>
        </div>
        <div class="panel-body list-group" style="overflow: hidden;">
          <a class="twitter-timeline" data-height="555" href="https://twitter.com/fm_radion?ref_src=twsrc%5Etfw">Tweets by fm_radion</a>
        </div>
      </div>
    </div>
    <!-- END TWITTER FORM -->
  </div>

  <!-- START SIDEBAR -->
  <div class="sidebar">
    <div class="sidebar-wrapper scroll">
      <div class="sidebar-tabs">
        <a href="#sidebar_1" class="sidebar-tab"><i class="fas fa-newspaper"></i>&nbsp;&nbsp;NOTICIAS</a>
        <a href="#sidebar_2" class="sidebar-tab"><i class="far fa-exclamation-circle"></i>&nbsp;&nbsp;&nbsp;CONTRATOS Y LICENCIAS</a>
      </div>

      <div class="sidebar-tab-content form-horizontal active" id="sidebar_1">
        <div style="padding-left:30px; padding-right:30px; height:1150px;">
          <small>
            <h5 style="color:#fff;">Feb 14 2021</h5>
            <p align="justify">Tezos upgraded its protocol with EDO. We are updating our platform to support the new upgrade.</p>
					</small>

          <div style="border-bottom: 1px dashed #7B7D7D; padding-top:10px;"></div>

          <small>
            <h5 style="color:#fff; padding-top:10px;">Jan 11 2021</h5>
            <p align="justify">New update! Now we support the cryptocurrency wallet Thanos. Thanos is a web extension for your browser, that work with Tezos Blockchain. For more information please visit <a href="https://thanoswallet.com" target="blank">Thanos</a> website.</p>
          </small>

          <div style="border-bottom: 1px dashed #7B7D7D; padding-top:10px;"></div>

          <small>
            <h5 style="color:#fff; padding-top:10px;">Dec 22 2020</h5>
            <p align="justify">Tezos Foundation have opened their grant platform for new grant proposals and we have submitted a proposal as "Payment Solution for Music Industry". We hope to receive this grant in order to continue our development effort. </p>
          </small>

					<div style="border-bottom: 1px dashed #7B7D7D; padding-top:10px;"></div>

					<small>
            <h5 style="color:#fff; padding-top:10px;">Sep 20 2020</h5>
            <p align="justify">New Convertion Rate feature is added to UI in order to see XTZ balance in USD. We are also start working on a Spanish version of our UI.</p>
          </small>

          <div style="border-bottom: 1px dashed #7B7D7D; padding-top:10px;"></div>

          <small>
            <h5 style="color:#fff; padding-top:10px;">Jun 27 2020</h5>
            <p align="justify">Withdraw is now available in our exchange. We don't charge fees! API integration was implemented in our platform to monitor Tezos price in Real-Time and support other features that rely on real time value. QR Code was also integrated to support deposit.</p>
          </small>

          <div style="border-bottom: 1px dashed #7B7D7D; padding-top:10px;"></div>

          <small>
            <h5 style="color:#fff; padding-top:10px;">May 17 2020</h5>
            <p align="justify">We release a functional ads program in our UI to the public! Now Users can advertise without censorship in our platform. Impressions value and purchase are made on XTZ.</p>
          </small>

          <div style="border-bottom: 1px dashed #7B7D7D; padding-top:10px;"></div>

          <small>
            <h5 style="color:#fff; padding-top:10px;">Mar 03 2020</h5>
            <p align="justify">Integrating Taquito Library in UI and Testing some features in Mainnet. Now users can create new wallets and use them to interact with our platform.</p>
          </small>

          <div style="border-bottom: 1px dashed #7B7D7D; padding-top:10px;"></div>

          <small>
            <h5 style="color:#fff; padding-top:10px;">Jan 20 2020</h5>
            <p align="justify">We start migrating to Tezos Blockchain. Code will be modified in all our features accordingly. Soon to be tested...</p>
					</small>

          <div style="border-bottom: 1px dashed #7B7D7D; padding-top:10px;"></div>

          <small>
            <h5 style="color:#fff; padding-top:10px;">Dec 26 2019</h5>
            <p align="justify">
              RADION FM beta was working under Ethereum Testnet, however, during this period of time we learned that as we integrated new features in our platform we have to create new contracts with the new updates. Unfortunately this is a path that doesn't fit our needs because Music Industry require a scalability and flexible expansion!<br><br>
              Micropayment as well as Distribution are some of the challenges that the talented musicians are facing today, therefore; in order to provide a real solution to the industry; we need a solid technology that allows easy scalability and a robust consensus mechanism to fit our project, and what better option than Tezos.
            </p>
					</small>
        </div>
      </div>

      <div class="sidebar-tab-content form-horizontal" id="sidebar_2">
        <p style="padding:10px 30px 0px 30px; color:#B3B6B7;" align="justify"><small style="color:#fff;">RADION FM respeta los derechos de propiedad intelectual de otros y esperamos que nuestros usuarios hagan lo mismo. Usamos contratos legales para detallar los términos a los que está sujeto el activo, junto con su licencia. Los compradores deben respetar los términos del contrato para evitar infracciones de derechos de autor y evitar posibles sanciones.</small><br><br>
</small></p>
<div style="border-bottom: 1px dashed #7B7D7D; padding: 0px 30px 0px 30px; "></div>
<p style="padding:20px 40px 0px 40px; color:#B3B6B7;" align="justify">
<small><span style="color:#fff;"><strong>Contrato E</strong></span> - Terminos por 1 Año / Precio Sugerido <span style="color:#f2c945;">$20</span> USD<br><br>
MP3: Yes<br>
WAV: No<br>
Licencia: Attributions / No Derivatives | <i class="fab fa-creative-commons fa-lg"></i> <i class="fab fa-creative-commons-by fa-lg"></i> <i class="fab fa-creative-commons-nd fa-lg"></i><br>
Descargas Gratuitas: No<br>
Distribucion de Copias Limitadas: 3000<br>
Presentaciones (Sin fin de lucro): Sin limite<br>
Presentaciones Pagadas: No autorizado<br>
Autorización para usar en (YouTube): Yes - 1 video<br>
Servicio de Transmisión: Ilimitada<br>
Transmisión en Video: No autorizado<br>
Derechos de Transmisión de Radio: No incluidas<br>
Numero de estaciones de radio: 0<br>
Derechos Exclusivos de autor: No<br><br>
Esta licencia permite a otros reutilizar el trabajo para cualquier propósito, incluso comercial; sin embargo, no se puede compartir con otros de forma adaptativa y se debe dar crédito.<br><br></small></p>

<div style="border-bottom: 1px dashed #7B7D7D; padding-right:30px; padding-left:30px;"></div>

<p style="padding:20px 40px 0px 40px; color:#B3B6B7;" align="justify"><small>
<span style="color:#fff;"><strong>Contrato T</strong></span>- Terminos por 1 Año / Precio Sugerido <span style="color:#f2c945;">$100</span> USD<br><br>
MP3: Yes<br>
WAV: No<br>
Licencia: Attributions / No Derivatives | <i class="fab fa-creative-commons fa-lg"></i> <i class="fab fa-creative-commons-by fa-lg"></i> <i class="fab fa-creative-commons-nd fa-lg"></i><br>
Sacar de Inventario: Si
Descargas Gratuitas: No<br>
Distribucion de Copias Limitadas: 8000<br>
Presentaciones (Sin fin de lucro): No<br>
Presentaciones Pagadas: 200<br>
Autorización para usar en (YouTube): Si - 2 videos<br>
Servicio de Transmisión: Ilimitada<br>
Transmisión en Video: No autorizado<br>
Derechos de Transmisión de Radio: Yes<br>
Numero de estaciones de radio: Ilimitado<br>
Derechos Exclusivos de autor: No<br><br>
Esta licencia permite a otros reutilizar el trabajo para cualquier propósito, incluso comercial; sin embargo, no se puede compartir con otros de forma adaptativa y se debe dar crédito.<br><br></small></p>

<div style="border-bottom: 1px dashed #7B7D7D; padding:10px;"></div>

<p style="padding:20px 40px 0px 40px; color:#B3B6B7;" align="justify"><small>
<span style="color:#fff;"><strong>Contrato P</strong></span> - Terminos por 1 Año / Price Sugerido <span style="color:#f2c945;">$300</span> USD<br><br>
MP3: Yes<br>
WAV: No<br>
Licencia: Attributions / No Derivatives | <i class="fab fa-creative-commons fa-lg"></i> <i class="fab fa-creative-commons-by fa-lg"></i> <i class="fab fa-creative-commons-nd fa-lg"></i><br>
Sacar de Inventario: Si<br>
Descargas Gratuitas: No<br>
Distribucion de Copias Limitadas: 10000<br>
Presentaciones (Sin fin de lucro): No<br>
Presentaciones Pagadas: Ilimitadas<br>
Autorización para usar en (YouTube): Si- Ilimitado<br>
Servicio de Transmisión: Ilimitada<br>
Video Streams: No<br>
Derechos de Transmisión de Radio: Si<br>
Numero de estaciones de radio: Ilimitado<br>
Derechos Exclusivos de autor: No<br><br>
Esta licencia permite a otros reutilizar el trabajo para cualquier propósito, incluso comercial; sin embargo, no se puede compartir con otros de forma adaptativa y se debe dar crédito.<br><br></small></p>

<div style="border-bottom: 1px dashed #7B7D7D; padding:10px;"></div>

<p style="padding:20px 40px 0px 40px; color:#B3B6B7;" align="justify"><small>
<span style="color:#fff;"><strong>Derechos de Autor</strong></span> - Permanente / Precio Sugerido <span style="color:#f2c945;">$2000</span> USD<br><br>
MP3: No<br>
WAV: Si<br>
Licencia: N/A<br>
Sacar de Inventario: Si<br>
Descargas Gratuitas: Sin Restricción<br>
Distribution Copies: Sin Restricción<br>
Performances (No-Profit): Sin Restricción<br>
Paid Performances: Sin Restricción<br>
Music Videos or (YouTube video): Sin Restricción<br>
Audio Streams: Sin Restricción<br>
Video Streams: Sin Restricción<br>
Broadcasting Rights: Sin Restricción<br>
Number of radio stations: Sin Restricción<br>
Exclusive Rights: Si<br><br>
Este contrato se puede adquirir solo a través de un NFT, de modo que el nuevo propietario tenga posesión absoluta del activo, incluyendo: token, contrato legal y el archivo.<br><br>
</small></p>
      </div>
    </div>
  </div>
  <!-- END SIDEBAR -->

  <footer>
    <div class="page-content-wrap">
      <div class="row" style="padding-bottom:10px;">
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-footer">
              <div class="col-md-3" align="left" style="height:150px; padding-right:1%; padding-top:25px;">
                <blockquote>
                  <strong>- DIVULGACIÓN -</strong><br>
                  <div style="padding-top:8px;"></div>
                  <i class="fab fa-creative-commons fa-2x"></i> <i class="fab fa-creative-commons-by fa-2x"></i>
                  <span align="justify" style="font-size:13px;">Salvo que se indique lo contrario, el contenido de este sitio tiene una licencia <a href="creative-commons-CC-BY-4_0.php" style="text-decoration:none">Creative Commons Attribution 4.0 International license</a>.</span>
                </blockquote>
              </div>
              <div class="col-md-3" align="left" style="height:150px; padding-right:1%; padding-top:25px;">
                <blockquote>
                  <strong>- ÚNETE A NUESTRA COMUNIDAD -</strong><br>
                  <div style="padding-top:8px;"></div>
                  <p>Siguenos en las redes sociales.</p>
                  <!-- SOCIAL MEDIA -->
                  <span data-toggle="tooltip" data-placement="bottom" title="Twitter" style="margin-left:0px;"><a href="https://twitter.com/fm_radion" target="blank" rel="nofollow"><i class="fab fa-twitter fa-2x" style="color:#22262E;"></i></a></span>
                  <span><a href="https://www.youtube.com/channel/UCuJOeoT-2o2stPXXJJGzAdg" target="blank" rel="nofollow" data-toggle="tooltip" data-placement="bottom" title="YouTube"><i class="fab fa-youtube fa-2x" style="color:#22262E;"></i></a></span>
                  <span><a href="https://t.me/joinchat/TdHnxqPrcJPK3mZ1" target="blank" rel="nofollow" data-toggle="tooltip" data-placement="bottom" title="Telegram"><i class="fab fa-telegram fa-2x" style="color:#22262E;"></i></a></span>
                  <span><a href="https://www.tiktok.com/@radion_music" target="blank" rel="nofollow" data-toggle="tooltip" data-placement="bottom" title="Tik-Tok"><i class="fab fa-tiktok fa-2x" style="color:#22262E;"></i></a></span>
                  <!-- SOCIAL MEDIA -->
                  <div style="padding-top:8px;"></div>
                </blockquote>
              </div>

              <div class="col-md-3" align="left" style="height:150px; padding-right:1%; padding-top:25px;">
                <blockquote>
                  <strong>- TECNOLOGÍA -</strong><br>
                  <div style="padding-top:8px;"></div>
                  <p>Tezos es un protocolo de código abierto donde puede crear aplicaciones descentralizadas.</p>
                  <button type="button" class="btn btn-default btn-xs"><a href="https://tezos.com/get-started/" target="blank">LEER MÁS</a></button>
                </blockquote>
              </div>

              <div class="col-md-3" align="left" style="height:150px; padding-right:1%; padding-top:25px;">
                <blockquote>
                  <strong>- ¡APOYA NUESTRO PROYECTO! -</strong><br>
                  <div style="padding-top:8px;"></div>
                  <div style="margin-right: 20%;">Aceptamos donación (XTZ) para continuar con nuestra causa.</div>
                  <div style="margin-left:80%; margin-top:-80px;" align="center"><img src="img/qr-code.png" style="height:80px; width:80px;"></div>
                </blockquote>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="page-content">
      <!-- START DASHBOARD CHART -->
      <div class="block-full-width" style="padding-top:0px; margin-top:0px; margin-bottom:0px;">
        <div class="tezos_graph">
          <div id="charts-legend"></div>
          <div id="legend"></div>
          <div style="filter:alpha(opacity=10); opacity: 0.9; padding-left:10px; margin-top:-20px; background-color:#33414E; margin-bottom:10px;">
            <div align="left" style="color:#33414E; width:50px; height:50px;">
              <svg xmlns="http://www.w3.org/2000/svg" width="47" height="64" viewBox="0 0 47 64">
                <path style="fill:#85929E;" d="M30.252 63.441c-4.55 0-7.864-1.089-9.946-3.267-2.08-2.177-3.121-4.525-3.121-7.041 0-.92.181-1.694.544-2.323a3.993 3.993
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
            <div align="left" style="color:#85929E; padding-left:25px; margin-top:-5px;"></div>
          </div>
        </div>
      </div>
      <!-- END DASHBOARD CHART -->
    </div>

    <div class="x-content-footer" align="center" style="padding-left:2%; padding-right:2%; background-color:#33414E; margin-top:200px;">
      <a style="text-decoration: none;" href="our-mission-es.php" target="blank" class="linko"> Nuestra Misión</a>
      <span style="color: #85929E;">|</span>
      <a style="text-decoration: none;" href="intellectual-property-policy-es.php" class="linko"> Política de propiedad intelectual</a>
      <span style="color: #85929E;">|</span>
      <a style="text-decoration: none;" href="billboard.php" class="linko"> Billboard</a>
      <span style="color: #85929E;">|</span>
      <a style="text-decoration: none;" href="radion-ads-es.php" class="linko"> Publicidad</a>
      <span style="color: #85929E;">|</span>
      <a style="text-decoration: none;" href="creative-commons-es.php" class="linko"> Creative Commons</a>
      <span style="color: #85929E;">|</span> <a style="text-decoration: none;" href="white-paper.pdf" target="blank" class="linko"> Documento Oficial</a>
      <span style="color: #85929E;">|</span> <a style="text-decoration: none;" href="free-ID3-tag-editor.php" target="blank" class="linko"> ID3 Tag Editor</a>
      <div style="padding-top:30px; padding-bottom:10px;">
        <p style="color:#85929E; margin-bottom:-3px;">&copy; 2021 RADION Beta V1.1 </p>
        <p style="color:#85929E;">Hecho con <i class="fas fa-heart"></i> en Delaware, USA.</p>
      </div>
    </div>

    <div style="background-color:#33414E; padding-bottom:10px; padding-right:30px;" align="right">
      <a style="text-decoration: none;" href="privacy-policy.php" class="linko">Política de Privacidad</a>
      <span style="color: #85929E;">|</span> <a style="text-decoration:none;" href="terms-of-use.php" class="linko">Terminos de Uso </a>
      <span style="padding-right:20px; padding-left:20px;"></span>
      <a href="https://github.com/amakary" target="blank" rel="nofollow" style="color:#fff;"><i class="fab fa-github fa-lg"></i></a>
    </div>
  </footer>

  <!-- MESSAGE BOX-->
  <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
    <div class="mb-container" align="left">
      <div class="mb-middle">
        <div class="mb-title"><span class="fas fa-sign-out-alt"></span> Terminar <strong>Sesión</strong> ?</div>
        <div class="mb-content">
          <p>Estas seguro que quieres terminar tu sesión?</p>

        </div>
        <div class="mb-footer">
          <div class="pull-right">
            <a href="/slpw/sitelokpw.php?sitelokaction=logout" class="btn btn-success btn-lg">Si</a>
            <button class="btn btn-default btn-lg mb-control-close">No</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- END MESSAGE BOX-->

  <!-- MESSAGE BOX-->
  <div class="message-box animated fadeIn" data-sound="alert" id="mb-dashboard">
    <div class="mb-container" align="left">
      <div class="mb-middle">
        <div class="mb-title"><span class="fas fa-sign-in-alt"></span> <strong>VAMOS A ROCKEAR!</strong></div>
        <div class="mb-content">
          <p align="justify">
            <strong style="color:#F39C12;">Importante Recordatorio:</strong><br>
            Estás a un click de entrar a nuestro panel de control. RADION FM es un proyecto experimental en desarrollo, apoyado por <a href="https://tezos.foundation">Tezos Foundation</a>. Nuestro sistema está enfocado en brindar
            nuevas herramientas a la industria musical con el fin de introducir nueva tecnología y colaborar con otros sellos discográficos de manera legal y segura. Nos reservamos el derecho de cerrar/terminar cuentas a usuarios que no participan de buena fe y tratan de engañar nuestro sistema con fines de lucro.
			</p><br>
          <p>Ya sabes que hacer!</p>
        </div>
        <div class="mb-footer">
          <div class="pull-right">
            <a href="edit-profile.php" class="btn btn-info btn-lg">Gracias</a>
            <button class="btn btn-default btn-lg mb-control-close">No entrar</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- END MESSAGE BOX-->

  <!-- MODAL FOR SIGNER -->
  <div class="modal" id="modal_basic" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
    <div class="modal-dialog" style="width:480px;">
      <div class="modal-content">
      </div>
    </div>
  </div>
  <!-- END MODAL FOR SIGNER -->

  <!-- START PRELOADS -->
  <audio id="audio-alert" src="audio/alert.mp3" preload="auto"></audio>
  <audio id="audio-fail" src="audio/fail.mp3" preload="auto"></audio>
  <!-- END PRELOADS -->

	<!-- START PLUGINS -->
  <script src="/js/plugins/jquery/jquery.min.js"></script>
  <script src="/js/plugins/jquery/jquery-ui.min.js"></script>
	<script src="/js/plugins/bootstrap/bootstrap.min.js"></script>
	<script src="/js/all.js"></script>
  <!-- END PLUGINS -->

  <script src="/js/plugins/morris/raphael-min.js"></script>
	<script src="/js/plugins/rickshaw/rickshaw.min.js"></script>
	<script src="/js/plugins/bootstrap/bootstrap-file-input.js"></script>
  <script src="/js/plugins/bootstrap/bootstrap-select.js"></script>

  <!-- THIS PAGE PLUGINS -->
  <script src="/js/plugins/icheck/icheck.min.js"></script>
  <script src="/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
  <!-- END PAGE PLUGINS -->

  <script src="/js/plugins/noty/jquery.noty.js"></script>
  <script src="/js/plugins/noty/layouts/topCenter.js"></script>
  <script src="/js/plugins/noty/layouts/topLeft.js"></script>
  <script src="/js/plugins/noty/layouts/topRight.js"></script>
  <script src="/js/plugins/nvd3/lib/d3.v3.js"></script>
  <script src="/js/plugins/nvd3/nv.d3.min.js"></script>
  <script src="/js/plugins/noty/themes/default.js"></script>

  <!-- Background Script -->
  <script src="/js/backgroundChange-es.js"></script>
  <script src="/js/tezos.js"></script>
  <script src="js/demo_dashboard.js"></script>
  <script src="https://unpkg.com/ipfs@0.54.4/dist/index.min.js"></script>
  <script src="https://unpkg.com/@airgap/beacon-sdk@2.3.1/dist/walletbeacon.min.js"></script>
  <script>window.beaconSdk = beacon</script>
  <script src="https://unpkg.com/@taquito/taquito@10.1.0/dist/taquito.min.js"></script>
  <script src="https://unpkg.com/@taquito/beacon-wallet@10.1.0/dist/taquito-beacon-wallet.umd.js"></script>
  <script src="https://unpkg.com/@taquito/michel-codec@10.1.0/dist/taquito-michel-codec.umd.js"></script>
  <script src="/js/helpers.js"></script>
  <script src="/js/ipfs.js"></script>

  <!-- BACKGROUND SCRIPT MODULAR -->
  <script>
  async function getCurrentMetadata (sid = '1') {
    return new Promise((resolve, reject) => {
      $.ajax('/php/get_metadata.php', {
        type: 'GET',
        dataType: 'json',
        data: { sid: sid },
        success: function (data, status, xhr) {
          resolve(data)
        },
        error: function (xhr, status, error) {
          reject(error)
        }
      })
    })
  }

  async function getCurrentOwner (tokenId) {
   return new Promise((resolve, reject) => {
     $.ajax('https://api.better-call.dev/v1/contract/mainnet/KT1MR8e46WJBq4RcFSogiDbSg3ceDRi81hpE/tokens/holders', {
       type: 'GET',
       dataType: 'json',
       data: { token_id: tokenId },
       success: function (data, status, xhr) {
         for (const address in data) {
           if (data[address] === '1') {
             resolve(address)
             break
           }
         }
       },
       error: function (xhr, status, error) {
         reject(error)
       }
     })
   })
  }

  function notyConfirm () {
    if (!window.price) return
    noty({
      text: '<div align="justify" style="padding:15px;"><div><i class="fad fa-cart-arrow-down fa-2x"></i> &nbsp;&nbsp;<strong>DESCARGAR ACTIVO</strong></div><div style="padding-left:60%; margin-top:-14px; font-size:10px; color:#f2c945;"><i class="fas fa-signal-stream fa-lg"></i> <strong id="d_station_name">ESTACIÓN PRINCIPAL</strong> </div><div style="margin-top:10px; color:#999999; padding-bottom:1px;"><strong>Artista</strong>:&nbsp;&nbsp;&nbsp;<span style="color:#F2F4F4;" id="d_artist_name"></span></div><div style="color:#999999; padding-bottom:2px;"><strong>Canción</strong>:&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:#F2F4F4;" id="d_song_name"></span></div><div style="color:#999999; padding-bottom:2px;"><strong>Activo:</strong>&nbsp;&nbsp;&nbsp;<span style="color:#F2F4F4;" id="d_album_name"></span></div><div style="padding-left:50%; position:absolute; margin-top:-15px; font-size:10px;"><strong>Licencia</strong>: <span style="color:#999999;"> <i class="fab fa-creative-commons fa-lg" style="color:#ccc;"></i> <i class="fab fa-creative-commons-by fa-lg" style="color:#ccc;"></i> <i class="fab fa-creative-commons-nc fa-lg" style="color:#ccc;"></i> <i class="fab fa-creative-commons-nd fa-lg" style="color:#ccc;"></i> </span></div><div style="color:#999999; font-size:0px;"">ID #:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:#fff; font-size:px;" id="d_id"> </span></div></div><div style="padding-left:10px; margin-bottom:0px;"><strong style="color:#f2c945;">TOTAL:&nbsp;&nbsp;</strong> <span style="color:#f2c945;" class="tezos-price">' + window.price + ' &#42793;</span>&nbsp;&nbsp;=&nbsp;&nbsp; $1.00 USD<div style="font-size:10px; position: absolute;left: 20px; bottom: -25px; z-index: 1; color:#808080;">En Tezos Blockchain</div></div>',
      layout: 'topRight',
      buttons: [
        {
          addClass: 'btn btn-primary btn-clean btn-sm',
          text: '&#42793; Pagar',
          onClick: function (noti) {
            noti.close()
            make_purchase()
          }
        },
        {
          addClass: 'btn btn-primary btn-clean btn-sm',
          text: 'Cancelar',
          onClick: function (noti) {
            noti.close()
            noty({
              icon: 'info',
              text: '<i class="far fa-exclamation-circle fa-lg"></i> Transacción cancelada.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp <i class="fal fa-times-circle fa-lg"></i>',
              layout: 'topRight',
              type: 'error',
              timeout: 5000
            })
          }
        }
      ]
    })
  }

  const { TezosToolkit } = taquito
  const { BeaconWallet } = taquitoBeaconWallet
  const { packDataBytes } = taquitoMichelCodec
  const { NetworkType } = beacon

  const rpc = 'https://mainnet-tezos.giganode.io'
  const tezos = new TezosToolkit(rpc)
  const wallet = new BeaconWallet({
    name: 'RADION FM',
    iconUrl: 'https://www.radion.fm/favicon/apple-icon-60x60.png',
    appUrl: 'https://www.radion.fm'
  })

  tezos.setWalletProvider(wallet)

  async function make_purchase () {
    const network = { type: NetworkType.MAINNET, rpcUrl: rpc }
    await wallet.requestPermissions({ network })

    const sid = window.sid
    const metadata = await getCurrentMetadata(sid)
    const id = metadata.talb
    const tokenId = metadata.token_id
    const address = metadata.comm
    const downloadPrice = window.price

    if (window.price <= 0) {
      noty({
        text: 'Invalid price',
        type: 'error',
        layout: 'topRight',
        timeout: 5000
      })
      return
    }

    try {
      // Transfer 1.00USD to owner
      const op = await tezos.wallet.transfer({
        to: address,
        amount: downloadPrice
      }).send()

      const hash = op.opHash
      // Display TRANSACTION SENT alert
      noty({
        text: '<i class="far fa-exclamation-circle fa-lg"></i> Transacción enviada. Espera por confirmacion!',
        layout: 'topRight',
        type: 'information',
        timeout: 9000
      })

      // Confirmation
      const result = await op.confirmation(1)
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
          html: '<br><p align="left" style="padding-left:10px;">¡TENEMOS CONFIRMACIÓN!</p><hr><p align="left" style="padding-left:10px;"><strong>Transacción ID/Hash:</strong></p><p align="left" style="font-size:13px;padding-left:10px;">' + hash + '</p>',
          confirmButtonText: '<i class="fas fa-external-link-alt"></i> Ver en TzStats',
          showCancelButton: true,
          cancelButtonText: "<i class='fas fa-thumbs-up'></i> Gracias"
        })

        if (sweetAlert.value) window.open('https://tzstats.com/' + hash)
      } else {
        await Swal.fire({
          icon: 'error',
          title: 'Oh No. Incapaz de confirmar pago',
          text: 'Por favor revise sus fondos antes de enviar un pago.'
        })
      }
    } catch (e) {
      console.error(e)
      noty({
        text: 'Mire su balance. Asegúrese que tiene suficientes fondos.',
        layout: 'topRight',
        type: 'error',
        timeout: 5000
      })
    }
  }

  function transactionCancelled () {
    noty({
      text: '<i class="far fa-exclamation-circle fa-lg"></i> La transacción ha sido cancelada.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp <i class="fal fa-times-circle fa-lg"></i>',
      layout: 'topRight',
      type: 'error',
      timeout: 5000
    })
  }

  // Loop for checking history
  async function updateHistory () {
    $.get('/php/history_update.php')
  }

  // Loop for checking song updates and votes
  async function updateSong () {
    const sid = window.sid || 1
    const mid = window.mid
    const metadata = await getCurrentMetadata(sid)

    if (metadata.talb !== mid) {
      window.mid = metadata.talb
      const date = new Date()
      const timestamp = date.getTime()
      const nextSong = metadata.extension.pop()
      const userId = metadata.userid
      const userhash = metadata.useridhash
      const idhash = await getHash(metadata.talb)
      const nft = metadata.nft
      const text = encodeURIComponent('Estoy escuchando "' + metadata.tit2 + '". Puedes descargar esta canción con #crypto - tez/$XTZ - en RADION FM - @fm_radion.')
      const shareURL = encodeURIComponent('https://radion.fm/song-player.php?id=' + metadata.talb + '&hash=' + idhash)
      const intentURL = 'https://twitter.com/intent/tweet?text=' + text + '&url=' + shareURL

      $(nft ? '#nft-warn' : '#nft-check').css('display', 'none')
      $(nft ? '#nft-check' : '#nft-warn').css('display', 'initial')
      $('#playingart').attr('src', metadata.artwork)
      $('#artist_name').text(metadata.tpe1)
      $('.songTitleSpan').text(metadata.tit2)
      $('#username').text(metadata.username)
      $('#username').attr('href', 'user-profile.php?uid=' + userId + '&hash=' + userhash)
      $('.next_congcls').text(nextSong.soon)
      $('#twitter-share-button').off().click(function (event) {
        event.preventDefault()
        window.open(intentURL, 'childwindow', 'width=550,height=425,toolbar=0,status=0')
        $.post('/php/tweet.php', { id: window.mid })
      })
    }

    const downloadBtn = $('.download-btn')
    if (downloadBtn.is(':disabled')) downloadBtn.removeAttr('disabled')

    if (metadata.copyright !== '') {
      const cc = metadata.copyright.split('-')
      $('[class|="cc-icon"]').hide()
      if (cc.includes('by')) $('.cc-icon-by').show()
      if (cc.includes('nc')) $('.cc-icon-nc').show()
      if (cc.includes('nd')) $('.cc-icon-nd').show()
      if (cc.includes('sa')) $('.cc-icon-sa').show()
    }

    $('#like_count').text(metadata.isLikes)
    $('#unlike_count').text(metadata.isUnlike)
    $('#love_count').text(metadata.isLoveIt)
    $('#tweet_count').text(metadata.tweets)
  }

  async function updatePrevious () {
    $.ajax('/php/previous_songs.php', {
      type: 'GET',
      dataType: 'json',
      cache: false,
      success: function (data, status, xhr) {
        for (let i = 0; i < 5; i++) {
          const title = data[i].title
          $('.prev-song-' + (i + 1).toString()).text(title)
        }
      },
      error: function (xhr, status, error) {
        noty({
          text: error,
          layout: 'topRight',
          type: 'error',
          timeout: 5000
        })
      }
    })
  }

  // Loop for checking marketplace submissions
  async function updateSubmission () {
    return new Promise((resolve, reject) => {
      $.ajax('/php/waiting_to_discover_list.php', {
        type: 'GET',
        dataType: 'json',
        success: function (data, status, xhr) {
          $('#total_submission').text(data.total)
          $('#hip_hop').text(data.hiphop)
          $('#rock').text(data.rock)
          $('#country').text(data.country)
          $('#pop').text(data.pop)
          $('#rap').text(data.rap)
          $('#djmix').text(data.djmix)
          $('#latin').text(data.latin)
          $('#talk_show').text(data.talkshow)
          resolve(data)
        },
        error: function (xhr, status, error) {
          reject(error)
        }
      })
    })
  }

  updateHistory()
  updateSong()
  updatePrevious()
  updateSubmission()

  setInterval(updateHistory, 4000)
  setInterval(updateSong, 4000)
  setInterval(updatePrevious, 4000)
  setInterval(updateSubmission, 10000)
  </script>

  <script>
  const player = new Audio()
  let currentId = null

  $(document).on('click', '[data-hash]', async function (event) {
    event.preventDefault()

    const lottie = $(this).prop('lottie')
    const source = $(this).attr('href')

    if (player.paused || player.src !== source) {
      $('[data-hash]').each(function (i, elem) {
        let eLottie = $(this).prop('lottie')
        eLottie.stop()
        eLottie.currentFrame = 0
        eLottie.renderFrame()
      })

      player.src = source
      lottie.play()
      player.play()
    } else {
      player.pause()
      lottie.stop()
      lottie.currentFrame = 0
      lottie.renderFrame()
    }
  })

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

  function iconPause (element) {
    $('[data-hash]').html('')
    $(element).html('')
  }

  function iconPlay (element) {
    $(element).html('')
  }
  </script>

  <!-- SUBMIT VOTES -->
  <script>
  function sendVote (vote) {
    vote = vote.toString()
    if (vote === '1') {
      $('#like_post').html('')
    } else if (vote === '2') {
      $('#unlike_post').html('')
    } else if (vote === '3') {
      $('#love_post').html('')
    }

    $.ajax('/php/vote_send.php', {
      type: 'POST',
      data: {
        type: vote,
        music_id: window.mid
      },
      success: function (data, status, xhr) {},
      error: function (xhr, status, error) {
        alert(xhr.responseText)
      }
    })
  }
  </script>

  <!-- START TEMPLATE -->
  <script src="/js/plugins.js"></script>
  <script src="/js/actions.js"></script>
  <!-- END TEMPLATE -->

  <script src="/js/plugins/smartwizard/jquery.smartWizard-2.0.min.js"></script>
  <script src="/js/plugins/jquery-validation/jquery.validate.js"></script>
  <script src="/js/plugins/rangeslider/jQAllRangeSliders-min.js"></script>
  <script src="/js/plugins/knob/jquery.knob.min.js"></script>
  <script src="/js/demo_sliders.js"></script>
  <script src="/js/plugins/ion/ion.rangeSlider.min.js"></script>
  <script src="/js/faq.js"></script>
  <script src="/radio/radio.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/howler/2.1.0/howler.core.min.js"></script>
  <!-- END SCRIPTS -->

  <script>
  $('#links').click(function (event) {
    event = event || window.event
    const target = event.target || event.srcElement
    const link = target.src ? target.parentNode : target
    const options = {
      index: link,
      event: event,
      onclosed: function () {
        setTimeout(function () {
          $('body').css('overflow', '')
        }, 200)
      }
    }

    const links = $(this).find('a')
    blueimp.Gallery(links, options)
  })
  </script>

  <script>
  async function playRadio () {
    radio.play(window.sid - 1)
    $('#play_icon').addClass('fa-stop').removeClass('fa-play')
    $('.btn-paused').removeClass('btn-paused').addClass('btn-playing')
    $('.btn-playing').tooltip('hide').attr('data-original-title', 'Stop').tooltip('show')
  }

  async function stopRadio () {
    radio.stop()
    $('#play_icon').addClass('fa-play').removeClass('fa-stop')
    $('.btn-playing').removeClass('btn-playing').addClass('btn-paused')
    $('.btn-paused').tooltip('hide').attr('data-original-title', 'Play').tooltip('show')
  }

  $(document).ready(function () {
    express_view()
    window.sid = 1

    $(document).on('click', '.btn-paused', playRadio)
    $(document).on('click', '.btn-playing', stopRadio)

    $('.station').on('click', async function () {
      const id = $(this).attr('id')
      const sid = parseInt(id.substr(7, 1)) + 1
      const sname = $(this).find('.subtitle').text()

      window.sid = sid
      window.mid = undefined

  		$('#station_name').text(sname)
      await playRadio()
      await updateSong()
  	})

    $('.download-btn').on('click', async function (e) {
      const data = await getCurrentMetadata(window.sid)
      const station = radio.stations[window.sid - 1]
      const stationName = station.freq + ' STATION'
      $('#noty_topRight_layout_container li').last().find('#d_artist_name').text(data.tpe1)
      $('#noty_topRight_layout_container li').last().find('#d_song_name').text(data.tit2)
      $('#noty_topRight_layout_container li').last().find('#d_album_name').text(data.talb)
      $('#noty_topRight_layout_container li').last().find('#d_id').text(data.comm)
      $('#noty_topRight_layout_container li').last().find('#d_station_name').text(stationName)
    })

    $('#like_post').click(function () {
      $.ajax('/php/isLoggedIn.php', {
        type: 'GET',
        success: function (data, status, xhr) {
          if (data === 'loggedIn') sendVote(1)
          else $('#failed_btn').click()
        },
        error: function (xhr, status, error) {}
      })
  	})

    $('#unlike_post').click(function () {
      $.ajax('/php/isLoggedIn.php', {
        type: 'GET',
        success: function (data, status, xhr) {
          if (data === 'loggedIn') sendVote(2)
          else $('#failed_btn').click()
        },
        error: function (xhr, status, error) {}
      })
  	})

  	$('#love_post').click(function () {
      $.ajax('/php/isLoggedIn.php', {
        type: 'GET',
        success: function (data, status, xhr) {
          if (data === 'loggedIn') sendVote(3)
          else $('#failed_btn').click()
        },
        error: function (xhr, status, error) {}
      })
  	})

  	$('#share_post').click(function () {
  		$.ajax('/php/isLoggedIn.php', {
  			type: 'GET',
  			success: function (data, status, xhr) {
  				if (data === 'loggedIn') sendVote(4)
  				else $("#failed_btn").click()
  			},
  			error: function (xhr, status, error) {}
  		})
  	})

  	$('#shareForm').submit(function () {
  		$.ajax({
  			url: '/php/isLoggedIn.php',
  			type: 'GET',
  			success: function (data) {
  				if (data === 'loggedIn') {
  					if ($('.dedicate').hasClass('dedicatedRed')) {
  						sendVote('removeDedicate')
  						$('.dedicate').removeClass('dedicatedRed')
  					} else {
  						sendVote('Dedicate')
  						$('.dedicate').addClass('dedicatedRed')
  					}
  				} else {
  					$("#failed_btn").click()
  				}
  			},
  			error: function (xhr, ajaxOptions, thrownError) {
  				if (xhr.status === 404) {
  					// alert('Not allowed.')
  				}
  				if (xhr.status === 403) {
  					console.log('sarma')
  					// alert('Not allowed.')
  				}
  			}
  		})
  	})

  	/* download song vote js kanak */
  	$('.fa-download.thumbs-icon').click(function () {
  		// alert('download');
  		// var c = $('#shareForm');
  		$.ajax({
  			url: '/php/isLoggedIn.php',
  			type: 'GET',
  			success: function (data) {
  				if (data === 'loggedIn') {
  					sendVote('download')
  				} else {
  					$("#failed_btn").click()
  				}
  			},
  			error: function (xhr, ajaxOptions, thrownError) {
  				if (xhr.status === 404) {
  					// alert('Not allowed.')
  				}
  				if (xhr.status === 403) {
  					console.log('sarma')
  					// alert('Not allowed.')
  				}
  			}
  		})
  	})

  	function addPlayDateTime() {
  		$.ajax({
  			url: '/php/_votingsys.php',
  			type: 'POST',
  			data: {
  				'count_latest_song': 'addPlayDateTime',
  				'sid' : $('#stream_id').val()
  			},
  			dataType: 'html',
  			success: function (data) {},
  			error: function (xhr, ajaxOptions, thrownError) {}
  		});
  		/*setTimeout(function() {
  			addPlayDateTime();
  		}, 2000);*/
  	}
  })

  function express_view() {
  	$.ajax({
  		url: '/php/get_info.php',
  		type: 'POST',
  		data: { type: 1 },
  		success: function (data) {
  			// alert(data)
  			if (!data.includes('NOTAVAIABLE')) {
  				$('#message_box1').html(data)
  				$('.item').css('opacity', '100')
  				// alert(data)
  			}
  		},
  		error: function (xhr, ajaxOptions, thrownError) {
  			alert(xhr.status)
  			if (xhr.status === 404) {
  				// alert('Not allowed.')
  			}
  			if (xhr.status === 403) {
  				// alert('Not allowed.')
  			}
  		}
  	})
  }

  function info_like_unlike (type, a_id) {
  	$.ajax({
  		url: '/php/isLoggedIn.php',
  		type: 'GET',
  		success: function(data) {
  			if (data === 'loggedIn') {
  				// sendAjax('download')
  				like_unlike(type, a_id)
  			} else {
  				$("#failed_btn").click()
  			}
  		},
  		error: function (xhr, ajaxOptions, thrownError) {
  			if (xhr.status === 404) {
  				// alert('Not allowed.')
  			}
  			if (xhr.status === 403) {
  				console.log('sarma')
  				// alert('Not allowed.')
  			}
  		}
  	})
  }

  function like_unlike (type, a_id) {
  	$.ajax({
  		url: '/php/like_unlike_submit.php',
  		type: 'POST',
  		data: { type: type, a_id: a_id },
  		success: function (data) {
  			// alert(data)
  			$('#like_dislike_status' + a_id).html(data)
  		},
  		error: function (xhr, ajaxOptions, thrownError) {
  			// alert(xhr.status)
  			if (xhr.status === 404) {
  				// alert('Not allowed.')
  			}
  			if (xhr.status === 403) {
  				// alert('Not allowed.')
  			}
  		}
  	})
  }

  function click_count (id, link) {
  	$.ajax({
  		url: 'php/click_update.php',
  		type: 'POST',
  		data: { id: id },
  		success: function (data) {
  			window.open(link, '_blank')
  			// window.open = ('http://www.test.com', '_blank')
  			// window.location.replace("http://stackoverflow.com")
  			// window.location.href = link
  		},
      error: function(xhr, ajaxOptions, thrownError) {
  			// alert(xhr.status)
  			if (xhr.status === 404) {
  				// alert('Not allowed.')
  			}
  			if (xhr.status === 403) {
  				// alert('Not allowed.')
  			}
  		}
  	})
  }
  </script>

  <!-- TEZOS CHART -->
  <script>
  const api = 'https://api.better-call.dev/v1'
  const fa2 = 'KT1WjTTTgHy5MojfoAe1yFUGU6roLaE2x8Uj'
  const fixedPrice = 'KT1BNXQ8XLbBqapbQjPVg3xFnxoade2UjxE6'
  const editions = []
  let editionsStorage = null
  let marketStorage = null
  let maxEditionsPerRun = 0

  async function getEditions () {
    console.log('Displaying Editions...')
    console.log('Getting edition contract\'s storage...')
    const editionsStorageJSON = await $.getJSON(`${api}/contract/mainnet/${fa2}/storage`)
    editionsStorage = parseMichelsonMap(editionsStorageJSON, {
      network: 'mainnet',
      includeNone: true
    })[0]
    const size = editionsStorage.next_edition_id
    let counts = 0

    console.log(size + ' editions found')
    console.log('Getting market contract\'s storage')
    const marketStorageJSON = await $.getJSON(`${api}/contract/mainnet/${fixedPrice}/storage`)
    marketStorage = parseMichelsonMap(marketStorageJSON, {
      network: 'mainnet',
      includeNone: false
    })[0]
    maxEditionsPerRun = editionsStorage.max_editions_per_run

    for (let i = size - 1; i >= 0 && counts < 6; i--) {
      console.log('Getting edition\'s (ID: ' + i + ') metadata...')
      const edition = (await editionsStorage.editions_metadata)[i]
      console.log(edition)

      const blocked = await $.get('/php/block-nft-limited.php', { id: i })
      if (blocked === 'Good') {
        await displayEdition(i, edition)
        counts++
      }

      editions[i] = edition
    }
  }

  async function displayEdition (eid, edition) {
    const elem = $(editionTemplate).clone(true, true)
    const values = edition['@map_4']
    const numberOfEditions = edition['@nat_8']
    const cid = values['""'].slice(7)
    console.log('Getting edition\'s (ID: ' + eid + ') additional data from IFPS')
    const editionData = await $.getJSON('https://www.radion.fm:8980/ipfs/' + cid)
    console.log('IPFS Metadata', editionData)
    const id = values.asset_id || ''
    const songName = values.song_name || ''
    const artist = values.artist || 'Artist Unknown'
    const genre = values.genre || 'None'
    const contractType = values.legal_contract_type || ''
    const title = (songName ? songName.substr(0, 27) : songName) || 'No title'
    console.log('Getting edition\'s market sales...')
    const sales = await getSales(eid, edition)
    console.log(sales)
    const price = sales.price / 1000000
    const priceInUsd = (price * parseFloat(window.priceUsd)).toFixed(2)
    let termsContract = ''
    let audioUrl = 'https://radion.fm:8002/stream/1'
    let artworkUrl = 'https://radion.fm/img/bg-capa.jpg'
    let audioFormat = ''
    let audioType = null
    let artworkType = null

    let metadata = null
    try {
      metadata = await getMetadata(id)
      artworkUrl = metadata.artwork ? 'https://radion.fm' + metadata.artwork : artworkUrl
      $(elem).find('.nft-shield').show()
    } catch (error) {}

    editionData.formats.forEach(format => {
      if (format.mimeType.startsWith('audio')) {
        audioUrl = format.uri
        audioType = format.mimeType
        audioFormat = audioType === 'audio/wav' ? 'WAV' : 'MP3'
      } else if (format.mimeType.startsWith('image')) {
        artworkUrl = format.uri
        artworkType = format.mimeType
      }
    })

    switch (contractType) {
      case 'essential':
        termsContract = 'Basic Lease'
        break

      case 'commercial':
        termsContract = 'Basic Lease'
        break

      case 'basic':
        termsContract = 'Basic Lease'
        break

      case 'trackout':
        termsContract = 'Trackout Lease'
        break

      case 'premium':
        termsContract = 'Premium Lease'
        break

      case 'exclusive':
        termsContract = 'Exclusive Rights'
        break

      case 'cc-by-nc-nd':
        termsContract = 'CC-BY-NC-ND'
        break

      default:
        termsContract = contractType
    }

    const host = audioUrl.startsWith('https://') ? 'RADION Server' : 'IPFS'
    const audioDataUrl = audioUrl.startsWith('https://') ? audioUrl : 'https://www.radion.fm:8980/ipfs/' + audioUrl.slice(7)
    console.log('Getting artwork data from ' + artworkUrl + '...')
    const artworkDataUrl = artworkUrl.startsWith('https://') ? artworkUrl : 'https://www.radion.fm:8980/ipfs/' + artworkUrl.slice(7)
    const issuer = edition['@address_2'].substr(0, edition['@address_2'].length - 15) + '...'
    $(elem).find('.nft-artwork').attr('src', artworkDataUrl).removeClass('nft-artwork')
    $(elem).find('.nft-artist').text(artist).removeClass('nft-artist')
    $(elem).find('.nft-title').text(title).removeClass('nft-title')
    $(elem).find('.nft-shield').removeClass('nft-shield')
    $(elem).find('.nft-issuer-address').text(issuer).removeClass('nft-issuer-address')
    $(elem).find('.nft-host').text(host).removeClass('nft-host')
    $(elem).find('.nft-format').text(audioFormat)
    if (audioFormat === 'MP3') $(elem).find('.nft-format').addClass('label-primary').removeClass('label-default')
    $(elem).find('.nft-format').removeClass('.nft-format')
    $(elem).find('.nft-price').text(price).removeClass('nft-price')
    $(elem).find('.nft-price-usd').text(priceInUsd).removeClass('nft-price-usd')
    if (sales.count === 0) {
      $(elem).find('.nft-sold-out').hide().removeClass('nft-sold-out')
      $(elem).find('.nft-editions-avail').text(numberOfEditions === 1 ? 'Sold' : 'Sold out').css('color', '#C0392B')
    }
    else $(elem).find('.nft-editions-avail').text(sales.count + '/' + numberOfEditions)
    $(elem).find('.nft-editions-avail').removeClass('nft-editions-avail')
    $(elem).find('.nft-terms').text(termsContract).removeClass('nft-terms')
    $(elem).find('.nft-genre').text(genre).removeClass('nft-genre')
    $(elem).find('.nft-buy').attr('data-buy', eid).removeClass('nft-buy').click(buyEdition)
    $(elem).find('.nft-play').attr({
      href: audioDataUrl,
      'data-hash': audioDataUrl
    }).removeClass('nft-play')
    $('#nft-editions').append(elem)
  }

  async function getSales (eid, edition) {
    const tokenIds = []
    const keys = []
    let count = 0
    let price = 0

    for (let i = 0; i < edition['@nat_8']; i++) {
      const tokenId = eid * maxEditionsPerRun + i
      const address = packDataBytes(
        { string: edition['@address_2'] },
        { prim: 'address' }
      ).bytes.slice(12)

      const contract = packDataBytes(
        { string: fa2 },
        { prim: 'address' }
      ).bytes.slice(12)

      const key = `Pair 0x${address} (Pair 0x${contract} ${tokenId})`

      tokenIds.push(tokenId)
      keys.push(key)
    }

    const sales = await marketStorage.sales
    for (let i = 0; i < keys.length; i++) {
      const key = keys[i]
      if (sales[key]) {
        price = sales[key]
        count++
      }
    }

    if (price === 0) {
      const response = await $.getJSON('https://api.better-call.dev/v1/contract/mainnet/' + fixedPrice + '/operations?entrypoints=buy')
      const operations = response.operations
      for (let i = 0; i < operations.length; i++) {
        const operation = operations[i]
        if (operation.internal) continue

        const parameters = parseMichelsonMap(operation.parameters)
        const tokenId = parameters[0].sale_token.token_for_sale_token_id
        if (tokenIds.includes(tokenId)) {
          price = operation.amount
          break
        }
      }
    }

    return { count, price }
  }

  async function buyEdition (event) {
    const network = { type: NetworkType.MAINNET, rpcUrl: rpc }
    await wallet.requestPermissions({ network })

    const eid = $(this).attr('data-buy')
    const edition = editions[eid]
    const values = edition['@map_4']
    const numberOfEditions = edition['@nat_8']
    const cid = values['""'].slice(7)
    const assetId = values.asset_id || ''
    const date = values.date || ''
    const license = values.legal_contract_type || ''
    const editionData = await $.getJSON('https://www.radion.fm:8980/ipfs/' + cid)
    const loggedIn = await isLoggedIn()
    let audioUrl = null
    let audioType = null

    if (loggedIn) {
      noty({
        text: 'Debes iniciar sesion primero para poder descargar un activo',
        type: 'error',
        layout: 'topRight',
        timeout: 5000
      })
      return
    }

    editionData.formats.forEach(format => {
      if (format.mimeType.startsWith('audio')) {
        audioUrl = format.uri
        audioType = format.mimeType
      }
    })

    const marketSales = await marketStorage.sales
    const contract = await tezos.wallet.at(fixedPrice)
    let salePrice = 0
    let sale = null

    for (let i = 0; i < numberOfEditions; i++) {
      const tokenId = eid * maxEditionsPerRun + i
      const address = packDataBytes(
        { string: edition['@address_2'] },
        { prim: 'address' }
      ).bytes.slice(12)

      const contractAddress = packDataBytes(
        { string: fa2 },
        { prim: 'address' }
      ).bytes.slice(12)

      const keyString = `Pair 0x${address} (Pair 0x${contractAddress} ${tokenId})`
      const key = {
        seller: edition['@address_2'],
        sale_token: {
          token_for_sale_address: fa2,
          token_for_sale_token_id: tokenId
        }
      }

      if (typeof marketSales[keyString] !== 'undefined') {
        sale = key
        salePrice = marketSales[keyString] / 1000000
        break
      }
    }

    if (sale !== null) {
      const tokenId = sale.sale_token.token_for_sale_token_id
      const operation = await contract.methods.buy(sale.seller, fa2, tokenId).send({
        amount: salePrice
      })

      noty({
        text: '<i class="fas fa-compact-disc fa-lg fa-spin"></i> Transaccion fue enviada. Confirmando...<br>Favor de esperar confirmacion!.',
        type: 'information',
        layout: 'topRight'
      })

      const hash = operation.opHash
      await operation.confirmation(1)

      noty({
        text: 'Favor de esperar su descarga. No actualize el navegador cuando este en proceso! Esto puede tomar algo de tiempo.',
        type: 'information',
        layout: 'topRight'
      })

      let filename = editionData.name
      if (audioType === 'audio/mpeg') filename += '.mp3'
      else if (audioType === 'audio/wav') filename += '.wav'
      if (audioUrl.startsWith('ipfs://')) {
        const audioCID = audioUrl.slice(7)
        const downloadLink = '/ipfs/cat.php?cid=' + audioCID
        downloadURL(downloadLink, filename)
      } else {
        const windowURL = new URL(audioUrl)
        const params = new URLSearchParams(windowURL.search)
        params.set('hash', hash)

        const downloadLink = windowURL.pathname + '?' + params.toString()
        downloadURL(downloadLink, filename)
      }

      const params = new URLSearchParams()
      params.set('hash', hash)
      downloadURL('/php/request_contract.php?' + params.toString(), 'contract.pdf')

      // Display SUCCESS
      const sweetAlert = await Swal.fire({
        icon: 'success',
        title: 'EXITO',
        width: 450,
        html: '<br><p align="left" style="padding-left:10px;">TENEMOS CONFIRMACION!</p><hr><p align="left" style="padding-left:10px;"><strong>Transaccion ID/Hash:</strong></p><p align="left" style="font-size:13px;padding-left:10px;">' + hash + '</p>',
        confirmButtonText: '<i class="fas fa-external-link-alt"></i> Ver en TzStats',
        showCancelButton: true,
        cancelButtonText: "<i class='fas fa-thumbs-up'></i> Gracias"
      })

      if (sweetAlert.value) window.open('https://tzstats.com/' + hash)
    } else {
      noty({
        text: 'Incapaz de encontrar la edicion',
        layout: 'topRight',
        type: 'error',
        timeout: 5000
      })
    }
  }

  let editionTemplate = null
  let tokenTemplate = null
  let userTemplate = null

  $(document).ready(function () {
    editionTemplate = $('#temp-edition').prop('content')
    tokenTemplate = $('#temp-nft').prop('content')
    userTemplate = $('#temp-user').prop('content')

    getTokens('KT1MR8e46WJBq4RcFSogiDbSg3ceDRi81hpE').then(tokens => {
      if (tokens[0].token_id === 0) tokens = tokens.reverse()
      displayTokens(tokens)
    })

    $.getJSON('/php/top_sellers.php', function (data) {
      displayUsers(data)
    })

    getEditions()

    $('#search-form').submit(function (event) {
      event.preventDefault()

      const q = $('#search-q').val()
      $.ajax('/php/search.php', {
        type: 'GET',
        dataType: 'json',
        data: { q: q },
        cache: false,
        success: function (data, status, xhr) {
          displayResults(data.result)
        },
        error: function (xhr, status, error) {
          noty({
            text: error,
            layout: 'topRight',
            type: 'error',
            timeout: 5000
          })
        }
      })
    })

    $(':not(#search-form)').click(function () {
      $('#search-results').hide()
    })

    const xhr = new XMLHttpRequest()
    xhr.onload = function () {
      const data = JSON.parse(this.responseText)
      makeGraph(data)
    }

    xhr.open('GET', '/tezos.php')
    xhr.send()

    function makeGraph (data) {
      const today = new Date()
      const days = 86400000 // number of milliseconds in a day
      const fiveDaysAgo = new Date(today - (365 * days))
      const newArray = []

      for (const k in data.data) {
        if (data.data[k].time > fiveDaysAgo) {
          newArray.push({
            x: parseFloat(k),
            y: parseFloat(data.data[k].priceUsd)
          })
        }
      }

      const graph = new Rickshaw.Graph({
        element: document.getElementById('charts-legend'),
        renderer: 'area',
        stack: true,
        width: $('#charts-legend').width(),
        series: [{
          color: '#33414E',
          data: newArray,
          name: 'Tezos'
        }]
      })

      graph.render()
      const hoverDetail = new Rickshaw.Graph.HoverDetail({
        graph: graph,
        formatter: function (series, x, y) {
          const date = data.data.filter(function (a) {
            return a.priceUsd.includes(parseFloat(y.toString().slice(0, 7)))
          })

          $('.rickshaw_graph .detail .x_label').text(new Date(date[0].time).toLocaleString('en-US'))
          const content = series.name + ': $' + y.toFixed(2)
          return content
        }
      })

      const legend = new Rickshaw.Graph.Legend({ graph: graph, element: document.getElementById('legend') })
      const shelving = new Rickshaw.Graph.Behavior.Series.Toggle({ graph: graph, legend: legend })
      const order = new Rickshaw.Graph.Behavior.Series.Order({ graph: graph, legend: legend })
      const highlight = new Rickshaw.Graph.Behavior.Series.Highlight({ graph: graph, legend: legend })

      var resize = function () {
        graph.configure({
          width: $('#charts-legend').width(),
          height: $('#charts-legend').height()
        })
        graph.render()
      }

      window.addEventListener('resize', resize)
      resize()
    }
  })

  async function isLoggedIn () {
    return await $.get('/php/isLoggedIn.php') === 'loggedIn'
  }

  async function displayResults (data) {
    const template = $('#temp-result').prop('content')
    $('#search-results').empty()

    for (let i = 0; i < data.length; i++) {
      const result = data[i]
      const elem = $(template).clone(true, true)
      const name = result.name
      const id = result.id
      const hash = result.hash
      const type = result.type
      let url = ''

      if (type === 'user') url = '/user-profile.php?uid=' + id + '&hash=' + hash
      else if (type === 'song') url = '/song-player.php?id=' + id + '&hash=' + hash

      $(elem).find('.result-link').attr('href', url).removeClass('result-link')
      $(elem).find('.result-name').text(name).removeClass('result-name')
      $(elem).find('.result-type').text(type).removeClass('result-type')
      $('#search-results').append(elem)
    }

    $('#search-results').show()
  }

  async function displayUsers (data) {
    for (let i = 0; i < data.length; i++) {
      const elem = $(userTemplate).clone(true, true)
      const user = data[i]
      const icons = [{
        condition: user.total_songs >= 3,
        className: 'temp-star'
      }, {
        condition: user.top,
        className: 'temp-crown'
      }, {
        condition: user.is_dev,
        className: 'temp-code'
      }, {
        condition: user.minted,
        className: 'temp-award'
      }, {
        condition: !user.is_dev,
        className: 'temp-music'
      }]

      $(elem).find('.temp-image').attr({
        src: user.image,
        alt: user.username
      }).removeClass('temp-image')

      $(elem).find('.temp-username').attr('href', user.profile).text(user.username).removeClass('temp-username')

      icons.forEach(function (icon) {
        if (icon.condition) $(elem).find('.' + icon.className).css('display', 'initial')
        $(elem).find('.' + icon.className).removeClass(icon.className)
      })

      $('#top-nfts').append(elem)
    }
  }

  async function displayTokens (data) {
    let counts = 0
    console.log(data.length + ' tokens found')
    for (let i = 0; i < data.length && counts < 6; i++) {
      const elem = $(tokenTemplate).clone(true, true)
      const nft = data[i]
      console.log('Displaying token (ID: ' + nft.token_id + ')')
      console.log('Getting current owner of token ID: ' + nft.token_id)
      const owner = await getCurrentOwner(nft.token_id)
      const id = await $.get('/php/actualid.php?id=' + (nft.name !== 'Unknown' ? nft.name : nft.extras.asset_id))
      let tokenData = {}
      if (!nft.extras.song_name) {
        tokenData = (await $.getJSON('/php/tzstats-bigmap.php?bigmap=1313&key=' + nft.token_id)).value.token_info
      }

      console.log('Detected RADION ID: ' + id)
      const hash = await getHash(id)
      const songName = nft.extras.song_name || (nft.extras.asset && nft.extras.asset.song_name) || parseBytes(tokenData.song_name)
      const issuer = owner ? owner.substr(0, owner.length - 15) + '...' : owner
      const title = songName ? songName.substr(0, 27) : songName
      const artist = nft.extras.artist || (nft.extras.asset && nft.extras.asset.artist) || parseBytes(tokenData.artist)
      const genre = nft.extras.genre || parseBytes(tokenData.genre)
      let metadata = null
      try { metadata = await getMetadata(id) } catch (error) { console.log(error) }
      console.log('Fetched metadata: ', metadata)

      if (metadata === null || metadata.deleted) continue
      $(elem).find('.nft-wrapper').click(function () {
        window.location = '/song-player.php?id=' + id + '&hash=' + hash
      }).removeClass('nft-wrapper')
      $(elem).find('.nft-artwork').attr('src', metadata.artwork).removeClass('nft-artwork')
      $(elem).find('.nft-artist').text(artist).removeClass('nft-artist')
      $(elem).find('.nft-title').text(title).removeClass('nft-title')
      $(elem).find('.nft-issuer-address').text(issuer).removeClass('nft-issuer-address')
      $(elem).find('.nft-id').text(id).removeClass('nft-id')
      $(elem).find('.nft-genre').text(genre).removeClass('nft-genre')
      $('#nfts').append(elem)
      counts++
    }
  }

  async function getMetadata (id) {
    return new Promise((resolve, reject) => {
      $.ajax('/php/get_song_metadata.php', {
        type: 'GET',
        data: { id: id },
        dataType: 'json',
        success: function (data, status, xhr) {
          resolve(data)
        },
        error: function (xhr, status, error) {
          reject(error)
        }
      })
    })
  }
  </script>
  <!-- END TEZOS CHART -->
</body>
</html>
