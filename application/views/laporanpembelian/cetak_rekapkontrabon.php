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
  REKAP KONTRABON <br>
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
  <tbody style="font-size:12px">
    <?php $no = 1;
    $total = 0;
    foreach ($pf as $k) {
      $total = $total + $k->jumlah; ?>
      <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $k->no_dokumen; ?></td>
        <td><?php echo $k->nama_supplier; ?></td>
        <td>
          <?php
          if ($k->ppn == 1) {
            echo "FP";
          }
          ?>
        </td>
        <td align="right"><?php echo uang($k->jumlah); ?></td>
        <td align="center"><?php echo $k->norekening; ?></td>
      </tr>
    <?php $no++;
    } ?>
    <tr>
      <th colspan="4">TOTAL</th>
      <th align="right"><?php echo uang($total); ?></th>
    </tr>
  </tbody>
</table>
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
  <tbody style="font-size:12px">
    <?php $no = 1;
    $total = 0;
    foreach ($kb as $k) {
      $total = $total + $k->jumlah; ?>
      <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $k->no_dokumen; ?></td>
        <td><?php echo $k->nama_supplier; ?></td>
        <td>
          <?php
          if ($k->ppn == 1) {
            echo "FP";
          }
          ?>
        </td>
        <td align="right"><?php echo uang($k->jumlah); ?></td>
        <td align="center"><?php echo $k->norekening; ?></td>
      </tr>
    <?php $no++;
    } ?>
    <tr>
      <th colspan="4">TOTAL</th>
      <th align="right"><?php echo uang($total); ?></th>
    </tr>
  </tbody>
</table>