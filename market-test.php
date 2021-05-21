<!DOCTYPE html>
<html lang="en">
<head>
  <title>NFT Marketplace RADION FM</title>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="apple-touch-icon" sizes="57x57" href="/favicon/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="/favicon/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="/favicon/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="/favicon/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="/favicon/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="/favicon/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="/favicon/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="/favicon/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192" href="/favicon/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="/favicon/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
  <link rel="icon" type="image/x-icon" href="/favicon.ico">
  <link rel="manifest" href="/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="/favicon/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">

  <link rel="stylesheet" href="css/theme-dark.css" id="theme">
  <script src="https://cdn.lordicon.com//libs/frhvbuzj/lord-icon-2.0.2.js"></script>
  <script src="https://unpkg.com/ipfs@0.54.4/dist/index.min.js"></script>
  <script src="https://unpkg.com/@airgap/beacon-sdk@2.2.7/dist/walletbeacon.min.js"></script>
  <script>window.beaconSdk = beacon</script>
  <script src="https://unpkg.com/@taquito/taquito@9.0.1/dist/taquito.min.js"></script>
  <script src="https://unpkg.com/@taquito/beacon-wallet@9.0.1/dist/taquito-beacon-wallet.umd.js"></script>
  <script src="https://unpkg.com/mp3tag.js@3.1.1/dist/mp3tag.min.js"></script>
  <script src="https://unpkg.com/sweetalert2@9.10.12/dist/sweetalert2.all.min.js"></script>
</head>

<body>
  <!-- START PAGE CONTAINER -->
  <div class="page-container page-navigation-top page-navigation-top-custom">
    <!-- PAGE CONTENT -->
    <div class="page-content">
      <!-- START PAGE CONTENT HEADER -->
      <div class="page-content-header">
        <a href="index.php" class="logo"><img src="letsgo.png"></a>
        <div class="pull-right">
          <div class="socials">
            <a href="#"><span class="fa fa-facebook-square"></span></a>
            <a href="#"><span class="fa fa-twitter-square"></span></a>
          </div>

          <div class="contacts">
            <a href="#" id="connect-wallet">CONNECT WALLET</a>
            <a href="#" class="sidebar-toggle">MINT MUSIC</a>
          </div>
        </div>
      </div>
      <!-- END PAGE CONTENT HEADER -->

      <!-- START X-NAVIGATION VERTICAL -->
      <ul class="x-navigation x-navigation-horizontal">
        <li class="xn-navigation-control">
          <a href="#" class="x-navigation-control"></a>
        </li>

        <!-- SEARCH -->
        <li class="xn-search pull-right">
          <form role="form">
            <input type="text" name="search" placeholder="Search..."/>
          </form>
        </li>
        <!-- END SEARCH -->
      </ul>
      <!-- END X-NAVIGATION VERTICAL -->

      <!-- START BREADCRUMB -->
      <ul class="breadcrumb">
        <li><a href="#"></a></li>
        <li class="active">Current commission fee is 3.69% per sell.</li>
      </ul>
      <!-- END BREADCRUMB -->

      <!-- INFORMATION FOR MARKETPLACE -->
      <div class="row">
        <div class="col-md-2">
          <a href="#" class="tile tile-primary">
            $<span id="wallet-balance">0</span>
            <p>Balance</p>
            <div class="informer informer-primary dir-tr"><span class="fa fa-calendar"></span></div>
          </a>
        </div>

        <div class="col-md-2">
          <a href="#" class="tile tile-primary">
            $0
            <p>Total Marketcap</p>
            <div class="informer informer-primary dir-tr"><span class="fa fa-calendar"></span></div>
          </a>
        </div>

        <div class="col-md-2">
          <a href="#" class="tile tile-primary">
            $1
            <p>Stream Downloads</p>
            <div class="informer informer-primary dir-tr"><span class="fa fa-calendar"></span></div>
          </a>
        </div>

        <div class="col-md-2">
          <a href="#" class="tile tile-primary">
            $0
            <p>Sales</p>
            <div class="informer informer-primary dir-tr"><span class="fa fa-calendar"></span></div>
          </a>
        </div>

        <div class="col-md-2">
          <a href="#" class="tile tile-primary">
            <span id="editions-size">0</span>
            <p>ASSETS</p>
            <div class="informer informer-danger dir-tr"></div>
          </a>
        </div>

        <div class="col-md-2">
          <a href="#" class="tile tile-primary">
            $<span class="tezos-price-usd"></span>
            <p>Tezos</p>
            <div class="informer informer-default"></div>
          </a>
        </div>
      </div>
      <!-- END INFORMATION FOR MARKETPLACE -->

      <div class="page-title">
        <h2>NFT MUSIC ASSETS</h2>
      </div>

      <!-- PAGE CONTENT WRAPPER -->
      <div class="page-content-wrap" style="min-height: 439px;">
        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="row" id="nft-editions"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- PAGE CONTENT WRAPPER -->

      <template id="temp-edition">
        <div class="col-md-2">
          <div class="panel panel-default">
            <div class="panel-body panel-body-image">
              <img class="nft-artwork" src="/img/NFT.jpg" width="205" height="205">
              <a href="javascript:void(0)" class="panel-body-inform">
                <lord-icon src="https://cdn.lordicon.com//iiegcyhs.json" class="nft-play" trigger="click" target="a" stroke="70" colors="primary:#ffffff,secondary:#ffffff" style="width:42px;height:42px; margin-top:-7px; margin-left:-7px;"></lord-icon>
                <!-- <i class="fas fa-play nft-play"></i> -->
              </a>
            </div>

            <div class="panel-body">
              <h3 align="center" class="nft-artist"></h3>
              <p align="center" class="nft-title"></p>
              <div>Issuer:<br><span class="nft-issuer-address" style="font-size:10px; color:#979A9A;"></span></div>
              <div>IPFS: <span class="nft-format"></span> Format</div>
              <div>Price: <span class="nft-price"></span> <span>tz</span></div>
              <div>Editions Available: <span class="nft-editions-avail"></span></div>
            </div>

            <div class="panel-footer text-muted" align="center">
              <button class="btn btn-primary btn-block btn-sm nft-buy">BUY</button>
            </div>
          </div>
        </div>
      </template>
    </div>
    <!-- END PAGE CONTENT -->
  </div>
  <!-- END PAGE CONTAINER -->

  <!-- START SIDEBAR -->
  <div class="sidebar">
    <div class="sidebar-wrapper scroll">
      <div class="sidebar-tabs">
        <a href="#sidebar_1" class="sidebar-tab active"><span class="fa fa-comments"></span> NFT MUSIC</a>
        <a href="#sidebar_2" class="sidebar-tab"><span class="fa fa-cog"></span> TERMS AND LICENSING</a>
      </div>

      <div class="sidebar-tab-content active" id="sidebar_1">
        <p style="padding-right:20px; padding-left:20px;" align="justify"><small>Important Note:<br><br><span style="color:#B3B6B7;">This simpe form allow you to mint NFT music and sell them in our marketplace with the proper rights, however; this form is open to the public and it doesn't require a RADION account to use it. Be aware that potential buyers could pay attention to these details to make sure that if they buy a NFT, they are buying something legal and legit.<br><br> If you want to prove that you are the right holder of the song and be recognized by your talent and as an artist, we recommend you mint your NFT in our dashboard for more details.</small></span></p>
        <div class="content-frame-right">
          <div class="block push-up-10">
            <form action="upload.php" class="dropzone dropzone-mini" id="upload-dropzone"></form>
          </div>
          <form class="form-horizontal" role="form">
            <div class="form-group">
              <div class="col-md-12">
                <input type="text" placeholder="Artist Name" id="mint-artist" class="form-control">
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-8">
                <input type="text" placeholder="Song Name" id="mint-title" class="form-control">
              </div>
              <div class="col-md-4">
                <input type="text" placeholder="Genre" id="mint-genre" class="form-control">
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label">Sell</label>
              <div class="col-md-2">
                <label class="switch switch-small">
                  <input type="checkbox" id="mint-sell" value="0">
                  <span></span>
                </label>
              </div>

              <div class="col-md-4">
                <input type="text" placeholder="Editions" id="mint-editions" class="form-control" disabled>
              </div>

              <div class="col-md-4">
                <input type="text" placeholder="Price" id="mint-price" class="form-control" disabled>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label">License</label>
              <div class="col-md-2">
                <label class="switch switch-small">
                  <input type="checkbox" id="mint-license" value="0">
                  <span></span>
                </label>
              </div>

              <form class="form-horizontal" role="form">
                <div class="form-group">
                  <div class="col-md-8">
                    <div class="btn-group">
                      <a href="javascript:void(0)" class="btn btn-default dropdown-toggle" id="mint-terms-dropdown" disabled><span id="mint-terms">Select Terms & License</span> <span class="caret"></span></a>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="javascript:void(0)" id="mint-essential">Essential</a></li>
                        <li><a href="javascript:void(0)" id="mint-premium">Premium</a></li>
                        <li><a href="javascript:void(0)" id="mint-commercial">Commercial</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </form>
        </div>

        <div style="padding:15px;">
          <button class="btn btn-warning btn-block" id="mint-submit">MINT NOW</button>
        </div>

        <p align="center" style="color:#F39C12;"><small>3.69% commission fee per sell</small></p>
      </div>

      <div class="sidebar-tab-content form-horizontal" id="sidebar_2">
        <p style="padding:25px; color:#B3B6B7;"><small>Here is where we explain the details of every legal contract that our NFT are governed by...</small></p>
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
            <a href="pages-login.html" class="btn btn-success btn-lg">Yes</a>
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
  <script src="/js/plugins/jquery/jquery.min.js"></script>
  <script src="/js/plugins/jquery/jquery-ui.min.js"></script>
  <script src="/js/plugins/bootstrap/bootstrap.min.js"></script>
  <!-- END PLUGINS -->

  <!-- THIS PAGE PLUGINS -->
  <script src="/js/plugins/icheck/icheck.min.js"></script>
  <script src="/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
  <script src="/js/plugins/dropzone/dropzone.min.js"></script>
  <script src="/js/plugins/noty/jquery.noty.js"></script>
  <script src="/js/plugins/noty/layouts/topRight.js"></script>
  <script src="/js/plugins/noty/themes/default.js"></script>
  <!-- END PAGE PLUGINS -->

  <!-- START TEMPLATE -->
  <script src="/js/plugins.js"></script>
  <script src="/js/actions.js"></script>
  <script src="/js/tezos.js"></script>
  <!-- END TEMPLATE -->
  <!-- END SCRIPTS -->

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

  tezos.setWalletProvider(wallet)

  const fa2 = 'KT1WjTTTgHy5MojfoAe1yFUGU6roLaE2x8Uj'
  const fixedPrice = 'KT1BNXQ8XLbBqapbQjPVg3xFnxoade2UjxE6'
  const editions = []
  let maxEditionsPerRun = 0
  let editionTemplate = null

  $(document).ready(function () {
    editionTemplate = $('#temp-edition').prop('content')
    getEditions(fa2)

    $('#connect-wallet').click(async function (event) {
      event.preventDefault()
      await connectWallet()
    })
  })

  async function connectWallet () {
    const network = { type: NetworkType.MAINNET, rpcUrl: rpc }
    await wallet.requestPermissions({ network })
    const pkh = await wallet.getPKH()
    const balance = await tezos.tz.getBalance(pkh)
    $('#wallet-balance').text((balance.c[0] / 1000000) * parseFloat(window.priceUsd))
  }

  async function getEditions (address) {
    const storage = await tezos.contract.getStorage(address)
    const size = storage.next_edition_id.c[0]
    let counts = 0
    maxEditionsPerRun = storage.max_editions_per_run.c[0]
    $('#editions-size').text(size)

    for (let i = size - 1; i >= 0 && counts < 6; i--) {
      const edition = await storage.editions_metadata.get(i)
      await displayEdition(i, edition)
      editions[i] = edition
      counts++
    }
  }

  async function displayEdition (eid, edition) {
    const elem = $(editionTemplate).clone(true, true)
    const values = edition.edition_info.valueMap
    const numberOfEditions = edition.number_of_editions.c[0]
    const cid = parseBytes(values.get('""')).split('ipfs://')[1]
    const editionDataLink = await getIPFS(cid, 'application/json')
    const editionData = parseDataURL(editionDataLink)
    const songName = parseBytes(values.get('"song_name"'))
    const artist = parseBytes(values.get('"artist"'))
    const format = parseBytes(values.get('"asset_format"'))
    const title = songName ? songName.substr(0, 27) : songName
    const sales = await getSales(fixedPrice, eid, edition)
    const price = sales.price / 1000000
    let audioCID = null
    let audioType = null
    let artworkCID = null
    let artworkType = null

    editionData.formats.forEach(format => {
      if (format.mimeType.startsWith('audio')) {
        audioCID = format.uri.split('ipfs://')[1]
        audioType = format.mimeType
      } else if (format.mimeType.startsWith('image')) {
        artworkCID = format.uri.split('ipfs://')[1]
        artworkType = format.mimeType
      }
    })

    const audioDataUrl = await getIPFS(audioCID, audioType)
    const artworkDataUrl = artworkCID !== null ? await getIPFS(artworkCID, artworkType) : '/img/bg-capa.jpg'
    $(elem).find('.nft-artwork').attr('src', artworkDataUrl).removeClass('nft-artwork')
    $(elem).find('.nft-artist').text(artist).removeClass('nft-artist')
    $(elem).find('.nft-title').text(title).removeClass('nft-title')
    $(elem).find('.nft-issuer-address').text(edition.creator).removeClass('nft-issuer-address')
    $(elem).find('.nft-format').text(format).removeClass('nft-format')
    $(elem).find('.nft-price').text(price).removeClass('nft-price')
    $(elem).find('.nft-editions-avail').text(sales.count + '/' + numberOfEditions).removeClass('nft-editions-avail')
    $(elem).find('.nft-buy').attr('data-buy', eid).removeClass('nft-buy').click(buyEdition)
    $(elem).find('.nft-play').attr({
      href: audioDataUrl,
      'data-hash': audioCID
    }).removeClass('nft-play')
    $('#nft-editions').append(elem)
  }

  async function getSales (address, eid, edition) {
    const storage = await tezos.contract.getStorage(address)
    const keys = []
    let count = 0
    let price = 0

    for (let i = 0; i < edition.number_of_editions.c[0]; i++) {
      const tokenId = eid * maxEditionsPerRun + i
      keys.push({
        seller: edition.creator,
        sale_token: {
          token_for_sale_address: fa2,
          token_for_sale_token_id: tokenId
        }
      })
    }

    const values = await storage.sales.getMultipleValues(keys)
    values.valueMap.forEach(item => {
      if (item) {
        price = item.c[0]
        count++
      }
    })

    return { count, price }
  }

  async function buyEdition (event) {
    await connectWallet()

    const eid = parseInt($(this).attr('data-buy'))
    const edition = editions[eid]
    const values = edition.edition_info.valueMap
    const numberOfEditions = edition.number_of_editions.c[0]
    const cid = parseBytes(values.get('""')).split('ipfs://')[1]
    const editionDataLink = await getIPFS(cid, 'application/json')
    const editionData = parseDataURL(editionDataLink)
    let audioCID = null
    let audioType = null

    editionData.formats.forEach(format => {
      if (format.mimeType.startsWith('audio')) {
        audioCID = format.uri.split('ipfs://')[1]
        audioType = format.mimeType
      }
    })

    const contract = await tezos.wallet.at(fixedPrice)
    const storage = await contract.storage()
    let salePrice = 0
    let sale = null

    for (let i = 0; i < numberOfEditions; i++) {
      const tokenId = eid * maxEditionsPerRun + i
      try {
        const key = {
          seller: edition.creator,
          sale_token: {
            token_for_sale_address: fa2,
            token_for_sale_token_id: tokenId
          }
        }
        const value = await storage.sales.get(key)

        sale = key
        salePrice = value.c[0] / 1000000
        break
      } catch (error) {}
    }

    if (sale !== null) {
      const tokenId = sale.sale_token.token_for_sale_token_id
      const operation = await contract.methods.buy(sale.seller, fa2, tokenId).send({
        amount: salePrice
      })

      noty({
        text: 'Waiting for confirmation',
        layout: 'topRight',
        timeout: 5000
      })

      const hash = operation.opHash
      await operation.confirmation(1)

      noty({
        text: 'Downloading from IPFS',
        layout: 'topRight',
        timeout: 5000
      })

      let filename = editionData.name
      if (audioType === 'audio/mpeg') filename += '.mp3'
      else if (audioType === 'audio/wav') filename += '.wav'
      const downloadLink = await getIPFS(audioCID, audioType)
      downloadURL(downloadLink, filename)

      // Display SUCCESS
      const sweetAlert = await Swal.fire({
        icon: 'success',
        title: 'SUCCESS',
        width: 450,
        html: '<br><p align="left" style="padding-left:10px;">WE HAVE CONFIRMATION!</p><hr><p align="left" style="padding-left:10px;"><strong>Transaction ID/Hash:</strong></p><p align="left" style="font-size:13px;padding-left:10px;">' + hash + '</p>',
        confirmButtonText: '<i class="fas fa-external-link-alt"></i> View in TzStats',
        showCancelButton: true,
        cancelButtonText: "<i class='fas fa-thumbs-up'></i> Got It"
      })

      if (sweetAlert.value) window.open('https://tzstats.com/' + hash)
    } else {
      noty({
        text: 'Unable to find the edition',
        layout: 'topRight',
        type: 'error',
        timeout: 5000
      })
    }
  }

  const player = new Audio()
  $(document).on('click', '[data-hash]', async function (event) {
    event.preventDefault()

    const lottie = $(this).prop('lottie')
    if (player.paused) {
      player.src = $(this).attr('href')
      lottie.play()
      player.play()
    } else {
      player.pause()
      lottie.stop()
      lottie.currentFrame = 0
      lottie.renderFrame()
    }
  })

  function parseBytes (bytes) {
    let string = ''
    for (let i = 0; i < bytes.length; i += 2) {
      const charcode = parseInt(bytes.substr(i, 2), 16)
      string += String.fromCharCode(charcode)
    }

    return string
  }

  async function getHash (id) {
    return new Promise((resolve, reject) => {
      $.ajax('/php/get_hash.php', {
        type: 'GET',
        data: { id: id },
        success: function (data, status, xhr) {
          resolve(data)
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

  let terms = null
  const ipfsNodeAsync = Ipfs.create({ repo: 'ipfs.io' })

  $('#mint-submit').click(async function (event) {
    event.preventDefault()

    const files = $('#upload-dropzone').prop('dropzone').files
    let audioFile = null
    let audioType = null
    let imageFile = null
    let imageType = null

    for (let i = 0; i < files.length; i++) {
      if (audioFile !== null && imageFile !== null) break

      const file = files[i]
      if (file.type.startsWith('audio')) {
        audioFile = file
        audioType = file.type
      } else if (file.type.startsWith('image')) {
        imageFile = file
        imageType = file.type
      }
    }

    if (audioType !== 'audio/mpeg' && audioType !== 'audio/wav') {
      noty({
        text: 'Audio file is neither MP3 nor WAV',
        layout: 'topRight',
        type: 'error',
        timeout: 5000
      })
      return
    }

    const audioData = await readFile(audioFile)
    let artworkData = null

    if (imageFile === null) {
      const mp3tag = new MP3Tag(audioData)
      mp3tag.read()

      if (mp3tag.tags.v2 && mp3tag.tags.v2.APIC) {
        const artwork = mp3tag.tags.v2.APIC[0]
        artworkData = artwork.data
        imageType = artwork.format
      } else {
        noty({
          text: 'No artwork found, please upload',
          layout: 'topRight',
          type: 'error'
        })
        return
      }
    } else artworkData = await readFile(imageFile)

    if (terms !== 'essential' && terms !== 'premium' && terms !== 'commercial') {
      noty({
        text: 'No terms and license selected',
        layout: 'topRight',
        type: 'error',
        timeout: 5000
      })
      return
    }

    const network = { type: NetworkType.MAINNET, rpcUrl: rpc }
    await wallet.requestPermissions({ network })
    const pkh = await wallet.getPKH()
    const balance = await tezos.tz.getBalance(pkh)
    $('#wallet-balance').text((balance.c[0] / 1000000) * parseFloat(window.priceUsd))

    const ipfsNode = await ipfsNodeAsync
    noty({
      text: 'Uploading asset to IPFS',
      layout: 'topRight',
      timeout: 10000
    })

    const { cid } = await ipfsNode.add(audioData)
    const { cid: artworkCID } = await ipfsNode.add(artworkData)
    const thumbnailCid = 'QmPRSm43Wcpoch3qdaENqV3aGqpBv37wdPEBR9j7wMRoxV'

    const contract = await tezos.contract.at(fa2)
    const sellContract = await tezos.contract.at(fixedPrice)
    const storage = await contract.storage()
    const editionId = storage.next_edition_id.c[0]
    const maxPerRun = storage.max_editions_per_run.c[0]
    const map = new MichelsonMap()
    const date = new Date()

    const artist = $('#mint-artist').val()
    const title = $('#mint-title').val()
    const genre = $('#mint-genre').val()
    const editionsCount = parseInt($('#mint-editions').val() || '0')
    let termsURL = ''
    let sellPrice = 0

    if (!editionsCount) {
      noty({
        text: 'Number of editions should be a positive integer',
        layout: 'topRight',
        type: 'error',
        timeout: 5000
      })
      return
    }

    switch (terms) {
      case 'essential':
        termsURL = 'https://radion.fm/essential-terms-contract.html'
        break

      case 'premiums':
        termsURL = 'https://radion.fm/premium-terms-contract.html'
        break

      case 'commercial':
        termsURL = 'https://radion.fm/commercial-terms-contract.html'
        break
    }

    const bytes = JSON.stringify({
      name: title,
      symbol: 'RADION',
      decimals: 0,
      tags: [],
      artifactUri: 'ipfs://' + cid.toString(),
      thumbnailUri: 'ipfs://' + thumbnailCid,
      formats: [{
        uri: 'ipfs://' + cid.toString(),
        mimeType: audioType
      }, {
        uri: 'ipfs://' + artworkCID.toString(),
        mimeType: imageType
      }],
      date: date.toISOString(),
      // assets
      song_name: title,
      artist: artist,
      genre: genre,
      copyright_holder: 'Yes',
      publisher: 'RADION FM',
      licensing_terms: termsURL,
      legal_contract_type: terms
    })

    const { cid: bytesCid } = await ipfsNode.add(bytes)
    map.set('', strToHex('ipfs://' + bytesCid.toString()))
    map.set('date', strToHex(date.toISOString()))
    map.set('song_name', strToHex(title))
    map.set('artist', strToHex(artist))
    map.set('genre', strToHex(genre))
    map.set('copyright_holder', strToHex('Yes'))
    map.set('publisher', strToHex('RADION FM'))
    map.set('asset_format', strToHex(audioType === 'audio/mpeg' ? 'MP3' : 'WAV'))
    map.set('licensing_terms', strToHex(termsURL))
    map.set('legal_contract_type', strToHex(terms))

    const batch = tezos.batch()
    const receivers = []
    for (let i = 0; i < editionsCount; i++) receivers.push(pkh)

    batch.withContractCall(contract.methods.mint_editions([{
      edition_info: map,
      number_of_editions: editionsCount
    }]))

    batch.withContractCall(contract.methods.distribute_editions([{
      edition_id: editionId,
      receivers: receivers
    }]))

    if ($('#mint-sell').is(':checked')) {
      const sellUSD = $('#mint-price').val()
      if (parseFloat(sellUSD) < 0) {
        noty({
          text: 'Price should not be negative',
          layout: 'topRight',
          type: 'error',
          timeout: 5000
        })
        return
      }

      const sellXTZ = (parseFloat(sellUSD) / parseFloat(priceUsd)).toFixed(6)
      sellPrice = parseFloat(sellXTZ) * 1000000
      const operators = []
      const sales = []

      for (let i = 0; i < editionsCount; i++) {
        operators.push({
          add_operator: {
            owner: pkh,
            operator: sellContract.address,
            token_id: maxPerRun * editionId + i
          }
        })

        sales.push({
          sale_price: sellPrice,
          sale_token_param_tez: {
            token_for_sale_address: contract.address,
            token_for_sale_token_id: maxPerRun * editionId + i
          }
        })
      }

      batch.withContractCall(contract.methods.update_operators(operators))
      batch.withContractCall(sellContract.methods.sell(sales))
    }

    try {
      const op = await tezos.wallet.batch(batch.operations).send()
      const n = noty({
        text: 'Waiting for confirmation',
        layout: 'topRight'
      })

      const confirmed = await op.confirmation(1)
      if (confirmed) {
        noty({
          text: 'Minting was successful!',
          layout: 'topRight',
          type: 'success'
        })
      } else {
        noty({
          text: 'Unable to confirm the operation',
          layout: 'topRight',
          type: 'error'
        })
      }
    } catch (error) {}
  })

  $('#mint-sell').change(function () {
    const checked = $(this).is(':checked')
    if (checked) $('#mint-editions, #mint-price').attr('disabled', null)
    else $('#mint-editions, #mint-price').attr('disabled', true)
  })

  $('#mint-license').change(function () {
    const checked = $(this).is(':checked')
    if (checked) {
      $('#mint-terms-dropdown').attr({
        'data-toggle': 'dropdown',
        disabled: null
      })
    } else {
      terms = null
      $('#mint-terms').text('Select Terms & License')
      $('#mint-terms-dropdown').attr({
        'data-toggle': null,
        disabled: true
      })
    }
  })

  $('#mint-essential').click(function (event) {
    terms = 'essential'
    $('#mint-terms').text('Essential')
  })

  $('#mint-premium').click(function (event) {
    terms = 'premium'
    $('#mint-terms').text('Premium')
  })

  $('#mint-commercial').click(function (event) {
    terms = 'commercial'
    $('#mint-terms').text('Commercial')
  })

  async function getIPFS (cid, type) {
    const ipfsNode = await ipfsNodeAsync
    let blob = null
    let url = ''

    for await (const file of ipfsNode.get(cid)) {
      const buffer = new ArrayBuffer(file.size)
      const view = new Uint8Array(buffer)
      let read = 0

      for await (const chunk of file.content) {
        view.set(chunk, read)
        read += chunk.length
      }

      blob = new Blob([buffer], { type: type })
    }

    return new Promise((resolve, reject) => {
      const reader = new FileReader()
      reader.onload = function (e) {
        resolve(e.target.result)
      }
      reader.readAsDataURL(blob)
    })
  }

  function downloadURL (url, filename) {
    const a = document.createElement('A')
    a.href = url
    a.download = filename
    a.click()
  }

  function parseDataURL (url) {
    const regex = /^data:(.+\/.+);base64,(.*)$/
    const match = url.match(regex)
    if (match !== null) {
      const decoded = atob(match[2])
      return JSON.parse(decoded)
    } else {
      alert('Invalid data URL')
    }
  }

  function readFile (file) {
    return new Promise((resolve, reject) => {
      const reader = new FileReader()
      reader.onload = function () {
        resolve(this.result)
      }

      reader.readAsArrayBuffer(file)
    })
  }

  function strToHex (string) {
    let result = ''
    string = string.toString()

    for (let i = 0; i < string.length; i++) {
      const hex = string.charCodeAt(i).toString(16)
      result += hex
    }

    return result
  }
  </script>
</body>
</html>
