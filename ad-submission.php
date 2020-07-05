<?php $groupswithaccess="RADIONER,CEO,FOUNDER";
 require_once("/slpw/sitelokpw.php");
 ?>

<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>AD Submission</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="css/theme-dark.css"/>
		<link rel="stylesheet" type="text/css" href="css/all.min.css" />
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
		<script src="https://unpkg.com/@taquito/taquito@6.1.0-beta.0/dist/taquito.min.js" crossorigin="anonymous" integrity="sha384-sk4V+57zLUCfkna8z4p1u6CioucJqmeo+QnaiXoFiuE8vdkm7/ae2TNFLbL+Ys02"></script>
        <script src="/taquito/@taquito/tezbridge-signer/dist/taquito-tezbridge-signer.umd.js"></script>
        <!-- TAQUITO -->
        
        <!-- sweet alert -->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <!-- sweet alert -->
            
        <!-- sweet alert 2 -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.12/dist/sweetalert2.all.min.js"></script>        
        <!-- sweet alert 2 -->
		
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
	
	.swal-text {
  padding: 30px;
  text-align: left;
  color: #61534e;
  font-family: Arial;
  font-size: 14px;
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
        <!-- MODAL FOR transaction -->        
   <div class="modal" id="modal_basic_t" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h3 class="modal-title" id="defModalHead" style="padding-left:20px;"><i class="fa fa-wallet"></i>TRANSFER TEZOS</h3>
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
    
        <!-- END MODAL FOR transcation -->  
		
		<!-- MODAL FOR PURCHASE -->        
        <div class="modal" id="modal_basic_p" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h3 class="modal-title" id="defModalHead" style="padding-left:20px;"><i class="fa fa-shopping-cart"></i> BUY RADION MEMBERSHIP UNITS</h3>
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
                                <a href="#" class="profile-control-left"><span class="fa fa-envelope sidebar-toggle"></span></a>
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
                                      
                    <!-- POWER OFF -->
                    <li class="xn-icon-button pull-right last">
                        <a href="#"><span class="fa fa-power-off"></span></a>
                        <ul class="xn-drop-left animated zoomIn">
                            <li><a href="#"><span class="fa fa-wallet"></span> Connect Wallet - ( &#42793; )</a></li>
                            <li><a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out-alt"></span> Sign Out</a></li>
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
                                    <div class="widget-title"><?php echo sprintf("%.8f",$slcustom19); ?></div>
                                    <div class="widget-subtitle">MEMBERSHIP UNITS</div>
                                </div>      
                                
                            </div>                            
                            <!-- END WIDGET MESSAGES -->
                            
                        </div>
                        <div class="col-md-3">
                            
                            <!-- START WIDGET MESSAGES -->
                            <div class="widget widget-primary widget-item-icon" onclick="#">
                                <div class="widget-item-left">
								
                                    <i class="fas fa-dollar-sign fa-3x"></i>
                                </div>                             
                                <div class="widget-data">
                                    <div class="widget-int num-count">TEZOS</div>
                                    <div class="widget-title">Current Price</div>
                                    <div class="widget-subtitle">$<?php echo getValue('priceUsd') ?> USD</div>
                                </div>      
                                
                            </div>                            
                            <!-- END WIDGET MESSAGES -->
                            
                        </div>
                        <div class="col-md-3">
                            
                            <!-- START WIDGET REGISTRED -->
                            <div class="widget widget-primary widget-item-icon" onclick="location.href='#';">
                                <div class="widget-item-left">
                                    <span style="font-size:42px;">&#42793;</span>
                                </div>
                                <div class="widget-data">
                                    <div class="widget-int num-count">TEZOS</div>
                                    <div class="widget-title">BALANCE</div>
                                    <div class="widget-subtitle" id="_address"></div>
                                </div>
                                
									
                            </div>                            
                            <!-- END WIDGET REGISTRED -->
                            
                        </div>
                        <div class="col-md-3">
                            
                            <!-- START WIDGET CLOCK -->
                            <div class="widget widget-default widget-padding-sm">
                                <div class="widget-big-int plugin-clock">00:00</div>                            
                                <div class="widget-subtitle plugin-date">Loading...</div>
                                                           
                                <div class="widget-buttons widget-c3">
                                    <div class="col">
                                        <a href="#" data-toggle="tooltip" data-placement="bottom" title="(UTC -05:00) Easten Time US."><span class="fas fa-clock"></span></a>
                                    </div>
                                    <div class="col">
                                        <a href="#" data-toggle="tooltip" data-placement="bottom"><span class="fa fa-lightbulb"></span></a>
                                    </div>
                                    <div class="col">
                                        <a href="#" data-toggle="modal" data-target="#modal_basic" data-toggle="tooltip" data-placement="bottom" title="Connect Wallet"><span class="fa fa-plug"></span></a>
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
                                    <h3><i class="fa fa-audio-description fa-lg"></i> PRODUCER</h3>
									
									
									<div align="right" style="margin-top:-10px; padding-right:5%;">
									<button class="btn btn-default btn-rounded"><i class="fas fa-wallet"></i> <span id="get_source" style="font-family:Arial;"></span></button>
									</div>
									
									<hr>									
                                    <form action="#" role="form" onsubmit = 'return submit_all_informtion()' class="form-horizontal">
                                    <div class="wizard show-submit"> 
                                        <ul>
                                            <li>
                                                <a href="#step-1">
                                                    <span class="stepNumber">1</span>
                                                    <span class="stepDesc">Crafting<br /><small>Your Ad</small></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#step-2">
                                                    <span class="stepNumber">2</span>
                                                    <span class="stepDesc">Setting Up<br /><small>Options</small></span>
                                                </a>
                                            </li>  
												<li>
                                                <a href="#step-3">
                                                    <span class="stepNumber">3</span>
                                                    <span class="stepDesc">Quote<br /><small>Impressions</small></span>
                                                </a>
                                            </li>
												<li>
                                                <a href="#step-4">
                                                    <span class="stepNumber">4</span>
                                                    <span class="stepDesc">Submit<br /><small>Ad</small></span>
                                                </a>
                                            </li>    											
                                        </ul>

                                        <div id="step-1">   

                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Title</label>
                                                <div class="col-md-10">
                                                    <input type="text" name="express_ads_title" id="express_ads_title" class="form-control" placeholder=""  onchange="change_message()"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">URL or Link</label>
                                                <div class="col-md-10">
                                                    <input type="text" name="express_ads_website" id="express_ads_website" class="form-control" placeholder="Example: http://website.com/page"/>
                                                </div>
                                            </div>             
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Message</label>
                                                <div class="col-md-10">
                                                    <textarea name="express_ads_message" id="express_ads_message" class="form-control" rows="5" id="exampleTextArea3" onchange="change_message()"></textarea>
                                                </div>
                                            </div>
											<hr>
											<h3><span class="fa fa-check-circle"></span> Advance Settings</h3>
											<p>(Optional)</p>
											 <div class="form-group">
                                        <label class="col-md-2 control-label">Image</label>
                                        <div class="col-md-10">                                                                                                                                        
                                            <label class="check"><input type="checkbox" class="icheckbox"  id="need_image_upload"/> Need to upload Image for your Ad?</label>
                                            <span class="help-block">For Home Page Background only.</span>
                                        </div>
                                    </div>
											
											<div class="form-group">
                                        <label class="col-md-2 control-label">Upload</label>
                                        <div class="col-md-10">                                                                                                                                        
                                            <input type="file" class="fileinput btn-default" name="filename" id="filename" title="Browse file"/>
                                            <span class="help-block">Format: JPG or PNG - (2048px x 750px)</span>
                                        </div>
                                    </div>
											
											<!---a type="submit" id="step_1_next_btn" class="btn btn-success">Next</a-->

                                        </div>
										
										

                                        <div id="step-2">

                                             <!-- START CHECKBOXES RADIO AND SELECT -->
											 
						
                        <div class="col-md-6">
                            
                                <div class="panel-body">
                                    <h3><i class="fa fa-exclamation-circle"></i> Select AD Class!</h3>
                                    <form role="form" class="form-horizontal">
                                        <div class="form-group">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="" id="text_ad_desh_board"  onchange="change_message()"/>
                                                    <i class="fa fa-eye"></i> BANNER Ad - Text Format
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="" id="text_ad_at_home"  onchange="change_message()"/>
                                                    <i class="fa fa-eye"></i> BANNER Ad - Text Format
                                                </label>
                                            </div>
											<div class="checkbox" style="padding-bottom:13px;">
                                                <label>
                                                    <input type="checkbox" value="" id="main_home_mage_with_image"  onchange="change_message()"/>
                                                    <i class="fa fa-eye"></i> Home Page Ads - Image and Text Format
                                                </label>
                                            </div>

										<div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="" id="audio_commercial"  onchange="change_message()"/>
                                                    <i class="fa fa-headphones"></i> Audio Commercial Format
                                                </label>
                                            </div>
                                        </div>
                                        
                                                                           
                                    </form>                
                                </div>
                            
							</div>
							
                            <!-- END OF CHECKBOXES RADIO AND SELECT --> 
						
						<div class="col-md-6">
						<h3><i class="fas fa-flask"></i> SAMPLES</h3>
                        
						<div class="panel-body">
                         <div class="col-md-12">
						 <h5><i class="fas fa-arrow-alt-circle-right"></i> <strong>BANNER</strong> / Format: <span style="color:#2980B9;">Text</span> | Exposed on: <span style="color:#2980B9;">User Interface</span></h5>
                            <div class="alert alert-info" role="alert">
								<span><i class="fa fa-audio-description fa-lg"></i></span><span style="padding-right:20px;"></span><span id="message_visual"> This is a text ad! This type of ad is distributed in every single page of the dashboard and it is located on the very top of each page.
								The ad is limited to 250 characters</span><a href="#" > with a link</a>. <br>
								</div>                            
                        </div>
                        <div class="messages messages-img">
                            
                            <div class="item">
							<h5><i class="fas fa-arrow-alt-circle-right"></i> <strong>BANNER</strong> / Format: <span style="color:#2980B9;">Text</span> | Exposured on: <span style="color:#2980B9;">Home Page</span></h5>
                                <div class="image">
                                    <img src="<?php siteloklink($slcustom2,0); ?>" alt="">
                                </div>                                
                                <div class="text">
                                    <div class="heading">
                                        <a href="#"><?php echo $slusername; ?></a>
                                        <span class="date"><i class="fa fa-audio-description fa-2x"></i></span>
                                    </div>                                    
                                    <p align="justify">Advertisers can promote products or services in this format. The format will be shown in the front page of RADION website. This particular ad offers great exposure. <br>
									The message is limited to no more than 500 character plus one link per ad.</p>
                                </div>
                            </div>
                        </div>  

</div>	
</div>
</div>
			

                                       
											<div id="step-3">   

                                            <div class="col-md-6">
              
                <div class="panel-body" style="padding-bottom:50px; padding-top:30px;">
				  
											<div class="form-group">
											<label class="col-md-3 control-label" style="color:#E0401D;">Impressions</label>
                                            <div style="width:100%; padding-left:20%; padding-right:20%;">

                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-primary" type="button" onclick="set_min()">Fill Min</button>
                                                    </span>
                                                    <input type="text" class="form-control" id="express_ads_impressions" placeholder="or Enter Qantity!" onchange="change_message()"/>
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-primary" type="button" onclick="set_max()">Fill Max</button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
				  <hr>

											
				  
											<div class="form-group">
                                            <label class="col-md-3 control-label">Dates Range</label>
                                            <div style="width:100%; padding-left:20%; padding-right:20%;">
                                                <div class="input-group">
                                                    <input type="text" class="form-control datepicker" id="express_ads_date1" value="2017-22-06"/>
                                                    <span class="input-group-addon add-on"> - </span>
                                                    <input type="text" class="form-control datepicker" id="express_ads_date2" value="2017-22-06"/>
                                                </div>
                                            </div>
                                        </div>

                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Time Begin</label>
                                            <div style="width:100%; padding-left:20%; padding-right:20%;">
                                                <div class="input-group bootstrap-timepicker">
                                                    <input type="text" class="form-control timepicker" id="express_ads_time_begin"/>
                                                    <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                                                </div>
                                            </div>
                                        </div>
										
										 <div class="form-group">
                                            <label class="col-md-3 control-label">Time Ends</label>
                                            <div style="width:100%; padding-left:20%; padding-right:20%;">
                                                <div class="input-group bootstrap-timepicker">
                                                    <input type="text" class="form-control timepicker" id="express_ads_time_ends"/>
                                                    <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                                                </div>
                                            </div>
                                        </div>

                
              </div>
            </div>
			
			<div class="col-md-6">
              
                <div class="panel-body" style="padding-bottom:50px; padding-top:30px;">

				<div align="center" style="padding-left:20%; padding-right:20%;">

                            <div class="widget widget-info">
                                <div class="widget-int" data-toggle="counter" data-to="" id="cost_for_imp">$0 USD</div>
                                <div class="widget-subtitle"><span id="total_impression_">0</span> AD Impressions</div>
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

											<div id="step-4">   

                                    <!-- INVOICE -->
                                    <div class="invoice">
                                        
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
												<a href="#"><small>RADION UNITS</small>  
                                                    <p>UNITS CAN BE PURCHASED WITH $XTZ</p>
													<div align="right" style="margin-top:-20px;">
													<span href="#" class="label label-default label-md" data-toggle="modal" data-target="#modal_basic_p"><small><span class="fa fa-shopping-cart"></span> BUY NOW!</small></span>													
													</div>
													</a>
                                                </div>
												
												<div class="paymant-table">
												<a href="#"><small>&#42793; TEZOS</small>
                                                        <p>TEZZIES ($XTZ) ARE DIGITAL TOKENS.</p>
                                                    </a>
                                                </div>
                                                
                                            </div>
                                            <div class="col-md-6">
                                                <h4 class="text-right" id="total_usd_at_final">$0 USD</h4>
                                                
                                                <table class="table table-striped">
                                                    
                                                    <tr>
                                                        <td><strong>$XTZ</strong></td><td class="text-right" id="total_radio_at_final">0</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Estimated Conversion Rate</strong></td><td class="text-right" id="total_usd_at_final">$0</td>
                                                    </tr>
                                                    <tr class="total">
                                                        <td>$XTZ:</td><td class="text-right" id="intotal">0</td>
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
        <script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/fontawesome-all.js"></script>        
        <!-- END PLUGINS -->
		

        <!-- START THIS PAGE PLUGINS-->        
        <script type='text/javascript' src='js/plugins/icheck/icheck.min.js'></script>        
        <script type="text/javascript" src="js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        <script type="text/javascript" src="js/plugins/scrolltotop/scrolltopcontrol.js"></script>
		<script type="text/javascript" src="js/plugins/dropzone/dropzone.min.js"></script>
		<script type="text/javascript" src="js/plugins/bootstrap/bootstrap-datepicker.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap-timepicker.min.js"></script>
		<script type="text/javascript" src="js/all.min.js"></script>
        
        <script type="text/javascript" src="js/plugins/morris/raphael-min.js"></script>
        <script type="text/javascript" src="js/plugins/morris/morris.min.js"></script>       
        <script type="text/javascript" src="js/plugins/rickshaw/d3.v3.js"></script>
        <script type="text/javascript" src="js/plugins/rickshaw/rickshaw.min.js"></script>
		<script type="text/javascript" src="js/plugins/bootstrap/bootstrap-file-input.js"></script>
        <script type='text/javascript' src='js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'></script>
        <script type='text/javascript' src='js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'></script>                
        <script type='text/javascript' src='js/plugins/bootstrap/bootstrap-datepicker.js'></script>                
        <script type="text/javascript" src="js/plugins/owl/owl.carousel.min.js"></script> 	
        
        
		<script type="text/javascript" src="js/plugins/smartwizard/jquery.smartWizard-2.0.min.js"></script>        
        <script type="text/javascript" src="js/plugins/jquery-validation/jquery.validate.js"></script>
        <!-- END THIS PAGE PLUGINS-->        
	<script type='text/javascript' src='js/plugins/noty/jquery.noty.js'></script>
        <script type='text/javascript' src='js/plugins/noty/layouts/topRight.js'></script>            		  
        <script type='text/javascript' src='js/plugins/noty/themes/default.js'></script>
        <!-- START TEMPLATE -->
        
        <script type="text/javascript" src="js/plugins.js"></script>        
        <script type="text/javascript" src="js/actions.js"></script>
        <script type="text/javascript" src="taquito-functions.js"></script>
        <script type="text/javascript" src="js/demo_dashboard.js"></script>
        <!-- END TEMPLATE -->

        
		
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
// echo '<li>'.$data['name'].'</li>' ;
// echo '<li>'.$data['priceUsd'].'</li>' ;
// echo '<li>'.$data['changePercent24Hr'].'</li>' ;
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
		
		
	
	<script>
            $(function(){
                
                pageLoadingFrame("hide");                
                setTimeout(function(){
                    pageLoadingFrame("hide");
                },3000);     
                
                $("#loader_v1").on("click",function(){
                    pageLoadingFrame("show","v1");
                    setTimeout(function(){
                        pageLoadingFrame("hide");
                    },3000);     
                });
                
                $("#loader_v2").on("click",function(){
                    pageLoadingFrame("show");
                    setTimeout(function(){
                        pageLoadingFrame("hide");
                    },3000);     
                });
                
            });
        </script>        
	
<script>

var TOTAL_RADIO_COST=0;
function change_message(){


$("#message_visual").html($("#express_ads_message").val());

update_invoice();
total_impression_costiong();
}

	
	function validate_image_fileupload(fileName)
{

//alert(fileName);
if(typeof(fileName) == "undefined"){

return false;

}

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

document.getElementById("filename").value = "";

    return false;
}

function submit_all_information(){



var express_ads_title =$("#express_ads_title").val(); 
var express_ads_website =$("#express_ads_website").val(); 
var express_ads_message =$("#express_ads_message").val(); 
var text_ad_desh_board =0; 
  if($("input#text_ad_desh_board").is(":checked")) {
   text_ad_desh_board=1;     
    }
	$image_file="";
	if($("input#need_image_upload").is(":checked")){
	
	var fileInput = document.getElementById('filename');   
var filename = fileInput.files[0].name;

	//alert(filename);

	
	//	filename1=$("#filename").val();
	
		
	
	}
	var text_ad_at_home =0; 
  if($("input#text_ad_at_home").is(":checked")) {
   text_ad_at_home=1;     
    }
	//alert(text_ad_at_home);
	var main_home_mage_with_image =0; 
  if($("input#main_home_mage_with_image").is(":checked")) {
   main_home_mage_with_image=1;     
    }

	var audio_commercial =0; 
  if($("input#audio_commercial").is(":checked")) {
   audio_commercial=1;     
    }
var audio_commercial_value =$("#audio_commercial_value").val(); 
var express_ads_impressions =$("#express_ads_impressions").val(); 
var express_ads_date1 =$("#express_ads_date1").val(); 
var express_ads_date2 =$("#express_ads_date2").val(); 
var express_ads_time_begin =$("#express_ads_time_begin").val(); 
var express_ads_time_ends =$("#express_ads_time_ends").val(); 

	if(express_ads_title==""){
	
	//alert("Some Fields are Empty.");
	
	  noty({text: 'Something is wrong! AD Title Empty.', layout: 'topRight', type: 'error'});
	return false;
	}

	if(express_ads_message==""){
	
	//alert("AD message cannot empty");
		  noty({text: 'Something is wrong! AD Message Empty.', layout: 'topRight', type: 'error'});

	
	return false;
	}
	
	
	if(!count_character(express_ads_message)){
	
			  noty({text: 'Something is wrong! Message is too long!', layout: 'topRight', type: 'error'});
return false;
	}
	total_place=text_ad_desh_board+text_ad_at_home+main_home_mage_with_image;
	if(total_place<1){
	
	//alert("Select minimum one place to show your AD");
	
			  noty({text: 'Something is wrong! AD Class no Selected.', layout: 'topRight', type: 'error'});

	return false;
	}

//alert(text_ad_at_home);

		 var data = new FormData();
		 
		data.append('express_ads_title',express_ads_title);
	
	
		if(validate_image_fileupload(filename)){

				data.append('image_file',fileInput.files[0]);
              //alert("Valid");
}
	
		
		data.append('express_ads_website',express_ads_website);
		data.append('express_ads_message',express_ads_message);
		data.append('text_ad_desh_board',text_ad_desh_board);
		data.append('text_ad_at_home',text_ad_at_home);
		data.append('main_home_mage_with_image',main_home_mage_with_image);
		data.append('audio_commercial',audio_commercial);
		data.append('audio_commercial_value',audio_commercial_value);
		data.append('express_ads_impressions',express_ads_impressions);
		data.append('express_ads_date1',express_ads_date1);
		data.append('express_ads_date2',express_ads_date2);
		data.append('express_ads_time_begin',express_ads_time_begin);
		data.append('express_ads_time_ends',express_ads_time_ends);
		data.append('TOTAL_RADIO_COST',TOTAL_RADIO_COST);
		
		 $.ajax({
 
 
 
    url:"ad-submission_operation.php",
   method:"POST",
    //contentType: "application/json",
	processData: false, // important
  contentType: false, // important
   data:data,

  success:function(data)
   {
	
	 // alert(data);
	  var result = $.trim(data);
	 	if(result=="Not_complete"){
			
						  noty({text: 'Something is wrong ! Please try again!!!', layout: 'topRight', type: 'error'});

		
		}else if(result=="NO_AMOUNT"){
		
		
								  noty({text: 'You do not have enough TEZ to submit ad', layout: 'topRight', type: 'error'});

		
		}else{
		
								  noty({text: 'We Start Working On Your Ad!', layout: 'topRight', type: 'information'});

		setTimeout(ad_live, 7000);
		}
		
	
   },
      error: function (xhr, ajaxOptions, thrownError) {
     //   alert(xhr.status);
       // alert(thrownError);
      }
 
 
  });
		
	// }
	 

return false;	

}


 function update_invoice(){
 
 var express_ads_title =$("#express_ads_title").val(); 
 subtitle="";
 
  if($("input#text_ad_desh_board").is(":checked")) {
   text_ad_desh_board=1;     
   
subtitle+="Text Ad Dashboard";

   }
	
	var text_ad_at_home =0; 
  if($("input#text_ad_at_home").is(":checked")) {
   text_ad_at_home=1;     
   subtitle+=", Text Ad Home Page";
 }
	var main_home_mage_with_image =0; 
  if($("input#main_home_mage_with_image").is(":checked")) {
   main_home_mage_with_image=1;     
       subtitle+=", Main Home Page (Image Background & Message)";

	
	}

	var audio_commercial =0; 
  if($("input#audio_commercial").is(":checked")) {
   audio_commercial=1;     
  
       subtitle+=", Audio Commercial";

  }
 var express_ads_impressions =$("#express_ads_impressions").val(); 

 $("#ad_title").html(express_ads_title);
 $("#impressions").html(express_ads_impressions);
 $("#subtitle_id").html(subtitle);
 
 
 
 }
 
 function total_impression_costiong(){
  var express_ads_impressions =$("#express_ads_impressions").val(); 

 
  total_imperssion_cost=0;
  if ($('#text_ad_desh_board').is(":checked") && ($('#text_ad_at_home').is(":checked") ))
{
total_imperssion_cost=(express_ads_impressions*3)+(express_ads_impressions*13);
}else{

if($('#text_ad_desh_board').is(":checked")){

total_imperssion_cost=express_ads_impressions*3;
}else{

total_imperssion_cost=express_ads_impressions*13;

}

}
  

  
  
//total_radio_cost= (total_imperssion_cost/17).toFixed(8);
  
 
  
  total_imperssion_cost=(total_imperssion_cost/410).toFixed(2);
  // usd_for_image=0;
  // if($("input#need_image_upload").is(":checked")){
  
  // usd_for_image=3*total_imperssion_cost;
  // }
 // total_imperssion_cost+=usd_for_image;
  total_radio_cost=0.5*total_imperssion_cost;
  TOTAL_RADIO_COST=total_radio_cost.toFixed(8);
  //alert(total_radio_cost);

 $("#total_impression_").html(express_ads_impressions);
 
 $("#cost_for_imp").html("$"+total_imperssion_cost+" USD");
 $("#cost_for_imp_radio").html("XTZ : "+total_radio_cost.toFixed(8));
 $("#total_radio_at_final").html(total_radio_cost.toFixed(8));
 $("#intotal").html(total_radio_cost.toFixed(8));
 $("#total_usd_at_final").html("$"+total_imperssion_cost);
 
 
 }
 
 // $("#express_ads_date1").datepicker();
// $("#express_ads_date1").datepicker("setDate", new Date());


$('#express_ads_date1').datepicker({
                    format:'yyyy-mm-dd',
                }).datepicker("setDate",'now');
$('#express_ads_date2').datepicker({
                    format:'yyyy-mm-dd',
                }).datepicker("setDate",'now');
				
				
				$('#express_ads_time_begin').timepicker({
                    format:'hh:mm',
                }).timepicker("setDate",'now');


				$('#express_ads_time_ends').timepicker({
                    format:'hh:mm',
                }).timepicker("setDate",'now');
				
				function set_min(){
				
				//alert();
				// express_ads_impressions
				$("#express_ads_impressions").val(10);
				total_impression_costiong();
				
				}
				
				function set_max(){
				
				var total_impression=<?php echo $slcustom19;?>*17;
				
								$("#express_ads_impressions").val(parseInt(total_impression));
total_impression_costiong();
				
				}
			




function 	ad_live(){

								  noty({text: 'Congrats. Your Ad is Live!', layout: 'topRight', type: 'success'});



}	


function count_character(string_){
var charLength = string_.length;
 
 if(charLength>500){
 return false;
 
 }else{
 
 return true;
 
 }

}
</script>

	<!-- OCLASUS SCRIPT - FOLLOW UP LINES 276 -->
	
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
          
			taquito.Tezos.setProvider({ rpc: 'https://rpc.tzkt.io/mainnet' });
            taquito.Tezos.tz.getBalance(address)
                .then(balance => bal.innerHTML = `${balance.toNumber() / 1000000} ꜩ`)
                .catch(error => console.log(JSON.stringify(error))); 

            
            console.log(balance.innerHTML);
				
                connectModal.modal('');
            }).catch(console.log);
        });

    </script>	
    <script>
        var url; 
        function get_transaction() {
            
            Swal.fire({
                icon: "success",
                title: "SUCCESS",
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
        // }, 2000)
        }
     let connect =  $("#modal_basic_t");
     let a = '';
     var price;
     var c = '';
     var q = '';

    function make_tarnsaction() {
        price = '';
         c = document.getElementById('intotal').innerText
         q = c[0];
        for(i=0; i<=7; i++){
            if(c[i] == ".") i++
            price += c[i];
        }
        tezbridge.request({
        method: 'inject_operations',
        operations: [
            {
            kind: 'transaction',
            amount: price,    // The number is in mutez
            destination: 'tz1PjhNkuduRFm7joE6FaUo2WMbc812SQ4S4'
            }
        ]
        })
        .then(result => {
            a = result
            url = 'https://tzstats.com/' + a.operation_id
            Swal.fire({
			title: "TRANSACTION SENT!",
			width: 500,
            html: "<br><p align = 'left' style='padding-left:15px;'> Wait for confirmation!<br>Be Patient, this may take a while.</p><hr><p align='left' style='padding-left:15px;'><strong>Transaction ID:</strong></p> "  + "<p align = 'left' style='padding-left:15px; font-size:13px;'>" +  a.operation_id + '</p>',
			imageUrl: 'https://radion.fm/img/radion-connection.gif',
			imageWidth: 200,
			imageHeight: 50,
			
             })
            setTimeout(function () {
              get_transaction() 
              return submit_all_information()
           }, 30000)
        })
        .catch(err => {
            console.log(err);
            if(err == `TypeError: Cannot read property 'forEach' of undefined`){
                Swal.fire({
                    icon: 'error',
                    title: 'Oh No. No enough Funds!',
                    text: "Please check your balance before submit an AD."

                })
            }
        })
        console.log(a);
    $('#modal_basic').modal('show')    
        // $('#modal_basic_t').modal('show')
        console.log("finish is clicked again executed")
    }   
  
                setTimeout(function () {
            $('.pull-right')[4].addEventListener('click', () => { 
                make_tarnsaction()
            })
     }, 2000 )
    </script>
    </body>
</html>






