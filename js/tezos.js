
/* eslint-env jquery */

$(document).ready(function () {
  async function updatePrice () {
    return new Promise(function (resolve, reject) {
      $.ajax('/tezos-market.php', {
        method: 'GET',
        dataType: 'json',
        success: function (data, status, xhr) {
          data.supply = data.supply || 0
          data.circulating_supply = data.circulating_supply || 0

          const supply = data.supply.toFixed(2)
          const marketCapUsd = (data.circulating_supply * data.last).toFixed(2)
          const volumeUsd24Hr = data.volume_quote.toFixed(2)
          const changePercent24Hr = data.change.toFixed(2)
          const priceUsd = data.last.toFixed(2)
          const vwap24Hr = data.vwap.toFixed(2)

          window.priceUsd = priceUsd
          window.price = parseFloat((1.00 / window.priceUsd).toFixed(6))
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

async function getBalances (address, contract, network = 'mainnet') {
  const balances = []
  let total = -1

  while (total === -1 || balances.length !== total) {
    const url = `https://api.better-call.dev/v1/account/${network}/${address}/token_balances`
    const response = await $.get(url, {
      contract: contract,
      size: 10,
      offset:  balances.length
    }, 'json')

    balances.push(...response.balances)
    total = response.total
  }

  return balances
}

async function getTokens (contract, network = 'mainnet') {
  const tokens = []
  const total = await getTokensCount(contract)

  while (tokens.length !== total) {
    const url = `https://api.better-call.dev/v1/contract/${network}/${contract}/tokens`
    const response = await $.get(url, {
      size: 10,
      offset: tokens.length
    }, 'json')

    tokens.push(...response)
  }

  return tokens
}

async function getTokensCount (contract, network = 'mainnet') {
  const url = `https://api.better-call.dev/v1/contract/${network}/${contract}/tokens/count`
  const response = await $.getJSON(url)
  return response.count
}

async function getBigmapCount (pointer, network = 'mainnet') {
  const url = `https://api.better-call.dev/v1/bigmap/${network}/${pointer}/count`
  const response = await $.getJSON(url)
  return response.count
}

/**
 *  Parses MichelsonMap to JavaScript object
 *
 *  @param {object} michelson      MichelsonMap code to decode
 *  @param {object} parseBigmap    Parse bigmap
 *
 *  @return {object}
 */
function parseMichelsonMap (michelson, parseBigmap = {}) {
  if (Array.isArray(michelson)) {
    const parsed = []
    for (let i = 0; i < michelson.length; i++) {
      const parsedObject = parseMichelsonMap(michelson[i], parseBigmap)
      parsed.push(parsedObject)
    }
    return parsed
  }

  if (michelson.type === 'namedtuple' || michelson.type === 'map') {
    const parsed = {}
    for (let i = 0; i < michelson.children.length; i++) {
      const child = michelson.children[i]
      parsed[child.name] = parseMichelsonMap(child, parseBigmap)
    }
    return parsed
  }

  if (michelson.type === 'big_map') {
    if (typeof parseBigmap !== 'undefined') {
      return new Promise(async (resolve, reject) => {
        const network = parseBigmap.network || 'mainnet'
        const includeNone = parseBigmap.includeNone || false
        const url = `https://api.better-call.dev/v1/bigmap/${network}/${michelson.value}/keys`
        const keys = {}
        const count = await getBigmapCount(michelson.value, network)

        for (let x = 0; x < count; x++) {
          const response = await $.get(url, {
            size: 10,
            offset: x * 10
          }, 'json')

          for (let i = 0; i < response.length; i++) {
            const key = response[i]
            if (key.count === 1 && !includeNone) continue
            const value = parseMichelsonMap(key.data.value, parseBigmap)
            keys[key.data.key_string] = value
          }
        }

        resolve(keys)
      })
    } else return { bigMap: michelson.value }
  }

  if (michelson.type === 'option' && michelson.value === 'None') {
    return null
  }

  if (michelson.type === 'nat' || michelson.type === 'mutez') {
    return parseInt(michelson.value)
  }

  return michelson.value
}
