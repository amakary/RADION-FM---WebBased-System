
/* eslint-env jquery */

$(document).ready(function () {
  async function updatePrice () {
    return new Promise(function (resolve, reject) {
      $.ajax('/tezos-market.php', {
        method: 'GET',
        dataType: 'json',
        success: function (data, status, xhr) {
          const supply = data.supply.toFixed(2)
          const marketCapUsd = (data.circulating_supply * data.last).toFixed(2)
          const volumeUsd24Hr = data.volume_quote.toFixed(2)
          const changePercent24Hr = data.change.toFixed(2)
          const priceUsd = data.last.toFixed(2)
          const vwap24Hr = data.vwap.toFixed(2)

          window.priceUsd = priceUsd
          window.price = parseFloat((0.50 / window.priceUsd).toFixed(6))
          $('.tezos-name').text('Tezos')
          $('.tezos-symbol').text(data.base)
          // $('.tezos-rank').text(data.data.rank)
          $('.tezos-supply').text(supply)
          $('.tezos-market-cap-usd').text(marketCapUsd)
          $('.tezos-volume-usd-24hr').text(volumeUsd24Hr)
          $('.tezos-price-usd').text(priceUsd)
          $('.tezos-change-24hr').text(changePercent24Hr + '%')
          $('.tezos-vwap-24hr').text(vwap24Hr)
          if (data.change.toString().indexOf('-') > -1) {
            $('.tezos-change-24hr-up').hide()
            $('.tezos-change-24hr-down').show()
          } else {
            $('.tezos-change-24hr-up').show()
            $('.tezos-change-24hr-down').hide()
          }
        },
        error: function (xhr, status, error) {
          reject(error)
        }
      })
    })
  }

  updatePrice()
  setInterval(updatePrice, 10000)
})
