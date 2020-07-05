<?php
session_start();
$groupswithaccess="PUBLIC,RADIONER,CEO";
$loginpage=$slpagename;
$logoutpage=$slpagename;
$loginredirect=0; 
require_once("slpw/sitelokpw.php");
require_once("slpw/slcontactform.php");
//var_dump($_SESSION);
?>

<?php 
//logout code 

if(isset($_REQUEST['logout']) && $_REQUEST['logout'] == 'true'){
    require_once 'slpw/slconfig.php';
    $sql = "DELETE FROM sl_whoisonline WHERE userid = '".$_SESSION["ses_sluserid"]."'";
    $res = mysqli_query($con, $sql);
    session_destroy();
    if($res){
        header("location:$base_address");
    }  
}
    
?>
<!-- API INTEGRATION -->
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
<!-- END API INTEGRATION -->

<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>RADION&trade;</title>
		<meta property="og:url"           content="https://radion.fm" />
		<meta property="og:type"          content="website" />
		<meta property="og:title"         content="RADION&trade; FM" />
		<meta property="og:description"   content="Independent Record Label with Blockchain Technology."/>
		<meta property="og:image"         content="https://radion.fm/img/facebook-img.png" />
		<meta charset="UTF-8">
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
		<link rel="stylesheet" type="text/css" href="css/tezos-graph.css" />
		<link rel="stylesheet" type="text/css" href="css/goodies.css" />
		
        <!-- EOF CSS INCLUDE -->    
        <!-- CSS INCLUDE -->
        <link rel="stylesheet" type="text/css" href="css/ion/ion.rangeSlider.css"/>
        <link rel="stylesheet" type="text/css" href="css/ion/ion.rangeSlider.skinFlat.css"/>
        <!-- EOF CSS INCLUDE -->
		
		<!-- RADIO STATIONS -->
		<link rel="stylesheet" type="text/css" href="radio/radio.css"/>
		
		
		
		 <!--script src='js/votes.js'></script-->	
		<script type="text/javascript">
		var blabfolderpath="/slpw/plugin_blab/"</script>
		<link rel="stylesheet" type="text/css" href="/slpw/plugin_blab/blab.css">
		<script type="text/javascript" src="/slpw/plugin_blab/sarissa.js"></script>
		<script type="text/javascript" src="/slpw/plugin_blab/blab.js"></script>
		
		<?php if (function_exists('sl_contactformhead')) sl_contactformhead(7,false); ?>
		<?php if (function_exists('startwhoisonline'))  //startwhoisonline(""); ?>

<style>
.linko { color: #FFF; }
.linko:hover { color: #F39C12; }
.fa-github: { color: #FFF; }
.fa-github:hover {
color:#F39C12; }
</style>

</head>
<body>
        <!-- START PAGE CONTAINER -->
        <div class="page-container page-navigation-top page-navigation-top-custom ">  
		
            <!-- PAGE CONTENT -->
            <div class="page-content">
                <!-- FAIL MESSAGE -->
				
			<div class="message-box message-box-warning animated fadeIn" data-sound="fail" id="message-box-sound-2">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-exclamation-triangle"></span> Hi there!</div>
                    <div class="mb-content">
                        <p>You have to Login to vote. If you don't have an account yet, please Register for Free.</p>                    
                    </div>
                    <div class="mb-footer">
                        <button class="btn btn-default btn-lg pull-right mb-control-close">Close</button>
						<li><a href="login.php"><span class="fas fa-sign-in-alt"></span> LOGIN</a></li>
						<li><a href="registration.php"><span class="fas fa-sign-in-alt"></span> REGISTER</a></li>
                    </div>
                </div>
            </div>
        </div>
<button type="button" id="failed_btn" class="btn btn-danger mb-control hide" data-box="#message-box-sound-2">Fail</button>                
              <!-- END FAILD MESSAGE -->
                
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
                        <a href="#"><i class="fal fa-signal-stream fa-lg"></i> <span class="xn-text"> &nbsp &nbsp STATIONS</span> </a>
                        <ul class="animated zoomIn">
							
							<li id="station0" class="station">
							<a href="#" class="title"><i class="fal fa-signal-stream fa-lg"></i>&nbsp
							<div id="title0" class="subtitle"></div>
							<div id="playing0" class="playing">
							<div class="rect1"></div>
							<div class="rect2"></div>
							<div class="rect3"></div>
							<div class="rect4"></div>
							<div class="rect5"></div>
							</div>
							</a> 
							<div class="informer informer-danger"><i class="fas fa-volume-up"> </i> LIVE</div></li>
							
														
							<li id="station1" class="station">
							<a href="#" class="title"><i class="fas fa-podcast fa-lg"></i>&nbsp
							<div id="title1" class="subtitle"></div>
							<div id="playing1" class="playing">
							<div class="rect1"></div>
							<div class="rect2"></div>
							<div class="rect3"></div>
							<div class="rect4"></div>
							<div class="rect5"></div>
							</div>
							</a> 
							<div class="informer informer-default">OFF</div></li>
							
							
							<li id="station2" class="station">
							<a href="#" class="title"><i class="fal fa-signal-stream fa-lg"></i>&nbsp
							<div id="title2" class="subtitle"></div>
							<div id="playing2" class="playing">
							<div class="rect1"></div>
							<div class="rect2"></div>
							<div class="rect3"></div>
							<div class="rect4"></div>
							<div class="rect5"></div>
							</div>
							</a> 
							<div class="informer informer-default">OFF</div></li>
							
							<li id="station3" class="station">
							<a href="#" class="title"><i class="fal fa-signal-stream fa-lg"></i>&nbsp
							<div id="title3" class="subtitle"></div>
							<div id="playing3" class="playing">
							<div class="rect1"></div>
							<div class="rect2"></div>
							<div class="rect3"></div>
							<div class="rect4"></div>
							<div class="rect5"></div>
							</div>
							</a> 
							<div class="informer informer-default">OFF</div></li>
							
							<li id="station4" class="station">
							<a href="#" class="title"><i class="fal fa-signal-stream fa-lg"></i>&nbsp
							<div id="title4" class="subtitle"></div>
							<div id="playing4" class="playing">
							<div class="rect1"></div>
							<div class="rect2"></div>
							<div class="rect3"></div>
							<div class="rect4"></div>
							<div class="rect5"></div>
							</div>
							</a> 
							<div class="informer informer-default">OFF</div></li>
							
							
							
						    <li><a href="#"><i class="fal fa-signal-stream fa-lg"></i>&nbsp HIP HOP STATION</a><div class="informer informer-default">OFF</div></li>
                            <li><a href="#"><i class="fal fa-signal-stream fa-lg"></i>&nbsp ROCK STATION</a> <div class="informer informer-default">OFF</div></li>
                            <li><a href="#"><i class="fal fa-signal-stream fa-lg"></i>&nbsp COUNTRY STATION</a> <div class="informer informer-default">OFF</div></li>
                            <li><a href="#"><i class="fal fa-signal-stream fa-lg"></i>&nbsp POP STATION</a> <div class="informer informer-default">OFF</div></li>
							<li><a href="#"><i class="fal fa-signal-stream fa-lg"></i>&nbsp RAP STATION</a> <div class="informer informer-default">OFF</div></li>
							</ul>
							</li>
						<!-- END STATIONS MENU -->
						<!-- MARKETPLACE MENU -->
					
					<li class="xn-openable">
                        <a href="#"><span class="fa fa-store"></span> <span class="xn-text"> &nbsp &nbsp MARKETPLACE</span> </a>
                        <ul class="animated zoomIn">
							<li><a href="#"><span class="fa fa-check-circle" style="color:#04B431;"></span>&nbsp <strong>TOTAL SUBMISSIONS</strong> </a> <div class="informer informer-success"  id="total_submission">+679</div></li>
                            
                            <li><a href="#"><span class="fa fa-minus-circle"></span>&nbsp PODCAST </a> <div class="informer informer-warning" id="talk_show_">0</div></li>
							<li><a href="#"><span class="fa fa-minus-circle"></span>&nbsp LATINO</a> <div class="informer informer-warning" id="latin_">0</div></li>
							<li><a href="#"><span class="fa fa-minus-circle"></span>&nbsp DJs MIX</a> <div class="informer informer-warning" id="djmix">0</div></li>
							<li><a href="#"><span class="fa fa-minus-circle"></span>&nbsp ROCK</a> <div class="informer informer-default" id="rock_">0</div></li>
                            <li><a href="#"><span class="fa fa-minus-circle"></span>&nbsp COUNTRY</a> <div class="informer informer-default" id="cpuntry">0</div></li>
                            <li><a href="#"><span class="fa fa-minus-circle"></span>&nbsp POP</a> <div class="informer informer-default" id="pop_">0</div></li>
							<li><a href="#"><span class="fa fa-minus-circle"></span>&nbsp RAP</a> <div class="informer informer-default" id="rap_">0</div></li>
							<li><a href="#"><span class="fa fa-minus-circle"></span>&nbsp HIP HOP / R&B </a><div class="informer informer-default" id="hip_hop">0</div></li>
							</ul>
							</li>
							<!-- END MARKETPLACE MENU -->
					
					<li class="xn-icon-button pull-right" style="margin-right:0px;">
					<a href="#" class="sidebar-toggle"><span class="fas fa-comment-dots fa-lg"></span></a>						
                    </li> 
					
					<!-- PROFILE MENU UPPER CORNER RIGHT -->
					<li class="x-features-profile pull-right">	
						<a href="#" style="background-color:inherit">
						<img src="<?php siteloklink($slcustom2,0); ?>" style="display:inline-block; border-radius:50%; width:28px; height:28px; margin-top:-4px; margin-bottom:-7px; background-color:#1D2127;" alt=""/>
						<span class="fas fa-angle-down fa-lg"></span>
						</a>
						
                        <ul class="xn-drop-left animated zoomIn">
						    <?php if (isset($_SESSION) && isset($_SESSION["ses_sluserid"])){ ?>
							<div style="padding:10px;">
							<img src="<?php siteloklink($slcustom2,0); ?>" style="display:inline-block; border-radius:50%; width:32px; height:32px; margin-bottom:-10px; background-color:#1D2127;" alt=""/>
							<span style="color:#fff; padding-top:15px; padding-left:10px; padding-bottom:5px; font-size:13px;"><strong><?php echo $slusername; ?></strong></span>
							<div style="color:#F39C12; padding-left:45px; font-size:10px;"><?php echo $slemail; ?></div>
							</div>
							
						    <li><a href="#" class="mb-control" data-box="#mb-dashboard"><span class="fas fa-sign-in-alt fa-lg"></span> &nbsp &nbsp DASHBOARD</a></li>
							<li><a href="#" class="mb-control"><span class="fas fa-language fa-lg"></span> &nbsp &nbsp LANGUAGE :&nbsp English</a></li>
							<li style="border-bottom: 1px dotted #7B7D7D;"><a href="#" class="mb-control"><span class="fas fa-map-marker-alt fa-lg"></span> &nbsp &nbsp &nbsp LOCATION : <?php echo $slcustom1; ?></a></li>
							<li><a href="#" class="mb-control"><i class="fas fa-money-check-alt"></i><span> &nbsp &nbsp BALANCE :</span> <?php echo sprintf("%.2f",$slcustom20); ?></a></li>
							<li><a href="#modal_basic" data-toggle="modal" class="mb-control"><span class="fas fa-shopping-cart fa-lg"></span>&nbsp &nbsp BUY MEMBERSHIP UNITS</a></li>
							<li><a href="#" class="mb-control" data-box="#mb-signout"><span class="fas fa-sign-out-alt fa-lg"></span> &nbsp &nbsp LOGOUT</a></li>
							
							<?php }else{ ?>
                            <li><a href="login.php"><span class="fas fa-sign-in-alt fa-lg"></span> &nbsp &nbsp LOGIN</a></li>
							<li><a href="registration.php"><span class="fas fa-sign-in-alt fa-lg"></span> &nbsp &nbsp SIGN UP FOR FREE</a></li>
							
							<?php } ?>
                        </ul>
                    </li>
					<!-- END PROFILE MEANU UPPER CORNER RIGHT -->
                </div>
			  <!-- END X-NAVIGATION VERTICAL -->

			  <!-- AD FEATURE / REQUIRE BACK-END -->
                <?php
				require_once 'php/db.php';
				$get_image="SELECT * FROM `slconfig` WHERE  `confignum`=1  ";
$Student_img="img/radion022.jpg";
				  $result = $con->query($get_image);
                                 
                                      if ($result->num_rows > 0) { 
                                      while($row = $result->fetch_assoc()){
									  
									  $LAST_AD_ID=$row["LAST_AD_ID"];
									  
		 $select_ads="SELECT express_ads.* FROM `express_ads` JOIN sitelok ON sitelok.Username=express_ads.Username WHERE `express_ads_main_home_page`=1 AND sitelok.Custom19>2.5    AND express_ads_id=$LAST_AD_ID  AND express_ads.express_ads_p_impress>0";

									$resul1t = $con->query($select_ads);
                                 
                                      if ($resul1t->num_rows > 0) { 
                                      while($row1 = $resul1t->fetch_assoc()){
									  
									$Username=$row1["Username"];
									$Student_img = "ad_images/".$LAST_AD_ID."/"; 
	 
	 if ($files = glob($Student_img."/*")){
	   $Student_img=$files[0];
    }else{
 	 
   }
    
if(isset($_SESSION['lastid']) && !empty($_SESSION['lastid'])){
	
if($_SESSION['lastid']!=$LAST_AD_ID){
	  $update_impression="UPDATE `express_ads` SET `express_ads_impressions`=express_ads_impressions+1 WHERE `express_ads_id`=$LAST_AD_ID";
									  
									          $result111 = $con->query($update_impression);
											  $update_impressio11="UPDATE `sitelok` SET `Custom19`=Custom19-2.5 WHERE `Username`='$Username'";
											  $result1111 = $con->query($update_impressio11); 
									          $update_impressio11="UPDATE `sitelok` SET `Custom19`=Custom19+2.5 WHERE `Username`='RADION'";
									          $result1111 = $con->query($update_impressio11);

}
					  
									  }
									  	}} 	
									  }}
					
				?>
				<!-- END AD FEATURE / REQUIRE BACK-END -->
		<!-- FRONT-END MODULE -->		
        <div class="page-content-wrap">
            <div class="row backg" style="background-color:#101215; overflow:hidden; height:700px; background-image:<?php echo $Student_img;?>;" >
            <div class="col-md-8" style="margin-top:0px; padding-top:0px; padding-bottom:0px; padding-left:0px;">

			
			<div style="padding-top:30px; padding-bottom:30px; padding-left:3%; border-radius:0 0 100% 0; background:radial-gradient(circle at 0% 0%, #000000 25%, #000000 40%, transparent 70%);
			margin-left:-15px; height:700px; width:85%;">
			<span style="clear:left;">
			<div style="color:#ccc; margin-bottom:10px;">
			<span style="margin-left:3px; margin-bottom:10px; padding-left:8px; padding-right:8px; border-radius:3px; text-align: center; background-color:#424949; 
height:18px; color:#fff; display:inline-block; family-font:Arial;"> <i class="fad fa-user-music"></i> </span> <span id="artist_name" style="font-family:Arial;"></span></div>
  

			<div style="float:left;">
			<div style="padding-right:145px; display:" class="blobs-container">
			<button class="btn btn-default btn-rounded btn-paused blob white" style="z-index:1; position:absolute; margin-left:45px; margin-top:45px;" onclick="music_control()" data-toggle="tooltip" data-placement="top" >
			<i class="fas fa-signal-stream" style="color:#2980b9;" id="play_icon"></i>
			</button>
			</div>
			<div id="imgDiv">
			<img  src='https://radion.fm:8002/playingart?sid=1' height="130" width="130" style="z-index:-1; filter:alpha(opacity=40); opacity: 0.4; border-radius:15px 50px;">
			</div>
			</div>
			
			<div style="padding-bottom:5px;">
			<span style="color:#D35400;"><strong id="station_name"> - MAIN STATION - <i style="margin-left:10px; margin-bottom:10px; padding-left:10px; padding-right:10px; border-radius:3px; text-align: center; background-color:#C0392B; height:18px; color:#fff;
  display:inline-block; family-font:Arial;">LIVE</i></strong></span>
			</div>
			<span style="color:#ccc; family-font:Arial; padding-right:5px;">TITLE:</span> 
			<span style="color:#fff; family-font:Arial;" id="songTitle" class='songTitleSpan'></span> 
			
			<span style="padding-right:10px; padding-left:10px; color:#aaaaaa;">| </span> 
			<span style="color:#ccc; padding-right:5px;">Licensed: </span>
			<span>
			<a href="https://creativecommons.org/licenses/by-nc-nd/4.0/" target="blank" rel="nofollow" style="text-decoration: none">
			<i class="fab fa-creative-commons" style="color:#ccc;"></i>
			<i class="fab fa-creative-commons-by" style="color:#ccc;"></i> 
			<i class="fab fa-creative-commons-nc" style="color:#ccc;"></i> 
			<i class="fab fa-creative-commons-nd" style="color:#ccc;"></i>
			</a>
			</span>
			
			<p style="color:#aaa; padding-top:5px; font-size:10px;">This work is licensed under Creative Commons<br>
			<span>Attribution-NonCommercial-NonDerivatives 4.0<br>International License.</span>
			</p>
			
			<button class="btn btn-primary btn-sm active" type="button" onclick="notyConfirm();" disabled><strong><i class="fas fa-download"></i> DOWNLOAD</strong></button>
			<input type="text" class="hide" value="0" id="stream_id">
			<input type="text" class="hide" value="0" id="music_id">
		
		    <span style="padding-left:10px;"><button class="btn btn-primary btn-xs active" id="like_post" disabled><i class="fas fa-thumbs-up"></i></button></span><span style="padding-right:5px; padding-left:5px; color:#AAAAAA;" id="like_count">0</span>
			<span><button class="btn btn-primary btn-xs active" id="unlike_post" disabled><i class="fas fa-thumbs-down"></i></button></span><span style="padding-right:5px; padding-left:5px; color:#AAAAAA;" id="unlike_count">0</span>
			<span><button class="btn btn-primary btn-xs active" id="love_post" disabled><i class="fas fa-heart"></i></button></span><span style="padding-right:5px; padding-left:5px; color:#AAAAAA;" id="love_count">0</span>
			<span><button class="btn btn-primary btn-xs active" id="share_post" disabled><i class="fas fa-share-alt"></i></button></span><span style="padding-right:5px; padding-left:5px; color:#AAAAAA;" id="share_count">0</span>
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
			<div style="margin-left:0px; margin-bottom:10px; padding-left:10px; padding-right:10px; border-radius:3px; font-weight: bold;text-align: center; background-color:#04B45F; height:20px; color:#fff;
  display:inline-block;">Coming Next:</div><br>
			<i class="far fa-comment-music fa-lg"></i> <span class="next_congcls"></span>
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
<div class="messages messages-img" id="message_box1" ></div>
<!-- END MESSAGES WITH IMAGES  -->
</div>
          
		  </div>
		  
<div class="x-navigation x-navigation-horizontal">
<!-- FINANCIAL DATA MENU --> 
<div style="color:#fff; font-family:Arial; padding-right:3%; margin-top:15px; margin-bottom:15px;" align="right">
<span><strong>Tezos</strong></span>
<span style="padding-left:15px; padding-right:15px;">|</span>
<span style="padding-right:0px; color:#B3B6B7;">Market Cap:&nbsp;&nbsp;&nbsp;<i class="fas fa-dollar-sign"></i></span> 
<span style="color:#B3B6B7;"><?php echo getValue('marketCapUsd') ?></span>
<span style="padding-left:10px; padding-right:10px;">-</span>
<span style="padding-right:0px; color:#B3B6B7;">24h Vol:&nbsp;&nbsp;&nbsp;<i class="fas fa-dollar-sign"></i></span> 
<span style="color:#B3B6B7;"><?php echo getValue('volumeUsd24Hr') ?></span>
<span style="padding-left:15px; padding-right:15px;">-</span>
<span>Price:&nbsp;&nbsp;&nbsp;<i class="fas fa-dollar-sign"></i></span>
<span><?php echo getValue('priceUsd') ?></span>
<span>
<?php
$changePercent24Hr = getValue('changePercent24Hr');
if(strpos($changePercent24Hr,'-')>-1 ){
//negative
echo '<span class="fas fa-sort-down fa-xs" style="vertical-align:2px;"></span> <span class="tDown" style="font-size:9px; vertical-align:2px;">'.$changePercent24Hr.'%</span>';
}else{
echo '<span class="fas fa-sort-up fa-xs" style="vertical-align:-2px;"></span> <span class="tUp" style="font-size:9px; vertical-align:2px;">'.$changePercent24Hr.'%</span>';
}
?>
</span>
</div>
<!-- END FINANCIAL DATA MENU -->
</div>		

<br>
<br>
<br>
</div>
<!-- END FRONT-END MODULE -->
    </div>  
</div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->

		
		
<!-- START SIDEBAR -->
        <div class="sidebar">            
            <div class="sidebar-wrapper scroll">
                
                <div class="sidebar-tabs">
                    <a href="#sidebar_1" class="sidebar-tab"><span class="fas fa-comment-dots"></span>&nbsp;&nbsp;CHAT</a>
                    <a href="#sidebar_2" class="sidebar-tab"><span class="fas fa-newspaper"></span>&nbsp;&nbsp;&nbsp;NEWS</a>
                </div>
                
                <div class="sidebar-tab-content active" id="sidebar_1">
                    
<!-- COMMENTS MODULAR -->
			 
<?php if (function_exists('sl_messagebox')) { sl_messagebox(array(
  'messagetype'=>'normal',
  'width'=>'100%',
  'maxwidth'=>'400px',
  'height'=>'700px',
  'sendenabled'=>true,
  'sendheight'=>'110px',
  'placeholder'=>MSG_BLAB_TYPEMSG,
  'profileid'=>'',
  'showframe'=>false,
  'showimage'=>true,
  'messagelinks'=>true,
  'about'=>'',
  'datetoday'=>'!A! ago',
  'dateearlier'=>'!D!/!M!/!Y! !H!:!I!',
  'userpage'=>'user-profile.php',
  'maxlength'=>'300',
  'number'=>7,
  'usernumber'=>11,
  'refresh'=>3,
  'sendfiles'=>true,
  'allowedfiles'=>'.jpg,.jpeg,.png,.gif',
  'maxfilesize'=>'2000000',
  'showfileimages'=>true,
)); } ?>
<!-- END COMMENTS MODULAR -->   
                    
                    
                </div>
                
                <div class="sidebar-tab-content form-horizontal" id="sidebar_2">

					<div style="padding-left:30px; padding-right:30px; height:1150px;">
					
					<small>
					<h5 style="color:#fff;">Jan 20 2020</h5>
					<p align="justify">We start migrating to Tezos Blockchain. Code will be modified in all our features accordingly. Soon to be tested...</p>
					</small>
					<br>
						<small>
						<h5 style="color:#fff;">Dec 26 2019</h5>
						<p align="justify">RADION FM beta was working under Ethereum Testnet, however, during this period of time we learned that as we integrated new features in our platform we have to create new contracts with the new updates. Unfortunately this is a path that doesn't fit our needs because Music Industry require a scalability and flexible expansion!
<br>
<br>
Micropayment as well as Distribution are some of the challenges that the talented musicians are facing today, therefore; in order to provide a real solution to the industry; we need a solid technology that allows easy scalability and a robust consensus mechanism to fit our project, and what better option than Tezos.
</p>
						</small> 
	
                    </div>
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
		
        <div class="col-md-3" align="left" style="height:130px; padding-right:1%; padding-top:25px;">
		<blockquote>
		<strong>- IMPORTANT NOTE -</strong><br>
		<div style="padding-top:8px;"></div>
		<i class="fab fa-creative-commons fa-lg"></i> <i class="fab fa-creative-commons-by fa-lg"></i> 
		<span align="justify" style="font-size:13px;">Except where otherwise noted, content on this site is licensed under a <a href="https://creativecommons.org/licenses/by/4.0/" target="blank" rel="nofollow">Creative Commons Attribution
		4.0 International license</a>.</span>
		</blockquote>

		</div>
		
		<div class="col-md-3" align="left" style="height:130px; padding-right:1%; padding-top:25px;">
		<blockquote>
		<strong>- TESTING ON MAINNET -</strong><br>
		<div style="padding-top:8px;"></div>
		<i class="fas fa-faucet fa-lg"></i> We use <a href="https://faucet.tezos.com" target="blank" />Tezos Foundation's Faucet</a> to fund and test some of our features in MainNet.
		</blockquote>

		</div>
		
		<div class="col-md-3" align="left" style="height:130px; padding-right:1%; padding-top:25px;">
		<blockquote>
		<strong>- FIND US ON SOCIAL MEDIA -</strong><br>
		<div style="padding-top:8px;"></div>
					
					<!-- SOCIAL MEDIA -->
					<button class="btn btn-rounded btn-default btn-xs" onClick="window.open('https://twitter.com/fm_radion','_blank')" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fab fa-twitter fa-lg"></i></button>
                    <button class="btn btn-rounded btn-default btn-xs" onClick="window.open('https://www.youtube.com/channel/UCuJOeoT-2o2stPXXJJGzAdg','_blank')" data-toggle="tooltip" data-placement="top" title="YouTube"><i class="fab fa-youtube fa-lg"></i></button>
					<!-- SOCIAL MEDIA -->
		
		<div style="padding-top:8px;"></div>
		
		</blockquote>
		</div>
		
		
		<div class="col-md-3" align="left" style="height:130px; padding-right:1%; padding-top:25px;">
		<blockquote>
		<strong>- OUR PARTNERS -</strong><br>
		<div style="padding-top:8px;"></div>
		<p><small>If you are interested about cryptocurrency, you should considering these essential tools & exchange.</small></p>
		<a href="https://shop.ledger.com/products/ledger-nano-s?r=801c167daf94" target="blank" rel="nofollow"> <img src="img/ledger-logo.jpg" height="15px" width="50px"></a>
		&nbsp;
		<a href="https://brave.com/?ref=rad217" target="blank" rel="nofollow"> <img src="img/brave-logo.jpg" height="15px" width="50px"></a>         
		&nbsp;
		<a href="https://r.kraken.com/04nZE" target="blank" rel="nofollow"> <img src="img/kraken-logo.jpg" height="20%" width="20%"></a>
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
						<div style="width:200px; filter:alpha(opacity=10); opacity: 0.9; padding-left:10px; margin-top:-20px;">
						<div align="left" style="color:#33414E; width:20px; height:20px;">

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
</svg></div>
<div align="left" style="color:#85929E; padding-left:25px; margin-top:-17px;">GRAPH</div>
</div>
						</div> 
						
                    </div>                    
			<!-- END DASHBOARD CHART -->
			
		</div>

		<div class="x-content-footer" align="center" style="padding-left:2%; padding-right:2%; background-color:#33414E; margin-top:200px;"> 
		 
		<a style="text-decoration: none;" href="#modal_small" data-toggle="modal"" target="blank" class="linko"> Contact Us</a>
		<span style="color: #85929E;">|</span>
		<a style="text-decoration: none;" href="UI-diagram.pdf" target="blank" class="linko"> UI Diagram</a>
		<span style="color: #85929E;">|</span> <a style="text-decoration: none;" href="white-paper.pdf" target="blank" class="linko"> White Paper</a>
		<div style="padding-top:30px; padding-bottom:10px;">
		<p style="color:#85929E; margin-bottom:-3px;">© 2020 RADION FM </p>
		<p style="color:#85929E;">Made with <i class="fas fa-heart"></i> in Delaware, U.S.</p>
		</div>
		</div>
		
		<div style="background-color:#33414E; padding-bottom:10px; padding-right:30px;" align="right">
		<a style="text-decoration: none;" href="privacy-policy.php" class="linko">Privacy Policy</a> 
		<span style="color: #85929E;">|</span> <a style="text-decoration:none;" href="terms-of-use.php" class="linko">Terms of Use </a>
		<span style="padding-right:20px; padding-left:20px;"></span>
		<a href="https://github.com/amakary" style="color:#fff;"><i class="fab fa-github fa-lg"></i></a>
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
						<p align="justify"><strong>Note:</strong>
						<br>
							You are about to enter into the Dashboard. Please keep in mind that this project is not funded by any organization nor private company, 
							development is made under pro-bonus work. If you want to contribute with this project please do not hesitate to contact us.</p>
						<br>
                        <p>Press No if you want to stay on this page. Press Yes to Go.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="submission.php" class="btn btn-info btn-lg">Yes</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->
		
		
<!-- MODAL CONTACT US -->        
        <div class="modal" id="modal_small" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content" style="width:350px; background-color:#222;">
                    <div class="modal-body" style="background-color:#222;">
					<h2 align="center" style="padding-top:30px; color:#fff;"><strong>CONTACT US</strong></h2>
					<br>
					<div align="jusity" style="padding-right:5px; padding-left:5px; font-size:9px; color:#515A5A;">
					<?php if (function_exists('sl_contactformbody')) sl_contactformbody(7,false); ?>
					</div>
                    
                </div>
            </div>
        </div>
    
<!-- END MODAL CONTACT US -->
		
        <!-- START PRELOADS -->
        <audio id="audio-alert" src="audio/alert.mp3" preload="auto"></audio>
        <audio id="audio-fail" src="audio/fail.mp3" preload="auto"></audio>

        <!-- END PRELOADS -->               

		<!-- START PLUGINS -->
        <script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="js/plugins/jquery/jquery-ui.min.js"></script>
		<script type="text/javascript" src="js/plugins/bootstrap/bootstrap.min.js"></script> 
		<script type="text/javascript" src="js/all.js"></script>         
        <!-- END PLUGINS -->
		<script type="text/javascript" src="js/plugins/morris/raphael-min.js"></script>
		<script type="text/javascript" src="js/plugins/rickshaw/rickshaw.min.js"></script>
		<script type="text/javascript" src="js/plugins/bootstrap/bootstrap-file-input.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap-select.js"></script>

        <!-- THIS PAGE PLUGINS -->
        <script type='text/javascript' src='js/plugins/icheck/icheck.min.js'></script> 
        <script type="text/javascript" src="js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        <!-- END PAGE PLUGINS -->       
		
		  <script type='text/javascript' src='js/plugins/noty/jquery.noty.js'></script>
          <script type='text/javascript' src='js/plugins/noty/layouts/topCenter.js'></script>
          <script type='text/javascript' src='js/plugins/noty/layouts/topLeft.js'></script>
          <script type='text/javascript' src='js/plugins/noty/layouts/topRight.js'></script>            
          <script type="text/javascript" src="js/plugins/nvd3/lib/d3.v3.js"></script>        
          <script type="text/javascript" src="js/plugins/nvd3/nv.d3.min.js"></script>
		  <script type="text/javascript" src="js/demo_charts_nvd3.js"></script>
		  <script type="text/javascript" src="js/demo_charts_nvd3-2.js"></script>			  
          <script type='text/javascript' src='js/plugins/noty/themes/default.js'></script>
		  <!-- Background Script -->
		  <script src='js/backgroundChange.js'></script>
		  <script type="text/javascript" src="js/demo_dashboard.js"></script>
		 
		  
		  <!-- BACKGROUND SCRIPT MODULAR -->
          
		  
		  <script type="text/javascript">   
            
			function notyConfirm(){
                    noty({
                        text: '<div align="justify" style="padding:15px;"><span class="fa fa-exclamation-circle"></span> <strong>CONFIRMATION IS NEEDED</strong><br>Please confirm your purchase. RADIO tokens will be taken from your wallet! Make sure you are logged in Metamask.</div><span style="padding-left:10px;"><strong>TOTAL </strong>:</span><span style="color:#FFC300;"> 1.00000000 RADIO</span>',
                        layout: 'topRight',
                        buttons: [
                                {addClass: 'btn btn-success btn-clean', text: 'Yes', onClick: function($noty) {
                                    $noty.close();
                                    //noty({text: 'You clicked "Ok" button', layout: 'topRight', type: 'success'});
                            
    make_parchase();
							}
                                },
                                {addClass: 'btn btn-danger btn-clean', text: 'No, Cancel', onClick: function($noty) {
                                    $noty.close();
                                    noty({text: 'Your Purchase was Canceled', layout: 'topRight', type: 'error'});
                                    }
                                }
                            ]
                    })                                                    
                }  

function make_parchase(){
		
		music_id=$('#music_id').val();
stream_id=$('#stream_id').val();

		
//window.location.href = 'php/download_song_script.php?ID='+sid;
		
		
		
var url ='php/download_song_script.php?mid='+music_id+'&sid='+stream_id;
    window.open(url, '_blank');

 
 }			
            </script>
			

	<script>
	$(document).ready(function(){
	 // $("#message_box").css("display", "block");
	express_view();
	});
	</script>
	
	
<!-- START TEMPLATE -->
<script type="text/javascript" src="js/plugins.js"></script>        
<script type="text/javascript" src="js/actions.js"></script>       
<!-- END TEMPLATE -->

<script type="text/javascript" src="js/plugins/smartwizard/jquery.smartWizard-2.0.min.js"></script>        
<script type="text/javascript" src="js/plugins/jquery-validation/jquery.validate.js"></script>
<script type="text/javascript" src="js/plugins/rangeslider/jQAllRangeSliders-min.js"></script>       
<script type="text/javascript" src="js/plugins/knob/jquery.knob.min.js"></script>
<script type="text/javascript" src="js/demo_sliders.js"></script>
<script type="text/javascript" src="js/plugins/ion/ion.rangeSlider.min.js"></script>
<script type="text/javascript" src="js/faq.js"></script>
<script type="text/javascript" src="radio/radio.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/howler/2.1.0/howler.core.min.js"></script>
<!-- END SCRIPTS -->

<script>            
            document.getElementById('links').onclick = function (event) {
                event = event || window.event;
                var target = event.target || event.srcElement;
                var link = target.src ? target.parentNode : target;
                var options = {index: link, event: event,onclosed: function(){
                        setTimeout(function(){
                            $("body").css("overflow","");
                        },200);                        
                    }};
                var links = this.getElementsByTagName('a');
                blueimp.Gallery(links, options);
            };
        </script> 


<script   type="text/javascript">	
function music_control() {
	//alert();
	/*var audioplayer = document.getElementById("audio_player");
    //console.log(radio);
	if (audioplayer.paused) {
		$('#play_icon').addClass('fa-stop');
		$('#play_icon').removeClass('fa-play');
		//audioplayer.load();
		//audioplayer.play();
		
	} else {
		//audioplayer.pause();
		
		$('#play_icon').addClass('fa-play');
		$('#play_icon').removeClass('fa-stop');
	}*/
}
$(document).ready(function() {
	//code by tariq start

	$(document).on("click",".btn-paused",function(){
		radio.play($('#stream_id').val());
		$('#play_icon').addClass('fa-stop');
		$('#play_icon').removeClass('fa-play');
		
		$(".btn-paused").removeClass("btn-paused").addClass("btn-playing");
//	$(".btn-playing").attr('title', 'Stop');
 // $('[data-toggle="tooltip"]').tooltip(); 
$(".btn-playing").tooltip('hide')
      .attr('data-original-title', 'Stop')
      .tooltip('show');

	});

	$(document).on("click",".btn-playing",function(){
		radio.stop();
		$('#play_icon').addClass('fa-play');
		$('#play_icon').removeClass('fa-stop');
		$(".btn-playing").removeClass("btn-playing").addClass("btn-paused");
			$(".btn-paused").attr('title', 'Play');
			$(".btn-paused").tooltip('hide')
      .attr('data-original-title', 'Play')
      .tooltip('show'); 

	});

	var playInterval;
	$(".station").on("click",function(){

		clearInterval(playInterval);
		var sid = $(this).attr("id");
		sid = sid.substring(7)*1+1;

		var sname = $(this).find(".subtitle").text();
		$('#station_name').text(sname);

		$('#stream_id').val(sid);

		$.ajax({
		url: "php/artworkUrl.php",
		type: 'GET',
		dataType: 'json',
		success: function(data) {
			var url;
			if (data['stream_ind'] === '0') {
				url = data['audio_url'] + 'playingart?sid=1ver=';
			} else {
				var u = data['audio_url'].split('?')[0];
				url = u + 'playingart?sid=' + data['stream_num'] + 'ver=';
			}
			console.log(url);
			getSongData(url,sid);
			//addPlayDateTime();
			$('#play_icon').addClass('fa-stop');
			$('#play_icon').removeClass('fa-play');
			$(".btn-paused").removeClass("btn-paused").addClass("btn-playing");
		},
		error: function(xhr, ajaxOptions, thrownError) {
			if (xhr.status === 404) {
				//alert('Not allowed.');
			}
			if (xhr.status === 403) {
				//alert('Not allowed.');
			}
		}
	});
		

	});

	
	//code by tariq end
	count_submission_music();
	setInterval(function() {
		count_submission_music();
	}, 5000);
	var song_name_sesssion = "";
	//music_control();
	function getSongData(url,sid="") {
		$.ajax({
			url: "php/_votingsys.php",
			type: 'GET',
			data : {
				sid : sid
			},
			dataType: 'json',
			success: function(data) {
				console.log("Success: "+ JSON.stringify(data));
				/////Countdown
				$('#like_count').html(data.isLikes);
				$('#unlike_count').html(data.isUnLike);
				$('#love_count').html(data.isLoveit);
				$('#share_count').html(data.isDedicate);
				$('#stream_id').val(data.stream_id);
				$('#music_id').val(data.music_id);
				//$('#station_name').html("");
				$('#potential_usd').html(data.potential_usd);
				$('#length').html(data.length);
				//////////ICON
				$('#like_post').html('<i class="fas fa-thumbs-up"></i>');
				$('#unlike_post').html('<i class="fas fa-thumbs-down"></i>');
				$('#love_post').html('<i class="fas fa-heart"></i>');
				$('#share_post').html('<i class="fas fa-share-alt"></i>');
				////
				//	artist_name
				var res = data.songTitle.split("-");
				$('.songTitleSpan').html('' + res[1]);
				var img_change = 0;
				if (song_name_sesssion != "" && song_name_sesssion != res[1]) {
					img_change = 1;
					song_name_sesssion = res[1];
				} else {
					song_name_sesssion = res[1];
				}
				$('#artist_name').html('' + res[0] + '');
				$('.next_congcls').html('' + data.nextSong);
				$('.fa-thumbs-down').removeClass('blue');
				$('.fa-thumbs-up').removeClass('blue');
				$('.fa-facebook-square').removeClass('facebookShare');
				$('.fa-download').removeClass('downloadPlus');
				$('.fa-heart').removeClass('lovedRed');
				//alert(String(data.isVoted));
				if (data.isVoted === '0') {
					$('.fa-thumbs-up').addClass('blue');
				} else if (data.isVoted === '1') {
					$('.fa-thumbs-down').addClass('blue');
				}
				//alert(String(data.isLoved));
				if (data.isLoved === 0) {
					$('.fa-heart').removeClass('red');
				} else if (data.isLoved == 1) {
					$('.fa-heart').addClass('red');
				}
				if (data.isDedicate === 0) {
					$('.fa-share-alt').removeClass('green');
				} else if (data.isDedicate === '1') {
					$('.fa-share-alt').addClass('green');
				}
				var d = new Date();
				//$('#imgDiv img').attr('src', '');
				if (data.artwork === 1) {
					//$('#imgDiv img').attr('src', 'aaaaaa');
					//$('#imgDiv img').attr('src',"https://radion.fm:8002/playingart?sid=1");
					//$("#imgDiv").empty();
					//alert( url + d.getTime());
					//alert(data.is_New);
					if (img_change == 1) {
						$('#imgDiv').html('<img  src="https://radion.fm:8002/playingart?sid='+data.stream_id+'&a=' + Math.random() + '" height="130" width="130" style="z-index:-1; filter:alpha(opacity=70); opacity: 0.7; border-radius:15px 50px;">');
					}
				} else {
					$('#imgDiv').html('<img  src="https://radion.fm/img/offline.jpg" height="130" width="130" style="z-index:-1; filter:alpha(opacity=70); opacity: 0.7; border-radius:15px 50px;">');				
				}
				$('#votingContainer').show();

				playInterval = setTimeout(function() {
					getSongData(url,$('#stream_id').val());
				}, 4000);
			},
			error: function(xhr, ajaxOptions, thrownError) {
				//alert(xhr.status);
				if (xhr.status === 404) {
					// not broadcasting
					$('#votingContainer').hide();
				}
				if (xhr.status === 403) {
					console.log('forbidden');
				}
			}
		});
	}
	$.ajax({
		url: "php/artworkUrl.php",
		type: 'GET',
		dataType: 'json',
		success: function(data) {
			var url;
			if (data['stream_ind'] === '0') {
				url = data['audio_url'] + 'playingart?sid=1ver=';
			} else {
				var u = data['audio_url'].split('?')[0];
				url = u + 'playingart?sid=' + data['stream_num'] + 'ver=';
			}
			//alert(url);
			//console.log(url);
			getSongData(url,1);
			//addPlayDateTime();
		},
		error: function(xhr, ajaxOptions, thrownError) {
			if (xhr.status === 404) {
				//alert('Not allowed.');
			}
			if (xhr.status === 403) {
				//alert('Not allowed.');
			}
		}
	});

	function sendAjax(vote) {
		//alert();
		if (vote == 1) {
			$('#like_post').html('<i class="fa fa-cog fa-spin animated"></i>');
		} else if (vote == 2) {
			$('#unlike_post').html('<i class="fa fa-cog fa-spin animated"></i>');
		} else if (vote == 3) {
			$('#love_post').html('<i class="fa fa-cog fa-spin animated"></i>');
		} else if (vote == 4) {
			$('#share_post').html('<i class="fa fa-cog fa-spin animated"></i>');
		}
		music_id = $('#music_id').val();
		stream_id = $('#stream_id').val();
		$.ajax({
			url: "php/vote_submit.php",
			type: 'POST',
			data: {
				'type': vote,
				'music_id': music_id,
				'stream_id': stream_id
			},
			success: function(data) {
				//   alert(data);
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
	$('#like_post').click(function() {
		var c = $(this);
		//alert("Like");
		$.ajax({
			url: "php/isLoggedIn.php",
			type: 'GET',
			success: function(data) {
				if (data === 'loggedIn') {
					sendAjax('1');
				} else {
					//alert('Sorry but only Radioners can vote. Register today or Log In if you are one us!');
					$("#failed_btn").click()
				}
			},
			error: function(xhr, ajaxOptions, thrownError) {
				if (xhr.status === 404) {
					//alert('Not allowed.');
				}
				if (xhr.status === 403) {
					console.log('sarma');
					//alert('Not allowed.');
				}
			}
		});
	});
	/* love vote js kanak */
	$('#love_post').click(function() {
		//alert("Love IT");
		var c = $(this);
		$.ajax({
			url: "php/isLoggedIn.php",
			type: 'GET',
			success: function(data) {
				if (data === 'loggedIn') {
					sendAjax('3');
				} else {
					$("#failed_btn").click()
				}
			},
			error: function(xhr, ajaxOptions, thrownError) {
				if (xhr.status === 404) {
					//alert('Not allowed.');
				}
				if (xhr.status === 403) {
					console.log('sarma');
					//	alert('Not allowed.');
				}
			}
		});
	});
	/* Unlike vote js kanak */
	$('#unlike_post').click(function() {
		//alert("Love IT");
		var c = $(this);
		$.ajax({
			url: "php/isLoggedIn.php",
			type: 'GET',
			success: function(data) {
				if (data === 'loggedIn') {
					sendAjax('2');
				} else {
					$("#failed_btn").click()
				}
			},
			error: function(xhr, ajaxOptions, thrownError) {
				if (xhr.status === 404) {
					//alert('Not allowed.');
				}
				if (xhr.status === 403) {
					console.log('sarma');
					//	alert('Not allowed.');
				}
			}
		});
	});
	/* Share vote js kanak */
	$('#share_post').click(function() {
		//alert("Love IT");
		var c = $(this);
		$.ajax({
			url: "php/isLoggedIn.php",
			type: 'GET',
			success: function(data) {
				if (data === 'loggedIn') {
					sendAjax('4');
				} else {
					$("#failed_btn").click()
				}
			},
			error: function(xhr, ajaxOptions, thrownError) {
				if (xhr.status === 404) {
					//alert('Not allowed.');
				}
				if (xhr.status === 403) {
					console.log('sarma');
					//	alert('Not allowed.');
				}
			}
		});
	});
	/* dedicate song vote js kanak */
	$('#shareForm').submit(function() {
		//var c = $('#shareForm');
		$.ajax({
			url: "php/isLoggedIn.php",
			type: 'GET',
			success: function(data) {
				if (data === 'loggedIn') {
					if ($('.dedicate').hasClass('dedicatedRed')) {
						sendAjax('removeDedicate');
						$('.dedicate').removeClass('dedicatedRed');
					} else {
						sendAjax('Dedicate');
						$('.dedicate').addClass('dedicatedRed');
					}
				} else {
					$("#failed_btn").click()
				}
			},
			error: function(xhr, ajaxOptions, thrownError) {
				if (xhr.status === 404) {
					//alert('Not allowed.');
				}
				if (xhr.status === 403) {
					console.log('sarma');
					//alert('Not allowed.');
				}
			}
		});
	});
	/* download song vote js kanak */
	$('.fa-download.thumbs-icon').click(function() {
		//alert('download');
		//var c = $('#shareForm');
		$.ajax({
			url: "php/isLoggedIn.php",
			type: 'GET',
			success: function(data) {
				if (data === 'loggedIn') {
					sendAjax('download');
				} else {
					$("#failed_btn").click()
				}
			},
			error: function(xhr, ajaxOptions, thrownError) {
				if (xhr.status === 404) {
					//alert('Not allowed.');
				}
				if (xhr.status === 403) {
					console.log('sarma');
					//alert('Not allowed.');
				}
			}
		});
	});
	//add paly timedate
	function addPlayDateTime() {
		$.ajax({
			url: "php/_votingsys.php",
			type: 'POST',
			data: {
				'count_latest_song': 'addPlayDateTime',
				'sid' : $('#stream_id').val()
			},
			dataType: 'html',
			success: function(data) {},
			error: function(xhr, ajaxOptions, thrownError) {}
		});
		/*setTimeout(function() {
			addPlayDateTime();
		}, 2000);*/
	}
}); 

function express_view() {
	$.ajax({
		url: "php/get_info.php",
		type: 'POST',
		data: {
			'type': 1
		},
		success: function(data) {
			// alert(data);
			if (!data.includes("NOTAVAIABLE")) {
				$("#message_box1").html(data);
				$('.item').css('opacity', '100');
				// alert(data);
			}
		},
		error: function(xhr, ajaxOptions, thrownError) {
			alert(xhr.status);
			if (xhr.status === 404) {
				//alert('Not allowed.');
			}
			if (xhr.status === 403) {
				//alert('Not allowed.');
			}
		}
	});
}

function info_like_unlike(type, a_id) {
	$.ajax({
		url: "php/isLoggedIn.php",
		type: 'GET',
		success: function(data) {
			if (data === 'loggedIn') {
				//	sendAjax('download');
				like_unlike(type, a_id);
			} else {
				$("#failed_btn").click()
			}
		},
		error: function(xhr, ajaxOptions, thrownError) {
			if (xhr.status === 404) {
				//alert('Not allowed.');
			}
			if (xhr.status === 403) {
				console.log('sarma');
				//alert('Not allowed.');
			}
		}
	});
}

function like_unlike(type, a_id) {
	// alert(type+":"+a_id);
	$.ajax({
		url: "php/like_unlike_submit.php",
		type: 'POST',
		data: {
			'type': type,
			'a_id': a_id
		},
		success: function(data) {
			//alert(data);
			$("#like_dislike_status" + a_id).html(data);
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

function click_count(id, link) {
	// alert(link);
	$.ajax({
		url: "php/click_update.php",
		type: 'POST',
		data: {
			'id': id
		},
		success: function(data) {
			// alert(data);
			window.open(link, '_blank');
			//	window.open = ('http://www.test.com', '_blank');
			//	window.location.replace("http://stackoverflow.com");
			//window.location.href = link;
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

function count_submission_music() {
	$.ajax({
		url: "php/waiting_to_discover_lsit.php",
		type: 'POST',
		data: {},
		success: function(data) {
			//echo $TOTAL_WAIT."###".$TOTAL_WAIT_ROCK."###".$TOTAL_WAIT_POP."###".$TOTAL_WAIT_COUNTRY."###".$TOTAL_WAIT_HIPHOP."###".$TOTAL_WAIT_LATIN."###".$TOTAL_WAIT_DJMIX."###".$TOTAL_WAIT_RAP."###".$TOTAL_WAIT_talk_show;
			var res = data.split("###");
			$('#total_submission').html(res[0]);
			$('#hip_hop').html(res[4]);
			$('#rock_').html(res[1]);
			$('#cpuntry').html(res[3]);
			$('#pop_').html(res[2]);
			$('#rap_').html(res[7]);
			$('#djmix').html(res[6]);
			$('#latin_').html(res[5]);
			$('#talk_show_').html(res[8]);
			//total_submission
			//alert(data);
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
<!-- TEZOS CHART -->
<script>
  $(function () {
    let data = {}
    function reqListener() {

    }

    var oReq = new XMLHttpRequest(); // New request object
    oReq.onload = function () {
      d1 = this.responseText;
      makeGraph(d1);
     

    };
    oReq.open("get", "tezos.php", true);
    //                               ^ Don't block the rest of the execution.
    //                                 Don't wait until the request finishes to
    //                                 continue.
    oReq.send();

    function makeGraph(data) {
      data = JSON.parse(data)
      
      var today = new Date()
       var days = 86400000 //number of milliseconds in a day
       var fiveDaysAgo = new Date(today - (365*days))
      var newArray = [];
      for (let k in data.data) {
      
       if(data.data[k].time>fiveDaysAgo){
        newArray.push({ 'x': parseFloat(k), 'y': parseFloat(data.data[k].priceUsd)});
      }}
     
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
      var graph = new Rickshaw.Graph({
        element: document.getElementById("charts-legend"),
        renderer: 'area',
        stack: true,
        width: $("#charts-legend").width(),
        series: [{ color: "#33414E", data: newArray, name: 'Tezos' }
        ]
      });
      graph.render();
    
      var hoverDetail = new Rickshaw.Graph.HoverDetail({
        graph: graph,
        formatter: function (series, x, y) {
           
            date = data.data.filter(
            function(a){ return a.priceUsd.includes(parseFloat(y.toString().slice(0, 7))) ;  }
             )
          $('.rickshaw_graph .detail .x_label').text(new Date(date[0].time).toLocaleString("en-US"))
          var content = series.name + ": $" +y.toFixed(2);
          return content;}
       
      });


      var legend = new Rickshaw.Graph.Legend({ graph: graph, element: document.getElementById('legend') });
      var shelving = new Rickshaw.Graph.Behavior.Series.Toggle({ graph: graph, legend: legend });
      var order = new Rickshaw.Graph.Behavior.Series.Order({ graph: graph, legend: legend });
      var highlight = new Rickshaw.Graph.Behavior.Series.Highlight({ graph: graph, legend: legend });

      var resize = function () {
        graph.configure({
          width: $("#charts-legend").width(),
          height: $("#charts-legend").height()
        });
        graph.render();
      }

      window.addEventListener('resize', resize);
      resize();
    }
    // eof Area Chart 
  });

</script>
<!-- END TEZOS CHART -->

</body>
</html>
