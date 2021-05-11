<!DOCTYPE html>
<html lang="en">
<head>
  <!-- META SECTION -->
  <title>NFT Music Marketplace</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="icon" href="favicon.ico" type="image/x-icon">
  <!-- END META SECTION -->

  <!-- CSS INCLUDE -->
  <link rel="stylesheet" type="text/css" id="theme" href="css/theme-dark.css">
  <!-- EOF CSS INCLUDE -->

  <script src="https://cdn.lordicon.com//libs/frhvbuzj/lord-icon-2.0.2.js"></script>
</head>

<body>
  <!-- START PAGE CONTAINER -->
  <div class="page-container page-navigation-top">
    <!-- PAGE CONTENT -->
    <div class="page-content">
      <!-- START X-NAVIGATION VERTICAL -->
      <ul class="x-navigation x-navigation-horizontal">
        <li class="xn-logo">
          <a href="index.php">RADION</a>
          <a href="#" class="x-navigation-control"></a>
        </li>

        <!-- POWER OFF -->
        <li class="xn-icon-button pull-right last">
          <a href="#"><span class="fa fa-power-off"></span></a>
          <ul class="xn-drop-left animated zoomIn">
            <li><a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span> Sign Out</a></li>
          </ul>
        </li>
        <!-- END POWER OFF -->
      </ul>
      <!-- END X-NAVIGATION VERTICAL -->

      <!-- START BREADCRUMB -->
      <ul class="breadcrumb">
        <li><a href="#">NFT</a></li>
        <li><a href="#">MUSIC</a></li>
        <li class="active">MARKETPLACE</li>
      </ul>
      <!-- END BREADCRUMB -->

      <!-- PAGE TITLE -->
      <div class="page-title">
        <h2>
          <lord-icon src="https://cdn.lordicon.com//mmspidej.json" trigger="loop" delay="11000" colors="primary:#1B1E24,secondary:#F39C12" style="width:60px;height:60px"></lord-icon>
          <strong>MUSIC</strong>
        </h2>
      </div>
      <!-- END PAGE TITLE -->

      <!-- PAGE CONTENT WRAPPER -->
      <div class="page-content-wrap">
        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-body">
                <!-- NFT MARKETPLACE -->
                <div class="row" id="nfts"></div>
                <template id="temp-nft">
                  <div class="col-md-2">
                    <div class="panel panel-default">
                      <div class="panel-body panel-body-image">
                        <img class="nft-artwork" src="/img/NFT.jpg" width="205" height="205">
                        <a href="#" class="panel-body-inform">
                          <lord-icon src="https://cdn.lordicon.com//eqlquayh.json" trigger="hover" delay="0" colors="primary:#ffffff,secondary:#ffffff" stroke="100" style="width:28px;height:28px"></lord-icon>
                        </a>
                      </div>

                      <div class="panel-body">
                        <h3 align="center" class="nft-artist"></h3>
                        <p align="center" class="nft-title"></p>
                        <div>Issuer:<br><span class="nft-issuer-address" style="font-size:10px; color:#979A9A;"></span></div>
                        <div>STREAM: <span class="nft-id"></span></div>
                        <div>IPFS: WAV Format</div>
                      </div>

                      <div class="panel-footer text-muted" align="center">
                        <button class="btn btn-default btn-xs">BUY</button>
                      </div>
                    </div>
                  </div>
                </template>
                <!-- END NFT MARKETPLACE -->
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- PAGE CONTENT WRAPPER -->
    </div>
    <!-- END PAGE CONTENT -->
  </div>
  <!-- END PAGE CONTAINER -->

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
            <a href="pages-login.html" class="btn btn-success btn-lg">Yes</a>
            <button class="btn btn-default btn-lg mb-control-close">No</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- END MESSAGE BOX-->

  <!-- START PRELOADS -->
  <audio id="audio-alert" src="audio/alert.mp3" preload="auto"></audio>
  <audio id="audio-fail" src="audio/fail.mp3" preload="auto"></audio>
  <!-- END PRELOADS -->

  <!-- START SCRIPTS -->
  <!-- START PLUGINS -->
  <script src="/js/plugins/jquery/jquery.min.js"></script>
  <script src="/js/plugins/jquery/jquery-ui.min.js"></script>
  <script src="/js/plugins/bootstrap/bootstrap.min.js"></script>
  <!-- END PLUGINS -->

  <!-- THIS PAGE PLUGINS -->
  <script src="/js/plugins/icheck/icheck.min.js"></script>
  <script src="/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
  <!-- END PAGE PLUGINS -->

  <!-- START TEMPLATE -->
  <script src="js/plugins.js"></script>
  <script src="js/actions.js"></script>
  <!-- END TEMPLATE -->
  <!-- END SCRIPTS -->

  <script>
  let tokenTemplate = null
  $(document).ready(function () {
    tokenTemplate = $('#temp-nft').prop('content')
    $.getJSON('https://api.better-call.dev/v1/contract/mainnet/KT1MR8e46WJBq4RcFSogiDbSg3ceDRi81hpE/tokens', function (data) {
      displayTokens(data)
    })
  })

  async function displayTokens (data) {
    let counts = 0
    for (let i = 0; i < data.length && counts < 24; i++) {
      const elem = $(tokenTemplate).clone(true, true)
      const nft = data[i]
      const owner = await getCurrentOwner(nft.token_id)
      const id = nft.name !== 'Unknown' ? nft.name : nft.extras.asset_id
      const songName = nft.extras.song_name || (nft.extras.asset && nft.extras.asset.song_name)
      const title = songName ? songName.substr(0, 27) : songName
      const artist = nft.extras.artist || (nft.extras.asset && nft.extras.asset.artist)
      let metadata = null
      try { metadata = await getMetadata(id) } catch (error) {}

      if (metadata === null) continue
      $(elem).find('.nft-artwork').attr('src', metadata.artwork).removeClass('nft-artwork')
      $(elem).find('.nft-artist').text(artist).removeClass('nft-artist')
      $(elem).find('.nft-title').text(title).removeClass('nft-title')
      $(elem).find('.nft-issuer-address').text(owner).removeClass('nft-issuer-address')
      $(elem).find('.nft-id').text(id).removeClass('nft-id')
      $('#nfts').append(elem)
      counts++
    }
  }

  async function getCurrentOwner (tokenId) {
   return new Promise((resolve, reject) => {
     $.ajax('https://api.better-call.dev/v1/contract/mainnet/KT1MR8e46WJBq4RcFSogiDbSg3ceDRi81hpE/tokens/holders', {
       type: 'GET',
       dataType: 'json',
       data: { token_id: tokenId },
       success: function (data, status, xhr) {
         for (const address in data) {
           if (data[address] === '1') {
             resolve(address)
             break
           }
         }
       },
       error: function (xhr, status, error) {
         reject(error)
       }
     })
   })
  }

  async function getMetadata (id) {
    return new Promise((resolve, reject) => {
      $.ajax('/php/get_song_metadata.php', {
        type: 'GET',
        data: { id: id },
        dataType: 'json',
        success: function (data, status, xhr) {
          resolve(data)
        },
        error: function (xhr, status, error) {
          reject(error)
        }
      })
    })
  }
  </script>
</body>
</html>
