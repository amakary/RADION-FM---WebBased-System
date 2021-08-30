<?php

$groupswithaccess="FOUNDER,PUBLIC,RADIONER,CEO";
$loginpage=$slpagename;
$logoutpage=$slpagename;
$loginredirect=2;

require_once 'slpw/slloginform.php';
require_once 'slpw/sitelokpw.php';

?>
<!DOCTYPE html>
<html lang="es" class="body-full-height">
    <head>
        <!-- META SECTION -->
        <title>ENTRAR</title>
        <meta property="description" content="Aqui puedes entrar a nuestro sistema." />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->

        <!-- CSS INCLUDE -->
        <link rel="stylesheet" type="text/css" id="theme" href="css/theme-dark.css"/>
		<link rel="stylesheet" type="text/css" href="css/allcss" />
        <!-- EOF CSS INCLUDE -->

<link rel="apple-touch-icon" sizes="57x57" href="favicon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="favicon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="favicon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="favicon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="favicon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="favicon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="favicon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="favicon/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="favicon/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
<link rel="manifest" href="favicon/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="favicon/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">

<script type="text/javascript">
function slvalidateform_11(form)
{
  var loginmessage=document.getElementById('slformmsg_11');
  loginmessage.innerHTML='';
  var username=document.getElementById('slfieldinput_11_username');
  if (sltrim_11(username.value)=="")
  {
    loginmessage.innerHTML='Please enter your username';
    username.focus();
    return(false);
  }
  var password=document.getElementById('slfieldinput_11_password');
  if (sltrim_11(password.value)=="")
  {
    loginmessage.innerHTML='Please enter your password';
    password.focus();
    return(false);
  }  loginmessage.innerHTML='';
  var slajaxavailable=false;
  if ((window.XMLHttpRequest) && (typeof JSON === "object"))
    slajaxavailable=true;
  if (slajaxavailable)
  {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function()
    {
      if (xhttp.readyState == 4 && xhttp.status == 200)
      {
        // Handle callback
        document.getElementById('myButton_11').disabled=false;
        document.getElementById('slspinner_11').style['display']="none";
        var data = JSON.parse(xhttp.responseText);
        if (data.success)
        {
          window.location=data.redirect;
          return(false);
        }
        else
        {
          if (!Date.now) {
            Date.now = function() { return new Date().getTime(); };
          };
          timg=document.querySelectorAll("img.slturingimg");
          for (i = 0; i < timg.length; i++)
            timg[i].src = "/slpw/turingimage.php?t="+Math.floor(Date.now());
          tinp=document.getElementsByName("turing");
          for (i = 0; i < tinp.length; i++)
            tinp[i].value = "";
          loginmessage.innerHTML = data.message;
          return(false);
        }
      }
    };
    // Serialize form
    var formData=sl_serialize(form);
    formData+="&slajaxform=1";
    var slfrmact=form.action;
    if (slfrmact=="")
      slfrmact=window.location.href;
    document.getElementById('myButton_11').disabled=true;
    document.getElementById('slspinner_11').style['display']="block";
    xhttp.open("POST", slfrmact, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(formData);
    return(false);
  }
  return(true);
}
function forgotpw_11()
{
  var loginmessage=document.getElementById('slformmsg_11');
  loginmessage.innerHTML='';
  var username=document.getElementById('slfieldinput_11_username');
  if (sltrim_11(username.value)=="")
  {
     loginmessage.innerHTML='¿Olvido su contraseña? Ingrese su nombre de usuario o correo electronico y el CAPTCHA y luego click el enlace';
    username.focus();
    return(false);
  }
  var forgotpassword=document.getElementById('forgotpassword_11');
  forgotpassword.value="forgotten-it";
  var form=document.getElementById('siteloklogin_11');
  loginmessage.innerHTML='';
  var slajaxavailable=false;
  if ((window.XMLHttpRequest) && (typeof JSON === "object"))
    slajaxavailable=true;
  if (slajaxavailable)
  {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function()
    {
      if (xhttp.readyState == 4 && xhttp.status == 200)
      {
        // Handle callback
        document.getElementById('myButton_11').disabled=false;
        document.getElementById('slspinner_11').style['display']="none";
        var data = JSON.parse(xhttp.responseText);
        if (data.success)
        {
          forgotpassword.value="";
          window.location=data.redirect;
          return(false);
        }
        else
        {
          if (!Date.now) {
            Date.now = function() { return new Date().getTime(); };
          };
          timg=document.querySelectorAll("img.slturingimg");
          for (i = 0; i < timg.length; i++)
            timg[i].src = "/slpw/turingimage.php?t="+Math.floor(Date.now());
          tinp=document.getElementsByName("turing");
          for (i = 0; i < tinp.length; i++)
            tinp[i].value = "";
          forgotpassword.value="";
          loginmessage.innerHTML = data.message;
          return(false);
        }
      }
    };
    // Serialize form
    var formData=sl_serialize(form);
    formData+="&slajaxform=1";
    var slfrmact=form.action;
    if (slfrmact=="")
      slfrmact=window.location.href;
    document.getElementById('myButton_11').disabled=true;
    document.getElementById('slspinner_11').style['display']="block";
    xhttp.open("POST", slfrmact, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(formData);
    return(false);
  }
  form.submit();
  return(true);
}

function sltrim_11(x)
{
    return x.replace(/^\s+|\s+$/gm,'');
}
function sl_serialize(form)
{
 if (!form || form.nodeName !== "FORM") {
   return;
 }
 var i, j, q = [];
 for (i = form.elements.length - 1; i >= 0; i = i - 1) {
   if (form.elements[i].name === "") {
     continue;
   }
   switch (form.elements[i].nodeName) {
   case 'INPUT':
     switch (form.elements[i].type) {
     case 'text':
     case 'email':
     case 'number':
     case 'hidden':
     case 'password':
     case 'button':
     case 'reset':
     case 'submit':
       q.push(form.elements[i].name + "=" + encodeURIComponent(form.elements[i].value));
       break;
     case 'checkbox':
     case 'radio':
       if (form.elements[i].checked) {
         q.push(form.elements[i].name + "=" + encodeURIComponent(form.elements[i].value));
       }
       break;
     case 'file':
       break;
     }
     break;
   case 'TEXTAREA':
     q.push(form.elements[i].name + "=" + encodeURIComponent(form.elements[i].value));
     break;
   case 'SELECT':
     switch (form.elements[i].type) {
     case 'select-one':
       q.push(form.elements[i].name + "=" + encodeURIComponent(form.elements[i].value));
       break;
     case 'select-multiple':
       for (j = form.elements[i].options.length - 1; j >= 0; j = j - 1) {
         if (form.elements[i].options[j].selected) {
           q.push(form.elements[i].name + "=" + encodeURIComponent(form.elements[i].options[j].value));
         }
       }
       break;
     }
     break;
   case 'BUTTON':
     switch (form.elements[i].type) {
     case 'reset':
     case 'submit':
     case 'button':
       q.push(form.elements[i].name + "=" + encodeURIComponent(form.elements[i].value));
       break;
     }
     break;
   }
 }
 return q.join("&");
}
</script>
<?php
if (function_exists('slcaptchahead'))
  echo slcaptchahead();
?>


</head>
    <body>

        <div class="login-container">

            <div class="login-box animated fadeInDown">
               <div align="center" style="padding-bottom:20px;"><img src="img/logo@2x.png" style="height:45px; width:180px;"></div>

                <div class="login-body">
                  <div align="center">
                  <h1 style="color:#fff;">ENTRAR</h1>
                </div>
                    <div align="center" style="margin-bottom:-1px; color:#fff;"><strong>Bienvenido</strong>. Ya sabes que hacer...</div>

					<div class="form-horizontal" style="padding-left:30px; padding-right:30px;">
                    <div id="slform_11">
<form action="<?php echo $startpage; ?>" method="post" id="siteloklogin_11" onSubmit="return slvalidateform_11(this)">
<input type="hidden" id="loginformused_11" name="loginformused" value="1">
<input type="hidden" id="forgotpassword_11" name="forgotpassword" value="">
<div class="sltextfield_11">
<br>
<input type="text" class="form-control" name="username" id="slfieldinput_11_username" autocorrect="off" autocapitalize="off" spellcheck="off" maxlength="100" value="<?php print $slcookieusername; ?>" placeholder="Nombre de Usuario"/>
</div>
<div class="sltextfield_11">
<br>
<input type="password" class="form-control" name="password" id="slfieldinput_11_password" autocorrect="off" autocapitalize="off" spellcheck="off" maxlength="50" value="<?php print $slcookiepassword; ?>" placeholder="Contraseña"/>
</div>
<div class="slcaptchafield_11">
<br>
<label for="slfieldinput_11_captcha" style="color:#dddddd;">Captcha</label>
<?php
if (function_exists('slshowcaptcha'))
{
echo slshowcaptcha();
}
else
{
?>

<input type="text" class="form-control" name="turing" id="slfieldinput_11_captcha" placeholder="captcha" maxlength="5" size="6" autocorrect="off" autocapitalize="off" spellcheck="off" autocomplete="off">
&nbsp;<img class="slturingimg" id="slturingimg_11" src="<?php echo $SitelokLocationURLPath; ?>turingimage.php" height="30" title="Captcha" alt="Captcha">
<?php
}
?>
<script>if (null!==document.getElementById("slfieldinput_11_captcha")) { var captchah=document.getElementById("slfieldinput_11_captcha").offsetHeight; if((typeof(captchah)!='undefined') && (captchah>2)) document.getElementById("slturingimg_11").style.height=captchah+'px'; }</script>
<br>
<button class="btn btn-block btn-warning" id="myButton_11" type="submit">ENTRAR</button><div id="slspinner_11"></div>
<br>
<a id="slforgot_11" title="Forgot your password? Enter your username or email and the CAPTCHA and click the link" style="color:#F39C12;">¿Olvido su contraseña?</a>
<div id="slformmsg_11" class="slformmsg_11" aria-live="polite"><?php if ($msg!="") echo $msg; ?></div>
</form>
</div>
<script type="text/javascript">
//var el = document.getElementById('slforgot_11');
//el.onclick = forgotpw_11;
if (slforgot_11.addEventListener) {  // all browsers except IE before version 9
  slforgot_11.addEventListener("click", forgotpw_11, false);
} else {
  if (slforgot_11.attachEvent) {   // IE before version 9
    slforgot_11.attachEvent("click", forgotpw_11);
  }
}
timg=document.querySelectorAll("img.slturingimg");
for (i = 0; i < timg.length; i++)
  timg[i].src = "/slpw/turingimage.php?t="+Math.floor(Date.now());
</script>

					</div>
					<div style="padding-bottom:10px; color:#fff; padding-right:10px;" align="right"><div align="left" style="color:#33414E; width:25px; height:25px;">

<svg xmlns="http://www.w3.org/2000/svg" width="47" height="64" viewBox="0 0 47 64">
<path style="fill:#7B7D7D;" d="M30.252 63.441c-4.55 0-7.864-1.089-9.946-3.267-2.08-2.177-3.121-4.525-3.121-7.041 0-.92.181-1.694.544-2.323a3.993 3.993
 0 0 1 1.489-1.489c.629-.363 1.403-.544 2.323-.544.92 0 1.693.181 2.323.544.629.363 1.125.86 1.488 1.489.363.629.544 1.403.544
 2.323 0 1.113-.266 2.02-.798 2.722-.533.702-1.162 1.161-1.888 1.38.63.87 1.622 1.487 2.977 1.85 1.355.388 2.71.581 4.065.581
 1.887 0 3.593-.508 5.118-1.524 1.524-1.017 2.65-2.517 3.376-4.501.726-1.984 1.089-4.235 1.089-6.752
 0-2.734-.4-5.07-1.198-7.005-.775-1.96-1.924-3.412-3.449-4.356a9.21 9.21 0 0 0-4.936-1.415c-1.162 0-2.613.484-4.356
 1.452l-3.194 1.597v-1.597L37.076 16.4H17.185v19.89c0 1.646.363 3.001 1.089 4.066s1.839 1.597 3.34 1.597c1.16 0 2.274-.387
 3.339-1.162a11.803 11.803 0 0 0 2.758-2.83c.097-.219.218-.376.363-.473a.723.723 0 0 1 .472-.181c.266 0 .58.133.944.4.339.386.508.834.508
 1.342a9.243 9.243 0 0 1-.182 1.017c-.822 1.839-1.96 3.242-3.412 4.21a8.457 8.457 0 0
 1-4.79 1.452c-4.308 0-7.285-.847-8.93-2.54-1.645-1.695-2.468-3.994-2.468-6.897V16.4H.052v-3.703h10.164v-8.42L7.893
 1.952V.066h6.751l2.54 1.306v11.325l26.28-.072 2.614 2.613-16.116 16.116a10.807 10.807 0 0 1 3.049-.726c1.742
 0 3.702.557 5.88 1.67 2.202 1.089 3.896 2.59 5.081 4.5 1.186 1.888 1.948 3.703 2.287 5.445.363 1.743.545 3.291.545
 4.646 0 3.098-.654 5.977-1.96 8.64-1.307 2.661-3.291 4.645-5.953 5.952-2.662 1.307-5.542 1.96-8.639 1.96z"></path>
</svg></div></div>

                </div>

            </div>
            <div class="login-footer">
                <div class="pull-left">
                    &copy; 2021 RADION FM.
                </div>
                <div class="pull-right">

                    <a href="privacy-policy.php">Política de privacidad</a> |
                    <a href="terms-of-use.php">Términos de uso</a>
                </div>
            </div>

        </div>

    </body>
	<script type="text/javascript" src="js/all.js"></script>
</html>
