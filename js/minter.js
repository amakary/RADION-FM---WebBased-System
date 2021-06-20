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

async function mint () {
  $('#submit_btn').attr('disabled', true)
  const files = $('#filename1').prop('files')
  if (files.length === 0) {
    noty({
      text: 'WAV upload is required',
      layout: 'topRight',
      type: 'error',
      timeout: 5000
    })
    $('#submit_btn').attr('disabled', null)
    return
  }

  const wav = files[0]
  const wavExt = wav.name.split('.').pop()
  if (wavExt.match(/^(wav)$/i) === null) {
    noty({
      text: 'Uploaded file is not a WAV file',
      layout: 'topRight',
      type: 'error',
      timeout: 5000
    })
    $('#submit_btn').attr('disabled', null)
    return
  }

  const description = $('#description').val()
  const id = $('#id').val()
  const title = $('#title').val()
  const artist = $('#artist').val()
  const album = $('#album').val()
  const genre = $('#genre').val()
  const track = $('#track').val()
  const year = $('#year').val()
  const license = $('#license').val()
  const record = $('#record-label').val()
  const filesize = $('#filesize').val()
  const isrc = $('#isrc').val()
  const idbml = $('#idbml').val()
  if (!id) {
    noty({
      text: 'Empty ID',
      layout: 'topRight',
      type: 'error',
      timeout: 5000
    })
    return
  }

  if (!artist) {
    noty({
      text: 'Artist should not be empty',
      layout: 'topRight',
      type: 'error',
      timeout: 5000
    })
    return
  }

  if (!title) {
    noty({
      text: 'Title should not be empty',
      layout: 'topRight',
      type: 'error',
      timeout: 5000
    })
    return
  }

  if (!genre) {
    noty({
      text: 'Genre should not be empty',
      layout: 'topRight',
      type: 'error',
      timeout: 5000
    })
    return
  }

  const network = { type: NetworkType.MAINNET, rpcUrl: rpc }
  await wallet.requestPermissions({ network })

  const wavData = await readFile(wav)
  const ipfsNode = await Ipfs.create({ repo: 'ipfs.io' })
  noty({
    text: 'Uploading asset to IPFS',
    layout: 'topRight',
    timeout: 10000
  })

  const { cid } = await ipfsAdd(wavData)
  const thumbnailCid = 'QmPRSm43Wcpoch3qdaENqV3aGqpBv37wdPEBR9j7wMRoxV'

  const contract = await tezos.contract.at('KT1MR8e46WJBq4RcFSogiDbSg3ceDRi81hpE')
  const sellContract = await tezos.contract.at('KT1BPDJPbu414RWUZ4jdr4e2RBAsR8rAXkFH')
  const storage = await contract.storage()
  const tokenId = storage.assets.next_token_id.c[0]
  const pkh = await wallet.getPKH()
  const map = new MichelsonMap()
  const date = new Date()

  const bytes = JSON.stringify({
    name: id,
    symbol: 'RADION',
    decimals: 0,
    tags: [],
    artifactUri: 'ipfs://' + cid.toString(),
    thumbnailUri: 'ipfs://' + thumbnailCid,
    formats: [{
      uri: 'ipfs://' + cid.toString(),
      mimeType: 'audio/wav'
    }],
    date: date.toISOString()
  })

  const { cid: bytesCid } = await ipfsAdd(bytes)
  map.set('', strToHex('ipfs://' + bytesCid.toString()))
  map.set('description', strToHex(description))
  map.set('asset_id', strToHex(id))
  map.set('date', strToHex(date.toISOString()))
  map.set('song_name', strToHex(title))
  map.set('artist', strToHex(artist))
  map.set('album', strToHex(album))
  map.set('genre', strToHex(genre))
  map.set('track', strToHex(track))
  map.set('copyright_holder', strToHex('Yes'))
  map.set('copyright_owner', strToHex('Exclusive Rights'))
  map.set('publisher', strToHex('RADION FM'))
  map.set('year_created', strToHex(year))
  map.set('record_label', strToHex(record))
  map.set('asset_format', strToHex('WAV'))
  map.set('asset_sizes', strToHex(filesize + ' kb'))
  map.set('isrc', strToHex(isrc))
  map.set('idbml', strToHex(idbml))

  const batch = tezos.batch()
  batch.withContractCall(contract.methods.mint([{
    owner: pkh,
    token_metadata: {
      token_id: tokenId,
      token_info: map
    }
  }]))

  if ($('#sell-allow').is(':checked')) {
    const sellUSD = $('#sell-price').val()
    const sellXTZ = (parseFloat(sellUSD) / parseFloat(priceUsd)).toFixed(6)
    const sellPrice = parseFloat(sellXTZ) * 1000000
    batch.withContractCall(contract.methods.update_operators([{
      add_operator: {
        owner: pkh,
        operator: sellContract.address,
        token_id: tokenId
      }
    }]))

    batch.withContractCall(sellContract.methods.sell(sellPrice, contract.address, tokenId))
  }

  const op = await tezos.wallet.batch(batch.operations).send()
  noty({
    text: 'Waiting for confirmation',
    layout: 'topRight',
    timeout: 5000
  })

  const confirmed = await op.confirmation()
  if (confirmed) {
    $.ajax('/music_upload_update.php', {
      type: 'POST',
      data: {
        id: id,
        token_id: tokenId,
        cid: cid.toString(),
        hash: op.opHash
      },
      cache: false,
      complete: function () {
        $('#submit_btn').attr('disabled', null)
      },
      success: function (data) {
        noty({
          text: 'Submission was successful!',
          layout: 'topRight',
          type: 'success'
        })
      },
      error: function (xhr, status, error) {
        console.error(status, xhr, error)
        noty({
          text: 'Something went wrong. Error: ' + error,
          layout: 'topRight',
          type: 'error'
        })
      }
    })
  } else {
    noty({
      text: 'Something went wrong',
      layout: 'topRight',
      type: 'error'
    })
    $('#submit_btn').attr('disabled', null)
  }
}

$(document).ready(function () {
  $('#connect-wallet').click(async function (event) {
    event.preventDefault()
    await wallet.requestPermissions()

    const address = await wallet.getPKH()
    const mutez = await tezos.tz.getBalance(address)
    const balance = mutez / 1000000
    const usdRate = $('.tezos-price-usd').text()
    const usdBalance = parseFloat(balance * usdRate).toFixed(2)

    new QRCode($('#qraddress')[0], address)
    $('#get_source').text(address)
    $('#wallet_address').text(address)
    $('#modal_basic').modal('hide')
    $('#address').text(balance + ' ꜩ')
    $('#usd_balance').text(usdBalance)
  })

  $('#submit_btn').click(function (event) {
    event.preventDefault()
    const termsAccepted = $('input[name="agree_disagree"]').is(':checked')
    if (termsAccepted) mint()
    else noty({
      text: 'Terms and Conditions are not accepted',
      layout: 'topRight',
      type: 'error',
      timeout: 5000
    })
  })

  $('#sell-allow').on('change', function () {
    const checked = $(this).is(':checked')
    $('#sell-price').attr('disabled', checked ? null : true)
  })

  $('#sell-price').on('input', updateConversion)
  $('#sell-price').on('change', updateConversion)

  async function updateConversion (event) {
    const sellUSD = $('#sell-price').val()
    if (!sellUSD) $('#sell-price-xtz').html('0 &#42793;')

    const sellXTZ = (parseFloat(sellUSD) / parseFloat(priceUsd)).toFixed(6)
    $('#sell-price-xtz').html(sellXTZ + ' &#42793;')
  }
})