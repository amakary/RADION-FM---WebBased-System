
/**
 *  Downloads URL
 *
 *  @param {string} url         URL to download
 *  @param {string} filename    Filename of the file to download
 */
function downloadURL (url, filename) {
  const a = document.createElement('A')
  a.href = url
  a.download = filename
  a.click()
}

/**
 *  Decodes bytes as hex to string
 *
 *  @param {string} bytes    Bytes to decode
 *  @return {string}
 */
function parseBytes (bytes) {
  let string = ''
  for (let i = 0; i < bytes.length; i += 2) {
    const charcode = parseInt(bytes.substr(i, 2), 16)
    string += String.fromCharCode(charcode)
  }

  return string
}

/**
 *  Parsed Data URL as JSON
 *
 *  @param {string} url    Data URL
 *  @return {object}
 */
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

/**
 *  Reads file as an array buffer
 *
 *  @param {File} file    File to read
 *  @return {ArrayBuffer}
 */
function readFile (file) {
  return new Promise((resolve, reject) => {
    const reader = new FileReader()
    reader.onload = function () {
      resolve(this.result)
    }

    reader.readAsArrayBuffer(file)
  })
}

/**
 *  Encodes a string to hex
 *
 *  @param {string} string    String to encode
 *  @return {string}
 */
function strToHex (string) {
  let result = ''
  string = string.toString()

  for (let i = 0; i < string.length; i++) {
    const hex = string.charCodeAt(i).toString(16)
    result += hex
  }

  return result
}

/**
 *  Parses MichelsonMap to JavaScript object
 *  @param {object} michelson    MichelsonMap code to decode
 *  @return {object}
 */
function parseMichelsonMap (michelson) {
  if (Array.isArray(michelson)) {
    const parsed = []
    for (let i = 0; i < michelson.length; i++) {
      const parsedObject = parseMichelsonMap(michelson[i])
      parsed.push(parsedObject)
    }
    return parsed
  }

  if (michelson.type === 'namedtuple') {
    const parsed = {}
    for (let i = 0; i < michelson.children.length; i++) {
      const child = michelson.children[i]
      parsed[child.name] = parseMichelsonMap(child)
    }
    return parsed
  }

  if (michelson.type === 'big_map') {
    return { bigMap: michelson.value }
  }

  if (michelson.type === 'option' && michelson.value === 'None') {
    return null
  }

  if (michelson.type === 'nat' || michelson.type === 'mutez') {
    return parseInt(michelson.value)
  }

  return michelson.value
}
