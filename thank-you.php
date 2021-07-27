<?php

$groupswithaccess = 'RADIONER,CEO,FOUNDER';
require_once 'slpw/sitelokpw.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- META SECTION -->
  <title>LOGIN PROCESS</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link rel="icon" href="favicon.ico" type="image/x-icon" />
  <!-- END META SECTION -->

  <!-- CSS INCLUDE -->
  <link rel="stylesheet" type="text/css" id="theme" href="css/theme-dark.css"/>
  <!-- EOF CSS INCLUDE -->

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-113203200-2"></script>
  <script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-113203200-2');
  </script>

  <?php header('refresh: 2; url=index.php'); ?>
</head>

<body>
  <!-- START SCRIPTS -->
  <!-- START PLUGINS -->
  <script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>
  <script type="text/javascript" src="js/plugins/jquery/jquery-ui.min.js"></script>
  <script type="text/javascript" src="js/plugins/bootstrap/bootstrap.min.js"></script>
  <!-- END PLUGINS -->

  <!-- START TEMPLATE -->
  <script type="text/javascript" src="js/plugins.js"></script>
  <script type="text/javascript" src="js/actions.js"></script>
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
  </body>
</html>
