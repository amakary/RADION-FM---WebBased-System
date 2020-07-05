<?php $groupswithaccess="RADIONER,CEO,FOUNDER"; 
require_once("/slpw/sitelokpw.php");
require_once "slpw/slconfig.php";
require_once "php/music_info_get.php";
?>

<?php

function getValue($val){
$curl = curl_init();

curl_setopt_array($curl, array(
CURLOPT_URL => "api.coincap.io/v2/assets/tezos",
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => "",
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 0,
CURLOPT_FOLLOWLOCATION => true,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => "GET",
));

$output = curl_exec($curl);
$decodedObject = json_decode($output,true);
$data = $decodedObject['data'];
// echo '<ul>';
// echo '<li>'.$data['id'].'</li>' ;
// echo '<li>'.$data['rank'].'</li>' ;
// echo '<li>'.$data['symbol'].'</li>' ;
// echo '<li>'.$data['name'].'</li>' ;
// echo '<li>'.$data['priceUsd'].'</li>' ;
// echo '<li>'.$data['changePercent24Hr'].'</li>' ;
// echo '<li>'.$data['marketCapUsd'].'</li>';
// echo '<li>'.$data['volumeUsd24Hr'].'</li>';
// echo '</ul>';
$final = '';
$pos = strpos($data[$val],'.');
if($pos>-1){
$pos = $pos+3;
$final = substr($data[$val], 0, $pos);
}else{
$final = $data[$val];
}

return $final;
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>MARKETPLACE</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="css/theme-dark.css"/>
		<link rel="stylesheet" type="text/css" href="css/fontawesome-all.min.css" />
		 <link rel="stylesheet" type="text/css" href="css/cropper/cropper.min.css"/>
        <!-- EOF CSS INCLUDE -->    
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
		<!-- TAQUITO -->
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
.fa-play-circle:hover {
    color: #27AE60 ;
}
.fa-thumbs-up:hover {
    color: #27AE60 ;
}
.fa-thumbs-down:hover {
    color: #B04443 ;
}

.blobs-container {
	display: flex;
}

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
</style>

<style>
.fa-sort-down{color:#C0392B}
.fa-sort-up{color:#27AE60}
.tDown{color:#C0392B}
.tUp{color:#27AE60}
</style>

<style>
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

<?php if (function_exists('startwhoisonline'))  startwhoisonline(""); ?>	
<script type="text/javascript"> var memberprofilepage=1 </script>
<?php if (function_exists('startwhoisonline')) startwhoisonline('userid'); ?>

<script type="text/javascript">
var blabfolderpath="/slpw/plugin_blab/"</script>
<link rel="stylesheet" type="text/css" href="/slpw/plugin_blab/blab.css">
<script type="text/javascript" src="/slpw/plugin_blab/sarissa.js"></script>
<script type="text/javascript" src="/slpw/plugin_blab/blab.js"></script>
	
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
								<br>
								<br>
								<div align="left" style="color:#424949; font-size:10px;">PUBLIC ADDRESS:<br>
							<span style="color:#7B7D7D;" id="get_source"></span></div>
                            </div>
                            <div class="profile-controls">
                                 <a href="#" class="profile-control-left sidebar-toggle"><span class="fa fa-info"></span></a>
                                <a href="edit-profile.php" class="profile-control-right"><span class="fas fa-user-cog"></span></a>
                            </div>
                        </div>                                                                        
                    </li>
                    <li class="xn-title">MENU</li>
					<li class="xn-openable">
                        <a href="submission.php"><span class="fas fa-upload"></span> <span class="xn-text"> UPLOAD</span></a>
                    </li>
                                       
                    <li class="xn-openable">
                        <a href="submission.php"><span class="fas fa-briefcase"></span> <span class="xn-text"> SERVICES</span></a>
						<ul>
						<li><a href="#"><span class="xn-text"><span class="fas fa-user-shield"></span> COPYRIGHT PROTECTION</span></a></li>
						<li><a href="#"><span class="xn-text"><span class="fas fa-copyright"></span> COPYRIGHT REGISTRATION</span></a></li>
						<li><a href="#"><span class="xn-text"><span class="fab fa-creative-commons"></span> MUSIC LICENSING</span></a></li>
						</ul>
                    </li>
                    <li class="xn-openable">
                        <a href="marketplace.php"><span class="fas fa-store"></span> <span class="xn-text"> MARKETPLACE</span></a>
                    </li>                   
                    <li class="xn-openable">
                        <a href="exchange.php"><span class="fas fa-exchange-alt"></span> <span class="xn-text"> EXCHANGE</span></a>
                    </li> 
					<li class="xn-openable">
                        <a href="#"><span class="fas fa-audio-description"></span> <span class="xn-text"> NETWORK</span></a>
						<ul>
						<li><a href="ad-submission.php"><span class="xn-text"><span class="fas fa-donate"></span> SUBMIT AD</span></a></li>
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
                                <a href="#" class="sidebar-toggle">Show all messages</a>
                            </div>                            
                        </div>                        
                    </li>
                    
					<!-- ALERT NOTIFICATIONS ENDS -->					
                    
                    <!-- LANG BAR -->
                    <li class="xn-icon-button pull-right">
                        <a href="#"><span class="fas fa-language fa-lg"></span></a>
                        <ul class="xn-drop-left xn-drop-white animated zoomIn">
                            <li><a href="#"><span class="flag flag-us"></span> English</a></li>
                            <li><a href="#"><span class="flag flag-es"></span> Espanol</a></li>
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
                            <div class="widget widget-primary widget-item-icon" onclick="#">
                                <div class="widget-item-left">
                                    <span class="fas fa-user fa-3x"></span>
                                </div>                             
                                <div class="widget-data">
                                    <div class="widget-int num-count">ONLINE</div>
                                    <div class="widget-title">RADIONERS</div>
                                    <div class="widget-subtitle blobs-container"><i class="blob green" style="margin-right:5px;"></i> <?php if (function_exists('sl_howmanyonline')) sl_howmanyonline(); ?></div>
                                </div>      
                                
                            </div>                            
                            <!-- END WIDGET MESSAGES -->
                            
                        </div>
                        <div class="col-md-3">
                            
                            <!-- START WIDGET MESSAGES -->
                            <div class="widget widget-primary widget-item-icon" onclick="#">
                                <div class="widget-item-left">
								<div style="height:40px; width:40px; margin-left:10px;">
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
                                </div>                             
                                <div class="widget-data">
                                    <div class="widget-int num-count">TEZOS</div>
                                    <div class="widget-title">BALANCE</div>
                                    <div class="widget-subtitle" id="_address">&#42793;</div>
                                </div>      
                                
                            </div>                            
                            <!-- END WIDGET MESSAGES -->
                            
                        </div>
                        <div class="col-md-3">
                            
                            <!-- START WIDGET MESSAGES -->
                            <div class="widget widget-primary widget-item-icon" onclick="#">
                                <div class="widget-item-left">
                                    <span class="fas fa-dollar-sign fa-3x"></span>
                                </div>                             
                                <div class="widget-data">
                                    <div class="widget-int num-count">USD</div>
                                    <div class="widget-title">CONVERSION</div>
                                    <div class="widget-subtitle"><i class="fas fa-dollar-sign"></i></div>
                                </div>      
                                
                            </div>                            
                            <!-- END WIDGET MESSAGES -->
                            
                        </div>
                        <div class="col-md-3">
                            
                            <!-- START WIDGET CLOCK -->
                            <div class="widget widget-default widget-padding-sm">
							<div class="widget-controls"> 
									<a href="#" class="widget-control-left"><div style="height:20px; width:20px; padding-top:7px; padding-left:7px;">
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
</div></a>
                                    <a href="#modal_basic" class="widget-control-right" data-toggle="modal"><span class="fas fa-plug"></span></a>
                                </div>
							
                            <div class="widget-big-int"><small>$</small><?php echo getValue('priceUsd') ?></div>      
								<div class="widget-subtitle">CURRENT PRICE</div>                                               
                                <div class="widget-buttons widget-c3">
                                    
                                    
                                    <div align="right" style="margin-top:5px; padding-right:20px;"><span><?php echo getValue('symbol') ?></span>
									<span style="padding-right:7px; padding-left:7px;">|</span>
									<span> Rank: <?php echo getValue('rank') ?></span>
									<span style="padding-right:7px; padding-left:7px;">|</span>
                                      <span> Change 24h <?php
$changePercent24Hr = getValue('changePercent24Hr');
if(strpos($changePercent24Hr,'-')>-1 ){
//negative
echo '<span class="fas fa-sort-down fa-xs" style="vertical-align:2px;"></span> <span class="tDown" style="font-size:12px;">'.$changePercent24Hr.'%</span>';
}else{
echo '<span class="fas fa-sort-up fa-xs" style="vertical-align:-2px;"></span> <span class="tUp" style="font-size:12px;">'.$changePercent24Hr.'%</span>';
}
?></span> </div>
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
                                <h5 style="padding-left:3%;"><strong><i class="fas fa-volume-up"></i> MARKETPLACE</strong></h5>
								<div align="right" style="padding-right:20px; margin-top:-10px; margin-bottom:-10px; padding-bottom:0px;"><i class="fas fa-check-square"></i> Current Entires: </div>
								<hr>
                                <div class="panel panel-default tabs">                            
                                    <ul class="nav nav-tabs" role="tablist" style="padding-bottom:20px;" id="data_tab">
                                        
                                        <li id="tb1"  onclick="tab_changes(0)"class="active"><a href="#tab-first" role="tab" data-toggle="tab">Rock</a></li>
                                        <li id="tb2"  onclick="tab_changes(1)"><a href="#tab-second" role="tab" data-toggle="tab">Pop</a></li>
										<li id="tb3" onclick="tab_changes(2)" ><a href="#tab-third" role="tab" data-toggle="tab">Country</a></li>
										<li id="tb4"  onclick="tab_changes(3)"><a href="#tab-fourth"  role="tab" data-toggle="tab">Hip Hop / R&B </a></li>
										<li id="tb5" onclick="tab_changes(4)" ><a href="#tab-fifth" role="tab" data-toggle="tab">Latin</a></li>
										<li id="tb6" onclick="tab_changes(5)"><a href="#tab-six" role="tab" data-toggle="tab">DJ Mix</a></li>
										<li id="tb7" onclick="tab_changes(7)"><a href="#tab-eight" role="tab" data-toggle="tab">RAP</a></li>
										<li id="tb8" onclick="tab_changes(6)" ><a href="#tab-seven" role="tab" data-toggle="tab">Podcast</a></li>
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
                                        <img id="ad_work" src="<?php echo $img_link;?> assets/images/users/pre-radion.jpg" alt="" width="95px" height="95px">
                                    </div>
                                    <div class="profile-data">
                                        <h5 style="color:#D25607;"><strong id="user_name"><?php echo $USER_NAME;?></strong></h5>
                                        <div class="profile-data-title" style="color:#FFF;" id="song_name"><?php echo $SONG_NAME;?></div>
                                    </div>
                                    <div class="profile-controls">
									<input type="text" value="<?php echo $audio_link;?>" class="hide" id="audio_src">
									<input type="text" value="<?php echo $SONG_ID;?>" class="hide" id="song_id">
										
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
</audio></div>

<!----Audio Player------>
        <!-- START PRELOADS -->
        <audio id="audio-alert" src="audio/alert.mp3" preload="auto"></audio>
        <audio id="audio-fail" src="audio/fail.mp3" preload="auto"></audio>
        <!-- END PRELOADS -->                  
        
    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap.min.js"></script> 
		<script type="text/javascript" src="js/fontawesome-all.js"></script> 		
        <!-- END PLUGINS -->

        <!-- START THIS PAGE PLUGINS-->        
        <script type='text/javascript' src='js/plugins/icheck/icheck.min.js'></script>        
        <script type="text/javascript" src="js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        <script type="text/javascript" src="js/plugins/scrolltotop/scrolltopcontrol.js"></script>
		<script type="text/javascript" src="js/plugins/daterangepicker/daterangepicker.js"></script>
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
		
		<script type='text/javascript' src='js/plugins/noty/jquery.noty.js'></script>
            <script type='text/javascript' src='js/plugins/noty/layouts/topRight.js'></script> 
			
        <!-- END THIS PAGE PLUGINS -->   		

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="js/plugins.js"></script>        
        <script type="text/javascript" src="js/actions.js"></script>
		<script type="text/javascript" src="js/plugins/datatables/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="js/demo_dashboard.js"></script>
		
		
        <!-- END TEMPLATE -->
		<script type='text/javascript' src='js/plugins/noty/themes/default.js'></script>
		<script type="text/javascript" src="taquito-functions.js"></script>
		
		  <!-- START SCRIPTS -->
		
		 <script type="text/javascript">   
var active_tab=0;		
		$( document ).ready(function() {
		    //  $('#sponsor_section').hide();
			express_view();
			
			$( "#sponsore_btn" ).prop( "disabled", true );

    	load_data_table();

	
setInterval(load_data_table, 1000);
		
		
});
	
	function tab_change(){
	
	
	if(active_tab==0){
	

$('#tab-first').addClass('active');
$('#tab-second').removeClass('active');
$('#tab-third').removeClass('active');
$('#tab-fourth').removeClass('active');
$('#tab-fifth').removeClass('active');
$('#tab-six').removeClass('active');
$('#tab-seven').removeClass('active');
$('#tab-eight').removeClass('active');

	}else if(active_tab==1){
	
	
// $('#tb1').removeClass('active');
// $('#tb2').addClass('active');
// $('#tb3').removeClass('active');
// $('#tb4').removeClass('active');
// $('#tb5').removeClass('active');
// $('#tb6').removeClass('active');
// $('#tb7').removeClass('active');
// $('#tb8').removeClass('active');



$('#tab-first').removeClass('active');
$('#tab-second').addClass('active');
$('#tab-third').removeClass('active');
$('#tab-fourth').removeClass('active');
$('#tab-fifth').removeClass('active');
$('#tab-six').removeClass('active');
$('#tab-seven').removeClass('active');
$('#tab-eight').removeClass('active');

	}
	else if(active_tab==2){
	
	

$('#tab-first').removeClass('active');
$('#tab-second').removeClass('active');
$('#tab-third').addClass('active');
$('#tab-fourth').removeClass('active');
$('#tab-fifth').removeClass('active');
$('#tab-six').removeClass('active');
$('#tab-seven').removeClass('active');
$('#tab-eight').removeClass('active');

	}	else if(active_tab==3){
	
$('#tab-first').removeClass('active');
$('#tab-second').removeClass('active');
$('#tab-third').removeClass('active');
$('#tab-fourth').addClass('active');
$('#tab-fifth').removeClass('active');
$('#tab-six').removeClass('active');
$('#tab-seven').removeClass('active');
$('#tab-eight').removeClass('active');

	}else if(active_tab==4){
	
	
	
$('#tab-first').removeClass('active');
$('#tab-second').removeClass('active');
$('#tab-third').removeClass('active');
$('#tab-fourth').removeClass('active');
$('#tab-fifth').addClass('active');
$('#tab-six').removeClass('active');
$('#tab-seven').removeClass('active');
$('#tab-eight').removeClass('active');

	}else if(active_tab==5){
	
	
	
$('#tab-first').removeClass('active');
$('#tab-second').removeClass('active');
$('#tab-third').removeClass('active');
$('#tab-fourth').removeClass('active');
$('#tab-fifth').removeClass('active');
$('#tab-six').addClass('active');
$('#tab-seven').removeClass('active');
$('#tab-eight').removeClass('active');



	}else if(active_tab==6){
	
	
$('#tab-first').removeClass('active');
$('#tab-second').removeClass('active');
$('#tab-third').removeClass('active');
$('#tab-fourth').removeClass('active');
$('#tab-fifth').removeClass('active');
$('#tab-six').removeClass('active');
$('#tab-seven').addClass('active');
$('#tab-eight').removeClass('active');


	}else if(active_tab==7){
	
	
$('#tab-first').removeClass('active');
$('#tab-second').removeClass('active');
$('#tab-third').removeClass('active');
$('#tab-fourth').removeClass('active');
$('#tab-fifth').removeClass('active');
$('#tab-six').removeClass('active');
$('#tab-seven').removeClass('active');
$('#tab-eight').addClass('active');


	}
	
	}
	
	function tab_changes(tab_no){
	active_tab=tab_no;
	
	}	 
function load_data_table(){
//alert();
	$.ajax({
				url: "load_music_table.php",
				type: 'POST',
				success: function (data) {
              $("#DATATABLE_FOR_LOAD").html(data);
			  
			  tab_change();
			  //  $('#download_btn').html('<button class="btn btn-default" onClick="notyConfirm()"><i class="fas fa-download"></i> BUY NOW</button>');

   // alert(data);
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

		 
                function notyConfirm1(){
                    noty({
                        text: 'Do you want to continue sponsorship ? ',
                        layout: 'topRight',
                        buttons: [
                                {addClass: 'btn btn-success btn-clean', text: 'Ok', onClick: function($noty) {
                                    $noty.close();
                                    //noty({text: 'You clicked "Ok" button', layout: 'topRight', type: 'success'});
									//purches_song();
									submit_sponsor_ship();
                                }
                                },
                                {addClass: 'btn btn-danger btn-clean', text: 'Cancel', onClick: function($noty) {
                                    $noty.close();
                                    }
                                }
                            ]
                    })                                                    
                }   
				
				
     function notyConfirm(){
                    noty({
                        text: 'Do you want to continue purchase ? Will deduct $XTZ from your account',
                        layout: 'topRight',
                        buttons: [
                                {addClass: 'btn btn-success btn-clean', text: 'Ok', onClick: function($noty) {
                                    $noty.close();
                                    //noty({text: 'You clicked "Ok" button', layout: 'topRight', type: 'success'});
									purches_song();
                                }
                                },
                                {addClass: 'btn btn-danger btn-clean', text: 'Cancel', onClick: function($noty) {
                                    $noty.close();
                                    }
                                }
                            ]
                    })                                                    
                
				}   




			
	var myVar=null;
	var last_id;
function play_audio(){
    	song_id=$('#song_id').val();


		var audioplayer = document.getElementById("audio_player");
 if (audioplayer.paused) {
 if(myVar!=null){
clearInterval(myVar);
}

 
$('#play_icon').removeClass('fas fa-play');
  $('#play_icon').addClass('fa-stop');
					
//$('#play_icon_'+song_id).removeClass('fa-play-circle fa-lg');
//$('#play_icon_'+song_id).addClass('fa-stop-circle');

				last_id	=song_id;
	
			audioplayer.load();			
       audioplayer.play();
	   count=0;
	 myVar = setInterval(function(){
   if(count==30){
   
    audioplayer.pause();
   
   		//$('#play_icon_'+song_id).removeClass('fa-stop-circle');
//$('#play_icon_'+song_id).addClass('fa-play-circle fa-lg');


 
$('#play_icon').addClass('fas fa-play');
  $('#play_icon').removeClass('fa-stop');
		


count=0;
  clearInterval(myVar);
   }
   count++;
   
}, 1000);
	   
	   
	   
    }  else {
       audioplayer.pause();
     		$('#play_icon_'+song_id).removeClass('fa-stop');
       $('#play_icon_'+song_id).addClass('fa-play');
	}

/////////////




// var audio = new Audio($('#audio_src').val());

   // song_id=$('#song_id').val();
   
   
   						// $('new_name').removeClass('fa-stop-circle');

      						// $('new_name').addClass('fa-play-circle fa-lg');
							// $('new_name').attr('name','new_name11');


						// $('#play_icon_'+song_id).removeClass('fa-play-circle fa-lg');
					
					// $('#play_icon_'+song_id).addClass('fa-stop-circle');

					   // $('#play_icon_'+song_id).attr('name','new_name');

					
// audio.play();
// count=0;
 // var myVar = setInterval(function(){
   // if(count==20){
   		// $('#play_icon_'+song_id).removeClass('fa-stop-circle');
// $('#play_icon_'+song_id).addClass('fa-play-circle fa-lg');
 // audio.pause();
  // clearInterval(myVar);
   // }
   // count++;
   
// }, 1000);


}			

function information_pass(song_id,user_name,song_name,album_name,total_investor,invested_amunt,want_investor,have_purchase,total_sell_percentage,payable_amount,music_src,adwakr_src){
//fibonacci(total_sell_percentage);
 ///alert(song_id+" : "+user_name+" : "+song_name+" : "+album_name+" : "+total_investor+" : "+music_src);
if(have_purchase==1){
    
	
	$('#download_btn').html('<button class="btn btn-default" onClick="purches_song()"><i class="fas fa-download"></i> DOWNLOAD</button>');


	}else{

    $('#download_btn').html('<button class="btn btn-default" onClick="notyConfirm()"><i class="fas fa-download"></i> BUY NOW</button>');

}


  if(want_investor==1){
  var myArray = new Array();
  var option_list='<select class="btn btn-primary " style="padding-left:5px;padding-right=5px;"id="invest_persent">';
  
  var available_percnatage =100-total_sell_percentage;
  
  var available_percnatage_tmp=available_percnatage;
  
  //alert(available_percnatage);
    var a = 1, b = 0, temp;
	var value="";
	

if(available_percnatage>0){
var tmp1=0;
counter=0;
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
		
		function purches_song(){
			  sid= $('#song_id').val();
		
		
		window.location.href = 'php/download_song_script.php?ID='+sid;

		
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

			   }else{
			   
			     $("#message_box").css("display", "none");

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
		
            </script>
		
    <!-- END SCRIPTS --> 
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
        connectModal.on("show.bs.modal", () => {
            tezbridge.request({method: 'get_source'}).then((address) => {
                console.log(address);
            document.getElementById("get_source").innerHTML = address;
          
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






