<?php

$groupswithaccess = 'RADIONER,CEO,FOUNDER';

require_once 'slpw/sitelokpw.php';
require_once 'slpw/slconfig.php';

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- META SECTION -->
        <title>RADION - EXCHANGE</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

<link rel="apple-touch-icon" sizes="57x57" href="favicon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="favicon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="favicon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="favicon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="favicon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="favicon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="favicon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="favicon/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="favicon/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
<link rel="manifest" href="favicon/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="favicon/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
        <!-- END META SECTION -->

        <!-- CSS INCLUDE -->
        <link rel="stylesheet" type="text/css" id="theme" href="css/theme-dark.css"/>
		<link rel="stylesheet" type="text/css" href="css/all.css" />
		<link rel="stylesheet" type="text/css" href="css/cropper/cropper.min.css"/>
		<link rel="stylesheet" type="text/css" href="/slpw/plugin_blab/blab.css">

        <!-- TAQUITO -->
        <script src="https://www.tezbridge.com/plugin.js"></script>
		<script src="https://unpkg.com/@taquito/taquito@6.1.0-beta.0/dist/taquito.min.js" crossorigin="anonymous" integrity="sha384-sk4V+57zLUCfkna8z4p1u6CioucJqmeo+QnaiXoFiuE8vdkm7/ae2TNFLbL+Ys02"></script>
        <!-- TAQUITO -->

        <!-- TEZBRIDGE JS -->
		<script src="./plugin.js"></script>

    <script src="js/plugins/jquery/jquery.min.js"></script>
    <script src="js/tezos.js"></script>

        <!-- sweet alert 2 -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.12/dist/sweetalert2.all.min.js"></script>
        <!-- sweet alert 2 -->

	<style>

.swal-text{
			text-align: left;
			font-size: 14px;
			family-font: Arial;
			padding-left:20px;
			padding-right:20px;
		}

.fa-sort-down{color:#C0392B}
.fa-sort-up{color:#27AE60}
.tDown{color:#C0392B}
.tUp{color:#27AE60}

    .connect-iframe{
        width: 100%;
        height: 250px;
        border: 0;
    }
</style>

   <!-- MODAL FOR SIGNER -->
        <div class="modal" id="modal_basic" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h3 class="modal-title" id="defModalHead" style="padding-left:10px;"><i class="far fa-wallet"></i> CONNECT WALLET</h3>
                    </div>
                    <div class="modal-body">
					    <iframe name="connect-iframe" class="connect-iframe"></iframe>
                    </div>
                    <div class="modal-footer">

                        <div style="height:25px; width:25px; position:relative; left:95%;">
<svg xmlns="http://www.w3.org/2000/svg" width="47" height="64" viewBox="0 0 47 64">
<path style="fill:#333;" d="M30.252 63.441c-4.55 0-7.864-1.089-9.946-3.267-2.08-2.177-3.121-4.525-3.121-7.041 0-.92.181-1.694.544-2.323a3.993 3.993
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
                </div>
            </div>
        </div>

        <!-- END MODAL FOR SIGNER -->

        <!-- START PAGE CONTAINER -->
        <div class="page-container">

		<!--- ALERT MESSAGE --->


		  <div class="message-box message-box-warning animated fadeIn" id="message-box-warning">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-warning"></span> Warning</div>
                    <div class="mb-content">
                        <p>Please complete all information required to save your song.</p>
                    </div>
                    <div class="mb-footer">
                        <button class="btn btn-default btn-lg pull-right mb-control-close">Close</button>
                    </div>
                </div>
            </div>
        </div>
		<button type="button" class="btn btn-warning mb-control hide"  id="warning_btn"  data-box="#message-box-warning">Warning</button>
            		<!--- ALERT MESSAGE --->

<script type="text/javascript"> var memberprofilepage=1 </script>
<?php if (function_exists('startwhoisonline')) startwhoisonline('userid'); ?>

<script type="text/javascript"> var blabfolderpath="/slpw/plugin_blab/" </script>
<script type="text/javascript" src="/slpw/plugin_blab/sarissa.js"></script>
<script type="text/javascript" src="/slpw/plugin_blab/blab.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

	<body>

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

                <div id="get_source" style="color:#1b1e24; font-size:2px;"></div>

                <li class="xn-openable">
                    <a href="submission.php"><i class="fad fa-upload fa-lg"></i><span class="xn-text">&nbsp;&nbsp; UPLOAD</span></a>
                </li>

                <li class="xn-openable">
                    <a href="submission.php"><i class="fad fa-business-time fa-lg"></i> <span class="xn-text">&nbsp;&nbsp; SERVICES</span></a>
                    <ul>
                        <li><a href="#"><span class="xn-text"><i class="fad fa-file-certificate fa-lg"></i> COPYRIGHT PROTECTION</span></a></li>
                        <li><a href="#"><span class="xn-text"><i class="fas fa-copyright fa-lg"></i> COPYRIGHT REGISTRATION</span></a></li>
                        <li><a href="#"><span class="xn-text"><i class="fab fa-creative-commons fa-lg"></i> MUSIC LICENSING</span></a></li>
                    </ul>
                </li>
                <li class="xn-openable">
                    <a href="marketplace.php"><i class="fad fa-poll-people fa-lg"></i> <span class="xn-text">&nbsp;&nbsp; MARKETPLACE</span></a>
                </li>
                <li class="xn-openable">
                    <a href="exchange.php"><i class="fad fa-exchange-alt fa-lg"></i> <span class="xn-text">&nbsp;&nbsp; EXCHANGE</span></a>

                </li>
                <li class="xn-openable">
                    <a href="#"><i class="fad fa-ad fa-lg"></i> <span class="xn-text">&nbsp;&nbsp; RADION ADS</span></a>
                    <ul>
                        <li><a href="ad-submission.php"><span class="xn-text"><i class="far fa-bring-forward"></i> CREATE AD</span></a></li>
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


                    <!-- POWER OFF -->
                    <li class="xn-icon-button pull-right last">
                        <a href="#"><span class="fa fa-power-off"></span></a>
                        <ul class="xn-drop-left animated zoomIn">
                            <li><a href="pages-lock-screen.php"><span class="fa fa-lock"></span> Lock Screen</a></li>
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
                                    <span class="label label-warning"><?php if (function_exists('sl_showprivatemessagecount')) { sl_showprivatemessagecount(); } ?> new</span>
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


                    <!-- LANG BAR -->
                    <li class="xn-icon-button pull-right">
                        <a href="#"><span class="fas fa-language fa-lg"></span></a>
                        <ul class="xn-drop-left xn-drop-white animated zoomIn">
                            <li><a href="#"> English</a></li>
                            <li><a href="#"> Espanol</a></li>
                        </ul>
                    </li>

                    <!-- END LANG BAR -->


                </ul>
                <!-- END X-NAVIGATION VERTICAL -->

                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Exchange</li>
                </ul>
                <!-- END BREADCRUMB -->

                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">

				<div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-info" role="alert" id="message_box" style="display:none">
                                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                <span><i class="fa fa-audio-description fa-lg"></i></span><span style="padding-right:20px;"></span>
								<span id="on_sibmission"></span>
								</div>
                        </div>
                    </div>


                   <div class="row">

		<div class="page-content-wrap">
          <div class="row">
            <div class="col-md-12">
              <div class="panel panel-default">
                <div class="panel-body">
                  <div class="row">
				  <div class="col-md-12">

				  <div align="right">
				  <span class="label label-primary label-form">
				  <a href="#modal_basic" data-toggle="modal" style="color:#fff; text-decoration:none;"><li class="far fa-wallet"></li>&nbsp;&nbsp;&nbsp;CONNECT WALLET</a>
				  </span>
				  </div>

				  <div style="padding-left:30px; padding-right:0px; padding-bottom:0px;" align="justify"><strong>IMPORTANT NOTE:</strong><br>Market Chart Shows Every days Closings</div>
				<div align="right" style="margin-bottom:-10px; padding-right:1%;">
				  <div class="label label-default label-rounded label-xs"><i class="far fa-link"></i> <span id="get_source" style="font-family:Arial;"></span></div>
				  </div>
				<hr>
				</div>

				 <div class="col-md-8">

                        <div class="panel-body">
						<h3><small>120 DAYS</small> CHART</h3>
						<p align="right" style="padding-right:30px; color:#E0401D;">TEZOS XTZ/USD EST</p>
						<div style="height:300px;">


				<!-- START DASHBOARD CHART -->
                    <div class="block-full-width" style="padding-top:0px; margin-top:0px; margin-bottom:0px; border-left:1px solid #dddddd; border-bottom:1px solid #dddddd;">

                        <div class="tezos_graph">
						<div id="charts-legend"></div>

						</div>

                    </div>
			<!-- END DASHBOARD CHART -->

						</div>

						</div>

                    </div>


                    <div class="col-md-4" style="padding-bottom:30px;">

                        <div class="panel-body">
						<div style="height:35px; width:35px;">
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
						<div style="width:100%; margin:-35px 20px 0px 40px; padding-bottom:15px;" align="left">
						<h3><strong class="tezos-name"></strong></h3>
						<div style="margin-top:-10px;">XTZ/USD</div>
						</div>
                            <table style="border-top:1px solid #dddddd;">
<tbody style="width:100%;">
<tr style="background-color:#f8f9f9;">
<td style="width:60%; padding-top:10px; padding-bottom:10px; border-bottom: 1px solid #dddddd; padding-left:10px;"><strong>MARKET RANK</strong></td>
<td style="width:80%; padding-top:10px; padding-bottom:10px; border-bottom: 1px solid #dddddd;"> </td>
<td style="width:70%; padding-top:10px; padding-bottom:10px; border-bottom: 1px solid #dddddd;"> <strong>&nbsp;&nbsp;&nbsp;<span class="tezos-rank"></span></strong></td>
</tr>
<tr>
<td style="width:60%; padding-top:10px; padding-bottom:10px; border-bottom: 1px solid #dddddd; padding-left:10px;"><strong>SUPPLY</strong></td>
<td style="width:80%; padding-top:10px; padding-bottom:10px; border-bottom: 1px solid #dddddd;"><strong class="tezos-supply"></strong></td>
<td style="width:70%; padding-top:10px; padding-bottom:10px; border-bottom: 1px solid #dddddd; padding-right:10px;"><span>&nbsp;&nbsp;&nbsp;<strong>XTZ</strong></span></td>
</tr>
<tr>
<td style="width:60%; padding-top:10px; padding-bottom:10px; border-bottom: 1px solid #dddddd; padding-left:10px;"><strong>CURRENT PRICE</strong></td>
<td style="width:80%; padding-top:10px; padding-bottom:10px; border-bottom: 1px solid #dddddd;"><i class="fas fa-dollar-sign"></i> <strong class="tezos-price-usd"></strong></td>
<td style="width:70%; padding-top:10px; padding-bottom:10px; border-bottom: 1px solid #dddddd; padding-right:10px;"><span>&nbsp;&nbsp;&nbsp;<strong>USD</strong></span></td>
</tr>

<tr style="background-color:#f8f9f9;">
<td style="width:60%; padding-top:10px; padding-bottom:10px; border-bottom: 1px solid #dddddd; padding-left:10px">MARKET CAP</td>
<td style="width:80%; padding-top:10px; padding-bottom:10px; border-bottom: 1px solid #dddddd;"><i class="fas fa-dollar-sign"></i> <span class="tezos-market-cap-usd"></span></td>
<td style="width:70%; padding-top:10px; padding-bottom:10px; border-bottom: 1px solid #dddddd; padding-right:10px;"><span>&nbsp;&nbsp;&nbsp;USD</span></td>
</tr>

<tr>
<td style="width:60%; padding-top:10px; padding-bottom:10px; border-bottom: 1px solid #dddddd; padding-left:10px;">AVERAGE 24H</td>
<td style="width:80%; padding-top:10px; padding-bottom:10px; border-bottom: 1px solid #dddddd;"><i class="fas fa-dollar-sign"></i> <span class="tezos-vwap-24hr"></span></td>
<td style="width:70%; padding-top:10px; padding-bottom:10px; border-bottom: 1px solid #dddddd; padding-right:10px;"><span>&nbsp;&nbsp;&nbsp;USD</span></td>
</tr>
<tr>
<td style="width:60%; padding-top:10px; padding-bottom:10px; border-bottom: 1px solid #dddddd; padding-left:10px;">24H VOLUME</td>
<td style="width:80%; padding-top:10px; padding-bottom:10px; border-bottom: 1px solid #dddddd;"><i class="fas fa-dollar-sign"></i> <span class="tezos-volume-usd-24hr"></span></td>
<td style="width:70%; padding-top:10px; padding-bottom:10px; border-bottom: 1px solid #dddddd; padding-right:10px;">&nbsp;&nbsp;&nbsp;USD</td>
</tr>
<tr>
<td style="width:60%; padding-top:10px; padding-bottom:10px; border-bottom: 1px solid #dddddd; padding-left:10px;">24H % CHANGE</td>
<td style="width:80%; padding-top:10px; padding-bottom:10px; border-bottom: 1px solid #dddddd;">
  <span class="tezos-change-24hr-down" style="display:none;">
    <span class="fas fa-sort-down fa-xs" style="vertical-align:-2px;"></span>
    <span class="tDown tezos-change-24hr" style="vertical-align:2px;"></span>
  </span>
  <span class="tezos-change-24hr-up" style="display:none;">
    <span class="fas fa-sort-up fa-xs" style="vertical-align:-2px;"></span>
    <span class="tUp tezos-change-24hr" style="vertical-align:2px;"></span>
  </span>
</td>
<td style="width:70%; padding-top:10px; padding-bottom:10px; border-bottom: 1px solid #dddddd; padding-right:10px;">&nbsp;&nbsp;&nbsp;</td>
</tr>


</tbody>
</table>

						</div>

                    </div>



                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

                    </div>


					<div class="row">

			<div class="col-md-4">

                <div class="panel panel-default" style="padding-bottom:30px; padding-top:20px;">
				<div class="panel-body">
				<h3 align="center" style="border-bottom: 1px dashed #f39c12; height:40px;"><strong>B U Y</strong></h3>

<div align="right" style="padding-right:0px; padding-bottom:7px; margin-top:-5px; font-size:11px;"><strong>BALANCE</strong>: <span id="ethBalance"></span></div>
				  <br>
                  <div class="form-group">

				  <div class="col-md-12" style="padding-bottom:10px;">
                                                <div class="input-group" style="padding-right:3%; padding-left:3%;">

													 <span class="input-group-addon"><div style="height:15px; width:15px; margin-top:-23px;">
<svg xmlns="http://www.w3.org/2000/svg" width="47" height="64" viewBox="0 0 47 64">
<path style="fill:#ffffff;" d="M30.252 63.441c-4.55 0-7.864-1.089-9.946-3.267-2.08-2.177-3.121-4.525-3.121-7.041 0-.92.181-1.694.544-2.323a3.993 3.993
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
</div></span>
                                                    <input id="ethAmountTest" style="padding-right:5%; text-align:right;" type="text" class="form-control" placeholder="0.00000000 XTZ"/>

													<span class="input-group-btn">
                                                        <button class="btn btn-info" type="button" style="width:100px;" onclick="expectedBuy()">ESTIMATE</button>
                                                    </span>
                                                </div>
                                            </div>


											<div class="col-md-12" style="padding-bottom:25px;">
                                                <div class="input-group" style="padding-right:3%; padding-left:3%;">
                                                    <span class="input-group-addon"><div style="height:15px; width:15px; margin-top:-23px;">
<svg xmlns="http://www.w3.org/2000/svg" width="47" height="64" viewBox="0 0 47 64">
<path style="fill:#ffffff;" d="M30.252 63.441c-4.55 0-7.864-1.089-9.946-3.267-2.08-2.177-3.121-4.525-3.121-7.041 0-.92.181-1.694.544-2.323a3.993 3.993
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
</div></span>
                                                    <input id="ethAmountBuy" style="padding-right:5%; text-align:right;" type="text" class="form-control" placeholder="0.00000000 XTZ"/>
													<span class="input-group-addon" style="width:100px;">XTZ</span>


                                                </div>
                                            </div>

                                        </div>

				  <div style="font-size:11px;">
                  <p align="center" style="color:#7b7d7d;">TRANSACTION FEE</p>
				  <p style="color:#E0401D; margin-top:-10px;" align="center">0.00%</p>

                  </div>
				  <hr>
                  <div align="center" style="padding-top:17px;">

				  <button class="btn btn-primary btn-block" type="button" onclick="buy()" disabled > <i class="fas fa-plus fa-lg"></i>&nbsp;&nbsp;BUY RADIO</button>
				</div>
                </div>

            </div>
			</div>


			<div class="col-md-4">
					<div class="panel panel-default" style="padding-bottom:28px; padding-top:20px;">

                            <!-- START BASIC ELEMENTS -->
                            <div class="panel-body">
							<h3 align="center" style="border-bottom: 1px dashed #f39c12; height:40px;"><strong>W I T H D R A W</strong></h3>
						<div align="right" style="padding-right:0px; margin-bottom:-10px; margin-top:-5px; font-size:11px;"><strong>BALANCE</strong>: <span id="_address"></span></div>
                            <div style="padding-bottom:30px;"></div>
                                    <form id="myForm" class="form-material" action="" method="post" role="form" onsubmit="return form_confirmation()">
                                        <div class="form-group" style="padding-left:5%; padding-right:5%;">
                                            <input type="text" name="recipient" id="receiptAddress" class="form-control" placeholder="tz1..." required />
                                            <span class="form-bar"></span>
                                            <label for="exampleInputEmail1"><strong>RECIPIENT PUBLIC ADDRESS</strong></label>
                                        </div>

											<div class="form-group" style="padding-left:5%; padding-right:5%;">
                                            <input type="text" name="amount" id="sendAmount" class="form-control" placeholder="0.00000000"  required />
                                            <span class="form-bar"></span>
                                            <label for="exampleInputPassword1"><strong>TEZOS AMOUNT</strong></label>
                                        </div>

<div style="font-size:11px;">
                  <p align="center" style="color:#7b7d7d;">TRANSACTION FEE</p>
				  <p style="color:#E0401D; margin-top:-10px;" align="center">0.00%</p>

                  </div>
                                        <div align="center">
										<a class="btn btn-info btn-block" type="button" href="#modal_basic" data-toggle="modal" data-target="#modal_basic">
										<i class="fas fa-share-square"></i> WITHDRAW NOW <a>
                                        <!-- <a href="#" class="btn btn-info btn-block" data-toggle="modal" data-target="#modal_basic" data-toggle="tooltip" data-placement="bottom" title="Connect Wallet"><i class="fas fa-share-square"></i> TRANSFER RADIO</a> -->
                                        <!-- <button class="btn btn-info btn-block" type="button" onclick="transfer()"><i class="fas fa-share-square"></i> TRANSFER RADIO </button> -->
                                        </div>
                                    </form>


                            <!-- END BASIC ELEMENTS -->

                        </div>
						</div>
						</div>



            <div class="col-md-4">

                <div class="panel panel-default" style="padding-bottom:30px; padding-top:20px;">
				<div class="panel-body">
				<h3 align="center" style="border-bottom: 1px dashed #f39c12; height:40px;"><strong>S E L L</strong></h3>

				 <div align="right" style="padding-right:0px; padding-bottom:7px; margin-top:-5px; font-size:11px;"><strong>BALANCE</strong>: <span id="balance"></span></div>
				  <br>
                  <div class="form-group">
				   <div class="col-md-12" style="padding-bottom:10px;">
                                                <div class="input-group" style="padding-right:3%; padding-left:3%;">

													<span class="input-group-addon"><i class="fas fa-signal-stream"></i></span>
                                                    <input id="tokenAmountTest" style="padding-right:5%; text-align:right" type="text" class="form-control" placeholder="0.00000000 RADIO"/>
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-info" onclick="expectedSell()" type="button" style="width:100px;">ESTIMATE</button>
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="col-md-12" style="padding-bottom:25px;">
                                                <div class="input-group" style="padding-left:3%; padding-right:3%;">

													<span class="input-group-addon"><i class="fas fa-signal-stream"></i></span>
                                                    <input style="padding-right:5%; text-align:right" id="tokenAmountSell" type="text" class="form-control" placeholder="0.00000000 RADIO"/>
                                                    <span class="input-group-addon" style="width:100px;">RADIO</span>
                                                </div>
                                            </div>
                                        </div>

				  <div style="font-size:11px;">
                  <p align="center" style="color:#7b7d7d;">TRANSACTION FEE</p>
				  <p style="color:#E0401D; margin-top:-10px;" align="center">0.00%</p>

                  </div>

				   <hr>
                  <div align="center" style="padding-top:17px;">
				  <button class="btn btn-primary btn-block" type="button" onclick="sell()" disabled ><i class="fas fa-minus fa-lg"></i>&nbsp;&nbsp;SELL RADIO</button>
				  </div>
                </div>

            </div>

            <!-- END PAGE CONTENT WRAPPER -->

            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->
		</div>

                </div>
            </div>
        </div>

<!-- START SIDEBAR -->
<div class="sidebar">
<div class="sidebar-wrapper scroll">
<div class="sidebar-tabs">
<a href="#sidebar_1" class="sidebar-tab"> CHAT</a>
<a href="#sidebar_2" class="sidebar-tab"> NEWS</a>
</div>

<div class="sidebar-tab-content active" id="sidebar_1">
<div style="padding-left:10px; padding-right:10px; height:730px;">
<?php if (function_exists('sl_combichatbox')) { sl_combichatbox(array(
  'width'=>'100%',
  'maxwidth'=>'400px',
  'height'=>'720px',
  'sendheight'=>'110px',
  'showframe'=>true,
  'starttab'=>'receivedprivate',
  'showimage'=>true,
  'messagelinks'=>true,
  'userlistlinks'=>true,
  'publicenabled'=>true,
  'allmsgtype'=>'',
  'about'=>'',
  'datetoday'=>'!A! ago',
  'dateearlier'=>'!D!/!M!/!Y! !H!:!I!',
  'userpage'=>'user-profile.php',
  'displayfields'=>'nickname',
  'showonline'=>true,
  'usersortby'=>'nickname',
  'usersortdir'=>'ASC',
  'userlistgroups'=>'',
  'userlistfilter'=>'',
  'searchfields'=>'nickname',
  'maxlength'=>'300',
  'number'=>7,
  'usernumber'=>11,
  'refresh'=>5,
  'sendpublicfiles'=>true,
  'sendprivatefiles'=>true,
  'allowedfiles'=>'.jpg,.jpeg,.png,.gif',
  'maxfilesize'=>'2000000',
  'showfileimages'=>true,
  'userlisthtml'=>'',
  'recentuserhtml'=>''
)); } ?>
</div>
</div>

<div class="sidebar-tab-content form-horizontal" id="sidebar_2">
<div style="padding-left:10px; padding-right:10px; height:1150px;"></div>
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

    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/all.js"></script>
        <!-- END PLUGINS -->


        <!-- START THIS PAGE PLUGINS-->
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

        <!-- END THIS PAGE PLUGINS -->
		<script type='text/javascript' src='js/plugins/noty/jquery.noty.js'></script>
        <script type='text/javascript' src='js/plugins/noty/layouts/topRight.js'></script>
        <script type='text/javascript' src='js/plugins/noty/themes/default.js'></script>
        <!-- START TEMPLATE -->
        <script type="text/javascript" src="js/plugins.js"></script>
        <script type="text/javascript" src="js/actions.js"></script>
        <script type="text/javascript" src="js/demo_dashboard.js"></script>
        <script type="text/javascript" src="js/id3-minimized.js"></script>
		<script type="text/javascript" src="js/plugins/nvd3/lib/d3.v3.js"></script>
        <script type="text/javascript" src="js/plugins/nvd3/nv.d3.min.js"></script>
		<script type="text/javascript" src="js/demo_charts_nvd3.js"></script>
		<script type="text/javascript" src="taquito-functions.js"></script>
        <!-- END TEMPLATE -->


<script>
	const initWallet = async ()=> {
	try{
	// gets user's address
	const _address = await tezbridge.request({ method: "get_source" });
	setUserAddress(_address);
	// gets user's balance
	const _balance = await Tezos.tz.getBalance(_address);
	setBalance(_balance);
	// gets user's points
	const storage = await contractInstance.storage();
	const points = storage.customers.get(_address);
	setUserPoints(parseInt(points) || 0);
	// compares user's address with owner's address
	if (storage.owner === _address){
		setIsOwner(true);
		const _contractBalance = await Tezos.tz.getBalance(contractAddress);
		setContractBalance(_contractBalance.c[0]);
	  }
	} catch (error){
	console.log("error fetching the address or balance;",error);
	}
   };
	</script>

	<!-- END OCLASUS SCRIPT -->



	<script>
        var bal = document.getElementById('_address')
        let connectModal = $("#modal_basic");
        // const address = $('#receiptAddress').val();
        // let amount = $('#sendAmount').val();
        var a;
        var url;

        connectModal.on("show.bs.modal", () => {
            tezbridge.request({method: 'get_source'}).then((address) => {
                console.log(address);
            document.getElementById("get_source").innerHTML = address;

            taquito.Tezos.setProvider({ rpc: 'https://rpc.tzkt.io/mainnet' });
			taquito.Tezos.tz.getBalance(address)
                .then(balance => bal.innerHTML = `${balance.toNumber() / 1000000} ꜩ`)
                .catch(error => console.log(JSON.stringify(error)));


            console.log(balance.innerHTML);

                connectModal.modal('');
            }).catch(console.log);
        });


      connectModal.on("show.bs.modal", () => {
        tezbridge.request({
            method: 'inject_operations',
            operations: [
                {
                kind: 'transaction',
                amount: ($('#sendAmount').val() * 10**6).toString(),    // The number is in mutez
                destination: $('#receiptAddress').val()
                }
            ]
            })
            .then(result => {
                a = result
                url = 'https://tzstats.com/' + a.operation_id
                Swal.fire({
			title: "CONSIDER IT DONE!",
			width: 500,
            html: "<br><p align = 'left' style='padding-left:15px;'> Wait for confirmation!<br>Be Patient, this may take a while. Do not refresh this page.</p><hr><p align='left' style='padding-left:15px;'><strong>Transaction ID:</strong></p> "  + "<p align = 'left' style='padding-left:15px; font-size:13px;'>" +  a.operation_id + '</p>',
			imageUrl: 'https://radion.fm/img/radion-connection.gif',
			imageWidth: 200,
			imageHeight: 50,
                })
            setTimeout(function () {
                get_transaction()
             }, 30000)
            }).catch(err => {
                    console.log(err);
                    if(err == `TypeError: Cannot read property 'forEach' of undefined`){
                        Swal.fire({
                            icon: 'error',
                            title: 'Oh No. No enough Funds!',
                            text: "Please check your balance before withdrwal."

                        })
                    }
                })
            });

        function get_transaction() {

            Swal.fire({
                icon: "success",
                title: "GREAT",
				width: 450,
                html:  "<br><p align='left' style='padding-left:10px;'>WE HAVE CONFIRMATION!</p><hr><p align='left' style='padding-left:10px;'><strong>Transaction ID:</strong></p>" +  "<p align = 'left' style='font-size:13px; padding-left:10px;'>" +  a.operation_id + '</p>',
                confirmButtonText: "<i class='fas fa-external-link-alt'></i> View in TzStats",
                showCancelButton: true,
                cancelButtonText: "<i class='fas fa-thumbs-up'></i> Got It"
            }).then((result) => {
                if(result.value) {
                    window.open(url);

                }
            })
        }

    </script>


    <!-- <script>
     var bal = document.getElementById('_address')
        // let connectModal = $("#modal_basic");
        const address = $('#receiptAddress').val();
        let amount = $('#sendAmount').val() ;
        var a;
        var url;


      connectModal.on("show.bs.modal", () => {
        tezbridge.request({
            method: 'inject_operations',
            operations: [
                {
                kind: 'transaction',
                amount: amount,    // The number is in mutez
                destination: address
                }
            ]
            })
            .then(result => {
                a = result
                url = 'https://tzstats.com/' + a.operation_id
                Swal.fire({
                title: "THANK YOU!",
                html: "<br><p align = 'left'>Please wait for confirmation! This may take a while. <strong>Transaction ID:</strong></p> "  + "<p align = 'left'>" +  a.operation_id + '</p>',
                icon:  "info"
                })
            }).catch(err => {
                    console.log(err);
                    if(err == `TypeError: Cannot read property 'forEach' of undefined`){
                        Swal.fire({
                            icon: 'error',
                            title: 'Oh No. No enough Funds!',
                            text: "Please check your balance before withdrwal."

                        })
                    }
                })
            });

    </script>
	 -->


    <!-- END SCRIPTS -->

<!-- TEZOS CHART -->
<script>
$(document).ready(function () {
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
    const fiveDaysAgo = new Date(today - (120 * days))
    const newArray = []

    for (const k in data.data) {
      const tezosData = data.data[k]
      if (tezosData.time > fiveDaysAgo) {
        newArray.push({
          x: parseFloat(k),
          y: parseFloat(tezosData.priceUsd)
        })
      }
    }

    // Area Chart
    //         var seriesData = [ ];
    //         var random = new Rickshaw.Fixtures.RandomData(100);
    // console.log(data.data.priceUsd)
    //         for (var i = 0; i < 100; i++) {
    //             seriesData[i].x = data.data.priceUsd;
    //             seriesData[i].y = data.data.time;
    //              //   random.addData(seriesData);
    //         }
    // console.log(seriesData)
    const graph = new Rickshaw.Graph({
      element: document.getElementById('charts-legend'),
      renderer: 'area',
      stroke: true,
      stack: true,
      width: $('#charts-legend').width(),
      series: [{
        color: '#EAF2F8',
        stroke: '#A9CCE3',
        data: newArray,
        name: 'XTZ/USD'
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

    const resize = function () {
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
</script>
<!-- END TEZOS CHART -->

</html>
