<?php
require_once("../slpw/sitelokpw.php");

	include('../phpqrcode/qrlib.php'); 
	
	
	$directory='sl_f_qr_code/'.$slusername;
	
		$public_key=$_POST['public_key'];

	$privet_key=$_POST['privet_key'];
	
	if (!file_exists($directory)) {
    mkdir($directory, 0777, true);
}
	
require_once('db.php');
	
	                 $sql = "SELECT * FROM sitelok  where  `Username`='$slusername'" ;

	                           $result = mysqli_query($con,$sql);
	  
	                              while($row = $result->fetch_assoc()) {
								       
									   $Custom23 =	$row["Custom23"];
									   $Custom24 =	$row["Custom24"];
									   
									   
				             
	 
								  }
								  
	

	?>

	
                                         
													
													<div id="DivIdToPrint">
													<p style="padding-left:50px; padding-right:50px; padding-top:10px; padding-bottom:10px;"><strong>Important Note!</strong><br>
					This is your Personal Wallet! Make sure you print this information or write it down for your personal records.</p>
					<div align="center">
					
					<?php 
					
					 $codeContents = 'Your Public Address : '.$Custom23; 
     
    // generating 
     
    // frame config values below 4 are not recomended !!! 
    QRcode::png($codeContents, $directory.'/008_4.png', QR_ECLEVEL_L, 6, 2);   
		
					    echo '<img src="php/'.$directory.'/008_4.png" />'; 

					?>
					</div>
					<hr>
					<div style="padding-left:5%; padding-right:5%;">
					<p >
                Your Public Address : <br><b id="public_key_1"><?php echo $Custom23;?></b><br><br>
                Your Private key : <br><b id="private_key_1"><?php echo $Custom24;?></b><br>
            </p>
					</div>
					<hr>
					<div align="right" style="padding-right:5%; padding-top:20px; padding-bottom:20px;">
					
						<button id="result" value='Print' onclick='printDiv();' class="btn btn-primary">Print</button>	
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
											
					</div>
					</div>

                                                  
											
												
                                           
                                            