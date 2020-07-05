<?php
 $groupswithaccess="RADIONER,CEO,FOUNDER"; 

require_once("/slpw/sitelokpw.php");
 require_once "slpw/slconfig.php"; 

  date_default_timezone_set('US/Eastern');
  function formatDateAgo($value)
{
    $time = strtotime($value);
    $d = new \DateTime($value);

    $weekDays = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
    $months = ['January', 'February', 'March', 'April',' May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

    if ($time > strtotime('-2 minutes'))
    {
        return 'few second ago';
    }
    elseif ($time > strtotime('-30 minutes'))
    {
        return  floor((strtotime('now') - $time)/60) . ' min, '.'Today ' ;
    }
    elseif ($time > strtotime('today'))
    {
        return $d->format('G:i');
    }
    elseif ($time > strtotime('yesterday'))
    {
        return $d->format('G:i').', Yesterday';
		
		
    }
    elseif ($time > strtotime('this week'))
    {
        return  $d->format('G:i').', '.$weekDays[$d->format('N') - 1] ;
    }
    else
    {
        return  $d->format('G:i').', '.$d->format('j') . ' ' . $months[$d->format('n') - 1] ;
    }
}
 
	//$radio_market_price_q = $con->query("SELECT `convert_value` AS MARKET_PRICE FROM `slconfig` ");
	
	//$radio_market_price = $radio_market_price_q->fetch_object()->MARKET_PRICE;


	
		$online_query = $con->query("SELECT COUNT(*) AS online_count FROM `sl_whoisonline` ");
	
	$totalonline = $online_query->fetch_object()->online_count;
	 
	 $potentiol_payout=$totalonline*1;
	 
	 $potentiol_percebt=($potentiol_payout*8)/100;
	 $potentiol_payout=$potentiol_payout-$potentiol_percebt;
	
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
        <title>RADION - Submission</title>            
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
		<link rel="stylesheet" type="text/css" href="css/fontawesome-all.min.css" />
		<link rel="stylesheet" type="text/css" href="css/cropper/cropper.min.css"/>
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

		
    </head>
    <body>
	
        <!-- START PAGE CONTAINER -->
        <div class="page-container">
		
		
		<!------Alert Message ------>
		
		
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
            		<!------Alert Message ------>

<script type="text/javascript"> var memberprofilepage=1 </script>
<?php if (function_exists('startwhoisonline')) startwhoisonline('userid'); ?>

<script type="text/javascript">
var blabfolderpath="/slpw/plugin_blab/"</script>
<link rel="stylesheet" type="text/css" href="/slpw/plugin_blab/blab.css">
<script type="text/javascript" src="/slpw/plugin_blab/sarissa.js"></script>
<script type="text/javascript" src="/slpw/plugin_blab/blab.js"></script>
					
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
								<span id="on_sibmission">RADION is always active in Social Media! If you want to be updated with our progress, we recommend you to follow us in our <a href="https://web.telegram.org/#/im?p=@radion_project" target="blank">Telegram</a> Group.</span>
								</div>                            
                        </div>
                    </div> 
                    
                  <!-- START WIDGETS -->                    
                    <div class="row">
                        <div class="col-md-3">
                            
                            <!-- START WIDGET MESSAGES -->
                            <div class="widget widget-primary widget-item-icon" onclick="#">
                                <div class="widget-item-left">
                                    <i class="fas fa-handshake fa-3x"></i>
                                </div>                             
                                <div class="widget-data">
                                    <div class="widget-int num-count">RADION</div>
                                    <div class="widget-title"><?php echo sprintf("%.2f",$slcustom20); ?></div>
                                    <div class="widget-subtitle">MEMBERSHIP UNITS</div>
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
				
                    <div class="col-md-8">
				<!--- Test 
				<div class="block">
                <form action="upload.php" class="dropzone dropzone-mini fileinput" name="filenamemp3" id="filenamemp3"  onChange="form_progress_check(0)"></form>
                </div> -->
				<h3><i class="fas fa-upload"></i> SUBMISSION ZONE / PRODUCER</h3>
				
				<div align="right" style="margin-bottom:-15px; margin-top:-10px; padding-right:3%;"><span><i class="fas fa-headphones"></i> Audience: <?php echo $totalonline;?></span> <span style="padding-left:20px; padding-right:20px;">|</span> <span style="padding-right:30px;"><i class="fas fa-money-bill-alt"></i> Potential Payout: $<?php echo $potentiol_payout;?> USD</span></div>
				<hr>
                <div class="row">
				<form id="music_upload_form" class="" action="" method="post" enctype="multipart/form-data">
				
				<div class="progress">
				<div class="progress-bar progress-bar-primary"   id="progressing_" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="100" style="width: 0%"><span id="progressing_1">0</span>% Complete</div>
				</div> 
				
                        <div class="col-md-6" >
							<h5 style="color:#1B1E24;"><strong>Album/Track Information - Step 1</strong></h5>
							<div class="form-group">
											<h5 style="color:#909497"><i class=" fas fa-file-audio"></i> Upload audio file</h5>
											<label class="control-label" style="padding-right:20px; color:#cb4335;"> - MP3 format only -</label>							
                                            <input type="file" class="fileinput btn-primary" name="filenamemp3" id="filenamemp3"  onChange="form_progress_check(0)"  title="Browse file"/>
											</div>
											<hr>
						<div class="form-group">
                                                                                                                                                                          
                                            <select class="form-control select" data-style="btn-default" id="song_genre" name="song_genre" onchange="form_progress_check(0)">
                                                <option value="0">Select Music Genre</option>
                                                <option value="Rock">Rock</option>
                                                <option value="Pop">Pop</option>
                                                <option value="Country">Country</option>
                                                <option value="Hip Hop / R&B ">Hip Hop / R&B </option>
                                                <option value="Latin">Latin</option>
                                                <option value="DJ Mix">DJ Mix</option> 
												<option value="RAP">RAP</option>
                                                <option value="Talk Shows">Talk Shows</option>
                                              
                                            </select>
                                    </div>
						
						<div class="form-group">                                  
                                <div class="input-group">
                                <span class="input-group-addon"><span class="fas fa-music"></span></span>
                                <input type="text" class="form-control" id="song_name"  name="song_name" onChange="form_progress_check(0)" placeholder="Type the name of the song." readonly/>
                                </div>                                            
                        
                        </div>
						
						<div class="form-group">                                  
                                <div class="input-group">
                                <span class="input-group-addon"><span class="fas fa-stopwatch"></span></span>
                                <input type="text" class="form-control"  onChange="form_progress_check(0)"  id="song_length" name="song_length" placeholder="Song lenght - Format Example: (3:33)"/>
                                </div>                                            
                        </div>
						<div class="form-group">                                  
                                <div class="input-group">
                                <span class="input-group-addon"><span class="fas fa-check-circle"></span></span>
                                <input type="text" class="form-control" onChange="form_progress_check(0)"  id="album_name" name="album_name" placeholder="Song album name" readonly/>
                                </div>                                            
                        </div>
						<hr>
						<div class="form-group">
							<h5 style="color:#909497"><i class=" fas fa-file-image"></i> Upload Album Cover | Minimum (800px x 800px)</h5>
											<label class="control-label" style="padding-right:20px; color:#cb4335;"> - PNG or JPG format -</label>							
                                            <input type="file" class="fileinput btn-primary" name="filenameimg" id="filenameimg"  onChange="form_progress_check(0)"  title="Browse file"/>
                                    </div>
										
										<hr>
										<h5 style="color:#1B1E24;"><strong> Investors - Step 2</strong></h5>
										
										<p align="justify"><small>Members of RADION community can help you to reduce your risk in the marketplace and become succesful with your submissions and assets. 
										In exchange you have to give up on 30% of your membership units earnings 
										per one week of downloads. This is a limited time contract between you and your investors that can help you to pursue your career.
										
										<br>
										<br>
										You may wonder, why would I do something like that? Well, keep in mind that submissions don't have any guarantee to be included 
										in the stream, because every submission needs to be approved by our arbitrary network (which is composed by real users). Therefore, 
										there is a chance that your song may never make it to the main stream. Are you willing to take that risk? If you are; select option NO.
										<br>
										<br>
										If not, you can allow members of RADION community to take the risk with you as investors! If you have investors supporting your music, your song or track will be 
										featured in the top performance section in order to have better exposure in the community. If this is your case select option YES.</small></p>
						<div class="form-group"> 
						<p><i class="fas fa-donate"></i> Do you want Investors?</p>
						<div style="padding-left:30px;">
                                            <label class="check"><input type="radio" class="iradio" name="investor_need"  onChange="form_progress_check(0)"  value="0"/> Yes</label>
											<label class="check"><input type="radio" class="iradio" name="investor_need"  onChange="form_progress_check(0)"  value="1"/> No</label>
											<br>
											<label>How many units?
											
											<input type="number" id="invest_amount" name="invest_amount"  onChange="form_progress_check(0)"  placeholder="Quantity" class="form-control"/></label>
											</div>
											</div>	
											
											<hr>
											
											<div class="form-group">
						<p align="justify"><strong><small>Authorize Casting of your tracks in RADION.</small></strong></p>
						<div style="padding-left:7px;">
                        <input type="radio" class="" name="copyright13" value="0"   onChange="form_progress_check(0)"/> Yes (Recommended)
						<div style="padding-bottom:7px;"></div>
						<input type="radio" class="" name="copyright13" value="2"   onChange="form_progress_check(0)"  /> No
						</div>
						</div>
                                    

                                    
										           
						</div>
                        <div class="col-md-6">						
						
						<h5 style="color:#1B1E24;"><strong>Copyrights & Licensing - Step 3</strong></h5>
						<br>
						<h5 style="color:#909497"><strong><i class="fas fa-copyright"></i> Copyrights</strong></h5>
							
						<div class="form-group">
						<p align="justify"><small><strong>Do you need Copyright Registry?</strong></small></p>
						<p align="justify"><small>Copyright registry is based on the standards of the <a href="https://en.wikipedia.org/wiki/Berne_Convention" target="blank">Berne Convention (UN)</a>.
						This feature is optional, but it is a great asset for RADION users, specially for those musicians who are focusing most of their time in creation and no so much in legal diligence. 
						This option would help you to document copyrights in case of any plagiarism or unauthorized use of your content. 
						If you need more information please <a href="#">read more here</a> !<br><br>
						Your registration will get encrypted with Digital Time-Stamp and Blockchain Technology.</small></p>
						<div style="padding-left:10px;">
                        <input type="radio" class="" name="copyright14" value="0"   onChange="form_progress_check(0)" /> Yes
						<input type="radio" class="" name="copyright14" value="1"   onChange="form_progress_check(0)"  /> No
						</div>
						<br>
						<p align="justify"><small><strong>Do you want a Registration Certificate from (USCO)?</strong></small></p>
						<p align="justify"><small>(USCO) is the U.S. Copyright Office. It is part of the Library of Congress in the United States 
						and primarily serving as an office of records where documents related to copyright are stored and recorded. Your certificate may take a little bit of time. However, we know that 
						the time frame fluctuates between 6 weeks up to 10 months.</p>
						<div style="padding-left:10px;">
                        <input type="radio" class="" name="copyright" value="0"   onChange="form_progress_check(0)" /> Yes
						<input type="radio" class="" name="copyright" value="1"   onChange="form_progress_check(0)"  /> No
						</div>
						</div>
						<hr>
						<h5 style="color:#909497"><strong><i class="fab fa-creative-commons"></i> Album / Track License</strong> </h5>
						<div align="right" style="margin-top:-25px; margin-bottom:0px;"><a href="#" data-toggle="modal" data-target="#modal_no_footer">Need Help</a>?</div>
						

						<br>
						<div class="form-group">
						<p align="justify"><strong>Authorize commercial use for this album / track? </strong></p>
						<div style="padding-left:10px;">
                        <input type="radio" class="" name="copyright11" id="copyright11" value="0" onChange="form_progress_check(0)" /> Yes
						<input type="radio" class="" name="copyright11" id="copyright11" value="1" onChange="form_progress_check(0)"  /> No (Recommended)
						</div>
						</div>
						
						<div class="form-group">
						<p align="justify"><strong>Authorize derivative works built upon this album / track? </strong></p>
						<div style="padding-left:7px;">
                        <input type="radio" class="" name="copyright12" value="0"   onChange="form_progress_check(0)" /> Yes
						<div style="padding-bottom:7px;"></div>
						<input type="radio" class="" name="copyright12" value="1"  onChange="form_progress_check(0)" /> Yes, as long as it remains within the same <br>Creative Commons license.
						<div style="padding-bottom:7px;"></div>
						<input type="radio" class="" name="copyright12" value="2"   onChange="form_progress_check(0)"  /> No (Recommended)
						</div>
						</div>
						
						
						<p align="justify"><strong>Jurisdiction of your license</strong></p>
						
						<div class="form-group">
                                                                                                                                                                          
                                            <select class="form-control select" data-style="btn-default" onchange="form_progress_check(0)">
                                                <option value="0">Select One</option>
                                                <option value="Rock">United States</option>
                                                <option value="Pop">International - Berne Convention (UN)</option>
                                                
                                              
                                            </select>
                                    </div>
											

											<hr>

							<div class="form-group" style="margin-top:0px;">
<h5 style="color:#909497"><i class="fas fa-handshake"></i><strong> Terms and Conditions</strong></h5>
<p align="justify">I acknowledge that my submission allows me expose my asset in RADION marketplace without guaranteeing online stream due to a preliminary vote system arbitrated by users.</p>
                             <label class="check" style="padding-right:50px;"><input type="checkbox" class=""   onchange="form_progress_check(0)" id="agree_disagree" name="agree_disagree" /> <strong>Yes, I Accept.</strong></label>
                                            
							<button type="button" id="submit_btn" class="btn btn-success btn-lg mb-control"  onClick="form_progress_check('1')" disabled ><i class="fas fa-check-circle"></i> Submit Now</button>
							
			<!-- Message with sound -->
        <div class="message-box animated fadeIn" data-sound="alert" id="message-box-sound-1">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-globe"></span> Alert</div>
                    <div class="mb-content">
                        <p>Important Note: We want to thank you for participating in RADION beta version! Keep in mind that no all modules are enable at this time, however your experience is very important to us...  </p>                    
                    </div>
                    <div class="mb-footer">
						<button class="btn btn-success btn-lg pull-right mb-control-close" onClick="form_progress_check('1')"> Success </button>
						<button class="btn btn-danger btn-lg mb-control-close"> Cancel </button>
					</div>
                </div>
            </div>
        </div>
        <!-- end Message with sound -->
							
							</div>
							
						</div>
                      </div>
					  </form>
					  <div id="uploading_progress" style="display:none; min-height: 500px;">
                  </br>
                  </br>
					  <center><div style="font-size:70px"><strong>PR</strong><i class="fas fa-cog fa-spin"></i><strong>CESSING</strong></div></center>
				  </br>
				  </br>
				  </div>

					</div>
                    <div class="col-md-4">
					
  <!-- SUBMISSION LIST STATUS -->
                            <div class="panel panel-default">
							
							
							 <div class="form-group">
                                <div class="panel-heading">
									<h3 class="panel-title"><i class="fa fa-exclamation-circle"></i> SUBMISSION STATUS</h3>         
                                    
                                </div>
                                <div class="panel-body list-group list-group-contacts" id="status_table">                                
                              
                             
                                                            
                                </div>
                            </div>
                            <!-- END SUBMISSION LIST STATUS -->

					
					</div>
                  </div>
                </div>
              </div>
            </div>
			

<div class="col-md-12" style="padding-bottom:50px;">
                            
                            <form class="form-horizontal">
                                                            
                                <div class="panel panel-default tabs">                            
                                    <ul class="nav nav-tabs" role="tablist" style="padding-bottom:20px;">
                                        <li class="active"><a href="#tab-first" role="tab" data-toggle="tab">CURRENT ASSETS</a></li>
                                        <li><a href="#tab-second" role="tab" data-toggle="tab">COMMUNITY GUIDELINES STATUS</a></li>
                                        <li><a href="#tab-third" role="tab" data-toggle="tab">COPYRIGHT STATUS</a></li>
                                    </ul>
                                    <div class="panel-body tab-content">
                                        <div class="tab-pane active" id="tab-first">
												
											<table style="width:100%;">
											<thead>
<tr style="border-bottom: 2px solid #dddddd;" align="center">
<th style="width:5%; padding-bottom:10px;"># ID</th>
<th align="center" style="width:15%; padding-bottom:10px;">CATEGORY</th>
<th align="center" style="width:25%; padding-bottom:10px;">NAME</th>
<th align="center" style="width:10%; padding-bottom:10px;">GENRE</th>
<th align="center" style="width:10%; padding-bottom:10px;">ASSET</th>
<th align="center" style="width:15%; padding-bottom:10px;">STREAMED</th>
<th align="center" style="width:20%; padding-bottom:10px;">DOWNLOADS</th>
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
<th align="center" style="width:15%; padding-bottom:10px;">CATEGORY</th>
<th align="center" style="width:25%; padding-bottom:10px;">NAME</th>
<th align="center" style="width:10%; padding-bottom:10px;">GENRE</th>
<th align="center" style="width:10%; padding-bottom:10px;">ASSET</th>
<th align="center" style="width:15%; padding-bottom:10px;">STREAMED</th>
<th align="center" style="width:20%; padding-bottom:10px;">DOWNLOADS</th>
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
<th align="center" style="width:15%; padding-bottom:10px;">CATEGORY</th>
<th align="center" style="width:25%; padding-bottom:10px;">NAME</th>
<th align="center" style="width:10%; padding-bottom:10px;">GENRE</th>
<th align="center" style="width:10%; padding-bottom:10px;">ASSET</th>
<th align="center" style="width:15%; padding-bottom:10px;">STREAMED</th>
<th align="center" style="width:20%; padding-bottom:10px;">DOWNLOADS</th>
</tr>
</thead>
<tbody>
<tr>
<td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd;"><span class="fas fa-copyright"></span></td>
<td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd;"></td>
<td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd;"></td>
<td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd;"></td>
<td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd;"></td>
<td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd;"></td>
<td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd;"></td>
</tr>
<tr>
<td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd; background-color:#f3f3f3;"><span class="fas fa-copyright"></span></td>
<td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd; background-color:#f3f3f3;"></td>
<td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd; background-color:#f3f3f3;"></td>
<td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd; background-color:#f3f3f3;"></td>
<td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd; background-color:#f3f3f3;"></td>
<td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd; background-color:#f3f3f3;"></td>
<td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd; background-color:#f3f3f3;"></td>
</tr>
<tr>
<td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd;"><span class="fas fa-copyright"></span></td>
<td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd;"></td>
<td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd;"></td>
<td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd;"></td>
<td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd;"></td>
<td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd;"></td>
<td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd;"></td>
</tr>
<tr>
<td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd; background-color:#f3f3f3;"><span class="fas fa-copyright"></span></td>
<td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd; background-color:#f3f3f3;"></td>
<td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd; background-color:#f3f3f3;"></td>
<td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd; background-color:#f3f3f3;"></td>
<td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd; background-color:#f3f3f3;"></td>
<td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd; background-color:#f3f3f3;"></td>
<td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd; background-color:#f3f3f3;"></td>
</tr>
<tr>
<td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd;"><span class="fas fa-copyright"></span></td>
<td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd;"></td>
<td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd;"></td>
<td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd;"></td>
<td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd;"></td>
<td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd;"></td>
<td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd;"></td>
</tr>
<tr>
<td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd; background-color:#f3f3f3;"><span class="fas fa-copyright"></span></td>
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
                                    </div>

                                </div>                                
                            
                            </form>
                            
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
                    
<div style="padding-left:30px; padding-right:30px; height:1150px;">
						<small>
						<p><i class="fa fa-check-circle" style="color:#28b463;"></i> Completed<br>MEMBERSHIP SALE (30 - 45 DAYS)</p>
						<p><i class="fa fa-check-circle" style="color:#28b463;"></i> Completed<br>HIRE NEW DEV TEAM MEMBERS</p>
						<p><i class="fa fa-check-circle" style="color:#28b463;"></i> Completed<br>SMART CONTRACT DEVELOPMENT</p>
						<p><i class="fa fa-check-circle" style="color:#28b463;"></i> Completed<br>SMART CONTRACT AUDIT</p>
						<p><i class="fa fa-check-circle" style="color:#28b463;"></i> Completed<br>UI DEVELOPMENT</p>						
						<p><i class="fa fa-check-circle" style="color:#28b463;"></i> Completed<br>LAUNCH RADION UI PLATFORM BETA</p>
						<p><i class="fa fa-check-circle" style="color:#28b463;"></i> Completed<br>LAUNCH ONLINE STREAM TEST</p>
						<p><i class="fa fa-check-circle" style="color:#28b463;"></i> Completed<br>SECURITY & SCALABILITY UPGRADE</p>
						<p><i class="fa fa-check-circle" style="color:#28b463;"></i> Completed<br>UPGRADE (VOTE SYSTEM AND MARKETPLACE INTEGRATION)</p>
						<hr>
						<p><i class="fa fa-flag"></i> In Progress<br>DEV TOOLS AND API FOR BUSINESS</p>
						<p><i class="fa fa-flag"></i> In Progress<br>MULTI LANGUAGE SUPPORT</p>
						<p><i class="fa fa-exclamation-circle" style="color:#28b463;"></i> Completed<br>RADION MEMBERSHIP UNITS SALE (ROUND 1)</p>
						<p><i class="fa fa-exclamation-circle" style="color:#28b463;"></i> Completed<br>RADION MEMBERSHIP UNITS SALE (ROUND 2)</p>
						<p><i class="fa fa-exclamation-circle" style="color:#28b463;"></i> In Progress<br>TOKEN DISTRIBUTION</p>
						
						<p><i class="fa fa-exclamation-circle" style="color:#f1c40f;"></i> Pending<br>FIRST MARKETING CAMPAIGN TO IMPROVE VISIBILITY AND ADOPTION</p>
						<p><i class="fa fa-exclamation-circle" style="color:#f1c40f;"></i> Pending<br>OPEN INTERNAL EXCHANGE</p>
						<p><i class="fa fa-exclamation-circle" style="color:#28b463;"></i> In Progress<br>START REACHING OUT EXTERNAL EXCHANGES AND DIRECTORIES TO BE LISTED</p>
						<p><i class="fa fa-exclamation-circle" style="color:#28b463;"></i> Completed<br>DATACENTER UPGRADE</p>
						<p><i class="fa fa-exclamation-circle" style="color:#f1c40f;"></i> Pending<br>RADION UI PLATFORM UPGRADE (MUSIC FINGERPRINTING INTEGRATION)</p>
						<p><i class="fa fa-exclamation-circle" style="color:#f1c40f;"></i> Pending<br>MARKETING CAMPAIGN FOR TALENT FINDER (MUSICIANS AND ARTISTS)</p>
						<p><i class="fa fa-exclamation-circle" style="color:#f1c40f;"></i> Pending<br>MARKETING CAMPAIGN FOR PUBLIC ADOPTION</p>
						
						<p><i class="fa fa-exclamation-circle" style="color:#f1c40f;"></i> Pending<br>START DESIGN OF RADION SPEAKER DEVICE</p>
						
						<p><i class="fa fa-exclamation-circle" style="color:#f1c40f;"></i> Pending<br>FIRST LOOK OF RADION DEVICE SKETCH</p>
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
		<script type="text/javascript" src="js/fontawesome-all.js"></script> 
		<script type="text/javascript" src="js/plugins/dropzone/dropzone.min.js"></script>		
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
        <!-- END TEMPLATE -->
		       
		<script type="text/javascript">
		
	$(document).ready(function (e) {

	$("#album_name").keypress(function(event) {
    var character = String.fromCharCode(event.keyCode);
    return isValid(character);     
});

function isValid(str) {
    return !/[~`!@#$%\^&*()+=\-\[\]\\';,/{}|\\":<>\?]/g.test(str);
}
	
	
	 var x = document.getElementById("uploading_progress");
	         x.style.display = "none";

$("#music_upload_form").on('submit',(function(e) {


e.preventDefault();


$('#uploading_progress').show();
$('#music_upload_form').hide();
  x.style.display = "block";


$.ajax({

url: "music_upload_Operation.php",
type: "POST",             
data: new FormData(this), 
contentType: false,       
cache: false,             
processData:false,      
success: function(data) 
{
//alert(data);
if(data=="success"){
	 			$( "#submit_btn" ).prop( "disabled", true );

   x.style.display = "none";
$('#music_upload_form').show();
 $('#music_upload_form')[0].reset();
  document.getElementById("progressing_").style.width=0;
document.getElementById('progressing_').style = 'width: '+0+'%;';

  noty({text: 'Submission was successfull!', layout: 'topRight', type: 'success'});


}else{
   x.style.display = "none";
$('#music_upload_form').show();



  noty({text: 'Something is wrong , Please try again !', layout: 'topRight', type: 'error'});
	 			$( "#submit_btn" ).prop( "disabled", true );

}
  
},error: function(jqXHR, textStatus, errorThrown){
//alert("Has Error");
	 			$( "#submit_btn" ).prop( "disabled", true );

         }
});
}));
});
	
	function form_progress_check(type){
	//per contant=12.5;
	//	alert();

	var gener_=0;
	var mp3_found=0;
	var song_length_=0;
	var copyright_=0;
	var filenameimg_=0;
	var agree_disagree_=0;
	var investor_need_=0;
	var song_name_=0;
	var song_album_=0;
	
	copyright11_val= 0;
	copyright12_val=0 ;
	copyright13_val=0;
	copyright14_val=0;
	song_genre_=$("#song_genre").val();
	
	song_name=$("#song_name").val();
	song_length=$("#song_length").val();
	filenamemp3=$("#filenamemp3").val();
	filenameimg=$("#filenameimg").val();
  agree_disagree =$('#agree_disagree').is(':checked'); 
	copyright= $('input[name=copyright]:checked').val();
	investor_need= $('input[name=investor_need]:checked').val();
	
	copyright11= $('input[name=copyright11]:checked').val();
	copyright12= $('input[name=copyright12]:checked').val();
	copyright13= $('input[name=copyright13]:checked').val();
	copyright14= $('input[name=copyright14]:checked').val();
	
	
	invest_amount=$("#invest_amount").val();
	album_name=$("#album_name").val();
	
	
	if(album_name!=""){
			song_album_=8.3333333;
}
	
if(song_name!=""){
song_name_=8.3333333;

}



	if(typeof copyright11 === 'undefined'){

	}else {
copyright11_val= 8.3333333;
	

	
	}	
	
	if(typeof copyright12 === 'undefined'){

	}else {

	copyright12_val=8.3333333 ;
	
	}
	
	if(typeof copyright13 === 'undefined'){

	}else {

	copyright13_val=8.3333333;
	}
	
	if(typeof copyright14 === 'undefined'){

	}else {

	copyright13_val=8.3333333;
	}

	
	
	if(typeof investor_need === 'undefined'){

	
	}else {
	
	if(investor_need==0){
	$("#invest_amount").prop('disabled', false);

		if(invest_amount!=""){

			investor_need_=8.3333333;
	}
	
	}else{
	$("#invest_amount").prop('disabled', true);
	investor_need_=8.3333333;

	
	}
	

	}
	
	if(agree_disagree){
	agree_disagree_=8.3333333;
	
	}
	
	if(typeof copyright === 'undefined'){
	//alert(copyright);
	}else {
		copyright_=8.3333333;

	}
	
	 if(song_length!=""){
		song_length_=8.3333333;
		}
		if(filenameimg.length>0){
		
		if(validate_image_fileupload(filenameimg)){
		
				filenameimg_=8.3333333;

		}
		}
		if (filenamemp3.length > 0) {
		
		if(validate_fileupload(filenamemp3)){
		//alert();
		mp3_found=8.3333333;
          }


		}
	
	   if(song_genre_!=0){
    	gener_=8.3333333;
	  }

	  
	final_progress=gener_+mp3_found+song_length_+copyright_+filenameimg_+agree_disagree_+investor_need_+song_name_+song_album_+copyright11_val+copyright12_val;
	//alert(gener_+":"+mp3_found+":"+song_length_+":"+copyright_+":"+filenameimg_+":"+agree_disagree_+":"+investor_need_+":"+song_name_);
	
	
	
	
	
	final_progress=Math.floor(final_progress);
	$("#progressing_1").html(final_progress);
	 document.getElementById("progressing_").style.width=final_progress;
document.getElementById('progressing_').style = 'width: '+final_progress+'%;';
if(final_progress>90){


	 			$( "#submit_btn" ).prop( "disabled", false );


}else{
	 			$( "#submit_btn" ).prop( "disabled", true );

}

	//alert(final_progress);

if(type==1){
if(final_progress>90){
/////Go for submit Informtion

$("#music_upload_form").submit();

}else{

	
	$("#warning_btn").click();



}

}

	}
	



function validate_fileupload(fileName)
{


    var allowed_extensions = new Array("mp3","mp4","m4a","MP3","m4a","M4A");
    var file_extension = fileName.split('.').pop().toLowerCase(); // split function will split the filename by dot(.), and pop function will pop the last element from the array which will give you the extension as well. If there will be no extension then it will return the filename.

    for(var i = 0; i <= allowed_extensions.length; i++)
    {
        if(allowed_extensions[i]==file_extension)
        {

		 var file =document.getElementById("filenamemp3").files[0],
        url = file.urn || file.name;

      ID3.loadTags(url, function() {
        showTags(url);
      }, {
        tags: ["title","artist","album","picture"],
        dataReader: ID3.FileAPIReader(file)
      });
		
		
		
		return true; // valid file extension
		}
    }
noty({text: 'Invalid MP3 file, Please upload valid file!', layout: 'topRight', type: 'error'});

      document.getElementById('song_name').value =  "";
      document.getElementById('album_name').value =  "";
     
document.getElementById("filenamemp3").value = "";
form_progress_check(0);
    return false;
}
	
	function validate_image_fileupload(fileName)
{


    var allowed_extensions = new Array("jpg","JPG","png","PNG");
    var file_extension = fileName.split('.').pop().toLowerCase(); // split function will split the filename by dot(.), and pop function will pop the last element from the array which will give you the extension as well. If there will be no extension then it will return the filename.

    for(var i = 0; i <= allowed_extensions.length; i++)
    {
        if(allowed_extensions[i]==file_extension)
        {

		
		return true; // valid file extension
		}
    }
noty({text: 'Invalid image file, Please upload valid JPG/PNG file!', layout: 'topRight', type: 'error'});

document.getElementById("filenameimg").value = "";
    return false;
}

	</script>
		<script>
	
	$(document).ready(function(){
	express_view();
	load_status_table();
	
	setInterval(function(){ 
	
	load_status_table();
	currents_asset_table();
	}, 1000);
	
		 $.ajax(
            {
                url: 'https://api.coinmarketcap.com/v1/ticker/tezos/',
                type: "GET",
                success:function(data, textStatus, jqXHR)
                {
					
					
					
					var vlolumn_usd=data[0]["24h_volume_usd"];
					var token_price_raw =data[0].price_usd;
				
					var num = new Number(token_price_raw);
					var token_price=num.toFixed(2);
					
					
					var market_cap_usd = data[0].market_cap_usd;
					
					
					$("#market_cap").html("$"+market_cap_usd);
					$("#token_price").html("$"+token_price);
					$("#volume_price").html("$"+vlolumn_usd);
					

                },
                error: function(jqXHR, textStatus, errorThrown){

                    console.log("Ajax Failed Error In Saving:" + textStatus);


                }
            });
			
		
		
	});
	
	
	function load_status_table(){
	
	//alert();
	
		 $.ajax(
            {
                url: 'submission_status_table.php',
                type: "POST",
                success:function(data, textStatus, jqXHR)
                {
				//	alert();
					
			      $("#status_table").html(data);

                },
                error: function(jqXHR, textStatus, errorThrown){

                    console.log("Ajax Failed Error In Saving:" + textStatus);


                }
            });
	
	
	
	
	}
	
	
		function currents_asset_table(){
	
	//alert();
	
		 $.ajax(
            {
                url: 'php/current_asset_table.php',
                type: "POST",
                success:function(data, textStatus, jqXHR)
                {
				//	alert();
					
			      $("#current_asset_table").html(data);

                },
                error: function(jqXHR, textStatus, errorThrown){

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
on_link='<a href=http://'+result[3]+' target="_blank" style="text-decoration:none" rel="nofollow"> Visit sponsor</a>'; 
}
 $("#on_sibmission").html(result[2]+on_link);	
 
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

<div class="modal" id="modal_no_footer" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="defModalHead"><i class="fa fa-exclamation-circle"></i> LICENSING CHART</h4>
                    </div>
                    <div class="modal-body">
					<p align="justify" style="padding-left:3%; padding-right:3%; padding-bottom:20px;">Creative Commons is a one of several public 
						copyright license that enable the free distribution of an otherwise copyrighted "work" and it is characterized by the following icon 
						<i class="fab fa-creative-commons fa-lg"></i>.<br><br>
						Public license or public copyright license is a license by which a copyright holder as licensor 
						can grant additional copyright permissions to any and all persons in the general public as licensees.</p>
                        
						<div style="background-color:#CCE4C8; padding:25px 5px 5px 25px; height:100px;">
						<i class="fab fa-creative-commons fa-2x"></i> <i class="fab fa-creative-commons-by fa-2x"></i> <span style="padding-left:85px; padding-right:30px;"> = </span><span align="right">Attribution alone</span><br>
						<i class="fab fa-creative-commons fa-2x"></i> <i class="fab fa-creative-commons-by fa-2x"></i> <i class="fab fa-creative-commons-sa fa-2x"></i> <span style="padding-left:60px; padding-right:30px;"> = </span> <span align="right">Attribution + ShareAlike</span>
						<p style="padding-top:5px; padding-right:10px; color:#27ae60" align="right"> - Attribution and allow Share, Remix and Commercial use -</p>
						</div>
						
						<div style="background-color:#E5EED6; padding:25px 5px 5px 25px; height:100px;">
						<i class="fab fa-creative-commons fa-2x"></i> <i class="fab fa-creative-commons-by fa-2x"></i> <i class="fab fa-creative-commons-nc fa-2x"></i> <span style="padding-left:60px; padding-right:30px;"> = </span><span align="right">Sharing + Non-Commercial</span><br>
						<i class="fab fa-creative-commons fa-2x"></i> <i class="fab fa-creative-commons-by fa-2x"></i> <i class="fab fa-creative-commons-nc fa-2x"></i> <i class="fab fa-creative-commons-sa fa-2x"></i> <span style="padding-left:35px; padding-right:30px;"> = </span><span align="right">Attribution + Noncommercial + ShareAlike</span>
						<p style="padding-top:5px; padding-right:10px; color:#27ae60" align="right">- Attribution and allow Share and Remix only -</p>
						</div>
						
						<div style="background-color:#F4F4D2; padding:25px 5px 5px 25px; height:100px;">
						<i class="fab fa-creative-commons fa-2x"></i> <i class="fab fa-creative-commons-by fa-2x"></i> <i class="fab fa-creative-commons-nd fa-2x"></i><span style="padding-left:60px; padding-right:30px;"> = </span><span align="right">Attribution + NoDerivatives</span><br>
						<i class="fab fa-creative-commons fa-2x"></i> <i class="fab fa-creative-commons-by fa-2x"></i> <i class="fab fa-creative-commons-nc fa-2x"></i> <i class="fab fa-creative-commons-nd fa-2x"></i><span style="padding-left:35px; padding-right:30px;"> = </span><span align="right">Attribution + Noncommercial + NoDerivatives</span>
						<p style="padding-top:5px; padding-right:10px; color:#f39c12" align="right">- Attribution and allow Share only. *Option 1 also allow Commercial use -</p>
						</div>
						<div style="background-color:#EDE2E2; padding:25px 5px 5px 25px; height:80px;">
						<i class="fa fa-copyright fa-2x"></i> <span style="padding-left:110px; padding-right:30px;"> = </span><span align="right">All Rights Reserved</span><br>
						<p style="padding-top:5px; padding-right:10px; color:#c0392b" align="right"> - Least Open -</p>
						</div>
						
						
						<br>
						<p align="justify" style="padding-right:3%; padding-left:3%;"><strong>IMPORTANT NOTE</strong>:<br><br> We recommend you the following Licensing to 
						distribute your work in our platform.  
						<i class="fab fa-creative-commons fa-lg"></i> 
						<i class="fab fa-creative-commons-by fa-lg"></i> 
						<i class="fab fa-creative-commons-nc fa-lg"></i> 
						<i class="fab fa-creative-commons-nd fa-lg"></i>
						<br>
						<br>
						Keep in mind that CC license does not create conflic with other agreement as long as you don't have an exclusive deal. If you put your music under a non-commercial or no derivatives license, you still open 
						to other deals. Agency or entities can contact you directly through RADION platform at any time. Just keep your profile info updated.<br>
						<br>
						<p>
						<div align="right">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
                    </div>
                </div>
            </div>
        </div>
	
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





