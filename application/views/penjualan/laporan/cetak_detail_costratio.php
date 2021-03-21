<?php
error_reporting(0);
function uang($nilai)
{

  return number_format($nilai, '0', '', '.');
}
?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/table.css">
<b style="font-size:14px; font-family:Calibri">
  DETAIL COST RATIO <br>
  PACIFIC-MAKMUR PERMATA <br>
  CABANG <?php echo $cabang;?> <br>
  <?php echo DateToIndo2($dari) . " s/d " . DateToIndo2($sampai); ?>
</b>

<br>
<br>
<table class="datatable3" border="1">
  <thead>
  <tr style="background-color: #024a75;color:white">
    <th>No</th>
    <th>Tgl Transaksi</th>
    <th>Kode Akun</th>
    <th>Nama Akun</th>
    <th>Keterangan</th>
    <th>Jumlah</th>
    <th>Sumber</th>
    <th>Cabang</th>
  </tr>
  </thead>
  <tbody>
    <?php
      $no = 1;
      foreach ($data as $d) {
        
        $sumber = $d->id_sumber_costratio;
        if ($sumber == 1) {
          $color = "#bbf5e0";
        } else if ($sumber == 2) {
          $color = "#a1e9ef";
        } else {
          $color = "";
        }
      ?>
        <tr style="background-color:<?php echo $color; ?>">
          <td><?php echo $no; ?></td>
          <td><?php echo DateToIndo2($d->tgl_transaksi); ?></td>
          <td><?php echo $d->kode_akun ?></td>
          <td><?php echo $d->nama_akun ?></td>
          <td><?php echo $d->keterangan ?></td>
          <td align="right"><?php echo uang($d->jumlah) ?></td>
          <td><?php echo $d->nama_sumber ?></td>
          <td><?php echo $d->kode_cabang ?></td>
        </tr>
    <?php
        $no++;
    } ?>
  </tbody>
</table>