<?php

$groupswithaccess = 'RADIONER,CEO,FOUNDER';
require_once 'slpw/sitelokpw.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- META SECTION -->
  <title>RADION ADS</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="icon" href="/favicon.ico" type="image/x-icon">
  <!-- END META SECTION -->

  <!-- CSS INCLUDE -->
  <link rel="stylesheet" id="theme" href="/css/theme-dark.css"/>
	<link rel="stylesheet" href="/css/all.css" />
  <!-- EOF CSS INCLUDE -->
  <script src="https://cdn.lordicon.com//libs/frhvbuzj/lord-icon-2.0.2.js"></script>
	<!-- QR CODE CDN -->
  <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/davidshimjs/qrcodejs/qrcode.min.js"></script>

  <!-- CLIPBOARD -->
  <script src="https://cdn.jsdelivr.net/clipboard.js/1.5.3/clipboard.min.js"></script>

  <!-- SWEET ALERT 2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.12/dist/sweetalert2.all.min.js"></script>

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

<style>
.connect-iframe{
  width: 100%;
  height: 250px;
  border: 0;
}
.linko { color: #737577; }
.linko:hover { color: #3498DB; }

.fa-sort-down{color:#C0392B}
.fa-sort-up{color:#27AE60}
.tDown{color:#C0392B}
.tUp{color:#27AE60}

.swal-text {
  padding: 30px;
  text-align: left;
  color: #61534e;
  font-family: Arial;
  font-size: 14px;
}
</style>

<!-- MODAL FOR QR -->
        <div class="modal" id="modal_small" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">

                    <div class="modal-body">
					<div align="left" style="color:#33414E; width:30px; height:30px;">

<svg xmlns="http://www.w3.org/2000/svg" width="47" height="64" viewBox="0 0 47 64">
<path style="fill:#3498DB;" d="M30.252 63.441c-4.55 0-7.864-1.089-9.946-3.267-2.08-2.177-3.121-4.525-3.121-7.041 0-.92.181-1.694.544-2.323a3.993 3.993
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
</svg></div>
					<div style="padding-left:35px; margin-top:-20px;"><Strong>Receive Tezos</strong></div>
					<br>
					<div align="jusity" style="padding-right:5px; padding-left:5px; font-size:9px; color:#515A5A;">
						<strong>Important:</strong> We are not custodian of your keys, so please connect your wallet if you want to see your QR code.</div>
					<hr>
						<div align="center" id ='qraddress'></div>
						<hr>
						<div style="padding-bottom:20px;">
					    <p style="color:#333; margin-bottom:-5px;"><strong>Wallet Address:</strong></p>
						<span style="font-size:11px; padding-right:10px;" id='wallet_address'></span>
						<div align="right" style="margin-top:-20px;"><button class="btn btn-default btn-xs copyButton" data-clipboard-action="copy" data-clipboard-target="#wallet_address"><i class="fad fa-copy"></i></button>
						</div>
						</div>

					</div>

                </div>
            </div>
        </div>

        <!-- END MODAL FOR QR -->

<!-- MODAL FOR SIGNER -->
        <div class="modal" id="modal_basic" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h3 class="modal-title" id="defModalHead" style="padding-left:20px;"><i class="fa fa-wallet"></i> CONNECT WALLET</h3>
                    </div>
                    <div class="modal-body">
					    <iframe name="connect-iframe" class="connect-iframe"></iframe>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Dismiss!</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- END MODAL FOR SIGNER -->

        <!-- MODAL FOR TRANSACTION -->
   <div class="modal" id="modal_basic_t" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h3 class="modal-title" id="defModalHead" style="padding-left:20px;"><i class="fa fa-wallet"></i>TRANSFER TEZOS</h3>
                    </div>
                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Dismiss!</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- END MODAL FOR TRANSACTION -->

		<!-- MODAL FOR PURCHASE -->
        <div class="modal" id="modal_basic_p" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h3 class="modal-title" id="defModalHead" style="padding-left:20px;"><i class="fa fa-shopping-cart"></i> BUY RADION MEMBERSHIP UNITS</h3>
                    </div>
                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Dismiss!</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- END MODAL FOR PURCHASE -->


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
                      <div align="right" style="margin-top:10px;">
                      <button id="start-tour" class="btn btn-info btn-xs">START TOUR</button>
                  </div>
              </li>
                  <li class="xn-openable">
                  <a href="#"><lord-icon
          src="https://cdn.lordicon.com//mmspidej.json"
          trigger="click" target="a"
          colors="primary:#ffffff,secondary:#F39C12"
          style="width:45px;height:45px">
      </lord-icon><span class="xn-text">&nbsp;&nbsp; MUSIC</span></a>
        <ul>
                      <li><a href="submission.php"><span class="xn-text"><i class="fad fa-upload fa-lg"></i>&nbsp;&nbsp; UPLOAD MP3 TO STREAM</span></a></li>
                      <li><a href="mint.php"><span class="xn-text"><i class="fas fa-award fa-lg"></i> &nbsp;&nbsp; NFT FOR EXCLUSIVE RIGHTS</span></a></li>
                      <li><a href="mint-2.php"><span class="xn-text"><i class="fad fa-sack-dollar fa-lg"></i> &nbsp;&nbsp; MINT NFT TO SELL YOUR MUSIC</span></a></li>
                  </ul>
              </li>

              <li class="xn-openable">
                  <a href="#"><lord-icon
          src="https://cdn.lordicon.com//hciqteio.json"
          trigger="click" target="a"
          colors="primary:#ffffff,secondary:#F39C12"
          style="width:45px;height:45px">
      </lord-icon> <span class="xn-text">&nbsp;&nbsp; DISCOVER MUSIC</span></a>
        <ul>
                      <li><a href="marketplace.php"><span class="xn-text"><i class="fad fa-poll-people fa-lg"></i>&nbsp;&nbsp; ENGAGE WITH NEW TALENTS</span></a></li>
                      <li><a href="NFT-music-marketplace-tezos.php"><span class="xn-text"><i class="fas fa-album-collection fa-lg"></i>&nbsp;&nbsp; NFT MARKETPLACE FOR MUSIC</span></a></li>
                  </ul>
              </li>

              <li class="xn-openable">
                  <a href="#"><lord-icon
          src="https://cdn.lordicon.com//dizvjgip.json"
          trigger="click" target="a"
          colors="primary:#ffffff,secondary:#F39C12"
          style="width:45px;height:45px">
      </lord-icon> <span class="xn-text">&nbsp;&nbsp; RADION SERVICES</span></a>
                  <ul>
          <li><a href="ad-submission.php"><span class="xn-text"><i class="fad fa-ad fa-lg"></i>&nbsp;&nbsp; CREATE AD</span></a></li>
          <li><a href="#"><span class="xn-text"><i class="fal fa-fingerprint fa-lg"></i>&nbsp;&nbsp; ISRC ASSIGNMENT &nbsp;&nbsp;&nbsp;<label class="label label-warning"> IN PROGRESS</label></span></a></li>

                  </ul>
              </li>

      <li class="xn-openable">
                  <a href="submission.php"><lord-icon
          src="https://cdn.lordicon.com//zqxcrgvd.json"
          trigger="click" target="a"
          colors="primary:#ffffff,secondary:#F39C12"
          style="width:45px;height:45px">
      </lord-icon> <span class="xn-text">&nbsp;&nbsp; LAB</span></a>
                  <ul>
                      <li><a href="#"><span class="xn-text"><i class="fad fa-sack-dollar fa-lg"></i>&nbsp;&nbsp; MUSIC SYNC LICENSING &nbsp;&nbsp;&nbsp;<label class="label label-warning"> IN PROGRESS</label></span></a></li>
                      <li><a href="#"><span class="xn-text"><i class="fad fa-sack-dollar fa-lg"></i>&nbsp;&nbsp; MECHANICAL ROYALTIES &nbsp;&nbsp;&nbsp;<label class="label label-warning"> IN PROGRESS</label></span></a></li>
          <li><a href="#"><span class="xn-text"><i class="fad fa-sack-dollar fa-lg"></i>&nbsp;&nbsp; CRYPTO BILLBOARD CHART &nbsp;&nbsp;&nbsp;<label class="label label-warning"> IN PROGRESS</label></span></a></li>
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
                        <a href="#" class="x-navigation-minimize"><i class="fad fa-outdent fa-lg"></i></a>
                    </li>
                    <!-- END TOGGLE NAVIGATION -->



                    <!-- POWER OFF -->
                    <li class="xn-icon-button pull-right last">
                        <a href="#"><i class="fad fa-sign-out-alt fa-lg"></i></a>
                        <ul class="xn-drop-left animated zoomIn">

							<li><a href="#" class="mb-control" data-box="#mb-signout"><i class="fad fa-sign-out-alt"></i> Sign Out</a></li>
                        </ul>
                    </li>
                    <!-- END POWER OFF -->

					<!-- ALERT NOTIFICATIONS -->
                    <li class="xn-icon-button pull-right">
                        <a href="#"><i class="fad fa-bell fa-lg"></i></a>
                        <div class="informer informer-danger"><?php if (function_exists('sl_showprivatemessagecount')) { sl_showprivatemessagecount(); } ?></div>
                        <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fad fa-bell-on"></i> Notifications</h3>
                                <div class="pull-right">
                                    <span class="label label-danger"><?php if (function_exists('sl_showprivatemessagecount')) { sl_showprivatemessagecount(); } ?> new</span>
                                </div>
                            </div>
                            <div class="panel-body list-group list-group-contacts scroll" style="height: 200px;">

<?php if (function_exists('sl_messagebox')) { sl_messagebox(array(
  'messagetype'=>'receivedprivate',
  'width'=>'100%',
  'maxwidth'=>'600px',
  'height'=>'200px',
  'sendenabled'=>false,
  'sendheight'=>'0px',
  'placeholder'=>MSG_BLAB_TYPEMSG,
  'profileid'=>'1',
  'showframe'=>true,
  'showimage'=>true,
  'messagelinks'=>true,
  'about'=>'',
  'datetoday'=>'!A! ago',
  'dateearlier'=>'!D!/!M!/!Y! !H!:!I!',
  'userpage'=>'user-profile.php',
  'maxlength'=>'1000',
  'number'=>3,
  'usernumber'=>10,
  'refresh'=>10,
  'sendfiles'=>false,
  'allowedfiles'=>'false',
  'maxfilesize'=>'',
  'showfileimages'=>false,
)); } ?>

                            </div>
                            <div class="panel-footer text-center">
                                <a href="#" class="sidebar-toggle">Show all messages</a>
                            </div>
                        </div>
                    </li>

					<!-- ALERT NOTIFICATIONS ENDS -->

                    <!-- LANGUAGE BAR -->
                    <li class="xn-icon-button pull-right">
                        <a href="#"><i class="fad fa-language fa-lg"></i></a>
                        <ul class="xn-drop-left xn-drop-dark animated zoomIn">

                            <li><a href="#"><img src="img/flags/us.png" style="height:20px; width:20;">&nbsp &nbsp English</a></li>

                        </ul>
                    </li>

                    <!-- END LANGUAGE BAR -->

                </ul>
                <!-- END X-NAVIGATION VERTICAL -->

                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">

                </ul>
                <!-- END BREADCRUMB -->


				<!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">

				<!-- START WIDGETS -->
        <div class="row">
          <div class="col-md-3">
            <!-- START WIDGET MESSAGES -->
            <div class="widget widget-primary widget-item-icon">
              <div class="widget-item-left">
                <img src="img/ON-logo.png" style="height:70%; width:70%;">
              </div>
              <div class="widget-data">
                <div class="widget-int num-count">TOKEN</div>
                <div class="widget-title">BALANCE</div>
                <div class="widget-subtitle" id="radio-balance" style="color:#F39C12;">0 RADIO</div>
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
                <div class="widget-subtitle" id="xtz-balance" style="color:#F39C12;">0 <span>&#42793;</span></div>
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
                    <span><a href="#" id="connect-wallet" class="widget-control-right" style="font-size:13px; text-decoration:none; color:#F39C12;"><i class="fad fa-wallet"></i> Connect Wallet</a></span>
                    <span style="padding-right:3px; padding-left:3px;">|</span>
                    <span><a href="#modal_small" data-toggle="modal" style="font-size:13px; text-decoration:none; color:#F39C12;"><i class="fad fa-qrcode"></i> Receive</a></span>
                    <span style="padding-right:3px; padding-left:3px;">|</span>
                    <span style="color:#797D7F;">USD Balance <i class="fas fa-dollar-sign"></i> <span id="usd-balance">0</span></span>
                  </div>
                </div>
              </div>
              <!-- END WIDGET CLOCK -->
            </div>
         </div>
         <!-- END WIDGETS -->

					<div class="row">
                        <div class="col-md-12">
					<!-- START WIZARD WITH VALIDATION -->
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h3><i class="fad fa-edit fa-lg"></i> AD CREATION</h3>

									<hr>
                  <form id="form-ad" action="#" role="form" class="form-horizontal">
                    <div class="wizard show-submit">
                      <ul>
                        <li>
                          <a href="#step-1">
                            <span class="stepNumber">1</span>
                            <span class="stepDesc"><i class="fad fa-drafting-compass"></i> Crafting<br><small>YOUR AD</small></span>
                          </a>
                        </li>
                        <li>
                          <a href="#step-2">
                            <span class="stepNumber">2</span>
                            <span class="stepDesc"><i class="fad fa-sliders-h-square"></i> Setting Up<br><small>OPTIONS</small></span>
                          </a>
                        </li>
                        <li>
                          <a href="#step-3">
                            <span class="stepNumber">3</span>
                            <span class="stepDesc"><i class="fad fa-money-check-edit-alt"></i> Quote<br><small>IMPRESSIONS</small></span>
                          </a>
                        </li>
                        <li>
                          <a href="#step-4">
                            <span class="stepNumber">4</span>
                            <span class="stepDesc"><i class="fad fa-paper-plane"></i> Submit<br><small>AD</small></span>
                          </a>
                        </li>
                      </ul>

                      <div id="step-1" class="wizard-step">
                        <div class="form-group" data-step="1" data-intro="Your Ad's title to be displayed" data-position="bottom">
                          <label class="col-md-2 control-label">Title</label>
                          <div class="col-md-10">
                            <input type="text" name="express_ads_title" id="express-ads-title" class="form-control" placeholder="">
                          </div>
                        </div>
                        <div class="form-group" data-step="2" data-intro="Your Ad's URL/link if you have one" data-position="bottom">
                          <label class="col-md-2 control-label">URL or Link</label>
                          <div class="col-md-10">
                            <input type="text" name="express_ads_website" id="express-ads-website" class="form-control" placeholder="Example: http://website.com/page">
                          </div>
                        </div>
                        <div class="form-group" data-step="3" data-intro="Your Ad's main message" data-position="bottom">
                          <label class="col-md-2 control-label">Message</label>
                          <div class="col-md-10">
                            <textarea name="express_ads_message" id="express-ads-message" class="form-control" rows="5"></textarea>
                          </div>
                        </div><hr>

                        <h5><i class="fad fa-webcam fa-lg"></i> ADVANCE SETTINGS</h5>
                        <p>(Optional)</p>
                        <div class="form-group">
                          <label class="col-md-2 control-label">Image</label>
                          <div class="col-md-10">
                            <label class="check"><input type="checkbox" class="icheckbox" id="need_image_upload"> Need to upload Image for your Ad?</label>
                            <span class="help-block">For Home Page Background only.</span>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-md-2 control-label">Upload</label>
                          <div class="col-md-10">
                            <input type="file" class="fileinput btn-default" name="filename" id="filename" title="Browse file">
                            <span class="help-block">Format: JPG or PNG - (2048px x 750px)</span>
                          </div>
                        </div>
                      </div>

                      <div id="step-2" class="wizard-step">
                        <!-- START CHECKBOXES RADIO AND SELECT -->
                        <div class="col-md-6">
                          <div class="panel-body" data-step="4" data-intro="Here, you can select to where you want to display the ad on the website." data-position="right">
                            <h5><i class="fad fa-clipboard-list-check fa-lg"></i> SELECT AD CLASS!</h5>
                            <form role="form" class="form-horizontal">
                              <div class="form-group">
                                <div class="checkbox">
                                  <label>
                                    <input type="checkbox" value="" id="express-ads-dashboard">
                                    <i class="fad fa-eye"></i> Sticky Note AD - Text Format
                                  </label>
                                </div>
                                <div class="checkbox">
                                  <label>
                                    <input type="checkbox" value="" id="express-ads-home">
                                    <i class="fad fa-eye"></i> Message AD - Text Format
                                  </label>
                                </div>
                                <div class="checkbox" style="padding-bottom:13px;">
                                  <label>
                                    <input type="checkbox" value="" id="express-ads-home-image" disabled>
                                    <i class="fad fa-eye"></i> Home Page Ads - Image and Text Format
                                  </label>
                                </div>
                                <div class="checkbox">
                                  <label>
                                    <input type="checkbox" value="" id="express-ads-audio" disabled>
                                    <i class="fad fa-ear"></i> Audio Commercial Format
                                  </label>
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>
                        <!-- END OF CHECKBOXES RADIO AND SELECT -->

                        <div class="col-md-6" data-step="5" data-intro="Your advertisement should be displayed here as a preview" data-position="left">
                          <h5><i class="fad fa-flask-potion fa-lg"></i> SAMPLES</h5>
                          <div class="panel-body">
                            <div class="col-md-12" style="padding-bottom: 50px;">
                              <h5><strong>STICKY NOTE AD</strong> / Format: <span style="color:#2980B9;">Text</span> | Exposed on: <span style="color:#2980B9;">Dashboard Pages</span></h5>
                              <div class="alert alert-info" role="alert">
                                <span><i class="far fa-ad fa-lg"></i></span>
                                <span style="padding-right:20px;"></span>
                                <span id="message_visual"></span>
                                <a href="#" > with a link</a>. <br>
                              </div>
                            </div>

                            <div class="messages messages-img">
                              <div class="item">
                                <h5><strong>MESSAGE AD</strong> / Format: <span style="color:#2980B9;">Text</span> | Exposured on: <span style="color:#2980B9;">Home Page</span></h5>
                                <div class="image">
                                  <img src="<?php siteloklink($slcustom2,0); ?>" alt="">
                                </div>
                                <div class="text">
                                  <div class="heading">
                                    <a href="#"><?= $slusername ?></a>
                                    <span class="date"><i class="far fa-ad fa-lg"></i></span>
                                  </div>
                                  <p align="justify" style="padding:10px;">
                                    This feature will be shown in the front page of RADION website. This particular ad offers great exposure but the message is limited to 500 characters.
                                  </p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div id="step-3" class="wizard-step">
                        <div class="col-md-6" data-step="6" data-intro="In this form, you can enter how much impressions you wanted to have" data-position="right">
                          <div class="panel-body" style="padding-bottom:50px; padding-top:30px;">
                            <div class="form-group">
                              <label class="col-md-3 control-label" style="color:#E0401D;">Impressions</label>
                              <div style="width:100%; padding-left:20%; padding-right:20%;">
                                <div class="input-group">
                                  <span class="input-group-btn">
                                    <button class="btn btn-primary" type="button" onclick="set_min()">Fill Min</button>
                                  </span>
                                  <input type="text" class="form-control" id="express-ads-impressions" placeholder="or Enter Qantity!">
                                  <span class="input-group-btn">
                                    <button class="btn btn-primary" type="button" onclick="set_max()">Fill Max</button>
                                  </span>
                                </div>
                              </div>
                            </div><hr>

                            <div class="form-group">
                              <label class="col-md-3 control-label">Dates Range</label>
                              <div style="width:100%; padding-left:20%; padding-right:20%;">
                                <div class="input-group">
                                  <input type="text" class="form-control datepicker" id="express_ads_date1" value="2017-22-06">
                                  <span class="input-group-addon add-on"> - </span>
                                  <input type="text" class="form-control datepicker" id="express_ads_date2" value="2017-22-06">
                                </div>
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="col-md-3 control-label">Time Begin</label>
                              <div style="width:100%; padding-left:20%; padding-right:20%;">
                                <div class="input-group bootstrap-timepicker">
                                  <input type="text" class="form-control timepicker" id="express_ads_time_begin">
                                  <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                                </div>
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="col-md-3 control-label">Time Ends</label>
                              <div style="width:100%; padding-left:20%; padding-right:20%;">
                                <div class="input-group bootstrap-timepicker">
                                  <input type="text" class="form-control timepicker" id="express_ads_time_ends">
                                  <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="panel-body" style="padding-bottom:50px; padding-top:30px;">
                            <div align="center" style="padding-left:20%; padding-right:20%;">
                              <div class="widget widget-default">
                                <div class="widget-int" data-toggle="counter" data-to="" id="cost_for_imp">$0</div>
                                <div class="widget-subtitle"><span id="total_impression_">0</span> IMPRESSION/S</div>
                                <div class="widget-subtitle"><span id="cost_for_imp_radio">XTZ: 0.00000000 </span></div>
                              </div>
                              <div>
                                <p style="color:#E0401D;" align="center">Important Note!</p>
                                <p align="justify">Quote is calculated based on the information that you provided at the moment of market value.</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

  										<div id="step-4" class="wizard-step">
                        <!-- INVOICE -->
                        <div class="invoice" data-step="7" data-intro="This is the invoice and confirmation tab" data-position="top">
                          <div class="table-invoice">
                            <table class="table">
                              <tr>
                                <th>Item Description</th>
                                <th class="text-center">Impressions</th>
                                <th class="text-center">Format</th>
                                <th class="text-center">Total</th>
                              </tr>
                              <tr>
                                <td>
                                  <strong><span id="ad_title"> </span></strong>
                                  <p><span id="subtitle_id">Service Selected by user goes here.</span></p>
                                </td>
                                <td class="text-center"><span id="impressions">0</span></td>
                                <td class="text-center">Text</td>
                                <td class="text-center">0</td>
                              </tr>
                            </table>
                          </div>

                          <div class="row">
                            <div class="col-md-6">
                              <h4>PAYMENT METHODS</h4>
                              <div class="paymant-table">
                                <a href="#">
                                  <small>&#42793; TEZOS</small>
                                  <p>TEZ (XTZ) ARE DIGITAL TOKENS.</p>
                                </a>
                              </div>
                            </div>

                            <div class="col-md-6">
                              <table class="table table-striped">
                                <tr>
                                  <td><strong>TOTAL</strong></td><td class="text-right" id="total_usd_at_final">$0</td>
                                </tr>
                                <tr>
                                  <td><strong>Conversion Rate</strong></td><td class="text-right" id="total_radio_at_final">0</td>
                                </tr>
                                <tr class="total">
                                  <td>TOTAL XTZ:</td><td class="text-right" id="intotal">0</td>
                                </tr>
                              </table>
                            </div>
                          </div>
                        </div>
                        <!-- END INVOICE -->
                      </div>
                    </div>
                  </form>
                                </div>
                            </div>
                            <!-- END WIZARD WITH VALIDATION -->
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
                    <a href="#sidebar_1" class="sidebar-tab"><i class="fad fa-comments fa-lg"></i> CHAT</a>
                    <a href="#sidebar_2" class="sidebar-tab"><i class="fal fa-newspaper fa-lg"></i> NEWS</a>
                </div>

                <div class="sidebar-tab-content active" id="sidebar_1">
                    <div style="padding-left:10px; padding-right:10px; height:730px;">

                  </div>
                </div>

                <div class="sidebar-tab-content form-horizontal" id="sidebar_2">

					<div style="padding-left:30px; padding-right:30px; height:1150px;">
						<small>
						<p></p>
						</small>
                    </div>
                </div>

            </div>
        </div>
        <!-- END SIDEBAR -->

		</body>

		    <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fas fa-sign-out-alt"></span> Log <strong>Out</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to log out?</p>
                        <p>Press No if youwant to continue work. Press Yes to logout current session.</p>
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
  <!-- END PLUGINS -->

  <!-- START THIS PAGE PLUGINS-->
  <script src="/js/plugins/icheck/icheck.min.js"></script>
  <script src="/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
  <script src="/js/plugins/scrolltotop/scrolltopcontrol.js"></script>
	<script src="/js/plugins/dropzone/dropzone.min.js"></script>
	<script src="/js/plugins/bootstrap/bootstrap-datepicker.js"></script>
  <script src="/js/plugins/bootstrap/bootstrap-timepicker.min.js"></script>

  <script src="/js/plugins/morris/raphael-min.js"></script>
  <script src="/js/plugins/morris/morris.min.js"></script>
  <script src="/js/plugins/rickshaw/d3.v3.js"></script>
  <script src="/js/plugins/rickshaw/rickshaw.min.js"></script>
	<script src="/js/plugins/bootstrap/bootstrap-file-input.js"></script>
  <script src="/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  <script src="/js/plugins/bootstrap/bootstrap-datepicker.js"></script>
  <script src="/js/plugins/owl/owl.carousel.min.js"></script>


	<script src="/js/plugins/smartwizard/jquery.smartWizard-2.0.min.js"></script>
  <script src="/js/plugins/jquery-validation/jquery.validate.js"></script>
  <!-- END THIS PAGE PLUGINS-->
	<script src="/js/plugins/noty/jquery.noty.js"></script>
  <script src="/js/plugins/noty/layouts/topRight.js"></script>
  <script src="/js/plugins/noty/themes/default.js"></script>
  <script src="/js/plugins/tour/bootstrap-tour-standalone.min.js"></script>
  <script src="/js/plugins/tour/intro.min.js"></script>
  <!-- START TEMPLATE -->

  <script src="/js/plugins.js"></script>
  <script src="/js/actions.js"></script>
  <script src="/js/demo_dashboard.js"></script>
  <!-- END TEMPLATE -->

  <script src="https://unpkg.com/@airgap/beacon-sdk@2.3.1/dist/walletbeacon.min.js"></script>
  <script>window.beaconSdk = beacon</script>
  <script src="https://unpkg.com/@taquito/taquito@9.2.0/dist/taquito.min.js"></script>
  <script src="https://unpkg.com/@taquito/beacon-wallet@9.2.0/dist/taquito-beacon-wallet.umd.js"></script>
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

  async function connectWallet (event) {
    if (event) event.preventDefault()
    if (connected) {
      await wallet.clearActiveAccount()
      $('#connect-wallet').html('<i class="fad fa-wallet"></i> Connect Wallet')
      $('#xtz-balance').text('0 ꜩ')
      $('#usd-balance').text('0')
      $('#radio-balance').text('0 RADIO')
      $('#wallet_address').empty()
      $('#qraddress').empty()
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

    const address = await tezos.wallet.pkh()
    const balance = await tezos.tz.getBalance(address)
    const tzBal = parseInt(balance) / 1000000
    const balanceUsd = (tzBal * parseFloat(window.priceUsd)).toFixed(2)

    const radioBalanceURL = 'https://api.better-call.dev/v1/account/florencenet/' + address + '/token_balances?contract=KT1XLDJzzgSAb6HMXAKoFTxEQ3zMA7HGgU91'
    const radio = await $.getJSON(radioBalanceURL)
    const radioBal = radio.balances[0]
    const radioBalance = typeof radioBal !== 'undefined' ? parseInt(radioBal.balance) / (10 ** radioBal.decimals) : 0

    $('#qraddress').empty()
    new QRCode($('#qraddress')[0], address)
    $('#wallet_address,#get_source').text(address)
    $('#xtz-balance').text(tzBal + ' ꜩ')
    $('#usd-balance').text(balanceUsd)
    $('#radio-balance').text(radioBalance + ' RADIO')

    noty({
      text: '<i class="far fa-check-circle fa-lg"></i> Your wallet was successfully connected! ' + address,
      layout: 'topRight',
      type: 'success',
      timeout: 5000
    })

    return true
  }

  $(document).ready(function () {
    $('#connect-wallet').click(connectWallet)
    $('#form-ad').submit(async function (event) {
      event.preventDefault()
      await makeTransaction()
    })

    $('[id|="express-ads"]').on('input', async function (event) {
      const message = $('#express-ads-message').val()
      $('#message_visual').text(message)
      await updateInvoice()
      await totalImpressionCosting()
    })

    const complete = function () {
      $('#step-2,#step-3,#step-4').hide()
      $('#step-1').show()
    }

    const intros = introJs().onchange(function (target) {
      const parent = $(target).parents('.wizard-step')
      const parentId = $(parent).attr('id')
      $('#step-1,#step-2,#step-3,#step-4').hide()
      $('#' + parentId).show()
    }).onexit(complete).oncomplete(complete)

    $('#start-tour').click(function (event) {
      intros.start()
    })
  })

  async function updateInvoice () {
    const subtitles = []
    let classes = 0

    if ($('#express-ads-dashboard').is(':checked')) {
      subtitles.push('Text Ad Dashboard')
      classes++
    }

    if ($('#express-ads-home').is(':checked')) {
      subtitles.push('Text Ad Home Page')
      classes++
    }

    if ($('#express-ads-home-image').is(':checked')) {
      subtitles.push('Main Home Page (Image Background & Message)')
      classes++
    }

    if ($('#express-ads-audio').is(':checked')) {
      subtitles.push('Audio Commercial')
      classes++
    }

    const title = $('#express-ads-title').val()
    const impressions = $('#express-ads-impressions').val()
    $('#ad_title').text(title)
    $('#impressions').text(impressions * classes)
    $('#subtitle_id').text(subtitles.join(', '))
  }

  async function totalImpressionCosting () {
    const impressions = $('#express-ads-impressions').val()
    const dashboard = $('#express-ads-dashboard').is(':checked')
    const home = $('#express-ads-home').is(':checked')
    let totalCost = 0
    let classes = 0

    if (dashboard) {
      totalCost += impressions * 0.1
      classes++
    }

    if (home) {
      totalCost += impressions * 0.25
      classes++
    }

    const totalCostXTZ = (totalCost / window.priceUsd).toFixed(6)
    $('#total_impression_').text(impressions * classes)
    $('#cost_for_imp').text(`$ ${totalCost} USD`)
    $('#cost_for_imp_radio').text(`XTZ: ${totalCostXTZ}`)
    $('#intotal').text(totalCostXTZ)
    $('#total_radio_at_final').text(`$ ${totalCost}`)
  }

  function validateImageFile (fileName) {
    if (!fileName) return false

    const extensions = /^(jpg|png)$/i
    const fileExt = fileName.split('.').pop()

    if (fileExt.match(extensions) === null) {
      noty({
        text: 'Invalid image file, please upload valid JPG/PNG file!',
        layout: 'topRight',
        type: 'error'
      })
    } else return true

    $('#filename').val('')
    return false
  }

  async function submitAllInformation () {
    const title = $('#express-ads-title').val()
    const website = $('#express-ads-website').val()
    const message = $('#express-ads-message').val()
    const dashboard = $('#express-ads-dashboard').is(':checked')
    const home = $('#express-ads-home').is(':checked')
    const homeImage = $('#express-ads-home-image').is(':checked')
    const audio = $('#express-ads-audio').is(':checked')
    let file = null
    let filename = ''
    let classes = 0

    const image = $('#need_image_upload').is(':checked')
    const files = $('#filename').prop('files')
    if (image && files.length > 0) file = files[0]

    if (dashboard) classes++
    if (home) classes++
    if (homeImage) classes++
    if (audio) classes++

    const audioValue = $('#audio_commercial_value').val()
    const impressions = $('#express-ads-impressions').val()
    const date1 = $('#express_ads_date1').val()
    const date2 = $('#express_ads_date2').val()
    const timeBegin = $('#express_ads_time_begin').val()
    const timeEnd = $('#express_ads_time_ends').val()
    const data = new FormData()
		data.append('title', title)

    if (file && validateImageFile(file.name)) data.append('image-file', file)

    data.append('website', website)
		data.append('message', message)
		data.append('dashboard', dashboard ? impressions : 0)
		data.append('home', home ? impressions : 0)
		data.append('home-image', homeImage ? impressions : 0)
		data.append('audio', audio ? 1 : 0)
		data.append('audio-value', audioValue)
		data.append('impressions', impressions)
		data.append('date1', date1)
		data.append('date2', date2)
		data.append('time-begin', timeBegin)
		data.append('time-ends', timeEnd)
		data.append('total-cost', parseInt($('#intotal').text()))

    $.ajax('/ad-submission_operation.php', {
      method: 'POST',
      // contentType: 'application/json',
      processData: false, // important
      contentType: false, // important
      data: data,
      success: function (data) {
        var result = $.trim(data)
        if (result != 'Complete') {
          noty({
            text: 'Something is wrong! Please try again!!!',
            layout: 'topRight',
            type: 'error'
          })
        } else {
          setTimeout(function () {
            noty({
              text: '<i class="far fa-check-circle fa-lg"></i> All done, your ad is running! Thank you.',
              layout: 'topRight',
              type: 'success'
            })
          }, 9000)
        }
      },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status)
        alert(thrownError)
      }
    })

    return false
  }

  $('#express_ads_date1').datepicker({ format:'yyyy-mm-dd' }).datepicker('setDate','now')
  $('#express_ads_date2').datepicker({ format:'yyyy-mm-dd' }).datepicker('setDate','now')
  $('#express_ads_time_begin').timepicker({ format:'hh:mm' }).timepicker('setDate','now')
  $('#express_ads_time_ends').timepicker({ format:'hh:mm' }).timepicker('setDate','now')

  function set_min () {
    $('#express-ads-impressions').val(10)
    totalImpressionCosting()
  }

  function set_max () {
    const totalImpression = 17
    $('#express-ads-impressions').val(parseInt(totalImpression))
    totalImpressionCosting()
  }

  async function makeTransaction () {
    const title = $('#express-ads-title').val()
    const website = $('#express-ads-website').val()
    const message = $('#express-ads-message').val()
    const dashboard = $('#express-ads-dashboard').is(':checked')
    const home = $('#express-ads-home').is(':checked')
    const homeImage = $('#express-ads-home-image').is(':checked')
    const audio = $('#express-ads-audio').is(':checked')
    let file = null
    let filename = ''
    let classes = 0

    const image = $('#need_image_upload').is(':checked')
    const files = $('#filename').prop('files')
    if (image && files.length > 0) file = files[0]

    if (dashboard) classes++
    if (home) classes++
    if (homeImage) classes++
    if (audio) classes++

    const audioValue = $('#audio_commercial_value').val()
    const impressions = $('#express-ads-impressions').val()
    const date1 = $('#express_ads_date1').val()
    const date2 = $('#express_ads_date2').val()
    const timeBegin = $('#express_ads_time_begin').val()
    const timeEnd = $('#express_ads_time_ends').val()

    if (!title) {
      noty({
        text: 'AD Title is empty',
        layout: 'topRight',
        type: 'error',
        timeout: 5000
      })
      return false
    }

    if (!message) {
      noty({
        text: 'AD message is empty',
        layout: 'topRight',
        type: 'error',
        timeout: 5000
      })
      return false
    }

    if (message.length > 333) {
      noty({
        text: 'Message is too long!',
        layout: 'topRight',
        type: 'error',
        timeout: 5000
      })
      return false
    }

    if (classes === 0) {
      noty({
        text: 'Select atleast 1 class for your ad',
        layout: 'topRight',
        type: 'error',
        timeout: 5000
      })
      return false
    }

    if (!connected) {
      const connectResult = await connectWallet()
      if (!connectResult) return
    }

    const costXTZ = $('#intotal').text()
    const cost = parseFloat(costXTZ)
    let operation = null

    try {
      operation = await tezos.wallet.transfer({
        to: 'tz1PjhNkuduRFm7joE6FaUo2WMbc812SQ4S4',
        amount: cost
      }).send()
    } catch (error) {
      noty({
        text: 'Transaction was rejected',
        layout: 'topRight',
        type: 'error',
        timeout: 5000
      })
      return false
    }

    noty({
      text: '<i class="far fa-satellite-dish fa-lg"></i> Transaction was sent to blockchain. Please wait for confirmation! Do not refresh your browser.',
      layout: 'topRight',
      type: 'information',
      timeout: 8000,
      callback: {
        afterClose: function () {
          setTimeout(function () {
            noty({
              text: '<i class="fas fa-cog fa-spin fa-lg"></i> Great, we start working on your ad! Just a moment.',
              layout: 'topRight',
              timeout: 5000
            })
          }, 20000)
        }
      }
    })

    const hash = operation.opHash
    const result = await operation.confirmation(1)
    if (result.completed) {
      Swal.fire({
        icon: 'success',
        title: 'SUCCESS',
        width: 450,
        html: '<br><p align="left" style="padding-left:10px;">WE HAVE CONFIRMATION!</p><hr><p align="left" style="padding-left:10px;"><strong>Transaction ID:</strong></p><p align="left" style="font-size:13px; padding-left:10px;">' + hash + '</p>',
        confirmButtonText: '<i class="fas fa-external-link-alt"></i> View in TzStats',
        showCancelButton: true,
        cancelButtonText: '<i class="fas fa-thumbs-up"></i> Got It'
      }).then((result) => {
        if (result.value) window.open(`https://tzstats.com/${hash}`)
      })

      return await submitAllInformation()
    }
  }
  </script>
</html>
