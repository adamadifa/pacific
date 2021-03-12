<?php
error_reporting(0);
function uang($nilai)
{
  return number_format($nilai, '2', ',', '.');
}
function angka($nilai)
{
  return number_format($nilai, '2', ',', '.');
}
?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/table.css">
<br>
<b style="font-size:14px; font-family:Calibri">
  REKAP PEMBELIAN <?php echo $jenis; ?> <br>
  PERIODE <?php echo DateToIndo2($dari) . " s/d " . DateToIndo2($sampai); ?><br>
</b>
<br>
<br>
<table class="datatable3" style="width:70%" border="1">
  <thead bgcolor="#024a75" style="color:white; font-size:12;">
    <tr bgcolor="#024a75" style="color:white; font-size:12; text-align:center">
      <td>NO</td>
      <td>NO KONTRABON</td>
      <td>NAMA SUPPLIER</td>
      <td>KET</td>
      <td>JUMLAH</td>
      <td>NO REKENING</td>
  </thead>
  <tbody>
    <?php $No = 1;
    foreach ($kb as $k) { ?>
      <tr>
        <td><?php echo $no; ?></td>
      </tr>
    <?php $no++;
    } ?>
  </tbody>
</table>