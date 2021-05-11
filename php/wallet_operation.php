<?php
session_start();
require_once("../slpw/sitelokpw.php");

	include('../phpqrcode/qrlib.php'); 

	$directory='sl_f_qr_code/'.$slusername;
	
	if (!file_exists($directory)) {
    mkdir($directory, 0777, true);
}


	$public_key=$_POST['public_key'];

	$privet_key=$_POST['privet_key'];




	require_once('db.php'); 
	

	
			$sql2 = "SELECT Username,Custom25 FROM sitelok WHERE `Username`='$slusername' AND `Custom25`=1";

	  $result1 = mysqli_query($con,$sql2);
	  
     
      $count = mysqli_num_rows($result1);
					
 if($count > 0) {
		  
		//   echo "exist"; 
		  
		  
	  }	
	  
	  
	  else
		  
		  {

                                  
	$sql1 = "UPDATE `sitelok` SET `Custom23`='$public_key',`Custom24`='$privet_key',`Custom25`=1  where  `Username`='$slusername'" ;
                                  
	$confirm = mysqli_query($con,$sql1);
	//echo $sql1;
	?>
	
                                              
												
                                                   
                                                    
													
													
													<p style="padding-left:50px; padding-right:50px; padding-top:10px; padding-bottom:10px;"><strong>Important Note!</strong><br>
					This is your Personal Wallet! Make sure you print this information or write it down for your personal records.</p>
					<div align="center">
					
									<?php 
					
					 $codeContents = 'Your Public Address : '.$public_key; 
     
     
    // frame config values below 4 are not recomended !!! 
                      QRcode::png($codeContents, $directory.'/008_4.png', QR_ECLEVEL_L, 6, 2);   
		
					    echo '<img src="php/'.$directory.'/008_4.png" />'; 

					?>
					
					
					</div>
					<hr>
					<div style="padding-left:5%; padding-right:5%;">
					<p >
                Your Public Address : <br><b ><?php echo $public_key;?></b><br><br>
                Your Private key : <br><b ><?php echo $privet_key;?></b><br>
            </p>
					</div>
					<hr>
					<div align="right" style="padding-right:5%; padding-top:20px; padding-bottom:20px;">
					
						<button id="print_view" class="btn btn-primary">Print</button>	
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
											
					</div>

                                                  
											
												
                                        
	
	<?php
	
	
		  }
	
     mysqli_close($con);

	 
				?>
				
				
				
