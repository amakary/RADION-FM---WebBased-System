
function imageURL (bytes, format) {
  let encoded = ''
  bytes.forEach(function (byte) {
    encoded += String.fromCharCode(byte)
  })

  return `data:${format};base64,${btoa(encoded)}`
}

function loadFile (file) {
  return new Promise(function (resolve, reject) {
    const reader = new FileReader()
    reader.onload = () => {
      resolve(reader.result)
    }

    reader.onerror = reject
    reader.readAsArrayBuffer(file)
  })
}

// Selects Creative Common license
function chooseLicense (adaptations, commercial) {
  let license = 'by'

  if (adaptations && commercial) {
    $('#cc-icon').bolden()
    $('#cc-icon-by').bolden()
  }

  switch (commercial) {
    case 'option2':
      license += '-nc'
      $('#cc-icon-nc').bolden()
      break

    case 'option1':
    default:
      license += ''
  }

  switch (adaptations) {
    case 'option2':
      license += '-nd'
      $('#cc-icon-nd').bolden()
      break

    case 'option3':
      license += '-sa'
      $('#cc-icon-sa').bolden()
      break

    case 'option1':
    default:
      license += ''
  }

  return license
}

$.fn.extend({
  bolden: function () {
    this.css({
      'font-weight': 'bold',
      color: '#000'
    })
  }
})

let imageBytes = null
let imageType = ''
let imageFile = null

let audioFile = null
let mp3tag = null

Dropzone.options.dropzone = {
  accept: async function (file, done) {
    if (file.type === 'audio/mpeg') {
      readTags(file)
      audioFile = file
      done()
    } else if (file.type.startsWith('image/')) {
      const buffer = await loadFile(file)
      imageFile = file
      imageBytes = new Uint8Array(buffer)
      imageType = file.type

      const url = imageURL(imageBytes, imageType)
      $('#cover-preview, #preview-cover').attr('src', url)
      done()
    } else {
      done('Unaccepted file type: ' + file.type)
    }
  }
}

$(document).ready(function () {
  $('input[name="commercial"],input[name="adaptations"]').on('change', function () {
    const commercial = $('input[name="commercial"]:checked').val()
    const adaptations = $('input[name="adaptations"]:checked').val()
    if (!commercial || !adaptations) return

    $('[id|="cc"]').css({
      'font-weight': 'normal',
      color: '#c0c0c0'
    })

    const license = chooseLicense(adaptations, commercial)
    $('#cc-' + license).bolden()
  })

  $('input[name="copyright-type"]').on('change', function () {
    const type = $('input[name="copyright-type"]:checked').val()
    if (type === 'c') {
      $('input[name="commercial"],input[name="adaptations"]').attr('disabled', true)
      $('#copy-icon,#copy').bolden()
      $('[id|="cc"]').css({
        'font-weight': 'normal',
        color: '#c0c0c0'
      })
    } else {
      $('input[name="commercial"],input[name="adaptations"]').attr('disabled', null)
      $('#copy-icon,#copy').css({
        'font-weight': 'normal',
        color: '#c0c0c0'
      })
    }
  })

  $('#submit_btn').click(submitForm)
})

async function readTags (file) {
  noty({
    text: '<i class="far fa-exclamation-circle fa-lg"></i> Reading file, please continue with other inputs!',
    layout: 'topRight',
    type: 'information',
    timeout: 9000
  })

  mp3tag = new MP3Tag(await loadFile(file))
  mp3tag.read()
  if (mp3tag.error !== '') {
    noty({
      text: 'File has no tags, please continue!',
      layout: 'topRight',
      timeout: 5000
    })
  }

  const tags = mp3tag.tags
  $('#title').val(tags.title)
  $('#artist').val(tags.artist)
  $('#album').val(tags.album)
  $('#year').val(tags.year)
  $('#track').val(tags.track)
  $('#genre').val(tags.genre)

  if (tags.v2) {
    if (tags.v2.APIC && tags.v2.APIC.length > 0) {
      const image = tags.v2.APIC[0]
      const type = image.format
      const ext = type.split('/')[1].match(/^(jp(e)?g)$/i) ? 'jpg' : 'png'

      imageFile = new File([image.data], 'artwork.' + ext, { type })
      imageBytes = new Uint8Array(image.data)
      imageType = type
      $('#cover-preview').attr({
        src: imageURL(imageBytes, imageType)
      })
    }
  }
}

async function submitForm () {
  $('#submit_btn').attr('disabled', true)
  if (!audioFile) {
    noty({ text: 'No MP3 file found', layout: 'topRight', type: 'error' })
    $('#submit_btn').attr('disabled', null)
    return
  }

  if (!imageBytes) {
    noty({ text: 'Artwork is required', layout: 'topRight', type: 'error' })
    $('#submit_btn').attr('disabled', null)
    return
  }

  const extension = audioFile.name.split('.').pop()
  if (!extension.match(/^(mp3|mp4|m4a)$/i)) {
    noty({ text: 'Not an MP3 file', layout: 'topRight', type: 'error' })
    $('#submit_btn').attr('disabled', null)
    return
  }

  const terms = $('input[name="agree_disagree"]').is(':checked')
  if (!terms) {
    noty({
      text: 'Terms and Conditions are not accepted',
      layout: 'topRight',
      type: 'error'
    })
    $('#submit_btn').attr('disabled', null)
    return
  }

  // Form Data: These variables are passed for music submission
  const formData = new FormData()
  const commercial = $('input[name="commercial"]:checked').val()
  const adaptations = $('input[name="adaptations"]:checked').val()
  const copyright = $('input[name="copyright-type"]:checked').val()
  if (copyright !== 'c' && (!commercial || !adaptations)) {
    noty({
      text: 'Invalid license',
      layout: 'topRight',
      type: 'error'
    })
    $('#submit_btn').attr('disabled', null)
    return
  }

  const license = copyright === 'c' ? copyright : chooseLicense(adaptations, commercial)
  const data = {
    artwork: {
      name: imageFile.name,
      value: new Blob([imageBytes], { type: imageType })
    },
    mp3: audioFile.name,
    title: $('#title').val() || 'No title',
    artist: $('#artist').val() || 'No artist',
    album: $('#album').val() || 'No album',
    year: $('#year').val() || 'No year',
    track: $('#track').val() || 'No track',
    genre: $('#genre').val() || 'No genre',
    'record-label': $('#record-label').val() || 'No record label',
    copyright: license
  }

  for (const name in data) {
    const value = data[name]
    if (typeof value === 'object') formData.append(name, value.value, value.name)
    else formData.append(name, value)
  }

  noty({
    text: '<i class="fad fa-spinner-third fa-spin fa-lg"></i> Uploading file to server! Please wait for confirmation. Do not refresh browser.',
    layout: 'topRight',
    timeout: 16000
  })

  $.ajax('/music_upload_Operation.php', {
    type: 'POST',
    data: formData,
    dataType: 'json',
    contentType: false,
    cache: false,
    processData: false,
    complete: function () {
      $('#submit_btn').attr('disabled', null)
    },
    success: function (data) {
      noty({
        text: '<i class="far fa-check-circle fa-lg"></i> Submission was successful!',
        layout: 'topRight',
        type: 'success',
        timeout: 5000
      })
      window.location.reload()
    },
    error: function (xhr, status, error) {
      console.error(status, xhr, error)
      noty({
        text: 'Something went wrong. Error: ' + xhr.responseText,
        layout: 'topRight',
        type: 'error'
      })
    }
  })
}
