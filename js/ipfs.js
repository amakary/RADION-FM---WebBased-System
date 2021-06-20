
const ipfsNodeAsync = Ipfs.create()

/**
 *  Reads a file content from IPFS
 *
 *  @param {string} cid          CID of file from IPFS
 *  @param {string|null} type    Type of file. Returns data URL if set
 *  @return {string|ArrayBuffer}
 */
async function getIPFS (cid, type = null) {
  const ipfsNode = await ipfsNodeAsync
  let buffer = null
  let url = ''

  for await (const file of ipfsNode.get(cid)) {
    buffer = new ArrayBuffer(file.size)
    const view = new Uint8Array(buffer)
    let read = 0

    for await (const chunk of file.content) {
      view.set(chunk, read)
      read += chunk.length
    }
  }

  if (type !== null) {
    const blob = new Blob([buffer], { type: type })
    return new Promise(function (resolve, reject) {
      const reader = new FileReader()
      reader.onload = function (e) {
        resolve(e.target.result)
      }
      reader.readAsDataURL(blob)
    })
  } else return buffer
}

async function ipfsAdd (data) {
  const formData = new FormData()
  formData.append(typeof data === 'string' ? 'text' : 'file', data)
  return new Promise((resolve, reject) => {
    $.ajax('/ipfs/add.php', {
      type: 'POST',
      data: formData,
      cache: false,
      dataType: 'json',
      processData: false,
      contentType: false,
      success: function (data, status, xhr) {
        if (data.success) {
          const response = { cid: data.message }
          resolve(response)
        } else reject(data.message)
      },
      error: function (xhr, status, error) {
        reject(error)
      }
    })
  })
}
