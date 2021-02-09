<?php

function uang($nilai)
{

  return number_format($nilai, '0', '', '.');
}

error_reporting(0);

?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/table.css">
<br>
<b style="font-size:16px; font-family:Calibri">
  MAKMUR PERMATA<br>
  REKAPITULASI BARANG MASUK<br>
  PERIODE <?php echo DateToIndo2($dari) . " s/d " . DateToIndo2($sampai); ?><br><br>
</b>
<br>
<table class="datatable3" style="width:100%" border="1">
  <thead>
    <tr>
      <th rowspan="2" bgcolor="#024a75" style="color:white; font-size:14;">NO</th>
      <th rowspan="2" bgcolor="#024a75" style="color:white; font-size:14;">TANGGAL</th>
      <th rowspan="2" bgcolor="#024a75" style="color:white; font-size:14;">BUKTI</th>
      <th rowspan="2" bgcolor="#024a75" style="color:white; font-size:14;">JENIS PEMASUKAN</th>
      <th colspan="7" bgcolor="#28a745" style="color:white; font-size:14;">BARANG MASUK</th>
    </tr>
    <tr bgcolor="#024a75">
      <th style="color:white; font-size:14;">NAMA BARANG</th>
      <th style="color:white; font-size:14;">SATUAN</th>
      <th style="color:white; font-size:14;">KETERANGAN</th>
      <th style="color:white; font-size:14;">QTY</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $qty    = 0;
    $no     = 1;
    foreach ($data as $key => $d) {
      $qty      = $qty + $d->qty;
    ?>
      <tr style="font-size: 14">
        <td><?php echo $no++; ?></td>
        <td><?php echo DateToIndo2($d->tgl_pemasukan); ?></td>
        <td><?php echo $d->nobukti_pemasukan; ?></td>
        <td><?php echo $d->kode_dept; ?></td>
        <td><?php echo $d->nama_barang; ?></td>
        <td><?php echo $d->satuan; ?></td>
        <td><?php echo $d->keterangan; ?></td>
        <td align="center"><?php echo number_format($d->qty, 2); ?></td>
      </tr>
    <?php
    }
    ?>
  </tbody>
  <tfoot bgcolor="#024a75" style="color:white; font-size:14;">
    <tr>
      <th style="color:white; font-size:14;" colspan="7">TOTAL</th>
      <th style="color:white; font-size:14;"><?php echo number_format($qty, 2); ?></th>
    </tr>
  </tfoot>
</table>