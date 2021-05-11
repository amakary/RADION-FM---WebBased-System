<?php

$groupswithaccess = 'PUBLIC,RADIONER,FOUNDER';
require_once '../slpw/sitelokpw.php';

$type = $_POST['type'];

if ($type == 1) {
  $select_ads = "SELECT `sitelok`.`Name`,`sitelok`.`Custom2`,`express_ads`.* FROM `express_ads` JOIN `sitelok` ON `sitelok`.`Username`=`express_ads`.`Username` WHERE `express_ads`.`express_ads_home_page`>0 ORDER BY RAND() LIMIT 3";
  $result = $con->query($select_ads);
  $total_asd = '';

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $express_ads_id = $row['express_ads_id'];
      $Username = $row['Username'];
      $express_ads_title = $row['express_ads_title'];
      $express_ads_message = $row['express_ads_message'];
      $express_ads_website = $row['express_ads_website'] || '#';
      $total_click = $row['TOTAL_CLICK'];
      $express_ads_impressions = $row['express_ads_impressions'];
      $credit = number_format((float) ($total_click / $express_ads_impressions) * 100, 2, '.', '');
      $submitter_img = $row['Custom2'] ? sl_siteloklink($row['Custom2'], 0) : 'assets/images/users/pre-radion.jpg';

      $update_impression = "UPDATE `express_ads` SET `express_ads_home_page`=`express_ads_home_page`-1,`express_ads_impressions`=`express_ads_impressions`+1 WHERE `express_ads_id`=$express_ads_id";
      $update_result = $con->query($update_impression);
      $student_img = "../ad_images/$express_ads_id/";

      if ($files = glob("$student_img/*")) {
        $student_img = $files[0];
      } else {
        $student_img = 'NO_IAMGE';
      }

      $like_unlike_select = "SELECT `ID`,`STATUS` FROM `ads_like_dislike` WHERE `ads_id`=$express_ads_id AND `user_name`='$slusername'";
      $like_unlike_result = $con->query($like_unlike_select);
      $like_dislikescript = '';
      if ($like_unlike_result->num_rows > 0) {
        while ($lu_row = $like_unlike_result->fetch_assoc()) {
          $status = $lu_row['STATUS'];
          $like_status = '';
          $unlikestatus = '';

          if ($status == 1) {
            $like_status = 'style="color:red"';
          } else {
            $unlike_status = 'style="color:red"';
          }

          $totalimp = $con->query("SELECT `express_ads_impressions` FROM `express_ads` WHERE `express_ads_id`=$express_ads_id");
          $total_impression = $totalimp->fetch_object()->express_ads_impressions;
          $like_dislikescript = '<div><small class="pull-right text-muted"><i class="fad fa-user-check"></i> '.$Username.'&nbsp; &nbsp;<i class="fad fa-file-invoice"></i> '.$total_impression.' &nbsp;-&nbsp; <i class="fad fa-analytics"></i> '.$credit.'% </small></div>
										<button class="btn btn-xs btn-default" onclick="info_like_unlike(1,'.$express_ads_id.');"><i class="fad fa-thumbs-up"></i></button>
										<button class="btn btn-xs btn-default"  onclick="info_like_unlike(2,'.$express_ads_id.');"><i class="fad fa-thumbs-down" ></i></button>
										<button  class="btn btn-xs btn-info"  onclick="click_count('.$express_ads_id.',\''.$express_ads_website.'\');" ><i class="fad fa-external-link"></i> Visit Sponsor</button>

										&nbsp;&nbsp;&nbsp;';
        }
      } else {
        $totalimp = $con->query("SELECT `express_ads_impressions` FROM `express_ads` WHERE `express_ads_id`=$express_ads_id");
        $total_impression = $totalimp->fetch_object()->express_ads_impressions;
        $like_dislikescript = '<div><small class="pull-right text-muted"><i class="fad fa-user-check"></i> '.$Username.'&nbsp;&nbsp;<i class="fad fa-file-invoice"></i> '.$total_impression.' &nbsp;-&nbsp; <i class="fad fa-analytics"></i> '.$credit.'</small></div>
										<button class="btn btn-xs btn-default" onclick="info_like_unlike(1,'.$express_ads_id.');"><i class="fad fa-thumbs-up"></i></button>
										<button class="btn btn-xs btn-default"  onclick="info_like_unlike(2,'.$express_ads_id.');"><i class="fad fa-thumbs-down"></i></button>
										<button type="button" class="btn btn-xs btn-default"><i class="fad fa-external-link"></i> Visit Sponsor</button>

										&nbsp;&nbsp;&nbsp;';
      }

      $total_asd = $total_asd . '<div class="item" style="opacity: 100;">
                                    <div class="image">
                                        <img id="rad_on_image" src="'.$submitter_img.'" alt=""/>
                                    </div>
                                    <div class="text" align="justify">
                                        <div class="heading">
                                            <a href="#" id="uname122">'.$express_ads_title.'</a>
                                            <span class="date"><lord-icon
    src="https://cdn.lordicon.com/xrcxsiog.json"
    trigger="loop"
    delay="2000"
    colors="primary:#a4a8b1,secondary:#F39C12"
    axis-x="38"
    axis-y="25"
    style="width:40px;height:40px">
</lord-icon></span>
                                        </div>
										<div id="ad_dicription" style="padding-right:3%; padding-left:3%;">
                                     '.$express_ads_message.'

									   </div>
										<hr>
										<div id="like_dislike_status'.$express_ads_id.'">
										'.$like_dislikescript.'
										</div>
                                    </div>
                                </div>';

    }

    ob_clean();
    echo $total_asd;
  } else {
    echo "NOTAVAIABLE";
  }
} else if ($type == 2) {
  $select_ads = "SELECT `sitelok`.`Name`,`express_ads`.* FROM `express_ads` JOIN `sitelok` ON `sitelok`.`Username`=`express_ads`.`Username` WHERE `express_ads`.`express_ads_dashboard`>0 ORDER BY RAND() LIMIT 1";
  $result = $con->query($select_ads);

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $express_ads_id = $row['express_ads_id'];
      $Username = $row['Username'];
      $express_ads_message = $row['express_ads_message'];
      $express_ads_website = $row['express_ads_website'];

      if ($express_ads_website == '') {
        $express_ads_website = '#';
      }

      $update_impression = "UPDATE `express_ads` SET `express_ads_dashboard`=`express_ads_dashboard`-1,`express_ads_impressions`=`express_ads_impressions`+1 WHERE `express_ads_id`=$express_ads_id";
      $update_result = $con->query($update_impression);
      $student_img = "../ad_images/$express_ads_id/";

      if ($files = glob("$student_img/*")) {
        $student_img = $files[0];
      } else {
        $student_img = 'NO_IAMGE';
      }

      echo "$express_ads_id#####$Username#####$express_ads_message#####$express_ads_website#####$student_img";
    }
  } else {
    echo 'NOTAVAIABLE';
  }
}

?>
