<?php

$groupswithaccess = 'RADIONER,CEO,FOUNDER';

require_once '../slpw/sitelokpw.php';
require_once '../slpw/slconfig.php';

$song_query = "SELECT `SONG_ID` AS `ID`,`RDON_ID`,`IPFS_CID`,`SONG_NAME`,`SONG_GENRE`,`SONG_STATUS`,`TOTAL_STREAM`, (SELECT COUNT(*) FROM `song_downloads` WHERE `SONG_ID`=`ID`) AS `TOTAL_DOWNLOAD` FROM `song` WHERE `USER_NAME`='$slusername' ORDER BY `SONG_ID` DESC";
$result = $con->query($song_query);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_object()) {
    $format = $row->IPFS_CID ? 'WAV' : 'MP3';
?>
  <tr>
    <td class="rdon-id" style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd;"><?= $row->RDON_ID ?></td>
    <td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd;"><?= $format ?></td>
    <td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd;"><?= $row->SONG_NAME ?></td>
    <td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd;"><?= $row->SONG_GENRE ?></td>
    <td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd;">
      <?php if ($format === 'MP3') { ?>
      <span class="btn-create-nft label label-warning" style="cursor:pointer;">Eligible</span>
      <?php } else if ($format === 'WAV')  { ?>
      &nbsp;&nbsp;&nbsp;&nbsp;<i class="far fa-check-circle fa-lg" style='color:#229954;'></i>
      <?php } ?>
    </td>
    <td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd;"><?= $row->TOTAL_STREAM ?></td>
    <td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd;"><?= $row->TOTAL_DOWNLOAD ?></td>
  </tr>

  <script>
  async function getSongData (id) {
    return new Promise((resolve, reject) => {
      $.ajax('/php/get_song_metadata.php', {
        type: 'GET',
        data: { id: id },
        dataType: 'json',
        success: function (data, xhr, status) {
          resolve(data)
        },
        error: function (xhr, status, error) {
          reject(error)
        }
      })
    })
  }

  $('.btn-create-nft').click(async function (event) {
    const id = $(this).parent().parent().find('.rdon-id').text()
    const username = '<?= $slusername ?>'
    const songData = await getSongData(id)
    if (username !== songData.uploader) return

    const license = songData.copyright_message[0]
    const attr = license.split(' ')[1].split('-')

    $('#cover-preview').attr('src', '/php/get_artwork.php?id=' + id)
    $('#id').val(id)
    $('#title').val(songData.title[0])
    $('#artist').val(songData.artist[0])
    $('#album').val(songData.album_saved)
    $('#year').val(songData.year[0])
    $('#track').val(songData.track_number[0])
    $('#genre').val(songData.genre[0])
    $('#license').val(songData.copyright_message[0])
    $('#record-label').val(songData.record)
    $('#filesize').val(songData.filesize)
    window.history.pushState('', '', '/mint.php?id=' + id)
  })
  </script>
<?php
  }
}
?>
