<?php

$groupswithaccess = 'RADIONER,CEO,FOUNDER';

require_once '../slpw/sitelokpw.php';
require_once '../slpw/slconfig.php';

$song_query = "SELECT `SONG_ID` AS `ID`,`STATUS`,`USER_1`,`USER_2`,`INFRINGEMENT_TIME`,(SELECT `TOTAL_STREAM` FROM `song` WHERE `SONG_ID`=`ID`) AS `STREAM`,(SELECT COUNT(*) FROM `song_downloads` WHERE `SONG_ID`=`ID`) AS `DOWNLOADS` FROM `copyright_infringement` WHERE `USER_1`='$slusername' OR `USER_2`='$slusername' ORDER BY `INFRINGEMENT_TIME` DESC";
$result = $con->query($song_query);

if ($result && $result->num_rows > 0) {
  while($row1 = $result->fetch_assoc()) {
?>
  <tr>
    <td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd;"><i class="fas fa-copyright"></i></td>
    <td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd;"><?= $row1['STATUS'] ?></td>
    <td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd;"><?= $row1['USER_1'] ?></td>
    <td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd;"><?= date($row1['INFRINGEMENT_TIME']) ?></td>
    <td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd;"><?= $row1['ID'] ?></td>
    <td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd;"><?= $row1['STREAM'] ?></td>
    <td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd;"><?= $row1['DOWNLOADS'] ?></td>
  </tr>
<?php
  }
}
?>
