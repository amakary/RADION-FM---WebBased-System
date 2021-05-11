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
  $con = mysqli_connect($DbHost,$DbUser,$DbPassword,$DbName);
if (mysqli_connect_errno($con))
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}else{
//echo "Connect";
}

$get_time="SELECT * FROM `slconfig` WHERE `AD_SHOW_DATE_TIME` < NOW() - INTERVAL 30 MINUTE AND `confignum`=1";
     $result = $con->query($get_time);
                                 
                                      if ($result->num_rows > 0) { 
$select_ads="SELECT express_ads.* FROM `express_ads` JOIN sitelok ON sitelok.Username=express_ads.Username WHERE `express_ads_main_home_page`=1 AND sitelok.Custom21>0  order by RAND() LIMIT 1";
  
  date_default_timezone_set('US/Eastern');
		$current_date_time=date("Y-m-d H:i:s");
               $result1 = $con->query($select_ads);
                                 
                                      if ($result1->num_rows > 0) { 
                                      while($row = $result1->fetch_assoc()){
									  $express_ads_id=$row["express_ads_id"];
									  
									  $query_for_update="UPDATE `slconfig` SET `LAST_AD_ID`=$express_ads_id,`AD_SHOW_DATE_TIME`='$current_date_time' WHERE `confignum`=1";
									  
									   $resul12t = $con->query($query_for_update);
                                 
									  }}				

						
									 
									  }

 
?>