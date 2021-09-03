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
      <th rowspan="2">Total</th>
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
        <td>0.005%</td>
        <td align="right">
          <?php
          $rewardkategori1 = $d->cashin * (0.005 / 100);
          echo  number_format($rewardkategori1, '0', '', '.');
          ?>
        </td>
        <td align="right"><?= number_format($d->sisapiutang, '0', '', '.'); ?></td>
        <td>
          <?php
          $ratiokategori2 = (($d->sisapiutang / $d->cashin) * 100) * (50 / 100);
          echo number_format($ratiokategori2, '2', ',', '.') . "%";

          ?>
        </td>
        <td align="right">
          <?php
          if ($ratiokategori2 >= 0 and $ratiokategori2 <= 2) {
            $rewardkategori2 = 350000;
          } else  if ($ratiokategori2 > 2 and $ratiokategori2 <= 4) {
            $rewardkategori2 = 315000;
          } else  if ($ratiokategori2 > 4 and $ratiokategori2 <= 6) {
            $rewardkategori2 = 280000;
          } else  if ($ratiokategori2 > 6 and $ratiokategori2 <= 8) {
            $rewardkategori2 = 245000;
          } else  if ($ratiokategori2 > 8 and $ratiokategori2 <= 10) {
            $rewardkategori2 = 210000;
          } else  if ($ratiokategori2 > 10 and $ratiokategori2 <= 12) {
            $rewardkategori2 = 175000;
          } else  if ($ratiokategori2 > 12 and $ratiokategori2 <= 14) {
            $rewardkategori2 = 140000;
          } else  if ($ratiokategori2 > 14 and $ratiokategori2 <= 16) {
            $rewardkategori2 = 105000;
          } else  if ($ratiokategori2 > 16 and $ratiokategori2 <= 18) {
            $rewardkategori2 = 70000;
          } else  if ($ratiokategori2 > 18 and $ratiokategori2 <= 20) {
            $rewardkategori2 = 35000;
          } else {
            $rewardkategori2 = 0;
          }
          echo  number_format($rewardkategori2, '0', '', '.');
          ?>
        </td>
        <td align="center"><?php echo $d->lamalpc; ?></td>
        <td align="right">
          <?php
          if ($d->lamalpc == 1) {
            $rewardkategori3 = 350000;
          } else if ($d->lamalpc == 2) {
            $rewardkategori3 = 280000;
          } else if ($d->lamalpc == 3) {
            $rewardkategori3 = 210000;
          } else if ($d->lamalpc == 4) {
            $rewardkategori3 = 140000;
          } else if ($d->lamalpc == 5) {
            $rewardkategori3 = 70000;
          } else {
            $rewardkategori3 = 0;
          }
          echo  number_format($rewardkategori3, '0', '', '.');
          ?>
        </td>
        <td>
          <?php
          $total = $rewardkategori1 + $rewardkategori2 + $rewardkategori3;
          echo  number_format($total, '0', '', '.');
          ?>
        </td>
      </tr>
    <?php $no++;
    } ?>
  </tbody>
</table>