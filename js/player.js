
$(document).ready(function () {
  const player = new Audio()
  let currentId = null

  player.addEventListener('timeupdate', function (event) {
    if (currentId) {
      const percent = (player.currentTime / player.duration) * 100
      $('#progress-' + currentId).attr('aria-valuenow', percent)
      $('#progress-' + currentId).css('width', percent + '%')
    }
  })

  player.addEventListener('ended', function (event) {
    if (currentId) {
      const b64 = btoa(currentId)
      const element = $('[href^="/' + b64 + '/"]')
      iconPlay(element)
      $.post('/php/play.php', { id: currentId })
    }
  })

  const iconPause = function (element) {
    $('[data-hash]').html('<i class="fas fa-play fa-lg"></i>')
    $(element).html('<i class="fas fa-pause fa-lg"></i>')
  }

  const iconPlay = function (element) {
    $(element).html('<i class="fas fa-play fa-lg"></i>')
  }

  $('[data-hash]').click(function (event) {
    event.preventDefault()

    const href = $(this).attr('href').split('/')[1]
    const songId = atob(href)

    if (songId !== currentId) {
      const hash = $(this).attr('data-hash')
      const search = new URLSearchParams()
      search.append('hash', hash)
      search.append('id', songId)

      currentId = songId
      player.src = '/asset.php?' + search.toString()
      player.play()
      iconPause(this)
    } else {
      if (player.paused) {
        player.play()
        iconPause(this)
      } else {
        player.pause()
        iconPlay(this)
      }
    }
  })

  const search = new URLSearchParams(window.location.search)
  if (search.get('autoplay')) {
    const firstPlayer = $('[data-hash]')[0]
    $(firstPlayer).click()
  }
})
