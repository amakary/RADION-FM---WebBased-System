<?php
$groupswithaccess="RADIONER,CEO,FOUNDER";
require_once "slpw/sitelokpw.php";
require_once "slpw/slconfig.php";
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <!-- META SECTION -->
        <title>RADION FM - SALA DE ESPERA</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->

        <!-- CSS INCLUDE -->
        <link rel="stylesheet" type="text/css" id="theme" href="css/theme-dark.css"/>
		<link rel="stylesheet" type="text/css" href="css/all.css" />
		<link rel="stylesheet" type="text/css" href="css/cropper/cropper.min.css"/>
    <script src="https://cdn.lordicon.com//libs/frhvbuzj/lord-icon-2.0.2.js"></script>
    <script src="https://unpkg.com/@airgap/beacon-sdk@2.3.1/dist/walletbeacon.min.js"></script>
    <script>window.beaconSdk = beacon</script>
    <script src="https://unpkg.com/@taquito/taquito@10.1.0/dist/taquito.min.js"></script>
    <script src="https://unpkg.com/@taquito/beacon-wallet@10.1.0/dist/taquito-beacon-wallet.umd.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/davidshimjs/qrcodejs/qrcode.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bignumber.js/8.0.2/bignumber.min.js" integrity="sha512-7UzDjRNKHpQnkh1Wf1l6i/OPINS9P2DDzTwQNX79JxfbInCXGpgI1RPb3ZD+uTP3O5X7Ke4e0+cxt2TxV7n0qQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <!-- EOF CSS INCLUDE -->


    </head>
    <body>

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
            </svg>
          </div>

          <div style="padding-left:35px; margin-top:-20px;"><strong>Receive Tezos</strong></div><br>
          <div align="jusity" style="padding-right:5px; padding-left:5px; font-size:9px; color:#515A5A;">
            <strong>Important:</strong> We are not custodian of your keys, so please connect your wallet if you want to see your QR code.
          </div><hr>

          <div align="center" id="qraddress"></div><hr>
          <div style="padding-bottom:20px;">
            <p style="color:#333; margin-bottom:-5px;"><strong>Wallet Address:</strong></p>
            <span style="font-size:11px; padding-right:10px;" id="wallet_address"></span>
            <div align="right" style="margin-top:-20px;"><button class="btn btn-default btn-xs copyButton" data-clipboard-action="copy" data-clipboard-target="#wallet_address"><i class="fad fa-copy"></i></button></div>
          </div>
        </div>
      </div>
    </div>
  </div>

        <!-- START PAGE CONTAINER -->
        <div class="page-container">


<script type="text/javascript"> var memberprofilepage=1 </script>
<?php if (function_exists('startwhoisonline')) startwhoisonline('userid'); ?>


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
                <a href="#" class="profile-control-left sidebar-toggle"><i class="fad fa-coins"></i></a>
                <a href="edit-profile-es.php" class="profile-control-right"><i class="fad fa-user-edit"></i></a>
            </div>

        </div>
    </li>

        <li class="xn-openable">
        <a href="#">
          <lord-icon src="https://cdn.lordicon.com//mmspidej.json" trigger="click" target="a" colors="primary:#ffffff,secondary:#F39C12" style="width:45px;height:45px"></lord-icon>
          <span class="xn-text">&nbsp;&nbsp; MUSICA</span>
        </a>
        <ul>
            <li><a href="submission-es.php"><span class="xn-text"><i class="fad fa-upload fa-lg"></i>&nbsp;&nbsp; SUBIR MUSICA</span></a></li>
            <li><a href="mint-NFT-song-track-es.php"><span class="xn-text"><i class="fad fa-compact-disc fa-lg"></i> &nbsp;&nbsp; CREAR UN NFT </span></a></li>
        </ul>
    </li>

    <li class="xn-openable">
        <a href="#">
          <lord-icon src="https://cdn.lordicon.com//hciqteio.json" trigger="click" target="a" colors="primary:#ffffff,secondary:#F39C12" style="width:45px;height:45px"></lord-icon>
          <span class="xn-text">&nbsp;&nbsp; DESCUBRE</span>
        </a>
        <ul>
            <li><a href="marketplace-es.php"><span class="xn-text"><i class="fad fa-poll-people fa-lg"></i>&nbsp;&nbsp; NUEVAS CANCIONES</span></a></li>
            <li><a href="NFT-music-marketplace-tezos-es.php"><span class="xn-text"><i class="fas fa-album-collection fa-lg"></i>&nbsp;&nbsp; MERCADO DE NFT</span></a></li>
        </ul>
    </li>

    <li class="xn-openable">
    <a href="#">
      <lord-icon src="https://cdn.lordicon.com//dizvjgip.json" trigger="click" target="a" colors="primary:#ffffff,secondary:#F39C12" style="width:45px;height:45px"></lord-icon>
      <span class="xn-text">&nbsp;&nbsp; SERVICIOS RADION</span>
    </a>
        <ul>
          <li><a href="#"><span class="xn-text"><i class="far fa-copyright fa-lg"></i>&nbsp;&nbsp; DERECHOS DE AUTOR NFT</span></a></li>
          <li><a href="#"><span class="xn-text"><i class="fal fa-fingerprint fa-lg"></i>&nbsp;&nbsp; ASIGNACIONES DE CODIGO ISRC &nbsp;&nbsp;&nbsp;<label class="label label-primary"> SOON</label></span></a></li>
          <li><a href="#"><span class="xn-text"><i class="fad fa-chart-network fa-lg"></i>&nbsp;&nbsp; LICENCIA DE SINCRONIZACIÓN &nbsp;&nbsp;&nbsp;<label class="label label-primary"> SOON</label></span></a></li>
          <li><a href="ad-submission-es.php"><span class="xn-text"><i class="fad fa-bullseye-arrow fa-lg"></i>&nbsp;&nbsp; PUBLICIDAD</span></a></li>
        </ul>
    </li>

<li class="xn-openable">
<a href="submission-es.php">
  <lord-icon src="https://cdn.lordicon.com//zqxcrgvd.json" trigger="click" target="a" colors="primary:#ffffff,secondary:#F39C12" style="width:45px;height:45px"></lord-icon>
  <span class="xn-text">&nbsp;&nbsp; EN LABORATORIO</span>
</a>
<ul>
  <li><a href="#"><span class="xn-text"><i class="fad fa-sack-dollar fa-lg"></i>&nbsp;&nbsp; MECHANICAL ROYALTIES &nbsp;&nbsp;&nbsp;<label class="label label-warning"> EN PROGRESO</label></span></a></li>
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
                <li class="xn-icon-button" data-step="5" data-intro="This icon will hide the main menu." data-position="right">
                    <a href="#" class="x-navigation-minimize"><i class="fad fa-outdent fa-lg"></i></a>
                </li>
                <!-- END TOGGLE NAVIGATION -->

                <!-- POWER OFF -->
                <li class="xn-icon-button pull-right last" data-step="6" data-intro="This is where you can logout." data-position="left">
                    <a href="#"><i class="fad fa-sign-out-alt fa-lg"></i></a>
                    <ul class="xn-drop-left animated zoomIn">

                        <li><a href="#" class="mb-control" data-box="#mb-signout"><i class="fad fa-sign-out-alt"></i> Sign Out</a></li>
                    </ul>
                </li>
                <!-- END POWER OFF -->

                <!-- ALERT NOTIFICATIONS -->
                <li class="xn-icon-button pull-right" data-step="7" data-intro="This is where you can find notifications that RADION release." data-position="left">
                    <a href="#"><i class="fad fa-bell fa-lg"></i></a>
                    <div class="informer informer-danger"><?php if (function_exists('sl_showprivatemessagecount')) {
                                                                sl_showprivatemessagecount();
                                                            } ?></div>
                    <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fad fa-bell-on"></i> Notificaciones</h3>
                            <div class="pull-right">
                                <span class="label label-danger"><?php if (function_exists('sl_showprivatemessagecount')) {
                                                                        sl_showprivatemessagecount();
                                                                    } ?> nuevas</span>
                            </div>
                        </div>
                        <div class="panel-body list-group list-group-contacts scroll" style="height: 200px;">



                        </div>
                        <div class="panel-footer text-center">
                            <a href="#" class="sidebar-toggle">Mostrar todos los mensajes</a>
                        </div>
                    </div>
                </li>

                <!-- ALERT NOTIFICATIONS ENDS -->


                <!-- LANGUAGE BAR -->
                <li class="xn-icon-button pull-right">
                    <a href="#"><i class="fad fa-language fa-lg"></i></a>
                    <ul class="xn-drop-left xn-drop-white animated zoomIn">

                        <li><a href="#"><img src="/img/flags/us.png" style="height:20px; width:20px;">&nbsp &nbsp Inglés</a></li>
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

				<div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-info" role="alert" id="message_box" style="display:none">
                                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Cerrar</span></button>
                                <span><i class="fa fa-audio-description fa-lg"></i></span><span style="padding-right:20px;"></span>
								<span id="on_sibmission">RADION esta activo en las redes sociales <a href="https://web.telegram.org/#/im?p=@radion_project" target="blank">Telegram</a> Group.</span>
								</div>
                        </div>
                    </div>

                    <!-- START WIDGETS -->
                <div class="row">

                  <div class="col-md-3">
                    <!-- START WIDGET MESSAGES -->
                    <div class="widget widget-primary widget-item-icon">
                      <div class="widget-item-left">
                        <img src="img/ON-logo-2.png" style="height:40px; width:40px;">
                      </div>
                      <div class="widget-data">
                        <div class="widget-int num-count">RADIO</div>
                        <div class="widget-title">BALANCE</div>
                        <div class="widget-subtitle radio-balance" style="color:#F39C12;">0 TOKENS</div>
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
                                    <span><a href="#" id="connect-wallet" class="widget-control-right" style="font-size:13px; text-decoration:none; color:#F39C12;"><i class="fad fa-wallet"></i> Conectar Billetera</a></span>
                                    <span style="padding-right:3px; padding-left:3px;">|</span>
                                    <span><a href="#modal_small" data-toggle="modal" style="font-size:13px; text-decoration:none; color:#F39C12;"><i class="fad fa-qrcode"></i> Recibir</a></span>
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

                    <div class="col-md-8">
				<h3><i class="fas fa-door-open"></i> SALA DE ESPERA </h3>
				<hr>

      <!--
data-step="1" data-intro="" data-position="right"
-->
                      <div class="row">

                        <div class="col-md-12" style="paddin-bottom:200px;">

                        <p align="justify"><small><strong>BIENVENIDOS A RADION FM</strong></small></p>
						<p align="justify"><small>Estamos muy emocionados de tenerte como nuevo miembro. En esta plataforma encontrarás herramientas que te ayudarán a exponer tu talento e introducir tu música a la comunidad criptográfica. Personas de todo el mundo que aprecian la música.
            sin toda esta burocracia que la industria de la música corporativa ha establecido en este modelo de negocio durante años. ¡Lo mantenemos simple! Dejamos que los amantes de la música decidan lo que les gusta y lo que quieren.
            no, que pueden volverse populares en un género musical en particular y ganar más seguidores por su talento. Dejamos que el usuario arbitre los flujos y la red de nuestra plataforma mediante votos.
            Los músicos por otro lado se benefician de nuestra plataforma, si quieren vender su música por descargas o NFT. Les permitimos crear NFT para demostrar que son titulares de derechos de autor con un registro
            en blockchain, también les permitimos acceder a NFT si quieren vender ediciones limitadas de sus álbumes y conservar los derechos de autor.
            <br> <br> ¡Nos esforzamos por la descentralización y la criptografía! Quizás estas palabras no signifiquen nada para usted en este momento, pero podemos asegurarle que las apreciará cuando
            familiaricese con nuestra plataforma.
<br> <br> Quizás te preguntes, ¿qué significa esto para ti y para tu carrera musical? Bueno, ¡pongámoslo en perspectiva! Sin demoras en los pagos, sin porcentaje a pagar por distribución o promoción, sin
            compromisos, solo sigue haciendo lo que te gusta y crea más música para tu audiencia. RADION no cobra un porcentaje por descarga, ni cobra tarifas o comisiones, los ingresos van
             directamente a su billetera si alguien descarga sus canciones. Adjuntamos la licencia de música correspondiente para cada activo para proteger al artista y evitar infracciones de derechos de autor.
</small>
</p>
<hr>
                                </div>
                                  </div>
					                           </div>

<div class="col-md-4">

<!-- START WIZARD WITH VALIDATION -->
<div class="panel panel-default" align="center">

<div class="panel-body">

  <h4>BILLETERAS PARA TEZOS</h4>

  <p align="justify"><img src="img/temple.jpg" style="height:50px; width:50px; margin-right:10px;"> <small><strong>TEMPLE</strong> -  (EXTENSIÓN PARA NAVEGADOR)</small></p>
  <p align="justify"><small><a href="https://templewallet.com/" target="blank">Temple</a> es una billetera de criptomonedas hecha para Tezos como una extensión web para su navegador.</small></p>
<br>
<p align="justify"><img src="img/kukai.jpg" style="height:50px; width:50px; margin-right:10px;"> <small><strong>KUKAI</strong> -  </small></p>
<p align="justify"><small><a href="https://wallet.kukai.app" target="blank">Kukai</a> es una billetera web de Tezos basada en tres principios: seguridad, comunidad y confiabilidad. Importar billetera · Nueva billetera · Connect Ledger · DirectAuth.</small></p>
<br>
<p align="justify"><img src="img/AirGap.png" style="height:50px; width:50px; margin-right:10px;"> <small><strong>AirGap</strong> -  (DISPOSITIVO ELECTRONICO)</small></p>
<p align="justify"><small><a href="https://wallet.kukai.app" target="blank">AirGap</a> es mas que un dispositivo electronico.</small></p>
<br>
  <p align="justify"><img src="img/banner_logo.png" style="height:50px; width:50px; margin-right:10px;"> <small><strong>GALLEON</strong> -  (COMPUTADORA)</small></p>
  <p align="justify"><small><a href="https://cryptonomic.tech/galleon.html" target="blank">Galleon</a> es un programa que se puede instalar en tu computadora y usarla como billetera para Tezos. Puedes descargar el programa
  disponible para Mac, Windows, y Linux.
</small></p>
<br>
<p align="justify"><img src="img/icon-wallet.png" style="height:50px; width:50px; margin-right:10px;"> <small><strong>RADION</strong> - (BILLETERA NATIVA WEB)</small></p>
<p align="justify" style="padding-bottom:30px;"><small>RADION FM te permite crear tu clave pública en el proceso de registro para poder usarla con cualquiera de las billeteras anteriores.
     RADION no guarda su billetera, clave pública y / o claves privadas, por lo tanto, debe guardar su clave secreta y / o palabras secretas en un lugar seguro.</small></p>

</div>

</div>
<!-- END WIZARD WITH VALIDATION -->

					</div>

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
        <div class="sidebar" style="overflow-y: hidden;">
            <div class="sidebar-wrapper scroll">

                <div class="sidebar-tabs">
                    <a href="#sidebar_1" class="sidebar-tab"><i class="fad fa-coins"></i> TOKEN</a>
                    <a href="#sidebar_2" class="sidebar-tab"><span class="fas fa-map-signs"></span> NOTICIAS</a>
                </div>

                <div class="sidebar-tab-content active" id="sidebar_1">


					<!-- START WIZARD WITH VALIDATION -->
            <div align="center" style="padding-top:30px;">
							<span class="swap-input-img"><img src="img/tezos-logo.png" style="height:43px;"></span>
              <span><i style="color:#fff;" class="fas fa-exchange-alt fa-lg"></i></span>
              <span class="swap-output-img"><img src="img/ON-logo-2.png" style="height:43px; width:43px;"></span>
            </div>

                      <div class="panel-body">
                                    <h3 align="center" style="padding:20px; color:#fff;">CAMBIO</h3>
                                    <form id="form-swap" action="" method="post" class="form-horizontal">
                                      <div style="padding-left:15px; margin-bottom:-10px;">
                                        <p style="color:#ccc; margin-bottom:-3px;"><small>Tipo de cambio esperado:<span class="exchange-rate" style="padding-left:50px; color:#F39C12;">1 RADD = 0.00000 XTZ</span></small></p>
                                        <p style="color:#ccc; margin-bottom:-3px;"><small>Tarifa de cambio: <span class="exchange-fee" style="padding-left:92px; color:#F39C12;">0 RADD</span></small></p>
                                        <p style="color:#ccc; margin-bottom:-3px;"><small>Tarifa de red: <span style="padding-left:113px; color:#A9CCE3;">0 XTZ</span></small></p>
                                        <hr>
                                      </div>

                                      <div style="padding-top:20px; padding-bottom:0px; height:400px;">
                                        <h5 style="padding:0px 0px 0px 15px; color:#fff;"><small>ENTRADA Y SALIDA DE UNIDADES</small></h5>
                                        <div class="form-group">
                                          <div class="col-md-3">
                                            <div class="input-group">
                                              <span class="input-group-btn">
                                                <button id="swap-input-unit" class="btn btn-default" type="button">TEZOS</button>
                                              </span>

                                              <span class="input-group-btn">
                                                <button id="swap-output-unit" class="btn btn-default" type="button">RADIO</button>
                                              </span>
                                            </div>
                                          </div>
                                        </div>

                                        <h3 style="padding:10px 0px 0px 10px; color:#fff;">INGRESE MONTO</h3>

                                        <div class="col-md-12" style="padding-bottom:15px;">
                                          <p style="margin-bottom:0px; color:#ccc;">ENVIAS</p>
                                          <div class="input-group">
                                            <input type="text" id="swap-input" name="swap-input" class="form-control" placeholder="..."/>
                                            <span class="input-group-addon" style="background-color:#ddd; border: 1px solid #ddd; color:#333;"><strong class="swap-input-unit">TEZOS</strong></span>
                                          </div>
                                        </div>

                                        <div class="col-md-12" style="padding-bottom:15px;">
                                          <p style="margin-bottom:0px; color:#ccc;">RECIBES</p>
                                          <div class="input-group">
                                            <input type="text" id="swap-output" name="swap-output" class="form-control" placeholder="..." readonly />
                                            <span class="input-group-addon" style="background-color:#ddd; border: 1px solid #ddd; color:#333;"><strong class="swap-output-unit">RADIO</strong></span>
                                          </div>
                                        </div>

                                        <div class="col-md-12" style="padding-bottom:20px;">
                                          <p style="margin-bottom:0px; color:#ccc;">CUENTA DEL BENEFICIARIO</p>
                                          <input style="color:#2471A3;" type="text" id="swap-address" name="swap-address" class="form-control" placeholder="tz..." readonly />
                                        </div>
                                        <div style="padding:15px;">
                                          <button type="submit" class="btn btn-block btn-warning"><i class="fad fa-exchange-alt fa-lg"></i> CAMBIAR</button>
                                        </div>
                                      </div>
                                    </form>
                                </div>

                            <!-- END WIZARD WITH VALIDATION -->

					</div>
                </div>

                <div class="sidebar-tab-content form-horizontal" id="sidebar_2">
                    <div style="padding-left:30px; padding-right:30px; height:1150px;"></div>
                </div>
              </div>

        <!-- END SIDEBAR -->

		    <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fas fa-sign-out-alt"></span> Cerrar<strong> sesión</strong> ?</div>
                    <div class="mb-content">
                        <p>Estas seguro que quieres terminar tu sesión</p>

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

        <!-- START PRELOADS -->
        <audio id="audio-alert" src="audio/alert.mp3" preload="auto"></audio>
        <audio id="audio-fail" src="audio/fail.mp3" preload="auto"></audio>
        <!-- END PRELOADS -->

    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/all.js"></script>
        <!-- END PLUGINS -->

        <!-- START THIS PAGE PLUGINS-->
        <script type="text/javascript" src="js/plugins/sparkline/jquery.sparkline.min.js"></script>
        <script type="text/javascript" src="js/plugins/knob/jquery.knob.min.js"></script>

        <script type='text/javascript' src='js/plugins/icheck/icheck.min.js'></script>
        <script type="text/javascript" src="js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        <script type="text/javascript" src="js/plugins/scrolltotop/scrolltopcontrol.js"></script>
		    <script type="text/javascript" src="js/plugins/cropper/cropper.min.js"></script>
		    <script type="text/javascript" src="js/plugins/fileinput/fileinput.min.js"></script>
        <script type="text/javascript" src="js/plugins/rickshaw/d3.v3.js"></script>
        <script type="text/javascript" src="js/plugins/rickshaw/rickshaw.min.js"></script>
        <script type="text/javascript" src="js/plugins/owl/owl.carousel.min.js"></script>
        <script type="text/javascript" src="js/plugins/moment.min.js"></script>
	    	<script type="text/javascript" src="js/plugins/jstree/jstree.min.js"></script>
		   <script type="text/javascript" src="js/demo_file_handling.js"></script>
        <!-- END THIS PAGE PLUGINS-->

        <!-- THIS PAGE PLUGINS -->
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap-file-input.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap-select.js"></script>
        <script type="text/javascript" src="js/plugins/tour/bootstrap-tour-standalone.min.js"></script>
        <script type="text/javascript" src="js/plugins/tour/intro.min.js"></script>

        <!-- END THIS PAGE PLUGINS -->
		<script type='text/javascript' src='js/plugins/noty/jquery.noty.js'></script>
        <script type='text/javascript' src='js/plugins/noty/layouts/topRight.js'></script>
        <script type='text/javascript' src='js/plugins/noty/themes/default.js'></script>
		<script type="text/javascript" src="js/plugins/smartwizard/jquery.smartWizard-2.0.min.js"></script>
        <script type="text/javascript" src="js/plugins/jquery-validation/jquery.validate.js"></script>
        <!-- START TEMPLATE -->
        <script type="text/javascript" src="js/plugins.js"></script>
        <script type="text/javascript" src="js/actions.js"></script>
        <script type="text/javascript" src="js/demo_dashboard.js"></script>
        <script type="text/javascript" src="js/id3-minimized.js"></script>
        <script src="/js/helpers.js"></script>
        <script src="/js/tezos.js"></script>
        <!-- END TEMPLATE -->




  <script>
  const { TezosToolkit } = taquito
  const { BeaconWallet } = taquitoBeaconWallet
  const { NetworkType } = beacon

  const api = 'https://api.better-call.dev/v1'
  const rpc = 'https://florencenet.smartpy.io'
  const tezos = new TezosToolkit(rpc)
  const wallet = new BeaconWallet({
    name: 'RADION FM',
    iconUrl: 'https://www.radion.fm/favicon/apple-icon-60x60.png',
    appUrl: 'https://www.radion.fm'
  })

  tezos.setWalletProvider(wallet)
  let connected = false
  const tokenContract = 'KT1XLDJzzgSAb6HMXAKoFTxEQ3zMA7HGgU91'
  const dexContract = 'KT1H7Ku9jsmZ5hjpsYUcTbj4rJWm5dbfbrGH'
  let tokenStorage = null
  let dexStorage = null

  $('#connect-wallet').click(async function (event) {
    event.preventDefault()
    if (connected) {
      await wallet.clearActiveAccount()
      $('#connect-wallet').html('<i class="fad fa-wallet"></i> Conectar Billetera')
      $('.xtz-balance').text('0 ꜩ')
      $('.usd-balance').text('0')
      $('.radio-balance').text('0 RADIO')
      $('#wallet_address').empty()
      $('#swap-address').val('')
      $('#qraddress').empty()
      connected = false
      return false
    }

    try {
      const network = { type: NetworkType.FLORENCENET, rpcUrl: rpc }
      await wallet.requestPermissions({ network })
      $('#connect-wallet').html('<i class="fad fa-wallet"></i> Desconectar Billetera')
      connected = true
    } catch (error) {
      noty({
        text: '<i class="far fa-exclamation-circle fa-lg"></i> Conexión fue cancelada',
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
    const radioBalanceURL = 'https://api.better-call.dev/v1/account/florencenet/' + address + '/token_balances?contract=' + tokenContract
    const radio = await $.getJSON(radioBalanceURL)
    const radioBal = radio.balances[0]
    const radioBalance = typeof radioBal !== 'undefined' ? parseInt(radioBal.balance) / (10 ** radioBal.decimals) : 0

    new QRCode($('#qraddress')[0], address)
    $('#wallet_address').text(address)
    $('#swap-address').val(address)
    $('.xtz-balance').text(balance + ' ꜩ')
    $('.usd-balance').text(usdBalance)
    $('.radio-balance').text(radioBalance + ' RADIO')
  })

  $('#swap-input-unit,#swap-output-unit').click(function () {
    const input = $('#swap-input-unit').text()
    const output = $('#swap-output-unit').text()

    if (input === 'TEZOS') {
      $('#swap-input-unit,.swap-input-unit').text('RADIO')
      $('#swap-output-unit,.swap-output-unit').text('TEZOS')
      $('.swap-input-img').html('<img src="img/ON-logo-2.png" style="height:43px; width:43px;">')
      $('.swap-output-img').html('<img src="img/tezos-logo.png" style="height:43px;">')
    } else if (input === 'RADIO') {
      $('#swap-input-unit,.swap-input-unit').text('TEZOS')
      $('#swap-output-unit,.swap-output-unit').text('RADIO')
      $('.swap-input-img').html('<img src="img/tezos-logo.png" style="height:43px;">')
      $('.swap-output-img').html('<img src="img/ON-logo-2.png" style="height:43px; width:43px;">')
    }
  })

  $('#swap-input').on('input', async function () {
    const value = $(this).val()
    const input = parseFloat(value)
    const inputUnit = $('#swap-input-unit').text()

    if (input) {
      if (inputUnit === 'TEZOS') {
        const output = await estimateTezToToken(input)
        const fee = output * 0.003
        $('#swap-output').val(output)
        $('.exchange-fee').text(fee + ' RADIO')
      } else if (inputUnit === 'RADIO') {
        const output = await estimateTokenToTez(input)
        const feeStr = (output * 0.003).toFixed(6)
        const fee = parseFloat(feeStr)
        $('#swap-output').val(output)
        $('.exchange-fee').text(fee + ' TEZOS')
      }
    }
  })

  $('#form-swap').submit(async function (event) {
    event.preventDefault()
    if (dexStorage === null || tokenStorage === null) return
    if (!connected) {
      noty({
        text: 'Primero, favor de conectar su billetera',
        layout: 'topRight',
        type: 'error',
        timeout: 5000
      })
      return
    }

    const value = $('#swap-input').val()
    const input = parseFloat(value)
    const inputUnit = $('#swap-input-unit').text()

    if (input) {
      const tokenMetadata = await tokenStorage.assets.token_metadata
      const decimals = parseInt(tokenMetadata[0]['@map_3'].decimals)
      const pkh = await tezos.wallet.pkh()
      const contract = await tezos.wallet.at(dexContract)
      let op = null

      if (inputUnit === 'TEZOS') {
        const output = await estimateTezToToken(input)
        const slippage = output * 0.005
        const minReceive = new BigNumber(output - slippage)
          .times(10 ** decimals)
          .integerValue(BigNumber.ROUND_DOWN)
          .toNumber()

        op = await contract.methods.tezToTokenPayment(minReceive, pkh).send({
          amount: input
        })
      } else if (inputUnit === 'RADIO') {
        const output = await estimateTokenToTez(input)
        const slippageStr = (output * 0.005).toFixed(6)
        const token = new BigNumber(input)
          .times(10 ** decimals)
          .integerValue(BigNumber.ROUND_DOWN)
          .toNumber()

        const slippage = parseFloat(slippageStr)
        const minReceive = new BigNumber(output - slippage)
          .times(1000000)
          .integerValue(BigNumber.ROUND_DOWN)
          .toNumber()

        const batch = tezos.batch()
        const tokenCont = await tezos.contract.at(tokenContract)
        batch.withContractCall(tokenCont.methods.update_operators([{
          add_operator: {
            owner: pkh,
            operator: dexContract,
            token_id: 0
          }
        }]))

        batch.withContractCall(contract.methods.tokenToTezPayment(token, minReceive, pkh))
        batch.withContractCall(tokenCont.methods.update_operators([{
          remove_operator: {
            owner: pkh,
            operator: dexContract,
            token_id: 0
          }
        }]))

        op = await tezos.wallet.batch(batch.operations).send()
      }

      if (op === null) return
      const n = noty({
        text: 'Esperando confirmación',
        layout: 'topRight'
      })

      const confirmed = await op.confirmation(1)
      n.close()

      if (confirmed) {
        $(this).trigger('reset')
        noty({
          text: 'Confirmado',
          layout: 'topRight',
          type: 'success',
          timeout: 5000
        })
      } else {
        noty({
          text: 'No se pudo confirmar operación',
          layout: 'topRight',
          type: 'error',
          timeout: 5000
        })
      }
    }
  })

  $(document).ready(function () {
    getExchange()
  })

  async function estimateTezToToken (tezAmount) {
    if (dexStorage === null || tokenStorage === null) return 0

    const mutez = new BigNumber(tezAmount * 1000000)
    const tezWithFee = mutez.times(997)
    const numerator = tezWithFee.times(dexStorage.storage.token_pool)
    const denominator = new BigNumber(dexStorage.storage.tez_pool).times(1000).plus(tezWithFee)
    const output = numerator.idiv(denominator)

    const tokenMetadata = await tokenStorage.assets.token_metadata
    const decimals = parseInt(tokenMetadata[0]['@map_3'].decimals)
    return output.div(10 ** decimals).toNumber()
  }

  async function estimateTokenToTez (tokenAmount) {
    if (dexStorage === null || tokenStorage === null) return 0

    const tokenMetadata = await tokenStorage.assets.token_metadata
    const decimals = parseInt(tokenMetadata[0]['@map_3'].decimals)
    const amount = new BigNumber(tokenAmount).times(10 ** decimals)
    const tokenWithFee = amount.times(997)
    const numerator = tokenWithFee.times(dexStorage.storage.tez_pool)
    const denominator = new BigNumber(dexStorage.storage.token_pool).times(1000).plus(tokenWithFee)
    const mutez = numerator.idiv(denominator)

    return mutez.div(1000000).toNumber()
  }

  async function getExchange () {
    const dexStorageJSON = await $.getJSON(`${api}/contract/florencenet/${dexContract}/storage`)
    const tokenStorageJSON = await $.getJSON(`${api}/contract/florencenet/${tokenContract}/storage`)
    dexStorage = parseMichelsonMap(dexStorageJSON, undefined)[0]
    tokenStorage = parseMichelsonMap(tokenStorageJSON, {
      network: 'florencenet',
      includeNone: true
    })[0]

    const exchangeRate = await estimateTokenToTez(1)
    $('.exchange-rate').text(`1 RADD = ${exchangeRate} XTZ`)
  }
  </script>
</body>
</html>
