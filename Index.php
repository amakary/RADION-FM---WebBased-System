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
<html lang="en">
<head>
  <!-- META SECTION -->
  <title>RADION&trade;</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

	<meta property="og:url" content="https://radion.fm">
  <meta property="og:type" content="website">
  <meta property="og:title" content="RADION&trade; FM">
  <meta property="og:description" content="RADION FM - A WEB-Based system where you can discover and create #NFT Music on Tezos.">
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
            <div class="mb-title"><i class="fal fa-hand-paper"></i> HOLD ON</div>
            <div class="mb-content">
              <p align="justify">In order to vote, you need to sing in. If you don't have an account yet, please sign up today for Free.</p>
            </div>
            <div class="mb-footer">
  						<button class="btn btn-default btn-sm" onclick="window.open('login.php', '_blank')"><i class="fad fa-sign-in-alt"></i> SIGN IN</button>
  						<button class="btn btn-default btn-sm" onclick="window.open('registration.php', '_blank')"><i class="fad fa-user-plus"></i> SIGN UP</button>
              <button class="btn btn-danger btn-sm pull-right mb-control-close"><i class="fas fa-times-octagon"></i> CLOSE</button>
            </div>
          </div>
        </div>
      </div>
      <button type="button" id="failed_btn" class="btn btn-danger mb-control hide" data-box="#message-box-sound-2">FAIL</button>
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
            <span class="xn-text"> &nbsp; &nbsp; STATIONS</span>
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
              <div class="informer informer-danger"><i class="fas fa-volume-up"> </i> LIVE</div>
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
          <a href="#"><i class="fad fa-poll-people fa-lg"></i> <span class="xn-text"> &nbsp; &nbsp; ASSETS</span></a>
          <ul class="animated zoomIn">
            <li><a href="#" style="color:#FEA223;"><i class="far fa-exclamation-circle fa-lg"></i>&nbsp; <strong>ASSETS PENDING</strong></a><div class="informer informer-warning" id="total_submission">+679</div></li>
            <li><a href="#"><i class="fad fa-podcast fa-lg"></i>&nbsp; PODCAST</a><div class="informer informer-default" id="talk_show">0</div></li>
      			<li><a href="#"><i class="far fa-headphones"></i>&nbsp; LATINO</a><div class="informer informer-default" id="latin">0</div></li>
      			<li><a href="#"><i class="far fa-headphones"></i>&nbsp; DJs MIX</a><div class="informer informer-default" id="djmix">0</div></li>
      			<li><a href="#"><i class="far fa-headphones"></i>&nbsp; INDIE ROCK</a><div class="informer informer-default" id="rock">0</div></li>
            <li><a href="#"><i class="far fa-headphones"></i>&nbsp; COUNTRY MUSIC</a> <div class="informer informer-default" id="country">0</div></li>
            <li><a href="#"><i class="far fa-headphones"></i>&nbsp; POP</a><div class="informer informer-default" id="pop">0</div></li>
      			<li><a href="#"><i class="far fa-headphones"></i>&nbsp; RAP</a><div class="informer informer-default" id="rap">0</div></li>
      			<li><a href="#"><i class="far fa-headphones"></i>&nbsp; HIP HOP / R&B</a><div class="informer informer-default" id="hip_hop">0</div></li>
          </ul>
        </li>
        <!-- END MARKETPLACE MENU -->

        <li class="xn-icon-button pull-right" style="margin-right:0px;">
          <a href="#" class="sidebar-toggle"><i class="far fa-ellipsis-v-alt fa-lg"></i></a>
        </li>

        <!-- LANGUAGE BAR -->
        <li class="xn-icon-button pull-right">
          <a href="#"><i class="fad fa-language fa-lg"></i></a>
          <ul class="xn-drop-left xn-drop-dark animated zoomIn">

            <li><a href="index.php">&nbsp; &nbsp; ENGLISH</a></li>
          </ul>
        </li>
        <!-- END LANGUAGE BAR -->

        <!-- PROFILE MENU UPPER CORNER RIGHT -->
        <li class="x-features-profile pull-right">
          <a href="#" style="background-color:inherit">
            <img src="<?php siteloklink($slcustom2, 0); ?>" style="display:inline-block; border-radius:50%; width:28px; height:28px; margin-top:-4px; margin-bottom:-7px; background-color:#1D2127;" alt="">
            <span class="fas fa-angle-down fa-lg"></span>
          </a>

          <ul class="xn-drop-left animated zoomIn">
            <?php if (isset($_SESSION) && isset($_SESSION["ses_sluserid"])) { ?>
            <div style="padding:10px;">
							<img src="<?php siteloklink($slcustom2, 0); ?>" style="display:inline-block; border-radius:50%; width:32px; height:32px; margin-bottom:-10px; background-color:#1D2127;" alt="">
							<span style="color:#fff; padding-top:15px; padding-left:10px; padding-bottom:5px; font-size:13px;"><strong><?php echo $slusername; ?></strong></span>
							<div style="color:#F39C12; padding-left:45px; font-size:10px;"><?= $slemail ?></div>
            </div>

            <li><a href="#" class="mb-control" data-box="#mb-dashboard"><span class="fas fa-sign-in-alt fa-lg"></span> &nbsp; &nbsp; DASHBOARD</a></li>
						<li><a href="#" class="mb-control"><i class="far fa-wallet fa-lg"></i><span> &nbsp; &nbsp; CONNECT WALLET</span></a></li>
						<li><a href="#" class="mb-control" data-box="#mb-signout"><span class="fas fa-sign-out-alt fa-lg"></span> &nbsp; &nbsp; LOGOUT</a></li>
            <?php } else { ?>
            <li><a href="login.php"><i class="fad fa-sign-in-alt fa-lg"></i> &nbsp; &nbsp; LOGIN</a></li>
            <li><a href="registration.php"><i class="fad fa-user-plus fa-lg"></i> &nbsp; &nbsp; SIGN UP FOR FREE</a></li>
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
                  <strong>ARTIST:</strong>
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
                    <strong id="station_name" style="color:#F39C12;"> MAIN STATION </strong>
                    <i style="margin-left:10px; margin-bottom:10px; padding-left:10px; padding-right:10px; border-radius:3px; text-align: center; background-color:#A93226; height:18px; color:#fff;display:inline-block; family-font:Arial;">LIVE NOW</i>
                  </span>
                </div>

                <span style="color:#616A6B; family-font:Arial; padding-right:5px;"><strong>TITLE</strong>:</span>
                <span style="color:#fff; family-font:Arial;" data-sid="1" id="songTitle" class="songTitleSpan"></span>
                <span style="padding-right:10px; padding-left:10px; color:#aaaaaa;">| </span>
                <span style="color:#616A6B; padding-right:5px;">LICENSED: </span>
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
                  <span style="padding-right:10px; padding-left:10px; color:#aaaaaa;"> | </span> Right Holder - <a href="#" id="username" style="color:#f2c945;"></a>
                </p>

                <p style="color:#616A6B; margin-top:-5px; width:500px;">This work is licensed under Creative Commons Attribution-NonCommercial-ShareAlike 4.0</p>

                <span style="padding-left:0px;"><button class="btn btn-primary btn-xs active download-btn" type="button" onclick="notyConfirm();"><strong>DOWNLOAD</strong></button></span>
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

                <span> <lord-icon src="https://cdn.lordicon.com//itfliaju.json" trigger="click" target="a" colors="primary:#ffffff,secondary:#616A6B" id="share_post" stroke="100" style="width:25px;height:25px"></lord-icon>
                  <!-- <button class="btn btn-primary btn-xs active" id="share_post"><i class="fad fa-share-alt"></i> </button> --> </span>
                  <span style="padding-right:5px; padding-left:5px; color:#AAAAAA;" id="share_count">0</span>

              <span>
                  <lord-icon src="https://cdn.lordicon.com//ycojtdqt.json" trigger="click" target"a" colors="primary:#616A6B,secondary:#ffffff" id="twitter-share-button" stroke="80" style="width:30px;height:30px"></lord-icon>
                <!-- <button id="twitter-share-button" class="btn btn-primary btn-xs"><i class="fab fa-twitter fa-lg"></i></button>-->
              </span>

              <!-- MAIN TITTLE -->
              <div id="audioDiv" align="center" style="padding-top:7%; padding-bottom:5%;">
                <h1 id="mainTitle" style="color:#FFF; padding-left:10%;" align="left"><strong></strong></h1>
                <h5 id="mainSubtitle" align="justify" style="color:#FFF; padding-right:15%; padding-left:15%;"></h5>
              </div>
              <!-- END MAIN TITTLE -->

              <!-- COMMING NEXT SONG -->
              <div style="width:55%; margin-left:5%; border-radius:15px 50px; opacity: 0.7; margin-bottom:30px;">
                <div style="padding-bottom:20px; padding-left:8%; padding-right:10px; color:#aaa;">
                  <div style="margin-left:0px; margin-bottom:10px; padding-left:10px; padding-right:10px; border-radius:3px; font-weight: bold;text-align: center; background-color:#2b2b2b; height:20px; color:#fff; display:inline-block;">Coming Next:</div><br>
                  <span class="next_congcls"></span>
                </div>
              </div>
              <!-- END COMING NEXT SONG -->
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
                    </lord-icon> <strong>LATEST NFT MUSIC</strong></h2>
                </div>
                <!-- END PAGE TITLE -->

                <!-- NFT MARKETPLACE -->
                <div class="row" id="nfts"></div>
                <template id="temp-nft">
                  <div class="col-md-2">
                    <div class="panel panel-default">
                      <div class="panel-body panel-body-image">
                        <img class="nft-artwork" src="/img/NFT.jpg" width="205" height="205">
                        <a href="#" class="panel-body-inform">
                          <lord-icon src="https://cdn.lordicon.com//vnxmkidq.json" trigger="hover" colors="primary:#ffffff,secondary:#ffffff" stroke="100" style="width:25px;height:25px;margin-top:-5px;margin-left:-3px;"> </lord-icon>

                        </a>
                      </div>
                      <div class="panel-body">

                        <h3 align="center" class="nft-artist"></h3>
                        <p align="center" class="nft-title"></p>
                        <div>Issuer:<br><span class="nft-issuer-address" style="font-size:10px; color:#979A9A;"></span></div>
                        <div>STREAM: <span class="nft-id"></span></div>
                        <div>IPFS: WAV Format</div>
                      </div>
                      <div class="panel-footer text-muted" align="center">

                      </div>
                    </div>
                  </div>
                </template>
                <!-- END NFT MARKETPLACE -->

                        <!-- PAGE TITLE -->
                                      <div class="page-title">
                                          <h2><lord-icon src="https://cdn.lordicon.com//gybcsrib.json" trigger="loop" delay="9000" colors="primary:#1B1E24,secondary:#F39C12" style="width:60px;height:60px"> </lord-icon> TOP ARTISTS</h2>
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
                            <i class="fas fa-star fa-lg temp-star" style="display:none;color:#F39C12;"></i>
                            <i class="fas fa-crown fa-lg temp-crown" style="display:none"></i>
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
                    </lord-icon> <strong>LATEST NFT LIMITED EDITIONS</strong></h2>
                </div>
                <!-- END PAGE TITLE -->

                <!-- NFT MARKETPLACE -->
                <div class="row" id="nft-editions"></div>
                <template id="temp-edition">
                  <div class="col-md-2">
                    <div class="panel panel-default">
                      <div class="panel-body panel-body-image">
                        <img class="nft-artwork" src="/img/NFT.jpg" width="205" height="205">
                        <a href="#" class="panel-body-inform">
                          <lord-icon src="https://cdn.lordicon.com//iiegcyhs.json" class="nft-play" trigger="click" target="a" stroke="70" colors="primary:#ffffff,secondary:#ffffff" style="width:42px;height:42px; margin-top:-7px; margin-left:-7px;"></lord-icon>
                          <!-- <i class="fas fa-play nft-play"></i> -->
                        </a>
                      </div>

                      <div class="panel-body">
                        <h3 align="center" class="nft-artist"></h3>
                        <p align="center" class="nft-title"></p>
                        <div>Issuer:<br><span class="nft-issuer-address" style="font-size:10px; color:#979A9A;"></span></div>
                        <div>STREAM: <span class="nft-id"></span></div>
                        <div>IPFS: WAV Format</div>
                        <div>Price: <span class="nft-price"></span> <span>tz</span></div>
                        <div>Editions Available: <span class="nft-editions"></span></div>
                      </div>

                      <div class="panel-footer text-muted" align="center">
                        <button class="btn btn-primary btn-block btn-sm nft-buy">BUY</button>
                      </div>
                    </div>
                  </div>
                </template>
                      </div>


                      <!-- PAGE TITLE -->
                        <div class="page-title">
                        <h2><lord-icon src="https://cdn.lordicon.com//tvyxmjyo.json" trigger="loop" delay="13000" colors="primary:#1B1E24,secondary:#F39C12" style="width:60px;height:60px"></lord-icon>INFO</h2>
                        </div>
                      <!-- END PAGE TITLE -->





  <div class="row">
    <div class="col-md-6">
      <div class="panel panel-default">
        <div class="panel-body">
          <!-- PAGE TITLE -->
          <div class="page-title">
            <h2><i class="fas fa-exclamation-circle"></i> FAQs</h2>
          </div>
          <!-- END PAGE TITLE -->

          <!-- START ACCORDION -->
          <div class="panel-group accordion">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a href="#accOneColOne"><i class="fal fa-check-circle fa-lg" style="color:#27AE60;"></i> WHAT DO WE DO?</a>
                </h4>
              </div>
              <div class="panel-body panel-body" id="accOneColOne" align="justify">
                RADION offers unconventional features to the music industry! Our platform embeds a unique public address key in every MP3 file that it is uploaded in our system, in order to allow downloads / purchases without third party intervention. Musicians receive payment directly to their public wallets, every time someone downloads their songs.<br><br>
                This new method can be used with current MP3 files as well as the new generation of digital assets represented by a <strong>non-fungible token (NFT)</strong>.
              </div>
            </div>

            <div class="panel panel-primary">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a href="#accOneColFive"><i class="fal fa-check-circle fa-lg" style="color:#27AE60;"></i> WHAT IS A NON-FUNGIBLE TOKEN (NFT)?</a>
                </h4>
              </div>

              <div class="panel-body" id="accOneColFive" align="justify">
                NFT or non-fungible token is a type of cryptographic token that can represents ownership of something unique! A song is a great way to explain NTFs because in today's world you may be able to purchase a song and receive a digital MP3 copy to play the song as many times as you want, but it doesn't mean you can return it and get your money back, or sell it to someone else. NFT is not intended to prove the genesis of the original file, but rather the ownership of the song asset).<br><br>This technology opens a new set of possibilities in the music industry, where musicians can have better control over their songs (digital assets)! With this tech the musician doesn't have to worry about distributor to collect royalties directly from stores/streaming platforms on behalf of labels, not to mention that music licensing and copyrights wont be a problem, because the MP3 can carry all this information and be ready to be bought by anybody without a third party intervention (contract). In a near future, musicians may choose music platforms that works with NFTs and <strong>smart contracts</strong> like RADION. Why? - Because they can benefit much more for less effort.<br><br>
								Now, the traditional business model of the music industry is a complex subject, especially when we talk about collecting music royalties, copyrights infringements, and music licensing, however we believe that our work can change the entire industry. Having said that, you may wonder; are we working on NFT? You better believe it!
              </div>
            </div>

            <div class="panel panel-primary">
              <div class="panel-heading">
                <h4 class="panel-title"><a href="#accOneColSix"><i class="fal fa-check-circle fa-lg" style="color:#27AE60;"></i> WHAT IS A SMART CONTRACT?</a></h4>
              </div>
              <div class="panel-body" id="accOneColSix" align="justify">
                A smart contract is an agreement between two people in the form of computer code. Smart contracts are deployed on the blockchain. You can say that blockchain is a network of nodes/computers, and transactions must be confirmed first by the network in order to be public. The transactions that happen in a smart contract are processed by the blockchain, which means they can be sent automatically without a third party intervention.<br><br>
                For instance, in today's world if a musician wants to sell his music, he needs to contact a music publisher or a record label to distribute and manage his music. They will guarantee the collection of music royalties for him but that intervention will cost a significant percentage of the total revenue. The musician will receive a check from this entity but only after this third party takes their percentage. Today, the traditional music industry offers an average of $0,09 to the musician per copy sold!<br><br>
                On the other hand we have a platform like RADION that works with smart contracts, the dapp is the one that provides the platform to allow peer to peer interaction, but also it is connected to the blockchain in order to allow direct transaction between musician and buyer without interfering with their transaction. In other words if the musician asks for $1,00 USD per a copy and the buyer accepts the price, the musician receives $1,00 USD for that copy.
              </div>
            </div>

            <div class="panel panel-primary">
              <div class="panel-heading">
                <h4 class="panel-title"><a href="#accOneColTwo"><i class="fal fa-check-circle fa-lg" style="color:#27AE60;"></i> DO WE WORK WITH MUSIC LICENSING?</a></h4>
              </div>
              <div class="panel-body" id="accOneColTwo" align="justify">
                RADION can work with other record labels that are working with the traditional copyrights business model, or creative commons licensing! However, our platform wants to keep things simple to its users and so we offer creative commons music licensing for those who don't have a record label or manager who represent them. This approach allows musicians to commerce their music and keep their copyrights without sacrificing their opportunities for potential deals that can arise over time.
              </div>
            </div>

            <div class="panel panel-primary">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a href="#accOneColThree"><i class="fal fa-check-circle fa-lg" style="color:#27AE60;"></i> IS RADION A MUSIC PLATFORM?</a>
                </h4>
              </div>
              <div class="panel-body" id="accOneColThree" align="justify">
                Yes it is! But what makes us different from the rest is the way we work with music. We see songs, podcast, and beats as assets! We produce (MP3s) files ready to transact without corrupting the file, without changing its format, without affecting copyrights, and 100% compatible with the world's top music platforms in the market today, including but not limited to: iTunes, Spotify, YouTube Music, Soundcloud, Napster, among others! Our promotion and distribution is free and open to any online radio that supports url feed. Our station's stream depends upon our peer to peer networks feedback arbitrated by users.
              </div>
            </div>

            <div class="panel panel-primary">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a href="#accOneColFour"><i class="fal fa-check-circle fa-lg" style="color:#27AE60;"></i> WHAT KIND OF TECHNOLOGY WE USE?</a>
                </h4>
              </div>
              <div class="panel-body" id="accOneColFour" align="justify">
                RADION platform works on Tezos blockchain. Tezos is a smart contract platform based on proof-of-stake consensus. This technology allow us to explore and develop unconventional web-based tools for the music industry. Tezos is linked to a digital cryptocurrency coin called tez (XTZ), which is part of our unique method of payment for musicians.
              </div>
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
          <h2><i class="fad fa-sliders-v-square"></i> FEATURES</h2>
        </div>
        <div class="panel-body list-group" style="padding-bottom:30px;">
          <div class="list-group-item">
            <h6 style="padding-left:5px;"><strong><i class="fas fa-hashtag fa-2x"></i>NON-FUNGIBLE TOKENS FOR MUSIC (NFT)</strong></h6>
            RADION FM allow musicians to create eternal non-fungible token (NFT) for their music.<br/>
          </div>

		  <div class="list-group-item">
            <h6 style="padding-left:5px;"><strong><i class="fab fa-creative-commons fa-2x"></i> MUSIC LICENSING</strong></h6>
            RADION FM offers music licensing in order to protect your musicians rights.<br/>
          </div>
          <div class="list-group-item">
            <h6 style="padding-left:5px;"><strong><i class="fas fa-user-friends fa-2x"></i> PLAYABLE BY ANYONE</strong></h6>
            RADION FM creates MP3 files compatible with all the online radio stations and music players.<br/>
          </div>
          <div class="list-group-item">
            <h6 style="padding-left:5px;"><strong><i class="fas fa-phone-laptop fa-2x"></i> CROSS-PLATFORM</strong></h6>
            RADION FM works on every mobile, tablet, desktop, across all browsers and operating systems.<br/>
          </div>
          <div class="list-group-item">
            <h6 style="padding-left:5px;"><strong><i class="far fa-wallet fa-2x"></i> DIRECT PAYMENT</strong></h6>
            Instant Payment for each song downloaded by users. Transaction confirm with blockchain technology.<br/>
          </div>
          <div class="list-group-item">
            <h6 style="padding-left:5px;"><strong><i class="fas fa-chart-network fa-2x"></i> PEER TO PEER NETWORK</strong></h6>
            Your music will start earning your royalties immediately without intervention of third party.<br/>
          </div>
        </div>
      </div>
    </div>
    <!-- END FEATURE FORM -->

    <!-- TWITTER FORM -->
    <div class="col-md-3">
      <div class="panel panel-default">
        <div class="panel-body">
          <h2><i class="fab fa-twitter"></i> LATEST TWEETS</h2>
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
        <a href="#sidebar_1" class="sidebar-tab"><i class="fas fa-newspaper"></i>&nbsp;&nbsp;NEWS</a>
        <a href="#sidebar_2" class="sidebar-tab"><i class="fad fa-user-headset"></i>&nbsp;&nbsp;&nbsp;ROAD MAP</a>
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

      <div class="sidebar-tab-content" id="sidebar_2">
        <!-- COMMENTS MODULAR -->
        <div style="padding-left:30px; padding-right:30px; height:1150px;">
        </div>
        <!-- END COMMENTS MODULAR -->
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
                  <strong>- DISCLOSURE -</strong><br>
                  <div style="padding-top:8px;"></div>
                  <i class="fab fa-creative-commons fa-2x"></i> <i class="fab fa-creative-commons-by fa-2x"></i>
                  <span align="justify" style="font-size:13px;">Except where otherwise noted, content on this site is licensed under a <a href="creative-commons-CC-BY-4_0.php" style="text-decoration:none">Creative Commons Attribution 4.0 International license</a>.</span>
                </blockquote>
              </div>
              <div class="col-md-3" align="left" style="height:150px; padding-right:1%; padding-top:25px;">
                <blockquote>
                  <strong>- JOIN OUR COMMUNITY -</strong><br>
                  <div style="padding-top:8px;"></div>
                  <p>Get in Touch with us and find us on social media!</p>
                  <!-- SOCIAL MEDIA -->
                  <span data-toggle="tooltip" data-placement="right" title="Twitter" style="margin-left:0px;"><a href="https://twitter.com/fm_radion" target="blank" rel="nofollow"><i class="fab fa-twitter fa-2x" style="color:#22262E;"></i></a></span>
                  <span><a href="https://www.youtube.com/channel/UCuJOeoT-2o2stPXXJJGzAdg" target="blank" rel="nofollow" data-toggle="tooltip" data-placement="left" title="YouTube"><i class="fab fa-youtube fa-2x" style="color:#22262E;"></i></a></span>
                  <span><a href="https://t.me/joinchat/TdHnxqPrcJPK3mZ1" target="blank" rel="nofollow" data-toggle="tooltip" data-placement="left" title="Telegram"><i class="fab fa-telegram fa-2x" style="color:#22262E;"></i></a></span>
                  <!-- SOCIAL MEDIA -->
                  <div style="padding-top:8px;"></div>
                </blockquote>
              </div>

              <div class="col-md-3" align="left" style="height:150px; padding-right:1%; padding-top:25px;">
                <blockquote>
                  <strong>- TECHNOLOGY -</strong><br>
                  <div style="padding-top:8px;"></div>
                  <p>Tezos is an open-source blockchain where you can build decentralized applications.</p>
                  <button type="button" class="btn btn-default btn-xs"><a href="https://tezos.com/get-started/" target="blank">LEARN MORE</a></button>
                </blockquote>
              </div>

              <div class="col-md-3" align="left" style="height:150px; padding-right:1%; padding-top:25px;">
                <blockquote>
                  <strong>- SUPPORT OUR PROJECT -</strong><br>
                  <div style="padding-top:8px;"></div>
                  <div style="margin-right: 20%;">This website was built on Tezos Blockchain. Any tez will help us to continue our cause. Thank you.</div>
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
      <a style="text-decoration: none;" href="our-mission.php" target="blank" class="linko"> Our Mission</a>
      <span style="color: #85929E;">|</span>
      <a style="text-decoration: none;" href="radion-ads.php" class="linko"> RADION Ads</a>
      <span style="color: #85929E;">|</span>
      <a style="text-decoration: none;" href="creative-commons.php" class="linko"> Creative Commons</a>
      <span style="color: #85929E;">|</span> <a style="text-decoration: none;" href="white-paper.pdf" target="blank" class="linko"> White paper</a>
      <span style="color: #85929E;">|</span> <a style="text-decoration: none;" href="free-ID3-tag-editor.php" target="blank" class="linko"> ID3 Tag Editor</a>
      <div style="padding-top:30px; padding-bottom:10px;">
        <p style="color:#85929E; margin-bottom:-3px;">© 2018 - 2021 RADION V1.1 </p>
        <p style="color:#85929E;">Made with <i class="fas fa-heart"></i> in Delaware, U.S.</p>
      </div>
    </div>

    <div style="background-color:#33414E; padding-bottom:10px; padding-right:30px;" align="right">
      <a style="text-decoration: none;" href="privacy-policy.php" class="linko">Privacy Policy</a>
      <span style="color: #85929E;">|</span> <a style="text-decoration:none;" href="terms-of-use.php" class="linko">Terms of Use </a>
      <span style="padding-right:20px; padding-left:20px;"></span>
      <a href="https://github.com/amakary" target="blank" rel="nofollow" style="color:#fff;"><i class="fab fa-github fa-lg"></i></a>
    </div>
  </footer>

  <!-- MESSAGE BOX-->
  <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
    <div class="mb-container" align="left">
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
    <div class="mb-container" align="left">
      <div class="mb-middle">
        <div class="mb-title"><span class="fas fa-sign-in-alt"></span> <strong>LET'S ROCK!</strong></div>
        <div class="mb-content">
          <p align="justify">
            <strong style="color:#F39C12;">Important reminder:</strong><br>
            RADION FM is an ongoing project founded by the Tezos Foundation. Our web-based system provides peer to peer promotion and distribution
			for your music. Although you may find many interesting features in our platform, our main focus is oriented to establish and popularize a "no custodian" payment structure in the music industry with Tezos blockchain. RADION
			allows you to upload your songs and receive instant payment if someone downloads your songs. You can also create non-fungible tokens
			(NFT) for your music and commerce your talent in a marketplace. These are just a few features that you would find in our platform. Enjoy!
			</p><br>
          <p>Press No to cancel or press Yes to get in now.</p>
        </div>
        <div class="mb-footer">
          <div class="pull-right">
            <a href="edit-profile.php" class="btn btn-info btn-lg">Yes</a>
            <button class="btn btn-default btn-lg mb-control-close">No</button>
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
  <script src="/js/backgroundChange.js"></script>
  <script src="/js/tezos.js"></script>
  <script src="js/demo_dashboard.js"></script>
  <script src="https://unpkg.com/@airgap/beacon-sdk@2.2.6/dist/walletbeacon.min.js"></script>
  <script>window.beaconSdk = beacon</script>
  <script src="https://unpkg.com/@taquito/taquito@9.0.1/dist/taquito.min.js"></script>
  <script src="https://unpkg.com/@taquito/beacon-wallet@9.0.1/dist/taquito-beacon-wallet.umd.js"></script>
  <script src="/js/helpers.js"></script>

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
      text: '<div align="justify" style="padding:15px;"><div><i class="fad fa-cart-arrow-down fa-2x"></i> &nbsp;&nbsp;<strong>DOWNLOAD ASSET</strong></div><div style="padding-left:60%; margin-top:-14px; font-size:10px; color:#f2c945;"><i class="fas fa-signal-stream fa-lg"></i> <strong id="d_station_name">MAIN STATION</strong> </div><div style="margin-top:10px; color:#999999; padding-bottom:1px;"><strong>Artist</strong>:&nbsp;&nbsp;&nbsp;<span style="color:#F2F4F4;" id="d_artist_name"></span></div><div style="color:#999999; padding-bottom:2px;"><strong>Song</strong>:&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:#F2F4F4;" id="d_song_name"></span></div><div style="color:#999999; padding-bottom:2px;"><strong>Asset:</strong>&nbsp;&nbsp;&nbsp;<span style="color:#F2F4F4;" id="d_album_name"></span></div><div style="padding-left:50%; position:absolute; margin-top:-15px; font-size:10px;"><strong>Licensed</strong>: <span style="color:#999999;"> <i class="fab fa-creative-commons fa-lg" style="color:#ccc;"></i> <i class="fab fa-creative-commons-by fa-lg" style="color:#ccc;"></i> <i class="fab fa-creative-commons-nc fa-lg" style="color:#ccc;"></i> <i class="fab fa-creative-commons-nd fa-lg" style="color:#ccc;"></i> </span></div><div style="color:#999999; font-size:0px;"">ID #:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:#fff; font-size:px;" id="d_id"> </span></div></div><div style="padding-left:10px; margin-bottom:0px;"><strong style="color:#f2c945;">TOTAL:&nbsp;&nbsp;</strong> <span style="color:#f2c945;" class="tezos-price">' + window.price + ' &#42793;</span>&nbsp;&nbsp;=&nbsp;&nbsp; $0.50 USD<div style="font-size:10px; position: absolute;left: 20px; bottom: -25px; z-index: 1; color:#808080;">Powered by Tezos Blockchain</div></div>',
      layout: 'topRight',
      buttons: [
        {
          addClass: 'btn btn-primary btn-clean btn-sm',
          text: '&#42793; Pay',
          onClick: function (noti) {
            noti.close()
            make_purchase()
          }
        },
        {
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
        }
      ]
    })
  }

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
      // Transfer 0.50USD to owner
      const op = await tezos.wallet.transfer({
        to: address,
        amount: downloadPrice
      }).send()

      const hash = op.opHash
      // Display TRANSACTION SENT alert
      noty({
        text: '<i class="far fa-exclamation-circle fa-lg"></i> Transaction Sent. Wait for confirmation!',
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
        search.append('usd', 0.50)

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
    } catch (e) {
      console.error(e)
      noty({
        text: 'Check your Balance. Make sure you enough funds.',
        layout: 'topRight',
        type: 'error',
        timeout: 5000
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
      const text = encodeURIComponent('I am listening "' + metadata.tit2 + '". You can download this #song with #crypto - tez/$XTZ - If you are a musician, you can mint your #CleanNFT #music on #Tezos with RADION FM.')
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
    $('#share_count').text(metadata.isDedicate)

    $('#like_post').html('')
    $('#unlike_post').html('')
    $('#love_post').html('')
    $('#share_post').html('')

    $('.fa-thumbs-up').removeClass('text-info')
    $('.fa-thumbs-down').removeClass('text-info')
    $('.fa-heart').removeClass('text-danger')
    $('.fa-download').removeClass('text-success')

    if (metadata.isVoted === '0') {
      $('.fa-thumbs-down').addClass('text-info')
    } else if (metadata.isVoted === '1') {
      $('.fa-thumbs-up').addClass('text-info')
    }

    if (metadata.isLoved === '1') {
      $('.fa-heart').addClass('text-danger')
    }

    if (metadata.isShared === '1') {
      $('.fa-share-alt').addClass('text-success')
    }
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

  async function getHash (id) {
    return new Promise((resolve, reject) => {
      $.ajax('/php/get_hash.php', {
        type: 'GET',
        data: { id: id },
        success: function (data, status, xhr) {
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
  updateSubmission()

  setInterval(updateHistory, 4000)
  setInterval(updateSong, 4000)
  setInterval(updateSubmission, 10000)
  </script>

  <script>
  const player = new Audio()
  let currentId = null

  $(document).on('click', '[data-hash]', async function (event) {
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
    } else if (vote === '4') {
      $('#share_post').html('')
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
  async function getEditions (address) {
    const storage = await tezos.contract.getStorage(address)
    const size = storage.next_edition_id.c[0]
    let counts = 0
    maxEditionsPerRun = storage.max_editions_per_run.c[0]

    for (let i = size - 1; i >= 0 && counts < 6; i--) {
      const edition = await storage.editions_metadata.get(i)
      await displayEdition(i, edition)
      editions[i] = edition
      counts++
    }
  }

  async function displayEdition (eid, edition) {
    const elem = $(editionTemplate).clone(true, true)
    const values = edition.edition_info.valueMap
    const numberOfEditions = edition.number_of_editions.c[0]
    const id = parseBytes(values.get('"asset_id"'))
    const songName = parseBytes(values.get('"song_name"'))
    const artist = parseBytes(values.get('"artist"'))
    const title = songName ? songName.substr(0, 27) : songName
    const sales = await getSales(fixedPrice, eid, edition)
    const price = sales.price / 1000000
    const hash = await getHash(id)
    const href = '/' + btoa(id) + '/' + hash

    let metadata = null
    try { metadata = await getMetadata(id) } catch (error) {}
    if (metadata === null) return

    $(elem).find('.nft-artwork').attr('src', metadata.artwork).removeClass('nft-artwork')
    $(elem).find('.nft-artist').text(artist).removeClass('nft-artist')
    $(elem).find('.nft-title').text(title).removeClass('nft-title')
    $(elem).find('.nft-issuer-address').text(edition.creator).removeClass('nft-issuer-address')
    $(elem).find('.nft-id').text(id).removeClass('nft-id')
    $(elem).find('.nft-price').text(price).removeClass('nft-price')
    $(elem).find('.nft-editions').text(sales.count + '/' + numberOfEditions).removeClass('nft-editions')
    $(elem).find('.nft-buy').attr('data-buy', eid).removeClass('nft-buy').click(buyEdition)
    $(elem).find('.nft-play').attr({
      href: href,
      'data-hash': hash
    }).removeClass('nft-play')
    $('#nft-editions').append(elem)
  }

  async function getSales (address, eid, edition) {
    const storage = await tezos.contract.getStorage(address)
    const keys = []
    let count = 0
    let price = 0

    for (let i = 0; i < edition.number_of_editions.c[0]; i++) {
      const tokenId = eid * maxEditionsPerRun + i
      keys.push({
        seller: edition.creator,
        sale_token: {
          token_for_sale_address: fa2,
          token_for_sale_token_id: tokenId
        }
      })
    }

    const values = await storage.sales.getMultipleValues(keys)
    values.valueMap.forEach(item => {
      if (item) {
        price = item.c[0]
        count++
      }
    })

    return { count, price }
  }

  async function buyEdition (event) {
    const eid = parseInt($(this).attr('data-buy'))
    const edition = editions[eid]
    const numberOfEditions = edition.number_of_editions.c[0]
    const network = { type: NetworkType.MAINNET, rpcUrl: rpc }
    await wallet.requestPermissions({ network })

    const contract = await tezos.wallet.at(fixedPrice)
    const storage = await contract.storage()
    let salePrice = 0
    let sale = null

    for (let i = 0; i < numberOfEditions; i++) {
      const tokenId = eid * maxEditionsPerRun + i
      try {
        const key = {
          seller: edition.creator,
          sale_token: {
            token_for_sale_address: fa2,
            token_for_sale_token_id: tokenId
          }
        }
        const value = await storage.sales.get(key)

        sale = key
        salePrice = value.c[0] / 1000000
        break
      } catch (error) {}
    }

    if (sale !== null) {
      const tokenId = sale.sale_token.token_for_sale_token_id
      const id = parseBytes(edition.edition_info.get('asset_id'))
      const operation = await contract.methods.buy(sale.seller, fa2, tokenId).send({
        amount: salePrice
      })

      noty({
        text: 'Waiting for confirmation',
        layout: 'topRight',
        timeout: 5000
      })

      const hash = operation.opHash
      await operation.confirmation(1)
      const search = new URLSearchParams()
      search.append('op', hash)
      search.append('id', id)
      search.append('xtz', salePrice)
      search.append('usd', parseFloat(window.priceUsd) * salePrice)

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
      noty({
        text: 'Unable to find the edition',
        layout: 'topRight',
        type: 'error',
        timeout: 5000
      })
    }
  }

  const fa2 = 'KT1WjTTTgHy5MojfoAe1yFUGU6roLaE2x8Uj'
  const fixedPrice = 'KT1BNXQ8XLbBqapbQjPVg3xFnxoade2UjxE6'
  const editions = {}
  let maxEditionsPerRun = 0

  let editionTemplate = null
  let tokenTemplate = null
  let userTemplate = null

  $(document).ready(function () {
    editionTemplate = $('#temp-edition').prop('content')
    tokenTemplate = $('#temp-nft').prop('content')
    userTemplate = $('#temp-user').prop('content')

    $.getJSON('https://api.better-call.dev/v1/contract/mainnet/KT1MR8e46WJBq4RcFSogiDbSg3ceDRi81hpE/tokens', function (data) {
      displayTokens(data)
    })

    $.getJSON('/php/top_sellers.php', function (data) {
      displayUsers(data)
    })

    getEditions(fa2)

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
    for (let i = 0; i < data.length && counts < 6; i++) {
      const elem = $(tokenTemplate).clone(true, true)
      const nft = data[i]
      const owner = await getCurrentOwner(nft.token_id)
      const id = nft.name !== 'Unknown' ? nft.name : nft.extras.asset_id
      const songName = nft.extras.song_name || (nft.extras.asset && nft.extras.asset.song_name)
      const title = songName ? songName.substr(0, 27) : songName
      const artist = nft.extras.artist || (nft.extras.asset && nft.extras.asset.artist)
      let metadata = null
      try { metadata = await getMetadata(id) } catch (error) {}

      if (metadata === null) continue
      $(elem).find('.nft-artwork').attr('src', metadata.artwork).removeClass('nft-artwork')
      $(elem).find('.nft-artist').text(artist).removeClass('nft-artist')
      $(elem).find('.nft-title').text(title).removeClass('nft-title')
      $(elem).find('.nft-issuer-address').text(owner).removeClass('nft-issuer-address')
      $(elem).find('.nft-id').text(id).removeClass('nft-id')
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
