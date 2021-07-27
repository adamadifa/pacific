<?php

function uang($nilai)
{

  return number_format($nilai, 0, ',', '.');
}
// error_reporting(0);
?>
<style>
  .besar {
    text-transform: uppercase;
  }
</style>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/table.css">
<br>
<b style="font-size:20px; font-family:Calibri" class="besar">
  MAKMUR PERMATA<br>
  <?php if($angkutan == ''){ ?>
    LAPORAN SEMUA ANGKUTAN<br>
  <?php }else{ ?>
    LAPORAN ANGKUTAN <?php echo $angkutan;?> <br>
  <?php } ?>
  PERIODE <?php echo DateToIndo2($dari) . " s/d " . DateToIndo2($sampai); ?><br>
</b>
<br>
<style>
tr:nth-child(even) {
  background-color: #d6d6d6c2;
}
</style>
<table class="datatable3" style="width:100%" border="1">
  <thead>
    <tr>
      <th bgcolor="#024a75" style="color:white; font-size:14;">NO</th>
      <th bgcolor="#024a75" style="color:white; font-size:14;">TANGGAL MUTASI</th>
      <th bgcolor="#024a75" style="color:white; font-size:14;">NO. POL</th>
      <th bgcolor="#024a75" style="color:white; font-size:14;">ANGKUTAN</th>
      <th bgcolor="#024a75" style="color:white; font-size:14;">TUJUAN</th>
      <th bgcolor="#024a75" style="color:white; font-size:14;">NO SJ</th>
      <th bgcolor="#024a75" style="color:white; font-size:14;">KETERANGAN</th>
      <th bgcolor="#024a75" style="color:white; font-size:14;">TARIF</th>
      <th bgcolor="#024a75" style="color:white; font-size:14;">TEPUNG</th>
      <th bgcolor="#024a75" style="color:white; font-size:14;">BS</th>
      <th bgcolor="#024a75" style="color:white; font-size:14;">TOTAL</th>
      <th bgcolor="#024a75" style="color:white; font-size:14;">TGL KONTRABON</th>
      <th bgcolor="#024a75" style="color:white; font-size:14;">TGL BAYAR</th>
    </tr>
  </thead>
  <tbody>
    <?php 
      $tarif    = 0;
      $tepung   = 0;
      $total    = 0;
      $bs       = 0;
      $no       = 1;
      foreach ($data as $d ) { 
        $tepung     += $d->tepung;
        $tarif      += $d->tarif;
        $bs         += $d->bs;
        $total      += $d->bs + $d->tepung + $d->tarif;
        $tgl_kontrabon    = $d->tgl_kontrabon;
        $tgl_bayar        = $d->tgl_bayar;

        if($d->tgl_bayar != NULL){
          $bgcolor = "skyblue";
        }else{
          $bgcolor = "";
        }
      ?>
      <tr>
        <td><?php echo $no++;?></td>
        <td><?php echo DateToIndo2($d->tgl_mutasi_gudang); ?></td>
        <td><?php echo $d->nopol; ?></td>
        <td><?php echo $d->angkutan; ?></td>
        <td><?php echo $d->tujuan; ?></td>
        <td><?php echo $d->no_surat_jalan; ?></td>
        <td><?php echo $d->keterangan; ?></td>
        <td align="right"><?php echo number_format($d->tarif); ?></td>
        <td align="right"><?php echo number_format($d->tepung); ?></td>
        <td align="right"><?php echo number_format($d->bs); ?></td>
        <td align="right"><?php echo number_format($d->bs+$d->tepung+$d->tarif); ?></td>
        <td><?php if($d->tgl_kontrabon != "") {  echo DateToIndo2($d->tgl_kontrabon); }else{ echo ""; } ?></td>
        <td bgcolor="<?php echo $bgcolor;?>"><?php if($d->tgl_bayar != "") {  echo DateToIndo2($d->tgl_bayar); }else{ echo ""; } ?></td>
      </tr>
    <?php } ?>
  </tbody>
  <tfoot>
    <tr bgcolor="#31869b">
      <th colspan="7" style="color:white; font-size:14;">TOTAL</th>
      <th style="color:white; font-size:14;text-align:right"><?php echo uang($tarif); ?></th>
      <th style="color:white; font-size:14;text-align:right"><?php echo uang($tepung); ?></th>
      <th style="color:white; font-size:14;text-align:right"><?php echo uang($bs); ?></th>
      <th style="color:white; font-size:14;text-align:right"><?php echo uang($total); ?></th>
      <th colspan="2" style="color:white; font-size:14;"></th>
    </tr>
  </tfoot>
</table>