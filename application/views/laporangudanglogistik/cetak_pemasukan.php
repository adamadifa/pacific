<?php

function uang($nilai)
{

  return number_format($nilai, 2, ',', '.');
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
<style>
tr:nth-child(even) {
  background-color: #d6d6d6c2;
}
</style>
<table class="datatable3" style="width:100%; size: A4;zoom:80%" border="1">
  <thead>
    <tr>
      <th rowspan="2" bgcolor="#024a75" style="color:white; font-size:14;">NO</th>
      <th rowspan="2" bgcolor="#024a75" style="color:white; font-size:14;">TANGGAL</th>
      <th rowspan="2" bgcolor="#024a75" style="color:white; font-size:14;">SUPPLIER</th>
      <th rowspan="2" bgcolor="#024a75" style="color:white; font-size:14;">BUKTI</th>
      <th colspan="8" bgcolor="#28a745" style="color:white; font-size:14;">BARANG MASUK</th>
    </tr>
    <tr bgcolor="red">
      <th style="color:white; font-size:14;" bgcolor="red">NAMA BARANG</th>
      <th style="color:white; font-size:14;" bgcolor="red">SATUAN</th>
      <th style="color:white; font-size:14;" bgcolor="red">KETERANGAN</th>
      <th style="color:white; font-size:14;" bgcolor="red">AKUN</th>
      <th style="color:white; font-size:14;" bgcolor="red">HARGA</th>
      <th style="color:white; font-size:14;" bgcolor="red">QTY</th>
      <th style="color:white; font-size:14;" bgcolor="red">PENYESUAIAN</th>
      <th style="color:white; font-size:14;" bgcolor="red">SUBTOTAL</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $no = 1;
    $harga = 0;
    $qty = 0;
    foreach ($data as $key => $d) {
      $harga   = $harga + $d->qty * $d->harga + $d->penyesuaian;
      $qty     = $qty + $d->qty;
    ?>
      <tr style="font-size: 14">
        <td><?php echo $no++; ?></td>
        <td><?php echo DateToIndo2($d->tgl_pemasukan); ?></td>
        <td><?php echo $d->nama_supplier; ?></td>
        <td><?php echo $d->nobukti_pemasukan; ?></td>
        <td><?php echo $d->nama_barang; ?></td>
        <td><?php echo $d->satuan; ?></td>
        <td><?php echo $d->keterangan; ?></td>
        <td><?php echo $d->kode_akun; ?> <?php echo $d->nama_akun; ?></td>
        <td align="right"><?php echo uang($d->harga); ?></td>
        <td align="center"><?php echo uang($d->qty); ?></td>
        <td align="right"><?php echo uang($d->penyesuaian); ?></td>
        <td align="right"><?php echo uang($d->qty * $d->harga + $d->penyesuaian); ?></td>
      </tr>
    <?php
    }
    ?>
    <tr bgcolor="#024a75" style="color:white; text-align: center;font-size: 16px">
      <td colspan="9" bgcolor="#024a75">TOTAL</td>
      <td align="center" bgcolor="#024a75"><?php echo uang($qty); ?></td>
      <td bgcolor="#024a75"></td>
      <td align="right" bgcolor="#024a75"><?php echo uang($harga); ?></td>
    </tr>
  </tbody>
</table>