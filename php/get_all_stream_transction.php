<?php
require_once 'db.php';
$limit=10;

//for total count data
$countSql = "SELECT COUNT(*) FROM `song`";  
$tot_result = mysqli_query($con, $countSql);   
$row = mysqli_fetch_row($tot_result);  
$total_records = $row[0];  
$total_pages = ceil($total_records / $limit);

if (isset($_POST["page"])) { $page  = $_POST["page"]; } else { $page=1; };  
  
$start_from = ($page-1) * $limit;  
$sql = "SELECT SONG_ID,DATE_FORMAT(DATE_ADD(SONG_SUBMIT_DATE, INTERVAL 1 DAY), '%d/%m/%Y') RELEASE_DATE,SONG_STATUS FROM `song` ORDER BY SONG_ID ASC LIMIT $start_from, $limit";  
$rs_result = mysqli_query($con, $sql); 




?>

<input type="hidden" id="total_record" value="<?php echo $total_records;?>">


<?php 

while ($row = mysqli_fetch_assoc($rs_result)) {
$SONG_STATUS=$row["SONG_STATUS"];

$status="Completed";

if($SONG_STATUS==0){

$status="Pending";

}

?>  
           
     <div class="sr-item">
			<div class="x-features-profile">
				<img src="assets/images/users/pre-radion.jpg" class="pull-left" style="display:inline-block; border-radius:50%; width:50px; height:50px; border-radius:1px solid black; margin-top:10px; margin-right:20px; margin-left:10px;" alt=""/>
				</div>
                  <a href="#" class="sr-item-title">TID: #<?php echo $row["SONG_ID"];?></a>
                    <p>System Statement <span style="padding-left:10px; padding-right:10px;"> - </span> Payout Release Date: <span class="sr-item-link"><?php echo $row["RELEASE_DATE"];?></span> - </span> Status: <?php echo $status;?> | Payout:<a href="#" style="text-decoration: none" class="sr-item-link"> <strong>$0</strong></a></p>
                      <p class="sr-item-links"><a href="#" style="text-decoration: none"><strong>Input:</strong> </a> <span style="padding-left:10px; padding-right:10px;">|</span> <a href="#" style="text-decoration: none">Investors: 0</a> - <a href="#" style="text-decoration: none">Downloads: 0</a> - <a href="#" style="text-decoration: none">Responses: 0</a> - <a href="#" style="text-decoration: none">Responses Value: $0</a> <span style="padding-left:10px; padding-right:10px;"></a></p>
            </div> 		   
		   
<?php  
}

?>
<nav><ul class="pagination">

<?php if(!empty($total_pages)):for($i=1; $i<=$total_pages; $i++):  
            if($i == $page):?>
            <li class='active'  id="<?php echo $i;?>"><?php echo $i.":".$page;?></li> 
            <?php else:?>
            <li id="<?php echo $i;?>"><?php echo $i;?></li>
        <?php endif;?>          
<?php endfor;endif;?>


</ul></nav>