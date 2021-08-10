<?php

$groupswithaccess = 'RADIONER,CEO,FOUNDER';
require_once 'slpw/sitelokpw.php';
require_once 'slpw/slconfig.php';
require_once 'php/music_info_get.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- META SECTION -->
  <title>Vote Room</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="icon" href="favicon.ico" type="image/x-icon">
  <!-- END META SECTION -->

  <!-- CSS INCLUDE -->
  <link rel="stylesheet" id="theme" href="/css/theme-dark.css">
	<link rel="stylesheet" href="/css/fontawesome-all.css">
	<link rel="stylesheet" href="/css/cropper/cropper.min.css">
  <!-- EOF CSS INCLUDE -->

  <link rel="apple-touch-icon" sizes="57x57" href="/favicon/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="/favicon/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="/favicon/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="/favicon/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="favicon/apple-icon-114x114.png">
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

  <script src="https://cdn.lordicon.com//libs/frhvbuzj/lord-icon-2.0.2.js"></script>
  <style>
  .fa-play-circle:hover { color: #27AE60; }
  .fa-thumbs-up:hover { color: #27AE60; }
  .fa-thumbs-down:hover { color: #B04443; }
  .blobs-container { display: flex; }

  .blob {
  	background: black;
  	border-radius: 50%;
  	box-shadow: 0 0 0 0 rgba(0, 0, 0, 1);
  	margin: 2px;
  	height: 10px;
  	width: 10px;
  	transform: scale(1);
  	animation: pulse-black 2s infinite;
  }

  @keyframes pulse-black {
  	0% {
  		transform: scale(0.95);
  		box-shadow: 0 0 0 0 rgba(0, 0, 0, 0.7);
  	}

  	70% {
  		transform: scale(1);
  		box-shadow: 0 0 0 10px rgba(0, 0, 0, 0);
  	}

  	100% {
  		transform: scale(0.95);
  		box-shadow: 0 0 0 0 rgba(0, 0, 0, 0);
  	}
  }

  .blob.green {
  	background: rgba(51, 217, 178, 1);
  	box-shadow: 0 0 0 0 rgba(51, 217, 178, 1);
  	animation: pulse-green 2s infinite;
  }

  @keyframes pulse-green {
  	0% {
  		transform: scale(0.95);
  		box-shadow: 0 0 0 0 rgba(51, 217, 178, 0.7);
  	}

  	70% {
  		transform: scale(1);
  		box-shadow: 0 0 0 10px rgba(51, 217, 178, 0);
  	}

  	100% {
  		transform: scale(0.95);
  		box-shadow: 0 0 0 0 rgba(51, 217, 178, 0);
  	}
  }

  .fa-sort-down { color:#C0392B; }
  .fa-sort-up { color:#27AE60; }
  .tDown { color:#C0392B; }
  .tUp { color:#27AE60; }
  </style>

  <?php if (function_exists('startwhoisonline'))  startwhoisonline(''); ?>
  <script>var memberprofilepage = 1</script>
  <?php if (function_exists('startwhoisonline')) startwhoisonline('userid'); ?>

</head>
<body>
  <!-- START PAGE CONTAINER -->
  <div class="page-container">

    <!-- START PAGE SIDEBAR -->
    <div class="page-sidebar">
        <!-- START X-NAVIGATION -->
        <ul class="x-navigation">
            <li class="xn-logo">
            <a href="index.php">RADION</a>
            <a href="#" class="x-navigation-control"></a>
        </li>
        <li class="xn-profile">
            <a href="#" class="profile-mini">
                <img src="<?php siteloklink($slcustom2, 0); ?>" alt="" />
            </a>
            <div class="profile">
                <div class="profile-image">
                    <img src="<?php siteloklink($slcustom2, 0); ?>" alt="" />
                </div>
                <div class="profile-data">
                    <div class="profile-data-name"><?php echo $slusername; ?></div>
                    <div class="profile-data-title"><?php echo $slusergroups; ?></div>
                </div>
                <div class="profile-controls">
                    <a href="#" class="profile-control-left sidebar-toggle"><i class="far fa-comment-alt-lines"></i></a>
                    <a href="edit-profile.php" class="profile-control-right"><i class="fad fa-user-edit"></i></a>
                </div>

            </div>
        </li>
        <li class="xn-openable">
        <a href="#">
          <lord-icon src="https://cdn.lordicon.com//mmspidej.json" trigger="click" target="a" colors="primary:#ffffff,secondary:#F39C12" style="width:45px;height:45px"></lord-icon>
          <span class="xn-text">&nbsp;&nbsp; MUSIC</span>
        </a>
        <ul>
            <li><a href="submission.php"><span class="xn-text"><i class="fad fa-upload fa-lg"></i>&nbsp;&nbsp; UPLOAD FILE</span></a></li>
            <li><a href="mint-NFT-song-track.php"><span class="xn-text"><i class="fad fa-compact-disc fa-lg"></i> &nbsp;&nbsp; CREATE A NFT SONG TRACK</span></a></li>
        </ul>
    </li>

    <li class="xn-openable">
        <a href="#">
          <lord-icon src="https://cdn.lordicon.com//hciqteio.json" trigger="click" target="a" colors="primary:#ffffff,secondary:#F39C12" style="width:45px;height:45px"></lord-icon>
          <span class="xn-text">&nbsp;&nbsp; DISCOVER MUSIC</span>
        </a>
        <ul>
            <li><a href="marketplace.php"><span class="xn-text"><i class="fad fa-poll-people fa-lg"></i>&nbsp;&nbsp; ENGAGE WITH NEW TALENTS</span></a></li>
            <li><a href="NFT-music-marketplace-tezos.php"><span class="xn-text"><i class="fas fa-album-collection fa-lg"></i>&nbsp;&nbsp; NFT MARKETPLACE FOR MUSIC</span></a></li>
        </ul>
    </li>

    <li class="xn-openable">
    <a href="#">
      <lord-icon src="https://cdn.lordicon.com//dizvjgip.json" trigger="click" target="a" colors="primary:#ffffff,secondary:#F39C12" style="width:45px;height:45px"></lord-icon>
      <span class="xn-text">&nbsp;&nbsp; RADION SERVICES</span>
    </a>
        <ul>
          <li><a href="ad-submission.php"><span class="xn-text"><i class="far fa-ad fa-lg"></i>&nbsp;&nbsp; CREATE AD WITH CRYPTO</span></a></li>
          <li><a href="#"><span class="xn-text"><i class="fal fa-fingerprint fa-lg"></i>&nbsp;&nbsp; ISRC ASSIGNMENT &nbsp;&nbsp;&nbsp;<label class="label label-primary"> SOON</label></span></a></li>
          <li><a href="#"><span class="xn-text"><i class="fad fa-chart-network fa-lg"></i>&nbsp;&nbsp; MUSIC SYNC LICENSING &nbsp;&nbsp;&nbsp;<label class="label label-primary"> SOON</label></span></a></li>
        </ul>
    </li>

<li class="xn-openable">
<a href="submission.php">
  <lord-icon src="https://cdn.lordicon.com//zqxcrgvd.json" trigger="click" target="a" colors="primary:#ffffff,secondary:#F39C12" style="width:45px;height:45px"></lord-icon>
  <span class="xn-text">&nbsp;&nbsp; LAB</span>
</a>
<ul>
  <li><a href="#"><span class="xn-text"><i class="fad fa-sack-dollar fa-lg"></i>&nbsp;&nbsp; MECHANICAL ROYALTIES &nbsp;&nbsp;&nbsp;<label class="label label-warning"> IN PROGRESS</label></span></a></li>
  <li><a href="#"><span class="xn-text"><i class="fad fa-sack-dollar fa-lg"></i>&nbsp;&nbsp; CRYPTO BILLBOARD &nbsp;&nbsp;&nbsp;<label class="label label-warning"> IN PROGRESS</label></span></a></li>
</ul>
    </li>

        </ul>
        <!-- END X-NAVIGATION -->
    </div>
    <!-- END PAGE SIDEBAR -->

    <!-- PAGE CONTENT -->
    <div class="page-content">
      <!-- START X-NAVIGATION VERTICAL -->
      <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
        <!-- TOGGLE NAVIGATION -->
        <li class="xn-icon-button">
          <a href="#" class="x-navigation-minimize"><span class="fas fa-outdent"></span></a>
        </li>
        <!-- END TOGGLE NAVIGATION -->

        <li class="xn-icon-button pull-right" style="margin-right:0px;">
          <a href="#" class="sidebar-toggle"><span class="fas fa-ellipsis-v"></span></a>
        </li>

        <!-- POWER OFF -->
        <li class="xn-icon-button pull-right last">
          <a href="#"><span class="fa fa-power-off"></span></a>
          <ul class="xn-drop-left animated zoomIn">
            <li><a href="pages-lock-screen.html"><span class="fa fa-lock"></span> Lock Screen</a></li>
            <li><a href="#" class="mb-control" data-box="#mb-signout"><span class="fas fa-sign-out-alt"></span> Sign Out</a></li>
          </ul>
        </li>
        <!-- END POWER OFF -->

        <!-- ALERT NOTIFICATIONS -->
        <li class="xn-icon-button pull-right">
          <a href="#"><span class="fas fa-bell"></span></a>
          <div class="informer informer-danger"><?php if (function_exists('sl_showprivatemessagecount')) { sl_showprivatemessagecount(); } ?></div>
          <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
            <div class="panel-heading">
              <h3 class="panel-title"><span class="fa fa-bell"></span> Notifications</h3>
              <div class="pull-right">
                <span class="label label-danger"><?php if (function_exists('sl_showprivatemessagecount')) { sl_showprivatemessagecount(); } ?> new</span>
              </div>
            </div>
            <div class="panel-body list-group list-group-contacts scroll" style="height: 200px;">
            </div>
            <div class="panel-footer text-center">
              <a href="#" class="sidebar-toggle">Show all messages</a>
            </div>
          </div>
        </li>

        <!-- ALERT NOTIFICATIONS ENDS -->
        <!-- LANG BAR -->
        <li class="xn-icon-button pull-right">
          <a href="#"><span class="fas fa-language fa-lg"></span></a>
          <ul class="xn-drop-left xn-drop-dark animated zoomIn">
            <li><a href="#"><img src="img/flags/us.png" style="height:20px; width:20;">&nbsp &nbsp English</a></li>

          </ul>
        </li>
        <!-- END LANG BAR -->
      </ul>
      <!-- END X-NAVIGATION VERTICAL -->

      <!-- START BREADCRUMB -->
      <ul class="breadcrumb">
      </ul>
      <!-- END BREADCRUMB -->

      <!-- PAGE CONTENT WRAPPER -->
      <div class="page-content-wrap">
        <div class="row">
          <div class="col-md-12">
            <div class="alert alert-info" role="alert" id="message_box" style="display:none">
              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
              <span><i class="fa fa-audio-description fa-lg"></i></span><span style="padding-right:20px;"></span>
              <span id="aon_sibmission">RADION is always active in Social Media! If you want to be updated with our progress, we recommend you to follow us in our <a href="https://web.telegram.org/#/im?p=@radion_project" target="blank">Telegram</a> Group.</span>
            </div>
          </div>
        </div>

        <!-- START WIDGETS -->
        <div class="row">

          <div class="col-md-3">
            <!-- START WIDGET MESSAGES -->
            <div class="widget widget-primary widget-item-icon">
              <div class="widget-item-left">
                <img src="img/ON-logo.png" style="height:40px; width:40px;">
              </div>
              <div class="widget-data">
                <div class="widget-int num-count">TOKEN</div>
                <div class="widget-title">BALANCE</div>
                <div class="widget-subtitle radio-balance" style="color:#F39C12;">0 RADIO</div>
              </div>
            </div>
            <!-- END WIDGET MESSAGES -->
          </div>

          <div class="col-md-3">
            <!-- START WIDGET MESSAGES -->
            <div class="widget widget-primary widget-item-icon">
                    <div class="widget-item-left">
                        <div style="height:40px; width:40px; margin-left:10px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="47" height="64" viewBox="0 0 47 64">
                                <path style="fill:#737577;" d="M30.252 63.441c-4.55 0-7.864-1.089-9.946-3.267-2.08-2.177-3.121-4.525-3.121-7.041 0-.92.181-1.694.544-2.323a3.993 3.993
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
                    </div>
                    <div class="widget-data">
                        <div class="widget-int num-count">XTZ</div>
                        <div class="widget-title">BALANCE</div>
                        <div class="widget-subtitle xtz-balance" style="color:#F39C12;">0 <span>&#42793;</span></div>
                    </div>

                </div>
                <!-- END WIDGET MESSAGES -->

            </div>


            <div class="col-md-6">

                <!-- START WIDGET CLOCK -->
                <div class="widget widget-primary widget-padding-sm">
                    <div class="widget-controls">
                        <div style="height:35px; width:35px; margin-bottom:-37px; padding-left:20px;" class="widget-control-left">
                            <svg xmlns="http://www.w3.org/2000/svg" width="47" height="64" viewBox="0 0 47 64">
                                <path style="fill:#7B7D7D;" d="M30.252 63.441c-4.55 0-7.864-1.089-9.946-3.267-2.08-2.177-3.121-4.525-3.121-7.041 0-.92.181-1.694.544-2.323a3.993 3.993
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
        <div style="width:100%; margin:5px 20px 0px 40px; color:#7B7D7D;" align="left">
    <h5><strong style="color:#7B7D7D;">Tezos</strong></h5>
    <div style="margin-top:-10px; font-size:11px;">XTZ/USD</div>
    </div>
                    </div>

                    <div class="widget-big-int" style="margin-top:-33px;"><small>$</small><span class="tezos-price-usd"></span></div>
                    <div class="widget-subtitle">Change 24h
                      <span>
                        <span class="tezos-change-24hr-down" style="display:none;">
                          <span class="fas fa-sort-down fa-xs" style="vertical-align:2px;"></span>
                          <span class="tDown tezos-change-24hr" style="font-size:12px;"></span>
                        </span>
                        <span class="tezos-change-24hr-up" style="display:none;">
                          <span class="fas fa-sort-up fa-xs" style="vertical-align:-2px;"></span>
                          <span class="tUp tezos-change-24hr" style="font-size:12px;"></span>
                        </span>
                      </span>
                    </div>
                    <div class="widget-buttons widget-c3">


                            <div align="left" style="margin-top:0px; padding-left:15px;">
                            <!-- <span><a href="#modal_basic" class="widget-control-right linko" data-toggle="modal" style="font-size:13px; text-decoration:none;"><i class="fad fa-wallet"></i> Connect Wallet</a></span> -->
                            <span><a href="#" id="connect-wallet" class="widget-control-right" style="font-size:13px; text-decoration:none; color:#F39C12;"><i class="fad fa-wallet"></i> Connect Wallet</a></span>
                            <span style="padding-right:3px; padding-left:3px;">|</span>
                            <span><a href="#modal_small" data-toggle="modal" style="font-size:13px; text-decoration:none; color:#F39C12;"><i class="fad fa-qrcode"></i> Receive</a></span>
                            <span style="padding-right:3px; padding-left:3px;">|</span>
                            <span style="color:#797D7F;">USD Balance <i class="fas fa-dollar-sign"></i> <span class="usd-balance">0</span></span>
          </div>

                    </div>
                </div>
                <!-- END WIDGET CLOCK -->

            </div>
        </div>
        <!-- END WIDGETS -->

<div class="row">
            <div class="col-md-12">
              <div class="panel panel-default">
                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-9">
					<form class="form-horizontal">
                                <h5 style="padding-left:3%;"><strong><i class="fas fa-vote-yea"></i> VOTE ROOM</strong></h5>
								<div align="right" style="padding-right:20px; margin-top:-10px; margin-bottom:-10px; padding-bottom:0px;"><i class="fas fa-check-square"></i> Current Entires: </div>
								<hr>
                                <div class="panel panel-default tabs">
                                    <ul class="nav nav-tabs" role="tablist" style="padding-bottom:20px;" id="data_tab">

                                        <li id="tb1"  onclick="tab_changes(0)"class="active"><a href="#tab-first" role="tab" data-toggle="tab">Indie Rock</a></li>
                                        <li id="tb2"  onclick="tab_changes(1)"><a href="#tab-second" role="tab" data-toggle="tab">Pop Music</a></li>
										<li id="tb3" onclick="tab_changes(2)" ><a href="#tab-third" role="tab" data-toggle="tab">Country Music</a></li>
										<li id="tb4"  onclick="tab_changes(3)"><a href="#tab-fourth"  role="tab" data-toggle="tab">Hip Hop / R&B</a></li>
										<li id="tb5" onclick="tab_changes(4)" ><a href="#tab-fifth" role="tab" data-toggle="tab">Latino</a></li>
										<li id="tb6" onclick="tab_changes(5)"><a href="#tab-six" role="tab" data-toggle="tab">Beats</a></li>
										<li id="tb7" onclick="tab_changes(7)"><a href="#tab-eight" role="tab" data-toggle="tab">RAP</a></li>
										<li id="tb8" onclick="tab_changes(6)"><a href="#tab-seven" role="tab" data-toggle="tab">Podcast</a></li>
										<li id="tb9" onclick="tab_changes(8)"><a href="#tab-ninth" role="tab" data-toggle="tab">Deep Music</a></li>
										<li id="tb10" onclick="tab_changes(9)"><a href="#tab-tenth" role="tab" data-toggle="tab">Classic Music</a></li>
										<li id="tb11" onclick="tab_changes(10)"><a href="#tab-eleventh" role="tab" data-toggle="tab">Electronics</a></li>
										<li id="tb12" onclick="tab_changes(11)"><a href="#tab-twelfth" role="tab" data-toggle="tab">Techno</a></li>
										<li id="tb13" onclick="tab_changes(12)"><a href="#tab-thirteenth" role="tab" data-toggle="tab">Alternative Rock</a></li>
										<li id="tb14" onclick="tab_changes(13)"><a href="#tab-fourteenth" role="tab" data-toggle="tab">House Music</a></li>
										<li id="tb15" onclick="tab_changes(14)"><a href="#tab-fifteenth" role="tab" data-toggle="tab">Latin Music</a></li>
										<li id="tb16" onclick="tab_changes(15)"><a href="#tab-sixteenth" role="tab" data-toggle="tab">Romantic</a></li>
										<li id="tb17" onclick="tab_changes(16)"><a href="#tab-seventeenth" role="tab" data-toggle="tab">Relaxing</a></li>
										<li id="tb18" onclick="tab_changes(17)"><a href="#tab-eighteenth" role="tab" data-toggle="tab">Kids</a></li>
										<li id="tb19" onclick="tab_changes(18)"><a href="#tab-nineteenth" role="tab" data-toggle="tab">Jazz</a></li>
										<li id="tb20" onclick="tab_changes(19)"><a href="#tab-twentieth" role="tab" data-toggle="tab">Blue</a></li>
                    <li id="tb21" onclick="tab_changes(20)"><a href="#tab-twentyfirst" role="tab" data-toggle="tab">Commercial</a></li>
                                    </ul>
                                    <div class="panel-body tab-content" id="DATATABLE_FOR_LOAD" style="min-height: 350px;">

                                    </div>

                                </div>

                            </form>
					</div>
                    <div class="col-md-3">
					 <!-- PROFILE WIDGET -->


                            <div class="panel panel-default" style="padding-bottom:23px; background-color:#F3F3F3">
                                <div class="panel-body profile bg-primary">

                                    <div class="profile-image">
                                        <img id="ad_work" src="/img/offline.jpg" alt="" width="95px" height="95px">
                                    </div>
                                    <div class="profile-data">
                                        <h5 style="color:#D25607;"><strong id="user_name"><?php echo $USER_NAME;?></strong></h5>
                                        <div class="profile-data-title" style="color:#FFF;" id="song_name"><?php echo $SONG_NAME;?></div>
                                    </div>
                                    <div class="profile-controls">
									<input type="text" value="<?php echo $audio_link;?>" class="hide" id="audio_src">
									<input type="text" value="<?php echo $SONG_ID;?>" class="hide" id="song_id">
                  <input type="text" value="" class="hide" id="rdon_id">

                                        <a onclick="play_audio()" class="profile-control-left"><i class="fas fa-play" name="" id="play_icon"></i></a>
                                        <a onclick="sendAjax(3)" class="profile-control-right" id="love_post"><span class="fas fa-heart"></span></a>
                                    </div>

                                </div>
                                <div class="panel-body list-group" style="padding-top:20px; background-color:#F3F3F3">
<div style="width:100%;">
<span style="padding-left:10px; padding-right:40%;"><i href="#" class="fas fa-check-circle"></i> VOTE</span>
<button class="btn btn-default btn-condensed" onclick="sendAjax('2')" id="like_btn"><i class="fas fa-thumbs-up"></i></button>
<span style=" padding-bottom:10px; padding-left:5px; padding-right:5px;">-</span>
<button class="btn btn-default btn-condensed" style="padding-right:10px;" onclick="sendAjax('1')" id="unlike_post"><i class="fas fa-thumbs-down"></i></button>
</div>
<hr>
<div style="width:100%;" id="sponsor_section" class="<?php echo $investor_section;?>">
<span style="width:90%; padding-left:10px;"><a href="#" class="fas fa-briefcase"></a> INVESTOR SECTION</span>
<div style="padding-left:10px; padding-top:10px;" >- Investors: <span id="investors"><?php echo $INVEST;?></span></div>
	<div style="padding-left:10px; padding-top:10px;" >- Payable USD: <i class="fa fa-dollar-sign"></i> <span id="payable_amount">0</span></div>
<div style="padding-left:10px; padding-top:10px; padding-bottom:20px;" >- Potential Payout: <span id="have_to_pay_for_invest"><?php echo $INVEST_RADIO;?></span></div>
<div style="padding-left:20px;">

<table>
<tr>
<td><button class="btn btn-warning" id="sponsore_btn" onClick="notyConfirm1();"><i class="fas fa-dollar-sign"> </i> INVEST IN ASSET!</button></td>

<td><div  style="position:relative;" id="spon_per">


</div></td>
</tr>

</table>
</div>
</div>
<hr>
<div style="width:100%;">
<span style="width:90%; padding-left:10px;"><a href="#" class="fas fa-dollar-sign"></a> PURCHASE</span>
<div align="right" style="padding-right:15px;" id="download_btn"><?php echo $purchase_btn;?></div>
</div>
									</div>
                            </div>

                        <!-- END PROFILE WIDGET -->
					</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
</div>
                <!-- END PAGE CONTENT WRAPPER -->
            </div>
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->

<!-- START SIDEBAR -->
        <div class="sidebar">
            <div class="sidebar-wrapper scroll">

                <div class="sidebar-tabs">
                    <a href="#sidebar_1" class="sidebar-tab"><span class="fas fa-info-circle"></span> Community</a>
                    <a href="#sidebar_2" class="sidebar-tab"><span class="fas fa-map-signs"></span> Road Map</a>
                </div>

                <div class="sidebar-tab-content active" id="sidebar_1">
                    <div style="padding-left:10px; padding-right:10px; height:730px;">

                  </div>
                </div>

                <div class="sidebar-tab-content form-horizontal" id="sidebar_2">

<div style="padding-left:30px; padding-right:30px; height:1150px;">
						<small>

						</small>
                    </div>
                </div>

            </div>
        </div>
        <!-- END SIDEBAR -->

				    <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fas fa-sign-out-alt"></span> Log <strong>Out</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to log out?</p>
                        <p>Press No if you want to continue work. Press Yes to logout current session.</p>
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
  <!----Audio Player------>
  <div id="_audio_player_canv" class="hide">
    <audio id="audio_player" controls>
      <source src="" type="audio/mpeg">
      Your browser does not support the audio element.
    </audio>
  </div>

  <!-- Audio Player -->
  <!-- START PRELOADS -->
  <audio id="audio-alert" src="audio/alert.mp3" preload="auto"></audio>
  <audio id="audio-fail" src="audio/fail.mp3" preload="auto"></audio>
  <!-- END PRELOADS -->

  <!-- START SCRIPTS -->
  <!-- START PLUGINS -->
  <script src="/js/plugins/jquery/jquery.min.js"></script>
  <script src="/js/plugins/jquery/jquery-ui.min.js"></script>
  <script src="/js/plugins/bootstrap/bootstrap.min.js"></script>
	<script src="/js/all.js"></script>
  <!-- END PLUGINS -->

  <!-- START THIS PAGE PLUGINS-->
  <script src="/js/plugins/icheck/icheck.min.js"></script>
  <script src="/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
  <script src="/js/plugins/scrolltotop/scrolltopcontrol.js"></script>
	<script src="/js/plugins/daterangepicker/daterangepicker.js"></script>
	<script src="/js/plugins/fileinput/fileinput.min.js"></script>
  <script src="/js/plugins/rickshaw/d3.v3.js"></script>
  <script src="/js/plugins/rickshaw/rickshaw.min.js"></script>
  <script src="/js/plugins/owl/owl.carousel.min.js"></script>
  <script src="/js/plugins/moment.min.js"></script>
	<script src="/js/plugins/jstree/jstree.min.js"></script>
	<script src="/js/demo_file_handling.js"></script>
  <!-- END THIS PAGE PLUGINS-->

  <!-- THIS PAGE PLUGINS -->
  <script src="/js/plugins/bootstrap/bootstrap-file-input.js"></script>
  <script src="/js/plugins/bootstrap/bootstrap-select.js"></script>

	<script src="/js/plugins/noty/jquery.noty.js"></script>
  <script src="/js/plugins/noty/layouts/topRight.js"></script>

  <!-- END THIS PAGE PLUGINS -->

  <!-- START TEMPLATE -->
  <script src="/js/plugins.js"></script>
  <script src="/js/actions.js"></script>
	<script src="/js/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="/js/demo_dashboard.js"></script>


  <!-- END TEMPLATE -->
	<script src="/js/plugins/noty/themes/default.js"></script>

  <script src="/js/tezos.js"></script>
	<!-- START SCRIPTS -->

	<script>
  let active_tab = 0

  $(document).ready(function () {
    express_view()
    $('#sponsore_btn').prop('disabled', true)
    load_data_table()
    setInterval(load_data_table, 1000)
  })

	function tab_change () {
    const tabs = [
      '#tab-first',
      '#tab-second',
      '#tab-third',
      '#tab-fourth',
      '#tab-fifth',
      '#tab-six',
      '#tab-seven',
      '#tab-eight',
      '#tab-ninth',
      '#tab-tenth',
      '#tab-eleventh',
      '#tab-twelfth',
      '#tab-thirteenth',
      '#tab-fourteenth',
      '#tab-fifteenth',
      '#tab-sixteenth',
      '#tab-seventeenth',
      '#tab-eighteenth',
      '#tab-nineteenth',
      '#tab-twentieth',
      '#tab-twentyfirst'
    ]

    $(tabs.join()).removeClass('active')
    $(tabs[active_tab]).addClass('active')
	}

	function tab_changes (tab_no) {
    active_tab = tab_no
	}

  function load_data_table () {
    $.ajax('load_music_table.php', {
      type: 'POST',
      success: function (data) {
        $("#DATATABLE_FOR_LOAD").html(data)
        tab_change()
        // $('#download_btn').html('<button class="btn btn-default" onClick="notyConfirm()"><i class="fas fa-download"></i> BUY NOW</button>');
			},
      error: function (xhr, ajaxOptions, thrownError) {}
		})
  }

  function notyConfirm1 () {
    noty({
      text: 'Do you want to continue sponsorship?',
      layout: 'topRight',
      buttons: [{
        addClass: 'btn btn-success btn-clean',
        text: 'Ok',
        onClick: function ($noty) {
          $noty.close()
          // noty({ text: 'You clicked "Ok" button', layout: 'topRight', type: 'success' })
          // purches_song()
          submit_sponsor_ship()
        }
      }, {
        addClass: 'btn btn-danger btn-clean',
        text: 'Cancel',
        onClick: function ($noty) {
          $noty.close()
        }
      }]
    })
  }

  function notyConfirm () {
    noty({
      text: 'Do you want to continue purchase ? Will deduct $XTZ from your account',
      layout: 'topRight',
      buttons: [{
        addClass: 'btn btn-success btn-clean',
        text: 'Ok',
        onClick: function ($noty) {
          $noty.close()
          // noty({ text: 'You clicked "Ok" button', layout: 'topRight', type: 'success' })
          purchaseSong()
        }
      }, {
        addClass: 'btn btn-danger btn-clean',
        text: 'Cancel',
        onClick: function ($noty) {
          $noty.close()
        }
      }]
    })
  }

	var myVar = null
	var last_id

  function play_audio () {
    song_id = $('#song_id').val()
    var audioplayer = document.getElementById('audio_player')
    if (audioplayer.paused) {
      if (myVar !== null) clearInterval(myVar)
      $('#play_icon').removeClass('fas fa-play')
      $('#play_icon').addClass('fa-stop')
      last_id	= song_id

      audioplayer.load()
      audioplayer.play()
      count = 0
      myVar = setInterval(function () {
        if (count == 30) {
          audioplayer.pause()
          // $('#play_icon_'+song_id).removeClass('fa-stop-circle')
          // $('#play_icon_'+song_id).addClass('fa-play-circle fa-lg')
          $('#play_icon').addClass('fas fa-play')
          $('#play_icon').removeClass('fa-stop')
          count = 0
          clearInterval(myVar)
        }

        count++
      }, 1000)
    } else {
      audioplayer.pause()
      $('#play_icon').removeClass('fa-stop')
      $('#play_icon').addClass('fa-play')
    }
  }

  function information_pass (song_id,rdon_id,user_name,song_name,album_name,total_investor,invested_amunt,want_investor,have_purchase,total_sell_percentage,payable_amount,music_src,adwakr_src){
//fibonacci(total_sell_percentage);
 ///alert(song_id+" : "+user_name+" : "+song_name+" : "+album_name+" : "+total_investor+" : "+music_src);
if(have_purchase==1){


	$('#download_btn').html('<button class="btn btn-default" onClick="purchaseSong()"><i class="fas fa-download"></i> DOWNLOAD</button>');


	}else{

    $('#download_btn').html('<button class="btn btn-default" onClick="notyConfirm()"><i class="fas fa-download"></i> BUY NOW</button>');

}


  if(want_investor==1){
  var myArray = new Array();
  var option_list='<select class="btn btn-primary " style="padding-left:5px;padding-right=5px;"id="invest_persent">';

  var available_percnatage =100-total_sell_percentage;

  //alert(available_percnatage);
    var a = 1, b = 0, temp;
	var value="";


if(available_percnatage>0){
var tmp1=0;
var counter=0;
 while (available_percnatage >= 0){

if(b<=available_percnatage_tmp){

    temp = a;
    a = a + b;
	 b = temp;
	if(b!=tmp1 && b<=available_percnatage_tmp){
	  value+=b+":";
	myArray[counter]=b;
	tmp1=b;
	counter++;
	}

}
    available_percnatage--;


  }



var arrayLength = myArray.length;
if(myArray[arrayLength-1]==available_percnatage_tmp){

     option_list+='<option value="'+available_percnatage_tmp+'">Full fill</option>';

}else{

     option_list+='<option value="'+available_percnatage_tmp+'">Full fill</option>';
        option_list+='<option value="'+myArray[arrayLength-1]+'">'+myArray[arrayLength-1]+'%</option>';


}
for (var i = arrayLength; i > 1; i--) {
   //alert(myArray[i-1]);



        option_list+='<option value="'+myArray[i-2]+'">'+myArray[i-2]+'%</option>';



}

  option_list+='</select>';

    $('#spon_per').html(option_list);

	 			$( "#sponsore_btn" ).prop( "disabled", false );
	 			$( "#invest_persent" ).prop( "disabled", false );
}else{

                $("#sponsore_btn").prop("disabled", true );
	 			$("#invest_persent").prop( "disabled", true );
 	//alert("disabled");


}




//  $("#sponsor_section").removeClass( "hide" )

    //  $('#sponsor_section').show();



  }else{
       // $('#sponsor_section').hide();
	 			$( "#sponsore_btn" ).prop( "disabled", true );
	 			$( "#invest_persent" ).prop( "disabled", true );


  }
    $('#user_name').html(user_name);
    $('#have_to_pay_for_invest').html("$"+invested_amunt);
    $('#payable_amount').html("$"+payable_amount);
    $('#song_name').html(song_name);
    $('#investors').html(total_investor);
    $('#user_name').html(user_name);
    $('#song_id').val(song_id);
    $('#rdon_id').val(rdon_id)



 									// $audio_link= "slbackups_mlicqx83sq/Music/".$USER_NAME."/queue/".$ALBUM_NAME."/".$SONG_ID.".mp3";

    $('#audio_player').attr('src', music_src);


   $('#ad_work').attr('src',adwakr_src);
    //  $('#audio_src').val("slbackups_mlicqx83sq/Music/"+user_name+"/queue/"+album_name+"/"+song_id+".mp3");

	 // alert(adwakr_src);
play_audio();

	  }

	  function fibonacci(num){
  var a = 1, b = 0, temp;

  while (num >= 0){
    temp = a;
    a = a + b;
    b = temp;
    num--;
  }
alert(b);
  //return b;
}

 function 	submit_sponsor_ship(){
 			  sid= $('#song_id').val();

			invest_persent =$("#invest_persent option:selected" ).val();

         $.ajax({
				url: "php/submit_sponsorship.php",
				type: 'POST',
				data: {SONG_ID:sid,invest_persent:invest_persent},
				success: function (data) {
				var data1=String(data);
				// load_data_table();
             //data1=  data1.indexOf("SUCCESS") ;

			//alert(data1);
				//data1=data;
				if ( data1.indexOf("LOGIN") >= 0) {
    						noty({text: 'You have to login first ', layout: 'topRight', type: 'error'});

                                }else if(data1.indexOf("SUCCESS") >= 0){

			//	alert();

			       // $('#sponsor_section').hide();
	$( "#sponsore_btn" ).prop( "disabled", true );
	 			$( "#invest_persent" ).prop( "disabled", true );
				                    noty({text: 'Sponsorship success', layout: 'topRight', type: 'success'});

				}else if( data1.indexOf("FUND_NOT_AVAILABLE")>= 0){

								                    noty({text: 'No available funds to sponsor', layout: 'topRight', type: 'error'});

				}
            	},
				error: function (xhr, ajaxOptions, thrownError) {
				//alert(xhr.status);

					if (xhr.status === 404) {
						//alert('Not allowed.');
					}

					if (xhr.status === 403) {
						//alert('Not allowed.');
					}
				}
		});

 }

function sendAjax(vote) {
		//alert();
		  sid= $('#song_id').val();

		if(vote==1){
			$('#unlike_post').html('<i class="fa fa-cog faa-spin animated"></i>');

		}else if(vote==2){

					$('#like_btn').html('<i class="fa fa-cog faa-spin animated"></i>');

		}else if(vote==3){
													$('#love_post').html('<i class="fa fa-cog faa-spin animated"></i>');


		}else if(vote==4){
													//	$('#share_post').html('<i class="fa fa-cog faa-spin animated"></i>');


		}
	$.ajax({
				url: "php/vote_submit1.php",
				type: 'POST',
				data: {'type': vote,SONG_ID:sid},
				success: function (data) {

               // alert(data);
			$('#love_post').html('<span class="fas fa-heart"></span>');
			$('#like_btn').html('<i class="fas fa-thumbs-up"></i>');
			$('#unlike_post').html('<i class="fas fa-thumbs-down"></i>');


//$('#data_tab').html('<li class="active"><a href="#tab-first" role="tab" data-toggle="tab">Rock</a></li>  <li><a href="#tab-second" role="tab" data-toggle="tab">Pop</a></li><li><a href="#tab-third" role="tab" data-toggle="tab">Country</a></li><li ><a href="#tab-third"  role="tab" data-toggle="tab">Hip Hop / R&B </a></li><li><a href="#tab-third" role="tab" data-toggle="tab">Latin</a></li>  <li><a href="#tab-third" role="tab" data-toggle="tab">DJ Mix</a></li><li><a href="#tab-third" role="tab" data-toggle="tab">Talk Shows</a></li>');


			},
				error: function (xhr, ajaxOptions, thrownError) {
				//alert(xhr.status);

					if (xhr.status === 404) {
						//alert('Not allowed.');
					}

					if (xhr.status === 403) {
						//alert('Not allowed.');
					}
				}
		});
		}

		function express_view(){


   $.ajax({
				url: "php/get_info.php",
				type: 'POST',
				data: {'type': 2},
				success: function (data) {
                   // alert(data);

			 if(!data.includes("NOTAVAIABLE")){
			    result = data.split("#####");

 //$("#ad_uname").html(result[1]);

on_link=" ";

if(result[3]!=0){
on_link='<a href='+result[3]+' target="_blank" style="text-decoration:none" rel="nofollow"> Visit sponsor</a>';
}
 $("#aon_sibmission").html(result[2]+on_link);

 if(result[4]!="NO_IAMGE"){

 // $('.backg').css("background-image", "url("+result[4]+")");

 }

        // document.body.style.backgroundImage = "url('img_tree.png')";
        // var x = document.getElementsByClassName("example");

        $("#message_box").css("display", "block");
      } else {
			  $("#message_box").css("display", "none")
      }
    }
	})
}

  </script>

  <script src="https://unpkg.com/@airgap/beacon-sdk@2.2.3/dist/walletbeacon.min.js"></script>
  <script>window.beaconSdk = beacon</script>
  <script src="https://unpkg.com/@taquito/taquito@8.1.0/dist/taquito.min.js"></script>
  <script src="https://unpkg.com/@taquito/beacon-wallet@8.1.0/dist/taquito-beacon-wallet.umd.js"></script>
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

  $('#connect-wallet').click(async function (event) {
    event.preventDefault()
    if (connected) {
      await wallet.clearActiveAccount()
      $('#connect-wallet').html('<i class="fad fa-wallet"></i> Connect Wallet')
      $('.xtz-balance').text('0 ꜩ')
      $('.usd-balance').text('0')
      $('.radio-balance').text('0 RADIO')
      $('#get_source').empty()
      connected = false
      return false
    }

    try {
      const network = { type: NetworkType.MAINNET, rpcUrl: rpc }
      await wallet.requestPermissions({ network })
      $('#connect-wallet').html('<i class="fad fa-wallet"></i> Disconnect Wallet')
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

    const address = await wallet.getPKH()
    const mutez = await tezos.tz.getBalance(address)
    const balance = mutez / 1000000
    const usdBalance = (balance * parseFloat(window.priceUsd)).toFixed(2)
    const radioBalanceURL = 'https://api.better-call.dev/v1/account/florencenet/' + address + '/token_balances?contract=KT1XLDJzzgSAb6HMXAKoFTxEQ3zMA7HGgU91'
    const radio = await $.getJSON(radioBalanceURL)
    const radioBal = radio.balances[0]
    const radioBalance = typeof radioBal !== 'undefined' ? parseInt(radioBal.balance) / (10 ** radioBal.decimals) : 0

    $('#get_source').text(address)
    $('.xtz-balance').text(balance + ' ꜩ')
    $('.usd-balance').text(usdBalance)
    $('.radio-balance').text(radioBalance + ' RADIO')
  })

  async function purchaseSong () {
    const id = $('#rdon_id').val()
    if (!id) return

    if (!connected) {
      noty({
        text: 'Connect your wallet first',
        layout: 'topRight',
        type: 'error',
        timeout: 5000
      })
      return
    }

    const metadata = await getCurrentMetadata(id)
    const tokenId = metadata.token_id
    const address = metadata.comment[0]
    const downloadPrice = parseFloat((0.30 / window.priceUsd).toFixed(6))

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

  async function getCurrentMetadata (id) {
    return new Promise((resolve, reject) => {
      $.ajax('/php/get_song_metadata.php', {
        type: 'GET',
        dataType: 'json',
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
  </script>
</body>
</html>
