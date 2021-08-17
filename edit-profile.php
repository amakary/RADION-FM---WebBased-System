<?php
$groupswithaccess = 'RADIONER,CEO,FOUNDER';
require_once 'slpw/sitelokpw.php';
require_once 'slpw/slupdateform.php';

$res = $con->query("SELECT `id`,`signature_font` FROM `sitelok` WHERE `Username`='$slusername'");
$userobj = $res->num_rows > 0 ? $res->fetch_object() : null;
$userid = $userobj !== null ? $userobj->id : 0;
$signature = $userobj !== null ? $userobj->signature_font : '';
$userhash = md5("$userid$SiteKey");

function sl_2facontrol_switch ($settings = array()) {
  global $SiteKey, $SitelokLocationURLPath, $sluserid, $slusergroups, $DbExtraUserTableName;
  $enabletext = isset($settings['enabletext']) ? $settings['enabletext'] : 'Enable 2FA';
  $disabletext = isset($settings['disabletext']) ? $settings['disabletext'] : 'Disable 2FA';
  $confirmdisablemsg = isset($settings['confirmdisablemsg']) ? $settings['confirmdisablemsg'] : 'Are you sure?';
  $confirmenablemsg = isset($settings['confirmenablemsg']) ? $settings['confirmenablemsg'] : 'Are you sure?';
  $processingmsg = isset($settings['processingmsg']) ? $settings['processingmsg'] : 'please wait';
  $resetkey = isset($settings['resetkey']) ? $settings['resetkey'] : 0;
  // Get current logintype setting
  $paramdata['userid'] = $sluserid;
  $paramdata['usergroups'] = $slusergroups;
  $logintype = sl_CheckforLogin2($paramdata);
  $action = 1;
  $action_text = '';
  $labeltext = $enabletext;

  if ($logintype == 7) {
    $action = 0;
    $action_text = ' checked';
    $labeltext = $disabletext;
  }

  $key = mt_rand();
  $hash = hash('sha256', $SiteKey . $sluserid . $key . $resetkey);
  $postdata = "userid=$sluserid&key=$key&resetkey=$resetkey&hash=$hash";
  $html = <<<EOT
  <label id="sl2facontrol-{$key}" class="switch switch-small">
    <input id="sl2facontrol-switch-{$key}" type="checkbox"{$action_text}/>
    <span></span>
  </label>

  <script>
  $('#sl2facontrol-switch-{$key}').on('change', async function (event) {
    event.preventDefault()

    const disableConfirm = '{$confirmdisablemsg}'
    const enableConfirm = '{$confirmenablemsg}'
    const action = $(this).prop('checked') ? 1 : 0
    const confirmed = await confirmDialog(action === 0 ? disableConfirm : enableConfirm)

    if (confirmed) {
      const enabletext = '{$enabletext}'
      const disabletext = '{$disabletext}'
      const url = '{$SitelokLocationURLPath}plugin_2fa/2facontrolajax.php'

      $.ajax(url, {
        method: 'POST',
        dataType: 'json',
        data: '{$postdata}&action=' + action.toString(),
        success: function (data, status, xhr) {
          if (data.enabled == 1) {
            console.log('2FA enabled')
          } else {
            console.log('2FA disabled')
          }
        },
        error: function (xhr, status, error) {
          console.error(error)
        }
      })
    } else {
      $(this).prop('checked', action === 0 ? true : false)
    }
  })
  </script>
EOT;

  return $html;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- META SECTION -->
  <title>PROFILE</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="apple-touch-icon" sizes="57x57" href="favicon/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="favicon/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="favicon/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="favicon/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="favicon/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="favicon/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="favicon/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192" href="favicon/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="favicon/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
  <link rel="manifest" href="/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="/favicon/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">
  <!-- END META SECTION -->

  <!-- CSS INCLUDE -->
  <link rel="stylesheet" href="/css/cropper/cropper.min.css">
  <link rel="stylesheet" href="/css/theme-dark.css" id="theme">
  <link rel="stylesheet" href="/css/all.css">
  <link rel="stylesheet" href="/radionwallet/dist/radionwallet.css">

  <script src="https://cdn.lordicon.com//libs/frhvbuzj/lord-icon-2.0.2.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.12/dist/sweetalert2.all.min.js"></script>
  <script src="https://cdn.jsdelivr.net/gh/davidshimjs/qrcodejs/qrcode.min.js"></script>
  <script src="https://cdn.jsdelivr.net/clipboard.js/1.5.3/clipboard.min.js"></script>
  <script src="/js/plugins/jquery/jquery.min.js"></script>
  <script src="/js/all.js" defer></script>
  <script src="/radionwallet/dist/radionwallet.min.js"></script>

  <style>
  .fa-sort-down { color: #C0392B; }
  .fa-sort-up { color: #27AE60; }
  .tDown { color: #C0392B; }
  .tUp { color: #27AE60; }
  .linko { color: #DDDDDD; }
  .linko:hover { color: #F39C12; }
  .send-hidden { display: none; }
  #estimate-spinner {
    display: none;
    box-sizing: content-box;
    margin: auto;
    height: 24px;
    width: 24px;
    -webkit-animation: rotation .6s infinite linear;
    -moz-animation: rotation .6s infinite linear;
    -o-animation: rotation .6s infinite linear;
    animation: rotation .6s infinite linear;
    border-left: 5px solid rgba(255,255,255, .3);
    border-right: 5px solid rgba(255,255,255, .3);
    border-bottom: 5px solid rgba(255,255,255, .3);
    border-top: 5px solid rgba(255,255,255, 1);
    border-radius: 100%;
  }

  @-webkit-keyframes rotation {
    from { -webkit-transform: rotate(0deg); }
    to { -webkit-transform: rotate(359deg); }
  }

  @-moz-keyframes rotation {
    from { -moz-transform: rotate(0deg); }
    to { -moz-transform: rotate(359deg); }
  }

  @-o-keyframes rotation {
    from { -o-transform: rotate(0deg); }
    to { -o-transform: rotate(359deg); }
  }

  @keyframes rotation {
    from { transform: rotate(0deg); }
    to { transform: rotate(359deg); }
  }
  </style>

<script>
function slvalidateform_4(form)
{
  var errorfound=false;
  document.getElementById('slformmsg_4').innerHTML='';
  //document.getElementById('slformmsg_4').style['display']="none";

  // Clear custom2 message
  var obj=document.getElementById('slmsg_4_0');
  if (obj!==null)
    obj.innerHTML='';
  obj=document.getElementById('slmsg_4_0');
  if (obj!==null)
    obj.style['display']="none";


  // Clear username message
  var obj=document.getElementById('slmsg_4_1');
  if (obj!==null)
    obj.innerHTML='';
  obj=document.getElementById('slmsg_4_1');
  if (obj!==null)
    obj.style['display']="none";

  // Clear custom3 message
  var obj=document.getElementById('slmsg_4_2');
  if (obj!==null)
    obj.innerHTML='';
  obj=document.getElementById('slmsg_4_2');
  if (obj!==null)
    obj.style['display']="none";

  // Clear custom8 message
  var obj=document.getElementById('slmsg_4_3');
  if (obj!==null)
    obj.innerHTML='';
  obj=document.getElementById('slmsg_4_3');
  if (obj!==null)
    obj.style['display']="none";

  // Clear custom16 message
  var obj=document.getElementById('slmsg_4_4');
  if (obj!==null)
    obj.innerHTML='';
  obj=document.getElementById('slmsg_4_4');
  if (obj!==null)
    obj.style['display']="none";

  // Clear custom14 message
  var obj=document.getElementById('slmsg_4_5');
  if (obj!==null)
    obj.innerHTML='';
  obj=document.getElementById('slmsg_4_5');
  if (obj!==null)
    obj.style['display']="none";

  // Clear custom4 message
  var obj=document.getElementById('slmsg_4_6');
  if (obj!==null)
    obj.innerHTML='';
  obj=document.getElementById('slmsg_4_6');
  if (obj!==null)
    obj.style['display']="none";

  // Clear custom5 message
  var obj=document.getElementById('slmsg_4_7');
  if (obj!==null)
    obj.innerHTML='';
  obj=document.getElementById('slmsg_4_7');
  if (obj!==null)
    obj.style['display']="none";

  // Clear custom6 message
  var obj=document.getElementById('slmsg_4_8');
  if (obj!==null)
    obj.innerHTML='';
  obj=document.getElementById('slmsg_4_8');
  if (obj!==null)
    obj.style['display']="none";

  // Clear custom15 message
  var obj=document.getElementById('slmsg_4_9');
  if (obj!==null)
    obj.innerHTML='';
  obj=document.getElementById('slmsg_4_9');
  if (obj!==null)
    obj.style['display']="none";

  if (errorfound)
  {
    document.getElementById('slformmsg_4').innerHTML='Please correct the errors above';
    //document.getElementById('slformmsg_4').style['display']="block";
    return(false);
  }
  document.getElementById('slformmsg_4').innerHTML='';
  //document.getElementById('slformmsg_4').style['display']="none";
  //See if any file fields in form by checking enctype
  var slfilefields=false;
  var slajaxavailable=false;
  var slformdataavailable=false;
  form.slajaxform.value="0";
  if (form.enctype=="multipart/form-data")
    slfilefields=true;
  if ((window.XMLHttpRequest) && (typeof JSON === "object"))
  {
    slajaxavailable=true;
    var xhr = new XMLHttpRequest();
    slformdataavailable=(xhr && ('upload' in xhr));
  }
  // If ajax supported but no FormData then only use if no file fields
  if ((!slformdataavailable) && (slfilefields))
    slajaxavailable=false;
  if (slajaxavailable)
  {
    form.slajaxform.value="1";
    xhr.onreadystatechange = function()
    {
      if (xhr.readyState == 4 && xhr.status == 200)
      {
        // Handle callback
        document.getElementById('myButton_4').disabled=false;
        document.getElementById('slspinner_4').style['display']="none";
        var data = JSON.parse(xhr.responseText);
        if(data.hasOwnProperty("error"))
        {
          if (data.error.substr(-3,3)=="001")
          {
              location.reload(true);
              return(false);
          }
          return(false);
        }
        if (data.success)
        {
          if (data.redirect!="")
          {
            window.location=data.redirect;
            return(false);
          }
          else
          {
            document.getElementById('slformmsg_4').innerHTML=data.message;
            //document.getElementById('slformmsg_4').style['display']="block"
            return(false);
          }
        }
        else
        {
          document.getElementById('slformmsg_4').innerHTML=data.message;
          //document.getElementById('slformmsg_4').style['display']="block"
          return(false);
        }
      }
    };
    // Serialize form
    if (slformdataavailable)
      var formData = new FormData(form);
    else
      var formData=sl_serialize(form);
    var slfrmact=window.location.href;
    document.getElementById('myButton_4').disabled=true;
    document.getElementById('slspinner_4').style['display']="block";
    xhr.open("POST", slfrmact, true);
    if (!slformdataavailable)
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send(formData);
    return(false);
  }
  return(true)
}

function slvalidateemail_4(email)
{
  var ck_email = /^([\w-\'!#$%&\*]+(?:\.[\w-\'!#$%&\*]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,20}(?:\.[a-z]{2})?)$/i;
  if (!ck_email.test(email))
    return(false);
  return(true);
}

function slvalidinteger_4(value,min,max)
{
  var validchars="0123456789-";
  var reg = new RegExp('^[' + validchars + ']+$');
  if (!reg.test(value))
    return(false);
  if ((min!='') && (Number(value)<Number(min)))
      return(false);
  if ((max!='') && (Number(value)>Number(max)))
      return(false);
  value=Number(value).toFixed(0);
  return(value.toString());
}

function slvalidfloat_4(value,min,max,decimals)
{
  if (isNaN(value))
    return(false);
  value=Number(value);
  if (decimals!='')
    value=value.toFixed(decimals);
  if ((min!='') && (value<Number(min)))
    return(false);
  if ((max!='') && (value>Number(max)))
    return(false);
  return(value.toString());
}

function slcountwords_4(s)
{
    if (s.trim()=='')
      return(0);
    s = s.replace(/(^\s*)|(\s*$)/gi,"");
    s = s.replace(/[ ]{2,}/gi," ");
    s = s.replace(/\n /,"\n");
    return s.split(' ').length;
}

function slvalidatedate_4(fval,min,max,dtfmt)
{
  var spchar1=dtfmt.substring(2,3);
  var spchar2=dtfmt.substring(5,6);
  dtfmt=dtfmt.substring(0,2)+dtfmt.substring(3,5)+dtfmt.substring(6,10);
  if (fval==fval.replace(/[^0-9]/g,""))
  {
    if (fval.length!=8)
      return(false);
    switch (dtfmt)
    {
      case 'ddmmyyyy':
        var dd=parseInt(fval.substring(0,2));
        var mm=parseInt(fval.substring(2,4));
        var yy=parseInt(fval.substring(4));
        var retval=slpadinteger_4(dd,2)+spchar1+slpadinteger_4(mm,2)+spchar2+slpadinteger_4(yy,4);
      break;
      case 'mmddyyyy':
        var dd=parseInt(fval.substring(2,4));
        var mm=parseInt(fval.substring(0,2));
        var yy=parseInt(fval.substring(4));
        var retval=slpadinteger_4(mm,2)+spchar1+slpadinteger_4(dd,2)+spchar2+slpadinteger_4(yy,4);
      break;
    }
  }
  else
  {
    fval=fval.replace(/[^0-9]/g,'|');
    fval=fval.replace(/\|\|+/g,'|');
    var dateparts=fval.split('|');
    if (dateparts.length!=3)
      return(false);
    if (dateparts[2].length<4)
      return(false);
    switch (dtfmt)
    {
      case 'ddmmyyyy':
        var dd=parseInt(dateparts[0]);
        var mm=parseInt(dateparts[1]);
        var yy=parseInt(dateparts[2]);
        var retval=slpadinteger_4(dd,2)+spchar1+slpadinteger_4(mm,2)+spchar2+slpadinteger_4(yy,4);
      break;
      case 'mmddyyyy':
        var dd=parseInt(dateparts[1]);
        var mm=parseInt(dateparts[0]);
        var yy=parseInt(dateparts[2]);
        var retval=slpadinteger_4(mm,2)+spchar1+slpadinteger_4(dd,2)+spchar2+slpadinteger_4(yy,4);
      break;
    }
  }
  var ListofDays = [31,28,31,30,31,30,31,31,30,31,30,31];
  if (mm<1 || mm>12)
    return(false);
  if (mm==1 || mm>2)
  {
    if (dd>ListofDays[mm-1])
      return (false);
  }
  if (mm==2)
  {
    var lyear = false;
    if ( (!(yy % 4) && yy % 100) || !(yy % 400))
      lyear = true;
    if ((lyear==false) && (dd>=29))
      return (false);
    if ((lyear==true) && (dd>29))
      return (false);
  }
  if (min!='')
  {
    if (isNaN(min))
    {
      min=min.replace(/[^0-9]/g,'|');
      min=min.replace(/\|\|+/g,'|');
      var dateparts=min.split('|');
      if (dateparts.length!=3)
        return(retval);
      if (dateparts[2].length<4)
        return(retval);
      switch (dtfmt)
      {
        case 'ddmmyyyy':
          var mindd=parseInt(dateparts[0]);
          var minmm=parseInt(dateparts[1]);
          var minyy=parseInt(dateparts[2]);
        break;
        case 'mmddyyyy':
          var mindd=parseInt(dateparts[1]);
          var minmm=parseInt(dateparts[0]);
          var minyy=parseInt(dateparts[2]);
        break;
      }
      entdt=new Date(yy,mm-1,dd,0,0,0,0);
      mindt=new Date(minyy,minmm-1,mindd,0,0,0,0);
      if (entdt<mindt)
        return(false);
    }
    else
    {
      var today = new Date();
      var age = today.getFullYear() - yy;
      if (today.getMonth() < (mm-1) || (today.getMonth() == (mm-1) && today.getDate() < dd))
        age--;
      if (age<min)
        return(false);
    }
  }
  if (max!='')
  {
    if (isNaN(max))
    {
      max=max.replace(/[^0-9]/g,'|');
      max=max.replace(/\|\|+/g,'|');
      var dateparts=max.split('|');
      if (dateparts.length!=3)
        return(retval);
      if (dateparts[2].length<4)
        return(retval);
      switch (dtfmt)
      {
        case 'ddmmyyyy':
          var maxdd=parseInt(dateparts[0]);
          var maxmm=parseInt(dateparts[1]);
          var maxyy=parseInt(dateparts[2]);
        break;
        case 'mmddyyyy':
          var maxdd=parseInt(dateparts[1]);
          var maxmm=parseInt(dateparts[0]);
          var maxyy=parseInt(dateparts[2]);
        break;
      }
      entdt=new Date(yy,mm-1,dd,0,0,0,0);
      maxdt=new Date(maxyy,maxmm-1,maxdd,0,0,0,0);
      if (entdt>maxdt)
        return(false);
    }
    else
    {
      var today = new Date();
      var age = today.getFullYear() - yy;
      if (today.getMonth() < (mm-1) || (today.getMonth() == (mm-1) && today.getDate() < dd))
        age--;
      if (age>max)
        return(false);
    }
  }
  return(retval);
}
function slvalidatetime_4(fval,min,max,tmfmt)
{
  if (tmfmt=='24')
  {
    if (!/^([01]?[0-9]|2[0-3]):[0-5][0-9]$/i.test(fval))
      return(false);
    if (fval.length<5)
      fval='0'+fval;
    fval24=fval;
    min24=min;
    max24=max;
  }
  else
  {
    if (!/^(1[0-2]|0?[1-9]):[0-5][0-9] *(AM|PM)$/i.test(fval))
      return(false);
    if (fval.substring(0,1)=="0")
      fval=fval.substring(1);
    fval=fval.replace(/ /g,'');
    fval=fval.replace(/AM/gi,' AM');
    fval=fval.replace(/PM/gi,' PM');
    fval24=sl12to24_4(fval);
  }
  if (min!='')
  {
    if (tmfmt!='24')
      min24=sl12to24_4(min);
    enttm=new Date(1,1,1,parseInt(fval24.substring(0,2)),parseInt(fval24.substring(3,5)),0,0);
    mintm=new Date(1,1,1,parseInt(min24.substring(0,2)),parseInt(min24.substring(3,5)),0,0);
    if (enttm<mintm)
      return(false);
  }
  if (max!='')
  {
    if (tmfmt!='24')
      max24=sl12to24_4(max);
    enttm=new Date(1,1,1,parseInt(fval24.substring(0,2)),parseInt(fval24.substring(3,5)),0,0);
    maxtm=new Date(1,1,1,parseInt(max24.substring(0,2)),parseInt(max24.substring(3,5)),0,0);
    if (enttm>maxtm)
      return(false);
  }
  return(fval);
}

function sl12to24_4(fval)
{
  fval=fval.toUpperCase();
  var hours = Number(fval.match(/^(\d+)/)[1]);
  var minutes = Number(fval.match(/:(\d+)/)[1]);
  var AMPM = fval.match(/\s(.*)$/)[1];
  if(AMPM == "PM" && hours<12) hours = hours+12;
  if(AMPM == "AM" && hours==12) hours = hours-12;
  var sHours = hours.toString();
  var sMinutes = minutes.toString();
  if(hours<10) sHours = "0" + sHours;
  if(minutes<10) sMinutes = "0" + sMinutes;
  return(sHours + ":" + sMinutes);
}

function slvalidateurl_4(fval)
{
  fval=fval.toLowerCase();
  if ((fval.substring(0,7)!="http://") && (fval.substring(0,8)!="https://"))
    return(false);
  if (fval.indexOf('.')==-1)
    return(false);
  return(true);
}

function slmatchesregex_4(str,rgex)
{
  var matcher = new RegExp(rgex);
  if (!matcher.test(str))
    return(false);
  return(true);
}

function slpadinteger_4(num,size)
{
  var s = num+"";
    while (s.length < size) s = "0" + s;
  return s;
}

function slshowcharcount_4(fieldobj,showobj,min,max)
{
  var txt=document.getElementById(fieldobj).value;
  if (min==0)
  {
    if (txt.length>max)
      document.getElementById(showobj).innerHTML='<span class="counterror_4">'+(max-txt.length)+'</span>';
    else
      document.getElementById(showobj).innerHTML='<span>'+(max-txt.length)+'</span>';
  }
  else
  {
    if ((txt.length<min) || (txt.length>max))
      document.getElementById(showobj).innerHTML='<span class="counterror_4">'+txt.length+'/'+min+'-'+max+'</span>';
    else
      document.getElementById(showobj).innerHTML='<span>'+txt.length+'/'+min+'-'+max+'</span>';
  }
}

function slshowwordcount_4(fieldobj,showobj,min,max)
{
  var txt=document.getElementById(fieldobj).value;
  var txtlen=slcountwords_4(txt);
  if (min==0)
  {
    if (txtlen>max)
      document.getElementById(showobj).innerHTML='<span class="counterror_4">'+(max-txtlen)+'</span>';
    else
      document.getElementById(showobj).innerHTML='<span>'+(max-txtlen)+'</span>';
  }
  else
  {
    if ((txtlen<min) || (txtlen>max))
      document.getElementById(showobj).innerHTML='<span class="counterror_4">'+txtlen+'/'+min+'-'+max+'</span>';
    else
      document.getElementById(showobj).innerHTML='<span>'+txtlen+'/'+min+'-'+max+'</span>';
  }
}

function sltrim_4(x)
{
    return x.replace(/^\s+|\s+$/gm,'');
}

function slseeifchecked_4(name,idprefix)
{
  var checked=false;
  var controls=document.getElementsByName(name);
  for (i=0;i<controls.length;i++)
  {
    // if not from this form then ignore
    if (controls[i].id.indexOf(idprefix)==-1)
      continue;
    if (controls[i].checked)
    {
      checked=true;
      break;
    }
  }
  // Also check for field[] if necessary
  if(!checked)
  {
    var controls=document.getElementsByName(name+'[]');
    for (i=0;i<controls.length;i++)
    {
      // if not from this form then ignore
      if (controls[i].id.indexOf(idprefix)==-1)
        continue;
      if (controls[i].checked)
      {
        checked=true;
        break;
      }
    }
  }
  return(checked);
}function sl_serialize(form)
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
</head>

<body>
  <div class="modal" id="modal_confirm" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" style="width:480px;">
      <div class="modal-content">
        <div class="modal-body confirm-message"></div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger cancel-btn" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary confirm-btn" data-dismiss="modal">Confirm</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal" id="modal_signature" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" style="width:480px;">
      <form id="form-signature" action="/php/lock-sign.php" method="post" class="modal-content">
        <div class="modal-body">
          <?php if ($signature) { ?>
          <img src="/pdf-signature.php?text=<?= urlencode($slname) ?>&font=<?= $signature ?>" alt="<?= $slusername ?> Digital Signature">
          <?php } else { ?>
          <div class="form-group">
            <div align="center"><img src="img/letsgo.png"></div>

            <p style="padding:30px 10px 5px 10px;"><small><strong>Important Note</strong>: Digital Signature is an important aspect of your profile, without it you won't be
              able to mint and sell NFT. After you select your style, click on the checkbox "Agree". RADION use this as proof of identity and intent for your legal contract.</small></p>

            <select name="signature-font" id="signature-font" class="form-control" style="display:none;">
              <?php
              $fonts = scandir(__DIR__ . '/fonts');
              for ($i = 0; $i < count($fonts); $i++) {
                $font = $fonts[$i];
                $ext = substr($font, -4);
                if ($ext === '.otf' || $ext === '.ttf') {
                  $length = strlen($font);
                  $name = substr($font, 0, $length - 4);
                  ?>
                  <option value="<?= $name ?>"<?= $i === 0 ? ' selected' : '' ?>><?= $name ?></option>
                  <?php
                }
              }
            ?>
            </select>



          </div>

          <div class="form-group" align="center">
            <div>--- P R E V I E W ---</div>
            <img id="signature-preview" src="/pdf-signature.php?text=<?= urlencode($slname) ?>" alt="<?= $slusername ?> Digital Signature Preview">
          </div>

          <?php } ?>
          <div><button type="button" id="update-preview" class="btn btn-default btn-block">Change Digital Signature</button></div>
        </div>
        <div class="modal-footer">
          <div style="position:absolute; padding:0px 20px 0px 0px;" "right">
            <input type="checkbox" id="confirm-lock" name="confirm-lock"> <label for="confirm-lock"> I Agree to use this signature.</label>
          </div>
          <?php if ($signature) { ?>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <?php } else { ?>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          <button id="confirm-signature-btn" type="submit" class="btn btn-primary" disabled>Confirm</button>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>

  <div class="modal" id="modal_basic" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" style="width:480px;">
      <div class="modal-content" style="padding:48px;">
        <div id="radionwallet">
          <div class="rw-unlock">
            <div align="center" style="padding:0px 0px 30px 0px;"><img src="img/logo-dark.png" style="width:120px; height:40px;"></div>
            <h2>Unlock Wallet</h2>
            <form action="#" method="get" id="rw-unlock-key">
              <div><strong>Public Key:</strong> <span class="rw-unlock-pkh" style="color:#2980B9;"></span></div>
              <div class="form-group rw-hidden rw-unlock-key-input">
                <label for="rw-unlock-key-input">Passphrase (If any)</label>
                <input type="password" id="rw-unlock-key-input" class="form-control">
              </div>

              <div class="rw-hidden rw-unlock-error"></div>
              <button type="submit" class="btn btn-primary">Connect</button>
              <button type="button" class="btn btn-danger rw-unlock-remove">Disconnect</button>
            </form>
          </div>

          <div class="rw-manage">
            <div class="rw-manage-requests">
              <h3>Requests</h3>
            </div>

            <h2>Manage Key</h2>
            <div>Balance: <span class="rw-manage-balance"></span> tez</div>
            <div>Address: <span class="rw-manage-pkh"></span></div>
            <button type="button" class="btn btn-default rw-manage-lock">Lock</button>
            <button type="button" class="btn btn-danger rw-manage-remove">Disconnect</button>
          </div>

          <div class="rw-connect">
            <div align="center" style="padding:20px 0px 20px 0px;"><img src="img/logo-dark.png" style="width:90px; height:30px;"></div>
            <h3 align="center">NATIVE WALLET</h3>
            <p align="justify" style="padding-bottom:20px;"><small><strong>Important Note</strong>:<br>The native wallet was created to comply with the basic requirements that RADION needs in order to allow interaction
              with its platform. This feature is limited to specific functions; check balance and/or withdraw funds. Once you get familiar with our system we recommend migrating to another wallet provider.</small></p>
            <form action="#" method="get" id="rw-connect-secret">
              <div class="form-group rw-connect-secret-input">
                <label for="rw-connect-secret-input">Secret Key / Encrypted Key / Seed Words</label>
                <input type="text" id="rw-connect-secret-input" class="form-control">
              </div>

              <div class="form-group rw-hidden rw-connect-secret-pass-input">
                <label for="rw-connect-secret-pass-input">Passphrase (If any)</label>
                <input type="password" id="rw-connect-secret-pass-input" class="form-control">
              </div>

              <div class="form-group rw-hidden rw-connect-secret-email-input">
                <label for="rw-connect-secret-email-input">Email (If any)</label>
                <input type="email" id="rw-connect-secret-email-input" class="form-control">
              </div>

              <div class="rw-hidden rw-connect-error"></div>
              <button type="submit" class="btn btn-primary">Connect</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <template id="rw-template-request">
    <form action="#" method="get" class="rw-request">
      <div>Destination <span class="rw-request-dest"></span></div>
      <div>Amount: <span class="rw-request-amount"></span></div>
      <button type="submit" class="btn btn-default">Approve</button>
      <button type="reset" class="btn btn-danger">Reject</button>
    </form>
  </template>

  <template id="rw-template-request-complete">
    <div class="rw-request-complete">
      <div>Destination: <span class="rw-request-dest"></span></div>
      <div>Amount: <span class="rw-request-amount"></span></div>
      <div class="text-success rw-hidden rw-request-approved">Approved</div>
      <div class="text-error rw-hidden rw-request-rejected">Rejected</div>
      <div class="rw-hidden rw-request-output"></div>
    </div>
  </template>

  <div class="modal" id="modal_small" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-body">
        <div align="center" style="padding:20px 0px 20px 0px;"><img src="img/logo-dark.png" style="width:90px; height:30px;"></div>
        <div class="address-qrcode" align="center"></div>
        <br>
        <div style="padding-bottom:20px;"><strong><i class="fas fa-wallet"></i> Wallet:</strong><br><span class="source-address" style="font-size:11px; color:#2980B9;"></span></div>
      </div>
      </div>
    </div>
  </div>

  <!-- START PAGE CONTAINER -->
  <div class="page-container">
    <!-- START PAGE SIDEBAR -->
    <div class="page-sidebar">
      <!-- START X-NAVIGATION -->
      <ul class="x-navigation">
        <li class="xn-logo">
          <a href="/">RADION</a>
          <a href="#" class="x-navigation-control"></a>
        </li>

        <li class="xn-profile">
          <a href="#" class="profile-mini">
            <img src="<?php siteloklink($slcustom2, 0); ?>" alt="<?= $slusername ?>">
          </a>

          <div class="profile">
            <div class="profile-image">
              <img src="<?php siteloklink($slcustom2, 0); ?>" alt="<?= $slusername ?>">
            </div>
            <div class="profile-data">
              <div class="profile-data-name"><?= $slusername ?></div>
              <div class="profile-data-title"><?= $slusergroups ?></div>
            </div>
            <div class="profile-controls">
              <a href="/user-profile.php?uid=<?= $userid ?>&hash=<?= $userhash ?>" class="profile-control-left"><i class="fas fa-user-astronaut fa-lg"></i></a>
              <a href="/edit-profile.php" class="profile-control-right"><i class="fad fa-user-edit"></i></a>
            </div>
          </div>
        </li>

        <li class="xn-openable">
        <a href="#">
          <lord-icon src="https://cdn.lordicon.com//mmspidej.json" trigger="click" target="a" colors="primary:#ffffff,secondary:#F39C12" style="width:45px;height:45px"></lord-icon>
          <span class="xn-text">&nbsp;&nbsp; MUSIC</span>
        </a>
        <ul>
            <li><a href="submission.php"><span class="xn-text"><i class="fad fa-upload fa-lg"></i>&nbsp;&nbsp; UPLOAD FILE</span></a></li>
            <li><a href="mint-NFT-song-track.php"><span class="xn-text"><i class="fad fa-compact-disc fa-lg"></i> &nbsp;&nbsp; CREATE A NFT SONG TRACK</span></a></li>
        </ul>
    </li>

    <li class="xn-openable">
        <a href="#">
          <lord-icon src="https://cdn.lordicon.com//hciqteio.json" trigger="click" target="a" colors="primary:#ffffff,secondary:#F39C12" style="width:45px;height:45px"></lord-icon>
          <span class="xn-text">&nbsp;&nbsp; DISCOVER MUSIC</span>
        </a>
        <ul>
            <li><a href="marketplace.php"><span class="xn-text"><i class="fad fa-poll-people fa-lg"></i>&nbsp;&nbsp; ENGAGE WITH NEW TALENTS</span></a></li>
            <li><a href="NFT-music-marketplace-tezos.php"><span class="xn-text"><i class="fas fa-album-collection fa-lg"></i>&nbsp;&nbsp; NFT MARKETPLACE FOR MUSIC</span></a></li>
        </ul>
    </li>

    <li class="xn-openable">
    <a href="#">
      <lord-icon src="https://cdn.lordicon.com//dizvjgip.json" trigger="click" target="a" colors="primary:#ffffff,secondary:#F39C12" style="width:45px;height:45px"></lord-icon>
      <span class="xn-text">&nbsp;&nbsp; RADION SERVICES</span>
    </a>
        <ul>
          <li><a href="ad-submission.php"><span class="xn-text"><i class="far fa-ad fa-lg"></i>&nbsp;&nbsp; CREATE AD WITH CRYPTO</span></a></li>
          <li><a href="#"><span class="xn-text"><i class="fal fa-fingerprint fa-lg"></i>&nbsp;&nbsp; ISRC ASSIGNMENT &nbsp;&nbsp;&nbsp;<label class="label label-primary"> SOON</label></span></a></li>
          <li><a href="#"><span class="xn-text"><i class="fad fa-chart-network fa-lg"></i>&nbsp;&nbsp; MUSIC SYNC LICENSING &nbsp;&nbsp;&nbsp;<label class="label label-primary"> SOON</label></span></a></li>
        </ul>
    </li>

<li class="xn-openable">
<a href="submission.php">
  <lord-icon src="https://cdn.lordicon.com//zqxcrgvd.json" trigger="click" target="a" colors="primary:#ffffff,secondary:#F39C12" style="width:45px;height:45px"></lord-icon>
  <span class="xn-text">&nbsp;&nbsp; LAB</span>
</a>
<ul>
  <li><a href="#"><span class="xn-text"><i class="fad fa-sack-dollar fa-lg"></i>&nbsp;&nbsp; MECHANICAL ROYALTIES &nbsp;&nbsp;&nbsp;<label class="label label-warning"> IN PROGRESS</label></span></a></li>
  <li><a href="#"><span class="xn-text"><i class="fad fa-sack-dollar fa-lg"></i>&nbsp;&nbsp; CRYPTO BILLBOARD &nbsp;&nbsp;&nbsp;<label class="label label-warning"> IN PROGRESS</label></span></a></li>
</ul>
    </li>

    </ul>
    <!-- END X-NAVIGATION -->
    </div>
    <!-- END PAGE SIDEBAR -->

    <!-- PAGE CONTENT -->
    <div class="page-content">
      <!-- START X-NAVIGATION VERTICAL -->
      <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
        <!-- TOGGLE NAVIGATION -->
        <li class="xn-icon-button">
          <a href="#" class="x-navigation-minimize"><span class="fas fa-outdent"></span></a>
        </li>
        <!-- END TOGGLE NAVIGATION -->
        <!-- POWER OFF -->
        <li class="xn-icon-button pull-right last">
          <a href="#"><i class="fad fa-sign-out-alt fa-lg"></i></a>
          <ul class="xn-drop-left animated zoomIn">
            <li><a href="#" class="mb-control" data-box="#mb-signout"><span class="fas fa-sign-out-alt"></span> Sign Out</a></li>
          </ul>
        </li>
        <!-- END POWER OFF -->
        <!-- ALERT NOTIFICATIONS -->
        <li class="xn-icon-button pull-right">
          <a href="#"><i class="fad fa-bell-on fa-lg"></i></a>
          <div class="informer informer-danger"><?php if (function_exists('sl_showprivatemessagecount')) sl_showprivatemessagecount(); ?></div>
          <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
            <div class="panel-heading">
              <h3 class="panel-title"><i class="fad fa-bell-on"></i> Notifications</h3>
              <div class="pull-right">
                <span class="label label-warning"><?php if (function_exists('sl_showprivatemessagecount')) sl_showprivatemessagecount(); ?> new</span>
              </div>
            </div>
            <div class="panel-footer text-center">
              <a href="#">Show all messages</a>
            </div>
          </div>
        </li>
        <!-- ALERT NOTIFICATIONS ENDS -->
        <!-- LANG BAR -->
        <li class="xn-icon-button pull-right">
          <a href="#"><i class="far fa-language fa-lg"></i></a>
          <ul class="xn-drop-left xn-drop-dark animated zoomIn">
            <li><a href="#"><img src="/img/flags/us.png" style="height:20px; width:20;">&nbsp &nbsp English</a></li>
          </ul>
        </li>
        <!-- END LANG BAR -->
      </ul>
      <!-- END X-NAVIGATION VERTICAL -->

      <!-- PAGE CONTENT WRAPPER -->
      <div class="page-content-wrap">
        <br>
        <!-- START WIDGETS -->
        <div class="row">

          <div class="col-md-3">
            <!-- START WIDGET MESSAGES -->
            <div class="widget widget-primary widget-item-icon">
              <div class="widget-item-left">
                <img src="img/ON-logo.png" style="height:40px; width:40px;">
              </div>
              <div class="widget-data">
                <div class="widget-int num-count">TOKEN</div>
                <div class="widget-title">BALANCE</div>
                <div class="widget-subtitle radio-balance" style="color:#F39C12;">0 RADIO</div>
              </div>
            </div>
            <!-- END WIDGET MESSAGES -->
          </div>

          <div class="col-md-3">
            <!-- START WIDGET MESSAGES -->
            <div class="widget widget-primary widget-item-icon">
              <div class="widget-item-left">
                <div style="height:40px; width:40px; margin-left:10px;">
                  <svg xmlns="http://www.w3.org/2000/svg" width="47" height="64" viewBox="0 0 47 64">
                    <path style="fill:#737577;" d="M30.252 63.441c-4.55 0-7.864-1.089-9.946-3.267-2.08-2.177-3.121-4.525-3.121-7.041 0-.92.181-1.694.544-2.323a3.993 3.993 0 0 1 1.489-1.489c.629-.363 1.403-.544 2.323-.544.92 0 1.693.181 2.323.544.629.363 1.125.86 1.488 1.489.363.629.544 1.403.544 2.323 0 1.113-.266 2.02-.798 2.722-.533.702-1.162 1.161-1.888 1.38.63.87 1.622 1.487 2.977 1.85 1.355.388 2.71.581 4.065.581 1.887 0 3.593-.508 5.118-1.524 1.524-1.017 2.65-2.517 3.376-4.501.726-1.984 1.089-4.235 1.089-6.752 0-2.734-.4-5.07-1.198-7.005-.775-1.96-1.924-3.412-3.449-4.356a9.21 9.21 0 0 0-4.936-1.415c-1.162 0-2.613.484-4.356 1.452l-3.194 1.597v-1.597L37.076 16.4H17.185v19.89c0 1.646.363 3.001 1.089 4.066s1.839 1.597 3.34 1.597c1.16 0 2.274-.387 3.339-1.162a11.803 11.803 0 0 0 2.758-2.83c.097-.219.218-.376.363-.473a.723.723 0 0 1 .472-.181c.266 0 .58.133.944.4.339.386.508.834.508 1.342a9.243 9.243 0 0 1-.182 1.017c-.822 1.839-1.96 3.242-3.412 4.21a8.457 8.457 0 0 1-4.79 1.452c-4.308 0-7.285-.847-8.93-2.54-1.645-1.695-2.468-3.994-2.468-6.897V16.4H.052v-3.703h10.164v-8.42L7.893 1.952V.066h6.751l2.54 1.306v11.325l26.28-.072 2.614 2.613-16.116 16.116a10.807 10.807 0 0 1 3.049-.726c1.742 0 3.702.557 5.88 1.67 2.202 1.089 3.896 2.59 5.081 4.5 1.186 1.888 1.948 3.703 2.287 5.445.363 1.743.545 3.291.545 4.646 0 3.098-.654 5.977-1.96 8.64-1.307 2.661-3.291 4.645-5.953 5.952-2.662 1.307-5.542 1.96-8.639 1.96z"></path>
                  </svg>
                </div>
              </div>
              <div class="widget-data">
                <div class="widget-int num-count">XTZ</div>
                <div class="widget-title">BALANCE</div>
                <div class="widget-subtitle" style="color:#F39C12;"><span class="xtz-balance">0</span> &#42793;</div>
              </div>
            </div>
            <!-- END WIDGET MESSAGES -->
          </div>

          <div class="col-md-6">
            <!-- START WIDGET CLOCK -->
            <div class="widget widget-primary widget-padding-sm">
              <div class="widget-controls">
                <div style="height:35px; width:35px; margin-bottom:-40px; padding-left:20px;" class="widget-control-left">
                  <svg xmlns="http://www.w3.org/2000/svg" width="47" height="64" viewBox="0 0 47 64">
                    <path style="fill:#7B7D7D;" d="M30.252 63.441c-4.55 0-7.864-1.089-9.946-3.267-2.08-2.177-3.121-4.525-3.121-7.041 0-.92.181-1.694.544-2.323a3.993 3.993 0 0 1 1.489-1.489c.629-.363 1.403-.544 2.323-.544.92 0 1.693.181 2.323.544.629.363 1.125.86 1.488 1.489.363.629.544 1.403.544 2.323 0 1.113-.266 2.02-.798 2.722-.533.702-1.162 1.161-1.888 1.38.63.87 1.622 1.487 2.977 1.85 1.355.388 2.71.581 4.065.581 1.887 0 3.593-.508 5.118-1.524 1.524-1.017 2.65-2.517 3.376-4.501.726-1.984 1.089-4.235 1.089-6.752 0-2.734-.4-5.07-1.198-7.005-.775-1.96-1.924-3.412-3.449-4.356a9.21 9.21 0 0 0-4.936-1.415c-1.162 0-2.613.484-4.356 1.452l-3.194 1.597v-1.597L37.076 16.4H17.185v19.89c0 1.646.363 3.001 1.089 4.066s1.839 1.597 3.34 1.597c1.16 0 2.274-.387 3.339-1.162a11.803 11.803 0 0 0 2.758-2.83c.097-.219.218-.376.363-.473a.723.723 0 0 1 .472-.181c.266 0 .58.133.944.4.339.386.508.834.508 1.342a9.243 9.243 0 0 1-.182 1.017c-.822 1.839-1.96 3.242-3.412 4.21a8.457 8.457 0 0 1-4.79 1.452c-4.308 0-7.285-.847-8.93-2.54-1.645-1.695-2.468-3.994-2.468-6.897V16.4H.052v-3.703h10.164v-8.42L7.893 1.952V.066h6.751l2.54 1.306v11.325l26.28-.072 2.614 2.613-16.116 16.116a10.807 10.807 0 0 1 3.049-.726c1.742 0 3.702.557 5.88 1.67 2.202 1.089 3.896 2.59 5.081 4.5 1.186 1.888 1.948 3.703 2.287 5.445.363 1.743.545 3.291.545 4.646 0 3.098-.654 5.977-1.96 8.64-1.307 2.661-3.291 4.645-5.953 5.952-2.662 1.307-5.542 1.96-8.639 1.96z"></path>
                  </svg>
                </div>

                <div style="width:100%; margin:5px 20px 0px 40px; color:#7B7D7D;" align="left">
                  <h3><strong style="color:#7B7D7D;">Tezos</strong></h3>
                  <div style="margin-top:-10px;">XTZ/USD</div>
                </div>
              </div>

              <div class="widget-big-int" style="margin-top:-40px;">
                <small>$</small>
                <span class="tezos-price-usd"></span>
              </div>
              <div class="widget-subtitle">Change 24h
                <span>
                  <span class="tezos-change-24hr-down" style="display:none;">
                    <span class="fas fa-sort-down fa-xs" style="vertical-align:2px;"></span>
                    <span class="tDown tezos-change-24hr" style="font-size:12px;"></span>
                  </span>
                  <span class="tezos-change-24hr-up" style="display:none;">
                    <span class="fas fa-sort-up fa-xs" style="vertical-align:-2px;"></span>
                    <span class="tUp tezos-change-24hr" style="font-size:12px;"></span>
                  </span>
                </span>
              </div>
              <div class="widget-buttons widget-c3">
                <div align="left" style="margin-top:0px; padding-left:15px;">
                  <a href="#" class="widget-control-right connect-wallet connect-wallet-text-connected" style="font-size:13px; text-decoration:none; color:#F39C12; display:none;"><i class="fad fa-wallet"></i> Disconnect Wallet</a>
                  <a href="#" class="widget-control-right connect-wallet connect-wallet-text-connect" style="font-size:13px; text-decoration:none; color:#F39C12;"><i class="fad fa-wallet"></i> Connect Wallet</a>
                  <span class="connect-wallet-text-connect" style="padding-right:3px; padding-left:3px;">|</span>
                  <a href="#modal_basic" data-toggle="modal" class="connect-wallet-text-connect" style="font-size:13px; text-decoration:none; color:#F39C12;"><i class="fad fa-wallet"></i> Connect Native Wallet</a>

                  <span class="connect-wallet-text-connected" style="padding-right:3px; padding-left:3px; display:none;">|</span>
                  <a href="#modal_small" data-toggle="modal" class="connect-wallet-text-connected" style="font-size:13px; text-decoration:none; color:#F39C12; display:none;"><i class="fad fa-qrcode"></i> Receive</a>
                  <span class="connect-wallet-text-connected-radion" style="padding-right:3px; padding-left:3px; display:none;">|</span>
                  <a id="sidebar-toggler" href="#" class="sidebar-toggle connect-wallet-text-connected-radion" style="font-size:13px; text-decoration:none; color:#F39C12; display:none;"><i class="fad fa-paper-plane"></i> Withdraw</a>
                  <span style="padding-right:3px; padding-left:3px;">|</span>
                  <span style="color:#797D7F;">USD Balance <i class="fas fa-dollar-sign"></i> <span class="usd-balance">0</span></span>
                </div>
              </div>
            </div>
            <!-- END WIDGET CLOCK -->
          </div>
        </div>
        <!-- END WIDGETS -->

        <div class="row">

          <div class="col-md-6">
            <div class="panel panel-default">
              <div class="panel-body">
                <div id="slform_4">
                  <form action="" method="post" enctype="multipart/form-data" onSubmit="return slvalidateform_4(this)" style="padding:20px;">
                    <input type="hidden" name="slajaxform" value="0">
                    <?php if (function_exists('sitelokmodify')) sitelokmodify("updateuser.htm","updateuseradmin.htm","update-successful.php?nocache=1616462224","YNNNNYYYNNYYYNYYYYYYNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN","4"); ?>

                    <div id="slfielddiv_4_10" class="sltextfield_4" style="padding-bottom:5px;">
                      <label for="slfieldinput_4_10">Bio</label>
                      <textarea class="form-control" name="newcustom7" id="slfieldinput_4_10" maxlength="255" rows="5"><?= $newcustom7 ?></textarea>
                      <div id="slmsg_4_10" class="slmsg_4" aria-live="polite"></div>
                    </div>

                    <div id="slfielddiv_4_0" class="slfilefield_4" style="padding-bottom:5px;">
                      <label for="slfieldinput_4_0">Picture or Avatar<em>*</em></label>
                      <input type="file" class="form-control" name="newcustom2" id="slfieldinput_4_0">
                      <div id="slmsg_4_0" class ="slmsg_4" aria-live="polite"></div>
                    </div>

                    <div id="slfielddiv_4_1" class="sltextfield_4" style="padding-bottom:5px;">
                      <label for="slfieldinput_4_1">Legal Name</label>
                      <input type="text" class="form-control" name="newusername" id="slfieldinput_4_1" autocorrect="off" autocapitalize="off" spellcheck="off" autocomplete="off" maxlength="100" value="<?= $newusername ?>">
                      <div id="slmsg_4_1" class="slmsg_4" aria-live="polite"></div>
                    </div>

                    <div id="slfielddiv_4_10" class="sltextfield_4" style="padding-bottom:5px;">
                      <label for="slfieldinput_4_10">Country / State</label>
                      <input type="text" class="form-control" name="newcustom9" id="slfieldinput_4_10" autocorrect="off" autocapitalize="off" spellcheck="off" autocomplete="off" maxlength="100" value="<?= $newcustom9 ?>">
                      <div id="slmsg_4_10" class="slmsg_4" aria-live="polite"></div>
                    </div>

                    <div id="slfielddiv_4_2" class="sltextfield_4" style="padding-bottom:5px;">
                      <label for="slfieldinput_4_2">DOB</label>
                      <input type="text" class="form-control" name="newcustom3" id="slfieldinput_4_2" placeholder="00/00/0000" maxlength="255" value="<?= $newcustom3 ?>">
                      <div id="slmsg_4_2" class="slmsg_4" aria-live="polite"></div>
                    </div>

                    <div id="slfielddiv_4_3" class="sltextfield_4" style="padding-bottom:5px;">
                      <label for="slfieldinput_4_3">Phone Number</label>
                      <input type="text" class="form-control" name="newcustom4" id="slfieldinput_4_3" placeholder="+1 (000) 000-0000" maxlength="255" value="<?= $newcustom4 ?>">
                      <div id="slmsg_4_3" class="slmsg_4" aria-live="polite"></div>
                    </div>

                    <div id="slfielddiv_4_4" class="sltextfield_4" style="padding-bottom:5px;">
                      <label for="slfieldinput_4_4">Website</label>
                      <input type="text" class="form-control" name="newcustom8" id="slfieldinput_4_4" placeholder="www.yourwebsite.com" maxlength="255" value="<?= $newcustom8 ?>">
                      <div id="slmsg_4_4" class="slmsg_4" aria-live="polite"></div>
                    </div>

                    <div id="slfielddiv_4_5" class="sltextfield_4" style="padding-bottom:5px;">
                      <label for="slfieldinput_4_5">Twitter</label>
                      <input type="text" class="form-control" name="newcustom12" id="slfieldinput_4_5" maxlength="255" value="<?php echo $newcustom12; ?>">
                      <div id="slmsg_4_5" class="slmsg_4" aria-live="polite"></div>
                    </div>

                    <div id="slfielddiv_4_6" class="sltextfield_4" style="padding-bottom:5px;">
                      <label for="slfieldinput_4_6">YouTube Channel URL</label>
                      <input type="text" class="form-control" name="newcustom11" id="slfieldinput_4_6" maxlength="255" value="<?= $newcustom11 ?>">
                      <div id="slmsg_4_6" class="slmsg_4" aria-live="polite"></div>
                    </div>

                    <div id="slfielddiv_4_7" class="sltextfield_4" style="padding-bottom:5px;">
                      <label for="slfieldinput_4_7">SoundCloud URL</label>
                      <input type="text" class="form-control" name="newcustom15" id="slfieldinput_4_7" maxlength="255" value="<?= $newcustom15 ?>">
                      <div id="slmsg_4_7" class="slmsg_4" aria-live="polite"></div>
                    </div>

                    <div id="slfielddiv_4_8" class="sltextfield_4" style="padding-bottom:5px;">
                      <label for="slfieldinput_4_8">Spotify URL</label>
                      <input type="text" class="form-control" name="newcustom16" id="slfieldinput_4_8" maxlength="255" value="<?= $newcustom16 ?>">
                      <div id="slmsg_4_8" class ="slmsg_4" aria-live="polite"></div>
                    </div>

                    <div id="slfielddiv_4_9" class="sltextfield_4" style="padding-bottom:5px;">
                      <label for="slfieldinput_4_9">iTunes URL</label>
                      <input type="text" class="form-control" name="newcustom14" id="slfieldinput_4_9" maxlength="255" value="<?= $newcustom14 ?>">
                      <div id="slmsg_4_9" class="slmsg_4" aria-live="polite"></div>
                    </div><br>

                    <button id="myButton_4" class="btn btn-warning btn-block" type="submit">UPDATE NOW!</button><div id="slspinner_4"></div>
                    <div id="slformmsg_4" class="slformmsg_4" aria-live="polite"><?php if ($msg!="") echo $msg; ?></div>
                  </form>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <!-- START DEFAULT PANEL -->
            <div class="panel panel-default" style="padding:40px;">

              <form action="#" class="form-horizontal">
                <div class="panel-body form-group-separated" style="padding-bottom:30px;">
                  <div align="right" style="padding-top:10px; margin-bottom:0px;" class="text-muted">
                    <?php if ($slcustom12) { ?><i class="fab fa-twitter fa-lg"></i><?php } ?>
										<?php if ($slcustom11) { ?><i class="fab fa-youtube fa-lg"></i><?php } ?>
										<?php if ($slcustom15) { ?><i class="fab fa-soundcloud fa-lg"></i><?php } ?>
										<?php if ($slcustom16) { ?><i class="fab fa-spotify fa-lg"></i><?php } ?>
										<?php if ($slcustom14) { ?><i class="fab fa-itunes fa-lg"></i><?php } ?>
                  </div>

                  <div><h2><?= $slusername ?></h2></div>
                  <div style="margin-top:-15px; padding-left:3px; color:#CCC;"><?= $slusergroups ?></div>
                  <div align="right" style="margin-bottom:-10px;">
                    <i class="fad fa-map-marker-alt"></i>
                    <span class="text-muted"><?= $slcustom1 ?></span>
                    <spacer style="padding-left:20px; padding-right:20px;">|</spacer>
                    <i class="fad fa-link"></i>
                    <span class="text-muted"><?= $slcustom8 ?></span>
                    <spacer style="padding-left:20px; padding-right:20px;">|</spacer>
                    <i class="fad fa-calendar-alt"></i>
                    <span class="text-muted">Joined <?= date('m/d/y', $slcreated ) ?></span>
                  </div><hr>

                  <blockquote>
                    <div style="padding-left:50px; padding-right:50px;" align="justify"><?= $newcustom7 ?></div>
                  </blockquote>

                  <div class="col-md-12"><div class="col-md-3"><strong>Legal Name:</strong></div><div class="col-md-9"><?= $slname ?></div></div>
                  <div class="col-md-12"><div class="col-md-3"><strong>DOB:</strong></div><div class="col-md-9"><?= $slcustom3 ?></div></div>
                  <div class="col-md-12"><div class="col-md-3"><strong>Address:</strong></div><div class="col-md-9"><?= $slcustom9 ?></div></div>
                  <div class="col-md-12"><div class="col-md-3"><strong>Phone Number:</strong></div><div class="col-md-9"><?= $slcustom4 ?></div></div>
                  <div class="col-md-12"><div class="col-md-3"><strong>Email:</strong></div><div class="col-md-9"><?= $slemail ?></div></div>
                  <div class="col-md-12"><div class="col-md-3"><strong>Account Wallet:</strong></div><div id="user-address" class="col-md-9 text-info"><?= $slcustom6 ?></div></div>
                </div>
              </form>
              <hr>
              <div style="padding:20px 0px 30px 0px;">
                <h3>SETTINGS</h3>
                <div class="col-md-12"><small>For better security we recommend you to have a strong password and your 2FA activated.</small></div>
              </div>
              <hr>

              <div class="col-md-12">
                <div class="col-md-4">
                  <strong>2FA</strong>
                </div>
                <div class="col-md-8" style="margin-top:-7px;">
                  <?php if (function_exists("sl_2facontrol_switch")) echo sl_2facontrol_switch(array("enabletext"=>"Enable 2FA","disabletext"=>"Disable 2FA","confirmdisablemsg"=>"<h3>2FA Settings</h3><br>Are you sure you want to disable you 2FA?","confirmenablemsg"=>"<h3>2FA Settings</h3><br>Are you sure you want to enable you 2FA?","processingmsg"=>"please wait","resetkey"=>"0")); ?>
                </div>
              </div>

              <div class="col-md-12">
                <div class="col-md-4">
                  <strong>eSignature</strong>
                  <div style="color:#ccc;"><small class="signature-status"><?= $signature ? 'Activated' : 'Need Approval!' ?></small></div>
                </div>
                <div class="col-md-8" style="margin:-7px 0px 0px -8px;">
                  <div class="col-md-4">
                    <label class="switch switch-small">
                      <input id="signature-switch" type="checkbox" class="switch" value="0"<?= $signature ? ' checked="checked" disabled="disabled"' : '' ?> />
                      <span></span>
                    </label>
                  </div>
                </div>

              </div>

              <div class="col-md-12">
                <?php if ($signature) { ?>
                <img src="/pdf-signature.php?text=<?= urlencode($slname) ?>&font=<?= urlencode($signature) ?>" alt="<?= $slusername ?> Digital Signature">
                <?php } ?>
              </div>
            </div>
            <!-- END DEFAULT PANEL -->
          </div>
        </div>

        <div class="row">
          <div class="col-md-6"></div>
          <div class="col-md-6"></div>
        </div>
      </div>
      <!-- END PAGE CONTENT WRAPPER -->
    </div>
    <!-- END PAGE CONTENT -->
  </div>
  <!-- END PAGE CONTAINER -->

  <!-- START SIDEBAR -->
  <div class="sidebar">
    <div class="sidebar-wrapper scroll">
      <div class="sidebar-tabs">
        <a href="#sidebar_1" class="sidebar-tab active"><span class="fad fa-paper-plane"></span> WITHDRAW</a>
      </div>

      <div class="sidebar-tab-content active" id="sidebar_1">
        <div class="content-frame-right" style="padding:20px;">

          <h2 align="center" style="color:#fff;"><strong>WITHDRAW</strong></h2>
          <br>
          <div id="estimate-spinner" style="display:none;" align="center"></div>

          <form id="send-form" class="form-horizontal" role="form">
            <div style="padding-left:15px;"><span style="color:#fff;"><strong>RECIPIENT</strong></span><br><small style="color:#979A9A; margin-top:-5px;">Address or Tezos domain to send tez funds to.</small></div>
            <div class="form-group">
              <div class="col-md-12">
                <input type="text" placeholder="tz1..." id="send-receiver" class="form-control">
              </div>
            </div>

            <div style="color:#fff; padding-left:15px;">TEZ AMOUNT</div>
            <div class="form-group">
              <div class="col-md-12">
                <input type="text" placeholder="0.00000000" id="send-amount" class="form-control">
                <div class="btn-group btn-group-xs" style="position:absolute; right:0; padding:5px 15px 0px 0px;">
                  <button type="button" id="send-25" class="btn btn-default">25%</button>
                  <button type="button" id="send-50" class="btn btn-default">50%</button>
                  <button type="button" id="send-75" class="btn btn-default">75%</button>
                  <button type="button" id="send-99" class="btn btn-default">99%</button>
                </div>
              </div>
            </div>

            <br>
            <br>
            <div style="padding:15px;">
              <button class="btn btn-warning btn-block" id="send-submit">SEND</button>

            </div>
          </form>

          <form id="send-fees" style="display:none;">
            <div style="color:#fff; padding-left:15px;"><h5 style="color:#fff;">RECIPIENT</h5></div>

            <div class="form-group" style="color:#979A9A; padding-left:15px; margin-top:-10px;"><small>Address or Tezos domain to send tez funds to.</small></div>
            <div class="form-group" style="padding-left:15px; color:#2980B9; margin-top:-10px;"><strong><span id="send-confirm-receiver"></span></strong></div>
            <div style="padding-left:15px; margin-top:-10px;"><strong>AMOUNT: <span id="send-confirm-amount" style="color:#F39C12;"></span></srong></div>

            <div class="form-group" style="padding-bottom:50px;">

              <div class="form-group" style="color:#979A9A; padding-bottom:10px; padding-left:15px;"><small>Base Fee for this operation is: <span class="send-base-fee">0</span><br>
              Additional - speeds up its confirmation.</small></div>

              <div class="col-md-12" style="color:#FFF; margin-top:-25px;"><small>Total Fee: <span class="send-total-fee">0</span></small></div>
              <div class="col-md-12 send-allocation-fee-container" style="display:none;">Allocation Fee: <span class="send-allocation-fee">0</span></div>
              <br>
              <div class="col-md-12" style="color:#979A9A; padding-top:10px;">
                <h5 style="color:#979A9A;">Additional Fee:</h5>
              </div>
                                            <div class="radio" style="padding-left:30px; color:#979A9A;">
                                                <label>
                                                    <input type="radio" name="send-add-fee" id="optionsRadios1" value="100" checked/>
                                                    <i class="far fa-tachometer-alt-slow"></i> <small>Minimal - 0.0001 tez</small>
                                                </label>
                                            </div>
                                            <div class="radio" style="padding-left:30px; color:#979A9A;">
                                                <label>
                                                    <input type="radio" name="send-add-fee" id="optionsRadios2" value="150"/>
                                                    <i class="far fa-tachometer-alt-average"></i> <small>Faster - 0.00015 tez</small>
                                                </label>
                                            </div>
                                            <div class="radio" style="padding:0px 0px 10px 30px; color:#979A9A;">
                                                <label>
                                                    <input type="radio" name="send-add-fee" id="optionsRadios3" value="200"/>
                                                    <i class="far fa-tachometer-alt-fastest"></i> <small>Ultra Faster - 0.0002 tez</small>
                                                </label>
                                            </div>

            </div>

            <div class="form-group" style="padding:0px 25px 25px 25px;">
            <div class="col-md-6">
              <button type="button" class="btn btn-danger btn-block" id="send-decline">CANCEL</button>
            </div>
            <div class="col-md-6">
              <button type="button" class="btn btn-warning btn-block" id="send-confirm">CONFIRM</button>
            </div>

            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- END SIDEBAR -->

  <!-- MESSAGE BOX-->
  <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
    <div class="mb-container">
      <div class="mb-middle">
        <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
        <div class="mb-content">
          <p>Are you sure you want to log out?</p>
          <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
        </div>
        <div class="mb-footer">
          <div class="pull-right">
            <a href="/slpw/sitelokpw.php?sitelokaction=logout" class="btn btn-success btn-lg">Yes</a>
            <button class="btn btn-default btn-lg mb-control-close">No</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- END MESSAGE BOX-->

  <!-- START PRELOADS -->
  <audio id="audio-alert" src="/audio/alert.mp3" preload="auto"></audio>
  <audio id="audio-fail" src="/audio/fail.mp3" preload="auto"></audio>
  <!-- END PRELOADS -->

  <!-- START SCRIPTS -->
  <!-- START PLUGINS -->
  <script src="/js/plugins/jquery/jquery-ui.min.js"></script>
  <script src="/js/plugins/bootstrap/bootstrap.min.js"></script>
  <script src="/js/plugins/jquery/jquery-migrate.min.js"></script>
  <script src="/js/plugins/noty/jquery.noty.js"></script>
  <script src="/js/plugins/noty/layouts/topRight.js"></script>
  <script src="/js/plugins/noty/themes/default.js"></script>
  <!-- END PLUGINS -->

  <!-- START THIS PAGE PLUGINS-->
  <script src="/js/plugins/icheck/icheck.min.js"></script>
  <script src="/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
  <script src="/js/plugins/bootstrap/bootstrap-file-input.js"></script>
  <script src="/js/plugins/form/jquery.form.js"></script>
  <script src="/js/plugins/cropper/cropper.min.js"></script>
  <!-- END THIS PAGE PLUGINS-->

  <!-- START TEMPLATE -->
  <script src="/js/plugins.js"></script>
  <script src="/js/actions.js"></script>
  <script src="/js/demo_edit_profile.js"></script>
  <!-- END TEMPLATE -->

  <script src="https://unpkg.com/@airgap/beacon-sdk@2.3.1/dist/walletbeacon.min.js"></script>
  <script>window.beaconSdk = beacon</script>
  <script src="https://unpkg.com/@taquito/taquito@10.1.0/dist/taquito.min.js"></script>
  <script src="https://unpkg.com/@taquito/beacon-wallet@10.1.0/dist/taquito-beacon-wallet.umd.js"></script>
  <script src="/js/tezos.js"></script>

  <script>
  const { TezosToolkit, MichelsonMap } = taquito
  const { BeaconWallet } = taquitoBeaconWallet
  const { NetworkType } = beacon

  const rpc = 'https://mainnet-tezos.giganode.io'
  const tezos = new TezosToolkit(rpc)
  const wallet = new BeaconWallet({
    name: 'RADION FM',
    iconUrl: 'https://www.radion.fm/favicon/apple-icon-60x60.png',
    appUrl: 'https://www.radion.fm'
  })

  let connected = false
  let radionTezos = null
  let totalBalance = 0
  let pkh = null
  tezos.setWalletProvider(wallet)

  const legalName = '<?= $slname ?>'

  radionWallet.events.on('connect', async function (tezos) {
    $('#modal_basic').modal('hide')
    radionTezos = tezos
    connected = true
    pkh = await tezos.signer.publicKeyHash()
    totalBalance = await tezos.tz.getBalance(pkh)

    const userAddress = $('#user-address').text()
    const balance = totalBalance / 1000000
    const usdBalance = (balance * parseFloat(window.priceUsd)).toFixed(2)
    const radioBalanceURL = 'https://api.better-call.dev/v1/account/florencenet/' + pkh + '/token_balances?contract=KT1XLDJzzgSAb6HMXAKoFTxEQ3zMA7HGgU91'
    const radio = await $.getJSON(radioBalanceURL)
    const radioBal = radio.balances[0]
    const radioBalance = typeof radioBal !== 'undefined' ? parseInt(radioBal.balance) / (10 ** radioBal.decimals) : 0

    new QRCode($('.address-qrcode')[0], pkh)
    $('.source-address').text(pkh)
    $('.xtz-balance').text(balance)
    $('.usd-balance').text(usdBalance)
    $('.radio-balance').text(radioBalance + ' RADIO')
    $('.connect-wallet-text-connect').hide()
    $('.connect-wallet-text-connected').show()
    $('.connect-wallet-text-connected-radion').show()

    if (userAddress !== pkh) {
      $('#wallet-radioff').show()
      $('#wallet-radion').hide()
    } else {
      $('#wallet-radioff').hide()
      $('#wallet-radion').show()
    }
  })

  radionWallet.events.on('disconnect', function () {
    radionTezos = null
    connected = false
    $('.address-qrcode').empty()
    $('.source-address').empty()
    $('.xtz-balance').text('0')
    $('.usd-balance').text('0')
    $('.radio-balance').text('0 RADIO')
    $('#wallet-radioff').show()
    $('#wallet-radion').hide()
    $('.connect-wallet-text-connect').show()
    $('.connect-wallet-text-connected').hide()
    $('.connect-wallet-text-connected-radion').hide()
  })

  $('[name="send-add-fee"]').on('change', async function (event) {
    const value = $(this).val()
    const baseFeeValue = $('.send-base-fee').text()
    const allocationFeeValue = $('.send-allocation-fee').text() || '0'
    const additionalFee = parseInt(value) / 1000000
    const baseFee = parseFloat(baseFeeValue)
    const allocationFee = parseFloat(allocationFeeValue)
    $('.send-total-fee').text(baseFee + additionalFee + allocationFee)
  })

  $('#send-25').click(function (event) {
    const amount = Math.floor(totalBalance * 0.25) / 1000000
    $('#send-amount').val(amount)
  })

  $('#send-50').click(function (event) {
    const amount = Math.floor(totalBalance * 0.5) / 1000000
    $('#send-amount').val(amount)
  })

  $('#send-75').click(function (event) {
    const amount = Math.floor(totalBalance * 0.75) / 1000000
    $('#send-amount').val(amount)
  })

  $('#send-99').click(function (event) {
    const amount = Math.floor(totalBalance * 0.99) / 1000000
    $('#send-amount').val(amount)
  })

  $('#send-form').submit(async function (event) {
    event.preventDefault()

    $('#send-submit').attr('disabled', true)
    try {
      if (radionTezos === null) {
        $('#modal_basic').modal('show')
        $('#sidebar-toggler').click()
        throw new Error('Please connect through RADION wallet first to send')
      }

      const receiver = $('#send-receiver').val()
      const amount = $('#send-amount').val()
      if (receiver.length !== 36 || radionTezos === null) throw new Error('Invalid address')
      $('.send-allocation-fee-container').hide()
      $('#send-confirm-receiver').text(receiver)
      $('#send-confirm-amount').text(amount)

      $('#estimate-spinner').css('display', 'block')
      const estimate = await radionTezos.estimate.transfer({
        to: receiver,
        mutez: true,
        amount: 1
      })

      const additionalFee = parseInt($('[name="send-add-fee"]').val())
      const baseFee = estimate.usingBaseFeeMutez
      const allocationFee = estimate.burnFeeMutez
      $('.send-base-fee').text(baseFee / 1000000)
      $('.send-total-fee').text((baseFee + additionalFee + allocationFee) / 1000000)

      if (allocationFee > 0) {
        $('.send-allocation-fee-container').show()
        $('.send-allocation-fee').text(allocationFee / 1000000)
      }

      $('#estimate-spinner').hide()
      $('#send-form').hide()
      $('#send-fees').show()
    } catch (error) {
      noty({
        text: error.message,
        layout: 'topRight',
        type: 'error',
        timeout: 5000
      })
    }

    $('#send-submit').attr('disabled', null)
  })

  $('#send-decline').click(async function (event) {
    event.preventDefault()
    $('#send-confirm-receiver').empty()
    $('#send-confirm-amount').empty()
    $('#send-fees').hide()
    $('#send-form').show()
  })

  $('#send-confirm').click(async function (event) {
    event.preventDefault()

    $('#send-confirm').attr('disabled', true)
    $('#send-decline').attr('disabled', true)

    try {
      const address = $('#send-confirm-receiver').text()
      const amountValue = $('#send-confirm-amount').text()
      const baseFeeValue = $('.send-base-fee').text()
      const additionalFeeValue = $('[name="send-add-fee"]').val()
      const baseFee = parseFloat(baseFeeValue) * 1000000
      const additionalFee = parseInt(additionalFeeValue)
      const amount = parseFloat(amountValue) * 1000000
      const fee = baseFee + additionalFee

      const op = await radionTezos.contract.transfer({
        to: address,
        mutez: true,
        amount: amount,
        fee: fee
      })

      const hash = op.hash
      noty({
        text: '<i class="fas fa-compact-disc fa-lg fa-spin"></i> Transaction Request Sent. Confirming...<br>Please wait for confirmation! Do not refresh browser.<br><br><strong>Operation Hash:</strong><br> ' + hash.substr(0, 40) + '...',
        layout: 'topRight',
        type: 'information'
      })

      const confirmed = await op.confirmation(1)
      if (confirmed) {
        const sweetAlert = await Swal.fire({
          icon: 'success',
          title: 'SUCCESS',
          width: 450,
          html: '<br><p align="left" style="padding-left:10px;">WE HAVE CONFIRMATION!</p><hr><p align="left" style="padding-left:10px;"><strong>Transaction ID/Hash:</strong></p><p align="left" style="font-size:13px;padding-left:10px;">' + hash + '</p>',
          confirmButtonText: '<i class="fas fa-external-link-alt"></i> View in TzStats',
          showCancelButton: true,
          cancelButtonText: "<i class='fas fa-thumbs-up'></i> Thanks"
        })

        if (sweetAlert.value) {
          const url = 'https://tzstats.com/' + hash
          window.open(url)
        }
      } else {
        throw new Error('Unable to confirm operation')
      }

      $('#send-decline').click()
    } catch (error) {
      noty({
        text: error.message,
        layout: 'topRight',
        type: 'error',
        timeout: 5000
      })
    }

    $('#send-confirm').attr('disabled', true)
    $('#send-decline').attr('disabled', true)
  })

  $('.connect-wallet').click(async function (event) {
    event.preventDefault()

    if (connected) {
      await wallet.clearActiveAccount()
      $('.rw-manage-remove').click()
      $('.address-qrcode').empty()
      $('.source-address').empty()
      $('.xtz-balance').text('0')
      $('.usd-balance').text('0')
      $('.radio-balance').text('0 RADIO')
      $('#wallet-radioff').show()
      $('#wallet-radion').hide()
      $('.connect-wallet-text-connect').show()
      $('.connect-wallet-text-connected').hide()
      $('.connect-wallet-text-connected-radion').hide()
      connected = false
      return
    }

    const network = { type: NetworkType.MAINNET, rpcUrl: rpc }
    await wallet.requestPermissions({ network })

    const userAddress = $('#user-address').text()
    const walletAddress = await wallet.getPKH()
    const balanceMutez = await tezos.tz.getBalance(walletAddress)
    const balance = balanceMutez / 1000000
    const usdBalance = (balance * parseFloat(window.priceUsd)).toFixed(2)
    const radioBalanceURL = 'https://api.better-call.dev/v1/account/florencenet/' + walletAddress + '/token_balances?contract=KT1XLDJzzgSAb6HMXAKoFTxEQ3zMA7HGgU91'
    const radio = await $.getJSON(radioBalanceURL)
    const radioBal = radio.balances[0]
    const radioBalance = typeof radioBal !== 'undefined' ? parseInt(radioBal.balance) / (10 ** radioBal.decimals) : 0
    connected = true

    $('.address-qrcode').empty()
    new QRCode($('.address-qrcode')[0], walletAddress)
    $('.source-address').text(walletAddress)
    $('.xtz-balance').text(balance)
    $('.usd-balance').text(usdBalance)
    $('.radio-balance').text(radioBalance + ' RADIO')
    $('.connect-wallet-text-connect').hide()
    $('.connect-wallet-text-connected').show()
    $('.connect-wallet-text-connected-radion').hide()

    if (userAddress !== walletAddress) {
      $('#wallet-radioff').show()
      $('#wallet-radion').hide()
    } else {
      $('#wallet-radioff').hide()
      $('#wallet-radion').show()
    }
  })

  $('#signature-switch').on('change', function (event) {
    const value = $(this).is(':checked')
    if (value) {
      $('#modal_signature').modal('show')
      $(this).prop('checked', false)
    }
  })

  $('#update-preview').click(function (event) {
    const selectedIndex = $('#signature-font').prop('selectedIndex')
    const nFonts = $('#signature-font').children().length
    const nextIndex = selectedIndex + 1 === nFonts ? 0 : (selectedIndex + 1)
    $('#signature-font').prop('selectedIndex', nextIndex)

    const name = $('#signature-font').val()
    const fontName = encodeURIComponent(name)
    const username = encodeURIComponent(legalName)
    $('#signature-preview').attr('src', `/pdf-signature.php?text=${username}&font=${fontName}`)
  })

  $('#confirm-lock').on('change', function (event) {
    const value = $(this).is(':checked')
    if (value) $('#confirm-signature-btn').attr('disabled', null)
    else $('#confirm-signature-btn').attr('disabled', true)
  })

  $('#form-signature').submit(function (event) {
    event.preventDefault()

    const action = $(this).attr('action')
    const method = $(this).attr('method')
    const name = $('#signature-font').val()

    $('#confirm-lock').attr('disabled', true)
    $.ajax(action, {
      method: method,
      dataType: 'text',
      data: { font: name },
      success: function (data, xhr, status) {
        $('#modal_signature').modal('hide')
        window.location.reload()
      },
      error: function (xhr, status, error) {
        noty({
          text: 'Error occured',
          layout: 'topRight',
          type: 'error',
          timeout: 5000
        })
      }
    })
  })

  function confirmDialog (message) {
    return new Promise((resolve, reject) => {
      $('#modal_confirm').modal('show')
      $('#modal_confirm').find('.confirm-message').html(message)
      $('#modal_confirm .confirm-btn').off('click').on('click', function (event) {
        event.preventDefault()
        resolve(true)
      })

      $('#modal_confirm .cancel-btn').off('click').on('click', function (event) {
        event.preventDefault()
        resolve(false)
      })
    })
  }
  </script>
</body>
</html>
