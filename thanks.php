<?php

$groupswithaccess = 'PUBLIC,ALL';
require_once 'slpw/sitelokpw.php';

header('refresh: 6; url=login.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- META SECTION -->
  <title>THANK YOU FOR SIGN UP</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="icon" href="/favicon.ico" type="image/x-icon">
  <!-- END META SECTION -->

  <!-- CSS INCLUDE -->
  <link rel="stylesheet" id="theme" href="/css/theme-dark.css">
  <link rel="stylesheet" href="/css/all.css">
  <!-- EOF CSS INCLUDE -->

  <!-- START PLUGINS -->
  <script src="/js/plugins/jquery/jquery.min.js"></script>
  <script src="/js/plugins/jquery/jquery-ui.min.js"></script>
  <script src="/js/plugins/bootstrap/bootstrap.min.js"></script>
  <script src="/js/all.js"></script>
  <!-- END PLUGINS -->

  <!-- START TEMPLATE -->
  <script src="/js/plugins.js"></script>
  <script src="/js/actions.js"></script>
  <!-- END TEMPLATE -->
</head>

<body>
  <div class="page-content-wrap page-content-adaptive">
    <div align="center" style="padding-bottom:0px; padding-top:15%;">
      <div class="profile-image">
        <img src="/img/radion-thanks.gif" style="width:150px; height:150px;">
      </div>
    </div>

    <div align="center">
      <h3>WELCOME</h3>
			<p align="center">Just a moment. We are setting things up for you!</p>
    </div>
  </div>
</body>
</html>
