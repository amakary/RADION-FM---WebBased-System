<?php
$groupswithaccess="RADIONER,CEO,FOUNDER";
require_once "slpw/sitelokpw.php";
require_once "slpw/slconfig.php";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- META SECTION -->
        <title>RADION FM - Lobby</title>
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

        <!-- EOF CSS INCLUDE -->


    </head>
    <body>

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
        <div class="profile" data-step="1" data-intro="This is the head of your sidebar main menu where you will be able to see your avatar or picture of your profile. There are two importat icons that we have to go over! The right icon is used to edit your profile, the other is to see your public profile." data-position="right">
            <div class="profile-image">
                <img src="<?php siteloklink($slcustom2, 0); ?>" alt="" />
            </div>
            <div class="profile-data">
                <div class="profile-data-name"><?php echo $slusername; ?></div>
                <div class="profile-data-title"><?php echo $slusergroups; ?></div>
            </div>
            <div class="profile-controls">
                <a href="#" class="profile-control-left sidebar-toggle" data-step="3" data-intro="Public Profile. This icon will take you to your public profile page. This page show you how others sees your profile." data-position="right"><i class="far fa-comment-alt-lines"></i></a>
                <a href="edit-profile.php" class="profile-control-right" data-step="2" data-intro="Edit Profile. This icon will take you to the page where you can edit your profile." data-position="right"><i class="fad fa-user-edit"></i></a>
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
        <li><a href="marketplace.php"><span class="xn-text"><i class="fad fa-poll-people fa-lg"></i>&nbsp;&nbsp; VOTE ROOM</span></a></li>
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
                            <h3 class="panel-title"><i class="fad fa-bell-on"></i> Notifications</h3>
                            <div class="pull-right">
                                <span class="label label-danger"><?php if (function_exists('sl_showprivatemessagecount')) {
                                                                        sl_showprivatemessagecount();
                                                                    } ?> new</span>
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


                <!-- LANGUAGE BAR -->
                <li class="xn-icon-button pull-right">
                    <a href="#"><i class="fad fa-language fa-lg"></i></a>
                    <ul class="xn-drop-left xn-drop-white animated zoomIn">

                        <li><a href="#"><img src="/img/flags/us.png" style="height:20px; width:20px;">&nbsp &nbsp English</a></li>
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
                                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                <span><i class="fa fa-audio-description fa-lg"></i></span><span style="padding-right:20px;"></span>
								<span id="on_sibmission">RADION is always active in Social Media! If you want to be updated with our progress, we recommend you to follow us in our <a href="https://web.telegram.org/#/im?p=@radion_project" target="blank">Telegram</a> Group.</span>
								</div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-12">
              <div class="panel panel-default">
                <div class="panel-body">
                  <div class="row">

                    <div class="col-md-8">
				<h3><i class="fas fa-door-open"></i> LOBBY! </h3>
				<hr>
        <div align="right" style="margin:15px;">
        <button onclick="introJs().start();" class="btn btn-info btn-block">CLICK HERE FOR ORIENTATION!</button>
      </div>
      <!--
data-step="1" data-intro="" data-position="right"
-->
                      <div class="row">

                        <div class="col-md-12" style="paddin-bottom:200px;">

                        <p align="justify"><small><strong>WELCOME TO RADION FM</strong></small></p>
						<p align="justify"><small>We are very exciting to have you as a new member.
						In this platform you will find tools that helps you to expose your talent and introduce your music to the crypto community. Individuals from all over the world that appreciate music
            without all this red tape that corporate music industry has established in this business model for years. We keep it simple! We let music lovers to decide what they like and what they
            don't, who can become popular in a particular music genre and gain more followers for their talent. We let the user arbitrate the streams and network of our platform by votes.
            Musicians in the other hand benefit from our platform, if they want to sell their music by downloads or NFT. We allow them to create NFT to prove that they are copyright holders with a record
            in blockchain, we also allow them to mint NFT if they want to sell limited editions of their albums and keep the copyrights.
            <br><br>We strive for decentralization and crypto! Perhaps these words doesn't mean anything to you at the moment, but we can ensure you that you will appreacite these words as you
            get more familiar with our platform.
						<br><br>You may wonder, what this means to you and to your music career? Well, let's put it in perspective! No payment delays, no percentage to pay for distribution or promotion, no
            commitments, just keep doing what you love and create more music for your audience. RADION doesn't collect royalties per download, neither charge a fees or commission, the revenue goes
             straight to your wallet if someone download your songs. We attach corresponding music licensing for each assets to protect artist and prevent copyrights infrigments.
						</small></p>
<hr>

						 <!-- START ACCORDION -->
                            <div class="panel-group accordion">
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a href="#accOneColOne">
                                                <i class="fad fa-layer-plus"></i>&nbsp;&nbsp;HOW IT WORKS?
                                            </a>
                                        </h4>
                                    </div>
                                    <div class="panel-body panel-body" id="accOneColOne" align="justify">
                                      Simple! Let's say you upload a song and someone likes it and want to download it. He/she has to pay $1 USD worth of tez (XTZ) in order to download your song, these funds goes straight to your crypto wallet as
                                      soon as the transaction is confirmed in the blockchain. It is important to mention that we don't take a percentage from this transaction or charge a commission attached for this service.
                                      This is a pure peer to peer transaction between artists and music lovers.
                                    </div>
                                </div>
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a href="#accOneColTwo">
                                                <i class="fad fa-layer-plus"></i>&nbsp;&nbsp;DO I NEED COPYRIGHTS?
                                            </a>
                                        </h4>
                                    </div>
                                    <div class="panel-body" id="accOneColTwo" align="justify">
                                      No. As long as you are the rights holder of the asset (song), you are fine. However, moderators can check copyright infrigments. In other words; if a moderator audit your assets and find out
                                      that your submission was illicit, he/she can report your infrigment and we reserve the right to terminate your account immediately. Moderators are motivated by tez (XTZ), the same
                                      cryptocurrency that you get pay when someone download your songs. In order to prevent this kind of stream actions from us; we encourage you to act upon good faith to keep an healty
                                      ecosystem. Don't put our trust on risk for a couple of dollars, is not worth it.<br><br> If you don't trust the methods that our system offers, or perhaps you sense a level of informality
                                      in our process and you don't feel confidant yet and prefer the traditional method that the music industry works with a legal contracts, we are exciting to share one of our exclusive
                                      service called; "NFT for exclusive rights" and ISRC assignment. We also work with Creative Common Licensing to protect you from plagiarism or unauthorized use of your asset.
                                    </div>
                                </div>
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a href="#accOneColThree">
                                                <i class="fad fa-layer-plus"></i>&nbsp;&nbsp;WHEN I GET PAID?
                                            </a>
                                        </h4>
                                    </div>
                                    <div class="panel-body" id="accOneColThree" align="justify">
                                    Every time someone download your song! We don't use custodian wallets! Meaning; we do not store private key in our servers and so when you create you account make sure
                                    that you write down your secret keys and seed words in a paper. Unless, you are using a third party wallet and you already have your public keys. If this
                                    is the case; then you need to connect your wallet (kukai, temple, or galleon) to have your account and receive payments.
                                    </div>
                                </div>
								<div class="panel panel-info">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a href="#accOneColFourth">
                                                <i class="fad fa-layer-plus"></i>&nbsp;&nbsp;WHAT DO I NEED?
                                            </a>
                                        </h4>
                                    </div>
                                    <div class="panel-body" id="accOneColFourth" align="justify">
                                    YOU NEED A FEW THINGS TO START! <br><br>
									<li>Update your profile with accurate information.</li>
									<li>Have a Digital Asset/Song with (MP3 and WAV) format.</li>
									<li>Have a Tezos Wallet.</li>
									<li>Get some tez (XTZ) in your wallet in case you want to sell your music as NFT limited editions and get paid.</li>

                                    </div>
                                </div>
								<div class="panel panel-info">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a href="#accOneColFifth">
                                                <i class="fad fa-layer-plus"></i>&nbsp;&nbsp;WHAT IS TEZOS?
                                            </a>
                                        </h4>
                                    </div>
                                    <div class="panel-body" id="accOneColFifth" align="justify">
                                    <a href="https://tezos.com/get-started">Tezos</a> is an open-source protocol for assets and applications that can evolve by upgrading itself. Stakeholders govern upgrades to the core protocol, including upgrades to the amendment process itself. This is a great deal for us! Because; thanks to this protocol we are able to create tools to decrease the disparity in exposure between corporate music and new music.

                                    </div>
                                </div>
                            </div>
                            <!-- END ACCORDION -->


                            <hr>

                            <h3>RADION COMMERCIAL</h3>
                            <br>
                            <br>
                            <div align="center">
                            <iframe width="616" height="346" src="https://www.youtube.com/embed/KuL9ZppXvq4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                              </div>
                                </div>
                                  </div>
					                           </div>

<div class="col-md-4">

<!-- START WIZARD WITH VALIDATION -->
<div class="panel panel-default" align="center">

<div class="panel-body">

  <h4>TEZOS WALLETS</h4>

  <p align="justify"><img src="img/temple.jpg" style="height:50px; width:50px; margin-right:10px;"> <small><strong>TEMPLE WALLET</strong> -  (WEB EXTENSION FOR BROWSER)</small></p>
  <p align="justify"><small><a href="https://templewallet.com/" target="blank">Temple</a> is a cryptocurrency wallet for the Tezos blockchain as a Web Extension for your Browser.</small></p>
<br>
<p align="justify"><img src="img/kukai.jpg" style="height:50px; width:50px; margin-right:10px;"> <small><strong>KUKAI</strong> -  (WALLET)</small></p>
<p align="justify"><small><a href="https://wallet.kukai.app" target="blank">Kukai</a> is a Tezos web wallet based on three principles: Security, Community and Reliability. Import wallet · New wallet · Connect Ledger · DirectAuth.</small></p>
<br>
<p align="justify"><img src="img/AirGap.png" style="height:50px; width:50px; margin-right:10px;"> <small><strong>AirGap</strong> -  (HARDWARE WALLET)</small></p>
<p align="justify"><small><a href="https://wallet.kukai.app" target="blank">AirGap</a> is more than an ordinary hardware wallet.</small></p>
<br>
  <p align="justify"><img src="img/banner_logo.png" style="height:50px; width:50px; margin-right:10px;"> <small><strong>GALLEON</strong> -  (DESKTOP WALLET)</small></p>
  <p align="justify"><small><a href="https://cryptonomic.tech/galleon.html" target="blank">Galleon</a> is a desktop wallet frame-work for Tezos that support software and hardware wallets! You can download the software
  available for on Mac, Windows, and Linux.
</small></p>
<br>
<p align="justify"><img src="img/icon-wallet.png" style="height:50px; width:50px; margin-right:10px;"> <small><strong>RADION</strong> - (WEB WALLET)</small></p>
<p align="justify" style="padding-bottom:30px;"><small>RADION FM allows you to create your public key in the registration process in order to use it with any of the above wallets.
  RADION it's not custodian of your wallet, public key and or private keys, therefore, you have to keep your secret key and/or secret words in a safe place.</small></p>

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
        <div class="sidebar">
            <div class="sidebar-wrapper scroll">

                <div class="sidebar-tabs">
                    <a href="#sidebar_1" class="sidebar-tab"><i class="fad fa-credit-card-front"></i> "TEZOS ATM"</a>
                    <a href="#sidebar_2" class="sidebar-tab"><span class="fas fa-map-signs"></span> NEWS</a>

                </div>

                <div class="sidebar-tab-content active" id="sidebar_1">
                    <div style="padding-left:10px; padding-right:10px; height:730px;">

					<!-- START WIZARD WITH VALIDATION -->
                            <div>

							<div style="color:#33414E; width:50px; height:50px; margin-left:32%; margin-top:20px; margin-bottom:-20px;">

<svg xmlns="http://www.w3.org/2000/svg" width="47" height="64" viewBox="0 0 47 64">
<path style="fill:#2c84f7;" d="M30.252 63.441c-4.55 0-7.864-1.089-9.946-3.267-2.08-2.177-3.121-4.525-3.121-7.041 0-.92.181-1.694.544-2.323a3.993 3.993
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
<div align="center" style="margin-top:-55px;"><span><i style="color:#fff; padding-right:10px; padding-top:10px;" class="fas fa-exchange-alt fa-3x"></i></span> <span><img src="img/ON-logo.png" style="height:48px; width:48px;"></span></div>

                                <div class="panel-body">
                                    <h3 align="center" style="padding:20px; color:#fff;">SWAP XTZ FOR RADIO</h3>
                                    <form action="javascript:alert('Validated!');" role="form" class="form-horizontal" id="wizard-validation">
                                    <div class="wizard show-submit wizard-validation">
                                        <ul>
                                            <li>
                                                <a href="#step-7">
                                                    <span class="stepNumber">1</span>
                                                    <span class="stepDesc" style="color:#fff;">XTZ<br /><small>Conversion</small></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#step-8">
                                                    <span class="stepNumber">2</span>
                                                    <span class="stepDesc" style="color:#fff;">User<br /><small>Payment</small></span>
                                                </a>
                                            </li>
                                        </ul>

										<div style="padding-left:15px; margin-bottom:-10px;">

										<p style="color:#ccc; margin-bottom:-3px;"><small>Expected Exchange Rate:<span style="padding-left:50px; color:#A9CCE3;">1 USD = 0.00000 XTZ</span></small></p>
										<p style="color:#ccc; margin-bottom:-3px;"><small>Exchange Fee: <span style="padding-left:102px; color:#A9CCE3;">0.00000 XTZ</span></small></p>
										<p style="color:#ccc; margin-bottom:-3px;"><small>Network Fee: <span style="padding-left:107px; color:#A9CCE3;">0 XTZ</span></small></p>
										<p style="color:#ccc; margin-bottom:-3px;"><small>Estimate Arrival: <span style="padding-left:92px; color:#A9CCE3;">5 - 55 minutes</span></small></p>
										<hr>
										</div>


                                        <div id="step-7" style="padding-top:20px; padding-bottom:0px; height:400px;">
										<h3 style="padding-bottom:10px; color:#fff;">ENTER AMOUNT</h3>

                                            <div class="col-md-12" style="padding-bottom:15px;">
                                               <p style="margin-bottom:0px; color:#ccc;">YOU SEND</p>
                                                <div class="input-group">
													<input type="text" class="form-control" placeholder="..."/>
                                                    <span class="input-group-addon" style="background-color:#ddd; border: 1px solid #ddd; color:#333;">USD</span>
                                                </div>

                                            </div>

											<div class="col-md-12" style="padding-bottom:15px;">
                                               <p style="margin-bottom:0px; color:#ccc;">YOU GET</p>
                                                <div class="input-group">
													<input type="text" class="form-control" placeholder="..."/>
                                                    <span class="input-group-addon" style="background-color:#ddd; border: 1px solid #ddd; color:#333;">XTZ</span>
                                                </div>

                                            </div>

											<div class="col-md-12" style="padding-bottom:10px;">
											<p style="margin-bottom:0px; color:#ccc;">RECIPIENT TEZOS ADDRESS</p>
                                                <input type="text" placeholder="tz..." class="form-control"/>
                                            </div>




                                        </div>

                                        <div id="step-8" style="padding-bottom:0px; height:400px;">

										<div class="col-md-6" style="padding-bottom:20px;">
											<p style="margin-bottom:0px; color:#ccc;">NAME</p>
                                                <input type="text" placeholder="..." class="form-control"/>
                                            </div>

											<div class="col-md-6" style="padding-bottom:20px;">
											<p style="margin-bottom:0px; color:#ccc;">LAST NAME</p>
                                                <input type="text" placeholder="..." class="form-control"/>
                                            </div>

											<div class="col-md-12" style="padding-bottom:10px;">
											<p style="margin-bottom:0px; color:#ccc;">CREDIT CARD NUMBER</p>
                                                <input type="text" placeholder="..." class="form-control"/>
                                            </div>

											<div class="col-md-4" style="padding-bottom:15px;">
                                               <p style="margin-bottom:0px; color:#ccc;">EXP DATE</p>
                                                <div class="input-group">
													<input type="text" class="form-control" placeholder=".. / .."/>

                                                </div>

                                            </div>
											<div class="col-md-3" style="padding-bottom:15px;">
                                               <p style="margin-bottom:0px; color:#ccc;">CODE</p>
                                                <div class="input-group">
													<input type="text" class="form-control" placeholder="..."/>

                                                </div>

                                            </div>

											 <div class="checkbox" style="padding-left:15px; padding-bottom:10px;">
                                                <label>
                                                    <input type="checkbox" value=""/>
                                                    <small>I Agree with <a href="#">Terms of Use</a>, <a href="#">Privace Policy</a> and <a href="#">AML/KYC</a>.</small>
                                                </label>

									<div align="right" style="padding-right:15px; padding-top:10px;"><span style="padding-right:10px;">WE ACCEPT:</span>
									<i class="fab fa-cc-paypal fa-lg"></i>
									<i class="fab fa-cc-visa fa-lg"></i>
									<i class="fab fa-cc-mastercard fa-lg"></i>
									</div>

                                            </div>


                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                            <!-- END WIZARD WITH VALIDATION -->

					</div>
                </div>

                <div class="sidebar-tab-content form-horizontal" id="sidebar_2">

<div style="padding-left:30px; padding-right:30px; height:1150px;">

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
        <!-- END TEMPLATE -->




    </body>
</html>






