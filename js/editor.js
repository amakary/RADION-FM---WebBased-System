
/* eslint-env browser,jquery */
/* global noty,MP3Tag */

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

let imageBytes = null
let imageType = ''
let file = null
let mp3tag = null

$(document).ready(function () {
  $('#title, #artist, #album, #year').on('input', function () {
    const titleIn = $('#title').val()
    const artistIn = $('#artist').val()
    const albumIn = $('#album').val()
    const yearIn = $('#year').val()

    $('#title_name').text(titleIn)
    $('#artist_name').text(artistIn)
    $('#album_name').text(albumIn)
    $('#year_name').text(yearIn)
  })

  $('#filename1').on('change', function () {
    const files = $(this).prop('files')
    if (files.length > 0) {
      file = files[0]
      readTags(file)
    }
  })

  $('#filename2').on('change', async function () {
    const files = $(this).prop('files')
    if (files.length > 0) {
      const image = files[0]
      const buffer = await loadFile(image)
      imageBytes = new Uint8Array(buffer)
      imageType = image.type

      const url = imageURL(imageBytes, imageType)
      $('#cover-preview, #preview-cover').attr('src', url)
    }
  })

  $('#button-save').click(function () {
    writeTags()
  })

  $('#button-download').click(function () {
    $(this).attr({
      href: URL.createObjectURL(file),
      download: file.name
    })
  })
})

async function readTags (file) {
  noty({ text: 'Reading current tags', layout: 'topRight' })

  mp3tag = new MP3Tag(await loadFile(file))
  mp3tag.read()
  if (mp3tag.error !== '') {
    noty({ text: 'Unable to read tags', layout: 'topRight', type: 'error' })
    return
  }

  const tags = mp3tag.tags
  $('#title').val(tags.title)
  $('#artist').val(tags.artist)
  $('#album').val(tags.album)
  $('#year').val(tags.year)
  $('#track').val(tags.track)
  $('#genre').val(tags.genre)
  $('#comment').val(tags.comment)

  $('#title_name').text(tags.title)
  $('#artist_name').text(tags.artist)
  $('#album_name').text(tags.album)
  $('#year_name').text(tags.year)

  if (tags.v2) {
    if (tags.v2.APIC && tags.v2.APIC.length > 0) {
      const image = tags.v2.APIC[0]
      $('#cover-preview, #preview-cover').attr({
        src: imageURL(image.data, image.format)
      })
    }

    if (tags.v2.TCOM) $('#composer').val(tags.v2.TCOM)
  }
}

async function writeTags () {
  if (file === null) return

  mp3tag.tags.v1 = mp3tag.tags.v1 || {}
  mp3tag.tags.v2 = mp3tag.tags.v2 || {}

  mp3tag.tags.title = $('#title').val()
  mp3tag.tags.artist = $('#artist').val()
  mp3tag.tags.album = $('#album').val()
  mp3tag.tags.year = $('#year').val()
  mp3tag.tags.track = $('#track').val()
  mp3tag.tags.comment = $('#comment').val()
  mp3tag.tags.genre = $('#genre').val()
  mp3tag.tags.v2.TCOM = $('#composer').val()

  if (imageBytes !== null) {
    mp3tag.tags.v2.APIC = [{
      format: imageType,
      type: 3,
      description: '',
      data: imageBytes
    }]
  }

  mp3tag.save()
  if (mp3tag.error !== '') {
    noty({ text: 'Unable to write tags', layout: 'topRight', type: 'error' })
    return
  }

  file = new File([mp3tag.buffer], file.name, { type: file.type })
  noty({
    text: 'MP3 Modified Successfully. Ready to Download!',
    layout: 'topRight',
    type: 'success'
  })
}
