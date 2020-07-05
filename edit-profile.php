
<?php
$groupswithaccess="RADIONER,CEO,FOUNDER";
require_once("slpw/sitelokpw.php");
require_once("slpw/slupdateform.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>


	
        <!-- META SECTION -->
        <title>RADION - PROFILE</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
<style>
    .connect-iframe{
        width: 100%;
        height: 250px;
        border: 0;
    }
</style>
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->
        <link rel="stylesheet" type="text/css" href="css/cropper/cropper.min.css"/>
        <!--  EOF CSS INCLUDE -->        
        
        <!-- CSS INCLUDE -->  

        <link rel="stylesheet" type="text/css" id="theme" href="css/theme-dark.css"/>
		<link href="css/all.css" rel="stylesheet">
		
		
		<!-- TEZBRIDGE CSS -->
		<link rel="stylesheet" type="text/css" href="tezbridge/base.d9dce89e.css"/>
		<link rel="stylesheet" type="text/css" href="tezbridge/base.dcedc90f.css"/>
		<link rel="stylesheet" type="text/css" href="tezbridge/base.e9d1c96c.css"/>
		<link rel="stylesheet" type="text/css" href="tezbridge/base.97de024b.css"/>
		
        <!-- TEZBRIDGE JS --> 
		<script src="./plugin.js"></script>
		<script src="/tezbridge/base.3b889bf7.js"></script>
		<script src="/tezbridge/base.6ab6a587.js"></script>
		<script src="/tezbridge/base.764feec2.js"></script>
		<script src="/tezbridge/base.546361df.js"></script>
		<script src="/tezbridge/base.f14781ea.js"></script>
		
		<!-- TAQUITO -->
		<script src="https://unpkg.com/@taquito/taquito@6.1.1-beta.0/dist/taquito.min.js"></script>
		
		<script defer src="js/all.js"></script>

        <!-- QR code cdn -->
        <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/davidshimjs/qrcodejs/qrcode.min.js"></script>

        <!-- clipboard -->

        <script src="https://cdn.jsdelivr.net/clipboard.js/1.5.3/clipboard.min.js"></script>

		
<?php if (function_exists('sl_updateformhead')) sl_updateformhead(4,false); ?>	


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
                            <img src="<?php siteloklink($slcustom2,0); ?>" alt=""/>
                        </a>
                        <div class="profile">
                            <div class="profile-image">
                                <img src="<?php siteloklink($slcustom2,0); ?>" alt=""/>
                            </div>
                            <div class="profile-data">
                                <div class="profile-data-name"><?php echo $slusername; ?></div>
                                <div class="profile-data-title"><?php echo $slusergroups; ?></div>
                            </div>
                            <div class="profile-controls">
							<a href="#modal_basic" data-toggle="modal" class="profile-control-left"><i class="fas fa-wallet"></i></a>
							<a href="edit-profile.php" class="profile-control-right"><i class="fad fa-user-edit"></i></a>
                            </div>
                        </div>                                                                        
                    </li>
					

					
                    <li class="xn-title">MENU</li>
					<li class="xn-openable">
                        <a href="submission.php"><i class="fad fa-upload fa-2x"></i><span class="xn-text">&nbsp;&nbsp;UPLOAD</span></a>
                    </li>
                                       
                    <li class="xn-openable">
                        <a href="submission.php"><i class="fad fa-business-time fa-2x"></i> <span class="xn-text">&nbsp;&nbsp;SERVICES</span></a>
						<ul>
						<li><a href="#"><span class="xn-text"><i class="fad fa-file-certificate fa-lg"></i> COPYRIGHT PROTECTION</span></a></li>
						<li><a href="#"><span class="xn-text"><i class="fas fa-copyright fa-lg"></i> COPYRIGHT REGISTRATION</span></a></li>
						<li><a href="#"><span class="xn-text"><i class="fab fa-creative-commons fa-lg"></i> MUSIC LICENSING</span></a></li>
						</ul>
                    </li>
                    <li class="xn-openable">
                        <a href="marketplace.php"><i class="fad fa-head-side-headphones fa-2x"></i> <span class="xn-text">&nbsp;&nbsp;MARKETPLACE</span></a>
                    </li>                    
                    <li class="xn-openable">
                        <a href="exchange.php"><i class="fad fa-exchange-alt fa-2x"></i> <span class="xn-text">&nbsp;&nbsp;EXCHANGE</span></a>
						
                    </li> 
					<li class="xn-openable">
                        <a href="#"><i class="fad fa-megaphone fa-2x"></i> <span class="xn-text">&nbsp;&nbsp;PROMOTE</span></a>
						<ul>
						<li><a href="ad-submission.php"><span class="xn-text"><i class="fad fa-layer-plus"></i> CREATE AD</span></a></li>
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
                        <a href="#"><i class="fad fa-sign-out-alt fa-lg"></i></a>
                        <ul class="xn-drop-left animated zoomIn">
                            <li><a href="pages-lock-screen.php"><span class="fa fa-lock"></span> Lock Screen</a></li>
                            <li><a href="#" class="mb-control" data-box="#mb-signout"><span class="fas fa-sign-out-alt"></span> Sign Out</a></li>
                        </ul>                        
                    </li> 
                    <!-- END POWER OFF -->    

<!-- ALERT NOTIFICATIONS -->
                    <li class="xn-icon-button pull-right">
                        <a href="#"><i class="fad fa-bell-on fa-lg"></i></a>
                        <div class="informer informer-danger"><?php if (function_exists('sl_showprivatemessagecount')) { sl_showprivatemessagecount(); } ?></div>
                        <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fad fa-bell-on"></i> Notifications</h3>                                
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
  'allowedfiles'=>'',
  'maxfilesize'=>'',
  'showfileimages'=>true,
)); } ?>

                            </div>     
                            <div class="panel-footer text-center">
                                <a href="#">Show all messages</a>
                            </div>                            
                        </div>                        
                    </li>
                    
					<!-- ALERT NOTIFICATIONS ENDS -->						
                    
                    <!-- LANG BAR -->
                    <li class="xn-icon-button pull-right">
                        <a href="#"><i class="far fa-language fa-lg"></i></a>
                        <ul class="xn-drop-left xn-drop-white animated zoomIn">
                            <li><a href="#"><span class="flag flag-us"></span> English</a></li>
                            <li><a href="#"><span class="flag flag-es"></span> Espanol</a></li>
 
                        </ul>                        
                    </li> 
                    <!-- END LANG BAR -->
					
					
                </ul>
                <!-- END X-NAVIGATION VERTICAL -->                 
                                                               
                
                 <!-- START BREADCRUMB -->                  
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap" style="padding-top:10px;">
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-default" role="alert" id="message_box" style="display:none">
                                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                <span><i class="fa fa-audio-description fa-lg"></i></span><span style="padding-right:20px;"></span>
								<span id="ad_on_sibmission">RADION is always active in Social Media! If you want to be updated with our progress, we recommend you to follow us in our <a href="https://web.telegram.org/#/im?p=@radion_project" target="blank">Telegram</a> Group.</span>
								</div>                            
                        </div>
                    </div>
                    </div>     
                    
                    <div class="row">                        
                        <div class="col-md-6 col-sm-4 col-xs-5">
                            
                            <form action="#" class="form-horizontal">
                            <div class="panel panel-default">                                
                                <div class="panel-body" style="padding-bottom:30px;">
								
								<?php
								
									require_once('php/db.php'); 
	
			$sql2 = "SELECT Username FROM sitelok WHERE `Username`='$slusername' AND `Custom25`=1";
$wallet_available=0;
	  $result1 = mysqli_query($con,$sql2);
	  
     
      $count = mysqli_num_rows($result1);
					
 if($count > 0) {
		  $wallet_available=1;
		  
		  
	  }	
	 //  echo $sql2.":".$count ;
		//echo $count;						
								?>
							
							
									<ul class="panel-controls">
										<li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
									</ul> 

									<div style="padding-bottom:20px; padding-left:20px;"><span class="label label-default label-form"><i class="fa fa-exclamation-triangle"></i> NOTE:</span></div>
							
									<p style="padding-left:20px; padding-right:20px;" align="justify"><small>Personal information such as; Name, D.O.B, Phone Number and Email are not Public.</small>
									<hr></p>
									
                                    <h1 align="center"><span><strong><?php echo $slname; ?></strong></span></h1>
									
                                       
                                    <div class="text-center" id="user_image">
                                        <img src="<?php siteloklink($slcustom2,0); ?>" class="img-thumbnail"/>
                                    </div>                                    
                                </div>
								
								
								
								<div style="padding:20px;">
								<div align="right">
								<span class="label label-primary label-form">
								<a href="#modal_basic" data-toggle="modal" style="color:#fff; text-decoration:none;"><i class="fad fa-wallet fa-lg"></i>&nbsp;&nbsp;&nbsp;CONNECT WALLET</a>
								</span>	
								</div>								
								
								</div>
                                <div class="panel-body form-group-separated">

									<!-- New lines to prompt public address and balance -->
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Public Address</label>
										<div class="col-md-8 col-xs-7 line-height-base" style="color:#2980b9; padding-left:30px;" id="get_source">tz1</div>
										
										<a href="#modal_small" data-toggle="modal" style="color:#333;"><span align="right" class="fad fa-qrcode fa-lg" style="margin-top:25px;"></span></a>
                                    </div>
									<div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Account Balance</label>
										<div class="col-md-8 col-xs-7 line-height-base" style="color:#2980b9; padding-left:30px;" id="_address">&#42793;</div>
										<a href="#" style="color:#333;"><span align="right" class="fad fa-sack-dollar fa-lg" style="margin-top:25px;"></span></a>   
                                    </div>
									<!-- End New lines to prompt public address and balance -->

                                </div>
                            </div>
                            </form>
							
							<div class="panel panel-default form-horizontal">
                                <div class="panel-body">
                                    <h3><span class="fa fa-info-circle"></span> YOUR DATA</h3>
                                    <p>This section has more information about you.</p>
                                </div>
                                <div class="panel-body form-group-separated"> 
									
									<div class="form-group">
                                        <label class="col-md-4 col-xs-5 control-label">E-mail</label>
										<div class="col-md-8 col-xs-7 line-height-base"><?php echo $slemail; ?></div>
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-md-4 col-xs-5 control-label">Location</label>
                                        <div class="col-md-8 col-xs-7 line-height-base"><?php echo $slcustom1; ?></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 col-xs-5 control-label">Joined</label>
                                        <div class="col-md-8 col-xs-7 line-height-base"><?php echo date("m/d/y",$slcreated ); ?></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 col-xs-5 control-label">Role</label>
                                        <div class="col-md-8 col-xs-7 line-height-base"><?php echo $slusergroups; ?></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 col-xs-5 control-label">Birthday</label>
                                        <div class="col-md-8 col-xs-7 line-height-base"><?php echo $slcustom3; ?></div>
                                    </div>
									<div class="form-group">
                                        <label class="col-md-4 col-xs-5 control-label">Phone Number</label>
                                        <div class="col-md-8 col-xs-7 line-height-base"><?php echo $slcustom8; ?></div>
                                    </div>
									<div class="form-group">
                                        <label class="col-md-4 col-xs-5 control-label">Website</label>
                                        <div class="col-md-8 col-xs-7 line-height-base"><?php echo $slcustom16; ?></div>
                                    </div>
									<div class="form-group">
                                        <label class="col-md-4 col-xs-5 control-label">Twitter</label>
                                        <div class="col-md-8 col-xs-7 line-height-base"><?php echo $slcustom14; ?></div>
                                    </div>
									<div style="padding-top:50px; padding-bottom:30px;">
                                        <h3 style="padding-left:50px;">Bio</h3>
                                        <div style="padding-left:50px; padding-right:50px;" align="justify"><?php echo $slcustom10; ?></div>
                                    </div>
                                </div>
                                
                            </div>
                            
                        </div>
                        <div class="col-md-6 col-sm-8 col-xs-7">
                            
                            <form action="#" class="form-horizontal">
							<div class="panel panel-default">
                                <div class="panel-body">
                                    <div style="padding-bottom:20px; padding-left:20px;"><span class="label label-default label-form"><i class="fa fa-exclamation-triangle"></i> UPDATE PROFILE</span></div>
                                    <p>Use this section to edit or update your profile.</p>
                                </div>
                                <div class="panel-body form-group-separated">
                                <div align="center" style="padding-left:15%; padding-right:15%; padding-top:30px; padding-bottom:20px;">
								<div align="left">                                
								<?php if (function_exists('sl_updateformbody')) sl_updateformbody(4,false); ?>
                                </div> 
								</div>								
                                    
                                </div>
                            </div>
                            </form>      

                        </div>
                    </div>
                    

                </div>
                <!-- END PAGE CONTENT WRAPPER -->                                                 
            </div>            
            <!-- END PAGE CONTENT -->
			
					<!-- START SIDEBAR -->
        <div class="sidebar">            
            <div class="sidebar-wrapper scroll">
                
                <div class="sidebar-tabs">
                    <a href="#sidebar_1" class="sidebar-tab"><span class="fas fa-info-circle"></span> Community</a>
                    <a href="#sidebar_2" class="sidebar-tab"><span class="fas fa-map-signs"></span> Road Map</a>
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
  'searchfields'=>'nickname,username',
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
                    
<div style="padding-left:30px; padding-right:30px; height:1150px;">
						<small>
						
						</small>                                
                    </div>
                </div>
                
            </div>            
        </div>
        <!-- END SIDEBAR -->
			
        </div>
        <!-- END PAGE CONTAINER -->

        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fas fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to log out?</p>                    
                        <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
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
        
        <script type="text/javascript" src="js/plugins/jquery/jquery-migrate.min.js"></script>
        <!-- END PLUGINS -->

        <!-- START THIS PAGE PLUGINS-->        
        <script type='text/javascript' src='js/plugins/icheck/icheck.min.js'></script>
        <script type="text/javascript" src="js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>  
        
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap-file-input.js"></script>
        <script type="text/javascript" src="js/plugins/form/jquery.form.js"></script>
        
        <script type="text/javascript" src="js/plugins/cropper/cropper.min.js"></script>
        <!-- END THIS PAGE PLUGINS-->        

        <!-- START TEMPLATE -->      
        <script type="text/javascript" src="js/plugins.js"></script>        
        <script type="text/javascript" src="js/actions.js"></script>
        <script type="text/javascript" src="js/demo_edit_profile.js"></script>
        <!-- END TEMPLATE -->

    <!-- SCRIPTS -->       
		<script type="text/javascript" src="taquito-functions.js"></script>
	
	<!-- OCLASUS SCRIPT - FOLLOW UP LINES 318 -->
	
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
        var clipboard = new Clipboard('.copyButton');

        clipboard.on('success', function(e) {
        console.log(e);
        });

        clipboard.on('error', function(e) {
        console.log(e);
        });
        
        var bal = document.getElementById('_address')
        let connectModal = $("#modal_basic");
        var yes = true;
        connectModal.on("show.bs.modal", () => {
            tezbridge.request({method: 'get_source'}).then((address) => {
                console.log(address);
            document.getElementById("get_source").innerHTML = address;
            
            if(yes){
                document.getElementById('wallet_address').innerHTML = address;

                new QRCode(document.getElementById('qraddress'), address);
                yes = false;
            }

            taquito.Tezos.setProvider({ rpc: 'https://rpc.tzkt.io/mainnet' });
            taquito.Tezos.tz.getBalance(address)
                .then(balance => bal.innerHTML = `${balance.toNumber() / 1000000} ꜩ`)
                .catch(error => console.log(JSON.stringify(error))); 

            
            console.log(balance.innerHTML);
				
                connectModal.modal('');
            }).catch(console.log);
        });
    </script>

    </body>
</html>






