
const { TezosToolkit, MichelsonMap } = taquito
const { BeaconWallet } = taquitoBeaconWallet
const { NetworkType } = beacon

const rpc = 'https://mainnet.smartpy.io'
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

  const audioFile = files[0]
  const audioExt = audioFile.name.split('.').pop()
  if (audioExt.match(/^(wav|mp3)$/i) === null) {
    noty({
      text: 'Uploaded file is not a WAV/MP3 file',
      layout: 'topRight',
      type: 'error',
      timeout: 5000
    })
    $('#submit_btn').attr('disabled', null)
    return
  }

  const network = { type: NetworkType.MAINNET, rpcUrl: rpc }
  await wallet.requestPermissions({ network })

  const wavData = await readFile(audioFile)
  const ipfsNode = await Ipfs.create({ repo: 'ipfs.io' })
  noty({
    text: 'Uploading asset to IPFS',
    layout: 'topRight',
    type: 'info',
    timeout: 10000
  })

  const { cid } = await ipfsNode.add(wavData)
  const thumbnailCid = 'QmPRSm43Wcpoch3qdaENqV3aGqpBv37wdPEBR9j7wMRoxV'

  const contract = await tezos.contract.at('KT1WjTTTgHy5MojfoAe1yFUGU6roLaE2x8Uj')
  const sellContract = await tezos.contract.at('KT1BNXQ8XLbBqapbQjPVg3xFnxoade2UjxE6')
  const storage = await contract.storage()
  const editionId = storage.next_edition_id.c[0]
  const maxPerRun = storage.max_editions_per_run.c[0]
  const pkh = await wallet.getPKH()
  const map = new MichelsonMap()
  const date = new Date()

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
  const editionsCount = parseInt($('#editions-count').val())
  let type = $('[name="license-class"]').val()
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

  switch (type) {
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
    name: id,
    symbol: 'RADION',
    description: description,
    decimals: 0,
    tags: [],
    artifactUri: 'ipfs://' + cid,
    thumbnailUri: 'ipfs://' + thumbnailCid,
    formats: [{
      uri: 'ipfs://' + cid,
      mimeType: 'audio/wav'
    }],
    date: date.toISOString(),
    // assets
    asset_id: id,
    song_name: title,
    artist: artist,
    album: album,
    genre: genre,
    track: track,
    copyright_holder: 'Yes',
    publisher: 'RADION FM',
    year_created: year,
    record_label: record,
    asset_sizes: filesize + ' kb',
    isrc: isrc,
    idbml: idbml,
    licensing_terms: termsURL,
    legal_contract_type: type
  })

  const { cid: bytesCid } = await ipfsNode.add(bytes)
  map.set('', strToHex('ipfs://' + bytesCid))
  map.set('description', strToHex(description))
  map.set('asset_id', strToHex(id))
  map.set('date', strToHex(date.toISOString()))
  map.set('song_name', strToHex(title))
  map.set('artist', strToHex(artist))
  map.set('album', strToHex(album))
  map.set('genre', strToHex(genre))
  map.set('track', strToHex(track))
  map.set('copyright_holder', strToHex('Yes'))
  map.set('publisher', strToHex('RADION FM'))
  map.set('year_created', strToHex(year))
  map.set('record_label', strToHex(record))
  map.set('asset_format', strToHex('WAV'))
  map.set('asset_sizes', strToHex(filesize + ' kb'))
  map.set('isrc', strToHex(isrc))
  map.set('idbml', strToHex(idbml))
  map.set('licensing_terms', strToHex(termsURL))
  map.set('legal_contract_type', strToHex(type))

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

  if ($('#sell-allow').is(':checked')) {
    const sellUSD = $('#sell-price').val()
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
      layout: 'topRight',
      type: 'info'
    })

    const confirmed = await op.confirmation()
    if (confirmed) {
      $.ajax('/php/mint.php', {
        type: 'POST',
        data: {
          id: id,
          cid: cid,
          edition_id: editionId,
          editions_count: editionsCount,
          price: sellPrice,
          terms: type
        },
        complete: function () {
          n.close()
        },
        success: function (data, status, xhr) {
          noty({
            text: 'Submission was successful!',
            layout: 'topRight',
            type: 'success'
          })
        },
        error: function () {
          noty({
            text: 'Something went wrong',
            layout: 'topRight',
            type: 'error'
          })
        }
      })
    } else {
      noty({
        text: 'Unable to confirm the operation',
        layout: 'topRight',
        type: 'error'
      })
    }
  } catch (error) {}

  $('#submit_btn').attr('disabled', null)
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
