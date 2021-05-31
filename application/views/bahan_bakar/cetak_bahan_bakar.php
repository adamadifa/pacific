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
  REKAPITULASI PERSEDIAAN <?php echo $barang['nama_barang']; ?><br>
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
      <th rowspan="3" bgcolor="#024a75" style="color:white; font-size:14;">TANGGAL</th>
      <!-- <th rowspan="2" bgcolor="#024a75" style="color:white; font-size:14;">BTB</th> -->
      <th rowspan="2" colspan="3" bgcolor="green" style="color:white; font-size:14;">SALDO AWAL</th>
      <th colspan="6" bgcolor="#024a75" style="color:white; font-size:14;">MASUK</th>
      <th colspan="3" bgcolor="#024a75" style="color:white; font-size:14;">KELUAR</th>
      <th rowspan="2" colspan="3" bgcolor="green" style="color:white; font-size:14;">SALDO AKHIR</th>
    </tr>
    <tr >
      <th bgcolor="green" style="color:white; font-size:14;" colspan="3">PEMBELIAN</th>
      <th bgcolor="green" style="color:white; font-size:14;" colspan="3">PENERIMAAN LAINNYA</th>
      <th bgcolor="green" style="color:white; font-size:14;" colspan="3">PEMAKAIAN</th>
    </tr>
    <tr >
      <th bgcolor="#024a75" style="color:white; font-size:14;">QTY</th>
      <th bgcolor="#024a75" style="color:white; font-size:14;">HARGA</th>
      <th bgcolor="#024a75" style="color:white; font-size:14;">JUMLAH</th>
      <th bgcolor="#024a75" style="color:white; font-size:14;">QTY</th>
      <th bgcolor="#024a75" style="color:white; font-size:14;">HARGA</th>
      <th bgcolor="#024a75" style="color:white; font-size:14;">JUMLAH</th>
      <th bgcolor="#024a75" style="color:white; font-size:14;">QTY</th>
      <th bgcolor="#024a75" style="color:white; font-size:14;">HARGA</th>
      <th bgcolor="#024a75" style="color:white; font-size:14;">JUMLAH</th>
      <th bgcolor="#024a75" style="color:white; font-size:14;">QTY</th>
      <th bgcolor="#024a75" style="color:white; font-size:14;">HARGA</th>
      <th bgcolor="#024a75" style="color:white; font-size:14;">JUMLAH</th>
      <th bgcolor="#024a75" style="color:white; font-size:14;">QTY</th>
      <th bgcolor="#024a75" style="color:white; font-size:14;">HARGA</th>
      <th bgcolor="#024a75" style="color:white; font-size:14;">JUMLAH</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $saldoawalqty       = $saldoawal['qty'];
    $saldoawalharga     = $saldoawal['harga'];
    $totqtypemb         = 0;
    $totqtylainnya      = 0;
    $totqtylain         = 0;
    $totqtyretur        = 0;
    $totqtypro          = 0;
    $totqtyseas         = 0;
    $totqtypdqc         = 0;
    $totqtycabang       = 0;
    $totqtysus          = 0;
    $totqtyunitmasuk    = 0;
    $totqtyunitkeluar   = 0;
    while (strtotime($dari) <= strtotime($sampai)) {

      $qmasuk           = "SELECT 
      SUM( IF( pemasukan_bb.status = '1' , qty ,0 )) AS qtypemb,
      SUM( IF( pemasukan_bb.status = '1' , qty ,0 )) AS qtypemb,
      harga
      FROM pemasukan_bb 
      INNER JOIN detail_pemasukan_bb 
      ON detail_pemasukan_bb.nobukti_pemasukan=pemasukan_bb.nobukti_pemasukan 
      WHERE tgl_pemasukan ='$dari' AND detail_pemasukan_bb.kode_barang = '$kode_barang'
      GROUP BY tgl_pemasukan,harga";
      $masuk            = $this->db->query($qmasuk)->row_array();

      $qkeluar           = "SELECT  qty,tgl_pengeluaran
      FROM pengeluaran_bb 
      INNER JOIN detail_pengeluaran_bb 
      ON detail_pengeluaran_bb.nobukti_pengeluaran=pengeluaran_bb.nobukti_pengeluaran 
      WHERE tgl_pengeluaran ='$dari' AND detail_pengeluaran_bb.kode_barang = '$kode_barang'
      GROUP BY qty,tgl_pengeluaran";
      $keluar            = $this->db->query($qkeluar)->row_array();

      if(substr($dari,8,2) == '01'){
        $qtysaldoawal   = $saldoawalqty;
        $hargasaldoawal = $saldoawalharga;
        $jmlhsaldoawal  = $qtysaldoawal * $hargasaldoawal;
      }else{
        $qtysaldoawal   = $saldoawalqty + $qtypembelian;
        $hargasaldoawal = $saldoawalharga;
        $jmlhsaldoawal  = $qtysaldoawal * $hargasaldoawal;
      }

      $qtypembelian = $masuk['qtypemb'];
      $hargamasuk   = $masuk['harga'];
      $jmlpembelian = $hargamasuk * $qtypembelian;
      

      $qtypemakaian = $keluar['qty'];
      $hargakeluar  = ($jmlhsaldoawal+$jmlpembelian)/($qtysaldoawal+$qtypembelian);
      $jmlhkeluar   = $hargakeluar * $qtypemakaian;

      $qtysaldoakhir = $qtysaldoawal+$qtypembelian-$qtypemakaian;
      $jmlhsaldoakhir = $qtysaldoakhir*$hargakeluar;


     
    ?>
      <tr style="color:black; font-size:14;">
        <td><?php echo $dari; ?></td>
        <td align="right"><?php echo uang($qtysaldoawal); ?>
        <td align="right"><?php echo uang($hargasaldoawal); ?>
        <td align="right"><?php echo uang($jmlhsaldoawal); ?>
        <td align="right">
          <?php
          if (isset($qtypembelian) and $qtypembelian != "0") {
            echo uang($qtypembelian);
          }
          ?>
        </td>
        <td align="right">
          <?php
          if (isset($qtypembelian) and $qtypembelian != "0") {
            echo uang($hargamasuk);
          }
          ?>
        </td>
        <td align="right">
          <?php
          if (isset($qtypembelian) and $qtypembelian != "0") {
            echo uang($jmlpembelian);
          }
          ?>
        </td>
        <td align="right"></td>
        <td align="right"></td>
        <td align="right"></td>
        <td align="right">
          <?php
           if (isset($qtypemakaian) and $qtypemakaian != "0") {
            echo uang($qtypemakaian);
          }
          ?>
        </td>
        <td align="right">
          <?php
           if (isset($qtypemakaian) and $qtypemakaian != "0") {
            echo uang($hargakeluar);
          }
          ?>
        </td>
        <td align="right">
          <?php
           if (isset($qtypemakaian) and $qtypemakaian != "0") {
            echo uang($jmlhkeluar);
          }
          ?>
        </td>
        <td align="right">
          <?php
           if (isset($qtysaldoakhir) and $qtysaldoakhir != "0") {
            echo uang($qtysaldoakhir);
          }
          ?>
        </td>
        <td align="right">
          <?php
           if (isset($hargakeluar) and $hargakeluar != "0") {
            echo uang($hargakeluar);
          }
          ?>
        </td>
        <td align="right">
          <?php
           if (isset($jmlhsaldoakhir) and $jmlhsaldoakhir != "0") {
            echo uang($jmlhsaldoakhir);
          }
          ?>
        </td>
      </tr>
    <?php
      $dari = date("Y-m-d", strtotime("+1 day", strtotime($dari))); //looping tambah 1 date
    } ?>
  </tbody>
  <tfoot>
    <tr bgcolor="#31869b">
      <th colspan="" style="color:white; font-size:14;">TOTAL</th>
      <th style="color:white; font-size:14;"><?php echo uang($totqtyunitmasuk); ?></th>
    </tr>
  </tfoot>
</table>