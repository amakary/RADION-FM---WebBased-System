<?php

$groupswithaccess = 'RADIONER,CEO,FOUNDER';

require_once '../slpw/sitelokpw.php';
require_once '../slpw/slconfig.php';

$song_query = "SELECT `SONG_ID` AS `ID`,`RDON_ID`,`IPFS_CID`,`SONG_NAME`,`SONG_STATUS`,`SONG_GENRE`,`TOTAL_STREAM`, (SELECT COUNT(*) FROM `song_downloads` WHERE `SONG_ID`=`ID`) AS `TOTAL_DOWNLOAD` FROM `song` WHERE `USER_NAME`='$slusername' ORDER BY `SONG_ID` DESC";
$result = $con->query($song_query);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_object()) {
    $format = $row->IPFS_CID ? 'WAV' : 'MP3';
?>
  <tr>
    <td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd; font-size:11px;"><?= $row->RDON_ID ?></td>
    <td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd; font-size:11px;"><?= $format ?></td>
    <td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd; font-size:11px;"><?= $row->SONG_NAME ?></td>
    <td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd; font-size:11px;"><?= $row->SONG_GENRE ?></td>
    <td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd; font-size:11px;">
      <?php if ($format === 'MP3') { ?>
      <span class="label label-warning">Eligible</span>
      <?php } else if ($format === 'WAV') { ?>
      &nbsp;&nbsp;&nbsp;&nbsp;<i class="far fa-check-circle fa-lg" style='color:#229954;'></i>
      <?php } ?>
    </td>
    <td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd; font-size:11px;"><?= $row->TOTAL_STREAM ?></td>
    <td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd; font-size:11px;"><?= $row->TOTAL_DOWNLOAD ?></td>
    <td style="padding-top:5px; padding-bottom:5px; border-bottom: 1px solid #dddddd; font-size:11px;">
      <a href="javascript:void(0)" class="btn btn-default btn-xs" role="button" data-delete="<?= $row->RDON_ID ?>" data-delete-name="<?= $row->SONG_NAME ?>"><i class="far fa-exclamation-circle" style="color:#C0392B;"></i> Delete permanently</a>
    </td>
  </tr>
<?php
  }
}
?>
<script>
window.deleteID = window.deleteID || ''
$('[data-delete]').click(async function (event) {
  event.preventDefault()
  const id = $(this).attr('data-delete')
  const name = $(this).attr('data-delete-name')

  window.deleteID = id
  $('#delete-name').text(name)
  $('#modal_basic').modal('show')

})
</script>
