<?php

$groupswithaccess = 'RADIONER,CEO,FOUNDER';
require_once '/slpw/sitelokpw.php';

header('refresh: 2; url=ads.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- META SECTION -->
  <title>Thank you.</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="icon" href="/favicon.ico" type="image/x-icon">
  <!-- END META SECTION -->

  <!-- CSS INCLUDE -->
  <link rel="stylesheet" id="theme" href="/css/theme-dark.css"/>
  <!-- EOF CSS INCLUDE -->

  <!-- START SCRIPTS -->
  <!-- START PLUGINS -->
  <script src="/js/plugins/jquery/jquery.min.js"></script>
  <script src="/js/plugins/jquery/jquery-ui.min.js"></script>
  <script src="/js/plugins/bootstrap/bootstrap.min.js"></script>
  <!-- END PLUGINS -->

  <!-- START TEMPLATE -->
  <script src="/js/plugins.js"></script>
  <script src="/js/actions.js"></script>
  <!-- END TEMPLATE -->

  <script>
  $(function () {
    pageLoadingFrame('show', 'v1')
    setTimeout(function () {
      pageLoadingFrame('hide')
    }, 2000)
  })
  </script>
  <!-- END SCRIPTS -->
</head>

<body>
</body>
</html>
