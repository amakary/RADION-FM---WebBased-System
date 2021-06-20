const fa2 = 'KT1WjTTTgHy5MojfoAe1yFUGU6roLaE2x8Uj'
const fixedPrice = 'KT1BNXQ8XLbBqapbQjPVg3xFnxoade2UjxE6'

let terms = null

async function submit (formData) {
  noty({
    text: '<i class="fad fa-spinner-third fa-spin fa-lg"></i> Uploading file to server! Please wait for confirmation. Do not refresh browser.',
    layout: 'topRight',
    timeout: 16000
  })

  return new Promise((resolve, reject) => {
    $.ajax('/mint_upload_Operation.php', {
      type: 'POST',
      data: formData,
      dataType: 'json',
      contentType: false,
      cache: false,
      processData: false,
      success: function (data) {
        noty({
          text: '<i class="far fa-check-circle fa-lg"></i> Submission was successful!',
          layout: 'topRight',
          type: 'success',
          timeout: 5000
        })
        resolve(data)
      },
      error: function (xhr, status, error) {
        console.error(status, xhr, error)
        noty({
          text: 'Something went wrong. Error: ' + xhr.responseText,
          layout: 'topRight',
          type: 'error'
        })
        reject(error)
      }
    })
  })
}

$('#mint-submit').click(async function (event) {
  event.preventDefault()

  const files = $('#upload-dropzone').prop('dropzone').files
  let audioFile = null
  let audioType = null
  let imageBytes = null
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
  imageBytes = new Uint8Array(artworkData)

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

  const formData = new FormData()
  const data = {
    artwork: {
      name: imageFile.name,
      value: new Blob([imageBytes], { type: imageType })
    },
    mp3: audioFile.name,
    title: title,
    artist: artist,
    genre: genre,
    copyright: terms,
    edition_id: editionId
  }

  for (const name in data) {
    const value = data[name]
    if (typeof value === 'object') formData.append(name, value.value, value.name)
    else formData.append(name, value)
  }

  const response = await submit(formData)
  const ipfsNode = await ipfsNodeAsync
  const id = response.id
  const bytes = JSON.stringify({
    name: title,
    symbol: 'RADION',
    decimals: 0,
    tags: [],
    thumbnailUri: 'ipfs://' + thumbnailCid,
    formats: [],
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

  const { cid: bytesCid } = await ipfsAdd(bytes)
  map.set('', strToHex('ipfs://' + bytesCid.toString()))
  map.set('date', strToHex(date.toISOString()))
  map.set('song_name', strToHex(title))
  map.set('artist', strToHex(artist))
  map.set('genre', strToHex(genre))
  map.set('copyright_holder', strToHex('Yes'))
  map.set('publisher', strToHex('RADION FM'))
  map.set('asset_id', strToHex(id))
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
      text: 'Please wait for confirmation!',
      layout: 'topRight',
      type: 'info'
    })

    const confirmed = await op.confirmation(1)
    if (confirmed) {
      noty({
        text: 'Operation was successful',
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