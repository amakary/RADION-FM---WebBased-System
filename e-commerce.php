<!--- SCRIPT TO FETCH TEZOS PRICE FROM API --->
<?php

function getValue($val)
{
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
    $decodedObject = json_decode($output, true);
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
    $pos = strpos($data[$val], '.');
    if ($pos > -1) {
        $pos = $pos + 3;
        $final = substr($data[$val], 0, $pos);
    } else {
        $final = $data[$val];
    }

    return $final;
}

?>
<!--- END SCRIPT TO FETCH TEZOS PRICE FROM API --->
 
<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>e-Commerce</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="css/theme-dark.css"/>
		<link rel="stylesheet" type="text/css" href="css/all.css" />
		<link rel="stylesheet" type="text/css" href="css/bootstrap/font-awesome-animation.css" />
        <!-- EOF CSS INCLUDE -->  
		
		<link href="/vibracart/vibracartstyle3.css" rel="stylesheet" type="text/css"> 
		<script type="text/javascript" src="/vibracart/settingsstyle3.js"></script>
		<script type="text/javascript" src="/vibracart/vibracart.js"></script>
		
		<!-- TEZBRIDGE CSS -->
		<link rel="stylesheet" type="text/css" href="tezbridge/base.d9dce89e.css" />
		<link rel="stylesheet" type="text/css" href="tezbridge/base.dcedc90f.css" />
		<link rel="stylesheet" type="text/css" href="tezbridge/base.e9d1c96c.css" />
		<link rel="stylesheet" type="text/css" href="tezbridge/base.97de024b.css" />

		<!-- TEZBRIDGE JS -->
		<script src="./plugin.js"></script>
		<script src="/tezbridge/base.3b889bf7.js"></script>
		<script src="/tezbridge/base.6ab6a587.js"></script>
		<script src="/tezbridge/base.764feec2.js"></script>
		<script src="/tezbridge/base.546361df.js"></script>
		<script src="/tezbridge/base.f14781ea.js"></script>
	
	<!-- SWEET ALERT -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.8.1/dist/sweetalert2.all.min.js"></script>
	
	<!-- TAQUITO -->
    <script src="https://unpkg.com/@taquito/taquito@6.1.1-beta.0/dist/taquito.min.js"></script>
    
    <!-- QR CODE CDN -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/davidshimjs/qrcodejs/qrcode.min.js"></script>
	
    <!-- CLIPBOARD -->
    <script src="https://cdn.jsdelivr.net/clipboard.js/1.5.3/clipboard.min.js"></script>
	

<style>
#solidback {
	background:url("img/radion-0008.jpg");
	background-repeat: no-repeat;
	background-size: 100%;
	width:100%;
	height:auto;
}
.link { color:#808b96;}
.link:hover { color:#f39c12;}

#navbar {
  overflow: hidden;
}

.content {
  padding: 16px;
}

.sticky {
  position: fixed;
  top: 0;
  width: 100%;
}

.sticky + .content {
  padding-top: 60px;
} 

</style>
 <style>
        .fa-sort-down {
            color: #C0392B
        }

        .fa-sort-up {
            color: #27AE60
        }

        .tDown {
            color: #C0392B
        }

        .tUp {
            color: #27AE60
        }

        .linko {
            color: #737577;
        }

        .linko:hover {
            color: #3498DB;
        }

        .connect-iframe {
            width: 100%;
            height: 250px;
            border: 0;
        }
    </style>
	
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
                    <div align="center" id='qraddress'></div>
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

    <!-- MODAL FOR SIGNER -->
    <div class="modal" id="modal_basic" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="defModalHead" style="padding-left:20px;"><i class="fa fa-wallet"></i> CONNECT WALLET</h3>
                </div>
                <div class="modal-body">
                    <iframe name="connect-iframe" class="connect-iframe"></iframe>
					<p style="padding-top:50px; padding-left:20px;"><strong>Note</strong>: <small>Your 30% Off will be applied on Tezzies.</small></p>
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
        <div class="page-container page-navigation-top">            
            <!-- PAGE CONTENT -->
            <div class="page-content">
                
                 <!-- START X-NAVIGATION VERTICAL -->
                <ul class="x-navigation x-navigation-horizontal" id="navbar">
                    <!-- POWER OFF -->
						<li class="xn-logo">
                        <a href="index.php">RADION</a>
                        <a href="#" class="x-navigation-control"></a>
                    </li>
					<!-- END POWER OFF -->
					<div style="margin-top:15px; padding-right:30px;" align="right">
					<span style="color:#fff;"><span style="padding-left:10px; padding-right:10px;"><strong >Tezos</strong></span> <span style="padding-right:10px;">-</span>Price: <i class="fas fa-dollar-sign"></i> <span id='usdPrice'> <?php echo getValue('priceUsd') ?></span></span>
					<span style="color:#fff; padding-right:10px;"><?php
                                                                    $changePercent24Hr = getValue('changePercent24Hr');
                                                                    if (strpos($changePercent24Hr, '-') > -1) {
                                                                        //negative
                                                                        echo '<span class="fas fa-sort-down fa-xs" style="vertical-align:2px;"></span> <span class="tDown" style="font-size:10px;">' . $changePercent24Hr . '%</span>';
                                                                    } else {
                                                                        echo '<span class="fas fa-sort-up fa-xs" style="vertical-align:-2px;"></span> <span class="tUp" style="font-size:10px;">' . $changePercent24Hr . '%</span>';
                                                                    }
                                                                    ?></span>
					<span style="padding-right:20px; padding-left:10px; color:#fff;">|</span>
					<span id="showitemcount" style="color:#f39c12; padding-right:3px;"><strong>0</strong></span>
					<span style="color:#fff;"><a class="link" href="" onclick="showCart(); return(false)"><i class="fad fa-cart-plus fa-lg"></i></a></span>
					<span id="showcarttotal" style="color:#fff; padding-left:5px;">$0.00</span>
					</div> 
										
                     
                </ul>
                <!-- END X-NAVIGATION VERTICAL -->                                    
                
       <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    
                    <div class="row">
					<div id="solidback">
					
					<div class="panel-body" style="padding-top:10%; padding-bottom:3%;">
					<div style="padding-left:25px;">
					<h1 style="color:#fff; font-family: Arial;"><strong>EXPERIMENTAL E-COMMERCE</strong></h1>
					</div>
                    <blockquote class="blockquote">
                    <p style="color:#ccc;">
					<strong>Important Note:</strong> This is a experimental e-commerce page to give you some ideas of what we can do with Tezos<br> blockchain. In this page you
					will be able to buy products with FIAT currency as well as crypto (XTZ). Purchase with<br> 
					Tezzies are not included in shopping cart and checkout process at the moment, however; we are working on these<br> features!
					They will be available soon. Please be Patient.</p>
                    <footer>This project was made to support Tezos ecosystem.<cite title="Source Title"> - Frans Rehl</cite></footer>
                    </blockquote>
					<div style="width:25px; margin-left:90%; height:25px; margin-top:0px; margin-bottom:0px;">
<svg xmlns="http://www.w3.org/2000/svg" width="47" height="64" viewBox="0 0 47 64">
<path style="fill:#5D6D7E;" d="M30.252 63.441c-4.55 0-7.864-1.089-9.946-3.267-2.08-2.177-3.121-4.525-3.121-7.041 0-.92.181-1.694.544-2.323a3.993 3.993
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
					<div align="right" style="padding-right:11%; margin-top:-25px;">
					<p style="color:#fff; font-family: Arial; padding-top:-20px;">We Accept:&nbsp;&nbsp;
					
					<span class="fab fa-cc-paypal fa-2x" style="color:#5D6D7E;"> </span>
					<span class="fab fa-cc-visa fa-2x" style="color:#5D6D7E;"> </span>
					<span class="fab fa-cc-mastercard fa-2x" style="color:#5D6D7E;"> </span>
					<span style="color:#fff; padding-left:15px; padding-right:0px;"> - </span>
					
					</p>
					</div>
					</div>
					</div>

                        <div class="col-md-12">
						
						<br>
						<br>
						            <div align="left" style="margin-top:0px; padding-left:15px;">
                                    <span><a href="#modal_basic" class="widget-control-right linko" data-toggle="modal" style="font-size:13px; text-decoration:none;"><i class="fad fa-wallet"></i> Connect Wallet</a></span>
                                    <span style="padding-right:3px; padding-left:3px;">|</span>
                                    <span><a href="#modal_small" data-toggle="modal" style="font-size:13px; text-decoration:none" class="linko"><i class="fad fa-qrcode"></i> Receive</a></span>
                                    <span style="padding-right:3px; padding-left:3px;">|</span>
                                    <span id="get_source" style="color:#1b1e24; font-size:0px;"></span>
									<span><a href="#" style="font-size:13px; text-decoration:none" class="linko">Balance:</a> <span id="_address" style="color:#2980B9">0</span></span>
									<span style="padding-right:3px; padding-left:3px;">|</span>
									<span><a href="#" style="font-size:13px; text-decoration:none" class="linko">USD Total:</a> <i class="fas fa-dollar-sign"></i> <span id="_usd_balance" style="color:#196f3d;">0</span></span>
									</div>
									<hr>
									
						<br>
						<br>
                            <!-- START SEARCH RESULT -->
                            <div class="search-results">
						<div class="row">
                        <div class="col-md-6">
						<div class="panel-heading">                                        
                                    <h3 class="panel-title"><span class="fas fa-box-open"></span> PRE-ORDER PRODUCTS</h3>
                                </div>
								
                                <div class="sr-item">
									<div class="x-features-profile" style="padding-top:10px;">
									<img src="e-commerce/Tezos-grey.jpg" class="pull-left" style="display:inline-block; width:auto; height:130px; margin-top:10px; margin-right:20px; margin-left:10px; border-radius: 50px 25px;" alt=""/>
									</div>
									<div align="right" style="padding-right:10px;"><span class="fas fa-dollar-sign fa-1x"></span> <span style="font-size:150%; color:#196f3d;" class="intotal"><strong>9.95 </strong></span><span style="font-size:10px; padding-right:10px;">USD</span></div>
                                    <h3 style="margin-top:-20px;">Grey Tezos Patch</h3>
                                    <p style="padding-right:10px;" align="justify">This is a Special Edition 3X3cm embroidery patch ideal and ready to sew on your favorite garment. 
									Custom high end product, resistant and durable against any weather conditions or washing process.</p>
                                    <p style="padding-bottom:10px;"><span style="color:#909497;"><i class="fas fa-store-alt"></i> Pre-Order</span>
									<span style="padding-left:10px; color:#909497;"><i class="fad fa-shipping-fast"></i> Free Shipping</span>
									<span style="padding-left:10px; color:#909497;"><i class="fad fa-tags"></i> 30% OFF with XTZ</span></p>
                                
								<div align="right" style="padding-right:10px; padding-bottom:5px;">
								<span style="margin-right:90px;">
								<div class="btn-group">
                                                    <button type="button" class="btn btn-primary btn-xs">&nbsp;&nbsp;&nbsp;BUY WITH CRYPTO</button>
                                                    <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                                                    <ul class="dropdown-menu" role="menu">
													
                                                        <div style="width:17px; height:17px; margin-top:10px; margin-left:10px; margin-bottom:0px;">
<svg xmlns="http://www.w3.org/2000/svg" width="47" height="64" viewBox="0 0 47 64">
<path style="fill:#5D6D7E;" d="M30.252 63.441c-4.55 0-7.864-1.089-9.946-3.267-2.08-2.177-3.121-4.525-3.121-7.041 0-.92.181-1.694.544-2.323a3.993 3.993
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
                                                        <li style="margin-top:-26px; margin-left:20px;"><a href="#" onClick = 'make_tarnsaction(0)'> Tezos</a></li>
                                                                                                           
                                                    </ul>
                                                </div>
								</span>

<form action="https://www.paypal.com/cgi-bin/webscr" method="post" style="margin-top:-23px;">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="grehl.software@gmail.com">
<input type="hidden" name="no_shipping" value="2">
<input type="hidden" name="item_name" value="Grey Tezos Patch">
<input type="hidden" name="item_number" value="tz11">
<input type="hidden" name="amount" value="9.95">
<input type="hidden" name="currency_code" value="USD">
<input type="hidden" name="return" value="https://radion.fm/thank-you-for-your-purchase.php">
<input type="hidden" name="cancel_return" value="https://radion.fm/cancel-order.php">
<input type="hidden" name="notify_url" value="https://radion.fm/slpw/pay_paypal/slpaypal.php">
<input type="hidden" name="custom" value="<?php echo $slordercustom; ?>">
<input type="image" src="https://radion.fm/slpw/pay_paypal/buttonimages/x-click-but22.gif">
</form>


								</div>
								</div>                                
                                
                               <div class="sr-item">
									<div class="x-features-profile" style="padding-top:10px;">
									<img src="e-commerce/tezos-blue.jpg" class="pull-left" style="display:inline-block; width:auto; height:130px; margin-top:10px; margin-right:20px; margin-left:10px; border-radius: 50px 25px;" alt=""/>
									</div>
									<div align="right" style="padding-right:10px;"><span class="fas fa-dollar-sign fa-1x"></span> <span style="font-size:150%; color:#196f3d;" class='intotal'><strong>9.95 </strong></span><span style="font-size:10px; padding-right:10px;">USD</span></div>
                                    <h3 style="margin-top:-20px;">Blue Tezos Badge</h3>
                                    <p style="padding-right:10px;" align="justify">This is a Special Edition 3X3cm embroidery patch ideal and ready to sew on your favorite garment. 
									Custom high end product, resistant and durable against any weather conditions or washing process.</p>
                                    <p style="padding-bottom:10px;"><span style="color:#909497;"><i class="fas fa-store-alt"></i> Pre-Order</span>
									<span style="padding-left:10px; color:#909497;"><i class="fad fa-shipping-fast"></i> Free Shipping</span>
									<span style="padding-left:10px; color:#909497;"><i class="fad fa-tags"></i> 30% OFF with XTZ</span>
									</p>
                                
								<div align="right" style="padding-right:10px; padding-bottom:5px;">
								<span style="margin-right:90px;">
								<div class="btn-group">
                                                    <button type="button" class="btn btn-primary btn-xs">&nbsp;&nbsp;&nbsp;BUY WITH CRYPTO</button>
                                                    <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                                                    <ul class="dropdown-menu" role="menu">
													
                                                        <div style="width:17px; height:17px; margin-top:10px; margin-left:10px; margin-bottom:0px;">
<svg xmlns="http://www.w3.org/2000/svg" width="47" height="64" viewBox="0 0 47 64">
<path style="fill:#5D6D7E;" d="M30.252 63.441c-4.55 0-7.864-1.089-9.946-3.267-2.08-2.177-3.121-4.525-3.121-7.041 0-.92.181-1.694.544-2.323a3.993 3.993
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
                                                        <li style="margin-top:-26px; margin-left:20px;"><a href="#" onClick = 'make_tarnsaction(1)'> Tezos</a></li>
                                                                                                           
                                                    </ul>
                                                </div>
								</span>

<form action="https://www.paypal.com/cgi-bin/webscr" method="post" style="margin-top:-23px;">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="grehl.software@gmail.com">
<input type="hidden" name="no_shipping" value="1">
<input type="hidden" name="item_name" value="Blue Tezos Patch">
<input type="hidden" name="item_number" value="tz1">
<input type="hidden" name="amount" value="9.95">
<input type="hidden" name="currency_code" value="USD">
<input type="hidden" name="return" value="https://radion.fm/thank-you-for-your-purchase.php">
<input type="hidden" name="cancel_return" value="https://radion.fm/cancel-order.php">
<input type="hidden" name="notify_url" value="https://radion.fm/slpw/pay_paypal/slpaypal.php">
<input type="hidden" name="custom" value="<?php echo $slordercustom; ?>">
<input type="image" src="https://radion.fm/slpw/pay_paypal/buttonimages/x-click-but22.gif">
</form>


								</div>
								</div>    
                                
                                <div class="sr-item">
									<div class="x-features-profile" style="padding-top:10px;">
									<img src="e-commerce/tezos-heart.jpg" class="pull-left" style="display:inline-block; width:auto; height:130px; margin-top:10px; margin-right:20px; margin-left:10px; border-radius: 50px 25px;" alt=""/>
									</div>
									<div align="right" style="padding-right:10px;"><span class="fas fa-dollar-sign fa-1x"></span> <span style="font-size:150%; color:#196f3d;" class='intotal'><strong>9.95 </strong></span><span style="font-size:10px; padding-right:10px;">USD</span></div>
                                    <h3 style="margin-top:-20px;">Tezos Red Heart Patch</h3>
                                    <p style="padding-right:10px;" align="justify">This is a Special Edition 3X3cm embroidery patch ideal and ready to sew on your favorite garment. 
									Custom high end product, resistant and durable against any weather conditions or washing process.</p>
									<p style="padding-bottom:10px;"><span style="color:#909497;"><i class="fas fa-store-alt"></i> Pre-Order</span>
									<span style="padding-left:10px; color:#909497;"><i class="fad fa-shipping-fast"></i> Free Shipping</span>
									
									<span style="padding-left:10px; color:#909497;"><i class="fad fa-tags"></i> 30% OFF with XTZ</span>
									</p>
                                
								<div align="right" style="padding-right:10px; padding-bottom:5px;">
								<span style="margin-right:90px;">
								<div class="btn-group">
                                                    <button type="button" class="btn btn-primary btn-xs">&nbsp;&nbsp;&nbsp;BUY WITH CRYPTO</button>
                                                    <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                                                    <ul class="dropdown-menu" role="menu">
													
                                                        <div style="width:17px; height:17px; margin-top:10px; margin-left:10px; margin-bottom:0px;">
<svg xmlns="http://www.w3.org/2000/svg" width="47" height="64" viewBox="0 0 47 64">
<path style="fill:#5D6D7E;" d="M30.252 63.441c-4.55 0-7.864-1.089-9.946-3.267-2.08-2.177-3.121-4.525-3.121-7.041 0-.92.181-1.694.544-2.323a3.993 3.993
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
                                                        <li style="margin-top:-26px; margin-left:20px;"><a href="#" onClick = 'make_tarnsaction(2)'> Tezos</a></li>
                                                                                                           
                                                    </ul>
                                                </div>
								</span>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" style="margin-top:-23px;">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="grehl.software@gmail.com">
<input type="hidden" name="no_shipping" value="2">
<input type="hidden" name="item_name" value="Tezos Heart Patch">
<input type="hidden" name="item_number" value="tz101">
<input type="hidden" name="amount" value="9.95">
<input type="hidden" name="currency_code" value="USD">
<input type="hidden" name="return" value="https://radion.fm/thank-you-for-your-purchase.php">
<input type="hidden" name="cancel_return" value="https://radion.fm/cancel-order.php">
<input type="hidden" name="notify_url" value="https://radion.fm/slpw/pay_paypal/slpaypal.php">
<input type="hidden" name="custom" value="<?php echo $slordercustom; ?>">
<input type="image" src="https://radion.fm/slpw/pay_paypal/buttonimages/x-click-but22.gif">
</form>



								</div>
								</div> 
								
								<div class="sr-item">
									<div class="x-features-profile" style="padding-top:10px;">
									<img src="e-commerce/tezos-blue-white.jpg" class="pull-left" style="display:inline-block; width:auto; height:130px; margin-top:10px; margin-right:20px; margin-left:10px; border-radius: 50px 25px;" alt=""/>
									</div>
									<div align="right" style="padding-right:10px;"><span class="fas fa-dollar-sign fa-1x"></span> <span style="font-size:150%; color:#196f3d;" class='intotal'><strong>9.95 </strong></span><span style="font-size:10px; padding-right:10px;">USD</span></div>
                                    <h3 style="margin-top:-20px;">Blue White Tezos Patch</h3>
                                    <p style="padding-right:10px;" align="justify">This is a Special Edition 3X3cm embroidery patch ideal and ready to sew on your favorite garment. 
									Custom high end product, resistant and durable against any weather conditions or washing process.</p>
									<p style="padding-bottom:10px;"><span style="color:#909497;"><i class="fas fa-store-alt"></i> Pre-Order</span>
									<span style="padding-left:10px; color:#909497;"><i class="fad fa-shipping-fast"></i> Free Shipping</span>
									
									<span style="padding-left:10px; color:#909497;"><i class="fad fa-tags"></i> 30% OFF with XTZ</span>
									</p>
                                
								<div align="right" style="padding-right:10px; padding-bottom:5px;">
								<span style="margin-right:90px;">
								<div class="btn-group">
                                                    <button type="button" class="btn btn-primary btn-xs">&nbsp;&nbsp;&nbsp;BUY WITH CRYPTO</button>
                                                    <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                                                    <ul class="dropdown-menu" role="menu">
													
                                                        <div style="width:17px; height:17px; margin-top:10px; margin-left:10px; margin-bottom:0px;">
<svg xmlns="http://www.w3.org/2000/svg" width="47" height="64" viewBox="0 0 47 64">
<path style="fill:#5D6D7E;" d="M30.252 63.441c-4.55 0-7.864-1.089-9.946-3.267-2.08-2.177-3.121-4.525-3.121-7.041 0-.92.181-1.694.544-2.323a3.993 3.993
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
                                                        <li style="margin-top:-26px; margin-left:20px;"><a href="#" onClick = 'make_tarnsaction(3)'> Tezos</a></li>
                                                                                                           
                                                    </ul>
                                                </div>
								</span>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" style="margin-top:-23px;">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="grehl.software@gmail.com">
<input type="hidden" name="no_shipping" value="2">
<input type="hidden" name="item_name" value="Blue White Tezos Patch">
<input type="hidden" name="item_number" value="tz10">
<input type="hidden" name="amount" value="9.95">
<input type="hidden" name="currency_code" value="USD">
<input type="hidden" name="return" value="https://radion.fm/thank-you-for-your-purchase.php">
<input type="hidden" name="cancel_return" value="https://radion.fm/cancel-order.php">
<input type="hidden" name="notify_url" value="https://radion.fm/slpw/pay_paypal/slpaypal.php">
<input type="hidden" name="custom" value="<?php echo $slordercustom; ?>">
<input type="image" src="https://radion.fm/slpw/pay_paypal/buttonimages/x-click-but22.gif">
</form>

								</div>
								</div> 
								
                                </div>
								
								 <div class="col-md-6">
						<div class="panel-heading">                                        
                                    <h2 class="panel-title"><span class="fas fa-box-open"></span> PRE-ORDER PRODUCTS LIMITED EDITION</h2>
                                </div>
                                
								<div class="sr-item">
									<div class="x-features-profile" style="padding-top:10px;">
									<img src="e-commerce/Tezos-italy.jpg" class="pull-left" style="display:inline-block; width:auto; height:130px; margin-top:10px; margin-right:20px; margin-left:10px; border-radius: 50px 25px;" alt=""/>
									</div>
									<div align="right" style="padding-right:10px;"><span class="fas fa-dollar-sign fa-1x"></span> <span style="font-size:150%; color:#196f3d;" class='intotal'><strong>14.95 </strong></span><span style="font-size:10px; padding-right:10px;">USD</span></div>
                                    <h3 style="margin-top:-20px;">Tezos Italy Patch</h3>
                                    <p style="padding-right:10px;" align="justify">This is a Special Edition 6X6cm embroidery patch ideal and ready to sew on your favorite garment. 
									Custom high end product, resistant and durable against any weather conditions or washing process.</p>
									<p style="padding-bottom:10px;"><span style="color:#909497;"><i class="fas fa-store-alt"></i> Pre-Order</span>
									<span style="padding-left:10px; color:#909497;"><i class="fad fa-shipping-fast"></i> Free Shipping</span>
									
									<span style="padding-left:10px; color:#909497;"><i class="fad fa-tags"></i> 30% OFF with XTZ</span>
									</p>
                                
								<div align="right" style="padding-right:10px; padding-bottom:5px;">
								<span style="margin-right:90px;">
								<div class="btn-group">
                                                    <button type="button" class="btn btn-primary btn-xs">&nbsp;&nbsp;&nbsp;BUY WITH CRYPTO</button>
                                                    <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                                                    <ul class="dropdown-menu" role="menu">
													
                                                        <div style="width:17px; height:17px; margin-top:10px; margin-left:10px; margin-bottom:0px;">
<svg xmlns="http://www.w3.org/2000/svg" width="47" height="64" viewBox="0 0 47 64">
<path style="fill:#5D6D7E;" d="M30.252 63.441c-4.55 0-7.864-1.089-9.946-3.267-2.08-2.177-3.121-4.525-3.121-7.041 0-.92.181-1.694.544-2.323a3.993 3.993
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
                                                        <li style="margin-top:-26px; margin-left:20px;"><a href="#" onClick = 'make_tarnsaction(4)'> Tezos</a></li>
                                                                                                           
                                                    </ul>
                                                </div>
								</span>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" style="margin-top:-23px;">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="grehl.software@gmail.com">
<input type="hidden" name="no_shipping" value="2">
<input type="hidden" name="item_name" value="Tezos Italy Patch">
<input type="hidden" name="item_number" value="tz100">
<input type="hidden" name="amount" value="14.95">
<input type="hidden" name="currency_code" value="USD">
<input type="hidden" name="return" value="https://radion.fm/thank-you-for-your-purchase.php">
<input type="hidden" name="cancel_return" value="https://radion.fm/cancel-order.php">
<input type="hidden" name="notify_url" value="https://radion.fm/slpw/pay_paypal/slpaypal.php">
<input type="hidden" name="custom" value="<?php echo $slordercustom; ?>">
<input type="image" src="https://radion.fm/slpw/pay_paypal/buttonimages/x-click-but22.gif">
</form>

								</div>
								</div>                                  
                                
                               <div class="sr-item">
									<div class="x-features-profile" style="padding-top:10px;">
									<img src="e-commerce/tezos-espana.jpg" class="pull-left" style="display:inline-block; width:auto; height:130px; margin-top:10px; margin-right:20px; margin-left:10px; border-radius: 50px 25px;" alt=""/>
									</div>
									<div align="right" style="padding-right:10px;"><span class="fas fa-dollar-sign fa-1x"></span> <span style="font-size:150%; color:#196f3d;" class='intotal'><strong>14.95 </strong></span><span style="font-size:10px; padding-right:10px;">USD</span></div>
                                    <h3 style="margin-top:-20px;">Tezos Espana Patch</h3>
                                    <p style="padding-right:10px;" align="justify">This is a Special Edition 6X6cm embroidery patch ideal and ready to sew on your favorite garment. 
									Custom high end product, resistant and durable against any weather conditions or washing process.</p>
									<p style="padding-bottom:10px;"><span style="color:#909497;"><i class="fas fa-store-alt"></i> Pre-Order</span>
									<span style="padding-left:10px; color:#909497;"><i class="fad fa-shipping-fast"></i> Free Shipping</span>
									
									<span style="padding-left:10px; color:#909497;"><i class="fad fa-tags"></i> 30% OFF with XTZ</span>
									</p>
                                
								<div align="right" style="padding-right:10px; padding-bottom:5px;">
								<span style="margin-right:90px;">
								<div class="btn-group">
                                                    <button type="button" class="btn btn-primary btn-xs">&nbsp;&nbsp;&nbsp;BUY WITH CRYPTO</button>
                                                    <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                                                    <ul class="dropdown-menu" role="menu">
													
                                                        <div style="width:17px; height:17px; margin-top:10px; margin-left:10px; margin-bottom:0px;">
<svg xmlns="http://www.w3.org/2000/svg" width="47" height="64" viewBox="0 0 47 64">
<path style="fill:#5D6D7E;" d="M30.252 63.441c-4.55 0-7.864-1.089-9.946-3.267-2.08-2.177-3.121-4.525-3.121-7.041 0-.92.181-1.694.544-2.323a3.993 3.993
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
                                                        <li style="margin-top:-26px; margin-left:20px;"><a href="#" onClick = 'make_tarnsaction(5)'> Tezos</a></li>
                                                                                                           
                                                    </ul>
                                                </div>
								</span>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" style="margin-top:-23px;">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="grehl.software@gmail.com">
<input type="hidden" name="no_shipping" value="2">
<input type="hidden" name="item_name" value="Tezos Espana Patch">
<input type="hidden" name="item_number" value="tz110">
<input type="hidden" name="amount" value="14.95">
<input type="hidden" name="currency_code" value="USD">
<input type="hidden" name="return" value="https://radion.fm/thank-you-for-your-purchase.php">
<input type="hidden" name="cancel_return" value="https://radion.fm/cancel-order.php">
<input type="hidden" name="notify_url" value="https://radion.fm/slpw/pay_paypal/slpaypal.php">
<input type="hidden" name="custom" value="<?php echo $slordercustom; ?>">
<input type="image" src="https://radion.fm/slpw/pay_paypal/buttonimages/x-click-but22.gif">
</form>

								</div>
								</div>

								<div class="sr-item">
									<div class="x-features-profile" style="padding-top:10px;">
									<img src="e-commerce/tezos-france.jpg" class="pull-left" style="display:inline-block; width:auto; height:130px; margin-top:10px; margin-right:20px; margin-left:10px; border-radius: 50px 25px;" alt=""/>
									</div>
									<div align="right" style="padding-right:10px;"><span class="fas fa-dollar-sign fa-1x"></span> <span style="font-size:150%; color:#196f3d;" class='intotal'><strong>14.95 </strong></span><span style="font-size:10px; padding-right:10px;">USD</span></div>
                                    <h3 style="margin-top:-20px;">Tezos France Patch</h3>
                                    <p style="padding-right:10px;" align="justify">This is a Special Edition 6X6cm embroidery patch ideal and ready to sew on your favorite garment. 
									Custom high end product, resistant and durable against any weather conditions or washing process.</p>
									<p style="padding-bottom:10px;"><span style="color:#909497;"><i class="fas fa-store-alt"></i> Pre-Order</span>
									<span style="padding-left:10px; color:#909497;"><i class="fad fa-shipping-fast"></i> Free Shipping</span>
									
									<span style="padding-left:10px; color:#909497;"><i class="fad fa-tags"></i> 30% OFF with XTZ</span>
									</p>
                                
								<div align="right" style="padding-right:10px; padding-bottom:5px;">
								<span style="margin-right:90px;">
								<div class="btn-group">
                                                    <button type="button" class="btn btn-primary btn-xs">&nbsp;&nbsp;&nbsp;BUY WITH CRYPTO</button>
                                                    <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                                                    <ul class="dropdown-menu" role="menu">
													
                                                        <div style="width:17px; height:17px; margin-top:10px; margin-left:10px; margin-bottom:0px;">
<svg xmlns="http://www.w3.org/2000/svg" width="47" height="64" viewBox="0 0 47 64">
<path style="fill:#5D6D7E;" d="M30.252 63.441c-4.55 0-7.864-1.089-9.946-3.267-2.08-2.177-3.121-4.525-3.121-7.041 0-.92.181-1.694.544-2.323a3.993 3.993
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
                                                        <li style="margin-top:-26px; margin-left:20px;"><a href="#" onClick = 'make_tarnsaction(6)'> Tezos</a></li>
                                                                                                           
                                                    </ul>
                                                </div>
								</span>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" style="margin-top:-23px;">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="grehl.software@gmail.com">
<input type="hidden" name="no_shipping" value="2">
<input type="hidden" name="item_name" value="Tezos France">
<input type="hidden" name="item_number" value="tz111">
<input type="hidden" name="amount" value="14.95">
<input type="hidden" name="currency_code" value="USD">
<input type="hidden" name="return" value="https://radion.fm/thank-you-for-your-purchase.php">
<input type="hidden" name="cancel_return" value="https://radion.fm/cancel-order.php">
<input type="hidden" name="notify_url" value="https://radion.fm/slpw/pay_paypal/slpaypal.php">
<input type="hidden" name="custom" value="<?php echo $slordercustom; ?>">
<input type="image" src="https://radion.fm/slpw/pay_paypal/buttonimages/x-click-but22.gif">
</form>

								</div>
								</div> 								
                                	
									<div class="sr-item">
									<div class="x-features-profile" style="padding-top:10px;">
									<img src="e-commerce/tezos-us.jpg" class="pull-left" style="display:inline-block; width:auto; height:130px; margin-top:10px; margin-right:20px; margin-left:10px; border-radius: 50px 25px;" alt=""/>
									</div>
									<div align="right" style="padding-right:10px;"><span class="fas fa-dollar-sign fa-1x"></span> <span style="font-size:150%; color:#196f3d;" class='intotal'><strong>14.95 </strong></span><span style="font-size:10px; padding-right:10px;">USD</span></div>
                                    <h3 style="margin-top:-20px;">Tezos USA Patch</h3>
                                    <p style="padding-right:10px;" align="justify">This is a Special Edition 6X6cm embroidery patch ideal and ready to sew on your favorite garment. 
									Custom high end product, resistant and durable against any weather conditions or washing process.</p>
									<p style="padding-bottom:10px;"><span style="color:#909497;"><i class="fas fa-store-alt"></i> Pre-Order</span>
									<span style="padding-left:10px; color:#909497;"><i class="fad fa-shipping-fast"></i> Free Shipping</span>
									
									<span style="padding-left:10px; color:#909497;"><i class="fad fa-tags"></i> 30% OFF with XTZ</span>
									</p>
                                
								<div align="right" style="padding-right:10px; padding-bottom:5px;">
								<span style="margin-right:90px;">
								<div class="btn-group">
                                                    <button type="button" class="btn btn-primary btn-xs">&nbsp;&nbsp;&nbsp;BUY WITH CRYPTO</button>
                                                    <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                                                    <ul class="dropdown-menu" role="menu">
													
                                                        <div style="width:17px; height:17px; margin-top:10px; margin-left:10px; margin-bottom:0px;">
<svg xmlns="http://www.w3.org/2000/svg" width="47" height="64" viewBox="0 0 47 64">
<path style="fill:#5D6D7E;" d="M30.252 63.441c-4.55 0-7.864-1.089-9.946-3.267-2.08-2.177-3.121-4.525-3.121-7.041 0-.92.181-1.694.544-2.323a3.993 3.993
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
                                                        <li style="margin-top:-26px; margin-left:20px;"><a href="#" onClick = 'make_tarnsaction(7)'> Tezos</a></li>
                                                                                                           
                                                    </ul>
                                                </div>
								</span>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" style="margin-top:-23px;">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="grehl.software@gmail.com">
<input type="hidden" name="no_shipping" value="2">
<input type="hidden" name="item_name" value="Tezos USA Patch">
<input type="hidden" name="item_number" value="tz1000">
<input type="hidden" name="amount" value="14.95">
<input type="hidden" name="currency_code" value="USD">
<input type="hidden" name="return" value="https://radion.fm/thank-you-for-your-purchase.php">
<input type="hidden" name="cancel_return" value="https://radion.fm/cancel-order.php">
<input type="hidden" name="notify_url" value="https://radion.fm/slpw/pay_paypal/slpaypal.php">
<input type="hidden" name="custom" value="<?php echo $slordercustom; ?>">
<input type="image" src="https://radion.fm/slpw/pay_paypal/buttonimages/x-click-but22.gif">
</form>

								</div>
								</div> 	


<div class="sr-item">
									<div class="x-features-profile" style="padding-top:10px;">
									<img src="e-commerce/tezos-us.jpg" class="pull-left" style="display:inline-block; width:auto; height:130px; margin-top:10px; margin-right:20px; margin-left:10px; border-radius: 50px 25px;" alt=""/>
									</div>
									<div align="right" style="padding-right:10px;"><span class="fas fa-dollar-sign fa-1x"></span> <span style="font-size:150%; color:#196f3d;" class='intotal'><strong>0.10 </strong></span><span style="font-size:10px; padding-right:10px;">USD</span></div>
                                    <h3 style="margin-top:-20px;">Testing 101</h3>
                                    <p style="padding-right:10px;" align="justify">Make sure we see this description for testing.</p>
									<p style="padding-bottom:10px;"><span style="color:#909497;"><i class="fas fa-store-alt"></i> Pre-Order</span>
									<span style="padding-left:10px; color:#909497;"><i class="fad fa-shipping-fast"></i> Free Shipping</span>
									
									<span style="padding-left:10px; color:#909497;"><i class="fad fa-tags"></i> 30% OFF with XTZ</span>
									</p>
                                
								<div align="right" style="padding-right:10px; padding-bottom:5px;">
								<span style="margin-right:90px;">
								<div class="btn-group">
                                                    <button type="button" class="btn btn-primary btn-xs">&nbsp;&nbsp;&nbsp;BUY WITH CRYPTO</button>
                                                    <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                                                    <ul class="dropdown-menu" role="menu">
													
                                                        <div style="width:17px; height:17px; margin-top:10px; margin-left:10px; margin-bottom:0px;">
<svg xmlns="http://www.w3.org/2000/svg" width="47" height="64" viewBox="0 0 47 64">
<path style="fill:#5D6D7E;" d="M30.252 63.441c-4.55 0-7.864-1.089-9.946-3.267-2.08-2.177-3.121-4.525-3.121-7.041 0-.92.181-1.694.544-2.323a3.993 3.993
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
                                                        <li style="margin-top:-26px; margin-left:20px;"><a href="#" onClick = 'make_tarnsaction(8)'> Tezos</a></li>
                                                                                                           
                                                    </ul>
                                                </div>
								</span>


								</div>
								</div> 								
								
                                </div>
								
								</div>
								</div>
                            <!-- END SEARCH RESULT -->
                            
                                                    
                            
                        </div>                        
                    </div>
                                                            
                </div>
                <!-- END PAGE CONTENT WRAPPER -->       
            

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

        <!-- THIS PAGE PLUGINS -->
        <script type='text/javascript' src='js/plugins/icheck/icheck.min.js'></script>
        <!-- END PAGE PLUGINS -->       

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="js/plugins.js"></script>        
        <script type="text/javascript" src="js/actions.js"></script>        
        <!-- END TEMPLATE -->
    
	<!-- END SCRIPTS -->         
	<script language="javascript" type="text/javascript">
	startcart();
	</script>

<script>
// When the user scrolls the page, execute myFunction
window.onscroll = function() {myFunction()};

// Get the navbar
var navbar = document.getElementById("navbar");

// Get the offset position of the navbar
var sticky = navbar.offsetTop;

// Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
} 
</script>
</body>
	
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
            tezbridge.request({
                method: 'get_source'
            }).then((address) => {
                console.log(address);
                document.getElementById("get_source").innerHTML = address;

                if (yes) {
                    document.getElementById('wallet_address').innerHTML = address;

                    new QRCode(document.getElementById('qraddress'), address);
                    yes = false;
                }

                taquito.Tezos.setProvider({ rpc: 'https://rpc.tzkt.io/mainnet' });
            taquito.Tezos.tz.getBalance(address)
                .then((balance) => {
                    let _bal = balance.toNumber() / 1000000;
                    bal.innerHTML = `${_bal} ꜩ`;
                    let _usd_rate = <?php echo getValue('priceUsd') ?>;
					$('#_usd_balance').text (Number(_bal*_usd_rate).toFixed(2));
                    console.log(Number(_bal*_usd_rate).toFixed(2));
                })
                .catch(error => console.log(JSON.stringify(error))); 
				
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
     let priceUsd

    function make_tarnsaction(lenght) {
        var price = document.getElementsByClassName('intotal')[lenght].children
        var productPrice = Number(price[0].textContent);
        priceUsd = Number($('#usdPrice').text())
        price = '';
        c = (((productPrice/priceUsd))*0.70).toString();
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
            html: "<br><p align = 'left' style='padding-left:15px;'> Wait for confirmation!<br>Be Patient, this may take a while. Keep this browser tab open until you see a succesful confirmation.</p><hr><p align='left' style='padding-left:15px;'><strong>Transaction ID:</strong></p> "  + "<p align = 'left' style='padding-left:15px; font-size:13px;'>" +  a.operation_id + '</p>',
			imageUrl: 'https://radion.fm/img/radion-connection.gif',
			imageWidth: 200,
			imageHeight: 50,
			
             })
            setTimeout(function () {
              get_transaction() 
           }, 30000)
        })
        .catch(err => {
            console.log(err);
            if(err == `TypeError: Cannot read property 'forEach' of undefined`){
                Swal.fire({
                    icon: 'error',
                    title: 'Oh No. No enough Funds!',
                    text: "Please check your balance!."

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
	
</html>






