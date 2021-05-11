<?php
 session_start() ;
error_reporting(0);
require_once("../slpw/sitelokpw.php");

$type=$_POST["type"];
$a_id=$_POST["a_id"];


$like_unlike_select="SELECT `ID`,`STATUS` FROM `ads_like_dislike` WHERE `ads_id`=$a_id AND `user_name`='$slusername'";				
			   $result111 = $con->query($like_unlike_select);
                                 
								 $like_dislikescript="";
                                      if ($result111->num_rows > 0) { 
                                      while($r1ow = $result111->fetch_assoc()){
									  $STATUS=$r1ow["STATUS"];
									  $ID=$r1ow["ID"];
									
									  $like_status='';
									  $unlikestatus='';
									$actq1="";
									
									if($STATUS==$type){
									
										$actq1="DELETE FROM `ads_like_dislike` WHERE `ID`=$ID";
										
													
								$totalimp = $con->query("SELECT `express_ads_impressions` FROM `express_ads` WHERE `express_ads_id`=$a_id");
	$total_ompression = $totalimp->fetch_object()->express_ads_impressions;	


	
	//////////AD Credit count
	
	
$creditcount="SELECT TOTAL_CLICK/express_ads_impressions as CREDITt FROM `express_ads` WHERE `express_ads_id`=$a_id";				
			   $result1111 = $con->query($creditcount);
                                 $CREDITt=0;
								 $like_dislikescript="";
                                      if ($result1111->num_rows > 0) { 
                                      while($r11ow = $result1111->fetch_assoc()){
									    $CREDITt=$r11ow["CREDITt"];
									  
									  }
									  }
	
	
										$con->query($actq1);
										 
										 echo '<div><small class="pull-right text-muted"><i class="fad fa-file-invoice"></i> '.$total_ompression.' &nbsp;-&nbsp; <i class="fad fa-analytics"></i> '.round($CREDITt).'%</small></div>
										<button class="btn btn-xs btn-default" onclick="info_like_unlike(1,'.$a_id.');"><i class="fad fa-thumbs-up" ></i></button>
										<button class="btn btn-xs btn-default"  onclick="info_like_unlike(2,'.$a_id.');"><i class="fad fa-thumbs-down"></i></button>
										<button type="button" class="btn btn-xs btn-info" disabled="disabled"><i class="fad fa-external-link"></i> Visit Sponsor...</button>
										
										&nbsp;&nbsp;&nbsp;';
									}else{
									
										$actq1="UPDATE `ads_like_dislike` SET  `STATUS`=$type WHERE `ID`=$ID";
										 $con->query($actq1);
										   $like_status='';
									  $unlikestatus='';
									
									
									if($type==1){
									  $like_status='style="color:red"';
									
									}else{
									
									$unlikestatus='style="color:red"';

									
									}

									
								$query_add = $con->query("SELECT `express_ads_website` FROM `express_ads` WHERE `express_ads_id`=$a_id");
	$express_ads_website = $query_add->fetch_object()->express_ads_website;	
							
if($express_ads_website==""){
$express_ads_website="#";

}		

							
								$totalimp = $con->query("SELECT `express_ads_impressions` FROM `express_ads` WHERE `express_ads_id`=$a_id");
	$total_ompression = $totalimp->fetch_object()->express_ads_impressions;		


		$creditcount="SELECT TOTAL_CLICK/express_ads_impressions as CREDITt FROM `express_ads` WHERE `express_ads_id`=$a_id";				
			   $result1111 = $con->query($creditcount);
                                 $CREDITt=0;
								 $like_dislikescript="";
                                      if ($result1111->num_rows > 0) { 
                                      while($r11ow = $result1111->fetch_assoc()){
									    $CREDITt=$r11ow["CREDITt"];
									  
									  }
									  }
	
echo '<div><small class="pull-right text-muted"><i class="fad fa-file-invoice"></i> '.$total_ompression.' &nbsp;-&nbsp; <i class="fad fa-analytics"></i> '.round($CREDITt).'%</small></div>
										<button class="btn btn-xs btn-default" onclick="info_like_unlike(1,'.$a_id.');"><i class="fad fa-thumbs-up" ></i></button>
										<button class="btn btn-xs btn-default"  onclick="info_like_unlike(2,'.$a_id.');"><i class="fad fa-thumbs-down" ></i></button>
										<a href="'.$express_ads_website.'" class="btn btn-xs btn-info" onclick="click_count('.$express_ads_id.');" target="blank" and rel="nofollow"><i class="fad fa-external-link"></i> Visit Sponsor...</a>
										
										&nbsp;&nbsp;&nbsp;';
										
									}

									
									}
									}else{
									
									$insertlike="INSERT INTO `ads_like_dislike`(`ads_id`, `user_name`, `STATUS`) VALUES ($a_id,'$slusername',$type)";
									
									 $con->query($insertlike);
									   $like_status='';
									  $unlikestatus='';
									
									
									if($type==1){
									  $like_status='style="color:red"';
									
									}else{
									
									$unlikestatus='style="color:red"';

									
									}

									
								$query_add = $con->query("SELECT `express_ads_website` FROM `express_ads` WHERE `express_ads_id`=$a_id");
	$express_ads_website = $query_add->fetch_object()->express_ads_website;	
							
if($express_ads_website==""){
$express_ads_website="#";

}	


	$totalimp = $con->query("SELECT `express_ads_impressions` FROM `express_ads` WHERE `express_ads_id`=$a_id");
	$total_ompression = $totalimp->fetch_object()->express_ads_impressions;		

	$creditcount="SELECT TOTAL_CLICK/express_ads_impressions as CREDITt FROM `express_ads` WHERE `express_ads_id`=$a_id";				
			   $result1111 = $con->query($creditcount);
                                 $CREDITt=0;
								 $like_dislikescript="";
                                      if ($result1111->num_rows > 0) { 
                                      while($r11ow = $result1111->fetch_assoc()){
									    $CREDITt=$r11ow["CREDITt"];
									  
									  }
									  }

	
echo '<div><small class="pull-right text-muted"><i class="fad fa-file-invoice"></i> '.$total_ompression.' &nbsp;-&nbsp; <i class="fad fa-analytics"></i> '.round($CREDITt).'%</small></div>
										<button class="btn btn-xs btn-default" onclick="info_like_unlike(1,'.$a_id.');"><i class="fad fa-thumbs-up" ></i></button>
										<button class="btn btn-xs btn-default"  onclick="info_like_unlike(2,'.$a_id.');"><i class="fad fa-thumbs-down" ></i></button>
										<a href="'.$express_ads_website.'" class="btn btn-xs btn-info" onclick="click_count('.$express_ads_id.');" target="blank" and rel="nofollow"><i class="fad fa-external-link"></i> Visit Sponsor...</a>
										
										&nbsp;&nbsp;&nbsp;'; 
									 
									}
									
									

?>