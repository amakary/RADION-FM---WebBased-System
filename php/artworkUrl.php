<?php
require_once 'db.php';

$audioUrl = "SELECT * FROM audio_url";	
if (!mysqli_query($con,$audioUrl))
{
	die('Error: ' . mysqli_error($con));
}
else {
	$result = mysqli_query($con, $audioUrl);
	//while ($row = $result->fetch_assoc()) {
		//$audio_url = $row["audio_url"];
	//}
	echo json_encode($result->fetch_assoc());
}

