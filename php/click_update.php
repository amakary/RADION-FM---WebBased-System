<?php
require_once 'db.php';
$id=$_POST["id"];

$update="UPDATE `express_ads` SET  `TOTAL_CLICK`=TOTAL_CLICK+1 WHERE `express_ads_id`=$id";
$con->query($update);



?>