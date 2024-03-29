<?php

$groupswithaccess = 'RADIONER,CEO,FOUNDER';

require_once 'slpw/sitelokpw.php';
require_once 'slpw/slconfig.php';

date_default_timezone_set('US/Eastern');

?>
<!DOCTYPE html>
<html lang="es">

<head>
  <!-- META SECTION -->
  <title>SUBIR MUSICA - PRODUCCIÓN DE ACTIVO</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
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
  <link rel="stylesheet" href="/css/cropper/cropper.min.css">

  <script>var memberprofilepage = 1</script>
  <?php if (function_exists('startwhoisonline')) startwhoisonline('userid'); ?>

  <script>var blabfolderpath = "/slpw/plugin_blab/"</script>
  <link rel="stylesheet" type="text/css" href="/slpw/plugin_blab/blab.css">
  <script src="/slpw/plugin_blab/sarissa.js"></script>
  <script src="/slpw/plugin_blab/blab.js"></script>
  <script src="https://cdn.lordicon.com//libs/frhvbuzj/lord-icon-2.0.2.js"></script>
  <script src="https://unpkg.com/@airgap/beacon-sdk@2.3.1/dist/walletbeacon.min.js"></script>
  <script>window.beaconSdk = beacon</script>
  <script src="https://unpkg.com/@taquito/taquito@10.1.0/dist/taquito.min.js"></script>
  <script src="https://unpkg.com/@taquito/beacon-wallet@10.1.0/dist/taquito-beacon-wallet.umd.js"></script>

  <!-- QR CODE CDN -->
  <script src="https://cdn.jsdelivr.net/gh/davidshimjs/qrcodejs/qrcode.min.js"></script>

  <!-- CLIPBOARD -->
  <script src="https://cdn.jsdelivr.net/clipboard.js/1.5.3/clipboard.min.js"></script>

  <style>
  .fa-sort-down { color: #C0392B; }
  .fa-sort-up { color: #27AE60; }
  .tDown { color: #C0392B; }
  .tUp { color: #27AE60; }
  .linko { color: #DDDDDD; }
  .linko:hover { color: #F39C12; }

  .connect-iframe {
    width: 100%;
    height: 250px;
    border: 0;
  }
  </style>
</head>

<body>
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
                    <div style="padding-left:35px; margin-top:-20px;"><Strong>Recibir Tezos</strong></div>
                    <br>
                    <div align="jusity" style="padding-right:5px; padding-left:5px; font-size:9px; color:#515A5A;">
                        <strong>Importante:</strong> No olvides que nosotros no custodiamos tus llaves, así que por favor conecta tu billetera si quieres ver tu código QR.</div>
                    <hr>
                    <div align="center" id='qraddress'></div>
                    <hr>
                    <div style="padding-bottom:20px;">
                        <p style="color:#333; margin-bottom:-5px;"><strong>Billereta Crypto:</strong></p>
                        <span style="font-size:11px; padding-right:10px;" id="wallet_address"></span>
                        <div align="right" style="margin-top:-20px;"><button class="btn btn-default btn-xs copyButton" data-clipboard-action="copy" data-clipboard-target="#wallet_address"><i class="fad fa-copy"></i></button>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <!-- END MODAL FOR QR -->

  <!-- MODAL FOR DELETE -->
  <div class="modal" id="modal_basic" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
    <div class="modal-dialog" style="width:480px;">
      <div class="modal-content">
        <div class="modal-body">
          <div align="center" style="padding-bottom:20px;"><img src="img/letsgo.png"></div>
          <p align="justify" style="padding:20px;"><i class="far fa-exclamation-circle fa-lg" style="color:#C0392B;"></i><strong> Importante:</strong><br><br>
            Tenga en cuenta que estos cambios no son reversibles y si elimina el activo de su cuenta, se eliminará permanentemente de nuestro sistema. Esto perjudica directamente la clasificación de su activo en Billboard y se penaliza permanentemente. ¿Estás seguro de que quieres eliminarlo? &quot;<strong><span id="delete-name"></span></strong>&quot;?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">No, Cancelar</button>
          <button type="button" class="btn btn-primary" id="delete-confirm">Si</button>
        </div>
      </div>
    </div>
  </div>
  <!-- END MODAL FOR DELETE -->

    <!-- ALERT MESSAGE -->

    <div class="message-box message-box-warning animated fadeIn" id="message-box-warning">
        <div class="mb-container">
            <div class="mb-middle">
                <div class="mb-title"><span class="fa fa-warning"></span> Advertencia</div>
                <div class="mb-content">
                    <p>Debe completar toda la información que se necesita para subir su canción.</p>
                </div>
                <div class="mb-footer">
                    <button class="btn btn-default btn-lg pull-right mb-control-close">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <button type="button" class="btn btn-warning mb-control hide" id="warning_btn" data-box="#message-box-warning">Advertencia</button>
    <!--- ALERT MESSAGE --->

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
                <li class="xn-icon-button">
                    <a href="#" class="x-navigation-minimize"><i class="fad fa-outdent fa-lg"></i></a>
                </li>
                <!-- END TOGGLE NAVIGATION -->

                <!-- POWER OFF -->
                <li class="xn-icon-button pull-right last">
                    <a href="#"><i class="fad fa-sign-out-alt fa-lg"></i></a>
                    <ul class="xn-drop-left animated zoomIn">

                        <li><a href="#" class="mb-control" data-box="#mb-signout"><i class="fad fa-sign-out-alt"></i> Terminar Sesión</a></li>
                    </ul>
                </li>
                <!-- END POWER OFF -->

                <!-- ALERT NOTIFICATIONS -->
                <li class="xn-icon-button pull-right">
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
                                                                    } ?> Nuevo</span>
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
                    <ul class="xn-drop-left xn-drop-dark animated zoomIn">

                        <li><a href="#"><img src="img/flags/us.png" style="height:20px; width:20;">&nbsp &nbsp Inglés</a></li>
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
                            <span id="on_sibmission">RADION esta siempre activo en las redes sociales  <a href="https://web.telegram.org/#/im?p=@radion_project" target="blank">Telegram</a> Group.</span>
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
                        <div class="widget-subtitle radio-balance" style="color:#F39C12;">0 TOKEN</div>
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
                            <div class="widget-subtitle">Cambio 24h
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
                                    <span><a href="#" id="connect-wallet" class="widget-control-right" style="font-size:13px; text-decoration:none; color:#F39C12;"><i class="fad fa-wallet"></i> Connectar Billetera</a></span>
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

									<div class="col-md-12" style="margin-bottom:-30px;">
									<div class="col-md-6">
                                        <h3 style="padding-top:20px;"><i class="fad fa-upload"></i> SUBE TU MÚSICA</h3>
                                        <p> Para convertir tu música en un activo digital, necesitas 2 archivos; a) Tu canción en formato <code>MP3</code> b) La imagen de tu álbum en formato <code>JPG</code> or <code>PNG</code>. </p>
										</div>

                                                        <div class="col-md-6" align="right" style="padding-right:30px;">
														<img id="cover-preview" src="img/offline.jpg" style="width:80px; height:80px; border-radius:20px 10px 20px 10px;"/>
														<p align="right" style="padding-right:10px;"><small><strong>CARÁTULA</strong></small></p>
														</div>

                                                        </div>



                                        <div class="row">
                                                <!-- UPLOAD ZONE -->

                                            <div class="panel-body">
												<hr style="border-top:1px dashed #95B75D;">

                                                <!-- UPLOAD ZONE ENDS -->

                                            <div class="col-md-6">
                                              <div class="form-group">
                                                <form action="/upload.php" id="dropzone" class="dropzone dropzone-mini"></form>
                                              </div>

											<div align="justify" style="color:#c0c0c0; padding-right:15px; padding-left:15px;"><small><strong>Nota</strong>: Asegúrese de que la información sea correcta al subir su canción. La caratula debe tener un máximo de 800x800 px. </small></div>

											<div class="col-md-12" style="padding-bottom:30px; padding-top:20px;" data-step="3" data-intro="Estas opciones son facil de entender y completar." data-position="right">
                                        <div class="form-group has-info">
                                            <label class="control-label">TÍTULO DE LA CANCIÓN</label>
                                            <input id="title" type="text" class="form-control"/>
                                        </div>
                                        <div class="form-group has-info">
                                            <label class="control-label">NOMBRE DEL ARTISTA</label>
                                            <input id="artist" type="text" class="form-control"/>
                                        </div>
                                        <div class="form-group has-info">
                                            <label class="control-label">NOMBRE DEL ÁLBUM</label>
                                            <input id="album" type="text" class="form-control"/>
                                        </div>
                                    </div>


										<div class="col-md-3">
										<div class="form-group has-info">
                                            <label class="control-label">AÑO</label>
                                            <input id="year" type="text" class="form-control"/>
                                        </div>
										</div>
										<div class="col-md-3" class="col-md-3">
										<div class="form-group has-info">
                                            <label class="control-label">PISTA</label>
                                            <input id="track" type="text" class="form-control"/>
                                        </div>
										</div>


										<div class="col-md-6">
										<div class="form-group has-info">
                      <label class="control-label">GÉNERO</label>
                      <select id="genre" class="form-control btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <option value="" selected>Seleccione Uno</option>
                        <option value="Alternative Rock">Rock Alternativo</option>
                        <option value="DJ Mix">Beats</option>
                        <option value="Blue">Blue</option>
                        <option value="Classic Music">Música Clasica</option>
                        <option value="Country">Música Country</option>
                        <option value="Deep House">Deep House</option>
                        <option value="Electronics">Electrónica</option>
                        <option value="Hip Hop / R&B">Hip Hop / R&amp;B</option>
                        <option value="House Music">Música Casera</option>
                        <option value="Rock">Indie Rock</option>
                        <option value="Jazz">Jazz</option>
                        <option value="Kids">Música para Niños</option>
                        <option value="Latin Music">Música Latina</option>
                        <option value="Latin">Latino</option>
                        <option value="Podcast">Podcast</option>
                        <option value="Pop">Pop</option>
                        <option value="RAP">Rap</option>
                        <option value="Relaxing">Relaxing</option>
                        <option value="Romantic">Romantic</option>
                        <option value="Techno">Techno</option>
                        <option value="Commercial" style="color:#F39C12;">RADION Comercial</option>

                      </select>
                    </div>
										</div>

										<div class="col-md-12" style="padding-top:20px;">
										<div class="form-group has-info" >
                                            <label class="control-label">SELLO DISCOGRÁFICO</label>
                                            <input id="record-label" name="record-label" type="text" class="form-control"/>
                                        </div>
										</div>
										<div class="col-md-12" style="padding-top:20px;">
										<div class="form-group has-info">
                                            <label class="control-label">BILLETERA PÚBLICA</label>
                                            <input id="wallet-address" name="wallet-address" type="text" class="form-control" value="<?= $slcustom6 ?>" placeholder="<?php echo $slcustom6; ?>" readonly/>
                                        </div>
										</div>

										<div class="col-md-12" style="padding-top:20px; padding-bottom:30px;">
										<div class="form-group has-info">
                                            <label class="control-label">EDITORIAL</label>
                                            <input id="publisher" name="publisher" type="text" class="form-control" value="" placeholder="RADION FM - www.radion.fm" readonly/>
                                        </div>
										</div>


                                                </div>
                                                <div class="col-md-6" >
													<h3><strong>LICENCIA DE MUSICA</strong> </h3>
                                                    <div align="right" style="margin-top:-25px; margin-bottom:10px;"><img src="img/cc-logo-1.jpg"></div>
													<p align="justify"><small>RADION permite a los artistas / músicos a marcar su canción original con una Licencia Creative Commons para distribuir a través de nuestra red. Usamos estas licencias para proteger el trabajo de los músicos y permitirles conservar sus derechos de autor.Los usuarios pueden descargar las conciones, pero están restringidos a los términos de la licencia.</small></p>

                                                    <br>
                                                    <h5><strong>- CARACTERÍSTICAS DE LA LICENCIA</strong> </h5>
                                                    <div align="right" style="margin-top:-25px; margin-bottom:0px;">¿<a href="#" data-toggle="modal" data-target="#modal_no_footer">Ayuda</a>?</div>

                                                    <div class="form-group">
                                                      <p align="justify"></p>
                                                  </div>

                                                    <br>
                                                    <div class="form-group">
                                                        <p align="justify" style="color:#909497"><strong>¿Quiere permitir que se compartan adaptaciones de su obra?</strong></p>
                                                        <div class="radio">
                                                <label>
                                                    <input type="radio" name="adaptations" id="optionAdaptations1" value="option1"/>
                                                    Sí
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="adaptations" id="optionAdaptations2" value="option2"/>
                                                    No (Recomendado)
                                                </label>
                                            </div>
											<div class="radio">
                                                <label>
                                                    <input type="radio" name="adaptations" id="optionAdaptations3" value="option3"/>
                                                    Sí, siempre que se comparta de la misma manera
                                                </label>
                                            </div>
                                                    </div>

                                                    <div class="form-group" style="padding-bottom:70px;">
                                                        <p align="justify" style="color:#909497"><strong>¿Quiere permitir usos comerciales de su obra?</strong></p>
                                                        <div class="radio">
                                                <label>
                                                    <input type="radio" name="commercial" id="optionCommercial1" value="option1"/>
                                                    Sí
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="commercial" id="optionCommercial2" value="option2"/>
                                                    No (Recomendado)
                                                </label>
                                            </div>
											</div>


													<h5 style="margin-top:0px;"><strong>LICENCIA SELECCIONADA</strong></h5>

													<div align="right" style="margin-top:-25px; padding-bottom:5px; color:#c0c0c0;">
													<i class="fab fa-creative-commons fa-lg" id="cc-icon"></i>
													<i class="fab fa-creative-commons-by fa-lg" id="cc-icon-by"></i>
													<i class="fab fa-creative-commons-nc fa-lg" id="cc-icon-nc"></i>
													<i class="fab fa-creative-commons-nd fa-lg" id="cc-icon-nd"></i>
													<i class="fab fa-creative-commons-sa fa-lg" id="cc-icon-sa"></i>
													<span style="padding-right:3px; padding-left:3px; color:#333;">-</span>
													<i class="far fa-copyright fa-lg"></i>
													</div>

													<small>
													<div style="color:#c0c0c0;" id="cc-by"><li>Atribución 4.0 Internacional</li></div>
													<div style="color:#c0c0c0;" id="cc-by-nc"><li>Atribución-NonCommercial 4.0 Internacional</li></div>
													<div style="color:#c0c0c0;" id="cc-by-nd"><li>Atribución-NoDerivatives 4.0 Internacional</li></div>
													<div style="color:#c0c0c0;" id="cc-by-nc-nd"><li>Atribución-NonCommercial-NoDerivatives 4.0 Internacional</li></div>
													<div style="color:#c0c0c0;" id="cc-by-sa"><li>Atribución-ShareAlike 4.0 Internacional</li></div>
													<div style="color:#c0c0c0;" id="cc-by-nc-sa"><li>Atribución-NonCommercial-ShareAlike 4.0 Internacional</li></div>
													</small>
													<hr>

                                                    <div class="form-group" style="margin-top:0px;" data-step="11" data-intro="This is your final step to upload your song, however, the (upload now) button will be disabed if any of the entries are not populated correctly or if you have not accept the terms and conditions. If everything is correct, you should be able to click in the button to start the upload." data-position="right">
                                                        <h5 style="color:#909497"><i class="fad fa-handshake fa-lg"></i><strong> Términos y condiciones</strong></h5>
                                                        <p align="justify"><small>Declaro que este material fue creado por mí o por mi equipo, y no infringen los derechos de terceros. Entiendo que el uso ilegal de activos digitales va en contra de los Términos de servicio de RADION y puede resultar en la cancelación de mi cuenta.</small></p>
                                                        <label class="check" style="padding-right:50px;"><input type="checkbox" name="agree_disagree" /> <strong>Sí, acepto.</strong></label>

                                                        <button type="button" id="submit_btn" class="btn btn-success btn-lg mb-control" disabled><i class="fas fa-check-circle"></i> SUBIR YA</button>

                                                        <!-- Message with sound -->
                                                        <div class="message-box animated fadeIn" data-sound="alert" id="message-box-sound-1">
                                                            <div class="mb-container">
                                                                <div class="mb-middle">
                                                                    <div class="mb-title"><span class="fa fa-globe"></span> Alerta</div>
                                                                    <div class="mb-content">
                                                                        <p>Nota importante: ¡Queremos agradecerle por participar en la versión beta de RADION! Tenga en cuenta que este projecto sigue bajo desarrollo, sin embargo, su experiencia es muy importante para nosotros ...</p>
                                                                    </div>
                                                                    <div class="mb-footer">
                                                                        <button class="btn btn-success btn-lg pull-right mb-control-close"> Gracias </button>
                                                                        <button class="btn btn-danger btn-lg mb-control-close"> Cerrar </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- END MESSAGE WITH SOUND -->

                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                </div>

								<div class="col-md-4" data-step="12" data-intro="Once you upload has started, you will see a notification at the upper corner right of your screen saying upload was successful. Right after your song is successfully uploaded you will see the status of the asset here. Keep in mind that there is a 24Hrs period of time to count users vote. " data-position="left">
								<div style="padding-bottom:20px; padding-top:20px;">
								<h3><i class="fas fa-head-side-headphones fa-lg"></i> REVISIÓN DE LA COMUNIDAD</h3>
								<p>El resultado determinará si su activo se puede colocar o no en nuestra transmisión en vivo. ¡Puede votar por su propio activo en el mercado!</p>
								</div>
                                <!-- SUBMISSION LIST STATUS -->
                                <div class="panel panel-default">
								                <div class="form-group">
                                <div class="panel-body list-group list-group-contacts" id="status_table"></div>
                                </div>
                                <!-- END SUBMISSION LIST STATUS -->
								                      </div>
                                </div>
                            </div>
                        </div>
</div>
<div class="panel panel-default" data-step="13" data-intro="In this table you will see all the songs that you have uploaded along with its information. New features will become available after the 24 hrs period of time. Some of them includes; NFT to sell or to create exclusive right record in blockchain. " data-position="top">
<div class="panel-body">

                        <div class="col-md-12" style="padding-bottom:50px;">
                            <form class="form-horizontal">

                                <div class="panel panel-default tabs">
                                    <ul class="nav nav-tabs" role="tablist" style="padding-bottom:20px;">
                                        <li class="active"><a href="#tab-first" role="tab" data-toggle="tab">ACTIVOS</a></li>
                                        <li><a href="#tab-second" role="tab" data-toggle="tab">PRINCIPIOS DE LA COMUNIDAD</a></li>
                                        <li><a href="#tab-third" role="tab" data-toggle="tab">INFRACCIONES DE DERECHOS DE AUTOR</a></li>
                                    </ul>
                                    <div class="panel-body tab-content">
                                        <div class="tab-pane active" id="tab-first">

                                            <table style="width:100%;">
                                                <thead>
                                                    <tr style="border-bottom: 2px solid #dddddd;" align="center">
                                                        <th style="width:15%; padding-bottom:10px; font-size:10px;">ACTIVO ID</th>
                                                        <th align="center" style="width:10%; padding-bottom:10px; font-size:10px;">FORMATO</th>
                                                        <th align="center" style="width:25%; padding-bottom:10px; font-size:10px;">TÍTULO</th>
                                                        <th align="center" style="width:10%; padding-bottom:10px; font-size:10px;">GÉNERO</th>
                                                        <th align="center" style="width:10%; padding-bottom:10px; font-size:10px;">NFT</th>
                                                        <th align="center" style="width:10%; padding-bottom:10px; font-size:10px;">DIFUNDIDO</th>
                                                        <th align="center" style="width:10%; padding-bottom:10px; font-size:10px;">DESCARGAS</th>
                                                        <th align="center" style="width:30%; padding-bottom:10px; font-size:10px;">QUITAR ACTIVO</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="current_asset_table">



                                                </tbody>
                                            </table>


                                        </div>
                                        <div class="tab-pane" id="tab-second">
                                            <table style="width:100%;">
                                                <thead>
                                                    <tr style="border-bottom: 2px solid #dddddd;" align="center">
                                                        <th style="width:5%; padding-bottom:10px;"></th>
                                                        <th align="center" style="width:15%; padding-bottom:10px; font-size:10px;">CATEGORÍA</th>
                                                        <th align="center" style="width:25%; padding-bottom:10px; font-size:10px;">NOMBRE</th>
                                                        <th align="center" style="width:10%; padding-bottom:10px; font-size:10px;">GÉNERO</th>
                                                        <th align="center" style="width:10%; padding-bottom:10px; font-size:10px;">ACTIVO</th>
                                                        <th align="center" style="width:15%; padding-bottom:10px; font-size:10px;">DIFUNDIDO</th>
                                                        <th align="center" style="width:20%; padding-bottom:10px; font-size:10px;">DESCARGAS</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd;"><span class="fas fa-smile"></span></td>
                                                        <td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd;"></td>
                                                        <td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd;"></td>
                                                        <td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd;"></td>
                                                        <td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd;"></td>
                                                        <td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd;"></td>
                                                        <td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd;"></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd; background-color:#f3f3f3;"><span class="fas fa-smile"></span></td>
                                                        <td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd; background-color:#f3f3f3;"></td>
                                                        <td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd; background-color:#f3f3f3;"></td>
                                                        <td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd; background-color:#f3f3f3;"></td>
                                                        <td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd; background-color:#f3f3f3;"></td>
                                                        <td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd; background-color:#f3f3f3;"></td>
                                                        <td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd; background-color:#f3f3f3;"></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd;"><span class="fas fa-smile"></td>
                                                        <td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd;"></td>
                                                        <td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd;"></td>
                                                        <td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd;"></td>
                                                        <td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd;"></td>
                                                        <td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd;"></td>
                                                        <td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd;"></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd; background-color:#f3f3f3;"><span class="fas fa-smile"></td>
                                                        <td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd; background-color:#f3f3f3;"></td>
                                                        <td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd; background-color:#f3f3f3;"></td>
                                                        <td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd; background-color:#f3f3f3;"></td>
                                                        <td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd; background-color:#f3f3f3;"></td>
                                                        <td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd; background-color:#f3f3f3;"></td>
                                                        <td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd; background-color:#f3f3f3;"></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd;"><span class="fas fa-smile"></td>
                                                        <td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd;"></td>
                                                        <td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd;"></td>
                                                        <td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd;"></td>
                                                        <td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd;"></td>
                                                        <td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd;"></td>
                                                        <td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd;"></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd; background-color:#f3f3f3;"><span class="fas fa-smile"></td>
                                                        <td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd; background-color:#f3f3f3;"></td>
                                                        <td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd; background-color:#f3f3f3;"></td>
                                                        <td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd; background-color:#f3f3f3;"></td>
                                                        <td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd; background-color:#f3f3f3;"></td>
                                                        <td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd; background-color:#f3f3f3;"></td>
                                                        <td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd; background-color:#f3f3f3;"></td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                        </div>
                                        <div class="tab-pane" id="tab-third">
                                            <table style="width:100%;">
                                                <thead>
                                                    <tr style="border-bottom: 2px solid #dddddd;" align="center">
                                                        <th style="width:5%; padding-bottom:10px;"></th>
                                                        <th align="center" style="width:10%; padding-bottom:10px; font-size:10px;">ESTADO</th>
                                                        <th align="center" style="width:15%; padding-bottom:10px; font-size:10px;">USUARIO</th>
                                                        <th align="center" style="width:25%; padding-bottom:10px; font-size:10px;">FECHA</th>
                                                        <th align="center" style="width:10%; padding-bottom:10px; font-size:10px;">ACTIVO ID</th>
                                                        <th align="center" style="width:15%; padding-bottom:10px; font-size:10px;">DIFUNDIDO</th>
                                                        <th align="center" style="width:20%; padding-bottom:10px; font-size:10px;">DESCARGAS</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="copyright-infringements">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </form>
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



    <!-- MESSAGE BOX-->
    <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
        <div class="mb-container">
            <div class="mb-middle">
                <div class="mb-title"><span class="fas fa-sign-out-alt"></span> Terminar <strong>sesión</strong> ?</div>
                <div class="mb-content">
                    <p>Esta seguro que quiere terminar su sesión?</p>

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
  <script src="/js/plugins/jquery/jquery.min.js"></script>
  <script src="/js/plugins/jquery/jquery-ui.min.js"></script>
  <script src="/js/plugins/bootstrap/bootstrap.min.js"></script>
  <script src="/js/all.js"></script>
  <script src="/js/plugins/dropzone/dropzone.min.js"></script>
  <!-- END PLUGINS -->

  <!-- START THIS PAGE PLUGINS-->
  <script src="/js/plugins/icheck/icheck.min.js"></script>
  <script src="/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
  <script src="/js/plugins/scrolltotop/scrolltopcontrol.js"></script>
  <script src="/js/plugins/cropper/cropper.min.js"></script>
  <script src="/js/plugins/fileinput/fileinput.min.js"></script>
  <script src="/js/plugins/rickshaw/d3.v3.js"></script>
  <script src="/js/plugins/rickshaw/rickshaw.min.js"></script>
  <script src="/js/plugins/owl/owl.carousel.min.js"></script>
  <script src="/js/plugins/moment.min.js"></script>
  <script src="/js/plugins/jstree/jstree.min.js"></script>
  <!-- END THIS PAGE PLUGINS-->

  <!-- THIS PAGE PLUGINS -->
  <script src="/js/plugins/bootstrap/bootstrap-file-input.js"></script>
  <script src="/js/plugins/bootstrap/bootstrap-select.js"></script>
  <script type="text/javascript" src="js/plugins/tour/bootstrap-tour-standalone.min.js"></script>
  <script type="text/javascript" src="js/plugins/tour/intro.min.js"></script>

  <!-- END THIS PAGE PLUGINS -->
  <script src="/js/plugins/noty/jquery.noty.js"></script>
  <script src="/js/plugins/noty/layouts/topRight.js"></script>
  <script src="/js/plugins/noty/themes/default.js"></script>
  <!-- START TEMPLATE -->
  <script src="/js/plugins.js"></script>
  <script src="/js/actions.js"></script>
  <!-- END TEMPLATE -->

  <!-- TAG EDITOR SCRIPTS -->
  <script src="/js/mp3tag.js/mp3tag.min.js"></script>
  <script src="/js/submission-editor.js"></script>
  <!-- END TAG EDITOR SCRIPTS -->

  <script src="/js/tezos.js"></script>
  <script>
        $(document).ready(function() {
            express_view();
            load_status_table();

            setInterval(function() {

                load_status_table();
                currents_asset_table();
            }, 1000);
        });


        function load_status_table() {

            //alert();

            $.ajax({
                url: 'submission_status_table.php',
                type: "POST",
                success: function(data, textStatus, jqXHR) {
                    //	alert();

                    $("#status_table").html(data);

                },
                error: function(jqXHR, textStatus, errorThrown) {

                    console.log("Ajax Failed Error In Saving:" + textStatus);


                }
            });




        }


        function currents_asset_table() {

            //alert();

            $.ajax({
                url: 'php/current_asset_table.php',
                type: "POST",
                success: function(data, textStatus, jqXHR) {
                    //	alert();

                    $("#current_asset_table").html(data);

                },
                error: function(jqXHR, textStatus, errorThrown) {

                    console.log("Ajax Failed Error In Saving:" + textStatus);


                }
            });





        }


        function showTags(url) {
            var tags = ID3.getAllTags(url);
            console.log(tags);
            document.getElementById('song_name').value = tags.title || "";
            document.getElementById('album_name').value = tags.album || "";

        }


        function express_view() {


            $.ajax({
                url: "php/get_info.php",
                type: 'POST',
                data: {
                    'type': 2
                },
                success: function(data) {
                    // alert(data);

                    if (!data.includes("NOTAVAIABLE")) {
                        result = data.split("#####");

                        //$("#ad_uname").html(result[1]);

                        on_link = " ";

                        if (result[3] != 0) {
                            on_link = '<a href=http://' + result[3] + ' target="_blank" style="text-decoration:none" rel="nofollow"> Visite Auspiciador</a>';
                        }
                        $("#on_sibmission").html(result[2] + on_link);

                        if (result[4] != "NO_IAMGE") {

                            // $('.backg').css("background-image", "url("+result[4]+")");

                        }

                        // document.body.style.backgroundImage = "url('img_tree.png')";
                        // var x = document.getElementsByClassName("example");



                        $("#message_box").css("display", "block");

                    } else {

                        $("#message_box").css("display", "none");

                    }




                },
                error: function(xhr, ajaxOptions, thrownError) {
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
    </script>

    <!-- END SCRIPTS -->

    <div class="modal" id="modal_no_footer" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                    <h4 class="modal-title" id="defModalHead"><i class="fa fa-exclamation-circle"></i> TIPO DE LICENCIAS</h4>
                </div>
                <div class="modal-body">
                    <p align="justify" style="padding-left:3%; padding-right:3%; padding-bottom:20px;">Creative Commons es una de las varias licencias públicas de derechos de autor que permiten la distribución gratuita de una "obra" que de otro modo tendría derechos de autor y se caracteriza por el siguiente icono
                        <i class="fab fa-creative-commons fa-lg"></i>.<br><br>
                        La licencia o la licencia pública de derechos de autor es una licencia mediante la cual un titular de derechos de autor es licenciante y puede otorgar permisos de derechos de autor adicionales a todas y cada una de las personas del público en general como licenciatarios.</p>

                    <div style="background-color:#CCE4C8; padding:25px 5px 5px 25px; height:100px;">
                        <i class="fab fa-creative-commons fa-2x"></i> <i class="fab fa-creative-commons-by fa-2x"></i> <span style="padding-left:85px; padding-right:30px;"> = </span><span align="right">Attribution alone</span><br>
                        <i class="fab fa-creative-commons fa-2x"></i> <i class="fab fa-creative-commons-by fa-2x"></i> <i class="fab fa-creative-commons-sa fa-2x"></i> <span style="padding-left:55px; padding-right:30px;"> = </span> <span align="right">Attribution + ShareAlike</span>
                        <p style="padding-top:5px; padding-right:10px; font-size:9px; color:#27ae60" align="right"> - Atribuir y permitir uso compartido, remezclado y comercial -</p>
                    </div>

                    <div style="background-color:#E5EED6; padding:25px 5px 5px 25px; height:100px;">
                        <i class="fab fa-creative-commons fa-2x"></i> <i class="fab fa-creative-commons-by fa-2x"></i> <i class="fab fa-creative-commons-nc fa-2x"></i> <span style="padding-left:60px; padding-right:30px;"> = </span><span align="right">Sharing + Non-Commercial</span><br>
                        <i class="fab fa-creative-commons fa-2x"></i> <i class="fab fa-creative-commons-by fa-2x"></i> <i class="fab fa-creative-commons-nc fa-2x"></i> <i class="fab fa-creative-commons-sa fa-2x"></i> <span style="padding-left:30px; padding-right:30px;"> = </span><span align="right">Attribution + Noncommercial + ShareAlike</span>
                        <p style="padding-top:5px; padding-right:10px; font-size:9px; color:#27ae60" align="right">- Atribución y permitir compartir y remezclar únicamente -</p>
                    </div>

                    <div style="background-color:#F4F4D2; padding:25px 5px 5px 25px; height:100px;">
                        <i class="fab fa-creative-commons fa-2x"></i> <i class="fab fa-creative-commons-by fa-2x"></i> <i class="fab fa-creative-commons-nd fa-2x"></i><span style="padding-left:60px; padding-right:30px;"> = </span><span align="right">Attribution + NoDerivatives</span><br>
                        <i class="fab fa-creative-commons fa-2x"></i> <i class="fab fa-creative-commons-by fa-2x"></i> <i class="fab fa-creative-commons-nc fa-2x"></i> <i class="fab fa-creative-commons-nd fa-2x"></i><span style="padding-left:30px; padding-right:30px;"> = </span><span align="right">Attribution + Noncommercial + NoDerivatives</span>
                        <p style="padding-top:5px; padding-right:10px; font-size:9px; color:#f39c12" align="right">- Atribución y permitir compartir únicamente. -</p>
                    </div>
                    <div style="background-color:#EDE2E2; padding:25px 5px 5px 25px; height:80px;">
                        <i class="far fa-copyright fa-2x"></i> <span style="padding-left:115px; padding-right:30px;"> = </span><span align="right">Todos los derechos reservados</span><br>
                        <p style="padding-top:5px; padding-right:10px; font-size:9px; color:#c0392b" align="right"> - Menos abierta -</p>
                    </div>


                    <br>
                    <p align="justify" style="padding-right:3%; padding-left:3%;"><strong>IMPORTANTE</strong>:<br><br>
                        Tenga en cuenta que la licencia CC no crea conflictos con otro acuerdo siempre que no tenga un trato exclusivo. Si pones tu música bajo una licencia no comercial o sin derivados, aún estás abierto a otras ofertas. La agencia o entidades pueden contactarlo directamente a través de la plataforma RADION en cualquier momento. Solo mantén actualizada la información de tu perfil.<br>
                        <br>
                        <p>
                            <div align="right">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            </div>
                </div>
            </div>
        </div>
    </div>

  <!-- END OCLASUS SCRIPT -->

  <script>
  function updateCopyrights () {
    $.ajax('/php/copyright_infringements.php', {
      type: 'GET',
      dataType: 'text',
      success: function (data) {
        $('#copyright-infringements').html(data)
      }
    })
  }

  updateCopyrights()
  setInterval(updateCopyrights, 1000)
  </script>

  <script>
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

  $('#connect-wallet').click(async function (event) {
    event.preventDefault()
    if (connected) {
      await wallet.clearActiveAccount()
      $('#connect-wallet').html('<i class="fad fa-wallet"></i> Conectar Billetera')
      $('.xtz-balance').text('0 ꜩ')
      $('.usd-balance').text('0')
      $('.radio-balance').text('0 RADIO')
      $('#wallet_address').empty()
      $('#qraddress').empty()
      connected = false
      return false
    }

    try {
      await wallet.requestPermissions()
      $('#connect-wallet').html('<i class="fad fa-wallet"></i> Desconectar Billetera')
      connected = true
    } catch (error) {
      noty({
        text: '<i class="far fa-exclamation-circle fa-lg"></i> Conexion fue cancelada',
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

    new QRCode($('#qraddress')[0], address)
    $('#wallet_address').text(address)
    $('.xtz-balance').text(balance + ' ꜩ')
    $('.usd-balance').text(usdBalance)
    $('.radio-balance').text(radioBalance + ' RADIO')
  })

  const inputs = [
    '#title',
    '#artist',
    '#album',
    '#year',
    '#track',
    '#genre',
    '#record-label',
    '[name="agree_disagree"]'
  ]

  $(inputs.join()).on('change', validateSubmit)
  $(inputs.join()).on('input', validateSubmit)

  function validateSubmit () {
    for (let i = 0; i < inputs.length; i++) {
      const input = inputs[i]
      const value = $(input).is('[type="checkbox"]') ? $(input).is(':checked') : $(input).val()
      if (!value) {
        $('#submit_btn').attr('disabled', true)
        return
      }
    }

    $('#submit_btn').attr('disabled', null)
  }

  $('#modal_basic').on('hide.bs.modal', function () {
    window.deleteID = ''
  })

  $('#delete-confirm').click(async function (event) {
    event.preventDefault()
    noty({
      text: 'Eliminando del Servidor! Favor de esperar.',
      layout: 'topRight',
      timeout: 5000
    })

    $.ajax('/php/delete.php', {
      method: 'POST',
      data: { id: window.deleteID },
      cache: false,
      success: function (data, status, xhr) {
        $('#modal_basic').modal('hide')
        console.log('Successfully deleted!')
      },
      error: function (xhr, status, error) {
        console.error('Delete error: ' + xhr.responseText)
      }
    })
  })
  </script>
</body>
</html>
