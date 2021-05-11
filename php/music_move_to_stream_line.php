<?php
@ob_start();

$DbHost='localhost';        // Database host
$DbName='radion_dapp';          // Database name
$DbUser='Oclasus';         // Database username
$DbPassword='siempre_Radion78!';     // Database user password
 date_default_timezone_set('US/Eastern');
$current_date_time=date("Y-m-d H:i:s");
		 
  include 'music_info_get.php';


// Usually the settings below don't need changing
    // Database config tablename
 $con = mysqli_connect($DbHost,$DbUser,$DbPassword,$DbName);
if (mysqli_connect_errno($con))
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}else{
//echo "Connect";
}

		$online_query = $con->query("SELECT COUNT(*) AS online_count FROM `sl_whoisonline` ");
	     $totalonline = $online_query->fetch_object()->online_count;

		 
		 
$song_query="SELECT `SONG_ID`,`ALBUM_NAME`,`USER_NAME`,(SELECT COUNT(`SONG_ID`) Total_like   FROM song_like WHERE song_like.SONG_ID=song.SONG_ID) AS TOTAL_VOTE FROM `song` WHERE   TIMESTAMPDIFF(MINUTE,`SONG_SUBMIT_DATE`,'".$current_date_time."') >1455 AND SONG_STATUS=0 ";

$radio_market_price_q = $con->query("SELECT `convert_value` AS MARKET_PRICE FROM `slconfig` ");
	
	$radio_market_price = $radio_market_price_q->fetch_object()->MARKET_PRICE;

	

	  $result = mysqli_query($con,$song_query);
	     if ($result->num_rows > 0) {
                                      while($row1 = $result->fetch_assoc()) {

									$song_id=$row1['SONG_ID'];
									$USER_NAME=$row1['USER_NAME'];
									$ALBUM_NAME=$row1['ALBUM_NAME'];
									$TOTAL_VOTE=$row1['TOTAL_VOTE'];
									
									$vote_percent=($TOTAL_VOTE*100)/$totalonline;
									  echo $vote_percent." : ";
									if($vote_percent>2){
									
									
									 $base_path="C:\Inetpub/vhosts/radion.fm/httpdocs/slbackups_mlicqx83sq/Music";
 $full_path=$base_path."/".$USER_NAME."/".$ALBUM_NAME."/*";
 
 // $fileList1=array();
 // $fileList1 = glob($full_path);
 // $name_="";
 
// $song_extention="mp3";
 // foreach($fileList1 as $filename){
  
   // $name_=$filename;
   // $ext = pathinfo($filename, PATHINFO_EXTENSION);
 
 // // echo $ext, '<br>'; 
// if($ext=="mp3" || $ext=="mp4" || $ext=="m4a" || $ext=="MP3"){
// $song_extention=$ext;
 // $file_name=$filename;
// }
 
// }
 

										 // $song_source =$file_name;// "../slbackups_mlicqx83sq/Music/".$USER_NAME."/queue/".$ALBUM_NAME."/".$song_id.".mp3"; 
		
// $img_extention="jpg";
		// $file_name1="";		

		 // $fileList=array();
 // $fileList = glob($full_path);
 
// foreach($fileList as $filename1){
  
   
   // $ext1 = pathinfo($filename1, PATHINFO_EXTENSION);
 
 // // echo $ext, '<br>'; 
// if($ext1=="jpg" || $ext1=="JPG" || $ext1=="PNG" || $ext1=="png"){

 // $file_name1=$filename1;
 // $img_extention=$ext;
 
// }else{

 // //$file_name="assets/images/users/pre-radion.jpg";

// }
 
// }

								//	$img_source =$file_name1;// "../slbackups_mlicqx83sq/Music/".$USER_NAME."/queue/".$ALBUM_NAME."/".$song_id.".jpg"; 
									  
									  
									  // $audio_link=get_music_source($SONG_ID,0); //"slbackups_mlicqx83sq/Music/".$USER_NAME."/queue/".$ALBUM_NAME."/".$SONG_ID.".mp3";
									// $img_link=get_art_work($SONG_ID,0);//"slbackups_mlicqx83sq/Music/".$USER_NAME."/queue/".$ALBUM_NAME."/".$SONG_ID.".jpg";
									

								  echo $full_path.": IMFG:<br>";
									  									  
				 $file_path="C:\Inetpub/vhosts/radion.fm/httpdocs/stream_mlicqx83sq/".$USER_NAME."/".$ALBUM_NAME."/";
                        if(!is_dir($file_path)){
                              mkdir($file_path, 0755, true);
                      
					  }
					 
                                         echo "2";

										 
										 
										 ////
	 $fileList=array();
 $fileList = glob($full_path);
 
foreach($fileList as $filename1){
  
     rename($filename1, $file_path."/".basename($filename1));
//chmod($file_path."/".basename($filename1),7777);
}
										 
										 
										 ////
                                            // rename($song_source, $file_path."/".$song_id.".".$song_extention);
									    
										// rename($img_source, $file_path."/".$song_id.".".$img_extention);
											 

												 $query = $con->query("UPDATE `song` SET `SONG_STATUS`=1 WHERE `SONG_ID`='$song_id'");
	  
	  
	 
	  
	  
	  $total_like="SELECT COUNT(`SONG_LIKE_ID`) AS TOTAL_LIKE FROM `song_like` WHERE `SONG_ID`='$song_id'";
	  
	  $total_like_q = $con->query($total_like);
	  

	  $TOTAL_LIKE = $total_like_q->fetch_object()->TOTAL_LIKE;

	  $per_person_amount=2.50*$TOTAL_LIKE;
	  
	  $per_person_amount_radio=$per_person_amount*$radio_market_price;
	  
	  $get_voters="SELECT `SONG_LIKE_USERNAME` FROM `song_like` WHERE `SONG_ID`='$song_id'";
	   $result1 = mysqli_query($con,$get_voters);
	     if ($result1->num_rows > 0) {
                                      while($row11 = $result1->fetch_assoc()) {
									  
									  $SONG_LIKE_USERNAME=$row11['SONG_LIKE_USERNAME'];
									  
						$query = $con->query("UPDATE `sitelok` SET `Custom9`=Custom9+$per_person_amount_radio WHERE `Username`='$SONG_LIKE_USERNAME'");
									  
									  }
									  }
	  
									
									}else{
									
									
																					  $query = $con->query("UPDATE `song` SET `SONG_STATUS`=2 WHERE `SONG_ID`='$song_id'");

									
									
									}
									
									
								
									  }

									  }else{
									  
									  
									  echo "No music";
									  }

?>