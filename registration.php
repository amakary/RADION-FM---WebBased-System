<?php

$codes_json = file_get_contents(__DIR__ . '/php/country_codes.json');
$codes = json_decode($codes_json, true);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  define('E_MSG_COUNTRY_CODE', 'Invalid country code');

  $valid_codes = [];
  foreach ($codes as $code => $country) $valid_codes[] = $code;

  if (!in_array($_POST['custom1'], $valid_codes)) {
    header('Content-Type: application/json');
    die(json_encode(array(
      'success' => false,
      'message' => E_MSG_COUNTRY_CODE,
      'redirect' => ''
    )));
  }
}

require_once 'slpw/sitelokregister.php';
require_once 'slpw/slregisterform.php';

?>
<!DOCTYPE html>
<html lang="en" class="body-full-height">
<head>
  <!-- META SECTION -->
  <title>Sign Up</title>
  <meta charset="utf-8">
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
  <link rel="icon" href="favicon.ico" type="image/x-icon">
  <link rel="icon" type="image/png" sizes="192x192"  href="favicon/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="favicon/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
  <link rel="manifest" href="favicon/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="favicon/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">

  <!-- CSS INCLUDE -->
  <link rel="stylesheet" type="text/css" id="theme" href="css/theme-dark.css">

  <!-- JS INCLUDE -->
  <script src="/js/all.js" defer></script>
  <script src="/js/plugins/jquery/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/gh/cryptonomic/conseiljs/dist-web/conseiljs.min.js"></script>
  <script src="https://cdn.jsdelivr.net/gh/cryptonomic/conseiljs-softsigner/dist-web/conseiljs-softsigner.min.js"></script>
</head>

<body>
  <div class="registration-container registration-extended">
    <div class="registration-box animated fadeInDown">
      <div align="center" style="padding-bottom:10px; margin-top:-50px;">
        <img src="img/logo@2x.png">
      </div>

      <div class="registration-body">
        <div class="row">
          <div class="col-md-6">
            <div align="center"><h1 style="color:#fff;">REGISTRATION</h1></div>
            <div class="registration-subtitle" align="justify" style="border-bottom: 1px dashed #F39C12; padding-bottom:15px;">Welcome to RADION FM! This process may take a few minutes. Your personal information is required in order to be recognized for your talent.</div>

            <div id="slform_1" style="padding-bottom:0px;">
              <form id="form-register" action="" method="post">
                <input type="hidden" name="slajaxform" value="0">
                <input type="hidden" name="g-recaptcha-response" value="">

                <?php if (function_exists('registeruser')) registeruser("RADIONER","0","/thanks.php","newuser.htm","newuseradmin.htm","Yes","YYYYYNNNNYNNNYNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN","1"); ?>

                <h4 style="color:#F39C12;">Personal Info</h4>
                <div id="slfielddiv_1_0" class="sltextfield_1">
                  <input type="text" class="form-control" name="regname" id="slfieldinput_1_0" autocorrect="off" autocapitalize="off" spellcheck="off" autocomplete="off" maxlength="100" value="<?php echo $regname; ?>" placeholder="Full Name">
                  <div id="slmsg_1_0" class ="slmsg_1" aria-live="polite" style="color:#C0392B;"></div>
                </div><br>

                <div id="slfielddiv_1_1" class="sltextfield_1">
                  <input type="email" class="form-control" name="regemail" id="slfieldinput_1_1" autocorrect="off" autocapitalize="off" spellcheck="off" autocomplete="off" maxlength="100" value="<?php echo $regemail; ?>" placeholder="Email">
                  <div id="slmsg_1_1" class ="slmsg_1" aria-live="polite" style="color:#C0392B;"></div>
                </div><br>

                <div id="slfielddiv_1_2" class="sltextfield_1">
                  <input type="text" class="form-control" name="regusername" id="slfieldinput_1_2" autocorrect="off" autocapitalize="off" spellcheck="off" autocomplete="off" maxlength="100" value="<?php echo $regusername; ?>" placeholder="Username">
                  <div id="slmsg_1_2" class ="slmsg_1" aria-live="polite" style="color:#C0392B;"></div>
                </div><br>

                <div id="slfielddiv_1_3" class="sltextfield_1">
                  <input type="password" class="form-control" name="regpassword" id="slfieldinput_1_3" autocorrect="off" autocapitalize="off" spellcheck="off" autocomplete="off" placeholder="Password">
                  <div id="slmsg_1_3" class ="slmsg_1" aria-live="polite" style="color:#C0392B;"></div>
                </div><br>

                <div class="row">
                  <div class="col-md-6" style="margin-left:-10px;">
                    <div id="slfielddiv_1_4" class="sltextfield_1">
                      <div class="registration-subtitle" style="color:#7B7D7D;"><small>Country Code <a href="#" title="ISO-3166-1: Alpha-2"><i class="far fa-exclamation-circle"></i></a></small></div>
                      <select name="custom1" id="slfieldinput_1_4" class="form-control">
                        <option value="None" selected style="background-color:#555;">Select your country</option>
                        <?php
                        foreach ($codes as $code => $country) { ?>
                        <option value="<?= $code ?>"><?= $country ?></option>
                        <?php } ?>
                      </select>
                      <div id="slmsg_1_4" class ="slmsg_1" aria-live="polite" style="color:#555;"></div>
                    </div>
                  </div>

                  <div class="col-md-6" style="padding:0px; right:0; position:absolute; margin-right:10px;">
                    <div id="slfielddiv_1_5" class="slselectfield_1">
                      <div class="registration-subtitle" style="color:#7B7D7D;"><small>- Select one option - You are?</small></div>
                      <select name="custom10" class="form-control" id="slfieldinput_1_5">
                        <option value="">Select One</option>
                        <option style="background-color:#555;" value="Crypto Enthusiast" <?php if ($custom10=="Crypto Enthusiast") echo "selected=selected"; ?>>Crypto Enthusiast</option>
                        <option style="background-color:#555;" value="Crypto Investor" <?php if ($custom10=="Crypto Investor") echo "selected=selected"; ?>>Crypto Investor</option>
                        <option style="background-color:#555;" value="Music Lover" <?php if ($custom10=="Music Lover") echo "selected=selected"; ?>>Music Lover</option>
                        <option style="background-color:#555;" value="Musician" <?php if ($custom10=="Musician") echo "selected=selected"; ?>>Musician</option>
                        <option style="background-color:#555;" value="Music Producer" <?php if ($custom10=="Music Producer") echo "selected=selected"; ?>>Music Producer</option>
                        <option style="background-color:#555;" value="Artist Manager" <?php if ($custom10=="Artist Manager") echo "selected=selected"; ?>>Artist Manager</option>
                        <option style="background-color:#555;" value="Audio Engineer" <?php if ($custom10=="Audio Engineer") echo "selected=selected"; ?>>Audio Engineer</option>
                        <option style="background-color:#555;" value="Indie Label" <?php if ($custom10=="Indie Label") echo "selected=selected"; ?>>Indie Label</option>
                        <option style="background-color:#555;" value="Music Publisher" <?php if ($custom10=="Music Publisher") echo "selected=selected"; ?>>Music Publisher</option>
                        <option style="background-color:#555;" value="DJ" <?php if ($custom10=="DJ") echo "selected=selected"; ?>>DJ</option>
                        <option style="background-color:#555;" value="Podcaster" <?php if ($custom10=="Podcaster") echo "selected=selected"; ?>>Podcaster</option>
                        <option style="background-color:#555;" value="YouTuber" <?php if ($custom10=="YouTuber") echo "selected=selected"; ?>>YouTuber</option>
                        <option style="background-color:#555;" value="Tezos Supporter" <?php if ($custom10=="Tezos Supporter") echo "selected=selected"; ?>>Tezos Supporter</option>
                        <option style="background-color:#555;" value="RADIONER" <?php if ($custom10=="RADIONER") echo "selected=selected"; ?>>RADIONER</option>
                        <option style="background-color:#555;" value="None of the above" <?php if ($custom10=="None of the above") echo "selected=selected"; ?>>None of the above</option>
                      </select>
                      <div id="slmsg_1_5" class ="slmsg_1" aria-live="polite"></div>
                    </div>
                  </div>
                </div><br>

                <div id="slfielddiv_1_6" class="sltextfield_1">
                  <input type="text" class="form-control" name="custom6" id="slfieldinput_1_6" placeholder="tz1" maxlength="255" value="<?php echo $custom6; ?>" readonly>
                  <div id="slmsg_1_6" class ="slmsg_1" aria-live="polite" style="color:#C0392B;"></div>
                </div><br>

                <div class="sltextfield_1" id="slfakenamediv_1">
                  <label for="slfakename_1">There is no need to fill in this field</label>
                  <input type="text" class="slinput" name="fakename" id="slfakename_1" placeholder="fakename" autocomplete="off">
                </div>

                <div id="slformmsg_1" class="slformmsg_1" aria-live="polite" style="color:#C0392B;"><?php if ($registermsg!="") echo $registermsg; ?></div>
                <button type="button" id="wallet-btn" class="button btn" disabled><i class="fad fa-arrow-alt-to-right"></i> Continue</button><br>
              </form>
            </div>
          </div>

          <div class="col-md-6 wallet-side">
            <div class="registration-title" style="color:#7B7D7D;"><i class="far fa-plus-circle"></i> <strong>Crypto Wallet</strong> for Tezos Blockchain.</div>
            <div class="registration-subtitle" style="border-bottom: 1px dashed; color:#7B7D7D; padding-bottom:15px;" align="justify">In order to use RADION features you need a cryptocurrency wallet for Tezos blockchain. If you don't have one, do not worry we can assist you with that.</div>

            <div class="form-horizontal">
              <div class="user-wallet" style="display: none;">

                <h4 style="color:#F39C12;">Personal wallet</h4>
                <p align="justify" class="registration-subtitle">If you are new in crypto space and you are not sure what a crypto wallet is, we recommend you to create a new wallet in order to get familiar with the basics! This part of the process is important because without it you are limited to use many features that RADION offers, including; earning, downloads, NFT among others.</p>

				<p align="justify" class="registration-subtitle">Now, if you are confused or not sure about this and you need to put things in perspective, (no problem) we recommend you to watch this video! <a href="https://www.youtube.com/watch?v=9rMDgFsA7wo" target='blank' rel='nofollow'>Click Here</a>.</p>
				<br>
				<button type="button" class="create-wallet btn btn-deafult btn-block"><i class="fad fa-wallet fa-lg"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CREATE WALLET</button>
                <button type="button" class="import-wallet btn btn-primary btn-block"><i class="far fa-wallet fa-lg"></i>&nbsp;&nbsp;CONNECT WALLET</button><br>
                <p align="justify" class="registration-subtitle"><strong>Note</strong>: We use a third party SDK to interact with Tezos blockchain!</p>
              </div>

              <form id="create-wallet-form" action="#" method="get">
                <div class="create-wallet-form-words" style="display:none;">
                  <h4>Great, let's create your wallet!</h4>
                  <div align="right" style="padding-bottom:15px; margin-top:-25px;"><a href="#" style="color:#F39C12; text-decoration: none;">Help <i class="far fa-info-circle"></i></a></div>
                  <p class="registration-subtitle" align="justify">If you are new in crypto space, it is more than likely that you are not familiar with some terms, for instance; "Seed Words". Seed words are the master key of your wallet. Make sure you write this down, and keep it in a safe place. You will need it to have access and manage your wallet.</p>
                  <div align="center">
                    <h4>--- YOUR SEED WORDS ---</h4>
                  </div>

                  <span class="create-wallet-words" style="color:#2E86C1;"></span><hr>
                  <button type="button" class="create-wallet-words-proceed button btn btn-default"><i class="fad fa-arrow-alt-to-right"></i> Next</button>
                </div>

                <div class="create-wallet-verify" style="display:none;">
                  <h4>Let's verify your seed words!</h4>
                  <p class="registration-subtitle" align="justify">Keep in mind that is not just about having the seed words, but also you have to keep the order in which they were given to you. Fill in the word to verify your seed backup!<br><br>Type the missing word! <span style="padding-left:10px; padding-right:10px;">-</span> <span class="create-wallet-verify-steps" style="color:#F39C12;">0/6</span></p>
                  <span class="create-wallet-verify-before col-md-3" style="color:#2E86C1; margin-top:10px;"></span>
                  <span class="col-md-6"><input type="text" class="create-wallet-verify-between form-control"></span>
                  <span class="create-wallet-verify-after col-md-3" style="color:#2E86C1; margin-top:10px;"></span>
                </div><br><br>

                <div class="create-wallet-complete" style="display:none;">
                  <div align="center"><br>
                    <div style="color:#fff;" align="left">Are you a Human?</div><br>
                    <div class="g-recaptcha" data-callback="recaptcha" data-sitekey="6Lc_iEwUAAAAAIdL2wIXu9hZxvfpJjQiJ_OnUL90" data-theme="dark" data-size="normal"></div>
                  </div><br>

                  <div align="center">
                    <button id="myButton_1" class="button btn btn-success btn-block" type="button"><i class="fad fa-check-circle"></i> Sign Up</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>

        <div style="height:30px; width:30px; position:relative; left:95%;">
          <svg xmlns="http://www.w3.org/2000/svg" width="47" height="64" viewBox="0 0 47 64">
            <path style="fill:#737577;" d="M30.252 63.441c-4.55 0-7.864-1.089-9.946-3.267-2.08-2.177-3.121-4.525-3.121-7.041 0-.92.181-1.694.544-2.323a3.993 3.993
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
          </svg>
        </div>
      </div>

      <div class="registration-footer">
        <div class="pull-left">&copy; 2021 RADION FM</div>
        <div class="pull-right">

          <a href="https://www.radion.fm/privacy-policy.php">Privacy Policy</a> |
          <a href="https://www.radion.fm/terms-of-use.php">Terms of Use</a>
        </div>
      </div>
    </div>
  </div>

  <style>
    #slfakenamediv_1 {
      opacity: 0;
      position: absolute;
      top: 0;
      left: 0;
      height: 0;
      width: 0;
      padding: 0;
      margin: 0;
      z-index: -1;
      margin-bottom: 20px;
    }
  </style>

  <script src="https://unpkg.com/@airgap/beacon-sdk@2.3.1/dist/walletbeacon.min.js"></script>
  <script>
  const { DAppClient } = beacon
  const { KeyStoreUtils } = conseiljssoftsigner

  function recaptcha (token) {
    $('input[name="g-recaptcha-response"]').val(token)
  }

  const client = new DAppClient({
    name: 'RADION FM',
    iconUrl: 'https://www.radion.fm/favicon/apple-icon-60x60.png',
    appUrl: 'https://www.radion.fm'
  })

  $(document).ready(function () {
    let activated = false
    let mnemonic = null
    let pkh = null

    $('#wallet-btn').hover(function () {
      $('.wallet-side > .registration-title, .wallet-side > .registration-subtitle').css('color', '#ddd')
    }, function () {
      if (activated) return
      $('.wallet-side > .registration-title, .wallet-side > .registration-subtitle').css('color', '#7B7D7D')
    })

    $('#wallet-btn').click(function () {
      activated = true
      $('.wallet-side > .registration-title, .wallet-side > .registration-subtitle').css('color', '#ddd')
      $('.user-wallet').show()
      $(this).hide()
    })

    const formInputs = [
      '#slfieldinput_1_0',
      '#slfieldinput_1_1',
      '#slfieldinput_1_2',
      '#slfieldinput_1_3',
      '#slfieldinput_1_4',
      '#slfieldinput_1_5'
    ]

    $(formInputs.join()).on('input', function () {
      let empty = false
      for (let i = 0; i < formInputs.length; i++) {
        const input = $(formInputs[i])
        if (input.val() === '') {
          empty = true
          break
        }
      }

      const button = $('#wallet-btn')
      if (empty && button.attr('disabled') !== null) button.attr('disabled', true)
      else if (!empty) button.attr('disabled', null)
    })

    $('[name="custom1"]').on('input', function () {
      const value = $(this).val()
      $(this).val(value.toUpperCase())
    })

    $('#form-register').submit(function (event) {
      const form = $(this)
      const result = slvalidateform_1(form[0])
      if (!result) event.preventDefault()
    })

    $('.create-wallet').click(async function () {
      $('.user-wallet,.import-wallet').hide()
      mnemonic = KeyStoreUtils.generateMnemonic().split(' ')
      const keystore = await KeyStoreUtils.restoreIdentityFromMnemonic(mnemonic.join(' '), '')
      pkh = keystore.publicKeyHash
      $('.create-wallet-form-words').show()
      $('.create-wallet-words').text(mnemonic.join(' '))
    })

    $('.create-wallet-words-proceed').click(function () {
      $('.create-wallet-form-words').hide()
      $('.create-wallet-verify').show()
      nextStep()
    })

    const totalSteps = 6
    let currentStep = 0
    let word = null

    function nextStep () {
      if (currentStep < totalSteps) {
        const random = Math.floor(Math.random() * mnemonic.length)
        const before = mnemonic[random - 1] || ''
        const after = mnemonic[random + 1] || ''
        word = mnemonic[random]

        $('.create-wallet-verify-before').text(before)
        $('.create-wallet-verify-after').text(after)
      }
    }

    $('.create-wallet-verify-between').on('input', function () {
      const value = $(this).val()
      if (value === word) {
        currentStep++
        $(this).val('')
        $('.create-wallet-verify-steps').text(currentStep + '/' + totalSteps)

        if (currentStep === totalSteps) {
          $('.create-wallet-verify').hide()
          $('.create-wallet-complete').show()
          $('#slfieldinput_1_6').val(pkh)
        } else nextStep()
      }
    })

    $('.import-wallet').click(async function () {
      await client.requestPermissions()
      const account = await client.getActiveAccount()
      $('#slfieldinput_1_6').val(account.address)
      $('.create-wallet-complete').show()
      $('#myButton_1').attr('disabled', null)
      $('.user-wallet,.import-wallet').hide()
    })

    $('#myButton_1').click(function () {
      $('#form-register').submit()
    })
  })
  </script>

<!-- Oclasus Script -->
<script type="text/javascript">
function slvalidateform_1(form)
{
  var errorfound=false;
  document.getElementById('slformmsg_1').innerHTML='';
  //document.getElementById('slformmsg_1').style['display']="none";

  // Clear name message
  var obj=document.getElementById('slmsg_1_0');
  if (obj!==null)
    obj.innerHTML='';
  obj=document.getElementById('slmsg_1_0');
  if (obj!==null)
    obj.style['display']="none";
  // Validate name
  var value=document.getElementById('slfieldinput_1_0').value;
  value=sltrim_1(value);
  if (value=='')
  {
    document.getElementById('slmsg_1_0').innerHTML='Please enter your full name';
    document.getElementById('slmsg_1_0').style['display']="block";
    if (!errorfound)
      document.getElementById('slfieldinput_1_0').focus();
    errorfound=true;
  }


  // Clear email message
  var obj=document.getElementById('slmsg_1_1');
  if (obj!==null)
    obj.innerHTML='';
  obj=document.getElementById('slmsg_1_1');
  if (obj!==null)
    obj.style['display']="none";

  // Validate email
  var email=document.getElementById('slfieldinput_1_1').value;
  email=sltrim_1(email);
  if ((email=='') || (!slvalidateemail_1(email)))
  {
    document.getElementById('slmsg_1_1').innerHTML='Please enter your email';
    document.getElementById('slmsg_1_1').style['display']="block";
    if (!errorfound)
      document.getElementById('slfieldinput_1_1').focus();
    errorfound=true;
  }

  // Clear username message
  var obj=document.getElementById('slmsg_1_2');
  if (obj!==null)
    obj.innerHTML='';
  obj=document.getElementById('slmsg_1_2');
  if (obj!==null)
    obj.style['display']="none";
  // Validate username
  var value=document.getElementById('slfieldinput_1_2').value;
  value=sltrim_1(value);
  if (value=='')
  {
    document.getElementById('slmsg_1_2').innerHTML='This field is required';
    document.getElementById('slmsg_1_2').style['display']="block";
    if (!errorfound)
      document.getElementById('slfieldinput_1_2').focus();
    errorfound=true;
  }


  // Clear password message
  var obj=document.getElementById('slmsg_1_3');
  if (obj!==null)
    obj.innerHTML='';
  obj=document.getElementById('slmsg_1_3');
  if (obj!==null)
    obj.style['display']="none";

  // Validate password
  var password=document.getElementById('slfieldinput_1_3').value;
  password=sltrim_1(password);
  if (password=='')
  {
    document.getElementById('slmsg_1_3').innerHTML='This field is required';
    document.getElementById('slmsg_1_3').style['display']="block";
    if (!errorfound)
      document.getElementById('slfieldinput_1_3').focus();
    errorfound=true;
  }

  // Clear custom1 message
  var obj=document.getElementById('slmsg_1_4');
  if (obj!==null)
    obj.innerHTML='';
  obj=document.getElementById('slmsg_1_4');
  if (obj!==null)
    obj.style['display']="none";
  // Validate custom1
  var value=document.getElementById('slfieldinput_1_4').value;
  value=sltrim_1(value);
  if (value=='')
  {
    document.getElementById('slmsg_1_4').innerHTML='This field is required';
    document.getElementById('slmsg_1_4').style['display']="block";
    if (!errorfound)
      document.getElementById('slfieldinput_1_4').focus();
    errorfound=true;
  }


  // Clear custom10 message
  var obj=document.getElementById('slmsg_1_5');
  if (obj!==null)
    obj.innerHTML='';
  obj=document.getElementById('slmsg_1_5');
  if (obj!==null)
    obj.style['display']="none";

  // Clear custom6 message
  var obj=document.getElementById('slmsg_1_6');
  if (obj!==null)
    obj.innerHTML='';
  obj=document.getElementById('slmsg_1_6');
  if (obj!==null)
    obj.style['display']="none";
  // Validate custom6
  var value=document.getElementById('slfieldinput_1_6').value;
  value=sltrim_1(value);
  if (value=='')
  {
    document.getElementById('slmsg_1_6').innerHTML='This field is required';
    document.getElementById('slmsg_1_6').style['display']="block";
    if (!errorfound)
      document.getElementById('slfieldinput_1_6').focus();
    errorfound=true;
  }


  // Clear captcha message
  // var obj=document.getElementById('slmsg_1_7');
  // if (obj!==null)
  //   obj.innerHTML='';
  // obj=document.getElementById('slmsg_1_7');
  // if (obj!==null)
  //   obj.style['display']="none";

  if (errorfound)
  {
    document.getElementById('slformmsg_1').innerHTML='Please correct the errors above';
    //document.getElementById('slformmsg_1').style['display']="block" ;
    return(false);
  }  document.getElementById('slformmsg_1').innerHTML='';
  //document.getElementById('slformmsg_1').style['display']="none";
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
        document.getElementById('myButton_1').disabled=false;
        // document.getElementById('slspinner_1').style['display']="none";
        var data = JSON.parse(xhr.responseText);
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
          document.getElementById('slformmsg_1').innerHTML=data.message;
          //document.getElementById('slformmsg_1').style['display']="block"
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
    document.getElementById('myButton_1').disabled=true;
    // document.getElementById('slspinner_1').style['display']="block";
    xhr.open("POST", slfrmact, true);
    if (!slformdataavailable)
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send(formData);
    return(false);
  }
  return(true);
}

function slvalidateemail_1(email)
{
  var ck_email = /^([\w-\'!#$%&\*]+(?:\.[\w-\'!#$%&\*]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,20}(?:\.[a-z]{2})?)$/i;
  if (!ck_email.test(email))
    return(false);
  return(true);
}

function slvalidinteger_1(value,min,max)
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

function slvalidfloat_1(value,min,max,decimals)
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

function slcountwords_1(s)
{
    if (s.trim()=='')
      return(0);
    s = s.replace(/(^\s*)|(\s*$)/gi,"");
    s = s.replace(/[ ]{2,}/gi," ");
    s = s.replace(/\n /,"\n");
    return s.split(' ').length;
}

function slvalidatedate_1(fval,min,max,dtfmt)
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
        var retval=slpadinteger_1(dd,2)+spchar1+slpadinteger_1(mm,2)+spchar2+slpadinteger_1(yy,4);
      break;
      case 'mmddyyyy':
        var dd=parseInt(fval.substring(2,4));
        var mm=parseInt(fval.substring(0,2));
        var yy=parseInt(fval.substring(4));
        var retval=slpadinteger_1(mm,2)+spchar1+slpadinteger_1(dd,2)+spchar2+slpadinteger_1(yy,4);
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
        var retval=slpadinteger_1(dd,2)+spchar1+slpadinteger_1(mm,2)+spchar2+slpadinteger_1(yy,4);
      break;
      case 'mmddyyyy':
        var dd=parseInt(dateparts[1]);
        var mm=parseInt(dateparts[0]);
        var yy=parseInt(dateparts[2]);
        var retval=slpadinteger_1(mm,2)+spchar1+slpadinteger_1(dd,2)+spchar2+slpadinteger_1(yy,4);
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

function slvalidatetime_1(fval,min,max,tmfmt)
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
    fval24=sl12to24_1(fval);
  }
  if (min!='')
  {
    if (tmfmt!='24')
      min24=sl12to24_1(min);
    enttm=new Date(1,1,1,parseInt(fval24.substring(0,2)),parseInt(fval24.substring(3,5)),0,0);
    mintm=new Date(1,1,1,parseInt(min24.substring(0,2)),parseInt(min24.substring(3,5)),0,0);
    if (enttm<mintm)
      return(false);
  }
  if (max!='')
  {
    if (tmfmt!='24')
      max24=sl12to24_1(max);
    enttm=new Date(1,1,1,parseInt(fval24.substring(0,2)),parseInt(fval24.substring(3,5)),0,0);
    maxtm=new Date(1,1,1,parseInt(max24.substring(0,2)),parseInt(max24.substring(3,5)),0,0);
    if (enttm>maxtm)
      return(false);
  }
  return(fval);
}

function sl12to24_1(fval)
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

function slvalidateurl_1(fval)
{
  fval=fval.toLowerCase();
  if ((fval.substring(0,7)!="http://") && (fval.substring(0,8)!="https://"))
    return(false);
  if (fval.indexOf('.')==-1)
    return(false);
  return(true);
}

function slmatchesregex_1(str,rgex)
{
  var matcher = new RegExp(rgex);
  if (!matcher.test(str))
    return(false);
  return(true);
}

function slpadinteger_1(num,size)
{
  var s = num+"";
    while (s.length < size) s = "0" + s;
  return s;
}

function slshowcharcount_1(fieldobj,showobj,min,max)
{
  var txt=document.getElementById(fieldobj).value;
  if (min==0)
  {
    if (txt.length>max)
      document.getElementById(showobj).innerHTML='<span class="counterror_1">'+(max-txt.length)+'</span>';
    else
      document.getElementById(showobj).innerHTML='<span>'+(max-txt.length)+'</span>';
  }
  else
  {
    if ((txt.length<min) || (txt.length>max))
      document.getElementById(showobj).innerHTML='<span class="counterror_1">'+txt.length+'/'+min+'-'+max+'</span>';
    else
      document.getElementById(showobj).innerHTML='<span>'+txt.length+'/'+min+'-'+max+'</span>';
  }
}

function slshowwordcount_1(fieldobj,showobj,min,max)
{
  var txt=document.getElementById(fieldobj).value;
  var txtlen=slcountwords_1(txt);
  if (min==0)
  {
    if (txtlen>max)
      document.getElementById(showobj).innerHTML='<span class="counterror_1">'+(max-txtlen)+'</span>';
    else
      document.getElementById(showobj).innerHTML='<span>'+(max-txtlen)+'</span>';
  }
  else
  {
    if ((txtlen<min) || (txtlen>max))
      document.getElementById(showobj).innerHTML='<span class="counterror_1">'+txtlen+'/'+min+'-'+max+'</span>';
    else
      document.getElementById(showobj).innerHTML='<span>'+txtlen+'/'+min+'-'+max+'</span>';
  }
}

function sltrim_1(x)
{
    return x.replace(/^\s+|\s+$/gm,'');
}

function slseeifchecked_1(name,idprefix)
{
  var checked=false
  var controls=document.getElementsByName(name)
  for (i=0;i<controls.length;i++)
  {
    // if not from this form then ignore
    if (controls[i].id.indexOf(idprefix)==-1)
      continue
    if (controls[i].checked)
    {
      checked=true
      break
    }
  }
  // Also check for field[] if necessary
  if(!checked)
  {
    var controls=document.getElementsByName(name+'[]')
    for (i=0;i<controls.length;i++)
    {
      // if not from this form then ignore
      if (controls[i].id.indexOf(idprefix)==-1)
        continue
      if (controls[i].checked)
      {
        checked=true
        break
      }
    }
  }
  return(checked)
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
</body>
</html>
