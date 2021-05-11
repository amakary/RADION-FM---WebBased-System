<?php

header('refresh: 5; url=index.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- META SECTION -->
  <title>Welcome</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="icon" href="/favicon.ico" type="image/x-icon">
  <!-- END META SECTION -->

  <!-- CSS INCLUDE -->
  <link rel="stylesheet" id="theme" href="/css/theme-default.css">
  <!-- EOF CSS INCLUDE -->

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-113203200-2"></script>
  <script>
  window.dataLayer = window.dataLayer || []
  function gtag () { dataLayer.push(arguments) }
  gtag('js', new Date())
  gtag('config', 'UA-113203200-2')
  </script>
</head>

<body>
  <div class="error-container">
    <div align="center"><img src="logo-sda.png"></div>
    <div class="error-text">Congrats!</div>
    <div class="error-subtext"><h5>Your account has been created successfully!</h5></div>
    <div class="error-actions">
      <div class="row">
        <div class="col-md-6">
          <button class="btn btn-info btn-block btn-lg" onClick="document.location.href = 'index.php';">Go to Home Page</button>
        </div>
        <div class="col-md-6">
          <button class="btn btn-primary btn-block btn-lg" onClick="document.location.href = 'login.php';">Login Now!</button>
        </div>
      </div>
    </div>
    <div class="error-subtext">Or wait until you are redirected to home page.</div>

    <div class="row"></div>
  </div>
</body>
</html>
