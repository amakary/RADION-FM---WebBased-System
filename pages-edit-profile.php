
<?php
$groupswithaccess="RADIONER, FOUNDER";
require_once("slpw/sitelokpw.php");
require_once("slpw/slupdateform.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>Profile Update</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->
        <link rel="stylesheet" type="text/css" href="css/cropper/cropper.min.css"/>
        <!--  EOF CSS INCLUDE -->        
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="css/theme-dark.css"/>
		<link rel="stylesheet" type="text/css" href="css/fontawesome-all.min.css" />
        <!-- EOF CSS INCLUDE -->  

<?php if (function_exists('sl_updateformhead')) sl_updateformhead(4,false); ?>		
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
                                <a href="#" class="profile-control-left"><span class="fa fa-info"></span></a>
                                <a href="#" class="profile-control-right"><span class="fa fa-envelope"></span></a>
                            </div>
                        </div>                                                                        
                    </li>
                    <li class="xn-title">MENU</li>
                    <li class="xn-openable">
                        <a href="#"><span class="fas fa-exclamation-circle" style="color:#FCB001"></span> <span class="xn-text"> SETTINGS</span></a>
						<ul>
                            <li><a href="#"><span class="xn-text"><span class="fas fa-shield-alt"></span> SECURITY FEATURES</span></a></li>
                            <li><a href="#"><span class="xn-text"><span class="fas fa-venus-mars"></span> PROFILE</span></a></li>
                            
                        </ul>
                    </li>                    
                    <li class="xn-openable">
                        <a href="submission.php"><span class="fas fa-arrow-alt-circle-right" style="color:#FCB001"></span> <span class="xn-text"> SUBMISSIONS</span></a>
                    </li>
                    <li class="xn-openable">
                        <a href="marketplace.php"><span class="fab fa-buromobelexperte" style="color:#FCB001"></span> <span class="xn-text"> MARKETPLACE</span></a>
                    </li>
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-window-restore" style="color:#FCB001"></span> <span class="xn-text"> WALLETS</span></a>                        
                       <ul>
                            <li><a href="radio-wallet.php"><span class="xn-text"><span class="fas fa-dot-circle"></span> RADIO</span></a></li>
                            <li><a href="wallet.php"><span class="xn-text"><span class="fab fa-ethereum"></span> ETH</span></a></li>
                            
                        </ul>
                    </li>                    
                    <li class="xn-openable">
                        <a href="#"><span class="fas fa-exchange-alt" style="color:#FCB001"></span> <span class="xn-text"> EXCHANGE</span></a>
						<ul>
						<li><a href="transfer-internal.php"><span class="xn-text"><span class="fas fa-handshake"></span> INTERNAL TRANSFER</span></a></li>
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
                    <!-- SEARCH -->
                    <li class="xn-search">
                        <form role="form">
                            <input type="text" name="search" placeholder="Search..."/>
                        </form>
                    </li>   
                    <!-- END SEARCH -->                    
                    <!-- POWER OFF -->
                    <li class="xn-icon-button pull-right last">
                        <a href="#"><span class="fa fa-power-off"></span></a>
                        <ul class="xn-drop-left animated zoomIn">
                            <li><a href="pages-lock-screen.php"><span class="fa fa-lock"></span> Lock Screen</a></li>
                            <li><a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span> Sign Out</a></li>
                        </ul>                        
                    </li> 
                    <!-- END POWER OFF -->                    
                    
                    <!-- LANG BAR -->
                    <li class="xn-icon-button pull-right">
                        <a href="#"><span class="fas fa-language fa-lg"></span></a>
                        <ul class="xn-drop-left xn-drop-white animated zoomIn">
                            <li><a href="#"><span class="flag flag-us"></span> English</a></li>
                            <li><a href="#"><span class="flag flag-es"></span> Espanol</a></li>
 
                        </ul>                        
                    </li> 
                    <!-- END LANG BAR -->
					
					<!-- BACK HOME -->
                    <li class="xn-icon-button pull-right">
                        <a href="index.php"><span class="fas fa-home"></span></a>
                                                
                    </li> 
                    <!-- END BACK HOME -->
					
                </ul>
                <!-- END X-NAVIGATION VERTICAL -->                 
                                                               
                
                <!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2><span class="fa fa-headphones"></span> Profile</h2>
                </div>
                <!-- END PAGE TITLE -->                     
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-info" role="alert">
                                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                <span><i class="fa fa-audio-description fa-lg"></i></span><span style="padding-right:20px;"></span>
								<span>RADION is always active in Social Media! If you want to be updated with our progress, we recommend you to follow us in our <a href="https://web.telegram.org/#/im?p=@radion_project" target="blank">Telegram</a> Group.</span>
								</div>                            
                        </div>
                    </div>
                    </div>     
                    
                    <div class="row">                        
                        <div class="col-md-6 col-sm-4 col-xs-5">
                            
                            <form action="#" class="form-horizontal">
                            <div class="panel panel-default">                                
                                <div class="panel-body">
                                    <h3><span class="fa fa-exclamation-circle"></span> Current Info</h3>
									<p><strong>Important Note!</strong>
									<br>
									Your personal information such as; Name, D.O.B and Phone Number are not Public!
									<hr></p>
									
                                    <p><strong>Name:</strong> <?php echo $slname; ?></p>
                                    <div class="text-center" id="user_image">
                                        <img src="<?php siteloklink($slcustom2,0); ?>" class="img-thumbnail"/>
                                    </div>                                    
                                </div>
                                <div class="panel-body form-group-separated">
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">#ID</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" value="<?php echo $sluserid; ?>" class="form-control" disabled/>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">E-mail</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" value="<?php echo $slemail; ?>" class="form-control" disabled/>
                                        </div>
                                    </div>
									
									 <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">ETH Public Address</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" value="<?php echo $slcustom7; ?>" class="form-control" disabled/>
                                        </div>
                                    </div>
                                    
                                    
                                </div>
                            </div>
                            </form>
							
							<div class="panel panel-default form-horizontal">
                                <div class="panel-body">
                                    <h3><span class="fa fa-info-circle"></span> Current Data</h3>
                                    <p>This section shows brief information about you.</p>
                                </div>
                                <div class="panel-body form-group-separated">                                    
                                    <div class="form-group">
                                        <label class="col-md-4 col-xs-5 control-label">Location</label>
                                        <div class="col-md-8 col-xs-7 line-height-base"><?php echo $slcustom1; ?></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 col-xs-5 control-label">Joined</label>
                                        <div class="col-md-8 col-xs-7 line-height-base"><?php echo date("m/d/y",$slcreated ); ?></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 col-xs-5 control-label">Groups</label>
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
                                        <label class="col-md-4 col-xs-5 control-label">website</label>
                                        <div class="col-md-8 col-xs-7 line-height-base"><?php echo $slcustom16; ?></div>
                                    </div>
									<div style="padding-top:50px; padding-bottom:30px;">
                                        <h3 style="padding-left:50px;">About Me</h3>
                                        <div style="padding-left:50px; padding-right:50px;" align="justify"><?php echo $slcustom12; ?></div>
                                    </div>
                                </div>
                                
                            </div>
                            
                        </div>
                        <div class="col-md-6 col-sm-8 col-xs-7">
                            
                            <form action="#" class="form-horizontal">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h3><span class="fa fa-clock"></span> Profile Update</h3>
                                    <p>Use this section to update the information of your profile.</p>
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
        </div>
        <!-- END PAGE CONTAINER -->

        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to log out?</p>                    
                        <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="pages-login.html" class="btn btn-success btn-lg">Yes</a>
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

    <!-- END SCRIPTS -->         
    </body>
</html>






