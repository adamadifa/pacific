<?php
function formatnumber($nilai)
{

  return number_format($nilai, '2', ',', '.');
}

?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/table.css">
<br>
<b style="font-size:16px; font-family:Calibri">
  LAPORAN INSENTIF KEPALA ADMIN<br>
  PERIODE BULAN <?= strtoupper($bulan[$bln]); ?> TAHUN <?= $tahun; ?><br>
</b>

<table class="datatable3">
  <thead>
    <tr>
      <th rowspan="2">NO</th>
      <th rowspan="2">CABANG</th>
      <th colspan="3">Kategori I</th>
      <th colspan="3">Kategori II</th>
      <th colspan="2">Kategori III</th>
    </tr>
    <tr>
      <th>Cash IN</th>
      <th>Ratio</th>
      <th>Reward</th>
      <th>LJT > 14</th>
      <th>Ratio</th>
      <th>Reward</th>
      <th>Waktu LPC</th>
      <th>Reward</th>
    </tr>
  </thead>
  <tbody style="font-size:14px">
    <?php
    $no = 1;
    foreach ($insentif as $d) {
    ?>
      <tr>
        <td><?= $no; ?></td>
        <td><?= $d->nama_cabang; ?></td>
        <td align="right"><?= number_format($d->cashin, '0', '', '.'); ?></td>
      </tr>
    <?php $no++;
    } ?>
  </tbody>
</table>