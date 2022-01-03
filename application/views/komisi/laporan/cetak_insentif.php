<?php
function formatnumber($nilai)
{

  return number_format($nilai, '2', ',', '.');
}
$tgl1 = "2021-08-31";
$tanggal = $tahun . "-" . $bln . "-" . "31";
if ($bln == 9 and $tahun = "2021") {
  $persentaseljt = 55;
} else if ($bln == 10 and $tahun = "2021") {
  $persentaseljt = 60;
} else if ($bln == 11 and $tahun = "2021") {
  $persentaseljt = 65;
} else if ($bln >= 12 and $tahun = "2021") {
  $persentaseljt = 70;
} else if ($bln <= 8 and $tahun = "2021") {
  $persentaseljt = 50;
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
          $ratiokategori2 = (($d->sisapiutang / $d->cashin) * 100) * ($persentaseljt / 100);
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

<br>
<table>
  <tr>
    <td>
      <table class="datatable3">
        <thead>
          <tr>
            <th colspan="3">Ratio LJT > 14 Hari(%) Reward</th>
          </tr>
        </thead>
        <tbody style="font-size:14px">
          <tr>
            <td>20%</td>
            <td>></td>
            <td>-</td>
          </tr>
          <tr>
            <td>19%</td>
            <td>20%</td>
            <td align="right">35.000</td>
          </tr>
          <tr>
            <td>17%</td>
            <td>18%</td>
            <td align="right">70.000</td>
          </tr>
          <tr>
            <td>15%</td>
            <td>16%</td>
            <td align="right">105.000</td>

          </tr>
          <tr>
            <td>13%</td>
            <td>14%</td>
            <td align="right">140.000</td>
          </tr>
          <tr>
            <td>11%</td>
            <td>12%</td>
            <td align="right">175.000</td>
          </tr>
          <tr>
            <td>9%</td>
            <td>10%</td>
            <td align="right">21.000</td>
          </tr>
          <tr>
            <td>7%</td>
            <td>8%</td>
            <td align="right">245.000</td>
          </tr>
          <tr>
            <td>5%</td>
            <td>6%</td>
            <td align="right">280.000</td>
          </tr>
          <tr>
            <td>3%</td>
            <td>4%</td>
            <td align="right">315.000</td>
          </tr>
          <tr>
            <td>2%</td>
            <td>0%</td>
            <td align="right">350.000</td>
          </tr>

        </tbody>
      </table>
    </td>
    <td valign="top">
      <table class="datatable3">
        <thead>
          <tr>
            <th>LPC(Hari)</th>
            <th>Reward</th>
          </tr>
        </thead>
        <tbody style="font-size:14px">
          <tr>
            <td>5+</td>
            <td>-</td>
          </tr>
          <tr>
            <td>5</td>
            <td align="right">70.000</td>
          </tr>
          <tr>
            <td>4</td>
            <td align="right">140.000</td>
          </tr>
          <tr>
            <td>3</td>
            <td align="right">210.000</td>
          </tr>
          <tr>
            <td>2</td>
            <td align="right">280.000</td>
          </tr>
          <tr>
            <td>1</td>
            <td align="right">350.000</td>
          </tr>

        </tbody>
      </table>
    </td>
    <td valign="top">
      <table class="datatable3">
        <tbody style="font-size:14px">
          <tr>
            <td>
              Asumsi pemberlakuan kebijakan LJT
            </td>
          </tr>
          <tr style="background-color: red; color:white">
            <td>
              <?php echo $persentaseljt; ?>%
            </td>
          </tr>
        </tbody>
      </table>
    </td>
  </tr>
</table>