<!DOCTYPE html>
<html lang="en">
<head>
  <title>User NFT Assets</title>
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
  <script src="https://unpkg.com/@airgap/beacon-sdk@2.3.1/dist/walletbeacon.min.js"></script>
  <script>window.beaconSdk = beacon</script>
  <script src="https://unpkg.com/@taquito/taquito@9.2.0/dist/taquito.min.js"></script>
  <script src="https://unpkg.com/@taquito/beacon-wallet@9.2.0/dist/taquito-beacon-wallet.umd.js"></script>
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
            <a href="https://t.me/joinchat/TdHnxqPrcJPK3mZ1" target="blank" rel="nofollow"><span class="fab fa-telegram"></span></a>
            <a href="https://twitter.com/fm_radion" target="blank" rel="nofollow"><span class="fab fa-twitter"></span></a>
            <a href="https://www.youtube.com/channel/UCuJOeoT-2o2stPXXJJGzAdg" target="blank" rel="nofollow"><span class="fab fa-youtube"></span></a>

          </div>

          <div class="contacts">
            <a href="#" id="connect-wallet">CONNECT WALLET</a>
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
        <li class="active">This is an experimental feature open to the public. Our current commission fee is 3.69% per sell. For example; If you sell a NFT for $20 USD you will receive $19.22 USD.</li>
      </ul>
      <!-- END BREADCRUMB -->

      <!-- INFORMATION FOR MARKETPLACE -->
      <div class="row">
        <div class="col-md-2">
          <a href="#" class="tile tile-primary">
            <span>Balance</span>
            <p id="wallet-balance"> <span>tez</span></p>
            <div class="informer informer-primary dir-tr"></div>
          </a>
        </div>

        <div class="col-md-2">
          <a href="#" class="tile tile-primary">
            $0
            <p>Total Marketcap</p>
            <div class="informer informer-primary dir-tr"></div>
          </a>
        </div>

        <div class="col-md-2">
          <a href="#" class="tile tile-primary">
            3.69%
            <p>Commission Fee</p>
            <div class="informer informer-primary dir-tr"></div>
          </a>
        </div>

        <div class="col-md-2">
          <a href="#" class="tile tile-primary">
            $0
            <p>Sales</p>
            <div class="informer informer-primary dir-tr"></div>
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
            <span><div align="center" style="color:#33414E; width:50px; height:50px; margin-left:80px; margin-bottom:5px;">
              <svg xmlns="http://www.w3.org/2000/svg" width="47" height="64" viewBox="0 0 47 64">
                <path style="fill:#85929E;" d="M30.252 63.441c-4.55 0-7.864-1.089-9.946-3.267-2.08-2.177-3.121-4.525-3.121-7.041 0-.92.181-1.694.544-2.323a3.993 3.993
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
            </div></span>
            <p>$ <span class="tezos-price-usd"></span></p>
            <div class="informer informer-default"></div>
          </a>
        </div>
      </div>
      <!-- END INFORMATION FOR MARKETPLACE -->

      <div class="page-title">
        <h2>NFT USER ASSETS</h2>
      </div>

      <!-- PAGE CONTENT WRAPPER -->
      <div class="page-content-wrap" style="min-height: 439px;">
        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="row" id="nft-assets"></div>
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
              <div align="right" style="margin-top:-20px;"><label class="label label-default label-sm nft-format"></label></div>
              <div class="fas fa-shield-check fa-lg nft-shield" style="display:none; color:#229954; position:absolute; right:1;"></div>
              <h3 align="center" class="nft-artist"></h3>
              <p align="center"><span class="nft-title"></span></p>
              <div>Issuer: <span class="nft-issuer-address" style="font-size:11px; color:#979A9A;"></span></div>
              <div>Hosting: <span class="nft-host"></span></div>
              <div>Price: <span class="nft-price" style="color:#2980B9;"></span> <span style="color:#2980B9;">tz</span><span class="nft-sold-out"> / </span><strong class="nft-sold-out">$<span class="nft-price-usd"></span></strong></div>
              <div>Editions Available: <strong><span class="nft-editions-avail" style="color:#F39C12;"></span></strong></div>
              <div>Genre: <span class="nft-genre"></span></div>
              <div>Legal Contract: <strong><span class="nft-terms"></span></strong></div>
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
  <script src="/js/all.js"></script>
  <script src="/js/plugins.js"></script>
  <script src="/js/actions.js"></script>
  <script src="/js/helpers.js"></script>
  <script src="/js/ipfs.js"></script>
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
  let editionsStorage = null
  let marketStorage = null
  let maxEditionsPerRun = 0
  let editionTemplate = null

  $(document).ready(function () {
    editionTemplate = $('#temp-edition').prop('content')
    getContractSize(fa2)

    $('#connect-wallet').click(async function (event) {
      event.preventDefault()
      const pkh = await connectWallet()
      await getEditions(pkh)
    })
  })

  async function getContractSize (address) {
    const storage = await tezos.contract.getStorage(address)
    const size = storage.next_edition_id.c[0]
    maxEditionsPerRun = storage.max_editions_per_run.c[0]
    $('#editions-size').text(size)
  }

  async function connectWallet () {
    const network = { type: NetworkType.MAINNET, rpcUrl: rpc }
    await wallet.requestPermissions({ network })
    const pkh = await wallet.getPKH()
    const balance = await tezos.tz.getBalance(pkh)
    $('#wallet-balance').text((balance.c[0] / 1000000) * parseFloat(window.priceUsd))
    return pkh
  }

  async function getEditions (pkh) {
    editionsStorage = await tezos.contract.getStorage(fa2)
    const size = editionsStorage.next_edition_id.c[0]
    let counts = 0

    marketStorage = await tezos.contract.getStorage(fixedPrice)
    maxEditionsPerRun = editionsStorage.max_editions_per_run.c[0]

    for (let i = size - 1; i >= 0; i--) {
      console.log('Getting edition\'s (ID: ' + i + ') metadata...')
      const edition = await editionsStorage.editions_metadata.get(i)
      if (edition.creator !== pkh) continue
      console.log(edition)
      await displayEdition(i, edition)
      editions[i] = edition
      counts++
    }

    $('#assets-size').text(counts)
  }

  async function displayEdition (eid, edition) {
    const elem = $(editionTemplate).clone(true, true)
    const values = edition.edition_info.valueMap
    const numberOfEditions = edition.number_of_editions.c[0]
    const cid = parseBytes(values.get('""')).split('ipfs://')[1]
    console.log('Getting edition\'s (ID: ' + eid + ') additional data from IFPS')
    const editionDataLink = await getIPFS(cid, 'application/json')
    const editionData = parseDataURL(editionDataLink)
    console.log('IPFS Metadata', editionData)
    const id = parseBytes(values.get('"asset_id"') || '')
    const songName = parseBytes(values.get('"song_name"'))
    const artist = parseBytes(values.get('"artist"')) || 'Artist Unknown'
    const genre = parseBytes(values.get('"genre"')) || 'None'
    const contractType = parseBytes(values.get('"legal_contract_type"'))
    const title = (songName ? songName.substr(0, 27) : songName) || 'No title'
    console.log('Getting edition\'s market sales...')
    const sales = await getSales(eid, edition)
    console.log(sales)
    const price = sales.price / 1000000
    const priceInUsd = (price * parseFloat(window.priceUsd)).toFixed(2)
    let termsContract = ''
    let audioUrl = 'https://radion.fm:8002/stream/1'
    let artworkUrl = 'https://radion.fm/img/bg-capa.jpg'
    let audioFormat = ''
    let audioType = null
    let artworkType = null

    let metadata = null
    try {
      metadata = await getMetadata(id)
      artworkUrl = metadata.artwork ? 'https://radion.fm' + metadata.artwork : audioUrl
      $(elem).find('.nft-shield').show()
    } catch (error) {}

    editionData.formats.forEach(format => {
      if (format.mimeType.startsWith('audio')) {
        audioUrl = format.uri
        audioType = format.mimeType
        audioFormat = audioType === 'audio/wav' ? 'WAV' : 'MP3'
      } else if (format.mimeType.startsWith('image')) {
        artworkUrl = format.uri
        artworkType = format.mimeType
      }
    })

    switch (contractType) {
      case 'essential':
        termsContract = 'Basic Lease'
        break

      case 'commercial':
        termsContract = 'Trackout Lease'
        break

      case 'basic':
        termsContract = 'Basic Lease'
        break

      case 'trackout':
        termsContract = 'Trackout Lease'
        break

      case 'premium':
        termsContract = 'Premium Lease'
        break

      case 'exclusive':
        termsContract = 'Exclusive Rights'
        break

      case 'cc-by-nc-nd':
        termsContract = 'CC-BY-NC-ND'
        break

      default:
        termsContract = contractType
    }

    // const audioDataUrl = await getIPFS(audioCID, audioType)
    const host = audioUrl.startsWith('https://') ? 'RADION Server' : 'IPFS'
    const audioDataUrl = audioUrl.startsWith('https://') ? audioUrl : 'https://ipfs.io/ipfs/' + audioUrl.split('ipfs://')[1]
    console.log('Getting artwork data from ' + artworkUrl + '...')
    const artworkDataUrl = artworkUrl.startsWith('https://') ? artworkUrl : await getIPFS(artworkUrl.split('ipfs://')[1], artworkType)
    const issuer = edition.creator.substr(0, edition.creator.length - 15) + '...'
    $(elem).find('.nft-artwork').attr('src', artworkDataUrl).removeClass('nft-artwork')
    $(elem).find('.nft-artist').text(artist).removeClass('nft-artist')
    $(elem).find('.nft-title').text(title).removeClass('nft-title')
    $(elem).find('.nft-shield').removeClass('nft-shield')
    $(elem).find('.nft-issuer-address').text(issuer).removeClass('nft-issuer-address')
    $(elem).find('.nft-host').text(host).removeClass('nft-host')
    $(elem).find('.nft-format').text(audioFormat).removeClass('nft-format')
    $(elem).find('.nft-price').text(price).removeClass('nft-price')
    $(elem).find('.nft-price-usd').text(priceInUsd).removeClass('nft-price-usd')
    if (sales.count === 0) {
      $(elem).find('.nft-sold-out').hide().removeClass('nft-sold-out')
      $(elem).find('.nft-editions-avail').text(numberOfEditions === 1 ? 'Sold' : 'Sold out')
    }
    else $(elem).find('.nft-editions-avail').text(sales.count + '/' + numberOfEditions)
    $(elem).find('.nft-editions-avail').removeClass('nft-editions-avail')
    $(elem).find('.nft-terms').text(termsContract).removeClass('nft-terms')
    $(elem).find('.nft-genre').text(genre).removeClass('nft-genre')
    $(elem).find('.nft-buy').attr('data-buy', eid).removeClass('nft-buy').click(buyEdition)
    $(elem).find('.nft-play').attr({
      href: audioDataUrl,
      'data-hash': audioDataUrl.split('/')[1]
    }).removeClass('nft-play')
    $('#nft-assets').append(elem)
  }

  async function getSales (eid, edition) {
    const tokenIds = []
    const keys = []
    let count = 0
    let price = 0

    for (let i = 0; i < edition.number_of_editions.c[0]; i++) {
      const tokenId = eid * maxEditionsPerRun + i
      tokenIds.push(tokenId)
      keys.push({
        seller: edition.creator,
        sale_token: {
          token_for_sale_address: fa2,
          token_for_sale_token_id: tokenId
        }
      })
    }

    const values = await marketStorage.sales.getMultipleValues(keys)
    values.valueMap.forEach(item => {
      if (item) {
        price = item.c[0]
        count++
      }
    })

    if (price === 0) {
      const response = await $.getJSON('https://api.better-call.dev/v1/contract/mainnet/' + fixedPrice + '/operations?entrypoints=buy')
      const operations = response.operations
      for (let i = 0; i < operations.length; i++) {
        const operation = operations[i]
        if (operation.internal) continue

        const parameters = parseMichelsonMap(operation.parameters)
        const tokenId = parameters[0].buy.sale_token.sale_token.token_for_sale_token_id
        if (tokenIds.includes(tokenId)) {
          price = operation.amount
          break
        }
      }
    }

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
    let audioUrl = null
    let audioType = null

    editionData.formats.forEach(format => {
      if (format.mimeType.startsWith('audio')) {
        audioUrl = format.uri
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
        text: '<i class="fas fa-compact-disc fa-lg fa-spin"></i> Transaction Request Sent. Confirming...<br>Please wait for confirmation! Do not refresh browser...',
        type: 'information',
        layout: 'topRight',
        timeout: 20000
      })

      const hash = operation.opHash
      await operation.confirmation(1)

      noty({
        text: 'Please wait for download. Do not refresh browser! This may take a while...',
        type: 'information',
        layout: 'topRight',
        timeout: 5000
      })

      let filename = editionData.name
      if (audioType === 'audio/mpeg') filename += '.mp3'
      else if (audioType === 'audio/wav') filename += '.wav'
      if (audioUrl.startsWith('ipfs://')) {
        const audioCID = audioUrl.split('ipfs://')[1]
        const downloadLink = await getIPFS(audioCID, audioType)
        downloadURL(downloadLink, filename)
      } else {
        const splitted = audioUrl.split('https://www.radion.fm')
        const downloadLink = splitted.length > 1 ? splitted[1] : audioUrl
        downloadURL(downloadLink + '&hash=' + hash, filename)
      }

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
    const source = $(this).attr('href')

    if (player.paused || player.src !== source) {
      $('[data-hash]').each(function (i, elem) {
        let eLottie = $(this).prop('lottie')
        eLottie.stop()
        eLottie.currentFrame = 0
        eLottie.renderFrame()
      })

      player.src = source
      lottie.play()
      player.play()
    } else {
      player.pause()
      lottie.stop()
      lottie.currentFrame = 0
      lottie.renderFrame()
    }
  })

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
