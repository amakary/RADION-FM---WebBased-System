<?php
session_start();
 require_once 'slpw/slconfig.php';

$ch = curl_init(); 
curl_setopt($ch, CURLOPT_URL, "https://radion.fm:8002/statistics"); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
$statXml = curl_exec($ch); 
curl_close($ch);    

$matches = array();
if (preg_match('/<SONGTITLE>(.*?)<\/SONGTITLE>/s', $statXml, $matches)) {
	$songTitle = $matches[1];
}
$result = array();
$result['songTitle'] = $songTitle;
//next song code
$matches_next = array();
if (preg_match('/<NEXTTITLE>(.*?)<\/NEXTTITLE>/s', $statXml, $matches_next)) {
	$nextSong = $matches_next[1];
}
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
if ($songTitle !== NULL) {
	//check paly song is ava. or not. and add new song
	$query_add = $con->query("SELECT count(*) as songrow FROM songs WHERE song_name='".$songTitle."'");
	$isSongAvi = $query_add->fetch_object()->songrow;
	if($isSongAvi < 1){
		$query = $con->query("INSERT INTO songs(song_id,song_name,play_timedate) VALUES('','".$songTitle."','')");
	}

	// add latest play enrty in songs dp
	$_SESSION['curr_songs'] = $songTitle;
	if(isset($_POST["count_latest_song"]) && $_POST["count_latest_song"]){
		if(isset($_SESSION['curr_songs']) && isset($_SESSION['next_songs']) && ($_SESSION['curr_songs'] == $_SESSION['next_songs'])){
			if(isset($_SESSION['start_song']) && $_SESSION['start_song'] != NULL && ($_SESSION['start_song'] != $_SESSION['curr_songs'])){
				$addsongtime = $_SESSION['start_song'];
				$query = $con->query("UPDATE songs SET play_timedate='".date("Y-m-d H:i:s")."' WHERE song_name ='$addsongtime'");
			}
			$_SESSION['start_song'] = $_SESSION['curr_songs'];
		}
		$_SESSION['next_songs'] = $nextSong;
	}

	if(isset($_POST["votedata"]) && $_POST["votedata"] != NULL){
		
		$q = $con->query("select count(case when a.vote=1 then 1 end) 'like'  from songs_votes a join songs b on a.song_id=b.song_id where b.song_name ='$songTitle' group by a.song_id");
		$result['isLikes'] = $q->fetch_object()->like;
		
		$q = $con->query("select count(case when a.vote=0 then 1 end) 'unlike' from songs_votes a join songs b on a.song_id=b.song_id where b.song_name ='$songTitle' group by a.song_id");
		$result['isUnLike'] = $q->fetch_object()->unlike;
		
		$q = $con->query("SELECT sum(love) as loveit FROM songs_votes JOIN songs ON songs_votes.song_id = songs.song_id WHERE song_name = '$songTitle'");
		$result['isLoveit'] = $q->fetch_object()->loveit;

		$q = $con->query("SELECT sum(dedicate) as dedicat FROM songs_votes JOIN songs ON songs_votes.song_id = songs.song_id WHERE song_name = '$songTitle'");
		$result['isDedicate'] = $q->fetch_object()->dedicat;

		$q = $con->query("SELECT sum(download) as downsong FROM songs_votes JOIN songs ON songs_votes.song_id = songs.song_id WHERE song_name = '$songTitle'");
		$result['isDownload'] = $q->fetch_object()->downsong;

		$q = $con->query("SELECT count(*) as totUser FROM sl_whoisonline");
		$result['isTotUser'] = $q->fetch_object()->totUser;
		//print_r($statXml);
		echo json_encode($result);
		exit();	
	}
}
// code end
if (isset($_SESSION) && isset($_SESSION["ses_sluserid"])) {
	
	if ($songTitle !== NULL) {
		$userId = $_SESSION["ses_sluserid"];
		if ($_SERVER['REQUEST_METHOD'] === "GET") {
			$q = $con->query("SELECT vote FROM songs_votes JOIN songs ON songs_votes.song_id = songs.song_id WHERE song_name = '$songTitle' AND user_id = $userId");	
			$isVoted = $q->fetch_object()->vote;
			if ($isVoted === NULL) {
				$result['isVoted'] = 'not voted';
			} else {
				$result['isVoted'] = $isVoted;
			}
			$q1 = $con->query("SELECT love FROM songs_votes JOIN songs ON songs_votes.song_id = songs.song_id WHERE song_name = '$songTitle' AND user_id = $userId");	
			$isLoved =$q1->fetch_object()->love;
			if ($isLoved === NULL) {
				$result['isLoved'] = 0;
			} else {
				$result['isLoved'] = $isLoved;
			}
			$q2 = $con->query("SELECT dedicate FROM songs_votes JOIN songs ON songs_votes.song_id = songs.song_id WHERE song_name = '$songTitle' AND user_id = $userId");	
			$isDedicate = $q2->fetch_object()->dedicate;
			if ($isDedicate === NULL) {
				$result['isDedicate'] = 0;
			} else {
				$result['isDedicate'] = $isDedicate;
			}
			echo json_encode($result);
			exit();
			
		}

		if ($_SERVER['REQUEST_METHOD'] === "POST") {
			$vote = $_POST["vote"];
			$songIdQuery = $con->query("SELECT song_id FROM songs WHERE song_name = '$songTitle'");
			$songId = $songIdQuery->fetch_object()->song_id;
			if (($vote === '0') || ($vote === '1'))  {
				if (!$songId) {
					$a = $con->query("INSERT INTO songs (song_name) VALUES('$songTitle')");	
					$songId = $con->insert_id;
				} 
				$voteIns =  $con->query("INSERT INTO songs_votes (song_id, user_id, vote) VALUES($songId, $userId, $vote) ON DUPLICATE KEY UPDATE vote=$vote");
			}  else if ($vote === 'removeVote') {
				$removeVote =  $con->query("DELETE FROM songs_votes WHERE song_id = $songId AND user_id = $userId");
				//$con->query("UPDATE songs_votes SET love=$love WHERE song_id = $songId AND user_id = $userId");
			}
			/*love-it code */
			$vote = $_POST['vote'];
			if ($vote === 'Love'){
				$love = 1;
				if (!$songId){
					$a = $con->query("INSERT INTO songs (song_name) VALUES('$songTitle')");	
					$songId = $con->insert_id;
				} 
				$loveIns =  $con->query("INSERT INTO songs_votes (song_id,user_id,vote,love) VALUES($songId, $userId,'2', $love) ON DUPLICATE KEY UPDATE love=$love");
			}else if ($vote === 'removeLove') {
				$love = 0;
				//$removeLove =  $con->query("DELETE FROM songs_votes WHERE song_id = $songId AND user_id = $userId");
				$removeLove =  $con->query("UPDATE songs_votes SET love=$love WHERE song_id = $songId AND user_id = $userId");
			}
			/*love-it code */
			$vote = $_POST['vote'];
			if ($vote === 'Dedicate'){
				$dedicate = 1;
				if (!$songId){
					$a = $con->query("INSERT INTO songs (song_name) VALUES('$songTitle')");	
					$songId = $con->insert_id;
				} 
				$dedicateIns =  $con->query("INSERT INTO songs_votes (song_id, user_id, vote, dedicate) VALUES($songId, $userId,'2',$dedicate) ON DUPLICATE KEY UPDATE dedicate=$dedicate");
			}else if ($vote === 'removeDedicate') {
				//$removeDedicate =  $con->query("DELETE FROM songs_votes WHERE song_id = $songId AND user_id = $userId");
				$dedicate = 0;
				$con->query("UPDATE songs_votes SET dedicate=$dedicate WHERE song_id = $songId AND user_id = $userId");
			}
			/*download code */
			$vote = $_POST['vote'];
			if ($vote === 'download'){
				$download = 1;
				if (!$songId){
					$a = $con->query("INSERT INTO songs (song_name) VALUES('$songTitle')");	
					$songId = $con->insert_id;
				}
				$countdownload = $con->query("SELECT download FROM songs_votes WHERE song_id=$songId AND user_id=$userId"); 
				$downloadadd = ($countdownload->fetch_object()->download + 1);
				$downloadIns =  $con->query("INSERT INTO songs_votes (song_id, user_id, vote, download) VALUES($songId, $userId,'2',$download) ON DUPLICATE KEY UPDATE download=$downloadadd ");
			}
		}
		
	} else {
		echo 'not broadcasting';
		http_response_code(404);
	}
} else {
	if ($songTitle !== NULL) {
		echo json_encode($result);
	} else {
		echo 'not broadcasting';
		http_response_code(404);
	} 
}

/*song list table*/
if(isset($_POST["listdata"]) && $_POST["listdata"] != NULL){
	ob_clean();
	echo '<table id="miyazaki" style="width:100%; background-color:rgba(0, 0, 0, 0.0)">
		<tbody>
		<tr>
			<td style="vertical-align: middle; background-color:rgba(0, 0, 0, 0.7); color:#fff;">Status
			<td style="vertical-align: middle; background-color:rgba(0, 0, 0, 0.7); color:#fff;">Name of the Song
			<td style="vertical-align: middle; background-color:rgba(0, 0, 0, 0.7); color:#fff;">Artist
			<td style="vertical-align: middle; background-color:rgba(0, 0, 0, 0.7); color:#fff;">Genre
			<td style="vertical-align: middle; background-color:rgba(0, 0, 0, 0.7); color:#fff;">Time
			<td style="vertical-align: middle; background-color:rgba(0, 0, 0, 0.7); color:#fff;">Popularity
			<td style="vertical-align: middle; background-color:rgba(0, 0, 0, 0.7); color:#fff;">Price
			<td style="margin:0px; background-color:rgba(0, 0, 0, 0.7); color:#fff;">
		</tr>';
 	//select b.song_id,b.song_name,count(case when a.vote=1 then 1 end) 'like',count(case when a.vote=0 then 1 end) 'unlike',sum(love) as loveit,sum(download) as downsong from songs b join songs_votes a on a.song_id = b.song_id group by b.song_id DESC LIMIT 30
	//$q = $con->query("select b.song_id,b.song_name,count(case when a.vote=1 then 1 end) 'like',count(case when a.vote=0 then 1 end) 'unlike',sum(love) as loveit,sum(download) as downsong from songs b join songs_votes a on a.song_id = b.song_id group by b.song_id ORDER BY b.play_timedate DESC LIMIT 30");
	$q = $con->query("SELECT * FROM `songs` ORDER BY `play_timedate` DESC LIMIT 30");	
	while($row = $q->fetch_assoc()) { 
		
		$name = explode('-',$row['song_name']);
		$song_id = $row['song_id'];
		$queryvote = $con->query("select count(case when vote=1 then 1 end) 'like',count(case when vote=0 then 1 end) 'unlike',sum(love) as loveit,sum(download) as downsong FROM songs_votes WHERE song_id ='$song_id'  group by song_id ");
		$popularity = 0;
		while($rows = $queryvote->fetch_assoc()) { 
			$popularity = (($rows['like'] + $rows['loveit'] + ($rows['downsong'] * 2)) - $rows['unlike']);
			//echo $popularity;
		}

	echo '<tr>
		<td style="vertical-align: middle;">In Store
		<td style="vertical-align: middle;">'.$name[1].'
		<td style="vertical-align: middle;">'.$name[0].'
		<td style="vertical-align: middle;">POP
		<td style="vertical-align: middle;">4:30';
			if($popularity > 5){
				$popularityper = (($popularity * 20)/100);
				echo '<td style="vertical-align: middle;color:green;">';
				for($i=1;$i<= $popularityper;$i++){ 
				 	echo '|';
				}
				//echo $popularityper.'-'.$popularity;
			}else if($popularity < -5){
				$popularityper = (($popularity * 20)/100);
				echo '<td style="vertical-align: middle;color:red;">';
				for($i=-1;$i >= $popularityper;$i--){ 
				 	echo '|';
				}
			}else{
				echo '<td style="vertical-align: middle;">';
				echo '-';
			} 
		echo '<td style="vertical-align: middle;">$1
		<td><div><a href="#" style="border-bottom: 1px solid #dddddd; border-top: 1px solid #dddddd; font-size:12px; margin:0px;">Tell a Friend</a></div>
	</tr>';

	  }
	echo '</table>';
}



