<?php
require_once 'db.php';
require_once("../slpw/sitelokpw.php");
$SONG_ID=$_POST["SONG_ID"];
$type = $_POST["type"]; //1==like, 2=unlike, 3=love,4=share

			$songId = $SONG_ID;

			
			if($type==1){
				$removeVote =  $con->query("DELETE FROM `song_like` WHERE  `SONG_ID`=$songId AND `SONG_LIKE_USERNAME`='$slusername' AND SONG_LIKE_STATUS=1");

			$query_add = $con->query("SELECT count(*) as songrow  FROM `song_like` WHERE `SONG_ID`=$songId AND `SONG_LIKE_USERNAME`='$slusername'");
	$isSongAvi = $query_add->fetch_object()->songrow;
	if($isSongAvi < 1){
			$query = $con->query("INSERT INTO `song_like`(`SONG_ID`, `SONG_LIKE_USERNAME`,`SONG_LIKE_STATUS`) VALUES ($songId,'$slusername',0)");
			//echo "1";
	}else{
	$removeVote =  $con->query("DELETE FROM `song_like` WHERE  `SONG_ID`=$songId AND `SONG_LIKE_USERNAME`='$slusername' AND SONG_LIKE_STATUS=0");
				//echo "2";
	}

			}else if($type==2){
				$removeVote =  $con->query("DELETE FROM `song_like` WHERE  `SONG_ID`=$songId AND `SONG_LIKE_USERNAME`='$slusername' AND SONG_LIKE_STATUS=0");

				$query_add = $con->query("SELECT count(*) as songrow  FROM `song_like` WHERE `SONG_ID`=$songId AND `SONG_LIKE_USERNAME`='$slusername' AND SONG_LIKE_STATUS=1");
	$isSongAvi = $query_add->fetch_object()->songrow;
	if($isSongAvi < 1){
			$query = $con->query("INSERT INTO `song_like`(`SONG_ID`, `SONG_LIKE_USERNAME`,`SONG_LIKE_STATUS`) VALUES ($songId,'$slusername',1)");
		//	echo "1";
	}else{
	$removeVote =  $con->query("DELETE FROM `song_like` WHERE  `SONG_ID`=$songId AND `SONG_LIKE_USERNAME`='$slusername' AND SONG_LIKE_STATUS=1");
			//	echo "2";
	}
			
			}else if($type==3){
			
				$query_add = $con->query("SELECT COUNT(*) as songrow FROM `song_love` WHERE `SONG_ID`=$songId AND `SONG_LOVE_USERNAME`='$slusername'");
	$isSongAvi = $query_add->fetch_object()->songrow;
	if($isSongAvi < 1){
			$query = $con->query("INSERT INTO `song_love`(`SONG_ID`, `SONG_LOVE_USERNAME`) VALUES ($songId,'$slusername')");
			//echo "1";
	}else{
	$removeVote =  $con->query("DELETE FROM `song_love` WHERE  `SONG_ID`=$songId AND `SONG_LOVE_USERNAME`='$slusername'");
			//	echo "2";
	}
		
			
			}else if($type==4){
					$query_add = $con->query("SELECT COUNT(*) as songrow FROM `song_share` WHERE `SONG_ID`=$songId AND `SONG_SHARE_USERNAME`='$slusername'");
	$isSongAvi = $query_add->fetch_object()->songrow;
	if($isSongAvi < 1){
			$query = $con->query("INSERT INTO `song_share`(`SONG_ID`, `SONG_SHARE_USERNAME`) VALUES ($songId,'$slusername')");
			//echo "1";
	}else{
	$removeVote =  $con->query("DELETE FROM `song_share` WHERE  `SONG_ID`=$songId AND `SONG_SHARE_USERNAME`='$slusername'");
			//	echo "2";
	}
		
			
			}

?>