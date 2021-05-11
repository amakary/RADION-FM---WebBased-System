<?php
session_start() ;
error_reporting(0);
require_once 'db.php';
require_once("../slpw/sitelokpw.php");
	// echo "SUCCESS";
$song_id=$_POST['SONG_ID'];
$invest_persent=$_POST['invest_persent'];


if (isset($_SESSION) && isset($_SESSION["ses_slusername"])) {

	$avaiableRad = $con->query("SELECT `Custom19` AS Custom19 FROM `sitelok` WHERE `Username`='$slusername'");
	$avaiable_radio = $avaiableRad->fetch_object()->Custom19;
	
	
	$avaiableRad = $con->query("SELECT `INVEST_RADIO`as INVEST_RADIO FROM `song` WHERE `SONG_ID`='$song_id'");
	$INVEST_RADIO = $avaiableRad->fetch_object()->INVEST_RADIO;
          $ATTASTED_AMOUNT=($INVEST_RADIO*$invest_persent)/100;
		  
	$avaiableRad = $con->query("SELECT `USER_NAME` as USER_NAME FROM `song` WHERE `SONG_ID`='$song_id'");
	$SONG_OWNER = $avaiableRad->fetch_object()->USER_NAME;
	
	
	
	if($avaiable_radio<$INVEST_RADIO){
	
	   echo "FUND_NOT_AVAILABLE";
	
	}else{
	

		$avaiableRad1 = $con->query("INSERT INTO `invest_on_song`(`USER_NAME`, `SONG_ID`,`INVESTER_PERSENT`) VALUES ('$slusername',$song_id,'$invest_persent')");
	
				 
			$query = $con->query("UPDATE `sitelok` SET `Custom19`=Custom19+".$ATTASTED_AMOUNT." WHERE `Username`='$SONG_OWNER'");
		  $query = $con->query("UPDATE `sitelok` SET `Custom19`=Custom19-".$ATTASTED_AMOUNT." WHERE `Username`='$slusername'");
		
 echo "SUCCESS";
	
	}



}else{

echo "LOGIN";

}
?>