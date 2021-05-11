<?php session_start() ;
error_reporting(0);
require_once 'db.php';
//require_once("../slpw/sitelokpw.php");
 date_default_timezone_set('US/Eastern');
$xml = simplexml_load_file("https://radion.fm:8002/statistics");

$songTitle=(string) $xml->STREAMSTATS->STREAM->SONGTITLE;
$result = array();
$result['songTitle'] = $songTitle;
////////

//next song code

$nextSong= (string)$xml->STREAMSTATS->STREAM->NEXTTITLE;

$result['nextSong'] = $nextSong;

$curl = curl_init('https://radion.fm:8002/playingart?sid=1');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$res = curl_exec($curl);
curl_close($curl);

if ($res === '') {
	$result['artwork'] = 0;
} else {
	$result['artwork'] = 1;
}
//get download share loves purchase like dislike details code start


$music_album_title=explode("-",$songTitle);


	$get_music_id="SELECT `SONG_ID` as sid FROM `song` WHERE `SONG_NAME`='$music_album_title[1]' AND `ALBUM_NAME`='$music_album_title[0]'";
	$sid_query = $con->query($get_music_id);
	$sid = $sid_query->fetch_object()->sid;


if ($sid!=NULL && $sid<0 ) {
	//check paly song is ava. or not. and add new song
	$check_music="SELECT `MUSIC_ID` as mid FROM `song_play_session`  ORDER BY `ID` DESC LIMIT 1";
	
	
	$mid_query = $con->query($check_music);
	$mid = $mid_query->fetch_object()->mid;
	$stream_id=0;
	
	if($mid==$sid){
		$stream_id_query="SELECT `ID` stid FROM `song_play_session` WHERE `MUSIC_ID` =$mid ORDER BY `ID` DESC LIMIT 1";
	$mstid_query = $con->query($stream_id_query);
	$stid = $mstid_query->fetch_object()->mid;
		$stream_id=$stid;
		$result['is_New']=1;
	}else{
	$st_insert="INSERT INTO `song_play_session`(`MUSIC_ID`, `PLAY_DATE_TIME`) VALUES ($sid,'".date("Y-m-d H:i:s")."')";
	
		$mstid_query = $con->query($st_insert);
		$stream_id = $con->insert_id;
	       $query = $con->query("UPDATE song SET PLAY_TIMEDATE='".date("Y-m-d H:i:s")."',TOTAL_STREAM=TOTAL_STREAM+1 WHERE SONG_NAME ='$songTitle'");
	$result['is_New']=0;
	}
		$result['stream_id']=$stream_id;
		$result['music_id']=$sid;

	
		$q = $con->query("SELECT COUNT(`ID`) AS like FROM `vote_per_session` WHERE `SESSION_ID`=$stream_id AND VOTE_STATUS=0");
		$result['isLikes'] = $q->fetch_object()->like;
		
		$q = $con->query("SELECT COUNT(`ID`) AS unlike FROM `vote_per_session` WHERE `SESSION_ID`=$stream_id AND VOTE_STATUS=1");
		$result['isUnLike'] = $q->fetch_object()->unlike;
		
		$q = $con->query("SELECT COUNT(`SONG_LOVE_ID`) AS `loveit` FROM `song_love` JOIN `song` ON `song_love`.`SONG_ID`=`song`.`SONG_ID`   WHERE `song`.`SONG_NAME`='$songTitle'");
		$result['isLoveit'] = $q->fetch_object()->loveit;

		$q = $con->query("SELECT COUNT(`SONG_SHARE_ID`) AS dedicat FROM `song_share` JOIN `song` ON `song_share`.`SONG_ID`=`song`.`SONG_ID` WHERE `song`.`SONG_NAME`='$songTitle'");
		$result['isDedicate'] = $q->fetch_object()->dedicat;

		$q = $con->query("SELECT COUNT(`SONG_PURCHASE_ID`) AS downsong FROM `song_purchase` JOIN  `song`  ON   `song_purchase`.`SONG_ID`=`song`.`SONG_ID` WHERE `song`.`SONG_NAME`='$songTitle'");
		$result['isDownload'] = $q->fetch_object()->downsong;

		$q = $con->query("SELECT count(*) as totUser FROM sl_whoisonline");
		$result['isTotUser'] = $q->fetch_object()->totUser;
	
		////////////////
		if (isset($_SESSION) && isset($_SESSION["ses_slusername"])) {
		$slusername=$_SESSION["ses_slusername"];
		
			$q = $con->query("SELECT `VOTE_STATUS` AS vote FROM `vote_per_session` WHERE `USER_NAME`='$slusername' AND `ID`=$stream_id");	
		
		$isVoted = $q->fetch_object()->vote;
			if ($isVoted === NULL) {
				$result['isVoted'] = 'not voted';
			} else {
				$result['isVoted'] = $isVoted;
			}
			
			
		
		
				$query_add = $con->query("SELECT count(*) AS songrow FROM `song_love` JOIN `song` ON `song_love`.`SONG_ID`=`song`.`SONG_ID` WHERE `song`.`SONG_NAME`= '$songTitle' AND `song_love`.`SONG_LOVE_USERNAME`='$slusername'");
	$isSongAvi = $query_add->fetch_object()->songrow;
	if($isSongAvi < 1){
		//	$query = $con->query("INSERT INTO `song_like`(`SONG_ID`, `SONG_LIKE_USERNAME`,`SONG_LIKE_STATUS`) VALUES ($songId,'$slusername',1)");
		$result['isLoved'] = 0;
	}else {
		$result['isLoved'] =1;
	
	}	
			//////
			
			
			$q2 = $con->query("SELECT `SONG_SHARE_STATUS` AS dedicate FROM `song_share` JOIN `song` ON `song_share`.`SONG_ID`=`song`.`SONG_ID` WHERE `song`.`SONG_NAME`= '$songTitle' AND `song_share`.`SONG_SHARE_USERNAME`='$slusername'");	
			
			$isDedicate = $q2->fetch_object()->dedicate;
			if ($isDedicate === NULL) {
				$result['isDedicate'] = 0;
			} else {
				$result['isDedicate'] = $isDedicate;
			}
		}
		////////////////////
		$get_music_id="SELECT `SONG_LENGTH` as length FROM `song` WHERE `SONG_NAME`='$music_album_title[1]' AND `ALBUM_NAME`='$music_album_title[0]'";
	$sid_query = $con->query($get_music_id);
	$length = $sid_query->fetch_object()->length;	
    $result['length'] = $length;

			
	////////////////
	$online_query = $con->query("SELECT COUNT(*) AS online_count FROM `sl_whoisonline` ");
	
	$totalonline = $online_query->fetch_object()->online_count;
	 $radio_market_price_q = $con->query("SELECT `convert_value` AS MARKET_PRICE FROM `slconfig` ");
	
	$radio_market_price = $radio_market_price_q->fetch_object()->MARKET_PRICE;


	
			
 
								      $potential_radio=$totalonline*$radio_market_price;
									  
									  $deductable_price=($potential_radio*61)/100;
									  
									  $potential_radio=$potential_radio-$deductable_price;
	  
									  $potential_usd=$potential_radio*$radio_market_price;
                                                                 $potential_usd= number_format((float)$potential_usd, 2, '.', '');

								   
														$result['potential_usd'] = $potential_usd;

		
		
		
	
}

echo json_encode($result);
		exit();	
// code end





